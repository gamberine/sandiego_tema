/*
 * San Diego Hoteis 2025
 * scripts.js - versao unificada + busca de hoteis
 */

/* =======================
   LOADING
======================= */
jQuery(document).ready(function () {
  jQuery("#loading").show();
  jQuery(window).on("load", function () {
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

  if (largura <= 1260) {
    header.addClass("menuSuspenso");
    return;
  }

  var limiarAtiva    = 120;
  var limiarDesativa = 80;

  if (scroll >= limiarAtiva && !header.hasClass("menuSuspenso")) {
    header.addClass("menuSuspenso");
  } else if (scroll <= limiarDesativa && header.hasClass("menuSuspenso")) {
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
   sandiego.js (carrosseis)
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
          { breakpoint: 1260, settings: { slidesToShow: 3, slidesToScroll: 3 } },
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
})(jQuery);


/* ==========================================================
    MENU MOBILE FULLSCREEN - SISTEMA OFICIAL WP
========================================================== */
(function () {
  "use strict";

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

    document.addEventListener("keydown", function (event) {
      if (!wrapper.classList.contains(id + "-navigation-open")) return;

      var modal = document.querySelector("." + id + "-navigation");
      var selectors = "input, a, button";
      var elements = Array.prototype.slice.call(
        modal.querySelectorAll(selectors)
      );
      var lastEl = elements[elements.length - 1];
      var firstEl = elements[0];

      if (event.keyCode === 27) {
        event.preventDefault();
        wrapper.classList.remove(id + "-navigation-open", "lock-scrolling");
        mobileButton.setAttribute("aria-expanded", "false");
        mobileButton.focus();
      }

      var activeEl = document.activeElement;

      if (!event.shiftKey && event.keyCode === 9 && lastEl === activeEl) {
        event.preventDefault();
        firstEl.focus();
      }

      if (event.shiftKey && event.keyCode === 9 && firstEl === activeEl) {
        event.preventDefault();
        lastEl.focus();
      }
    });

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
   NOVOS SCRIPTS (AUTOCOMPLETE + BANNERS + MODAL)
============================================================ */




/* ============================================================
   MODAL DE RESERVAS
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


/* ============================================================
   BUSCA / AUTOCOMPLETE DE HOTEIS
============================================================ */
(function () {
  const state = {
    hotels: [],
    loading: null,
  };

  const config = window.sdHotelSearch || {};
  const hotelsEndpoint =
    config.endpoint ||
    "/wp-json/wp/v2/hoteis?per_page=100&_fields=id,link,title.rendered,acf,meta";
  const defaultHotelUrl = config.defaultUrl || "";

  const decodeHTML = str => {
    const el = document.createElement("div");
    el.innerHTML = str || "";
    return el.textContent || el.innerText || "";
  };

  const normalizeHotel = raw => {
    if (!raw) return null;
    const name = decodeHTML(raw.title && raw.title.rendered);
    const city = raw.acf && raw.acf.hotel_cidade ? raw.acf.hotel_cidade : "";
    const bairro = raw.acf && raw.acf.hotel_bairro ? raw.acf.hotel_bairro : "";
    const urlFromMeta =
      (raw.acf && raw.acf.hotel_url_reserva) ||
      (raw.meta && raw.meta.hotel_url_reserva);

    return {
      id: raw.id,
      name: name || "Hotel",
      city,
      bairro,
      url: urlFromMeta || raw.link || "",
      label: [name, city || bairro].filter(Boolean).join(" • ") || name,
    };
  };

  const loadHotels = async () => {
    if (state.loading) return state.loading;
    state.loading = fetch(hotelsEndpoint, { credentials: "same-origin" })
      .then(res => (res.ok ? res.json() : []))
      .then(data => {
        const list = Array.isArray(data)
          ? data.map(normalizeHotel).filter(Boolean)
          : [];
        state.hotels = list;
        return list;
      })
      .catch(err => {
        console.error("Falha ao carregar lista de hoteis", err);
        state.hotels = [];
        return [];
      });

    return state.loading;
  };

  const renderDropdown = (dropdown, hotels) => {
    dropdown.innerHTML = "";
    const items = hotels.length
      ? hotels
      : [{ id: 0, name: "Nenhum hotel encontrado", url: "", label: "Nenhum hotel encontrado", disabled: true }];

    items.slice(0, 10).forEach((hotel, idx) => {
      const btn = document.createElement("button");
      btn.type = "button";
      btn.className = "list-group-item list-group-item-action";
      btn.dataset.hotelId = hotel.id;
      btn.dataset.hotelUrl = hotel.url || "";
      btn.textContent = hotel.label || hotel.name;
      btn.disabled = !!hotel.disabled;
      btn.setAttribute("role", "option");
      btn.setAttribute("aria-selected", "false");
      dropdown.appendChild(btn);

      if (idx === 0 && hotel.id === 0) {
        btn.classList.add("fw-semibold");
      }
    });

    dropdown.style.display = "block";
  };

  const appendParams = (baseUrl, params) => {
    try {
      const url = new URL(baseUrl || window.location.href, window.location.origin);
      for (const [key, value] of params.entries()) {
        if (value) url.searchParams.set(key, value);
      }
      return url.toString();
    } catch (e) {
      return baseUrl || "";
    }
  };

  const wireForm = form => {
    const input = form.querySelector(".sd-hotel-input");
    const dropdown = form.querySelector(".sd-hotel-dropdown");
    const hiddenCode = form.querySelector(".sd-hotel-code");

    if (!input || !dropdown || !hiddenCode) return;

    const defaultOption = { id: 0, name: "Todos os hoteis", url: "", label: "Todos os hoteis" };
    if (defaultHotelUrl) {
      form.dataset.defaultHotelUrl = defaultHotelUrl;
    }

    const selectHotel = hotel => {
      const safeHotel = hotel || defaultOption;
      input.value = safeHotel.label || safeHotel.name;
      input.dataset.hotelId = safeHotel.id || "";
      input.dataset.hotelUrl = safeHotel.url || form.dataset.defaultHotelUrl || "";
      hiddenCode.value = safeHotel.id || 0;
      dropdown.style.display = "none";
    };

    const filterHotels = (hotels, term) => {
      if (!term) return hotels;
      const q = term.toLowerCase();
      return hotels.filter(hotel => {
        const hay = [hotel.name, hotel.city, hotel.bairro, hotel.label]
          .filter(Boolean)
          .join(" ")
          .toLowerCase();
        return hay.includes(q);
      });
    };

    const openDropdown = async () => {
      const hotels = await loadHotels();
      const filtered = filterHotels(hotels, input.value.trim());
      renderDropdown(dropdown, [defaultOption, ...filtered]);
    };

    input.addEventListener("focus", openDropdown);
    input.addEventListener("input", openDropdown);

    dropdown.addEventListener("click", evt => {
      const btn = evt.target.closest("[data-hotel-id]");
      if (!btn || btn.disabled) return;
      const hotelId = btn.dataset.hotelId;
      const selected =
        hotelId === "0"
          ? defaultOption
          : state.hotels.find(h => String(h.id) === String(hotelId));
      selectHotel(selected || defaultOption);
    });

    document.addEventListener("click", evt => {
      if (!form.contains(evt.target)) {
        dropdown.style.display = "none";
      }
    });
  };

  const init = () => {
    const forms = document.querySelectorAll("form[data-sd-form-id]");
    if (!forms.length) return;
    forms.forEach(wireForm);
    loadHotels();
  };

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }

  window.sdFocarInput = function (el) {
    if (!el) return;
    const target = el.querySelector("input, select");
    if (target) target.focus();
  };

  window.sdBuscar = function (formId) {
    const form = document.getElementById(formId);
    if (!form) return false;

    const input = form.querySelector(".sd-hotel-input");
    const hiddenCode = form.querySelector(".sd-hotel-code");
    const params = new URLSearchParams();

    const checkin = form.querySelector('[name="checkin"]');
    const checkout = form.querySelector('[name="checkout"]');
    const hospedes = form.querySelector('[name="hospedes"]');
    const quartos = form.querySelector('[name="quartos"]');

    if (checkin && checkin.value) params.set("checkin", checkin.value);
    if (checkout && checkout.value) params.set("checkout", checkout.value);
    if (hospedes && hospedes.value) params.set("adults", hospedes.value);
    if (quartos && quartos.value) params.set("rooms", quartos.value);

    const selectedHotel =
      (input && input.dataset.hotelId && state.hotels.find(h => String(h.id) === String(input.dataset.hotelId))) ||
      (hiddenCode && hiddenCode.value && state.hotels.find(h => String(h.id) === String(hiddenCode.value)));

    const baseUrl =
      (selectedHotel && selectedHotel.url) ||
      (input && input.dataset.hotelUrl) ||
      form.dataset.defaultHotelUrl ||
      form.getAttribute("action") ||
      "";

    const finalUrl = appendParams(baseUrl || window.location.href, params);
    if (finalUrl) {
      window.location.href = finalUrl;
    }

    return false;
  };
})();
