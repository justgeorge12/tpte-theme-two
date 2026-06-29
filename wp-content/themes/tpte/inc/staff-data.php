<?php
/**
 * Central staff data registry for Τ.Π.Τ.Ε.
 *
 * Covers: Ε.Ε.Π., Ε.ΔΙ.Π., Ε.Τ.Ε.Π. — extend with Δ.Ε.Π. and Διοικητικό when ready.
 *
 * Usage in any template:
 *   require_once get_template_directory() . '/inc/staff-data.php';
 *   foreach ( tpte_all_staff()['edip'] as $m ) { ... }
 *   $member = tpte_get_staff_member( 'edip', 'mavrofidis' );
 *
 * Data is keyed dept → slug → fields.
 * Results are cached so multiple calls cost nothing.
 *
 * @package tpte
 */

if ( ! function_exists( 'tpte_all_staff' ) ) :

function tpte_all_staff() {
	static $cache = null;
	if ( null !== $cache ) {
		return $cache;
	}

	$uri = get_template_directory_uri();

	$cache = array(

		// ── Ε.Ε.Π. ──────────────────────────────────────────────────────────
		'eep' => array(
			'nikolarea' => array(
				'slug'           => 'nikolarea',
				'name'           => 'Νικολαρέα Αικατερίνη',
				'role'           => 'Ε.Ε.Π.',
				'specialization' => 'Αγγλικά για Ειδικούς Σκοπούς, Μεταφρασεολογία–Μετάφραση, Διερμηνεία, Θεατρική Μετάφραση, Συγκριτική Γραμματολογία',
				'short_bio'      => 'Η Αικατερίνη Νικολαρέα είναι μέλος Ειδικού Εκπαιδευτικού Προσωπικού (Ε.Ε.Π.) στο Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Τα ερευνητικά και διδακτικά της ενδιαφέροντα εστιάζουν στη Μεταφρασεολογία, τη Διερμηνεία, τη Θεατρική Μετάφραση και τη Συγκριτική Γραμματολογία, με έμφαση στη μετάφραση θεατρικών κειμένων και τη σχέση γλώσσας και πολιτισμού. Διδάσκει Αγγλική Γλώσσα για Ειδικούς και Ακαδημαϊκούς Σκοπούς, καθώς και Αγγλική Γλώσσα για Μελέτη Πανεπιστημίου.',
				'phone'          => '2251036438',
				'email'          => 'anikolarea@geo.aegean.gr',
				'cv_url'         => 'https://www.ct.aegean.gr/data/Nikolarea_CV.pdf',
				'links'          => array(),
				'photo_thumb'    => $uri . '/assets/img/eep/nikolarea.jpg',
				'photo_hero'     => $uri . '/assets/img/eep/nikolarea-hero.jpg',
				'photo_alt'      => 'Νικολαρέα Αικατερίνη',
				'initials'       => 'ΝΑ',
			),
		),

		// ── Ε.ΔΙ.Π. ─────────────────────────────────────────────────────────
		'edip' => array(
			'mavrofidis' => array(
				'slug'           => 'mavrofidis',
				'name'           => 'Μαυροφίδης Θωμάς',
				'role'           => 'Ε.ΔΙ.Π.',
				'specialization' => 'Κοινωνικοτεχνικά Συστήματα',
				'short_bio'      => 'Ο Θωμάς Μαυροφίδης είναι μέλος Εργαστηριακού Διδακτικού Προσωπικού (Ε.ΔΙ.Π.) στο Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Τα ερευνητικά και διδακτικά του ενδιαφέροντα εντάσσονται στο πεδίο των Κοινωνικοτεχνικών Συστημάτων, με έμφαση στη μελέτη των αλληλεπιδράσεων μεταξύ κοινωνικών και τεχνολογικών δομών.',
				'phone'          => '2251036632',
				'email'          => 'blacktom@aegean.gr',
				'cv_url'         => 'https://www.ct.aegean.gr/data/staff/mavrofides-thomas-eng.pdf',
				'links'          => array(),
				'photo_thumb'    => $uri . '/assets/img/edip/mavrofidis.jpg',
				'photo_hero'     => '',
				'photo_alt'      => 'Μαυροφίδης Θωμάς',
				'initials'       => 'ΜΘ',
			),
			'bakalis' => array(
				'slug'           => 'bakalis',
				'name'           => 'Μπακάλης Χρήστος',
				'role'           => 'Ε.ΔΙ.Π.',
				'specialization' => 'Κοινωνιολογία του Πολιτισμού και του Περιβάλλοντος',
				'short_bio'      => 'Ο Χρήστος Μπακάλης είναι μέλος Εργαστηριακού Διδακτικού Προσωπικού (Ε.ΔΙ.Π.) στο Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Τα ερευνητικά και διδακτικά του ενδιαφέροντα εστιάζουν στην Κοινωνιολογία του Πολιτισμού και του Περιβάλλοντος.',
				'phone'          => '2251036555',
				'email'          => 'cbakalis@aegean.gr',
				'cv_url'         => 'https://www.ct.aegean.gr/data/staff/bakalis-christos-el.pdf',
				'links'          => array(
					array( 'icon' => 'fa-graduation-cap', 'url' => 'https://aegean.academia.edu/CHRISTOSBAKALIS', 'label' => 'Academia' ),
					array( 'icon' => 'fa-flask',           'url' => 'https://www.researchgate.net/profile/Christos_Bakalis', 'label' => 'ResearchGate' ),
					array( 'icon' => 'fa-globe',           'url' => 'https://christosbakalis.wordpress.com/', 'label' => 'Website' ),
				),
				'photo_thumb'    => $uri . '/assets/img/edip/bakalis.jpg',
				'photo_hero'     => '',
				'photo_alt'      => 'Μπακάλης Χρήστος',
				'initials'       => 'ΜΧ',
			),
			'sideri' => array(
				'slug'           => 'sideri',
				'name'           => 'Σιδερή Μαρία',
				'role'           => 'Ε.ΔΙ.Π.',
				'specialization' => 'Κοινωνικά Δίκτυα και Ταυτότητες στα Ψηφιακά Μέσα Επικοινωνίας',
				'short_bio'      => 'Η Μαρία Σιδερή είναι μέλος Εργαστηριακού Διδακτικού Προσωπικού (Ε.ΔΙ.Π.) στο Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Τα ερευνητικά και διδακτικά της ενδιαφέροντα εστιάζουν στα Κοινωνικά Δίκτυα και τις Ταυτότητες στα Ψηφιακά Μέσα Επικοινωνίας.',
				'phone'          => '2251036610',
				'email'          => 'msid@aegean.gr',
				'cv_url'         => 'https://www.ct.aegean.gr/data/SIDERI_CV_EL.pdf',
				'links'          => array(),
				'photo_thumb'    => $uri . '/assets/img/edip/sideri.jpg',
				'photo_hero'     => '',
				'photo_alt'      => 'Σιδερή Μαρία',
				'initials'       => 'ΣΜ',
			),
			'simou' => array(
				'slug'           => 'simou',
				'name'           => 'Σίμου Σταύρος',
				'role'           => 'Ε.ΔΙ.Π.',
				'specialization' => 'Ασφάλεια και Προστασία της Ιδιωτικότητας σε Περιβάλλοντα Νεφοϋπολογιστικής',
				'short_bio'      => 'Ο Σταύρος Σίμου είναι μέλος Εργαστηριακού Διδακτικού Προσωπικού (Ε.ΔΙ.Π.) στο Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Τα ερευνητικά του ενδιαφέροντα επικεντρώνονται στην Ασφάλεια και Προστασία της Ιδιωτικότητας σε Περιβάλλοντα Νεφοϋπολογιστικής.',
				'phone'          => '2251036663',
				'email'          => 'ssimou@aegean.gr',
				'cv_url'         => 'https://www.ct.aegean.gr/data/staff/simou-stavros-el.pdf',
				'links'          => array(
					array( 'icon' => 'fa-graduation-cap', 'url' => 'https://aegean.academia.edu/StavrosSimou',           'label' => 'Academia' ),
					array( 'icon' => 'fa-flask',           'url' => 'https://www.researchgate.net/profile/Stavros_Simou', 'label' => 'ResearchGate' ),
				),
				'photo_thumb'    => $uri . '/assets/img/edip/simou.jpg',
				'photo_hero'     => '',
				'photo_alt'      => 'Σίμου Σταύρος',
				'initials'       => 'ΣΣ',
			),
			'chatzigeorgiou' => array(
				'slug'           => 'chatzigeorgiou',
				'name'           => 'Χατζηγεωργίου Τριάδα',
				'role'           => 'Ε.ΔΙ.Π.',
				'specialization' => 'Κοινωνικές και Πολιτισμικές Ταυτότητες',
				'short_bio'      => 'Η Τριάδα Χατζηγεωργίου είναι μέλος Εργαστηριακού Διδακτικού Προσωπικού (Ε.ΔΙ.Π.) στο Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Τα ερευνητικά και διδακτικά της ενδιαφέροντα αφορούν τις Κοινωνικές και Πολιτισμικές Ταυτότητες.',
				'phone'          => '2251036611',
				'email'          => 'adacha@aegean.gr',
				'cv_url'         => 'https://www.ct.aegean.gr/data/Chatzigeorgiou_CV.pdf',
				'links'          => array(),
				'photo_thumb'    => $uri . '/assets/img/edip/chatzigeorgiou.jpg',
				'photo_hero'     => '',
				'photo_alt'      => 'Χατζηγεωργίου Τριάδα',
				'initials'       => 'ΧΤ',
			),
		),

		// ── Δ.Ε.Π. ──────────────────────────────────────────────────────────
		'dep' => array(

			// Ομότιμοι Καθηγητές/τριες
			'vernikos' => array(
				'slug'           => 'vernikos',
				'name'           => 'Βερνίκος Νικόλας',
				'role'           => 'Ομότιμος Καθηγητής',
				'specialization' => 'Δομή, Δυναμική και Διαχείριση Οικοσυστημάτων με έμφαση στην Ανθρώπινη Οικολογία και Κοινωνιολογία',
				'short_bio'      => 'Ο Νικόλας Βερνίκος είναι Ομότιμος Καθηγητής στο Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Τα ερευνητικά του ενδιαφέροντα εστιάζουν στη Δομή, τη Δυναμική και τη Διαχείριση Οικοσυστημάτων, με έμφαση στην Ανθρώπινη Οικολογία και Κοινωνιολογία.',
				'phone'          => '',
				'email'          => 'vernicos@ct.aegean.gr',
				'cv_url'         => '',
				'links'          => array(
					array( 'icon' => 'fa-graduation-cap', 'url' => 'https://aegean.academia.edu/NicolasVernicos', 'label' => 'Academia' ),
				),
				'photo_thumb'    => $uri . '/assets/img/dep/vernikos.jpg',
				'photo_hero'     => '',
				'photo_alt'      => 'Βερνίκος Νικόλας',
				'initials'       => 'ΒΝ',
			),
			'daskalopoulou' => array(
				'slug'           => 'daskalopoulou',
				'name'           => 'Δασκαλοπούλου Σοφία',
				'role'           => 'Ομότιμη Καθηγήτρια',
				'specialization' => 'Ανθρωπολογία της Συγγένειας',
				'short_bio'      => 'Η Σοφία Δασκαλοπούλου είναι Ομότιμη Καθηγήτρια στο Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Τα ερευνητικά της ενδιαφέροντα εστιάζουν στην Ανθρωπολογία της Συγγένειας.',
				'phone'          => '',
				'email'          => 's.dascalopoulos@aegean.gr',
				'cv_url'         => '',
				'links'          => array(
					array( 'icon' => 'fa-graduation-cap', 'url' => 'https://aegean.academia.edu/SofiaDASKALOPOULOU', 'label' => 'Academia' ),
				),
				'photo_thumb'    => $uri . '/assets/img/dep/daskalopoulou.jpg',
				'photo_hero'     => '',
				'photo_alt'      => 'Δασκαλοπούλου Σοφία',
				'initials'       => 'ΔΣ',
			),

			// Καθηγητές/τριες
			'kavakli' => array(
				'slug'           => 'kavakli',
				'name'           => 'Καβακλή Ευαγγελία',
				'role'           => 'Καθηγήτρια',
				'specialization' => 'Πληροφορική με έμφαση στην Ανάλυση και Υλοποίηση Συστημάτων Βάσεων Δεδομένων και Πληροφοριακών Συστημάτων',
				'short_bio'      => 'Η Ευαγγελία Καβακλή είναι Καθηγήτρια στο Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Τα ερευνητικά και διδακτικά της ενδιαφέροντα εστιάζουν στην Πληροφορική, και πιο συγκεκριμένα στην Ανάλυση και Υλοποίηση Συστημάτων Βάσεων Δεδομένων και Πληροφοριακών Συστημάτων.',
				'phone'          => '2251036612',
				'email'          => 'kavakli@ct.aegean.gr',
				'cv_url'         => 'https://www.ct.aegean.gr/data/KAVAKLI_EL.pdf',
				'links'          => array(
					array( 'icon' => 'google-scholar', 'url' => 'https://scholar.google.gr/citations?user=TATlL7sAAAAJ&hl=el', 'label' => 'Google Scholar' ),
				),
				'photo_thumb'    => $uri . '/assets/img/dep/kavakli.jpg',
				'photo_hero'     => '',
				'photo_alt'      => 'Καβακλή Ευαγγελία',
				'initials'       => 'ΚΕ',
			),
			'anagnostopoulos' => array(
				'slug'           => 'anagnostopoulos',
				'name'           => 'Αναγνωστόπουλος Χρήστος-Νικόλαος',
				'role'           => 'Καθηγητής',
				'specialization' => 'Πληροφορική με έμφαση στην Ανάλυση και Επεξεργασία Εικόνας',
				'short_bio'      => 'Ο Χρήστος-Νικόλαος Αναγνωστόπουλος είναι Καθηγητής στο Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Τα ερευνητικά και διδακτικά του ενδιαφέροντα εστιάζουν στην Πληροφορική, με έμφαση στην Ανάλυση και Επεξεργασία Εικόνας.',
				'phone'          => '2251036624',
				'email'          => 'canag@ct.aegean.gr',
				'cv_url'         => 'https://www.ct.aegean.gr/data/staff/anagnostopoulos-christos-el.pdf',
				'links'          => array(
					array( 'icon' => 'fa-graduation-cap', 'url' => 'https://aegean.academia.edu/ChristosNikolaosAnagnostopoulos', 'label' => 'Academia' ),
					array( 'icon' => 'google-scholar', 'url' => 'https://scholar.google.gr/citations?user=H5ikkF8AAAAJ&hl=el', 'label' => 'Google Scholar' ),
					array( 'icon' => 'fa-flask',           'url' => 'https://www.researchgate.net/profile/Christos-Nikolaos_Anagnostopoulos', 'label' => 'ResearchGate' ),
					array( 'icon' => 'linkedin',        'url' => 'https://www.linkedin.com/in/cnanagnostopoulos/?ppe=1', 'label' => 'LinkedIn' ),
				),
				'photo_thumb'    => $uri . '/assets/img/dep/anagnostopoulos.jpg',
				'photo_hero'     => '',
				'photo_alt'      => 'Αναγνωστόπουλος Χρήστος-Νικόλαος',
				'initials'       => 'ΑΧ',
			),
			'kalloniatis' => array(
				'slug'           => 'kalloniatis',
				'name'           => 'Καλλονιάτης Χρήστος',
				'role'           => 'Καθηγητής',
				'specialization' => 'Μεθοδολογίες Ενίσχυσης της Ιδιωτικότητας στη Σχεδίαση Πληροφοριακών Συστημάτων',
				'short_bio'      => 'Ο Χρήστος Καλλονιάτης είναι Καθηγητής στο Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Τα ερευνητικά και διδακτικά του ενδιαφέροντα εστιάζουν στις Μεθοδολογίες Ενίσχυσης της Ιδιωτικότητας στη Σχεδίαση Πληροφοριακών Συστημάτων.',
				'phone'          => '2251036637',
				'email'          => 'chkallon@aegean.gr',
				'cv_url'         => 'https://www.ct.aegean.gr/data/Kalloniatis.pdf',
				'links'          => array(
					array( 'icon' => 'fa-graduation-cap', 'url' => 'http://aegean.academia.edu/ChristosKalloniatis', 'label' => 'Academia' ),
					array( 'icon' => 'google-scholar', 'url' => 'https://scholar.google.gr/citations?user=_yiQO4EAAAAJ&hl=el&oi=ao', 'label' => 'Google Scholar' ),
					array( 'icon' => 'fa-flask',           'url' => 'https://www.researchgate.net/profile/Christos_Kalloniatis', 'label' => 'ResearchGate' ),
					array( 'icon' => 'linkedin',        'url' => 'https://www.linkedin.com/in/kalloniatis-christos-aba39879/', 'label' => 'LinkedIn' ),
				),
				'photo_thumb'    => $uri . '/assets/img/dep/kalloniatis.jfif',
				'photo_hero'     => '',
				'photo_alt'      => 'Καλλονιάτης Χρήστος',
				'initials'       => 'ΚΧ',
			),
			'bounia' => array(
				'slug'           => 'bounia',
				'name'           => 'Μπούνια Αλεξάνδρα',
				'role'           => 'Καθηγήτρια',
				'specialization' => 'Μουσειολογία',
				'short_bio'      => 'Η Αλεξάνδρα Μπούνια είναι Καθηγήτρια στο Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Τα ερευνητικά και διδακτικά της ενδιαφέροντα εστιάζουν στη Μουσειολογία, ερευνώντας θέματα μουσειακής θεωρίας, πρακτικής και εκπαίδευσης.',
				'phone'          => '2251036630',
				'email'          => 'abounia@ct.aegean.gr',
				'cv_url'         => 'https://www.ct.aegean.gr/data/staff/mpounia-aleksandra-el.pdf',
				'links'          => array(
					array( 'icon' => 'fa-graduation-cap', 'url' => 'https://aegean.academia.edu/ALEXANDRABOUNIA', 'label' => 'Academia' ),
					array( 'icon' => 'fa-flask',           'url' => 'https://www.researchgate.net/profile/Alexandra_Bounia', 'label' => 'ResearchGate' ),
				),
				'photo_thumb'    => $uri . '/assets/img/dep/bounia.jpg',
				'photo_hero'     => '',
				'photo_alt'      => 'Μπούνια Αλεξάνδρα',
				'initials'       => 'ΜΑ',
			),
			'daradoumis' => array(
				'slug'           => 'daradoumis',
				'name'           => 'Νταραντούμης Αθανάσιος',
				'role'           => 'Καθηγητής',
				'specialization' => 'Πρότυπα μάθησης και Ανάλυση Εκπαιδευτικών Δεδομένων',
				'short_bio'      => 'Ο Αθανάσιος Νταραντούμης είναι Καθηγητής στο Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Τα ερευνητικά και διδακτικά του ενδιαφέροντα εστιάζουν στα Πρότυπα Μάθησης και την Ανάλυση Εκπαιδευτικών Δεδομένων.',
				'phone'          => '2251036650',
				'email'          => 'daradoumis@aegean.gr',
				'cv_url'         => 'https://www.ct.aegean.gr/data/daradoumis.pdf',
				'links'          => array(
					array( 'icon' => 'fa-graduation-cap', 'url' => 'https://aegean.academia.edu/TDaradoumis', 'label' => 'Academia' ),
					array( 'icon' => 'google-scholar', 'url' => 'https://scholar.google.gr/citations?user=5oD0RKcAAAAJ&hl=el&oi=ao', 'label' => 'Google Scholar' ),
					array( 'icon' => 'fa-flask',           'url' => 'https://www.researchgate.net/profile/Thanasis_Daradoumis', 'label' => 'ResearchGate' ),
					array( 'icon' => 'linkedin',        'url' => 'https://www.linkedin.com/in/thanasis-daradoumis/', 'label' => 'LinkedIn' ),
				),
				'photo_thumb'    => $uri . '/assets/img/dep/daradoumis.jpg',
				'photo_hero'     => '',
				'photo_alt'      => 'Νταραντούμης Αθανάσιος',
				'initials'       => 'ΝΑ',
			),
			'papageorgiou' => array(
				'slug'           => 'papageorgiou',
				'name'           => 'Παπαγεωργίου Δημήτρης',
				'role'           => 'Καθηγητής',
				'specialization' => 'Θεωρία της Επιτέλεσης και Πολιτιστική Αναπαράσταση',
				'short_bio'      => 'Ο Δημήτρης Παπαγεωργίου είναι Καθηγητής στο Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Τα ερευνητικά και διδακτικά του ενδιαφέροντα εστιάζουν στη Θεωρία της Επιτέλεσης και την Πολιτιστική Αναπαράσταση.',
				'phone'          => '2251036617',
				'email'          => 'dpap@ct.aegean.gr',
				'cv_url'         => 'https://www.ct.aegean.gr/data/Papageorgiou.pdf',
				'links'          => array(),
				'photo_thumb'    => $uri . '/assets/img/dep/papageorgiou.jpg',
				'photo_hero'     => '',
				'photo_alt'      => 'Παπαγεωργίου Δημήτρης',
				'initials'       => 'ΠΔ',
			),
			'pavlogeorgatos' => array(
				'slug'           => 'pavlogeorgatos',
				'name'           => 'Παυλογεωργάτος Γεράσιμος',
				'role'           => 'Καθηγητής',
				'specialization' => 'Διατήρηση Φυσικού και Πολιτιστικού Περιβάλλοντος',
				'short_bio'      => 'Ο Γεράσιμος Παυλογεωργάτος είναι Καθηγητής στο Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Τα ερευνητικά και διδακτικά του ενδιαφέροντα εστιάζουν στη Διατήρηση Φυσικού και Πολιτιστικού Περιβάλλοντος.',
				'phone'          => '2251036613',
				'email'          => 'gpav@aegean.gr',
				'cv_url'         => 'https://www.ct.aegean.gr/data/staff/pavlogeorgatos-gerasimos-el.pdf',
				'links'          => array(
					array( 'icon' => 'fa-graduation-cap', 'url' => 'http://aegean.academia.edu/PavlogeorgatosGerasimos', 'label' => 'Academia' ),
					array( 'icon' => 'fa-flask',           'url' => 'https://www.researchgate.net/profile/Gerasimos_Pavlogeorgatos', 'label' => 'ResearchGate' ),
					array( 'icon' => 'linkedin',        'url' => 'https://www.linkedin.com/in/pavlogeorgatos', 'label' => 'LinkedIn' ),
				),
				'photo_thumb'    => $uri . '/assets/img/dep/pavlogeorgatos.jpg',
				'photo_hero'     => '',
				'photo_alt'      => 'Παυλογεωργάτος Γεράσιμος',
				'initials'       => 'ΠΓ',
			),
			'sampanikou' => array(
				'slug'           => 'sampanikou',
				'name'           => 'Σαμπανίκου Ευαγγελία',
				'role'           => 'Καθηγήτρια',
				'specialization' => 'Ιστορία της Τέχνης και Οπτικός Πολιτισμός',
				'short_bio'      => 'Η Ευαγγελία Σαμπανίκου είναι Καθηγήτρια στο Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Τα ερευνητικά και διδακτικά της ενδιαφέροντα εστιάζουν στην Ιστορία της Τέχνης και τον Οπτικό Πολιτισμό.',
				'phone'          => '2251036618',
				'email'          => 'esampa@ct.aegean.gr',
				'cv_url'         => 'https://www.ct.aegean.gr/data/SAMPANIKOU_CV_EL.pdf',
				'links'          => array(
					array( 'icon' => 'fa-graduation-cap', 'url' => 'https://aegean.academia.edu/EviSampanikou', 'label' => 'Academia' ),
					array( 'icon' => 'fa-flask',           'url' => 'https://www.researchgate.net/profile/Evi_Sampanikou', 'label' => 'ResearchGate' ),
				),
				'photo_thumb'    => $uri . '/assets/img/dep/sampanikou.jpg',
				'photo_hero'     => '',
				'photo_alt'      => 'Σαμπανίκου Ευαγγελία',
				'initials'       => 'ΣΕ',
			),
			'stathi' => array(
				'slug'           => 'stathi',
				'name'           => 'Στάθη Ειρήνη',
				'role'           => 'Καθηγήτρια',
				'specialization' => 'Κινηματογραφικές Σπουδές: Ιστορία και Θεωρία του Κινηματογράφου',
				'short_bio'      => 'Η Ειρήνη Στάθη είναι Καθηγήτρια στο Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Τα ερευνητικά και διδακτικά της ενδιαφέροντα εστιάζουν στις Κινηματογραφικές Σπουδές, και πιο συγκεκριμένα στην Ιστορία και Θεωρία του Κινηματογράφου.',
				'phone'          => '2251036642',
				'email'          => 'i.stathi@ct.aegean.gr',
				'cv_url'         => 'https://www.ct.aegean.gr/data/Stathi_CV.pdf',
				'links'          => array(),
				'photo_thumb'    => $uri . '/assets/img/dep/stathi.jpg',
				'photo_hero'     => '',
				'photo_alt'      => 'Στάθη Ειρήνη',
				'initials'       => 'ΣΤ',
			),
			'tsekouras' => array(
				'slug'           => 'tsekouras',
				'name'           => 'Τσεκούρας Γεώργιος',
				'role'           => 'Καθηγητής',
				'specialization' => 'Μοντελοποίηση δεδομένων με έμφαση στα πολιτισμικά δεδομένα',
				'short_bio'      => 'Ο Γεώργιος Τσεκούρας είναι Καθηγητής στο Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Τα ερευνητικά και διδακτικά του ενδιαφέροντα εστιάζουν στη Μοντελοποίηση Δεδομένων, με έμφαση στην εφαρμογή της στα πολιτισμικά δεδομένα.',
				'phone'          => '2251036631',
				'email'          => 'gtsek@ct.aegean.gr',
				'cv_url'         => 'https://www.ct.aegean.gr/data/TSEKOURAS_EL.pdf',
				'links'          => array(
					array( 'icon' => 'google-scholar', 'url' => 'https://scholar.google.gr/citations?user=tQoukVYAAAAJ&hl=el', 'label' => 'Google Scholar' ),
					array( 'icon' => 'fa-flask',           'url' => 'https://www.researchgate.net/profile/George_Tsekouras3', 'label' => 'ResearchGate' ),
				),
				'photo_thumb'    => $uri . '/assets/img/dep/tsekouras.jpg',
				'photo_hero'     => '',
				'photo_alt'      => 'Τσεκούρας Γεώργιος',
				'initials'       => 'ΤΓ',
			),
			'karidakis' => array(
				'slug'           => 'karidakis',
				'name'           => 'Καρυδάκης Γεώργιος',
				'role'           => 'Καθηγητής',
				'specialization' => 'Πολυμεσική, Εφυής, Φυσική και Συναισθηματική Αλληλεπίδραση',
				'short_bio'      => 'Ο Γεώργιος Καρυδάκης είναι Καθηγητής στο Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Τα ερευνητικά και διδακτικά του ενδιαφέροντα εστιάζουν στην Πολυμεσική, Εφυή, Φυσική και Συναισθηματική Αλληλεπίδραση ανθρώπου-υπολογιστή.',
				'phone'          => '2251036644',
				'email'          => 'gcari@aegean.gr',
				'cv_url'         => 'https://www.ct.aegean.gr/data/staff/karidakis-georgios-el.pdf',
				'links'          => array(
					array( 'icon' => 'fa-graduation-cap', 'url' => 'https://aegean.academia.edu/GeorgeCaridakis', 'label' => 'Academia' ),
					array( 'icon' => 'google-scholar', 'url' => 'https://scholar.google.com/citations?hl=en&user=LBOSWEcAAAAJ', 'label' => 'Google Scholar' ),
					array( 'icon' => 'fa-flask',           'url' => 'https://www.researchgate.net/profile/George_Caridakis', 'label' => 'ResearchGate' ),
					array( 'icon' => 'linkedin',        'url' => 'https://www.linkedin.com/in/georgecaridakis', 'label' => 'LinkedIn' ),
				),
				'photo_thumb'    => $uri . '/assets/img/dep/karidakis.jpg',
				'photo_hero'     => '',
				'photo_alt'      => 'Καρυδάκης Γεώργιος',
				'initials'       => 'ΚΓ',
			),
			'chourmouziadi' => array(
				'slug'           => 'chourmouziadi',
				'name'           => 'Χουρμουζιάδη Αναστασία',
				'role'           => 'Καθηγήτρια',
				'specialization' => 'Μουσειακή Θεωρία και Εκθεσιακός Σχεδιασμός',
				'short_bio'      => 'Η Αναστασία Χουρμουζιάδη είναι Καθηγήτρια στο Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Τα ερευνητικά και διδακτικά της ενδιαφέροντα εστιάζουν στη Μουσειακή Θεωρία και τον Εκθεσιακό Σχεδιασμό.',
				'phone'          => '2251036687',
				'email'          => 'nassiah@aegean.gr',
				'cv_url'         => 'https://www.ct.aegean.gr/data/staff/chourmouziadi-anastasia-el.pdf',
				'links'          => array(
					array( 'icon' => 'fa-graduation-cap', 'url' => 'https://aegean.academia.edu/AnastasiaChourmouziadi', 'label' => 'Academia' ),
				),
				'photo_thumb'    => $uri . '/assets/img/dep/chourmouziadi.jpg',
				'photo_hero'     => '',
				'photo_alt'      => 'Χουρμουζιάδη Αναστασία',
				'initials'       => 'ΧΑ',
			),

			// Αναπληρωτές Καθηγητές/τριες
			'kotis' => array(
				'slug'           => 'kotis',
				'name'           => 'Κώτης Κωνσταντίνος',
				'role'           => 'Αναπληρωτής Καθηγητής',
				'specialization' => 'Σημασιολογικός Ιστός των Πραγμάτων',
				'short_bio'      => 'Ο Κωνσταντίνος Κώτης είναι Αναπληρωτής Καθηγητής στο Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Τα ερευνητικά και διδακτικά του ενδιαφέροντα εστιάζουν στον Σημασιολογικό Ιστό των Πραγμάτων.',
				'phone'          => '2251036620',
				'email'          => 'kotis@aegean.gr',
				'cv_url'         => 'https://www.ct.aegean.gr/data/staff/kotis-kostas-el.pdf',
				'links'          => array(
					array( 'icon' => 'google-scholar', 'url' => 'https://scholar.google.com/citations?user=x4T5OfIAAAAJ&hl=en', 'label' => 'Google Scholar' ),
					array( 'icon' => 'linkedin',        'url' => 'https://gr.linkedin.com/in/kotis', 'label' => 'LinkedIn' ),
				),
				'photo_thumb'    => $uri . '/assets/img/dep/kotis.jpg',
				'photo_hero'     => '',
				'photo_alt'      => 'Κώτης Κωνσταντίνος',
				'initials'       => 'ΚΚ',
			),
			'katapoti' => array(
				'slug'           => 'katapoti',
				'name'           => 'Καταπότη Δέσποινα',
				'role'           => 'Αναπληρώτρια Καθηγήτρια',
				'specialization' => 'Θεωρία Πολιτισμού και Ψηφιακός Πολιτισμός',
				'short_bio'      => 'Η Δέσποινα Καταπότη είναι Αναπληρώτρια Καθηγήτρια στο Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Τα ερευνητικά και διδακτικά της ενδιαφέροντα εστιάζουν στη Θεωρία Πολιτισμού και τον Ψηφιακό Πολιτισμό.',
				'phone'          => '2251036626',
				'email'          => 'dcatapoti@aegean.gr',
				'cv_url'         => 'https://www.ct.aegean.gr/data/staff/katapoti-despoina-el.pdf',
				'links'          => array(
					array( 'icon' => 'fa-graduation-cap', 'url' => 'http://aegean.academia.edu/despinacatapoti', 'label' => 'Academia' ),
				),
				'photo_thumb'    => $uri . '/assets/img/dep/katapoti.jpg',
				'photo_hero'     => '',
				'photo_alt'      => 'Καταπότη Δέσποινα',
				'initials'       => 'ΚΔ',
			),
			'bubaris' => array(
				'slug'           => 'bubaris',
				'name'           => 'Μπουμπάρης Νικόλαος',
				'role'           => 'Αναπληρωτής Καθηγητής',
				'specialization' => 'Πολιτιστική Αναπαράσταση και Δημιουργικά Μέσα',
				'short_bio'      => 'Ο Νικόλαος Μπουμπάρης είναι Αναπληρωτής Καθηγητής στο Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Τα ερευνητικά και διδακτικά του ενδιαφέροντα εστιάζουν στην Πολιτιστική Αναπαράσταση και τα Δημιουργικά Μέσα.',
				'phone'          => '2251036629',
				'email'          => 'nbubaris@ct.aegean.gr',
				'cv_url'         => 'https://www.ct.aegean.gr/data/staff/bubaris-nikos-el.pdf',
				'links'          => array(
					array( 'icon' => 'fa-graduation-cap', 'url' => 'https://aegean.academia.edu/NikosBubaris', 'label' => 'Academia' ),
				),
				'photo_thumb'    => $uri . '/assets/img/dep/bubaris.jpg',
				'photo_hero'     => '',
				'photo_alt'      => 'Μπουμπάρης Νικόλαος',
				'initials'       => 'ΜΝ',
			),
			'kasapakis' => array(
				'slug'           => 'kasapakis',
				'name'           => 'Κασαπάκης Βλάσιος',
				'role'           => 'Αναπληρωτής Καθηγητής',
				'specialization' => 'Εκτεταμένη Πραγματικότητα',
				'short_bio'      => 'Ο Βλάσιος Κασαπάκης είναι Αναπληρωτής Καθηγητής στο Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Τα ερευνητικά και διδακτικά του ενδιαφέροντα εστιάζουν στην Εκτεταμένη Πραγματικότητα, καλύπτοντας εφαρμογές Εικονικής, Επαυξημένης και Μεικτής Πραγματικότητας.',
				'phone'          => '2251036638',
				'email'          => 'v.kasapakis@aegean.gr',
				'cv_url'         => 'https://www.ct.aegean.gr/data/staff/kasapakis-vlasios-el.pdf',
				'links'          => array(
					array( 'icon' => 'fa-flask', 'url' => 'https://www.researchgate.net/profile/Vlasios_Kasapakis', 'label' => 'ResearchGate' ),
				),
				'photo_thumb'    => $uri . '/assets/img/dep/kasapakis.jpg',
				'photo_hero'     => '',
				'photo_alt'      => 'Κασαπάκης Βλάσιος',
				'initials'       => 'ΚΒ',
			),

			// Επίκουροι Καθηγητές/τριες
			'aivaliotis' => array(
				'slug'           => 'aivaliotis',
				'name'           => 'Αϊβαλιώτης Κωνσταντίνος',
				'role'           => 'Επίκουρος Καθηγητής',
				'specialization' => 'Σκηνοθεσία και Σεναριογραφία στις Ψηφιακές Οπτικοακουστικές Τέχνες',
				'short_bio'      => 'Ο Κωνσταντίνος Αϊβαλιώτης είναι Επίκουρος Καθηγητής στο Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Τα ερευνητικά και διδακτικά του ενδιαφέροντα εστιάζουν στη Σκηνοθεσία και Σεναριογραφία στις Ψηφιακές Οπτικοακουστικές Τέχνες.',
				'phone'          => '6945104788',
				'email'          => 'kaivaliotis@aegean.gr',
				'cv_url'         => 'https://www.ct.aegean.gr/data/staff/aivaliotis-konstantinos-el.pdf',
				'links'          => array(
					array( 'icon' => 'linkedin', 'url' => 'https://www.linkedin.com/in/konstantinosaivaliotis/', 'label' => 'LinkedIn' ),
				),
				'photo_thumb'    => $uri . '/assets/img/dep/aivaliotis.jpg',
				'photo_hero'     => '',
				'photo_alt'      => 'Αϊβαλιώτης Κωνσταντίνος',
				'initials'       => 'ΑΚ',
			),
			'kitsiou' => array(
				'slug'           => 'kitsiou',
				'name'           => 'Κίτσιου Αγγελική',
				'role'           => 'Επίκουρη Καθηγήτρια',
				'specialization' => 'Κοινωνιολογία του Διαδικτύου και Σχεδιασμός Κοινωνικών Απαιτήσεων στα σύγχρονα ψηφιακά περιβάλλοντα',
				'short_bio'      => 'Η Αγγελική Κίτσιου είναι Επίκουρη Καθηγήτρια στο Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Τα ερευνητικά και διδακτικά της ενδιαφέροντα εστιάζουν στην Κοινωνιολογία του Διαδικτύου και τον Σχεδιασμό Κοινωνικών Απαιτήσεων στα σύγχρονα ψηφιακά περιβάλλοντα.',
				'phone'          => '2251036622',
				'email'          => 'a.kitsiou@aegean.gr',
				'cv_url'         => 'https://www.ct.aegean.gr/data/KITSIOU.pdf',
				'links'          => array(
					array( 'icon' => 'google-scholar', 'url' => 'https://scholar.google.com/citations?user=cD_19JoAAAAJ&hl=el', 'label' => 'Google Scholar' ),
					array( 'icon' => 'linkedin',        'url' => 'https://www.linkedin.com/in/angeliki-kitsiou-554187b5', 'label' => 'LinkedIn' ),
				),
				'photo_thumb'    => $uri . '/assets/img/dep/kitsiou.jpg',
				'photo_hero'     => '',
				'photo_alt'      => 'Κίτσιου Αγγελική',
				'initials'       => 'ΚΑ',
			),
			'poulou' => array(
				'slug'           => 'poulou',
				'name'           => 'Πούλου Δέσποινα',
				'role'           => 'Επίκουρη Καθηγήτρια',
				'specialization' => 'Πολιτισμός και Ψηφιακά Οπτικοακουστικά Μέσα',
				'short_bio'      => 'Η Δέσποινα Πούλου είναι Επίκουρη Καθηγήτρια στο Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Τα ερευνητικά και διδακτικά της ενδιαφέροντα εστιάζουν στον Πολιτισμό και τα Ψηφιακά Οπτικοακουστικά Μέσα.',
				'phone'          => '2251036639',
				'email'          => 'd.poulou@aegean.gr',
				'cv_url'         => 'https://www.ct.aegean.gr/data/staff/poulou-despoina-el.pdf',
				'links'          => array(
					array( 'icon' => 'fa-graduation-cap', 'url' => 'https://aegean.academia.edu/%CE%94%CE%AD%CF%83%CF%80%CE%BF%CE%B9%CE%BD%CE%B1%CE%A0%CE%BF%CF%8D%CE%BB%CE%BF%CF%85', 'label' => 'Academia' ),
					array( 'icon' => 'fa-flask',           'url' => 'https://www.researchgate.net/profile/Despina-Poulou', 'label' => 'ResearchGate' ),
					array( 'icon' => 'linkedin',        'url' => 'https://www.linkedin.com/in/despina-poulou-01144024a/', 'label' => 'LinkedIn' ),
				),
				'photo_thumb'    => $uri . '/assets/img/dep/poulou.jpg',
				'photo_hero'     => '',
				'photo_alt'      => 'Πούλου Δέσποινα',
				'initials'       => 'ΠΔ',
			),
			'chrysanthi' => array(
				'slug'           => 'chrysanthi',
				'name'           => 'Χρυσάνθη Αγγελική',
				'role'           => 'Επίκουρη Καθηγήτρια',
				'specialization' => 'Διαδραστική Αφήγηση και Ψηφιακή Πολιτιστική Κληρονομιά',
				'short_bio'      => 'Η Αγγελική Χρυσάνθη είναι Επίκουρη Καθηγήτρια στο Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Τα ερευνητικά και διδακτικά της ενδιαφέροντα εστιάζουν στη Διαδραστική Αφήγηση και την Ψηφιακή Πολιτιστική Κληρονομιά.',
				'phone'          => '6946094378',
				'email'          => 'a.chrysanthi@aegean.gr',
				'cv_url'         => 'https://www.ct.aegean.gr/data/staff/chrysanthi-aggeliki-el.pdf',
				'links'          => array(
					array( 'icon' => 'fa-graduation-cap', 'url' => 'https://aegean.academia.edu/AngelikiChrysanthi', 'label' => 'Academia' ),
					array( 'icon' => 'google-scholar', 'url' => 'https://scholar.google.co.uk/citations?user=QiT4-7AAAAAJ&hl=en', 'label' => 'Google Scholar' ),
					array( 'icon' => 'fa-flask',           'url' => 'https://www.researchgate.net/profile/Angeliki_Chrysanthi', 'label' => 'ResearchGate' ),
					array( 'icon' => 'linkedin',        'url' => 'https://www.linkedin.com/in/angelikichrysanthi/', 'label' => 'LinkedIn' ),
				),
				'photo_thumb'    => $uri . '/assets/img/dep/chrysanthi.jpg',
				'photo_hero'     => '',
				'photo_alt'      => 'Χρυσάνθη Αγγελική',
				'initials'       => 'ΧΑ',
			),
			'stefanopoulou' => array(
				'slug'           => 'stefanopoulou',
				'name'           => 'Στεφανοπούλου Ευδοκία',
				'role'           => 'Επίκουρη Καθηγήτρια',
				'specialization' => 'Οπτικοακουστικές Τέχνες και Δημιουργικές Βιομηχανίες',
				'short_bio'      => 'Η Ευδοκία Στεφανοπούλου είναι Επίκουρη Καθηγήτρια στο Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Τα ερευνητικά και διδακτικά της ενδιαφέροντα εστιάζουν στις Οπτικοακουστικές Τέχνες και τις Δημιουργικές Βιομηχανίες.',
				'phone'          => '2251036627',
				'email'          => 'e.stefanopoulou@aegean.gr',
				'cv_url'         => 'https://www.ct.aegean.gr/data/staff/stefanopoulou-eudokia-el.pdf',
				'links'          => array(),
				'photo_thumb'    => $uri . '/assets/img/dep/stefanopoulou.jpg',
				'photo_hero'     => '',
				'photo_alt'      => 'Στεφανοπούλου Ευδοκία',
				'initials'       => 'ΣΕ',
			),
		),

		// ── Ε.Τ.Ε.Π. ─────────────────────────────────────────────────────────
		'etep' => array(
			'kargas' => array(
				'slug'           => 'kargas',
				'name'           => 'Κάργας Παναγιώτης',
				'role'           => 'Υπεύθυνος Εργαστηρίων Πληροφορικής (Ε.Τ.Ε.Π.)',
				'specialization' => 'Εργαστήρια Πληροφορικής — Κτήριο Λέσχης, Υπόγειο',
				'short_bio'      => 'Ο Παναγιώτης Κάργας είναι Υπεύθυνος Εργαστηρίων Πληροφορικής και μέλος Ειδικού Τεχνικού Εργαστηριακού Προσωπικού (Ε.Τ.Ε.Π.) στο Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Είναι υπεύθυνος για τη διαχείριση και τεχνική υποστήριξη των εργαστηριακών υποδομών πληροφορικής του Τμήματος, που στεγάζονται στο κτήριο Λέσχης.',
				'phone'          => '2251036615',
				'email'          => 'pica@aegean.gr',
				'cv_url'         => '',
				'links'          => array(),
				'photo_thumb'    => $uri . '/assets/img/etep/kargas.jpg',
				'photo_hero'     => '',
				'photo_alt'      => 'Κάργας Παναγιώτης',
				'initials'       => 'ΚΠ',
			),
			'spathis' => array(
				'slug'           => 'spathis',
				'name'           => 'Σπάθης Αλέξανδρος',
				'role'           => 'Ε.Τ.Ε.Π.',
				'specialization' => 'Τρισδιάστατα γραφικά, μοντάζ ήχου και εικόνας',
				'short_bio'      => 'Ο Αλέξανδρος Σπάθης είναι μέλος Ειδικού Τεχνικού Εργαστηριακού Προσωπικού (Ε.Τ.Ε.Π.) στο Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Η εξειδίκευσή του καλύπτει τα Τρισδιάστατα Γραφικά και το μοντάζ ήχου και εικόνας, υποστηρίζοντας τεχνικά την εργαστηριακή εκπαίδευση του Τμήματος.',
				'phone'          => '2251036628',
				'email'          => 'a.spathis@aegean.gr',
				'cv_url'         => 'https://www.ct.aegean.gr/data/Spathis_EL.pdf',
				'links'          => array(
					array( 'icon' => 'linkedin', 'url' => 'https://www.linkedin.com/in/alexandros-spathis-a9141546', 'label' => 'LinkedIn' ),
				),
				'photo_thumb'    => $uri . '/assets/img/etep/spathis.png',
				'photo_hero'     => '',
				'photo_alt'      => 'Σπάθης Αλέξανδρος',
				'initials'       => 'ΣΑ',
			),
			'iliadis' => array(
				'slug'           => 'iliadis',
				'name'           => 'Ηλιάδης Γιάννης',
				'role'           => 'Ε.Τ.Ε.Π.',
				'specialization' => 'Έρευνα, Τεκμηρίωση και Διαχείριση Ψηφιακών Πολιτιστικών Δεδομένων',
				'short_bio'      => 'Ο Γιάννης Ηλιάδης είναι μέλος Ειδικού Τεχνικού Εργαστηριακού Προσωπικού (Ε.Τ.Ε.Π.) στο Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Τα ενδιαφέροντά του επικεντρώνονται στην Έρευνα, Τεκμηρίωση και Διαχείριση Ψηφιακών Πολιτιστικών Δεδομένων.',
				'phone'          => '2251036672',
				'email'          => 'ihl@aegean.gr',
				'cv_url'         => 'https://www.ct.aegean.gr/data/staff/iliadis-giannis-el.pdf',
				'links'          => array(),
				'photo_thumb'    => $uri . '/assets/img/etep/iliadis.jpg',
				'photo_hero'     => '',
				'photo_alt'      => 'Ηλιάδης Γιάννης',
				'initials'       => 'ΗΓ',
			),
		),

		// ── Διοικητικό Προσωπικό ─────────────────────────────────────────────
		'admin-staff' => array(

			'kaitatzis' => array(
				'slug'           => 'kaitatzis',
				'name'           => 'Κάιτατζης Φάνης',
				'role'           => 'Αναπλ. Προϊστάμενος Γραμματείας',
				'specialization' => '',
				'short_bio'      => 'Ο Φάνης Κάιτατζης είναι μέλος του Διοικητικού Προσωπικού του Τμήματος Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Υπηρετεί ως Αναπληρωτής Προϊστάμενος Γραμματείας, διασφαλίζοντας την ομαλή διεκπεραίωση των διοικητικών διαδικασιών του Τμήματος.',
				'phone'          => '2251036608',
				'email'          => 'fkait@aegean.gr',
				'cv_url'         => '',
				'links'          => array(),
				'photo_thumb'    => $uri . '/assets/img/admin/kaitatzis.jpg',
				'photo_hero'     => '',
				'photo_alt'      => 'Κάιτατζης Φάνης',
				'initials'       => 'ΚΦ',
			),
			'dimopoulou' => array(
				'slug'           => 'dimopoulou',
				'name'           => 'Δημοπούλου Έφη',
				'role'           => 'Θέματα Διδακτορικών Σπουδών',
				'specialization' => '',
				'short_bio'      => 'Η Έφη Δημοπούλου είναι μέλος του Διοικητικού Προσωπικού του Τμήματος Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Είναι υπεύθυνη για θέματα που αφορούν τα Διδακτορικά Προγράμματα Σπουδών του Τμήματος.',
				'phone'          => '2251036606',
				'email'          => 'e.dimopoulou@aegean.gr',
				'cv_url'         => '',
				'links'          => array(),
				'photo_thumb'    => $uri . '/assets/img/admin/dimopoulou.jpg',
				'photo_hero'     => '',
				'photo_alt'      => 'Δημοπούλου Έφη',
				'initials'       => 'ΔΕ',
			),
			'karavia' => array(
				'slug'           => 'karavia',
				'name'           => 'Καραβία Χαρά',
				'role'           => 'Θέματα Μεταπτυχιακών Σπουδών',
				'specialization' => '',
				'short_bio'      => 'Η Χαρά Καραβία είναι μέλος του Διοικητικού Προσωπικού του Τμήματος Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Είναι υπεύθυνη για θέματα που αφορούν τα Μεταπτυχιακά Προγράμματα Σπουδών του Τμήματος.',
				'phone'          => '2251036605',
				'email'          => 'hkaravia@aegean.gr',
				'cv_url'         => '',
				'links'          => array(),
				'photo_thumb'    => $uri . '/assets/img/admin/karavia.jpg',
				'photo_hero'     => '',
				'photo_alt'      => 'Καραβία Χαρά',
				'initials'       => 'ΚΧ',
			),
			'miltiadou' => array(
				'slug'           => 'miltiadou',
				'name'           => 'Μιλτιάδου Άρτεμις',
				'role'           => 'Πρόγραμμα Προπτυχιακών Σπουδών',
				'specialization' => '',
				'short_bio'      => 'Η Άρτεμις Μιλτιάδου είναι μέλος του Διοικητικού Προσωπικού του Τμήματος Πολιτισμικής Τεχνολογίας και Επικοινωνίας του Πανεπιστημίου Αιγαίου. Είναι υπεύθυνη για θέματα που αφορούν το Πρόγραμμα Προπτυχιακών Σπουδών του Τμήματος.',
				'phone'          => '2251036604',
				'email'          => 'amil@aegean.gr',
				'cv_url'         => '',
				'links'          => array(),
				'photo_thumb'    => $uri . '/assets/img/admin/miltiadou.png',
				'photo_hero'     => '',
				'photo_alt'      => 'Μιλτιάδου Άρτεμις',
				'initials'       => 'ΜΑ',
			),
		),

		// ── Επίτιμοι Διδάκτορες ─────────────────────────────────────────────
		'honorary' => array(
			'bletsas' => array(
				'slug'           => 'bletsas',
				'name'           => 'Μπλέτσας Μιχαήλ',
				'role'           => 'Επίτιμος Διδάκτορας',
				'specialization' => '',
				'short_bio'      => 'Ανακηρύχθηκε Επίτιμος Διδάκτορας του Τμήματος Πολιτισμικής Τεχνολογίας και Επικοινωνίας με ΦΕΚ 5123/5.11.2021, τ. Β΄.',
				'phone'          => '',
				'email'          => '',
				'cv_url'         => 'https://www.ct.aegean.gr/data/Michail_Bletsas_CV.pdf',
				'links'          => array(),
				'photo_thumb'    => $uri . '/assets/img/honorary/bletsas.jpg',
				'photo_hero'     => '',
				'photo_alt'      => 'Μπλέτσας Μιχαήλ',
				'initials'       => 'ΜΜ',
			),
		),

	);

	return $cache;
}

endif; // tpte_all_staff


if ( ! function_exists( 'tpte_get_staff_member' ) ) :

function tpte_get_staff_member( $dept, $slug ) {
	$all  = tpte_all_staff();
	$dept = sanitize_key( $dept );
	$slug = sanitize_key( $slug );
	return isset( $all[ $dept ][ $slug ] ) ? $all[ $dept ][ $slug ] : null;
}

endif;


if ( ! function_exists( 'tpte_link_icon' ) ) :

/**
 * Render the icon for a staff link entry.
 * Brand icons (linkedin, google-scholar) are inline SVG so they render
 * regardless of which Font Awesome style families are loaded.
 * Everything else falls back to the existing fa-light icon font.
 */
function tpte_link_icon( $link ) {
	switch ( $link['icon'] ) {

		case 'linkedin':
			return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"'
				. ' width="1em" height="1em" fill="currentColor"'
				. ' style="vertical-align:-0.125em;" aria-hidden="true">'
				. '<path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037'
				. '-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046'
				. 'c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286z'
				. 'M5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063'
				. ' 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065z'
				. 'M7.119 20.452H3.555V9h3.564v11.452z'
				. 'M22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24'
				. 'h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>'
				. '</svg>';

		case 'google-scholar':
			return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"'
				. ' width="1em" height="1em" fill="currentColor"'
				. ' style="vertical-align:-0.125em;" aria-hidden="true">'
				. '<path d="M5.242 13.769L0 9.5 12 0l12 9.5-5.242 4.269'
				. 'C17.548 11.249 14.978 9.5 12 9.5c-2.977 0-5.548 1.748-6.758 4.269z'
				. 'M12 10a7 7 0 1 0 0 14 7 7 0 0 0 0-14z"/>'
				. '</svg>';

		default:
			return '<i class="fa-light ' . esc_attr( $link['icon'] ) . '"></i>';
	}
}

endif;
