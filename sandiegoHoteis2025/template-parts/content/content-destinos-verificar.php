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

<article class="gridBg" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="faixaCor"></div>
    <div class="container gridMobile">
        <div class="row mt-5 gap-4">
            <!-- Slider de imagens -->
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="sliderGaleriaProduto">
                    <div class="nav">
                        <?php
                        // Configura a consulta para o post de produtos
                        $args = array(
                            'post_type' => 'produtos',
                            'posts_per_page' => 1,
                            'order' => 'DESC',
                            'orderby' => 'date'
                        );
                        $produto_query = new WP_Query($args);
                        if ($produto_query->have_posts()) :
                            while ($produto_query->have_posts()) : $produto_query->the_post();
                                // Array de campos de imagens
                                $imagens = ['imagem_galeria_produto_1', 'imagem_galeria_produto_2', 'imagem_galeria_produto_3', 'imagem_galeria_produto_4'];

                                foreach ($imagens as $campo_imagem) :
                                    $imagem = get_field($campo_imagem);
                                    if ($imagem) :
                                        $url = is_array($imagem) ? $imagem['url'] : $imagem;
                                        $alt = is_array($imagem) && isset($imagem['alt']) ? $imagem['alt'] : get_the_title();
                        ?>
                                        <div class="nav-item">
                                            <img src="<?php echo esc_url($url); ?>" alt="<?php echo esc_attr($alt); ?>" />
                                        </div>
                        <?php
                                    endif;
                                    wp_reset_postdata();
                                endforeach;
                                wp_reset_postdata();
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>

                    <div class="slider">
                        <?php
                        if ($produto_query->have_posts()) :
                            $produto_query->rewind_posts(); // Reposiciona o loop para reutilização
                            while ($produto_query->have_posts()) : $produto_query->the_post();
                                foreach ($imagens as $campo_imagem) :
                                    $imagem = get_field($campo_imagem);
                                    if ($imagem) :
                                        $url = is_array($imagem) ? $imagem['url'] : $imagem;
                                        $alt = is_array($imagem) && isset($imagem['alt']) ? $imagem['alt'] : get_the_title();
                        ?>
                                        <div class="slide-item">
                                            <img src="<?php echo esc_url($url); ?>" alt="<?php echo esc_attr($alt); ?>" />
                                        </div>
                        <?php
                                    endif;
                                    wp_reset_postdata();
                                endforeach;
                                wp_reset_postdata();
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>

            <!-- Informações do produto -->
            <div class="text-start col-lg-5 col-md-12 col-sm-12 col-xs-12 infosProdutoSingle">
                <h2 class="corSecundaria" translate="no"><?php the_title(); ?></h2>
                <p class="corTextos fs-14 fw-400 d-flex align-items-baseline">
                    Preço:
                    <?php
                    $moeda_selecao = get_field('moeda_preco');
                    if ($moeda_selecao) {
                        $simbolo = 'R$';
                        $preco = get_field('preco_produto_real');
                    } else {
                        $simbolo = '$';
                        $preco = get_field('preco_produto_dolar');
                    }
                    ?>
                    <span class="valor corSecundaria fontTitulos fw-bold fs-1" translate="no" data-mask="<?php echo esc_attr($simbolo); ?>"><?php echo esc_html($preco); ?></span>
                </p>
                <p>Cód. Produto: <strong><?php echo wp_kses_post(get_field('codigo_produto')); ?></strong></p>
                <p>Sobre o produto: <strong><?php echo wp_kses_post(get_field('resumo_descricao_produto')); ?></strong></p>
                <p>Status: <strong><?php echo wp_kses_post(get_field('status_produto')); ?></strong></p>
                <p>Categoria: <strong>
                        <?php
                        $terms = get_the_terms(get_the_ID(), 'category_produtos');
                        if ($terms && !is_wp_error($terms)) {
                            $term_links = array();
                            foreach ($terms as $term) {
                                $term_links[] =
                                    // '<a class="corPrincipal" href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a>'
                                    '<span class="corPrincipal">' . esc_html($term->name) . '</span>';
                            }
                            echo wp_kses_post(implode(', ', $term_links));
                        } else {
                            echo 'Categoria não informada';
                        }
                        ?>
                    </strong></p>
                <div class="d-flex align-items-center">
                    <p class="my-0 pe-3">Compartilhe:</p>
                    <div class="redesSociais share corPrincipal">
                        <i class="fab fa-whatsapp"></i>
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-facebook"></i>
                        <i class="far fa-envelope"></i>
                    </div>
                </div>
            </div>
            <div class="col-12 my-5 descricaoComplementar corSecundaria">
                <h2 class="titleSection mb-5">Descrição complementar</h2>
                <p><?php echo wp_kses_post(get_field('descricao_produto')); ?></p>
            </div>
        </div>
    </div>
    <div class="row relacionados position-relative my-5" style="background: var(--corCinza); display: flex; justify-content: space-between; align-items: center;">
        <?php
        $temabasegamb_next = is_rtl() ? tema_base_gamb_get_icon_svg('ui', 'arrow_left') : tema_base_gamb_get_icon_svg('ui', 'arrow_right');
        $temabasegamb_prev = is_rtl() ? tema_base_gamb_get_icon_svg('ui', 'arrow_right') : tema_base_gamb_get_icon_svg('ui', 'arrow_left');

        $temabasegamb_next_label = esc_html__('Próximo Produto', 'temabasegamb');
        $temabasegamb_previous_label = esc_html__('Produto Anterior', 'temabasegamb');

        // Navegação de posts (Anterior e Próximo)
        the_post_navigation(
            array(
                'next_text' => '<p class="meta-nav proximoPost">' . $temabasegamb_next_label . $temabasegamb_next . '</p>',
                'prev_text' => '<p class="meta-nav anteriorPost">' . $temabasegamb_prev . $temabasegamb_previous_label . '</p>',
            )
        );
        ?>
        <!-- Botão de Voltar -->
        <button class="btn btnRounded corPrincipal btnAbsolute" onclick="window.location.href='<?php echo esc_url(get_permalink(get_adjacent_post(false, '', true))); ?>';">
            <span class="iconMove">
                <i class="fa-solid fa-chevron-left"></i><i class="fa-solid fa-chevron-left"></i>
            </span> Voltar
        </button>
    </div>


    <!-- Div com 3 Produtos Relacionados na mesma categoria -->
    <div class="row posts-relacionados my-5 corSecundaria">
        <h3 class="text-center pb-3">Produtos Relacionados</h3>
        <div class="rowLinksProdutos">
        <?php
        // Recuperar as categorias do produto atual
        $terms = get_the_terms(get_the_ID(), 'category_produtos'); // Ajuste para o nome correto da sua taxonomia
        if ($terms && !is_wp_error($terms)) {
            // Pegando a primeira categoria (ou pode usar todas as categorias associadas ao produto)
            $term_ids = wp_list_pluck($terms, 'term_id');

            // Definir os parâmetros para a consulta dos produtos relacionados
            $args = array(
                'post_type' => 'produtos', // Tipo de post personalizado para produtos
                'posts_per_page' => 3, // Exibir 3 produtos
                'orderby' => 'date', // Ordenar por data de publicação (pode alterar para 'rand' para aleatório)
                'post__not_in' => array(get_the_ID()), // Excluir o produto atual da consulta
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category_produtos', // Taxonomia dos produtos
                        'field'    => 'id',
                        'terms'    => $term_ids, // Categorias do produto atual
                        'operator' => 'IN', // Garantir que o produto está na mesma categoria
                    ),
                ),
            );

            // Consulta para obter os produtos relacionados
            $related_query = new WP_Query($args);

            if ($related_query->have_posts()) :
                while ($related_query->have_posts()) : $related_query->the_post();
        ?>
        <div class="col-lg-3 col-md-3 col-sm-12">
                    <a href="<?php the_permalink(); ?>" class="btnLinksProdutos"><?php the_title(); ?></a>
                    </div>
                    
                    <?php
                endwhile;
                wp_reset_postdata();
                else :
                    echo '<p>Não há produtos relacionados.</p>';
                endif;
            } else {
                echo '<p>Não há categorias associadas a este produto.</p>';
            }
            ?>
            </div>
    </div>

</article>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const prices = document.querySelectorAll('.valor');
        prices.forEach(price => {
            const maskType = price.dataset.mask;
            let options = {};

            if (maskType === 'R$') {
                options = {
                    prefix: 'R$ ',
                    groupSeparator: '.',
                    radixPoint: ',',
                    digits: 2,
                    autoUnmask: true
                };
            } else if (maskType === '$') {
                options = {
                    prefix: '$ ',
                    groupSeparator: ',',
                    radixPoint: '.',
                    digits: 2,
                    autoUnmask: true
                };
            }

            const inputMask = new Inputmask('currency', options);
            inputMask.mask(price);
        });
    });
</script>