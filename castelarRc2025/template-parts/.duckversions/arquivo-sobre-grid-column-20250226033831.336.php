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

<?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <div class="imgSelo">
            <img src="<?php echo wp_kses_post(get_field('imagem_sobre_selo')); ?>" />
        </div>

        <section class="gridBranco" id="quem-somos">
            <div class="container corTextos">
                <div class="row d-flex flex-row justify-content-around align-items-center row-gap-4">

                    <div class="gridSobreEsq col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h2 class="tituloComum text-xl-end text-lg-center corSecundaria"><?php echo wp_kses_post(get_field('titulo_sessao_sobre')); ?></h2>
                            <div class="serrilhadoHorizontal"></div>
                        </div>
                        <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 text-xl-start text-lg-center">
                            <?php echo wp_kses_post(get_field('texto_sessao_sobre')); ?>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="gridImg Sobre">
                            <div class="imgFlat">
                                <img src="<?php echo wp_kses_post(get_field('imagem_sobre_2')); ?>" />
                            </div>
                            <div class="imgFlat">
                                <img src="<?php echo wp_kses_post(get_field('imagem_sobre_3')); ?>" />
                            </div>
                            <div class="imgFlat">
                                <img src="<?php echo wp_kses_post(get_field('imagem_sobre_4')); ?>" />
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    <?php endwhile; ?>
<?php endif; ?>