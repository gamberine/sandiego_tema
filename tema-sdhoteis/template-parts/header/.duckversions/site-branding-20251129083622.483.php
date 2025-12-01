<?php

/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Tema_Dev_Gamb
 * @since Tema Dev-Gamb 1.0
 */

$blog_info    = get_bloginfo('name');
$description  = get_bloginfo('description', 'display');
$show_title   = (true === get_theme_mod('display_title_and_tagline', true));
$header_class = $show_title ? 'site-title' : 'screen-reader-text';

?>

<div class="site-branding">
    <div class="site-logo">
        <a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>">

            <?php
            // Busca 1 post do CPT 'conteudo' sem quebrar o loop global
            $args = array(
                'post_type'      => 'conteudo',
                'posts_per_page' => 1,
                'no_found_rows'  => true
            );

            $logo_query = new WP_Query( $args );

            if ( $logo_query->have_posts() ) :
                while ( $logo_query->have_posts() ) :
                    $logo_query->the_post();

                    $logo_header   = get_field('logo_header');
                    $logo_suspensa = get_field('logo_suspensa');
            ?>

                <?php if ( $logo_header ) : ?>
                    <img class="logoHome logoPadrao" src="<?php echo esc_url( $logo_header ); ?>">
                <?php endif; ?>

                <?php if ( $logo_suspensa ) : ?>
                    <img class="logoHome logoSuspensa" src="<?php echo esc_url( $logo_suspensa ); ?>">
                <?php endif; ?>

            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>

        </a>
    </div>
</div>
