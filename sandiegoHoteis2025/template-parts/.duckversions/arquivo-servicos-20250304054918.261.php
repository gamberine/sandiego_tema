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
<section class="gridBranco">
  <div class="container">
    <div class="row">
      <div class="sliderImgTexto col-12" id="pisos">

        <?php $args = array(
          'post_type' => 'servicos',
          'posts_per_page' => -1,
          'order' => 'date',
          'oderby' => 'DESC'
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) :
          while ($query->have_posts()) : $query->the_post();
            $modal_id = 'post-modal-' . get_the_ID(); ?>

            <div class="text-center boxServicos col-xl-3 col-lg-6 col-md-12 col-sm-12 col-12" id="<?php echo get_the_ID(); ?>">
              <div class="gridImgItems">
                <img src="<?php echo wp_kses_post(get_field('imagem_servico')); ?>" />
              </div>
              <h4 class="fontTitulos corPrincipal text-uppercase mt-4 fw-bold"><?php the_title(); ?></h4>
              <p class="text-center"><?php $summary = wp_kses_post(get_field('texto_resumo_servico'));
                                      echo substr($summary, 0, 120); ?>...</p>
              <button type="button" class="btnModal btnRounded" data-bs-toggle="modal" data-bs-target="#<?php echo esc_attr($modal_id); ?>">
                Saiba mais
              </button>

              <!-- <p class="corTextos">< ?php echo wp_kses_post(get_field('texto_resumo_servico')); ?></p> -->
              <p class="d-none corTextos"><?php echo wp_kses_post(get_field('texto_servico')); ?></p>

              <!-- <a href="< ?php the_permalink(); ?>" class="">
              </a> -->
            </div>


            <div class="modal fade modalTop" id="<?php echo esc_attr($modal_id); ?>" tabindex="1" aria-labelledby="<?php echo esc_attr($modal_id . '-label'); ?>" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title fs-5 corPrincipal" id="<?php echo esc_attr($modal_id . '-label'); ?>"><?php the_title(); ?></h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body corTextos">
                    <div class="gridImgItems">
                      <img src="<?php echo wp_kses_post(get_field('imagem_servico')); ?>" />
                    </div>
                    <div class="">
                      <?php echo wp_kses_post(get_field('texto_servico')); ?>
                    </div>
                  </div>
                  <div class="modal-footer">
                  </div>
                </div>
              </div>
            </div>


          <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_query();
        // wp_reset_postdata(); 
        ?>
        <div class="clear-both"></div>
      </div>
    </div>
  </div>
</section>