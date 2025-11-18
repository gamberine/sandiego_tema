(function () {
  'use strict';

  function initPrimaryNav(nav) {
    var toggle = nav.querySelector('#primary-mobile-menu');
    var menuWrapper = nav.querySelector('.menu-wrapper');

    if (!toggle || !menuWrapper) {
      return;
    }

    var closeMenu = function () {
      nav.classList.remove('is-open');
      toggle.setAttribute('aria-expanded', 'false');
    };

    toggle.addEventListener('click', function () {
      var isOpen = nav.classList.toggle('is-open');
      toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    });

    window.addEventListener('resize', function () {
      if (window.innerWidth >= 1260) {
        closeMenu();
      }
    });
  }

  document.addEventListener('DOMContentLoaded', function () {
    var primaryNavigations = document.querySelectorAll('.primary-navigation');
    primaryNavigations.forEach(initPrimaryNav);
  });
})();
