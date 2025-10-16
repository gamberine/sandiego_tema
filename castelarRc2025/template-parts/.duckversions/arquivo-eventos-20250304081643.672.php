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

<section class="gridSecundario" id="eventos">
    <div class="container">

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">

                <?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>

                        <h2 class="tituloSecundario bgEventos"><?php echo wp_kses_post(get_field('titulo_sessao_eventos')); ?></h2>
                        <?php echo wp_kses_post(get_field('texto_sessao_eventos')); ?>

                    <?php endwhile; ?>
                <?php endif; ?>

            </div>
        </div>
        <ul class="row listaBlog sliderBlog eventos mb-5 pb-4">
            <?php $args = array(
                'post_type' => 'galeria-eventos',
                'posts_per_page' => 99,
                'order' => 'date',
                'oderby' => 'DESC'
            );
            ?>
            <?php query_posts($args); ?>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post();
                ?>
                    <li class="col-grid col-milnove-24">
                        <a>
                            <!-- <div class="mascaraImagem tooltipLegenda"> -->
                            <div class="mascaraImagem">
                                <img class="imgLojas" src="<?php echo wp_kses_post(get_field('foto_evento')); ?>" />
                            </div>
                        </a>
                    </li>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
        </ul>

        <div class="col-xxl-5 col-xl-7 col-lg-8 col-md-12 col-sm-12 col-12 d-flex justify-content-center mx-auto flex-column">
            <?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

                    <h3 class="titulo corPrincipal text-center mt-3 mb-5"><strong><?php echo wp_kses_post(get_field('titulo_formulario_orcamento')); ?></strong></h3>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script type="text/javascript">
                        var jQuery_3_6_0 = $.noConflict(true);
                    </script>
                    <script>
                        jQuery_3_6_0();
                        (function($) {
                            function isIOS() {
                                var ua = navigator.userAgent.toLowerCase();
                                var iosArray = ['iphone', 'ipod'];
                                var isApple = false;
                                iosArray.forEach(function(item) {
                                    if (ua.indexOf(item) != -1) {
                                        isApple = true;
                                    }
                                });
                                return isApple;
                            }

                            jQuery_3_6_0(document).ready(function() {
                                if (isIOS()) {
                                    jQuery_3_6_0('.rowData').css({
                                        'display': 'none'
                                    });
                                }
                            });
                        })(jQuery_3_6_0);
                    </script>
                    <?php echo do_shortcode('[contact-form-7 id="074c8a4" title="Formulario_orcamento"]'); ?>

                <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>
</section>