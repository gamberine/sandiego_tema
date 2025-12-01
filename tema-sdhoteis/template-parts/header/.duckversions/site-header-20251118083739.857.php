<?php

/**
 * Displays the site header.
 *
 * @package WordPress
 * @subpackage Tema_Dev_Gamb
 * @since Tema Dev-Gamb 1.0
 */

$wrapper_classes  = 'site-headerGamb';
$wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
$wrapper_classes .= true === get_theme_mod('display_title_and_tagline', true) ? ' has-title-and-tagline' : '';
$wrapper_classes .= has_nav_menu('primary') ? ' has-menu' : '';
?>

<header id="masthead" class="<?php echo esc_attr($wrapper_classes); ?>" role="banner">
  <div class="site-headerGamb__container">
    <div class="site-headerGamb__layout">
      <div class="site-headerGamb__branding">
        <?php get_template_part('template-parts/header/site-branding'); ?>
      </div>

      <div class="site-headerGamb__nav">
        <?php get_template_part('template-parts/header/site-nav'); ?>
      </div>

      <div class="site-headerGamb__utilities">
        <?php get_template_part('template-parts/arquivo-idiomas'); ?>
      </div>
    </div>
  </div>
</header><!-- #masthead -->