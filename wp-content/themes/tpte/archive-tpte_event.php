<?php
/**
 * The template for displaying the Event archive.
 *
 * Lists every event (ordered by start date in tpte_order_event_archive) and lets
 * visitors switch between Προσεχείς / Παλαιότερες / Όλες with a client-side filter
 * (assets/js/event-filter.js). Each card's column carries data-event-status and
 * data-event-order so the script can toggle visibility and re-order past events.
 *
 * @package tpte
 */

get_header();

$tp_theme_uri = get_template_directory_uri();
$today_ts     = strtotime( 'today' );
?>

<!-- event breadcrumb start -->
<section class="tp-breadcrumb__area pt-160 pb-150 p-relative z-index-1 fix">
	<div class="tp-breadcrumb__bg overlay" data-background="<?php echo esc_url( $tp_theme_uri ); ?>/assets/img/breadcrumb/campus-event.png"></div>
	<div class="container">
		<div class="row align-items-center">
			<div class="col-sm-12">
				<div class="tp-breadcrumb__content">
					<div class="tp-breadcrumb__list inner-after">
						<span class="white"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M8.07207 0C8.19331 0 8.31107 0.0404348 8.40664 0.114882L16.1539 6.14233L15.4847 6.98713L14.5385 6.25079V12.8994C14.538 13.1843 14.4243 13.4574 14.2225 13.6589C14.0206 13.8604 13.747 13.9738 13.4616 13.9743H2.69231C2.40688 13.9737 2.13329 13.8603 1.93146 13.6588C1.72962 13.4573 1.61597 13.1843 1.61539 12.8994V6.2459L0.669148 6.98235L0 6.1376L7.7375 0.114882C7.83308 0.0404348 7.95083 0 8.07207 0ZM8.07694 1.22084L2.69231 5.40777V12.8994H13.4616V5.41341L8.07694 1.22084Z" fill="currentColor"/>
						</svg></a></span>
						<span class="white"><?php esc_html_e( 'Εκδηλώσεις', 'tpte' ); ?></span>
					</div>
					<h3 class="tp-breadcrumb__title color"><?php esc_html_e( 'Εκδηλώσεις', 'tpte' ); ?></h3>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- event breadcrumb end -->

<!-- event area start -->
<section class="tp-event-inner-area tp-event-inner-p pt-100 pb-100">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="row">
				<div class="col-lg-12">
					<div class="tp-event-filters">
						<div class="tp-event-filter-tabs">
							<button type="button" class="tp-event-filter-btn active" data-filter="upcoming"><?php esc_html_e( 'Προσεχείς', 'tpte' ); ?></button>
							<button type="button" class="tp-event-filter-btn" data-filter="past"><?php esc_html_e( 'Παλαιότερες', 'tpte' ); ?></button>
							<button type="button" class="tp-event-filter-btn" data-filter="all"><?php esc_html_e( 'Όλες', 'tpte' ); ?></button>
						</div>
						<p class="tp-event-count" aria-live="polite">
							<?php
							printf(
								/* translators: %s: number of events shown in the current tab (live-updated). */
								esc_html__( 'Εμφανίζονται %s εκδηλώσεις', 'tpte' ),
								'<strong class="js-event-visible">0</strong>'
							);
							?>
						</p>
					</div>
				</div>
			</div>

			<div class="row tp-event-grid">
				<?php
				while ( have_posts() ) :
					the_post();

					$sd          = get_post_meta( get_the_ID(), '_event_start_date', true );
					$ts          = $sd ? strtotime( $sd ) : 0;
					$is_upcoming = $ts >= $today_ts;
					?>
					<div class="col-lg-4 col-md-6 tp-event-filter-item"
						data-event-status="<?php echo $is_upcoming ? 'upcoming' : 'past'; ?>"
						data-event-order="<?php echo (int) $ts; ?>">
						<?php get_template_part( 'template-parts/content', 'event-card' ); ?>
					</div>
					<?php
				endwhile;
				?>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<p class="tp-event-noresults is-hidden" aria-live="polite"><?php esc_html_e( 'Δεν υπάρχουν προσεχείς εκδηλώσεις αυτήν την περίοδο.', 'tpte' ); ?></p>
				</div>
			</div>
		<?php else : ?>
			<div class="row">
				<div class="col-12">
					<p><?php esc_html_e( 'Δεν βρέθηκαν εκδηλώσεις.', 'tpte' ); ?></p>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
<!-- event area end -->

<?php
get_footer();
