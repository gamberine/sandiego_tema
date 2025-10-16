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

<!-- Modal dinâmico para galerias (inserir no footer) -->
<div class="modal fade modalTop" id="dynamicGalleryModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <!-- Título removido para simplificar -->
        <button type="button" class="btnClose" data-bs-dismiss="modal" aria-label="Fechar"><i class="fa-solid fa-xmark"></i></button>
      </div>
      <div class="modal-body py-2">
        <!-- Container do slider usando Slick; os slides serão inseridos dinamicamente -->
        <div class="carou selSlideImgModal">
          <!-- Cada slide será gerado dinamicamente com a estrutura:
               <div class="imgGaleriaModal">
                 <img src="..." class="d-block w-100" alt="">
                 <div class="carouselCaption">Legenda da imagem</div>
               </div> -->
        </div>
      </div>
    </div>
  </div>
</div>