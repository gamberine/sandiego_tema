<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Tema_Dev_Gamb
 * @since Tema Dev-Gamb 1.0
 */

get_header('internas'); ?>


<?php wp_body_open(); ?>

<?php

$wrapper_classes = has_custom_logo() ? ' has-logo' : '';
?>

<header id="error-404" class="alignwide text-center <?php echo esc_attr($wrapper_classes); ?>">


  <div class="site-branding mx-auto">
    <div class="site-logo">
      <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
        <?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>

            <img class="logoHome logoPadrao" src="<?php echo wp_kses_post(get_field('logomarca_rodape')); ?>" />

          <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
      </a>
    </div>

  </div>


</header>

<div class="site-content error-404 not-found container corSecundaria">
  <h2>Página não encontrada!</h2>
  <a class="error404" href="<?php echo esc_url(home_url('/')); ?>">Retornar para a página inicial</a>
  <h5 class="text-center corTextos" style="line-height: 1.1;">O conteúdo pesquisado não foi encontrado. <br /> Que tal tentar uma nova pesquisa?</h5>
  <?php get_search_form(); ?>
</div>
<!-- .error-404 -->