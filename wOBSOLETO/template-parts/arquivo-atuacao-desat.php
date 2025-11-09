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
<?php query_posts("post_type=atuacao&posts_per_page=1"); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <section class="gridBranco" id="atuacao" style="background: url(<?php echo wp_kses_post(get_field('background_sessao_atuacao')); ?>); background-size: cover;">
            <div class="container text-center secondary">
                <div class="row d-flex flex-row justify-content-around align-items-center  mb-0">

                    <div class="headerSection col-12 mb-0">

                        <h2 class="title-primary mb-0">
                            <?php echo wp_kses_post(get_field('titulo_sessao_atuacao')); ?>
                            <div class="serrilhadoTitulo"></div>
                        </h2>
                        <!-- <p class="textoChamada text-color">
                            < ?php echo wp_kses_post(get_field('texto_sessao_menu')); ?>
                        </p> -->

                    </div>

                <?php endwhile; ?>
            <?php endif; ?>


            <div class="sliderImgTexto text-color flex-wrap gap-3">
                <?php
                $args = array(
                    'post_type'      => 'atuacao',
                    'posts_per_page' => -1, // Pegando todos os itens sem limite
                    'order'          => 'ASC',
                    'orderby'        => 'date'
                );

                query_posts($args);

                if (have_posts()) :
                    while (have_posts()) : the_post();

                        // Variável para controle da sequência de exibição
                        $chainOk = true;

                        // Loop para grupos de 1 a 4 (grupo_atuacao)
                        for ($i = 1; $i <= 4; $i++) {

                            // Se algum grupo anterior falhar, interrompe a sequência
                            if (! $chainOk) {
                                break;
                            }

                            $grupo = get_field("grupo_atuacao_{$i}");

                            // Se não for um array válido, interrompe a sequência
                            if (! is_array($grupo)) {
                                $chainOk = false;
                                break;
                            }

                            // Verifica se o grupo tem título e imagem
                            if (! empty($grupo['titulo_atuacao']) && ! empty($grupo['imagem_atuacao'])) : ?>

                                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 text-center">

                                    <div class="gridImgItems">
                                        <img src="<?php echo esc_url($grupo['imagem_atuacao']['url']); ?>" alt="<?php echo esc_attr($grupo['imagem_atuacao']['alt']); ?>">
                                    </div>

                                    <div class="text-color mt-4 mb-0">
                                        <h4><?php echo wp_kses_post($grupo['titulo_atuacao']); ?></h4>
                                    </div>

                                    <?php if (! empty($grupo['texto_atuacao'])) : ?>
                                        <div class="text-color mt-0">
                                            <p><?php echo wp_kses_post($grupo['texto_atuacao']); ?></p>
                                        </div>
                                    <?php endif; ?>

                                </div>

                                <?php else :
                                $chainOk = false;
                                break;
                            endif;
                        }

                        // Se a primeira sequência foi bem-sucedida, continua com os grupos de 5 a 9 (grupo_atuacaoB)
                        if ($chainOk) {
                            for ($i = 5; $i <= 9; $i++) {

                                // Se algum grupo anterior falhar, interrompe a sequência
                                if (! $chainOk) {
                                    break;
                                }

                                $grupoB = get_field("grupo_atuacaoB_{$i}");

                                // Se não for um array válido, interrompe a sequência
                                if (! is_array($grupoB)) {
                                    $chainOk = false;
                                    break;
                                }

                                // Verifica se o grupo tem título e imagem
                                if (! empty($grupoB['titulo_atuacao']) && ! empty($grupoB['imagem_atuacao'])) : ?>

                                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 text-center">

                                        <div class="gridImgItems">
                                            <img src="<?php echo esc_url($grupoB['imagem_atuacao']['url']); ?>" alt="<?php echo esc_attr($grupoB['imagem_atuacao']['alt']); ?>">
                                        </div>

                                        <div class="text-color mt-4 mb-0">
                                            <h4><?php echo wp_kses_post($grupoB['titulo_atuacao']); ?></h4>
                                        </div>

                                        <?php if (! empty($grupoB['texto_atuacao'])) : ?>
                                            <div class="text-color mt-0">
                                                <p><?php echo wp_kses_post($grupoB['texto_atuacao']); ?></p>
                                            </div>
                                        <?php endif; ?>

                                    </div>

                <?php else :
                                    $chainOk = false;
                                    break;
                                endif;
                            }
                        }

                    endwhile;
                endif;

                wp_reset_query();
                ?>
            </div>




                </div>


            </div>
        </section>