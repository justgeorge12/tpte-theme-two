<?php
/**
 * Template Name: Department Info
 * Template Post Type: page
 *
 * Reusable layout for department audience pages (e.g. students, alumni, staff).
 * Sections are delimited by Separator blocks (<hr>) in the block editor.
 * Each section's first <h2>/<h3> becomes the section title; subsequent content is the body.
 * Add an Image block (wp-block-image) inside a section to show it beside the text
 * (text left 7 cols, image right 5 cols). Sections without an image remain full-width.
 * Long text sections auto-collapse after a configurable character limit with an expand button.
 *
 * Quick links are defined via the 'tpte_quick_links' custom field (serialized array)
 * or fallback to a default set that can be edited in the template.
 *
 * @package tpte
 */

add_filter(
	'body_class',
	function ( $classes ) {
		$classes[] = 'tpte-dept-info';
		return $classes;
	}
);

get_header();

while ( have_posts() ) :
	the_post();

	// --- Quick Links Data ---
	// Override via custom field 'tpte_quick_links' (serialized array) or edit defaults below.
	$default_links = array(
		array(
			'title' => 'eClass',
			'url'   => 'https://eclass.aegean.gr/',
			'icon'  => get_template_directory_uri() . '/assets/img/quick-links/eclass.png',
		),
		array(
			'title' => 'UniverSIS',
			'url'   => 'https://universis.aegean.gr/',
			'icon'  => get_template_directory_uri() . '/assets/img/quick-links/universis.png',
		),
		array(
			'title' => 'Webmail',
			'url'   => 'https://webmail.aegean.gr/',
			'icon'  => get_template_directory_uri() . '/assets/img/quick-links/webmail.png',
		),
		array(
			'title' => 'Βιβλιοθήκη',
			'url'   => 'https://lib.aegean.gr/',
			'icon'  => get_template_directory_uri() . '/assets/img/quick-links/library.png',
		),
	);

	$quick_links = get_post_meta( get_the_ID(), 'tpte_quick_links', true );
	if ( ! is_array( $quick_links ) || empty( $quick_links ) ) {
		$quick_links = $default_links;
	}

	// --- Parse page content into sections ---
	// Sections are delimited by Separator blocks (<hr>) in the block editor.
	// Each section can contain an optional Image block that renders beside the text.
	$raw_content = get_the_content();
	$raw_content = apply_filters( 'the_content', $raw_content );

	$sections       = array();
	$section_chunks = preg_split( '/<hr[^>]*\/?>/is', $raw_content, -1, PREG_SPLIT_NO_EMPTY );

	foreach ( $section_chunks as $chunk ) {
		$chunk = trim( $chunk );
		if ( empty( $chunk ) ) {
			continue;
		}

		// Extract the first heading as the section title.
		$heading = '';
		if ( preg_match( '/^\s*<h[23][^>]*>(.*?)<\/h[23]>/is', $chunk, $hm ) ) {
			$heading = wp_strip_all_tags( $hm[1] );
			$chunk   = trim( preg_replace( '/^\s*<h[23][^>]*>.*?<\/h[23]>/is', '', $chunk, 1 ) );
		}

		// Detect and extract the first wp-block-image figure as the section sidebar image.
		$image_html = '';
		if ( preg_match( '/<figure[^>]*class="[^"]*wp-block-image[^"]*"[^>]*>.*?<\/figure>/is', $chunk, $fm ) ) {
			$image_html = $fm[0];
			$chunk      = trim( str_replace( $image_html, '', $chunk ) );
			$chunk      = preg_replace( '/<p>\s*<\/p>/i', '', $chunk );
			$chunk      = trim( $chunk );
		}

		if ( empty( $heading ) && empty( $chunk ) && empty( $image_html ) ) {
			continue;
		}

		$sections[] = array(
			'heading'    => $heading,
			'content'    => $chunk,
			'image_html' => $image_html,
		);
	}

	$collapse_char_limit = 400;
	?>

	<!-- breadcrumb / hero -->
	<section class="tp-breadcrumb__area tp-dept-hero pt-60 pb-60 p-relative z-index-1 fix" style="background:#9bcefa">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="tp-breadcrumb__content">
						<div class="tp-breadcrumb__list">
							<span><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.07207 0C8.19331 0 8.31107 0.0404348 8.40664 0.114882L16.1539 6.14233L15.4847 6.98713L14.5385 6.25079V12.8994C14.538 13.1843 14.4243 13.4574 14.2225 13.6589C14.0206 13.8604 13.747 13.9738 13.4616 13.9743H2.69231C2.40688 13.9737 2.13329 13.8603 1.93146 13.6588C1.72962 13.4573 1.61597 13.1843 1.61539 12.8994V6.2459L0.669148 6.98235L0 6.1376L7.7375 0.114882C7.83308 0.0404348 7.95083 0 8.07207 0ZM8.07694 1.22084L2.69231 5.40777V12.8994H13.4616V5.41341L8.07694 1.22084Z" fill="currentColor"/></svg></a></span>
							<span><?php the_title(); ?></span>
						</div>
						<h3 class="tp-breadcrumb__title tp-dept-hero-title"><?php the_title(); ?></h3>
					</div>

					<?php if ( ! empty( $quick_links ) ) : ?>
						<div class="tp-dept-hero-quick">
							<h3 class="tp-dept-hero-quick-title text-center"><?php esc_html_e( 'Χρήσιμοι Σύνδεσμοι', 'tpte' ); ?></h3>
							<div class="tp-dept-hero-quick-list d-flex flex-wrap justify-content-center">
								<?php foreach ( $quick_links as $link ) : ?>
									<a href="<?php echo esc_url( $link['url'] ); ?>" class="tp-dept-quick-link-item text-center" target="_blank" rel="noopener noreferrer">
										<div class="tp-dept-quick-link-icon">
											<?php if ( ! empty( $link['icon'] ) ) : ?>
												<img src="<?php echo esc_url( $link['icon'] ); ?>" alt="<?php echo esc_attr( $link['title'] ); ?>">
											<?php else : ?>
												<i class="fa-sharp fa-light fa-link"></i>
											<?php endif; ?>
										</div>
										<span class="tp-dept-quick-link-title"><?php echo esc_html( $link['title'] ); ?></span>
									</a>
								<?php endforeach; ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

	<!-- content sections -->
	<section class="tp-dept-info-area pt-80 pb-100">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-10">
				<?php if ( ! empty( $sections ) ) : ?>
					<?php foreach ( $sections as $idx => $section ) :
						$content_text   = wp_strip_all_tags( $section['content'] );
						$needs_collapse = mb_strlen( $content_text ) > $collapse_char_limit && ! empty( $section['heading'] );
						$collapse_id    = 'dept-section-' . $idx;
						$has_image      = ! empty( $section['image_html'] );
						?>
						<div class="tp-dept-info-section mb-50 wow fadeInUp" data-wow-delay=".<?php echo ( $idx % 5 ) + 1; ?>s">
							<?php if ( $section['heading'] ) : ?>
								<h3 class="tp-dept-info-heading"><?php echo esc_html( $section['heading'] ); ?></h3>
							<?php endif; ?>

							<?php if ( $has_image ) : ?>
							<div class="row tp-dept-info-row">
								<div class="col-lg-7">
							<?php endif; ?>

							<?php if ( $needs_collapse ) : ?>
								<div class="tp-dept-info-text tp-dept-info-text--collapsible">
									<div class="tp-dept-info-text-inner collapse" id="<?php echo esc_attr( $collapse_id ); ?>">
										<?php echo wp_kses_post( $section['content'] ); ?>
									</div>
									<div class="tp-dept-info-fade"></div>
									<button class="tp-dept-info-toggle" type="button"
										data-bs-toggle="collapse"
										data-bs-target="#<?php echo esc_attr( $collapse_id ); ?>"
										aria-expanded="false"
										aria-controls="<?php echo esc_attr( $collapse_id ); ?>">
										<span class="tp-dept-info-toggle-icon">
											<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M6 1V11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
												<path d="M1 6H11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
											</svg>
										</span>
										<span class="tp-dept-info-toggle-more"><?php esc_html_e( 'Περισσότερα', 'tpte' ); ?></span>
										<span class="tp-dept-info-toggle-less"><?php esc_html_e( 'Λιγότερα', 'tpte' ); ?></span>
									</button>
								</div>
							<?php else : ?>
								<div class="tp-dept-info-text">
									<?php echo wp_kses_post( $section['content'] ); ?>
								</div>
							<?php endif; ?>

							<?php if ( $has_image ) : ?>
								</div>
								<div class="col-lg-5">
									<div class="tp-dept-info-image">
										<?php echo wp_kses_post( $section['image_html'] ); ?>
									</div>
								</div>
							</div>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				<?php else : ?>
					<div class="tp-dept-info-text">
						<?php echo $raw_content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</div>
				<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

	<?php
endwhile;

get_footer();
