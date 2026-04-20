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
 * Flush rewrite rules on theme switch.
 */
function tpte_flush_rewrite_rules() {
	tpte_register_event_cpt();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'tpte_flush_rewrite_rules' );
