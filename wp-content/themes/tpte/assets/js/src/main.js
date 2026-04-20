/**
 * TPTE Theme - Main JavaScript
 *
 * This file is the entry point for all custom theme JavaScript.
 * It will be bundled and minified for production.
 *
 * @package tpte
 */

(function ($) {
	'use strict';

	const windowOn = $(window);

	/**
	 * PreLoader
	 */
	windowOn.on('load', function () {
		$('#loading').fadeOut(500);
	});

	/**
	 * Mobile menu (offcanvas)
	 *
	 * Uses the WordPress-rendered `#mobile-menu` markup inside `.tp-main-menu-mobile`
	 * and adds dropdown toggle behavior for parents with children.
	 */
	function initMobileMenu() {
		const $mobileMenu = $('#mobile-menu');

		if (!$mobileMenu.length) {
			return;
		}

		$mobileMenu.find('li.menu-item-has-children').each(function () {
			const $li = $(this);
			const $link = $li.children('a').first();
			const $submenu = $li.children('ul');

			if (!$submenu.length) {
				return;
			}

			$li.addClass('has-submenu');
			$submenu.hide();

			const $toggleBtn = $('<button/>', {
				type: 'button',
				class: 'mobile-submenu-toggle',
				'aria-expanded': 'false',
			});

			$link.after($toggleBtn);

			function toggleSubmenu(e) {
				e.preventDefault();

				const isOpen = $li.hasClass('is-open');

				// Optional accordion behavior: close siblings when opening a new one
				if (!isOpen) {
					$li
						.siblings('.is-open')
						.removeClass('is-open')
						.children('ul')
						.slideUp(200)
						.attr('aria-hidden', 'true')
						.prevAll('.mobile-submenu-toggle')
						.attr('aria-expanded', 'false');
				}

				$li.toggleClass('is-open', !isOpen);
				$submenu.stop(true, true).slideToggle(200);
				$submenu.attr('aria-hidden', isOpen ? 'true' : 'false');
				$toggleBtn.attr('aria-expanded', (!isOpen).toString());
			}

			$toggleBtn.on('click', toggleSubmenu);

			// On mobile, first tap on the parent link just toggles
			$link.on('click', function (e) {
				if (window.matchMedia('(max-width: 1199px)').matches) {
					toggleSubmenu(e);
				}
			});
		});
	}

	/**
	 * Sticky Header
	 */
	function initStickyHeader() {
		windowOn.on('scroll', function () {
			const scroll = $(window).scrollTop();
			if (scroll < 200) {
				$('#header-sticky').removeClass('tp-header-sticky');
			} else {
				$('#header-sticky').addClass('tp-header-sticky');
			}
		});
	}

	/**
	 * Back to Top
	 */
	function initBackToTop() {
		const btn = $('#back_to_top');
		const btnWrapper = $('.back-to-top-wrapper');

		windowOn.scroll(function () {
			if (windowOn.scrollTop() > 300) {
				btnWrapper.addClass('back-to-top-btn-show');
			} else {
				btnWrapper.removeClass('back-to-top-btn-show');
			}
		});

		btn.on('click', function (e) {
			e.preventDefault();
			$('html, body').animate({ scrollTop: 0 }, '300');
		});
	}

	/**
	 * Common utilities
	 */
	function initCommon() {
		// Background image from data attribute
		$('[data-background]').each(function () {
			$(this).css('background-image', 'url(' + $(this).attr('data-background') + ')');
		});

		// Width from data attribute
		$('[data-width]').each(function () {
			$(this).css('width', $(this).attr('data-width'));
		});

		// Background color from data attribute
		$('[data-bg-color]').each(function () {
			$(this).css('background-color', $(this).attr('data-bg-color'));
		});

		// Text color from data attribute
		$('[data-text-color]').each(function () {
			$(this).css('color', $(this).attr('data-text-color'));
		});
	}

	/**
	 * Offcanvas menu
	 */
	function initOffcanvas() {
		$('.offcanvas-open-btn').on('click', function () {
			$('.offcanvas__area').addClass('offcanvas-opened');
			$('.body-overlay').addClass('opened');
		});
		$('.offcanvas-close-btn').on('click', function () {
			$('.offcanvas__area').removeClass('offcanvas-opened');
			$('.body-overlay').removeClass('opened');
		});
		$('.body-overlay').on('click', function () {
			$('.offcanvas__area').removeClass('offcanvas-opened');
			$('.body-overlay').removeClass('opened');
		});
	}

	/**
	 * Search area
	 */
	function initSearch() {
		$('.tp-search-open-btn').on('click', function () {
			$('.tp-search-area').addClass('opened');
			$('.body-overlay').addClass('opened');
		});
		$('.tp-search-close-btn').on('click', function () {
			$('.tp-search-area').removeClass('opened');
			$('.body-overlay').removeClass('opened');
		});
	}

	/**
	 * Body overlay close
	 */
	function initBodyOverlay() {
		$('.body-overlay').on('click', function () {
			$('.offcanvas__area').removeClass('offcanvas-opened');
			$('.tp-search-area').removeClass('opened');
			$('.cartmini__area').removeClass('cartmini-opened');
			$('.body-overlay').removeClass('opened');
		});
	}

	/**
	 * Nice Select initialization
	 */
	function initNiceSelect() {
		if ($.fn.niceSelect) {
			$('select').niceSelect();
			$('.tpd-select select').niceSelect();
		}
	}

	/**
	 * Slider initialization - Home hero
	 */
	function initHeroSlider() {
		if (typeof Swiper !== 'undefined' && $('.tp-slider-active').length) {
			new Swiper('.tp-slider-active', {
				slidesPerView: 1,
				effect: 'fade',
				loop: true,
				autoplay: {
					delay: 10000,
				},
				pagination: {
					el: '.tp-program-dot',
					clickable: true,
				},
			});
		}
	}

	/**
	 * Program slider
	 */
	function initProgramSlider() {
		if (typeof Swiper !== 'undefined' && $('.tp-program-active').length) {
			new Swiper('.tp-program-active', {
				slidesPerView: 3,
				spaceBetween: 30,
				loop: true,
				pagination: {
					el: '.tp-program-dot',
					clickable: true,
				},
				breakpoints: {
					1200: { slidesPerView: 3 },
					992: { slidesPerView: 3 },
					768: { slidesPerView: 2 },
					576: { slidesPerView: 1 },
					0: { slidesPerView: 1 },
				},
			});
		}
	}

	/**
	 * Testimonial slider
	 */
	function initTestimonialSlider() {
		if (typeof Swiper !== 'undefined' && $('.tp-testimonial-active').length) {
			new Swiper('.tp-testimonial-active', {
				slidesPerView: 1,
				spaceBetween: 10,
				loop: true,
				navigation: {
					nextEl: '.tp-testimonial-next',
					prevEl: '.tp-testimonial-prev',
				},
				autoplay: {
					delay: 2000,
				},
			});
		}
	}

	/**
	 * Brand slider
	 */
	function initBrandSlider() {
		if (typeof Swiper !== 'undefined' && $('.tp-brand-active').length) {
			new Swiper('.tp-brand-active', {
				slidesPerView: 6,
				spaceBetween: 30,
				loop: true,
				autoplay: {
					delay: 3500,
				},
				breakpoints: {
					1200: { slidesPerView: 6 },
					992: { slidesPerView: 5 },
					768: { slidesPerView: 4 },
					576: { slidesPerView: 3 },
					0: { slidesPerView: 2 },
				},
			});
		}
	}

	/**
	 * Instagram slider
	 */
	function initInstagramSlider() {
		if (typeof Swiper !== 'undefined' && $('.tp-instagram-active').length) {
			new Swiper('.tp-instagram-active', {
				slidesPerView: 5,
				spaceBetween: 10,
				loop: true,
				autoplay: {
					delay: 3500,
				},
				breakpoints: {
					1200: { slidesPerView: 5 },
					992: { slidesPerView: 4 },
					768: { slidesPerView: 3 },
					576: { slidesPerView: 2 },
					0: { slidesPerView: 2 },
				},
			});
		}
	}

	/**
	 * MagnificPopup initialization
	 */
	function initMagnificPopup() {
		if ($.fn.magnificPopup) {
			$('.popup-image').magnificPopup({
				type: 'image',
				gallery: {
					enabled: true,
				},
			});

			$('.popup-video').magnificPopup({
				type: 'iframe',
			});
		}
	}

	/**
	 * WOW.js initialization
	 */
	function initWow() {
		if (typeof WOW !== 'undefined') {
			new WOW().init();
		}
	}

	/**
	 * PureCounter initialization
	 */
	function initPureCounter() {
		if (typeof PureCounter !== 'undefined') {
			new PureCounter();
			new PureCounter({
				filesizing: true,
				selector: '.filesizecount',
				pulse: 2,
			});
		}
	}

	/**
	 * Password toggle
	 */
	function initPasswordToggle() {
		if ($('.password-show-toggle').length > 0) {
			$('.password-show-toggle').each(function () {
				$(this).on('click', function () {
					const inputField = $(this).parent().find('input');
					if (inputField.attr('type') === 'password') {
						inputField.attr('type', 'text');
						$(this).children('.open-eye-icon').css({ display: 'block' });
						$(this).children('.close-eye-icon').css({ display: 'none' });
					} else {
						inputField.attr('type', 'password');
						$(this).children('.open-eye-icon').css({ display: 'none' });
						$(this).children('.close-eye-icon').css({ display: 'block' });
					}
				});
			});
		}
	}

	/**
	 * Parallax effects
	 */
	function initParallax() {
		if ($.fn.parallax) {
			if ($('.scene').length > 0) {
				$('.scene').parallax({
					scalarX: 5.0,
					scalarY: 5.0,
				});
			}
			if ($('.scene-y').length > 0) {
				$('.scene-y').parallax({
					scalarY: 5.0,
					scalarX: 0,
				});
			}
		}
	}

	/**
	 * FAQ accordion
	 */
	function initFaqAccordion() {
		document.querySelectorAll('.faq-expend').forEach((button) => {
			button.addEventListener('click', () => {
				const accordionItem = button.closest('.accordion-item');
				document.querySelectorAll('.accordion-item').forEach((item) => {
					item.classList.remove('expand');
				});
				accordionItem.classList.add('expand');
			});
		});
	}

	/**
	 * Initialize all functions on document ready
	 */
	$(document).ready(function () {
		initMobileMenu();
		initStickyHeader();
		initBackToTop();
		initCommon();
		initOffcanvas();
		initSearch();
		initBodyOverlay();
		initNiceSelect();
		initHeroSlider();
		initProgramSlider();
		initTestimonialSlider();
		initBrandSlider();
		initInstagramSlider();
		initMagnificPopup();
		initWow();
		initPureCounter();
		initPasswordToggle();
		initParallax();
		initFaqAccordion();
	});
})(jQuery);