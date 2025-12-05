<?php

/**
 * Section: contact
 * Repeater: cards (title, image)
 * Fields: cta_title, cta_text
 * Contact form: basic HTML (integrate plugin later)
 */
?>
<section class="diff container pt-0 pb-5 mb-5">

  <div class="row align-items-stretch flex-lg-wrap flex-xl-nowrap mt-0 mb-5">

    <div class="col-12 col-lg-12 col-xl-5 py-xl-0 d-flex align-items-center text-center h-auto">
      <div class="cta-card gap-4 mx-xl-4">
        <h2 class="mb-2"><?php echo esc_html(sd_field('contato_form_titulo', get_the_ID(), 'Quer conversar sobre os nossos serviços de administração?')); ?></h2>
        <h3 class="px-3"><?php echo esc_html(sd_field('contato_form_sub', get_the_ID(), 'Preencha seus dados que entraremos em contato.')); ?></h3>
      </div>
    </div>

    <!-- formulario de contato -->
    <div class="col-12 col-lg-12 col-xl-7 py-xl-0 d-flex align-items-center text-center h-auto">
      <?php echo do_shortcode('[contact-form-7 id="7772880" title="Formulario_de_contato"]'); ?>
    </div>
  </div>


  <div class="row mb-5 mt-0 px-5 pb-5 w-100">
    <a class="btn btn-accent mx-auto w-80" href="<?php echo esc_url(sd_field('contato_admin_url', get_the_ID(), '#')); ?>" target="_blank" rel="noopener noreferrer">Clique aqui para falar com a Administradora da Rede</a>
  </div>


</section>


<!-- <div class="col-12 col-lg-12 col-xl-7">
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
    </div> -->