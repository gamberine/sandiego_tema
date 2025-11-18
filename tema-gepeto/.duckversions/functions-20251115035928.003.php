<?php
/**
 * Funções do tema Gepeto SD - 03-43
 */
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

/**
 * Configurações básicas do tema.
 */
/**
 * Configurações básicas do tema.
 */
add_action('after_setup_theme', function () {
  load_theme_textdomain('temabasegamb', get_template_directory() . '/languages');

  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('automatic-feed-links');
  add_theme_support('html5', ['search-form','comment-form','comment-list','gallery','caption','style','script','navigation-widgets']);
  add_theme_support('customize-selective-refresh-widgets');
  add_theme_support('responsive-embeds');
  add_theme_support('custom-logo', [
    'height'      => 100,
    'width'       => 300,
    'flex-height' => true,
    'flex-width'  => true,
  ]);

  register_nav_menus([
    'primary'   => __('Menu Principal', 'temabasegamb'),
    'secondary' => __('Menu Internas', 'temabasegamb'),
    'footer'    => __('Menu Rodapé', 'temabasegamb'),
  ]);

  // Starter content apenas no customizer
  // if ( is_customize_preview() ) {
  //   require get_template_directory() . '/inc/starter-content.php';
  //   add_theme_support('starter-content', tema_base_gamb_get_starter_content());
  // }
});


// Garantir que as funções base estejam carregadas
// if ( !function_exists( 'tema_base_gamb_get_icon_svg' ) ) {
//   require_once get_template_directory() . '/inc/class-tema-base-gamb-svg-icons.php';
// }



// * --------------------------------------------------------------------------
//  * 5) Requires (classes/inc)
//  * -------------------------------------------------------------------------- */
require_once get_stylesheet_directory() . '/inc/enqueue-and-acf.php';
require get_template_directory() . '/inc/class-tema-base-gamb-svg-icons.php';
require get_template_directory() . '/inc/class-tema-base-gamb-custom-colors.php';
require get_template_directory() . '/inc/class-tema-base-gamb-customize.php';
require_once get_template_directory() . '/inc/class-tema-base-gamb-dark-mode.php';
new Tema_Dev_Gamb_Custom_Colors();
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/menu-functions.php';
require get_template_directory() . '/inc/template-tags.php';
new Tema_Dev_Gamb_Customize();
require get_template_directory() . '/inc/block-patterns.php';
require get_template_directory() . '/inc/block-styles.php';
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

/**
 * Carrega scripts e estilos (Bootstrap, Slick, CSS personalizado)
 */
add_action('wp_enqueue_scripts', function () {
  // Bootstrap
  wp_enqueue_style( 'sd-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', [], '5.3.3' );
  wp_enqueue_script( 'sd-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', ['jquery'], '5.3.3', true );

  // Slick Carousel
  wp_enqueue_style( 'sd-slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', [], '1.8.1' );
  wp_enqueue_style( 'sd-slick-theme', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', ['sd-slick'], '1.8.1' );
  wp_enqueue_script( 'sd-slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', ['jquery'], '1.8.1', true );

  // Estilos do tema
  wp_enqueue_style( 'sd-font-diavlo', 'https://use.typekit.net/nez2mlc.css', [], null );
  wp_enqueue_style( 'sd-font-fira', 'https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap', [], null );
  wp_enqueue_style( 'sd-variaveis', get_stylesheet_directory_uri() . '/assets/css/style-variaveis.css', [], '1.0.0' );
  wp_enqueue_style( 'sd-style-base', get_stylesheet_directory_uri() . '/assets/css/style-base.css', [], '1.0.0' );

  // JS personalizado
  wp_enqueue_script( 'sd-theme-js', get_stylesheet_directory_uri() . '/assets/js/sandiego.js', ['jquery','sd-slick'], '1.0.0', true );
  wp_enqueue_script( 'scripts-js', get_stylesheet_directory_uri() . '/assets/js/scripts.js', ['jquery','scripts'], '1.0.0', true );
});

/* ===== Estilos e Scripts no ADMIN ===== */
function wgm_admin_assets($hook) {

    // CSS do admin
    wp_enqueue_style(
        'sd-style-admin',
        get_template_directory_uri() . '/assets/css/style-admin.css',
        [],
        '1.0.0'
    );

    // JS do admin
    wp_enqueue_script(
        'sd-scripts-admin',
        get_template_directory_uri() . '/assets/js/script-admin.js',
        ['jquery'],
        '1.0.0',
        true
    );
}
add_action('admin_enqueue_scripts', 'wgm_admin_assets');



/**
 * Registra Custom Post Types e Taxonomias - gamberine
 */
add_action('init', function () {
// Post type Conteúdo 
register_post_type('conteudo', [
  'labels' => [
    'name'               => 'Conteúdo',
    'singular_name'      => 'Conteúdo',
    'add_new_item'       => 'Adicionar novo Conteúdo',
    'edit_item'          => 'Editar Conteúdo',
    'new_item'           => 'Novo Conteúdo',
    'view_item'          => 'Ver Conteúdo',
    'search_items'       => 'Buscar Conteúdo',
    'not_found'          => 'Nenhum Conteúdo encontrado',
    'not_found_in_trash' => 'Nenhum Conteúdo encontrado na lixeira',
  ],
  'public'       => true,
  'show_in_rest' => true,
  'has_archive'  => false,
  'show_in_menu' => false, // Mostrar no menu
  'show_in_nav_menus' => false, // Não mostrar em menus de navegação
  'exclude_from_search' => true,
  'menu_icon'    => 'dashicons-admin-customizer',
  'supports'     => ['title','editor','thumbnail','excerpt','revisions'],
  'rewrite'      => ['slug'=>'conteudo'],
]);

// Post type Banner
register_post_type('banner', [
  'labels' => [
    'name'               => 'Banner',
    'singular_name'      => 'Banner',
    'add_new_item'       => 'Adicionar novo Banner',
    'edit_item'          => 'Editar Banner',
    'new_item'           => 'Novo Banner',
    'view_item'          => 'Ver Banner',
    'search_items'       => 'Buscar Banner',
    'not_found'          => 'Nenhum Banner encontrado',
    'not_found_in_trash' => 'Nenhum Banner encontrado na lixeira',
  ],
  'public'       => true,
  'has_archive'  => false,
  'menu_icon'    => 'dashicons-cover-image',
  'supports'     => ['title','editor','thumbnail','excerpt','revisions'],
  'rewrite'      => ['slug'=>'banner'],
  'show_in_rest' => true,
]);


  // Post type Hotéis
  register_post_type('hoteis', [
    'labels' => [
      'name'          => 'Hotéis',
      'singular_name' => 'Hotel',
      'add_new_item'  => 'Adicionar novo Hotel',
      'edit_item'     => 'Editar Hotel',
      'new_item'      => 'Novo Hotel',
      'view_item'     => 'Ver Hotel',
      'search_items'  => 'Buscar Hotéis',
      'not_found'     => 'Nenhum Hotel encontrado',
      'not_found_in_trash' => 'Nenhum Hotel encontrado na lixeira'
    ],
    'public'       => true,
    'has_archive'  => true,
    'menu_icon'    => 'dashicons-building',
    'supports'     => ['title','editor','thumbnail','excerpt','revisions'],
    'rewrite'      => ['slug'=>'hoteis'],
    'show_in_rest' => true,
  ]);

  // Post type Acomodação
  register_post_type('acomodacao', [
    'labels' => [
      'name'          => 'Acomodações',
      'singular_name' => 'Acomodação'
    ],
    'public'       => true,
    'menu_icon'    => 'dashicons-welcome-learn-more',
    'supports'     => ['title','editor','thumbnail','excerpt','revisions'],
    'rewrite'      => ['slug'=>'acomodacoes'],
    'show_in_rest' => true,
  ]);

  // Post type Depoimento
  register_post_type('depoimento', [
    'labels' => [
      'name'          => 'Depoimentos',
      'singular_name' => 'Depoimento'
    ],
    'public'       => true,
    'menu_icon'    => 'dashicons-format-quote',
    'supports'     => ['title','editor','thumbnail','revisions'],
    'show_in_rest' => true,
  ]);

  // Taxonomia Comodidades para Hotéis
  register_taxonomy('hotel_feature', ['hoteis'], [
    'labels' => [
      'name'          => 'Comodidades',
      'singular_name' => 'Comodidade',
    ],
    'public'       => true,
    'hierarchical' => false,
    'show_in_rest' => true,
  ]);
});

/**
 * Shortcode: [sd_copy text="..."] – Botão de cópia
 */
function sd_shortcode_copy( $atts ) {
  $a = shortcode_atts(['text' => ''], $atts);
  $text = esc_attr($a['text']);
  ob_start();
  ?>
  <button class="sd-copy btn btn-sm btn-outline-secondary" data-copy="<?php echo $text; ?>" title="Copiar">
    <svg xmlns="https://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
      <path d="M10 1.5H6a.5.5 0 0 0-.5.5v1h5V2a.5.5 0 0 0-.5-.5"/>
      <path d="M4.5 3a1 1 0 0 1 1-1h.5v1a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2h.5a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1h-6a1 1 0 0 1-1-1z"/>
    </svg>
  </button>
  <?php
  return ob_get_clean();
}
add_shortcode('sd_copy','sd_shortcode_copy');

/**
 * Função auxiliar para obter campos ACF com valor padrão
 *
 * @param string $key     O nome do campo ACF
 * @param int|null $post_id O ID do post (null = global)
 * @param mixed $default  Valor padrão se o campo estiver vazio
 * @return mixed
 */
function sd_field( $key, $post_id = null, $default = '' ) {
  if ( function_exists('get_field') ) {
    $value = get_field($key, $post_id);
    if ( $value !== null && $value !== '' ) {
      return $value;
    }
  }
  return $default;
}

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
function wgm_desativa_comentarios_admin_menu() {
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
add_action('admin_menu','wgm_desativa_comentarios_admin_menu');


/* Reordenar menu do admin */
add_filter('custom_menu_order', '__return_true');
function wgm_new_admin_menu_order($menu_order) {
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
add_filter('menu_order','wgm_new_admin_menu_order');


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

/* --------------------- */

// Add Last Modified Column
add_filter('manage_posts_columns', function ($columns) {
  $columns['last_modified'] = __('Last Modified');
  return $columns;
});

add_action('manage_posts_custom_column', function ($column, $post_id) {
  if ('last_modified' === $column) {
    $modified_time = get_the_modified_time('Y/m/d g:i:s a', $post_id);
    echo esc_html($modified_time);
  }
}, 10, 2);

/* FIM functions.php reestruturado */
