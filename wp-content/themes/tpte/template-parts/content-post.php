<?php
/**
 * Template part for displaying single blog posts.
 *
 * @package tpte
 */

$categories = get_the_category();
$cat_name   = ! empty( $categories ) ? $categories[0]->name : '';

get_template_part( 'template-parts/breadcrumb', 'news' );
?>

<div class="tp-blog-details-p p-relative pt-80 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="tp-postbox-wrapper">
                    <div class="tp-postbox-details-text">
                        <?php the_content(); ?>
                    </div>

                    <?php
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tpte' ),
                        'after'  => '</div>',
                    ) );
                    ?>

                    <?php
                    $share_url   = rawurlencode( get_permalink() );
                    $share_title = rawurlencode( get_the_title() );
                    ?>
                    <div class="tp-postbox-details-share mb-50">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <div class="tagcloud tp-postbox-details-tag">
                                    <?php the_tags( '', '' ); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="tp-postbox-details-social text-start text-md-end">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_attr( $share_url ); ?>" target="_blank" rel="noopener" aria-label="<?php esc_attr_e( 'Κοινοποίηση στο Facebook', 'tpte' ); ?>"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a href="https://twitter.com/intent/tweet?url=<?php echo esc_attr( $share_url ); ?>&text=<?php echo esc_attr( $share_title ); ?>" target="_blank" rel="noopener" aria-label="<?php esc_attr_e( 'Κοινοποίηση στο X', 'tpte' ); ?>"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="#" class="tp-postbox-copy-link" data-copy-url="<?php echo esc_url( get_permalink() ); ?>" aria-label="<?php esc_attr_e( 'Αντιγραφή συνδέσμου', 'tpte' ); ?>"><i class="fa-solid fa-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    $prev_post = get_previous_post();
                    $next_post = get_next_post();

                    if ( $prev_post || $next_post ) :
                        ?>
                        <div class="tp-postbox-details-navigation mb-60">
                            <div class="row align-items-center">
                                <div class="col-xl-5 col-lg-5 col-md-5 col-12">
                                    <?php if ( $prev_post ) : ?>
                                        <div class="tp-postbox-details-navigation-content text-start">
                                            <a class="tp-postbox-details-navigation-btn" href="<?php echo esc_url( get_permalink( $prev_post ) ); ?>">
                                                <span><svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 1.5L1 5.5L5 9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg></span><?php esc_html_e( 'ΠΡΟΗΓΟΥΜΕΝΟ', 'tpte' ); ?></a>
                                            <h4 class="tp-postbox-details-navigation-title"><a href="<?php echo esc_url( get_permalink( $prev_post ) ); ?>"><?php echo esc_html( get_the_title( $prev_post ) ); ?></a></h4>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-2 col-12"></div>
                                <div class="col-xl-5 col-lg-5 col-md-5 col-12">
                                    <?php if ( $next_post ) : ?>
                                        <div class="tp-postbox-details-navigation-content next text-start text-md-end">
                                            <a class="tp-postbox-details-navigation-btn" href="<?php echo esc_url( get_permalink( $next_post ) ); ?>"><?php esc_html_e( 'ΕΠΟΜΕΝΟ', 'tpte' ); ?>
                                                <span><svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 1.5L5 5.5L1 9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg></span></a>
                                            <h4 class="tp-postbox-details-navigation-title"><a href="<?php echo esc_url( get_permalink( $next_post ) ); ?>"><?php echo esc_html( get_the_title( $next_post ) ); ?></a></h4>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>




                </div>
            </div>
            <div class="col-lg-4">
                <?php get_template_part( 'template-parts/sidebar', 'blog' ); ?>
            </div>
        </div>
    </div>
</div>

<?php
// Σχετικά νέα — posts from the same category, newest first. Section renders only if any exist.
$related_args = array(
    'post_type'           => 'post',
    'posts_per_page'      => 3,
    'post__not_in'        => array( get_the_ID() ),
    'ignore_sticky_posts' => true,
    'no_found_rows'       => true,
);

if ( ! empty( $categories ) ) {
    $related_args['category__in'] = wp_list_pluck( $categories, 'term_id' );
}

$related_query = new WP_Query( $related_args );

if ( $related_query->have_posts() ) :
    ?>
    <section class="tp-postbox-details-bottom p-relative pt-90 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="tp-postbox-details-bottom-title"><?php esc_html_e( 'Σχετικά νέα', 'tpte' ); ?></h3>
                </div>
                <?php
                while ( $related_query->have_posts() ) :
                    $related_query->the_post();
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <?php get_template_part( 'template-parts/content', 'blog-related' ); ?>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>
    <?php
endif;
?>
