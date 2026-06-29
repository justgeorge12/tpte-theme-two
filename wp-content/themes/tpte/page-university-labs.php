<?php
/**
 * Template Name: University Labs
 * Template Post Type: page
 *
 * Labs page: tabbed section, one tab per lab. Reuses lab thumbnails/logos
 * from the About page ($research_fields). Component based on the
 * tp-campus-student-area block in university-campus.html.
 *
 * @package tpte
 */

get_header();

while ( have_posts() ) :
	the_post();
	$tp_theme_uri = get_template_directory_uri();
	?>

	<!-- labs breadcrumb start -->
	<section class="tp-breadcrumb__area pt-160 pb-150 p-relative z-index-1 fix">
		<div class="tp-breadcrumb__bg overlay" data-background="<?php echo esc_url( $tp_theme_uri ); ?>/assets/img/breadcrumb/tpte-building-from-top.png"></div>
		<div class="container">
			<div class="row align-items-center">
				<div class="col-sm-12">
					<div class="tp-breadcrumb__content">
						<div class="tp-breadcrumb__list inner-after">
							<span class="white"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M8.07207 0C8.19331 0 8.31107 0.0404348 8.40664 0.114882L16.1539 6.14233L15.4847 6.98713L14.5385 6.25079V12.8994C14.538 13.1843 14.4243 13.4574 14.2225 13.6589C14.0206 13.8604 13.747 13.9738 13.4616 13.9743H2.69231C2.40688 13.9737 2.13329 13.8603 1.93146 13.6588C1.72962 13.4573 1.61597 13.1843 1.61539 12.8994V6.2459L0.669148 6.98235L0 6.1376L7.7375 0.114882C7.83308 0.0404348 7.95083 0 8.07207 0ZM8.07694 1.22084L2.69231 5.40777V12.8994H13.4616V5.41341L8.07694 1.22084Z" fill="currentColor"/>
							</svg></a></span>
							<span class="white"><?php the_title(); ?></span>
						</div>
						<h3 class="tp-breadcrumb__title color"><?php the_title(); ?></h3>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- labs breadcrumb end -->


	<!-- labs area start -->
	<?php
	$labs = array(
		array(
			'title'    => __( 'Εργαστήριο Μουσειολογίας', 'tpte' ),
			'logo'     => 'museolab.png',
			'director' => __( 'Διευθύντρια: Αναπληρώτρια Καθηγήτρια Νάσια Χουρμουζιάδη', 'tpte' ),
			'desc'     => __( 'Σύντομη περιγραφή του εργαστηρίου σε δύο γραμμές. [Συμπληρώστε περιγραφή].', 'tpte' ),
			'pdf'      => 'https://www.ct.aegean.gr/data/%CE%95%CF%81%CE%B3%CE%B1%CF%83%CF%84%CE%AE%CF%81%CE%B9%CE%BF_%CE%9C%CE%BF%CF%85%CF%83%CE%B5%CE%B9%CE%BF%CE%BB%CE%BF%CE%B3%CE%AF%CE%B1%CF%82.pdf',
			'website'  => 'http://museologylab.ct.aegean.gr/',
		),
		array(
			'title'    => __( 'Εργαστήριο Διαχείρισης της Πολιτισμικής Κληρονομιάς', 'tpte' ),
			'logo'     => 'chml.png',
			'director' => __( 'Διευθυντής: Καθηγητής Γεράσιμος Παυλογεωργάτος', 'tpte' ),
			'desc'     => __( 'Σύντομη περιγραφή του εργαστηρίου σε δύο γραμμές. [Συμπληρώστε περιγραφή].', 'tpte' ),
			'pdf'      => 'https://www.ct.aegean.gr/data/%CE%95%CF%81%CE%B3%CE%B1%CF%83%CF%84%CE%AE%CF%81%CE%B9%CE%BF_%CE%94%CE%B9%CE%B1%CF%87%CE%B5%CE%AF%CF%81%CE%B9%CF%83%CE%B7%CF%82_%CF%84%CE%B7%CF%82_%CE%A0%CE%BF%CE%BB%CE%B9%CF%84%CE%B9%CF%83%CE%BC%CE%B9%CE%BA%CE%AE%CF%82_%CE%9A%CE%BB%CE%B7%CF%81%CE%BF%CE%BD%CE%BF%CE%BC%CE%B9%CE%AC%CF%82.pdf',
			'website'  => 'http://chmlab.aegean.gr/',
		),
		array(
			'title'    => __( 'Εργαστήριο Τεχνολογιών Προστασίας της Ιδιωτικότητας και Εφαρμογών Πληροφορικής στις Κοινωνικές Επιστήμες', 'tpte' ),
			'logo'     => 'privasi.png',
			'director' => __( 'Διευθυντής: Καθηγητής Χρήστος Καλλονιάτης', 'tpte' ),
			'desc'     => __( 'Σύντομη περιγραφή του εργαστηρίου σε δύο γραμμές. [Συμπληρώστε περιγραφή].', 'tpte' ),
			'pdf'      => 'https://www.ct.aegean.gr/data/PrivaSI.pdf',
			'website'  => 'https://privasi.aegean.gr/',
		),
		array(
			'title'    => __( 'Εργαστήριο Ευφυών Συστημάτων / Intelligent Systems Lab (i-Lab)', 'tpte' ),
			'logo'     => 'ilab.png',
			'director' => __( 'Διευθυντής: Καθηγητής Χρήστος - Νικόλαος Αναγνωστόπουλος', 'tpte' ),
			'desc'     => __( 'Σύντομη περιγραφή του εργαστηρίου σε δύο γραμμές. [Συμπληρώστε περιγραφή].', 'tpte' ),
			'pdf'      => 'https://www.ct.aegean.gr/data/Intelligent-Systems-Lab-profile.pdf',
			'website'  => 'http://i-lab.aegean.gr/',
		),
		array(
			'title'    => __( 'Εργαστήριο Πολιτισμικών Πληροφορικών Συστημάτων', 'tpte' ),
			'logo'     => 'cil.png',
			'director' => __( 'Διευθύντρια: Καθηγήτρια Ευαγγελία Καβακλή', 'tpte' ),
			'desc'     => __( 'Σύντομη περιγραφή του εργαστηρίου σε δύο γραμμές. [Συμπληρώστε περιγραφή].', 'tpte' ),
			'pdf'      => 'https://www.ct.aegean.gr/data/%CE%95%CF%81%CE%B3%CE%B1%CF%83%CF%84%CE%AE%CF%81%CE%B9%CE%BF_%CE%A0%CE%BF%CE%BB%CE%B9%CF%84%CE%B9%CF%83%CE%BC%CE%B9%CE%BA%CF%8E%CE%BD_%CE%A0%CE%BB%CE%B7%CF%81%CE%BF%CF%86%CE%BF%CF%81%CE%B9%CE%BA%CF%8E%CE%BD_%CE%A3%CF%85%CF%83%CF%84%CE%B7%CE%BC%CE%AC%CF%84%CF%89%CE%BD.pdf',
			'website'  => 'http://cilab.aegean.gr/',
		),
		array(
			'title'    => __( 'Εργαστήριο Εικόνας, Ήχου και Πολιτιστικής Αναπαράστασης', 'tpte' ),
			'logo'     => 'ps.png',
			'director' => __( 'Διευθυντής: Αναπληρωτής Καθηγητής Νικόλαος Μπουμπάρης', 'tpte' ),
			'desc'     => __( 'Σύντομη περιγραφή του εργαστηρίου σε δύο γραμμές. [Συμπληρώστε περιγραφή].', 'tpte' ),
			'pdf'      => 'https://www.ct.aegean.gr/data/%CE%95%CF%81%CE%B3%CE%B1%CF%83%CF%84%CE%AE%CF%81%CE%B9%CE%BF_%CE%95%CE%B9%CE%BA%CF%8C%CE%BD%CE%B1%CF%82_%CE%89%CF%87%CE%BF%CF%85_%CE%BA%CE%B1%CE%B9_%CE%A0%CE%BF%CE%BB%CE%B9%CF%84%CE%B9%CF%83%CF%84%CE%B9%CE%BA%CE%AE%CF%82_%CE%91%CE%BD%CE%B1%CF%80%CE%B1%CF%81%CE%AC%CF%83%CF%84%CE%B1%CF%83%CE%B7%CF%82.pdf',
			'website'  => 'http://www.cultural-representation.com/',
		),
		array(
			'title'    => __( 'XR Lab – Εργαστήριο Εκτεταμένης Πραγματικότητας', 'tpte' ),
			'logo'     => 'xr.png',
			'director' => __( 'Διευθυντής: Αναπληρωτής Καθηγητής Βλάσιος Κασαπάκης', 'tpte' ),
			'desc'     => __( 'Σύντομη περιγραφή του εργαστηρίου σε δύο γραμμές. [Συμπληρώστε περιγραφή].', 'tpte' ),
			'pdf'      => 'https://www.ct.aegean.gr/data/XR-Lab.pdf',
			'website'  => 'https://xr-lab.gr/',
		),
	);
	?>
	<section class="tp-labs-area grey-bg pt-90 pb-120">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="tp-labs-heading text-center mb-50 wow fadeInUp" data-wow-delay=".3s">
						<h3 class="tp-labs-title"><?php esc_html_e( 'Εργαστήρια', 'tpte' ); ?></h3>
					</div>
				</div>
			</div>
			<div class="row">
				<?php foreach ( $labs as $lab ) : ?>
					<div class="col-lg-4 col-md-6 mb-30 wow fadeInUp" data-wow-delay=".3s">
						<div class="tp-lab-card h-100">
							<?php if ( ! empty( $lab['logo'] ) ) : ?>
								<div class="tp-lab-card-logo">
									<img src="<?php echo esc_url( $tp_theme_uri . '/assets/img/about/lab-logos/' . $lab['logo'] ); ?>" alt="<?php echo esc_attr( $lab['title'] ); ?>">
								</div>
							<?php endif; ?>
							<h4 class="tp-lab-card-title"><?php echo esc_html( $lab['title'] ); ?></h4>
							<p class="tp-lab-card-desc"><?php echo esc_html( $lab['desc'] ); ?></p>
							<p class="tp-lab-card-director"><?php echo esc_html( $lab['director'] ); ?></p>
							<div class="tp-lab-card-btns">
								<?php if ( ! empty( $lab['pdf'] ) ) : ?>
									<a class="tp-btn tp-lab-card-btn" href="<?php echo esc_url( $lab['pdf'] ); ?>" target="_blank" rel="noopener">
										<span class="tp-lab-card-btn-icon" aria-hidden="true">
											<svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M9 1H2.5C1.67 1 1 1.67 1 2.5v11C1 14.33 1.67 15 2.5 15h10c.83 0 1.5-.67 1.5-1.5V6L9 1z" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/>
												<path d="M9 1v5h5" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/>
												<path d="M4 9.5h7M4 12h5" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/>
											</svg>
										</span>
										<?php esc_html_e( 'Πληροφορίες', 'tpte' ); ?>
									</a>
								<?php endif; ?>
								<?php if ( ! empty( $lab['website'] ) ) : ?>
									<a class="tp-btn tp-lab-card-btn" href="<?php echo esc_url( $lab['website'] ); ?>" target="_blank" rel="noopener">
										<span class="tp-lab-card-btn-icon" aria-hidden="true">
											<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M8 1h6v6" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
												<path d="M14 1L6.5 8.5" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
												<path d="M12 9.5v3A1.5 1.5 0 0 1 10.5 14h-8A1.5 1.5 0 0 1 1 12.5v-8A1.5 1.5 0 0 1 2.5 3h3" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
											</svg>
										</span>
										<?php esc_html_e( 'Ιστοσελίδα', 'tpte' ); ?>
									</a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<!-- labs area end -->

	<?php
endwhile;

get_footer();
