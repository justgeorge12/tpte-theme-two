/**
 * Events archive — client-side Προσεχείς / Παλαιότερες / Όλες tab filter.
 *
 * Page-specific script for archive-tpte_event.php (hand-authored, enqueued
 * conditionally in functions.php on is_post_type_archive('tpte_event') — same
 * standalone pattern as phd-filter.js, kept out of the main bundle).
 *
 * Each .tp-event-filter-item column carries data-event-status ("upcoming"|"past")
 * and data-event-order (the start-date unix timestamp). Tabs toggle .is-hidden by
 * status; the Παλαιότερες tab re-orders past events most-recent-first via the CSS
 * `order` property (the grid is a Bootstrap flex .row). Degrades to showing all
 * events when JS is unavailable.
 *
 * @package tpte
 */
(function ($) {
	'use strict';

	function initEventFilter() {
		const $filters = $('.tp-event-filters');

		if (!$filters.length) {
			return;
		}

		const $buttons = $('.tp-event-filter-btn');
		const $items = $('.tp-event-filter-item');
		const $noResults = $('.tp-event-noresults');
		const $visibleCount = $('.js-event-visible');

		function applyFilter(filter) {
			let visible = 0;

			$items.each(function () {
				const $item = $(this);
				const status = $item.attr('data-event-status');
				const show = filter === 'all' || status === filter;

				$item.toggleClass('is-hidden', !show);

				// Most-recent-first for past events; source order otherwise.
				if (show && filter === 'past') {
					const order = parseInt($item.attr('data-event-order'), 10) || 0;
					$item.css('order', -order);
				} else {
					$item.css('order', '');
				}

				if (show) {
					visible++;
				}
			});

			$noResults.toggleClass('is-hidden', visible !== 0);
			$visibleCount.text(visible);
		}

		$buttons.on('click', function () {
			const $btn = $(this);
			$buttons.removeClass('active');
			$btn.addClass('active');
			applyFilter($btn.attr('data-filter') || 'all');
		});

		// Initial run with the default (active) tab.
		applyFilter($buttons.filter('.active').attr('data-filter') || 'upcoming');
	}

	$(document).ready(initEventFilter);
})(jQuery);
