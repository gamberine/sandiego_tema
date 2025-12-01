
<?php
/**
 * Section: Search Bar - conteudo reutilizavel
 * Simple visual component; hook your booking engine in 'sandiego/search_button_url' filter.
 */
?>

<?php
$sd_form_id = isset($sd_search_form_id) && $sd_search_form_id ? $sd_search_form_id : 'sdSearchForm';
?>

<section class="sandiego searchbar container">
  <form id="<?php echo esc_attr($sd_form_id); ?>" class="row my-2" onsubmit="return false;">

    <!-- DESTINO / HOTEL -->
<div class="gridItens col-12 col-md-6 col-lg-4 col-xl-3 position-relative">
  <label class="form-label">Destino ou Hotel</label>

  <!-- Ícone absoluto, não interfere na borda nem no bg -->
  <span class="hotel-icon position-absolute">
    <svg xmlns="http://www.w3.org/2000/svg"
         width="18"
         height="18"
         viewBox="0 0 24 24"
         fill="none"
         stroke="currentColor"
         stroke-width="2"
         stroke-linecap="round"
         stroke-linejoin="round">
      <path d="M12 21s-6-5.686-6-11a6 6 0 0 1 12 0c0 5.314-6 11-6 11z"></path>
      <circle cx="12" cy="10" r="2.5"></circle>
    </svg>
  </span>

  <input id="hotelInput"
         type="text"
         class="form-control ps-5"
         placeholder="Todos os Hotéis"
         autocomplete="off">

  <input type="hidden" id="hotelCode" value="0">

  <div id="hotelDropdown"
       class="list-group position-absolute w-100"
       style="display:none; top:100%; z-index:20; max-height:260px; overflow-y:auto;">
  </div>
</div>



<div class="gridItens col-12 col-md-6 col-lg-4 col-xl-2"
     onclick="sdFocarInput(this)">
  <label class="form-label">Check-in</label>
  <input type="date" class="form-control" name="checkin" required>
</div>

<div class="gridItens col-12 col-md-6 col-lg-4 col-xl-2"
     onclick="sdFocarInput(this)">
  <label class="form-label">Check-out</label>
  <input type="date" class="form-control" name="checkout" required>
</div>



    <div class="gridItens border-none col-12 col-md-6 col-lg-4 col-xl-2">
      <label class="form-label">Hóspedes</label>
      <select class="form-select" name="hospedes">
        <?php for($i=1;$i<=8;$i++): ?>
          <option value="<?php echo $i; ?>"><?php echo sprintf('%02d',$i); ?></option>
        <?php endfor; ?>
      </select>
    </div>

    <div class="gridItens col-12 col-md-6 col-lg-4 col-xl-2">
      <label class="form-label">Quartos</label>
      <input type="number" min="01" value="01" class="form-control" name="quartos">
    </div>

    <div class="gridItens border-none px-0 col-12 col-md-6 col-lg-4 col-xl-1 d-flex align-items-center">
      <button type="button" onclick="sdBuscar('<?php echo esc_js($sd_form_id); ?>')" class="btn btn-search w-100 d-flex justify-content-center align-items-center">
        <span class="visually-hidden">Buscar</span>
        <svg xmlns="https://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
      </button>
    </div>

  </form>
</section>
<script>
// ====== AUTOCOMPLETE ======

const hotels = <?php echo json_encode($hotel_folders ?? []); ?>;

const inp = document.getElementById("hotelInput");
const dropdown = document.getElementById("hotelDropdown");
const hotelCodeInput = document.getElementById("hotelCode");

inp.addEventListener("focus", () => renderHotels(""));
inp.addEventListener("input", e => renderHotels(e.target.value));

function renderHotels(term) {
  dropdown.innerHTML = "";

  let list = hotels;

  const termo = term.trim().toLowerCase();

  if (termo !== "") {
    list = hotels.filter(h => h.Property_Name.toLowerCase().includes(termo));
  }

  dropdown.style.display = "block";

  // Opção "Todos os Hotéis"
  const allItem = document.createElement("div");
  allItem.className = "list-group-item list-group-item-action";
  allItem.style.cursor = "pointer";
  allItem.textContent = "Todos os Hotéis";
  allItem.onclick = () => selectHotel("Todos os Hotéis", 0);
  dropdown.appendChild(allItem);

  // Opções individuais
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

// Fecha dropdown ao clicar fora
document.addEventListener("click", function(e) {
  if (!dropdown.contains(e.target) && e.target !== inp) {
    dropdown.style.display = "none";
  }
});

// ====== FORMATANDO DATAS ======
window.sdFormat = function(d) {
  const dt = new Date(d);
  return dt.toLocaleDateString("pt-BR").replace(/\//g, "");
};

// ====== VALIDANDO DATAS ======
function sdDatasValidas(form) {
  const { checkin, checkout } = form;

  if (!checkin.value || !checkout.value) {
    alert("Selecione datas válidas.");
    return false;
  }

  const ci = new Date(checkin.value);
  const co = new Date(checkout.value);

  if (co <= ci) {
    alert("O check-out deve ser posterior ao check-in.");
    return false;
  }

  return true;
}

// ====== BUSCAR ======
function sdBuscar(formId = "sdSearchForm") {
  const form = document.getElementById(formId);
  if (!form) return;

  if (!sdDatasValidas(form)) return;

  const ci = sdFormat(form.checkin.value);
  const co = sdFormat(form.checkout.value);
  const ad = form.hospedes.value;
  const rooms = form.quartos.value;
  const hotel = hotelCodeInput.value || 0;

  const url =
    `https://book.omnibees.com/chainresults?c=9627&q=${hotel}&CheckIn=${ci}&CheckOut=${co}` +
    `&ad=${ad}&NRooms=${rooms}&lang=pt-BR&currencyId=16&version=4`;

  window.open(url, "_blank");
}
</script>
