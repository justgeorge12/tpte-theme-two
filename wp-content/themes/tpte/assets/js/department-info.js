(function () {
    'use strict';

    document.querySelectorAll('.tp-dept-info-text--collapsible').forEach(function (wrapper) {
        var collapseEl = wrapper.querySelector('.collapse');
        if (!collapseEl) return;

        collapseEl.addEventListener('shown.bs.collapse', function () {
            wrapper.classList.add('is-expanded');
        });

        collapseEl.addEventListener('hidden.bs.collapse', function () {
            wrapper.classList.remove('is-expanded');
        });
    });
})();
