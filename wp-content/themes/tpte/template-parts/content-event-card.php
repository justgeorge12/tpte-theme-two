<?php
/**
 * Template part for displaying an event card on the archive page.
 *
 * @package tpte
 */

$start_date = get_post_meta( get_the_ID(), '_event_start_date', true );
$location   = get_post_meta( get_the_ID(), '_event_location', true );

$formatted_date = $start_date ? date_i18n( 'd F, Y', strtotime( $start_date ) ) : '';
?>
<div class="tp-event-inner-item mb-30">
    <div class="tp-event-inner-thumb">
        <a href="<?php the_permalink(); ?>">
            <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail( 'tpte-event-card', array( 'alt' => get_the_title() ) ); ?>
            <?php endif; ?>
        </a>
    </div>
    <div class="tp-event-inner-content">
        <?php if ( $formatted_date ) : ?>
            <span class="tp-event-inner-date"><?php echo esc_html( $formatted_date ); ?></span>
        <?php endif; ?>
        <h4 class="tp-event-inner-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
        <?php if ( $location ) : ?>
            <span class="tp-event-inner-location"><svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.375 6.72727C12.375 11.1818 6.6875 15 6.6875 15C6.6875 15 1 11.1818 1 6.72727C1 5.20831 1.59922 3.75155 2.66583 2.67748C3.73244 1.60341 5.17908 1 6.6875 1C8.19592 1 9.64256 1.60341 10.7092 2.67748C11.7758 3.75155 12.375 5.20831 12.375 6.72727Z" stroke="#84807B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M6.6888 8.63654C7.73584 8.63654 8.58464 7.78181 8.58464 6.72745C8.58464 5.67309 7.73584 4.81836 6.6888 4.81836C5.64176 4.81836 4.79297 5.67309 4.79297 6.72745C4.79297 7.78181 5.64176 8.63654 6.6888 8.63654Z" stroke="#84807B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg> <?php echo esc_html( $location ); ?></span>
        <?php endif; ?>
        <div class="tp-event-inner-btn-box d-flex align-items-center justify-content-between">

            <div class="tp-event-inner-btn">
                <a href="<?php the_permalink(); ?>"><?php esc_html_e( 'View Details', 'tpte' ); ?> <span><svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.5 11L6.5 6L1.5 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg></span></a>
            </div>
        </div>
    </div>
</div>
