<?php
/* Template Name: BKUP Home SD */
get_header();
?>
<main id="primary" class="site-main sandiego">
 <div class="rowBannerHome" id="home">
  <div class="bannerPrincipal">
    <?php if (have_rows('item_banner')) : ?>
      <?php
      while (have_rows('item_banner')) :
        the_row();
        $use_image = (bool) get_sub_field('select_imagem');
        $select_adicionar_botao = get_sub_field('select_adicionar_botao');
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
              <?php if (!empty($texto_banner)) : ?>
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
      <div class="slide-items" style="background: var(--transparent); background-size: cover;">
        <p>Adicione ao menos um banner na pagina para exibi-lo aqui.</p>
      </div>
    <?php endif; ?>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const banners = document.querySelectorAll('.slide-items.banner');
    const updateBackgrounds = function() {
      banners.forEach(function(banner) {
        const mobileBg = banner.dataset.mobileBg;
        const desktopBg = banner.dataset.desktopBg;
        if (window.innerWidth <= 991 && mobileBg) {
          banner.style.background = mobileBg;
        } else if (desktopBg) {
          banner.style.background = desktopBg;
        }
      });
    };

    updateBackgrounds();
    window.addEventListener('resize', updateBackgrounds);
  });
</script>
  <?php if (have_rows('home_sections')): while (have_rows('home_sections')): the_row();
      if (get_row_layout() == 'search') get_template_part('template-parts/sections/section', 'search');
      if (get_row_layout() == 'services') get_template_part('template-parts/sections/section', 'services');
      if (get_row_layout() == 'numbers') get_template_part('template-parts/sections/section', 'numbers');
      if (get_row_layout() == 'differentials') get_template_part('template-parts/sections/section', 'differentials');
    endwhile;
  endif; ?>
  <section class="diff container pt-0 pb-5 mb-5">
    <div class="row align-items-stretch flex-lg-wrap flex-xl-nowrap mt-0 mb-5">

      <div class="col-12 col-lg-12 col-xl-5 py-xl-0 d-flex align-items-center text-center h-auto">
      <div class="cta-card gap-4 mx-xl-4">
        <h2 class="mb-2"><?php echo esc_html( sd_field('contato_form_titulo', get_the_ID(), 'Quer conversar sobre os nossos serviços de administração?') ); ?></h2>
        <h3 class="px-3"><?php echo esc_html( sd_field('contato_form_sub', get_the_ID(), 'Preencha seus dados que entraremos em contato.') ); ?></h3>
      </div>
    </div>

    <!-- formulario de contato -->

    <div class="col-12 col-lg-12 col-xl-7">
      <?php echo do_shortcode('[contact-form-7 id="7772880" title="Formulario_de_contato"]'); ?>
    </div>
    
    </div>
  </section>
</main>
<?php get_footer(); ?>