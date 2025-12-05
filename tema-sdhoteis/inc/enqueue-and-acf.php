
<!-- < ?php
// Register local JSON loading/saving for ACF
add_filter('acf/settings/save_json', function($path){
  return get_stylesheet_directory().'/acf-json';
});
add_filter('acf/settings/load_json', function($paths){
  $paths[] = get_stylesheet_directory().'/acf-json';
  return $paths;
}); -->
