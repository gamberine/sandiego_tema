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
  <?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

      <section class="gridBranco" id="sobre">
        <div class="container">
          <div class="row d-flex flex-row justify-content-center align-items-flex-start gap-3">
            <div class="gridImgSobre col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12">
              <!-- <div class="imgFlat"> -->
              <img src="<?php echo wp_kses_post(get_field('imagem_sobre')); ?>" />
              <!-- </div> -->
            </div>

            <div class="text-xl-start text-lg-center corTextos col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12">
              <h2 class="tituloPrincipal corPrincipal">
                <i class="fa-regular fa-square-check"></i>
                <?php echo wp_kses_post(get_field('titulo_sessao_sobre')); ?>
              </h2>
              <?php echo wp_kses_post(get_field('texto_sessao_sobre')); ?>
            </div>

          </div>
        </div>
      </section>

    <?php endwhile; ?>
  <?php endif; ?>