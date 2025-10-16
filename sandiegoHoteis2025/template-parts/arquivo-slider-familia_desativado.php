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
    <?php wp_reset_query(); ?>
</div>