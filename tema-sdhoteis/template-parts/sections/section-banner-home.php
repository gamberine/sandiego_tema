<?php
/**
 * Banner padrão utilizado nas páginas institucionais.
 *
 * @package Tema_Dev_Gamb
 */
?>

<div class="rowBannerHome" id="home">
  <div class="bannerPrincipal">

    <?php if ( have_rows('item_banner') ) : ?>

      <?php while ( have_rows('item_banner') ) : the_row();

        $use_image              = (bool) get_sub_field('select_imagem');
        $select_adicionar_botao = get_sub_field('select_adicionar_botao');
        $select_adicionar_texto = get_sub_field('select_adicionar_texto');

        $imagem_banner          = get_sub_field('imagem_banner');
        $imagem_banner_mobile   = get_sub_field('imagem_banner_mobile');
        $video_banner           = get_sub_field('video_banner');
        $texto_banner           = get_sub_field('texto_banner');
        $botao_banner           = get_sub_field('botao_banner');
        $link_botao             = get_sub_field('link_botao');
        $align_items            = get_sub_field('alinhamento_conteudo');

        $desktop_background = '';
        $mobile_background  = '';

        if ( $use_image && $imagem_banner ) {
          $desktop_url  = esc_url( $imagem_banner );
          $mobile_url   = esc_url( $imagem_banner_mobile ?: $imagem_banner );

          $desktop_background = "url('{$desktop_url}'), var(--transparent)";
          $mobile_background  = "url('{$mobile_url}'), var(--transparent)";
        }
      ?>

        <?php if ( $use_image && $imagem_banner ) : ?>

          <div class="slide-items banner"
               style="background: <?php echo esc_attr($desktop_background); ?>;"
               data-desktop-bg="<?php echo esc_attr($desktop_background); ?>"
               data-mobile-bg="<?php echo esc_attr($mobile_background); ?>">

                <?php elseif ( !$use_image && $video_banner ) : ?>

          <div class="slide-items video"
                style="background: var(--transparent) !important; background-size: cover; background-blend-mode: multiply;">
                    <video autoplay muted loop>
                      <source src="<?php echo esc_url( $video_banner ); ?>" type="video/mp4">
                    </video>

                <?php else : ?>

                  <!-- Fallback direto para o banner institucional -->
                  <div class="slide-items" style="background: var(--transparent); background-size: cover;">
                    <?php get_template_part( 'template-parts/sections/section', 'banner-institucional' ); ?>
                  </div>

                <?php endif; ?>

                    <?php
                    // Define alinhamentos via ACF (center, start, end).
                    $align_items_class = 'align-items-center';
                    $text_align_class  = 'text-center';

                    if ( 'start' === $align_items ) {
                      $align_items_class = 'align-items-start';
                      $text_align_class  = 'text-start';
                    } elseif ( 'end' === $align_items ) {
                      $align_items_class = 'align-items-end';
                      $text_align_class  = 'text-end';
                    }
                    ?>

                    <div class="d-flex flex-column gap-3 justify-content-center <?php echo esc_attr( "{$align_items_class} {$text_align_class}" ); ?>">

                      <?php if ( $select_adicionar_texto && $texto_banner ) : ?>
                        <div class="animationFade"><?php echo wp_kses_post( $texto_banner ); ?></div>
                      <?php endif; ?>

                      <?php if ( $select_adicionar_botao && $botao_banner && $link_botao ) : ?>
                        <div class="gridBtnPost">
                          <a href="<?php echo esc_url( $link_botao ); ?>" class="btnBanner">
                            <?php echo esc_html( $botao_banner ); ?>
                          </a>
                        </div>
                      <?php endif; ?>

                    </div>

          </div><!-- end .slide-items -->

      <?php endwhile; ?>

    <?php else : ?>

      <!-- SEM ITEM_BANNER → Banner institucional automático -->
      <div class="slide-items" style="background: var(--transparent); background-size: cover;">
        <?php get_template_part( 'template-parts/sections/section', 'banner-institucional' ); ?>
      </div>

    <?php endif; ?>

  </div><!-- .bannerPrincipal -->
</div><!-- .rowBannerHome -->
