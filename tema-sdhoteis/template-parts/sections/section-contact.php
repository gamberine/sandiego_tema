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
    <a class="btn btn-accent mx-auto px-5" href="<?php echo esc_url(sd_field('contato_admin_url', get_the_ID(), '#')); ?>" target="_blank" rel="noopener noreferrer">
      Clique aqui para falar com a Administradora da Rede</a>
  </div>


</section>