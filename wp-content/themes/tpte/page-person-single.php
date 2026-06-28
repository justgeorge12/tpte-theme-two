<?php
/**
 * Template Name: Staff Profile
 * Template Post Type: page
 *
 * Reusable single-person profile page for all ΤΠΤΕ staff types.
 * Layout based on template/acadia/my-profile.html.
 *
 * Setup:
 *   1. Create one WP page at /staff-profile/ and assign this template.
 *   2. Listing pages link here with ?dept=edip&member=mavrofidis etc.
 *   Supported dept values: eep, edip, etep  (extend in inc/staff-data.php)
 *
 * @package tpte
 */

require_once get_template_directory() . '/inc/staff-data.php';

$tp_theme_uri = get_template_directory_uri();

$dept_config = array(
	'eep'   => array( 'label' => 'Ε.Ε.Π.',              'url' => home_url( '/eep/' ) ),
	'edip'  => array( 'label' => 'Ε.ΔΙ.Π.',             'url' => home_url( '/edip/' ) ),
	'etep'  => array( 'label' => 'Ε.Τ.Ε.Π.',            'url' => home_url( '/etep/' ) ),
	'dep'   => array( 'label' => 'Δ.Ε.Π.',               'url' => home_url( '/dep/' ) ),
	'admin-staff' => array( 'label' => 'Διοικητικό Προσωπικό', 'url' => home_url( '/admin-staff/' ) ),
	'honorary'    => array( 'label' => 'Επίτιμοι Διδάκτορες',  'url' => home_url( '/honorary/' ) ),
);

$requested_dept = isset( $_GET['dept'] )   ? sanitize_key( wp_unslash( $_GET['dept'] ) )   : '';
$requested_slug = isset( $_GET['member'] ) ? sanitize_key( wp_unslash( $_GET['member'] ) ) : '';

$member    = tpte_get_staff_member( $requested_dept, $requested_slug );
$dept_info = isset( $dept_config[ $requested_dept ] ) ? $dept_config[ $requested_dept ] : null;

if ( $member ) {
	add_filter( 'document_title_parts', function ( $parts ) use ( $member ) {
		$parts['title'] = $member['name'];
		return $parts;
	} );
}

get_header();

while ( have_posts() ) :
	the_post();
endwhile;

if ( ! $member ) :
	// ── not found ────────────────────────────────────────────────────────────
	?>
	<section class="tp-breadcrumb__area pt-160 pb-150 p-relative z-index-1 fix">
		<div class="tp-breadcrumb__bg overlay" data-background="<?php echo esc_url( $tp_theme_uri ); ?>/assets/img/breadcrumb/campus-breadcrumb.jpg"></div>
		<div class="container">
			<div class="row align-items-center">
				<div class="col-sm-12">
					<div class="tp-breadcrumb__content">
						<div class="tp-breadcrumb__list inner-after">
							<span class="white"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.07207 0C8.19331 0 8.31107 0.0404348 8.40664 0.114882L16.1539 6.14233L15.4847 6.98713L14.5385 6.25079V12.8994C14.538 13.1843 14.4243 13.4574 14.2225 13.6589C14.0206 13.8604 13.747 13.9738 13.4616 13.9743H2.69231C2.40688 13.9737 2.13329 13.8603 1.93146 13.6588C1.72962 13.4573 1.61597 13.1843 1.61539 12.8994V6.2459L0.669148 6.98235L0 6.1376L7.7375 0.114882C7.83308 0.0404348 7.95083 0 8.07207 0ZM8.07694 1.22084L2.69231 5.40777V12.8994H13.4616V5.41341L8.07694 1.22084Z" fill="currentColor"/></svg></a></span>
							<span class="white">Προσωπικό</span>
						</div>
						<h3 class="tp-breadcrumb__title color">Βιογραφικό δεν βρέθηκε</h3>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="grey-bg pt-80 pb-120">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<div style="background:#fff0f0;border:2px solid #c00;border-radius:6px;padding:20px;text-align:left;font-family:monospace;font-size:13px;">
						<strong style="color:#c00;font-size:15px;">Δεν βρέθηκε μέλος προσωπικού.</strong><br><br>
						Received params:<br>
						&nbsp;dept&nbsp;&nbsp;= <strong><?php echo esc_html( $requested_dept !== '' ? $requested_dept : '(empty)' ); ?></strong><br>
						&nbsp;member = <strong><?php echo esc_html( $requested_slug !== '' ? $requested_slug : '(empty)' ); ?></strong><br><br>
						Raw <code>$_GET</code>:<br>
						<pre style="background:#fff;padding:8px;border:1px solid #ddd;white-space:pre-wrap;"><?php echo esc_html( print_r( $_GET, true ) ); ?></pre>
						<?php
						$all = tpte_all_staff();
						if ( $requested_dept && isset( $all[ $requested_dept ] ) ) :
							echo '<br>Known slugs for dept <strong>' . esc_html( $requested_dept ) . '</strong>: '
								. esc_html( implode( ', ', array_keys( $all[ $requested_dept ] ) ) );
						elseif ( $requested_dept ) :
							echo '<br>Dept <strong>' . esc_html( $requested_dept ) . '</strong> not found. Known depts: '
								. esc_html( implode( ', ', array_keys( $all ) ) );
						endif;
						?>
					</div>
					<a class="tp-btn mt-30 d-inline-block" href="<?php echo esc_url( $dept_info ? $dept_info['url'] : home_url( '/' ) ); ?>">← Επιστροφή</a>
				</div>
			</div>
		</div>
	</section>
<?php else :
	// ── profile ──────────────────────────────────────────────────────────────
	$listing_label = $dept_info ? $dept_info['label'] : 'Προσωπικό';
	$listing_url   = $dept_info ? $dept_info['url']   : home_url( '/' );
	?>

	<!-- profile banner -->
	<section class="tp-dashboard-banner-wrap grey-bg pt-160">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<?php
					if ( ! empty( $member['photo_hero'] ) ) :
						echo '<div class="tp-dashboard-banner-bg mt-20 tp-staff-banner" data-background="' . esc_url( $member['photo_hero'] ) . '">';
					else :
						echo '<div class="tp-dashboard-banner-bg mt-20 tp-staff-banner" style="background-color:#0071DC;">';
					endif;
					?>
						<div class="tp-instructor-wrap d-flex justify-content-between">

							<div class="tp-instructor-info d-flex">
								<div class="tp-instructor-avatar tp-staff-avatar-overlap">
									<img
										src="<?php echo esc_url( $member['photo_thumb'] ); ?>"
										alt="<?php echo esc_attr( $member['photo_alt'] ); ?>"
										onerror="this.style.display='none';this.nextElementSibling.style.display='flex';"
									>
									<div style="display:none;width:166px;height:166px;border-radius:50%;background:#fff;color:#0071DC;font-size:2rem;font-weight:700;align-items:center;justify-content:center;padding:8px;box-sizing:border-box;">
										<?php echo esc_html( $member['initials'] ); ?>
									</div>
								</div>
								<div class="tp-instructor-content" style="padding-left:12px;">
									<h4 class="tp-instructor-title tp-instructor-title-size"><?php echo esc_html( $member['name'] ); ?></h4>
									<div class="tp-instructor-rate d-flex align-items-center" style="gap:12px;flex-wrap:wrap;">
										<span class="profile role-size"><?php echo esc_html( $member['role'] ); ?></span>
										<?php if ( ! empty( $member['specialization'] ) ) : ?>
											<span class="profile" style="opacity:.82;"><?php echo esc_html( $member['specialization'] ); ?></span>
										<?php endif; ?>
									</div>
								</div>
							</div>

							<div class="tp-profile-social">
								<?php if ( ! empty( $member['email'] ) ) : ?>
									<a href="mailto:<?php echo esc_attr( $member['email'] ); ?>" title="<?php echo esc_attr( $member['email'] ); ?>">
										<i class="fa-light fa-envelope"></i>
									</a>
								<?php endif; ?>
								<?php if ( ! empty( $member['phone'] ) ) : ?>
									<a href="tel:<?php echo esc_attr( $member['phone'] ); ?>" title="<?php echo esc_attr( $member['phone'] ); ?>">
										<i class="fa-light fa-phone"></i>
									</a>
								<?php endif; ?>
								<?php foreach ( $member['links'] as $link ) : ?>
									<a href="<?php echo esc_url( $link['url'] ); ?>" target="_blank" rel="noopener noreferrer" title="<?php echo esc_attr( $link['label'] ); ?>">
										<?php echo tpte_link_icon( $link ); ?>
									</a>
								<?php endforeach; ?>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- biography -->
	<section class="grey-bg pt-60 pb-100">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="tp-profile-box my-profile p-relative">
						<div class="tp-profile-content">

							<!-- Βιογραφικό Σημείωμα -->
							<?php if ( ! empty( $member['short_bio'] ) ) : ?>
								<h3 class="tp-profile-title">Βιογραφικό Σημείωμα</h3>
								<?php
								$bio_paragraphs = array_filter( array_map( 'trim', explode( "\n", $member['short_bio'] ) ) );
								foreach ( $bio_paragraphs as $p ) : ?>
									<p><?php echo esc_html( $p ); ?></p>
								<?php endforeach; ?>
							<?php endif; ?>

							<!-- Επικοινωνία -->
							<?php if ( ! empty( $member['email'] ) || ! empty( $member['phone'] ) ) : ?>
								<div style="margin-top:28px;">
									<strong style="color:#333;font-size:15px;">Επικοινωνία</strong>
									<ul style="list-style:none;padding:0;margin:10px 0 0;display:flex;gap:24px;flex-wrap:wrap;">
										<?php if ( ! empty( $member['email'] ) ) : ?>
											<li>
												<i class="fa-light fa-envelope" style="color:#0071DC;margin-right:6px;"></i>
												<a href="mailto:<?php echo esc_attr( $member['email'] ); ?>" style="color:#555;"><?php echo esc_html( $member['email'] ); ?></a>
											</li>
										<?php endif; ?>
										<?php if ( ! empty( $member['phone'] ) ) : ?>
											<li>
												<i class="fa-light fa-phone" style="color:#0071DC;margin-right:6px;"></i>
												<a href="tel:<?php echo esc_attr( $member['phone'] ); ?>" style="color:#555;"><?php echo esc_html( $member['phone'] ); ?></a>
											</li>
										<?php endif; ?>
									</ul>
								</div>
							<?php endif; ?>

							<!-- Ακαδημαϊκά Προφίλ -->
							<?php if ( ! empty( $member['links'] ) ) : ?>
								<div style="margin-top:20px;">
									<strong style="color:#333;font-size:15px;">Ακαδημαϊκά Προφίλ</strong>
									<ul style="list-style:none;padding:0;margin:10px 0 0;display:flex;gap:16px;flex-wrap:wrap;">
										<?php foreach ( $member['links'] as $link ) : ?>
											<li>
												<a href="<?php echo esc_url( $link['url'] ); ?>" target="_blank" rel="noopener noreferrer" style="color:#0071DC;font-size:14px;">
													<span style="margin-right:5px;"><?php echo tpte_link_icon( $link ); ?></span>
													<?php echo esc_html( $link['label'] ); ?>
												</a>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							<?php endif; ?>

							<!-- CV button -->
							<?php if ( ! empty( $member['cv_url'] ) ) : ?>
								<div style="margin-top:40px;">
									<a class="tp-btn" href="<?php echo esc_url( $member['cv_url'] ); ?>" target="_blank" rel="noopener noreferrer">
										Πλήρες Βιογραφικό
										<span><svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
											<path d="M1 11L6 6L1 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
										</svg></span>
									</a>
								</div>
							<?php endif; ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php endif;

get_footer();
