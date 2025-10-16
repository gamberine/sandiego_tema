<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Tema_Dev_Gamb
 * @since Tema Dev-Gamb 1.0
 */

?>

<section class="gridCinza" id="contatos">
  <div class="container">

    <div class="row mb-0">
      <?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <div class="headerSection col-12 mb-5 text-center">

            <h2 class="tituloPrincipal justify-content-center">
              <i class="fa-solid fa-check"></i>
              <?php echo wp_kses_post(get_field('titulo_sessao_contatos')); ?>
            </h2>
            <?php echo wp_kses_post(get_field('texto_sessao_contatos')); ?>

          </div>

        <?php endwhile; ?>
      <?php endif; ?>


      <div class="col-xxl-6 col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12 d-flex justify-content-center mx-auto flex-column">

        <!-- <h3 class="titulo corPrincipal text-center mt-3 mb-5"><strong>< ?php echo wp_kses_post(get_field('titulo_formulario_contato')); ?></strong></h3> -->
        <?php echo do_shortcode('[contact-form-7 id="7772880" title="Formulario_de_contato"]'); ?>


      </div>
    </div>
  </div>
</section>