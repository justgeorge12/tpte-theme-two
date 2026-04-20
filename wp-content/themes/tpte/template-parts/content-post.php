<?php
/**
 * Template part for displaying single blog posts.
 *
 * @package tpte
 */

$categories = get_the_category();
$cat_name   = ! empty( $categories ) ? $categories[0]->name : '';
?>

<div class="tp-blog-details-p p-relative pt-80 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tp-blog-details-wrap">
                    <?php if ( $cat_name ) : ?>
                        <div class="tp-blog-stories-tag-wrap">
                            <a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ); ?>"><?php echo esc_html( $cat_name ); ?></a>
                        </div>
                    <?php endif; ?>
                    <h3 class="tp-blog-details-title"><?php the_title(); ?></h3>
                    <div class="tp-blog-details-user d-flex justify-content-between">
                        <div class="tp-blog-details-user-box">
                            <span><?php echo get_avatar( get_the_author_meta( 'ID' ), 30 ); ?> <?php echo esc_html( get_the_author() ); ?></span>
                            <span><?php echo esc_html( get_the_date( 'F d, Y' ) ); ?></span>
                        </div>
                    </div>
                </div>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="tp-blog-details-thumb mb-80">
                        <?php the_post_thumbnail( 'full' ); ?>
                    </div>
                <?php endif; ?>
            </div>

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

                    <div class="tp-postbox-details-share mb-50">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <div class="tagcloud tp-postbox-details-tag">
                                    <?php the_tags( '', '' ); ?>
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
                                                </svg></span><?php esc_html_e( 'PREVIOUS', 'tpte' ); ?></a>
                                            <h4 class="tp-postbox-details-navigation-title"><a href="<?php echo esc_url( get_permalink( $prev_post ) ); ?>"><?php echo esc_html( get_the_title( $prev_post ) ); ?></a></h4>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-2 col-12"></div>
                                <div class="col-xl-5 col-lg-5 col-md-5 col-12">
                                    <?php if ( $next_post ) : ?>
                                        <div class="tp-postbox-details-navigation-content next text-start text-md-end">
                                            <a class="tp-postbox-details-navigation-btn" href="<?php echo esc_url( get_permalink( $next_post ) ); ?>"><?php esc_html_e( 'Next', 'tpte' ); ?>
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
