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

<section class="gridBranco contatos pb-4 text-center" id="restaurantes">
    <!-- <div class="container"> -->
    <?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <h2 class="tituloPrincipal text-center corPrincipal">
                <?php echo wp_kses_post(get_field('titulo_sessao_contatos')); ?>
                <div class="serrilhadoTitulo"></div>
            </h2>

            <div class="gridRestaurantes w-100 d-flex flex-wrap flex-row mx-auto">
                <div class="boxImgContatos col-xxl-6 col-xl-6 col-lg-12 col-md-12" style="background: url(<?php echo wp_kses_post(get_field('background_contatos_esq')); ?>), var(--corPrincipal); background-size: cover;">
                    <!-- <a target="_blank" href="< ?php echo esc_url(get_field('link_endereco_esq')); ?>"></a> -->

                    <div class="textoContatos py-5">
                        <a class="corTextos col-12" target="_blank" href="<?php echo esc_url(get_field('link_endereco_esq')); ?>">
                            <i class="fa-solid fa-location-dot">
                                <h3><?php echo wp_kses_post(get_field('titulo_endereco_esq')); ?></h3>
                            </i>
                            <?php echo wp_kses_post(get_field('endereco_esq')); ?>
                        </a>
                    </div>


                </div>

                <div class="boxImgContatos col-xxl-6 col-xl-6 col-lg-12 col-md-12" style="background: url(<?php echo wp_kses_post(get_field('background_contatos_dir')); ?>), var(--corPrincipal); background-size: cover;">
                    <!-- <a target="_blank" href="< ?php echo esc_url(get_field('link_endereco_dir')); ?>"></a> -->

                    <div class="textoContatos py-5">
                        <a class="corTextos col-12" target="_blank" href="<?php echo esc_url(get_field('link_endereco_dir')); ?>">
                            <i class="fa-solid fa-location-dot">
                                <h3><?php echo wp_kses_post(get_field('titulo_endereco_dir')); ?></h3>
                            </i>
                            <?php echo wp_kses_post(get_field('endereco_dir')); ?>
                        </a>
                    </div>

                </div>


            </div>

        <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_query(); ?>
    <!-- </div> -->
</section>