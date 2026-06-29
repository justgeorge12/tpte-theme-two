<?php
/**
 * Template Name: Student Portal
 * Template Post Type: page
 *
 * Φοιτητική Πύλη — student-facing hub of links, files and info, grouped into
 * categorised sections. Each item renders the control matching its nature
 * (link button / text block / multi-link / FAQ). Data is the hardcoded
 * $portal_groups array below (edit on request); there is no admin meta box.
 *
 * Section layouts:
 *   - cards : responsive grid of bordered cards (icon + title + control)
 *   - rows  : compact list, title left / control right, dashed dividers
 *   - text  : stacked prose blocks
 * Item types (the `type` key, switched on by the renderer):
 *   - link  : single outbound link rendered as a button
 *   - text  : descriptive copy (inline markup allowed)
 *   - links : several sub-links grouped under one item
 *   - faq   : Bootstrap accordion of question/answer pairs (full width)
 *
 * TODO: every `url` below is a `#` placeholder — replace with the real
 * destination once supplied.
 *
 * @package tpte
 */

get_header();

while ( have_posts() ) :
	the_post();
	$tp_theme_uri = get_template_directory_uri();

	// --- Daily-use services shown as the hero quick-links strip. ---
	$portal_quick_links = array(
		array(
			'title' => 'eClass',
			'url'   => 'https://eclass.aegean.gr/',
			'icon'  => $tp_theme_uri . '/assets/img/quick-links/eclass.png',
		),
		array(
			'title' => 'UniverSIS',
			'url'   => 'https://universis.aegean.gr/',
			'icon'  => $tp_theme_uri . '/assets/img/quick-links/universis.png',
		),
		array(
			'title' => 'Webmail',
			'url'   => 'https://webmail.aegean.gr/',
			'icon'  => $tp_theme_uri . '/assets/img/quick-links/webmail.png',
		),
		array(
			'title' => __( 'Βιβλιοθήκη', 'tpte' ),
			'url'   => 'https://lib.aegean.gr/',
			'icon'  => $tp_theme_uri . '/assets/img/quick-links/library.png',
		),
	);

	// --- Portal content. Edit links/text here. ---
	$portal_groups = array(

		// 1. Ενημέρωση & Στήριξη Σπουδών.
		array(
			'title'  => __( 'Ενημέρωση & Στήριξη Σπουδών', 'tpte' ),
			'icon'   => 'fa-light fa-compass',
			'layout' => 'cards',
			'items'  => array(
				array(
					'type'  => 'link',
					'icon'  => 'fa-light fa-book-open-cover',
					'label' => __( 'Οδηγός σπουδών', 'tpte' ),
					'desc'  => __( 'Αναλυτικός οδηγός προγράμματος σπουδών (PDF).', 'tpte' ),
					'url'   => 'https://www.ct.aegean.gr/data/ODHGOS_SPOYDWN_TPTE_2025-2026.pdf',
					'cta'   => __( 'Άνοιγμα', 'tpte' ),
				),
				array(
					'type'  => 'link',
					'icon'  => 'fa-light fa-chalkboard-user',
					'label' => __( 'Οι Σύμβουλοι σπουδών', 'tpte' ),
					'desc'  => __( 'Ο σύμβουλος καθηγητής που σας υποστηρίζει σε όλη τη διάρκεια των σπουδών σας. Βρείτε τον σύμβουλο καθηγητή σας βάσει του Αριθμού Μητρώου σας.', 'tpte' ),
					'url'   => 'https://www.ct.aegean.gr/data/symvouloi-spoudon_FINAL.pdf',
                    'cta' => __('Άνοιγμα', 'tpte')
				),
				array(
					'type'  => 'link',
					'icon'  => 'fa-light fa-clock',
					'label' => __( 'Ώρες γραφείου διδακτικού προσωπικού', 'tpte' ),
					'desc'  => __( 'Ώρες κατά τις οποίες τα μέλη ΔΕΠ δέχονται φοιτητές.', 'tpte' ),
					'url'   => 'https://www.ct.aegean.gr/data/wres-grafeiou-25-26.pdf',
                    'cta' => __('Άνοιγμα', 'tpte')
                ),
			),
		),

		// 2. Πρωτοετείς Φοιτητές.
		array(
			'title'  => __( 'Πρωτοετείς Φοιτητές', 'tpte' ),
			'icon'   => 'fa-light fa-graduation-cap',
			'layout' => 'cards',
			'items'  => array(
				array(
					'type'  => 'link',
					'icon'  => 'fa-light fa-shoe-prints',
					'label' => __( 'Πρώτα Βήματα', 'tpte' ),
					'desc'  => __( 'Ενημερωθείτε για τις πρώτες ενέργειες που πρέπει να ακολουθήσετε ως πρωτοετείς φοιτητές/φοιτήτριες στο Πανεπιστήμιο Αιγαίου.', 'tpte' ),
					'url'   => 'https://www.aegean.gr/%CE%BF%CE%B4%CE%B7%CE%B3%CF%8C%CF%82-%CE%B5%CE%B9%CF%83%CE%B1%CE%BA%CF%84%CE%AD%CF%89%CE%BD-%CF%80%CF%81%CF%89%CF%84%CE%BF%CE%B5%CF%84%CF%8E%CE%BD',
					'cta'   => __( 'Μετάβαση', 'tpte' ),
				),
				array(
					'type'  => 'link',
					'icon'  => 'fa-light fa-handshake',
					'label' => __( 'Πρωτοετής Ενημέρωση & Πρόγραμμα υποδοχής 2025', 'tpte' ),
					'desc'  => __( 'Πρόγραμμα υποδοχής και ενημέρωσης για τους νεοεισαχθέντες φοιτητές.', 'tpte' ),
					'url'   => 'https://www.ct.aegean.gr/data/programma_upodoxis_2025.pdf',
                    'cta' => __('Άνοιγμα', 'tpte')
                ),
				array(
					'type'  => 'link',
					'icon'  => 'fa-light fa-file-lines',
					'label' => __( 'Ενημερωτικό φυλλάδιο πρωτοετών', 'tpte' ),
					'desc'  => __( 'Συνοπτικό φυλλάδιο με τα βασικά για την έναρξη των σπουδών (PDF).', 'tpte' ),
					'url'   => 'https://www.ct.aegean.gr/data/ENIMEROTIKO_FILLADIO_TPTE_24_25.pdf',
					'cta'   => __( 'Άνοιγμα', 'tpte' ),
				),
				array(
					'type'  => 'links',
					'icon'  => 'fa-light fa-presentation-screen',
					'label' => __( 'Παρουσιάσεις', 'tpte' ),
					'desc'  => __( 'Παρουσιάσεις γνωριμίας με το Τμήμα και τις υπηρεσίες του.', 'tpte' ),
					'links' => array(
						array(
							'label' => __( 'Παρουσίαση Τμήματος', 'tpte' ),
							'url'   => 'https://www.ct.aegean.gr/data/%CE%A4%CE%A0%CE%A4%CE%95_%CE%A5%CE%A0%CE%9F%CE%94%CE%9F%CE%A7%CE%97_%CE%A0%CE%A1%CE%A9%CE%A4%CE%9F%CE%95%CE%A4%CE%A9%CE%9D_2025.pdf',
						),
						array(
							'label' => __( 'Τι είναι το ERUA', 'tpte' ),
							'url'   => 'https://www.ct.aegean.gr/data/UAEGEAN_ERUA_Ambassadors_welcoming_presentation_2025.pdf',
						),
						array(
							'label' => __( 'Μονάδα Ισότιμης Πρόσβασης', 'tpte' ),
							'url'   => 'https://www.ct.aegean.gr/data/%CE%9C%CE%9F%CE%9D%CE%91%CE%94%CE%91_%CE%99%CE%A3%CE%9F%CE%A4%CE%99%CE%9C%CE%97%CE%A3_%CE%A0%CE%A1%CE%9F%CE%A3%CE%92%CE%91%CE%A3%CE%97%CE%A3.pdf',
						),
					),
				),
			),
		),

		// 3. Ηλεκτρονικές Υπηρεσίες & Πρόσβαση.
		array(
			'title'  => __( 'Ηλεκτρονικές Υπηρεσίες & Πρόσβαση', 'tpte' ),
			'icon'   => 'fa-light fa-network-wired',
			'layout' => 'rows',
			'items'  => array(
				array(
					'type'  => 'link',
					'icon'  => 'fa-light fa-id-badge',
					'label' => __( 'Παραλαβή στοιχείων πρόσβασης', 'tpte' ),
					'desc'  => __( 'Όνομα χρήστη και αρχικός κωδικός για τις υπηρεσίες του Πανεπιστημίου.', 'tpte' ),
					'url'   => 'https://ype.aegean.gr/setyourpass/',
				),
				array(
					'type'  => 'link',
					'icon'  => 'fa-light fa-key',
					'label' => __( 'Αλλαγή κωδικού', 'tpte' ),
					'url'   => 'https://webmail.aegean.gr/owa/auth/expiredpassword.aspx',
				),
				array(
					'type'  => 'link',
					'icon'  => 'fa-light fa-unlock-keyhole',
					'label' => __( 'Ανάκτηση κωδικού', 'tpte' ),
					'url'   => 'https://www.ct.aegean.gr/Home/RetrievePassword',
				),
				array(
					'type'  => 'link',
					'icon'  => 'fa-light fa-shield-check',
					'label' => __( 'Έλεγχος Κωδικού', 'tpte' ),
					'url'   => 'https://checkpassword.aegean.gr/',
				),
				array(
					'type'  => 'link',
					'icon'  => 'fa-light fa-ticket',
					'label' => __( 'Υπηρεσία απόκτησης πάσου', 'tpte' ),
					'desc'  => __( 'Ακαδημαϊκή ταυτότητα / φοιτητικό πάσο.', 'tpte' ),
					'url'   => 'http://academicid.minedu.gov.gr/',
				),
				array(
					'type'  => 'link',
					'icon'  => 'fa-light fa-book',
					'label' => __( 'Συγγράμματα Εύδοξος', 'tpte' ),
					'desc'  => __( 'Δήλωση και παραλαβή ακαδημαϊκών συγγραμμάτων μέσω της υπηρεσίας Εύδοξος.', 'tpte' ),
					'url'   => 'http://eudoxus.gr/',
				),
				array(
					'type'  => 'link',
					'icon'  => 'fa-light fa-grid-2',
					'label' => __( 'Άλλες Ηλεκτρονικές Υπηρεσίες', 'tpte' ),
					'url'   => 'https://ype.aegean.gr/foititika',
				),
			),
		),

		// 4. Οδηγοί.
		array(
			'title'  => __( 'Οδηγοί', 'tpte' ),
			'icon'   => 'fa-light fa-book-open',
			'layout' => 'cards',
			'items'  => array(
				array(
					'type'  => 'link',
					'icon'  => 'fa-brands fa-microsoft',
					'label' => __( 'Οδηγίες εγκατάστασης Office365', 'tpte' ),
					'url'   => 'https://www.ct.aegean.gr/data/%CE%9F%CE%B4%CE%B7%CE%B3%CE%AF%CE%B5%CF%82%20Office365.pdf',
					'cta'   => __( 'Άνοιγμα', 'tpte' ),
				),
				array(
					'type'  => 'link',
					'icon'  => 'fa-light fa-network-wired',
					'label' => __( 'Οδηγίες σύνδεσης στο VPN με τη χρήση του OpenVPN', 'tpte' ),
					'url'   => 'https://www.ct.aegean.gr/data/OpenVPN.pdf',
					'cta'   => __( 'Άνοιγμα', 'tpte' ),
				),
				array(
					'type'  => 'link',
					'icon'  => 'fa-light fa-display',
					'label' => __( 'Οδηγίες σύνδεσης στο VDI', 'tpte' ),
					'url'   => 'https://www.ct.aegean.gr/data/VDI_connect.pdf',
					'cta'   => __( 'Άνοιγμα', 'tpte' ),
				),
			),
		),

		// 5. Βιβλιοθήκη & Πηγές.
		array(
			'title'  => __( 'Βιβλιοθήκη & Πηγές', 'tpte' ),
			'icon'   => 'fa-light fa-books',
			'layout' => 'cards',
			'items'  => array(
				array(
					'type'  => 'link',
					'icon'  => 'fa-light fa-building-columns',
					'label' => __( 'Βιβλιοθήκη Πανεπιστημίου Αιγαίου', 'tpte' ),
					'desc'  => __( 'Η ιστοσελίδα της Βιβλιοθήκης του Πανεπιστημίου Αιγαίου και οι υπηρεσίες της.', 'tpte' ),
					'url'   => 'https://www.lib.aegean.gr/',
					'cta'   => __( 'Μετάβαση', 'tpte' ),
				),
				array(
					'type'  => 'link',
					'icon'  => 'fa-light fa-database',
					'label' => __( 'Αποθετήριο Βιβλιοθήκης Hellanicus', 'tpte' ),
					'desc'  => __( 'Ιδρυματικό αποθετήριο με πτυχιακές, διπλωματικές και διδακτορικές εργασίες.', 'tpte' ),
					'url'   => 'http://hellanicus.lib.aegean.gr/',
				),
				array(
					'type'  => 'faq',
					'icon'  => 'fa-light fa-circle-question',
					'label' => __( 'Συχνές Ερωτήσεις (FAQ)', 'tpte' ),
					'qa'    => array(
						array(
							'q' => __( 'Πώς αποκτώ λογαριασμό για τις ηλεκτρονικές υπηρεσίες;', 'tpte' ),
							'a' => __( 'TODO: Συμπληρώστε την απάντηση.', 'tpte' ),
						),
						array(
							'q' => __( 'Πώς δηλώνω μαθήματα κάθε εξάμηνο;', 'tpte' ),
							'a' => __( 'TODO: Συμπληρώστε την απάντηση.', 'tpte' ),
						),
						array(
							'q' => __( 'Πού απευθύνομαι για θέματα της Γραμματείας;', 'tpte' ),
							'a' => __( 'TODO: Συμπληρώστε την απάντηση.', 'tpte' ),
						),
					),
				),
			),
		),

		// 6. Εργαστηριακές Υποδομές.
		array(
			'title'  => __( 'Εργαστηριακές Υποδομές', 'tpte' ),
			'icon'   => 'fa-light fa-building',
			'layout' => 'cards',
			'items'  => array(
				array(
					'type'  => 'modal',
					'icon'  => 'fa-light fa-desktop',
					'label' => __( 'Εργαστήρια Υπολογιστών', 'tpte' ),
					'desc'  => __( 'Μάθετε πού μπορείτε να χρησιμοποιείτε σταθμούς εργασίας για τις ακαδημαϊκές σας ανάγκες ως προπτυχιακοί ή μεταπτυχιακοί φοιτητές.', 'tpte' ),
					'cta'   => __( 'Περισσότερα', 'tpte' ),
					'body'  =>
						'<p>' . esc_html__( 'Στο Τμήμα λειτουργούν εργαστήρια ηλεκτρονικών υπολογιστών τόσο για τους Προπτυχιακούς όσο και για τους Μεταπτυχιακούς φοιτητές και φοιτήτριες.', 'tpte' ) . '</p>'
						. '<p>' . esc_html__( 'Τα εργαστήρια Η/Υ που είναι διαθέσιμα για τους Προπτυχιακούς φοιτητές/τριες του Τμήματος είναι:', 'tpte' ) . '</p>'
						. '<ul>'
						. '<li>' . esc_html__( 'Το εργαστήριο Ανθρωπογεωγραφίας, που βρίσκεται στο υπόγειο του κτηρίου Γεωγραφίας. Διαθέτει συνολικά 26 σταθμούς εργασίας.', 'tpte' ) . '</li>'
						. '<li>' . esc_html__( 'Τα δύο εργαστήρια Η/Υ (μικρό και μεγάλο), που βρίσκονται στον 2ο όροφο του κτηρίου Γεωγραφίας. Διαθέτουν συνολικά 40 σταθμούς εργασίας.', 'tpte' ) . '</li>'
						. '</ul>'
						. '<p>' . esc_html__( 'Τα εργαστήρια διατίθενται για την υποστήριξη της διδασκαλίας των μαθημάτων και των εργαστηριακών ασκήσεων του Προπτυχιακού Προγράμματος Σπουδών του Τμήματος. Παράλληλα είναι διαθέσιμα στους φοιτητές και τις φοιτήτριες για τη χρήση υπηρεσιών Internet (αναζήτηση πληροφοριών στο διαδίκτυο, χρήση ηλεκτρονικού ταχυδρομείου κ.ά.).', 'tpte' ) . '</p>'
						. '<p>' . esc_html__( 'Τα εργαστήρια Η/Υ που είναι διαθέσιμα για τους Μεταπτυχιακούς φοιτητές και φοιτήτριες του Τμήματος είναι:', 'tpte' ) . '</p>'
						. '<ul>'
						. '<li>' . esc_html__( 'Το εργαστήριο που βρίσκεται στο ισόγειο του κτηρίου της Λέσχης και διαθέτει συνολικά 20 σταθμούς εργασίας. Διατίθεται για την υποστήριξη της διδασκαλίας των μαθημάτων και των εργαστηριακών ασκήσεων του Μεταπτυχιακού Προγράμματος Σπουδών «Πολιτισμική Πληροφορική».', 'tpte' ) . '</li>'
						. '<li>' . esc_html__( 'Το εργαστήριο που βρίσκεται στον 1ο όροφο του κτηρίου της Λέσχης και διαθέτει συνολικά 11 σταθμούς εργασίας. Διατίθεται στους Μεταπτυχιακούς φοιτητές και φοιτήτριες για την εκπόνηση των εργασιών τους.', 'tpte' ) . '</li>'
						. '</ul>',
				),
				array(
					'type'  => 'modal',
					'icon'  => 'fa-light fa-clipboard-list',
					'label' => __( 'Κανονισμός Εργαστηρίων Υπολογιστών', 'tpte' ),
					'desc'  => __( 'Μάθετε τους κανόνες χρήσης των εργαστηριακών υποδομών.', 'tpte' ),
					'cta'   => __( 'Περισσότερα', 'tpte' ),
					'body'  =>
						'<p>' . esc_html__( 'Για την καλύτερη λειτουργία του Εργαστηρίου Η/Υ και για την ασφάλεια των εγκαταστάσεων και του εξοπλισμού στο χώρο του Τμήματος είναι απαραίτητο να τηρείται ο Κανονισμός Λειτουργίας των Εργαστηρίων. Ο κωδικός του κάθε χρήστη είναι αυστηρά προσωπικός και για ότι συμβαίνει σε κάποιον υπολογιστή την ώρα που τον απασχολεί με τον κωδικό του είναι ο μόνος υπεύθυνος. Οι ρυθμίσεις για το περιβάλλον του κωδικού του κάθε χρήστη είναι προκαθορισμένες και κοινές για όλους, χωρίς να υπάρχει δυνατότητα μεταβολής τους. Απαγορεύεται ένας χρήστης να δανείσει τον κωδικό του σε κάποιον άλλο. Το ίδιο ισχύει και για τη χρήση του κωδικού για σύνδεση με τηλέφωνο. Δεν επιτρέπεται η παράλληλη χρήση περισσότερων του ενός υπολογιστή από ένα χρήστη, ακόμη και αν υπάρχει πληθώρα ελεύθερων προς χρήση υπολογιστών.', 'tpte' ) . '</p>'
						. '<p>' . esc_html__( 'Απαγορεύεται η κατανάλωση φαγητών ή ποτών στον χώρο του εργαστηρίου, το κάπνισμα και η χρήση κινητών τηλεφώνων. Τυχόν απορρίμματα που θα προκύψουν κατά την παραμονή σας στο εργαστήριο πρέπει να εναποτίθενται στα καλάθια αχρήστων που υπάρχουν στο εργαστήριο ή έξω από αυτό. Απαγορεύεται η εγκατάσταση οποιουδήποτε πακέτου λογισμικού (έστω και δωρεάν διατιθέμενου) από οποιονδήποτε χρήστη! Τα περιεχόμενα των δίσκων του κάθε μηχανήματος, ελέγχονται συνεχώς και εφόσον βρεθούν αρχεία που δημιούργησε ο χρήστης, όχι μόνο σβήνονται χωρίς προειδοποίηση, αλλά μπορεί να επιβληθούν και κυρώσεις (όπως το κλείδωμα του κωδικού) στους χρήστες! Η παράβαση ειδικά αυτού του περιορισμού μπορεί να επιφέρει μέχρι και μόνιμη απώλεια του κωδικού πρόσβασης στο εργαστήριο. Φεύγοντας από το εργαστήριο κλείνουμε (shutdown) πάντα τον Η/Υ στον οποίο εργαζόμασταν !', 'tpte' ) . '</p>'
						. '<p>' . esc_html__( 'Εργαζόμαστε μόνο στους Η/Υ που έχουν διατεθεί για τους μεταπτυχιακούς και σε κανένα άλλο από αυτούς που βρίσκονται στον ίδιο χώρο. Από το εργαστήριο δεν παρέχεται χώρος μόνιμης φύλαξης δεδομένων και γι\' αυτό το λόγο η χρήση δισκετών ή zip για την αποθήκευση και μεταφορά των δεδομένων και των αποτελεσμάτων της εργασίας σας θεωρείται επιβεβλημένη γιατί τα δεδομένα που βρίσκονται στους τοπικούς δίσκους του Η/Υ μπορεί να διαγραφούν χωρίς προειδοποίηση. Για προσωρινή αποθήκευση χρησιμοποιούμε μόνο το σκληρό δίσκο D:', 'tpte' ) . '</p>'
						. '<p>' . esc_html__( 'Σε περίπτωση παραβίασης των παραπάνω κανόνων λειτουργίας ο υπεύθυνος των εργαστηρίων έχει το δικαίωμα να αφαιρεί από τους χρήστες-φοιτητές το δικαίωμα πρόσβασης (διακοπή λογαριασμού) για κάποια χρονική περίοδο.', 'tpte' ) . '</p>',
				),
			),
		),
	);

	// Collects modal definitions emitted by 'modal' items so the markup can be
	// printed once at the end of the template, outside the cards (a modal nested
	// in a hover-transformed/overflow-hidden ancestor would mis-position).
	$portal_modals = array();

	/**
	 * SVG used as the outbound-link affordance on link buttons/rows.
	 */
	$portal_arrow_svg = '<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 1h6v6" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/><path d="M14 1L6.5 8.5" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 9.5v3A1.5 1.5 0 0 1 10.5 14h-8A1.5 1.5 0 0 1 1 12.5v-8A1.5 1.5 0 0 1 2.5 3h3" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/></svg>';

	$portal_kses_svg = array(
		'svg'  => array(
			'width'   => true,
			'height'  => true,
			'viewbox' => true,
			'fill'    => true,
			'xmlns'   => true,
		),
		'path' => array(
			'd'               => true,
			'stroke'          => true,
			'stroke-width'    => true,
			'stroke-linecap'  => true,
			'stroke-linejoin' => true,
			'fill'            => true,
		),
	);
	?>

	<!-- portal breadcrumb / hero start -->
	<section class="tp-breadcrumb__area tp-portal-hero pt-160 pb-150 p-relative z-index-1 fix">
		<div class="tp-breadcrumb__bg overlay" data-background="<?php echo esc_url( $tp_theme_uri ); ?>/assets/img/breadcrumb/tpte-building-from-top.png"></div>
		<div class="container">
			<div class="row align-items-center">
				<div class="col-sm-12">
					<div class="tp-breadcrumb__content">
						<div class="tp-breadcrumb__list inner-after">
							<span class="white"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.07207 0C8.19331 0 8.31107 0.0404348 8.40664 0.114882L16.1539 6.14233L15.4847 6.98713L14.5385 6.25079V12.8994C14.538 13.1843 14.4243 13.4574 14.2225 13.6589C14.0206 13.8604 13.747 13.9738 13.4616 13.9743H2.69231C2.40688 13.9737 2.13329 13.8603 1.93146 13.6588C1.72962 13.4573 1.61597 13.1843 1.61539 12.8994V6.2459L0.669148 6.98235L0 6.1376L7.7375 0.114882C7.83308 0.0404348 7.95083 0 8.07207 0ZM8.07694 1.22084L2.69231 5.40777V12.8994H13.4616V5.41341L8.07694 1.22084Z" fill="currentColor"/></svg></a></span>
							<span class="white"><?php the_title(); ?></span>
						</div>
						<h3 class="tp-breadcrumb__title color"><?php esc_html_e('Φοιτητική Πύλη','tpte'); ?></h3>
					</div>

					<?php if ( ! empty( $portal_quick_links ) ) : ?>
						<div class="tp-portal-quick">
							<h4 class="tp-portal-quick-title text-center"><?php esc_html_e( 'Καθημερινές Υπηρεσίες', 'tpte' ); ?></h4>
							<div class="tp-portal-quick-list d-flex flex-wrap justify-content-center">
								<?php foreach ( $portal_quick_links as $ql ) : ?>
									<a href="<?php echo esc_url( $ql['url'] ); ?>" class="tp-portal-quick-item text-center" target="_blank" rel="noopener noreferrer">
										<span class="tp-portal-quick-icon">
											<?php if ( ! empty( $ql['icon'] ) ) : ?>
												<img src="<?php echo esc_url( $ql['icon'] ); ?>" alt="<?php echo esc_attr( $ql['title'] ); ?>">
											<?php else : ?>
												<i class="fa-light fa-link" aria-hidden="true"></i>
											<?php endif; ?>
										</span>
										<span class="tp-portal-quick-label"><?php echo esc_html( $ql['title'] ); ?></span>
									</a>
								<?php endforeach; ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
	<!-- portal breadcrumb / hero end -->

	<!-- portal sections start -->
	<section class="tp-portal-area grey-bg pt-90 pb-120">
		<div class="container">
			<?php
			foreach ( $portal_groups as $g_index => $group ) :
				$layout = isset( $group['layout'] ) ? $group['layout'] : 'cards';
				?>
				<div class="tp-portal-section mb-50 wow fadeInUp" data-wow-delay=".<?php echo (int) ( $g_index % 4 ) + 1; ?>s">
					<div class="tp-portal-heading">
						<?php if ( ! empty( $group['icon'] ) ) : ?>
							<span class="tp-portal-heading-icon"><i class="<?php echo esc_attr( $group['icon'] ); ?>" aria-hidden="true"></i></span>
						<?php endif; ?>
						<h3 class="tp-portal-heading-title"><?php echo esc_html( $group['title'] ); ?></h3>
					</div>

					<?php if ( ! empty( $group['intro'] ) ) : ?>
						<p class="tp-portal-intro"><?php echo wp_kses_post( $group['intro'] ); ?></p>
					<?php endif; ?>

					<?php if ( 'rows' === $layout ) : ?>
						<ul class="tp-portal-rows">
							<?php
							foreach ( $group['items'] as $item ) :
								$type = isset( $item['type'] ) ? $item['type'] : 'link';
								?>
								<li class="tp-portal-row">
									<?php if ( 'faq' === $type ) : ?>
										<div class="tp-portal-row-full">
											<?php tpte_portal_render_faq( $item ); ?>
										</div>
									<?php else : ?>
										<div class="tp-portal-row-main">
											<?php if ( ! empty( $item['icon'] ) ) : ?>
												<span class="tp-portal-row-icon"><i class="<?php echo esc_attr( $item['icon'] ); ?>" aria-hidden="true"></i></span>
											<?php endif; ?>
											<span class="tp-portal-row-text">
												<span class="tp-portal-row-label"><?php echo esc_html( $item['label'] ); ?></span>
												<?php if ( ! empty( $item['desc'] ) ) : ?>
													<span class="tp-portal-row-desc"><?php echo esc_html( $item['desc'] ); ?></span>
												<?php endif; ?>
											</span>
										</div>
										<div class="tp-portal-row-action">
											<?php
											// Plain 'text' rows render no action button (copy shown in label/desc above).
											if ( 'links' === $type && ! empty( $item['links'] ) ) {
												foreach ( $item['links'] as $sub ) {
													printf(
														'<a class="tp-btn tp-portal-row-btn" href="%1$s" target="_blank" rel="noopener noreferrer">%2$s<span class="tp-portal-btn-icon" aria-hidden="true">%3$s</span></a>',
														esc_url( $sub['url'] ),
														esc_html( $sub['label'] ),
														wp_kses( $portal_arrow_svg, $portal_kses_svg )
													);
												}
											} elseif ( 'text' !== $type ) {
												$cta = ! empty( $item['cta'] ) ? $item['cta'] : __( 'Μετάβαση', 'tpte' );
												printf(
													'<a class="tp-btn tp-portal-row-btn" href="%1$s" target="_blank" rel="noopener noreferrer">%2$s<span class="tp-portal-btn-icon" aria-hidden="true">%3$s</span></a>',
													esc_url( ! empty( $item['url'] ) ? $item['url'] : '#' ),
													esc_html( $cta ),
													wp_kses( $portal_arrow_svg, $portal_kses_svg )
												);
											}
											?>
										</div>
									<?php endif; ?>
								</li>
							<?php endforeach; ?>
						</ul>

					<?php elseif ( 'text' === $layout ) : ?>
						<?php foreach ( $group['items'] as $item ) : ?>
							<div class="tp-portal-text">
								<?php if ( ! empty( $item['label'] ) ) : ?>
									<h4 class="tp-portal-text-title"><?php echo esc_html( $item['label'] ); ?></h4>
								<?php endif; ?>
								<?php if ( ! empty( $item['body'] ) ) : ?>
									<div class="tp-portal-text-body"><?php echo wp_kses_post( $item['body'] ); ?></div>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>

					<?php else : // cards (default). ?>
						<div class="row">
							<?php
							foreach ( $group['items'] as $item ) :
								$type = isset( $item['type'] ) ? $item['type'] : 'link';

								// FAQ takes the full width inside a card section.
								if ( 'faq' === $type ) :
									?>
									<div class="col-lg-12 mb-30">
										<?php tpte_portal_render_faq( $item ); ?>
									</div>
									<?php
									continue;
								endif;
								?>
								<div class="col-lg-4 col-md-6 mb-30">
									<div class="tp-portal-card h-100">
										<?php if ( ! empty( $item['icon'] ) ) : ?>
											<span class="tp-portal-card-icon"><i class="<?php echo esc_attr( $item['icon'] ); ?>" aria-hidden="true"></i></span>
										<?php endif; ?>
										<h4 class="tp-portal-card-title"><?php echo esc_html( $item['label'] ); ?></h4>
										<?php if ( ! empty( $item['desc'] ) ) : ?>
											<p class="tp-portal-card-desc"><?php echo esc_html( $item['desc'] ); ?></p>
										<?php endif; ?>

										<?php if ( 'text' === $type && ! empty( $item['body'] ) ) : ?>
											<div class="tp-portal-card-body"><?php echo wp_kses_post( $item['body'] ); ?></div>
										<?php endif; ?>

										<div class="tp-portal-card-actions">
											<?php
											if ( 'links' === $type && ! empty( $item['links'] ) ) {
												foreach ( $item['links'] as $sub ) {
													printf(
														'<a class="tp-btn tp-portal-card-btn" href="%1$s" target="_blank" rel="noopener noreferrer">%2$s<span class="tp-portal-btn-icon" aria-hidden="true">%3$s</span></a>',
														esc_url( $sub['url'] ),
														esc_html( $sub['label'] ),
														wp_kses( $portal_arrow_svg, $portal_kses_svg )
													);
												}
											} elseif ( 'modal' === $type ) {
												// Register the modal markup for output at the end of the
												// template and render a trigger button here.
												$modal_id        = 'tp-portal-modal-' . ( count( $portal_modals ) + 1 );
												$portal_modals[] = array(
													'id'    => $modal_id,
													'title' => $item['label'],
													'body'  => ! empty( $item['body'] ) ? $item['body'] : '',
												);
												$cta = ! empty( $item['cta'] ) ? $item['cta'] : __( 'Περισσότερα', 'tpte' );
												printf(
													'<button type="button" class="tp-btn tp-portal-card-btn" data-bs-toggle="modal" data-bs-target="#%1$s">%2$s</button>',
													esc_attr( $modal_id ),
													esc_html( $cta )
												);
											} elseif ( 'link' === $type ) {
												$cta = ! empty( $item['cta'] ) ? $item['cta'] : __( 'Μετάβαση', 'tpte' );
												printf(
													'<a class="tp-btn tp-portal-card-btn" href="%1$s" target="_blank" rel="noopener noreferrer">%2$s<span class="tp-portal-btn-icon" aria-hidden="true">%3$s</span></a>',
													esc_url( ! empty( $item['url'] ) ? $item['url'] : '#' ),
													esc_html( $cta ),
													wp_kses( $portal_arrow_svg, $portal_kses_svg )
												);
											}
											?>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</section>
	<!-- portal sections end -->

	<?php if ( ! empty( $portal_modals ) ) : ?>
		<!-- portal modals start -->
		<?php foreach ( $portal_modals as $modal ) : ?>
			<div class="modal fade tp-portal-modal" id="<?php echo esc_attr( $modal['id'] ); ?>" tabindex="-1" aria-labelledby="<?php echo esc_attr( $modal['id'] ); ?>-label" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title tp-portal-modal-title" id="<?php echo esc_attr( $modal['id'] ); ?>-label"><?php echo esc_html( $modal['title'] ); ?></h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="<?php esc_attr_e( 'Κλείσιμο', 'tpte' ); ?>"></button>
						</div>
						<div class="modal-body tp-portal-modal-body">
							<?php echo wp_kses_post( $modal['body'] ); ?>
						</div>
						<div class="modal-footer">
							<button type="button" class="tp-btn tp-portal-modal-close" data-bs-dismiss="modal"><?php esc_html_e( 'Κλείσιμο', 'tpte' ); ?></button>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		<!-- portal modals end -->
	<?php endif; ?>

	<?php
endwhile;

get_footer();

/**
 * Render a FAQ item as a Bootstrap accordion.
 *
 * Defined at file scope so it is available to both the rows and cards branches.
 * Bootstrap JS (tpte-bootstrap) is enqueued globally, so no extra script is
 * needed for the collapse behaviour.
 *
 * @param array $item Portal item of type 'faq' with a `qa` list of {q,a}.
 */
function tpte_portal_render_faq( $item ) {
	if ( empty( $item['qa'] ) || ! is_array( $item['qa'] ) ) {
		return;
	}

	// Unique id per accordion so multiple FAQs on a page do not collide.
	static $faq_counter = 0;
	++$faq_counter;
	$acc_id = 'tp-portal-faq-' . $faq_counter;
	?>
	<div class="tp-portal-faq">
		<?php if ( ! empty( $item['label'] ) ) : ?>
			<h4 class="tp-portal-faq-title">
				<?php if ( ! empty( $item['icon'] ) ) : ?>
					<i class="<?php echo esc_attr( $item['icon'] ); ?>" aria-hidden="true"></i>
				<?php endif; ?>
				<?php echo esc_html( $item['label'] ); ?>
			</h4>
		<?php endif; ?>

		<div class="accordion tp-portal-accordion" id="<?php echo esc_attr( $acc_id ); ?>">
			<?php foreach ( $item['qa'] as $qi => $qa ) :
				$heading_id  = $acc_id . '-h-' . $qi;
				$collapse_id = $acc_id . '-c-' . $qi;
				?>
				<div class="accordion-item">
					<h2 class="accordion-header" id="<?php echo esc_attr( $heading_id ); ?>">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr( $collapse_id ); ?>" aria-expanded="false" aria-controls="<?php echo esc_attr( $collapse_id ); ?>">
							<?php echo esc_html( $qa['q'] ); ?>
						</button>
					</h2>
					<div id="<?php echo esc_attr( $collapse_id ); ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo esc_attr( $heading_id ); ?>" data-bs-parent="#<?php echo esc_attr( $acc_id ); ?>">
						<div class="accordion-body">
							<?php echo wp_kses_post( $qa['a'] ); ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php
}
