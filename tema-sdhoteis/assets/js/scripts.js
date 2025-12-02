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
  var scroll = jQuery(window).scrollTop();
  var header = jQuery("header.site-header");

  // Mobile: sempre suspenso
  if (largura <= 1260) {
    header.addClass("menuSuspenso");
    return;
  }

  // Histerese para evitar flicker
  var limiarAtiva = 120; // ativa
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
          { breakpoint: 1260, settings: { slidesToShow: 1, slidesToScroll: 1 } },
        ],
      });
    }

    /* Experiência (página Hotéis) */
    if (jQuery(".sd-experiencia-carousel").length) {
      jQuery(".sd-experiencia-carousel").slick({
        dots: true,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 5000,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
          { breakpoint: 1260, settings: { slidesToShow: 2 } },
          { breakpoint: 768, settings: { slidesToShow: 1 } },
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

/* ============================================================
   SAN DIEGO HOTÉIS — NOVOS SCRIPTS (AUTOCOMPLETE + BANNERS + MODAL)
   (somente adição; nada acima foi alterado)
============================================================ */

document.addEventListener("DOMContentLoaded", () => {

  /* ============================================================
     1. CARREGA HOTÉIS DO JSON LOCAL
     ============================================================ */

  let sdHotels = [];

  fetch("/arquivos_publicos/sdhoteis/wp-content/themes/tema-sdhoteis/hotel_folders.json")
    .then(r => r.json())
    .then(data => {
      sdHotels = data.sort((a, b) => (a.PropertySequence ?? 999) - (b.PropertySequence ?? 999));
    })
    .catch(err => console.error("Erro ao carregar hotéis:", err));



  /* ============================================================
     2. AUTOCOMPLETE DO HOTEL - SEM CONFLITOS
     ============================================================ */

  const sdSearchForms = Array.from(document.querySelectorAll("form")).filter(form =>
    form.querySelector("#hotelInput") && form.querySelector("#hotelDropdown") && form.querySelector("#hotelCode")
  );

  const renderHotelItem = (list, dropdown, selectFn) => {
    if (!list || !list.length) {
      const empty = document.createElement("div");
      empty.className = "list-group-item list-group-item-action disabled";
      empty.textContent = "Nenhum hotel encontrado";
      dropdown.appendChild(empty);
      return;
    }

    list.forEach(h => {
      const item = document.createElement("div");
      item.className = "list-group-item list-group-item-action";
      item.style.cursor = "pointer";
      item.textContent = h.Property_Name;
      item.onclick = () => selectFn(h.Property_Name, h.Property_UID);
      dropdown.appendChild(item);
    });
  };

  sdSearchForms.forEach(form => {
    const input = form.querySelector("#hotelInput");
    const dropdown = form.querySelector("#hotelDropdown");
    const code = form.querySelector("#hotelCode");

    if (!input || !dropdown || !code) return;

    const selectHotel = (name, id) => {
      input.value = name;
      code.value = id;
      dropdown.style.display = "none";
    };

    const renderHotels = (term = "") => {
      dropdown.innerHTML = "";
      const t = term.trim().toLowerCase();
      let list = sdHotels;

      if (t !== "") {
        list = sdHotels.filter(h => (h.Property_Name || "").toLowerCase().includes(t));
      }

      dropdown.style.display = "block";

      const allItem = document.createElement("div");
      allItem.className = "list-group-item list-group-item-action";
      allItem.style.cursor = "pointer";
      allItem.textContent = "Todos os Hoteis";
      allItem.onclick = () => selectHotel("Todos os Hoteis", 0);
      dropdown.appendChild(allItem);

      renderHotelItem(list, dropdown, selectHotel);
    };

    input.addEventListener("focus", () => renderHotels(""));
    input.addEventListener("input", e => renderHotels(e.target.value));

    document.addEventListener("click", e => {
      if (!dropdown.contains(e.target) && e.target !== input) {
        dropdown.style.display = "none";
      }
    });
  });



  /* ============================================================
     3. CLICK EM TODA A ÁREA DO BLOCO — SHOW PICKER
     ============================================================ */

  window.sdFocarInput = function (wrapper) {
    const input = wrapper.querySelector("input");
    if (!input) return;
    if (input.showPicker) input.showPicker();
    else input.focus();
  };



  /* ============================================================
     4. FORMATAR DATA
     ============================================================ */

  window.sdFormat = function (d) {
    return new Date(d).toLocaleDateString("pt-BR").replace(/\//g, "");
  };



  /* ============================================================
     5. VALIDAR DATAS
     ============================================================ */

  window.sdDatasValidas = function (form) {
    if (!form.checkin.value || !form.checkout.value) {
      alert("Selecione datas válidas.");
      return false;
    }

    const ci = new Date(form.checkin.value);
    const co = new Date(form.checkout.value);

    if (co <= ci) {
      alert("O check-out deve ser posterior ao check-in.");
      return false;
    }
    return true;
  };



  /* ============================================================
     6. BUSCAR NO OMNIBEES
     ============================================================ */

  window.sdBuscar = function (formId = "sdSearchForm") {
    const form = document.getElementById(formId);
    if (!form) return;

    if (!sdDatasValidas(form)) return;

    const ci = sdFormat(form.checkin.value);
    const co = sdFormat(form.checkout.value);
    const ad = form.hospedes.value;
    const rooms = form.quartos.value;
    const hotelCode = form.querySelector("#hotelCode");
    const hotel = hotelCode && hotelCode.value ? hotelCode.value : 0;

    const url =
      `https://book.omnibees.com/chainresults?c=9627&q=${hotel}` +
      `&CheckIn=${ci}&CheckOut=${co}` +
      `&ad=${ad}&NRooms=${rooms}` +
      `&lang=pt-BR&currencyId=16&version=4`;

    window.open(url, "_blank");
  };



  /* ============================================================
     7. BANNERS — BACKGROUND RESPONSIVO (HOME / HOTÉIS / GERAL)
     ============================================================ */

  const banners = document.querySelectorAll(".slide-items.banner");

  function sdUpdateBanners() {
    banners.forEach(banner => {
      const mobileBg = banner.dataset.mobileBg;
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
   8. MODAL DE RESERVAS — INDEPENDENTE DO AUTOCOMPLETE
============================================================ */

(function () {

  const modal = document.getElementById("sdModalReserva");
  if (!modal) return;

  const backdrop = modal.querySelector(".sd-modal__backdrop");
  const closeTargets = modal.querySelectorAll("[data-sd-modal-close]");
  const triggers = document.querySelectorAll('[data-sd-modal-target="#sdModalReserva"]');

  const toggleScroll = lock => {
    document.body.classList.toggle("lock-scrolling", lock);
  };

  const syncForms = () => {
    const mainForm = document.getElementById("sdSearchForm");
    const modalForm = document.getElementById("sdModalForm");
    if (!mainForm || !modalForm) return;

    ["checkin", "checkout", "hospedes", "quartos"].forEach(field => {
      if (mainForm[field] && modalForm[field]) {
        modalForm[field].value = mainForm[field].value;
      }
    });

    const mainHotel = mainForm.querySelector("#hotelInput");
    const modalHotel = modalForm.querySelector("#hotelInput");
    const mainCode = mainForm.querySelector("#hotelCode");
    const modalCode = modalForm.querySelector("#hotelCode");

    if (mainHotel && modalHotel) modalHotel.value = mainHotel.value;
    if (mainCode && modalCode) modalCode.value = mainCode.value;
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
