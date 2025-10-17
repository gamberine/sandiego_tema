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


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


  <section class="gridBgFixedPost my-0" style="background-image: url(<?php echo wp_kses_post(get_field('imagem_projeto')); ?>)">
    <h1 class="title-primary text-center text-white my-5 py-5"><?php the_title(); ?></h1>
  </section>
  <section class="gridCinza my-0 my-sm-5 py-lg-5 py-md-2 py-sm-5">
    <div class="container my-lg-5 my-md-2">
      <div class="row flex-xl-nowrap flex-lg-nowrap flex-md-wrap gap-3">
        <div>
          <img class="imgPostagem" src="<?php echo esc_url(get_field('imagem_projeto')); ?>" />
          <div>
            <p class="tituloAjuste text-lg-start text-md-center corPrincipal"><?php the_title(); ?></p>
            <?php echo wp_kses_post(get_field('texto_projeto')); ?>
          </div>
        </div>
      </div>
      <div class="row">
        <?php echo wp_kses_post(get_field('galeria_projeto')); ?>
      </div>
    </div>
  </section>

  <!-- < ?php get_template_part('template-parts/arquivo-destinos-perfil'); ?>
    < ?php get_template_part('template-parts/arquivo-destinos-preferidos'); ?> -->

  <!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->