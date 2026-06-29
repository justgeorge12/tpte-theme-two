<?php
/**
 * Template Name: Postgraduate Programmes
 * Template Post Type: page
 *
 * Μεταπτυχιακά Προγράμματα Σπουδών.
 *
 * Based on the Acadia "university-schedule" layout (breadcrumb + plan-area),
 * but without the contact form. Reuses the template's .tp-plan-4-wrap section
 * verbatim: hovering a box swaps the section's full-bleed background picture
 * (the existing hover JS in assets/js/src/main.js toggles .active on
 * mouseenter). Each box links out to that programme's own website.
 *
 * @package tpte
 */

get_header();

while ( have_posts() ) :
	the_post();
	$tp_theme_uri = get_template_directory_uri();

	$masters = array(
		array(
			'title' => __( 'Πολιτισμική Πληροφορική και Επικοινωνία', 'tpte' ),
			'url'   => 'https://ci.aegean.gr/',
			'thumb' => 'masters/dpms-ci.jpg',
		),
		array(
			'title' => __( 'Διαχείριση Μνημείων: Αρχαιολογία, Πόλη και Αρχιτεκτονική', 'tpte' ),
			'url'   => 'http://www.dpmsdiax.arch.uoa.gr/',
			'thumb' => 'masters/dpms-diaxeirisi-mnimeion.jpg',
		),
		array(
			'title' => __( 'Ευφυή Συστήματα Πληροφορικής', 'tpte' ),
			'url'   => 'https://ics.aegean.gr/',
			'thumb' => 'masters/dpms-ics.jpg',
		),
		array(
			'title' => __( 'Π.Μ.Σ. Ψηφιακή Κυκλική Οικονομία', 'tpte' ),
			'url'   => 'https://3d-circular-msc.aegean.gr/',
			'thumb' => 'masters/dpms-circular.png',
		),
		array(
			'title' => __( 'Π.Μ.Σ. μέσω έρευνας — Ψηφιακή Κυκλική Οικονομία', 'tpte' ),
			'url'   => 'https://3d-circular-mres.aegean.gr/',
			'thumb' => 'masters/dpms-circular.png',
		),
	);
	?>

	<!-- postgrad hero start -->
	<section class="plan-area tp-plan-4-wrap fix tp-masters-hero p-relative">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="tp-plan-4-section tp-masters-hero-heading">
						<div class="tp-breadcrumb__list inner-after">
							<span class="white"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M8.07207 0C8.19331 0 8.31107 0.0404348 8.40664 0.114882L16.1539 6.14233L15.4847 6.98713L14.5385 6.25079V12.8994C14.538 13.1843 14.4243 13.4574 14.2225 13.6589C14.0206 13.8604 13.747 13.9738 13.4616 13.9743H2.69231C2.40688 13.9737 2.13329 13.8603 1.93146 13.6588C1.72962 13.4573 1.61597 13.1843 1.61539 12.8994V6.2459L0.669148 6.98235L0 6.1376L7.7375 0.114882C7.83308 0.0404348 7.95083 0 8.07207 0ZM8.07694 1.22084L2.69231 5.40777V12.8994H13.4616V5.41341L8.07694 1.22084Z" fill="currentColor"/>
							</svg></a></span>
							<span class="white"><?php the_title(); ?></span>
						</div>
						<h3 class="tp-plan-4-section-title"><?php the_title(); ?></h3>
					</div>
				</div>
			</div>
			<div class="row justify-content-end">
				<div class="col-lg-9">
					<div class="tp-plan-4-wrapper">
						<div class="row">
							<?php foreach ( $masters as $i => $master ) : ?>
								<div class="col-md-4">
									<div class="tp-plan-4-item<?php echo 0 === $i ? ' active' : ''; ?>">
										<div class="tp-plan-4-bg" data-background="<?php echo esc_url( $tp_theme_uri . '/assets/img/' . $master['thumb'] ); ?>"></div>
										<div class="tp-plan-4-content d-flex align-items-center justify-content-center">
											<div class="tp-plan-4-box text-center">
<!--												<span>--><?php //echo esc_html( sprintf( '%02d', $i + 1 ) ); ?><!--</span>-->
												<h4 class="tp-plan-4-title"><?php echo esc_html( $master['title'] ); ?></h4>
												<a class="tp-masters-link" href="<?php echo esc_url( $master['url'] ); ?>" target="_blank" rel="noopener noreferrer">
													<?php
													/* translators: %s programme title (for screen readers). */
													printf( '<span class="tp-masters-link-label">%s</span>', esc_html__( 'Μετάβαση στον ιστότοπο', 'tpte' ) );
													?>
													<span class="screen-reader-text"><?php echo esc_html( $master['title'] ); ?></span>
												</a>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- postgrad hero end -->

	<?php
endwhile;

get_footer();
