<?php

/**
 * SINGLE HOTEIS
 * Template para exibição de um único post do tipo Hotéis.
 */
get_header();
the_post();
$cidade = sd_field('hotel_cidade');
$bairro = sd_field('hotel_bairro');
?>
<section class="position-relative" style="min-height:50vh;background:linear-gradient(0deg,rgba(0,0,0,.55),rgba(0,0,0,.55)),url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>') center/cover no-repeat;">
  <div class="container h-100 d-flex align-items-center">
    <div class="text-white text-center mx-auto row-gap-2">
      <?php if ($cidade) : ?><div class="text-white text-center sd-sub"><?php echo esc_html($cidade); ?></div><?php endif; ?>
      <h1 class="text-white text-center display-5 fw-bold sd-title"><?php echo esc_html(get_the_title()); ?></h1>
      <?php if ($bairro) : ?><div class="text-white text-center fs-4"><?php echo esc_html($bairro); ?></div><?php endif; ?>
    </div>
  </div>
</section>
<?php get_template_part('template-parts/sections/section', 'search'); ?>
<section class="section-pad">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-6">
        <?php echo apply_filters('the_content', get_the_content()); ?>
      </div>
      <div class="col-lg-6">
        <?php $galeria = sd_field('hotel_galeria');
        if (is_array($galeria)) {
          foreach ($galeria as $img) {
            echo '<img class="w-100 mb-3 rounded-3" src="' . esc_url($img['url']) . '" alt="">';
          }
        }
        ?>
      </div>
    </div>
  </div>
</section>

<section class="section-pad bg-light">
  <div class="container">
    <h2 class="sd-title mb-4 text-center">Quartos</h2>
    <div class="sd-carousel-rooms">
      <?php
      $rooms = sd_field('hotel_acomodacoes');
      if ($rooms) {
        foreach ($rooms as $room_post) {
          $img = get_the_post_thumbnail_url($room_post->ID, 'large');
          echo '<div class="px-3"><div class="sd-card h-100">';
          if ($img) {
            echo '<img class="w-100" src="' . esc_url($img) . '" alt="">';
          }
          echo '<div class="p-3">';
          echo '<h5>' . esc_html(get_the_title($room_post->ID)) . '</h5>';
          echo '<a class="btn btn-sm btn-outline-primary" href="' . get_permalink($room_post->ID) . '">Detalhes</a>';
          echo '</div></div></div>';
        }
      }
      ?>
    </div>
  </div>
</section>

<section class="section-pad primary-gradient">
  <div class="container white-color">
    <h2 class="sd-title white-color mb-4 text-center">Comodidades</h2>
<div class="row justify-content-center align-items-center row-cols-2 row-cols-md-4 g-4">
  <?php
  $terms = get_the_terms(get_the_ID(), 'hotel_feature');

  if ($terms && ! is_wp_error($terms)) {

    foreach ($terms as $term) {

      // pega o elemento HTML completo do ícone
      $icon = sd_field('feature_icon', $term);

      echo '<div class="col"><div class="sd-amenity sd-card p-3 text-center">';

      if ($icon) {
        // o campo já retorna <i class="fa-solid ..."></i>
        echo '<div class="mb-2" style="font-size:42px;line-height:1;">' . $icon . '</div>';
      }

      echo '<div>' . esc_html($term->name) . '</div>';

      echo '</div></div>';
    }
  }
  ?>
</div>

  </div>
</section>

<section class="section-pad bg-light">
  <div class="container">
    <?php
    $place_id       = sd_field('hotel_google_place_id');
    $google_reviews = sd_get_google_reviews($place_id, 8);
    ?>
    <h2 class="sd-title mb-4 text-center">Depoimento dos nossos Hóspedes</h2>

    <?php if ($google_reviews) : ?>
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php foreach ($google_reviews as $rev) : ?>
          <article class="col">
            <div class="sd-card h-100 p-3 d-flex flex-column gap-2">
              <div class="fw-semibold"><?php echo esc_html($rev['author']); ?></div>
              <?php if (! empty($rev['time'])) : ?>
                <div class="small text-muted"><?php echo esc_html($rev['time']); ?></div>
              <?php endif; ?>
              <div class="sd-google-stars" aria-label="<?php echo esc_attr($rev['rating']); ?> estrelas">
                <?php
                $rating = (int) floor($rev['rating']);
                for ($i = 1; $i <= 5; $i++) {
                  echo '<span class="' . ($i <= $rating ? 'on' : '') . '">&#9733;</span>';
                }
                ?>
              </div>
              <?php if (! empty($rev['text'])) : ?>
                <p class="mb-0 small"><?php echo esc_html($rev['text']); ?></p>
              <?php endif; ?>
              <div class="small text-muted mt-auto">Fonte: Google Reviews</div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    <?php else : ?>
      <div class="sd-carousel-depo">
        <?php
        $depo_query = new WP_Query(['post_type' => 'depoimento', 'posts_per_page' => 6]);
        while ($depo_query->have_posts()) {
          $depo_query->the_post();
          echo '<div class="px-3"><div class="sd-card h-100 p-3">';
          echo '<div class="small text-muted mb-1">
        ' . esc_html(sd_field('depo_origem', get_the_ID())) . '
        <span>' . esc_html(sd_field('nome_origem', get_the_ID())) . '</span> </div>';
          echo '<div class="fw-semibold mb-2">' . esc_html(get_the_title()) . '</div>';
          echo '<div class="mb-2">' . get_the_content() . '</div>';
          echo '</div></div>';
        }
        wp_reset_postdata();
        ?>
      </div>
    <?php endif; ?>
</div>
</section>

<!-- aqui vai o arquivo hoteis-redes-sociais -->
<!-- < ?php get_template_part('template-parts/sections/section-hoteis-redes-sociais'); ?> -->

<section class="pt-5 mb-5" style="height: 19rem;align-items: center;display: flex;">
    <?php $url = sd_field('hotel_url_reserva'); ?>
    <a target="_blank" class="btn btn-accent mx-auto w-80 px-5 my-4" href="<?php echo esc_url($url ?: 'https://book.omnibees.com/chain/9627'); ?>">Quero fazer uma reserva nessa unidade</a>

</section>

<?php get_footer(); ?>
