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
<section class="gridBranco mb-lg-0 pb-lg-0" id="pisos">
  <div class="full-max-width mx-lg-0 px-lg-0 text-center corSecundariaHover">
    <div class="sliderImg4x2Texto">
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
          <div class="col-xxl-4 col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 text-center">

            <!-- <div class="gridImgItems"> -->
            <?php if ($img_servico) : ?>
              <img src="<?php echo esc_url($img_servico); ?>" alt="<?php the_title_attribute(); ?>">
            <?php endif; ?>
            <!-- </div> -->
            <!-- <div class="boxTextos corTextos"> -->
            <h4 class="fontTitulos text-uppercase mt-3 mb-0 fw-bold"><?php the_title(); ?> </h4>
            <?php if ($texto_resumo) : ?>
              <?php echo wp_kses_post($texto_resumo); ?>
            <?php endif; ?>
            <button tton type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?php echo esc_attr($modal_id); ?>">
              Saiba mais
            </button>
            <!-- </div> -->



          </div>

          <!-- Modal Dinâmico -->
          <div class="modal fade modalTop" id="<?php echo esc_attr($modal_id); ?>" tabindex="-1" aria-labelledby="<?php echo esc_attr($modal_id . '-label'); ?>" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title text-uppercase" id="<?php echo esc_attr($modal_id . '-label'); ?>"><?php the_title(); ?></h3>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="<?php esc_attr_e('Fechar', 'text-domain'); ?>"></button>
                </div>
                <div class="modal-body corTextos gap-2">
                  <?php if ($img_servico) : ?>
                    <img src="<?php echo esc_url($img_servico); ?>" class="img-flutuante" alt="<?php the_title_attribute(); ?>">
                  <?php endif; ?>
                  <?php if ($texto_servico) : ?>
                    <div><?php echo wp_kses_post($texto_servico); ?></div>
                  <?php endif; ?>
                </div>
                <div class="modal-footer">
                  <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">< ?php esc_html_e('Fechar', 'text-domain'); ?></button> -->
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

<!-- Estrutura do Modal para este serviço -->
<!-- <div class="modal fade modalTop" id="< ?php echo esc_attr($modal_id); ?>" tabindex="-1" aria-labelledby="< ?php echo esc_attr($modal_id . '-label'); ?>" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5 corPrincipal" id="< ?php echo esc_attr($modal_id . '-label'); ?>">< ?php the_title(); ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="< ?php esc_attr_e('Close', 'text-domain'); ?>"></button>
      </div>
      <div class="modal-body corTextos">
        <div class="gridImgItems">
          <img src="< ?php echo esc_url(get_field('imagem_servico')); ?>" alt="< ?php the_title_attribute(); ?>" />
        </div>
        <div>
          < ?php echo wp_kses_post(get_field('texto_servico')); ?>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div> -->