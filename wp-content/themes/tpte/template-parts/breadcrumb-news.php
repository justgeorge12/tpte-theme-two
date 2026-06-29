<?php
/**
 * Shared breadcrumb hero for the News section (blog list, archives, search, single post).
 *
 * Follows the theme's standard .tp-breadcrumb__area pattern (see page-phd-programme.php
 * and archive-tpte_event.php). The title and trail adapt to the current context.
 *
 * @package tpte
 */

$tp_theme_uri = get_template_directory_uri();

// Link to the blog posts page if one is set, otherwise the site home.
$posts_page_id = (int) get_option( 'page_for_posts' );
$news_url      = $posts_page_id ? get_permalink( $posts_page_id ) : home_url( '/' );

// Resolve the hero title + the trailing crumb for the current context.
if ( is_singular( 'post' ) ) {
	$news_title  = get_the_title();
	// No trailing crumb on single posts — the (often long) title is already the hero title.
	$trail_label = '';
} elseif ( is_search() ) {
	$news_title  = __( 'Αποτελέσματα αναζήτησης', 'tpte' );
	$trail_label = sprintf( '%s', get_search_query() );
} elseif ( is_category() || is_tag() || is_tax() || is_date() || is_author() ) {
	$news_title  = wp_strip_all_tags( get_the_archive_title() );
	$trail_label = $news_title;
} else {
	$news_title  = __( 'Νέα', 'tpte' );
	$trail_label = '';
}

// Hero background: a single post uses its own featured image; everything else uses
// the default News building image.
$hero_bg = $tp_theme_uri . '/assets/img/breadcrumb/tpte-building-full.png';
if ( is_singular( 'post' ) && has_post_thumbnail() ) {
	$hero_bg = get_the_post_thumbnail_url( get_the_ID(), 'full' );
}
?>
<section class="tp-breadcrumb__area pt-160 pb-150 p-relative z-index-1 fix">
	<div class="tp-breadcrumb__bg overlay" data-background="<?php echo esc_url( $hero_bg ); ?>"></div>
	<div class="container">
		<div class="row align-items-center">
			<div class="col-sm-12">
				<div class="tp-breadcrumb__content">
					<div class="tp-breadcrumb__list inner-after">
						<span class="white"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M8.07207 0C8.19331 0 8.31107 0.0404348 8.40664 0.114882L16.1539 6.14233L15.4847 6.98713L14.5385 6.25079V12.8994C14.538 13.1843 14.4243 13.4574 14.2225 13.6589C14.0206 13.8604 13.747 13.9738 13.4616 13.9743H2.69231C2.40688 13.9737 2.13329 13.8603 1.93146 13.6588C1.72962 13.4573 1.61597 13.1843 1.61539 12.8994V6.2459L0.669148 6.98235L0 6.1376L7.7375 0.114882C7.83308 0.0404348 7.95083 0 8.07207 0ZM8.07694 1.22084L2.69231 5.40777V12.8994H13.4616V5.41341L8.07694 1.22084Z" fill="currentColor"/>
						</svg></a></span>
						<span class="white"><a href="<?php echo esc_url( $news_url ); ?>"><?php esc_html_e( 'Νέα', 'tpte' ); ?></a></span>
						<?php if ( $trail_label ) : ?>
							<span class="white"><?php echo esc_html( $trail_label ); ?></span>
						<?php endif; ?>
					</div>
					<h3 class="tp-breadcrumb__title color"><?php echo esc_html( $news_title ); ?></h3>
					<?php if ( is_singular( 'post' ) ) : ?>
						<?php $bc_cats = get_the_category(); ?>
						<div class="tp-breadcrumb__meta tp-blog-stories-tag-wrap d-flex">
							<?php if ( ! empty( $bc_cats ) ) : ?>
								<a href="<?php echo esc_url( get_category_link( $bc_cats[0]->term_id ) ); ?>"><?php echo esc_html( $bc_cats[0]->name ); ?></a>
							<?php endif; ?>
							<span class="white"><?php echo esc_html( get_the_date( 'd F, Y' ) ); ?></span>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
