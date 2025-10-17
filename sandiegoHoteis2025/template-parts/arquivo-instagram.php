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

<section class="gridBranco" id="instagram">

  <div class="container text-center">
    <div class="row d-flex justify-content-center align-items-center text-center mb-3">
      <?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

          <div class="headerSection col-12 mb-5">
            <h2 class="title-primary primaryjustify-content-center">
              <i class="fa-solid fa-check"></i>
              <?php echo wp_kses_post(get_field('titulo_sessao_instagram')); ?>
            </h2>
            <p><?php echo wp_kses_post(get_field('texto_instagram')); ?></p>

          </div>

        <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_query(); ?>
      <div class="row mt-3 justify-content-center">
        <!-- < ?php echo do_shortcode('[instagram-feed feed=1]'); ?> -->
        <?php
        $feed_number = get_field('numero_feed_instagram'); // Substitua 'numero_feed_instagram' pelo nome do seu campo ACF
        echo do_shortcode("[instagram-feed feed={$feed_number}]");
        ?>
      </div>

    </div>
  </div>

</section>