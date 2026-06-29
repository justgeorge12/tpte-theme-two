/**
 * Announcement PDF picker (admin).
 *
 * Wires the "Επιλογή PDF" / "Αφαίρεση" buttons in the announcement meta box to the
 * WordPress Media Library (wp.media). Stores the chosen attachment ID in the hidden
 * #tpte_announcement_pdf_id input and shows the file name. Enqueued only on the
 * announcement edit screen (see functions.php), alongside wp_enqueue_media().
 *
 * @package tpte
 */
(function () {
	'use strict';

	function init() {
		var wrap = document.querySelector('.tpte-announcement-pdf');
		if (!wrap || typeof wp === 'undefined' || !wp.media) {
			return;
		}

		var idField    = wrap.querySelector('#tpte_announcement_pdf_id');
		var nameField  = wrap.querySelector('.tpte-announcement-pdf-name');
		var selectBtn  = wrap.querySelector('.tpte-announcement-pdf-select');
		var removeBtn  = wrap.querySelector('.tpte-announcement-pdf-remove');
		var frame;

		selectBtn.addEventListener('click', function (e) {
			e.preventDefault();

			if (frame) {
				frame.open();
				return;
			}

			frame = wp.media({
				title: 'Επιλογή αρχείου PDF',
				button: { text: 'Χρήση αρχείου' },
				library: { type: 'application/pdf' },
				multiple: false
			});

			frame.on('select', function () {
				var attachment = frame.state().get('selection').first().toJSON();
				idField.value = attachment.id;
				nameField.innerHTML = '';
				var link = document.createElement('a');
				link.href = attachment.url;
				link.target = '_blank';
				link.rel = 'noopener';
				link.textContent = attachment.title || attachment.filename || attachment.url;
				nameField.appendChild(link);
				removeBtn.style.display = '';
			});

			frame.open();
		});

		removeBtn.addEventListener('click', function (e) {
			e.preventDefault();
			idField.value = '';
			nameField.innerHTML = '<em>Δεν έχει επιλεγεί αρχείο.</em>';
			removeBtn.style.display = 'none';
		});
	}

	if (document.readyState !== 'loading') {
		init();
	} else {
		document.addEventListener('DOMContentLoaded', init);
	}
})();
