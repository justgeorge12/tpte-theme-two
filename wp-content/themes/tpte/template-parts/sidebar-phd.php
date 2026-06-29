<?php
/**
 * Template part: PhD ("Διδακτορικές Σπουδές") page sidebar.
 *
 * Mirrors template-parts/sidebar-undergrad.php: a "Σπουδές" section-nav widget
 * plus the per-page "Χρήσιμα Αρχεία" list. Sibling study-level pages are resolved
 * by slug; ones not yet created render as muted, non-clickable items so the full
 * section structure is always visible. The current page is highlighted.
 *
 * Reuses the .tp-course-requrement-widget-box / .tp-undergrad-nav markup so it
 * inherits the existing sidebar styling (programme.css).
 *
 * @package tpte
 */

$tp_theme_uri = get_template_directory_uri();

// Study-level navigation. Slugs match the pages created in wp-admin; adjust here
// if a page uses a different slug.
$phd_nav = array(
	array(
		'slug'  => 'undergraduate-programme',
		'label' => __( 'Προπτυχιακές Σπουδές', 'tpte' ),
	),
	array(
		'slug'  => 'masters-programmes',
		'label' => __( 'Μεταπτυχιακά Προγράμματα Σπουδών', 'tpte' ),
	),
	array(
		'slug'  => 'phd-programme',
		'label' => __( 'Διδακτορικό Δίπλωμα', 'tpte' ),
	),
);
$current_page_id = get_queried_object_id();

// Page-specific files, passed in by the page template via get_template_part( …, $args ).
$useful_files = ( isset( $args['useful_files'] ) && is_array( $args['useful_files'] ) ) ? $args['useful_files'] : array();
?>
<div class="tp-course-requrement-widget-box">
	<div class="tp-course-requrement-widget tp-undergrad-nav mb-30">
		<div class="tp-course-requrement-widget-content">
			<h4 class="tp-undergrad-nav-title"><?php esc_html_e( 'Σπουδές', 'tpte' ); ?></h4>
			<?php
			foreach ( $phd_nav as $nav_item ) :
				$nav_page   = get_page_by_path( $nav_item['slug'] );
				$nav_url    = $nav_page ? get_permalink( $nav_page ) : '';
				$is_current = $nav_page && (int) $nav_page->ID === (int) $current_page_id;

				if ( $is_current ) :
					?>
					<a class="current-page" aria-current="page" href="<?php echo esc_url( $nav_url ); ?>"><?php echo esc_html( $nav_item['label'] ); ?></a>
				<?php elseif ( $nav_url ) : ?>
					<a href="<?php echo esc_url( $nav_url ); ?>"><?php echo esc_html( $nav_item['label'] ); ?></a>
				<?php else : ?>
					<span class="is-disabled"><?php echo esc_html( $nav_item['label'] ); ?></span>
					<?php
				endif;
			endforeach;
			?>
		</div>
	</div>
	<?php if ( ! empty( $useful_files ) ) : ?>
	<div class="tp-course-requrement-widget tp-undergrad-files mb-30">
		<div class="tp-course-requrement-widget-content">
			<h4 class="tp-undergrad-nav-title"><?php esc_html_e( 'Χρήσιμα Αρχεία', 'tpte' ); ?></h4>
			<?php foreach ( $useful_files as $file ) : ?>
				<a href="<?php echo esc_url( $file['url'] ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $file['label'] ); ?></a>
			<?php endforeach; ?>
		</div>
	</div>
	<?php endif; ?>
</div>
