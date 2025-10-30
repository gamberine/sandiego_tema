<?php
/**
 * Seção: Formulário de busca de reserva
 *
 * Formulário simples sem processamento real, apenas ilustrativo.
 */
?>
<section class="section-pad bg-white">
  <div class="container">
    <form class="row g-3 align-items-end justify-content-center">
      <div class="col-md-2">
        <label class="form-label">Check-in</label>
        <input type="date" class="form-control" name="checkin" />
      </div>
      <div class="col-md-2">
        <label class="form-label">Check-out</label>
        <input type="date" class="form-control" name="checkout" />
      </div>
      <div class="col-md-2">
        <label class="form-label">Hóspedes</label>
        <input type="number" min="1" value="2" class="form-control" name="hospedes" />
      </div>
      <div class="col-md-2">
        <label class="form-label">Quartos</label>
        <input type="number" min="1" value="1" class="form-control" name="quartos" />
      </div>
      <div class="col-auto">
        <button type="submit" class="sd-btn">Buscar</button>
      </div>
    </form>
  </div>
</section>
