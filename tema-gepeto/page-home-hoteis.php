<?php

/**
 * Template Name: Home Hotéis
 *
 * Página inicial personalizada para a apresentação dos hotéis San Diego.
 */
get_header();

// Carrega componentes definidos em template-parts
get_template_part('template-parts/section', 'banner-home');
get_template_part('template-parts/section', 'busca-reserva');
get_template_part('template-parts/section', 'grid-hoteis');
get_template_part('template-parts/section', 'experiencia');
get_template_part('template-parts/section', 'instagram');

get_footer();
