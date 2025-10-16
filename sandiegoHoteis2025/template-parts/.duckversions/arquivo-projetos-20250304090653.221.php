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

<section class="gridPrincipal" id="projetos">
  <div class="container text-center text-white">
    <div class="row d-flex justify-content-center align-items-center text-center mb-3">

      <?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <div class="headerSection col-12 mb-5 text-white">

            <h2 class="tituloPrincipal justify-content-center text-white">
              <i class="fa-solid fa-check"></i>
              <?php echo wp_kses_post(get_field('titulo_sessao_projetos')); ?>
            </h2>
            <?php echo wp_kses_post(get_field('texto_sessao_projetos')); ?>

          </div>

        <?php endwhile; ?>
      <?php endif; ?>

      <!-- ---------- loop clientes -->
      <div class="sliderImgTexto">
        <?php $args = array(
          'post_type' => 'projetos',
          'posts_per_page' => -1,
          'order' => 'date',
          'oderby' => 'DESC'
        );
        ?>
        <?php query_posts($args); ?>
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post();
          ?>

            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 text-center">

              <a href="<?php the_permalink(); ?>" class="">
                <div class="gridImgItems">
                  <img src="<?php echo wp_kses_post(get_field('imagem_projeto')); ?>" />
                </div>
                <h4 class="fontTitulos corPrincipal text-uppercase mt-4 fw-bold"><?php the_title(); ?></h4>
                <p class="corTextos"><?php echo wp_kses_post(get_field('texto_projeto')); ?></p>
              </a>

            </div>
          <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
      </div>


    </div>
  </div>
</section>