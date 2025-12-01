<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Tema_Dev_Gamb
 * @since Tema Dev-Gamb 1.0
 */

?>

</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #content -->
<!-- <div class="faixasecondary"></div> -->

<?php get_template_part('template-parts/arquivo-footer'); ?>

<div class="footerDesenvolvedorParceiro">
  <span>
    <!-- Design/Manutenção: -->
    <?php bl_site_footer_se(); ?>
  </span>
  <!-- <span>Desenvolvimento:
    < ?php bl_site_footer_logo(); ?></span> -->
</div>

</div><!-- #page -->

<!-- < ?php get_template_part('sections/modal-reserva'); ?> -->

<?php get_template_part('template-parts/arquivo-modal-reserva'); ?>



<script>
document.addEventListener("DOMContentLoaded", () => {

// ======================================================
// 1. CARREGA HOTÉIS DO JSON LOCAL (FUNCIONA NA HORA)
// ======================================================

let hotelsLive = [];

fetch("/arquivos_publicos/sdhoteis/wp-content/themes/tema-sdhoteis/hotel_folders.json")
  .then(r => r.json())
  .then(data => {
    hotelsLive = data.sort((a, b) => (a.PropertySequence ?? 999) - (b.PropertySequence ?? 999));
  })
  .catch(err => console.error("Erro ao carregar hotéis:", err));


// ======================================================
// 2. AUTOCOMPLETE — FUNCIONA COM SEU HTML EXATO
// ======================================================

const inp = document.getElementById("hotelInput");
const dropdown = document.getElementById("hotelDropdown");
const hotelCodeInput = document.getElementById("hotelCode");

if (inp) {

  inp.addEventListener("focus", () => renderHotels(""));
  inp.addEventListener("input", e => renderHotels(e.target.value));

  function renderHotels(term) {
    dropdown.innerHTML = "";

    let list = hotelsLive;
    const termo = term.trim().toLowerCase();

    if (termo !== "") {
      list = hotelsLive.filter(h => h.Property_Name.toLowerCase().includes(termo));
    }

    dropdown.style.display = "block";

    // TODOS
    const all = document.createElement("div");
    all.className = "list-group-item list-group-item-action";
    all.style.cursor = "pointer";
    all.textContent = "Todos os Hotéis";
    all.onclick = () => selectHotel("Todos os Hotéis", 0);
    dropdown.appendChild(all);

    // UNIDADES
    list.forEach(h => {
      const item = document.createElement("div");
      item.className = "list-group-item list-group-item-action";
      item.style.cursor = "pointer";
      item.textContent = h.Property_Name;
      item.onclick = () => selectHotel(h.Property_Name, h.Property_UID);
      dropdown.appendChild(item);
    });
  }

  function selectHotel(name, id) {
    inp.value = name;
    hotelCodeInput.value = id;
    dropdown.style.display = "none";
  }

  document.addEventListener("click", e => {
    if (!dropdown.contains(e.target) && e.target !== inp) {
      dropdown.style.display = "none";
    }
  });

}


// ======================================================
// 3. CLICK EM TODA A ÁREA DO BLOCO — SHOW PICKER
// ======================================================

window.sdFocarInput = function(wrapper) {
  const input = wrapper.querySelector("input");
  if (!input) return;

  if (input.showPicker) input.showPicker();
  else input.focus();
};


// ======================================================
// 4. FORMATAR DATAS
// ======================================================

window.sdFormat = function(d) {
  return new Date(d).toLocaleDateString("pt-BR").replace(/\//g, "");
};


// ======================================================
// 5. VALIDAR DATAS
// ======================================================

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


// ======================================================
// 6. BUSCAR — URL FINAL PRONTA
// ======================================================

window.sdBuscar = function(formId = "sdSearchForm") {

  const form = document.getElementById(formId);
  if (!form) return;

  if (!sdDatasValidas(form)) return;

  const ci = sdFormat(form.checkin.value);
  const co = sdFormat(form.checkout.value);
  const ad = form.hospedes.value;
  const rooms = form.quartos.value;
  const hotel = hotelCodeInput.value || 0;

  const url =
    `https://book.omnibees.com/chainresults?c=9627&q=${hotel}` +
    `&CheckIn=${ci}&CheckOut=${co}&ad=${ad}&NRooms=${rooms}` +
    `&lang=pt-BR&currencyId=16&version=4`;

  window.open(url, "_blank");
};

}); // DOMContentLoaded
</script>



<script>
document.addEventListener('DOMContentLoaded', function() {
  const banners = document.querySelectorAll('.slide-items.banner');
  const updateBackgrounds = function() {
    banners.forEach(function(banner) {
      const mobileBg  = banner.dataset.mobileBg;
      const desktopBg = banner.dataset.desktopBg;

      if (window.innerWidth <= 991 && mobileBg) {
        banner.style.background = mobileBg;
      } else if (desktopBg) {
        banner.style.background = desktopBg;
      }
    });
  };

  updateBackgrounds();
  window.addEventListener('resize', updateBackgrounds);
});
</script>




<?php wp_footer(); ?>

</body>

</html>
