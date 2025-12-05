<?php
$sd_search_form_id = 'sdModalForm';
?>

<div id="sdModalReserva" class="sd-modal" aria-hidden="true" role="dialog" aria-labelledby="sdModalReservaTitle">
  <div class="sd-modal__backdrop" data-sd-modal-close></div>

  <div class="sd-modal__dialog">
    <header class="sd-modal__header">
      <h5 id="sdModalReservaTitle" class="sd-modal__title mb-0">Pesquisar Reserva</h5>
      <button type="button" class="btnClose" aria-label="Fechar" data-sd-modal-close>&times;</button>
    </header>

    <div class="sd-modal__body">
      <!-- <div class="sd-modal__search"> -->
      <?php get_template_part('template-parts/sections/section-search'); ?>
    <!-- </div> -->
  </div>
</div>
</div>
