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

  <section class="gridBranco" id="sobre">
    <div class="container">
      <div class="row d-flex flex-row justify-content-center align-items-center">
        <div class="position-relative col-xl-4 col-lg-5 col-md-12 col-sm-12 col-12">
          <?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
              <div class="gridImg Sobre">
                <div class="imgFlat">
                  <img src="<?php echo wp_kses_post(get_field('imagem_sobre')); ?>" />
                </div>
                <!-- <div class="imgSobreDireita">
                                <img src="< ?php echo wp_kses_post(get_field('imagem_sobre_2')); ?>" />
                            </div>
                            <div class="imgSobreFixa">
                                <img src="< ?php echo wp_kses_post(get_field('imagem_sobre_fixa')); ?>" />
                                <img src="< ?php echo wp_kses_post(get_field('imagem_sobre_fixa_inf')); ?>" />
                            </div> -->
              </div>
        </div>

        <div class="text-start corTextos col-xl-8 col-lg-7 col-md-12 col-sm-12 col-12">
          <img class="imgChamada" src="<?php echo wp_kses_post(get_field('icone_sessao_sobre')); ?>" alt="<?php echo wp_kses_post(get_field('titulo_sessao_sobre')); ?>">

          <p class="textoChamada corSecundaria"><?php echo wp_kses_post(get_field('texto_chamada_sobre')); ?></p>

          <h2 class="tituloPrincipal corPrincipal"><?php echo wp_kses_post(get_field('titulo_sessao_sobre')); ?></h2>

          <?php echo wp_kses_post(get_field('texto_sessao_sobre')); ?>

        <?php endwhile; ?>
      <?php endif; ?>
        </div>

      </div>
    </div>
  </section>