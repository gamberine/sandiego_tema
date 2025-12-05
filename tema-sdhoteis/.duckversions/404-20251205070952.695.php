<?php
/**
 * Template Name: 404 *
 *
 * @package Tema_Dev_Gamb
 */

get_header();
?>

  <?php get_template_part('template-parts/sections/section', 'banner-institucional'); ?>


  <section class="container mb-5 py-5">
    <article class="content-area">
      <div class="rowFullWidth">

        <div class="site-content error-404 not-found container corSecundaria mt-5 mt-sm-0">
          <h2>Página não encontrada!</h2>
          <a class="error404 my-5 my-sm-2" href="<?php echo esc_url(home_url('/')); ?>">Retornar para a página inicial</a>
          <h5 class="text-center corTextos" style="line-height: 1.2;">O conteúdo pesquisado não foi encontrado. <br /> Que tal tentar uma nova pesquisa?</h5>
          <?php get_search_form(); ?>
        </div>


      </div>
    </article>
    </section>
    <?php
  get_footer();
  ?>