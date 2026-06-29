<?php
/**
 * Custom Post Types and Meta Boxes for TPTE theme.
 *
 * @package tpte
 */

/**
 * Register Event custom post type.
 */
function tpte_register_event_cpt() {
	$labels = array(
		'name'               => _x( 'Events', 'post type general name', 'tpte' ),
		'singular_name'      => _x( 'Event', 'post type singular name', 'tpte' ),
		'menu_name'          => _x( 'Events', 'admin menu', 'tpte' ),
		'add_new'            => _x( 'Add New', 'event', 'tpte' ),
		'add_new_item'       => __( 'Add New Event', 'tpte' ),
		'new_item'           => __( 'New Event', 'tpte' ),
		'edit_item'          => __( 'Edit Event', 'tpte' ),
		'view_item'          => __( 'View Event', 'tpte' ),
		'all_items'          => __( 'All Events', 'tpte' ),
		'search_items'       => __( 'Search Events', 'tpte' ),
		'not_found'          => __( 'No events found.', 'tpte' ),
		'not_found_in_trash' => __( 'No events found in Trash.', 'tpte' ),
	);

	$args = array(
		'labels'       => $labels,
		'public'       => true,
		'has_archive'  => true,
		'show_in_rest' => true,
		'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'rewrite'      => array( 'slug' => 'events' ),
		'menu_icon'    => 'dashicons-calendar-alt',
	);

	register_post_type( 'tpte_event', $args );
}
add_action( 'init', 'tpte_register_event_cpt' );

/**
 * Add meta boxes for Event Details.
 */
function tpte_event_meta_boxes() {
	add_meta_box(
		'tpte_event_details',
		__( 'Event Details', 'tpte' ),
		'tpte_event_meta_box_html',
		'tpte_event',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'tpte_event_meta_boxes' );

/**
 * Render Event Details meta box.
 *
 * @param WP_Post $post Current post object.
 */
function tpte_event_meta_box_html( $post ) {
	wp_nonce_field( 'tpte_event_meta_nonce', 'tpte_event_nonce' );

	$start_date   = get_post_meta( $post->ID, '_event_start_date', true );
	$start_time   = get_post_meta( $post->ID, '_event_start_time', true );
	$end_date     = get_post_meta( $post->ID, '_event_end_date', true );
	$end_time     = get_post_meta( $post->ID, '_event_end_time', true );
	$location     = get_post_meta( $post->ID, '_event_location', true );
	$attendees    = get_post_meta( $post->ID, '_event_attendees', true );
	$about        = get_post_meta( $post->ID, '_event_about', true );
	$cover_topics = get_post_meta( $post->ID, '_event_cover_topics', true );
	$video_url    = get_post_meta( $post->ID, '_event_video_url', true );
	?>
	<table class="form-table">
		<tr>
			<th><label for="event_start_date"><?php esc_html_e( 'Start Date', 'tpte' ); ?></label></th>
			<td><input type="date" id="event_start_date" name="_event_start_date" value="<?php echo esc_attr( $start_date ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label for="event_start_time"><?php esc_html_e( 'Start Time', 'tpte' ); ?></label></th>
			<td><input type="time" id="event_start_time" name="_event_start_time" value="<?php echo esc_attr( $start_time ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label for="event_end_date"><?php esc_html_e( 'End Date', 'tpte' ); ?></label></th>
			<td><input type="date" id="event_end_date" name="_event_end_date" value="<?php echo esc_attr( $end_date ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label for="event_end_time"><?php esc_html_e( 'End Time', 'tpte' ); ?></label></th>
			<td><input type="time" id="event_end_time" name="_event_end_time" value="<?php echo esc_attr( $end_time ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label for="event_location"><?php esc_html_e( 'Location', 'tpte' ); ?></label></th>
			<td><input type="text" id="event_location" name="_event_location" value="<?php echo esc_attr( $location ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label for="event_attendees"><?php esc_html_e( 'Attendees', 'tpte' ); ?></label></th>
			<td><input type="number" id="event_attendees" name="_event_attendees" value="<?php echo esc_attr( $attendees ); ?>" class="regular-text" min="0"></td>
		</tr>
		<tr>
			<th><label for="event_about"><?php esc_html_e( 'About the Event', 'tpte' ); ?></label></th>
			<td><?php
				wp_editor( $about, 'event_about', array(
					'textarea_name' => '_event_about',
					'textarea_rows' => 8,
					'media_buttons' => true,
				) );
			?></td>
		</tr>
		<tr>
			<th><label for="event_cover_topics"><?php esc_html_e( 'Cover Topics (one per line)', 'tpte' ); ?></label></th>
			<td><textarea id="event_cover_topics" name="_event_cover_topics" rows="6" class="large-text"><?php echo esc_textarea( $cover_topics ); ?></textarea></td>
		</tr>
		<tr>
			<th><label for="event_video_url"><?php esc_html_e( 'Video URL', 'tpte' ); ?></label></th>
			<td><input type="url" id="event_video_url" name="_event_video_url" value="<?php echo esc_url( $video_url ); ?>" class="regular-text"></td>
		</tr>
	</table>
	<?php
}

/**
 * Save Event meta data.
 *
 * @param int $post_id Post ID.
 */
function tpte_save_event_meta( $post_id ) {
	if ( ! isset( $_POST['tpte_event_nonce'] ) || ! wp_verify_nonce( $_POST['tpte_event_nonce'], 'tpte_event_meta_nonce' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$fields = array(
		'_event_start_date'   => 'sanitize_text_field',
		'_event_start_time'   => 'sanitize_text_field',
		'_event_end_date'     => 'sanitize_text_field',
		'_event_end_time'     => 'sanitize_text_field',
		'_event_location'     => 'sanitize_text_field',
		'_event_attendees'    => 'absint',
		'_event_about'        => 'wp_kses_post',
		'_event_cover_topics' => 'sanitize_textarea_field',
		'_event_video_url'    => 'esc_url_raw',
	);

	foreach ( $fields as $key => $sanitize_cb ) {
		if ( isset( $_POST[ $key ] ) ) {
			update_post_meta( $post_id, $key, $sanitize_cb( $_POST[ $key ] ) );
		}
	}
}
add_action( 'save_post_tpte_event', 'tpte_save_event_meta' );

/**
 * Templates that the "Χρήσιμα Αρχεία" (useful files) meta box is bound to.
 */
const TPTE_USEFUL_FILES_TEMPLATES = array(
	'page-undergrad-section.php',
	'page-university-undergrad-programme.php',
	'page-phd-programme.php',
);

/**
 * Register the "Χρήσιμα Αρχεία" meta box on pages using a supported template.
 *
 * @param string  $post_type Current post type.
 * @param WP_Post $post      Current post object.
 */
function tpte_useful_files_meta_box( $post_type, $post ) {
	if ( 'page' !== $post_type ) {
		return;
	}

	// Only show for pages that use one of the supported templates.
	if ( ! in_array( get_post_meta( $post->ID, '_wp_page_template', true ), TPTE_USEFUL_FILES_TEMPLATES, true ) ) {
		return;
	}

	add_meta_box(
		'tpte_useful_files',
		__( 'Χρήσιμα Αρχεία (sidebar)', 'tpte' ),
		'tpte_useful_files_meta_box_html',
		'page',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'tpte_useful_files_meta_box', 10, 2 );

/**
 * Render the useful-files repeater meta box.
 *
 * @param WP_Post $post Current post object.
 */
function tpte_useful_files_meta_box_html( $post ) {
	wp_nonce_field( 'tpte_useful_files_nonce', 'tpte_useful_files_nonce_field' );

	$files = get_post_meta( $post->ID, 'tpte_useful_files', true );
	if ( ! is_array( $files ) || empty( $files ) ) {
		// One empty row so the box is ready to fill in.
		$files = array( array( 'label' => '', 'url' => '' ) );
	}
	?>
	<p class="description"><?php esc_html_e( 'Σύνδεσμοι αρχείων που εμφανίζονται στο πλαϊνό μενού, κάτω από τον τίτλο «Χρήσιμα Αρχεία». Αφήστε μια γραμμή κενή για να αγνοηθεί.', 'tpte' ); ?></p>
	<table class="widefat tpte-useful-files-table" style="margin-top:10px;">
		<thead>
			<tr>
				<th style="width:35%;"><?php esc_html_e( 'Τίτλος', 'tpte' ); ?></th>
				<th><?php esc_html_e( 'URL', 'tpte' ); ?></th>
				<th style="width:60px;"></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ( $files as $file ) : ?>
				<tr class="tpte-useful-files-row">
					<td><input type="text" name="tpte_useful_files_label[]" value="<?php echo esc_attr( isset( $file['label'] ) ? $file['label'] : '' ); ?>" class="widefat" placeholder="<?php esc_attr_e( 'π.χ. Οδηγός σπουδών 2025-26', 'tpte' ); ?>"></td>
					<td><input type="url" name="tpte_useful_files_url[]" value="<?php echo esc_attr( isset( $file['url'] ) ? $file['url'] : '' ); ?>" class="widefat" placeholder="https://"></td>
					<td><button type="button" class="button tpte-useful-files-remove"><?php esc_html_e( 'Αφαίρεση', 'tpte' ); ?></button></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<p><button type="button" class="button button-secondary tpte-useful-files-add"><?php esc_html_e( '+ Προσθήκη αρχείου', 'tpte' ); ?></button></p>

	<script>
	( function () {
		var table = document.querySelector( '.tpte-useful-files-table tbody' );
		if ( ! table ) {
			return;
		}
		var wrap = table.closest( '#tpte_useful_files' ) || document;
		function rowHtml() {
			var r = table.querySelector( '.tpte-useful-files-row' );
			var clone = r.cloneNode( true );
			clone.querySelectorAll( 'input' ).forEach( function ( input ) {
				input.value = '';
			} );
			return clone;
		}
		wrap.addEventListener( 'click', function ( e ) {
			if ( e.target.classList.contains( 'tpte-useful-files-add' ) ) {
				e.preventDefault();
				table.appendChild( rowHtml() );
			}
			if ( e.target.classList.contains( 'tpte-useful-files-remove' ) ) {
				e.preventDefault();
				var rows = table.querySelectorAll( '.tpte-useful-files-row' );
				if ( rows.length > 1 ) {
					e.target.closest( '.tpte-useful-files-row' ).remove();
				} else {
					rows[0].querySelectorAll( 'input' ).forEach( function ( input ) {
						input.value = '';
					} );
				}
			}
		} );
	} )();
	</script>
	<?php
}

/**
 * Save the useful-files meta box.
 *
 * @param int $post_id Post ID.
 */
function tpte_save_useful_files_meta( $post_id ) {
	if ( ! isset( $_POST['tpte_useful_files_nonce_field'] ) || ! wp_verify_nonce( sanitize_key( $_POST['tpte_useful_files_nonce_field'] ), 'tpte_useful_files_nonce' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_page', $post_id ) ) {
		return;
	}

	$labels = isset( $_POST['tpte_useful_files_label'] ) ? (array) wp_unslash( $_POST['tpte_useful_files_label'] ) : array();
	$urls   = isset( $_POST['tpte_useful_files_url'] ) ? (array) wp_unslash( $_POST['tpte_useful_files_url'] ) : array();

	$files = array();
	$count = max( count( $labels ), count( $urls ) );
	for ( $i = 0; $i < $count; $i++ ) {
		$label = isset( $labels[ $i ] ) ? sanitize_text_field( $labels[ $i ] ) : '';
		$url   = isset( $urls[ $i ] ) ? esc_url_raw( $urls[ $i ] ) : '';

		// Skip rows that are completely empty or missing a URL.
		if ( '' === $url ) {
			continue;
		}

		$files[] = array(
			'label' => '' !== $label ? $label : $url,
			'url'   => $url,
		);
	}

	if ( empty( $files ) ) {
		delete_post_meta( $post_id, 'tpte_useful_files' );
	} else {
		update_post_meta( $post_id, 'tpte_useful_files', $files );
	}
}
add_action( 'save_post_page', 'tpte_save_useful_files_meta' );

/**
 * Order the Event archive by event start date instead of post date.
 *
 * The archive (archive-tpte_event.php) renders every event in one page so the
 * client-side Προσεχείς/Παλαιότερες filter (assets/js/event-filter.js) can toggle
 * them without a reload — hence posts_per_page = -1 and no server pagination. A
 * department's event volume is modest, so this is intentional. Events are sorted
 * by _event_start_date ascending (soonest first); the Παλαιότερες tab re-orders
 * past events most-recent-first client-side.
 *
 * @param WP_Query $query The query object.
 */
function tpte_order_event_archive( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}

	if ( $query->is_post_type_archive( 'tpte_event' ) ) {
		$query->set( 'posts_per_page', -1 );
		$query->set( 'meta_key', '_event_start_date' );
		$query->set( 'orderby', 'meta_value' );
		$query->set( 'meta_type', 'DATE' );
		$query->set( 'order', 'ASC' );
	}
}
add_action( 'pre_get_posts', 'tpte_order_event_archive' );

/**
 * Register Announcement custom post type.
 *
 * Undergraduate announcements. Each one is essentially a PDF: a title, an optional
 * short description (the native excerpt) and an attached PDF (the _announcement_pdf_id
 * meta). The archive (archive-tpte_announcement.php) lists them with a direct download
 * button; single views redirect straight to the PDF (see tpte_announcement_redirect).
 */
function tpte_register_announcement_cpt() {
	$labels = array(
		'name'               => _x( 'Ανακοινώσεις', 'post type general name', 'tpte' ),
		'singular_name'      => _x( 'Ανακοίνωση', 'post type singular name', 'tpte' ),
		'menu_name'          => _x( 'Ανακοινώσεις', 'admin menu', 'tpte' ),
		'add_new'            => _x( 'Προσθήκη νέας', 'announcement', 'tpte' ),
		'add_new_item'       => __( 'Προσθήκη νέας ανακοίνωσης', 'tpte' ),
		'new_item'           => __( 'Νέα ανακοίνωση', 'tpte' ),
		'edit_item'          => __( 'Επεξεργασία ανακοίνωσης', 'tpte' ),
		'view_item'          => __( 'Προβολή ανακοίνωσης', 'tpte' ),
		'all_items'          => __( 'Όλες οι ανακοινώσεις', 'tpte' ),
		'search_items'       => __( 'Αναζήτηση ανακοινώσεων', 'tpte' ),
		'not_found'          => __( 'Δεν βρέθηκαν ανακοινώσεις.', 'tpte' ),
		'not_found_in_trash' => __( 'Δεν βρέθηκαν ανακοινώσεις στον κάδο.', 'tpte' ),
	);

	$args = array(
		'labels'       => $labels,
		'public'       => true,
		'has_archive'  => true,
		'show_in_rest' => true,
		'supports'     => array( 'title', 'excerpt' ),
		'rewrite'      => array( 'slug' => 'announcements' ),
		'menu_icon'    => 'dashicons-megaphone',
	);

	register_post_type( 'tpte_announcement', $args );
}
add_action( 'init', 'tpte_register_announcement_cpt' );

/**
 * Register the Announcement category taxonomy.
 *
 * A hierarchical taxonomy (like core categories) dedicated to announcements, so it
 * stays separate from the news categories. New announcements with no category fall
 * back to the «Γενικές» default term (not «Uncategorized»).
 */
function tpte_register_announcement_taxonomy() {
	$labels = array(
		'name'              => _x( 'Κατηγορίες', 'taxonomy general name', 'tpte' ),
		'singular_name'     => _x( 'Κατηγορία', 'taxonomy singular name', 'tpte' ),
		'menu_name'         => __( 'Κατηγορίες', 'tpte' ),
		'all_items'         => __( 'Όλες οι κατηγορίες', 'tpte' ),
		'edit_item'         => __( 'Επεξεργασία κατηγορίας', 'tpte' ),
		'view_item'         => __( 'Προβολή κατηγορίας', 'tpte' ),
		'update_item'       => __( 'Ενημέρωση κατηγορίας', 'tpte' ),
		'add_new_item'      => __( 'Προσθήκη νέας κατηγορίας', 'tpte' ),
		'new_item_name'     => __( 'Όνομα νέας κατηγορίας', 'tpte' ),
		'search_items'      => __( 'Αναζήτηση κατηγοριών', 'tpte' ),
		'not_found'         => __( 'Δεν βρέθηκαν κατηγορίες.', 'tpte' ),
	);

	$args = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_in_rest'      => true,
		'show_admin_column' => true,
		'rewrite'           => array( 'slug' => 'announcement-category' ),
		'default_term'      => array(
			'name' => __( 'Γενικές', 'tpte' ),
			'slug' => 'genikes',
		),
	);

	register_taxonomy( 'tpte_announcement_cat', 'tpte_announcement', $args );
}
add_action( 'init', 'tpte_register_announcement_taxonomy' );

/**
 * Add the PDF meta box for Announcements.
 */
function tpte_announcement_meta_boxes() {
	add_meta_box(
		'tpte_announcement_details',
		__( 'Αρχείο PDF', 'tpte' ),
		'tpte_announcement_meta_box_html',
		'tpte_announcement',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'tpte_announcement_meta_boxes' );

/**
 * Render the Announcement PDF picker meta box.
 *
 * Stores a single attachment ID in _announcement_pdf_id. The "Επιλογή PDF" button
 * opens the WordPress Media Library (wired up in assets/js/admin-announcement-media.js);
 * the chosen file's name is shown and can be cleared with "Αφαίρεση".
 *
 * @param WP_Post $post Current post object.
 */
function tpte_announcement_meta_box_html( $post ) {
	wp_nonce_field( 'tpte_announcement_meta_nonce', 'tpte_announcement_nonce' );

	$pdf_id   = (int) get_post_meta( $post->ID, '_announcement_pdf_id', true );
	$pdf_name = $pdf_id ? get_the_title( $pdf_id ) : '';
	$pdf_url  = $pdf_id ? wp_get_attachment_url( $pdf_id ) : '';
	?>
	<div class="tpte-announcement-pdf">
		<p class="description"><?php esc_html_e( 'Επιλέξτε ή ανεβάστε το αρχείο PDF της ανακοίνωσης από τη Βιβλιοθήκη Πολυμέσων.', 'tpte' ); ?></p>
		<input type="hidden" id="tpte_announcement_pdf_id" name="_announcement_pdf_id" value="<?php echo esc_attr( $pdf_id ); ?>">
		<p class="tpte-announcement-pdf-name" style="margin:8px 0;">
			<?php if ( $pdf_url ) : ?>
				<a href="<?php echo esc_url( $pdf_url ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $pdf_name ); ?></a>
			<?php else : ?>
				<em><?php esc_html_e( 'Δεν έχει επιλεγεί αρχείο.', 'tpte' ); ?></em>
			<?php endif; ?>
		</p>
		<button type="button" class="button button-secondary tpte-announcement-pdf-select"><?php esc_html_e( 'Επιλογή PDF', 'tpte' ); ?></button>
		<button type="button" class="button tpte-announcement-pdf-remove"<?php echo $pdf_id ? '' : ' style="display:none;"'; ?>><?php esc_html_e( 'Αφαίρεση', 'tpte' ); ?></button>
	</div>
	<?php
}

/**
 * Save the Announcement PDF meta.
 *
 * @param int $post_id Post ID.
 */
function tpte_save_announcement_meta( $post_id ) {
	if ( ! isset( $_POST['tpte_announcement_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['tpte_announcement_nonce'] ), 'tpte_announcement_meta_nonce' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$pdf_id = isset( $_POST['_announcement_pdf_id'] ) ? absint( $_POST['_announcement_pdf_id'] ) : 0;

	if ( $pdf_id ) {
		update_post_meta( $post_id, '_announcement_pdf_id', $pdf_id );
	} else {
		delete_post_meta( $post_id, '_announcement_pdf_id' );
	}
}
add_action( 'save_post_tpte_announcement', 'tpte_save_announcement_meta' );

/**
 * Show 9 announcements per page on the archive, newest first (default date order).
 *
 * @param WP_Query $query The query object.
 */
function tpte_order_announcement_archive( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}

	if ( $query->is_post_type_archive( 'tpte_announcement' ) || $query->is_tax( 'tpte_announcement_cat' ) ) {
		$query->set( 'posts_per_page', 9 );
	}
}
add_action( 'pre_get_posts', 'tpte_order_announcement_archive' );

/**
 * Announcements have no single view — send single URLs straight to the PDF.
 *
 * Titles in the archive link directly to the PDF, so the single permalink is never
 * surfaced; this just makes direct access graceful (PDF if attached, else the archive).
 */
function tpte_announcement_redirect() {
	if ( ! is_singular( 'tpte_announcement' ) ) {
		return;
	}

	$pdf_id  = (int) get_post_meta( get_queried_object_id(), '_announcement_pdf_id', true );
	$pdf_url = $pdf_id ? wp_get_attachment_url( $pdf_id ) : '';

	wp_safe_redirect( $pdf_url ? $pdf_url : get_post_type_archive_link( 'tpte_announcement' ) );
	exit;
}
add_action( 'template_redirect', 'tpte_announcement_redirect' );

/**
 * Flush rewrite rules on theme switch.
 */
function tpte_flush_rewrite_rules() {
	tpte_register_event_cpt();
	tpte_register_announcement_cpt();
	tpte_register_announcement_taxonomy();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'tpte_flush_rewrite_rules' );
