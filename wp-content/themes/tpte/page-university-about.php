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
			<div class="row">
				<div class="col-lg-4">
					<div class="tp-our-mission-thumb wow fadeInUp" data-wow-delay=".3s">
						<img src="<?php echo esc_url( $tp_theme_uri ); ?>/assets/img/our-mission/thumb-1.png" alt="">
					</div>
				</div>
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
								'title' => __( 'Scholarship', 'tpte' ),
								'desc'  => __( 'Encouraging behaviours which encompass notions of originality, and problem-solving in all that we do.', 'tpte' ),
								'thumb' => 'mission-item-2.jpg',
								'class' => 'tp-our-mission-item-thumb-3',
							),
							array(
								'title' => __( 'Community', 'tpte' ),
								'desc'  => __( 'Encouraging behaviours which encompass notions of originality, and problem-solving in all that we do.', 'tpte' ),
								'thumb' => 'mission-item-3.jpg',
								'class' => 'tp-our-mission-item-thumb-2',
							),
						);
						$mission_last_index = count( $mission_items ) - 1;
						foreach ( $mission_items as $i => $item ) :
							$is_last = ( $i === $mission_last_index );
							?>
							<div class="tp-our-mission-item d-flex align-items-center justify-content-center justify-content-md-between<?php echo $is_last ? '' : ' mb-20'; ?>">
								<div class="tp-our-mission-item-content">
									<h4 class="tp-our-mission-item-title"><?php echo esc_html( $item['title'] ); ?></h4>
									<p><?php echo esc_html( $item['desc'] ); ?></p>
									<div class="tp-our-mission-item-btn">
										<a class="tp-btn-3" href="#"><?php esc_html_e( 'Learn More', 'tpte' ); ?> <i>
											<svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12" fill="none">
												<path d="M1.5 6H11.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
												<path d="M6.5 1L11.5 6L6.5 11" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
											</svg>
										</i></a>
									</div>
								</div>
								<div class="tp-our-mission-item-thumb">
									<div class="<?php echo esc_attr( $item['class'] ); ?>">
										<img src="<?php echo esc_url( $tp_theme_uri ); ?>/assets/img/our-mission/<?php echo esc_attr( $item['thumb'] ); ?>" alt="">
									</div>
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
			<div class="shape-1">
				<img src="<?php echo esc_url( $tp_theme_uri ); ?>/assets/img/our-mission/star.png" alt="">
			</div>
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


	<!-- about team area start -->
	<section class="tp-about-team-area grey-bg p-relative pt-120 pb-90">
		<div class="tp-about-team-shape">
			<img src="<?php echo esc_url( $tp_theme_uri ); ?>/assets/img/team/about-team/team-shape.png" alt="">
		</div>
		<div class="container">
			<?php
			$team_members = array(
				array( 'name' => __( 'Patrick James', 'tpte' ),  'role' => __( 'Head Coach', 'tpte' ), 'thumb' => 'about-team-1.jpg', 'delay' => '.3s' ),
				array( 'name' => __( 'Michael Patel', 'tpte' ),  'role' => __( 'Head Coach', 'tpte' ), 'thumb' => 'about-team-2.jpg', 'delay' => '.5s' ),
				array( 'name' => __( 'Samantha Lee', 'tpte' ),   'role' => __( 'Head Coach', 'tpte' ), 'thumb' => 'about-team-3.jpg', 'delay' => '.7s' ),
				array( 'name' => __( 'David Johnson', 'tpte' ),  'role' => __( 'Head Coach', 'tpte' ), 'thumb' => 'about-team-4.jpg', 'delay' => '.9s' ),
			);
			?>
			<div class="row">
				<?php foreach ( $team_members as $member ) : ?>
					<div class="col-lg-3 col-sm-6">
						<div class="tp-about-team-item p-relative mb-30 wow fadeInUp" data-wow-delay="<?php echo esc_attr( $member['delay'] ); ?>">
							<div class="tp-about-team-thumb">
								<img src="<?php echo esc_url( $tp_theme_uri ); ?>/assets/img/team/about-team/<?php echo esc_attr( $member['thumb'] ); ?>" alt="">
							</div>
							<div class="tp-about-team-content">
								<h4 class="tp-about-team-title"><a href="#"><?php echo esc_html( $member['name'] ); ?></a></h4>
								<p><?php echo esc_html( $member['role'] ); ?></p>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<!-- about team area end -->


	<!-- about campus area start -->
	<section class="tp-about-campus-area grey-bg p-relative pb-120">
		<div class="tp-about-campus-shape">
			<div class="shape-1">
				<img src="<?php echo esc_url( $tp_theme_uri ); ?>/assets/img/campus/campuses-shape-1.jpg" alt="">
			</div>
			<div class="shape-2">
				<img src="<?php echo esc_url( $tp_theme_uri ); ?>/assets/img/campus/campuses-shape-2.jpg" alt="">
			</div>
		</div>
		<?php
		$campuses = array(
			array( 'id' => 'home',    'tab_label' => __( 'Gorki Campus', 'tpte' ),            'address' => __( '197345, Russia, Saint-Petersburg, Mebelnaya, 11A', 'tpte' ), 'thumb' => 'campuses-thumb.jpg' ),
			array( 'id' => 'profile', 'tab_label' => __( 'Skolkovo Campus', 'tpte' ),         'address' => __( '197345, Russia, Saint-Petersburg, Mebelnaya, 11A', 'tpte' ), 'thumb' => 'campuses-thumb.jpg' ),
			array( 'id' => 'contact', 'tab_label' => __( 'Saint Petersburg Campus', 'tpte' ), 'address' => __( '197345, Russia, Saint-Petersburg, Mebelnaya, 11A', 'tpte' ), 'thumb' => 'campuses-thumb.jpg' ),
			array( 'id' => 'Moscow',  'tab_label' => __( 'Moscow Campus', 'tpte' ),           'address' => __( '197345, Russia, Saint-Petersburg, Mebelnaya, 11A', 'tpte' ), 'thumb' => 'campuses-thumb.jpg' ),
			array( 'id' => 'Campus',  'tab_label' => __( 'Tashkent Campus', 'tpte' ),         'address' => __( '197345, Russia, Saint-Petersburg, Mebelnaya, 11A', 'tpte' ), 'thumb' => 'campuses-thumb.jpg' ),
		);
		?>
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="tp-about-campus-tab wow fadeInUp" data-wow-delay=".3s">
						<div class="tp-about-campus-heading">
							<h4 class="tp-about-campus-title"><?php esc_html_e( 'Campuses', 'tpte' ); ?></h4>
							<p><?php esc_html_e( 'Acadia University has five campuses, which are located in the most exclusive areas of Moscow, Saint Petersburg and Tashkent.', 'tpte' ); ?></p>
						</div>
						<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
							<?php foreach ( $campuses as $i => $campus ) : $active = 0 === $i; ?>
								<li class="nav-item" role="presentation">
									<button class="nav-link<?php echo $active ? ' active' : ''; ?>" id="<?php echo esc_attr( $campus['id'] ); ?>-tab" data-bs-toggle="tab" data-bs-target="#<?php echo esc_attr( $campus['id'] ); ?>" type="button" role="tab" aria-controls="<?php echo esc_attr( $campus['id'] ); ?>" aria-selected="<?php echo $active ? 'true' : 'false'; ?>"><?php echo esc_html( $campus['tab_label'] ); ?></button>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="tab-content wow fadeInUp" data-wow-delay=".5s" id="myTabContent">
						<?php foreach ( $campuses as $i => $campus ) : $active = 0 === $i; ?>
							<div class="tab-pane fade<?php echo $active ? ' show active' : ''; ?>" id="<?php echo esc_attr( $campus['id'] ); ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr( $campus['id'] ); ?>-tab">
								<div class="tp-about-campus-box p-relative">
									<div class="tp-about-campus-thumb">
										<img src="<?php echo esc_url( $tp_theme_uri ); ?>/assets/img/campus/<?php echo esc_attr( $campus['thumb'] ); ?>" alt="">
									</div>
									<div class="tp-about-campus-content d-flex justify-content-between">
										<div class="tp-about-campus-location">
											<span><svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.53162 0.93677C5.71647 -0.332725 8.40201 -0.310536 10.5664 0.994893C12.7094 2.32691 14.0119 4.70417 13.9999 7.26143C13.9499 9.80192 12.5533 12.19 10.8075 14.0361C9.79981 15.1064 8.6726 16.0528 7.44883 16.856C7.32279 16.9289 7.18474 16.9777 7.04147 17C6.90359 16.9941 6.7693 16.9534 6.65074 16.8814C4.78242 15.6745 3.14333 14.134 1.81233 12.3339C0.698586 10.8313 0.0658344 9.01599 0 7.13441L0.00498621 6.86068C0.0959219 4.40464 1.42479 2.16093 3.53162 0.93677ZM7.90725 5.03476C7.01906 4.65723 5.99503 4.86234 5.31331 5.55434C4.63158 6.24633 4.42663 7.28871 4.79415 8.19477C5.16168 9.10082 6.02917 9.69183 6.99159 9.69183C7.62209 9.69636 8.22817 9.44381 8.67479 8.99046C9.12141 8.53711 9.37147 7.92062 9.36924 7.27837C9.37259 6.29802 8.79544 5.4123 7.90725 5.03476Z" fill="currentColor"/></svg></span>
											<a href="#"><?php echo esc_html( $campus['address'] ); ?></a>
										</div>
										<div class="tp-about-campus-btn">
											<a class="tp-btn" href="#"><?php esc_html_e( 'Find out More', 'tpte' ); ?></a>
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
	<!-- about campus area end -->

	<?php
endwhile;

get_footer();
