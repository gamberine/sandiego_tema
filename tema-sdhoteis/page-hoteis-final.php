<?php

/**
 * Template Name: Hoteis Final
 * 
 *
 * Pagina dedicada a apresentacao da rede de hoteis San Diego.
 *
 * @package Tema_Dev_Gamb
 */

get_header();
?>

<?php get_template_part('template-parts/sections/section', 'banner-hoteis'); ?>
<?php get_template_part('template-parts/sections/section', 'search'); ?>
<?php get_template_part('template-parts/sections/section', 'hoteis-grid'); ?>
<?php get_template_part('template-parts/sections/section', 'hoteis-experiencia'); ?>
<?php get_template_part('template-parts/sections/section', 'hoteis-instagram'); ?>

</main>
<?php get_footer();
