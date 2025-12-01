/*
 * San Diego Hotéis 2025
 * scripts.js – versão unificada + menu mobile oficial FULLSCREEN
 */

/* =======================
   LOADING
======================= */
jQuery(document).ready(function () {
  jQuery("#loading").show();
  jQuery(window).load(function () {
    jQuery("#loading").fadeOut("slow");
  });
});


/* =======================
   MENU SUSPENSO (DESKTOP)
======================= */

function atualizarMenuSuspenso() {
  var largura = jQuery(window).width();
  var scroll  = jQuery(window).scrollTop();
  var header  = jQuery("header.site-header");

  // Mobile: sempre suspenso
  if (largura <= 1260) {
    header.addClass("menuSuspenso");
    return;
  }

  // Histerese para evitar flicker
  var limiarAtiva    = 120; // ativa
  var limiarDesativa = 80;  // desativa

  if (scroll >= limiarAtiva && !header.hasClass("menuSuspenso")) {
    header.addClass("menuSuspenso");
  } 
  else if (scroll <= limiarDesativa && header.hasClass("menuSuspenso")) {
    header.removeClass("menuSuspenso");
  }
}

jQuery(document).ready(atualizarMenuSuspenso);
jQuery(window).on("scroll resize", atualizarMenuSuspenso);



/* =======================
   BANNERS / SLICK
======================= */
jQuery(document).on("ready", function () {
  function controlaDots(slider) {
    slider.on("init", function (event, slick) {
      if (slick.slideCount <= 1) {
        slider.find(".slick-dots").hide();
      } else {
        slider.find(".slick-dots").show();
      }
    });
  }

  /* Banner Principal */
  if (jQuery(".bannerPrincipal").length) {
    controlaDots(jQuery(".bannerPrincipal"));
    jQuery(".bannerPrincipal").slick({
      dots: false,
      arrows: false,
      autoplay: true,
      autoplaySpeed: 6000,
      slidesToShow: 1,
      speed: 500,
      slidesToScroll: 1,
    });
  }

  /* Banner Depoimentos */
  if (jQuery(".bannerDepoimentos").length) {
    controlaDots(jQuery(".bannerDepoimentos"));
    jQuery(".bannerDepoimentos").slick({
      dots: true,
      arrows: false,
      autoplay: true,
      autoplaySpeed: 6000,
      slidesToShow: 2,
      speed: 500,
      slidesToScroll: 2,
      responsive: [
        { breakpoint: 980, settings: { slidesToShow: 1, slidesToScroll: 1 } },
      ],
    });
  }

  /* Banner Timeline */
  if (jQuery(".timeline-carousel").length) {
    controlaDots(jQuery(".timeline-carousel"));
    jQuery(".timeline-carousel").slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      infinite: true,
      arrows: false,
      dots: true,
      autoplay: true,
      autoplaySpeed: 6000,
      speed: 600,
      responsive: [
        { breakpoint: 1440, settings: { slidesToShow: 4 } },
        { breakpoint: 1260, settings: { slidesToShow: 2 } },
        { breakpoint: 768, settings: { slidesToShow: 1 } },
      ],
    });
  }
});


/* =======================
   sandiego.js (carrosséis + copiar)
======================= */
(function (jQuery) {
  jQuery(document).ready(function () {
    /* Hotéis */
    if (jQuery(".sd-carousel-hotels").length) {
      jQuery(".sd-carousel-hotels").slick({
        dots: true,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 6000,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
          { breakpoint: 1260, settings: { slidesToShow: 3, slidesToScroll: 3 } },
          { breakpoint: 992, settings: { slidesToShow: 2, slidesToScroll: 2 } },
          { breakpoint: 576, settings: { slidesToShow: 1, slidesToScroll: 1 } },
        ],
      });
    }

    /* Quartos */
    if (jQuery(".sd-carousel-rooms").length) {
      jQuery(".sd-carousel-rooms").slick({
        dots: true,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 6000,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
          { breakpoint: 992, settings: { slidesToShow: 2 } },
          { breakpoint: 576, settings: { slidesToShow: 1 } },
        ],
      });
    }

    /* Depoimentos */
    if (jQuery(".sd-carousel-depo").length) {
      jQuery(".sd-carousel-depo").slick({
        dots: true,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 6000,
        slidesToShow: 2,
        slidesToScroll: 2,
        responsive: [
          { breakpoint: 992, settings: { slidesToShow: 1, slidesToScroll: 1 } },
        ],
      });
    }
  });
})(jQuery);

/* ==========================================================
    MENU MOBILE FULLSCREEN – SISTEMA OFICIAL WP
    (substitui qualquer lógica anterior, zero conflitos)
========================================================== */

(function () {
  "use strict";

  /* Sistema WordPress Oficial (tema-base gamb) */
  function navMenu(id) {
    var wrapper = document.body;
    var mobileButton = document.getElementById(id + "-mobile-menu");

    if (!mobileButton) return;

    mobileButton.onclick = function () {
      wrapper.classList.toggle(id + "-navigation-open");
      wrapper.classList.toggle("lock-scrolling");
      mobileButton.setAttribute(
        "aria-expanded",
        mobileButton.getAttribute("aria-expanded") === "true" ? "false" : "true"
      );
      mobileButton.focus();
    };

    /* Tab trapping e ESC */
    document.addEventListener("keydown", function (event) {
      if (!wrapper.classList.contains(id + "-navigation-open")) return;

      var modal = document.querySelector("." + id + "-navigation");
      var selectors = "input, a, button";
      var elements = Array.prototype.slice.call(
        modal.querySelectorAll(selectors)
      );
      var lastEl = elements[elements.length - 1];
      var firstEl = elements[0];

      if (event.keyCode === 27) { // ESC key
        event.preventDefault();
        wrapper.classList.remove(id + "-navigation-open", "lock-scrolling");
        mobileButton.setAttribute("aria-expanded", "false");
        mobileButton.focus();
      }

      var activeEl = document.activeElement;

      if (!event.shiftKey && event.keyCode === 9 && lastEl === activeEl) { // TAB key (end of menu, cycle to start)
        event.preventDefault();
        firstEl.focus();
      }

      if (event.shiftKey && event.keyCode === 9 && firstEl === activeEl) { // SHIFT + TAB key (start of menu, cycle to end)
        event.preventDefault();
        lastEl.focus();
      }
    });

    /* Fecha ao clicar em links de âncora */
    document.addEventListener("click", function (event) {
      if (event.target.hash && event.target.hash.includes("#")) {
        wrapper.classList.remove(id + "-navigation-open", "lock-scrolling");
        mobileButton.setAttribute("aria-expanded", "false");
      }
    });
  }

  window.addEventListener("load", function () {
    navMenu("primary");
  });
})();