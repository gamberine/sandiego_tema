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

  <?php get_template_part( 'template-parts/sections/section', 'banner-hoteis' ); ?>
  <?php get_template_part( 'template-parts/sections/section', 'search' ); ?>

  <?php
  if (have_rows('sobre_sections')) :
    while (have_rows('sobre_sections')) :
      the_row();


      if (get_row_layout() === 'founders') {
        get_template_part('template-parts/sections/section', 'fundador');
      }

      if (get_row_layout() === 'timeline') {
        get_template_part('template-parts/sections/section', 'timeline');
      }

      if (get_row_layout() === 'leadership') {
        get_template_part('template-parts/sections/section', 'leadership');
      }
    endwhile;
  endif;
  ?>
</main>
<?php
get_footer();
