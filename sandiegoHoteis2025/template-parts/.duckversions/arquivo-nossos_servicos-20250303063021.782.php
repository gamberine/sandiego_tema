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

<section class="gridCinza" id="servicos">

  <div class="container text-center">
    <div class="row d-flex flex-row justify-content-center align-items-center text-center mb-3">

      <?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <div class="headerSection col-12 mb-0">

            <h2 class="tituloPrincipal justify-content-center">
              <i class="fa-solid fa-check"></i>
              <?php echo wp_kses_post(get_field('titulo_sessao_servicos')); ?>
            </h2>
            <?php echo wp_kses_post(get_field('texto_sessao_servicos')); ?>

          </div>

        <?php endwhile; ?>
      <?php endif; ?>
      <div class="servicos sliderBoxTexto">
        <?php $args = array(
          'post_type' => 'servico',
          'posts_per_page' => -1,
          'order' => 'date',
          'oderby' => 'DESC'
        );
        ?>
        <?php query_posts($args); ?>
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post();
          ?>

            <div class="gridImgComum text-center corTextos">
              <img src="<?php echo wp_kses_post(get_field('imagem_servico')); ?>" />
              <?php echo wp_kses_post(get_field('texto_servico')); ?>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
      </div>

    </div>
  </div>
</section>