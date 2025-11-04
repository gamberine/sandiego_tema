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

    <div class="container main-content">
        <div class="row boxPostagem">
            <div class="imgPost col-6">
                <img src="<?php echo esc_url(get_field('imagem_destino')); ?>" />
            </div>
            <div class="col-6">
                <h2 class="primary text-center">
                    <?php the_title(); ?>
                </h2>
                <p><?php echo wp_kses_post(get_field('texto_destino')); ?></p>
                <a href="<?php the_permalink(); ?>" class="">
                    link aqui
                </a>
                <p><?php echo the_content(); ?></p>
            </div>
        </div>


    </div>
    <!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->