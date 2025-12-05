<?php

/**
 * Template Name: Nossos Hoteis
 *
 * Página dedicada à apresentação da rede de hotéis San Diego.
 *
 * @package Tema_Dev_Gamb
 */

get_header();
?>

<?php get_template_part('template-parts/sections/section', 'banner-hoteis'); ?>
<?php get_template_part('template-parts/sections/section', 'search'); ?>

<?php get_template_part('template-parts/sections/section', 'grid-hoteis'); ?>
<?php get_template_part('template-parts/sections/section', 'hoteis-experiencia'); ?>
<?php get_template_part('template-parts/sections/section', 'instagram'); ?>



</main>
<?php
get_footer();
