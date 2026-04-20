<?php
/**
 * Template part for displaying the blog sidebar.
 *
 * @package tpte
 */
?>
<div class="tp-sidebar-wrapper pl-55">
    <?php if ( is_active_sidebar( 'sidebar-blog' ) ) : ?>
        <?php dynamic_sidebar( 'sidebar-blog' ); ?>
    <?php else : ?>
        <div class="tp-sidebar-widgets mb-50">
            <div class="tp-sidebar-content">
                <div class="tp-sidebar-search p-relative">
                    <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
                        <input type="text" name="s" placeholder="<?php esc_attr_e( 'Search...', 'tpte' ); ?>" value="<?php echo get_search_query(); ?>">
                        <button class="tp-sidebar-search-btn" type="submit">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                    <path d="M13.3994 13.4004L16.9995 17.0005" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M15.3999 8.20019C15.3999 4.22363 12.1763 1 8.1997 1C4.22314 1 0.999512 4.22363 0.999512 8.20019C0.999512 12.1767 4.22314 15.4004 8.1997 15.4004C12.1763 15.4004 15.3999 12.1767 15.3999 8.20019Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="tp-sidebar-widget mb-50">
            <div class="tp-sidebar-content">
                <h5 class="tp-sidebar-widget-title"><?php esc_html_e( 'Categories', 'tpte' ); ?></h5>
                <ul>
                    <?php
                    wp_list_categories( array(
                        'title_li'   => '',
                        'show_count' => true,
                    ) );
                    ?>
                </ul>
            </div>
        </div>
        <div class="tp-sidebar-widget mb-50">
            <h5 class="tp-sidebar-widget-title"><?php esc_html_e( 'Recent Posts', 'tpte' ); ?></h5>
            <?php
            $recent = new WP_Query( array(
                'post_type'      => 'post',
                'posts_per_page' => 3,
                'no_found_rows'  => true,
            ) );
            while ( $recent->have_posts() ) :
                $recent->the_post();
                $r_cats    = get_the_category();
                $r_cat     = ! empty( $r_cats ) ? $r_cats[0]->name : '';
                ?>
                <div class="tp-recent-post-content">
                    <?php if ( $r_cat ) : ?>
                        <span class="tp-recent-post-span"><?php echo esc_html( $r_cat ); ?></span>
                    <?php endif; ?>
                    <h5 class="tp-recent-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                    <div class="tp-recent-post-tag">
                        <span><?php echo esc_html( get_the_date( 'd F, Y' ) ); ?></span>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
        <div class="tp-sidebar-widget mb-50">
            <div class="tp-sidebar-content">
                <h5 class="tp-sidebar-widget-title"><?php esc_html_e( 'Tags', 'tpte' ); ?></h5>
                <div class="tagcloud">
                    <?php wp_tag_cloud( array( 'smallest' => 13, 'largest' => 13, 'unit' => 'px' ) ); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
