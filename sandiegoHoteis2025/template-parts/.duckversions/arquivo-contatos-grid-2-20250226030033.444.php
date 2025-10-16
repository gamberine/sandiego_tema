<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Tema_Dev_Gamb
 * @since Tema Dev-Gamb 1.0
 */

?>
<section class="gridBranco contatos pb-4 text-center" id="restaurantes">
  <?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <h2 class="tituloPrincipal text-center corPrincipal">
        <?php echo wp_kses_post(get_field('titulo_sessao_contatos')); ?>
        <div class="serrilhadoTitulo"></div>
      </h2>

      <div class="w-100 d-flex flex-wrap flex-row mx-auto">
        <?php for ($i = 1; $i <= 3; $i++) :
          $background = get_field("background_endereco_$i");
          $link = get_field("link_endereco_$i");
          $titulo = get_field("titulo_endereco_$i");
          $endereco = get_field("endereco_$i");
          $link_class = empty($link) ? 'inativo' : '';
        ?>
          <?php if (!empty($background) || !empty($titulo) || !empty($endereco)) : ?>
            <div class="boxImgContatos col-xxl-4 col-xl-4 col-lg-12 col-md-12"
              style="<?php echo !empty($background) ? "background: url(" . esc_url($background) . ") var(--corSecundariaTransp); background-size: cover !important;" : ''; ?>">

              <?php if (!empty($link)) : ?>
                <a target="_blank" href="<?php echo esc_url($link); ?>"></a>
              <?php endif; ?>

              <div class="textoContatos py-5">
                <a class="corTextos col-12 <?php echo esc_attr($link_class); ?>"
                  target="_blank" href="<?php echo esc_url($link); ?>">
                  <i class="fa-solid fa-location-dot"></i>
                  <?php if (!empty($titulo)) : ?>
                    <h3><?php echo wp_kses_post($titulo); ?></h3>
                  <?php endif; ?>
                  <?php if (!empty($endereco)) : ?>
                    <p><?php echo wp_kses_post($endereco); ?></p>
                  <?php endif; ?>
                </a>
              </div>
            </div>
          <?php endif; ?>
        <?php endfor; ?>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
  <?php wp_reset_query(); ?>
</section>