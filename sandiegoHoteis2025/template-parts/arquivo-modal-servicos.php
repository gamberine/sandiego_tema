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

<!-- Modal dinâmico para detalhe do serviço   -->
<!-- <div class="modal fade modalTop" id="< ?php echo esc_attr($modal_id); ?>" tabindex="-1" aria-labelledby="< ?php echo esc_attr($modal_id . '-label'); ?>" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-uppercase" id="< ?php echo esc_attr($modal_id . '-label'); ?>">< ?php the_title(); ?></h3>
        <button type="button" class="btnClose" data-bs-dismiss="modal" aria-label="< ?php esc_attr_e('Fechar', 'text-domain'); ?>"><i class="close fa-solid fa-circle-xmark"></i></button>
      </div>
      <div class="modal-body text-color gap-2">
        < ?php if ($img_servico) : ?>
          <img src="< ?php echo esc_url($img_servico); ?>" class="img-flutuante" alt="< ?php the_title_attribute(); ?>">
        < ?php endif; ?>
        < ?php if ($texto_servico) : ?>
          <div>< ?php echo wp_kses_post($texto_servico); ?></div>
        < ?php endif; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">< ?php esc_html_e('Fechar', 'text-domain'); ?></button>
      </div>
    </div>
  </div>
</div> -->