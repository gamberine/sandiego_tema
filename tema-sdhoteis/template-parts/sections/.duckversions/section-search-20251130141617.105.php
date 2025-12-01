
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

    <div class="gridItens col-6 col-md-2">
      <label class="form-label">Check-in</label>
      <input type="date" class="form-control" name="checkin" required>
    </div>
    <div class="gridItens col-6 col-md-2">
      <label class="form-label">Check-out</label>
      <input type="date" class="form-control" name="checkout" required>
    </div>
    <div class="gridItens col-4 col-md-2">
      <label class="form-label">Hóspedes</label>
      <select class="form-select" name="hospedes">
        <?php for($i=1;$i<=8;$i++): ?>
          <option value="<?php echo $i; ?>"><?php echo sprintf('%02d',$i); ?></option>
        <?php endfor; ?>
      </select>
    </div>
    <div class="gridItens border-none col-4 col-md-2">
        <label class="form-label">Quartos</label>
        <input type="number" min="01" value="01" class="form-control" name="quartos" />
      </div>
    <div class="gridItens border-none px-0 col-4 col-md-1 d-flex align-items-flex-start h-100 my-2">
      <button type="button" onclick="sdBuscar('<?php echo esc_js($sd_form_id); ?>')" class="btn btn-search w-100 d-flex justify-content-center align-items-center">
        <span class="visually-hidden">Buscar</span>
        <svg xmlns="https://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
      </button>
    </div>
  </form>
</section>

<script>
window.sdFormat = window.sdFormat || function(d) {
  const dt = new Date(d);
  return dt.toLocaleDateString("pt-BR").replace(/\//g, "");
};

function sdDatasValidas(form) {
  const { checkin, checkout } = form;
  if (!checkin?.value || !checkout?.value) {
    alert("Selecione datas válidas.");
    return false;
  }

  const ciDate = new Date(checkin.value);
  const coDate = new Date(checkout.value);

  if (Number.isNaN(ciDate.getTime())) {
    alert("Informe um check-in válido.");
    return false;
  }

  if (Number.isNaN(coDate.getTime())) {
    alert("Informe um check-out válido.");
    return false;
  }

  if (coDate <= ciDate) {
    alert("O check-out deve ser posterior ao check-in.");
    return false;
  }

  return true;
}

function sdBuscar(formId = "sdSearchForm") {
  const form = document.getElementById(formId);
  if (!form) return;

  const checkin = form.checkin.value;
  const checkout = form.checkout.value;
  const hospedes = form.hospedes.value;
  const quartos = form.quartos.value;

  if (!sdDatasValidas(form)) return;

  const ci = sdFormat(checkin);
  const co = sdFormat(checkout);

  const url = `https://book.omnibees.com/chainresults?c=9627&CheckIn=${ci}&CheckOut=${co}&ad=${hospedes}&NRooms=${quartos}&lang=pt-BR&currencyId=16&version=4`;

  window.open(url, "_blank");
}
</script>
