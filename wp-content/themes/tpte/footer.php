<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tpte
 */

?>

	</main><!-- #primary -->

	<!-- footer-area-start -->
	<footer id="colophon" class="site-footer" style="background:rgba(0, 19, 64, .8)">
		<div class="tp-footer-main pt-80 pb-55">
			<div class="container">
				<div class="row">
					<div class="col-xl-4 col-lg-3 col-sm-6">
						<div class="tp-footer-widget tp-footer-col-1 mb-30">
							<div class="tp-footer-widget-logo mb-20">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
									<?php if ( has_custom_logo() ) : ?>
										<?php the_custom_logo(); ?>
									<?php else : ?>
										<img width="150" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/logo/tpte-logo.png" alt="<?php bloginfo( 'name' ); ?>">
									<?php endif; ?>
								</a>
							</div>
							<div class="tp-footer-widget-content">
								<p><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
							</div>
							<div class="tp-footer-contact">
								<span><?php esc_html_e( 'Got Questions? Call us', 'tpte' ); ?></span>
								<a href="tel:+67041390762">+670 413 90 762</a>
							</div>
							<div class="tp-footer-contact-mail">
								<a href="mailto:info@tpte.com">
									<span>
										<svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M1 5C1 2.2 2.6 1 5 1H13C15.4 1 17 2.2 17 5V10.6C17 13.4 15.4 14.6 13 14.6H5" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M13 5.40039L10.496 7.40015C9.672 8.05607 8.32 8.05607 7.496 7.40015L5 5.40039" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M1 11.4004H5.8" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M1 8.19922H3.4" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
									</span>
									info@tpte.com
								</a>
							</div>
						</div>
					</div>
					<div class="col-xl-2 col-lg-3 col-sm-6">
						<div class="tp-footer-widget tp-footer-col-2 mb-30">
							<h4 class="tp-footer-widget-title mb-20"><?php esc_html_e( 'About', 'tpte' ); ?></h4>
							<div class="tp-footer-widget-link">
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'menu-footer-1',
										'menu_id'        => 'footer-menu-1',
										'container'      => false,
										'fallback_cb'    => false,
										'depth'          => 1,
									)
								);
								?>
							</div>
						</div>
					</div>
					<div class="col-xl-2 col-lg-2 col-sm-4">
						<div class="tp-footer-widget tp-footer-col-3 mb-30">
							<h4 class="tp-footer-widget-title mb-20"><?php esc_html_e( 'Quick links', 'tpte' ); ?></h4>
							<div class="tp-footer-widget-link">
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'menu-footer-2',
										'menu_id'        => 'footer-menu-2',
										'container'      => false,
										'fallback_cb'    => false,
										'depth'          => 1,
									)
								);
								?>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-sm-8">
						<div class="p-footer-widget tp-footer-col-4 mb-30">
							<h4 class="tp-footer-widget-title mb-20"><?php esc_html_e( 'Our Newsletter', 'tpte' ); ?></h4>
							<div class="tp-footer-newsletter-wrap">
								<p><?php esc_html_e( 'Enter your email and we\'ll send you more information', 'tpte' ); ?></p>
								<form action="#" method="post" class="newsletter-form">
									<div class="tp-footer-newsletter-wrapper mb-30">
										<div class="tp-footer-newsletter-input">
											<input type="email" name="email" placeholder="<?php esc_attr_e( 'Your email', 'tpte' ); ?>" required>
										</div>
										<div class="tp-footer-newsletter-submit">
											<button type="submit" class="tp-btn"><?php esc_html_e( 'Subscribe', 'tpte' ); ?></button>
										</div>
									</div>
								</form>
								<div class="tp-footer-newsletter-social">
									<?php
									wp_nav_menu(
										array(
											'theme_location' => 'menu-social',
											'menu_id'        => 'footer-social-menu',
											'container'      => false,
											'fallback_cb'    => 'tpte_default_social_links',
											'depth'          => 1,
											'items_wrap'     => '%3$s',
										)
									);
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="tp-footer-bottom" style="background:rgba(0, 19, 64, .8)">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="tp-footer-copyright text-center">
							<span>
								<?php
								printf(
									/* translators: 1: Copyright year, 2: Site name link, 3: Developer link */
									wp_kses(
										__( '&copy; %1$s %2$s. Developed by %3$s. All rights reserved.', 'tpte' ),
										array( 'a' => array( 'href' => array() ) )
									),
									esc_html( gmdate( 'Y' ) ),
									'<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>',
									'<a href="' . esc_url( 'mailto:george@georgiou.dev' ) . '">GG</a>'
								);
								?>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- footer-area-end -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>