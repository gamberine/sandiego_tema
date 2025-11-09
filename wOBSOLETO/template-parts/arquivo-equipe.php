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

<section class="gridBgFixed text-white text-center py-5">
    <div class="container">

        <div class="col-12">
            <?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

                    <h2 class="title-primary primarypb-4"><?php echo wp_kses_post(get_field('titulo_sessao_equipe')); ?></h2>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>

        <div class="sliderIntegrantes row mt-5 corPrincipal">
            <?php
            // Primeira linha: apenas "Gerente" e "CEO", ordenados por nome dos integrantes
            $primary_terms = array('gerente', 'diretor');
            $primary_posts = array();

            foreach ($primary_terms as $term_slug) {
                $args = array(
                    'post_type' => 'integrantes',
                    'posts_per_page' => -1,
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'cargo',
                            'field'    => 'slug',
                            'terms'    => $term_slug,
                        ),
                    ),
                );

                $query = new WP_Query($args);
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        $primary_posts[] = $query->post;
                    endwhile;
                endif;
                wp_reset_postdata();
            }
            ?>

            <!-- Primeira linha -->
            <div class="row mt-5 mb-2">
                <?php foreach ($primary_posts as $post) : setup_postdata($post); ?>
                    <div class="integrante col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="mascara">
                            <img class="imagem-mascara" src="<?php echo get_template_directory_uri(); ?>/imagens/imgJanela.png" alt="Janela">
                            <img class="imagem-integrante" src="<?php echo wp_kses_post(get_field('imagem_integrante')); ?>" alt="<?php the_title(); ?>">
                        </div>
                        <a href="#" class="btnEquipe text-white" data-target="#modal-<?php the_ID(); ?>">
                            <p>Clique e conheça <?php echo wp_kses_post(get_field('artigo_definido')); ?>
                                <br />
                                <span><?php the_title(); ?></span>
                            </p>
                        </a>
                        <h2>
                            <?php
                            $cargo_terms = get_the_terms($post->ID, 'cargo');
                            if ($cargo_terms && !is_wp_error($cargo_terms)) {
                                $cargo_names = wp_list_pluck($cargo_terms, 'name');
                                echo esc_html(implode(', ', $cargo_names));
                            } else {
                                echo 'Sem cargo definido';
                            }
                            ?>
                        </h2>
                    </div>

                    <!-- Modal Dinâmico -->
                    <?php get_template_part('template-parts/arquivo-equipe-modal'); ?>

                <?php endforeach; ?>
            </div>
            <?php wp_reset_postdata(); ?>

            <!-- Segunda linha: Todos os demais cargos, ordenados alfabeticamente -->
            <div class="row mt-0">
                <?php
                $args = array(
                    'post_type' => 'integrantes',
                    'posts_per_page' => -1,
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'cargo',
                            'field'    => 'slug',
                            'terms'    => $primary_terms,
                            'operator' => 'NOT IN',
                        ),
                    ),
                );

                $query = new WP_Query($args);
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                ?>
                        <div class="integrante col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="mascara">
                                <img class="imagem-mascara" src="<?php echo get_template_directory_uri(); ?>/imagens/imgJanela.png" alt="Janela">
                                <img class="imagem-integrante" src="<?php echo wp_kses_post(get_field('imagem_integrante')); ?>" alt="<?php the_title(); ?>">
                            </div>
                            <a href="#" class="btnEquipe text-white" data-target="#modal-<?php the_ID(); ?>">
                                <p>Clique e conheça <?php echo wp_kses_post(get_field('artigo_definido')); ?>
                                    <br />
                                    <span><?php the_title(); ?></span>
                                </p>
                            </a>
                            <h2>
                                <?php
                                $cargo_terms = get_the_terms(get_the_ID(), 'cargo');
                                if ($cargo_terms && !is_wp_error($cargo_terms)) {
                                    $cargo_names = wp_list_pluck($cargo_terms, 'name');
                                    echo esc_html(implode(', ', $cargo_names));
                                } else {
                                    echo 'Sem cargo definido';
                                }
                                ?>
                            </h2>
                        </div>

                        <!-- Modal Dinâmico -->
                        <?php get_template_part('template-parts/arquivo-equipe-modal'); ?>

                <?php endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>

        </div>

        <?php get_template_part('template-parts/content/component-btn-consultor'); ?>

    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const openButtons = document.querySelectorAll(".btnEquipe"); // Botões para abrir o modal
        const closeButtons = document.querySelectorAll(".btnClose"); // Botões para fechar o modal

        openButtons.forEach((button) => {
            button.addEventListener("click", function(event) {
                event.preventDefault();

                const modalID = button.getAttribute("data-target"); // Obtém o ID do modal
                const modal = document.querySelector(modalID);

                if (modal) {
                    modal.style.display = "flex"; // Torna o modal visível
                    document.body.style.position = "fixed";
                    document.body.style.top = `-${window.scrollY}px`;
                }
            });
        });

        closeButtons.forEach((button) => {
            button.addEventListener("click", function() {
                const modal = button.closest(".modal");
                if (modal) {
                    modal.style.display = "none";

                    // Restaura o scroll da página
                    const scrollY = document.body.style.top;
                    document.body.style.position = "";
                    document.body.style.top = "";
                    window.scrollTo(0, parseInt(scrollY || "0") * -1);
                }
            });
        });
    });
</script>