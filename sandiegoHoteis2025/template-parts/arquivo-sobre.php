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
          <div class="row d-flex justify-content-center align-items-start gap-3">
            <div class="headerSection col-12 mb-0">
              <h2 class="title-primary d-flex justify-content-center flex-column text-center px-5 lh-1">
                <i class="fa-solid fa-check"></i>
                <?php echo wp_kses_post(get_field('titulo_sessao_sobre')); ?>
              </h2>
            </div>
            <div class="gridImgRounded col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12">
              <img src="<?php echo wp_kses_post(get_field('imagem_sobre')); ?>" />
            </div>

            <div class="text-xl-start text-lg-center text-color col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12">
              <!-- <h2 class="title-primary justify-content-xl-start justify-content-lg-center text-xl-start text-lg-center lh-1">
                <i class="fa-solid fa-check"></i>
                < ?php echo wp_kses_post(get_field('titulo_sessao_sobre')); ?>
              </h2> -->
              <?php echo wp_kses_post(get_field('texto_sessao_sobre')); ?>
            </div>

          </div>
        </div>
      </section>

    <?php endwhile; ?>
  <?php endif; ?>