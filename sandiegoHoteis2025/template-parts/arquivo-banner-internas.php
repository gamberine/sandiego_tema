<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Tema_Dev_Gamb
 * @since Tema Dev-Gamb 1.0
 * 
 */

?>

<div class="rowBannerInternas">
    <div class="bannerInternas">
        <?php
        // Obtém o título da página atual onde o componente está sendo exibido
        $page_title = get_the_title(get_queried_object_id());

        $args = array(
            'post_type' => 'banner',
            'posts_per_page' => -1,
            'order' => 'ASC',
            'orderby' => 'date',
            'tax_query' => array(
                array(
                    'taxonomy' => 'category_banner',
                    'field' => 'slug',
                    'terms' => $page_title, // Usa o título da página atual para o filtro
                    'hierarchical' => 0,
                ),
            ),
        );
        query_posts($args);
        ?>

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php
                // Obtém as URLs das imagens
                $imagem_banner = get_field('imagem_banner');
                $imagem_banner_mobile = get_field('imagem_banner_mobile');
                ?>

                <!-- Imagem para telas maiores que 991px -->
                <div class="slide-items desktop-banner"
                    style="background: url(<?php echo wp_kses_post($imagem_banner); ?>), var(--primary-color); 
                            background-size: cover;">
                    <div class="gridTextosBanner desktop-banner">
                        <!-- Exibe o título da página atual -->
                        <h1 class="title-primary text-center text-white"><?php echo esc_html($page_title); ?></h1>
                    </div>
                </div>

                <!-- Imagem para telas menores que 992px -->
                <div class="slide-items mobile-banner"
                    style="background: url(<?php echo wp_kses_post($imagem_banner_mobile ? $imagem_banner_mobile : $imagem_banner); ?>), var(--primary-color); 
                            background-size: cover;">
                    <div class="gridTextosBanner mobile-banner">
                        <!-- Exibe o título da página atual -->
                        <h1 class="title-primary text-center text-white"><?php echo esc_html($page_title); ?></h1>
                    </div>
                </div>


            <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
    </div>
</div>