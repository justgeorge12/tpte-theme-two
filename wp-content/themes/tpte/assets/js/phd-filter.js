/**
 * PhD graduates table — live search + supervisor filter.
 *
 * Page-specific script for page-phd-programme.php (hand-authored, enqueued
 * conditionally in functions.php — same pattern as department-info.js). Kept
 * separate from the main bundle so it stays isolated.
 *
 * Filters .tp-phd-row rows by a free-text search (name / supervisor / thesis
 * title, stored in data-search) AND by the selected supervisor (data-supervisor).
 * Search is accent-insensitive so Greek can be typed without diacritics. Degrades
 * to a plain table when JS is unavailable. Bound with jQuery so it also fires from
 * the nice-select widget the theme renders over the supervisor <select>.
 *
 * @package tpte
 */
(function ($) {
	'use strict';

	function initPhdFilter() {
		const $filters = $('.tp-phd-filters');

		if (!$filters.length) {
			return;
		}

		const $search = $('.tp-phd-search');
		const $supervisor = $('.tp-phd-supervisor');
		const $rows = $('.tp-phd-row');
		const $noResults = $('.tp-phd-noresults');
		const $visibleCount = $('.js-phd-visible');

		// Lowercase + strip Greek/Latin diacritics for forgiving matching.
		function normalize(value) {
			return (value || '')
				.toString()
				.toLowerCase()
				.normalize('NFD')
				.replace(/\p{M}/gu, '');
		}

		// Pre-compute each row's normalized haystack once.
		$rows.each(function () {
			this._phdHaystack = normalize($(this).attr('data-search'));
		});

		function applyFilter() {
			const term = normalize($search.val()).trim();
			const supervisor = $supervisor.val() || 'all';
			let visible = 0;

			$rows.each(function () {
				const matchesText = !term || this._phdHaystack.indexOf(term) !== -1;
				const matchesSupervisor =
					supervisor === 'all' || $(this).attr('data-supervisor') === supervisor;
				const show = matchesText && matchesSupervisor;

				$(this).toggleClass('is-hidden', !show);

				if (show) {
					visible++;
				}
			});

			$noResults.toggleClass('is-hidden', visible !== 0);
			$visibleCount.text(visible);
		}

		$search.on('input', applyFilter);
		$supervisor.on('change', applyFilter);
		applyFilter();
	}

	$(document).ready(initPhdFilter);
})(jQuery);
