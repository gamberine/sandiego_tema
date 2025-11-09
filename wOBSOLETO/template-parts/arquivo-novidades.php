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

<section class="gridBgSecundario" id="novidades">
    <div class="container">

        <div class="row">
            <div class="col-12 text-center">
                <?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>

                        <h2 class="title-primary primarypb-4"><?php echo wp_kses_post(get_field('titulo_sessao_novidades')); ?></h2>

                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="sliderImgTexto">
                <?php $args = array(
                    'post_type' => 'menus',
                    'posts_per_page' => -1,
                    'order' => 'date',
                    'oderby' => 'DESC'
                );
                ?>
                <?php query_posts($args); ?>
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post();
                    ?>

                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 text-center">

                            <a href="<?php the_permalink(); ?>" class="">
                                <div class="gridImgItems">
                                    <img src="<?php echo wp_kses_post(get_field('imagem_menus')); ?>" />
                                </div>
                                <h4 class="font-title primarytext-uppercase mt-4 fw-bold"><?php the_title(); ?></h4>
                                <p class="text-color"><?php echo wp_kses_post(get_field('texto_menus')); ?></p>
                            </a>

                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            </div>


        </div>
        <!-- Exibir o componente apenas fora da home -->
        <?php if (!is_front_page() && !is_home()) : ?>
            <?php get_template_part('template-parts/content/component-btn-consultor'); ?>
        <?php endif; ?>
    </div>
</section>