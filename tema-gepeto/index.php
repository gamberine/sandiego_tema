<?php
/**
 * Arquivo index.php do tema filho San Diego Hotéis 2025
 *
 * Este arquivo serve como fallback quando nenhum template mais específico
 * é encontrado. Ele exibe o conteúdo padrão dos posts.
 */

get_header();
?>
<main class="container py-5">
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
</main>
<?php get_footer(); ?>
