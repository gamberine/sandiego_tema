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

<section class="gridCinza" id="servicos">

  <div class="container text-center">
    <div class="row d-flex justify-content-center align-items-center text-center mb-3">

      <?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <div class="headerSection col-12 mb-5">

            <h2 class="title-primary justify-content-center">
              <i class="fa-solid fa-check"></i>
              <?php echo wp_kses_post(get_field('titulo_sessao_servicos')); ?>
            </h2>
            <?php echo wp_kses_post(get_field('texto_sessao_servicos')); ?>

          </div>

        <?php endwhile; ?>
      <?php endif; ?>

      <!-- ---------- loop categorias -->
      <div class="sliderRowSimples gridItemsCenter col-12 gap-3">
        <?php
        // Obtém os termos da taxonomia "especialidade"
        $terms = get_terms(array(
          'taxonomy'   => 'especialidade',
          'hide_empty' => true,
          'order'          => 'DESC',
          'orderby'        => 'date'
        ));

        if (! empty($terms) && ! is_wp_error($terms)) :
          foreach ($terms as $term) :
            // Obtém a thumbnail do termo via ACF
            $thumbnail = get_field('imagem_categoria', 'especialidade_' . $term->term_id);
            $link = get_term_link($term);
        ?>
            <div class="especialidade cardItems col-lg-4 col-md-12 col-sm-12 d-flex align-items-lg-stretch align-items-md-center justify-content-center">
              <!-- <a href="< ?php echo esc_url($link); ?>"> -->
              <a href="#pisos">
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
      <!-- ---------- loop categorias -->



    </div>
  </div>
</section>