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

        <section class="gridCinza equipe" id="equipe">

            <div class="container text-center corSecundaria">

                <div class="row mb-0">
                    <div class="headerSection corTexto px-lg-5 px-md-0">

                        <h2 class="tituloPrincipal mb-2">
                            <?php echo wp_kses_post(get_field('titulo_sessao_nossa_equipe')); ?>
                            <div class="serrilhadoTitulo"></div>
                        </h2>
                        <?php echo wp_kses_post(get_field('texto_sessao_nossa_equipe')); ?>

                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
                </div>

                <!-- ---------- loop  -->

                <!-- <div class="sliderRowFixed"> -->
                <div class="gridEquipe row justify-content-center align-items-strech gy-4">
                    <?php
                    $args = array(
                        'post_type'      => 'nossa-equipe',
                        'posts_per_page' => -1,
                        'order'          => 'DESC',
                        'orderby'        => 'date'
                    );
                    query_posts($args);
                    ?>

                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="col-xl-5 col-lg-12 text-center corSecundariaHoverposition-relative">
                                <h3 class="fontTitulos fw-bold text-uppercase m-lg-3 m-md-auto"><?php the_title(); ?></h3>
                                <div class="d-flex align-items-center justify-content-center corSecundariaHover">
                                    <h1 class="idItem">
                                        <?php echo wp_kses_post(get_field('numero_item_equipe')); ?>
                                    </h1>
                                    <div class="gridImgRounded position-relative">
                                        <!-- <a class="position-relative" href="< ?php the_permalink(); ?>"> -->
                                        <img class="img-fluid rounded" src="<?php echo esc_url(get_field('imagem_equipe')); ?>" alt="<?php the_title(); ?>">
                                        <p class="position-absolute bottom-0 start-0 corBg fw-lighter p-4 mb-0 opacity-50 text-decoration-none" href="<?php the_permalink(); ?>">Saiba mais</p>
                                        <!-- </a> -->
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>

                    <?php wp_reset_query(); ?>
                </div>


                <!-- ---------- loop  -->


            </div>
        </section>