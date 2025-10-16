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

<div class="row mx-auto mt-5 pt-3">
    <?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <a class="btn btnPadrao mx-auto" target="_blank" href="<?php echo wp_kses_post(get_field('linkWhatsapp')); ?>">
                <?php echo wp_kses_post(get_field('titulo_botao_orcamentos')); ?>
            </a>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_query(); ?>
</div>