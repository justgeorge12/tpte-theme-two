(function () {
    'use strict';

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
