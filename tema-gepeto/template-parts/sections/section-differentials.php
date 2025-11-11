
<?php
/**
 * Section: Differentials + Contact
 * Repeater: cards (title, image)
 * Fields: cta_title, cta_text
 * Contact form: basic HTML (integrate plugin later)
 */
?>
<section class="sandiego diff container py-5">
  <h2 class="title-xl text-center mb-4">Principais Diferenciais</h2>
  <div class="row g-4 mb-4">
    <?php if(have_rows('cards')): while(have_rows('cards')): the_row(); ?>
    <div class="col-12 col-sm-6 col-lg-3">
      <div class="mini">
        <h4 class="mb-2"><?php the_sub_field('title'); ?></h4>
        <?php $img = get_sub_field('image'); ?>
        <img src="<?php echo esc_url($img['url'] ?? get_stylesheet_directory_uri().'/assets/img/.home_05.jpg'); ?>" alt="">
      </div>
    </div>
    <?php endwhile; endif; ?>
  </div>

  <div class="row align-items-stretch flex-lg-wrap flex-xl-nowrap gap-5 bg-Rodape">
    <div class="col-12 col-lg-12 col-xl-5">
      <div class="cta-card h-100">
        <h3 class="h4 mb-2"><?php the_sub_field('cta_title');  ?></h3>
        <p class="mb-0"><?php the_sub_field('cta_text'); ?></p>
        <!-- <h3 class="h4 mb-2">< ?php the_sub_field('cta_title') ?: print 'Quer conversar sobre os nossos serviços de administração?'; ?></h3>
        <p class="mb-0">< ?php the_sub_field('cta_text') ?: print 'Preencha seus dados que entraremos em contato.'; ?></p> -->
      </div>
    </div>

    <!-- formulario de contato -->
    <div class="col-12 col-lg-12 col-xl-7">
      <form class="row gap-4 primary-color">
        <div class="col-12 border border-4 rounded my-0">
          <label class="form-label">Nome Completo</label>
          <input type="text" class="form-control">
        </div>
        <div class="col-12 border border-4 rounded my-0">
          <label class="form-label">Cidade</label>
          <input type="text" class="form-control">
        </div>
        <div class="col-12 border border-4 rounded my-0">
          <label class="form-label">E-mail</label>
          <input type="email" class="form-control">
        </div>
        <div class="col-12 border border-4 rounded my-0">
          <label class="form-label">Telefone</label>
          <input type="tel" class="form-control">
        </div>
        <button class="btn btn-search">Enviar</button>
        <!-- <div class="col-12 border border-4 rounded my-0">
        </div> -->
      </form>
    </div>
  </div>
</section>
