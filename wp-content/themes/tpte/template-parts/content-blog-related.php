<?php
/**
 * Template part for a related post card ("Σχετικά νέα") on the single post page.
 *
 * Uses the mockup's .tp-blog-stories-item markup (thumb + category + date + title).
 * Date only — no author.
 *
 * @package tpte
 */

$categories = get_the_category();
$cat_name   = ! empty( $categories ) ? $categories[0]->name : '';
?>
<div class="tp-blog-stories-item p-relative mb-50">
    <div class="tp-blog-stories-thumb">
        <a href="<?php the_permalink(); ?>">
            <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail( 'tpte-blog-card', array( 'alt' => get_the_title() ) ); ?>
            <?php endif; ?>
        </a>
    </div>
    <div class="tp-blog-stories-content">
        <div class="tp-blog-stories-tag-wrap d-flex">
            <?php if ( $cat_name ) : ?>
                <a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ); ?>"><?php echo esc_html( $cat_name ); ?></a>
            <?php endif; ?>
            <span><?php echo esc_html( get_the_date( 'd F, Y' ) ); ?></span>
        </div>
        <h4 class="tp-blog-stories-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
    </div>
</div>
