<?php
/**
 * Template Name: University Admission Overview
 * Template Post Type: page
 *
 * Admissions overview page template converted from university-admission-overview.html.
 *
 * @package tpte
 */

get_header();

while ( have_posts() ) :
	the_post();
	$tp_theme_uri = get_template_directory_uri();

	// Internal links — replace with real page URLs when available.
	$financial_aid_url  = '#';
	$net_price_calc_url = '#';
	$how_to_apply_url   = '#';
	?>

	<!-- admission breadcrumb start -->
	<section class="tp-breadcrumb__area pt-160 pb-150 p-relative z-index-1 fix">
		<div class="tp-breadcrumb__bg overlay" data-background="<?php echo esc_url( $tp_theme_uri ); ?>/assets/img/breadcrumb/campus-breadcrumb.jpg"></div>
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
	<!-- admission breadcrumb end -->


	<!-- campus choose area start -->
	<section class="tp-campus-choose-area pt-120 pb-30 grey-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="tp-campus-choose-wrapper text-center">
						<div class="tp-campus-choose-btn admission wow fadeInUp" data-wow-delay=".3s">
							<p><?php esc_html_e( 'Financial Aid', 'tpte' ); ?></p>
							<a href="#down"><span>
								<svg width="20" height="123" viewBox="0 0 20 123" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M20 113C14.4726 113 9.99998 117.473 9.99998 123" stroke="#B1040E" stroke-miterlimit="10"/>
									<path d="M10 123C10 117.473 5.52736 113 -1.96429e-05 113" stroke="#B1040E" stroke-miterlimit="10"/>
									<rect x="9.5" width="1" height="120" fill="#B1040E"/>
								</svg>
							</span></a>
							<div class="tp-campus-choose-content mb-10 wow fadeInUp" data-wow-delay=".5s">
								<h2 class="tp-campus-choose-title fs-50"><?php echo wp_kses_post( __( 'At Stanford, we practice holistic admission. <br> This means that each piece in your application <br> is reviewed as part of an integrated and <br> comprehensive whole.', 'tpte' ) ); ?></h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- campus choose area end -->


	<!-- admission counter area start -->
	<section id="down" class="tp-admission-counter-area grey-bg pb-120">
		<div class="container">
			<div class="tp-admission-counter-box wow fadeInUp" data-wow-delay=".3s">
				<div class="row">
					<?php
					$counters = array(
						array(
							'duration'    => 4,
							'end'         => 126,
							'suffix'      => '',
							'desc'        => __( 'Degree & diploma programs <br> offered', 'tpte' ),
							'item_class'  => '',
							'desc_class'  => 'after',
						),
						array(
							'duration'    => 3,
							'end'         => 82,
							'suffix'      => '%',
							'desc'        => __( 'Of undergraduate students <br> receive financial aid', 'tpte' ),
							'item_class'  => 'pl-50',
							'desc_class'  => 'after',
						),
						array(
							'duration'    => 3,
							'end'         => 74,
							'suffix'      => '%',
							'desc'        => __( 'Of graduates had two or <br> more internships as students', 'tpte' ),
							'item_class'  => 'pl-80',
							'desc_class'  => '',
						),
					);
					foreach ( $counters as $counter ) :
						?>
						<div class="col-lg-4 col-md-6">
							<div class="tp-admission-counter-item<?php echo $counter['item_class'] ? ' ' . esc_attr( $counter['item_class'] ) : ''; ?>">
								<h3 class="tp-admission-counter-title">
									<span data-purecounter-duration="<?php echo esc_attr( $counter['duration'] ); ?>" data-purecounter-end="<?php echo esc_attr( $counter['end'] ); ?>" class="purecounter"><?php echo esc_html( $counter['end'] ); ?></span><?php echo esc_html( $counter['suffix'] ); ?>
								</h3>
								<p<?php echo $counter['desc_class'] ? ' class="' . esc_attr( $counter['desc_class'] ) . '"' : ''; ?>><?php echo wp_kses_post( $counter['desc'] ); ?></p>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
	<!-- admission counter area end -->


	<!-- admission area start -->
	<section class="tp-admission-overview-area grey-bg pb-130">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="tp-admission-overview-heading wow fadeInUp" data-wow-delay=".3s">
						<h3 class="tp-admission-overview-title">
							<?php esc_html_e( 'Afford Acadia', 'tpte' ); ?>
						</h3>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="tp-admission-overview-wrapper wow fadeInUp" data-wow-delay=".5s">
						<p><?php esc_html_e( 'At Acadia University, we prepare you to launch your career by providing a supportive, creative, and professional environment from which to learn practical skills, build a network of industry contacts.', 'tpte' ); ?></p>
						<p><?php echo wp_kses_post( __( 'Acadia is affordable for all admitted students. Financial aid covers all demonstrated need for all students, regardless of citizenship or citizenship status. Families making under <span>$85,000</span> a year pay nothing for their student\'s education, and families making between <span>$85,000-$150,000 pay 0-10% of their incomes.</span>', 'tpte' ) ); ?></p>
						<div class="tp-admission-overview-btn mt-50">
							<a class="tp-btn" href="<?php echo esc_url( $financial_aid_url ); ?>"><?php echo wp_kses_post( __( 'Learn more <br> About financial aid', 'tpte' ) ); ?> <span><svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
								<path d="M1 11L6 6L1 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg></span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- admission area end -->


	<!-- admission cta area start -->
	<section class="tp-admission-cta-area grey-bg pb-160">
		<div class="container">
			<div class="tp-admission-cta-box">
				<div class="row">
					<div class="col-lg-6">
						<div class="tp-admission-cta-heading wow fadeInUp" data-wow-delay=".3s">
							<h3 class="tp-admission-cta-title"><?php echo wp_kses_post( __( 'Calculate Your <br> Estimated Scholarship.', 'tpte' ) ); ?></h3>
							<p><?php echo wp_kses_post( __( 'How affordable is Harvard? See for yourself with our <br> Net Price Calculator.', 'tpte' ) ); ?></p>
							<div class="tp-admission-cta-btn">
								<a class="tp-btn" href="<?php echo esc_url( $net_price_calc_url ); ?>"><?php esc_html_e( 'Net Price Calculator', 'tpte' ); ?> <span>
									<svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
										<path d="M1 11L6 6L1 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									</svg></span>
								</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="tp-admission-cta-thumb wow fadeInUp" data-wow-delay=".5s">
							<img src="<?php echo esc_url( $tp_theme_uri ); ?>/assets/img/course/details/admisson-overview-1.jpg" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- admission cta area end -->


	<!-- admission apply area start -->
	<section class="tp-admission-apply-area grey-bg pt-40 pb-140">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="tp-admission-apply-thumb p-relative wow fadeInUp" data-wow-delay=".3s">
						<img src="<?php echo esc_url( $tp_theme_uri ); ?>/assets/img/course/details/admisson-overview-2.jpg" alt="">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="tp-admission-apply-heading wow fadeInUp" data-wow-delay=".5s">
						<h3 class="tp-admission-apply-title"><?php esc_html_e( 'Apply for 2024', 'tpte' ); ?></h3>
						<p><?php echo wp_kses_post( __( 'We’ll guide you through the Common Application <br> or Coalition Application, Powered by Scoir, and answer <br> any questions you have along the way.', 'tpte' ) ); ?></p>
						<div class="tp-admission-apply-btn">
							<a class="tp-btn" href="<?php echo esc_url( $how_to_apply_url ); ?>"><?php esc_html_e( 'How To Apply', 'tpte' ); ?>
								<span><svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
									<path d="M1 11L6 6L1 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg></span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- admission apply area end -->

	<?php
endwhile;

get_footer();
