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

    <section class="gridBranco mb-lg-0 pb-lg-0" id="atuacao" style="background: url(<?php echo wp_kses_post(get_field('background_sessao_atuacao')); ?>); background-size: cover;">
      <div class="full-max-width mx-lg-0 px-lg-0 text-center corSecundariaHover">
        <div class="row d-flex flex-row justify-content-around align-items-center  mb-0">

          <div class="headerSection col-12 mb-0 mx-lg-0 px-lg-0">

            <h2 class="tituloPrincipal mb-0">
              <?php echo wp_kses_post(get_field('titulo_sessao_atuacao')); ?>
              <div class="serrilhadoTitulo"></div>
            </h2>
            <!-- <p class="textoChamada corTextos">
                            < ?php echo wp_kses_post(get_field('texto_sessao_menu')); ?>
                        </p> -->

          </div>

        <?php endwhile; ?>
      <?php endif; ?>


      <div class="sliderImg4x2Texto">
        <?php $args = array(
          'post_type' => 'nossa-atuacao',
          'posts_per_page' => -1,
          'order' => 'date',
          'oderby' => 'DESC'
        );
        ?>
        <?php query_posts($args); ?>
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post();
          ?>

            <div class="col-xxl-2 col-xl-2 col-lg-1 col-md-6 col-sm-12 col-12 text-center">

              <!-- <a href="< ?php the_permalink(); ?>"> -->
              <div class="gridImgItems">
                <img src="<?php echo wp_kses_post(get_field('imagem_atuacao')); ?>" />
              </div>
              <div class="boxTextos corTextos">
                <h4 class="fontTitulos text-uppercase mt-3 mb-0 fw-bold"><?php the_title(); ?>
                  <p><?php echo wp_kses_post(get_field('texto_atuacao')); ?></p>
                </h4>
              </div>

              <!-- </a> -->

            </div>
          <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
      </div>




        </div>


      </div>
    </section>