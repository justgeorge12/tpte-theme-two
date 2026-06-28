<?php
/**
 * Template Name: Undergrad Programme
 * Template Post Type: page
 *
 * Undergraduate programme page, rebuilt from the legacy department site
 * (context/Προπτυχιακές Σπουδές…html). Presents three tabs:
 *   1. Ενδεικτικό πρόγραμμα σπουδών — intro + course-declaration rules + PDF.
 *   2. Μαθήματα εξαμήνων — courses grouped by the 8 semesters (accordion + table).
 *   3. Αλληλοεξαρτήσεις μαθημάτων – προαπαιτούμενα — prerequisite chains table.
 *
 * Reuses the shared undergraduate sidebar (template-parts/sidebar-undergrad.php)
 * and the .tp-tution-table markup; page-specific styling lives in assets/css/programme.css.
 *
 * @package tpte
 */

get_header();

while ( have_posts() ) :
	the_post();
	$tp_theme_uri = get_template_directory_uri();

	// --- Tab 1: indicative programme ------------------------------------.
	$endeiktiko_pdf = 'https://www.ct.aegean.gr/data/TPTE_ENDEIKTIKO_PPS_2025-26.pdf';

	// --- Tab 2: courses per semester (extracted from the legacy site) ----.
	$semesters = array(
		array(
			'label'   => 'Α Έτος – 1ο Εξάμηνο',
			'id'      => 'sem1',
			'courses' => array(
				array( 'code' => 'ΞΓΛ001', 'name' => 'ΑΓΓΛΙΚΑ I', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/Examino1/greek/XGL001_EL.pdf' ),
				array( 'code' => 'ΠΟΛ201', 'name' => 'ΘΕΩΡΙΑ ΤΟΥ ΠΟΛΙΤΙΣΜΟΥ Ι', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/Examino1/greek/POL201_EL.pdf' ),
				array( 'code' => 'ΠΛΡ100', 'name' => 'ΕΙΣΑΓΩΓΗ ΣΤΟΝ ΠΡΟΓΡΑΜΜΑΤΙΣΜΟ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/Examino1/greek/PLR100_EL.pdf' ),
				array( 'code' => 'ΜΑΘ100', 'name' => 'ΜΑΘΗΜΑΤΙΚΗ ΑΝΑΛΥΣΗ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/Examino1/greek/MATH100_EL.pdf' ),
				array( 'code' => 'ΕΠΙ300', 'name' => 'ΕΙΣΑΓΩΓΗ ΣΤΙΣ ΟΠΤΙΚΟΑΚΟΥΣΤΙΚΕΣ ΤΕΧΝΕΣ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/Examino1/greek/EPI300_EL.pdf' ),
				array( 'code' => 'ΕΠΙ301', 'name' => 'ΜΕΣΑ ΕΠΙΚΟΙΝΩΝΙΑΣ ΚΑΙ ΚΟΙΝΩΝΙΑ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/Examino1/greek/EPI301_EL.pdf' ),
				array( 'code' => 'ΠΟΛ101', 'name' => 'ΕΙΣΑΓΩΓΗ ΣΤΙΣ ΨΗΦΙΑΚΕΣ ΑΝΘΡΩΠΙΣΤΙΚΕΣ ΣΠΟΥΔΕΣ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/Examino1/greek/POL101_EL.pdf' ),
			),
		),
		array(
			'label'   => 'Α Έτος – 2ο Εξάμηνο',
			'id'      => 'sem2',
			'courses' => array(
				array( 'code' => 'ΠΛΡ101', 'name' => 'ΤΕΧΝΟΛΟΓIΕΣ ΠΟΛΥΜEΣΩΝ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/Examino2/greek/PLR101_EL.pdf' ),
				array( 'code' => 'ΠΛΡ104', 'name' => 'ΤΕΧΝΟΛΟΓΙΕΣ ΔΙΑΔΙΚΤΥΟΥ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/Examino2/greek/PLR104_EL.pdf' ),
				array( 'code' => 'ΠΛΡ132', 'name' => 'ΑΛΓΟΡΙΘΜΟΙ ΚΑΙ ΔΟΜΕΣ ΔΕΔΟΜΕΝΩΝ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/Examino2/greek/PLR132_EL.pdf' ),
				array( 'code' => 'ΠΟΛ205', 'name' => 'ΕΙΣΑΓΩΓΗ ΣΤΗ ΔΙΑΧΕΙΡΙΣΗ ΤΗΣ ΠΟΛΙΤΙΣΤΙΚΗΣ ΚΛΗΡΟΝΟΜΙΑΣ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/Examino2/greek/POL205_EL.pdf' ),
				array( 'code' => 'ΠΟΛ202', 'name' => 'ΘΕΩΡΙΑ ΤΟΥ ΠΟΛΙΤΙΣΜΟΥ ΙΙ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/Examino2/greek/POL202_EL.pdf' ),
				array( 'code' => 'ΕΠΙ311', 'name' => 'ΠΟΣΟΤΙΚΕΣ ΜΕΘΟΔΟΙ ΕΡΕΥΝΑΣ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/Examino2/greek/EPI311_EL.pdf' ),
				array( 'code' => 'ΠΟΔ400', 'name' => 'ΠΟΛΙΤΙΣΤΙΚΗ ΔΙΑΧΕΙΡΙΣΗ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/Examino2/greek/POD400_EL.pdf' ),
				array( 'code' => 'ΞΓΛ002', 'name' => 'ΑΓΓΛΙΚΑ II', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/Examino2/greek/XGL002_EL.pdf' ),
				array( 'code' => 'ΕΠΙ320', 'name' => 'ΜΟΝΤΑΖ ΟΠΤΙΚΟΑΚΟΥΣΤΙΚΟΥ ΥΛΙΚΟΥ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/Examino2/greek/EPI320_EL.pdf' ),
			),
		),
		array(
			'label'   => 'Β Έτος – 3ο Εξάμηνο',
			'id'      => 'sem3',
			'courses' => array(
				array( 'code' => 'ΠΛΡ110', 'name' => 'ΑΝΤΙΚΕΙΜΕΝΟΣΤΡΕΦΗΣ ΠΡΟΓΡΑΜΜΑΤΙΣΜΟΣ Ι', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino3/Greek/PLR110_EL.pdf' ),
				array( 'code' => 'ΠΛΡ103', 'name' => 'ΠΡΟΓΡΑΜΜΑΤΙΣΜΟΣ ΕΦΑΡΜΟΓΩΝ ΠΟΛΥΜΕΣΩΝ I', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino3/Greek/PLR103_EL.pdf' ),
				array( 'code' => 'ITE500', 'name' => 'ΙΣΤΟΡΙΑ ΤΗΣ ΤΕΧΝΗΣ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino3/Greek/ITE500_EL.pdf' ),
				array( 'code' => '2ΨΟΤ111', 'name' => 'ΟΠΤΙΚΟΑΚΟΥΣΤΙΚΗ ΚΛΗΡΟΝΟΜΙΑ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino3/Greek/2PSOT111_EL.pdf' ),
				array( 'code' => 'ΠΟΔ405', 'name' => 'ΑΦΗΓΗΣΗ: ΘΕΩΡΙΑ ΚΑΙ ΠΡΑΚΤΙΚΗ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino3/Greek/POD405_EL.pdf' ),
				array( 'code' => 'ΠΛΡ106', 'name' => 'ΣΧΕΔΙΑΣΗ ΚΑΙ ΑΝΑΠΤΥΞΗ ΙΣΤΟΤΟΠΩΝ ΚΑΙ ΕΦΑΡΜΟΓΩΝ ΙΣΤΟΥ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino3/Greek/PLR106_EL.pdf' ),
				array( 'code' => '3ΠΑΝΤ100', 'name' => 'ΓΡΑΦΙΣΤΙΚΗ Ι', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino3/Greek/3PANT100_EL.pdf' ),
				array( 'code' => 'ΠΔΕ100', 'name' => 'ΒΑΣΙΚΕΣ ΑΡΧΕΣ ΔΙΔΑΚΤΙΚΗΣ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino3/Greek/PDE100_EL.pdf' ),
				array( 'code' => 'ΚΕΠ550', 'name' => 'ΠΟΙΟΤΙΚΕΣ ΜΕΘΟΔΟΙ ΕΡΕΥΝΑΣ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino3/Greek/KEP550_EL.pdf' ),
				array( 'code' => 'ΕΠΙ322', 'name' => 'ΕΙΚΟΝΟΛΗΨΙΑ ΟΠΤΙΚΟΑΣΤΙΚΩΝ ΕΡΓΩΝ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino3/Greek/KEP550_EL.pdf' ),
				array( 'code' => '4ΠΛΡ125', 'name' => 'ΤΕΧΝΗΤΗ ΝΟΗΜΟΣΥΝΗ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino5/Greek/4PLR125_EL.pdf' ),
			),
		),
		array(
			'label'   => 'Β Έτος – 4ο Εξάμηνο',
			'id'      => 'sem4',
			'courses' => array(
				array( 'code' => 'ΕΠΙ304', 'name' => 'ΑΛΛΗΛΕΠΙΔΡΑΣΗ ΑΝΘΡΩΠΟΥ-ΥΠΟΛΟΓΙΣΤΗ I', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino4/Greek/EPI304_EL.pdf' ),
				array( 'code' => '4ΕΤΔΕ', 'name' => 'ΕΙΣΑΓΩΓΗ ΣΤΗΝ ΕΚΠΑΙΔΕΥΤΙΚΗ ΤΕΧΝΟΛΟΓΙΑ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino4/Greek/4ETDE100_EL.pdf' ),
				array( 'code' => 'ΠΟΛ213', 'name' => 'ΜΟΥΣΕΙΑ ΚΑΙ ΕΚΘΕΣΕΙΣ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino4/Greek/POL213_EL.pdf' ),
				array( 'code' => '3ΠΑΝΤ103', 'name' => 'ΠΟΛΙΤΙΣΤΙΚΗ ΑΝΑΠΑΡΑΣΤΑΣΗ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino4/Greek/3PANT103_EL.pdf' ),
				array( 'code' => '1ITE521', 'name' => 'ΤΕΧΝΗ ΜΕ ΝΕΑ ΜΕΣΑ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino4/Greek/1ITE521_EL.pdf' ),
				array( 'code' => '3ΠΛΡ115', 'name' => 'ΑΝΤΙΚΕΙΜΕΝΟΣΤΡΕΦΗΣ ΠΡΟΓΡΑΜΜΑΤΙΣΜΟΣ ΙΙ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino4/Greek/3PLR115_EL.pdf' ),
				array( 'code' => 'ΠΟΛ206', 'name' => 'ΨΗΦΙΑΚΟΣ ΠΟΛΙΤΙΣΜΟΣ ΚΑΙ ΔΗΜΙΟΥΡΓΙΚΕΣ ΒΙΟΜΗΧΑΝΙΕΣ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino4/Greek/POL206_EL.pdf' ),
				array( 'code' => '3ΠΑΝΤ109', 'name' => 'ΓΡΑΦΙΣΤΙΚΗ ΙΙ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino4/Greek/3PANT109_EL.pdf' ),
				array( 'code' => 'ΠΛΡ107', 'name' => 'ΓΡΑΦΙΚΑ ΥΠΟΛΟΓΙΣΤΩΝ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino4/Greek/PLR107_EL.pdf' ),
				array( 'code' => 'ΕΠΙ306', 'name' => 'ΣΕΝΑΡΙΟΓΡΑΦΙΑ ΟΠΤΙΚΟΑΚΟΥΣΤΙΚΩΝ ΕΡΓΩΝ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino5/Greek/EPI306_EL.pdf' ),
				array( 'code' => 'ΜΑΘ601', 'name' => 'ΠΡΟΧΩΡΗΜΕΝΑ ΘΕΜΑΤΑ ΤΕΧΝΗΤΗΣ ΝΟΗΜΟΣΥΝΗΣ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino6/Greek/MATH601_EL.pdf' ),
			),
		),
		array(
			'label'   => 'Γ Έτος – 5ο Εξάμηνο',
			'id'      => 'sem5',
			'courses' => array(
				array( 'code' => 'ΠΛΡ109', 'name' => 'ΒΑΣΕΙΣ ΔΕΔΟΜΕΝΩΝ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino5/Greek/PLR109_EL.pdf' ),
				array( 'code' => 'ΠΛΡ105', 'name' => 'ΕΠΕΞΕΡΓΑΣΙΑ ΕΙΚΟΝΑΣ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino5/Greek/PLR105_EL.pdf' ),
				array( 'code' => 'ΕΠΙ310', 'name' => 'ΟΠΤΙΚΟΣ ΠΟΛΙΤΙΣΜΟΣ ΚΑΙ ΦΩΤΟΓΡΑΦΙΚΗ ΕΙΚΟΝΑ:ΙΣΤΟΡΙΑ,ΘΕΩΡΙΑ ΚΑΙ ΠΡΑΚΤΙΚΗ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino5/Greek/EPI310_EL.pdf' ),
				array( 'code' => 'ΕΠΙ307', 'name' => 'ΣΧΕΔΙΑΣΜΟΣ ΗΧΟΥ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino5/Greek/EPI307_EL.pdf' ),
				array( 'code' => 'ΠΟΛ214', 'name' => 'ΔΙΑΔΡΑΣΤΙΚΟΣ ΣΧΕΔΙΑΣΜΟΣ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino5/Greek/POL214_EL.pdf' ),
				array( 'code' => '4ΕΤΔΕ101', 'name' => 'ΖΗΤΗΜΑΤΑ ΔΙΑΠΟΛΙΤΙΣΜΙΚΗΣ ΕΠΙΚΟΙΝΩΝΙΑΣ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino5/Greek/4ETDE101_EL.pdf' ),
				array( 'code' => 'ΠΟΛ215', 'name' => 'ΜΟΥΣΕΙΑΚΗ ΕΚΠΑΙΔΕΥΣΗ ΚΑΙ ΕΠΙΚΟΙΝΩΝΙΑ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino5/Greek/POL215_EL.pdf' ),
				array( 'code' => 'ΠΟΛ216', 'name' => 'ΜΟΥΣΕΙΑ ΚΑΙ ΨΗΦΙΑΚΕΣ ΤΕΧΝΟΛΟΓΙΕΣ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino5/Greek/POL216_EL.pdf' ),
				array( 'code' => 'ΠΟΔ407', 'name' => 'ΠΡΟΣΤΑΣΙΑ ΦΥΣΙΚΟΥ ΚΑΙ ΔΟΜΗΜΕΝΟΥ ΠΕΡΙΒΑΛΛΟΝΤΟΣ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino5/Greek/POD407_EL.pdf' ),
				array( 'code' => 'ΠΟΛ212', 'name' => 'ΚΟΙΝΩΝΙΟΛΟΓΙΑ ΤΟΥ ΔΙΑΔΙΚΤΥΟΥ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino5/Greek/POL212_EL.pdf' ),
				array( 'code' => '4ΕΤΔΕ110', 'name' => 'ΣΥΝΕΡΓΑΤΙΚΗ ΜΑΘΗΣΗ ΚΑΙ ΚΟΙΝΩΝΙΚΗ ΑΛΛΗΛΕΠΙΔΡΑΣΗ ΣΤΗΝ ΨΗΦΙΑΚΗ ΕΠΟΧΗ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino5/Greek/4ETDE110_EL.pdf' ),
				array( 'code' => '2ΨΟΤ110', 'name' => 'ΘΕΩΡΙΕΣ ΤΗΣ ΚΙΝΟΥΜΕΝΗΣ ΕΙΚΟΝΑΣ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino5/Greek/2PSOT110_EL.pdf' ),
				array( 'code' => 'ΠΟΛ229', 'name' => 'ΨΗΦΙΑΚΕΣ ΜΕΘΟΔΟΙ ΕΡΕΥΝΑΣ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino5/Greek/POL229_EL.pdf' ),
				array( 'code' => 'ΚΠΛΡ115', 'name' => 'ΠΑΡΑΓΩΓΙΚΗ ΤΕΧΝΗΤΗ ΝΟΗΜΟΣΥΝΗ ΚΑΙ ΕΦΑΡΜΟΓΕΣ ΣΤΟΝ ΠΟΛΙΤΙΣΜΟ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino7/Greek/KPLR115_EL.pdf' ),
			),
		),
		array(
			'label'   => 'Γ Έτος – 6ο Εξάμηνο',
			'id'      => 'sem6',
			'courses' => array(
				array( 'code' => 'ΠΟΛ217', 'name' => 'ΠΟΛΙΤΙΣΤΙΚΟΣ ΣΧΕΔΙΑΣΜΟΣ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino6/Greek/POL217_EL.pdf' ),
				array( 'code' => 'ΕΠΙ314', 'name' => 'ΘΕΩΡΙΑ ΤΩΝ ΜΕΣΩΝ ΕΠΙΚΟΙΝΩΝΙΑΣ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino6/Greek/EPI314_EL.pdf' ),
				array( 'code' => '1MO216', 'name' => 'ΔΙΑΧΕΙΡΙΣΗ ΣΥΛΛΟΓΩΝ ΠΟΛΙΤΙΣΤΙΚΩΝ ΟΡΓΑΝΙΣΜΩΝ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino6/Greek/1MO216_EL.pdf' ),
				array( 'code' => 'ΠΛΡ144', 'name' => '3Δ ΨΗΦΙΟΠΟΙΗΣΗ ΚΑΙ ΟΠΤΙΚΟΠΟΙΗΣΗ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino6/Greek/PLR144_EL.pdf' ),
				array( 'code' => 'ΙΤΕ505', 'name' => 'ΟΠΤΙΚΟΣ ΠΟΛΙΤΙΣΜΌΣ ΚΑΙ ΕΝΑΤΗ ΤΕΧΝΗ: ΙΣΤΟΡΙΑ, ΘΕΩΡΙΑ ΚΑΙ ΓΛΩΣΣΑ ΤΩΝ ΚΟΜΙΚΣ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino6/Greek/ITE505_EL.pdf' ),
				array( 'code' => '4ΕΤΔΕ104', 'name' => 'ΕΞ ΑΠΟΣΤΑΣΕΩΣ ΕΚΠΑΙΔΕΥΣΗ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino6/Greek/4ETDE104_EL.pdf' ),
				array( 'code' => 'ΠΛΡ111', 'name' => 'ΤΕΧΝΟΛΟΓΙΑ ΛΟΓΙΣΜΙΚΟΥ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino6/Greek/PLR111_EL.pdf' ),
				array( 'code' => 'ΠΟΛ219', 'name' => 'ΠΡΟΣΤΑΣΙΑ ΤΗΣ ΙΔΙΩΤΙΚΟΤΗΤΑΣ ΚΑΙ ΤΩΝ ΠΡΟΣΩΠΙΚΩΝ ΔΕΔΟΜΕΝΩΝ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino6/Greek/POL219_EL.pdf' ),
				array( 'code' => 'ΚΠΛΡ127', 'name' => 'ΠΡΟΓΡΑΜΜΑΤΙΣΜΟΣ ΣΤΟΝ ΠΑΓΚΟΣΜΙΟ ΙΣΤΟ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino6/Greek/KPLR127_EL.pdf' ),
				array( 'code' => 'ΚΠΛΡ113', 'name' => 'ΤΡΙΣΔΙΑΣΤΑΤΑ ΓΡΑΦΙΚΑ ΜΕ ΥΠΟΛΟΓΙΣΤΗ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino6/Greek/KPLR113_EL.pdf' ),
				array( 'code' => 'ΠΟΛ226', 'name' => 'ΜΝΗΜΗ ΚΑΙ ΤΑΥΤΟΤΗΤΕΣ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino6/Greek/POL226_EL.pdf' ),
				array( 'code' => 'ΠΛΡ128', 'name' => 'ΠΡΟΓΡΑΜΜΑΤΙΣΜΟΣ ΕΦΑΡΜΟΓΩΝ ΠΟΛΥΜΕΣΩΝ ΙΙ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino6/Greek/PLR128_EL.pdf' ),
				array( 'code' => 'ΕΠΙ321', 'name' => 'ΠΡΟΗΓΜΕΝΕΣ ΤΕΧΝΟΛΟΓΙΕΣ ΜΟΝΤΑΖ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino6/Greek/EPI321_EL.pdf' ),
				array( 'code' => 'ΠΔΕ101', 'name' => 'ΕΦΑΡΜΟΣΜΕΝΗ ΔΙΔΑΚΤΙΚΗ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino6/Greek/PDE101_EL.pdf' ),
				array( 'code' => 'ΘΠΑ', 'name' => 'ΘΕΡΙΝΗ ΠΡΑΚΤΙΚΗ ΑΣΚΗΣΗ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino6/Greek/THPA_EL.pdf' ),
				array( 'code' => 'ΕΠΙ315', 'name' => 'ΣΚΗΝΟΘΕΣΙΑ ΟΠΤΙΚΟΑΚΟΥΣΤΙΚΩΝ ΕΡΓΩΝ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino6/Greek/EPI315_EL.pdf' ),
				array( 'code' => 'ΠΟΛ230', 'name' => 'ΔΙΑΔΡΑΣΤΙΚΗ ΨΗΦΙΑΚΗ ΑΦΗΓΗΣΗ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino8/Greek/POL230_EL.pdf' ),
			),
		),
		array(
			'label'   => 'Δ Έτος – 7ο Εξάμηνο',
			'id'      => 'sem7',
			'courses' => array(
				array( 'code' => 'ΠΛΡ145', 'name' => 'ΔΙΑΔΙΚΤΥΟ ΤΩΝ ΠΡΑΓΜΑΤΩΝ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino7/Greek/PLR145_EL.pdf' ),
				array( 'code' => 'ΚΠΛΡ 117', 'name' => 'ΕΙΚΟΝΙΚΗ ΠΡΑΓΜΑΤΙΚΟΤΗΤΑ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino7/Greek/KPLR117_EL.pdf' ),
				array( 'code' => 'ΠΟΛ221', 'name' => 'ΖΗΤΗΜΑΤΑ ΠΟΛΙΤΙΣΜΙΚΗΣ ΘΕΩΡΙΑΣ ΚΑΙ ΨΗΦΙΑΚΟΥ ΠΟΛΙΤΙΣΜΟΥ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino7/Greek/POL221_EL.pdf' ),
				array( 'code' => 'ΠΛΡ146', 'name' => 'ΑΛΛΗΛΕΠΙΔΡΑΣΗ ΑΝΘΡΩΠΟΥ-ΥΠΟΛΟΓΙΣΤΗ ΙΙ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino7/Greek/PLR146_EL.pdf' ),
				array( 'code' => 'ΠΛΡ142', 'name' => 'ΖΗΤΗΜΑΤΑ ΒΑΣΕΩΝ ΔΕΔΟΜΕΝΩΝ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino7/Greek/PLR142_EL.pdf' ),
				array( 'code' => 'ΕΠΙ313', 'name' => 'ΨΗΦΙΑΚΑ ΜΕΣΑ ΚΑΙ ΑΙΣΘΗΣΕΙΣ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino7/Greek/EPI313_EL.pdf' ),
				array( 'code' => 'ΠΟΛ222', 'name' => 'ΣΥΓΧΡΟΝΗ ΣΥΣΤΗΜΙΚΗ ΘΕΩΡΙΑ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino7/Greek/POL222_EL.pdf' ),
				array( 'code' => '1ΜΟ214', 'name' => 'ΠΕΡΙΒΑΛΛΟΝΤΙΚΕΣ ΠΑΡΑΜΕΤΡΟΙ ΜΟΥΣΕΙΩΝ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino7/Greek/1MO214_EL.pdf' ),
				array( 'code' => 'ΠΟΛ224', 'name' => 'ΜΟΥΣΕΙΑ ΚΑΙ ΠΟΛΙΤΙΣΤΙΚΗ ΠΟΛΙΤΙΚΗ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino7/Greek/POL224_EL.pdf' ),
				array( 'code' => '4ΕΤΔΕ108', 'name' => 'ΓΝΩΣΤΙΚΕΣ ΠΡΟΣΕΓΓΙΣΕΙΣ & ΨΗΦΙΑΚΕΣ ΕΚΠΑΙΔΕΥΤΙΚΕΣ ΕΦΑΡΜΟΓΕΣ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino7/Greek/4ETDE108_EL.pdf' ),
				array( 'code' => 'ΠΛΡ143', 'name' => 'ΣΗΜΑΣΙΟΛΟΓΙΚΟΣ ΙΣΤΟΣ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino7/Greek/PLR143_EL.pdf' ),
				array( 'code' => 'ΠΟΛ203', 'name' => 'ΠΟΛΥΠΟΛΙΤΙΣΜΙΚΟΤΗΤΑ ΚΑΙ ΤΑΥΤΟΤΗΤΕΣ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino7/Greek/POL203_EL.pdf' ),
				array( 'code' => 'ΜΟΥ216', 'name' => 'ΕΚΘΕΣΙΑΚΟΣ ΣΧΕΔΙΑΣΜΟΣ Ι', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino7/Greek/MOY216_EL.pdf' ),
				array( 'code' => 'ΕΠΙ312', 'name' => 'ΝΤΟΚΙΜΑΝΤΕΡ: ΘΕΩΡΙΑ ΚΑΙ ΠΡΑΞΗ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino7/Greek/EPI312_EL.pdf' ),
				array( 'code' => 'ΕΠΙ323', 'name' => 'ΣΥΓΧΡΟΝΕΣ ΤΑΣΕΙΣ ΣΤΑ ΟΠΤΙΚΟΑΚΟΥΣΤΙΚΑ ΜΕΣΑ', 'pdf' => 'https://www.ct.aegean.gr/data/EPI323_EL.pdf' ),
			),
		),
		array(
			'label'   => 'Δ Έτος – 8ο Εξάμηνο',
			'id'      => 'sem8',
			'courses' => array(
				array( 'code' => 'ΠΟΛ228', 'name' => 'ΕΙΔΙΚΑ ΖΗΤΗΜΑΤΑ ΣΥΣΤΗΜΙΚΗΣ ΘΕΩΡΙΑΣ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino8/Greek/POL228_EL.pdf' ),
				array( 'code' => 'ΠΛΡ108', 'name' => 'ΠΛΗΡΟΦΟΡΙΑΚΑ ΣΥΣΤΗΜΑΤΑ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino8/Greek/PLR108_EL.pdf' ),
				array( 'code' => 'ΚΠΛΡ119', 'name' => 'ΑΣΦΑΛΕΙΑ ΔΕΔΟΜΕΝΩΝ ΣΤΗΝ ΚΟΙΝΩΝΙΑ ΤΗΣ ΠΛΗΡΟΦΟΡΙΑΣ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino8/Greek/KPLR119_EL.pdf' ),
				array( 'code' => 'ΠΟΛ225', 'name' => 'ΤΕΧΝΟΛΟΓΙΕΣ ΔΙΑΧΕΙΡΙΣΗΣ ΠΟΛΙΤΙΣΜΙΚΗΣ ΠΛΗΡΟΦΟΡΙΑΣ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino8/Greek/POL225_EL.pdf' ),
				array( 'code' => 'ΠΛΡ140', 'name' => 'ΘΕΩΡΙΑ ΚΑΙ ΣΧΕΔΙΑΣΜΟΣ ΨΗΦΙΑΚΩΝ ΠΑΙΧΝΙΔΙΩΝ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino8/Greek/PLR140_EL.pdf' ),
				array( 'code' => 'ΕΠΙ317', 'name' => 'ΟΠΤΙΚΟΑΚΟΥΣΤΙΚΕΣ ΒΙΟΜΗΧΑΝΙΕΣ-ΘΕΩΡΙΑ ΚΑΙ ΠΑΡΑΓΩΓΗ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino8/Greek/EPI317_EL.pdf' ),
				array( 'code' => 'ΕΠΙ318', 'name' => 'ΠΕΡΑΜΑΤΙΚΕΣ ΜΟΡΦΕΣ ΟΠΤΙΚΟΑΚΟΥΣΤΙΚΗΣ ΤΕΧΝΗΣ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino8/Greek/EPI318_EL.pdf' ),
				array( 'code' => '1ΜΟ217', 'name' => 'ΕΚΘΕΣΙΑΚΟΣ ΣΧΕΔΙΑΣΜΟΣ ΙΙ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino8/Greek/1MO217_EL.pdf' ),
				array( 'code' => 'ΚΠΛΡ118', 'name' => 'ΕΞΟΡΥΞΗ ΔΕΔΟΜΕΝΩΝ ΑΠΟ ΨΗΦΙΑΚΟ ΚΑΙ ΔΙΑΔΙΚΤΥΑΚΟ ΠΕΡΙΕΧΟΜΕΝΟ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino8/Greek/KPLR118_EL.pdf' ),
				array( 'code' => 'ΠΟΔ406', 'name' => 'ΔΙΟΙΚΗΣΗ ΠΟΛΙΤΙΣΤΙΚΩΝ ΕΡΓΩΝ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino8/Greek/POD406_EL.pdf' ),
				array( 'code' => 'ΕΠΙ319', 'name' => 'ΜΕΣΑ ΚΟΙΝΩΝΙΚΗΣ ΔΙΚΤΥΩΣΗΣ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino8/Greek/EPI319_EL.pdf' ),
				array( 'code' => '1ΜΟ219', 'name' => 'ΨΗΦΙΑΚΕΣ ΕΚΘΕΣΕΙΣ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino8/Greek/1MO219_EL.pdf' ),
				array( 'code' => 'ΠΟΛ227', 'name' => 'ΠΟΛΙΤΙΣΜΙΚΗ ΚΑΤΑΓΡΑΦΗ ΚΑΙ ΧΩΡΟΣ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino8/Greek/POL227_EL.pdf' ),
				array( 'code' => 'ΠΛΡ147', 'name' => 'ΕΙΔΙΚΑ ΘΕΜΑΤΑ ΕΠΕΞΕΡΓΑΣΙΑΣ ΕΙΚΟΝΑΣ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino8/Greek/PLR147_EL.pdf' ),
				array( 'code' => 'ΠΟΛ231', 'name' => 'ΑΥΛΗ ΠΟΛΙΤΙΣΤΙΚΗ ΚΛΗΡΟΝΟΜΙΑ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino8/Greek/POL231_EL.pdf' ),
				array( 'code' => 'ΠΟΔ411', 'name' => 'ΚΟΙΝΩΝΙΚΑ ΠΛΗΡΟΦΟΡΙΑΚΑ ΣΥΣΤΗΜΑΤΑ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino8/Greek/POD411_EL.pdf' ),
				array( 'code' => 'ΠΟΛ218', 'name' => 'ΖΗΤΗΜΑΤΑ ΠΟΛΙΤΙΣΤΙΚΗΣ ΑΝΑΠΑΡΆΣΤΑΣΗΣ', 'pdf' => 'https://www.ct.aegean.gr/data/Examina/examino8/Greek/POL218_EL.pdf' ),
			),
		),
	);

	// --- Tab 3: prerequisite chains -------------------------------------.
	$prerequisites = array(
		array( 'no' => '1', 'prereq' => 'Εισαγωγή στον Προγραμματισμό', 'chain' => 'Αντικειμενοστρεφής Προγραμματισμός Ι' ),
		array( 'no' => '2', 'prereq' => 'Βάσεις Δεδομένων', 'chain' => 'Ζητήματα Βάσεων Δεδομένων' ),
		array( 'no' => '3', 'prereq' => 'Ποσοτικές Μέθοδοι Έρευνας*', 'chain' => 'Ψηφιακές Μέθοδοι Έρευνας' ),
		array( 'no' => '4', 'prereq' => 'Ποιοτικές Μέθοδοι Έρευνας*', 'chain' => 'Ψηφιακές Μέθοδοι Έρευνας' ),
		array( 'no' => '5', 'prereq' => 'Αντικειμενοστρεφής Προγραμματισμός Ι', 'chain' => 'Αντικειμενοστρεφής Προγραμματισμός ΙΙ' ),
		array( 'no' => '6', 'prereq' => 'Τεχνολογίες Διαδικτύου', 'chain' => 'Σχεδίαση και Ανάπτυξη Ιστότοπων και Εφαρμογών Ιστού' ),
		array( 'no' => '7', 'prereq' => 'Τρισδιάστατα γραφικά', 'chain' => 'Εικονική Πραγματικότητα' ),
		array( 'no' => '8', 'prereq' => 'Προγραμματισμός Εφαρμογών Πολυμέσων Ι', 'chain' => 'Προγραμματισμός Εφαρμογών Πολυμέσων ΙΙ' ),
		array( 'no' => '9', 'prereq' => 'Μέσα επικοινωνίας και κοινωνία', 'chain' => 'Ζητήματα Διαπολιτισμικής Επικοινωνίας' ),
		array( 'no' => '10', 'prereq' => 'Εισαγωγή στις Οπτικοακουστικές Τέχνες', 'chain' => 'Σκηνοθεσία και Μοντάζ Οπτικοακουστικών Δεδομένων' ),
		array( 'no' => '11', 'prereq' => 'Ιστορία της Τέχνης', 'chain' => 'Τέχνη με νέα Μέσα' ),
		array( 'no' => '12', 'prereq' => 'Γραφιστική Ι', 'chain' => 'Γραφιστική ΙΙ' ),
		array( 'no' => '13', 'prereq' => 'Εκθεσιακός Σχεδιασμός Ι', 'chain' => 'Εκθεσιακός Σχεδιασμός ΙΙ' ),
		array( 'no' => '14', 'prereq' => 'Θεωρία Πολιτισμού ΙΙ', 'chain' => 'Ζητήματα Πολιτισμικής Θεωρίας και Ψηφιακού Πολιτισμού' ),
		array( 'no' => '15', 'prereq' => 'Αλληλεπίδραση Ανθρώπου -Υπολογιστή Ι', 'chain' => 'Αλληλεπίδραση Ανθρώπου -Υπολογιστή ΙΙ' ),
		array( 'no' => '16', 'prereq' => 'Μοντάζ Οπτικοακουστικού Υλικού', 'chain' => 'Προηγμένες Τεχνολογίες Μοντάζ' ),
	);
	$lab_courses = array(
		'Εισαγωγή στον Προγραμματισμό',
		'Αντικειμενοστρεφής Προγραμματισμός Ι',
		'Αντικειμενοστρεφής Προγραμματισμός ΙΙ',
		'Τεχνολογία Πολυμέσων',
		'Τεχνολογίες Διαδικτύου',
	);

	// Tabs (top-level navigation).
	$tabs = array(
        array(
                'id'     => 'tab-mathimata',
                'label'  => __( 'Μαθήματα εξαμήνων', 'tpte' ),
                'active' => true,
        ),
		array(
			'id'     => 'tab-kanonismos',
			'label'  => __( 'Κανονισμός Δηλώσεων Μαθημάτων', 'tpte' ),
			'active' => false,
		),
		array(
			'id'     => 'tab-prereq',
			'label'  => __( 'Αλληλοεξαρτήσεις', 'tpte' ),
			'active' => false,
		),
	);

	/**
	 * Render one reusable course/prerequisite table.
	 *
	 * @param array  $headers Three column headings (left, middle, right).
	 * @param array  $rows    Rows, each an array of three cell HTML strings.
	 * @param string $variant Modifier class: 'is-courses' or 'is-prereq'.
	 */
	$render_table = function ( $headers, $rows, $variant ) {
		$last = count( $rows ) - 1;
		?>
		<div class="tp-tution-table tp-programme-table <?php echo esc_attr( $variant ); ?>">
			<ul>
				<li class="tp-tution-table-head">
					<div class="tp-course-table-row">
						<div class="tp-tution-id"><h4 class="tp-tution-table-title"><?php echo esc_html( $headers[0] ); ?></h4></div>
						<div class="tp-tution-sub"><h4 class="tp-tution-table-title"><?php echo esc_html( $headers[1] ); ?></h4></div>
						<div class="tp-tution-type"><h4 class="tp-tution-table-title"><?php echo esc_html( $headers[2] ); ?></h4></div>
					</div>
				</li>
				<?php foreach ( $rows as $i => $row ) : ?>
					<li class="tp-tution-table-inner<?php echo $i === $last ? ' none' : ''; ?>">
						<div class="tp-course-table-row">
							<div class="tp-tution-id"><h4 class="tp-tution-inner"><?php echo wp_kses_post( $row[0] ); ?></h4></div>
							<div class="tp-tution-sub"><h4 class="tp-tution-inner"><?php echo wp_kses_post( $row[1] ); ?></h4></div>
							<div class="tp-tution-type"><?php echo $row[2]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Trusted, internally built (esc_url + esc_html__ + static inline SVG). ?></div>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php
	};

	// Inline "open in new tab" icon (inherits currentColor / sizing via .tp-programme-extlink-icon).
	$extlink_icon = '<svg class="tp-programme-extlink-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">'
		. '<path d="M14 4h6v6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>'
		. '<path d="M20 4 11 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>'
		. '<path d="M19 14v4a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>'
		. '</svg>';

	// Build the syllabus-link cell once per course.
	$pdf_cell = function ( $url ) use ( $extlink_icon ) {
		if ( empty( $url ) ) {
			return '<span class="tp-tution-inner">—</span>';
		}
		return '<a class="tp-programme-pdf-cell" href="' . esc_url( $url ) . '" target="_blank" rel="noopener">'
			. esc_html__( '', 'tpte' ) . $extlink_icon . '</a>';
	};
	?>

	<!-- Programme breadcrumb start -->
	<section class="tp-breadcrumb__area pt-160 pb-150 p-relative z-index-1 fix">
		<div class="tp-breadcrumb__bg overlay" data-background="<?php echo esc_url( $tp_theme_uri ); ?>/assets/img/breadcrumb/campus-amphi-2.png"></div>
		<div class="container">
			<div class="row align-items-center">
				<div class="col-sm-12">
					<div class="tp-breadcrumb__content">
						<div class="tp-breadcrumb__list inner-after">
							<span class="white"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M8.07207 0C8.19331 0 8.31107 0.0404348 8.40664 0.114882L16.1539 6.14233L15.4847 6.98713L14.5385 6.25079V12.8994C14.538 13.1843 14.4243 13.4574 14.2225 13.6589C14.0206 13.8604 13.747 13.9738 13.4616 13.9743H2.69231C2.40688 13.9737 2.13329 13.8603 1.93146 13.6588C1.72962 13.4573 1.61597 13.1843 1.61539 12.8994V6.2459L0.669148 6.98235L0 6.1376L7.7375 0.114882C7.83308 0.0404348 7.95083 0 8.07207 0ZM8.07694 1.22084L2.69231 5.40777V12.8994H13.4616V5.41341L8.07694 1.22084Z" fill="currentColor"/>
							</svg></a></span>
							<span class="white"><?php esc_html_e( 'Προπτυχιακές Σπουδές', 'tpte' ); ?></span>
							<span class="white"><?php the_title(); ?></span>
						</div>
						<h3 class="tp-breadcrumb__title color"><?php the_title(); ?></h3>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- Programme breadcrumb end -->


	<!-- Programme area start -->
	<section class="tp-tution-area grey-bg pt-120 pb-120">
		<div class="container">
			<div class="row">
				<div class="col-lg-9">
					<div class="tp-tution-wrapper">

						<!-- Tabs nav -->
						<div class="tp-programme-tabs">
							<ul class="nav nav-tabs" id="programmeTab" role="tablist">
								<?php foreach ( $tabs as $tab ) : ?>
									<li class="nav-item" role="presentation">
										<button class="nav-link<?php echo $tab['active'] ? ' active' : ''; ?>" id="<?php echo esc_attr( $tab['id'] ); ?>-tab" data-bs-toggle="tab" data-bs-target="#<?php echo esc_attr( $tab['id'] ); ?>" type="button" role="tab" aria-controls="<?php echo esc_attr( $tab['id'] ); ?>" aria-selected="<?php echo $tab['active'] ? 'true' : 'false'; ?>"><?php echo esc_html( $tab['label'] ); ?></button>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>

						<div class="tab-content" id="programmeTabContent">

							<!-- Tab 1: Κανονισμός Δηλώσεων Μαθημάτων -->
							<div class="tab-pane fade " id="tab-kanonismos" role="tabpanel" aria-labelledby="tab-kanonismos-tab">
								<div class="tp-programme-intro">
									<h3 class="tp-programme-section-title"><?php esc_html_e( 'Κανονισμός Δηλώσεων', 'tpte' ); ?></h3>

									<p><strong><?php esc_html_e( 'Η δήλωση των μαθημάτων ανά εξάμηνο γίνεται ως εξής:', 'tpte' ); ?></strong></p>

									<p><strong><?php esc_html_e( 'Οι φοιτητές/φοιτήτριες του Τ.Π.Τ.Ε μπορούν να δηλώσουν μαθήματα μόνο του τρέχοντος εξαμήνου στο οποίο βρίσκονται καθώς και μαθήματα από προηγούμενα εξάμηνα που τα χρωστάνε. Δεν μπορούν να δηλώσουν μαθήματα από μεγαλύτερα εξάμηνα – έτη από αυτό στο όποιο βρίσκονται.', 'tpte' ); ?></strong></p>

									<p><strong><?php esc_html_e( 'Αναλυτικά:', 'tpte' ); ?></strong></p>

									<ul>
										<li><?php esc_html_e( 'Οι φοιτητές/φοιτήτριες που βρίσκονται στο Α΄ και Β΄ εξάμηνο των σπουδών τους (πρώτο έτος) μπορούν (καλούνται) να δηλώσουν τα τέσσερα (4) Υποχρεωτικά (Υ) μαθήματα, συν ένα (1) Υποχρεωτικό κατ’ επιλογή (ΥΕ) μάθημα που προσφέρονται στο κάθε εξάμηνο (συνολικά από πέντε μαθήματα σε κάθε εξάμηνο του πρώτου έτους).', 'tpte' ); ?></li>
										<li><?php esc_html_e( 'Οι φοιτητές/φοιτήτριες που βρίσκονται στο Γ΄ και Δ’ εξάμηνο των σπουδών τους (δεύτερο έτος) μπορούν να δηλώσουν το ανώτερο μέχρι επτά (7) μαθήματα. Μπορούν (καλούνται) να δηλώσουν τα τέσσερα (4) Υποχρεωτικά (Υ) μαθήματα, συν το ένα (1) Υποχρεωτικό κατ’ επιλογή (ΥΕ) μάθημα που προσφέρονται σε κάθε εξάμηνο του δευτέρου έτους, καθώς και άλλα δύο (2) επιπλέον μαθήματα, είτε από αυτά που προσφέρονται στο τρέχον εξάμηνο (του δευτέρου έτους) ή σε προηγούμενο εξάμηνο (του πρώτου έτους) και στα οποία δεν έχουν επιτύχει.', 'tpte' ); ?></li>
										<li><?php esc_html_e( 'Οι φοιτητές/φοιτήτριες που βρίσκονται στο Ε΄ και Στ’ εξάμηνο των σπουδών τους (τρίτο έτος) μπορούν να δηλώσουν το ανώτερο μέχρι επτά (7) μαθήματα. Μπορούν (καλούνται) να δηλώσουν τα δύο (2) υποχρεωτικά (Υ) μαθήματα, συν τα τέσσερα (4) Υποχρεωτικά κατ’ επιλογή (ΥΕ) μαθήματα που προσφέρονται σε κάθε εξάμηνο του τρίτου έτους, καθώς και άλλο ένα (1) επιπλέον μάθημα, είτε από αυτά που προσφέρονται στο τρέχον εξάμηνο (του τρίτου έτους) ή σε προηγούμενο εξάμηνο (του πρώτου ή δευτέρου έτους) και στο οποίο δεν έχουν επιτύχει.', 'tpte' ); ?></li>
										<li><?php esc_html_e( 'Οι φοιτητές/φοιτήτριες που βρίσκονται στο Ζ΄ και Η΄ εξάμηνο των σπουδών τους (τέταρτο έτος) μπορούν να δηλώσουν το ανώτερο μέχρι επτά (7) μαθήματα. Μπορούν (καλούνται) να δηλώσουν τα έξι (6) Υποχρεωτικά κατ’ επιλογή (ΥΕ) μαθήματα που προσφέρονται σε κάθε εξάμηνο του τετάρτου έτους, καθώς και άλλο ένα (1) επιπλέον μάθημα, είτε από αυτά που προσφέρονται στο τρέχον εξάμηνο (του τετάρτου έτους) ή σε προηγούμενο εξάμηνο (του πρώτου ή δευτέρου ή τρίτου έτους) και στο οποίο δεν έχουν επιτύχει.', 'tpte' ); ?></li>
									</ul>

									<p><?php esc_html_e( 'Εξαίρεση αποτελεί η δεύτερη (2η) και άνω φορά δήλωση της Πτυχιακής Εργασίας (ΠΕ) {η οποία την πρώτη (1η) φορά δηλώνεται κανονικά μέσα στο συνολικό αριθμό των μαθημάτων που επιτρέπεται να δηλωθούν, ενώ από τη δεύτερη (2η) και άνω φορά δηλώνεται ως επιπλέον (εξτρά) μάθημα}. Η Πτυχιακή Εργασία (ΠΕ) δηλώνεται κατ’ ελάχιστον για δύο συνεχόμενα εξάμηνα, ενώ συνεχίζει να δηλώνεται σε κάθε μετέπειτα εξάμηνο μέχρι να παρουσιαστεί.', 'tpte' ); ?></p>

									<ul>
										<li><?php esc_html_e( 'Οι φοιτητές/φοιτήτριες που έχουν ολοκληρώσει την κανονική (τετραετή) διάρκεια των σπουδών τους και βρίσκονται στο ένατο (9ο) εξάμηνο των σπουδών τους και πάνω (πέμπτο έτος και πάνω) μπορούν να δηλώσουν το ανώτερο μέχρι εννιά (9) μαθήματα (συνολικά εννιά μαθήματα). Μαθήματα από προηγούμενα εξάμηνα σπουδών (των κανονικών τεσσάρων (4) ετών φοίτησης) που είτε δεν τα δήλωσαν ποτέ, είτε τα χρωστάνε.', 'tpte' ); ?></li>
									</ul>

									<p><?php esc_html_e( 'Οι φοιτητές και οι φοιτήτριες του Τ.Π.Τ.Ε. που θα επιλέξουν να δηλώσουν τα μαθήματα του ιδρυματικού Καταλόγου που προσφέρονται από άλλα Τμήματα της οικείας Σχολής ή από Τμήματα άλλων Σχολών του Ιδρύματος (προσμετρώνται για την απονομή του τίτλου σπουδών αποκλειστικά ως μαθήματα υποχρεωτικά κατ’ επιλογήν), αντιστοιχούν κατ’ ανώτατο όριο έως το δέκα τοις εκατό (10%) του συνολικού αριθμού πιστωτικών μονάδων (ECTS) που απαιτούνται για την επιτυχή ολοκλήρωση του προγράμματος σπουδών θα πρέπει να είναι πολύ προσεχτικοί στην επιλογή των μαθημάτων του ιδρυματικού Καταλόγου, ώστε τόσο οι διδακτικές μονάδες (ΔΜ), όσο και οι πιστωτικές μονάδες (ΠΜ - ECTS) των μαθημάτων αυτών {σε σχέση με τα Υποχρεωτικά κατ’ επιλογή (ΥΕ) μαθήματα που δεν θα δηλώσουν από το πρόγραμμα σπουδών του Τ.Π.Τ.Ε.}, να επαρκούν ώστε να συμπληρωθεί ο απαραίτητος αριθμός διδακτικών (ΔΜ) και πιστωτικών μονάδων (ΠΜ - ECTS) που απαιτούνται για τη λήψη του πτυχίου του Τ.Π.Τ.Ε., δηλαδή τουλάχιστον 132 ΔΜ και τουλάχιστον 240 ΠΜ (ECTS).', 'tpte' ); ?></p>

									<p><?php esc_html_e( 'Οι φοιτητές και οι φοιτήτριες του Τ.Π.Τ.Ε. που θα επιλέξουν να δηλώσουν από την ειδική κατηγορία μαθημάτων που προσφέρονται από τμήματα της Σχολής των Κοινωνικών Επιστημών και εντάσσονται στο πρόγραμμα σπουδών του ΤΠΤΕ, θα πρέπει να είναι πολύ προσεχτικοί στην επιλογή των συγκεκριμένων μαθημάτων, ώστε τόσο οι διδακτικές μονάδες (ΔΜ), όσο και οι πιστωτικές μονάδες (ΠΜ - ECTS) των μαθημάτων αυτών να επαρκούν ώστε να συμπληρωθεί ο απαραίτητος αριθμός διδακτικών (ΔΜ) και πιστωτικών μονάδων (ΠΜ - ECTS) που απαιτούνται για τη λήψη του πτυχίου του Τ.Π.Τ.Ε., δηλαδή τουλάχιστον 132 ΔΜ και τουλάχιστον 240 ΠΜ (ECTS).', 'tpte' ); ?></p>
								</div>
                                <div class="tp-programme-lab">
                                    <h4 class="tp-programme-lab-title"><?php esc_html_e( 'Υποχρεωτική παρακολούθηση εργαστηριακών μαθημάτων Πληροφορικής', 'tpte' ); ?></h4>
                                    <p><?php esc_html_e( 'Επίσης, για την επιτυχή ολοκλήρωση των παρακάτω μαθημάτων απαιτείται επιπλέον των κριτηρίων αξιολόγησης που τίθενται από τους/τις διδάσκοντες/σουσες στην αρχή του εξαμήνου και η υποχρεωτική παρακολούθηση του εργαστηριακού μέρους από τους/τις φοιτητές/τριες. Τα μαθήματα αυτά είναι τα εξής:', 'tpte' ); ?></p>
                                    <ul>
                                        <?php foreach ( $lab_courses as $lab_course ) : ?>
                                            <li><?php echo esc_html( $lab_course ); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <p><?php esc_html_e( 'Οι φοιτητές/φοιτήτριες που δεν έχουν εξεταστεί επιτυχώς -τουλάχιστον μία φορά- και δηλώνουν εκ νέου τα ανωτέρω μαθήματα, σε περίπτωση που δεν έχουν συμπληρώσει τον απαιτούμενο αριθμό παρουσιών στα εργαστήρια, υποχρεούνται- επιπλέον των κριτηρίων αξιολόγησης που τίθενται από τους/τις διδάσκοντες/σουσες - για να έχουν δικαίωμα συμμετοχής στις τελικές εξετάσεις να επιτύχουν σε συμπληρωματική εξέταση του εργαστηριακού μέρους, η οποία θα πραγματοποιείται κατά την τελευταία εβδομάδα του εξαμήνου διδασκαλίας των μαθημάτων.', 'tpte' ); ?></p>
                                </div>
							</div>

							<!-- Tab 2: Μαθήματα εξαμήνων -->
							<div class="tab-pane fade show active" id="tab-mathimata" role="tabpanel" aria-labelledby="tab-mathimata-tab">
                                <h2 class="tp-programme-section-title">Πρόγραμμα Μαθημάτων ανά εξάμηνο</h2>
                                <br/>
                                <p><?php esc_html_e( 'Το πρόγραμμα σπουδών του Τ.Π.Τ.Ε. έχει δομηθεί με βάση τα διεθνή πρότυπα προγραμμάτων σπουδών στο διεπιστημονικό πεδίο της Πολιτισμικής Πληροφορικής. Καθώς οι επιστημονικοί τομείς που καλύπτει το Τμήμα εξελίσσονται συνεχώς, επιδιώκεται συνεχώς η ανανέωση του περιεχομένου των μαθημάτων που διδάσκονται, αλλά και η εισαγωγή νέων, ώστε το Τμήμα να διασφαλίσει τόσο την άρτια και υψηλού επιπέδου εκπαιδευτική διαδικασία, όσο και την επιστημονική έρευνα.', 'tpte' ); ?></p>
								<div class="accordion tp-programme-accordion" id="semestersAccordion">
									<?php
									foreach ( $semesters as $index => $semester ) :
										$is_open = 0 === $index;

										// Build table rows for this semester.
										$rows = array();
										foreach ( $semester['courses'] as $course ) {
											$rows[] = array(
												esc_html( $course['code'] ),
												esc_html( $course['name'] ),
												$pdf_cell( $course['pdf'] ),
											);
										}
										?>
										<div class="accordion-item">
											<h2 class="accordion-header" id="heading-<?php echo esc_attr( $semester['id'] ); ?>">
												<button class="accordion-button<?php echo $is_open ? '' : ' collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr( $semester['id'] ); ?>" aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>" aria-controls="<?php echo esc_attr( $semester['id'] ); ?>">
													<?php echo esc_html( $semester['label'] ); ?>
												</button>
											</h2>
											<div id="<?php echo esc_attr( $semester['id'] ); ?>" class="accordion-collapse collapse<?php echo $is_open ? ' show' : ''; ?>" aria-labelledby="heading-<?php echo esc_attr( $semester['id'] ); ?>" data-bs-parent="#semestersAccordion">
												<div class="accordion-body">
													<?php
													$render_table(
														array(
															__( 'Κωδικός', 'tpte' ),
															__( 'Μάθημα', 'tpte' ),
															__( 'Περίγραμμα', 'tpte' ),
														),
														$rows,
														'is-courses'
													);
													?>
												</div>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
							</div>

							<!-- Tab 3: Αλληλοεξαρτήσεις μαθημάτων – προαπαιτούμενα -->
							<div class="tab-pane fade" id="tab-prereq" role="tabpanel" aria-labelledby="tab-prereq-tab">
								<div class="tp-programme-intro mb-40">
									<p><?php esc_html_e( 'Στο ΠΠΣ για τους εισαχθέντες φοιτητές και φοιτήτριες από το ακαδημαϊκό έτος 2019 – 20, ορίζονται οι παρακάτω αλληλεξαρτήσεις μαθημάτων με τη μορφή προαπαιτούμενων. Συγκεκριμένα, για να μπορέσουν οι φοιτητές/τριες να δηλώσουν ένα μάθημα της στήλης (Γ) θα πρέπει να έχουν εξεταστεί με επιτυχία στο αντίστοιχο μάθημα της στήλης (Β).', 'tpte' ); ?></p>
								</div>

								<?php
								$prereq_rows = array();
								foreach ( $prerequisites as $row ) {
									$prereq_rows[] = array(
										esc_html( $row['no'] ),
										esc_html( $row['prereq'] ),
										'<span class="tp-tution-inner">' . esc_html( $row['chain'] ) . '</span>',
									);
								}
								$render_table(
									array(
										__( 'A/A', 'tpte' ),
										__( 'Προαπαιτούμενο Μάθημα', 'tpte' ),
										__( 'Μάθημα Αλυσίδας', 'tpte' ),
									),
									$prereq_rows,
									'is-prereq'
								);
								?>
								<p class="mt-15"><em><?php esc_html_e( '*Ισχύει από το ακ. έτος 2025-26', 'tpte' ); ?></em></p>


							</div>

						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<?php
					get_template_part(
						'template-parts/sidebar',
						'undergrad',
						array(
							'useful_files' => array(
								array(
									'label' => __( 'Ενδεικτικό Πρόγραμμα σπουδών 2025-26', 'tpte' ),
									'url'   => $endeiktiko_pdf,
								),
							),
						)
					);
					?>
				</div>
			</div>
		</div>
	</section>
	<!-- Programme area end -->

	<?php
endwhile;

get_footer();
