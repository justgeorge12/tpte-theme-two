<?php
/**
 * Template part for displaying an event row on the front page.
 *
 * @package tpte
 */

$start_date = get_post_meta( get_the_ID(), '_event_start_date', true );
$start_time = get_post_meta( get_the_ID(), '_event_start_time', true );
$end_time   = get_post_meta( get_the_ID(), '_event_end_time', true );
$location   = get_post_meta( get_the_ID(), '_event_location', true );

$day   = $start_date ? date_i18n( 'd', strtotime( $start_date ) ) : '';
$month = $start_date ? date_i18n( 'M, Y', strtotime( $start_date ) ) : '';

$formatted_start = $start_time ? date_i18n( 'g:iA', strtotime( $start_time ) ) : '';
$formatted_end   = $end_time ? date_i18n( 'g:iA', strtotime( $end_time ) ) : '';
$time_range      = $formatted_start && $formatted_end ? $formatted_start . ' - ' . $formatted_end : $formatted_start;

$thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'tpte-event-card' );
?>
<div class="tp-event-item">
    <div class="row align-items-center">
        <div class="col-md-2">
            <div class="tp-event-list">
                <h4 class="tp-event-list-count"><?php echo esc_html( $day ); ?></h4>
                <span><?php echo esc_html( $month ); ?></span>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tp-event-content">
                <h3 class="tp-event-title"><a class="tp-img-reveal tp-img-reveal-item" href="<?php the_permalink(); ?>" data-img="<?php echo esc_url( $thumb_url ); ?>" data-fx="1"><?php the_title(); ?></a></h3>
                <div class="tp-event-info">
                    <?php if ( $time_range ) : ?>
                        <span><i class="fa-sharp fa-light fa-clock"></i><?php echo esc_html( $time_range ); ?></span>
                    <?php endif; ?>
                    <?php if ( $location ) : ?>
                        <span><i class="fa-sharp fa-light fa-location-dot"></i><?php echo esc_html( $location ); ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-md-1">
            <div class="tp-event-arrow text-lg-end">
                <a href="<?php the_permalink(); ?>">
                    <span>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 10H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10 1L19 10L10 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
