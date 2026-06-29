<?php
/**
 * Template part: Erasmus+ page sidebar.
 *
 * Two widget boxes used by page-erasmus.php:
 *   1. "Χρήσιμα Αρχεία" — the two Erasmus+ PDFs surfaced from the page body.
 *   2. "Υπεύθυνη" — the departmental Erasmus+ coordinator, her name linking to
 *      the shared Staff Profile template (page-person-single.php).
 *
 * @package tpte
 */

// Downloadable Erasmus+ files. Hosted under the department data dir, mirroring
// the absolute paths used by the staff CV links in inc/staff-data.php.
$erasmus_files = array(
	array(
		'url'   => 'https://www.ct.aegean.gr/data/Εσωτερικός Οδηγός Υλοποίησης Erasmus.pdf',
		'label' => __( 'Εσωτερικός Κανονισμός Κινητικότητας Προγράμματος Erasmus+', 'tpte' ),
	),
	array(
		'url'   => 'https://www.ct.aegean.gr/data/Erasmus-Course-catalog-2026-2027.pdf',
		'label' => __( 'Κατάλογος Μαθημάτων για Εισερχόμενους Φοιτητές/τριες', 'tpte' ),
	),
);

// Departmental Erasmus+ coordinator. Profile resolves via the Staff Profile page
// (/staff-profile/?dept=dep&member=kitsiou); see inc/staff-data.php.
$coordinator_url = add_query_arg(
	array(
		'dept'   => 'dep',
		'member' => 'kitsiou',
	),
	home_url( '/staff-profile/' )
);
?>
<div class="tp-course-requrement-widget-box">
	<div class="tp-course-requrement-widget tp-undergrad-files mb-30">
		<div class="tp-course-requrement-widget-content">
			<h4 class="tp-undergrad-nav-title"><?php esc_html_e( 'Χρήσιμα Αρχεία', 'tpte' ); ?></h4>
			<?php foreach ( $erasmus_files as $file ) : ?>
				<a href="<?php echo esc_url( $file['url'] ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $file['label'] ); ?></a>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="tp-course-requrement-widget tp-undergrad-files mb-30">
		<div class="tp-course-requrement-widget-content">
			<h4 class="tp-undergrad-nav-title"><?php esc_html_e( 'Υπεύθυνη', 'tpte' ); ?></h4>
			<a href="<?php echo esc_url( $coordinator_url ); ?>"><?php esc_html_e( 'Αγγελική Κίτσιου, Επίκουρη Καθηγήτρια', 'tpte' ); ?></a>
		</div>
	</div>
</div>
