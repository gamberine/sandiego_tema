<?php
/**
 * Banner paginas institucionais.
 *
 * @package Tema_Dev_Gamb
 */
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
  <h2 class="break-spaces text-center w-50 mx-auto px-5 d-flex flex-wrap align-items-center justify-content-center">
    <strong><?php sd_page_title(); ?></strong>
  </h2>
</div>