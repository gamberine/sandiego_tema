<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
add_action('wp_enqueue_scripts', function(){
  wp_enqueue_style('tema-base-style', get_stylesheet_uri(), [], '1.0.0');
});