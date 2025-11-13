<?php
/**
 * Template Name: Hotéis
 *
 * Página dedicada à apresentação da rede de hotéis San Diego.
 *
 * @package Tema_Dev_Gamb
 */

get_header();

get_template_part('template-parts/section', 'banner');
get_template_part('template-parts/section', 'busca-reserva');
get_template_part('template-parts/section', 'grid-hoteis');
get_template_part('template-parts/section', 'experiencia');
get_template_part('template-parts/section', 'instagram');

get_footer();
