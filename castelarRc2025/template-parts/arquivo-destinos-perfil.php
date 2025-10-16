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

<section class="gridCinza" id="perfil-viagens">
    <div class="container text-center">

        <div class="row">
            <div class="col-12 text-center">
                <?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>

                        <h2 class="tituloPrincipal corPrincipal pb-4"><?php echo wp_kses_post(get_field('titulo_sessao_destinos_perfil')); ?></h2>

                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="row perfilViagens">
            <!-- Carrossel "Para a Família" -->
            <div class="col-xl-5 col-md-12 mb-4">
                <h2 class="tituloPrincipal corPrincipal pb-3">Para a Família</h2>
                <div class="sliderViagem" id="sliderFamilia">
                    <?php
                    $argsFamilia = array(
                        'post_type'      => 'destinos',
                        'posts_per_page' => -1,
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'tipo-viagem',
                                'field'    => 'slug',
                                'terms'    => 'para-a-familia',
                            ),
                        ),
                    );
                    $queryFamilia = new WP_Query($argsFamilia);

                    if ($queryFamilia->have_posts()) :
                        while ($queryFamilia->have_posts()) : $queryFamilia->the_post();
                            $imagem_destino = get_field('imagem_destino');
                    ?>
                            <div class="carousel-item-custom">
                                <a href="<?php the_permalink(); ?>">
                                    <div class="gridImgViagem">
                                        <img src="<?php echo esc_url($imagem_destino); ?>" alt="<?php the_title(); ?>" />
                                    </div>
                                    <h3><?php the_title(); ?></h3>
                                </a>
                            </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>

                </div>
            </div>

            <!-- Carrossel "Para o Casal" -->
            <div class="col-xl-5 col-md-12 mb-4">
                <h2 class="tituloPrincipal corPrincipal pb-3">Para o Casal</h2>
                <div class="sliderViagem" id="sliderCasal">
                    <?php
                    $argsCasal = array(
                        'post_type'      => 'destinos',
                        'posts_per_page' => -1,
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'tipo-viagem',
                                'field'    => 'slug',
                                'terms'    => 'para-o-casal',
                            ),
                        ),
                    );
                    $queryCasal = new WP_Query($argsCasal);

                    if ($queryCasal->have_posts()) :
                        while ($queryCasal->have_posts()) : $queryCasal->the_post();
                            $imagem_destino = get_field('imagem_destino');
                    ?>
                            <div class="carousel-item-custom">
                                <a href="<?php the_permalink(); ?>">
                                    <div class="gridImgViagem">
                                        <img src="<?php echo esc_url($imagem_destino); ?>" alt="<?php the_title(); ?>" />
                                    </div>
                                    <h3><?php the_title(); ?></h3>
                                </a>
                            </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </div>

        <div class="row perfilViagens">
            <!-- Carrossel "Nacional" -->
            <div class="col-xl-5 col-md-12 mb-4">
                <h2 class="tituloPrincipal corPrincipal pb-3">Nacional</h2>
                <div class="sliderViagem" id="sliderNacional">
                    <?php
                    $argsNacional = array(
                        'post_type'      => 'destinos',
                        'posts_per_page' => -1,
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'tipo-destino',
                                'field'    => 'slug',
                                'terms'    => 'nacional',
                            ),
                        ),
                    );
                    $queryNacional = new WP_Query($argsNacional);

                    if ($queryNacional->have_posts()) :
                        while ($queryNacional->have_posts()) : $queryNacional->the_post();
                            $imagem_destino = get_field('imagem_destino');
                    ?>
                            <div class="carousel-item-custom">
                                <a href="<?php the_permalink(); ?>">
                                    <div class="gridImgViagem">
                                        <img src="<?php echo esc_url($imagem_destino); ?>" alt="<?php the_title(); ?>" />
                                    </div>
                                    <h3><?php the_title(); ?></h3>
                                </a>
                            </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>

                </div>
            </div>

            <!-- Carrossel "Internacional" -->
            <div class="col-xl-5 col-md-12 mb-4">
                <h2 class="tituloPrincipal corPrincipal pb-3">Internacional</h2>
                <div class="sliderViagem" id="sliderInternacional">
                    <?php
                    $argsInternacional = array(
                        'post_type'      => 'destinos',
                        'posts_per_page' => -1,
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'tipo-destino',
                                'field'    => 'slug',
                                'terms'    => 'internacional',
                            ),
                        ),
                    );
                    $queryInternacional = new WP_Query($argsInternacional);

                    if ($queryInternacional->have_posts()) :
                        while ($queryInternacional->have_posts()) : $queryInternacional->the_post();
                            $imagem_destino = get_field('imagem_destino');
                    ?>
                            <div class="carousel-item-custom">
                                <a href="<?php the_permalink(); ?>">
                                    <div class="gridImgViagem">
                                        <img src="<?php echo esc_url($imagem_destino); ?>" alt="<?php the_title(); ?>" />
                                    </div>
                                    <h3><?php the_title(); ?></h3>
                                </a>
                            </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>

                </div>
            </div>
        </div>

        <?php get_template_part('template-parts/content/component-btn-consultor'); ?>
    </div>
</section>