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

    <section class="gridSecundarioHover eventos" id="eventos">
      <div class="container text-white">
        <div class="row mb-0 d-flex flex-row justify-content-around align-items-center">
          <div class="gridEsq col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <h2 class="tituloComum text-white text-end"><?php echo wp_kses_post(get_field('titulo_sessao_eventos')); ?></h2>
            <div class="serrilhadoHorizontalCorPrincipal"></div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>


      <div class="sliderRowSimples col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 gap-3">

        <?php $args = array(
          'post_type' => 'eventos',
          'posts_per_page' => -1,
          'order' => 'date',
          'oderby' => 'DESC'
        );
        ?>
        <?php query_posts($args); ?>
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post();
          ?>

            <div class="gridImgFlutuante">
              <h5 class="d-flex bg-primary-coloralign-items-center justify-content-center text-center text-uppercase my-4"><?php the_title(); ?></h5>

              <!-- <a href="< ?php the_permalink(); ?>"> -->
              <a style="cursor: grab !important;">
                <img src="<?php echo wp_kses_post(get_field('imagem_evento')); ?>" />
              </a>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
      </div>

        </div>
      </div>
    </section>