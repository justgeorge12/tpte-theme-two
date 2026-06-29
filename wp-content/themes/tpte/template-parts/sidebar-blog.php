<?php
/**
 * Template part for displaying the blog/news sidebar.
 *
 * If the 'sidebar-blog' widget area has widgets, those are used. Otherwise a curated
 * fallback is rendered: a news-scoped search, Τελευταία νέα, Προσεχείς εκδηλώσεις
 * (only when future events exist), Κατηγορίες, and Ετικέτες (only when tags exist).
 * Every fallback widget is guarded so it never renders as an empty box.
 *
 * @package tpte
 */
?>
<div class="tp-sidebar-wrapper pl-55">
    <?php if ( is_active_sidebar( 'sidebar-blog' ) ) : ?>
        <?php dynamic_sidebar( 'sidebar-blog' ); ?>
    <?php else : ?>

        <!-- Search (news only) -->
        <div class="tp-sidebar-widgets mb-50">
            <div class="tp-sidebar-content">
                <div class="tp-sidebar-search p-relative">
                    <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
                        <input type="text" name="s" placeholder="<?php esc_attr_e( 'Αναζήτηση...', 'tpte' ); ?>" value="<?php echo get_search_query(); ?>">
                        <input type="hidden" name="post_type" value="post">
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

        <!-- Τελευταία νέα -->
        <?php
        $recent = new WP_Query( array(
            'post_type'      => 'post',
            'posts_per_page' => 3,
            'no_found_rows'  => true,
        ) );

        if ( $recent->have_posts() ) :
            ?>
            <div class="tp-sidebar-widget mb-50">
                <h5 class="tp-sidebar-widget-title"><?php esc_html_e( 'Τελευταία νέα', 'tpte' ); ?></h5>
                <?php
                while ( $recent->have_posts() ) :
                    $recent->the_post();
                    $r_cats = get_the_category();
                    $r_cat  = ! empty( $r_cats ) ? $r_cats[0]->name : '';
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
                <?php endwhile; ?>
            </div>
            <?php
            wp_reset_postdata();
        endif;
        ?>

        <!-- Προσεχείς εκδηλώσεις (only when future events exist) -->
        <?php
        $upcoming = new WP_Query( array(
            'post_type'      => 'tpte_event',
            'posts_per_page' => 3,
            'meta_key'       => '_event_start_date',
            'orderby'        => 'meta_value',
            'meta_type'      => 'DATE',
            'order'          => 'ASC',
            'no_found_rows'  => true,
            'meta_query'     => array(
                array(
                    'key'     => '_event_start_date',
                    'value'   => date( 'Y-m-d' ),
                    'compare' => '>=',
                    'type'    => 'DATE',
                ),
            ),
        ) );

        if ( $upcoming->have_posts() ) :
            ?>
            <div class="tp-sidebar-widget mb-50">
                <h5 class="tp-sidebar-widget-title"><?php esc_html_e( 'Προσεχείς εκδηλώσεις', 'tpte' ); ?></h5>
                <?php
                while ( $upcoming->have_posts() ) :
                    $upcoming->the_post();
                    $e_start = get_post_meta( get_the_ID(), '_event_start_date', true );
                    $e_loc   = get_post_meta( get_the_ID(), '_event_location', true );
                    ?>
                    <div class="tp-recent-post-content">
                        <?php if ( $e_loc ) : ?>
                            <span class="tp-recent-post-span"><?php echo esc_html( $e_loc ); ?></span>
                        <?php endif; ?>
                        <h5 class="tp-recent-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <?php if ( $e_start ) : ?>
                            <div class="tp-recent-post-tag">
                                <span><?php echo esc_html( date_i18n( 'd F, Y', strtotime( $e_start ) ) ); ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php
            wp_reset_postdata();
        endif;
        ?>

        <!-- Κατηγορίες (only when categories exist) -->
        <?php
        $blog_cats = get_categories( array( 'hide_empty' => true ) );

        if ( ! empty( $blog_cats ) ) :
            ?>
            <div class="tp-sidebar-widget mb-50">
                <div class="tp-sidebar-content">
                    <h5 class="tp-sidebar-widget-title"><?php esc_html_e( 'Κατηγορίες', 'tpte' ); ?></h5>
                    <ul>
                        <?php foreach ( $blog_cats as $blog_cat ) : ?>
                            <li>
                                <a href="<?php echo esc_url( get_category_link( $blog_cat->term_id ) ); ?>">
                                    <?php echo esc_html( $blog_cat->name ); ?>
                                    <span>(<?php echo esc_html( $blog_cat->count ); ?>)</span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <?php
        endif;
        ?>

        <!-- Ετικέτες (only when tags exist) -->
        <?php
        $tags_cloud = wp_tag_cloud( array(
            'smallest' => 13,
            'largest'  => 13,
            'unit'     => 'px',
            'echo'     => false,
        ) );

        if ( $tags_cloud ) :
            ?>
            <div class="tp-sidebar-widget mb-50">
                <div class="tp-sidebar-content">
                    <h5 class="tp-sidebar-widget-title"><?php esc_html_e( 'Ετικέτες', 'tpte' ); ?></h5>
                    <div class="tagcloud">
                        <?php echo $tags_cloud; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    </div>
                </div>
            </div>
            <?php
        endif;
        ?>

    <?php endif; ?>
</div>
