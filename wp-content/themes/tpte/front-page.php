<?php
/**
 * The front page template file
 *
 * This is the template for the front page of the site.
 * Based on the Acadia template design.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tpte
 */

get_header();
?>

<!-- hero-area-start -->
<section class="tp-hero-area">
	<div class="swiper tp-slider-active">
		<div class="swiper-wrapper">
			<?php
            // Hero slides – main-hero images from theme assets
            $hero_img = get_template_directory_uri() . '/assets/img/tpte-home/';
            $slides = array(
                array(
                    'subtitle' => __('ΤΜΗΜΑ ΠΟΛΙΤΙΣΜΙΚΗΣ ΤΕΧΝΟΛΟΓΙΑΣ & ΕΠΙΚΟΙΝΩΝΙΑΣ', 'tpte'),
                    'title'    => __('Πολιτισμός και Τεχνολογία', 'tpte'),
                    'bg'       => $hero_img . 'main-hero-1.png',
                ),
                array(
                    'subtitle' => __('ΠΡΟΠΤΥΧΙΑΚΕΣ ΣΠΟΥΔΕΣ', 'tpte'),
                    'title'    => __('Ψηφιακά Μέσα και Επικοινωνία', 'tpte'),
                    'bg'       => $hero_img . 'main-hero-2.png',
                ),
                array(
                    'subtitle' => __('ΔΙΕΠΙΣΤΗΜΟΝΙΚΟ ΠΕΡΙΒΑΛΛΟΝ', 'tpte'),
                    'title'    => __('Σχεδιασμός και Ανάλυση', 'tpte'),
                    'bg'       => $hero_img . 'main-hero-3.png',
                ),
            );

foreach ($slides as $slide) :
    ?>
				<div class="swiper-slide">
					<div class="tp-hero-item">
						<div class="container">
							<div class="row">
								<div class="col-xxl-9 col-lg-11">
									<div class="tp-hero-wrapper">
										<span class="tp-hero-subtitle"><?php echo esc_html($slide['subtitle']); ?></span>
										<h2 class="tp-hero-title"><?php echo esc_html($slide['title']); ?></h2>
										<div class="tp-hero-btn">
											<a class="tp-btn" href="<?php echo esc_url(get_permalink(get_page_by_path('programs'))); ?>">
												<?php esc_html_e('Μάθε Περισσότερα', 'tpte'); ?>
												<span>
													<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M1 7H13" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
														<path d="M7 1L13 7L7 13" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
													</svg>
												</span>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tp-hero-bg" data-background="<?php echo esc_url($slide['bg']); ?>"></div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<!-- hero-area-end -->

<!-- service-area-start -->
<!--<section class="service-area tp-service-bg" data-background="--><?php //echo esc_url( get_template_directory_uri() );?><!--/assets/img/custom/home/background-home.webp">-->
    <section class="service-area tp-service-bg" style="background-color:#488ecc">
	<div class="container">
		<div class="row">
            <?php
            $services = [
                    [
                            'icon'  => 'department-building.svg',
                            'title' => __('Γιατί <br> ΤΠΤΕ;', 'tpte'),
                            'desc'  => __('Γνωρίστε το όραμα, τη φιλοσοφία και το ακαδημαϊκό περιβάλλον που διαμορφώνουν ένα σύγχρονο και εξωστρεφές τμήμα.', 'tpte'),
                            'link'  => 'about',
                            'delay' => '.3s',
                    ],
                    [
                            'icon'  => 'briefcase.svg',
                            'title' => __('Επαγγελματικές <br> Προοπτικές', 'tpte'),
                            'desc'  => __('Ανακαλύψτε τις δυνατότητες σταδιοδρομίας και τα επαγγελματικά πεδία που ανοίγονται μέσα από τις γνώσεις και τις δεξιότητες του τμήματος.', 'tpte'),
                            'link'  => 'requirements',
                            'delay' => '.5s',
                    ],
                    [
                            'icon'  => 'pen-clipboard.svg',
                            'title' => __('Εισαγωγή <br> στο Τμήμα', 'tpte'),
                            'desc'  => __('Μάθετε τις βασικές πληροφορίες για τη δομή, τις σπουδές και τη διαδικασία ένταξης στο ακαδημαϊκό περιβάλλον του τμήματος.', 'tpte'),
                            'link'  => 'admissions',
                            'delay' => '.7s',
                    ],
                    [
                            'icon'  => 'book.svg',
                            'title' => __('Ποιότητα <br> Σπουδών', 'tpte'),
                            'desc'  => __('Εξερευνήστε το επίπεδο διδασκαλίας, το πρόγραμμα μαθημάτων και τις ακαδημαϊκές πρακτικές που διασφαλίζουν υψηλή ποιότητα μάθησης.', 'tpte'),
                            'link'  => 'fees',
                            'delay' => '.9s',
                    ],
            ];



foreach ($services as $service) :
    ?>
                <div class="col-lg-3 col-md-6">
					<div class="tp-service-item text-center mb-40 wow fadeInUp" data-wow-delay="<?php echo esc_attr($service['delay']); ?>">
						<div class="tp-service-wrap">
							<div class="tp-service-icon">
								<span><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/svg/<?php echo esc_attr($service['icon']); ?>" alt="service-icon" width="70"></span>
							</div>
							<h4 class="tp-service-title"><a href="<?php echo esc_url(get_permalink(get_page_by_path($service['link']))); ?>"><?php echo wp_kses_post($service['title']); ?></a></h4>
							<div class="tp-service-btn">
								<a href="<?php echo esc_url(get_permalink(get_page_by_path($service['link']))); ?>">
									<span>
										<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M1 6H11" stroke="#161613" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M6 1L11 6L6 11" stroke="#161613" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
									</span>
								</a>
							</div>
						</div>
						<div class="tp-service-content">
							<p><?php echo esc_html($service['desc']); ?></p>
						</div>
					</div>
				</div>
			    <?php endforeach; ?>
        </div>
		<div class="row">
			<div class="col-lg-12">
				<div class="tp-service-all text-center">
					<span><?php esc_html_e('Ένα Τμήμα του', 'tpte'); ?> <a href="<?php echo esc_url(get_permalink(get_page_by_path('about'))); ?>"><?php esc_html_e('Πανεπιστημίου Αιγαίου', 'tpte'); ?>
						<svg width="10" height="10" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M1 6H11" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M6 1L11 6L6 11" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						</svg></a>
					</span>
				</div>
			</div>
		</div>
	</div>
	<div class="tp-service-shape">
		<div class="tp-service-shape-1 wow bounceIn" data-wow-duration="1.5s" data-wow-delay=".4s">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/logo/uaegean.svg" alt="uaegean logo" width="150">
		</div>
	</div>
</section>
<!-- service-area-end -->

<!-- about-area-start -->
<section class="about-area tp-about-bg grey-bg pt-105">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="tp-about-wrap mb-60 wow fadeInLeft" data-wow-delay=".3s">
					<div class="tp-about-thumb-wrapper">
						<div class="tp-about-thumb-1">
							<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/tpte-home/home-about-1-1.png" alt="">
						</div>
						<div class="tp-about-thumb-2">
							<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/tpte-home/home-about-2.png" alt="">
						</div>
					</div>
					<div class="tp-about-shape">
						<div class="tp-about-shape-1">
							<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/about/about-shape-1.jpg" alt="">
						</div>
<!--						<div class="tp-about-shape-2">-->
<!--							<img src="--><?php //echo esc_url(get_template_directory_uri()); ?><!--/assets/img/about/about-shape-2.jpg" alt="">-->
<!--						</div>-->
					</div>
					<div class="tp-about-exprience">
						<div class="tp-about-exprience-text d-flex">
							<h3 class="tp-about-exprience-count">
								<span data-purecounter-duration="1" data-purecounter-end="26" class="purecounter"></span>
							</h3>
							<p><?php esc_html_e('Χρόνια', 'tpte'); ?> <br> <?php esc_html_e('Λειτουργίας', 'tpte'); ?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="tp-about-wrapper mb-60 wow fadeInRight" data-wow-delay=".3s">
					<div class="tp-section mb-40">
						<h5 class="tp-section-subtitle"><?php esc_html_e('σχετικα με το τμημα', 'tpte'); ?></h5>
						<h3 class="tp-section-title mb-30">Λίγα λόγια για  <br /> το
							<span> <?php esc_html_e('ΤΠΤΕ', 'tpte'); ?>
<!--                                <div style="position: relative; right: 38px;">-->
<!--                                    <svg width="140" height="13" viewBox="0 0 180 13" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M173.163 12.3756C97.1838 -3.8242 30.6496 5.67799 7.32494 12.2553C5.30414 12.8252 2.43544 12.6722 0.917529 11.9135C-0.600387 11.1549 -0.192718 10.0779 1.82808 9.50807C27.5427 2.25675 98.002 -7.60121 177.683 9.38783C179.881 9.85641 180.65 10.9051 179.402 11.7301C178.154 12.5552 175.361 12.8442 173.163 12.3756Z" fill="currentColor" />-->
<!--                                    </svg>-->
<!--                                </div>-->
							</span>
						</h3>
						<p><?php esc_html_e('Στο Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας καλλιεργούμε την καινοτομία, συνδυάζοντας τον πολιτισμό με τις σύγχρονες ψηφιακές και διαδραστικές τεχνολογίες. Δημιουργούμε ένα δυναμικό περιβάλλον μάθησης και έρευνας, όπου η θεωρία συναντά την πράξη και η δημιουργικότητα ενισχύεται μέσα από την κριτική σκέψη, τη συνεργασία και τον πειραματισμό.', 'tpte'); ?></p>
						<p class="tp-about-signature mt-15 tpt-no-line-before"><em>— <?php esc_html_e('Καθ. Ευαγγελία Καβακλή', 'tpte'); ?>, <?php esc_html_e('Πρόεδρος Τμήματος', 'tpte'); ?></em></p>
					</div>
					<!-- Department Highlights Row -->
					<div class="tp-about-highlights mt-40">
						<div class="row">
                            <h5 class="tp-about-highlight-title mb-20" style="padding: 0 40px">
                                Εκεί που συναντίουνται...
                            </h5>
							<div class="col-6">
								<div class="tp-about-highlight-item text-center">
									<div class="tp-about-highlight-icon mb-15">
										<span><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/svg/culture.svg" alt="innovation-icon" width="50"></span>
									</div>

									<h5 class="tp-about-highlight-title"><?php esc_html_e('Πολιτισμός & Έκφραση', 'tpte'); ?></h5>
									<p><?php esc_html_e('Αξίες, ταυτότητες και  δημιουργικές πρακτικές της κοινωνίας.', 'tpte'); ?></p>
								</div>
							</div>
							<div class="col-6">
								<div class="tp-about-highlight-item text-center">
									<div class="tp-about-highlight-icon mb-15">
										<span><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/svg/laptop.svg" alt="community-icon" width="55"></span>
									</div>
									<h5 class="tp-about-highlight-title"><?php esc_html_e('Τεχνολογία & Καινοτομία', 'tpte'); ?></h5>
									<p><?php esc_html_e('Ανάλυση, δημιουργία και ανάδειξη του πολιτισμικού περιεχομένου', 'tpte'); ?></p>
								</div>
							</div>
						</div>
					</div>
<!--					<div class="tp-about-list mt-35">-->
<!--						<div class="tp-about-list-item d-flex align-items-center mb-35">-->
<!--							<div class="tp-about-list-icon">-->
<!--								<span><img src="--><?php //echo esc_url(get_template_directory_uri()); ?><!--/assets/img/icon/about/about-icon-1.svg" alt="about-icon"></span>-->
<!--							</div>-->
<!--							<div class="tp-about-list-content">-->
<!--								<h5 class="tp-about-list-title">--><?php //esc_html_e('Χτίζοντας Εμπιστοσύνη', 'tpte'); ?><!--</h5>-->
<!--								<p>--><?php //esc_html_e('Δεσμευόμαστε στην οικοδόμηση εμπιστοσύνης', 'tpte'); ?><!--</p>-->
<!--							</div>-->
<!--						</div>-->
<!--						<div class="tp-about-list-item d-flex align-items-center mb-35">-->
<!--							<div class="tp-about-list-icon">-->
<!--								<span><img src="--><?php //echo esc_url(get_template_directory_uri()); ?><!--/assets/img/icon/about/about-icon-2.svg" alt="about-icon"></span>-->
<!--							</div>-->
<!--							<div class="tp-about-list-content">-->
<!--								<h5 class="tp-about-list-title">--><?php //esc_html_e('Εμπιστοσύνη των Φοιτητών', 'tpte'); ?><!--</h5>-->
<!--								<p>--><?php //esc_html_e('Αξιόπιστο & συνιστώμενο από φοιτητές', 'tpte'); ?><!--</p>-->
<!--							</div>-->
<!--						</div>-->
<!--						<div class="tp-about-btn pt-10">-->
<!--							<a class="tp-btn tp-btn-sm" href="--><?php //echo esc_url(get_permalink(get_page_by_path('apply'))); ?><!--">--><?php //esc_html_e('Book an Appointment', 'tpte'); ?>
<!--								<span>-->
<!--									<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--										<path d="M1 7H13" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--										<path d="M7 1L13 7L7 13" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--									</svg>-->
<!--								</span>-->
<!--							</a>-->
<!--						</div>-->
<!--					</div>-->
				</div>
			</div>
		</div>
	</div>
</section>
<!-- about-area-end -->

<!-- counter-area-start -->
<section class="counter-area tp-counter-wrap mb-90">
	<div class="container">
		<div class="tp-counter-bg tp-counter-bg-primary wow fadeInUp" data-wow-delay=".3s" style="background-color: var(--tp-theme-primary); background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/tpte-home/dot-bg.png'); background-position: center; background-repeat: no-repeat; background-size: contain;">
			<div class="row justify-content-center">
				<?php
				$counters_row1 = array(
					array('count' => '2000', 'unit' => '', 'label' => __('Φοιτητές', 'tpte')),
					array('count' => '6', 'unit' => '', 'label' => __('Εργαστήρια', 'tpte')),
					array('count' => '4000', 'unit' => '', 'label' => __('Δημοσιεύσεις', 'tpte')),
				);
				foreach ($counters_row1 as $counter) : ?>
					<div class="col-lg-4 col-md-6">
						<div class="tp-counter-item text-center">
							<h3 class="tp-counter-count mb-10">
								<span data-purecounter-duration="1" data-purecounter-end="<?php echo esc_attr($counter['count']); ?>" class="purecounter"></span><?php echo esc_html($counter['unit']); ?>
							</h3>
							<p><?php echo esc_html($counter['label']); ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="row justify-content-center">
				<?php
				$counters_row2 = array(
					array('count' => '2228', 'unit' => '', 'label' => __('Απόφοιτοι', 'tpte')),
					array('count' => '7', 'unit' => '', 'label' => __('Μέλη ΔΕΠ', 'tpte')),
					array('count' => '80000', 'unit' => '', 'label' => __('Βιβλιογραφικές Αναφορές', 'tpte')),
				);
				foreach ($counters_row2 as $counter) : ?>
					<div class="col-lg-4 col-md-6">
						<div class="tp-counter-item text-center">
							<h3 class="tp-counter-count mb-10">
								<span data-purecounter-duration="1" data-purecounter-end="<?php echo esc_attr($counter['count']); ?>" class="purecounter"></span><?php echo esc_html($counter['unit']); ?>
							</h3>
							<p><?php echo esc_html($counter['label']); ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
<!-- counter-area-end -->

<!-- program-area-start -->
<section class="program-area mb-75">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="tp-program-wrap wow fadeInUp" data-wow-delay=".3s">
					<div class="tp-section text-center mb-55">
						<h3 class="tp-section-title">
							<span> <?php esc_html_e('Προγράμματα', 'tpte'); ?>
<!--								<img width="200" tp-underline-shape-2 wow bounceIn" data-wow-duration="1.5s" data-wow-delay=".4s" src="--><?php //echo esc_url(get_template_directory_uri()); ?><!--/assets/img/unlerline/program-1-svg-1.svg" alt="">-->
							</span> <?php esc_html_e('Σπουδών', 'tpte'); ?>
						</h3>
						<p><?php esc_html_e('Εξερευνήστε τα προπτυχιακά και μεταπτυχιακά προγράμματα του τμήματος.', 'tpte'); ?></p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="swiper tp-program-active wow fadeInUp" data-wow-delay=".6s">
					<div class="swiper-wrapper">
						<?php
        // Προγράμματα Σπουδών – προπτυχιακό + μεταπτυχιακά
        $programs = array(
            array(
                'title' => __('Πολιτισμική Τεχνολογία & Επικοινωνία', 'tpte'),
                'desc'  => __('Προπτυχιακό πρόγραμμα σπουδών του Τμήματος Πολιτισμικής Τεχνολογίας και Επικοινωνίας.', 'tpte'),
                'image' => 'program-thumb-1.jpg',
                'tag'   => __('Προπτυχιακό πρόγραμμα σπουδών', 'tpte'),
            ),
            array(
                'title' => __('Πολιτισμική πληροφορική και επικοινωνία', 'tpte'),
                'desc'  => __('Μεταπτυχιακό πρόγραμμα σπουδών στον τομέα της πολιτισμικής πληροφορικής και επικοινωνίας.', 'tpte'),
                'image' => 'program-thumb-2.jpg',
                'tag'   => __('Πρόγραμμα Μεταπτυχιακών Σπουδών', 'tpte'),
            ),
            array(
                'title' => __('Διαχείριση Μνημείων: Αρχαιολογία, Πόλη και Αρχιτεκτονική', 'tpte'),
                'desc'  => __('Μεταπτυχιακό πρόγραμμα σπουδών στη διαχείριση μνημείων, αρχαιολογία και αρχιτεκτονική.', 'tpte'),
                'image' => 'program-thumb-3.jpg',
                'tag'   => __('Πρόγραμμα Μεταπτυχιακών Σπουδών', 'tpte'),
            ),
            array(
                'title' => __('Ευφυή Συστήματα Πληροφορικής', 'tpte'),
                'desc'  => __('Μεταπτυχιακό πρόγραμμα σπουδών στα ευφυή συστήματα και τις τεχνολογίες πληροφορικής.', 'tpte'),
                'image' => 'program-thumb-1.jpg',
                'tag'   => __('Πρόγραμμα Μεταπτυχιακών Σπουδών', 'tpte'),
            ),
        );

foreach ($programs as $program) :
    ?>
							<div class="swiper-slide tp-program-item grey-bg mb-50">
								<div class="tp-program-thumb fix">
									<a href="<?php echo esc_url(get_permalink(get_page_by_path('apply'))); ?>">
										<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/program/<?php echo esc_attr($program['image']); ?>" alt="program-thumb">
									</a>
								</div>
								<div class="tp-program-content">
									<h3 class="tp-program-title">
										<a href="<?php echo esc_url(get_permalink(get_page_by_path('apply'))); ?>"><?php echo esc_html($program['title']); ?></a>
									</h3>
									<p><?php echo esc_html($program['desc']); ?></p>
									<div class="tp-program-tag">
										<p>
											<span><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/icon/program-tag-1.svg" alt="program-icon"></span>
											<?php echo esc_html($program['tag']); ?>
										</p>
									</div>
								</div>
								<div class="tp-program-btn">
									<a href="<?php echo esc_url(get_permalink(get_page_by_path('apply'))); ?>"><?php esc_html_e('Δήλωση Συμμετοχής', 'tpte'); ?></a>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="tp-program-dot text-center"></div>
			</div>
			<div class="col-12">
<!--				<div class="tp-program-all text-center">-->
<!--					<p>--><?php //esc_html_e('Εξερευνήστε το κατάλληλο πρόγραμμα σπουδών.', 'tpte'); ?>
<!--						<a href="--><?php //echo esc_url(get_permalink(get_page_by_path('programs'))); ?><!--">--><?php //esc_html_e('Όλα τα Προγράμματα', 'tpte'); ?>
<!--							<span>-->
<!--								<svg width="10" height="10" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--									<path d="M1 6H11" stroke="#AB0C2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--									<path d="M6 1L11 6L6 11" stroke="#AB0C2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--								</svg>-->
<!--							</span>-->
<!--						</a>-->
<!--					</p>-->
<!--				</div>-->
			</div>
		</div>
	</div>
</section>
<!-- program-area-end -->


<!-- testimonial-area-start -->
<?php $tp_theme_uri = get_template_directory_uri(); ?>
<!--<section class="testimonial-area tp-testimonial-bg fix p-relative" data-background="--><?php //echo esc_url($tp_theme_uri); ?><!--/assets/img/bg/testimonial-bg-2.jpg">-->
    <section class="testimonial-area tp-testimonial-bg fix p-relative" style="background-color:#2F5F8F;">
    <div class="tp-testimonial-themebg">
        <span></span>
        <div class="tp-testimonial-themebg-shape">
            <svg xmlns="http://www.w3.org/2000/svg" width="535" height="589" viewBox="0 0 535 589" fill="none">
                <path opacity="0.7" d="M672.795 521.502C795.919 462.123 941.766 315.053 575.585 407.022C209.405 498.991 663.448 296.262 821.272 155.066C984.981 8.6419 29.9011 198.484 51.0545 348.604C72.2078 498.724 448.9 347.441 415.406 56.2717" stroke="#fafafa" stroke-width="100" stroke-linecap="square"/>
            </svg>
        </div>
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="tp-video-wrap d-flex">
                    <div class="tp-video-icon text-center">
                        <a class="video-border-animation popup-video" href="https://www.youtube.com/watch?v=kJUvtcVn2aw">
                          <span>
                             <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 1.83167C0 1.0405 0.875246 0.562658 1.54076 0.990487L14.6915 9.44454C15.3038 9.83817 15.3038 10.7333 14.6915 11.1269L1.54076 19.5809C0.875246 20.0088 0 19.5309 0 18.7398V1.83167Z" fill="currentColor"/>
                             </svg>
                          </span>
                        </a>
                        <p><?php esc_html_e('Βίντεο Ξενάγησης', 'tpte'); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="tp-testimonial-wrapper wow fadeInRight" data-wow-delay=".3s">
                    <div class="tp-section mb-40">
                        <h5 class="tp-section-subtitle"><?php esc_html_e('ΤΙ ΕΧΟΥΝ ΠΕΙ ΓΙΑ ΤΟ ΤΜΗΜΑ', 'tpte'); ?></h5>
                        <h3 class="tp-section-title"><?php esc_html_e('Η Απόφοιτοι μας έχουν αναφέρει...', 'tpte'); ?></h3>
                    </div>
                    <div class="tp-testimonial-shape">
                        <div class="tp-testimonial-shape-1">
                            <img src="<?php echo esc_url($tp_theme_uri); ?>/assets/img/testimonial/testimonial-shape-1.png" alt="testimonial-shape">
                        </div>
                        <div class="tp-testimonial-shape-2">
                            <img src="<?php echo esc_url($tp_theme_uri); ?>/assets/img/testimonial/testimonial-shape-2.png" alt="testimonial-shape">
                        </div>
<!--                        <div class="tp-testimonial-shape-3 wow bounceIn" data-wow-duration="1.5s" data-wow-delay=".4s">-->
<!--                            <img src="--><?php //echo esc_url($tp_theme_uri); ?><!--/assets/img/testimonial/testimonial-shape-3.svg" alt="testimonial-shape">-->
<!--                        </div>-->
                    </div>
                    <div class="swiper tp-testimonial-active">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide tp-testimonial-item">
                                <div class="tp-testimonial-avatar">
                                    <img src="<?php echo esc_url($tp_theme_uri); ?>/assets/img/testimonial/testimonial-avatar-1.png" alt="testimonial-avatar">
                                </div>
                                <div class="tp-testimonial-content">
                                    <p>“Οι σπουδές στο ΤΠΤΕ μου έδωσαν τα εργαλεία να συνδυάσω πολιτισμό και τεχνολογία. Το ακαδημαϊκό περιβάλλον και η υποστήριξη των καθηγητών ήταν καθοριστικά για την πορεία μου.”</p>
                                </div>
                                <div class="tp-testimonial-avatar-info">
                                    <h4 class="tp-testimonial-avatar-title"><?php esc_html_e('Μαρία Παπαδοπούλου', 'tpte'); ?></h4>
                                    <span><?php esc_html_e('Απόφοιτη', 'tpte'); ?></span>
                                </div>
                            </div>
                            <div class="swiper-slide tp-testimonial-item">
                                <div class="tp-testimonial-avatar">
                                    <img src="<?php echo esc_url($tp_theme_uri); ?>/assets/img/testimonial/test-2-avatar-4.png" alt="testimonial-avatar">
                                </div>
                                <div class="tp-testimonial-content">
                                    <p>“Το μεταπτυχιακό πρόγραμμα σε πολιτισμική πληροφορική ξεπέρασε τις προσδοκίες μου. Αποκτήσαμε πρακτική εμπειρία σε έργα ψηφιοποίησης και διαχείρισης πολιτιστικού περιεχομένου.»</p>
                                </div>
                                <div class="tp-testimonial-avatar-info">
                                    <h4 class="tp-testimonial-avatar-title"><?php esc_html_e('Νίκος Γεωργίου', 'tpte'); ?></h4>
                                    <span><?php esc_html_e('Απόφοιτος', 'tpte'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tp-testimonial-arrow text-md-end">
                        <div class="tp-testimonial-prev">
                          <span>
                             <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 6H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M6 1L1 6L6 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                             </svg>
                          </span>
                        </div>
                        <div class="tp-testimonial-next">
                          <span>
                             <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 6H11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M6 1L11 6L6 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                             </svg>
                          </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- testimonial-area-end -->



<!-- event-area -->
      <section class="event-area grey-bg pt-85 pb-110">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-xl-5 col-md-8">
                    <div class="tp-event-section mb-60 wow fadeInUp" data-wow-delay=".2s">
                        <div class="tp-section">
                            <h3 class="tp-section-2-title">Πρόσφατες & Προσεχείς 
                                <span> Εκδηλώσεις <img class="tp-underline-shape-3 wow bounceIn" data-wow-duration="1.5s" data-wow-delay=".4s" src="assets/img/unlerline/event-1-svg-1.svg" alt="">
                           </span>
                            </h3>
                        </div>
                    </div>
                </div>
            <div class="col-xl-7 col-md-4">
                    <div class="tp-event-btn text-md-end mb-70">
                        <a class="tp-btn" href="<?php echo esc_url( get_post_type_archive_link( 'tpte_event' ) ); ?>">See More Events
                            <span>
                              <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M1 7H13" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M7 1L13 7L7 13" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                              </svg>
                           </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="tp-event-wrap wow fadeInUp" data-wow-delay=".3s">
                <?php
                $events_query = new WP_Query( array(
                    'post_type'      => 'tpte_event',
                    'posts_per_page' => 5,
                    'meta_key'       => '_event_start_date',
                    'orderby'        => 'meta_value',
                    'order'          => 'DESC',
                ) );

                if ( $events_query->have_posts() ) :
                    while ( $events_query->have_posts() ) :
                        $events_query->the_post();
                        get_template_part( 'template-parts/content', 'event-row' );
                    endwhile;
                    wp_reset_postdata();
                else :
                    ?>
                    <p><?php esc_html_e( 'No events found.', 'tpte' ); ?></p>
                    <?php
                endif;
                ?>
            </div>
        </div>
    </section>
<!-- event-area-end -->

<!-- cta-area-start -->
<?php
// CTA rotator slides — edit here to change the rotating title + button text/link.
$cta_slides = array(
	array(
		'title'    => __( 'ΔΥΟ ΚΑΘΗΓΗΤΕΣ ΤΟΥ ΤΜΗΜΑΤΟΣ ΜΑΣ ΕΙΝΑΙ ΣΤΟ 2% ΤΩΝ ΚΑΛΥΤΕΡΩΝ ΕΠΙΣΤΗΜΟΝΩΝ ΠΑΓΚΟΣΜΙΩΣ;', 'tpte' ),
		'btn_text' => __( 'Περισσότερα', 'tpte' ),
		'btn_url'  => get_permalink( get_page_by_path( 'apply' ) ),
	),
	array(
		'title'    => __( 'ΤΟ ΤΜΗΜΑ ΣΥΜΜΕΤΕΧΕΙ ΣΕ ΕΡΕΥΝΗΤΙΚΑ ΕΡΓΑ ΔΙΕΘΝΟΥΣ ΕΜΒΕΛΕΙΑΣ;', 'tpte' ),
		'btn_text' => __( 'Περισσότερα', 'tpte' ),
		'btn_url'  => get_permalink( get_page_by_path( 'research' ) ),
	),
	array(
		'title'    => __( 'ΟΙ ΑΠΟΦΟΙΤΟΙ ΜΑΣ ΕΡΓΑΖΟΝΤΑΙ ΣΕ ΜΟΥΣΕΙΑ, ΜΕΣΑ ΚΑΙ ΤΕΧΝΟΛΟΓΙΚΕΣ ΕΤΑΙΡΕΙΕΣ;', 'tpte' ),
		'btn_text' => __( 'Περισσότερα', 'tpte' ),
		'btn_url'  => get_permalink( get_page_by_path( 'careers' ) ),
	),
);
$cta_interval = 5000; // ms between rotations
?>
<section class="cta-area tp-cta-bg" style="background:rgba(0, 19, 64, .8)" data-cta-interval="<?php echo esc_attr( $cta_interval ); ?>">
	<div class="container">
		<div class="row align-items-center wow fadeInUp" data-wow-delay=".2s">
			<div class=" col-lg-9">
				<div class="tp-cta-wrapper d-flex align-items-center">
					<div class="tp-cta-logo">
						<a href="<?php echo esc_url(home_url('/')); ?>">
							<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/cta/semicolon.png" alt="Ερωτηματικά">
						</a>
					</div>
					<div class="tp-cta-content">
						<span><?php esc_html_e('ΓΝΩΡΙΖΑΤΕ ΟΤΙ...', 'tpte'); ?></span>
						<div class="tp-cta-rotator js-cta-rotator">
							<?php foreach ( $cta_slides as $i => $slide ) : ?>
								<h3 class="tp-cta-new-title tp-cta-slide<?php echo 0 === $i ? ' is-active' : ''; ?>" style="color:#fff; margin-top:5px;"><?php echo esc_html( $slide['title'] ); ?></h3>
							<?php endforeach; ?>
						</div>
						<div class="tp-cta-pagination js-cta-pagination" role="tablist" aria-label="<?php esc_attr_e( 'CTA slides', 'tpte' ); ?>">
							<?php foreach ( $cta_slides as $i => $slide ) : ?>
								<button type="button"
									class="tp-cta-bullet<?php echo 0 === $i ? ' is-active' : ''; ?>"
									data-index="<?php echo (int) $i; ?>"
									role="tab"
									aria-selected="<?php echo 0 === $i ? 'true' : 'false'; ?>"
									aria-label="<?php echo esc_attr( sprintf( __( 'Go to slide %d', 'tpte' ), $i + 1 ) ); ?>"></button>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
			<div class=" col-lg-3">
				<div class="tp-cta-btn-wrap">
					<div class="tp-cta-btn text-lg-end tp-cta-rotator js-cta-rotator">
						<?php foreach ( $cta_slides as $i => $slide ) : ?>
							<a class="tp-btn tp-cta-slide<?php echo 0 === $i ? ' is-active' : ''; ?>" href="<?php echo esc_url( $slide['btn_url'] ); ?>">
								<?php echo esc_html( $slide['btn_text'] ); ?>
								<span>
									<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M1 7H13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
										<path d="M7 1L13 7L7 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>
								</span>
							</a>
						<?php endforeach; ?>
					</div>
					<div class="tp-cta-shape-1">
						<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/cta/cta-shape-1.png" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<script>
	(function () {
		var section = document.querySelector('.cta-area[data-cta-interval]');
		if (!section) { return; }
		var interval = parseInt(section.getAttribute('data-cta-interval'), 10) || 5000;
		var groups = section.querySelectorAll('.js-cta-rotator');
		if (!groups.length) { return; }
		var count = groups[0].querySelectorAll('.tp-cta-slide').length;
		if (count < 2) { return; }
		var bullets = section.querySelectorAll('.js-cta-pagination .tp-cta-bullet');
		var index = 0;
		var timer = null;

		function show(i) {
			index = ((i % count) + count) % count;
			groups.forEach(function (group) {
				group.querySelectorAll('.tp-cta-slide').forEach(function (slide, n) {
					slide.classList.toggle('is-active', n === index);
				});
			});
			bullets.forEach(function (bullet, n) {
				var active = n === index;
				bullet.classList.toggle('is-active', active);
				bullet.setAttribute('aria-selected', active ? 'true' : 'false');
			});
		}

		function start() {
			stop();
			timer = setInterval(function () { show(index + 1); }, interval);
		}
		function stop() {
			if (timer) { clearInterval(timer); timer = null; }
		}

		bullets.forEach(function (bullet) {
			bullet.addEventListener('click', function () {
				var i = parseInt(bullet.getAttribute('data-index'), 10) || 0;
				show(i);
				start(); // reset the timer so user gets full interval on the chosen slide
			});
		});

		start();
	})();
</script>

<!-- blog-area-start -->
<section class="blog-area grey-bg pt-110 pb-95">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="tp-event-section text-center mb-60 wow fadeInUp" data-wow-delay=".2s">
                    <div class="tp-section">
                        <h5 class="tp-section-subtitle">ΕΝΗΜΕΡΩΣΗ</h5>
                        <h3 class="tp-section-2-title">Τα Τελευταία
                            <span>
                             Νέα
                             <svg class="tp-underline-shape-4 wow bounceIn" data-wow-duration="1.5s" data-wow-delay=".4s" width="150" height="11" viewBox="0 0 150 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M144.302 10.313C80.9865 -3.18683 25.5413 4.73166 6.10412 10.2128C4.42012 10.6877 2.02954 10.5601 0.764608 9.92793C-0.500322 9.29573 -0.160598 8.39826 1.5234 7.92339C22.9523 1.88063 81.6684 -6.33434 148.069 7.82319C149.901 8.21367 150.542 9.08758 149.502 9.77512C148.462 10.4627 146.134 10.7035 144.302 10.313Z" fill="#161613"/>
                             </svg>
                          </span>
                            μας
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $blog_query = new WP_Query( array(
                'post_type'      => 'post',
                'posts_per_page' => 2,
            ) );

            if ( $blog_query->have_posts() ) :
                $delay_classes = array( 'wow fadeInLeft', 'wow fadeInRight' );
                $i = 0;
                while ( $blog_query->have_posts() ) :
                    $blog_query->the_post();
                    $anim_class = isset( $delay_classes[ $i ] ) ? $delay_classes[ $i ] : '';
                    ?>
                    <div class="col-lg-6">
                        <div class="<?php echo esc_attr( $anim_class ); ?>" data-wow-delay=".1s">
                            <?php get_template_part( 'template-parts/content', 'blog-card' ); ?>
                        </div>
                    </div>
                    <?php
                    $i++;
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>
<!-- blog-area-end -->

<!-- cta-area-end -->

<?php
get_footer();
