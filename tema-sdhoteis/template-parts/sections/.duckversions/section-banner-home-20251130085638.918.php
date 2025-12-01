<?php
/**
 * Banner padrão utilizado nas páginas institucionais.
 *
 * @package Tema_Dev_Gamb
 */

$page_id          = get_queried_object_id();
$media_type       = get_field('page_banner_media_type', $page_id) ?: 'image';
$image_desktop    = get_field('page_banner_image', $page_id);
$image_mobile     = get_field('page_banner_image_mobile', $page_id);
$video_file       = get_field('page_banner_video', $page_id);
$banner_content   = get_field('page_banner_content', $page_id);
$button_label     = get_field('page_banner_button_label', $page_id);
$button_link      = get_field('page_banner_button_link', $page_id);
$has_image_media  = 'image' === $media_type && ! empty($image_desktop);
$has_video_media  = 'video' === $media_type && ! empty($video_file['url']);
$should_render    = $has_image_media || $has_video_media;

if (! $should_render) {
    return;
}

$desktop_background = $has_image_media
    ? sprintf("var(--transparent), url('%s')", esc_url_raw($image_desktop['url']))
    : 'var(--transparent)';

$mobile_reference = ($image_mobile['url'] ?? '') ?: ($image_desktop['url'] ?? '');
$mobile_background = $mobile_reference
    ? sprintf("var(--transparent), url('%s')", esc_url_raw($mobile_reference))
    : $desktop_background;

$button_url   = $button_link['url'] ?? '';
$button_title = $button_label ?: ($button_link['title'] ?? '');
$button_target = $button_link['target'] ?? '_self';
$button_rel    = '_blank' === $button_target ? 'noopener noreferrer' : '';
?>

<section class="rowBannerHome page-default-banner" id="page-banner">
  <div class="bannerPrincipal" data-static="true">
    <div class="slide-items <?php echo esc_attr($has_video_media ? 'video' : 'banner'); ?>"
      <?php if ($has_image_media) : ?>
        style="background-image: <?php echo esc_attr($desktop_background); ?>;"
        data-desktop-bg="<?php echo esc_attr($desktop_background); ?>"
        data-mobile-bg="<?php echo esc_attr($mobile_background); ?>"
      <?php endif; ?>
    >
      <?php if ($has_video_media) : ?>
        <video autoplay muted loop playsinline>
          <source src="<?php echo esc_url($video_file['url']); ?>" type="<?php echo esc_attr($video_file['mime_type'] ?? 'video/mp4'); ?>">
        </video>
      <?php endif; ?>

      <div class="formaBanner">
        <?php if (! empty($banner_content)) : ?>
          <div class="animationFade">
            <?php echo wp_kses_post($banner_content); ?>
          </div>
        <?php endif; ?>

        <?php if ($button_url && $button_title) : ?>
          <div class="gridBtnPost">
            <a class="btnBanner" href="<?php echo esc_url($button_url); ?>" target="<?php echo esc_attr($button_target); ?>"<?php echo $button_rel ? ' rel="' . esc_attr($button_rel) . '"' : ''; ?>>
              <?php echo esc_html($button_title); ?>
            </a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
