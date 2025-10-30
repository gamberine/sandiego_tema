  <?php
  /**
   * Seção: Banner da página inicial
   *
   * Exibe uma imagem de capa com título e subtítulo configuráveis via ACF.
   */
  $banner_img = sd_field('home_banner_imagem');
  if (! $banner_img) {
    // Se não houver imagem definida pelo ACF, usa a imagem destacada da página
    $banner_img = get_the_post_thumbnail_url(get_the_ID(), 'full');
  }
  $titulo = sd_field('home_banner_titulo', get_the_ID(), 'Desfrute do melhor da hospitalidade mineira');
  $sub    = sd_field('home_banner_sub', get_the_ID(), 'Belo Horizonte • Lourdes');
  ?>
  <section class="position-relative" style="min-height:70vh;background:linear-gradient(0deg,rgba(0,0,0,.55),rgba(0,0,0,.55)),url('<?php echo esc_url($banner_img); ?>') center/cover no-repeat;">
    <div class="container h-100 d-flex align-items-center justify-content-center text-center text-white">
      <div>
        <h1 class="display-5 fw-bold sd-title mb-3"><?php echo wp_kses_post($titulo); ?></h1>
        <div class="fs-5"><?php echo wp_kses_post($sub); ?></div>
        <div class="mt-4"><a href="#hoteis" class="sd-btn btn-lg">Saiba mais</a></div>
      </div>
    </div>
  </section>