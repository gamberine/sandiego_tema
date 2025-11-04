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
<div class="serrilhado"></div>

<?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <section class="gridCinza" id="nossos-tratamentos">

            <div class="container text-center corPrincipal">

                <div class="row">
                    <div class="headerSection col-12">
                        <div class="headerSectionBg"></div>


                        <h2 class="title-primary pb-2">
                            <?php echo wp_kses_post(get_field('titulo_sessao_tratamentos')); ?>
                        </h2>
                        <p class="textoChamada text-color">
                            <?php echo wp_kses_post(get_field('texto_sessao_tratamentos')); ?>
                        </p>
                        <!-- <img src="< ?php echo wp_kses_post(get_field('icone_sessao_tratamentos')); ?>" alt="< ?php echo wp_kses_post(get_field('titulo_sessao_tratamentos')); ?>"> -->

                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_query(); ?>


            <!-- ---------- loop categorias -->
            <div class="gridItemsCenter col-lg-12">

                <?php
                // Obtém os termos da taxonomia "especialidade"
                $terms = get_terms(array(
                    'taxonomy'   => 'especialidade',
                    'hide_empty' => false,
                ));

                if (! empty($terms) && ! is_wp_error($terms)) :
                    foreach ($terms as $term) :
                        // Obtém a thumbnail do termo via ACF
                        $thumbnail = get_field('imagem_categoria', 'especialidade_' . $term->term_id);
                        $link = get_term_link($term);
                ?>
                        <div class="cardItems lg-col-3 md-col-6 sm-col-12 d-flex align-items-stretch">
                            <a href="<?php echo esc_url($link); ?>">
                                <?php if ($thumbnail) : ?>
                                    <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr($term->name); ?>">
                                <?php endif; ?>
                                <h4><?php echo esc_html($term->name); ?></h4>
                                <?php if ($term->description) : ?>
                                    <p><?php echo esc_html($term->description); ?></p>
                                <?php endif; ?>
                            </a>
                        </div>
                <?php
                    endforeach;
                endif;
                wp_reset_query();
                ?>
            </div>
                </div>

                <!-- ---------- loop categorias -->


            </div>
        </section>
        <!-- < ?php $args = array(
                'post_type' => 'tratamento',
                'posts_per_page' => -1,
                'order' => 'ASC',
                'oderby' => 'date'
            );
            ?>
            < ?php query_posts($args); ?>
            < ?php if (have_posts()) : ?>
                < ?php while (have_posts()) : the_post();
                ?>
                    <div class="gridImgItems secondary col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">

                        <div><img src="< ?php echo wp_kses_post(get_field('imagem_tratamento')); ?>" /> </div>
                        <h4>< ?php the_title(); ?></h4>
                        <p>< ?php echo wp_kses_post(get_field('texto_tratamento')); ?></p>


                    </div>

                < ?php endwhile; ?>
            < ?php endif; ?>
            < ?php wp_reset_query(); ?> -->