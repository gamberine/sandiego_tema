<?php

/**
 * Displays the site navigation.
 *
 * @package WordPress
 * @subpackage Tema_Dev_Gamb
 * @since Tema Dev-Gamb 1.0
 */

?>

<?php if (has_nav_menu('primary')) : ?>
  <nav id="site-navigation" class="primary-navigation menuInternas" role="navigation" aria-label="<?php esc_attr_e('Primary menu', 'temabasegamb'); ?>">
    <div class="menu-button-container">
      <button id="primary-mobile-menu" class="button" aria-controls="primary-menu-list" aria-expanded="false" aria-label="menu">
        <span class="dropdown-icon open"><?php esc_html_e('', 'temabasegamb'); ?>
          <?php echo tema_base_gamb_get_icon_svg('ui', 'menu'); // phpcs:ignore WordPress.Security.EscapeOutput 
          ?>
        </span>
        <span class="dropdown-icon close"><?php esc_html_e('', 'temabasegamb'); ?>
          <?php echo tema_base_gamb_get_icon_svg('ui', 'close'); // phpcs:ignore WordPress.Security.EscapeOutput 
          ?>
        </span>
      </button><!-- #primary-mobile-menu -->
    </div><!-- .menu-button-container -->
    <?php
    wp_nav_menu(
      array(
        'theme_location'  => 'footer',
        'menu_class'      => 'menu-wrapper',
        'container_class' => 'primary-menu-container',
        'items_wrap'      => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
        'fallback_cb'     => false,
      )
    );
    ?>
  </nav><!-- #site-navigation -->
<?php endif; ?>

<!-- < ?php get_template_part('template-parts/arquivo-redes-sociais'); ?> -->
<?php get_template_part('template-parts/arquivo-idiomas'); ?>