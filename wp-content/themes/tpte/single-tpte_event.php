<?php
/**
 * The template for displaying single Events.
 *
 * @package tpte
 */

get_header();

while ( have_posts() ) :
    the_post();

    $start_date   = get_post_meta( get_the_ID(), '_event_start_date', true );
    $start_time   = get_post_meta( get_the_ID(), '_event_start_time', true );
    $end_date     = get_post_meta( get_the_ID(), '_event_end_date', true );
    $end_time     = get_post_meta( get_the_ID(), '_event_end_time', true );
    $location     = get_post_meta( get_the_ID(), '_event_location', true );
    $attendees    = get_post_meta( get_the_ID(), '_event_attendees', true );
    $about        = get_post_meta( get_the_ID(), '_event_about', true );
    $cover_topics = get_post_meta( get_the_ID(), '_event_cover_topics', true );
    $video_url    = get_post_meta( get_the_ID(), '_event_video_url', true );

    $thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );

    // Build countdown date string.
    $countdown_date = '';
    if ( $start_date ) {
        $dt = DateTime::createFromFormat( 'Y-m-d', $start_date );
        if ( $dt ) {
            $countdown_date = $dt->format( 'F d Y' );
            if ( $start_time ) {
                $countdown_date .= ' ' . $start_time . ':00';
            }
        }
    }

    $formatted_start_date = $start_date ? date_i18n( 'd M Y', strtotime( $start_date ) ) : '';
    $formatted_start_time = $start_time ? date_i18n( 'h:i A', strtotime( $start_time ) ) : '';
    $formatted_end_date   = $end_date ? date_i18n( 'd M Y', strtotime( $end_date ) ) : '';
    $formatted_end_time   = $end_time ? date_i18n( 'h:i A', strtotime( $end_time ) ) : '';
    ?>

    <!-- event details breadcrumb start -->
    <section class="tp-event-details-breadcrumb-bg pb-110 p-relative z-index-1 fix"
        <?php if ( $thumb_url ) : ?>
            data-background="<?php echo esc_url( $thumb_url ); ?>"
        <?php endif; ?>>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="tp-breadcrumb__list tp-event-details-breadcrumb-list pb-120">
                        <span><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.07207 0C8.19331 0 8.31107 0.0404348 8.40664 0.114882L16.1539 6.14233L15.4847 6.98713L14.5385 6.25079V12.8994C14.538 13.1843 14.4243 13.4574 14.2225 13.6589C14.0206 13.8604 13.747 13.9738 13.4616 13.9743H2.69231C2.40688 13.9737 2.13329 13.8603 1.93146 13.6588C1.72962 13.4573 1.61597 13.1843 1.61539 12.8994V6.2459L0.669148 6.98235L0 6.1376L7.7375 0.114882C7.83308 0.0404348 7.95083 0 8.07207 0ZM8.07694 1.22084L2.69231 5.40777V12.8994H13.4616V5.41341L8.07694 1.22084Z" fill="currentColor"/>
                        </svg></a></span>
                        <span><a href="<?php echo esc_url( get_post_type_archive_link( 'tpte_event' ) ); ?>"><?php esc_html_e( 'Events', 'tpte' ); ?></a></span>
                        <span><?php the_title(); ?></span>
                    </div>
                    <div class="tp-event-details-breadcrumb-content">
                        <h4 class="tp-event-details-breadcrumb-title"><?php the_title(); ?></h4>
                        <?php if ( $countdown_date ) : ?>
                            <div class="tp-event-details-countdown" data-countdown data-date="<?php echo esc_attr( $countdown_date ); ?>">
                                <div class="tp-event-details-countdown-inner">
                                    <ul>
                                        <li><span data-days>0</span> Days</li>
                                        <li><span data-hours>0</span> Hours</li>
                                        <li><span data-minutes>0</span> Mins</li>
                                        <li><span data-seconds>0</span> Secs</li>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- event details breadcrumb end -->

    <!-- event details area start -->
    <section class="tp-event-details-area pt-80 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="tp-event-details-wrapper">
                        <?php if ( $about ) : ?>
                            <div class="tp-event-details-about">
                                <h3 class="tp-event-details-title"><?php esc_html_e( 'Περιγραφή', 'tpte' ); ?></h3>
                                <?php echo wp_kses_post( $about ); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ( $cover_topics ) : ?>
                            <div class="tp-event-details-cover">
                                <h3 class="tp-event-details-title"><?php esc_html_e( "Θεματολογία", 'tpte' ); ?></h3>
                                <ul>
                                    <?php
                                    $topics = array_filter( array_map( 'trim', explode( "\n", $cover_topics ) ) );
                                    foreach ( $topics as $topic ) :
                                        ?>
                                        <li><?php echo esc_html( $topic ); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <?php if ( $video_url ) : ?>
                            <div class="tp-event-details-teaser">
                                <h3 class="tp-event-details-title"><?php esc_html_e( 'Here is the teaser', 'tpte' ); ?></h3>
                                <div class="tp-event-details-teaser-video mt-30 p-relative">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <?php the_post_thumbnail( 'large' ); ?>
                                    <?php endif; ?>
                                    <div class="tp-event-details-teaser-video-popup">
                                        <a class="popup-video" href="<?php echo esc_url( $video_url ); ?>">
                                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/event/event/youtube.png" alt="<?php esc_attr_e( 'Play video', 'tpte' ); ?>">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="tp-event-details-box">
                        <div class="tp-event-details-details">
                            <h4 class="tp-event-details-box-title"><?php esc_html_e( 'Λεπτομέρειες Εκδήλωσης', 'tpte' ); ?></h4>

                            <?php if ( $formatted_start_date ) : ?>
                                <div class="tp-event-details-list d-flex align-items-center justify-content-between">
                                    <h5><span><svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M1.06836 6.18262H13.5451" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path opacity="0.4" d="M10.4102 8.91699H10.4194" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path opacity="0.4" d="M7.30273 8.91699H7.312" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path opacity="0.4" d="M4.1875 8.91699H4.19676" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path opacity="0.4" d="M10.4102 11.6377H10.4194" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path opacity="0.4" d="M7.30273 11.6377H7.312" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path opacity="0.4" d="M4.1875 11.6377H4.19676" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10.1289 1V3.30355" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M4.47656 1V3.30355" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.2668 2.10547H4.33967C2.28399 2.10547 1 3.25062 1 5.35559V11.6903C1 13.8284 2.28399 15 4.33967 15H10.2603C12.3225 15 13.6 13.8483 13.6 11.7433V5.35559C13.6065 3.25062 12.329 2.10547 10.2668 2.10547Z" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg></span> <?php esc_html_e( 'Ημερομηνία', 'tpte' ); ?></h5>
                                    <span><?php echo esc_html( $formatted_start_date ); ?></span>
                                </div>
                            <?php endif; ?>

                            <?php if ( $formatted_start_time ) : ?>
                                <div class="tp-event-details-list d-flex align-items-center justify-content-between">
                                    <h5><span><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15Z" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8 3.7998V7.9998L10.8 9.3998" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg></span> <?php esc_html_e( 'Start Time', 'tpte' ); ?></h5>
                                    <span><?php echo esc_html( $formatted_start_time ); ?></span>
                                </div>
                            <?php endif; ?>

                            <?php if ( $formatted_end_date ) : ?>
                                <div class="tp-event-details-list d-flex align-items-center justify-content-between">
                                    <h5><span><svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M1.06836 6.18262H13.5451" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path opacity="0.4" d="M10.4102 8.91699H10.4194" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path opacity="0.4" d="M7.30273 8.91699H7.312" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path opacity="0.4" d="M4.1875 8.91699H4.19676" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path opacity="0.4" d="M10.4102 11.6377H10.4194" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path opacity="0.4" d="M7.30273 11.6377H7.312" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path opacity="0.4" d="M4.1875 11.6377H4.19676" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10.1289 1V3.30355" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M4.47656 1V3.30355" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.2668 2.10547H4.33967C2.28399 2.10547 1 3.25062 1 5.35559V11.6903C1 13.8284 2.28399 15 4.33967 15H10.2603C12.3225 15 13.6 13.8483 13.6 11.7433V5.35559C13.6065 3.25062 12.329 2.10547 10.2668 2.10547Z" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg></span> <?php esc_html_e( 'End Date', 'tpte' ); ?></h5>
                                    <span><?php echo esc_html( $formatted_end_date ); ?></span>
                                </div>
                            <?php endif; ?>

                            <?php if ( $formatted_end_time ) : ?>
                                <div class="tp-event-details-list d-flex align-items-center justify-content-between">
                                    <h5><span><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15Z" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8 3.7998V7.9998L10.8 9.3998" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg></span> <?php esc_html_e( 'End Time', 'tpte' ); ?></h5>
                                    <span><?php echo esc_html( $formatted_end_time ); ?></span>
                                </div>
                            <?php endif; ?>

                            <?php if ( $attendees ) : ?>
                                <div class="tp-event-details-list d-flex align-items-center justify-content-between">
                                    <h5><span><svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.445 15.0008V13.4452C13.445 12.6201 13.1172 11.8287 12.5337 11.2452C11.9502 10.6618 11.1589 10.334 10.3337 10.334H4.11124C3.28609 10.334 2.49473 10.6618 1.91126 11.2452C1.32779 11.8287 1 12.6201 1 13.4452V15.0008" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.22257 7.22248C8.94085 7.22248 10.3338 5.82953 10.3338 4.11124C10.3338 2.39295 8.94085 1 7.22257 1C5.50428 1 4.11133 2.39295 4.11133 4.11124C4.11133 5.82953 5.50428 7.22248 7.22257 7.22248Z" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg></span> <?php esc_html_e( 'Attendees', 'tpte' ); ?></h5>
                                    <span><?php echo esc_html( $attendees ); ?></span>
                                </div>
                            <?php endif; ?>

                            <?php if ( $location ) : ?>
                                <div class="tp-event-details-list d-flex align-items-center justify-content-between">
                                    <h5><span><svg width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14 7.13636C14 11.9091 7.5 16 7.5 16C7.5 16 1 11.9091 1 7.13636C1 5.5089 1.68482 3.94809 2.90381 2.7973C4.12279 1.64651 5.77609 1 7.5 1C9.22391 1 10.8772 1.64651 12.0962 2.7973C13.3152 3.94809 14 5.5089 14 7.13636Z" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.49992 9.18173C8.69654 9.18173 9.66659 8.26595 9.66659 7.13627C9.66659 6.0066 8.69654 5.09082 7.49992 5.09082C6.3033 5.09082 5.33325 6.0066 5.33325 7.13627C5.33325 8.26595 6.3033 9.18173 7.49992 9.18173Z" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg></span> <?php esc_html_e( 'Τοποθεσία', 'tpte' ); ?></h5>
                                    <span><?php echo esc_html( $location ); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- event details area end -->

    <?php
endwhile;

get_footer();
