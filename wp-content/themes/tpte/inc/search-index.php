<?php
/**
 * Live search — hybrid backend.
 *
 * Two data paths, chosen to scale as content grows:
 *
 *  1. STATIC INDEX (People + Pages) — small and slow-changing. Built once into a
 *     flat array, cached in a transient, and shipped whole to the browser, which
 *     filters it client-side (accent-insensitive Greek). Endpoint:
 *     wp_ajax(_nopriv)_tpte_search_static.
 *
 *  2. LIVE QUERY (Events, News, Announcements) — these grow without bound, so we
 *     do NOT ship them to the client. Instead the browser sends the search term
 *     to wp_ajax(_nopriv)_tpte_search_query, which runs a bounded WP_Query per
 *     type and caches the result per normalized term (short TTL). This keeps the
 *     client payload tiny and the dynamic results always fresh, for years.
 *
 * Item shape (both paths):
 *   array( 'type', 'title', 'subtitle', 'url' )            // + 'haystack' for static
 *
 * Cache invalidation: the static index is deleted and the query-cache version is
 * bumped on every relevant content change — including scheduled→publish
 * (transition_post_status), trash/untrash, and term edits — with a daily TTL as a
 * self-healing backstop.
 *
 * @package tpte
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** Post types served live (grow over time) → type key. */
function tpte_search_dynamic_types() {
	return array(
		'tpte_event'        => 'event',
		'post'              => 'news',
		'tpte_announcement' => 'announcement',
	);
}

/**
 * Pages whose template is a staff roster / staff profile. Excluded from the
 * Pages results so they don't duplicate the People entries.
 */
function tpte_search_excluded_page_templates() {
	return array(
		'page-dep.php',
		'page-edip.php',
		'page-eep.php',
		'page-etep.php',
		'page-admin-staff.php',
		'page-honorary.php',
		'page-person-single.php',
	);
}

/**
 * Map a post to a search result item (type, title, subtitle, url).
 *
 * Shared by the static Pages loop and the live query for the dynamic types.
 *
 * @param WP_Post $post Post object.
 * @param string  $type Result type key.
 * @return array
 */
function tpte_search_map_post( $post, $type ) {
	switch ( $type ) {
		case 'event':
			$start    = get_post_meta( $post->ID, '_event_start_date', true );
			$location = get_post_meta( $post->ID, '_event_location', true );
			$date     = $start ? date_i18n( 'd F Y', strtotime( $start ) ) : '';
			$subtitle = trim( implode( ' · ', array_filter( array( $date, $location ) ) ) );
			$url      = get_permalink( $post );
			break;

		case 'announcement':
			$pdf_id   = (int) get_post_meta( $post->ID, '_announcement_pdf_id', true );
			$url      = $pdf_id ? wp_get_attachment_url( $pdf_id ) : '';
			$url      = $url ? $url : get_permalink( $post );
			$subtitle = get_the_date( 'd F Y', $post );
			break;

		case 'news':
			$cats     = get_the_category( $post->ID );
			$subtitle = ! empty( $cats ) ? $cats[0]->name : '';
			$url      = get_permalink( $post );
			break;

		case 'page':
		default:
			$subtitle = '';
			$url      = get_permalink( $post );
			break;
	}

	return array(
		'type'     => $type,
		'title'    => get_the_title( $post ),
		'subtitle' => $subtitle,
		'url'      => $url,
	);
}

/* ───────────────────────────── Static index ────────────────────────────── */

/**
 * Build the static index (People + Pages) from scratch.
 *
 * @return array
 */
function tpte_build_static_search_index() {
	$items = array();

	// People (static array in inc/staff-data.php).
	require_once get_template_directory() . '/inc/staff-data.php';
	if ( function_exists( 'tpte_all_staff' ) ) {
		foreach ( tpte_all_staff() as $dept => $members ) {
			foreach ( $members as $slug => $member ) {
				$url = add_query_arg(
					array(
						'dept'   => $dept,
						'member' => $slug,
					),
					home_url( '/staff-profile/' )
				);

				$role_spec = array_filter( array( $member['role'], $member['specialization'] ) );

				$items[] = array(
					'type'     => 'person',
					'title'    => $member['name'],
					'subtitle' => implode( ' · ', $role_spec ),
					'url'      => $url,
					'haystack' => tpte_search_haystack(
						array(
							$member['name'],
							$member['role'],
							$member['specialization'],
							$member['email'],
						)
					),
				);
			}
		}
	}

	// Pages (excluding staff roster/profile templates).
	$excluded = tpte_search_excluded_page_templates();
	$pages    = get_posts(
		array(
			'post_type'        => 'page',
			'post_status'      => 'publish',
			'posts_per_page'   => -1,
			'suppress_filters' => false,
		)
	);
	foreach ( $pages as $post ) {
		$template = get_post_meta( $post->ID, '_wp_page_template', true );
		if ( $template && in_array( $template, $excluded, true ) ) {
			continue;
		}

		$item             = tpte_search_map_post( $post, 'page' );
		$item['haystack'] = tpte_search_haystack( array( get_the_title( $post ), get_the_excerpt( $post ) ) );
		$items[]          = $item;
	}

	return $items;
}

/**
 * Static index with transient caching.
 *
 * @return array
 */
function tpte_get_static_search_index() {
	$index = get_transient( 'tpte_search_static_index' );
	if ( false === $index ) {
		$index = tpte_build_static_search_index();
		set_transient( 'tpte_search_static_index', $index, DAY_IN_SECONDS );
	}
	return $index;
}

/* ───────────────────────────── Live query ──────────────────────────────── */

/**
 * Run a bounded search across the dynamic post types for a term.
 *
 * @param string $q Search term (raw user input).
 * @return array Flat list of result items (max 8 per type).
 */
function tpte_search_query_dynamic( $q ) {
	$items = array();

	foreach ( tpte_search_dynamic_types() as $post_type => $type ) {
		$query = new WP_Query(
			array(
				'post_type'           => $post_type,
				'post_status'         => 'publish',
				's'                   => $q,
				'posts_per_page'      => 8,
				'no_found_rows'       => true,
				'ignore_sticky_posts' => true,
			)
		);

		foreach ( $query->posts as $post ) {
			$items[] = tpte_search_map_post( $post, $type );
		}
	}

	return $items;
}

/**
 * Build a lowercased match string from a list of fields (static haystacks).
 *
 * Diacritics are stripped on the client (mirrors phd-filter.js normalize()),
 * so here we only join + lowercase + collapse whitespace.
 *
 * @param array $parts Field values.
 * @return string
 */
function tpte_search_haystack( $parts ) {
	$text = implode( ' ', array_filter( array_map( 'wp_strip_all_tags', $parts ) ) );
	$text = preg_replace( '/\s+/u', ' ', $text );
	return trim( function_exists( 'mb_strtolower' ) ? mb_strtolower( $text, 'UTF-8' ) : strtolower( $text ) );
}

/* ─────────────────────────── Cache invalidation ────────────────────────── */

/**
 * Current query-cache version. Bumped on any content change so all per-term
 * caches (keyed by it) are abandoned at once — orphans expire via their own TTL.
 *
 * @return int
 */
function tpte_search_cache_version() {
	return (int) get_option( 'tpte_search_cache_version', 0 );
}

/**
 * Invalidate everything: drop the static index and bump the query-cache version.
 */
function tpte_flush_search_index() {
	delete_transient( 'tpte_search_static_index' );
	update_option( 'tpte_search_cache_version', tpte_search_cache_version() + 1, false );
}

/**
 * Post-scoped flush that ignores revisions and autosaves.
 *
 * @param int $post_id Post ID.
 */
function tpte_flush_search_index_post( $post_id ) {
	if ( wp_is_post_revision( $post_id ) || ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) ) {
		return;
	}
	tpte_flush_search_index();
}
add_action( 'save_post', 'tpte_flush_search_index_post' );
add_action( 'deleted_post', 'tpte_flush_search_index_post' );
add_action( 'trashed_post', 'tpte_flush_search_index_post' );
add_action( 'untrashed_post', 'tpte_flush_search_index_post' );

/**
 * Catch scheduled posts going live (publish_future_post → wp_publish_post fires
 * transition_post_status, NOT save_post).
 *
 * @param string  $new_status New status.
 * @param string  $old_status Old status.
 * @param WP_Post $post       Post object.
 */
function tpte_flush_search_index_transition( $new_status, $old_status, $post ) {
	if ( 'auto-draft' === $new_status || ( $post && wp_is_post_revision( $post ) ) ) {
		return;
	}
	if ( $new_status !== $old_status ) {
		tpte_flush_search_index();
	}
}
add_action( 'transition_post_status', 'tpte_flush_search_index_transition', 10, 3 );

// Category / term renames change News subtitles.
add_action( 'edited_term', 'tpte_flush_search_index' );
add_action( 'delete_term', 'tpte_flush_search_index' );

/* ───────────────────────────── AJAX endpoints ──────────────────────────── */

/**
 * Endpoint: static index (People + Pages). Fetched once by the client.
 */
function tpte_ajax_search_static() {
	check_ajax_referer( 'tpte_live_search', 'nonce' );
	wp_send_json_success( tpte_get_static_search_index() );
}
add_action( 'wp_ajax_tpte_search_static', 'tpte_ajax_search_static' );
add_action( 'wp_ajax_nopriv_tpte_search_static', 'tpte_ajax_search_static' );

/**
 * Endpoint: live query across the dynamic types, cached per normalized term.
 */
function tpte_ajax_search_query() {
	check_ajax_referer( 'tpte_live_search', 'nonce' );

	$q = isset( $_GET['q'] ) ? sanitize_text_field( wp_unslash( $_GET['q'] ) ) : '';
	$q = trim( $q );

	$len = function_exists( 'mb_strlen' ) ? mb_strlen( $q ) : strlen( $q );
	if ( $len < 2 ) {
		wp_send_json_success( array() );
	}

	$lc  = function_exists( 'mb_strtolower' ) ? mb_strtolower( $q, 'UTF-8' ) : strtolower( $q );
	$key = 'tpte_sq_' . md5( tpte_search_cache_version() . '|' . filemtime( __FILE__ ) . '|' . $lc );

	$cached = get_transient( $key );
	if ( false !== $cached ) {
		wp_send_json_success( $cached );
	}

	$items = tpte_search_query_dynamic( $q );
	set_transient( $key, $items, 10 * MINUTE_IN_SECONDS );
	wp_send_json_success( $items );
}
add_action( 'wp_ajax_tpte_search_query', 'tpte_ajax_search_query' );
add_action( 'wp_ajax_nopriv_tpte_search_query', 'tpte_ajax_search_query' );
