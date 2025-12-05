/*
 * San Diego HotÃ©is 2025
 * scripts.js â€“ versÃ£o unificada + menu mobile oficial FULLSCREEN
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
   sandiego.js (carrossÃ©is + copiar)
======================= */
(function (jQuery) {
  jQuery(document).ready(function () {
    /* HotÃ©is */
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
    MENU MOBILE FULLSCREEN â€“ SISTEMA OFICIAL WP
    (substitui qualquer lÃ³gica anterior, zero conflitos)
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

    /* Fecha ao clicar em links de Ã¢ncora */
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

/* ============================================================
   SAN DIEGO HOTÃ‰IS â€” NOVOS SCRIPTS (AUTOCOMPLETE + BANNERS + MODAL)
   (somente adiÃ§Ã£o; nada acima foi alterado)
============================================================ */

document.addEventListener("DOMContentLoaded", () => {

  /* ============================================================
       /* ============================================================
     1. CARREGA HOTÉIS DO JSON LOCAL
     ============================================================ */

  let sdHotels = [];

  /* ============================================================
     2. AUTOCOMPLETE DO HOTEL – SEM CONFLITOS
     ============================================================ */

  const sdInitSearchBars = () => {
    const forms = document.querySelectorAll(".sandiego.searchbar form");

    forms.forEach(form => {
      const sdInp       = form.querySelector(".sd-hotel-input") || document.getElementById("hotelInput");
      const sdDropdown  = form.querySelector(".sd-hotel-dropdown") || document.getElementById("hotelDropdown");
      const sdHotelCode = form.querySelector(".sd-hotel-code") || document.getElementById("hotelCode");
      if (!sdInp || !sdDropdown || !sdHotelCode) return;

      const renderHotels = term => {
        sdDropdown.innerHTML = "";

        let list  = sdHotels;
        const t   = term.trim().toLowerCase();

        if (t !== "") {
          list = sdHotels.filter(h => h.Property_Name.toLowerCase().includes(t));
        }

        sdDropdown.style.display = "block";

        const allItem = document.createElement("div");
        allItem.className = "list-group-item list-group-item-action";
        allItem.style.cursor = "pointer";
        allItem.textContent = "Todos os Hotéis";
        allItem.onclick = () => selectHotel("Todos os Hotéis", 0);
        sdDropdown.appendChild(allItem);

        list.forEach(h => {
          const item = document.createElement("div");
          item.className = "list-group-item list-group-item-action";
          item.style.cursor = "pointer";
          item.textContent = h.Property_Name;
          item.onclick = () => selectHotel(h.Property_Name, h.Property_UID);
          sdDropdown.appendChild(item);
        });
      };

      const selectHotel = (name, id) => {
        sdInp.value       = name;
        sdHotelCode.value = id;
        sdDropdown.style.display = "none";
      };

      sdInp.addEventListener("focus", () => renderHotels(""));
      sdInp.addEventListener("input", e => renderHotels(e.target.value));

      document.addEventListener("click", e => {
        if (!sdDropdown.contains(e.target) && e.target !== sdInp) {
          sdDropdown.style.display = "none";
        }
      });
    });
  };

  fetch("/arquivos_publicos/sdhoteis/wp-content/themes/tema-sdhoteis/hotel_folders.json")
    .then(r => r.json())
    .then(data => {
      sdHotels = data.sort((a, b) => (a.PropertySequence ?? 999) - (b.PropertySequence ?? 999));
      sdInitSearchBars();
    })
    .catch(err => {
      console.error("Erro ao carregar hotéis:", err);
      sdInitSearchBars();
    });


3. CLICK EM TODA A ÃREA DO BLOCO â€” SHOW PICKER
     ============================================================ */

  window.sdFocarInput = function(wrapper) {
    const input = wrapper.querySelector("input");
    if (!input) return;
    if (input.showPicker) input.showPicker();
    else input.focus();
  };



  /* ============================================================
     4. FORMATAR DATA
     ============================================================ */

  window.sdFormat = function(d) {
    return new Date(d).toLocaleDateString("pt-BR").replace(/\//g, "");
  };



  /* ============================================================
     5. VALIDAR DATAS
     ============================================================ */

  window.sdDatasValidas = function(form) {
    const checkin  = form.querySelector("[name='checkin']");
    const checkout = form.querySelector("[name='checkout']");

    if (!checkin || !checkout || !checkin.value || !checkout.value) {
      alert("Selecione datas vlidas.");
      return false;
    }

    const ci = new Date(checkin.value);
    const co = new Date(checkout.value);

    if (co <= ci) {
      alert("O check-out deve ser posterior ao check-in.");
      return false;
    }
    return true;
  };



  /* ============================================================
     6. BUSCAR NO OMNIBEES
     ============================================================ */

  window.sdBuscar = function(formId = "sdSearchForm") {
    const form = document.getElementById(formId) || document.querySelector(orm[data-sd-form-id='']);
    if (!form) return;

    if (!sdDatasValidas(form)) return;

    const checkin  = form.querySelector("[name='checkin']");
    const checkout = form.querySelector("[name='checkout']");
    const hospedes = form.querySelector("[name='hospedes']");
    const quartos  = form.querySelector("[name='quartos']");
    const hotelCode = form.querySelector(".sd-hotel-code") || document.getElementById("hotelCode");

    const ci    = checkin ? sdFormat(checkin.value) : "";
    const co    = checkout ? sdFormat(checkout.value) : "";
    const ad    = hospedes ? hospedes.value : 1;
    const rooms = quartos ? quartos.value : 1;
    const hotel = hotelCode && hotelCode.value ? hotelCode.value : 0;

    const url =
      https://book.omnibees.com/chainresults?c=9627&q= +
      &CheckIn=&CheckOut= +
      &ad=&NRooms= +
      &lang=pt-BR&currencyId=16&version=4;

    window.open(url, "_blank");
  };



  /* ============================================================7. BANNERS â€” BACKGROUND RESPONSIVO (HOME / HOTÃ‰IS / GERAL)
     ============================================================ */

  const banners = document.querySelectorAll(".slide-items.banner");

  function sdUpdateBanners() {
    banners.forEach(banner => {
      const mobileBg  = banner.dataset.mobileBg;
      const desktopBg = banner.dataset.desktopBg;

      if (window.innerWidth <= 991 && mobileBg) {
        banner.style.background = mobileBg;
      } else if (desktopBg) {
        banner.style.background = desktopBg;
      }
    });
  }

  sdUpdateBanners();
  window.addEventListener("resize", sdUpdateBanners);

}); // DOMContentLoaded



/* ============================================================
   8. MODAL DE RESERVAS â€” INDEPENDENTE DO AUTOCOMPLETE
============================================================ */

(function () {

  const modal = document.getElementById("sdModalReserva");
  if (!modal) return;

  const backdrop     = modal.querySelector(".sd-modal__backdrop");
  const closeTargets = modal.querySelectorAll("[data-sd-modal-close]");
  const triggers     = document.querySelectorAll('[data-sd-modal-target="#sdModalReserva"]');

  const toggleScroll = lock => {
    document.body.classList.toggle("lock-scrolling", lock);
  };

  const syncForms = () => {
    const mainForm  = document.getElementById("sdSearchForm");
    const modalForm = document.getElementById("sdModalForm");
    if (!mainForm || !modalForm) return;

    ["checkin", "checkout", "hospedes", "quartos"].forEach(field => {
      if (mainForm[field] && modalForm[field]) {
        modalForm[field].value = mainForm[field].value;
      }
    });
  };

  const openModal = evt => {
    if (evt) evt.preventDefault();
    syncForms();
    modal.classList.add("is-open");
    modal.removeAttribute("aria-hidden");
    toggleScroll(true);
  };

  const closeModal = evt => {
    if (evt) evt.preventDefault();
    modal.classList.remove("is-open");
    modal.setAttribute("aria-hidden", "true");
    toggleScroll(false);
  };

  triggers.forEach(t => t.addEventListener("click", openModal));
  closeTargets.forEach(btn => btn.addEventListener("click", closeModal));

  modal.addEventListener("click", evt => {
    if (evt.target === modal || evt.target === backdrop) closeModal(evt);
  });

  document.addEventListener("keydown", evt => {
    if (evt.key === "Escape" && modal.classList.contains("is-open")) {
      closeModal(evt);
    }
  });

})();


