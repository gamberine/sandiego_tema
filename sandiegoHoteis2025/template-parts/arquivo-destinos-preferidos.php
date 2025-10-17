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


<section class="griBranco" id="destinos-preferidos">

    <div class="container text-center corPrincipal">

        <div class="row">
            <?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                        <h2 class="title-primary pb-5">
                            <?php echo wp_kses_post(get_field('titulo_sessao_destinos')); ?>
                        </h2>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>

                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                        <?php $args = array(
                            'post_type' => 'destinos',
                            'posts_per_page' => 1,
                            'order' => 'DESC',
                            'oderby' => 'date'
                        );
                        ?>
                        <?php query_posts($args); ?>
                        <?php if (have_posts()) : ?>
                            <?php while (have_posts()) : the_post();
                            ?>
                                <div class="sliderDestinos text-white">
                                    <?php $carousel_query = new WP_Query(array('post_type' => 'destinos', 'posts_per_page' => -1));
                                    ?>
                                    <?php if ($carousel_query->have_posts()) : ?>
                                        <?php while ($carousel_query->have_posts()) : $carousel_query->the_post(); ?>
                                            <div class="imgSlider" style="background-image: url(<?php echo wp_kses_post(get_field('imagem_destino')); ?>);">
                                                <a href="<?php the_permalink(); ?>">
                                                    <div class="gridTextosSlider">
                                                        <h1 class="font-title mb-0"><?php the_title(); ?></h1>
                                                        <p><?php echo wp_kses_post(get_field('texto_destino')); ?></p>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php endwhile; ?>
                                        <?php wp_reset_postdata(); ?>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php wp_reset_query(); ?>
                    </div>

                    <?php get_template_part('template-parts/content/component-btn-orcamento'); ?>

        </div>




    </div>
</section>