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
    // Argumentos da query para buscar todos os banners
    $args = array(
      'post_type' => 'banner',
      'posts_per_page' => -1, // -1 para buscar todos os posts
      'order' => 'DESC',
      'orderby' => 'date',
      // A dependência 'tax_query' foi removida conforme solicitado.
    );

    // 1. MELHOR PRÁTICA: Usar WP_Query em vez de query_posts
    $banner_query = new WP_Query($args);

    if ($banner_query->have_posts()) :
      while ($banner_query->have_posts()) : $banner_query->the_post();
        // Variáveis do ACF
        $selecao = get_field('select_imagem');
        $select_adicionar_botao = get_field('select_adicionar_botao');
        $select_imagem_lateral = get_field('select_imagem_lateral'); // Variável não utilizada no HTML visível
        $imagem_banner = get_field('imagem_banner');
        $imagem_banner_mobile = get_field('imagem_banner_mobile');
        $video_banner = get_field('video_banner');
    ?>

        <?php if ($selecao && $imagem_banner): ?>
          <?php
          // Define a imagem do background padrão como desktop
          $background_desktop_url = "url('" . esc_url($imagem_banner) . "'), var(--gradientHeader)";
          // Define a imagem do background mobile, se disponível, com fallback para a imagem desktop
          $fallback_mobile_img = $imagem_banner_mobile ?: $imagem_banner;
          $background_mobile_url = "url('" . esc_url($fallback_mobile_img) . "'), var(--gradientHeader)";
          ?>
          <div class="slide-items banner"
            style="background-image: <?php echo $background_desktop_url; ?>;"
            data-mobile-bg="<?php echo $background_mobile_url; ?>">

        <?php elseif (!$selecao && $video_banner): ?>
            <div class="slide-items video" style="background: var(--gradientHeader) !important; background-size: cover; background-blend-mode: multiply;">
              <video autoplay muted loop playsinline>
                <source src="<?php echo esc_url($video_banner); ?>" type="video/mp4">
              </video>
            </div> <?php else: ?>
            <div class="slide-items" style="background: var(--gradientHeader); background-size: cover;">
              <p>Slide não configurado corretamente.</p>
            </div> <?php endif; ?>

        <?php // O IF/ELSE acima só abre a div.slide-items, o conteúdo interno é comum a todos ?>
        <?php // Apenas o slide de 'imagem' e 'video' devem ter o conteúdo interno ?>
        <?php if (($selecao && $imagem_banner) || (!$selecao && $video_banner)): ?>
            <div class="formaBanner">
              <div class="animationFade"><?php echo wp_kses_post(get_field('texto_banner')); ?></div>
              <?php if ($select_adicionar_botao): ?>
                <div class="gridBtnPost">
                  <a href="<?php echo esc_url(get_field('link_botao')); ?>" class="btnBanner">
                    <?php echo wp_kses_post(get_field('botao_banner')); ?>
                  </a>
                </div>
              <?php endif; ?>
            </div>
            </div> <?php endif; ?>

      <?php endwhile;
    endif;
    // 2. MELHOR PRÁTICA: Resetar a query usando wp_reset_postdata()
    wp_reset_postdata();
    ?>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const banners = document.querySelectorAll('.slide-items.banner');

  function updateBannerBackgrounds() {
    const isMobile = window.innerWidth <= 991;

    banners.forEach(function(banner) {
      const mobileBg = banner.getAttribute('data-mobile-bg');
      
      // Armazena o background desktop original no primeiro carregamento, se não existir
      if (!banner.hasAttribute('data-desktop-bg')) {
        banner.setAttribute('data-desktop-bg', banner.style.backgroundImage);
      }
      const desktopBg = banner.getAttribute('data-desktop-bg');

      // Define o background correto
      if (isMobile && mobileBg) {
        // Usa o background mobile (sem adicionar 'url()' extra)
        banner.style.backgroundImage = mobileBg;
      } else {
        // Usa o background desktop
        banner.style.backgroundImage = desktopBg;
      }
    });
  }

  // Executa no carregamento da página
  updateBannerBackgrounds();

  // Executa ao redimensionar a tela (com otimização)
  let resizeTimer;
  window.addEventListener('resize', function() {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(updateBannerBackgrounds, 100);
  });
});
</script>