<?php
/**
 * Template Name: Home Hotéis
 *
 * Página inicial personalizada para a apresentação dos hotéis San Diego.
 */
get_header();

// Carrega componentes definidos em template-parts/components
get_template_part('template-parts/components/section','banner-home');
get_template_part('template-parts/components/section','busca-reserva');
get_template_part('template-parts/components/section','grid-hoteis');
get_template_part('template-parts/components/section','experiencia');
get_template_part('template-parts/components/section','instagram');

get_footer();
?>
