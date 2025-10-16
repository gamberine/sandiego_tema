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
<!-- <section class="gridBg" id="arquivo-servicos"> -->
<!-- <div class="row"> -->
<div class="sliderArqServicos sliderRowDuplo">
    <?php $args = array(
        'post_type' => 'nossos-servicos',
        'posts_per_page' => -1,
        'order' => 'DESC',
        'oderby' => 'date'
    );
    ?>
    <?php query_posts($args); ?>
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post();
        ?>
            <div class="gridItensServicos col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 text-center">
                <!-- <div class="gridItensServicos text-center"> -->
                <!-- <a href="< ?php the_permalink(); ?>" class=""> -->
                <div class="gridImgServicos">
                    <img src="<?php echo wp_kses_post(get_field('imagem_servico')); ?>" />
                </div>
                <h4 class="fontTitulos corPrincipal text-uppercase mt-3 fw-bold"><?php the_title(); ?></h4>
                <!-- <p class="corTextos">< ?php echo wp_kses_post(get_field('texto_servico')); ?></p> -->
                <!-- </a> -->
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_query(); ?>
</div>
<!-- </div> -->
<!-- </section> -->