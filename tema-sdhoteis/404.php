<?php
/**
 * Template Name: 404 *
 *
 * @package Tema_Dev_Gamb
 */

get_header();
?>

  <?php get_template_part('template-parts/sections/section', 'banner-institucional'); ?>


  <!-- <section class="container"> -->
    <article class="content-area rowFullWidth">

        <div class="site-content error-404 not-found container secondary-color mt-5 mt-sm-0 gap-3">
          <h3 class="text-center text-color" style="line-height: 1.2;">O conteúdo pesquisado não foi encontrado.</h5>
          <a class="error404 my-5 my-sm-2" href="<?php echo esc_url(home_url('/')); ?>">Retornar para a página inicial</a>
        </div>

    </article>
    <!-- </section> -->
    <?php
  get_footer();
  ?>