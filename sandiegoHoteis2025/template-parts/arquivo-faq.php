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
        <section class="gridFaq" id="faq" style="background-image: url(<?php echo wp_kses_post(get_field('background_faq')); ?>);">
        <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_query(); ?>

    <div class="container">
        <div class="row justify-content-end">
            <div class="gridInfos col-xxl-9 col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 text-center">

                <?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>

                        <p class="textoChamada"><?php echo wp_kses_post(get_field('texto_chamada_faq')); ?></p>
                        <h2 class="primary"><?php echo wp_kses_post(get_field('titulo_faq')); ?></h2>
                        <img class="imgDivisor mb-5" src="<?php echo get_template_directory_uri(); ?>/imagens/divisorCoracaoColor.png">
                        <p class="text-center"><?php echo wp_kses_post(get_field('texto_faq_principal')); ?></p>

                    <?php endwhile; ?>
                <?php endif; ?>

            </div>
        </div>
        <div class="row justify-content-end align-items-center">



            <div class="accordion accordion-flush boxfaq col-xxl-9 col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 mb-5" id="accordionFlush">

                <div class="accordion-item">
                    <?php
                    $args = array(
                        'post_type' => 'perguntas',
                        'posts_per_page' => -1,
                        'orderby' => 'date',
                        'order' => 'ASC',
                    );

                    $query = new WP_Query($args);

                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post();

                            // Crie um ID único para o modal usando o ID do post
                            $modal_id = 'post-modal-' . get_the_ID(); ?>

                            <h5 class="accordion-header mb-0">

                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#post-<?php echo get_the_ID(); ?>" aria-expanded="false" aria-controls="post-<?php echo get_the_ID(); ?>">
                                    <?php the_title(); ?>
                                </button>
                            </h5>
                            <div id="post-<?php echo get_the_ID(); ?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlush">
                                <div class="accordion-body">
                                    <p><?php echo wp_kses_post(get_field('texto_pergunta')); ?></p>
                                </div>
                            </div>


                    <?php endwhile;
                        wp_reset_postdata();
                    endif; ?>

                </div>

            </div>



        </div>
    </div>
        </section>