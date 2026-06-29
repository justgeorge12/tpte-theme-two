<?php
/**
 * tpte functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package tpte
 */

if ( ! defined( 'TPTE_VERSION' ) ) {
	// Use file modification time in development so CSS/JS changes are never stale.
	define( 'TPTE_VERSION', defined( 'WP_DEBUG' ) && WP_DEBUG ? filemtime( __FILE__ ) : '1.0.0' );
}

// Keep old constant for backward compatibility.
if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', TPTE_VERSION );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function tpte_setup() {
	/*
	 * Make theme available for translation.
	 */
	load_theme_textdomain( 'tpte', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );

	// Register navigation menus.
	register_nav_menus(
		array(
			'menu-1'        => esc_html__( 'Primary', 'tpte' ),
			'menu-top'      => esc_html__( 'Top Bar Menu', 'tpte' ),
			'menu-footer-1' => esc_html__( 'Footer About', 'tpte' ),
			'menu-footer-2' => esc_html__( 'Footer Quick Links', 'tpte' ),
			'menu-social'   => esc_html__( 'Social Links', 'tpte' ),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'tpte_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	// Add support for wide alignment.
	add_theme_support( 'align-wide' );

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );
}
add_action( 'after_setup_theme', 'tpte_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tpte_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tpte_content_width', 1200 );
}
add_action( 'after_setup_theme', 'tpte_content_width', 0 );

/**
 * Register widget area.
 */
function tpte_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'tpte' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'tpte' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget 1', 'tpte' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add footer widgets here.', 'tpte' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="tp-footer-widget-title mb-20">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget 2', 'tpte' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add footer widgets here.', 'tpte' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="tp-footer-widget-title mb-20">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'tpte_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tpte_scripts() {
	// Vendor CSS.
	wp_enqueue_style( 'tpte-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), TPTE_VERSION );
	wp_enqueue_style( 'tpte-animate', get_template_directory_uri() . '/assets/css/animate.css', array(), TPTE_VERSION );
	wp_enqueue_style( 'tpte-slick', get_template_directory_uri() . '/assets/css/slick.css', array(), TPTE_VERSION );
	wp_enqueue_style( 'tpte-swiper', get_template_directory_uri() . '/assets/css/swiper-bundle.css', array(), TPTE_VERSION );
	$hover_reveal_css  = get_template_directory() . '/assets/css/hover-reveal.css';
	$hover_reveal_cssv = file_exists( $hover_reveal_css ) ? filemtime( $hover_reveal_css ) : TPTE_VERSION;
	wp_enqueue_style( 'tpte-hover-reveal', get_template_directory_uri() . '/assets/css/hover-reveal.css', array(), $hover_reveal_cssv );
	wp_enqueue_style( 'tpte-magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), TPTE_VERSION );
	wp_enqueue_style( 'tpte-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome-pro.css', array(), TPTE_VERSION );
	wp_enqueue_style( 'tpte-spacing', get_template_directory_uri() . '/assets/css/spacing.css', array(), TPTE_VERSION );
    wp_enqueue_style('mega-menu-styles', get_template_directory_uri() . '/assets/css/mega-menu.css', array(), TPTE_VERSION );

	// Main theme stylesheet (compiled from SCSS).
	wp_enqueue_style( 'tpte-main', get_template_directory_uri() . '/assets/css/main.css', array( 'tpte-bootstrap' ), TPTE_VERSION );

	// WordPress style.css (theme metadata and custom styles).
	wp_enqueue_style( 'tpte-style', get_stylesheet_uri(), array( 'tpte-main' ), TPTE_VERSION );
	wp_style_add_data( 'tpte-style', 'rtl', 'replace' );

	// Vendor JS.
    //wp_enqueue_script('tpte-local-jquery', get_template_directory_uri() . '/assets/js/vendor/jquery.js');
	wp_enqueue_script( 'tpte-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap-bundle.js', array( 'jquery' ), TPTE_VERSION, true );
	wp_enqueue_script( 'tpte-swiper', get_template_directory_uri() . '/assets/js/swiper-bundle.js', array(), TPTE_VERSION, true );
	wp_enqueue_script( 'tpte-slick', get_template_directory_uri() . '/assets/js/slick.js', array( 'jquery' ), TPTE_VERSION, true );
	wp_enqueue_script( 'tpte-magnific-popup', get_template_directory_uri() . '/assets/js/magnific-popup.js', array( 'jquery' ), TPTE_VERSION, true );
	wp_enqueue_script( 'tpte-nice-select', get_template_directory_uri() . '/assets/js/nice-select.js', array( 'jquery' ), TPTE_VERSION, true );
	wp_enqueue_script( 'tpte-purecounter', get_template_directory_uri() . '/assets/js/purecounter.js', array(), TPTE_VERSION, true );
	wp_enqueue_script( 'tpte-wow', get_template_directory_uri() . '/assets/js/wow.js', array(), TPTE_VERSION, true );
	wp_enqueue_script( 'tpte-isotope', get_template_directory_uri() . '/assets/js/isotope-pkgd.js', array(), TPTE_VERSION, true );
	wp_enqueue_script( 'tpte-imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded-pkgd.js', array(), TPTE_VERSION, true );
	wp_enqueue_script( 'tpte-hover-reveal', get_template_directory_uri() . '/assets/js/hover-reveal.js', array(), TPTE_VERSION, true );
	wp_enqueue_script( 'tpte-tween-max', get_template_directory_uri() . '/assets/js/tween-max.js', array(), TPTE_VERSION, true );
	wp_enqueue_script( 'tpte-flatpickr', get_template_directory_uri() . '/assets/js/flatpickr.js', array(), TPTE_VERSION, true );

	// Main theme JS (bundled).
	wp_enqueue_script( 'tpte-main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery', 'tpte-bootstrap', 'tpte-swiper', 'tpte-slick' ), TPTE_VERSION, true );

	// Theme navigation JS.
	wp_enqueue_script( 'tpte-navigation', get_template_directory_uri() . '/js/navigation.js', array(), TPTE_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Localize script for AJAX.
	wp_localize_script(
		'tpte-main',
		'tpte_ajax',
		array(
			'ajax_url' => admin_url( 'admin-ajax.php' ),
			'nonce'    => wp_create_nonce( 'tpte_nonce' ),
		)
	);
	// Department Info page template assets (also used on University About for collapsible mission items).
	if ( is_page_template( 'page-department-info.php' ) || is_page_template( 'page-university-about.php' ) || is_page_template( 'page-eep.php' ) || is_page_template( 'page-eep-single.php' ) || is_page_template( 'page-edip.php' ) || is_page_template( 'page-etep.php' ) || is_page_template( 'page-ppe.php' ) || is_page_template( 'page-person-single.php' ) ) {
		wp_enqueue_style( 'tpte-department-info', get_template_directory_uri() . '/assets/css/department-info.css', array( 'tpte-main' ), TPTE_VERSION );
		wp_enqueue_script( 'tpte-department-info', get_template_directory_uri() . '/assets/js/department-info.js', array( 'tpte-bootstrap' ), TPTE_VERSION, true );
	}

	// Undergrad Programme page template — tab bar + course/prerequisite tables.
	// Also loaded on the reusable Undergrad Section template and the PhD Programme
	// template, which reuse the shared .tp-programme-* table/section styles and the
	// sidebar nav styles (.tp-undergrad-nav, .current-page, etc.).
	// Versioned by the file's own mtime so edits always bust the browser cache
	// (TPTE_VERSION tracks functions.php, not the stylesheet).
	if ( is_page_template( 'page-university-undergrad-programme.php' ) || is_page_template( 'page-undergrad-section.php' ) || is_page_template( 'page-phd-programme.php' ) ) {
		$tpte_programme_css = get_template_directory() . '/assets/css/programme.css';
		$tpte_programme_ver = file_exists( $tpte_programme_css ) ? filemtime( $tpte_programme_css ) : TPTE_VERSION;
		wp_enqueue_style( 'tpte-programme', get_template_directory_uri() . '/assets/css/programme.css', array( 'tpte-main' ), $tpte_programme_ver );
	}

	// PhD Programme page template — graduates table (is-phd variant) + search/filter
	// toolbar. Builds on tpte-programme (loaded above) for the shared table styles.
	// The filter JS is a small standalone script (not part of the main bundle).
	if ( is_page_template( 'page-phd-programme.php' ) ) {
		$tpte_phd_css = get_template_directory() . '/assets/css/phd.css';
		$tpte_phd_ver = file_exists( $tpte_phd_css ) ? filemtime( $tpte_phd_css ) : TPTE_VERSION;
		wp_enqueue_style( 'tpte-phd', get_template_directory_uri() . '/assets/css/phd.css', array( 'tpte-main', 'tpte-programme' ), $tpte_phd_ver );

		$tpte_phd_js  = get_template_directory() . '/assets/js/phd-filter.js';
		$tpte_phd_jsv = file_exists( $tpte_phd_js ) ? filemtime( $tpte_phd_js ) : TPTE_VERSION;
		wp_enqueue_script( 'tpte-phd-filter', get_template_directory_uri() . '/assets/js/phd-filter.js', array( 'jquery', 'tpte-nice-select' ), $tpte_phd_jsv, true );
	}

	// University Labs page template — tabbed labs section (reuses the
	// tp-campus-student-* component styled in main.css; tabs are pure Bootstrap).
	// Only adds small card tweaks (director line + logo sizing).
	if ( is_page_template( 'page-university-labs.php' ) ) {
		$tpte_labs_css = get_template_directory() . '/assets/css/university-labs.css';
		$tpte_labs_ver = file_exists( $tpte_labs_css ) ? filemtime( $tpte_labs_css ) : TPTE_VERSION;
		wp_enqueue_style( 'tpte-university-labs', get_template_directory_uri() . '/assets/css/university-labs.css', array( 'tpte-main' ), $tpte_labs_ver );
	}

	// Postgraduate Programmes page template — hover-reveal master's cards.
	// Versioned by the file's own mtime so edits always bust the browser cache.
	if ( is_page_template( 'page-postgrad-programmes.php' ) ) {
		$tpte_masters_css = get_template_directory() . '/assets/css/masters.css';
		$tpte_masters_ver = file_exists( $tpte_masters_css ) ? filemtime( $tpte_masters_css ) : TPTE_VERSION;
		wp_enqueue_style( 'tpte-masters', get_template_directory_uri() . '/assets/css/masters.css', array( 'tpte-main' ), $tpte_masters_ver );
	}

	// Events archive (archive-tpte_event.php) — breadcrumb hero, tab bar styling and
	// the standalone Προσεχείς/Παλαιότερες client-side filter. The single event template
	// (single-tpte_event.php) reuses the same stylesheet for its description wrapper.
	// Versioned by each file's own mtime, like phd.css/phd-filter.js.
	if ( is_post_type_archive( 'tpte_event' ) || is_singular( 'tpte_event' ) ) {
		$events_css  = get_template_directory() . '/assets/css/events.css';
		$events_cssv = file_exists( $events_css ) ? filemtime( $events_css ) : TPTE_VERSION;
		wp_enqueue_style( 'tpte-events', get_template_directory_uri() . '/assets/css/events.css', array( 'tpte-main' ), $events_cssv );
	}

	// Archive-only: the standalone Προσεχείς/Παλαιότερες client-side filter.
	if ( is_post_type_archive( 'tpte_event' ) ) {
		$events_js  = get_template_directory() . '/assets/js/event-filter.js';
		$events_jsv = file_exists( $events_js ) ? filemtime( $events_js ) : TPTE_VERSION;
		wp_enqueue_script( 'tpte-event-filter', get_template_directory_uri() . '/assets/js/event-filter.js', array( 'jquery' ), $events_jsv, true );
	}

	// Single event only: the live countdown to the event's end date. The
	// markup ([data-countdown]) is only emitted when an end date exists, so
	// the script is a no-op otherwise.
	if ( is_singular( 'tpte_event' ) ) {
		$countdown_js  = get_template_directory() . '/assets/js/countdown.js';
		$countdown_jsv = file_exists( $countdown_js ) ? filemtime( $countdown_js ) : TPTE_VERSION;
		wp_enqueue_script( 'tpte-countdown', get_template_directory_uri() . '/assets/js/countdown.js', array( 'jquery' ), $countdown_jsv, true );
	}

	// News contexts (posts page, category/tag/date/author archives, search, single post)
	// — shared blog.css tweaks (consistent category-pill colour, breadcrumb meta, etc.).
	// Versioned by file mtime like the other page-specific assets.
	$tpte_is_news = is_home() || is_singular( 'post' ) || is_search() || is_category() || is_tag() || is_tax() || is_date() || is_author();
	if ( $tpte_is_news ) {
		$blog_css  = get_template_directory() . '/assets/css/blog.css';
		$blog_cssv = file_exists( $blog_css ) ? filemtime( $blog_css ) : TPTE_VERSION;
		wp_enqueue_style( 'tpte-blog', get_template_directory_uri() . '/assets/css/blog.css', array( 'tpte-main' ), $blog_cssv );
	}

	// Single news post only — copy-to-clipboard share button.
	if ( is_singular( 'post' ) ) {
		$blog_js  = get_template_directory() . '/assets/js/blog-single.js';
		$blog_jsv = file_exists( $blog_js ) ? filemtime( $blog_js ) : TPTE_VERSION;
		wp_enqueue_script( 'tpte-blog-single', get_template_directory_uri() . '/assets/js/blog-single.js', array(), $blog_jsv, true );
	}

	// Announcements archive (archive-tpte_announcement.php) — list rows + download button.
	// Standalone CSS leaning on existing .tp-postbox-* / .tp-btn rules. Versioned by mtime.
	if ( is_post_type_archive( 'tpte_announcement' ) || is_tax( 'tpte_announcement_cat' ) ) {
		$ann_css  = get_template_directory() . '/assets/css/announcements.css';
		$ann_cssv = file_exists( $ann_css ) ? filemtime( $ann_css ) : TPTE_VERSION;
		wp_enqueue_style( 'tpte-announcements', get_template_directory_uri() . '/assets/css/announcements.css', array( 'tpte-main' ), $ann_cssv );
	}

	// Quality Assurance page template — ApexCharts for line chart.
	if ( is_page_template( 'page-quality-assurance.php' ) ) {
		wp_enqueue_style( 'tpte-apexcharts', get_template_directory_uri() . '/assets/css/apexcharts.css', array(), TPTE_VERSION );
		wp_enqueue_script( 'tpte-apexcharts', get_template_directory_uri() . '/assets/js/apexcharts.min.js', array(), TPTE_VERSION, true );
	}
}
add_action( 'wp_enqueue_scripts', 'tpte_scripts' );

/**
 * Admin assets for the Announcement PDF picker.
 *
 * Loads the Media Library + the small wp.media wiring, only on the announcement
 * add/edit screen. Versioned by file mtime like the front-end page assets.
 *
 * @param string $hook Current admin page hook suffix.
 */
function tpte_admin_announcement_scripts( $hook ) {
	if ( 'post.php' !== $hook && 'post-new.php' !== $hook ) {
		return;
	}

	$screen = get_current_screen();
	if ( ! $screen || 'tpte_announcement' !== $screen->post_type ) {
		return;
	}

	wp_enqueue_media();

	$js  = get_template_directory() . '/assets/js/admin-announcement-media.js';
	$jsv = file_exists( $js ) ? filemtime( $js ) : TPTE_VERSION;
	wp_enqueue_script( 'tpte-admin-announcement-media', get_template_directory_uri() . '/assets/js/admin-announcement-media.js', array(), $jsv, true );
}
add_action( 'admin_enqueue_scripts', 'tpte_admin_announcement_scripts' );

/**
 * Reusable "Πρόγραμμα Μαθημάτων ανά εξάμηνο" content styles.
 *
 * Styles core Details + Table blocks placed inside a .tp-programme-content
 * container so the semester-accordion look from the Undergrad Programme page
 * can be authored in the block editor. Hooked on enqueue_block_assets so it
 * loads both on the front end and inside the editor canvas; scoped under the
 * container class so it never affects other content. Versioned by file mtime.
 */
function tpte_programme_content_styles() {
	$css_path = get_template_directory() . '/assets/css/programme-content.css';
	$css_ver  = file_exists( $css_path ) ? filemtime( $css_path ) : TPTE_VERSION;
	wp_enqueue_style( 'tpte-programme-content', get_template_directory_uri() . '/assets/css/programme-content.css', array(), $css_ver );
}
add_action( 'enqueue_block_assets', 'tpte_programme_content_styles' );

/**
 * Default social links fallback.
 */
function tpte_default_social_links() {
	?>
	<a class="social-fb" href="#"><i class="fa-brands fa-facebook-f"></i></a>
	<a class="social-twit" href="#"><i class="fa-brands fa-twitter"></i></a>
	<a class="social-lnkd" href="#"><i class="fa-brands fa-linkedin-in"></i></a>
	<a class="social-yout" href="#"><i class="fa-brands fa-youtube"></i></a>
	<?php
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Custom Nav Walker for mega menus (if class exists).
 */
require_once get_template_directory() . '/inc/class-mega-menu-walker.php';

/**
 * Custom post types and meta boxes.
 */
require get_template_directory() . '/inc/post-types.php';

/**
 * Custom image sizes for events and blog.
 */
function tpte_custom_image_sizes() {
	add_image_size( 'tpte-event-card', 1200, 750, true );
	add_image_size( 'tpte-blog-list', 350, 260, true );
	add_image_size( 'tpte-blog-card', 555, 340, true );
}
add_action( 'after_setup_theme', 'tpte_custom_image_sizes' );

/**
 * Register blog sidebar widget area.
 */
function tpte_register_blog_sidebar() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'tpte' ),
		'id'            => 'sidebar-blog',
		'description'   => __( 'Widgets for blog sidebar.', 'tpte' ),
		'before_widget' => '<div id="%1$s" class="tp-sidebar-widget mb-50 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="tp-sidebar-widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'tpte_register_blog_sidebar' );

/**
 * Preload key assets for performance.
 */
function tpte_preload_assets() {
	// Preload fonts.
	echo '<link rel="preload" href="' . esc_url( get_template_directory_uri() ) . '/assets/fonts/fa-brands-400.woff2" as="font" type="font/woff2" crossorigin>' . "\n";
	echo '<link rel="preload" href="' . esc_url( get_template_directory_uri() ) . '/assets/fonts/fa-solid-900.woff2" as="font" type="font/woff2" crossorigin>' . "\n";
}
add_action( 'wp_head', 'tpte_preload_assets', 1 );

/**
 * Remove jQuery migrate for performance.
 *
 * @param WP_Scripts $scripts WP_Scripts object.
 */

function tpte_remove_jquery_migrate( $scripts ) {
	if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
		$script = $scripts->registered['jquery'];
		if ( $script->deps ) {
			$script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
		}
	}
}
add_action( 'wp_default_scripts', 'tpte_remove_jquery_migrate' );

/**
 * Custom search form.
 *
 * @param string $form Search form HTML.
 * @return string Modified search form HTML.
 */
function tpte_custom_search_form( $form ) {
	$form = '<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
		<div class="search p-relative">
			<input type="search" class="search-input" placeholder="' . esc_attr__( 'What are you looking for?', 'tpte' ) . '" value="' . get_search_query() . '" name="s" />
			<button type="submit" class="tp-search-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
					<path d="M13.3989 13.4001L16.9989 17.0001" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M15.3999 8.2001C15.3999 4.22366 12.1764 1.00012 8.19997 1.00012C4.22354 1.00012 1 4.22366 1 8.2001C1 12.1765 4.22354 15.4001 8.19997 15.4001C12.1764 15.4001 15.3999 12.1765 15.3999 8.2001Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
				</svg>
			</button>
		</div>
	</form>';
	return $form;
}
add_filter( 'get_search_form', 'tpte_custom_search_form' );