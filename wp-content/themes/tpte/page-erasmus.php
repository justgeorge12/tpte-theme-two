<?php
/**
 * Template Name: Erasmus+
 * Template Post Type: page
 *
 * Erasmus+ programme page. Modelled on page-undergrad-section.php: the body is
 * rendered inside the shared .tp-course-requrement-* shell with a sidebar in the
 * right column. The body copy is authored directly here (migrated from the old
 * department site); the sidebar (template-parts/sidebar-erasmus.php) carries the
 * two Erasmus+ PDFs and the departmental coordinator. Page-specific spacing and
 * the theme-blue link hover live in assets/css/erasmus.css (enqueued for this
 * template in functions.php).
 *
 * @package tpte
 */

get_header();

while ( have_posts() ) :
	the_post();
	$tp_theme_uri = get_template_directory_uri();

	$internal_guide_url = 'https://www.ct.aegean.gr/data/Εσωτερικός Οδηγός Υλοποίησης Erasmus.pdf';
	$course_catalog_url = 'https://www.ct.aegean.gr/data/Erasmus-Course-catalog-2026-2027.pdf';
	?>

	<!-- breadcrumb start -->
	<section class="tp-breadcrumb__area pt-160 pb-150 p-relative z-index-1 fix">
		<div class="tp-breadcrumb__bg overlay" data-background="<?php echo esc_url( $tp_theme_uri ); ?>/assets/img/breadcrumb/campus-amphi-2.png"></div>
		<div class="container">
			<div class="row align-items-center">
				<div class="col-sm-12">
					<div class="tp-breadcrumb__content">
						<div class="tp-breadcrumb__list inner-after">
							<span class="white"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M8.07207 0C8.19331 0 8.31107 0.0404348 8.40664 0.114882L16.1539 6.14233L15.4847 6.98713L14.5385 6.25079V12.8994C14.538 13.1843 14.4243 13.4574 14.2225 13.6589C14.0206 13.8604 13.747 13.9738 13.4616 13.9743H2.69231C2.40688 13.9737 2.13329 13.8603 1.93146 13.6588C1.72962 13.4573 1.61597 13.1843 1.61539 12.8994V6.2459L0.669148 6.98235L0 6.1376L7.7375 0.114882C7.83308 0.0404348 7.95083 0 8.07207 0ZM8.07694 1.22084L2.69231 5.40777V12.8994H13.4616V5.41341L8.07694 1.22084Z" fill="currentColor"/>
							</svg></a></span>
							<span class="white"><?php the_title(); ?></span>
						</div>
						<h3 class="tp-breadcrumb__title color"><?php the_title(); ?></h3>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- breadcrumb end -->


	<!-- Erasmus+ area start -->
	<section class="tp-course-requrement-area grey-bg pt-100 pb-80">
		<div class="container">
			<div class="row">
				<div class="col-lg-9">
					<div class="tp-course-requrement-wrapper tp-erasmus">

						<h2 class="tp-erasmus-title"><?php esc_html_e( 'Πρόγραμμα Κινητικότητας Erasmus+', 'tpte' ); ?></h2>

						<p>
							<?php esc_html_e( 'Το πρόγραμμα Erasmus ξεκίνησε στα τέλη της δεκαετίας του 1980 και θεωρείται ένα από τα πιο επιτυχημένα ευρωπαϊκά προγράμματα κινητικότητας φοιτητών/τριων και προσωπικού προς εκπαιδευτικά ιδρύματα και οργανισμούς της Ευρώπης. Από το 2014, μετονομάστηκε σε Erasmus+ — το πρόγραμμα της Ευρωπαϊκής Ένωσης για την Εκπαίδευση, την Κατάρτιση, τη Νεολαία και τον Αθλητισμό.', 'tpte' ); ?>
						</p>

						<h3 class="tp-erasmus-subtitle"><?php esc_html_e( 'Κατηγορίες κινητικότητας', 'tpte' ); ?></h3>
						<p><?php esc_html_e( 'Το Erasmus+ περιλαμβάνει δύο κατηγορίες κινητικότητας:', 'tpte' ); ?></p>
						<ul class="tp-erasmus-list">
							<li>
								<strong><?php esc_html_e( 'Κλασσική Κινητικότητα', 'tpte' ); ?></strong>
								— <?php esc_html_e( 'μετακίνηση προσωπικού ή φοιτητών/τριων σε χώρες εντός της Ευρωπαϊκής Ένωσης.', 'tpte' ); ?>
							</li>
							<li>
								<strong><?php esc_html_e( 'Διεθνής Κινητικότητα', 'tpte' ); ?></strong>
								— <?php esc_html_e( 'μετακίνηση προσωπικού ή φοιτητών/τριων σε χώρες εκτός της Ευρωπαϊκής Ένωσης.', 'tpte' ); ?>
							</li>
						</ul>

						<h3 class="tp-erasmus-subtitle"><?php esc_html_e( 'Δυνατότητες μετακίνησης', 'tpte' ); ?></h3>
						<ul class="tp-erasmus-list">
							<li><?php esc_html_e( 'Φοιτητές/τριες: για σπουδές ή για πρακτική άσκηση.', 'tpte' ); ?></li>
							<li><?php esc_html_e( 'Διδακτικό & διοικητικό προσωπικό: για επιμόρφωση.', 'tpte' ); ?></li>
							<li><?php esc_html_e( 'Διδακτικό προσωπικό: επιπλέον, για διδασκαλία.', 'tpte' ); ?></li>
						</ul>
						<p>
							<?php
							printf(
								/* translators: %s: link to the internal Erasmus+ mobility regulation PDF. */
								esc_html__( 'Οι διαδικασίες κινητικότητας φοιτητών/τριων του Ιδρύματος περιγράφονται στον %s', 'tpte' ),
								'<a href="' . esc_url( $internal_guide_url ) . '" target="_blank" rel="noopener">' . esc_html__( 'Εσωτερικό Κανονισμό Κινητικότητας του Προγράμματος Erasmus+', 'tpte' ) . '</a>.'
							);
							?>
						</p>

						<h3 class="tp-erasmus-subtitle"><?php esc_html_e( 'Εισερχόμενοι/ες φοιτητές/τριες', 'tpte' ); ?></h3>
						<p>
							<?php esc_html_e( 'Το Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας ενθαρρύνει φοιτητές/τριες και προσωπικό άλλων ιδρυμάτων και οργανισμών να το επισκεφθούν καθ’ όλη τη διάρκεια του έτους.', 'tpte' ); ?>
						</p>
						<p>
							<?php
							printf(
								/* translators: %s: link to the Erasmus+ incoming-students course catalogue PDF. */
								esc_html__( 'Τα μαθήματα που προσφέρονται για το ακαδημαϊκό έτος 2025-2026 περιλαμβάνονται στον %s', 'tpte' ),
								'<a href="' . esc_url( $course_catalog_url ) . '" target="_blank" rel="noopener">' . esc_html__( 'Κατάλογο Μαθημάτων για Εισερχόμενους/ες Φοιτητές/τριες μέσω Erasmus+', 'tpte' ) . '</a>.'
							);
							?>
						</p>

						<p class="tp-erasmus-note">
							<?php esc_html_e( 'Για περισσότερες πληροφορίες απευθυνθείτε στην Τμηματικά Υπεύθυνη του Προγράμματος.', 'tpte' ); ?>
						</p>

					</div>
				</div>
				<div class="col-lg-3">
					<?php get_template_part( 'template-parts/sidebar', 'erasmus' ); ?>
				</div>
			</div>
		</div>
	</section>
	<!-- Erasmus+ area end -->

	<?php
endwhile;

get_footer();
