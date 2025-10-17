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

<div class="modal" id="modal-<?php the_ID(); ?>" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php
            // Garantir que $modal_id esteja definido
            $modal_id = isset($modal_id) ? $modal_id : 'default-modal-id';
            $modal_label_id = esc_attr($modal_id . '-label');
            ?>

            <!-- Título para Mobile -->
            <h2 class="modalTitleMobile" id="<?php echo $modal_label_id; ?>"><?php the_title(); ?></h2>



            <button type="button" class="btnClose corPrincipal" aria-label="close">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <div class="gridModal text-color">
                <div class="modalImg col-4">
                    <img src="<?php echo esc_url(get_field('imagem_integrante')); ?>" alt="Imagem do Integrante">
                </div>
                <div class="modalContent col-8">
                    <!-- Título para Desktop -->
                    <h2 class="modalTitle corPrincipal" id="<?php echo $modal_label_id; ?>"><?php the_title(); ?></h2>
                    <div class="textoCurriculo">
                        <?php echo wp_kses_post(get_field('texto_curriculo_integrante')); ?>
                    </div>

                    <div class="iconsRedes">
                        <ul class="redesSociais">
                            <?php
                            for ($i = 1; $i <= 4; $i++) {
                                $link_rede = get_field("link_rede_$i");
                                $icone_rede = get_field("icone_rede_$i");

                                if ($link_rede && $icone_rede): ?>
                                    <li>
                                        <a href="<?php echo esc_url($link_rede); ?>" target="_blank">
                                            <?php echo wp_kses_post($icone_rede); ?>
                                        </a>
                                    </li>
                            <?php endif;
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>