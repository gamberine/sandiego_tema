<?php
/**
 * Seção: Experiência San Diego
 *
 * Exibe uma galeria de imagens configurável via ACF.
 */
$galeria = sd_field('home_experiencia_galeria');
?>
<section class="section-pad">
  <div class="container">
    <div class="text-center mb-4">
      <h2 class="sd-title display-6">Experiência San Diego</h2>
    </div>
    <div class="row g-3 align-items-stretch">
      <?php
      if ( is_array( $galeria ) && $galeria ) {
        foreach ( $galeria as $img ) {
          echo '<div class="col-12 col-md-4"><img class="w-100 h-100 object-fit-cover rounded-3" src="' . esc_url( $img['url'] ) . '" alt=""></div>';
        }
      } else {
        // Espaços reservados caso não haja imagens definidas
        for ( $i = 0; $i < 3; $i++ ) {
          echo '<div class="col-12 col-md-4"><div class="ratio ratio-4x3 bg-light rounded-3"></div></div>';
        }
      }
      ?>
    </div>
  </div>
</section>
