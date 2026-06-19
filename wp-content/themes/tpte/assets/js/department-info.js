(function () {
    'use strict';

    // ---- Mission cards sticky stack (About page) -------------------------------
    // Applies a subtle scale + fade to each card as the next one slides up over
    // it. CSS handles the sticky positioning and peek offsets.
    var stack = document.querySelector('.tp-mission-stack');
    if (stack) {
        var cards = Array.prototype.slice.call(stack.querySelectorAll('.tp-mission-stack-card'));
        if (cards.length > 1) {
            // Mirror the collapsible expand state onto the card so CSS can break
            // it out of the sticky stack while the text is fully visible.
            cards.forEach(function (card) {
                var collapsible = card.querySelector('.tp-dept-info-text--collapsible');
                if (!collapsible) return;
                var mo = new MutationObserver(function () {
                    card.classList.toggle(
                        'is-stack-expanded',
                        collapsible.classList.contains('is-expanded')
                    );
                });
                mo.observe(collapsible, { attributes: true, attributeFilter: ['class'] });
            });

            var ticking = false;
            var updateStack = function () {
                // Effect is desktop-only; CSS disables sticky below 992px anyway.
                if (window.innerWidth < 992) {
                    cards.forEach(function (c) {
                        c.style.transform = '';
                        c.style.opacity = '';
                    });
                    return;
                }
                for (var i = 0; i < cards.length; i++) {
                    var current = cards[i];
                    var next = cards[i + 1];
                    if (!next || current.classList.contains('is-stack-expanded')) {
                        current.style.transform = '';
                        current.style.opacity = '';
                        continue;
                    }
                    var currentRect = current.getBoundingClientRect();
                    var nextRect = next.getBoundingClientRect();
                    // Visual gap between the two card tops. Shrinks from
                    // currentRect.height+gutter (fully apart) to 0 (fully covered).
                    var distance = nextRect.top - currentRect.top;
                    var progress = 1 - distance / Math.max(currentRect.height, 1);
                    if (progress < 0) progress = 0;
                    if (progress > 1) progress = 1;
                    var scale = 1 - progress * 0.05;
                    var opacity = 1 - progress * 0.2;
                    current.style.transform = 'scale(' + scale.toFixed(4) + ')';
                    current.style.opacity = opacity.toFixed(4);
                }
            };
            var onScroll = function () {
                if (ticking) return;
                ticking = true;
                requestAnimationFrame(function () {
                    updateStack();
                    ticking = false;
                });
            };
            window.addEventListener('scroll', onScroll, { passive: true });
            window.addEventListener('resize', onScroll);
            updateStack();
        }
    }

    // ---- Collapsible text blocks ---------------------------------------------
    document.querySelectorAll('.tp-dept-info-text--collapsible').forEach(function (wrapper) {
        var inner = wrapper.querySelector('.tp-dept-info-text-inner');
        var toggle = wrapper.querySelector('.tp-dept-info-toggle');
        if (!inner || !toggle) return;

        toggle.setAttribute('aria-expanded', 'false');

        toggle.addEventListener('click', function (e) {
            e.preventDefault();
            var isExpanded = wrapper.classList.contains('is-expanded');

            if (isExpanded) {
                // Collapse: from scrollHeight down to CSS default max-height.
                inner.style.maxHeight = inner.scrollHeight + 'px';
                // Force reflow so the browser picks up the explicit starting value.
                void inner.offsetHeight;
                requestAnimationFrame(function () {
                    inner.style.maxHeight = '';
                    wrapper.classList.remove('is-expanded');
                    toggle.setAttribute('aria-expanded', 'false');
                });
            } else {
                // Expand: animate to scrollHeight, then release to 'none' so content can grow.
                inner.style.maxHeight = inner.scrollHeight + 'px';
                wrapper.classList.add('is-expanded');
                toggle.setAttribute('aria-expanded', 'true');

                var onEnd = function (evt) {
                    if (evt.propertyName !== 'max-height') return;
                    inner.removeEventListener('transitionend', onEnd);
                    if (wrapper.classList.contains('is-expanded')) {
                        inner.style.maxHeight = 'none';
                    }
                };
                inner.addEventListener('transitionend', onEnd);
            }
        });
    });
})();
