<?php
/**
 * Template Name: Undergrad Gen
 * Template Post Type: page
 *
 * General undergraduate page template converted from university-requirements.html.
 * Uses the shared undergraduate sidebar (template-parts/sidebar-undergrad.php).
 *
 * @package tpte
 */

get_header();

while ( have_posts() ) :
	the_post();
	$tp_theme_uri = get_template_directory_uri();

	// Reusable bullet icon used for each requirement course item.
	$bullet_icon = '<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="13" viewBox="0 0 16 13" fill="none">
		<path d="M1.92006 3.56018H0.64002C0.286729 3.56018 0 3.75123 0 3.98739V10.8142C0 11.0494 0.286729 11.2404 0.64002 11.2404H1.92006C2.27335 11.2404 2.56008 11.0494 2.56008 10.8132V3.98643C2.56008 3.75123 2.27335 3.56018 1.92006 3.56018Z" fill="#161613"/>
		<path d="M10.4462 10.19C10.4462 9.95097 10.3866 9.72544 10.2815 9.52751C10.6581 9.27232 10.9057 8.84094 10.9057 8.35196C10.9057 8.11257 10.8464 7.88698 10.7416 7.68911C11.1179 7.43387 11.3652 7.00268 11.3652 6.51396C11.3652 6.36811 11.3432 6.2274 11.3023 6.09495H14.0818C14.8633 6.09495 15.5008 5.45754 15.5008 4.67595C15.5008 3.89435 14.8633 3.25694 14.0818 3.25694H8.70373L8.98679 3.03179C9.61071 2.54701 9.70937 1.65176 9.21681 1.04119C8.73502 0.423294 7.84836 0.320604 7.23789 0.804966L2.76642 3.94416L2.55371 4.09349V4.35338V10.4721V10.6598L2.6772 10.8011C3.10105 11.2862 3.72517 11.609 4.43222 11.609H9.02723C9.80883 11.609 10.4462 10.9716 10.4462 10.19Z" stroke="#161613"/>
	</svg></span>';

	// Reusable file icon used for each program worksheet item.
	$file_icon = '<span><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
		<path opacity="0.4" d="M15.3 6.9615H12.8435C10.829 6.9615 9.1885 5.321 9.1885 3.3065V0.85C9.1885 0.3825 8.806 0 8.3385 0H4.7345C2.1165 0 0 1.7 0 4.7345V12.2655C0 15.3 2.1165 17 4.7345 17H11.4155C14.0335 17 16.15 15.3 16.15 12.2655V7.8115C16.15 7.344 15.7675 6.9615 15.3 6.9615Z" fill="#292D32"/>
		<path d="M11.3055 0.178445C10.957 -0.170055 10.3535 0.0679453 10.3535 0.552445V3.51894C10.3535 4.75994 11.4075 5.78845 12.691 5.78845C13.4985 5.79695 14.6205 5.79695 15.581 5.79695C16.0655 5.79695 16.3205 5.22745 15.9805 4.88745C14.7565 3.65495 12.5635 1.43645 11.3055 0.178445Z" fill="#292D32"/>
		<path d="M9.3498 9.98765H4.2498C3.9013 9.98765 3.6123 9.69865 3.6123 9.35015C3.6123 9.00165 3.9013 8.71265 4.2498 8.71265H9.3498C9.6983 8.71265 9.9873 9.00165 9.9873 9.35015C9.9873 9.69865 9.6983 9.98765 9.3498 9.98765Z" fill="#292D32"/>
		<path d="M7.6498 13.3875H4.2498C3.9013 13.3875 3.6123 13.0985 3.6123 12.75C3.6123 12.4015 3.9013 12.1125 4.2498 12.1125H7.6498C7.9983 12.1125 8.2873 12.4015 8.2873 12.75C8.2873 13.0985 7.9983 13.3875 7.6498 13.3875Z" fill="#292D32"/>
	</svg></span>';
	?>

	<!-- breadcrumb start -->
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
							<span class="white"><?php esc_html_e( 'Academics', 'tpte' ); ?></span>
							<span class="white"><?php the_title(); ?></span>
						</div>
						<h3 class="tp-breadcrumb__title color"><?php the_title(); ?></h3>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- breadcrumb end -->


	<!-- Course Requirements area start -->
	<section class="tp-course-requrement-area grey-bg pt-100 pb-80">
		<div class="container">
			<div class="row">
				<div class="col-lg-9">
					<div class="tp-course-requrement-wrapper">
						<div class="tp-course-requrement-heading">
							<h3 class="tp-course-requrement-title"><?php esc_html_e( 'Degree Requirements', 'tpte' ); ?></h3>
							<p><?php esc_html_e( "The B.Sc. Program in Computer Science & Engineering (CSE) is designed to produce skilled graduates in the field to satisfy the growing demands of computer engineering graduates in the home and abroad. It provides the students an opportunity to obtain the broad knowledge of Computer Science, Computer Engineering with the freedom to tailor the program according to the student's individual needs. Students are responsible for reading course descriptions when choosing classes for their self-designed major. If they choose a class that requires permissionbecause of prerequisites and/or is a course at another college within Acadia University", 'tpte' ); ?></p>
							<p><?php esc_html_e( 'any of the graduate programs, they must seek permission using the proper procedures. Requesting permission is not a guarantee of being granted permission', 'tpte' ); ?></p>
						</div>
						<div class="tp-course-requrement-heading-2">
							<h3 class="tp-course-requrement-title"><?php esc_html_e( 'Major Requirements (32 units)', 'tpte' ); ?></h3>

							<?php
							$requirement_groups = array(
								array(
									'title' => __( 'Microeconomic Foundations (4 units)', 'tpte' ),
									'note'  => __( 'Students must take at least four units of coursework in this category.', 'tpte' ),
									'items' => array(
										__( 'CSE-112 – Software Engineering (Theory)', 'tpte' ),
										__( 'CSE-113 – Programming and Problem Solving (Theory & lab)', 'tpte' ),
										__( 'CSE-114 – Data Communication (Theory)', 'tpte' ),
									),
								),
								array(
									'title' => __( 'Microeconomic Foundations (4 units)', 'tpte' ),
									'note'  => __( 'Students must take at least four units of coursework in this category.', 'tpte' ),
									'items' => array(
										__( 'CSE-112 – Software Engineering (Theory)', 'tpte' ),
										__( 'CSE-113 – Programming and Problem Solving (Theory & lab)', 'tpte' ),
										__( 'CSE-114 – Data Communication (Theory)', 'tpte' ),
									),
								),
							);

							foreach ( $requirement_groups as $group ) :
								?>
								<div class="tp-course-requrement-bulet">
									<h5 class="tp-course-requrement-bulet-title"><?php echo esc_html( $group['title'] ); ?></h5>
									<p><?php echo esc_html( $group['note'] ); ?></p>
									<div class="tp-course-requrement-bulet-content">
										<?php foreach ( $group['items'] as $item ) : ?>
											<p><?php echo $bullet_icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Trusted static inline SVG. ?> <?php echo esc_html( $item ); ?></p>
										<?php endforeach; ?>
									</div>
								</div>
							<?php endforeach; ?>

							<h3 class="tp-course-requrement-title"><?php esc_html_e( 'Program Worksheets', 'tpte' ); ?></h3>
							<p><?php esc_html_e( 'Here you can review useful information about Communications Studies:', 'tpte' ); ?></p>

							<?php
							$worksheets = array(
								array(
									'label' => __( '2023 - 24 Computer Science Worksheet', 'tpte' ),
									'url'   => '#',
								),
								array(
									'label' => __( '2022 - 23 Computer Science Worksheet', 'tpte' ),
									'url'   => '#',
								),
								array(
									'label' => __( 'Program worksheet', 'tpte' ),
									'url'   => '#',
								),
							);
							?>
							<div class="tp-course-requrement-bulet">
								<div class="tp-course-requrement-bulet-content">
									<?php foreach ( $worksheets as $worksheet ) : ?>
										<p><?php echo $file_icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Trusted static inline SVG. ?> <a href="<?php echo esc_url( $worksheet['url'] ); ?>"><?php echo esc_html( $worksheet['label'] ); ?></a></p>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<?php get_template_part( 'template-parts/sidebar', 'undergrad' ); ?>
				</div>
			</div>
		</div>
	</section>
	<!-- Course Requirements area end -->

	<?php
endwhile;

get_footer();
