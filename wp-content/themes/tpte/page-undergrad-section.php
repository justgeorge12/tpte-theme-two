<?php
/**
 * Template Name: Undergrad Section
 * Template Post Type: page
 *
 * Reusable undergraduate "Σπουδές" section page. The body is authored in the
 * WordPress block editor (the_content()) and rendered inside the same
 * .tp-course-requrement-* shell used by page-undergrad-gen.php. The shared
 * undergraduate sidebar (template-parts/sidebar-undergrad.php) resolves the
 * section navigation by slug; the per-page "Χρήσιμα Αρχεία" list comes from the
 * 'tpte_useful_files' post-meta (managed by the meta box in inc/post-types.php).
 *
 * @package tpte
 */

get_header();

while ( have_posts() ) :
	the_post();
	$tp_theme_uri = get_template_directory_uri();

	// Per-page useful files, edited in wp-admin and passed to the shared sidebar.
	$useful_files = get_post_meta( get_the_ID(), 'tpte_useful_files', true );
	$useful_files = is_array( $useful_files ) ? $useful_files : array();
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
							<span class="white"><?php esc_html_e( 'Προπτυχιακές Σπουδές', 'tpte' ); ?></span>
							<span class="white"><?php the_title(); ?></span>
						</div>
						<h3 class="tp-breadcrumb__title color"><?php the_title(); ?></h3>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- breadcrumb end -->


	<!-- Undergrad section area start -->
	<section class="tp-course-requrement-area grey-bg pt-100 pb-80">
		<div class="container">
			<div class="row">
				<div class="col-lg-9">
					<div class="tp-course-requrement-wrapper">
						<?php the_content(); ?>
					</div>
				</div>
				<div class="col-lg-3">
					<?php
					get_template_part(
						'template-parts/sidebar',
						'undergrad',
						array(
							'useful_files' => $useful_files,
						)
					);
					?>
				</div>
			</div>
		</div>
	</section>
	<!-- Undergrad section area end -->

	<?php
endwhile;

get_footer();
