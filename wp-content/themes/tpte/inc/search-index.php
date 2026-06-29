<?php
/**
 * Live search index.
 *
 * Builds one flat, searchable index of every front-end content type the site
 * exposes — Events, News, Announcements, People and Pages — so the header
 * live-search box (assets/js/live-search.js) can fetch it once and filter it
 * entirely client-side. The index is cached in a transient and rebuilt whenever
 * a post is saved or deleted.
 *
 * Each item is a small array:
 *   array(
 *     'type'     => 'event|news|announcement|person|page',
 *     'title'    => string,
 *     'subtitle' => string,  // location/date, category, role, etc.
 *     'url'      => string,
 *     'haystack' => string,  // pre-lowercased match text (client strips accents)
 *   )
 *
 * @package tpte
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
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
 * Build the full search index from scratch (uncached).
 *
 * @return array List of index items.
 */
function tpte_build_search_index() {
	$items = array();

	// ── Events (tpte_event CPT) ─────────────────────────────────────────────
	$events = get_posts(
		array(
			'post_type'        => 'tpte_event',
			'post_status'      => 'publish',
			'posts_per_page'   => -1,
			'suppress_filters' => false,
		)
	);
	foreach ( $events as $post ) {
		$start    = get_post_meta( $post->ID, '_event_start_date', true );
		$location = get_post_meta( $post->ID, '_event_location', true );
		$date     = $start ? date_i18n( 'd F Y', strtotime( $start ) ) : '';
		$subtitle = trim( implode( ' · ', array_filter( array( $date, $location ) ) ) );

		$items[] = array(
			'type'     => 'event',
			'title'    => get_the_title( $post ),
			'subtitle' => $subtitle,
			'url'      => get_permalink( $post ),
			'haystack' => tpte_search_haystack( array( get_the_title( $post ), $location, get_the_excerpt( $post ) ) ),
		);
	}

	// ── News (standard posts) ───────────────────────────────────────────────
	$news = get_posts(
		array(
			'post_type'        => 'post',
			'post_status'      => 'publish',
			'posts_per_page'   => -1,
			'suppress_filters' => false,
		)
	);
	foreach ( $news as $post ) {
		$cats     = get_the_category( $post->ID );
		$cat_name = ! empty( $cats ) ? $cats[0]->name : '';

		$items[] = array(
			'type'     => 'news',
			'title'    => get_the_title( $post ),
			'subtitle' => $cat_name,
			'url'      => get_permalink( $post ),
			'haystack' => tpte_search_haystack( array( get_the_title( $post ), $cat_name, get_the_excerpt( $post ) ) ),
		);
	}

	// ── Announcements (tpte_announcement CPT) ───────────────────────────────
	$announcements = get_posts(
		array(
			'post_type'        => 'tpte_announcement',
			'post_status'      => 'publish',
			'posts_per_page'   => -1,
			'suppress_filters' => false,
		)
	);
	foreach ( $announcements as $post ) {
		$pdf_id = (int) get_post_meta( $post->ID, '_announcement_pdf_id', true );
		$url    = $pdf_id ? wp_get_attachment_url( $pdf_id ) : get_permalink( $post );

		$items[] = array(
			'type'     => 'announcement',
			'title'    => get_the_title( $post ),
			'subtitle' => get_the_date( 'd F Y', $post ),
			'url'      => $url ? $url : get_permalink( $post ),
			'haystack' => tpte_search_haystack( array( get_the_title( $post ), get_the_excerpt( $post ) ) ),
		);
	}

	// ── People (static array in inc/staff-data.php) ─────────────────────────
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

	// ── Pages (excluding staff roster/profile templates) ────────────────────
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

		$items[] = array(
			'type'     => 'page',
			'title'    => get_the_title( $post ),
			'subtitle' => '',
			'url'      => get_permalink( $post ),
			'haystack' => tpte_search_haystack( array( get_the_title( $post ), get_the_excerpt( $post ) ) ),
		);
	}

	return $items;
}

/**
 * Build a lowercased match string from a list of fields.
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

/**
 * Return the search index, building + caching it on a miss.
 *
 * @return array
 */
function tpte_get_search_index() {
	$index = get_transient( 'tpte_search_index' );
	if ( false === $index ) {
		$index = tpte_build_search_index();
		set_transient( 'tpte_search_index', $index, DAY_IN_SECONDS );
	}
	return $index;
}

/**
 * Invalidate the cached index whenever content changes.
 */
function tpte_flush_search_index() {
	delete_transient( 'tpte_search_index' );
}
add_action( 'save_post', 'tpte_flush_search_index' );
add_action( 'deleted_post', 'tpte_flush_search_index' );

/**
 * AJAX endpoint: return the search index as JSON.
 *
 * Public, read-only data — a nonce check is enough. Registered for both logged
 * in and anonymous visitors.
 */
function tpte_ajax_search_index() {
	check_ajax_referer( 'tpte_live_search', 'nonce' );
	wp_send_json_success( tpte_get_search_index() );
}
add_action( 'wp_ajax_tpte_search_index', 'tpte_ajax_search_index' );
add_action( 'wp_ajax_nopriv_tpte_search_index', 'tpte_ajax_search_index' );
