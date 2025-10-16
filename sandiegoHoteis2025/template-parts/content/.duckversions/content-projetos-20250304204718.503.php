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


    <section class="gridBgFixedPost my-0" style="background-image: url(<?php echo wp_kses_post(get_field('imagem_destino')); ?>)">
        <h1 class="tituloPrincipal text-center text-white my-5 py-5"><?php the_title(); ?></h1>
    </section>
    <div class="gridCinza my-0 py-5">
        <div class="container my-5">
            <div class="row flex-xl-nowrap flex-lg-nowrap flex-md-wrap gap-3">
                <div class="imgDestinoSingle col-xl-4 col-lg-12 col-12">
                    <img src="<?php echo esc_url(get_field('imagem_destino')); ?>" />
                </div>
                <div class="col-xl-8 col-lg-12 col-12">
                    <p><?php echo wp_kses_post(get_field('texto_destino')); ?></p>



                    <!-- <p>< ?php echo the_content(); ?></p> -->
                </div>

            </div>
            <div class="row my-5">
                <?php get_template_part('template-parts/content/component-btn-consultor'); ?>
            </div>


        </div>
    </div>

    <?php get_template_part('template-parts/arquivo-destinos-perfil'); ?>
    <?php get_template_part('template-parts/arquivo-destinos-preferidos'); ?>

    <!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->