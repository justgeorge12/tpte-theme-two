/**
 * Header live search — command palette (⌘K-style modal), hybrid data.
 *
 * The header search button opens a centered modal (.tp-search-area.tp-cmdk, see
 * header.php) wired open/closed by the theme's main.js. Two data paths:
 *
 *  - STATIC (People + Pages): fetched once on first open from the
 *    tpte_search_static endpoint and filtered client-side, accent-insensitively
 *    (same normalize() approach as phd-filter.js) — instant.
 *  - DYNAMIC (Events, News, Announcements): these grow over time, so instead of
 *    shipping them to the browser we query the tpte_search_query endpoint per
 *    (debounced) keystroke and render the results when they return.
 *
 * Results from both paths are merged into one grouped, icon-labeled list in a
 * fixed type order, in the scrolling body below the pinned input.
 *
 * This script also adds: auto-focus on open, Esc / backdrop-click close, and
 * arrow-key navigation. Open/close class toggling and the dim backdrop are
 * handled by main.js (reused, not duplicated).
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
		event:        { icon: 'fa-calendar-days', label: 'Εκδηλώσεις',  dynamic: true },
		news:         { icon: 'fa-newspaper',     label: 'Νέα',          dynamic: true },
		announcement: { icon: 'fa-bullhorn',      label: 'Ανακοινώσεις', dynamic: true },
		person:       { icon: 'fa-user',          label: 'Προσωπικό',    dynamic: false },
		page:         { icon: 'fa-file-lines',    label: 'Σελίδες',      dynamic: false }
	};

	var PER_TYPE = 8;       // cap results shown per group.
	var MIN_DYNAMIC = 2;    // min term length before hitting the server.
	var DEBOUNCE = 180;

	function initLiveSearch() {
		var $area = $('.tp-search-area');
		if (!$area.length || typeof tpte_live_search === 'undefined') {
			return;
		}

		var $input = $area.find('.search-input');
		var $results = $area.find('.tp-search-results');

		var staticIndex = null;   // People + Pages, fetched once.
		var loadingStatic = false;
		var reqSeq = 0;           // guards against out-of-order dynamic responses.
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

		function fetchStaticIndex() {
			if (staticIndex || loadingStatic) {
				return;
			}
			loadingStatic = true;
			$.ajax({
				url: tpte_live_search.ajax_url,
				method: 'GET',
				dataType: 'json',
				data: { action: 'tpte_search_static', nonce: tpte_live_search.nonce }
			}).done(function (response) {
				if (response && response.success && Array.isArray(response.data)) {
					staticIndex = response.data;
					staticIndex.forEach(function (item) { item._h = normalize(item.haystack); });
					runSearch(); // in case the user already typed while loading.
				}
			}).always(function () {
				loadingStatic = false;
			});
		}

		// Build the grouped markup. dynamicItems === null means "still loading".
		function render(staticMatches, dynamicItems) {
			var dynamicPending = (dynamicItems === null);
			var html = '';
			var total = 0;

			Object.keys(TYPES).forEach(function (type) {
				var meta = TYPES[type];
				var list;

				if (meta.dynamic) {
					if (dynamicPending) {
						return; // rendered behind the loader until results arrive.
					}
					list = dynamicItems.filter(function (i) { return i.type === type; }).slice(0, PER_TYPE);
				} else {
					list = staticMatches.filter(function (i) { return i.type === type; }).slice(0, PER_TYPE);
				}

				if (!list.length) {
					return;
				}
				total += list.length;

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

			if (dynamicPending) {
				// Show static groups (if any) with a loader for the dynamic part.
				html = '<div class="tp-search-loading">Αναζήτηση…</div>' + html;
			} else if (total === 0) {
				html = '<div class="tp-search-noresults">Δεν βρέθηκαν αποτελέσματα</div>';
			}

			$results.html(html).addClass('is-visible');
			// Highlight the first result so Enter has a sensible default target.
			$results.find('.tp-search-result a').first().addClass('is-active');
		}

		function runSearch() {
			if (!staticIndex && !loadingStatic) {
				fetchStaticIndex();
			}

			var raw = $input.val().trim();
			var term = normalize(raw);

			if (!term) {
				$results.empty().removeClass('is-visible');
				return;
			}

			var staticMatches = staticIndex
				? staticIndex.filter(function (i) { return i._h.indexOf(term) !== -1; })
				: [];

			// Too short for a server query → static only, no dynamic groups.
			if (raw.length < MIN_DYNAMIC) {
				render(staticMatches, []);
				return;
			}

			// Render static immediately, dynamic shows a loader until it returns.
			render(staticMatches, null);

			var seq = ++reqSeq;
			$.ajax({
				url: tpte_live_search.ajax_url,
				method: 'GET',
				dataType: 'json',
				data: { action: 'tpte_search_query', nonce: tpte_live_search.nonce, q: raw }
			}).done(function (response) {
				if (seq !== reqSeq) {
					return; // a newer keystroke superseded this request.
				}
				var dyn = (response && response.success && Array.isArray(response.data)) ? response.data : [];
				render(staticMatches, dyn);
			}).fail(function () {
				if (seq === reqSeq) {
					render(staticMatches, []); // degrade to static-only on error.
				}
			});
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
		// prefetch the static index and move focus into the input once visible.
		$('.tp-search-open-btn').on('click', function () {
			fetchStaticIndex();
			setTimeout(function () { $input.trigger('focus'); }, 60);
		});
		$input.on('focus', fetchStaticIndex);

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
			debounceId = setTimeout(runSearch, DEBOUNCE);
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
		// to the native search.php page.
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
