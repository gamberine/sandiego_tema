<?php

/**
 * Template part para exibir posts do tipo "servicos"
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Tema_Dev_Gamb
 * @since Tema Dev-Gamb 1.0
 */
?>
<section class="gridBranco">
  <div class="container">
    <div class="row">
      <div class="sliderImgTexto col-12" id="pisos">
        <?php
        $args = array(
          'post_type'      => 'servicos',
          'posts_per_page' => -1,
          'order'          => 'DESC',
          'orderby'        => 'date'
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) :
          while ($query->have_posts()) : $query->the_post();
            // Gerando um ID único para o modal deste post
            $modal_id = 'post-modal-' . get_the_ID();
        ?>
            <div class="text-center boxServicos col-xl-3 col-lg-6 col-md-12 col-sm-12 col-12" id="<?php echo esc_attr(get_the_ID()); ?>">
              <div class="gridImgItems">
                <img src="<?php echo esc_url(get_field('imagem_servico')); ?>" alt="<?php the_title_attribute(); ?>" />
              </div>
              <h4 class="fontTitulos corPrincipal text-uppercase mt-4 fw-bold"><?php the_title(); ?></h4>
              <p class="corTextos"><?php echo wp_kses_post(get_field('texto_resumo_servico')); ?></p>
              <button type="button" class="btnModal btnRounded" data-bs-toggle="modal" data-bs-target="#<?php echo esc_attr($modal_id); ?>">
                Saiba mais
              </button>
            </div>

          

        <?php
          endwhile;
        endif;
        wp_reset_postdata();
        ?>
        <div class="clear-both"></div>
      </div>
    </div>
  </div>
</section>