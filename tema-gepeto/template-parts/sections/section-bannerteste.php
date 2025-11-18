<?php
/**
 * Banner principal exibido na Home.
 *
 * @package Tema_Dev_Gamb
 */

$queried_object = get_queried_object();
$term_slug      = '';

if ($queried_object instanceof WP_Post) {
    $term_slug = $queried_object->post_name ?: sanitize_title($queried_object->post_title);
}

$banner_args = array(
    'post_type'      => 'banner',
    'posts_per_page' => -1,
    'orderby'        => 'date',
    'order'          => 'DESC',
    'no_found_rows'  => true,
);

if ($term_slug) {
    $banner_args['tax_query'] = array(
        array(
            'taxonomy' => 'category_banner',
            'field'    => 'slug',
            'terms'    => $term_slug,
        ),
    );
}

$banner_query = new WP_Query($banner_args);

if (! $banner_query->have_posts()) {
    wp_reset_postdata();
    return;
}
?>

<div class="rowBannerHome" id="home">
  <div class="bannerPrincipal">
    <?php
    while ($banner_query->have_posts()) :
        $banner_query->the_post();

        $use_image       = (bool) get_field('select_imagem');
        $show_button     = (bool) get_field('select_adicionar_botao');
        $desktop_image   = get_field('imagem_banner');
        $mobile_image    = get_field('imagem_banner_mobile');
        $video_banner    = get_field('video_banner');
        $banner_text     = get_field('texto_banner');
        $button_label    = get_field('botao_banner');
        $button_link     = get_field('link_botao');
        $has_media       = $use_image ? ! empty($desktop_image) : ! empty($video_banner);
        $mobile_fallback = $mobile_image ?: $desktop_image;

        if (! $has_media) {
            continue;
        }

        $desktop_background = ! empty($desktop_image) ? sprintf("var(--gradientHeader), url('%s')", esc_url_raw($desktop_image)) : 'var(--gradientHeader)';
        $mobile_background  = ! empty($mobile_fallback) ? sprintf("var(--gradientHeader), url('%s')", esc_url_raw($mobile_fallback)) : $desktop_background;
        $slide_class        = $use_image ? 'banner' : 'video';
        ?>

        <div class="slide-items <?php echo esc_attr($slide_class); ?>"
          <?php if ($use_image && ! empty($desktop_image)) : ?>
            style="background-image: <?php echo esc_attr($desktop_background); ?>;"
            data-desktop-bg="<?php echo esc_attr($desktop_background); ?>"
            data-mobile-bg="<?php echo esc_attr($mobile_background); ?>"
          <?php endif; ?>
        >
          <?php if (! $use_image && $video_banner) : ?>
            <video autoplay muted loop playsinline>
              <source src="<?php echo esc_url($video_banner); ?>" type="video/mp4">
            </video>
          <?php endif; ?>

          <div class="formaBanner">
            <?php if (! empty($banner_text)) : ?>
              <div class="animationFade">
                <?php echo wp_kses_post($banner_text); ?>
              </div>
            <?php endif; ?>

            <?php if ($show_button && ! empty($button_label) && ! empty($button_link)) : ?>
              <div class="gridBtnPost">
                <a href="<?php echo esc_url($button_link); ?>" class="btnBanner">
                  <?php echo esc_html($button_label); ?>
                </a>
              </div>
            <?php endif; ?>
          </div>
        </div>
    <?php endwhile; ?>
  </div>
</div>

<?php
wp_reset_postdata();
