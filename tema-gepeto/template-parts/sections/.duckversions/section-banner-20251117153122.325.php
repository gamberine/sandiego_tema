< ?php
/**
 * Banner padrão utilizado nas páginas institucionais.
 *
 * @package Tema_Dev_Gamb
 */

// $page_id          = get_queried_object_id();
// $media_type       = get_field('page_banner_media_type', $page_id) ?: 'image';
// $image_desktop    = get_field('page_banner_image', $page_id);
// $image_mobile     = get_field('page_banner_image_mobile', $page_id);
// $video_file       = get_field('page_banner_video', $page_id);
// $banner_content   = get_field('page_banner_content', $page_id);
// $button_label     = get_field('page_banner_button_label', $page_id);
// $button_link      = get_field('page_banner_button_link', $page_id);
// $has_image_media  = 'image' === $media_type && ! empty($image_desktop);
// $has_video_media  = 'video' === $media_type && ! empty($video_file['url']);
// $should_render    = $has_image_media || $has_video_media;

// if (! $should_render) {
//     return;
// }

// $desktop_background = $has_image_media
//     ? sprintf("var(--gradientHeader), url('%s')", esc_url_raw($image_desktop['url']))
//     : 'var(--gradientHeader)';

// $mobile_reference = ($image_mobile['url'] ?? '') ?: ($image_desktop['url'] ?? '');
// $mobile_background = $mobile_reference
//     ? sprintf("var(--gradientHeader), url('%s')", esc_url_raw($mobile_reference))
//     : $desktop_background;

// $button_url   = $button_link['url'] ?? '';
// $button_title = $button_label ?: ($button_link['title'] ?? '');
// $button_target = $button_link['target'] ?? '_self';
// $button_rel    = '_blank' === $button_target ? 'noopener noreferrer' : '';
// ? >

<!-- <section class="rowBannerHome page-default-banner" id="page-banner">
  <div class="bannerPrincipal" data-static="true">
    <div class="slide-items < ?php echo esc_attr($has_video_media ? 'video' : 'banner'); ?>"
      < ?php if ($has_image_media) : ?>
        style="background-image: < ?php echo esc_attr($desktop_background); ?>;"
        data-desktop-bg="< ?php echo esc_attr($desktop_background); ?>"
        data-mobile-bg="< ?php echo esc_attr($mobile_background); ?>"
      < ?php endif; ?>
    >
      < ?php if ($has_video_media) : ?>
        <video autoplay muted loop playsinline>
          <source src="< ?php echo esc_url($video_file['url']); ?>" type="< ?php echo esc_attr($video_file['mime_type'] ?? 'video/mp4'); ?>">
        </video>
      < ?php endif; ?>

      <div class="formaBanner">
        < ?php if (! empty($banner_content)) : ?>
          <div class="animationFade">
            < ?php echo wp_kses_post($banner_content); ?>
          </div>
        < ?php endif; ?>

        < ?php if ($button_url && $button_title) : ?>
          <div class="gridBtnPost">
            <a class="btnBanner" href="< ?php echo esc_url($button_url); ?>" target="< ?php echo esc_attr($button_target); ?>"< ?php echo $button_rel ? ' rel="' . esc_attr($button_rel) . '"' : ''; ?>>
              < ?php echo esc_html($button_title); ?>
            </a>
          </div>
        < ?php endif; ?>
      </div>
    </div>
  </div>
</section> -->

<?php

/**
 * Banner padrão utilizado nas páginas institucionais.
 *
 * @package Tema_Dev_Gamb
 */
?>

<div class="rowBannerHome" id="home">
  <div class="bannerPrincipal">
    <?php
    $args = array(
      'post_type' => 'banner',
      'posts_per_page' => -1,
      'order' => 'DESC',
      'orderby' => 'date',
      'tax_query' => array(
        array(
          'taxonomy' => 'category_banner',
          'field' => 'slug',
          'terms' => get_the_title(),
          'hierarchical' => 0,
        ),
      ),
    );
    query_posts($args);

    if (have_posts()) :
      while (have_posts()) : the_post();
        // Variáveis do ACF
        $selecao = get_field('select_imagem');
        $select_adicionar_botao = get_field('select_adicionar_botao');
        $select_imagem_lateral = get_field('select_imagem_lateral');
        $imagem_banner = get_field('imagem_banner');
        $imagem_banner_mobile = get_field('imagem_banner_mobile');
        $video_banner = get_field('video_banner');
    ?>

        <?php if ($selecao && $imagem_banner): ?>
          <?php
          // Define a imagem do background padrão como desktop
          $background_desktop = esc_url($imagem_banner);
          // Define a imagem do background mobile, se disponível, com fallback para a imagem desktop
          $background_mobile = esc_url($imagem_banner_mobile ?: $imagem_banner);
          ?>
          <!-- Adiciona ambas as imagens e configurações -->

          <div class="slide-items banner"
            style="background: url('<?php echo $background_desktop; ?>'), var(--gradientHeader);"
            data-mobile-bg="url('<?php echo $background_mobile; ?>'), var(--gradientHeader);">

          <?php elseif (!$selecao && $video_banner): ?>
            <!-- Exibe vídeo se select_imagem for false -->
            <div class="slide-items video" style="background: var(--gradientHeader) !important; background-size: cover; background-blend-mode: multiply;">
              <video autoplay muted loop>
                <source src="<?php echo esc_url($video_banner); ?>" type="video/mp4">
              </video>
            <?php else: ?>
              <!-- Exibe um slide padrão caso nenhum campo esteja configurado -->
              <div class="slide-items" style="background: var(--gradientHeader); background-size: cover;">
                <p>Slide não configurado corretamente.</p>
              <?php endif; ?>
              <div class="formaBanner">
                <!-- <h1>< ?php the_title(); ?></h1> -->
                <div class="animationFade"><?php echo wp_kses_post(get_field('texto_banner')); ?></div>
                <?php if ($select_adicionar_botao): ?>
                  <div class="gridBtnPost">
                    <a href="<?php echo esc_url(get_field('link_botao')); ?>" class="btnBanner">
                      <?php echo wp_kses_post(get_field('botao_banner')); ?>
                    </a>
                  </div>
                <?php endif; ?>
              </div>
              <!-- < ?php if ($select_imagem_lateral): ?>
                                <div class="imgLateral">
                                    <img src="< ?php echo esc_url(get_field('imagemLateral')); ?>" />
                                </div>
                            < ?php endif; ?> -->
              </div>
          <?php endwhile;
      endif;
      wp_reset_query();
          ?>
            </div>
          </div>

          <script>
            document.addEventListener('DOMContentLoaded', function() {
              const banners = document.querySelectorAll('.slide-items.banner');
              banners.forEach(function(banner) {
                const mobileBg = banner.getAttribute('data-mobile-bg');
                if (window.innerWidth <= 991 && mobileBg) {
                  banner.style.backgroundImage = `url('${mobileBg}')`;
                }
              });

              // Atualiza a imagem ao redimensionar a tela
              window.addEventListener('resize', function() {
                banners.forEach(function(banner) {
                  const mobileBg = banner.getAttribute('data-mobile-bg');
                  const desktopBg = banner.style.backgroundImage;
                  if (window.innerWidth <= 991 && mobileBg) {
                    banner.style.backgroundImage = `url('${mobileBg}')`;
                  } else {
                    banner.style.backgroundImage = desktopBg;
                  }
                });
              });
            });
          </script>
