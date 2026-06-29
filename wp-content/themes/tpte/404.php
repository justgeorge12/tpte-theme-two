<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * Greek error page styled after the theme's breadcrumb hero. Offers a search
 * box and a few safe internal links (home + the event/announcement archives,
 * resolved at runtime so they never point at a missing URL).
 *
 * Self-contained styles live in assets/css/404.css, enqueued conditionally on
 * is_404() in functions.php (scoped under .tp-error-*).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package tpte
 */

get_header();

$tp_theme_uri = get_template_directory_uri();

// Resolve internal destinations at runtime so a link never 404s itself.
// Each entry is skipped below if its URL could not be resolved.
$tp_error_links = array(
	array(
		'icon'  => 'fa-light fa-house',
		'label' => __( 'Αρχική σελίδα', 'tpte' ),
		'url'   => home_url( '/' ),
	),
	array(
		'icon'  => 'fa-light fa-calendar-days',
		'label' => __( 'Εκδηλώσεις', 'tpte' ),
		'url'   => get_post_type_archive_link( 'tpte_event' ),
	),
	array(
		'icon'  => 'fa-light fa-bullhorn',
		'label' => __( 'Ανακοινώσεις', 'tpte' ),
		'url'   => get_post_type_archive_link( 'tpte_announcement' ),
	),
	array(
		'icon'  => 'fa-light fa-newspaper',
		'label' => __( 'Νέα', 'tpte' ),
		'url'   => get_permalink( get_option( 'page_for_posts' ) ),
	),
);
?>

	<main id="primary" class="site-main">

		<!-- 404 breadcrumb / hero start -->
		<section class="tp-breadcrumb__area tp-error-hero pt-160 pb-150 p-relative z-index-1 fix">
			<div class="tp-breadcrumb__bg overlay" data-background="<?php echo esc_url( $tp_theme_uri ); ?>/assets/img/breadcrumb/tpte-building-from-top.png"></div>
			<div class="container">
				<div class="row align-items-center">
					<div class="col-sm-12">
						<div class="tp-breadcrumb__content">
							<div class="tp-breadcrumb__list inner-after">
								<span class="white"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.07207 0C8.19331 0 8.31107 0.0404348 8.40664 0.114882L16.1539 6.14233L15.4847 6.98713L14.5385 6.25079V12.8994C14.538 13.1843 14.4243 13.4574 14.2225 13.6589C14.0206 13.8604 13.747 13.9738 13.4616 13.9743H2.69231C2.40688 13.9737 2.13329 13.8603 1.93146 13.6588C1.72962 13.4573 1.61597 13.1843 1.61539 12.8994V6.2459L0.669148 6.98235L0 6.1376L7.7375 0.114882C7.83308 0.0404348 7.95083 0 8.07207 0ZM8.07694 1.22084L2.69231 5.40777V12.8994H13.4616V5.41341L8.07694 1.22084Z" fill="currentColor"/></svg></a></span>
								<span class="white"><?php esc_html_e( 'Σφάλμα 404', 'tpte' ); ?></span>
							</div>
							<h3 class="tp-breadcrumb__title color"><?php esc_html_e( 'Η σελίδα δεν βρέθηκε', 'tpte' ); ?></h3>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- 404 breadcrumb / hero end -->

		<!-- 404 content start -->
		<section class="tp-error-area grey-bg pt-120 pb-120">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-xl-8 col-lg-9">
						<div class="tp-error-content text-center">

							<div class="tp-error-code" aria-hidden="true">404</div>

							<h2 class="tp-error-title"><?php esc_html_e( 'Ουπς! Η σελίδα που ζητήσατε δεν υπάρχει.', 'tpte' ); ?></h2>

							<p class="tp-error-text">
								<?php esc_html_e( 'Η διεύθυνση μπορεί να έχει αλλάξει, να έχει διαγραφεί ή να πληκτρολογήθηκε λανθασμένα. Δοκιμάστε μια αναζήτηση ή επιστρέψτε σε μία από τις παρακάτω σελίδες.', 'tpte' ); ?>
							</p>


							<div class="tp-error-links">
								<?php foreach ( $tp_error_links as $link ) : ?>
									<?php if ( empty( $link['url'] ) ) { continue; } ?>
									<a class="tp-error-link" href="<?php echo esc_url( $link['url'] ); ?>">
										<span class="tp-error-link-icon"><i class="<?php echo esc_attr( $link['icon'] ); ?>" aria-hidden="true"></i></span>
										<span class="tp-error-link-label"><?php echo esc_html( $link['label'] ); ?></span>
									</a>
								<?php endforeach; ?>
							</div>



						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- 404 content end -->

	</main><!-- #main -->

<?php
get_footer();
