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

<section class="gridPrincipal" id="institucional">

    <div class="container">
        <?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>

                <div class="row text-center mb-0">
                    <h2 class="title-primary"><?php echo wp_kses_post(get_field('titulo_sessao_institucional')); ?></h2>
                </div>

                <div class="row mb-5 pb-5">
                    <!-- gamberine - remover formatação vinda do ACF -->
                    <h4 class="secondary text-center mt-0 mb-4"><?php echo wp_kses_post(strip_tags(get_field('endereco'))); ?></h4>

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3750.6220175768067!2d-43.938489223884886!3d-19.94032693863205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa699d0649ad863%3A0x78d297decda787dc!2sX-Tudo%20Sandu%C3%ADches!5e0!3m2!1spt-BR!2sbr!4v1713238807430!5m2!1spt-BR!2sbr" width="60vw" height="300" class="iframeMaps" style="border:0; margin: 0 auto;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>




    </div>

</section>