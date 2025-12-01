<?php

/**
 * Displays the site navigation.
 *
 * @package WordPress
 * @subpackage Tema_Dev_Gamb
 * @since Tema Dev-Gamb 1.0
 */

?>

<?php if ( has_nav_menu( 'primary' ) ) : ?>
  <nav id="site-navigation" class="primary-navigation homeNav" role="navigation" aria-label="<?php esc_attr_e( 'Primary menu', 'temabasegamb' ); ?>">

    <div class="menu-button-container">
      <button id="primary-mobile-menu" class="button" aria-controls="mobile-menu-list" aria-expanded="false" aria-label="menu">
        <span class="dropdown-icon open">
          <?php echo tema_base_gamb_get_icon_svg( 'ui', 'menu' ); ?>
        </span>
        <span class="dropdown-icon close">
          <?php echo tema_base_gamb_get_icon_svg( 'ui', 'close' ); ?>
        </span>
      </button>
    </div>

    <!-- ===========================
         MENU DESKTOP (PRIMARY)
         =========================== -->
    <div class="desktop-menu">
        <?php
        wp_nav_menu(
          array(
            'theme_location'  => 'primary',
            'menu_class'      => 'menu-wrapper',
            'container_class' => 'primary-menu-container',
            'items_wrap'      => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
            'fallback_cb'     => false,
          )
        );
        ?>
    </div>

    <!-- ===========================
         MENU MOBILE (USA O MENU DO FOOTER)
         =========================== -->
    <div class="mobile-menu">
        <?php
        if ( has_nav_menu( 'footer' ) ) {
          wp_nav_menu(
            array(
              'theme_location'  => 'footer', // <<< AQUI ESTÁ A TROCA!
              'menu_class'      => 'mobile-menu-wrapper',
              'container_class' => 'mobile-menu-container',
              'items_wrap'      => '<ul id="mobile-menu-list" class="%2$s">%3$s</ul>',
              'fallback_cb'     => false,
            )
          );
        }
        ?>
    </div>

  </nav>
<?php endif; ?>
