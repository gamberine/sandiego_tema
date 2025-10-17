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
<section class="gridBgSecundario" id="historia">
    <div class="container">
        <div class="row mb-0 text-center">
            <?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

                    <h2 class="title-primary primary mb-1"><?php echo wp_kses_post(get_field('titulo_sessao_historia')); ?></h2>
                    <span class="text-center text-color mb-0"><?php echo wp_kses_post(get_field('texto_sessao_historia')); ?></span>
                    <h3 class="title-primary font-title fw-bold primary mb-5"><?php echo wp_kses_post(get_field('titulo_secundario_sessao_historia')); ?></h3>

                <?php endwhile; ?>
            <?php endif; ?>

            <div class="row text-center">
                <div class="sliderHistoria">
                    <?php
                    $args = array(
                        'post_type' => 'nossa-historia',
                        'posts_per_page' => -1,
                        'order' => 'ASC',
                        'orderby' => 'title' /* Ordenação pelos títulos (anos) */
                    );
                    query_posts($args);
                    if (have_posts()) :
                        while (have_posts()) : the_post();
                    ?>
                            <div class="cardHistoria">
                                <div class="containerImgHistoria">
                                    <div class="gridImgHistoria">
                                        <img src="<?php echo wp_kses_post(get_field('imagem_historia')); ?>" alt="Imagem de <?php the_title(); ?>">
                                        <span class="hover-title"><?php echo wp_kses_post(get_field('ano_detalhe')); ?></span>
                                    </div>
                                </div>
                                <h2><?php the_title(); ?></h2>
                            </div>
                    <?php
                        endwhile;
                    endif;
                    wp_reset_query();
                    ?>
                </div>

            </div>

        </div>


</section>