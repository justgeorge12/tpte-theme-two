<?php
/**
 * Template part for displaying a blog post in the blog list (archive) layout.
 *
 * @package tpte
 */

$categories = get_the_category();
$cat_name   = ! empty( $categories ) ? $categories[0]->name : '';
?>
<div class="tp-postbox-item p-relative mb-40">
    <div class="tp-postbox-item-list-box d-flex align-items-center">
        <div class="tp-postbox-item-list-thumb">
            <a href="<?php the_permalink(); ?>">
                <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail( 'tpte-blog-list', array( 'alt' => get_the_title() ) ); ?>
                <?php endif; ?>
            </a>
        </div>
        <div class="tp-postbox-content">
            <div class="tp-blog-stories-tag-wrap d-flex">
                <?php if ( $cat_name ) : ?>
                    <a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ); ?>"><?php echo esc_html( $cat_name ); ?></a>
                <?php endif; ?>
                <span><?php echo esc_html( get_the_date( 'F d, Y' ) ); ?></span>
            </div>
            <h3 class="tp-postbox-item-list-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 25, ' [...]' ) ); ?></p>
            <div class="tp-postbox-btn">
                <a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'tpte' ); ?> <span><svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.5 11L6.5 6L1.5 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg></span></a>
            </div>
        </div>
    </div>
</div>
