<?php
/**
 * Section: contact
 * Repeater: cards (title, image)
 * Fields: cta_title, cta_text
 * Contact form: basic HTML (integrate plugin later)
 */
 ?>
<section class="diff container pt-0 pb-5">

  <div class="row align-items-stretch flex-lg-wrap flex-xl-nowrap gap-5 my-5">
    <div class="col-12 col-lg-12 col-xl-5 py-xl-0 d-flex align-items-center text-center h-auto">
      <div class="cta-card gap-4">
        <h3 class="mb-2 font-title fw-semibold"><?php the_sub_field('cta_title');  ?></h3>
        <p class="mb-0 px-3"><?php the_sub_field('cta_text'); ?></p>
      </div>
    </div>

    <!-- formulario de contato -->
    <div class="col-12 col-lg-12 col-xl-7">
      <!-- < ?php echo do_shortcode('[contact-form-7 id="7772880" title="Formulario_de_contato"]'); ?> -->
      <form class="row primary-color gap-4 row-gap-4">
        <div class="col-12 border border-3 border-primary-color rounded my-0">
          <label class="form-label">Nome Completo</label>
          <input type="text" class="form-control">
        </div>
        <div class="col-12 border border-3 border-primary-color rounded my-0">
          <label class="form-label">Cidade</label>
          <input type="text" class="form-control">
        </div>
        <div class="col-12 border border-3 border-primary-color rounded my-0">
          <label class="form-label">E-mail</label>
          <input type="email" class="form-control">
        </div>
        <div class="col-12 border border-3 border-primary-color rounded my-0">
          <label class="form-label">Telefone</label>
          <input type="tel" class="form-control">
        </div>
        <button class="btn btn-primary">Enviar</button>
      </form>
    </div>
  </div>
</section>
