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
<!-- <div class="modal fade modalTop" id="dynamicGalleryModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <div id="galleryCarousel" class="carousel slideImgModal" data-bs-ride="carousel">
          <div class="carousel-inner carouselSlideImgModal">
            
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Próximo</span>
          </button>
        </div>
        <div id="carouselCaption" class="mt-2 text-center">
           
        </div>
      </div>
    </div>
  </div>
</div> -->

<!-- Modal dinâmico para galerias (inserir no footer) -->
<div class="modal fade modalTop" id="dynamicGalleryModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <!-- Título removido para simplificar -->
        <button type="button" class="btnClose" data-bs-dismiss="modal" aria-label="Fechar"><i class="fa-solid fa-xmark"></i></button>
      </div>
      <div class="modal-body pt-2 pb-0 px-0 mx-0">
        <!-- Container do slider usando Slick; os slides serão inseridos dinamicamente -->
        <div class="carouselSlideImgModal">
          <!-- Cada slide será gerado dinamicamente com a estrutura:
               <div class="imgGaleriaModal">
                 <img src="..." class="d-block w-100" alt="">
                 <div class="carouselCaption">Legenda da imagem</div>
               </div>
          -->
        </div>
      </div>
    </div>
  </div>
</div>