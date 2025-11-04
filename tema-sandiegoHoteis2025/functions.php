<?php
/**
 * Tema Dev-Gamb — Funções e definições
 * Compatível WP 5.3+ | Ajustado para WP 6.7 (i18n no init)
 */

/* --------------------------------------------------------------------------
 * 0) Compat e Constantes
 * -------------------------------------------------------------------------- */
if ( version_compare($GLOBALS['wp_version'], '5.3', '<') ) {
  require get_template_directory() . '/inc/back-compat.php';
}

/* --------------------------------------------------------------------------
 * 1) Traduções
 * -------------------------------------------------------------------------- */
function temabasegamb_load_textdomain() {
    // Carrega cedo (prioridade 0) para impedir o fallback _load_textdomain_just_in_time
    // disparar antes do init e gerar avisos no WP 6.7+.
    load_theme_textdomain('temabasegamb', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'temabasegamb_load_textdomain', 0);


/* --------------------------------------------------------------------------
 * 2) Setup do tema (after_setup_theme)
 * -------------------------------------------------------------------------- */
if ( ! function_exists('tema_base_gamb_setup') ) {
  function tema_base_gamb_setup() {

    // Feeds, Title, Thumbs
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(1568, 9999);

    // Menus
    register_nav_menus(array(
      'primary' => esc_html__('Primary menu', 'temabasegamb'),
      'footer'  => esc_html__('Secondary menu', 'temabasegamb'),
    ));

    // HTML5
    add_theme_support('html5', array(
      'comment-form','comment-list','gallery','caption','style','script','navigation-widgets',
    ));

    // Logo
    add_theme_support('custom-logo', array(
      'height' => 100,
      'width'  => 300,
      'flex-width' => true,
      'flex-height'=> true,
      'unlink-homepage-logo' => true,
    ));

    // Customizer / Editor
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');
    add_theme_support('custom-line-height');
    add_theme_support('experimental-link-color');
    add_theme_support('custom-spacing');
    add_theme_support('custom-units');

    // Tamanhos de fonte do editor
    add_theme_support('editor-font-sizes', array(
      array('name'=>esc_html__('Extra small','temabasegamb'),'shortName'=>esc_html_x('XS','Font size','temabasegamb'),'size'=>16,'slug'=>'extra-small'),
      array('name'=>esc_html__('Small','temabasegamb'),'shortName'=>esc_html_x('S','Font size','temabasegamb'),'size'=>18,'slug'=>'small'),
      array('name'=>esc_html__('Normal','temabasegamb'),'shortName'=>esc_html_x('M','Font size','temabasegamb'),'size'=>20,'slug'=>'normal'),
      array('name'=>esc_html__('Large','temabasegamb'),'shortName'=>esc_html_x('L','Font size','temabasegamb'),'size'=>24,'slug'=>'large'),
      array('name'=>esc_html__('Extra large','temabasegamb'),'shortName'=>esc_html_x('XL','Font size','temabasegamb'),'size'=>40,'slug'=>'extra-large'),
      array('name'=>esc_html__('Huge','temabasegamb'),'shortName'=>esc_html_x('XXL','Font size','temabasegamb'),'size'=>96,'slug'=>'huge'),
      array('name'=>esc_html__('Gigantic','temabasegamb'),'shortName'=>esc_html_x('XXXL','Font size','temabasegamb'),'size'=>144,'slug'=>'gigantic'),
    ));

    // Paleta e gradientes
    $black='#000000'; $dark_gray='#28303D'; $gray='#39414D'; $green='#D1E4DD';
    $blue='#D1DFE4'; $purple='#D1D1E4'; $red='#E4D1D1'; $orange='#E4DAD1'; $yellow='#EEEADD'; $white='#FFFFFF';

    add_theme_support('editor-color-palette', array(
      array('name'=>esc_html__('Black','temabasegamb'),'slug'=>'black','color'=>$black),
      array('name'=>esc_html__('Dark gray','temabasegamb'),'slug'=>'dark-gray','color'=>$dark_gray),
      array('name'=>esc_html__('Gray','temabasegamb'),'slug'=>'gray','color'=>$gray),
      array('name'=>esc_html__('Green','temabasegamb'),'slug'=>'green','color'=>$green),
      array('name'=>esc_html__('Blue','temabasegamb'),'slug'=>'blue','color'=>$blue),
      array('name'=>esc_html__('Purple','temabasegamb'),'slug'=>'purple','color'=>$purple),
      array('name'=>esc_html__('Red','temabasegamb'),'slug'=>'red','color'=>$red),
      array('name'=>esc_html__('Orange','temabasegamb'),'slug'=>'orange','color'=>$orange),
      array('name'=>esc_html__('Yellow','temabasegamb'),'slug'=>'yellow','color'=>$yellow),
      array('name'=>esc_html__('White','temabasegamb'),'slug'=>'white','color'=>$white),
    ));

    add_theme_support('editor-gradient-presets', array(
      array('name'=>esc_html__('Purple to yellow','temabasegamb'),'gradient'=>"linear-gradient(160deg, $purple 0%, $yellow 100%)",'slug'=>'purple-to-yellow'),
      array('name'=>esc_html__('Yellow to purple','temabasegamb'),'gradient'=>"linear-gradient(160deg, $yellow 0%, $purple 100%)",'slug'=>'yellow-to-purple'),
      array('name'=>esc_html__('Green to yellow','temabasegamb'),'gradient'=>"linear-gradient(160deg, $green 0%, $yellow 100%)",'slug'=>'green-to-yellow'),
      array('name'=>esc_html__('Yellow to green','temabasegamb'),'gradient'=>"linear-gradient(160deg, $yellow 0%, $green 100%)",'slug'=>'yellow-to-green'),
      array('name'=>esc_html__('Red to yellow','temabasegamb'),'gradient'=>"linear-gradient(160deg, $red 0%, $yellow 100%)",'slug'=>'red-to-yellow'),
      array('name'=>esc_html__('Yellow to red','temabasegamb'),'gradient'=>"linear-gradient(160deg, $yellow 0%, $red 100%)",'slug'=>'yellow-to-red'),
      array('name'=>esc_html__('Purple to red','temabasegamb'),'gradient'=>"linear-gradient(160deg, $purple 0%, $red 100%)",'slug'=>'purple-to-red'),
      array('name'=>esc_html__('Red to purple','temabasegamb'),'gradient'=>"linear-gradient(160deg, $red 0%, $purple 100%)",'slug'=>'red-to-purple'),
    ));

    // Background padrão
    add_theme_support('custom-background', array('default-color'=>'d1e4dd'));

    // Starter content apenas no customizer
    if ( is_customize_preview() ) {
      require get_template_directory() . '/inc/starter-content.php';
      add_theme_support('starter-content', tema_base_gamb_get_starter_content());
    }
  }
}
add_action('after_setup_theme', 'tema_base_gamb_setup');

/* Largura de conteúdo */
function tema_base_gamb_content_width() {
  $GLOBALS['content_width'] = apply_filters('tema_base_gamb_content_width', 750);
}
add_action('after_setup_theme', 'tema_base_gamb_content_width', 0);

/* --------------------------------------------------------------------------
 * 3) Widgets
 * -------------------------------------------------------------------------- */
function tema_base_gamb_widgets_init() {
  register_sidebar(array(
    'name'          => esc_html__('Footer', 'temabasegamb'),
    'id'            => 'sidebar-1',
    'description'   => esc_html__('Add widgets here to appear in your footer.', 'temabasegamb'),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ));
}
add_action('widgets_init', 'tema_base_gamb_widgets_init');

/* --------------------------------------------------------------------------
 * 4) Assets front-end
 * -------------------------------------------------------------------------- */
function tema_base_gamb_scripts() {
  global $is_IE, $wp_scripts;

  if ( $is_IE ) {
    wp_enqueue_style('tema-base-gamb-style', get_template_directory_uri().'/assets/css/ie.css', array(), wp_get_theme()->get('Version'));
  } else {
    wp_enqueue_style('style-theme', get_template_directory_uri().'/style.css', array(), wp_get_theme()->get('Version'));
    wp_enqueue_style('bootstrap', get_stylesheet_directory_uri().'/assets/css/bootstrap.min.css', array(), null);
    wp_enqueue_style('slick', get_stylesheet_directory_uri().'/assets/css/slick.css', array(), null);
    wp_enqueue_style('slick-theme', get_stylesheet_directory_uri().'/assets/css/slick-theme.css', array(), null);
    wp_enqueue_style('animate', get_stylesheet_directory_uri().'/assets/css/animate.css', array(), null);
    wp_enqueue_style('bootstrap-icons', get_stylesheet_directory_uri().'/assets/fonts/bootstrap-icons.css', array(), null);
    wp_enqueue_style('fontAwesome', get_stylesheet_directory_uri().'/assets/fonts/fontAwesome/css/all.css', array(), null);
    wp_enqueue_style('roboto', get_stylesheet_directory_uri().'/assets/fonts/roboto/font-roboto.css', array(), null);

    // Fontes externas
    wp_enqueue_style('blacksword-font', 'https://fonts.cdnfonts.com/css/blacksword', array(), null);
    wp_enqueue_style('fira-sans', 'https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap', array(), null);
    wp_enqueue_style('diavlo-family', 'https://use.typekit.net/nez2mlc.css', array(), null);

    // Use a jQuery do WP para evitar conflitos
    wp_enqueue_script('jquery');

    wp_enqueue_script('bootstrap', get_stylesheet_directory_uri().'/assets/js/bootstrap.bundle.min.js', array('jquery'), null, true);
    wp_enqueue_script('popper', get_stylesheet_directory_uri().'/assets/js/popper.min.js', array('jquery'), null, true);
    wp_enqueue_script('slick', get_stylesheet_directory_uri().'/assets/js/slick.min.js', array('jquery'), null, true);
    wp_enqueue_script('wow', get_stylesheet_directory_uri().'/assets/js/wow.js', array(), null, true);
    wp_enqueue_script('scripts', get_stylesheet_directory_uri().'/assets/js/scripts.js', array('jquery'), null, true);
  }

  // RTL
  wp_style_add_data('tema-base-gamb-style', 'rtl', 'replace');

  // Print
  wp_enqueue_style('tema-base-gamb-print-style', get_template_directory_uri().'/assets/css/print.css', array(), wp_get_theme()->get('Version'), 'print');

  // Comentários aninhados
  if ( is_singular() && comments_open() && get_option('thread_comments') ) {
    wp_enqueue_script('comment-reply');
  }

  // Polyfills IE11
  wp_register_script('tema-base-gamb-ie11-polyfills-asset', get_template_directory_uri().'/assets/js/polyfills.js', array(), wp_get_theme()->get('Version'), true);
  wp_register_script('tema-base-gamb-ie11-polyfills', null, array(), wp_get_theme()->get('Version'), true);
  wp_add_inline_script('tema-base-gamb-ie11-polyfills',
    wp_get_script_polyfill($wp_scripts, array(
      'Element.prototype.matches && Element.prototype.closest && window.NodeList && NodeList.prototype.forEach' => 'tema-base-gamb-ie11-polyfills-asset',
    ))
  );

  // Menu primário
  if ( has_nav_menu('primary') ) {
    wp_enqueue_script('tema-base-gamb-primary-navigation-script', get_template_directory_uri().'/assets/js/primary-navigation.js', array('tema-base-gamb-ie11-polyfills'), wp_get_theme()->get('Version'), true);
  }

  // Embeds responsivos
  wp_enqueue_script('tema-base-gamb-responsive-embeds-script', get_template_directory_uri().'/assets/js/responsive-embeds.js', array('tema-base-gamb-ie11-polyfills'), wp_get_theme()->get('Version'), true);
}
add_action('wp_enqueue_scripts', 'tema_base_gamb_scripts');

/* Estilos/Scripts no admin */
function tpw_admin_styles() {
  wp_enqueue_style('tema-base-gamb-admin', get_template_directory_uri().'/style-admin.css', array(), null);
}
add_action('admin_head', 'tpw_admin_styles');

function tpw_admin_scripts() {
  wp_enqueue_script('tema-base-gamb-admin-scripts', get_stylesheet_directory_uri().'/assets/js/scripts.js', array('jquery'), null, true);
}
add_action('admin_head', 'tpw_admin_scripts');

/* Cabeçalhos de segurança */
function temabasegamb_security_headers() {
  header("X-Content-Type-Options: nosniff");
}
add_action('send_headers', 'temabasegamb_security_headers');

/* Editor de blocos — JS */
function temabasegamb_block_editor_script() {
  wp_enqueue_script('temabasegamb-editor', get_theme_file_uri('/assets/js/editor.js'), array('wp-blocks','wp-dom'), wp_get_theme()->get('Version'), true);
}
add_action('enqueue_block_editor_assets', 'temabasegamb_block_editor_script');

/* Skip link focus fix (IE11) — inline minificado ou debug */
function tema_base_gamb_skip_link_focus_fix() {
  if ( defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ) {
    echo '<script>'; include get_template_directory() . '/assets/js/skip-link-focus-fix.js'; echo '</script>';
  }
  ?>
  <script>
    /(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var e,t=location.hash.substring(1);/^[A-z0-9_-]+$/.test(t)&&(e=document.getElementById(t))&&(/^(?:a|select|input|button|textarea)$/i.test(e.tagName)||(e.tabIndex=-1),e.focus())},!1);
  </script>
  <?php
}
add_action('wp_print_footer_scripts', 'tema_base_gamb_skip_link_focus_fix');

/* CSS não-latino (inline) */
function tema_base_gamb_non_latin_languages() {
  if ( function_exists('tema_base_gamb_get_non_latin_css') ) {
    $custom_css = tema_base_gamb_get_non_latin_css('front-end');
    if ( $custom_css ) {
      wp_add_inline_style('tema-base-gamb-style', $custom_css);
    }
  }
}
add_action('wp_enqueue_scripts', 'tema_base_gamb_non_latin_languages');

/* --------------------------------------------------------------------------
 * 5) Requires (classes/inc)
 * -------------------------------------------------------------------------- */
require_once get_stylesheet_directory() . '/inc/enqueue-and-acf.php';
require get_template_directory() . '/classes/class-tema-base-gamb-svg-icons.php';
require get_template_directory() . '/classes/class-tema-base-gamb-custom-colors.php';
new Tema_Dev_Gamb_Custom_Colors();
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/menu-functions.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/classes/class-tema-base-gamb-customize.php';
new Tema_Dev_Gamb_Customize();
require get_template_directory() . '/inc/block-patterns.php';
require get_template_directory() . '/inc/block-styles.php';
require_once get_template_directory() . '/classes/class-tema-base-gamb-dark-mode.php';
new Tema_Dev_Gamb_Dark_Mode();

/* Customizer JS */
function temabasegamb_customize_preview_init() {
  wp_enqueue_script('temabasegamb-customize-helpers', get_theme_file_uri('/assets/js/customize-helpers.js'), array(), wp_get_theme()->get('Version'), true);
  wp_enqueue_script('temabasegamb-customize-preview', get_theme_file_uri('/assets/js/customize-preview.js'), array('customize-preview','customize-selective-refresh','jquery','temabasegamb-customize-helpers'), wp_get_theme()->get('Version'), true);
}
add_action('customize_preview_init', 'temabasegamb_customize_preview_init');

function temabasegamb_customize_controls_enqueue_scripts() {
  wp_enqueue_script('temabasegamb-customize-helpers', get_theme_file_uri('/assets/js/customize-helpers.js'), array(), wp_get_theme()->get('Version'), true);
}
add_action('customize_controls_enqueue_scripts', 'temabasegamb_customize_controls_enqueue_scripts');

/* HTML classes helper */
function temabasegamb_the_html_classes() {
  $classes = apply_filters('temabasegamb_html_classes', '');
  if ( $classes ) echo 'class="'. esc_attr($classes) .'"';
}

/* Classe is-IE no body */
function temabasegamb_add_ie_class() { ?>
  <script>
    if (navigator.userAgent.indexOf('MSIE')!==-1 || navigator.appVersion.indexOf('Trident/')!==-1) {
      document.body.classList.add('is-IE');
    }
  </script>
<?php }
add_action('wp_footer', 'temabasegamb_add_ie_class');

/* --------------------------------------------------------------------------
 * 6) Post Types & Taxonomias
 * -------------------------------------------------------------------------- */
function create_post_types() {

  // Conteúdo
  register_post_type('conteudo', array(
    'label' => __('Conteúdo','temabasegamb'),
    'labels' => array(
      'name'=>__('Conteúdo','temabasegamb'),
      'singular_name'=>__('Conteúdo','temabasegamb'),
      'all_items'=>__('Todos','temabasegamb'),
      'add_new'=>__('Novo','temabasegamb'),
      'new_item'=>__('Novo Conteúdo','temabasegamb'),
      'edit_item'=>__('Editar Conteúdo','temabasegamb'),
      'view_item'=>__('Ver Conteúdo','temabasegamb'),
      'search_items'=>__('Procurar Conteúdo','temabasegamb'),
      'not_found'=>__('Nenhum Conteúdo encontrado','temabasegamb'),
      'not_found_in_trash'=>__('Nenhum Conteúdo encontrado na lixeira','temabasegamb'),
      'menu_name'=>__('Conteúdo','temabasegamb'),
    ),
    'public'=>true,
    'publicly_queryable'=>true,
    'show_ui'=>true,
    'show_in_rest'=>true,
    'has_archive'=>false,
    'show_in_menu'=>false,
    'show_in_nav_menus'=>false,
    'exclude_from_search'=>true,
    'capability_type'=>'post',
    'map_meta_cap'=>true,
    'hierarchical'=>true,
    'rewrite'=>array('slug'=>'conteudo','with_front'=>true),
    'query_var'=>true,
    'menu_position'=>3,
    'menu_icon'=>'dashicons-admin-customizer',
    'supports'=>array('title'),
  ));

  // Banner
  register_post_type('banner', array(
    'label'=>__('Banner','temabasegamb'),
    'labels'=>array(
      'name'=>__('Banner','temabasegamb'),
      'singular_name'=>__('Banner','temabasegamb'),
      'all_items'=>__('Todos','temabasegamb'),
      'add_new'=>__('Novo','temabasegamb'),
      'add_new_item'=>__('Novo Banner','temabasegamb'),
      'new_item'=>__('Novo Banner','temabasegamb'),
      'edit_item'=>__('Editar Banner','temabasegamb'),
      'view_item'=>__('Ver Banner','temabasegamb'),
      'search_items'=>__('Procurar Banner','temabasegamb'),
      'not_found'=>__('Nenhum Banner encontrado','temabasegamb'),
      'not_found_in_trash'=>__('Nenhum Banner encontrado na lixeira','temabasegamb'),
      'menu_name'=>__('Banner','temabasegamb'),
    ),
    'public'=>true,
    'publicly_queryable'=>true,
    'show_ui'=>true,
    'delete_with_user'=>false,
    'show_in_rest'=>true,
    'has_archive'=>false,
    'show_in_menu'=>true,
    'show_in_nav_menus'=>true,
    'exclude_from_search'=>true,
    'capability_type'=>'post',
    'map_meta_cap'=>true,
    'hierarchical'=>true,
    'rewrite'=>array('slug'=>'banner','with_front'=>true),
    'query_var'=>true,
    'menu_position'=>5,
    'menu_icon'=>'dashicons-cover-image',
    'supports'=>array('title'),
  ));

  // Projetos
  register_post_type('projetos', array(
    'label'=>__('Projetos','temabasegamb'),
    'labels'=>array(
      'name'=>__('Projetos','temabasegamb'),
      'singular_name'=>__('Projeto','temabasegamb'),
      'all_items'=>__('Todos','temabasegamb'),
      'add_new'=>__('Novo','temabasegamb'),
      'add_new_item'=>__('Add Novo','temabasegamb'),
      'new_item'=>__('Novo','temabasegamb'),
      'edit_item'=>__('Editar','temabasegamb'),
      'view_item'=>__('Ver','temabasegamb'),
      'search_items'=>__('Procurar','temabasegamb'),
      'not_found'=>__('Nenhum item encontrado','temabasegamb'),
      'not_found_in_trash'=>__('Nenhum item encontrado na lixeira','temabasegamb'),
      'menu_name'=>__('Projetos','temabasegamb'),
    ),
    'public'=>true,
    'publicly_queryable'=>true,
    'show_ui'=>true,
    'delete_with_user'=>false,
    'show_in_rest'=>true,
    'has_archive'=>true,
    'show_in_menu'=>true,
    'show_in_nav_menus'=>true,
    'exclude_from_search'=>true,
    'capability_type'=>'post',
    'map_meta_cap'=>true,
    'hierarchical'=>true,
    'rewrite'=>array('slug'=>'projetos','with_front'=>true),
    'query_var'=>true,
    'menu_position'=>8,
    'menu_icon'=>'dashicons-table-col-after',
    'supports'=>array('title'),
  ));

  // Clientes
  register_post_type('clientes', array(
    'label'=>__('Clientes','temabasegamb'),
    'labels'=>array(
      'name'=>__('Clientes','temabasegamb'),
      'singular_name'=>__('Cliente','temabasegamb'),
      'all_items'=>__('Todos','temabasegamb'),
      'add_new'=>__('Novo','temabasegamb'),
      'add_new_item'=>__('Novo Cliente','temabasegamb'),
      'new_item'=>__('Novo Cliente','temabasegamb'),
      'edit_item'=>__('Editar Cliente','temabasegamb'),
      'view_item'=>__('Ver Cliente','temabasegamb'),
      'search_items'=>__('Procurar Cliente','temabasegamb'),
      'not_found'=>__('Nenhum Cliente encontrado','temabasegamb'),
      'not_found_in_trash'=>__('Nenhum Cliente encontrado na lixeira','temabasegamb'),
      'menu_name'=>__('Clientes','temabasegamb'),
    ),
    'public'=>true,
    'publicly_queryable'=>true,
    'show_ui'=>true,
    'delete_with_user'=>false,
    'show_in_rest'=>true,
    'has_archive'=>false,
    'show_in_menu'=>true,
    'show_in_nav_menus'=>true,
    'exclude_from_search'=>true,
    'capability_type'=>'post',
    'map_meta_cap'=>true,
    'hierarchical'=>true,
    'rewrite'=>array('slug'=>'clientes','with_front'=>true),
    'query_var'=>true,
    'menu_position'=>10,
    'menu_icon'=>'dashicons-buddicons-buddypress-logo',
    'supports'=>array('title'),
  ));
}
add_action('init','create_post_types');

/* CPT: Serviços (com slug dinâmico pela taxonomia) */
function register_post_type_servicos() {
  register_post_type('servicos', array(
    'label'=>__('Serviços','temabasegamb'),
    'labels'=>array(
      'name'=>__('Serviços','temabasegamb'),
      'singular_name'=>__('Serviço','temabasegamb'),
      'all_items'=>__('Todos','temabasegamb'),
      'add_new'=>__('Novo','temabasegamb'),
      'add_new_item'=>__('Novo','temabasegamb'),
      'new_item'=>__('Novo','temabasegamb'),
      'edit_item'=>__('Editar','temabasegamb'),
      'view_item'=>__('Ver','temabasegamb'),
      'search_items'=>__('Procurar','temabasegamb'),
      'not_found'=>__('Nenhum item encontrado','temabasegamb'),
      'not_found_in_trash'=>__('Nenhum item encontrado na lixeira','temabasegamb'),
      'menu_name'=>__('Serviços','temabasegamb'),
    ),
    'public'=>true,
    'publicly_queryable'=>true,
    'show_ui'=>true,
    'has_archive'=>true,
    'show_in_menu'=>true,
    'show_in_nav_menus'=>true,
    'exclude_from_search'=>false,
    'capability_type'=>'post',
    'hierarchical'=>false,
    'rewrite'=>array('slug'=>'servicos/%especialidade%','with_front'=>true),
    'query_var'=>true,
    'menu_position'=>3,
    'menu_icon'=>'dashicons-editor-ol',
    'supports'=>array('title','editor','thumbnail'),
  ));
}
add_action('init','register_post_type_servicos');

/* Taxonomias */
function create_taxonomys() {

  // Categoria Banner
  register_taxonomy('category_banner', array('banner'), array(
    'label'=>__('Categoria','temabasegamb'),
    'labels'=>array('name'=>__('Categoria','temabasegamb'),'singular_name'=>__('Categoria','temabasegamb')),
    'public'=>true,
    'publicly_queryable'=>true,
    'hierarchical'=>true,
    'show_ui'=>true,
    'show_in_menu'=>true,
    'show_in_nav_menus'=>true,
    'query_var'=>true,
    'rewrite'=>array('slug'=>'category_banner','with_front'=>true,'hierarchical'=>true),
    'show_admin_column'=>true,
    'show_in_rest'=>true,
    'rest_base'=>'category_banner',
  ));

  // Especialidade (para Serviços)
  register_taxonomy('especialidade', array('servicos'), array(
    'label'=>__('Categoria Serviço','temabasegamb'),
    'labels'=>array('name'=>__('Categoria Serviço','temabasegamb'),'singular_name'=>__('Categoria Serviço','temabasegamb')),
    'public'=>true,
    'publicly_queryable'=>true,
    'hierarchical'=>true,
    'show_ui'=>true,
    'show_in_menu'=>true,
    'query_var'=>true,
    'rewrite'=>array('slug'=>'especialidade','with_front'=>true),
    'show_admin_column'=>true,
    'show_in_rest'=>true,
    'rest_base'=>'especialidade',
  ));
}
add_action('init','create_taxonomys');

/* Slug dinâmico dos serviços com a taxonomia */
function temabasegamb_filter_post_type_link($post_link, $post) {
  if ( 'servicos' === $post->post_type ) {
    $terms = get_the_terms($post->ID, 'especialidade');
    $slug  = ( $terms && ! is_wp_error($terms) ) ? current($terms)->slug : 'uncategorized';
    return str_replace('%especialidade%', $slug, $post_link);
  }
  return $post_link;
}
add_filter('post_type_link', 'temabasegamb_filter_post_type_link', 10, 2);

/* Classe no admin quando CPT conteudo */
function temabasegamb_admin_body_class($classes) {
  if ( is_admin() && isset($_GET['post_type']) && $_GET['post_type']==='conteudo' ) {
    $classes .= ' parent-class-conteudo';
  }
  return $classes;
}
add_filter('admin_body_class', 'temabasegamb_admin_body_class');

/* --------------------------------------------------------------------------
 * 7) Login page custom
 * -------------------------------------------------------------------------- */
function gamberine_login_edit() {
  echo '<style type="text/css">
    h1{background:url('.get_bloginfo('template_directory').'/imagens/logo.png) 50% 50% no-repeat!important;width:auto!important;background-size:contain!important;height:130px!important;}
    body{background:linear-gradient(212deg,#383836 25%,#313131 88%)!important;}
    .login h1{height:130px!important;margin-bottom:2rem;}
    form.admin-email-confirm-form h1{background:none!important;height:auto!important;}
    .login h1 a,.language-switcher{display:none!important;}
    .wp-core-ui .button-primary{background:#13706F!important;border-color:transparent;box-shadow:none;border:0;border-radius:10px!important;color:#fff!important;text-decoration:none;text-shadow:none;transition:all .3s!important;}
    .wp-core-ui .button-primary:hover{background:#187c72!important;opacity:.9;border:0!important;transition:all .3s!important;}
    .wp-core-ui .button-group.button-large .button,.wp-core-ui .button.button-large{min-height:40px;padding:0 2vw;}
    input[type=color],input[type=date],input[type=datetime-local],input[type=datetime],input[type=email],input[type=month],input[type=number],input[type=password],input[type=search],input[type=tel],input[type=text],input[type=time],input[type=url],input[type=week],select,textarea{border:1px solid #13706F!important;outline:none!important;}
    input[type=checkbox]:focus,input[type=color]:focus,input[type=date]:focus,input[type=datetime-local]:focus,input[type=datetime]:focus,input[type=email]:focus,input[type=month]:focus,input[type=number]:focus,input[type=password]:focus,input[type=radio]:focus,input[type=search]:focus,input[type=tel]:focus,input[type=text]:focus,input[type=time]:focus,input[type=url]:focus,input[type=week]:focus,select:focus,textarea:focus{outline-color:#13706F!important;box-shadow:none!important;border:1px solid #13706F!important;outline:none!important;border-radius:3px;}
    .wp-core-ui .button,.wp-core-ui .button-secondary{border:0;transition:all .3s!important;}
    input[type=checkbox],input[type=radio]{border:1px solid #13706F!important;}
    input[type=checkbox]:checked::before{filter:brightness(0);}
    .login #login_error,.login .message,.login .success{border-left:1px solid #13706F!important;}
    #login{padding:2% 0 0!important;}
    .login #nav{float:right;margin-block:1rem!important;}
    .login #nav a:hover,.login h1:hover{color:#187c72!important;transition:all .3s!important;}
    .login form{border:1px solid #fff;box-shadow:5px 5px 10px rgba(0,0,0,.08);color:#444343;border-radius:10px;margin-top:10px;}
    .login .button.wp-hide-pw .dashicons{color:#13706F;}
    .login #backtoblog{background:#6CAAC6!important;color:#fff;height:40px;display:flex;align-items:center;justify-content:center;width:80%;margin:0 auto;margin-top:1rem;margin-bottom:2rem;border-radius:10px;transition:all .3s!important;}
    .login #backtoblog:hover{background:#6CAAC68f!important;transition:all .3s!important;}
    .login #backtoblog a{color:#fff!important;transition:none!important;}
    .login #backtoblog a:hover{color:#13706F!important;transition:all .3s!important;}
  </style>';
}
add_action('login_head', 'gamberine_login_edit');

/* --------------------------------------------------------------------------
 * 8) Papéis / Permissões / Admin UI
 * -------------------------------------------------------------------------- */

/* Renomeia rótulo de Administrator exibido */
function renomear_funcao_administrador($roles) {
  if ( isset($roles['administrator']) ) {
    $roles['administrator']['name'] = 'Super Admin';
  }
  return $roles;
}
add_filter('editable_roles', 'renomear_funcao_administrador');

function renomear_funcao_administrador_dropdown($role) {
  return $role === 'Administrator' ? 'Super-Admin' : $role;
}
add_filter('role_names', 'renomear_funcao_administrador_dropdown');

/* Cria função Administrador Site */
function criar_funcao_administrador_site() {
  if ( ! get_role('administrador_site') ) {
    add_role('administrador_site', __('Administrador Site','temabasegamb'), array(
      'read'=>true,'edit_posts'=>true,'delete_posts'=>true,'publish_posts'=>true,'upload_files'=>true,'manage_categories'=>true,
      'install_plugins'=>true,'activate_plugins'=>true,'edit_plugins'=>true,'delete_plugins'=>true,
      'install_themes'=>false,'edit_themes'=>false,'delete_themes'=>false,
      'list_users'=>true,'edit_users'=>true,'delete_users'=>true,'create_users'=>true,'promote_users'=>true,
      'manage_options'=>true,'edit_dashboard'=>true,'update_core'=>false,'update_plugins'=>true,'update_themes'=>false,'manage_links'=>true,'edit_files'=>true,
      'edit_private_posts'=>true,'edit_published_posts'=>true,'delete_private_posts'=>true,'delete_published_posts'=>true,
      'publish_pages'=>true,'edit_pages'=>true,'delete_pages'=>true,'edit_private_pages'=>true,'delete_private_pages'=>true,'edit_published_pages'=>true,'delete_published_pages'=>true,
      'unfiltered_html'=>false,'edit_theme_options'=>false
    ));
  }
}
add_action('init','criar_funcao_administrador_site');

function atribuir_funcao_administrador_site($user_id) {
  $user = new WP_User($user_id);
  $user->set_role('administrador_site');
}
add_action('user_register','atribuir_funcao_administrador_site');

/* Remove funções padrão */
function remover_funcoes_padrao() {
  if ( get_role('administrador_comum') ) remove_role('administrador_comum');
  if ( get_role('contributor') ) remove_role('contributor');
  if ( get_role('author') ) remove_role('author');
}
add_action('init','remover_funcoes_padrao');

/* Ocultar itens/avisos para não-super-admin */
function cwp_desativa_comentarios_admin_menu() {
  if ( ! current_user_can('add_users') ) {

    // Core/Plugin updates notices
    remove_action('init','wp_version_check');
    add_filter('pre_option_update_core','__return_null');

    add_action('admin_init', function(){
      remove_action('admin_init','wp_update_plugins');
      remove_action('admin_init','wp_update_plugins', 2);
      remove_action('init','wp_update_plugins', 2);
    });
    add_filter('pre_option_update_plugins','__return_null');

    add_action('wp_before_admin_bar_render', function(){
      global $wp_admin_bar;
      $wp_admin_bar->remove_menu('updates');
    });

    add_action('admin_head', function(){
      global $menu, $submenu, $user_ID;
      unset($menu[25]); // Comentários
      unset($menu[60]); // Aparência
      if ( isset($submenu['index.php'][10]) ) unset($submenu['index.php'][10]); // Painel -> Atualização
      if ( $user_ID != 99 ) {
        remove_menu_page('plugin-editor.php');
      }
    });

    add_action('wp_before_admin_bar_render', function(){
      global $wp_admin_bar;
      foreach ( array('wp-logo','about','wporg','documentation','support-forums','feedback','comments','archive') as $node ) {
        $wp_admin_bar->remove_menu($node);
      }
    });
  }
}
add_action('admin_menu','cwp_desativa_comentarios_admin_menu');

/* Reordenar menu do admin */
add_filter('custom_menu_order', '__return_true');
function my_new_admin_menu_order($menu_order) {
  $new_positions = array(
    'upload.php'               => 15,
    'edit.php?post_type=page'  => 1
  );
  $move = function(&$array, $from, $to) {
    $out = array_splice($array, $from, 1);
    array_splice($array, $to, 0, $out);
  };
  foreach($new_positions as $slug=>$new_index){
    if ( false !== ($current_index = array_search($slug, $menu_order)) ) {
      $move($menu_order, $current_index, $new_index);
    }
  }
  return $menu_order;
}
add_filter('menu_order','my_new_admin_menu_order');

/* --------------------------------------------------------------------------
 * 9) ACF, filtros utilitários e shortcodes
 * -------------------------------------------------------------------------- */

/* ACF JSON */
add_filter('acf/settings/save_json', function($path){
  return get_stylesheet_directory().'/acf-json';
});
add_filter('acf/settings/load_json', function($paths){
  unset($paths[0]);
  $paths[] = get_stylesheet_directory().'/acf-json';
  return $paths;
});

/* ACF: campo imagem default (render setting) */
function add_default_value_to_image_field($field){
  if ( function_exists('acf_render_field_setting') ) {
    acf_render_field_setting($field, array(
      'label'=>__('Default Image ID','acf'),
      'instructions'=>__('Appears when creating a new post','acf'),
      'type'=>'image',
      'name'=>'default_value',
    ));
  }
}
add_action('acf/render_field_settings/type=image','add_default_value_to_image_field',20);

/* Excerpt curto */
function custom_short_excerpt($excerpt){ return substr($excerpt, 0, 200); }
add_filter('the_excerpt','custom_short_excerpt');

/* Remover meta generator */
remove_action('wp_head','wp_generator');

/* Rodapé Admin */
function bl_admin_footer(){
  echo 'Desenvolvido por <a href="https://gamberine.com.br" target="_blank" rel="noopener">Gamberine Comunicação Digital</a>';
}
add_filter('admin_footer_text','bl_admin_footer');

/* Logos no site footer (se usados por filtros do tema) */
function bl_site_footer_logo(){ echo '<a href="https://gamberine.com.br" target="_blank" rel="noopener"><img src="'.get_bloginfo('template_directory').'/imagens/logoGamberine.png"/></a>'; }
add_filter('site_footer_text','bl_site_footer_logo');

function bl_site_footer_se(){ echo '<a href="https://secomunicacao.com.br" target="_blank" rel="noopener"><img src="'.get_bloginfo('template_directory').'/imagens/logoSe.png"/></a>'; }
add_filter('site_footer_text','bl_site_footer_se');

/* Contact Form 7 autocomplete off */
add_filter('wpcf7_form_autocomplete', function($autocomplete){ return 'off'; }, 10, 1);

/* Editor clássico para posts */
add_filter('use_block_editor_for_post','__return_false', 10);

/* Classe por navegador */
function detect_browser($classes){
  global $is_gecko,$is_IE,$is_opera,$is_safari,$is_chrome,$is_iphone,$is_edge;
  if ($is_opera)   $classes[]='opera';
  elseif ($is_safari) $classes[]='safari';
  elseif ($is_chrome) $classes[]='chrome';
  elseif ($is_edge)   $classes[]='edge';
  elseif ($is_IE)     $classes[]='ie';
  elseif ($is_gecko)  $classes[]='firefox';
  if ($is_iphone)     $classes[]='ios-app';
  return $classes;
}
add_filter('body_class','detect_browser');

/* idioma como classe */
function add_lang_class_to_body($classes){
  $current_lang = get_bloginfo('language'); // ex: pt-BR
  $classes[] = 'lang-'. sanitize_title_with_dashes($current_lang);
  return $classes;
}
add_filter('body_class','add_lang_class_to_body');

/* Forçar EN no domínio .com (mantido como no original) */
function set_lang_english_for_com_domain(){ ?>
  <script>
    if (location.hostname.indexOf(".br") === -1) {
      document.documentElement.lang = "en";
      document.addEventListener("DOMContentLoaded", function () {
        document.body.classList.forEach(function(cls){
          if (cls.indexOf("lang-") === 0) document.body.classList.remove(cls);
        });
        document.body.classList.add("lang-en");
      });
    }
  </script>
<?php }
add_action('wp_head','set_lang_english_for_com_domain');

/* Scroll menu ativo */
function enqueue_scroll_menu_script() {
  wp_enqueue_script('scroll-menu', get_template_directory_uri().'/assets/js/scroll-menu-active.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts','enqueue_scroll_menu_script');

/* Shortcode: título de página */
function shortcode_titulo_pagina() {
  return is_page() ? '<h1>'. get_the_title() .'</h1>' : '';
}
add_shortcode('titulo_pagina','shortcode_titulo_pagina');

/* Link direto de edição no admin (menu Conteúdo -> post 38) */
function adicionar_links_dinamicos_menu() {
  $post_id_1 = 38;
  $edit_link_1 = admin_url("post.php?post=$post_id_1&action=edit");
  add_menu_page('Edição de Conteúdos','Conteúdo','edit_posts',$edit_link_1,'','dashicons-edit',2);
}
add_action('admin_menu','adicionar_links_dinamicos_menu');

/* --------------------------------------------------------------------------
 * 10) Editor helpers diversos
 * -------------------------------------------------------------------------- */

/* Script para IE class já foi adicionado acima */

/* FIM functions.php reestruturado */
