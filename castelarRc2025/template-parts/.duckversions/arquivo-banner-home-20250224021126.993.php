<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Tema_Dev_Gamb
 * @since Tema Dev-Gamb 1.0
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
                        style="background: var(--gradientPadrao) url('<?php echo $background_desktop; ?>');"
                        data-mobile-bg="<?php echo $background_mobile; ?>">
                    <?php elseif (!$selecao && $video_banner): ?>
                        <!-- Exibe vídeo se select_imagem for false -->
                        <div class="slide-items video" style="background: var(--gradientPadrao) !important; background-size: cover; background-blend-mode: multiply;">
                            <video autoplay muted loop>
                                <source src="<?php echo esc_url($video_banner); ?>" type="video/mp4">
                            </video>
                        <?php else: ?>
                            <!-- Exibe um slide padrão caso nenhum campo esteja configurado -->
                            <div class="slide-items" style="background: var(--gradientPadrao); background-size: cover;">
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