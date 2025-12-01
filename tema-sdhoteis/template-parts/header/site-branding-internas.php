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
        <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
            <?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

                    <img class="logoHome logoPadrao" src="<?php echo wp_kses_post(get_field('logo_header')); ?>" />
                    <img class="logoHome logoSuspensa" src="<?php echo wp_kses_post(get_field('logo_suspensa')); ?>" />

                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
        </a>
    </div>

</div><!-- .site-branding -->