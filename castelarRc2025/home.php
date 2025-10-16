<?php /*Template Name: Home*/ get_header(); ?>

<div id="primary" class="content-area">

  <?php // Start the loop.while (have_posts()) : the_post();// Include the page content template.get_template_part('template-parts/content' , 'page' );// If comments are open or we have at least one comment, load up the comment template.if (comments_open() || get_comments_number()) {comments_template();}// End of the loop.endwhile;
  ?>

  <?php get_template_part('template-parts/arquivo-banner-home'); ?>

  <?php get_template_part('template-parts/arquivo-sobre'); ?>
  <?php get_template_part('template-parts/arquivo-servicos'); ?>
  <?php get_template_part('template-parts/arquivo-servicos-detalhe'); ?>
  <?php get_template_part('template-parts/arquivo-projetos'); ?>
  <?php get_template_part('template-parts/arquivo-clientes'); ?>

  <?php get_template_part('template-parts/arquivo-instagram'); ?>

  <?php get_template_part('template-parts/arquivo-contatos-form'); ?>

  <!--content-area -->
  <?php get_footer(); ?>