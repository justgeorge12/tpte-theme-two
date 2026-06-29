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
</div>
