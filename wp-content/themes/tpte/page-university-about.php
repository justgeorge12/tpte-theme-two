<?php
/**
 * Template Name: University About
 * Template Post Type: page
 *
 * About page template converted from university-about.html.
 *
 * @package tpte
 */

get_header();

while ( have_posts() ) :
	the_post();
	$tp_theme_uri = get_template_directory_uri();
	?>

	<!-- about breadcrumb start -->
	<section class="tp-breadcrumb__area pt-160 pb-150 p-relative z-index-1 fix">
		<div class="tp-breadcrumb__bg overlay" data-background="<?php echo esc_url( $tp_theme_uri ); ?>/assets/img/about/lofos.png"></div>
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
	<!-- about breadcrumb end -->


	<!-- about-area-start -->
	<section class="about-area pt-90 pb-90 grey-bg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="tp-about-4-wrapper mb-80 wow fadeInUp" data-wow-delay=".3s">
						<h2 class="tp-about-4-head"><?php esc_html_e( 'Στόχος του Τμήματος είναι να εκπαιδεύει ολοκληρωμένους επιστήμονες που συνδυάζουν δημιουργικά την τεχνολογία με τον πολιτισμό.', 'tpte' ); ?></h2>
						<div class="tp-about-4-btn">

							<div class="tp-about-4-video">
								<a href="https://www.youtube.com/watch?v=Hc_4Qnetdzo&list=PLImGhm8yJYXrQdEFei5AyKChfykvpd2g8&index=1" target="_blank">
									<span>
										<svg xmlns="http://www.w3.org/2000/svg" width="12" height="14" viewBox="0 0 12 14" fill="none">
											<path d="M12 7.00012L0 0.0719185L0 13.9283L12 7.00012Z" fill="currentColor" />
										</svg>
									</span>
								</a>
								<span><?php esc_html_e( 'Ιστορίες των Αποφοίτων μας', 'tpte' ); ?></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row align-items-center wow fadeInUp" data-wow-delay=".5s">
				<div class="col-lg-3 col-sm-6">
					<div class="tp-about-4-thumb-1 mb-30">
						<img src="<?php echo esc_url( $tp_theme_uri ); ?>/assets/img/about/4/about-thumb-1.jpg" alt="">
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="tp-about-4-thumb-2 mb-30">
						<img src="<?php echo esc_url( $tp_theme_uri ); ?>/assets/img/about/4/about-thumb-2.jpg" alt="">
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="tp-about-4-thumb-3 mb-30">
						<img src="<?php echo esc_url( $tp_theme_uri ); ?>/assets/img/about/4/about-thumb-3.jpg" alt="">
					</div>
				</div>
				<div class="col-lg-2 col-sm-6">
					<div class="tp-about-4-thumb-4 mb-30">
						<img src="<?php echo esc_url( $tp_theme_uri ); ?>/assets/img/about/4/about-thumb-4.jpg" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- about-area-end -->


	<!-- our-mission-area-start -->
	<section class="tp-our-mission-area grey-bg pt-30">
		<div class="container">
			<div class="row d-flex justify-content-center">


				<div class="col-lg-8">
					<div class="tp-our-mission-wrapper wow fadeInUp" data-wow-delay=".5s">
						<div class="tp-our-mission-heading">
							<h3 class="tp-our-mission-title"><?php esc_html_e( 'Σπουδές με επίκεντρο τον Ψηφιακό Πολιτισμό', 'tpte' ); ?></h3>
							<p><?php esc_html_e( 'Το Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου συνδυάζει πολιτισμικές σπουδές, ψηφιακές τεχνολογίες και επικοινωνία, προσφέροντας ένα σύγχρονο και διεπιστημονικό περιβάλλον σπουδών. Με έμφαση στην καινοτομία, την πολιτιστική διαχείριση και την ανάπτυξη ψηφιακού περιεχομένου, προετοιμάζει αποφοίτους για ένα ευρύ φάσμα δημιουργικών, τεχνολογικών και εκπαιδευτικών διαδρομών.', 'tpte' ); ?></p>
						</div>

						<?php
						$mission_items = array(
							array(
								'title' => __( 'Το Τμήμα', 'tpte' ),
								'desc'  => __( 'Το Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας ανήκει στη Σχολή Κοινωνικών Επιστημών του Πανεπιστημίου Αιγαίου, εδρεύει στη Μυτιλήνη και υποδέχεται φοιτητές από το 1ο και 4ο επιστημονικό πεδίο. Ιδρύθηκε το 2000, ως απάντηση στη δυναμική ανάπτυξη της Πολιτισμικής Πληροφορικής, ενός πεδίου που αξιοποιεί τις νέες τεχνολογίες για την ανάλυση, μελέτη, προβολή και δημιουργική επεξεργασία του πολιτισμού. Το Τμήμα είναι μοναδικό στην Ελλάδα ως προς τον συνδυασμό πολιτισμού, επικοινωνίας και ψηφιακής τεχνολογίας. Εστιάζει στις μεθόδους με τις οποίες η ψηφιακή τεχνολογία αναπαριστά, αναδεικνύει και επαναπροσδιορίζει το πολιτισμικό περιεχόμενο, καλλιεργώντας ένα σταθερά διεπιστημονικό ακαδημαϊκό περιβάλλον με εθνική και διεθνή ερευνητική παρουσία.', 'tpte' ),
								'thumb' => 'mission-item-1.jpg',
								'class' => 'tp-our-mission-item-thumb-1',
							),
							array(
								'title' => __( 'Αντικείμενο Σπουδών', 'tpte' ),
								'desc'  => __( 'Αποστολή του Τμήματος είναι η εκπαίδευση νέων επιστημόνων στο δημιουργικό σημείο συνάντησης της Πληροφορικής, της Επικοινωνίας και των Πολιτισμικών Σπουδών, με στόχο την αξιοποίηση τεχνολογιών αιχμής για την παραγωγή, ανάδειξη, δημιουργία, διαχείριση και διάδοση ψηφιακού πολιτιστικού περιεχομένου. Το πρόγραμμα σπουδών καλλιεργεί τη διεπιστημονική σκέψη και συνδυάζει γνώσεις από τις ανθρωπιστικές επιστήμες, την πληροφορική και την επικοινωνία, προσφέροντας ένα στέρεο και σύγχρονο υπόβαθρο. Περιλαμβάνει θεωρία του πολιτισμού, διαχείριση της υλικής και άυλης πολιτιστικής κληρονομιάς, θεωρίες επικοινωνίας και ψηφιακών μέσων, μουσειολογία, μουσειοπαιδαγωγική, εκπαιδευτική τεχνολογία, προγραμματισμό, βάσεις δεδομένων, πληροφοριακά συστήματα, διαδραστικές εφαρμογές, εφαρμογές Ιστού, τεχνητή νοημοσύνη, καθώς και τεχνολογίες ψηφιακής αναπαράστασης και εκτεταμένης πραγματικότητας. Μέσα από αυτό το πλαίσιο, οι φοιτητές αποκτούν τις γνώσεις και τις δεξιότητες που απαιτούνται για τον σχεδιασμό και την υλοποίηση εφαρμογών που υπηρετούν τον πολιτισμό και την πολιτιστική κληρονομιά σε σύγχρονα και διεθνώς ανταγωνιστικά περιβάλλοντα.', 'tpte' ),
								'thumb' => 'mission-item-2.jpg',
								'class' => 'tp-our-mission-item-thumb-3',
							),
							array(
								'title' => __( 'Επαγγελματικές Προοπτικές', 'tpte' ),
								'desc'  => __( 'Οι απόφοιτοι του Τμήματος διαθέτουν ένα σύνθετο και ευέλικτο επαγγελματικό προφίλ, που τους επιτρέπει να δραστηριοποιηθούν σε πεδία όπου συναντώνται η τεχνολογία, ο πολιτισμός, η επικοινωνία και η δημιουργική παραγωγή. Μπορούν να απασχοληθούν στον σχεδιασμό και την ανάπτυξη ψηφιακών εφαρμογών πολιτιστικού περιεχομένου, στη διαχείριση και οργάνωση ψηφιακού ή ψηφιοποιημένου πολιτιστικού υλικού, καθώς και στην προβολή πολιτιστικών οργανισμών και δράσεων σε οπτικοακουστικά και διαδικτυακά μέσα. Παράλληλα, μπορούν να εργαστούν ως σύμβουλοι νέων τεχνολογιών για πολιτιστικούς οργανισμούς και δημιουργικές βιομηχανίες, καλύπτοντας ανάγκες που σχετίζονται με την προβολή, την τεκμηρίωση, την επικοινωνία, την εκπαίδευση και την ψυχαγωγία. Οι επαγγελματικές τους δυνατότητες εκτείνονται στον ιδιωτικό τομέα, σε επιχειρήσεις παραγωγής πολυμέσων, εταιρείες ανάπτυξης λογισμικού και πληροφοριακών συστημάτων, φορείς οργάνωσης πολιτιστικών εκδηλώσεων, ιδιωτικά μουσεία, βιβλιοθήκες, κέντρα τεκμηρίωσης, εκδοτικούς οργανισμούς, μέσα ενημέρωσης και διαφημιστικές εταιρείες. Αντίστοιχα, στον δημόσιο τομέα, μπορούν να απασχοληθούν στην εκπαίδευση, σε υπηρεσίες πολιτιστικής διαχείρισης, σε φορείς του Υπουργείου Πολιτισμού και της Τοπικής Αυτοδιοίκησης, σε δημόσιες βιβλιοθήκες, μουσεία, πινακοθήκες, καθώς και σε θεσμικούς οργανισμούς της Ελλάδας και της Ευρωπαϊκής Ένωσης που δραστηριοποιούνται στον χώρο του πολιτισμού.', 'tpte' ),
								'thumb' => 'mission-item-3.jpg',
								'class' => 'tp-our-mission-item-thumb-2',
							),
                            array(
                                    'title' => __( 'Επαγγελματικά Δικαιώματα', 'tpte' ),
                                    'desc'  => __( 'Οι απόφοιτοι του Τμήματος έχουν τη δυνατότητα να αναπτύξουν επαγγελματική δραστηριότητα στον χώρο της Πληροφορικής, της ψηφιακής δημιουργίας και της πολιτιστικής διαχείρισης, αξιοποιώντας το διεπιστημονικό υπόβαθρο που παρέχουν οι σπουδές τους. Παράλληλα, διαθέτουν τη δυνατότητα επαγγελματικής πορείας στον χώρο της εκπαίδευσης μέσω της ένταξης στον κλάδο ΠΕ86, σύμφωνα με το ισχύον θεσμικό πλαίσιο, καθώς και δυνατότητα λήψης παιδαγωγικής επάρκειας. Η ακαδημαϊκή φυσιογνωμία του Τμήματος ενισχύει ένα σύγχρονο και πολυδιάστατο επαγγελματικό προφίλ, που συνδυάζει τεχνολογικές, επικοινωνιακές και πολιτισμικές δεξιότητες, ανταποκρινόμενο στις απαιτήσεις ενός διαρκώς μεταβαλλόμενου επαγγελματικού περιβάλλοντος.', 'tpte' ),
                                    'thumb' => 'mission-item-3.jpg',
                                    'class' => 'tp-our-mission-item-thumb-2',
                            ),
						);
						$mission_last_index  = count( $mission_items ) - 1;
						$collapse_char_limit = 200;
						foreach ( $mission_items as $i => $item ) :
							$is_last        = ( $i === $mission_last_index );
							$needs_collapse = mb_strlen( $item['desc'] ) > $collapse_char_limit;
							$collapse_id    = 'mission-item-' . $i;
							?>
							<div class="tp-our-mission-item d-flex align-items-center justify-content-center justify-content-md-between<?php echo $is_last ? '' : ' mb-20'; ?>">
								<div class="tp-our-mission-item-content">
									<h4 class="tp-our-mission-item-title"><?php echo esc_html( $item['title'] ); ?></h4>

									<?php if ( $needs_collapse ) : ?>
									<div class="tp-dept-info-text tp-dept-info-text--collapsible tp-about-mission-collapse">
										<div class="tp-dept-info-text-inner" id="<?php echo esc_attr( $collapse_id ); ?>">
											<p><?php echo esc_html( $item['desc'] ); ?></p>
										</div>
										<div class="tp-dept-info-fade"></div>
										<button class="tp-dept-info-toggle" type="button"
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
									<p><?php echo esc_html( $item['desc'] ); ?></p>
									<?php endif; ?>


								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- our-mission-area-end -->


	<!-- about year area start -->
	<section class="tp-about-year-area tp-about-year-background p-relative pt-200 pb-95">
		<div class="tp-about-year-shape">

			<div class="shape-2">
				<img src="<?php echo esc_url( $tp_theme_uri ); ?>/assets/img/our-mission/thumb-2-shape.jpg" alt="">
			</div>
		</div>
		<?php
		$year_slides = array(
			array(
				'year'  => '1996',
				'thumb' => 'thumb-2.jpg',
				'title' => __( '15 New <br> Courses Added', 'tpte' ),
				'desc'  => __( 'Etiam quis sapien in orci feugiat suscipit quis eget risus. Morbi in dapibus magna, et congue tortor. Students loved the system, but the teachers struggled to manage the paperwork and manual tracking.', 'tpte' ),
			),
			array(
				'year'  => '2005',
				'thumb' => 'thumb-3.jpg',
				'title' => __( '8 New <br> Courses Added', 'tpte' ),
				'desc'  => __( 'Etiam quis sapien in orci feugiat suscipit quis eget risus. Morbi in dapibus magna, et congue tortor. Students loved the system, but the teachers struggled to manage the paperwork and manual tracking.', 'tpte' ),
			),
			array(
				'year'  => '2012',
				'thumb' => 'thumb-4.jpg',
				'title' => __( '10 New <br> Courses Added', 'tpte' ),
				'desc'  => __( 'Etiam quis sapien in orci feugiat suscipit quis eget risus. Morbi in dapibus magna, et congue tortor. Students loved the system, but the teachers struggled to manage the paperwork and manual tracking.', 'tpte' ),
			),
			array(
				'year'  => '2017',
				'thumb' => 'thumb-2.jpg',
				'title' => __( '12 New <br> Courses Added', 'tpte' ),
				'desc'  => __( 'Etiam quis sapien in orci feugiat suscipit quis eget risus. Morbi in dapibus magna, et congue tortor. Students loved the system, but the teachers struggled to manage the paperwork and manual tracking.', 'tpte' ),
			),
			array(
				'year'  => '2020',
				'thumb' => 'thumb-3.jpg',
				'title' => __( '6 New <br> Courses Added', 'tpte' ),
				'desc'  => __( 'Etiam quis sapien in orci feugiat suscipit quis eget risus. Morbi in dapibus magna, et congue tortor. Students loved the system, but the teachers struggled to manage the paperwork and manual tracking.', 'tpte' ),
			),
			array(
				'year'  => '2024',
				'thumb' => 'thumb-4.jpg',
				'title' => __( '20 New <br> Courses Added', 'tpte' ),
				'desc'  => __( 'Etiam quis sapien in orci feugiat suscipit quis eget risus. Morbi in dapibus magna, et congue tortor. Students loved the system, but the teachers struggled to manage the paperwork and manual tracking.', 'tpte' ),
			),
		);
		?>
		<div class="tp-about-year-plr tp-about-year-nav">
			<div class="slider slider-nav">
				<?php foreach ( $year_slides as $slide ) : ?>
					<div><h3 class="tp-about-year-nav-title"><?php echo esc_html( $slide['year'] ); ?></h3></div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="tp-about-year-box">
			<div class="container">
				<div class="row align-items-center">
					<div class="slider slider-for">
						<?php foreach ( $year_slides as $slide ) : ?>
							<div class="tp-about-year-inner">
								<div class="row align-items-center">
									<div class="col-lg-6">
										<div class="tp-about-year-thumb">
											<img src="<?php echo esc_url( $tp_theme_uri ); ?>/assets/img/our-mission/<?php echo esc_attr( $slide['thumb'] ); ?>" alt="">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="tp-about-year-content">
											<h4 class="tp-about-year-content-title"><?php echo wp_kses_post( $slide['title'] ); ?></h4>
											<p><?php echo esc_html( $slide['desc'] ); ?></p>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- about year area end -->


	<!-- research fields area start -->
	<section class="tp-about-campus-area tp-about-research-area grey-bg p-relative pb-120 pt-120">
		<div class="tp-about-campus-shape">
			<div class="shape-1">
				<img src="<?php echo esc_url( $tp_theme_uri ); ?>/assets/img/campus/campuses-shape-1.jpg" alt="">
			</div>
			<div class="shape-2">
				<img src="<?php echo esc_url( $tp_theme_uri ); ?>/assets/img/campus/campuses-shape-2.jpg" alt="">
			</div>
		</div>
		<?php
		$research_fields = array(
			array(
				'id'        => 'research-digital-museology',
				'tab_label' => __( 'Ψηφιακή Μουσειολογία', 'tpte' ),
				'title'     => __( 'Εργαστήριο Μουσειολογίας', 'tpte' ),
				'thumb'     =>  'yellow.jpg',
				'logo'      =>  'museolab.png',
				'cta_text'  => __( 'Μάθετε Περισσότερα', 'tpte' ),
				'cta_url'   => 'https://museologylab.ct.aegean.gr',
			),
			array(
				'id'        => 'research-cultural-heritage',
				'tab_label' => __( 'Πολιτισμική Κληρονομιά', 'tpte' ),
				'title'     => __( 'Εργαστήριο Διαχείρισης της Πολιτισμικής Κληρονομιάς ', 'tpte' ),
				'thumb'     => 'heritage.jpg',
				'logo'      => 'chml.png',
				'cta_text'  => __( 'Μάθετε Περισσότερα', 'tpte' ),
				'cta_url'   => 'https://chmlab.aegean.gr/',
			),
			array(
				'id'        => 'privasi-research',
				'tab_label' => __( 'Τεχνολογίες Προστασίας Ιδιωτικότητας', 'tpte' ),
				'title'     => __( 'Εργαστήριο Τεχνολογίες Προστασίας της
Ιδιωτικότητας και Εφαρμογές Πληροφορικής στις Κοινωνικές Επιστήμες', 'tpte' ),
				'thumb'     => 'privasi-visual.png',
				'logo'      => 'privasi.png',
				'cta_text'  => __( 'Μάθετε Περισσότερα', 'tpte' ),
				'cta_url'   => 'privasi.aegean.gr',
			),
			array(
				'id'        => 'research-digital-storytelling',
				'tab_label' => __( 'Τεχνητή Νοημοσύνη', 'tpte' ),
				'title'     => __( 'Εργαστήριο Ευφυών Συστημάτων', 'tpte' ),
				'thumb'     => 'AI.png',
				'logo'      => 'ilab.png',
				'cta_text'  => __( 'Μάθετε Περισσότερα', 'tpte' ),
				'cta_url'   => 'https://i-lab.aegean.gr',
			),
			array(
				'id'        => 'research-educational-tech',
				'tab_label' => __( 'Εννοιολογική Μοντελοποίηση - Εκπαιδευτική Ρομποτική', 'tpte' ),
				'title'     => __( 'Εργαστήριο Πολιτισμικών Πληροφορικών Συστημάτων ', 'tpte' ),
				'thumb'     => 'connecting-nodes.png',
				'logo'      => 'cil.png',
				'cta_text'  => __( 'Μάθετε Περισσότερα', 'tpte' ),
				'cta_url'   => 'https://cilab.aegean.gr',
			),
			array(
				'id'        => 'research-picture',
				'tab_label' => __( 'Εικόνα, Ήχος, Πολιτιστική Αναπαράσταση και Εικονική Πραγματικότητα', 'tpte' ),
				'title'     => __( 'Εργαστήριο Εικόνας, Ήχου και Πολιτιστικής Αναπαράστασης', 'tpte' ),
				'thumb'     => 'vr.png',
				'logo'      => 'ps.png',
				'cta_text'  => __( 'Μάθετε Περισσότερα', 'tpte' ),
				'cta_url'   => 'https://www.cultural-representation.com/el/',
			),
		);
		?>
		<div class="container">
			<div class="row">
				<div class="col-lg-5">
					<div class="tp-about-campus-tab tp-about-research-tab wow fadeInUp" data-wow-delay=".3s">
						<div class="tp-about-campus-heading">
							<h4 class="tp-about-campus-title"><?php esc_html_e( 'Ερευνητικά Πεδία', 'tpte' ); ?></h4>
							<p><?php esc_html_e( 'Το Τμήμα αναπτύσσει και υποστηρίζει ερευνητικές δράσεις με έντονο διεπιστημονικό χαρακτήρα, υλοποιώντας προγράμματα που συμβάλλουν στην καταγραφή, ανάλυση και ανάδειξη πτυχών του ελληνικού, ευρωπαϊκού και παγκόσμιου πολιτισμού μέσα από την παραγωγή και διαχείριση σύγχρονων πολιτισμικών υπηρεσιών και προϊόντων. Στο πλαίσιο αυτό, ευθυγραμμίζεται με τις διεθνείς εξελίξεις και προδιαγραφές, προωθώντας ένα σύγχρονο πλαίσιο οργάνωσης και αξιοποίησης του πολιτισμού και της επικοινωνίας. Παράλληλα, ενισχύει τη συνεργασία με δημόσιους και ιδιωτικούς φορείς για την υλοποίηση ερευνητικών έργων σε εθνικό και διεθνές επίπεδο. Η ερευνητική δραστηριότητα υποστηρίζεται από έξι θεσμοθετημένα εργαστήρια και περιλαμβάνει και την εκπόνηση πρωτότυπων διδακτορικών διατριβών, ενισχύοντας τη δημιουργία νέας γνώσης και την ανάπτυξη εξειδικευμένου επιστημονικού δυναμικού.', 'tpte' ); ?></p>
						</div>
						<ul class="nav nav-tabs tp-about-research-nav" id="researchTab" role="tablist">
							<?php foreach ( $research_fields as $i => $field ) : $active = 0 === $i; ?>
								<li class="nav-item" role="presentation">
									<button class="nav-link<?php echo $active ? ' active' : ''; ?>" id="<?php echo esc_attr( $field['id'] ); ?>-tab" data-bs-toggle="tab" data-bs-target="#<?php echo esc_attr( $field['id'] ); ?>" type="button" role="tab" aria-controls="<?php echo esc_attr( $field['id'] ); ?>" aria-selected="<?php echo $active ? 'true' : 'false'; ?>"><?php echo esc_html( $field['tab_label'] ); ?></button>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
				<div class="col-lg-7">
					<div class="tab-content wow fadeInUp" data-wow-delay=".5s" id="researchTabContent">
						<?php foreach ( $research_fields as $i => $field ) : $active = 0 === $i; ?>
							<div class="tab-pane fade<?php echo $active ? ' show active' : ''; ?>" id="<?php echo esc_attr( $field['id'] ); ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr( $field['id'] ); ?>-tab">
								<div class="tp-about-campus-box tp-about-research-box p-relative">
									<div class="tp-about-campus-thumb">
										<img src="<?php echo esc_url( $tp_theme_uri ); ?>/assets/img/about/lab-thumbnails/<?php echo esc_attr( $field['thumb'] ); ?>" alt="<?php echo esc_attr( $field['title'] ); ?>">
									</div>
									<div class="tp-about-campus-content tp-about-research-content d-flex align-items-center justify-content-between">
										<div class="tp-about-research-info d-flex align-items-center">
											<div class="tp-about-research-logo">
												<?php if ( ! empty( $field['logo'] ) ) : ?>
													<img src="<?php echo esc_url( $tp_theme_uri . '/assets/img/about/lab-logos/' . $field['logo'] ); ?>" alt="">
												<?php else : ?>
													<span class="tp-about-research-logo-placeholder" aria-hidden="true"></span>
												<?php endif; ?>
											</div>
											<h5 class="tp-about-research-title"><?php echo esc_html( $field['title'] ); ?></h5>
										</div>
										<div class="tp-about-campus-btn">
											<a class="tp-btn" href="<?php echo esc_url( $field['cta_url'] ); ?>"><?php echo esc_html( $field['cta_text'] ); ?></a>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- research fields area end -->

	<?php
endwhile;

get_footer();
