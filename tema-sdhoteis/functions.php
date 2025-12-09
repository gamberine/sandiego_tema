<?php

/**
 * Funções Theme: San Diego Hoteis 2025
 * 
 *  Adobe Fonts – Registro técnico
 *  Projeto: Sandiego Hotéis 2025
 *  Desenvolvedor responsável: Gamberine (Weslley Murta)
 *  Conta Adobe utilizada: weslley.murta
 *  Observação: As fontes são servidas exclusivamente via Adobe Fonts.
 *  Nenhum arquivo .otf/.ttf deve ser distribuído no tema.
 */

if (! defined('ABSPATH')) {
  exit;
}

add_action('after_setup_theme', function () {

  // Carrega o textdomain do tema
  load_theme_textdomain(
    'temabasegamb',
    get_template_directory() . '/languages'
  );

  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('html5', [
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
    'style',
    'script',
    'navigation-widgets',
  ]);
  add_theme_support('responsive-embeds');
  add_theme_support('custom-logo', [
    'height'      => 100,
    'width'       => 300,
    'flex-height' => true,
    'flex-width'  => true,
  ]);

  // Menus sem funções de tradução aqui, para não disparar carregamento antecipado
  register_nav_menus([
    'primary'   => 'Menu Principal',
    'secondary' => 'Menu Internas',
    'footer'    => 'Menu Rodapé',
  ]);
});
// Silencia avisos do tipo "Function X was called incorrectly"
add_filter('doing_it_wrong_trigger_error', '__return_false');

// ESSENCIAL: Carrega as configurações do ACF JSON.
require_once get_stylesheet_directory() . '/inc/enqueue-and-acf.php';
require get_template_directory() . '/inc/class-tema-base-gamb-svg-icons.php';
require get_template_directory() . '/inc/class-tema-base-gamb-custom-colors.php';
require get_template_directory() . '/inc/class-tema-base-gamb-customize.php';
require_once get_template_directory() . '/inc/class-tema-base-gamb-dark-mode.php';
require_once get_template_directory() . '/inc/acf-hoteis.php';
new Tema_Dev_Gamb_Custom_Colors();
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/menu-functions.php';
require get_template_directory() . '/inc/template-tags.php';
new Tema_Dev_Gamb_Customize();
// require get_template_directory() . '/inc/block-patterns.php';
// require get_template_directory() . '/inc/block-styles.php';
new Tema_Dev_Gamb_Dark_Mode();


/**
 * Carrega scripts e estilos (Bootstrap, Slick, CSS personalizado)
 */
add_action('wp_enqueue_scripts', function () {
  // Bootstrap
  wp_enqueue_style('sd-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', [], '5.3.3');
  wp_enqueue_script('sd-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', ['jquery'], '5.3.3', true);
  wp_enqueue_style('sd-font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', [], '5.15.4  ');

  // Slick Carousel
  wp_enqueue_style('sd-slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', [], '1.8.1');
  wp_enqueue_style('sd-slick-theme', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', ['sd-slick'], '1.8.1');
  wp_enqueue_script('sd-slick-min', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', ['jquery'], '1.8.1', true);

  // Estilos do tema
  wp_enqueue_style('sd-font-diavlo', 'https://use.typekit.net/nez2mlc.css', [], null);
  wp_enqueue_style('sd-font-fira', 'https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap', [], null);
  wp_enqueue_style('sd-style-base', get_stylesheet_directory_uri() . '/assets/css/style-base.css', [], '1.0.0');
  wp_enqueue_style('sd-style-menu', get_stylesheet_directory_uri() . '/assets/css/style-menu.css', [], '1.0.0');
  wp_enqueue_style('sd-var-base', get_stylesheet_directory_uri() . '/assets/css/style-variaveis-base.css', [], '1.0.0');
  wp_enqueue_style('sd-variaveis', get_stylesheet_directory_uri() . '/assets/css/style-variaveis.css', [], '1.0.0');

  // JS personalizado
  wp_enqueue_script('scripts-js', get_stylesheet_directory_uri() . '/assets/js/scripts.js', ['jquery'], '1.0.0', true);
  wp_enqueue_script('scroll-menu', get_template_directory_uri() . '/assets/js/scroll-menu-active.js', array('jquery'), null, true);
  wp_enqueue_script('skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array('jquery'), null, true);
  // wp_enqueue_script('primary-navigation-js', get_stylesheet_directory_uri() . '/assets/js/primary-navigation.js', ['jquery'], '1.0.0', true);
});

/**
 * Registra Custom Post Types e Taxonomias - gamberine
 */
add_action('init', function () {

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

    'public'              => true,
    'publicly_queryable'  => true,
    'show_ui'             => true,    // OBRIGATÓRIO para ACF funcionar
    'show_in_rest'        => true,

    'has_archive'         => false,
    'exclude_from_search' => true,

    // Mantém fora do menu, como você quer
    'show_in_menu'        => false,
    'show_in_nav_menus'   => false,

    'supports'            => ['title', 'editor', 'thumbnail', 'excerpt', 'revisions'],

    'menu_icon'           => 'dashicons-admin-customizer',
    'rewrite'             => ['slug' => 'conteudo'],
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
    'supports'     => ['title', 'editor', 'thumbnail', 'excerpt', 'revisions'],
    'rewrite'      => ['slug' => 'banner'],
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
    'supports'     => ['title', 'editor', 'thumbnail', 'excerpt', 'revisions'],
    'rewrite'      => ['slug' => 'hoteis'],
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
    'supports'     => ['title', 'editor', 'thumbnail', 'excerpt', 'revisions'],
    'rewrite'      => ['slug' => 'acomodacoes'],
    'show_in_rest' => true,
  ]);

  // Post type Depoimento
  register_post_type('depoimento', [
    'labels' => [
      'name'          => 'Depoimentos',
      'singular_name' => 'Depoimento'
    ],
    'public'       => true,
    'has_archive'  => false,
    'menu_icon'    => 'dashicons-format-quote',
    'supports'     => ['title', 'editor', 'thumbnail', 'revisions'],
    'show_in_rest' => true,
  ]);

  // Post type Ofertas
  register_post_type('ofertas', [
    'labels' => [
      'name'               => 'Ofertas',
      'singular_name'      => 'Oferta',
      'add_new_item'       => 'Adicionar nova Oferta',
      'edit_item'          => 'Editar Oferta',
      'new_item'           => 'Nova Oferta',
      'view_item'          => 'Ver Oferta',
      'search_items'       => 'Buscar Ofertas',
      'not_found'          => 'Nenhuma Oferta encontrada',
      'not_found_in_trash' => 'Nenhuma Oferta encontrada na lixeira',
    ],
    'public'       => true,
    'has_archive'  => true,
    'menu_icon'    => 'dashicons-tickets-alt',
    'supports'     => ['title', 'editor', 'thumbnail', 'excerpt', 'revisions'],
    'rewrite'      => ['slug' => 'ofertas'],
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
 * Ajusta campo ACF post_object "hotel_avaliado" para listar o CPT correto.
 */
function sd_acf_filter_hotel_avaliado($args)
{
  $args['post_type']      = ['hoteis'];   // slug do CPT registrado
  $args['post_status']    = ['publish'];  // somente publicados
  $args['posts_per_page'] = -1;           // lista todos
  $args['orderby']        = 'title';
  $args['order']          = 'ASC';
  return $args;
}
add_filter('acf/fields/post_object/query/name=hotel_avaliado', function ($args, $field, $post_id) {
  return sd_acf_filter_hotel_avaliado($args);
}, 10, 3);
add_filter('acf/fields/post_object/query/key=field_692e4bc5e01d0', function ($args, $field, $post_id) {
  return sd_acf_filter_hotel_avaliado($args);
}, 10, 3);

/**
 * Relacionamento bidirecional: quando um depoimento aponta para um hotel
 * em "hotel_avaliado", sincroniza um campo no hotel para referenciar de volta.
 */
add_filter('acf/update_value/name=hotel_avaliado', function ($value, $post_id, $field) {
  if (get_post_type($post_id) !== 'depoimento') {
    return $value;
  }

  // Ajuste este slug se o campo no hotel tiver outro nome.
  $target_field = 'hotel_depoimentos';

  static $running = false;
  if ($running) {
    return $value;
  }
  $running = true;

  $new_ids = [];
  if (is_array($value)) {
    $new_ids = array_map('intval', $value);
  } elseif ($value) {
    $new_ids = [intval($value)];
  }

  $old_value = get_field('hotel_avaliado', $post_id, false);
  $old_ids   = is_array($old_value) ? array_map('intval', $old_value) : (array) (intval($old_value) ?: []);

  $removed = array_diff($old_ids, $new_ids);
  $added   = array_diff($new_ids, $old_ids);

  foreach ($removed as $hotel_id) {
    $existing = get_field($target_field, $hotel_id, false);
    $existing = is_array($existing) ? array_map('intval', $existing) : [];
    $existing = array_diff($existing, [$post_id]);
    update_field($target_field, $existing, $hotel_id);
  }

  foreach ($added as $hotel_id) {
    $existing = get_field($target_field, $hotel_id, false);
    $existing = is_array($existing) ? array_map('intval', $existing) : [];
    if (!in_array($post_id, $existing, true)) {
      $existing[] = $post_id;
      update_field($target_field, $existing, $hotel_id);
    }
  }

  $running = false;
  return $value;
}, 10, 3);

/**
 * Função auxiliar para obter a URL do banner institucional mais recente
 *
 * @return string URL da imagem do banner institucional ou string vazia se não houver
 */
function sd_get_banner_institucional_url()
{
  $banner_posts = get_posts([
    'post_type'      => 'conteudo',
    'posts_per_page' => 1,
    'orderby'        => 'date',
    'order'          => 'DESC',
    'no_found_rows'  => true,
  ]);

  if (empty($banner_posts)) {
    return '';
  }

  $entry = $banner_posts[0];
  $img   = get_field('banner-institucional', $entry->ID);

  if (is_array($img) && !empty($img['url'])) {
    return esc_url($img['url']);
  }

  if (is_string($img)) {
    return esc_url($img);
  }

  return '';
}

/**
 * Função para renderizar o banner institucional
 */
function sd_render_banner_institucional()
{
  $banner_url = sd_get_banner_institucional_url();

?>
  <div class="banner-institucional"
    style="background-image: url('<?php echo $banner_url; ?>'), var(--primary-gradient);">
    <h2 class="break-spaces text-center w-50 mx-auto px-5 d-flex flex-wrap align-items-center justify-content-center">
      <strong><?php sd_page_title(); ?></strong>
    </h2>
  </div>
<?php
}


/**
 * Função auxiliar para exibir o título da página conforme o contexto
 */
function sd_page_title()
{

  if (is_home() && ! is_front_page()) {
    // Página de posts definida no admin
    echo esc_html(get_the_title(get_option('page_for_posts')));
  } elseif (is_singular()) {
    // Página ou post
    echo esc_html(get_the_title());
  } elseif (is_search()) {
    echo 'Resultados para: ' . esc_html(get_search_query());
  } elseif (is_category() || is_tag() || is_tax()) {
    single_term_title();
  } elseif (is_author()) {
    echo 'Artigos de ' . esc_html(get_the_author());
  } elseif (is_date()) {
    echo esc_html(get_the_date('F Y'));
  } elseif (is_post_type_archive()) {
    post_type_archive_title();
  } elseif (is_404()) {
    echo 'Página não encontrada';
  } else {
    echo esc_html(get_the_title());
  }
}



/**
 * Função auxiliar para obter campos ACF com valor padrão
 *
 * @param string $key     O nome do campo ACF
 * @param int|null $post_id O ID do post (null = global)
 * @param mixed $default  Valor padrão se o campo estiver vazio
 * @return mixed
 */
function sd_field($key, $post_id = null, $default = '')
{
  if (function_exists('get_field')) {
    $value = get_field($key, $post_id);
    if ($value !== null && $value !== '') {
      return $value;
    }
  }
  return $default;
}


/* Classe no admin quando CPT conteudo */
function temabasegamb_admin_body_class($classes)
{
  if (is_admin() && isset($_GET['post_type']) && $_GET['post_type'] === 'conteudo') {
    $classes .= ' parent-class-conteudo';
  }
  return $classes;
}
add_filter('admin_body_class', 'temabasegamb_admin_body_class');

/* --------------------------------------------------------------------------
 * 7) Login page custom
 * -------------------------------------------------------------------------- */

/* CSS personalizado para a tela de login */
function wgm_login_styles()
{
  wp_enqueue_style(
    'sd-style-login',
    get_template_directory_uri() . '/assets/css/style-wadmin.css',
    [],
    '1.0.0'
  );
}
add_action('login_enqueue_scripts', 'wgm_login_styles');


/* CSS personalizado para o admin */
function wgm_admin_styles()
{
  wp_enqueue_style(
    'sd-style-admin',
    get_template_directory_uri() . '/assets/css/style-wadmin.css',
    [],
    '1.0.0'
  );
}
add_action('admin_enqueue_scripts', 'wgm_admin_styles');


/* 
// function gamberine_login_edit()
// {
//   echo '<style type="text/css">
//     h1{background:url(' . get_bloginfo('template_directory') . '/imagens/logo.png) 50% 50% no-repeat!important;width:auto!important;background-size:contain!important;height:130px!important;}
//   </style>';
// }
// add_action('login_head', 'gamberine_login_edit');*/


/* --------------------------------------------------------------------------
 * 8) Papéis / Permissões / Admin UI
 * -------------------------------------------------------------------------- */

/* Ocultar itens/avisos para não-super-admin - Restaurado */
function wgm_desativa_comentarios_admin_menu()
{
  // ATENÇÃO: A lógica original (`! current_user_can('add_users')`)
  // vai ocultar itens para qualquer usuário que não seja Administrador.
  // Se isso for desejado, mantenha. Se quiser que apenas Editores vejam,
  // mude para `! current_user_can('manage_options')` por exemplo.
  if (! current_user_can('add_users')) {

    // Core/Plugin updates notices
    remove_action('init', 'wp_version_check');
    add_filter('pre_option_update_core', '__return_null');

    add_action('admin_init', function () {
      remove_action('admin_init', 'wp_update_plugins');
      remove_action('admin_init', 'wp_update_plugins', 2);
      remove_action('init', 'wp_update_plugins', 2);
    });
    add_filter('pre_option_update_plugins', '__return_null');

    add_action('wp_before_admin_bar_render', function () {
      global $wp_admin_bar;
      $wp_admin_bar->remove_menu('updates');
    });

    add_action('admin_head', function () {
      global $menu, $submenu, $user_ID;
      unset($menu[25]); // Comentários
      unset($menu[60]); // Aparência
      if (isset($submenu['index.php'][10])) unset($submenu['index.php'][10]); // Painel -> Atualização
      if ($user_ID != 99) { // Assumindo que 99 é um ID específico de Super Admin
        remove_menu_page('plugin-editor.php');
      }
    });

    add_action('wp_before_admin_bar_render', function () {
      global $wp_admin_bar;
      foreach (array('wp-logo', 'about', 'wporg', 'documentation', 'support-forums', 'feedback', 'comments', 'archive') as $node) {
        $wp_admin_bar->remove_menu($node);
      }
    });
  }
}
add_action('admin_menu', 'wgm_desativa_comentarios_admin_menu');


/* Reordenar menu do admin */
add_filter('custom_menu_order', '__return_true');
function wgm_new_admin_menu_order($menu_order)
{
  $new_positions = array(
    'upload.php'               => 15,
    'edit.php?post_type=page'  => 1
  );
  $move = function (&$array, $from, $to) {
    $out = array_splice($array, $from, 1);
    array_splice($array, $to, 0, $out);
  };
  foreach ($new_positions as $slug => $new_index) {
    if (false !== ($current_index = array_search($slug, $menu_order))) {
      $move($menu_order, $current_index, $new_index);
    }
  }
  return $menu_order;
}
add_filter('menu_order', 'wgm_new_admin_menu_order');


/* ACF JSON */
add_filter('acf/settings/save_json', function ($path) {
  return get_stylesheet_directory() . '/acf-json';
});
add_filter('acf/settings/load_json', function ($paths) {
  unset($paths[0]);
  $paths[] = get_stylesheet_directory() . '/acf-json';
  return $paths;
});

/* Remover meta generator */
// BOA PRÁTICA
remove_action('wp_head', 'wp_generator');

/* Rodapé Admin */
function bl_admin_footer()
{
  echo '<span class="gamberine-footer">Desenvolvido por <a href="https://gamberine.com.br" target="_blank" rel="noopener">Gamberine Comunicação Digital</a></span>';
}
add_filter('admin_footer_text', 'bl_admin_footer');

// /* Logos no site footer */
function bl_site_footer_logo()
{
  echo '<a href="https://gamberine.com.br" target="_blank" rel="noopener"><img src="' . get_bloginfo('template_directory') . '/imagens/logoGamberine.png"/></a>';
}
add_filter('site_footer_text', 'bl_site_footer_logo');

function bl_site_footer_se()
{
  echo '<a href="https://secomunicacao.com.br" target="_blank" rel="noopener"><img src="' . get_bloginfo('template_directory') . '/imagens/logoSe.png"/></a>';
}
add_filter('site_footer_text', 'bl_site_footer_se');

/* Contact Form 7 autocomplete off */
add_filter('wpcf7_form_autocomplete', function ($autocomplete) {
  return 'off';
}, 10, 1);

/* Editor clássico para posts */
add_filter('use_block_editor_for_post', '__return_false', 10);

/* Classe por navegador */
function detect_browser($classes)
{
  global $is_gecko, $is_IE, $is_opera, $is_safari, $is_chrome, $is_iphone, $is_edge;
  if ($is_opera)   $classes[] = 'opera';
  elseif ($is_safari) $classes[] = 'safari';
  elseif ($is_chrome) $classes[] = 'chrome';
  elseif ($is_edge)   $classes[] = 'edge';
  elseif ($is_IE)     $classes[] = 'ie';
  elseif ($is_gecko)  $classes[] = 'firefox';
  if ($is_iphone)     $classes[] = 'ios-app';
  return $classes;
}
add_filter('body_class', 'detect_browser');

/* idioma como classe */
function add_lang_class_to_body($classes)
{
  $current_lang = get_bloginfo('language'); // ex: pt-BR
  $classes[] = 'lang-' . sanitize_title_with_dashes($current_lang);
  return $classes;
}
add_filter('body_class', 'add_lang_class_to_body');

/**
 * Google Reviews helper
 * Usa Place ID por hotel e uma API key definida via constante SD_GOOGLE_API_KEY ou opção sd_google_api_key.
 */
function sd_google_api_key()
{
  if (defined('SD_GOOGLE_API_KEY') && SD_GOOGLE_API_KEY) {
    return SD_GOOGLE_API_KEY;
  }
  return get_option('sd_google_api_key', '');
}

/**
 * Busca avaliações do Google para o Place ID informado.
 * Cache em transient por 12h para evitar limites.
 *
 * @param string $place_id
 * @param int    $limit
 * @return array
 */
function sd_get_google_reviews($place_id, $limit = 6)
{
  $place_id = trim((string) $place_id);
  $api_key  = sd_google_api_key();

  if (!$place_id || !$api_key) {
    return [];
  }

  $cache_key = 'sd_gr_' . md5($place_id);
  $cached    = get_transient($cache_key);
  if ($cached !== false) {
    return $cached;
  }

  $url = add_query_arg([
    'placeid' => $place_id,
    'fields'  => 'name,rating,reviews,user_ratings_total',
    'language' => 'pt-BR',
    'key'     => $api_key,
  ], 'https://maps.googleapis.com/maps/api/place/details/json');

  $response = wp_remote_get($url, ['timeout' => 12]);
  if (is_wp_error($response)) {
    return [];
  }

  $body = wp_remote_retrieve_body($response);
  $data = json_decode($body, true);

  if (!isset($data['status']) || $data['status'] !== 'OK' || empty($data['result']['reviews'])) {
    return [];
  }

  $reviews = array_slice($data['result']['reviews'], 0, $limit);
  $clean   = [];

  foreach ($reviews as $rev) {
    $clean[] = [
      'author'   => $rev['author_name'] ?? '',
      'rating'   => (float) ($rev['rating'] ?? 0),
      'text'     => $rev['text'] ?? '',
      'time'     => $rev['relative_time_description'] ?? '',
      'profile'  => $rev['profile_photo_url'] ?? '',
      'lang'     => $rev['language'] ?? '',
      'url'      => $rev['author_url'] ?? '',
    ];
  }

  set_transient($cache_key, $clean, 12 * HOUR_IN_SECONDS);
  return $clean;
}


/* Shortcode: título de página */
function shortcode_titulo_pagina()
{
  return is_page() ? '<h1>' . get_the_title() . '</h1>' : '';
}
add_shortcode('titulo_pagina', 'shortcode_titulo_pagina');

/* Link direto de edição no admin (menu Conteúdo -> post 38) */
function adicionar_links_dinamicos_menu()
{
  $post_id_1 = 38;
  $edit_link_1 = admin_url("post.php?post=$post_id_1&action=edit");
  add_menu_page('Edição de Conteúdos', 'Conteúdo', 'edit_posts', $edit_link_1, '', 'dashicons-edit', 2);
}
add_action('admin_menu', 'adicionar_links_dinamicos_menu');

/* Add Last Modified Column */
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


/* - 9) MODO MANUTENÇÃO - CORRIGIDO E COMPLETADO */

function sd_is_maintenance_mode_enabled()
{
  // Retorna o valor da opção, convertendo para booleano
  return (bool) get_option('sd_maintenance_mode_enabled', false);
}

function sd_sanitize_checkbox($value)
{
  // Garante que o valor salvo seja 1 ou 0
  return $value ? 1 : 0;
}

/**
 * Registra a opção na API de Settings do WordPress
 */
add_action('admin_init', function () {
  register_setting('sd_maintenance_settings', 'sd_maintenance_mode_enabled', [
    'type'              => 'boolean',
    'sanitize_callback' => 'sd_sanitize_checkbox',
    'default'           => 0,
  ]);
});

/**
 * Renderiza a página de opções no admin
 */
function sd_render_maintenance_settings_page()
{
  // Verifica permissão
  if (!current_user_can('manage_options')) {
    return;
  }
?>
  <div class="wrap">
    <h1><?php esc_html_e('Página em manutenção', 'temabasegamb'); ?></h1>
    <form method="post" action="options.php">
      <?php
      settings_fields('sd_maintenance_settings');
      $enabled = sd_is_maintenance_mode_enabled();
      ?>
      <table class="form-table" role="presentation">
        <tbody>
          <tr>
            <th scope="row"><?php esc_html_e('Status', 'temabasegamb'); ?></th>
            <td>
              <label for="sd-maintenance-mode-enabled">
                <input type="checkbox" name="sd_maintenance_mode_enabled" id="sd-maintenance-mode-enabled" value="1" <?php checked($enabled); ?> />
                <?php esc_html_e('Ativar página em manutenção', 'temabasegamb'); ?>
              </label>
              <p class="description"><?php esc_html_e('Quando ativo, visitantes verão a página em manutenção até que o modo seja desativado. Administradores continuam vendo o site normalmente.', 'temabasegamb'); ?></p>
            </td>
          </tr>
        </tbody>
      </table>
      <?php submit_button(); ?>
    </form>
  </div>
<?php
}

/**
 * Adiciona a página de opções no menu "Aparência"
 */
add_action('admin_menu', function () {
  add_submenu_page(
    'themes.php', // Parente (Aparência)
    __('Página em manutenção', 'temabasegamb'),
    __('Página em manutenção', 'temabasegamb'),
    'manage_options', // Capacidade
    'sd-maintenance-mode',
    'sd_render_maintenance_settings_page'
  );
});

/**
 * Mostra um aviso no admin se o modo estiver ativo
 */
add_action('admin_notices', function () {
  if (!sd_is_maintenance_mode_enabled() || !current_user_can('manage_options')) {
    return;
  }
  // Não mostra o aviso na própria página de configuração
  $screen = get_current_screen();
  if ($screen && 'appearance_page_sd-maintenance-mode' === $screen->id) {
    return;
  }
  echo '<div class="notice notice-warning"><p>' . esc_html__('O modo de manutenção está ativo. Visitantes estão vendo a página em manutenção.', 'temabasegamb') . '</p></div>';
});

/**
 * Redireciona visitantes para a página de manutenção
 * Esta é a função que estava quebrada (agora corrigida).
 */
add_action('template_redirect', function () {

  // Se o modo estiver desligado, não faz nada
  if (!sd_is_maintenance_mode_enabled()) {
    return;
  }

  // Permite acesso ao admin, ajax e API REST
  if (is_admin() || wp_doing_ajax() || (defined('REST_REQUEST') && REST_REQUEST)) {
    return;
  }

  // Permite que usuários logados vejam o site
  if (is_user_logged_in()) {
    return;
  }

  // Permite acesso à tela de login/registro
  $request_uri = isset($_SERVER['REQUEST_URI']) ? sanitize_text_field(wp_unslash($_SERVER['REQUEST_URI'])) : '';
  if (false !== strpos($request_uri, 'wp-login.php') || false !== strpos($request_uri, 'wp-register.php')) {
    return;
  }

  // Para todos os outros:
  // Define o status HTTP como 503 (Serviço Indisponível)
  status_header(503);
  nocache_headers();

  // Inclui o arquivo de template de manutenção
  // CERTIFIQUE-SE QUE O ARQUIVO `maintenance.php` EXISTE NA RAIZ DO TEMA.
  $maintenance_file = get_template_directory() . '/maintenance.php';
  if (file_exists($maintenance_file)) {
    include $maintenance_file;
  } else {
    // Fallback caso o arquivo não exista
    wp_die(esc_html__('Nosso site está em manutenção no momento. Voltamos em breve!', 'temabasegamb'), 503);
  }
  exit;
});



/* FIM */

/**
 * SAN DIEGO — Endereço completo no ACF
 * CEP com máscara, número apenas números, ViaCEP automático
 */
add_action('acf/input/admin_footer', function () {
    ?>
    <script>
    // Máscara CEP
    document.addEventListener("input", function (e) {
      if (e.target.name === "hotel_cep") {
        let v = e.target.value.replace(/\D/g, "");
        if (v.length > 5) {
          v = v.replace(/(\d{5})(\d+)/, "$1-$2");
        }
        e.target.value = v.substring(0, 9);
      }
    });

    // Apenas números no campo número
    document.addEventListener("input", function (e) {
      if (e.target.name === "hotel_numero") {
        e.target.value = e.target.value.replace(/\D/g, "");
      }
    });

    // Auto-completar endereço via ViaCEP
    document.addEventListener("blur", function (e) {
      if (e.target.name !== "hotel_cep") return;

      const cep = e.target.value.replace(/\D/g, "");
      if (cep.length !== 8) return;

      fetch("https://viacep.com.br/ws/" + cep + "/json/")
        .then(r => r.json())
        .then(d => {
          if (d.erro) return;

          const set = (name, value) => {
            const f = document.querySelector('[name="' + name + '"]');
            if (f && value) f.value = value;
          };

          set("hotel_logradouro", d.logradouro);
          set("hotel_bairro", d.bairro);
          set("hotel_cidade", d.localidade);

          const estadoSelect = document.querySelector('[name="hotel_estado"]');
          if (estadoSelect) estadoSelect.value = d.uf;
        });
    });
    </script>
    <?php
});


/* FIM */
