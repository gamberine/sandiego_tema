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

<section class="gridPostagens" id="blog">
    <div class="container">

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">

                <?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>

                        <p class="textoChamada"><?php echo wp_kses_post(get_field('texto_chamada_postagens')); ?></p>
                        <h2 class="primary"><?php echo wp_kses_post(get_field('titulo_postagens')); ?></h2>

                    <?php endwhile; ?>
                <?php endif; ?>

            </div>
        </div>
        <ul class="row listaBlog sliderBlog">
            <?php $args = array(
                'post_type' => 'post',
                'posts_per_page' => 6,
                'order' => 'date',
                'oderby' => 'DESC'
            );
            ?>
            <?php query_posts($args); ?>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post();
                ?>
                    <li class="col-grid col-milnove-24">
                        <a href="<?php the_permalink(); ?>">
                            <div class="mascaraImagem">
                                <div class="efeitoImagem"></div>
                                <?php the_post_thumbnail(); ?>

                            </div>
                            <div class="dadosNoticia">
                                <h6 class="postDate"> <?php echo get_the_date('M d/Y'); ?></h6>
                                <h3><?php the_title(); ?></h3>
                                <!-- <p>< ?php
                                        $resumo = get_the_content();
                                        $resumoTexto = substr($resumo, 0, 170);
                                        $resumoTextoHtml = substr($resumoTexto, 0, strrpos($resumoTexto, ' '));
                                        echo $resumoTextoHtml ?></p> -->
                            </div>
                        </a>
                    </li>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
        </ul>

        <!-- <div class="row pt-5">
            <a href="< ?php bloginfo('home') ?>/postagens" class="btnPadrao px-5">
                Ver Mais publicações
            </a>
        </div> -->
    </div>
</section>