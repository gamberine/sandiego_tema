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
<div class="serrilhado"></div>

<?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>

    <section class="gridCinza pt-5" id="menu">

      <div class="container text-center corSecundariaHover">

        <div class="row">
          <div class="headerSection">

            <h2 class="tituloPrincipal mb-2">
              <?php echo wp_kses_post(get_field('titulo_sessao_menu')); ?>
              <div class="serrilhadoTitulo"></div>
            </h2>
            <?php echo wp_kses_post(get_field('texto_sessao_menu')); ?>
            <!-- <img src="< ?php echo wp_kses_post(get_field('icone_sessao_menu')); ?>" alt="< ?php echo wp_kses_post(get_field('titulo_sessao_menu')); ?>"> -->

          </div>
        <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_query(); ?>
        </div>

        <!-- ---------- loop categorias -->

        <div class="sliderImgTexto">
          <?php $args = array(
            'post_type' => 'menus',
            'posts_per_page' => -1,
            'order' => 'date',
            'oderby' => 'DESC'
          );
          ?>
          <?php query_posts($args); ?>
          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post();
            ?>

              <div class="boxImgMenu text-center">

                <!-- <a href="< ?php the_permalink(); ?>" class=""> -->
                <div class="gridImgItems">
                  <img src="<?php echo wp_kses_post(get_field('imagem_menu')); ?>" />
                </div>
                <div class="boxTitulosSlider text-white mt-4"><?php the_title(); ?></div>
                <!-- <p class="corTextos">< ?php echo wp_kses_post(get_field('texto_menu')); ?></p> -->
                <!-- </a> -->

              </div>
            <?php endwhile; ?>
          <?php endif; ?>
          <?php wp_reset_query(); ?>
        </div>
        <!-- ---------- loop categorias -->


      </div>
    </section>