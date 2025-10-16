<?php

/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Tema_Dev_Gamb
 * @since Tema Dev-Gamb 1.0
 */
// This theme requires WordPress 5.3 or later.
if (version_compare($GLOBALS['wp_version'], '5.3', '<')) {
  require get_template_directory() . '/inc/back-compat.php';
}
if (!function_exists('tema_base_gamb_setup')) {
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   *
   * @since Tema Dev-Gamb 1.0
   *
   * @return void
   */
  function tema_base_gamb_setup()
  {
    /*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Tema Dev-Gamb 1.0, use a find and replace
		 * to change 'temabasegamb' to the name of your theme in all the template files.
		 */
    load_theme_textdomain('temabasegamb', get_template_directory() . '/languages');
    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');
    /*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
    add_theme_support('title-tag');
    /**
     * Add post-formats support.
     */
    add_theme_support(
      'post-formats',
      array(
        'galeria-imagens',
      )
    );
    function custom_theme_support()
    {
      add_theme_support('post-formats', array('gallery'));
    }
    add_action('after_setup_theme', 'custom_theme_support');
    /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(1568, 9999);
    register_nav_menus(
      array(
        'primary' => esc_html__('Primary menu', 'temabasegamb'),
        'footer'  => __('Secondary menu', 'temabasegamb'),
      )
    );
    /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
    add_theme_support(
      'html5',
      array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
        'navigation-widgets',
      )
    );
    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    $logo_width  = 300;
    $logo_height = 100;
    add_theme_support(
      'custom-logo',
      array(
        'height'               => $logo_height,
        'width'                => $logo_width,
        'flex-width'           => true,
        'flex-height'          => true,
        'unlink-homepage-logo' => true,
      )
    );
    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');
    // Add support for Block Styles.
    add_theme_support('wp-block-styles');
    // Add support for full and wide align images.
    add_theme_support('align-wide');
    // Note, the is_IE global variable is defined by WordPress and is used
    // to detect if the current browser is internet explorer.
    global $is_IE;
    if ($is_IE) {
      $editor_stylesheet_path = './assets/css/ie-editor.css';
    };
    // Enqueue editor styles.
    // add_editor_style( $editor_stylesheet_path );
    // Add custom editor font sizes.
    add_theme_support(
      'editor-font-sizes',
      array(
        array(
          'name'      => esc_html__('Extra small', 'temabasegamb'),
          'shortName' => esc_html_x('XS', 'Font size', 'temabasegamb'),
          'size'      => 16,
          'slug'      => 'extra-small',
        ),
        array(
          'name'      => esc_html__('Small', 'temabasegamb'),
          'shortName' => esc_html_x('S', 'Font size', 'temabasegamb'),
          'size'      => 18,
          'slug'      => 'small',
        ),
        array(
          'name'      => esc_html__('Normal', 'temabasegamb'),
          'shortName' => esc_html_x('M', 'Font size', 'temabasegamb'),
          'size'      => 20,
          'slug'      => 'normal',
        ),
        array(
          'name'      => esc_html__('Large', 'temabasegamb'),
          'shortName' => esc_html_x('L', 'Font size', 'temabasegamb'),
          'size'      => 24,
          'slug'      => 'large',
        ),
        array(
          'name'      => esc_html__('Extra large', 'temabasegamb'),
          'shortName' => esc_html_x('XL', 'Font size', 'temabasegamb'),
          'size'      => 40,
          'slug'      => 'extra-large',
        ),
        array(
          'name'      => esc_html__('Huge', 'temabasegamb'),
          'shortName' => esc_html_x('XXL', 'Font size', 'temabasegamb'),
          'size'      => 96,
          'slug'      => 'huge',
        ),
        array(
          'name'      => esc_html__('Gigantic', 'temabasegamb'),
          'shortName' => esc_html_x('XXXL', 'Font size', 'temabasegamb'),
          'size'      => 144,
          'slug'      => 'gigantic',
        ),
      )
    );
    // Custom background color.
    add_theme_support(
      'custom-background',
      array(
        'default-color' => 'd1e4dd',
      )
    );
    // Editor color palette.
    $black     = '#000000';
    $dark_gray = '#28303D';
    $gray      = '#39414D';
    $green     = '#D1E4DD';
    $blue      = '#D1DFE4';
    $purple    = '#D1D1E4';
    $red       = '#E4D1D1';
    $orange    = '#E4DAD1';
    $yellow    = '#EEEADD';
    $white     = '#FFFFFF';
    add_theme_support(
      'editor-color-palette',
      array(
        array(
          'name'  => esc_html__('Black', 'temabasegamb'),
          'slug'  => 'black',
          'color' => $black,
        ),
        array(
          'name'  => esc_html__('Dark gray', 'temabasegamb'),
          'slug'  => 'dark-gray',
          'color' => $dark_gray,
        ),
        array(
          'name'  => esc_html__('Gray', 'temabasegamb'),
          'slug'  => 'gray',
          'color' => $gray,
        ),
        array(
          'name'  => esc_html__('Green', 'temabasegamb'),
          'slug'  => 'green',
          'color' => $green,
        ),
        array(
          'name'  => esc_html__('Blue', 'temabasegamb'),
          'slug'  => 'blue',
          'color' => $blue,
        ),
        array(
          'name'  => esc_html__('Purple', 'temabasegamb'),
          'slug'  => 'purple',
          'color' => $purple,
        ),
        array(
          'name'  => esc_html__('Red', 'temabasegamb'),
          'slug'  => 'red',
          'color' => $red,
        ),
        array(
          'name'  => esc_html__('Orange', 'temabasegamb'),
          'slug'  => 'orange',
          'color' => $orange,
        ),
        array(
          'name'  => esc_html__('Yellow', 'temabasegamb'),
          'slug'  => 'yellow',
          'color' => $yellow,
        ),
        array(
          'name'  => esc_html__('White', 'temabasegamb'),
          'slug'  => 'white',
          'color' => $white,
        ),
      )
    );
    add_theme_support(
      'editor-gradient-presets',
      array(
        array(
          'name'     => esc_html__('Purple to yellow', 'temabasegamb'),
          'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)',
          'slug'     => 'purple-to-yellow',
        ),
        array(
          'name'     => esc_html__('Yellow to purple', 'temabasegamb'),
          'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $purple . ' 100%)',
          'slug'     => 'yellow-to-purple',
        ),
        array(
          'name'     => esc_html__('Green to yellow', 'temabasegamb'),
          'gradient' => 'linear-gradient(160deg, ' . $green . ' 0%, ' . $yellow . ' 100%)',
          'slug'     => 'green-to-yellow',
        ),
        array(
          'name'     => esc_html__('Yellow to green', 'temabasegamb'),
          'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $green . ' 100%)',
          'slug'     => 'yellow-to-green',
        ),
        array(
          'name'     => esc_html__('Red to yellow', 'temabasegamb'),
          'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $yellow . ' 100%)',
          'slug'     => 'red-to-yellow',
        ),
        array(
          'name'     => esc_html__('Yellow to red', 'temabasegamb'),
          'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $red . ' 100%)',
          'slug'     => 'yellow-to-red',
        ),
        array(
          'name'     => esc_html__('Purple to red', 'temabasegamb'),
          'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $red . ' 100%)',
          'slug'     => 'purple-to-red',
        ),
        array(
          'name'     => esc_html__('Red to purple', 'temabasegamb'),
          'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $purple . ' 100%)',
          'slug'     => 'red-to-purple',
        ),
      )
    );
    /*
		* Adds starter content to highlight the theme on fresh sites.
		* This is done conditionally to avoid loading the starter content on every
		* page load, as it is a one-off operation only needed once in the customizer.
		*/
    if (is_customize_preview()) {
      require get_template_directory() . '/inc/starter-content.php';
      add_theme_support('starter-content', tema_base_gamb_get_starter_content());
    }
    // Add support for responsive embedded content.
    add_theme_support('responsive-embeds');
    // Add support for custom line height controls.
    add_theme_support('custom-line-height');
    // Add support for experimental link color control.
    add_theme_support('experimental-link-color');
    // Add support for experimental cover block spacing.
    add_theme_support('custom-spacing');
    // Add support for custom units.
    // This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
    add_theme_support('custom-units');
  }
}
add_action('after_setup_theme', 'tema_base_gamb_setup');
/**
 * Register widget area.
 *
 * @since Tema Dev-Gamb 1.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */
function tema_base_gamb_widgets_init()
{
  register_sidebar(
    array(
      'name'          => esc_html__('Footer', 'temabasegamb'),
      'id'            => 'sidebar-1',
      'description'   => esc_html__('Add widgets here to appear in your footer.', 'temabasegamb'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );
}
add_action('widgets_init', 'tema_base_gamb_widgets_init');
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @since Tema Dev-Gamb 1.0
 *
 * @global int $content_width Content width.
 *
 * @return void
 */
function tema_base_gamb_content_width()
{
  // This variable is intended to be overruled from themes.
  // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
  // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
  $GLOBALS['content_width'] = apply_filters('tema_base_gamb_content_width', 750);
}
add_action('after_setup_theme', 'tema_base_gamb_content_width', 0);
/**
 * Enqueue scripts and styles.
 *
 * @since Tema Dev-Gamb 1.0
 *
 * @return void
 */
function tema_base_gamb_scripts()
{
  // Note, the is_IE global variable is defined by WordPress and is used
  // to detect if the current browser is internet explorer.
  global $is_IE, $wp_scripts;

  if ($is_IE) {
    wp_enqueue_style('tema-base-gamb-style', get_template_directory_uri() . '/assets/css/ie.css', array(), wp_get_theme()->get('Version'));
  } else {
    // Caso contrário, carregar os estilos padrão
    wp_enqueue_style('style-theme', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get('Version'));
    wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('slick', get_stylesheet_directory_uri() . '/assets/css/slick.css');
    wp_enqueue_style('slick-theme', get_stylesheet_directory_uri() . '/assets/css/slick-theme.css');
    wp_enqueue_style('animate', get_stylesheet_directory_uri() . '/assets/css/animate.css');
    wp_enqueue_style('bootstrap-icons', get_stylesheet_directory_uri() . '/assets/fonts/bootstrap-icons.css');
    wp_enqueue_style('fontAwesome', get_stylesheet_directory_uri() . '/assets/fonts/fontAwesome/css/all.css');
    wp_enqueue_style('roboto', get_stylesheet_directory_uri() . '/assets/fonts/roboto/font-roboto.css');

    // 🔹 Adicionando fontes externas (substituindo @import)
    wp_enqueue_style('blacksword-font', 'https://fonts.cdnfonts.com/css/blacksword', array(), null);
    wp_enqueue_style('fira-Sans', 'https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap', array(), null);

    // 🔹 Scripts essenciais do tema
    wp_enqueue_script('jquery', get_stylesheet_directory_uri() . '/assets/js/jquery-1.11.0.min.js', array(), null, true);
    wp_enqueue_script('jquery-migrate', get_stylesheet_directory_uri() . '/assets/js/jquery-migrate-1.2.1.min.js', array('jquery'), null, true);
    wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), null, true);
    wp_enqueue_script('popper', get_stylesheet_directory_uri() . '/assets/js/popper.min.js', array('jquery'), null, true);
    wp_enqueue_script('slick', get_stylesheet_directory_uri() . '/assets/js/slick.min.js', array('jquery'), null, true);
    wp_enqueue_script('wow', get_stylesheet_directory_uri() . '/assets/js/wow.js', array(), null, true);
    wp_enqueue_script('scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.js', array('jquery'), null, true);
  }

  // RTL styles.
  wp_style_add_data('tema-base-gamb-style', 'rtl', 'replace');
  // Print styles.
  wp_enqueue_style('tema-base-gamb-print-style', get_template_directory_uri() . '/assets/css/print.css', array(), wp_get_theme()->get('Version'), 'print');
  // Threaded comment reply styles.
  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
  // Register the IE11 polyfill file.
  wp_register_script(
    'tema-base-gamb-ie11-polyfills-asset',
    get_template_directory_uri() . '/assets/js/polyfills.js',
    array(),
    wp_get_theme()->get('Version'),
    true
  );
  // Register the IE11 polyfill loader.
  wp_register_script(
    'tema-base-gamb-ie11-polyfills',
    null,
    array(),
    wp_get_theme()->get('Version'),
    true
  );
  wp_add_inline_script(
    'tema-base-gamb-ie11-polyfills',
    wp_get_script_polyfill(
      $wp_scripts,
      array(
        'Element.prototype.matches && Element.prototype.closest && window.NodeList && NodeList.prototype.forEach' => 'tema-base-gamb-ie11-polyfills-asset',
      )
    )
  );
  // Main navigation scripts.
  if (has_nav_menu('primary')) {
    wp_enqueue_script(
      'tema-base-gamb-primary-navigation-script',
      get_template_directory_uri() . '/assets/js/primary-navigation.js',
      array('tema-base-gamb-ie11-polyfills'),
      wp_get_theme()->get('Version'),
      true
    );
  }
  // Responsive embeds script.
  wp_enqueue_script(
    'tema-base-gamb-responsive-embeds-script',
    get_template_directory_uri() . '/assets/js/responsive-embeds.js',
    array('tema-base-gamb-ie11-polyfills'),
    wp_get_theme()->get('Version'),
    true
  );
}
add_action('wp_enqueue_scripts', 'tema_base_gamb_scripts');


/* Admin CSS file */
function tpw_admin_styles()
{
  wp_enqueue_style('stylesheet', get_template_directory_uri() . '/style-admin.css');
}
add_action('admin_head', 'tpw_admin_styles');

/* Admin SCRIPTS file */
function tpw_admin_scripts()
{
  wp_enqueue_script('scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.js');
}
add_action('admin_head', 'tpw_admin_scripts');


function add_security_headers()
{
  header("X-Content-Type-Options: nosniff");
}
add_action('send_headers', 'add_security_headers');


/**
 * Enqueue block editor script.
 *
 * @since Tema Dev-Gamb 1.0
 *
 * @return void
 */
function temabasegamb_block_editor_script()
{
  wp_enqueue_script('temabasegamb-editor', get_theme_file_uri('/assets/js/editor.js'), array('wp-blocks', 'wp-dom'), wp_get_theme()->get('Version'), true);
}
add_action('enqueue_block_editor_assets', 'temabasegamb_block_editor_script');
/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function tema_base_gamb_skip_link_focus_fix()
{
  // If SCRIPT_DEBUG is defined and true, print the unminified file.
  if (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) {
    echo '<script>';
    include get_template_directory() . '/assets/js/skip-link-focus-fix.js';
    echo '</script>';
  }
  // The following is minified via `npx terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
?>
  <script>
    /(trident|msie)/i.test(navigator.userAgent) && document.getElementById && window.addEventListener && window.addEventListener("hashchange", (function() {
      var t, e = location.hash.substring(1);
      /^[A-z0-9_-]+$/.test(e) && (t = document.getElementById(e)) && (/^(?:a|select|input|button|textarea)$/i.test(t.tagName) || (t.tabIndex = -1), t.focus())
    }), !1);
  </script>
<?php
}
add_action('wp_print_footer_scripts', 'tema_base_gamb_skip_link_focus_fix');
/** Enqueue non-latin language styles
 *
 * @since Tema Dev-Gamb 1.0
 *
 * @return void
 */
function tema_base_gamb_non_latin_languages()
{
  $custom_css = tema_base_gamb_get_non_latin_css('front-end');
  if ($custom_css) {
    wp_add_inline_style('tema-base-gamb-style', $custom_css);
  }
}
add_action('wp_enqueue_scripts', 'tema_base_gamb_non_latin_languages');
// SVG Icons class.
require get_template_directory() . '/classes/class-tema-base-gamb-svg-icons.php';
// Custom color classes.
require get_template_directory() . '/classes/class-tema-base-gamb-custom-colors.php';
new Tema_Dev_Gamb_Custom_Colors();
// Enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';
// Menu functions and filters.
require get_template_directory() . '/inc/menu-functions.php';
// Custom template tags for the theme.
require get_template_directory() . '/inc/template-tags.php';
// Customizer additions.
require get_template_directory() . '/classes/class-tema-base-gamb-customize.php';
new Tema_Dev_Gamb_Customize();
// Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';
// Block Styles.
require get_template_directory() . '/inc/block-styles.php';
// Dark Mode.
require_once get_template_directory() . '/classes/class-tema-base-gamb-dark-mode.php';
new Tema_Dev_Gamb_Dark_Mode();
/**
 * Enqueue scripts for the customizer preview.
 *
 * @since Tema Dev-Gamb 1.0
 *
 * @return void
 */
function temabasegamb_customize_preview_init()
{
  wp_enqueue_script(
    'temabasegamb-customize-helpers',
    get_theme_file_uri('/assets/js/customize-helpers.js'),
    array(),
    wp_get_theme()->get('Version'),
    true
  );
  wp_enqueue_script(
    'temabasegamb-customize-preview',
    get_theme_file_uri('/assets/js/customize-preview.js'),
    array('customize-preview', 'customize-selective-refresh', 'jquery', 'temabasegamb-customize-helpers'),
    wp_get_theme()->get('Version'),
    true
  );
}
add_action('customize_preview_init', 'temabasegamb_customize_preview_init');
/**
 * Enqueue scripts for the customizer.
 *
 * @since Tema Dev-Gamb 1.0
 *
 * @return void
 */
function temabasegamb_customize_controls_enqueue_scripts()
{
  wp_enqueue_script(
    'temabasegamb-customize-helpers',
    get_theme_file_uri('/assets/js/customize-helpers.js'),
    array(),
    wp_get_theme()->get('Version'),
    true
  );
}
add_action('customize_controls_enqueue_scripts', 'temabasegamb_customize_controls_enqueue_scripts');
/**
 * Calculate classes for the main <html> element.
 *
 * @since Tema Dev-Gamb 1.0
 *
 * @return void
 */
function temabasegamb_the_html_classes()
{
  $classes = apply_filters('temabasegamb_html_classes', '');
  if (!$classes) {
    return;
  }
  echo 'class="' . esc_attr($classes) . '"';
}
/**
 * Add "is-IE" class to body if the user is on Internet Explorer.
 *
 * @since Tema Dev-Gamb 1.0
 *
 * @return void
 */
function temabasegamb_add_ie_class()
{
?>
  <script>
    if (-1 !== navigator.userAgent.indexOf('MSIE') || -1 !== navigator.appVersion.indexOf('Trident/')) {
      document.body.classList.add('is-IE');
    }
  </script>
<?php
}
add_action('wp_footer', 'temabasegamb_add_ie_class');


// inicio gamberine functions oficial 


/**Criação de Post-Types**/
function create_post_types()
{
  /** Post Type: Conteúdo **/
  $labels = array(
    "name" => __("Conteúdo", "post-type-conteudo"),
    "singular_name" => __("Conteúdo", "post-type-conteudo"),
    "all_items" => __("Todos", "post-type-conteudo"),
    "add_new" => __("Novo", "post-type-conteudo"), // Texto do botão "Novo" na barra menu superior
    "add_new_item" => __("", "post-type-conteudo"), // Texto do botão "Adicionar Novo", aqui está vazio
    "new_item" => __("Novo Conteúdo", "post-type-conteudo"), // Texto do botão no sidebar
    "edit_item" => __("Editar Conteúdo", "post-type-conteudo"),
    "view_item" => __("Ver Conteúdo", "post-type-conteudo"),
    "search_items" => __("Procurar Conteúdo", "post-type-conteudo"),
    "not_found" => __("Nenhum Conteúdo encontrado", "post-type-conteudo"),
    "not_found_in_trash" => __("Nenhum Conteúdo encontrado na lixeira", "post-type-conteudo"),
    "menu_name" => __("Conteúdo", "post-type-conteudo"),
  );
  $args = array(
    "label" => __("Conteúdo", "post-type-conteudo"),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true, // O tipo de post será mostrado na interface do usuário
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => false, // Mostrar no menu
    "show_in_nav_menus" => false, // Não mostrar em menus de navegação
    "exclude_from_search" => true,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => true,
    "rewrite" => array("slug" => "conteudo", "with_front" => true),
    "query_var" => true,
    "menu_position" => 3,
    "menu_icon" => "dashicons-admin-customizer",
    "supports" => array("title"),
  );
  register_post_type("conteudo", $args);
  /** Fim Post Type: Conteúdo **/
  /** Post Type: Banner **/
  $labels = array(
    "name" => __("Banner", "post-type-banner"),
    "singular_name" => __("Banner", "post-type-banner"),
    "all_items" => __("Todos", "post-type-banner"),
    "add_new" => __("Novo", "post-type-banner"), // Texto do botão "Novo" na barra menu superior
    "add_new_item" => __("Novo Banner", "post-type-banner"), // Texto do botão no alto da página
    "new_item" => __("Novo Banner", "post-type-banner"), // Texto do botão no sidebar
    "edit_item" => __("Editar Banner", "post-type-banner"),
    "view_item" => __("Ver Banner", "post-type-banner"),
    "search_items" => __("Procurar Banner", "post-type-banner"),
    "not_found" => __("Nenhum Banner encontrado", "post-type-banner"),
    "not_found_in_trash" => __("Nenhum Banner encontrado na lixeira", "post-type-banner"),
    "menu_name" => __("Banner", "post-type-banner"),
  );
  $args = array(
    "label" => __("Banner", "post-type-banner"),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "delete_with_user" => false,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => true, //somente conteúdo
    "show_in_nav_menus" => true, //somente conteúdo
    "exclude_from_search" => true,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => true,
    "rewrite" => array("slug" => "banner", "with_front" => true),
    "query_var" => true,
    "menu_position" => 5,
    "menu_icon" => "dashicons-cover-image",
    "supports" => array("title"),
  );
  register_post_type("banner", $args);
  /** fim post Type: Banner **/

  /** Post Type: Projetos **/
  $labels = array(
    "name" => __("Projetos", "post-type-projetos"),
    "singular_name" => __("Projeto", "post-type-projetos"),
    "all_items" => __("Todos", "post-type-projetos"),
    "add_new" => __("Novo", "post-type-projetos"), // Texto do botão "Novo" na barra menu superior
    "add_new_item" => __("Add Novo", "post-type-projetos"), // Texto do botão no alto da página
    "new_item" => __("Novo", "post-type-projetos"), // Texto do botão no sidebar
    "edit_item" => __("Editar", "post-type-projetos"),
    "view_item" => __("Ver", "post-type-projetos"),
    "search_items" => __("Procurar", "post-type-projetos"),
    "not_found" => __("Nenhum item encontrado", "post-type-projetos"),
    "not_found_in_trash" => __("Nenhum item encontrado na lixeira", "post-type-projetos"),
    "menu_name" => __("Projetos", "post-type-projetos"),
  );
  $args = array(
    "label" => __("Projetos", "post-type-projetos"),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "delete_with_user" => false,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "exclude_from_search" => true,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => true,
    "rewrite" => array("slug" => "projetos", "with_front" => true),
    "query_var" => true,
    "menu_position" => 8,
    "menu_icon" => "dashicons-table-col-after",
    "supports" => array("title"),
  );
  register_post_type("projetos", $args);
  /** fim post Type: projetos **/

  /** Post Type: Clientes **/
  $labels = array(
    "name" => __("Clientes", "post-type-clientes"),
    "singular_name" => __("Cliente", "post-type-clientes"),
    "all_items" => __("Todos", "post-type-clientes"),
    "add_new" => __("Novo", "post-type-clientes"), // Texto do botão "Novo" na barra menu superior
    "add_new_item" => __("Novo Cliente", "post-type-clientes"), // Texto do botão no alto da página
    "new_item" => __("Novo Cliente", "post-type-clientes"), // Texto do botão no sidebar
    "edit_item" => __("Editar Cliente", "post-type-clientes"),
    "view_item" => __("Ver Cliente", "post-type-clientes"),
    "search_items" => __("Procurar Cliente", "post-type-clientes"),
    "not_found" => __("Nenhum Cliente encontrado", "post-type-clientes"),
    "not_found_in_trash" => __("Nenhum Cliente encontrado na lixeira", "post-type-clientes"),
    "menu_name" => __("Clientes", "post-type-clientes"),
  );
  $args = array(
    "label" => __("Clientes", "post-type-clientes"),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "delete_with_user" => false,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => true, //somente conteúdo
    "show_in_nav_menus" => true, //somente conteúdo
    "exclude_from_search" => true,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => true,
    "rewrite" => array("slug" => "clientes", "with_front" => true),
    "query_var" => true,
    "menu_position" => 10,
    "menu_icon" => "dashicons-buddicons-buddypress-logo",
    "supports" => array("title"),
  );
  register_post_type("clientes", $args);
  /** fim post Type: Clientes **/

  /** Post Type: Eventos **/
  // $labels = array(
  //   "name" => __("Eventos", "post-type-eventos"),
  //   "singular_name" => __("Eventos", "post-type-eventos"),
  //   "all_items" => __("Todos", "post-type-eventos"),
  //   "add_new" => __("Novo", "post-type-eventos"), // Texto do botão "Novo" na barra menu superior
  //   "add_new_item" => __("Novo Eventos", "post-type-eventos"), // Texto do botão no alto da página
  //   "new_item" => __("Novo Eventos", "post-type-eventos"), // Texto do botão no sidebar
  //   "edit_item" => __("Editar Eventos", "post-type-eventos"),
  //   "view_item" => __("Ver Eventos", "post-type-eventos"),
  //   "search_items" => __("Procurar Eventos", "post-type-eventos"),
  //   "not_found" => __("Nenhum Eventos encontrado", "post-type-eventos"),
  //   "not_found_in_trash" => __("Nenhum Eventos encontrado na lixeira", "post-type-eventos"),
  //   "menu_name" => __("Eventos", "post-type-eventos"),
  // );
  // $args = array(
  //   "label" => __("Eventos", "post-type-eventos"),
  //   "labels" => $labels,
  //   "description" => "",
  //   "public" => true,
  //   "publicly_queryable" => true,
  //   "show_ui" => true,
  //   "delete_with_user" => false,
  //   "show_in_rest" => true,
  //   "rest_base" => "",
  //   "rest_controller_class" => "WP_REST_Posts_Controller",
  //   "has_archive" => false,
  //   "show_in_menu" => true, //somente conteúdo
  //   "show_in_nav_menus" => true, //somente conteúdo
  //   "exclude_from_search" => true,
  //   "capability_type" => "post",
  //   "map_meta_cap" => true,
  //   "hierarchical" => true,
  //   "rewrite" => array("slug" => "eventos", "with_front" => true),
  //   "query_var" => true,
  //   "menu_position" => 10,
  //   "menu_icon" => "dashicons-tickets",
  //   "supports" => array("title"),
  // );
  // register_post_type("eventos", $args);
  /** fim post Type: Eventos **/

  /** Post Type: Diferenciais **/
  // $labels = array(
  //   "name" => __("Diferenciais", "post-type-diferenciais"),
  //   "singular_name" => __("Diferencial", "post-type-diferenciais"),
  //   "all_items" => __("Todos", "post-type-diferenciais"),
  //   "add_new" => __("Novo", "post-type-diferenciais"), // Texto do botão "Novo" na barra menu superior
  //   "add_new_item" => __("Novo Diferencial", "post-type-diferenciais"), // Texto do botão no alto da página
  //   "new_item" => __("Novo Diferencial", "post-type-diferenciais"), // Texto do botão no sidebar
  //   "edit_item" => __("Editar Diferencial", "post-type-diferenciais"),
  //   "view_item" => __("Ver Diferencial", "post-type-diferenciais"),
  //   "search_items" => __("Procurar Diferencial", "post-type-diferenciais"),
  //   "not_found" => __("Nenhum Diferencial encontrado", "post-type-diferenciais"),
  //   "not_found_in_trash" => __("Nenhum Diferencial encontrado na lixeira", "post-type-diferenciais"),
  //   "menu_name" => __("Diferenciais", "post-type-diferenciais"),
  // );
  // $args = array(
  //   "label" => __("Diferenciais", "post-type-diferenciais"),
  //   "labels" => $labels,
  //   "description" => "",
  //   "public" => true,
  //   "publicly_queryable" => true,
  //   "show_ui" => true,
  //   "delete_with_user" => false,
  //   "show_in_rest" => true,
  //   "rest_base" => "",
  //   "rest_controller_class" => "WP_REST_Posts_Controller",
  //   "has_archive" => false,
  //   "show_in_menu" => true, //somente conteúdo
  //   "show_in_nav_menus" => true, //somente conteúdo
  //   "exclude_from_search" => true,
  //   "capability_type" => "post",
  //   "map_meta_cap" => true,
  //   "hierarchical" => true,
  //   "rewrite" => array("slug" => "diferenciais", "with_front" => true),
  //   "query_var" => true,
  //   "menu_position" => 4,
  //   "menu_icon" => "dashicons-star-filled",
  //   "supports" => array("title"),
  // );
  // register_post_type("diferenciais", $args);
  /** fim post Type: Diferenciais **/

  /** Post Type: Atuação  **/
  // $labels = array(
  //   "name" => __("Atuações ", "post-type-nossa-atuacao"),
  //   "singular_name" => __("Atuação", "post-type-nossa-atuacao"),
  //   "all_items" => __("Todas", "post-type-nossa-atuacao"),
  //   "add_new" => __("Nova", "post-type-nossa-atuacao"), // Texto do botão "Novo" na barra menu superior
  //   "add_new_item" => __("Nova Atuação", "post-type-nossa-atuacao"), // Texto do botão no alto da página
  //   "new_item" => __("Nova Atuação", "post-type-nossa-atuacao"), // Texto do botão no sidebar
  //   "edit_item" => __("Editar Atuação", "post-type-nossa-atuacao"),
  //   "view_item" => __("Ver Atuação", "post-type-nossa-atuacao"),
  //   "search_items" => __("Procurar Atuação", "post-type-nossa-atuacao"),
  //   "not_found" => __("Nenhuma Atuação encontrado", "post-type-nossa-atuacao"),
  //   "not_found_in_trash" => __("Nenhuma atuação encontrado na lixeira", "post-type-nossa-atuacao"),
  //   "menu_name" => __("Atuações ", "post-type-nossa-atuacao"),
  // );
  // $args = array(
  //   "label" => __("Atuação ", "post-type-nossa-atuacao"),
  //   "labels" => $labels,
  //   "description" => "",
  //   "public" => true,
  //   "publicly_queryable" => true,
  //   "show_ui" => true,
  //   "delete_with_user" => false,
  //   "show_in_rest" => true,
  //   "rest_base" => "",
  //   "rest_controller_class" => "WP_REST_Posts_Controller",
  //   "has_archive" => false,
  //   "show_in_menu" => true, //somente conteúdo
  //   "show_in_nav_menus" => true, //somente conteúdo
  //   "exclude_from_search" => true,
  //   "capability_type" => "post",
  //   "map_meta_cap" => true,
  //   "hierarchical" => true,
  //   "rewrite" => array("slug" => "nossa-atuacao", "with_front" => true),
  //   "query_var" => true,
  //   "menu_position" => 4,
  //   "menu_icon" => "dashicons-share-alt",
  //   "supports" => array("title"),
  // );
  // register_post_type("nossa-atuacao", $args);
  /** fim post Type: Atuação  **/

  /** Post Type: Qualidade  **/
  // $labels = array(
  //   "name" => __("Qualidade ", "post-type-qualidades"),
  //   "singular_name" => __("Qualidade", "post-type-qualidades"),
  //   "all_items" => __("Todas", "post-type-qualidades"),
  //   "add_new" => __("Nova", "post-type-qualidades"), // Texto do botão "Novo" na barra menu superior
  //   "add_new_item" => __("Nova Qualidade", "post-type-qualidades"), // Texto do botão no alto da página
  //   "new_item" => __("Nova Qualidade", "post-type-qualidades"), // Texto do botão no sidebar
  //   "edit_item" => __("Editar Qualidade", "post-type-qualidades"),
  //   "view_item" => __("Ver Qualidade", "post-type-qualidades"),
  //   "search_items" => __("Procurar Qualidade", "post-type-qualidades"),
  //   "not_found" => __("Nenhuma Qualidade encontrado", "post-type-qualidades"),
  //   "not_found_in_trash" => __("Nenhuma atuação encontrado na lixeira", "post-type-qualidades"),
  //   "menu_name" => __("Qualidade ", "post-type-qualidades"),
  // );
  // $args = array(
  //   "label" => __("Qualidade ", "post-type-qualidades"),
  //   "labels" => $labels,
  //   "description" => "",
  //   "public" => true,
  //   "publicly_queryable" => true,
  //   "show_ui" => true,
  //   "delete_with_user" => false,
  //   "show_in_rest" => true,
  //   "rest_base" => "",
  //   "rest_controller_class" => "WP_REST_Posts_Controller",
  //   "has_archive" => false,
  //   "show_in_menu" => true, //somente conteúdo
  //   "show_in_nav_menus" => true, //somente conteúdo
  //   "exclude_from_search" => true,
  //   "capability_type" => "post",
  //   "map_meta_cap" => true,
  //   "hierarchical" => true,
  //   "rewrite" => array("slug" => "qualidades", "with_front" => true),
  //   "query_var" => true,
  //   "menu_position" => 4,
  //   "menu_icon" => "dashicons-share-alt",
  //   "supports" => array("title"),
  // );
  // register_post_type("qualidades", $args);
  /** fim post Type: Qualidade  **/

  /** Post Type: Equipe  **/
  // $labels = array(
  //   "name" => __("A Equipe ", "post-type-nossa-equipe"),
  //   "singular_name" => __("A Equipe", "post-type-nossa-equipe"),
  //   "all_items" => __("Todos", "post-type-nossa-equipe"),
  //   "add_new" => __("Novo", "post-type-nossa-equipe"), // Texto do botão "Novo" na barra menu superior
  //   "add_new_item" => __("Novo", "post-type-nossa-equipe"), // Texto do botão no alto da página
  //   "new_item" => __("Novo", "post-type-nossa-equipe"), // Texto do botão no sidebar
  //   "edit_item" => __("Editar", "post-type-nossa-equipe"),
  //   "view_item" => __("Ver", "post-type-nossa-equipe"),
  //   "search_items" => __("Procurar Equipe", "post-type-nossa-equipe"),
  //   "not_found" => __("Nenhum da Equipe encontrado", "post-type-nossa-equipe"),
  //   "not_found_in_trash" => __("Sem resultados na lixeira", "post-type-nossa-equipe"),
  //   "menu_name" => __("A Equipe ", "post-type-nossa-equipe"),
  // );
  // $args = array(
  //   "label" => __("Equipe ", "post-type-nossa-equipe"),
  //   "labels" => $labels,
  //   "description" => "",
  //   "public" => true,
  //   "publicly_queryable" => true,
  //   "show_ui" => true,
  //   "delete_with_user" => false,
  //   "show_in_rest" => true,
  //   "rest_base" => "",
  //   "rest_controller_class" => "WP_REST_Posts_Controller",
  //   "has_archive" => false,
  //   "show_in_menu" => true, //somente conteúdo
  //   "show_in_nav_menus" => true, //somente conteúdo
  //   "exclude_from_search" => true,
  //   "capability_type" => "post",
  //   "map_meta_cap" => true,
  //   "hierarchical" => true,
  //   "rewrite" => array("slug" => "nossa-equipe", "with_front" => true),
  //   "query_var" => true,
  //   "menu_position" => 7,
  //   "menu_icon" => "dashicons-groups",
  //   "supports" => array("title"),
  // );
  // register_post_type("nossa-equipe", $args);
  /** fim post Type: A Equipe  **/



  // /** Post Type: Depoimentos **/
  // $labels = array(
  //     "name" => __("Depoimentos", "post-type-depoimentos"),
  //     "singular_name" => __("Depoimento", "post-type-depoimentos"),
  //     "all_items" => __("Todos", "post-type-depoimentos"),
  //     "add_new" => __("Novo", "post-type-depoimentos"), // Texto do botão "Novo" na barra menu superior
  //     "add_new_item" => __("Novo Depoimento", "post-type-depoimentos"), // Texto do botão no alto da página
  //     "new_item" => __("Novo Depoimento", "post-type-depoimentos"), // Texto do botão no sidebar
  //     "edit_item" => __("Editar Depoimento", "post-type-depoimentos"),
  //     "view_item" => __("Ver Depoimento", "post-type-depoimentos"),
  //     "search_items" => __("Procurar Depoimento", "post-type-depoimentos"),
  //     "not_found" => __("Nenhum Depoimento encontrado", "post-type-depoimentos"),
  //     "not_found_in_trash" => __("Nenhum Depoimento encontrado na lixeira", "post-type-depoimentos"),
  //     "menu_name" => __("Depoimentos", "post-type-depoimentos"),
  // );
  // $args = array(
  //     "label" => __("Depoimentos", "post-type-depoimentos"),
  //     "labels" => $labels,
  //     "description" => "",
  //     "public" => true,
  //     "publicly_queryable" => true,
  //     "show_ui" => true,
  //     "delete_with_user" => true,
  //     "show_in_rest" => true,
  //     "rest_base" => "",
  //     "rest_controller_class" => "WP_REST_Posts_Controller",
  //     "has_archive" => true,
  //     "show_in_menu" => true, //somente conteúdo
  //     "show_in_nav_menus" => true, //somente conteúdo
  //     "exclude_from_search" => true,
  //     "capability_type" => "post",
  //     "map_meta_cap" => true,
  //     "hierarchical" => true,
  //     "rewrite" => array("slug" => "depoimentos", "with_front" => true),
  //     "query_var" => true,
  //     "menu_position" => 12,
  //     "menu_icon" => "dashicons-star-half ",
  //     "supports" => array("title"),
  // );
  // register_post_type("depoimentos", $args);
  // /** fim post Type: Depoimentos **/

  /**Fecha Post-Types**/
};
add_action('init', 'create_post_types');



/** gamberine - inicio post Type novo **/
/** Post Type: Serviços **/
function register_post_type_servicos()
{
  $labels = array(
    "name" => __("Serviços", "post-type-servicos"),
    "singular_name" => __("Serviço", "post-type-servicos"),
    "all_items" => __("Todos", "post-type-servicos"),
    "add_new" => __("Novo", "post-type-servicos"),
    "add_new_item" => __("Novo", "post-type-servicos"),
    "new_item" => __("Novo", "post-type-servicos"),
    "edit_item" => __("Editar", "post-type-servicos"),
    "view_item" => __("Ver", "post-type-servicos"),
    "search_items" => __("Procurar", "post-type-servicos"),
    "not_found" => __("Nenhum item encontrado", "post-type-servicos"),
    "not_found_in_trash" => __("Nenhum item encontrado na lixeira", "post-type-servicos"),
    "menu_name" => __("Serviços", "post-type-servicos"),
  );
  $args = array(
    "label" => __("Serviços", "post-type-servicos"),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "has_archive" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "hierarchical" => false,
    "rewrite" => array("slug" => "servicos/%especialidade%", "with_front" => true),
    "query_var" => true,
    "menu_position" => 3,
    "menu_icon" => "dashicons-editor-ol",
    "supports" => array("title", "editor", "thumbnail"),
  );
  register_post_type("servicos", $args);
  /** fim post Type: Serviços **/
}
add_action('init', 'register_post_type_servicos');
/** gammberine - fim post Type novo **/

/* Taxonomys*/
function create_taxonomys()
{
  /* Taxonomy: Banners*/
  $labels = [
    "name" => __("Categoria", "custom-post-type-ui"),
    "singular_name" => __("Categoria", "custom-post-type-ui"),
  ];
  $args = [
    "label" => __("Categoria", "custom-post-type-ui"),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => true,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => ['slug' => 'category_banner', 'with_front' => true,  'hierarchical' => true,],
    "show_admin_column" => true,
    "show_in_rest" => true,
    "rest_base" => "category_banner",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => true,
  ];
  register_taxonomy("category_banner", ["banner"], $args);
  /* fim Taxonomy: Banners*/

  /* Taxonomy: Especialidade */
  $labels = [
    "name" => __("Categoria Serviço", "custom-post-type-ui"),
    "singular_name" => __("Categoria Serviço", "custom-post-type-ui"),
  ];
  $args = [
    "label" => __("Categoria Serviço", "custom-post-type-ui"),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => true, // Permite múltiplos termos associados a um post
    "show_ui" => true,
    "show_in_menu" => true,
    "query_var" => true,
    "rewrite" => ['slug' => 'especialidade', 'with_front' => true],
    "show_admin_column" => true, // Exibe coluna no admin
    "show_in_rest" => true, // Permite uso no editor de blocos
    "rest_base" => "especialidade",
  ];
  register_taxonomy("especialidade", ["servicos"], $args);
  /* fim Taxonomy: Especialidade*/
};
add_action('init', 'create_taxonomys');


// Substituir o nome taxonomy na URL com o termo associado
function filter_post_type_link($post_link, $post)
{
  if ($post->post_type === 'servicos') {
    $terms = get_the_terms($post->ID, 'especialidade');
    if ($terms && !is_wp_error($terms)) {
      $slug = current($terms)->slug;
      return str_replace('%especialidade%', $slug, $post_link);
    } else {
      return str_replace('%especialidade%', 'uncategorized', $post_link);
    }
  }
  return $post_link;
}
add_filter('post_type_link', 'filter_post_type_link', 10, 2);


// adicionar clase pai no Post Type "conteudo"
function add_custom_class_to_post_type($classes)
{
  // Verifica se estamos na área de administração e no Post Type "conteudo"
  if (is_admin() && isset($_GET['post_type']) && $_GET['post_type'] === 'conteudo') {
    $classes .= ' parent-class-conteudo';
  }
  return $classes;
}
add_filter('admin_body_class', 'add_custom_class_to_post_type');

// Logo Login
function gamberine_login_edit()
{
  echo '<style type="text/css">';
  echo 'h1 { background: url(' . get_bloginfo('template_directory') . '/' . 'imagens/';
  // Imagem
  echo 'logo.png';
  echo ') 50% 50% no-repeat !important;   
				width: auto !important;
				background-size: contain !important;
				height: 130px !important; 
			}
      body {
				background: linear-gradient(212deg, #383836 25%, #313131 88%) !important;
			}
      .login h1 {
        height: 130px !important;
        margin-bottom: 2rem;
			}
      .login h1 a,
      .language-switcher {
        display: none !important;
      }
			.wp-core-ui .button-primary {
				background: #13706F !important;
				border-color: transparent;
				box-shadow: none;
				border:0px !important;
				border-radius: 10px !important;
				color: #fff !important;
				text-decoration: none;
				text-shadow: none;
				transition: all ease .3s !important;
			}
			.wp-core-ui .button-primary:hover {
				background: #187c72 !important;
				opacity: 0.9;
				border: 0px !important;
				transition: all ease .3s !important;
			}
			.wp-core-ui .button-group.button-large .button, .wp-core-ui .button.button-large {
				min-height: 40px;
				padding: 0 2vw;
			}
			input[type=color], input[type=date], input[type=datetime-local], input[type=datetime], input[type=email], input[type=month], input[type=number], input[type=password], input[type=search], input[type=tel], input[type=text], input[type=time], input[type=url], input[type=week], select, textarea {
				border: 1px solid #13706F !important;
				outline: none!important;
			}
			input[type=checkbox]:focus, input[type=color]:focus, input[type=date]:focus, input[type=datetime-local]:focus, input[type=datetime]:focus, input[type=email]:focus, input[type=month]:focus, input[type=number]:focus, input[type=password]:focus, input[type=radio]:focus, input[type=search]:focus, input[type=tel]:focus, input[type=text]:focus, input[type=time]:focus, input[type=url]:focus, input[type=week]:focus, select:focus, textarea:focus{
                outline-color: #13706F !important;
				box-shadow:none !important;
				border: 1px solid #13706F !important;
				outline: none !important;
				border-radius: 3px;
			}
			.wp-core-ui .button, .wp-core-ui .button-secondary{
				border: 0px;
				transition: all ease .3s !important;
			}
			input[type=checkbox], input[type=radio] {
				border: 1px solid #13706F !important;
			}
			input[type=checkbox]:checked::before {  
				filter: brightness(0);
			}
			.login #login_error, .login .message, .login .success {
				border-left: 1px solid #13706F !important;
			}
			#login {
				padding: 2% 0 0 !important;
			}
      .login #nav {
          float: right;
            margin-block: 1rem !important;
      }
			.login #nav a:hover, .login h1:hover {
				color: #187c72 !important;
				transition: all ease .3s !important;
			}
			.login form {
				border: 1px solid #fff;
				box-shadow: 5px 5px 10px rgba(0,0,0,.08);
				color: #444343;
				border-radius: 10px;
				margin-top: 10px;
			}
			.login .button.wp-hide-pw .dashicons {
				color: #13706F;
			}
			.login #backtoblog a:focus, .login #nav a:focus, .login h1:focus {
				box-shadow: none;
			}
			.login h1:focus {
				margin: 0;
			}
			#backtoblog {
				background: #6CAAC6 !important;
                color: #fff;
				height: 40px;
				display: flex;
				align-items: center;
				justify-content: center;
				width: 80%;
				margin: 0 auto;
				margin-top: 1rem;
				margin-bottom: 2rem;
				border-radius: 10px;
				transition: all ease .3s !important;
			}
			#backtoblog:hover {
				background:#6CAAC68f !important;
				transition: all ease .3s !important;
			}
           .login #backtoblog a {
				color: #fff !important;
				transition: none !important;
			}
           .login #backtoblog a:hover {
				color: #13706F !important;
				transition: all ease .3s !important;
			}
		</style>';
}
add_action('login_head', 'gamberine_login_edit');
/*************************************************************/


// Função para renomear o rótulo da função "Administrador" para "Super Admin"
function renomear_funcao_administrador($roles)
{
  if (isset($roles['administrator'])) {
    $roles['administrator']['name'] = 'Super Admin';
  }
  return $roles;
}
add_filter('editable_roles', 'renomear_funcao_administrador');
function renomear_funcao_administrador_dropdown($role)
{
  return $role === 'Administrator' ? 'Super-Admin' : $role;
}
add_filter('role_names', 'renomear_funcao_administrador_dropdown');
// Passo 1: Criar uma função personalizada "Administrador Site" com permissões específicas
function criar_funcao_administrador_site()
{
  // Verifica se a função já existe
  if (!get_role('administrador_site')) {
    add_role(
      'administrador_site',
      __('Administrador Site'),
      [
        // Capabilidades básicas de leitura e edição
        'read'                   => true,
        'edit_posts'             => true,
        'delete_posts'           => true,
        'publish_posts'          => true,
        'upload_files'           => true,
        'manage_categories'      => true,
        // Gerenciamento de plugins e temas
        'install_plugins'        => true,
        'activate_plugins'       => true,
        'edit_plugins'           => true,
        'delete_plugins'         => true,
        'install_themes'         => false,
        'edit_themes'            => false,
        'delete_themes'          => false,
        // Capacidade de gerenciar usuários e definir permissões
        'list_users'             => true,
        'edit_users'             => true,
        'delete_users'           => true,
        'create_users'           => true,
        'promote_users'          => true,
        // Configurações do site
        'manage_options'         => true,
        'edit_dashboard'         => true,
        'update_core'            => false,
        'update_plugins'         => true,
        'update_themes'          => false,
        'manage_links'           => true,
        'edit_files'             => true,
        // Outras permissões administrativas
        'edit_private_posts'     => true,
        'edit_published_posts'   => true,
        'delete_private_posts'   => true,
        'delete_published_posts' => true,
        'publish_pages'          => true,
        'edit_pages'             => true,
        'delete_pages'           => true,
        'edit_private_pages'     => true,
        'delete_private_pages'   => true,
        'edit_published_pages'   => true,
        'delete_published_pages' => true,
        'unfiltered_html'        => false, // Atenção: permite HTML sem filtro (use com cautela)
        // Defina outras permissões conforme necessário
        'manage_options'         => true, // Removendo acesso a configurações
        'edit_theme_options'     => false, // Removendo acesso a temas
        'activate_plugins'       => true, // Removendo acesso a plugins
        'update_core'            => false, // Removendo acesso a atualizações
      ]
    );
  }
}
add_action('init', 'criar_funcao_administrador_site');
// Passo 2: Atribuir a função de "Administrador Comum" a novos usuários
function atribuir_funcao_administrador_site($user_id)
{
  $user = new WP_User($user_id);
  $user->set_role('administrador_site');
}
add_action('user_register', 'atribuir_funcao_administrador_site');
// Função para remover uma função personalizada tipo "Administrador Comum"
// function remover_funcao_administrador_comum() {
// }
// add_action('init', 'remover_funcao_administrador_comum');
// Função para remover as funções padrão "Colaborador" e "Autor"
function remover_funcoes_padrao()
{
  // Verifica se a função existe antes de tentar removê-la
  if (get_role('administrador_comum')) {
    remove_role('administrador_comum');
  }
  // Verifica e remove a função "Colaborador" (contributor)
  if (get_role('contributor')) {
    remove_role('contributor');
  }
  // Verifica e remove a função "Autor" (author)
  if (get_role('author')) {
    remove_role('author');
  }
}
add_action('init', 'remover_funcoes_padrao');
/**** gamberine - ocultar itens menu oficial **********/
add_action('admin_menu', 'cwp_desativa_comentarios_admin_menu');
function cwp_desativa_comentarios_admin_menu()
{
  // Se o usuário não for Super Admin
  if (!current_user_can('add_users')) {
    // Desativando notificações de atualizações do CORE
    remove_action('init', 'wp_version_check');
    add_filter('pre_option_update_core', '__return_null');
    // Desativando notificações de atualizações dos PLUGINS
    remove_action('load-plugins.php', 'wp_update_plugins');
    add_action('admin_init', function () {
      remove_action('admin_init', 'wp_update_plugins');
      remove_action('admin_init', 'wp_update_plugins', 2);
      remove_action('init', 'wp_update_plugins', 2);
    });
    add_filter('pre_option_update_plugins', '__return_null');
    // Removendo menu de atualização da Admin Bar
    add_action('wp_before_admin_bar_render', function () {
      global $wp_admin_bar;
      $wp_admin_bar->remove_menu('updates');
    });
    // Remover menus específicos no menu lateral via ID
    add_action('admin_head', function () {
      global $menu, $submenu;
      // Ocultar menus específicos
      unset($menu[25]); // Comentários
      unset($menu[60]); // Aparência
      unset($submenu['index.php'][10]); // Painel -> Atualização 
      // unset($menu[65]); // Plugins
      // Ocultar itens adicionais no menu admin conforme o ID do usuário
      global $user_ID;
      if ($user_ID != 99) {
        remove_menu_page('plugin-editor.php');
        // remove_menu_page('post-new.php?post_type=page');
        // remove_menu_page('post-new.php?post_type=conteudo');
      }
    });
    // Remover itens da barra superior do admin
    add_action('wp_before_admin_bar_render', function () {
      global $wp_admin_bar;
      $wp_admin_bar->remove_menu('wp-logo'); // o wp-logo vem da li <li role="group" id="wp-admin-bar-wp-logo" class="menupop">
      $wp_admin_bar->remove_menu('about');
      $wp_admin_bar->remove_menu('wporg');
      $wp_admin_bar->remove_menu('documentation');
      $wp_admin_bar->remove_menu('support-forums');
      $wp_admin_bar->remove_menu('feedback');
      $wp_admin_bar->remove_menu('comments');
      $wp_admin_bar->remove_menu('archive');
    });
  }
}
// Reexibir o menu "Plugins"
// function my_customize_menu()
// {
//     global $menu, $submenu;
//     // Verifica se o usuário é o "administrador_site"
//     if (current_user_can('administrador_site')) {
//         // Oculta o menu "Plugins" para o usuário administrador_site
//         unset($menu[65]); // Plugins
//     }
//     // Caso contrário, reexibe o menu "Plugins" para outros usuários
//     else {
//         // Reexibe o menu "Plugins" se ele foi removido
//         if (!isset($menu[65])) {
//             $menu[65] = [
//                 'Plugins', // Nome do menu
//                 'activate_plugins', // Permissão
//                 'plugins.php', // URL do menu
//                 '', // Submenus
//                 'menu-top menu-icon-plugins' // Classe CSS
//             ];
//         }
//     }
// }
// add_action('admin_menu', 'my_customize_menu', 999);
/*Mudar posts para Galeria */
// function change_post_label()
// {
//     global $menu;
//     global $submenu;
//     $menu[5][0] = 'Galeria';
//     $submenu['edit.php'][5][0] = 'Todas';
//     $submenu['edit.php'][10][0] = 'Adicionar';
//     $submenu['edit.php'][16][0] = 'Tags';
//     echo '';
// }
// function change_post_object()
// {
//     global $wp_post_types;
//     $labels = $wp_post_types['post']->labels;
//     $labels->name = 'Galeria';
//     $labels->singular_name = 'Galeria';
//     $labels->add_new = 'Adicionar';
//     $labels->add_new_item = 'Adicionar';
//     $labels->edit_item = 'Editar';
//     $labels->new_item = 'Galeria';
//     $labels->view_item = 'Ver';
//     $labels->search_items = 'Buscar';
//     $labels->not_found = 'Nenhuma resultado encontrado';
//     $labels->not_found_in_trash = 'Nenhum resultado encontrado no Lixo';
//     $labels->all_items = 'Todos';
//     $labels->menu_name = 'Galeria';
//     $labels->name_admin_bar = 'Galeria';
// }
// add_action('admin_menu', 'change_post_label');
// add_action('init', 'change_post_object');
/** gamberine - função alterar ordem menu admin  */
add_filter('custom_menu_order', function () {
  return true;
});
add_filter('menu_order', 'my_new_admin_menu_order');
function my_new_admin_menu_order($menu_order)
{
  // for example, move 'upload.php' to position #9 and built-in pages to position #1
  $new_positions = array(
    'upload.php' => 15,
    'edit.php?post_type=page' => 1
  );
  // helper function to move an element inside an array
  function move_element(&$array, $a, $b)
  {
    $out = array_splice($array, $a, 1);
    array_splice($array, $b, 0, $out);
  }
  // the items if found in the original menu_positions
  foreach ($new_positions as $value => $new_index) {
    if ($current_index = array_search($value, $menu_order)) {
      move_element($menu_order, $current_index, $new_index);
    }
  }
  return $menu_order;
};
/* função se o post não tiver uma imagem destacada, usar a imagem padrão */
// function default_post_thumbnail($post_id) {
//     if ('post' !== get_post_type($post_id) || wp_is_post_revision($post_id)) {
//         return;
//     }
//      if (!has_post_thumbnail($post_id)) {
//         $default_image_url = "http://localhost/flaviane/wp-content/uploads/banner-teste-1568x964.jpg";
//         $default_image_id = attachment_url_to_postid($default_image_url);
//         if ($default_image_id) {
//             set_post_thumbnail($post_id, $default_image_id);
//         }
//     }
// }
// Adiciona a função ao gancho 'save_post'
// add_action('save_post', 'default_post_thumbnail');

/* função adiciona campo imagem padrão no acf para novos posts */
function add_default_value_to_image_field($field)
{
  acf_render_field_setting($field, array(
    'label' => __('Default Image ID', 'acf'),
    'instructions' => __('Appears when creating a new post', 'acf'),
    'type' => 'image',
    'name' => 'default_value',
  ));
}
add_action('acf/render_field_settings/type=image', 'add_default_value_to_image_field', 20);
/* Limit excerpt to a number of characters */
function custom_short_excerpt($excerpt)
{
  return substr($excerpt, 0, 200);
}
add_filter('the_excerpt', 'custom_short_excerpt');


/* Esconder a versão do WordPress */
remove_action('wp_head', 'wp_generator');


/* Alterar o rodapé da administração */
add_filter('admin_footer_text', 'bl_admin_footer');
function bl_admin_footer()
{
  echo 'Desenvolvido por <a href="https://gamberine.com.br" target="_blank">Gamberine Comunicação Digital</a>';
}

/* gamberine Link dev img */
add_filter('site_footer_text', 'bl_site_footer_logo');
function bl_site_footer_logo()
{
  echo '<a href="https://gamberine.com.br" target="_blank">';
  echo '<img src="' . get_bloginfo('template_directory') . '/' . 'imagens/' . 'logoGamberine.png';
  echo '"/></a>';
}

/* gamberine Link dev se comunicação */
add_filter('site_footer_text', 'bl_site_footer_se');
function bl_site_footer_se()
{
  echo '<a href="https://secomunicacao.com.br" target="_blank">';
  echo '<img src="' . get_bloginfo('template_directory') . '/' . 'imagens/' . 'logoSe.png';
  echo '"/></a>';
}


/* add novo formato get_field ACF - gamberine */
add_filter('acf/the_field/escape_html_optin', '__return_true');
add_filter('wpcf7_form_autocomplete', function ($autocomplete) {
  $autocomplete = 'off';
  return $autocomplete;
}, 10, 1);
/* função utilizar editor clássico */
add_filter('use_block_editor_for_post', '__return_false', 10);
/* gamberine função detectar qual navegador está acessando */
add_filter('body_class', 'detect_browser');
function detect_browser($classes)
{
  global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone, $is_edge;
  if ($is_opera) $classes[] = 'opera';
  elseif ($is_safari) $classes[] = 'safari';
  elseif ($is_chrome) $classes[] = 'chrome';
  elseif ($is_edge) $classes[] = 'edge';
  elseif ($is_IE) $classes[] = 'ie';
  elseif ($is_gecko) $classes[] = 'firefox';
  elseif ($is_iphone) $classes[] = 'ios-app';
  // Verificar se o acesso é feito por um aplicativo iOS
  if ($is_iphone) $classes[] = 'ios-app';
  return $classes;
}

// function detect_browser($classes)
// {
//     global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone, $is_edge;

//     if ($is_lynx) $classes[] = 'lynx'; // Adiciona Lynx
//     elseif ($is_opera) $classes[] = 'opera';
//     elseif ($is_safari) $classes[] = 'safari';
//     elseif ($is_chrome) $classes[] = 'chrome';
//     elseif ($is_edge) $classes[] = 'edge';
//     elseif ($is_IE) $classes[] = 'ie';
//     elseif ($is_gecko) $classes[] = 'firefox'; // Adiciona Firefox
//     elseif ($is_iphone) $classes[] = 'ios-app'; // Verifica se é um app iOS

//     return $classes;
// }

// Salvando os grupos de campos ACF no diretório do tema
add_filter('acf/settings/save_json', function ($path) {
  // Define o caminho onde os arquivos JSON serão salvos
  $path = get_stylesheet_directory() . '/acf-json';
  return $path;
});
// Carregando os grupos de campos ACF a partir do diretório do tema
add_filter('acf/settings/load_json', function ($paths) {
  // Remove o caminho padrão
  unset($paths[0]);
  // Adiciona o caminho do diretório 'acf-json' no tema
  $paths[] = get_stylesheet_directory() . '/acf-json';
  return $paths;
});

// gamberine - adicionar o item ativo conforme rolagem da tela
function enqueue_scroll_menu_script()
{
  wp_enqueue_script('jquery');
  wp_enqueue_script('scroll-menu', get_template_directory_uri() . '/assets/js/scroll-menu-active.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_scroll_menu_script');

// Verifica se é uma página e exibe o título
function shortcode_titulo_pagina()
{
  if (is_page()) {
    return '<h1>' . get_the_title() . '</h1>';
  }
  return ''; // Retorna vazio se não for uma página
}
add_shortcode('titulo_pagina', 'shortcode_titulo_pagina');

// gamberine - Adicionar item ao menu do admin com a URL desejada
function adicionar_links_dinamicos_menu()
{
  // inicio seletor de item - CONTEUDO
  $post_id_1 = 38;
  $edit_link_1 = admin_url("post.php?post=$post_id_1&action=edit");

  add_menu_page(
    'Edição de Conteúdos',  // Título da página
    'Conteúdo',            // Nome no menu
    'edit_posts',           // Capacidade necessária
    $edit_link_1,           // Link direto para a edição do post
    '',                     // Função vazia, pois redirecionaremos para o link
    'dashicons-edit',       // Ícone do menu
    2                       // Posição no menu
  );
  // FIM seletor de item - CONTEUDO


}
add_action('admin_menu', 'adicionar_links_dinamicos_menu');


// Galeria Adicionar Imagens Destacadas aos Posts
// 
load_plugin_textdomain('domain', false, plugin_basename(dirname(__FILE__)) . '/languages/');



// Adiciona campo de thumbnail às categorias da taxonomia "especialidade"
function adicionar_thumbnail_categoria()
{
  if (! class_exists('ACF')) {
    return; // Verifica se o ACF está instalado
  }

  acf_add_local_field_group(array(
    'key'    => 'grupo_thumbnail_categoria',
    'title'  => 'Imagem da Categoria',
    'fields' => array(
      array(
        'key'           => 'field_imagem_categoria',
        'label'         => 'Imagem da Categoria',
        'name'          => 'imagem_categoria',
        'type'          => 'image',
        'return_format' => 'url',
        'preview_size'  => 'medium',
        'library'       => 'all',
      ),
    ),
    'location' => array(
      array(
        array(
          'param'    => 'taxonomy',
          'operator' => '==',
          'value'    => 'especialidade', // Taxonomia "especialidade"
        ),
      ),
    ),
  ));
}
add_action('acf/init', 'adicionar_thumbnail_categoria');

// Adiciona a coluna de thumbnail na listagem de termos da taxonomia "especialidade"
function adicionar_coluna_thumbnail($columns)
{
  // Usa uma chave exclusiva para evitar conflitos (ex: "imagem_categoria_thumb")
  $columns['imagem_categoria_thumb'] = __('Thumbnail');
  return $columns;
}
add_filter('manage_edit-especialidade_columns', 'adicionar_coluna_thumbnail');


// Exibe a thumbnail na coluna personalizada da taxonomia "especialidade"
function mostrar_thumbnail_categoria($content, $column_name, $term_id)
{
  if ('imagem_categoria_thumb' === $column_name) {
    // Use o identificador no formato 'especialidade_{term_id}'
    $thumbnail = get_field('imagem_categoria', 'especialidade_' . $term_id);
    if ($thumbnail) {
      $content = '<img src="' . esc_url($thumbnail) . '" style="width:50px; height:auto;">';
    } else {
      $content = __('Sem imagem');
    }
  }
  return $content;
}
add_filter('manage_especialidade_custom_column', 'mostrar_thumbnail_categoria', 10, 3);


// Obtém o idioma configurado para o site (usado na tag <html>) Sanitiza e adiciona a classe
function add_lang_class_to_body($classes)
{
  // Obtém o idioma configurado para o site (usado na tag <html>)
  $current_lang = get_bloginfo('language'); // Ex: "pt-BR"

  // Sanitiza e adiciona a classe
  $classes[] = 'lang-' . sanitize_title_with_dashes($current_lang);
  return $classes;
}
add_filter('body_class', 'add_lang_class_to_body');


// Se for castelarrc.com (sem o .br), forçamos lang="en" e body class
// function definir_lang_html_como_en()
// {
//   if (strpos($_SERVER['HTTP_HOST'], 'castelarrc.com') !== false) {
//     echo '<script>
//             document.documentElement.lang = "en";
//         </script>';
//   }
// }
// add_action('wp_head', 'definir_lang_html_como_en');


// Se for castelarrc.com (sem o .br), forçamos lang="en" e body class
function forcar_idioma_ingles_se_dominio_com()
{
  $dominio_origem = $_SERVER['HTTP_HOST'];

  if (strpos($dominio_origem, 'castelarrc.com') !== false && strpos($dominio_origem, '.br') === false) {
    // Força <html lang="en"> com JavaScript
    echo '<script>
            document.documentElement.lang = "en";

            // Também adiciona classe no <body> caso o PHP tenha adicionado a errada
            document.addEventListener("DOMContentLoaded", function () {
                document.body.classList.forEach(function(cls) {
                    if (cls.startsWith("lang-")) {
                        document.body.classList.remove(cls);
                    }
                });
                document.body.classList.add("lang-en");
            });
        </script>';
  }
}
add_action('wp_head', 'forcar_idioma_ingles_se_dominio_com');
