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


<section class="gridCinza" id="clientes">
  <div class="container text-center">
    <div class="row d-flex justify-content-center align-items-center text-center mb-3">

      <?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

          <div class="headerSection col-12 mb-5">

            <h2 class="title-primary justify-content-center">
              <i class="fa-solid fa-check"></i>
              <?php echo wp_kses_post(get_field('titulo_sessao_clientes')); ?>
            </h2>
            <?php echo wp_kses_post(get_field('texto_sessao_clientes')); ?>

          </div>

        <?php endwhile; ?>
      <?php endif; ?>

      <div class="clientes sliderRowSimples">
        <?php
        $args = array(
          'post_type'      => 'clientes',
          'posts_per_page' => -1,
          'order'          => 'DESC',
          'orderby'        => 'date'
        );

        query_posts($args);

        if (have_posts()) :
          while (have_posts()) : the_post();
            $link_cliente = get_field('link_cliente');
            $imagem_cliente = get_field('imagem_cliente');
            $link_atributos = $link_cliente ? 'target="_blank" href="' . esc_url($link_cliente) . '"' : 'style="pointer-events: none; cursor: not-allowed;"';
        ?>
            <div class="gridImgFlutuante">
              <a <?php echo $link_atributos; ?>>
                <img src="<?php echo wp_kses_post($imagem_cliente); ?>" />
              </a>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
      </div>

    </div>
  </div>
</section>