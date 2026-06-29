<?php
/**
 * The template for displaying the Announcements archive.
 *
 * Lists undergraduate announcements (9 per page, newest first — see
 * tpte_order_announcement_archive) as download rows, with a sidebar linking out to the
 * Masters programmes' own announcements pages. Each announcement is a PDF; the row's
 * title and download button point straight to it (no single detail view).
 *
 * @package tpte
 */

get_header();

$tp_theme_uri = get_template_directory_uri();
?>

<!-- announcements breadcrumb start -->
<section class="tp-breadcrumb__area pt-160 pb-150 p-relative z-index-1 fix">
	<div class="tp-breadcrumb__bg overlay" data-background="<?php echo esc_url( $tp_theme_uri ); ?>/assets/img/breadcrumb/tpte-building-full.png"></div>
	<div class="container">
		<div class="row align-items-center">
			<div class="col-sm-12">
				<div class="tp-breadcrumb__content">
					<div class="tp-breadcrumb__list inner-after">
						<span class="white"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M8.07207 0C8.19331 0 8.31107 0.0404348 8.40664 0.114882L16.1539 6.14233L15.4847 6.98713L14.5385 6.25079V12.8994C14.538 13.1843 14.4243 13.4574 14.2225 13.6589C14.0206 13.8604 13.747 13.9738 13.4616 13.9743H2.69231C2.40688 13.9737 2.13329 13.8603 1.93146 13.6588C1.72962 13.4573 1.61597 13.1843 1.61539 12.8994V6.2459L0.669148 6.98235L0 6.1376L7.7375 0.114882C7.83308 0.0404348 7.95083 0 8.07207 0ZM8.07694 1.22084L2.69231 5.40777V12.8994H13.4616V5.41341L8.07694 1.22084Z" fill="currentColor"/>
						</svg></a></span>
						<span class="white"><?php esc_html_e( 'Ανακοινώσεις', 'tpte' ); ?></span>
					</div>
					<h3 class="tp-breadcrumb__title color"><?php esc_html_e( 'Ανακοινώσεις', 'tpte' ); ?></h3>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- announcements breadcrumb end -->

<!-- announcements area start -->
<section class="tp-blog-standard-area bg-gray p-relative pt-100 pb-120">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="tp-postbox-wrapper">
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							get_template_part( 'template-parts/content', 'announcement' );
						endwhile;
					else :
						?>
						<p><?php esc_html_e( 'Δεν υπάρχουν ανακοινώσεις αυτήν την περίοδο.', 'tpte' ); ?></p>
						<?php
					endif;
					?>
				</div>
				<?php
				$pagination = paginate_links( array(
					'type'      => 'list',
					'prev_text' => '<svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.00017 6.77879L14 6.77879" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M6.24316 11.9999L0.999899 6.77922L6.24316 1.55762" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>',
					'next_text' => '<svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.9998 6.77883L1 6.77883" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M8.75684 1.55767L14.0001 6.7784L8.75684 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>',
				) );

				if ( $pagination ) :
					?>
					<div class="tp-event-inner-pagination tp-postbox-item-pagination">
						<div class="tp-dashboard-pagination">
							<div class="tp-pagination">
								<nav>
									<?php echo $pagination; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
								</nav>
							</div>
						</div>
					</div>
					<?php
				endif;
				?>
			</div>
			<div class="col-lg-4">
				<?php get_template_part( 'template-parts/sidebar', 'announcements' ); ?>
			</div>
		</div>
	</div>
</section>
<!-- announcements area end -->

<?php
get_footer();
