<?php
/**
 * Arquivo index.php do tema filho San Diego Hotéis 2025
 *
 * Este arquivo serve como fallback quando nenhum template mais específico
 * é encontrado. Ele exibe o conteúdo padrão dos posts.
 */

get_header();
?>
<?php
$banner_posts = get_posts([
  'post_type'      => 'conteudo',
  'posts_per_page' => 1,
  'orderby'        => 'date',
    'order'          => 'DESC',
    'no_found_rows'  => true,
  ]);

  $banner_entry = ! empty($banner_posts) ? $banner_posts[0] : null;

  $banner_img = $banner_entry ? get_field('banner-institucional', $banner_entry->ID) : '';

  $banner_url = '';
  if (is_array($banner_img) && !empty($banner_img['url'])) {
      $banner_url = esc_url($banner_img['url']);
  } elseif (is_string($banner_img)) {
      $banner_url = esc_url($banner_img);
  }
  ?>
  <div class="banner-institucional"
      style="background-image: url('<?php echo $banner_url; ?>'), var(--primary-gradient);">
    <h2 class="break-spaces text-center w-50 mx-auto px-5 d-flex flex-wrap">
      <strong><?php sd_page_title(); ?></strong>
    </h2>
  </div>


<section class="container my-5 py-5">
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
