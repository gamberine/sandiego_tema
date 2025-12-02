<?php

/**
 * Template Name: Contato Hotéis Final
 *
 * Página que lista as informações de contato de todos os hotéis cadastrados
 * e exibe um formulário de contato.
 */
get_header();
?>


<div class="rowBannerHome" id="home">
  <div class="bannerPrincipal">
    <?php if (have_rows('item_banner_internas')) : ?>
      <?php
      while (have_rows('item_banner_internas')) :
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

          <?php get_template_part('template-parts/sections/section', 'search'); ?>

          <section class="section-pad">
            <div class="container">
              <div class="text-center mx-auto mb-5">
                <h4 class="accent-color mb-0">Contato</h4>
                <h2 class="primary-color">Hot&eacute;is</h2>
              </div>
              <div class="row g-4 sd-contato-hotels">
                <?php
                $loop = new WP_Query([
                  'post_type'      => 'hoteis',
                  'posts_per_page' => -1,
                  'meta_key'       => 'hotel_ordem',
                  'orderby'        => ['meta_value_num' => 'ASC', 'title' => 'ASC'],
                  'meta_query'     => [
                    [
                      'key'     => 'hotel_exibir_contato',
                      'compare' => '!=',
                      'value'   => '0',
                    ],
                  ],
                ]);

                if ($loop->have_posts()) :
                  while ($loop->have_posts()) :
                    $loop->the_post();
                    $cidade    = sd_field('hotel_cidade');
                    $estado    = sd_field('hotel_estado');
                    $bairro    = sd_field('hotel_bairro');
                    $telefone  = sd_field('hotel_tel');
                    $whatsapp  = sd_field('hotel_whatsapp');
                    $email     = sd_field('hotel_email');
                    $endereco  = sd_field('hotel_endereco');
                    $reserva   = sd_field('hotel_url_reserva');
                    $thumb     = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                ?>
                    <div class="col-12 col-md-6 col-xl-3">
                      <div class="sd-hotel-contact-card h-100">
                        <div class="sd-hotel-contact-card__media">
                          <?php if ($thumb) : ?>
                            <img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>">
                          <?php else : ?>
                            <div class="sd-hotel-contact-card__placeholder"></div>
                          <?php endif; ?>
                        </div>
                        <div class="sd-hotel-contact-card__body">
                          <?php if ($cidade || $estado || $bairro) : ?>
                            <div class="sd-hotel-contact-card__location">
                              <?php echo esc_html(trim($cidade . ($estado ? ' - ' . $estado : ''))); ?>
                              <?php if ($bairro) : ?>
                                <span class="sd-hotel-contact-card__bairro">- <?php echo esc_html($bairro); ?></span>
                              <?php endif; ?>
                            </div>
                          <?php endif; ?>

                          <h3 class="h5 mb-2"><?php the_title(); ?></h3>

                          <ul class="sd-hotel-contact-card__list">
                            <?php if ($telefone) : ?>
                              <li><span>Telefone:</span> <a href="tel:<?php echo esc_attr($telefone); ?>"><?php echo esc_html($telefone); ?></a></li>
                            <?php endif; ?>
                            <?php if ($whatsapp) : ?>
                              <li><span>WhatsApp:</span> <a href="https://wa.me/<?php echo preg_replace('/\D+/', '', esc_attr($whatsapp)); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html($whatsapp); ?></a></li>
                            <?php endif; ?>
                            <?php if ($email) : ?>
                              <li><span>E-mail:</span> <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></li>
                            <?php endif; ?>
                            <?php if ($endereco) : ?>
                              <li><span>Endereco:</span> <?php echo esc_html($endereco); ?></li>
                            <?php endif; ?>
                          </ul>

                          <div class="d-flex align-items-center gap-2">
                            <?php if ($reserva) : ?>
                              <a class="btn btn-accent flex-grow-1" href="<?php echo esc_url($reserva); ?>" target="_blank" rel="noopener noreferrer">Reservar</a>
                            <?php endif; ?>
                            <a class="btn btn-outline-primary flex-grow-1" href="<?php the_permalink(); ?>">Ver detalhes</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endwhile; ?>
                  <?php wp_reset_postdata(); ?>
                <?php else : ?>
                  <div class="col-12">
                    <p class="text-center mb-0">Nenhum hotel cadastrado no momento.</p>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </section>
          <section class="diff container pt-0 pb-5 mb-5">

            <div class="row align-items-stretch flex-lg-wrap flex-xl-nowrap mt-0 mb-5">

              <div class="col-12 col-lg-12 col-xl-5 py-xl-0 d-flex align-items-center text-center h-auto">
                <div class="cta-card gap-4 mx-xl-4">
                  <h2 class="mb-2"><?php echo esc_html(sd_field('contato_form_titulo', get_the_ID(), 'Quer conversar sobre os nossos serviços de administração?')); ?></h2>
                  <h3 class="px-3"><?php echo esc_html(sd_field('contato_form_sub', get_the_ID(), 'Preencha seus dados que entraremos em contato.')); ?></h3>
                </div>
              </div>

              <!-- formulario de contato -->

              <?php echo do_shortcode('[contact-form-7 id="7772880" title="Formulario_de_contato"]'); ?>


            </div>


            <div class="row mb-5 mt-0 px-5 pb-5 w-100">
              <a class="btn btn-accent mx-auto w-80" href="<?php echo esc_url(sd_field('contato_admin_url', get_the_ID(), '#')); ?>" target="_blank" rel="noopener noreferrer">Clique aqui para falar com a Administradora da Rede</a>
            </div>


          </section>
          <?php
          get_footer();
          ?>