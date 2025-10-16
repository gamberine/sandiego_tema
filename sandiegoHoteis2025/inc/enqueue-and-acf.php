
<?php
// Enqueue Bootstrap, Slick (already included in theme perhaps), and custom assets
add_action('wp_enqueue_scripts', function(){
  wp_enqueue_style('bootstrap-5', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', [], null);
  wp_enqueue_style('sandiego', get_stylesheet_directory_uri().'/assets/css/sandiego.css', ['bootstrap-5'], '1.0.0');
  wp_enqueue_script('jquery');
  wp_enqueue_script('bootstrap-5', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', ['jquery'], null, true);
  wp_enqueue_script('sandiego', get_stylesheet_directory_uri().'/assets/js/sandiego.js', ['jquery'], '1.0.0', true);
});

// Register local JSON loading/saving for ACF
add_filter('acf/settings/save_json', function($path){
  return get_stylesheet_directory().'/acf-json';
});
add_filter('acf/settings/load_json', function($paths){
  $paths[] = get_stylesheet_directory().'/acf-json';
  return $paths;
});
