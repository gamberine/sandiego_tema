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

<section class="gridBranco contatos pb-0 text-center" id="restaurantes">
  <!-- <div class="container"> -->
  <?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <h2 class="tituloPrincipal text-center corPrincipal">
        <?php echo wp_kses_post(get_field('titulo_sessao_contatos')); ?>
        <div class="serrilhadoTitulo"></div>
      </h2>

      <div class="w-100 d-flex flex-wrap flex-row mx-auto overflow-hidden">
        <div class="boxImgContatos col-xxl-4 col-xl-4 col-lg-12 col-md-12" style="background: url(<?php echo wp_kses_post(get_field('background_endereco_1')); ?>); background-size: cover !important;">
          <a target="_blank" href="<?php echo esc_url(get_field('link_endereco_1')); ?>"></a>

          <div class="textoContatos py-0">
            <a class="corTextos col-12" target="_blank" href="<?php echo esc_url(get_field('link_endereco_1')); ?>">
              <i class="fa-solid fa-location-dot">
                <h3><?php echo wp_kses_post(get_field('titulo_endereco_1')); ?></h3>
              </i>
              <?php echo wp_kses_post(get_field('endereco_1')); ?>
            </a>
          </div>
        </div>
        <div class="boxImgContatos col-xxl-4 col-xl-4 col-lg-12 col-md-12" style="background: url(<?php echo wp_kses_post(get_field('background_endereco_2')); ?>); background-size: cover !important;">
          <a target="_blank" href="<?php echo esc_url(get_field('link_endereco_2')); ?>"></a>

          <div class="textoContatos py-0">
            <a class="corTextos col-12" target="_blank" href="<?php echo esc_url(get_field('link_endereco_2')); ?>">
              <i class="fa-solid fa-location-dot">
                <h3><?php echo wp_kses_post(get_field('titulo_endereco_2')); ?></h3>
              </i>
              <?php echo wp_kses_post(get_field('endereco_2')); ?>
            </a>
          </div>
        </div>
        <div class="boxImgContatos col-xxl-4 col-xl-4 col-lg-12 col-md-12" style="background: url(<?php echo wp_kses_post(get_field('background_endereco_3')); ?>); background-size: cover !important;">
          <a target="_blank" href="<?php echo esc_url(get_field('link_endereco_3')); ?>"></a>

          <div class="textoContatos py-0">
            <a class="corTextos col-12" target="_blank" href="<?php echo esc_url(get_field('link_endereco_3')); ?>">
              <i class="fa-solid fa-location-dot">
                <h3><?php echo wp_kses_post(get_field('titulo_endereco_3')); ?></h3>
              </i>
              <?php echo wp_kses_post(get_field('endereco_3')); ?>
            </a>
          </div>
        </div>


      </div>

    <?php endwhile; ?>
  <?php endif; ?>
  <?php wp_reset_query(); ?>
  <!-- </div> -->
</section>