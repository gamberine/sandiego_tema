<?php
/**
 * Banner padrão utilizado nas páginas institucionais.
 *
 * @package Tema_Dev_Gamb
 */
?>
<div class="rowBannerHome" id="home">
  <div class="bannerPrincipal">
    <?php if (have_rows('item_banner')) : ?>
      <?php
      while (have_rows('item_banner')) :
        the_row();
        $use_image = (bool) get_sub_field('select_imagem');
        $select_adicionar_botao = get_sub_field('select_adicionar_botao');
        $select_adicionar_texto = get_sub_field('select_adicionar_texto');
        $imagem_banner = get_sub_field('imagem_banner');
        $imagem_banner_mobile = get_sub_field('imagem_banner_mobile');
        $video_banner = get_sub_field('video_banner');
        $texto_banner = get_sub_field('texto_banner');
        $botao_banner = get_sub_field('botao_banner');
        $link_botao = get_sub_field('link_botao');
        $desktop_background = '';
        $mobile_background = '';

        if ($use_image && $imagem_banner) {
          $desktop_url = esc_url($imagem_banner);
          $mobile_url = esc_url($imagem_banner_mobile ?: $imagem_banner);
          $desktop_background = sprintf("url('%s'), var(--transparent)", $desktop_url);
          $mobile_background = sprintf("url('%s'), var(--transparent)", $mobile_url);
        }
      ?>
        <?php if ($use_image && $imagem_banner) : ?>
          <div class="slide-items banner"
            style="background: <?php echo esc_attr($desktop_background); ?>;"
            data-desktop-bg="<?php echo esc_attr($desktop_background); ?>"
            data-mobile-bg="<?php echo esc_attr($mobile_background); ?>">
        <?php elseif (!$use_image && $video_banner) : ?>
          <div class="slide-items video" style="background: var(--transparent) !important; background-size: cover; background-blend-mode: multiply;">
            <video autoplay muted loop>
              <source src="<?php echo esc_url($video_banner); ?>" type="video/mp4">
            </video>
        <?php else : ?>
          <div class="slide-items" style="background: var(--transparent); background-size: cover;">
            <p>Slide nao configurado corretamente.</p>
        <?php endif; ?>
            <div class="formaBanner">
                <?php if ($select_adicionar_texto && $texto_banner) : ?>
                <div class="animationFade"><?php echo wp_kses_post($texto_banner); ?></div>
              <?php endif; ?>
              <?php if ($select_adicionar_botao && $botao_banner && $link_botao) : ?>
                <div class="gridBtnPost">
                  <a href="<?php echo esc_url($link_botao); ?>" class="btnBanner">
                    <?php echo esc_html($botao_banner); ?>
                  </a>
                </div>
              <?php endif; ?>
            </div>
          </div>
      <?php endwhile; ?>
    <?php else : ?>
    <?php endif; ?>
  </div>
</div>