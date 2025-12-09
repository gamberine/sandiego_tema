<?php

/**
 * SINGLE HOTEIS
 * Template para exibição de um único post do tipo Hotéis.
 */
get_header();
the_post();
$cidade = sd_field('hotel_cidade');
$bairro = sd_field('hotel_bairro');
$resumo   = sd_field('hotel_resumo');
?>
<section class="bannerSingle" style="background:linear-gradient(0deg,rgba(0,0,0,.55),rgba(0,0,0,.55)),url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>') center/cover no-repeat;">
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
        <?php if ($resumo) : ?>
          <p class="mb-4 pb-3 "><?php echo esc_html($resumo); ?></p>
        <?php endif; ?>
      </div>
      <div class="col-lg-6">
        <?php $galeria = sd_field('hotel_galeria'); ?>
        <?php if (is_array($galeria) && !empty($galeria)) : ?>
          <div class="sd-hotel-gallery">
            <?php foreach ($galeria as $img) : ?>
              <div class="sd-hotel-gallery__slide">
                <img class="w-100 rounded sd-hotel-gallery__img" src="<?php echo esc_url($img['url']); ?>" alt="">
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
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
<?php
// Google Reviews desativado a pedido do cliente.
// $place_id       = sd_field('hotel_google_place_id');
// $google_reviews = sd_get_google_reviews($place_id, 8);

$depo_query = new WP_Query([
  'post_type'      => 'depoimento',
  'posts_per_page' => 12,
  'meta_query'     => [
    'relation' => 'OR',
    [
      'key'   => 'hotel_avaliado',
      'value' => get_the_ID(),
    ],
    [
      'key'     => 'hotel_avaliado',
      'value'   => '"' . get_the_ID() . '"',
      'compare' => 'LIKE',
    ],
  ],
]);
?>

<?php if ($depo_query->have_posts()) : ?>
<section class="section-pad bg-light">
  <div class="container">
    <h2 class="sd-title mb-4 text-center">Depoimento dos nossos Hospedes</h2>

    <div class="sd-carousel-depo">
      <?php
      while ($depo_query->have_posts()) {
        $depo_query->the_post();
        $nome  = (string) get_the_title();
        $nota  = max(0, min(5, (int) sd_field('depo_nota', get_the_ID())));
        $texto = (string) sd_field('texto_depoimento', get_the_ID());
        ?>
        <div class="px-3">
          <div class="sd-card h-100 p-3 d-flex flex-column gap-2">
            <?php if ($nome) : ?>
              <div class="fw-semibold"><?php echo esc_html($nome); ?></div>
            <?php endif; ?>
            <?php if ($nota) : ?>
              <div class="sd-google-stars" aria-label="<?php echo esc_attr($nota); ?> estrelas">
                <?php for ($i = 1; $i <= 5; $i++) {
                  echo '<span class="' . ($i <= $nota ? 'on' : '') . '">&#9733;</span>';
                } ?>
              </div>
            <?php endif; ?>
            <?php if ($texto) : ?>
              <p class="mb-0 small"><?php echo esc_html($texto); ?></p>
            <?php endif; ?>
            <div class="small text-muted mt-auto">Fonte: Depoimentos do site</div>
          </div>
        </div>
        <?php
      }
      wp_reset_postdata();
      ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- aqui vai o arquivo hoteis-redes-sociais -->
<!-- < ?php get_template_part('template-parts/sections/section-hoteis-redes-sociais'); ?> -->

<section class="pt-5 mb-5" style="height: 19rem;align-items: center;display: flex;">
    <?php $url = sd_field('hotel_url_reserva'); ?>
    <a target="_blank" class="btn btn-accent mx-auto w-80 px-5 my-4" href="<?php echo esc_url($url ?: 'https://book.omnibees.com/chain/9627'); ?>">Quero fazer uma reserva nessa unidade</a>

</section>

<?php get_footer(); ?>
