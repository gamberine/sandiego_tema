/* ============================================================
   SAN DIEGO HOTÉIS — scripts.js unificado e revisado
   Mantém todas as funções antigas e adiciona o autocomplete,
   modal de reservas, datepicker e banners responsivos.
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
     2. AUTOCOMPLETE DO HOTEL — SEM CONFLITOS
     ============================================================ */

  const sdInp = document.getElementById("hotelInput");
  const sdDropdown = document.getElementById("hotelDropdown");
  const sdHotelCode = document.getElementById("hotelCode");

  if (sdInp && sdDropdown && sdHotelCode) {

    sdInp.addEventListener("focus", () => sdRenderHotels(""));
    sdInp.addEventListener("input", e => sdRenderHotels(e.target.value));

    function sdRenderHotels(term) {
      sdDropdown.innerHTML = "";

      let list = sdHotels;
      const termo = term.trim().toLowerCase();

      if (termo !== "") {
        list = sdHotels.filter(h => h.Property_Name.toLowerCase().includes(termo));
      }

      sdDropdown.style.display = "block";

      const allItem = document.createElement("div");
      allItem.className = "list-group-item list-group-item-action";
      allItem.style.cursor = "pointer";
      allItem.textContent = "Todos os Hotéis";
      allItem.onclick = () => sdSelectHotel("Todos os Hotéis", 0);
      sdDropdown.appendChild(allItem);

      list.forEach(h => {
        const item = document.createElement("div");
        item.className = "list-group-item list-group-item-action";
        item.style.cursor = "pointer";
        item.textContent = h.Property_Name;
        item.onclick = () => sdSelectHotel(h.Property_Name, h.Property_UID);
        sdDropdown.appendChild(item);
      });
    }

    function sdSelectHotel(name, id) {
      sdInp.value = name;
      sdHotelCode.value = id;
      sdDropdown.style.display = "none";
    }

    document.addEventListener("click", e => {
      if (!sdDropdown.contains(e.target) && e.target !== sdInp) {
        sdDropdown.style.display = "none";
      }
    });
  }



  /* ============================================================
     3. CLICK EM TODA A ÁREA DO BLOCO — SHOW PICKER
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
    const ci = new Date(form.checkin.value);
    const co = new Date(form.checkout.value);

    if (!form.checkin.value || !form.checkout.value) {
      alert("Selecione datas válidas.");
      return false;
    }
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
    const form = document.getElementById(formId);
    if (!form) return;

    if (!sdDatasValidas(form)) return;

    const ci = sdFormat(form.checkin.value);
    const co = sdFormat(form.checkout.value);
    const ad = form.hospedes.value;
    const rooms = form.quartos.value;
    const hotel = sdHotelCode.value || 0;

    const url =
      `https://book.omnibees.com/chainresults?c=9627&q=${hotel}` +
      `&CheckIn=${ci}&CheckOut=${co}` +
      `&ad=${ad}&NRooms=${rooms}` +
      `&lang=pt-BR&currencyId=16&version=4`;

    window.open(url, "_blank");
  };



  /* ============================================================
     7. BANNERS — RESPONSIVO
     ============================================================ */

  const banners = document.querySelectorAll('.slide-items.banner');

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
  window.addEventListener('resize', sdUpdateBanners);



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
