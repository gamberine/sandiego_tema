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
      <div class="sd-modal__search">
      <?php get_template_part('template-parts/sections/section-search'); ?>
    </div>
  </div>
</div>
</div>
<!-- 
<script>
(function () {
  const modal = document.getElementById("sdModalReserva");
  if (!modal) return;

  const backdrop = modal.querySelector(".sd-modal__backdrop");
  const dialog = modal.querySelector(".sd-modal__dialog");
  const closeTargets = modal.querySelectorAll("[data-sd-modal-close]");
  const triggers = document.querySelectorAll('[data-sd-modal-target="#sdModalReserva"]');

  const toggleScroll = (lock) => {
    document.body.classList.toggle("lock-scrolling", lock);
  };

  const syncForms = () => {
    const mainForm = document.getElementById("sdSearchForm");
    const modalForm = document.getElementById("sdModalForm");
    if (!mainForm || !modalForm) return;

    ["checkin", "checkout", "hospedes", "quartos"].forEach((field) => {
      if (mainForm[field] && modalForm[field]) {
        modalForm[field].value = mainForm[field].value;
      }
    });
  };

  const openModal = (evt) => {
    if (evt) evt.preventDefault();
    syncForms();
    modal.classList.add("is-open");
    modal.removeAttribute("aria-hidden");
    toggleScroll(true);
  };

  const closeModal = (evt) => {
    if (evt) evt.preventDefault();
    modal.classList.remove("is-open");
    modal.setAttribute("aria-hidden", "true");
    toggleScroll(false);
  };

  triggers.forEach((trigger) => trigger.addEventListener("click", openModal));
  closeTargets.forEach((btn) => btn.addEventListener("click", closeModal));

  modal.addEventListener("click", (evt) => {
    if (evt.target === modal || evt.target === backdrop) closeModal(evt);
  });

  document.addEventListener("keydown", (evt) => {
    if (evt.key === "Escape" && modal.classList.contains("is-open")) closeModal(evt);
  });
})();
</script> -->
