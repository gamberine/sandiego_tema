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
<section class="gridBranco" id="parceiros">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <h2 class="title-primary primarypb-4"><?php echo wp_kses_post(get_field('titulo_sessao_parceiros')); ?></h2>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            </div>

            <div class="sliderParceiros">
                <?php
                $args = array(
                    'post_type'      => 'parceiros',
                    'posts_per_page' => -1,
                    'order'          => 'DESC'
                );
                query_posts($args);
                ?>
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <div>
                            <a target="_blank" href="<?php echo esc_url(get_field('link_parceiro')); ?>">
                                <div class="gridImgParceiros">
                                    <img src="<?php echo esc_url(get_field('imagem_parceiro')); ?>" alt="<?php the_title_attribute(); ?>" />
                                </div>
                            </a>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            </div>
        </div>
    </div>
</section>