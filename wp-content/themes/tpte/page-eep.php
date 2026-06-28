<?php
/**
 * Template Name: EEP
 * Template Post Type: page
 *
 * Ειδικό Εκπαιδευτικό Προσωπικό (Ε.Ε.Π.) — listing page.
 * Each card links to the reusable Staff Profile template (page-person-single.php).
 * Setup: create a WP page at /staff-profile/ with the "Staff Profile" template.
 *
 * @package tpte
 */

require_once get_template_directory() . '/inc/staff-data.php';

$tp_theme_uri = get_template_directory_uri();
$single_url   = home_url( '/staff-profile/' );

get_header();

while ( have_posts() ) :
	the_post();
	?>

	<!-- breadcrumb / hero -->
	<section class="tp-breadcrumb__area pt-160 pb-150 p-relative z-index-1 fix">
		<div class="tp-breadcrumb__bg overlay" data-background="<?php echo esc_url( $tp_theme_uri ); ?>/assets/img/breadcrumb/campus-breadcrumb.jpg"></div>
		<div class="container">
			<div class="row align-items-center">
				<div class="col-sm-12">
					<div class="tp-breadcrumb__content">
						<div class="tp-breadcrumb__list inner-after">
							<span class="white"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.07207 0C8.19331 0 8.31107 0.0404348 8.40664 0.114882L16.1539 6.14233L15.4847 6.98713L14.5385 6.25079V12.8994C14.538 13.1843 14.4243 13.4574 14.2225 13.6589C14.0206 13.8604 13.747 13.9738 13.4616 13.9743H2.69231C2.40688 13.9737 2.13329 13.8603 1.93146 13.6588C1.72962 13.4573 1.61597 13.1843 1.61539 12.8994V6.2459L0.669148 6.98235L0 6.1376L7.7375 0.114882C7.83308 0.0404348 7.95083 0 8.07207 0ZM8.07694 1.22084L2.69231 5.40777V12.8994H13.4616V5.41341L8.07694 1.22084Z" fill="currentColor"/></svg></a></span>
							<span class="white"><?php the_title(); ?></span>
						</div>
						<h3 class="tp-breadcrumb__title color"><?php the_title(); ?></h3>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- EEP staff listing -->
	<section class="tp-leadership-area grey-bg pt-120 pb-100">
		<div class="container">
			<div class="row">
				<?php
				$delays = array( '.3s', '.5s', '.7s', '.9s' );
				$idx    = 0;
				foreach ( tpte_all_staff()['eep'] as $member ) :
					$delay       = $delays[ $idx % 4 ];
					$profile_url = esc_url( add_query_arg( array( 'dept' => 'eep', 'member' => $member['slug'] ), $single_url ) );
					$idx++;
				?>
				<div class="col-xl-3 col-lg-4 col-sm-6">
					<div class="tp-leadership-item mb-55 wow fadeInUp" data-wow-delay="<?php echo esc_attr( $delay ); ?>">
						<div class="tp-leadership-thumb p-relative" style="position:relative;overflow:hidden;">
							<a href="<?php echo $profile_url; ?>" style="display:block;">
								<img
									src="<?php echo esc_url( $member['photo_thumb'] ); ?>"
									alt="<?php echo esc_attr( $member['photo_alt'] ); ?>"
									onerror="this.style.display='none';this.nextElementSibling.style.display='flex';"
								>
								<div style="display:none;width:100%;aspect-ratio:3/4;background:#0071DC;color:#fff;font-size:2.5rem;font-weight:700;align-items:center;justify-content:center;">
									<?php echo esc_html( $member['initials'] ); ?>
								</div>
							</a>
							<div class="tp-leadership-hover-box d-flex justify-content-between align-items-center">
								<div class="tp-leadership-social">
									<?php if ( ! empty( $member['email'] ) ) : ?>
										<a href="mailto:<?php echo esc_attr( $member['email'] ); ?>" title="<?php echo esc_attr( $member['email'] ); ?>">
											<i class="fa-light fa-envelope"></i>
										</a>
									<?php endif; ?>
									<?php foreach ( $member['links'] as $link ) : ?>
										<a href="<?php echo esc_url( $link['url'] ); ?>" target="_blank" rel="noopener noreferrer" title="<?php echo esc_attr( $link['label'] ); ?>">
											<i class="fa-light <?php echo esc_attr( $link['icon'] ); ?>"></i>
										</a>
									<?php endforeach; ?>
								</div>
								<div class="tp-leadership-btn">
									<a href="<?php echo $profile_url; ?>">
										Προφίλ<span>
										<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
											<path d="M1.00195 9.00098L9.00195 1.00098" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M1.00195 1.00098H9.00195V9.00098" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
										</svg></span>
									</a>
								</div>
							</div>
						</div>
						<div class="tp-leadership-content">
							<span><?php echo esc_html( $member['role'] ); ?></span>
							<h4 class="tp-leadership-title">
								<a href="<?php echo $profile_url; ?>"><?php echo esc_html( $member['name'] ); ?></a>
							</h4>
							</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php
endwhile;

get_footer();
