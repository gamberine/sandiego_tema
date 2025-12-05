<?php

/**
 * Seção: Experiência San Diego (página Hotéis)
 */

$titulo = sd_field('hoteis_experiencia_titulo', get_the_ID(), 'Experiência San Diego');

$args = [
  'post_type'      => 'hoteis',
  'posts_per_page' => -1,
  'post_status'    => 'publish'
];

$query = new WP_Query($args);
?>

<?php if ($query->have_posts()) : ?>
  <section class="sd-hoteis-experiencia section-pad">
    <div class="container">

      <div class="sd-section-header text-center mb-4">
        <h2 class="sd-title display-6 mb-0"><?php echo esc_html($titulo); ?></h2>
      </div>

      <div class="sd-experiencia-carousel">

        <?php while ($query->have_posts()) : $query->the_post(); ?>

          <?php
          $img       = sd_field('imagem_destaque');
          $cidade    = sd_field('hotel_cidade');
          $permalink = get_permalink();
          ?>

          <div class="sd-experiencia-card">

            <a href="<?php echo esc_url($permalink); ?>" class="sd-experiencia-link">

              <?php if ($img) : ?>
                <img src="<?php echo esc_url($img['url']); ?>"
                  alt="<?php echo esc_attr(get_the_title()); ?>">
              <?php endif; ?>

              <div class="sd-experiencia-overlay">
                <?php if ($cidade) : ?>
                  <p class="sd-exp-cidade"><?php echo esc_html($cidade); ?></p>
                <?php endif; ?>

                <h3 class="sd-exp-titulo"><?php echo esc_html(get_the_title()); ?></h3>
              </div>

            </a>

          </div>

        <?php endwhile;
        wp_reset_postdata(); ?>

      </div>

    </div>
  </section>
<?php endif; ?>