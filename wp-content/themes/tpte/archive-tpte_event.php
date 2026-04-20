<?php
/**
 * The template for displaying the Event archive.
 *
 * @package tpte
 */

get_header();
?>

<!-- event area start -->
<section class="tp-event-inner-area tp-event-inner-p pt-100 pb-100">
    <div class="container">
        <div class="row">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <?php get_template_part( 'template-parts/content', 'event-card' ); ?>
                    </div>
                    <?php
                endwhile;
            else :
                ?>
                <div class="col-12">
                    <p><?php esc_html_e( 'No events found.', 'tpte' ); ?></p>
                </div>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="tp-event-inner-pagination">
                        <div class="tp-dashboard-pagination pt-20">
                            <div class="tp-pagination">
                                <nav>
                                    <?php echo $pagination; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        endif;
        ?>
    </div>
</section>
<!-- event area end -->

<?php
get_footer();
