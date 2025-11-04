<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Tema_Dev_Gamb
 * @since Tema Dev-Gamb 1.0
 * 
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
                ?>
                <?php if ($selecao): ?>
                    <!-- Exibe imagem como background se select_imagem for true -->
                    <div class="slide-items" 
                         style="background: url('<?php echo esc_url(get_field('imagem_banner')); ?>') var(--gradientBanner); 
                         background-size: cover; background-blend-mode: multiply;">
                <?php else: ?>
                    <!-- Exibe vídeo se select_imagem for false -->
                    <div class="slide-items video" 
                         style="background: var(--gradientBanner) !important; background-size: cover; background-blend-mode: multiply;">
                        <video autoplay muted loop>
                            <source src="<?php echo esc_url(get_field('video_banner')); ?>" type="video/mp4">
                        </video>
                <?php endif; ?>
                    <div class="formaBanner">
                        <?php echo wp_kses_post(get_field('texto_banner')); ?>
                        <?php if ($select_adicionar_botao): ?>
                            <div class="gridBtnPost">
                                <a href="<?php echo esc_url(get_field('link_botao')); ?>" class="btnBanner">
                                    <?php echo wp_kses_post(get_field('botao_banner')); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if ($select_imagem_lateral): ?>
                        <div class="imgLateral">
                            <img src="<?php echo esc_url(get_field('imagemLateral')); ?>" />
                        </div>
                    <?php endif; ?>
                </div>
            <?php endwhile; 
        endif;
        wp_reset_query();
        ?>
    </div>
</div>
