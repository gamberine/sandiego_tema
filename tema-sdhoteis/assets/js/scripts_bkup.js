/*
 * San Diego Hotéis 2025
 * scripts.js – versão unificada
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
   BANNERS / SLICK
======================= */
jQuery(document).on("ready", function () {
  /* Mostrar dots só quando houver mais de um slide */
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
      dots: true,
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
        {
          breakpoint: 980,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ],
    });
  }

  /* Banner timeline */
  if (jQuery(".timeline-carousel").length) {
    controlaDots(jQuery(".timeline-carousel"));
    jQuery(".timeline-carousel").slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      infinite: true,
      arrows: false,
      dots: false,
      autoplay: true,
      autoplaySpeed: 6000,
      speed: 600,
      responsive: [
        {
          breakpoint: 1260,
          settings: { slidesToShow: 2 },
        },
        {
          breakpoint: 768,
          settings: { slidesToShow: 1 },
        },
      ],
    });
  }

  /* Banner timeline */
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
        {
          breakpoint: 1440,
          settings: { slidesToShow: 4 },
        },
        {
          breakpoint: 1260,
          settings: { slidesToShow: 2 },
        },
      ],
    });
  }

 
});

/* =======================
   MENU SUSPENSO (DESKTOP)
======================= */
function atualizarMenuSuspenso() {
  var largura = jQuery(window).width();
  var scroll = jQuery(window).scrollTop();

  if (largura <= 1260) {
    jQuery("header.site-header").addClass("menuSuspenso");
    return;
  }

  if (scroll >= 300) {
    jQuery("header.site-header").addClass("menuSuspenso");
  } else {
    jQuery("header.site-header").removeClass("menuSuspenso");
  }
}
jQuery(document).ready(atualizarMenuSuspenso);
jQuery(window).scroll(atualizarMenuSuspenso);
jQuery(window).resize(atualizarMenuSuspenso);

/* =======================
   sandiego.js (carrosséis + copiar)
======================= */
(function (jQuery) {
  jQuery(document).ready(function () {
    if (jQuery(".sd-carousel-hotels").length) {
      jQuery(".sd-carousel-hotels").slick({
        dots: true,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 6000,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
          {
            breakpoint: 1260,
            settings: { slidesToShow: 3, slidesToScroll: 3 },
          },
          { breakpoint: 992, settings: { slidesToShow: 2, slidesToScroll: 2 } },
          { breakpoint: 576, settings: { slidesToShow: 1, slidesToScroll: 1 } },
        ],
      });
    }

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

  function doCopy(text) {
    if (navigator.clipboard) {
      navigator.clipboard.writeText(text);
    }
  }

  jQuery(document).on("click", ".sd-copy", function (e) {
    e.preventDefault();
    var t = jQuery(this).data("copy") || jQuery(this).text();
    doCopy(t);
  });

  jQuery(document).on("click", "[data-copy-inline]", function (e) {
    e.preventDefault();
    var t = jQuery(this).attr("data-copy-inline") || jQuery(this).text();
    doCopy(t);
  });
})(jQuery);

/* =======================
   MENU – SISTEMA OFICIAL (SEM CONFLITOS)
   Controla: primary-navigation, is-open, icons, menu-wrapper
======================= */
(function () {
  "use strict";

  function initPrimaryNav(nav) {
    var toggle = nav.querySelector("#primary-mobile-menu");
    var menuWrapper = nav.querySelector(".menu-wrapper");

    if (!toggle || !menuWrapper) return;

    var closeMenu = function () {
      nav.classList.remove("is-open");
      toggle.setAttribute("aria-expanded", "false");
    };

    toggle.addEventListener("click", function () {
      var isOpen = nav.classList.toggle("is-open");
      toggle.setAttribute("aria-expanded", isOpen ? "true" : "false");
    });

    window.addEventListener("resize", function () {
      if (window.innerWidth >= 1260) closeMenu();
    });
  }

  document.addEventListener("DOMContentLoaded", function () {
    var primaryNavigations = document.querySelectorAll(".primary-navigation");
    primaryNavigations.forEach(initPrimaryNav);
  });
})();
