<?php
/**
 * Funções do tema filho San Diego Hotéis 2025
 */
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

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
    'primary' => __('Menu Principal', 'temabasegamb'),
    'footer'  => __('Menu Rodapé', 'temabasegamb'),
  ]);
});

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

  // Estilos do tema: variáveis e customizações
  wp_enqueue_style( 'sd-font-diavlo', 'https://use.typekit.net/nez2mlc.css', [], null );
  wp_enqueue_style( 'sd-font-fira', 'https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap', [], null );
  wp_enqueue_style( 'sd-variaveis', get_stylesheet_directory_uri() . '/assets/css/style-variaveis.css', [], '1.0.0' );
  wp_enqueue_style( 'sd-theme-base', get_stylesheet_directory_uri() . '/assets/css/theme-base.css', [], '1.0.0' );
  wp_enqueue_style( 'sd-theme', get_stylesheet_directory_uri() . '/assets/css/sandiego.css', ['sd-variaveis','sd-font-diavlo','sd-font-fira'], '1.1.0' );

  // JavaScript personalizado
  wp_enqueue_script( 'sd-theme-js', get_stylesheet_directory_uri() . '/assets/js/sandiego.js', ['jquery','sd-slick'], '1.0.0', true );
});

/**
 * Registra Custom Post Types e Taxonomias
 */
add_action('init', function () {
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
    'menu_icon'    => 'dashicons-bed',
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
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
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

/**
 * Créditos do rodapé (fallback caso a função não exista no tema pai).
 */
if ( ! function_exists('bl_site_footer_se') ) {
  function bl_site_footer_se() {
    $logo = trailingslashit( get_stylesheet_directory_uri() ) . 'imagens/logoSe.png';
    echo '<a href="https://secomunicacao.com.br" target="_blank" rel="noopener">';
    echo '<img src="' . esc_url( $logo ) . '" alt="SE Comunicação">';
    echo '</a>';
  }
}

if ( ! function_exists('bl_site_footer_logo') ) {
  function bl_site_footer_logo() {
    $logo = trailingslashit( get_stylesheet_directory_uri() ) . 'imagens/logoSe.png';
    echo '<img src="' . esc_url( $logo ) . '" alt="">';
  }
}
