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

        <section class="gridBranco" id="clientes">
            <div class="container corTextos">
                <div class="row d-flex flex-row justify-content-center align-items-center gap-3">

                    <div class="gridEsq col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12">
                        <h2 class="tituloComum corSecundaria"><?php echo wp_kses_post(get_field('titulo_sessao_clientes')); ?></h2>
                        <div class="serrilhadoHorizontal"></div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>

            <div class="clientes sliderRowDuplo col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 gap-3">
                <?php
                $args = array(
                    'post_type'      => 'clientes',
                    'posts_per_page' => -1,
                    'order'          => 'DESC',
                    'orderby'        => 'date'
                );

                query_posts($args);

                if (have_posts()) :
                    while (have_posts()) : the_post();
                        $link_cliente = get_field('link_cliente');
                        $imagem_cliente = get_field('imagem_cliente');
                        $link_atributos = $link_cliente ? 'target="_blank" href="' . esc_url($link_cliente) . '"' : 'style="pointer-events: none; cursor: not-allowed;"';
                ?>
                        <div class="gridImgFlutuante">
                            <a <?php echo $link_atributos; ?>>
                                <img src="<?php echo wp_kses_post($imagem_cliente); ?>" />
                            </a>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            </div>


                </div>
            </div>
        </section>