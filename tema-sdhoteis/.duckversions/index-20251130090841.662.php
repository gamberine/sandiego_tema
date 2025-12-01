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
        <div class="slide-items"
      style="background: url(https://gamberine.com.br/arquivos_publicos/sdhoteis/wp-content/uploads/2025/10/banner_home_2.jpg); background-size: cover;">
      <h2 class="break-spaces text-center w-50 mx-auto px-5 d-flex flex-wrap">
        <strong>site title arquivo</strong></h2>
      </div>

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
