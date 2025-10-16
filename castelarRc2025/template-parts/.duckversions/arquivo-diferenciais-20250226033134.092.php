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

        <section class="gridCinza" id="diferenciais" style="background: url(<?php echo wp_kses_post(get_field('background_sessao_diferenciais')); ?>); background-size: cover;">
            <div class="container text-center corSecundariaHover">
                <div class="row d-flex flex-row justify-content-around align-items-center mb-0">

                    <div class="headerSection col-12 mb-0">

                        <h2 class="tituloPrincipal">
                            <?php echo wp_kses_post(get_field('titulo_sessao_diferenciais')); ?>
                            <div class="serrilhadoTitulo"></div>
                        </h2>
                        <!-- <p class="textoChamada corTextos">
                            < ?php echo wp_kses_post(get_field('texto_sessao_menu')); ?>
                        </p> -->

                    </div>

                <?php endwhile; ?>
            <?php endif; ?>

            <div class="sliderBoxTexto text-white flex-wrap gap-3">
                <?php
                $args = array(
                    'post_type'      => 'diferenciais',
                    'posts_per_page' => -1, // Pegando todos os itens sem limite
                    'order'          => 'ASC',
                    'orderby'        => 'date'
                );

                query_posts($args);

                if (have_posts()) :
                    while (have_posts()) : the_post();
                        for ($i = 1; $i <= 9; $i++) {
                            $texto_diferencial = get_field("texto_diferencial_$i");
                            if (!empty($texto_diferencial)) : ?>
                                <div class="boxItemSecundario">
                                    <h4 class="d-none d-xl-block"><?php echo wp_kses_post($texto_diferencial); ?></h4>
                                    <h6 class="d-xl-none d-xl-flex"><?php echo esc_html(wp_strip_all_tags($texto_diferencial)); ?></h6>
                                </div>
                <?php endif;
                        }
                    endwhile;
                endif;
                wp_reset_query();
                ?>
            </div>


                </div>


            </div>
        </section>