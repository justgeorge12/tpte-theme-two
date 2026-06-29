/**
 * Single news post — copy-to-clipboard share button.
 *
 * Standalone, vanilla JS enqueued conditionally in functions.php on is_singular('post')
 * (same standalone pattern as phd-filter.js / event-filter.js). Copies the post URL from
 * a .tp-postbox-copy-link element's data-copy-url and briefly shows a check icon.
 *
 * @package tpte
 */
(function () {
	'use strict';

	function fallbackCopy(text) {
		var ta = document.createElement('textarea');
		ta.value = text;
		ta.setAttribute('readonly', '');
		ta.style.position = 'absolute';
		ta.style.left = '-9999px';
		document.body.appendChild(ta);
		ta.select();
		try {
			document.execCommand('copy');
		} catch (e) {}
		document.body.removeChild(ta);
	}

	function init() {
		var links = document.querySelectorAll('.tp-postbox-copy-link');

		Array.prototype.forEach.call(links, function (link) {
			link.addEventListener('click', function (e) {
				e.preventDefault();

				var url = link.getAttribute('data-copy-url') || window.location.href;
				var icon = link.querySelector('i');

				var showDone = function () {
					link.classList.add('is-copied');
					if (icon) {
						icon.className = 'fa-solid fa-check';
					}
					window.setTimeout(function () {
						link.classList.remove('is-copied');
						if (icon) {
							icon.className = 'fa-solid fa-link';
						}
					}, 2000);
				};

				if (navigator.clipboard && navigator.clipboard.writeText) {
					navigator.clipboard.writeText(url).then(showDone, function () {
						fallbackCopy(url);
						showDone();
					});
				} else {
					fallbackCopy(url);
					showDone();
				}
			});
		});
	}

	if (document.readyState !== 'loading') {
		init();
	} else {
		document.addEventListener('DOMContentLoaded', init);
	}
})();
