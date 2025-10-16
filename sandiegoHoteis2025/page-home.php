
<?php
/* Template Name: Home San Diego */
get_header();
?>
<main id="primary" class="site-main sandiego">
<?php if( have_rows('home_sections') ): while( have_rows('home_sections') ): the_row();
  if( get_row_layout() == 'hero' ) get_template_part('template-parts/sections/section', 'hero');
  if( get_row_layout() == 'search' ) get_template_part('template-parts/sections/section', 'search');
  if( get_row_layout() == 'services' ) get_template_part('template-parts/sections/section', 'services');
  if( get_row_layout() == 'numbers' ) get_template_part('template-parts/sections/section', 'numbers');
  if( get_row_layout() == 'differentials' ) get_template_part('template-parts/sections/section', 'differentials');
endwhile; endif; ?>
</main>
<?php get_footer(); ?>
