<?php

/**
 * Template part para exibir posts do tipo "servicos" com modais dinâmicos
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package WordPress
 * @subpackage Tema_Dev_Gamb
 * @since Tema Dev-Gamb 1.0
 */
?>
<section class="gridBranco" id="pisos">
  <div class="container corSecundaria">
    <div class="row row-gap-5">
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
          // Gera um ID único para o modal deste post
          $modal_id    = 'modal-servico-' . get_the_ID();
          $img_servico = get_field('imagem_servico');
          $texto_resumo = get_field('texto_resumo_servico');
          $texto_servico = get_field('texto_servico');
      ?>
          <!-- Card do Serviço -->
          <div class="pisos col-xxl-3 col-xl-3 col-lg-6 col-md-12 col-sm-12 col-12 text-center">
            <a class="" data-bs-toggle="modal" data-bs-target="#<?php echo esc_attr($modal_id); ?>">
              <?php if ($img_servico) : ?>
                <div class="gridImgPadrao"><img src="<?php echo esc_url($img_servico); ?>" alt="<?php the_title_attribute(); ?>"> </div>
              <?php endif; ?>

              <div class="boxTextos corTextos">
                <h4 class="fontTitulos text-uppercase mt-4 mb-0 fw-bold"><?php the_title(); ?> </h4>
                <?php if ($texto_resumo) : ?>
                  <p><?php echo wp_kses_post($texto_resumo); ?></p>
                <?php endif; ?>
                <a class="btn btnPadrao" data-bs-toggle="modal" data-bs-target="#<?php echo esc_attr($modal_id); ?>">
                  Saiba mais
                </a>
              </div>
            </a>

          </div>

          <!-- Modal Dinâmico -->
          <!-- < ?php get_template_part('template-parts/arquivo-modal-servicos'); ?> -->
          <!-- Modal dinâmico para detalhe do serviço   -->
          <div class="modal fade modalTop" id="<?php echo esc_attr($modal_id); ?>" tabindex="-1" aria-labelledby="<?php echo esc_attr($modal_id . '-label'); ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title text-uppercase" id="<?php echo esc_attr($modal_id . '-label'); ?>"><?php the_title(); ?></h3>
                  <button type="button" class="btnClose close" data-bs-dismiss="modal" aria-label="<?php esc_attr_e('Fechar', 'text-domain'); ?>"><i class="fa-solid fa-circle-xmark"></i></button>
                </div>
                <div class="modal-body corTextos gap-2">
                  <?php if ($img_servico) : ?>
                    <img src="<?php echo esc_url($img_servico); ?>" class="img-flutuante" alt="<?php the_title_attribute(); ?>">
                  <?php endif; ?>
                  <?php if ($texto_servico) : ?>
                    <div class="modalTexto"><?php echo wp_kses_post($texto_servico); ?></div>
                  <?php endif; ?>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal"><?php esc_html_e('Fechar', 'text-domain'); ?></button>
                </div>
              </div>
            </div>
          </div>

      <?php
        endwhile;
      endif;
      wp_reset_postdata();
      ?>
    </div>
  </div>

</section>