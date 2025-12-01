<?php
/**
 * Template Name: Hotéis
 *
 * Página dedicada à apresentação da rede de hotéis San Diego.
 *
 * @package Tema_Dev_Gamb
 */

get_header();
?>


<?php get_template_part( 'template-parts/sections/section', 'hero-banner' ); ?> 
<?php get_template_part( 'template-parts/sections/section', 'search' ); ?> 
<?php get_template_part( 'template-parts/sections/section', 'grid-hoteis' ); ?> 
<?php get_template_part( 'template-parts/sections/section', 'experiencia' ); ?> 
<?php get_template_part( 'template-parts/sections/section', 'instagram' ); ?> 


<?php
get_footer();
?>