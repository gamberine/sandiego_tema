<?php
/* Template Name: 404 */
get_header(');
?>
<section class="gridCinza py-0">
  <div class="rowFullWidth">

    <div class="site-content error-404 not-found container corSecundaria mt-5 mt-sm-0">
      <h2>Página não encontrada!</h2>
      <a class="error404 my-5 my-sm-2" href="<?php echo esc_url(home_url('/')); ?>">Retornar para a página inicial</a>
      <h5 class="text-center corTextos" style="line-height: 1.2;">O conteúdo pesquisado não foi encontrado. <br /> Que tal tentar uma nova pesquisa?</h5>
      <?php get_search_form(); ?>
    </div>


  </div>
</section>


<!--content-area -->
<?php get_footer(); ?>

<!-- .error-404 -->