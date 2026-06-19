<?php
/**
 * Template Name: Quality Assurance
 * Template Post Type: page
 *
 *
 *
 * @package tpte
 */

get_header();

while ( have_posts() ) :
	the_post();
	$tp_theme_uri = get_template_directory_uri();

	?>

	<!-- admission breadcrumb start -->
	<section class="tp-breadcrumb__area pt-160 pb-150 p-relative z-index-1 fix">
		<div class="tp-breadcrumb__bg overlay" data-background="<?php echo esc_url( $tp_theme_uri ); ?>/assets/img/breadcrumb/campus-breadcrumb.jpg"></div>
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
	<!-- admission breadcrumb end -->


	<!-- campus choose area start -->
<!--
	<section class="tp-campus-choose-area pt-120 pb-30 grey-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="tp-campus-choose-wrapper text-center">
						<div class="tp-campus-choose-btn admission wow fadeInUp" data-wow-delay=".3s">
							<div class="tp-campus-choose-content mb-10 wow fadeInUp" data-wow-delay=".5s">
								<h2 class="tp-campus-choose-title fs-50"><?php echo wp_kses_post( __( 'At Stanford, we practice holistic admission. <br> This means that each piece in your application <br> is reviewed as part of an integrated and <br> comprehensive whole.', 'tpte' ) ); ?></h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>-->
	<!-- campus choose area end -->


	<!-- admission counter area start -->
	<section id="down" class="tp-admission-counter-area grey-bg pb-120">
		<div class="container">
			<div class="tp-admission-counter-box wow fadeInUp" data-wow-delay=".3s">
				<div class="row">
					<?php
					$counters = array(
						array(
							'duration'    => 4,
							'end'         => 126,
							'suffix'      => '',
							'desc'        => __( 'Degree & diploma programs <br> offered', 'tpte' ),
							'item_class'  => '',
							'desc_class'  => 'after',
						),
						array(
							'duration'    => 3,
							'end'         => 82,
							'suffix'      => '%',
							'desc'        => __( 'Of undergraduate students <br> receive financial aid', 'tpte' ),
							'item_class'  => 'pl-50',
							'desc_class'  => 'after',
						),
						array(
							'duration'    => 3,
							'end'         => 74,
							'suffix'      => '%',
							'desc'        => __( 'Of graduates had two or <br> more internships as students', 'tpte' ),
							'item_class'  => 'pl-80',
							'desc_class'  => '',
						),
					);
					foreach ( $counters as $counter ) :
						?>
						<div class="col-lg-4 col-md-6">
							<div class="tp-admission-counter-item<?php echo $counter['item_class'] ? ' ' . esc_attr( $counter['item_class'] ) : ''; ?>">
								<h3 class="tp-admission-counter-title">
									<span data-purecounter-duration="<?php echo esc_attr( $counter['duration'] ); ?>" data-purecounter-end="<?php echo esc_attr( $counter['end'] ); ?>" class="purecounter"><?php echo esc_html( $counter['end'] ); ?></span><?php echo esc_html( $counter['suffix'] ); ?>
								</h3>
								<p<?php echo $counter['desc_class'] ? ' class="' . esc_attr( $counter['desc_class'] ) . '"' : ''; ?>><?php echo wp_kses_post( $counter['desc'] ); ?></p>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
	<!-- admission counter area end -->


	<!-- admission area start -->
	<section class="tp-admission-overview-area grey-bg pb-80 ">
		<div class="container">
			<div class="row">

				<div class="col-lg-6">
					<div class="tp-admission-overview-wrapper wow fadeInUp" data-wow-delay=".5s">
                        <h3><?php esc_html_e('Διεθνής Αναγνώριση ') ?></h3>
						<p><?php esc_html_e( 'Ο ανεξάρτητος φορέας Times Higher Education κατατάσσει το Πανεπιστήμιο Αιγαίου μεταξύ των κορυφαίων πανεπιστημιακών ιδρυμάτων στον δείκτη «Industry» στον τομέα των Κοινωνικών Επιστημών για το 2026. Η δυναμική της Σχολής μας στη μεταφορά γνώσης, διαμέσου της σύνδεσης της έρευνας με την παραγωγή, αναγνωρίζεται διεθνώς.', 'tpte' ); ?></p>
						<p><?php echo wp_kses_post( __( 'Η συμβολή του δικού μας Τμήματος είναι καθοριστική, καθώς στρατηγικός του στόχος είναι η ανάπτυξη καινοτόμων διεπιστημονικών πεδίων, η ενίσχυση της σύνδεσης έρευνας, εκπαίδευσης και αγοράς εργασίας, καθώς και η συστηματική αξιοποίηση των ερευνητικών αποτελεσμάτων προς όφελος της κοινωνίας και της οικονομίας, μέσα από ένα πλαίσιο ποιότητας, εξωστρέφειας και διεθνούς προσανατολισμού.', 'tpte' ) ); ?></p>
						<div class="tp-event-btn mt-50">
							<a class="tp-btn" href="https://www.timeshighereducation.com/world-university-rankings/university-aegean"><?php echo wp_kses_post( __( 'Μάθε Περισσότερα', 'tpte' ) ); ?>
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
                <div class="col-lg-6">
                    <div class="tp-qa-chart-wrap wow fadeInUp" data-wow-delay=".3s">
                        <div id="tp-qa-line-chart" class="tp-qa-line-chart"></div>
                        <p class="tp-qa-chart-source" style="font-size: 13px; color: #888; margin-top: 12px; text-align: right;">
                            <?php esc_html_e( 'Πηγή: Times Higher Education — Social Sciences 2026 University of the Aegean, Breakdown by Year: Industry', 'tpte' ); ?>
                        </p>
                    </div>

                </div>
			</div>
		</div>
	</section>
	<!-- admission area end -->
    <!-- apply process area start -->
    <section class="tp-apply-process-area grey-bg pb-60 pt-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div id="down" class="tp-apply-process-wrapper wow fadeInUp" data-wow-delay=".5s">
                        <h3 class="tp-apply-process-title">Οι Πυλώνες της Στρατηγικής μας</h3>
                        <div class="tp-apply-process-box">
                            <h4 class="tp-apply-process-subtitle"><span>1</span>Καινοτομία & Διεπιστημονικότητα</h4>
                            <p>
                                Το Τμήμα επενδύει στην ανάπτυξη νέων διεπιστημονικών γνωστικών πεδίων και
                                προγραμμάτων σπουδών σε αντικείμενα αιχμής, όπως η Τεχνητή Νοημοσύνη και
                                οι αναδυόμενες τεχνολογίες, με έμφαση στις εφαρμογές στον πολιτισμό και
                                τη δημιουργική οικονομία.
                            </p>
                        </div>

                        <div class="tp-apply-process-box">
                            <h4 class="tp-apply-process-subtitle"><span>2</span>Σύνδεση με την Αγορά Εργασίας</h4>
                            <p>
                                Μέσα από πρακτικές ασκήσεις, συνεργασίες με φορείς και συνεχή επικοινωνία
                                με την αγορά εργασίας, το Τμήμα ενισχύει τη σύνδεση της εκπαίδευσης με τις
                                σύγχρονες επαγγελματικές απαιτήσεις και τις ανάγκες της κοινωνίας.
                            </p>
                        </div>

                        <div class="tp-apply-process-box">
                            <h4 class="tp-apply-process-subtitle"><span>3</span>Έρευνα & Αξιοποίηση Γνώσης</h4>
                            <p>
                                Η στρατηγική του Τμήματος εστιάζει στη δυναμική ενίσχυση της ερευνητικής
                                δραστηριότητας και στην αξιοποίηση των ερευνητικών αποτελεσμάτων μέσω
                                συνεργασιών, χρηματοδοτήσεων, καινοτομίας και μεταφοράς τεχνογνωσίας προς
                                την κοινωνία και την οικονομία.
                            </p>
                        </div>

                        <div class="tp-apply-process-box">
                            <h4 class="tp-apply-process-subtitle"><span>4</span>Διεθνής Εξωστρέφεια</h4>
                            <p>
                                Το Τμήμα αναπτύσσει διεθνείς συνεργασίες και ενισχύει τη διεθνοποιημένη
                                διάσταση της εκπαίδευσης και της έρευνας, προωθώντας την ακαδημαϊκή
                                αριστεία και τη διεθνή παρουσία του σε σύγχρονα επιστημονικά πεδία.
                            </p>
                        </div>

                        <div class="tp-apply-process-box">
                            <h4 class="tp-apply-process-subtitle"><span>5</span>Κοινωνικός Αντίκτυπος & Ποιότητα</h4>
                            <p>
                                Με έμφαση στην ποιότητα των σπουδών, τη διαρκή αναβάθμιση των υποδομών και
                                τη συνεργασία με τοπικούς και θεσμικούς φορείς, το Τμήμα συμβάλλει ενεργά
                                στην κοινωνική ανάπτυξη και στη δημιουργία ουσιαστικού περιφερειακού και
                                εθνικού αντίκτυπου.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- apply process area end -->


	<!-- admission cta area start -->
	<section class="tp-admission-cta-area grey-bg pb-160">
		<div class="container">
			<div class="tp-admission-cta-box" style="background: rgba(0, 19, 64, .8)">
				<div class="row">
					<div class="col-lg-6">
						<div class="tp-admission-cta-heading wow fadeInUp" data-wow-delay=".3s">
							<h3 class="tp-admission-cta-title"><?php echo wp_kses_post( __( 'Πιστοποίηση Προπτυχιακού Προγράμματος Σπουδών', 'tpte' ) ); ?></h3>
							<p><?php echo wp_kses_post( __( 'Το 2021, το Πρόγραμμα Προπτυχιακών Σπουδών του Τμήματος πιστοποιήθηκε από την ΕΘΑΑΕ για πλήρη συμμόρφωση με τα πρότυπα ποιότητας της ελληνικής και ευρωπαϊκής ανώτατης εκπαίδευσης (ESG), λαμβάνοντας πενταετή πιστοποίηση ποιότητας.', 'tpte' ) ); ?></p>
                                <a class="tp-btn" href=""><?php echo wp_kses_post( __( 'Πλήρες Κείμενο Έκθεσης', 'tpte' ) ); ?>
								</a>

						</div>
					</div>
					<div class="col-lg-6">
						<div class="tp-admission-cta-thumb wow fadeInUp" data-wow-delay=".5s">
							<img src="<?php echo esc_url( $tp_theme_uri ); ?>/assets/img/about/certificate.png" alt="Πιστοποιητικό">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- admission cta area end -->


	<!-- admission apply area start -->
	<section class="tp-admission-apply-area grey-bg pt-40 pb-140">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="tp-admission-apply-thumb p-relative wow fadeInUp" data-wow-delay=".3s">
						<img src="<?php echo esc_url( $tp_theme_uri ); ?>/assets/img/course/details/admisson-overview-2.jpg" alt="">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="tp-admission-apply-heading wow fadeInUp" data-wow-delay=".5s">
						<h3 class="tp-admission-apply-title"><?php esc_html_e( 'Δεδομένα Ποιότητας & Πολιτική', 'tpte' ); ?></h3>
						<p><?php echo wp_kses_post( __( 'We’ll guide you through the Common Application <br> or Coalition Application, Powered by Scoir, and answer <br> any questions you have along the way.', 'tpte' ) ); ?></p>
						<div class="tp-admission-apply-btn">
							<a class="tp-btn" href="<?php echo esc_url( $how_to_apply_url ); ?>"><?php esc_html_e( 'How To Apply', 'tpte' ); ?>
								<span><svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
									<path d="M1 11L6 6L1 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg></span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- admission apply area end -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (typeof ApexCharts === 'undefined') return;
            var el = document.getElementById('tp-qa-line-chart');
            if (!el) return;
            new ApexCharts(el, {
                chart:       { type: 'line', height: 340, toolbar: { show: false }, zoom: { enabled: false } },
                stroke:      { curve: 'smooth', width: 3 },
                markers:     { size: 5, hover: { sizeOffset: 2 } },
                series:      [{
                    name: <?php echo wp_json_encode( __( 'Δείκτης Industry Παν. Αιγαίου', 'tpte' ) ); ?>,
                    data: [33.4, 77.4, 78.4, 83, 72.4, 91.3]
                }],
                xaxis:       { categories: ['2021', '2022', '2023', '2024', '2025', '2026'] },
                yaxis:       { min: 0, max: 100, decimalsInFloat: 1 },
                colors:      ['#2d4cff'],
                grid:        { borderColor: '#e8e9ed', strokeDashArray: 4 },
                dataLabels:  { enabled: false },
                tooltip:     { y: { formatter: function (v) { return v; } } }
            }).render();
        });
    </script>
	<?php
endwhile;


get_footer();
