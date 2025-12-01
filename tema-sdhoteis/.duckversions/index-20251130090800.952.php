<?php
/**
 * Arquivo index.php do tema filho San Diego Hotéis 2025
 *
 * Este arquivo serve como fallback quando nenhum template mais específico
 * é encontrado. Ele exibe o conteúdo padrão dos posts.
 */

get_header();
?>
<section class="container my-5 py-5">
  <h2 class="text-center w-75 mx-auto h-25 font-title primary-color">
    site title arquivo
    formato de banner
  </h2>
<div class="politica">


  <?php
  if ( have_posts() ) {
    while ( have_posts() ) {
      the_post();
      the_content();
    }
  } else {
    echo '<p>' . esc_html__( 'Nenhum conteúdo encontrado.', 'san-diego-hoteis-2025' ) . '</p>';
  }
  ?>
  </div>
</section>
<?php get_footer(); ?>
