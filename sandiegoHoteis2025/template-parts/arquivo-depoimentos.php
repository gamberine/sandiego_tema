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

<section class="gridCinza" id="depoimentos">
    <div class="container">

        <div class="row">
            <div class="col-12 text-center">
                <?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>

                        <h2 class="tituloPrincipal corPrincipal pb-4"><?php echo wp_kses_post(get_field('titulo_sessao_depoimentos')); ?></h2>

                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="sliderImgTexto depoimentos">
                <?php $args = array(
                    'post_type' => 'depoimentos',
                    'posts_per_page' => -1,
                    'order' => 'date',
                    'oderby' => 'DESC'
                );
                ?>
                <?php query_posts($args); ?>
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post();
                    ?>

                        <div class="gridDepoimentos col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 text-center">
                            <div class="estrelas"></div>
                            <p class="corTextos"><?php echo wp_kses_post(get_field('texto_depoimento')); ?></p>
                            <h4 class="fontTitulos corPrincipal text-uppercase mt-4 fw-bold"><?php the_title(); ?>
                                <!-- <span><i class="fa-solid fa-quote-right"></i></span> -->
                            </h4>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            </div>


        </div>
    </div>
</section>