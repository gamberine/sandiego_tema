<?php

/**
 * Template Name: Contato Hotéis -rev.011225
 *
 * Página que lista as informações de contato de todos os hotéis cadastrados
 * e exibe um formulário de contato.
 */
get_header();
?>

<?php get_template_part('template-parts/sections/section', 'banner'); ?>
<?php get_template_part('template-parts/sections/section', 'search'); ?>

<?php get_template_part('template-parts/sections/section', 'contact-hoteis'); ?>


<?php get_template_part('template-parts/sections/section', 'contact'); ?>


<?php
get_footer();
?>