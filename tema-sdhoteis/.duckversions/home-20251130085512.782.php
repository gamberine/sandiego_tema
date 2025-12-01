<?php
/* Template Name: Home SD */
get_header();
?>


  <?php if (have_rows('home_sections')): while (have_rows('home_sections')): the_row();
      if (get_row_layout() == 'search') get_template_part('template-parts/sections/section', 'search');
      if (get_row_layout() == 'services') get_template_part('template-parts/sections/section', 'services');
      if (get_row_layout() == 'numbers') get_template_part('template-parts/sections/section', 'numbers');
      if (get_row_layout() == 'differentials') get_template_part('template-parts/sections/section', 'differentials');
    endwhile;
  endif; ?>
  <section class="diff container pt-0 pb-5 mb-5">
    <div class="row align-items-stretch flex-lg-wrap flex-xl-nowrap mt-0 mb-5">

      <div class="col-12 col-lg-12 col-xl-5 py-xl-0 d-flex align-items-center text-center h-auto">
      <div class="cta-card gap-4 mx-xl-4">
        <h2 class="mb-2"><?php echo esc_html( sd_field('contato_form_titulo', get_the_ID(), 'Quer conversar sobre os nossos serviços de administração?') ); ?></h2>
        <h3 class="px-3"><?php echo esc_html( sd_field('contato_form_sub', get_the_ID(), 'Preencha seus dados que entraremos em contato.') ); ?></h3>
      </div>
    </div>

    <!-- formulario de contato -->

    <div class="col-12 col-lg-12 col-xl-7">
      <?php echo do_shortcode('[contact-form-7 id="7772880" title="Formulario_de_contato"]'); ?>
    </div>
    
    </div>
  </section>
</main>
<?php get_footer(); ?>