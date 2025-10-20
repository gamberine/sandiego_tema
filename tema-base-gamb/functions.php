<?php
// Funções básicas para o tema base.
// Este tema serve apenas de apoio para o tema filho San Diego Hotéis.

// Carrega o CSS principal. O WordPress carregará o style.css com as
// informações do cabeçalho do tema.
function tema_base_enqueue_scripts() {
    wp_enqueue_style( 'tema-base-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'tema_base_enqueue_scripts' );

?>
