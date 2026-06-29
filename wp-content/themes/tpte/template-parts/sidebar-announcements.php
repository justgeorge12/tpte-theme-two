<?php
/**
 * Template part: announcements sidebar.
 *
 * Mirrors the undergraduate sidebar nav box. Lists "Ανακοινώσεις Μεταπτυχιακών" with
 * links out to each Masters programme's own announcements page (those programmes host
 * their own sites — we only link to them). Programme names follow the canonical list in
 * page-postgrad-programmes.php.
 *
 * @package tpte
 */

$masters_announcements = array(
	array(
		'label' => __( 'Πολιτισμική Πληροφορική και Επικοινωνία', 'tpte' ),
		'url'   => 'https://ci.aegean.gr/apply',
	),
	array(
		'label' => __( 'Διαχείριση Μνημείων: Αρχαιολογία, Πόλη και Αρχιτεκτονική', 'tpte' ),
		'url'   => 'http://www.dpmsdiax.arch.uoa.gr/pages/news.html',
	),
	array(
		'label' => __( 'Ευφυή Συστήματα Πληροφορικής', 'tpte' ),
		'url'   => 'http://ics.aegean.gr/announcements/',
	),
	array(
		'label' => __( 'Π.Μ.Σ. Ψηφιακή Κυκλική Οικονομία', 'tpte' ),
		'url'   => 'https://3d-circular-msc.aegean.gr/ανακοινώσεις/',
	),
	array(
		'label' => __( 'Π.Μ.Σ. μέσω έρευνας — Ψηφιακή Κυκλική Οικονομία', 'tpte' ),
		'url'   => 'https://3d-circular-mres.aegean.gr/ανακοινώσεις/',
	),
);
?>
<div class="tp-course-requrement-widget-box">
	<div class="tp-course-requrement-widget tp-undergrad-nav mb-30">
		<div class="tp-course-requrement-widget-content">
			<h4 class="tp-undergrad-nav-title"><?php esc_html_e( 'Ανακοινώσεις Μεταπτυχιακών', 'tpte' ); ?></h4>
			<?php foreach ( $masters_announcements as $item ) : ?>
				<a href="<?php echo esc_url( $item['url'] ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $item['label'] ); ?></a>
			<?php endforeach; ?>
		</div>
	</div>

	<?php
	// Κατηγορίες — announcement categories with counts (same widget as the news archive).
	// Rendered only when at least one non-empty category exists.
	$ann_cats = get_terms( array(
		'taxonomy'   => 'tpte_announcement_cat',
		'hide_empty' => true,
	) );

	if ( ! empty( $ann_cats ) && ! is_wp_error( $ann_cats ) ) :
		$current_term_id = ( is_tax( 'tpte_announcement_cat' ) ) ? get_queried_object_id() : 0;
		?>
		<div class="tp-sidebar-widget mb-30">
			<div class="tp-sidebar-content">
				<h5 class="tp-sidebar-widget-title"><?php esc_html_e( 'Κατηγορίες', 'tpte' ); ?></h5>
				<ul>
					<?php foreach ( $ann_cats as $ann_cat ) : ?>
						<li<?php echo ( (int) $ann_cat->term_id === (int) $current_term_id ) ? ' class="current-cat"' : ''; ?>>
							<a href="<?php echo esc_url( get_term_link( $ann_cat ) ); ?>">
								<?php echo esc_html( $ann_cat->name ); ?>
								<span>(<?php echo esc_html( $ann_cat->count ); ?>)</span>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		<?php
	endif;
	?>
</div>
