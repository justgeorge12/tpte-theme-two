<?php
/**
 * Template part for displaying a blog card on the front page.
 *
 * @package tpte
 */

$categories = get_the_category();
$cat_name   = ! empty( $categories ) ? $categories[0]->name : '';
?>
<div class="tp-blog-item text-center mb-40">
    <div class="tp-blog-thumb fix">
        <a href="<?php the_permalink(); ?>">
            <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail( 'tpte-blog-card', array( 'alt' => get_the_title() ) ); ?>
            <?php endif; ?>
        </a>
    </div>
    <div class="tp-blog-content">
        <?php if ( $cat_name ) : ?>
            <span class="tp-blog-tag"><?php echo esc_html( $cat_name ); ?></span>
        <?php endif; ?>
        <h4 class="tp-blog-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h4>
        <div class="tp-blog-meta">

            <span>
                <span>
                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.5 14C11.0899 14 14 11.0899 14 7.5C14 3.91015 11.0899 1 7.5 1C3.91015 1 1 3.91015 1 7.5C1 11.0899 3.91015 14 7.5 14Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M7.5 3.6001V7.5001L10.1 8.8001" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <?php echo esc_html( get_the_date( 'M d, Y' ) ); ?>
                </span>
            </span>
        </div>
        <div class="tp-blog-btn">
            <a href="<?php the_permalink(); ?>">
                <span class="tp-blog-btn-bg blog-btn-bg"></span>
                <span class="tp-blog-btn-border blog-btn-border"></span>
                <span class="icon">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 6H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6 1L11 6L6 11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
            </a>
        </div>
    </div>
</div>
