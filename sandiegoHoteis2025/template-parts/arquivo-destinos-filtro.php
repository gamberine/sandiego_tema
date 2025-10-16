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

<section class="gridCinza" id="especialidade">

    <div class="container text-center corPrincipal">

        <div class="row">
            <form method="get" action="">
                <select name="category">
                    <option value="">Todas as Categorias</option>
                    <?php
                    $terms = get_terms(array(
                        'taxonomy' => 'category_tipo_viagem',
                        'hide_empty' => true,
                    ));
                    foreach ($terms as $term) {
                        echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
                    }
                    ?>
                </select>
                <button type="submit" aria-label="Filtrar">Filtrar</button>
            </form>

            <?php
            $category = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '';
            echo do_shortcode('[filter_destinos category="' . $category . '"]');
            ?>

        </div>

    </div>


</section>