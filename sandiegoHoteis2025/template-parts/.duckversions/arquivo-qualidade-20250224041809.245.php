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

<section class="gridBranco corTextos" id="qualidade">

    <div class="container text-center corSecundaria">
        <div class="row d-flex flex-row justify-content-around align-items-center mb-0">

            <?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="headerSection col-12 mb-0">

                        <h2 class="tituloPrincipal">
                            <?php echo wp_kses_post(get_field('titulo_sessao_qualidade')); ?>
                            <div class="serrilhadoTitulo"></div>
                        </h2>
                        <!-- <p class="textoChamada corTextos">
                            < ?php echo wp_kses_post(get_field('texto_sessao_menu')); ?>
                        </p> -->

                    </div>

                <?php endwhile; ?>
            <?php endif; ?>
            <div class="qualidade sliderBoxTexto">
                <?php $args = array(
                    'post_type' => 'qualidades',
                    'posts_per_page' => -1,
                    'order' => 'date',
                    'oderby' => 'DESC'
                );
                ?>
                <?php query_posts($args); ?>
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post();
                    ?>

                        <div class="gridImgQualidade text-center corTextos">
                            <img src="<?php echo wp_kses_post(get_field('imagem_qualidade')); ?>" />
                            <p><?php echo wp_kses_post(get_field('texto_qualidade')); ?></p>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            </div>


        </div>
    </div>
</section>