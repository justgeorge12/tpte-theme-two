<?php
/**
 * The template for displaying the blog posts page.
 *
 * WordPress uses home.php for the posts page (Settings > Reading > Posts page).
 *
 * @package tpte
 */

get_header();
?>

<!-- blog standard area -->
<section class="tp-blog-standard-area p-relative pt-100 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="tp-postbox-wrapper">
                    <?php
                    if ( have_posts() ) :
                        while ( have_posts() ) :
                            the_post();
                            get_template_part( 'template-parts/content', 'blog-list-item' );
                        endwhile;
                    else :
                        ?>
                        <p><?php esc_html_e( 'No posts found.', 'tpte' ); ?></p>
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
                <?php get_template_part( 'template-parts/sidebar', 'blog' ); ?>
            </div>
        </div>
    </div>
</section>
<!-- blog standard area end -->

<?php
get_footer();
