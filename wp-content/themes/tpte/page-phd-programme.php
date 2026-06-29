<?php
/**
 * Template Name: PhD Programme
 * Template Post Type: page
 *
 * Διδακτορικό Δίπλωμα — doctoral studies page, rebuilt from the legacy department
 * site (context/phd.html, ct.aegean.gr/Home/Didaktoriko). Presents:
 *   1. "Γενικά" — intro paragraphs on admission, duration, application & supervision.
 *   2. "Διδάκτορες του Τμήματος" — a searchable/filterable table of all PhD graduates
 *      (Ονοματεπώνυμο / Επιβλέπων-ουσα / Τίτλος διατριβής).
 *
 * Reuses the shared .tp-course-requrement-area col-9/col-3 layout, the
 * .tp-tution-table / .tp-programme-table markup (is-phd variant), and the
 * undergrad-style sidebar (template-parts/sidebar-phd.php) whose "Χρήσιμα Αρχεία"
 * list comes from the canonical $phd_docs below plus the 'tpte_useful_files'
 * post-meta. The live search/supervisor filter is wired in assets/js/src/main.js
 * (initPhdFilter); page-specific styling lives in assets/css/phd.css.
 *
 * @package tpte
 */

get_header();

while ( have_posts() ) :
	the_post();
	$tp_theme_uri = get_template_directory_uri();

	// Canonical PhD documents (shipped by default), shown in the sidebar "Χρήσιμα
	// Αρχεία" list. Admin-added files (tpte_useful_files meta) are appended after.
	$phd_docs = array(
		array(
			'label' => __( 'Κανονισμός Διδακτορικών Σπουδών', 'tpte' ),
			'url'   => 'https://www.ct.aegean.gr/data/Kanonismos-PhD.pdf',
		),
		array(
			'label' => __( 'Αίτηση εκπόνησης διδακτορικής διατριβής', 'tpte' ),
			'url'   => 'https://www.ct.aegean.gr/data/Application_PhD_TPTE.pdf',
		),
		array(
			'label' => __( 'Κανονισμός εκπόνησης μεταδιδακτορικής έρευνας', 'tpte' ),
			'url'   => 'https://www.ct.aegean.gr/data/post-doc-kanonismos.pdf',
		),
		array(
			'label' => __( 'Υποδείγματα εγγράφων μεταδιδακτορικής έρευνας', 'tpte' ),
			'url'   => 'https://www.ct.aegean.gr/data/post-doc-upodeigmata.zip',
		),
		array(
			'label' => __( 'Ενεργοί Μεταδιδάκτορες', 'tpte' ),
			'url'   => 'https://www.ct.aegean.gr/data/METADIDAKTORES_SEP_2025.pdf',
		),
		array(
			'label' => __( 'Ενεργοί Υποψήφιοι Διδάκτορες', 'tpte' ),
			'url'   => 'https://www.ct.aegean.gr/data/TPTE_YD.xls',
		),
		array(
			'label' => __( 'Πολιτική Ποιότητας Διδακτορικών Σπουδών', 'tpte' ),
			'url'   => 'https://www.ct.aegean.gr/data/politiki-poiotitas-didaktorikwn-spoudwn.pdf',
		),
	);

	// Per-page useful files, edited in wp-admin (meta box in inc/post-types.php),
	// appended after the canonical PhD documents.
	$useful_files = get_post_meta( get_the_ID(), 'tpte_useful_files', true );
	$useful_files = is_array( $useful_files ) ? $useful_files : array();
	$useful_files = array_merge( $phd_docs, $useful_files );

	// --- Graduates table (ΔΙΔΑΚΤΟΡΕΣ ΤΜΗΜΑΤΟΣ) -------------------------------.
	// Transcribed from context/phd.html. 'note' holds the optional annotation
	// (e.g. thesis written in English) shown under the title.
	$phd_graduates = array(
		array( 'name' => 'Λέκκα Γαρυφαλιά', 'supervisor' => 'Δασκαλοπούλου Σοφία, Ομότιμη Καθηγήτρια', 'title' => 'Η εξέλιξη του ελληνικού υφάσματος - Αιγαίο. Η επιρροή της τεχνολογίας ύφανσης στο σχεδιασμό (design) υφάσματος', 'note' => '' ),
		array( 'name' => 'Καλλονιάτης Χρήστος', 'supervisor' => 'Καβακλή Ευαγγελία, Αναπληρώτρια Καθηγήτρια', 'title' => 'Η μεθοδολογία PRiS: καθορισμός των απαιτήσεων ιδιωτικότητας στη φάση της σχεδίασης συστημάτων', 'note' => '' ),
		array( 'name' => 'Μαστραντώνης Παναγιώτης', 'supervisor' => 'Οικονόμου Μαρία, Αναπληρώτρια Καθηγήτρια', 'title' => 'Διαχείριση αρχαιολογικών έργων: θεωρητικό πλαίσιο και ανάπτυξη εξειδικευμένων εργαλείων', 'note' => '' ),
		array( 'name' => 'Αξιώτης Ευθύμιος', 'supervisor' => 'Βερνίκος Νικόλαος, Ομότιμος Καθηγητής', 'title' => 'Οι Υδρόμυλοι της Λέσβου', 'note' => '' ),
		array( 'name' => 'Αραθύμου Σπυριδούλα', 'supervisor' => 'Βερνίκος Νικόλαος, Ομότιμος Καθηγητής', 'title' => 'Ελληνικά βιομηχανικά αρχεία: καταγραφή, ηλεκτρονική τεκμηρίωση και αξιοποίηση τους', 'note' => '' ),
		array( 'name' => 'Σταυρόπουλος Νικόλαος', 'supervisor' => 'Νταραντούμης Θανάσης, Αναπληρωτής Καθηγητής', 'title' => 'Η Ψηφιακή Διδασκαλία στην Τριτοβάθμια Εκπαίδευση και ο ρόλος των Ελληνικών Ακαδημαϊκών Βιβλιοθηκών', 'note' => '' ),
		array( 'name' => 'Χατζηλιάς Χρήστος', 'supervisor' => 'Παπαγεωργίου Δημήτρης, Καθηγητής', 'title' => 'Η Λέσβος και ο πολιτισμός της πέτρας (1850 - 1950). Η περίπτωση του Σκαλοχωρίου και της Ανεμότιας', 'note' => '' ),
		array( 'name' => 'Μαυροφίδης Θωμάς', 'supervisor' => 'Παπαγεωργίου Δημήτρης, Καθηγητής', 'title' => 'Ψηφιακή πόλη: μεθοδολογία προδιαγραφής λειτουργικών απαιτήσεων', 'note' => '' ),
		array( 'name' => 'Μπιτζιόπουλος Αριστείδης', 'supervisor' => 'Γαβαλάς Δαμιανός, Αναπληρωτής Καθηγητής', 'title' => 'Βελτιστοποίηση κατανεμημένης συλλογής δεδομένων και αντιμετώπισης παρεμβολών σε ασύρματα δίκτυα αισθητήρων', 'note' => '' ),
		array( 'name' => 'Ντέλλης Αχιλλέας', 'supervisor' => 'Στάθη Ειρήνη, Καθηγήτρια', 'title' => 'Η διαμόρφωση και η εξέλιξη της κινηματογραφικής κριτικής και θεωρίας στην Ελλάδα (1950-1981)', 'note' => '' ),
		array( 'name' => 'Μαυροειδή Μαρία', 'supervisor' => 'Παυλογεωργάτος Γεράσιμος, Αναπληρωτής Καθηγητής', 'title' => 'Η ελληνική μηχανουργία την περίοδο 1920-1950 και η τεκμηρίωση ιστορικού μηχανολογικού εξοπλισμού', 'note' => '' ),
		array( 'name' => 'Κοσιαβέλου Βασιλική', 'supervisor' => 'Μπαντιμαρούδης Φιλήμων, Καθηγητής', 'title' => 'Η Αναβάθμιση του Μοντέλου Θυροφύλαξης (Gatekeeping Model) στο πλαίσιο της Παγκόσμιας Βιομηχανίας των Ψηφιακών Μέσων: Η περίπτωση των Ολυμπιακών Αγώνων', 'note' => '' ),
		array( 'name' => 'Κεντέρης Μιχαήλ', 'supervisor' => 'Γαβαλάς Δαμιανός, Αναπληρωτής Καθηγητής', 'title' => 'Internet Multimedia Applications for Mobile Devices: The case of Electronic Tourist Guides (Διαδικτυακές Πολυμεσικές Εφαρμογές για Κινητές Συσκευές: Η περίπτωση των Ηλεκτρονικών Τουριστικών Ξεναγών)', 'note' => 'Η διατριβή συντάχθηκε στην αγγλική γλώσσα' ),
		array( 'name' => 'Νικολόπουλος Αντώνιος', 'supervisor' => 'Σαμπανίκου Ευαγγελία, Αναπληρώτρια Καθηγήτρια', 'title' => 'Τα Ελληνικά Κόμικς από τη Μεταπολίτευση έως σήμερα. Διαδρομές έντεχνης επικοινωνίας, αντικατοπτρισμοί ιδεών και πολιτισμικές αναπαραστάσεις στα σύγχρονα εικονογραφηγήματα', 'note' => '' ),
		array( 'name' => 'Μαυρίκας Ευθύμιος', 'supervisor' => 'Δασκαλοπούλου Σοφία, Ομότιμη Καθηγήτρια', 'title' => 'Ανάμεσα στις Λέξεις: Μέθοδοι Ανάλυσης Ιδεολογικά Φορτισμένου Λόγου', 'note' => 'Η Διδακτορική διατριβή εκπονήθηκε με συνεπίβλεψη με ΕΠΣ μεταξύ Πανεπιστημίου Αιγαίου και Πανεπιστημίου της Λυών ΙΙ, Γαλλία' ),
		array( 'name' => 'Νείρος Αντώνιος', 'supervisor' => 'Τσεκούρας Γιώργος, Αναπληρωτής Καθηγητής', 'title' => 'Ανάπτυξη Μεθόδων Ασαφούς Συσταδοποίησης για τη Μοντελοποίηση Νευρωνικών Δικτύων Συναρτήσεων Ακτινικής Βάσης', 'note' => '' ),
		array( 'name' => 'Ναβροζίδου Ελένη', 'supervisor' => 'Σαμπανίκου Ευαγγελία, Αναπληρώτρια Καθηγήτρια', 'title' => 'Εικονογραφημένες Γυναίκες σε Ανατολή και Δύση. Μια καλλιτεχνική διαπολιτισμική προσέγγιση', 'note' => '' ),
		array( 'name' => 'Γκίννη Ζωίτσα', 'supervisor' => 'Παυλογεωργάτος Γεράσιμος, Αναπληρωτής Καθηγητής', 'title' => 'Πολιτικές Διατήρησης και Προληπτικής Συντήρησης Βιβλιακού και Αρχειακού Υλικού', 'note' => '' ),
		array( 'name' => 'Μπάλλα Αικατερίνη', 'supervisor' => 'Παυλογεωργάτος Γεράσιμος, Αναπληρωτής Καθηγητής', 'title' => 'Μακεδονικοί Τάφοι: Γεωγραφική Προσέγγιση με Σύγχρονες Μεθόδους', 'note' => '' ),
		array( 'name' => 'Παπαδόπουλος Δημήτριος', 'supervisor' => 'Βερνίκος Νικόλαος, Ομότιμος Καθηγητής', 'title' => 'Σχηματίζοντας τη Λίμνη: Εμπειρία και Διαμεσολάβηση του Τοπίου στις Πρέσπες', 'note' => '' ),
		array( 'name' => 'Κουρτζέλλης Ιωάννης', 'supervisor' => 'Σαμπανίκου Ευαγγελία, Αναπληρώτρια Καθηγήτρια', 'title' => 'Παρελθόν και εικόνα. Αναπαράσταση αρχαιολογικών χώρων και μνημείων με ψηφιακά μέσα. Θεωρητικά ζητήματα και μελέτες παραδειγμάτων', 'note' => '' ),
		array( 'name' => 'Τσολάκης Δημήτριος', 'supervisor' => 'Τσεκούρας Γιώργος, Αναπληρωτής Καθηγητής', 'title' => 'Ανάπτυξη μεθόδων ασαφούς κβάντισης διανύσματος για την αποδοτική συμπίεση ψηφιακής εικόνας', 'note' => '' ),
		array( 'name' => 'Τζαναβάρα Αντωνία', 'supervisor' => 'Βερνίκος Νικόλαος, Ομότιμος Καθηγητής', 'title' => 'Μουσείο και άτομα με αναπηρίες. Προσβασιμότητα – Εκπαίδευση – Κοινωνική Ενσωμάτωση', 'note' => '' ),
		array( 'name' => 'Χριστοδουλίδου - (Παπαδοπούλου) Έλενα', 'supervisor' => 'Δασκαλοπούλου Σοφία, Ομότιμη Καθηγήτρια', 'title' => 'Η Τεχνολογία στη Σύγχρονη Κυπριακή Τέχνη και το Ζήτημα της Ταυτότητας', 'note' => '' ),
		array( 'name' => 'Ατζάκας Ευθύμιος', 'supervisor' => 'Παπαγεωργίου Δημήτρης, Καθηγητής', 'title' => 'Οι άνθρωποι του ξύλου: το Ούτι από τις παρυφές του ανατολικού μουσικού πολιτισμού στη σύγχρονη αστική κουλτούρα του ελλαδικού χώρου', 'note' => '' ),
		array( 'name' => 'Τσότσου Αναστασία', 'supervisor' => 'Σαμπανίκου Ευαγγελία, Αναπληρώτρια Καθηγήτρια', 'title' => 'Γραφιστική και Καινοτομία: Η συνεισφορά των αφισών του Henri de Toulouse Lautrec (1864-1901) στην έντυπη επικοινωνία', 'note' => '' ),
		array( 'name' => 'Φειδάκης Μιχαήλ', 'supervisor' => 'Νταραντούμης Θανάσης, Αναπληρωτής Καθηγητής', 'title' => 'A Computational Model to Embed Emotion Awareness into e-Learning Environments (Ένα Υπολογιστικό Μοντέλο για την Ενσωμάτωση της Συναισθηματικής Ευαισθητοποίησης σε Περιβάλλοντα Ηλεκτρονικής Μάθησης)', 'note' => 'Η διατριβή συντάχθηκε στην αγγλική γλώσσα' ),
		array( 'name' => 'Καλαργάλης', 'supervisor' => 'Παπαγεωργίου Δημήτρης, Καθηγητής', 'title' => 'H "Λεσβιακή Άνοιξη". Η ανασύσταση ενός πολιτισμικού φαινομένου μέσα από την αποτύπωσή του στον τύπο (1910-1932)', 'note' => '' ),
		array( 'name' => 'Δαφιώτη Αθανασία', 'supervisor' => 'Στάθη Ειρήνη, Καθηγήτρια', 'title' => 'Η Χρήση Αφηγηματικών Δομών στη Θεατρική Αγωγή στα πλαίσια της Σύγχρονης Εκπαίδευσης', 'note' => '' ),
		array( 'name' => 'Λως Αντώνιος', 'supervisor' => 'Παπαγεωργίου Δημήτρης, Καθηγητής', 'title' => 'Σύγχρονες Όψεις του Κυβερνοχώρου. Μια Κοινωνική Ανάλυση των Επικοινωνιακών Διαστάσεων και Προοπτικών των Ιστολογίων (Weblogs)', 'note' => '' ),
		array( 'name' => 'Ταλλής Ιωάννης', 'supervisor' => 'Παπαγεωργίου Δημήτρης, Καθηγητής', 'title' => 'Αφηγηματικά Μοντέλα και Νέες Τεχνολογίες: Όροι και Όρια Σύγχρονων Εκθεσιακών Σεναρίων', 'note' => '' ),
		array( 'name' => 'Τζήρου Γεωργία', 'supervisor' => 'Καβακλή Ευαγγελία, Αναπληρώτρια Καθηγήτρια', 'title' => 'Ψηφιακή Διατήρηση Σύγχρονων Έργων Πολιτισμού με Νέα Μέσα: Η περίπτωση του έργου \'Ανθρώπων Ίχνη\'', 'note' => '' ),
		array( 'name' => 'Ανδρεαδέλλη Βασιλική', 'supervisor' => 'Παπαγεωργίου Δημήτρης, Καθηγητής', 'title' => 'Οι παραδοσιακές Πρακτικές Υγιεινής στον Αγροτικό Χώρο, ως πεδίο συγκερασμού και αντιπαράθεσης Τοπικών & Υπερτοπικών Αντιλήψεων: Η περίπτωση του Ν. Λέσβου', 'note' => '' ),
		array( 'name' => 'Μυτιληναίου Σοφία', 'supervisor' => 'Σαμπανίκου Ευαγγελία, Αναπληρώτρια Καθηγήτρια', 'title' => 'Experience Design under a Performative Perspective: Designing for Enactive Participation to Emerge in Live Events', 'note' => 'Η διατριβή συντάχθηκε στην αγγλική γλώσσα' ),
		array( 'name' => 'Ηλίου Θεόδωρος', 'supervisor' => 'Αναγνωστόπουλος Χρήστος-Νικόλαος, Αναπληρωτής Καθηγητής', 'title' => 'Νέες Τεχνικές Τεχνητής Νοημοσύνης και Μετασχηματισμού Δεδομένων για Αύξηση Απόδοσης Αλγορίθμων Ταξινόμησης', 'note' => '' ),
		array( 'name' => 'Κασαπάκης Βλάσιος', 'supervisor' => 'Γαβαλάς Δαμιανός, Αναπληρωτής Καθηγητής', 'title' => 'Pervasive Role Playing Games: Design, Development and Evaluation of a Research Prototype (Διάχυτα Παιχνίδια Ρόλων: Σχεδίαση, Ανάπτυξη και Αξιολόγηση ενός Ερευνητικού Πρωτοτύπου)', 'note' => 'Η διατριβή συντάχθηκε στην αγγλική γλώσσα' ),
		array( 'name' => 'Γιακαλάρας Μάριος', 'supervisor' => 'Σαμπανίκου Ευαγγελία, Αναπληρώτρια Καθηγήτρια', 'title' => 'Εικονικοί Κόσμοι - Διερεύνηση των Ζητημάτων των Σύγχρονων Μηχανών Παιχνιδιών ως προς το Φωτορεαλισμό στον Τομέα Φωτισμού και του Αντίκτυπου στο Χρήστη ενός Εκπαιδευτικού Παιχνιδιού', 'note' => '' ),
		array( 'name' => 'Ρήγος Αναστάσιος', 'supervisor' => 'Τσεκούρας Γιώργος, Αναπληρωτής Καθηγητής', 'title' => 'Ανάπτυξη Πολυωνυμικών Νευρωνικών Δικτύων με χρήση Ορθογώνιων Πολυωνύμων', 'note' => '' ),
		array( 'name' => 'Σίμου Σταύρος', 'supervisor' => 'Καλλονιάτης Χρήστος, Αναπληρωτής Καθηγητής', 'title' => 'Designing Cloud Forensic - Enable Systems', 'note' => '' ),
		array( 'name' => 'Ανδριοπούλου Δέσποινα - Αναστασία', 'supervisor' => 'Μπούνια Αλεξάνδρα, Καθηγήτρια', 'title' => 'Η \'μουσειοποίηση\' της Θεατρικής Τέχνης. Οι περιπτώσεις των Θεατρικών Μουσείων', 'note' => '' ),
		array( 'name' => 'Κρητικός Παναγιώτης', 'supervisor' => 'Σαμπανίκου Ευαγγελία, Καθηγήτρια', 'title' => 'Κόμικς Κόσμοι του Φανταστικού. Οπτικοποίηση και Ιδεολογικές Αναπαραστάσεις στα Φαντάζυ Κόμικς', 'note' => '' ),
		array( 'name' => 'Κουτσιανού Σοφία', 'supervisor' => 'Χουρμουζιάδη Αναστασία, Αναπληρώτρια Καθηγήτρια', 'title' => 'Αξιολόγηση Εκπαιδευτικών Πολυμεσικών Εφαρμογών Μουσείων. Ζητήματα άτυπης Μάθησης και Κοινωνικής Διάδρασης', 'note' => '' ),
		array( 'name' => 'Κούνας Σπήλιος', 'supervisor' => 'Παπαγεωργίου Δημήτρης, Καθηγητής', 'title' => 'Το Αστικό Λαϊκό Τραγούδι του Ελλαδικού Χώρου κατά την Περίοδο των Πρώιμων Ηχογραφήσεων. Υφολογία, Τροπικότητες, Επιτέλεση', 'note' => '' ),
		array( 'name' => 'Διολατζής Ιωάννης', 'supervisor' => 'Παυλογεωργάτος Γεράσιμος, Αναπληρωτής Καθηγητής', 'title' => 'Εφαρμογή της Θεωρίας των Επικύκλων στο Μηχανισμό των Αντικυθήρων: Μελέτη της Πλανητικής Κίνησης στο Εμπρόσθιο Τμήμα του Μηχανισμού και Ανακατασκευή του', 'note' => '' ),
		array( 'name' => 'Μπερδούσης Ιωάννης', 'supervisor' => 'Κορδάκη Μαρία, Αναπληρώτρια Καθηγήτρια', 'title' => 'Σχεδιασμός, Ανάπτυξη και Αξιολόγηση ενός Μοντέλου Διερεύνησης και Τροποποίησης των Αντιλήψεων των Εκπαιδευτικών Πληροφορικής σε σχέση με το Φύλο', 'note' => '' ),
		array( 'name' => 'Καλογερόπουλος Κωνσταντίνος', 'supervisor' => 'Δασκαλοπούλου Σοφία, Ομότιμη Καθηγήτρια', 'title' => 'Ζητήματα Αρχαιολογικής θεωρίας και ψηφιοποίησης αρχαιολογικών δεδομένων', 'note' => '' ),
		array( 'name' => 'Πιτσιαβά Ευγενία-Μαρία', 'supervisor' => 'Χουρμουζιάδη Αναστασία, Επίκουρη Καθηγήτρια', 'title' => 'Μουσεία, Ετερότητα και Κοινωνικές Ανάγκες', 'note' => '' ),
		array( 'name' => 'Ψωμός Παναγιώτης', 'supervisor' => 'Κορδάκη Μαρία, Αναπληρώτρια Καθηγήτρια', 'title' => 'Κατασκευή Εκπαιδευτικού, Διαδραστικού, Ψηφιακού Περιβάλλοντος Συνεργατικής Αφήγησης Πολλαπλών Αναπαραστάσεων', 'note' => '' ),
		array( 'name' => 'Βρακατσέλη Ανδρομάχη', 'supervisor' => 'Μπουμπάρης Νικόλαος, Μόνιμος Επίκουρος Καθηγητής', 'title' => 'Ηχητική Τέχνη και Εκθεσιακός Χώρος', 'note' => '' ),
		array( 'name' => 'Μαλεγιαννάκη Ειρήνη', 'supervisor' => 'Νταραντούμης Αθανάσιος, Καθηγητής', 'title' => 'Η Διαδραστική Παιγνιώδης Αφήγηση ως Μέθοδος Μετάδοσης Πολιτιστικού Περιεχομένου / Playful Interactive Storytelling as a Method of Transmission of Cultural Content', 'note' => '' ),
		array( 'name' => 'Αντωνοπούλου Αικατερίνη', 'supervisor' => 'Μπουμπάρης Νικόλαος, Αναπληρωτής Καθηγητής', 'title' => 'Η υλικότητα της ψηφιακής τέχνης. Πρακτικές ένταξης αντικειμένων καθημερινής χρήσης σε κοινωνικοπολιτικά καλλιτεχνικά έργα', 'note' => '' ),
		array( 'name' => 'Μακρυδάκης Νεκτάριος', 'supervisor' => 'Σκοπετέας Ιωάννης, Αναπληρωτής Καθηγητής', 'title' => 'Το Μάρκετινγκ και ο Ψηφιακός Μετασχηματισμός του στους Δημόσιους Οργανισμούς της Ελληνικής Τριτοβάθμιας Εκπαίδευσης - Marketing and its Digital Transformation in the Public Organizations of the Greek Higher Education', 'note' => '' ),
		array( 'name' => 'Σωφρονιάδη Ειρήνη', 'supervisor' => 'Σκοπετέας Ιωάννης, Αναπληρωτής Καθηγητής', 'title' => 'Η εξέλιξη του φωτογραφικού πορτραίτου στην εποχή των κοινωνικών δικτύων', 'note' => '' ),
		array( 'name' => 'Κοίλιας Αλέξανδρος - Φάμπιο', 'supervisor' => 'Αναγνωστόπουλος Χρήστος - Νικόλαος, Καθηγητής', 'title' => 'Intelligent Modelling of Human Movement Behaviour During Virtual Crowd Interaction in Immersive Virtual Environments', 'note' => '' ),
		array( 'name' => 'Μαυροειδή Αικατερίνη - Γεωργία', 'supervisor' => 'Καλλονιάτης Χρήστος, Καθηγητής', 'title' => 'Επίγνωση ζητημάτων ιδιωτικότητας μέσω της παιγνιοποίησης - Privacy awareness through gamification', 'note' => '' ),
		array( 'name' => 'Ζάχου Ελένη', 'supervisor' => 'Παπαγεωργίου Δημήτριος, Καθηγητής', 'title' => 'Διδακτικές πρακτικές στο μάθημα της γλώσσας και κατηγοριοποίηση των μαθητών: η περίπτωση του ΔΕΠΠΣ στο Νηπιαγωγείο', 'note' => '' ),
		array( 'name' => 'Μιχαλάκης Κωνσταντίνος', 'supervisor' => 'Καρυδάκης Γεώργιος, Αναπληρωτής Καθηγητής', 'title' => 'Επίγνωση Πλαισίου και Αλληλεπίδραση στο Διαδίκτυο Πραγμάτων', 'note' => '' ),
		array( 'name' => 'Βγενά Αικατερίνη', 'supervisor' => 'Καλλονιάτης Χρήστος, Καθηγητής', 'title' => 'Ασφάλεια και Προστασία της Ιδιωτικότητας κατά τον Κοινωνικό Σχεδιασμό Πληροφοριακών Συστημάτων με Έμφαση στην Ψηφιακή Ταυτότητα και τον Γεωεντοπισμό - Security and Privacy in Social Software Engineering, focusing on Digital Identity and Geolocation', 'note' => '' ),
		array( 'name' => 'Κωνσταντάκης Μάρκος', 'supervisor' => 'Καρυδάκης Γεώργιος, Αναπληρωτής Καθηγητής', 'title' => 'Ανάλυση, Σχεδιασμός και Αξιολόγηση Επαυξημένης Πολιτισμικής Εμπειρίας Χρήστη (Augmented Cultural User Experience - ACUX)', 'note' => '' ),
		array( 'name' => 'Ζακάκης Νικόλαος', 'supervisor' => 'Μπαντιμαρούδης Φιλήμονας, Καθηγητής', 'title' => 'Διαχρονική Διαμεσολάβηση στην Θεματολογία του Πολιτισμού: Η περίπτωση του \'Smithsonian Institution\'', 'note' => '' ),
		array( 'name' => 'Γάτου Λαμπρή Ισμήνη', 'supervisor' => 'Μπουμπάρης Νικόλαος, Αναπληρωτής Καθηγητής', 'title' => 'Αφηγήσεις και συναισθήματα σε κίνηση. Μία έρευνα-δημιουργία για τη χωρική εμπειρία μέσα από τη χρήση κινητών ψηφιακών μέσων', 'note' => '' ),
		array( 'name' => 'Χαραλάμπη Θεοδώρα', 'supervisor' => 'Παπαγεωργίου Δημήτρης, Πρύτανης Πανεπιστημίου Αιγαίου, Καθηγητής', 'title' => 'Η Λέσβος του γλεντιού: Οι Πρακτικές του Πανηγυριού στη Σύγχρονη Λεσβιακή Κουλτούρα', 'note' => '' ),
		array( 'name' => 'Σταμάτη Μαρίνα', 'supervisor' => 'Σκοπετέας Ιωάννης, Αναπληρωτής Καθηγητής', 'title' => 'Κινηματογραφικές καταγραφές της ελληνικής οικογένειας: Αναπαραστάσεις και Μετασχηματισμοί', 'note' => '' ),
		array( 'name' => 'Ξανθούλης Ορφέας – Αλέξιος', 'supervisor' => 'Καταπότη Δέσποινα, Αναπληρώτρια Καθηγήτρια', 'title' => 'Κριτική προσέγγιση του τρόπου χρήσης της βιβλιομετρίας ως μεθόδου αξιολόγησης της επιστημονικής έρευνας με μελέτη περίπτωσης το πεδίο των Κοινωνικών Επιστημών στην Ελλάδα', 'note' => '' ),
		array( 'name' => 'Δαραβίγκα Κλεάνθη', 'supervisor' => 'Χουρμουζιάδη Αναστασία, Καθηγήτρια', 'title' => 'Οι έκτακτοι αρχαιολόγοι μέσα στη διαδικασία παραγωγής του αρχαιολογικού προϊόντος στην Ελλάδα', 'note' => '' ),
		array( 'name' => 'Χατζησταμάτης Σταμάτης', 'supervisor' => 'Αναγνωστόπουλος Χρήστος – Νικόλαος, Καθηγητής', 'title' => 'Αναπαράσταση σε τρεις διαστάσεις με Τεχνικές Βαθιάς Μάθησης', 'note' => '' ),
		array( 'name' => 'Μωραΐτου Ευθυμία', 'supervisor' => 'Καρυδάκης Γεώργιος, Καθηγητής', 'title' => 'Σημασιολογική αναπαράσταση και υποστήριξη αποφάσεων στη συντήρηση Πολιτιστικής Κληρονομιάς', 'note' => '' ),
		array( 'name' => 'Μαυρέλος Εμμανουήλ', 'supervisor' => 'Νταραντούμης Αθανάσιος, Καθηγητής', 'title' => 'Η Σημασία της Φαντασίας στην Εκπαίδευση στη Διαμόρφωση Γνωστικών Δεξιοτήτων', 'note' => '' ),
		array( 'name' => 'Σιούντρη Κωνσταντίνα', 'supervisor' => 'Αναγνωστόπουλος Χρήστος – Νικόλαος, Καθηγητής', 'title' => 'Ταξινόμηση και μοντελοποίηση στοιχείων για την παρακολούθηση της εξέλιξης ιστορικών κτιρίων με χρήση αναγνώρισης προτύπων για την ανάδειξη της πολιτιστικής κληρονομιάς', 'note' => '' ),
		array( 'name' => 'Δημαρά Ασημίνα', 'supervisor' => 'Αναγνωστόπουλος Χρήστος – Νικόλαος, Καθηγητής', 'title' => 'Τεχνικές και αρχιτεκτονικές βελτιστοποίησης απόδοσης σε Ευφυή Συστήματα', 'note' => '' ),
		array( 'name' => 'Καβούρα Θεοδώρα', 'supervisor' => 'Χουρμουζιάδη Αναστασία, Καθηγήτρια', 'title' => 'Ψηφιακές κοινότητες πρακτικής: Προϋποθέσεις και περιορισμοί', 'note' => '' ),
		array( 'name' => 'Τριχόπουλος Γεώργιος', 'supervisor' => 'Καρυδάκης Γεώργιος, Καθηγητής', 'title' => 'Ευφυείς μέθοδοι ψηφιακής, διάχυτης και επαυξημένης αφήγησης, διαμοιρασμένης και διασυνδεδεμένης εμπειρίας χρήστη', 'note' => '' ),
		array( 'name' => 'Ψαρρός Δούκας', 'supervisor' => 'Αναγνωστόπουλος Χρήστος – Νικόλαος, Καθηγητής', 'title' => 'Σύνθεση πολυτροπικών δεδομένων για επεξεργασία, τεκμηρίωση και προβολή αρχαιολογικής έρευνας σε περιβάλλοντα Μικτής Πραγματικότητας', 'note' => '' ),
		array( 'name' => 'Σταματόπουλος Μιχαήλ', 'supervisor' => 'Αναγνωστόπουλος Χρήστος – Νικόλαος, Καθηγητής', 'title' => 'Ψηφιακή 3D μοντελοποίηση και ανασυναρμολόγηση θραυσμάτων κεραμικών αγγείων με χρήση τοπικών γεωδαιτικών συντεταγμένων και την μέθοδο Διατομής Πάχους', 'note' => '' ),
		array( 'name' => 'Χωματιανού Μαργαρίτα', 'supervisor' => 'Καταπότη Δέσποινα, Αναπληρώτρια Καθηγήτρια', 'title' => 'Επαναπροσδιορίζοντας την έννοια της "αστικής ευφυΐας": πολιτιστική διαμεσολάβηση και χαμένες συνδέσεις', 'note' => '' ),
	);

	/**
	 * Reduce a supervisor string ("Surname Firstname, Rank") to the supervisor's
	 * full name (no rank), used both as the per-row filter key and as the label in
	 * the supervisor dropdown. The name is the part before the first comma; for the
	 * few comma-less entries the trailing academic rank is stripped.
	 *
	 * @param string $supervisor Full supervisor string.
	 * @return string Full name without rank.
	 */
	$phd_supervisor_key = function ( $supervisor ) {
		$supervisor = trim( preg_replace( '/\s+/u', ' ', (string) $supervisor ) );
		$name_part  = trim( explode( ',', $supervisor )[0] );
		// Drop a trailing rank phrase on comma-less entries (e.g. "… Καθηγητής").
		$name_part = preg_replace( '/\s+(Ομότιμ|Αναπληρωτ|Αναπληρώτ|Επίκουρ|Μόνιμ|Καθηγητ|Καθηγήτ|Πρύταν)\S*.*$/u', '', $name_part );
		// Normalise dash variants/spacing to a spaced hyphen so "Χρήστος-Νικόλαος",
		// "Χρήστος – Νικόλαος" and "Χρήστος - Νικόλαος" collapse to one supervisor
		// (one dropdown entry) and read naturally as a name.
		$name_part = preg_replace( '/\s*[-–—‐]\s*/u', ' - ', $name_part );
		return trim( $name_part );
	};

	// Unique, sorted supervisor full names for the filter dropdown.
	$phd_supervisors = array();
	foreach ( $phd_graduates as $grad ) {
		$key = $phd_supervisor_key( $grad['supervisor'] );
		if ( '' !== $key ) {
			$phd_supervisors[ $key ] = $key;
		}
	}
	$phd_supervisors = array_values( $phd_supervisors );
	sort( $phd_supervisors, SORT_LOCALE_STRING );

	$phd_total = count( $phd_graduates );
	?>

	<!-- PhD breadcrumb start -->
	<section class="tp-breadcrumb__area pt-160 pb-150 p-relative z-index-1 fix">
		<div class="tp-breadcrumb__bg overlay" data-background="<?php echo esc_url( $tp_theme_uri ); ?>/assets/img/breadcrumb/phd-classroom.png"></div>
		<div class="container">
			<div class="row align-items-center">
				<div class="col-sm-12">
					<div class="tp-breadcrumb__content">
						<div class="tp-breadcrumb__list inner-after">
							<span class="white"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M8.07207 0C8.19331 0 8.31107 0.0404348 8.40664 0.114882L16.1539 6.14233L15.4847 6.98713L14.5385 6.25079V12.8994C14.538 13.1843 14.4243 13.4574 14.2225 13.6589C14.0206 13.8604 13.747 13.9738 13.4616 13.9743H2.69231C2.40688 13.9737 2.13329 13.8603 1.93146 13.6588C1.72962 13.4573 1.61597 13.1843 1.61539 12.8994V6.2459L0.669148 6.98235L0 6.1376L7.7375 0.114882C7.83308 0.0404348 7.95083 0 8.07207 0ZM8.07694 1.22084L2.69231 5.40777V12.8994H13.4616V5.41341L8.07694 1.22084Z" fill="currentColor"/>
							</svg></a></span>
							<span class="white"><?php esc_html_e( 'Διδακτορικές Σπουδές', 'tpte' ); ?></span>
							<span class="white"><?php the_title(); ?></span>
						</div>
						<h3 class="tp-breadcrumb__title color"><?php the_title(); ?></h3>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- PhD breadcrumb end -->


	<!-- PhD area start -->
	<section class="tp-course-requrement-area grey-bg pt-100 pb-80">
		<div class="container">
			<div class="row">
				<div class="col-lg-9">
					<div class="tp-course-requrement-wrapper">

						<!-- Γενικά -->
						<div class="tp-programme-intro tp-phd-intro">
							<h3 class="tp-programme-section-title"><?php esc_html_e( 'Εκπόνηση Διδακτορικής Διατριβής', 'tpte' ); ?></h3>
							<p><?php esc_html_e( 'Στο Πρόγραμμα Σπουδών που οδηγεί σε Διδακτορικό Δίπλωμα (Δ.Δ.) στην επιστήμη της Πολιτισμικής Τεχνολογίας και Επικοινωνίας γίνονται δεκτοί/ές οι κάτοχοι Μεταπτυχιακού Διπλώματος Ειδίκευσης (Μ.Δ.Ε.) από Πανεπιστήμια της Ελλάδας και του εξωτερικού. Σε εξαιρετικές περιπτώσεις μπορούν να γίνουν δεκτοί/ές μη κάτοχοι τίτλου που διαθέτουν, όμως, διακριτή και αναγνωρισμένη στην Ελλάδα ή στο εξωτερικό ερευνητική, μελετητική και συγγραφική εμπειρία σε θέματα σχετικά με τα επιστημονικά και ερευνητικά αντικείμενα του Τμήματος, σύμφωνα με τον Κανονισμό Μεταπτυχιακών Σπουδών του Ιδρύματος.', 'tpte' ); ?></p>
							<p><?php esc_html_e( 'Η ελάχιστη χρονική διάρκεια για την εκπόνηση διδακτορικής διατριβής είναι τρία πλήρη ημερολογιακά έτη από την ημερομηνία ορισμού της συμβουλευτικής επιτροπής του/της υποψήφιου/ας διδάκτορα. Η μέγιστη επιτρεπόμενη χρονική διάρκεια για την απόκτηση του Διδακτορικού Διπλώματος δεν μπορεί να υπερβαίνει τα έξι (6) έτη.', 'tpte' ); ?></p>
							<p><?php esc_html_e( 'Οι ενδιαφερόμενοι/ες για την εκπόνηση διδακτορικής διατριβής στο Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας υποβάλλουν αίτηση στη Γραμματεία του Τμήματος, μαζί με αναλυτικό βιογραφικό σημείωμα και επικυρωμένα αντίγραφα των τίτλων σπουδών. Παράλληλα, οι υποψήφιοι συντάσσουν την ερευνητική πρόταση, στην οποία παρουσιάζεται το προτεινόμενο αντικείμενο της διδακτορικής τους έρευνας. Η Γενική Συνέλευση του Τμήματος αποφασίζει την επιλογή των υποψηφίων διδακτόρων και ορίζει τα μέλη της συμβουλευτικής επιτροπής εκπόνησης διδακτορικής διατριβής.', 'tpte' ); ?></p>
							<p><?php esc_html_e( 'Κατά τη διάρκεια της εκπόνησης της διατριβής, οι φοιτητές/τριες πραγματοποιούν πρωτότυπη έρευνα ή έρευνα πεδίου, αναπτύσσουν τις ερευνητικές τους ικανότητες και εμπλουτίζουν σε βάθος τις γνώσεις τους στο ερευνητικό πεδίο, στο οποίο κινούνται. Το ακαδημαϊκό προσωπικό του Τμήματος αναλαμβάνει την επίβλεψη διδακτορικής έρευνας στα γνωστικά πεδία του Τμήματος. Στην επιτροπή επίβλεψης διδακτορικής έρευνας υπάρχει η δυνατότητα συμμετοχής διδασκόντων/ουσών και από άλλα πανεπιστημιακά Ιδρύματα του εσωτερικού ή του εξωτερικού, καθώς και ερευνητών βαθμίδας Α΄, Β΄ ή Γ΄ αναγνωρισμένων ερευνητικών κέντρων του εσωτερικού ή εξωτερικού που είναι κάτοχοι διδακτορικού διπλώματος.', 'tpte' ); ?></p>
							<p>
								<?php
								printf(
									/* translators: %s: link to the University's post-doctoral research page. */
									esc_html__( 'Για την εκπόνηση μεταδιδακτορικής έρευνας οι ενδιαφερόμενοι/ες μπορούν να μελετήσουν τον Κανονισμό Μεταδιδακτορικών Σπουδών και να βρουν τη σχετική αίτηση στην ιστοσελίδα του Πανεπιστημίου σε αυτόν τον %s.', 'tpte' ),
									'<a href="' . esc_url( 'https://www.aegean.gr/μεταδιδακτορική-έρευνα' ) . '" target="_blank" rel="noopener">' . esc_html__( 'σύνδεσμο', 'tpte' ) . '</a>'
								);
								?>
							</p>
						</div>

						<!-- Διδάκτορες του Τμήματος -->
						<div class="tp-phd-graduates">
							<h3 class="tp-programme-section-title"><?php esc_html_e( 'Διδάκτορες του Τμήματος — Ph.D. (Doctor of Philosophy)', 'tpte' ); ?></h3>

							<div class="tp-phd-filters">
								<div class="tp-phd-filter-field tp-phd-filter-search">
									<label class="screen-reader-text" for="tp-phd-search"><?php esc_html_e( 'Αναζήτηση', 'tpte' ); ?></label>
									<input type="search" id="tp-phd-search" class="tp-phd-search" autocomplete="off" placeholder="<?php esc_attr_e( 'Αναζήτηση ονόματος ή τίτλου διατριβής…', 'tpte' ); ?>">
								</div>
								<div class="tp-phd-filter-field tp-phd-filter-supervisor">
									<label class="screen-reader-text" for="tp-phd-supervisor"><?php esc_html_e( 'Επιβλέπων/ουσα', 'tpte' ); ?></label>
									<select id="tp-phd-supervisor" class="tp-phd-supervisor">
										<option value="all"><?php esc_html_e( 'Όλοι/ες οι επιβλέποντες/ουσες', 'tpte' ); ?></option>
										<?php foreach ( $phd_supervisors as $supervisor_name ) : ?>
											<option value="<?php echo esc_attr( $supervisor_name ); ?>"><?php echo esc_html( $supervisor_name ); ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<p class="tp-phd-count" aria-live="polite">
									<?php
									printf(
										/* translators: 1: number of currently shown graduates (live-updated), 2: total number of graduates. */
										esc_html__( 'Εμφανίζονται %1$s από %2$s διδάκτορες', 'tpte' ),
										'<strong class="js-phd-visible">' . esc_html( $phd_total ) . '</strong>',
										'<span class="js-phd-total">' . esc_html( $phd_total ) . '</span>'
									);
									?>
								</p>
							</div>

							<div class="tp-tution-table tp-programme-table tp-phd-table is-phd">
								<ul>
									<li class="tp-tution-table-head">
										<div class="tp-course-table-row">
											<div class="tp-tution-id"><h4 class="tp-tution-table-title"><?php esc_html_e( 'Ονοματεπώνυμο', 'tpte' ); ?></h4></div>
											<div class="tp-tution-sub"><h4 class="tp-tution-table-title"><?php esc_html_e( 'Επιβλέπων/ουσα', 'tpte' ); ?></h4></div>
											<div class="tp-tution-type"><h4 class="tp-tution-table-title"><?php esc_html_e( 'Τίτλος διατριβής', 'tpte' ); ?></h4></div>
										</div>
									</li>
									<?php
									foreach ( $phd_graduates as $grad ) :
										$sup_key = $phd_supervisor_key( $grad['supervisor'] );
										$search  = $grad['name'] . ' ' . $grad['supervisor'] . ' ' . $grad['title'] . ' ' . $grad['note'];
										?>
										<li class="tp-tution-table-inner tp-phd-row" data-supervisor="<?php echo esc_attr( $sup_key ); ?>" data-search="<?php echo esc_attr( $search ); ?>">
											<div class="tp-course-table-row">
												<div class="tp-tution-id"><h4 class="tp-tution-inner"><?php echo esc_html( $grad['name'] ); ?></h4></div>
												<div class="tp-tution-sub"><h4 class="tp-tution-inner"><?php echo esc_html( $grad['supervisor'] ); ?></h4></div>
												<div class="tp-tution-type">
													<span class="tp-tution-inner tp-phd-thesis"><?php echo esc_html( $grad['title'] ); ?></span>
													<?php if ( ! empty( $grad['note'] ) ) : ?>
														<span class="tp-phd-graduate-note"><?php echo esc_html( $grad['note'] ); ?></span>
													<?php endif; ?>
												</div>
											</div>
										</li>
									<?php endforeach; ?>
									<li class="tp-tution-table-inner none tp-phd-noresults is-hidden" aria-hidden="true">
										<div class="tp-course-table-row">
											<div class="tp-phd-noresults-msg"><?php esc_html_e( 'Δεν βρέθηκαν διδάκτορες που να ταιριάζουν στα κριτήρια αναζήτησης.', 'tpte' ); ?></div>
										</div>
									</li>
								</ul>
							</div>
						</div>

					</div>
				</div>
				<div class="col-lg-3">
					<?php
					get_template_part(
						'template-parts/sidebar',
						'phd',
						array(
							'useful_files' => $useful_files,
						)
					);
					?>
				</div>
			</div>
		</div>
	</section>
	<!-- PhD area end -->

	<?php
endwhile;

get_footer();
