/**
 * Header live search — command palette (⌘K-style modal).
 *
 * The header search button opens a centered modal (.tp-search-area.tp-cmdk, see
 * header.php) wired open/closed by the theme's main.js. On first open it fetches
 * a prebuilt JSON index of every content type (Events, News, Announcements,
 * People, Pages) once via admin-ajax, then filters it entirely client-side on
 * each (debounced) keystroke. Results render grouped by type with a Font Awesome
 * icon, in a single scrolling column below the pinned input. Matching is
 * accent-insensitive so Greek can be typed without diacritics (same normalize()
 * approach as phd-filter.js).
 *
 * This script adds: index fetch + filtering, auto-focus on open, Esc /
 * backdrop-click close, and arrow-key navigation. Open/close class toggling and
 * the dim backdrop are handled by main.js (reused, not duplicated).
 *
 * Enter activates the highlighted (or first) result; it does not submit to the
 * native search.php page (which would also list the event/announcement CPTs).
 *
 * Standalone script, enqueued sitewide in functions.php (not part of main.js).
 *
 * @package tpte
 */
(function ($) {
	'use strict';

	// type → icon + human label (Greek). Order here = render order of groups.
	var TYPES = {
		event:        { icon: 'fa-calendar-days', label: 'Εκδηλώσεις' },
		news:         { icon: 'fa-newspaper',     label: 'Νέα' },
		announcement: { icon: 'fa-bullhorn',      label: 'Ανακοινώσεις' },
		person:       { icon: 'fa-user',          label: 'Προσωπικό' },
		page:         { icon: 'fa-file-lines',    label: 'Σελίδες' }
	};

	var PER_TYPE = 8; // cap results shown per group.

	function initLiveSearch() {
		var $area = $('.tp-search-area');
		if (!$area.length || typeof tpte_live_search === 'undefined') {
			return;
		}

		var $input = $area.find('.search-input');
		var $results = $area.find('.tp-search-results');

		var index = null;     // cached index once fetched.
		var loading = false;
		var debounceId = null;

		// Lowercase + strip Greek/Latin diacritics for forgiving matching.
		function normalize(value) {
			return (value || '')
				.toString()
				.toLowerCase()
				.normalize('NFD')
				.replace(/\p{M}/gu, '');
		}

		function escapeHtml(str) {
			return (str || '').replace(/[&<>"']/g, function (c) {
				return {
					'&': '&amp;',
					'<': '&lt;',
					'>': '&gt;',
					'"': '&quot;',
					"'": '&#39;'
				}[c];
			});
		}

		function fetchIndex() {
			if (index || loading) {
				return;
			}
			loading = true;
			$.ajax({
				url: tpte_live_search.ajax_url,
				method: 'GET',
				dataType: 'json',
				data: {
					action: 'tpte_search_index',
					nonce: tpte_live_search.nonce
				}
			}).done(function (response) {
				if (response && response.success && Array.isArray(response.data)) {
					index = response.data;
					// Pre-compute normalized haystacks once.
					index.forEach(function (item) {
						item._h = normalize(item.haystack);
					});
					render(); // in case the user already typed while loading.
				}
			}).always(function () {
				loading = false;
			});
		}

		function render() {
			var term = normalize($input.val()).trim();

			if (!term) {
				$results.empty().removeClass('is-visible');
				return;
			}

			if (!index) {
				$results.html('<div class="tp-search-loading">Φόρτωση…</div>').addClass('is-visible');
				return;
			}

			// Bucket matches by type, capped per type.
			var buckets = {};
			Object.keys(TYPES).forEach(function (t) { buckets[t] = []; });

			for (var i = 0; i < index.length; i++) {
				var item = index[i];
				if (!buckets[item.type] || buckets[item.type].length >= PER_TYPE) {
					continue;
				}
				if (item._h.indexOf(term) !== -1) {
					buckets[item.type].push(item);
				}
			}

			var html = '';
			var total = 0;

			Object.keys(TYPES).forEach(function (type) {
				var list = buckets[type];
				if (!list.length) {
					return;
				}
				total += list.length;
				var meta = TYPES[type];
				html += '<div class="tp-search-group">';
				html += '<div class="tp-search-group-title"><i class="fa-solid ' + meta.icon + '"></i> ' + meta.label + '</div>';
				html += '<ul class="tp-search-group-list">';
				list.forEach(function (item) {
					html += '<li class="tp-search-result">';
					html += '<a href="' + escapeHtml(item.url) + '">';
					html += '<span class="tp-search-result-icon"><i class="fa-solid ' + meta.icon + '"></i></span>';
					html += '<span class="tp-search-result-text">';
					html += '<span class="tp-search-result-title">' + escapeHtml(item.title) + '</span>';
					if (item.subtitle) {
						html += '<span class="tp-search-result-sub">' + escapeHtml(item.subtitle) + '</span>';
					}
					html += '</span></a></li>';
				});
				html += '</ul></div>';
			});

			if (!total) {
				html = '<div class="tp-search-noresults">Δεν βρέθηκαν αποτελέσματα</div>';
			}

			$results.html(html).addClass('is-visible');
			// Highlight the first result so Enter has a sensible default target.
			$results.find('.tp-search-result a').first().addClass('is-active');
		}

		// Keyboard navigation across all visible result links.
		function moveSelection(dir) {
			var $links = $results.find('.tp-search-result a');
			if (!$links.length) {
				return;
			}
			var idx = $links.index($links.filter('.is-active'));
			idx += dir;
			if (idx < 0) {
				idx = $links.length - 1;
			} else if (idx >= $links.length) {
				idx = 0;
			}
			$links.removeClass('is-active');
			$links.eq(idx).addClass('is-active');
		}

		function closeModal() {
			$area.removeClass('opened');
			$('.body-overlay').removeClass('opened');
		}

		// Open: main.js adds .opened to .tp-search-area + .body-overlay. We just
		// fetch the index and move focus into the input once it's visible.
		$('.tp-search-open-btn').on('click', function () {
			fetchIndex();
			setTimeout(function () { $input.trigger('focus'); }, 60);
		});
		$input.on('focus', fetchIndex);

		// Close on backdrop click (the transparent .tp-search-area outside the
		// panel — the dim .body-overlay sits beneath it so it never gets the click).
		$area.on('click', function (e) {
			if (e.target === $area[0]) {
				closeModal();
			}
		});

		// Close on Esc.
		$(document).on('keydown', function (e) {
			if (e.key === 'Escape' && $area.hasClass('opened')) {
				closeModal();
			}
		});

		$input.on('input', function () {
			clearTimeout(debounceId);
			debounceId = setTimeout(render, 180);
		});

		$input.on('keydown', function (e) {
			if (e.key === 'ArrowDown') {
				e.preventDefault();
				moveSelection(1);
			} else if (e.key === 'ArrowUp') {
				e.preventDefault();
				moveSelection(-1);
			}
		});

		// Enter activates the highlighted (or first) result instead of submitting
		// to the native search.php page, which would also list the event /
		// announcement post types. If there are no results, do nothing.
		$area.find('form').on('submit', function (e) {
			e.preventDefault();
			var $target = $results.find('.tp-search-result a.is-active');
			if (!$target.length) {
				$target = $results.find('.tp-search-result a').first();
			}
			if ($target.length) {
				window.location.href = $target.attr('href');
			}
		});
	}

	$(document).ready(initLiveSearch);
})(jQuery);
