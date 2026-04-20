<?php
/**
 * The header for tpte theme
 *
 * This is the template that displays all of the <head> section and everything up until <main>
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tpte
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- pre loader area start -->
<div id="loading">
	<div id="loading-center">
		<div id="loading-center-absolute">
			<div class="tp-preloader-content">
				<div class="tp-preloader-logo">
					<div class="tp-preloader-circle">
						<svg width="190" height="190" viewBox="0 0 380 380" fill="none" xmlns="http://www.w3.org/2000/svg">
							<circle stroke="#D9D9D9" cx="190" cy="190" r="180" stroke-width="6" stroke-linecap="round"></circle>
							<circle stroke="blue" cx="190" cy="190" r="180" stroke-width="6" stroke-linecap="round"></circle>
						</svg>
					</div>
					<img width="150" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/logo/tpte-logo.png" alt="<?php bloginfo( 'name' ); ?>">
				</div>
<!--				<p class="tp-preloader-subtitle">--><?php //esc_html_e( 'Loading...', 'tpte' ); ?><!--</p>-->
			</div>
		</div>
	</div>
</div>
<!-- pre loader area end -->

<!-- back to top start -->
<div class="back-to-top-wrapper">
	<button id="back_to_top" type="button" class="back-to-top-btn">
		<svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
		</svg>
	</button>
</div>
<!-- back to top end -->

<!-- search area start -->
<div class="tp-search-area">
	<div class="tp-search-inner p-relative">
		<div class="tp-search-close">
			<button class="tp-search-close-btn">
				<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path class="path-1" d="M11 1L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					<path class="path-2" d="M1 1L11 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
			</button>
		</div>
		<div class="container">
			<div class="row">
				<div class="tp-search-wrapper">
					<div class="col-lg-9">
						<div class="tp-search-content">
							<?php get_search_form(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- search area end -->

<!-- header-area-start -->
<header id="masthead" class="header-area tp-header-transparent p-relative site-header">
	<div class="tp-header-top theme-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 d-flex justify-content-start items-align-center">
					<div class="tp-heder-info d-flex justify-content-center justify-content-lg-start align-items-center">
<!--						<div class="tp-header-info-item d-none d-md-block">-->
<!--							<span><a href="#"><i class="fa-brands fa-facebook-f"></i></a>7500k Followers</span>-->
<!--						</div>-->
						<div class="tp-header-info-item  d-flex justify-content-center align-items-center ">
<!--							<span>-->
<!--								<a href="tel:0123456789"><i><img src="--><?php //echo esc_url( get_template_directory_uri() ); ?><!--/assets/img/icon/calling.svg" alt="phone"></i> +(402) 763 282 46</a>-->
<!--							</span>-->
                            <span style="font-size: 14px;">ΣΧΟΛΗ ΚΟΙΝΩΝΙΚΩΝ ΣΠΟΥΔΩΝ</span>
						</div>
<!--						<div class="tp-header-info-item">-->
<!--							<div class="header-bottom__lang">-->
<!--								--><?php
//								// Language switcher can be added here via plugin
//								if ( function_exists( 'pll_the_languages' ) ) {
//									pll_the_languages( array( 'dropdown' => 1 ) );
//								}
//								?>
<!--							</div>-->
<!--						</div>-->
					</div>
				</div>
				<div class="col-lg-6 col-md-6 d-none d-lg-block">
					<ul class="tp-header-right-list d-flex justify-content-md-end " style="list-style: none;">
						<?php
						wp_nav_menu(
							[
								'theme_location' => 'menu-top',
								'menu_id'        => 'top-bar',
								'container'      => true,
								'items_wrap'     => '%3$s',
								'fallback_cb'    => false,
								'depth'          => 1,
                            ]
						);
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div id="header-sticky" class="tp-header-mob-space tp-header-1">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xxl-2 col-xl-2 col-lg-6 col-md-6 col-6">
					<div class="tp-header-logo-1 tp-header-logo site-branding">
						<?php
						if ( has_custom_logo() ) :
							the_custom_logo();
						else :
							?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<img class="logo-1" style="width:160px; height: auto;" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/logo/tpte-logo.png" alt="<?php bloginfo( 'name' ); ?>">
								<img class="logo-2" style="width:135px; height: auto;" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/logo/tpte-logo.png" alt="<?php bloginfo( 'name' ); ?>">
							</a>
							<?php
						endif;
						?>
					</div>
				</div>
				<div class="col-xxl-8 col-xl-7 d-none d-xl-block">
					<nav id="site-navigation" class="main-menu text-end main-navigation tp-main-menu-content">
						<?php
						wp_nav_menu(
							array(
								'theme_location'  => 'menu-1',
								'menu_id'         => 'primary-menu',
								'container'       => false,
								'menu_class'      => '',
								'walker'          => new Mega_Menu_Walker(),
							)
						);
						?>
					</nav>
				</div>
				<div class="col-xxl-2 col-xl-3 col-lg-6 col-md-6 col-6">
					<div class="tp-header-contact d-flex align-items-center justify-content-end">
						<div class="tp-header-serach">
							<button class="tp-search-open-btn">
								<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M7.22221 13.4444C10.6586 13.4444 13.4444 10.6586 13.4444 7.22221C13.4444 3.78578 10.6586 1 7.22221 1C3.78578 1 1 3.78578 1 7.22221C1 10.6586 3.78578 13.4444 7.22221 13.4444Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									<path d="M15.0004 15L11.6171 11.6167" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</button>
						</div>
<!--						<div class="tp-header-btn d-none d-md-block ml-30">-->
<!--							<a href="--><?php //echo esc_url( get_permalink( get_page_by_path( 'apply' ) ) ); ?><!--">--><?php //esc_html_e( 'Apply Now', 'tpte' ); ?><!--</a>-->
<!--						</div>-->
						<div class="tp-header-bar d-xl-none ml-30">
							<button class="offcanvas-open-btn menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa-solid fa-bars"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<!-- header-area-end -->

<!-- offcanvas area start -->
<div class="offcanvas__area">
	<div class="offcanvas__wrapper">
		<div class="offcanvas__close">
			<button class="offcanvas__close-btn offcanvas-close-btn">
				<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M11 1L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M1 1L11 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
			</button>
		</div>
		<div class="offcanvas__content">
			<div class="offcanvas__top mb-90 d-flex justify-content-between align-items-center">
				<div class="offcanvas__logo tp-header-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/logo/logo-black.png" alt="<?php bloginfo( 'name' ); ?>">
					</a>
				</div>
			</div>
			<div class="offcanvas-main">
				<div class="offcanvas-content">
					<h3 class="offcanvas-title"><?php esc_html_e( 'Hello There!', 'tpte' ); ?></h3>
					<p><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
				</div>
				<div class="tp-main-menu-mobile d-xl-none">
					<div class="tp-mobile-menu-wrapper">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'mobile-menu',
								'container'      => false,
								'menu_class'     => '',
							)
						);
						?>
					</div>
				</div>
				<div class="offcanvas-contact">
					<h3 class="offcanvas-title sm"><?php esc_html_e( 'Information', 'tpte' ); ?></h3>
					<ul>
						<li><a href="tel:+420770001007">+ 4 20 7700 1007</a></li>
						<li><a href="mailto:hello@tpte.com">hello@tpte.com</a></li>
						<li><a href="#"><?php esc_html_e( 'Our Location', 'tpte' ); ?></a></li>
					</ul>
				</div>
				<div class="offcanvas-social">
					<h3 class="offcanvas-title sm"><?php esc_html_e( 'Follow Us', 'tpte' ); ?></h3>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-social',
							'menu_id'        => 'social-menu',
							'container'      => false,
							'fallback_cb'    => false,
							'depth'          => 1,
						)
					);
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="body-overlay"></div>
<!-- offcanvas area end -->

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'tpte' ); ?></a>

	<main id="primary" class="site-main">