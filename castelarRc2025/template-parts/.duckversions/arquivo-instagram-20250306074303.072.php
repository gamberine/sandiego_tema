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

<section class="gridBranco" id="instagram">

    <div class="container">
        <?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>

                <div class="row text-center mb-0">
                    <h2 class="tituloPrincipal corPrincipal mb-0"><?php echo wp_kses_post(get_field('titulo_sessao_instagram')); ?></h2>
                    <p class="corSecundaria"><?php echo wp_kses_post(get_field('texto_instagram')); ?></p>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
        <div class="row mt-3">
            <?php echo do_shortcode('[instagram-feed feed=1]'); ?>
        </div>

    </div>

</section>