<?php
/**
 * Seção: Grid de Hotéis (com mapa de fundo)
 */

$page_id      = get_the_ID();
$subtitulo    = sd_field('hoteis_subtitulo', $page_id, 'Nossos Hotéis');
$titulo       = sd_field('hoteis_titulo', $page_id, 'Desfrute do melhor da hospitalidade mineira');
$mapa         = sd_field('hoteis_mapa_fundo', $page_id);
$mapa_url     = '';

if (is_array($mapa) && isset($mapa['url'])) {
  $mapa_url = $mapa['url'];
} elseif (is_string($mapa) && $mapa) {
  $mapa_url = $mapa;
}

if (!$mapa_url) {
  $mapa_url = get_stylesheet_directory_uri() . '/imagens/bgPlanisferio.png';
}

$limite_cards = (int) sd_field('hoteis_grid_limite', $page_id, -1);
$ordem        = sd_field('hoteis_grid_ordem', $page_id, 'hotel_ordem');

$query_args = [
  'post_type'      => 'hoteis',
  'posts_per_page' => $limite_cards > 0 ? $limite_cards : -1,
  'meta_query'     => [
    [
      'key'     => 'hotel_exibir_contato',
      'compare' => '!=',
      'value'   => '0',
    ],
  ],
];

if ($ordem === 'hotel_ordem') {
  $query_args['meta_key'] = 'hotel_ordem';
  $query_args['orderby']  = ['meta_value_num' => 'ASC', 'title' => 'ASC'];
} elseif ($ordem === 'date') {
  $query_args['orderby'] = 'date';
  $query_args['order']   = 'DESC';
} else {
  $query_args['orderby'] = 'title';
  $query_args['order']   = 'ASC';
}

$hoteis = new WP_Query($query_args);
?>

<section class="sd-hotels-grid section-pad mt-5" id="hoteis">
  <div class="container position-relative">
    <div class="sd-hotels-grid__bg" aria-hidden="true" style="background-image:url('<?php echo esc_url($mapa_url); ?>');"></div>

    <div class="sd-hotels-grid__header text-center">
      <?php if ($subtitulo) : ?>
        <span class="badge px-4"><?php echo esc_html($subtitulo); ?></span>
      <?php endif; ?>
      <?php if ($titulo) : ?>
        <h2 class="primary-color col-12 col-lg-6 mx-auto mt-2"><?php echo esc_html($titulo); ?></h2>
      <?php endif; ?>
    </div>



     <!-- cards  -->
    <?php if ($hoteis->have_posts()) : ?>
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4 sd-hotels-grid__cards">
        <?php
        while ($hoteis->have_posts()) :
          $hoteis->the_post();
          $cidade   = sd_field('hotel_cidade');
          $estado   = sd_field('hotel_estado');
          $bairro   = sd_field('hotel_bairro');
          $resumo   = sd_field('hotel_resumo', get_the_ID(), get_the_excerpt());
          $link     = sd_field('hotel_url_reserva');
          $destaque = (bool) sd_field('hotel_destaque');
          $thumb    = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
        ?>
          <article class="col">
            <div class="sd-hotel-card h-100 <?php echo $destaque ? 'is-highlight' : ''; ?>">
              <div class="sd-hotel-card__media p-2 rounded">
                  <a class="link" href="<?php echo esc_url($link ?: get_permalink()); ?>" target="_blank">
                <?php if ($thumb) : ?>
                  <img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>">
                <?php else : ?>
                  <div class="sd-hotel-card__placeholder"></div>
                <?php endif; ?>
                  </a>
              </div>
              <div class="sd-hotel-card__body">
                <?php if ($cidade || $estado || $bairro) : ?>
                  <div class="sd-hotel-card__location">
                    <?php echo esc_html(trim($cidade . ($estado ? ' - ' . $estado : ''))); ?>
                    <?php if ($bairro) : ?>
                      <span class="sd-hotel-card__bairro"><?php echo esc_html($bairro); ?></span>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>

                <h3 class="sd-hotel-card__title mb-2"><?php the_title(); ?></h3>

                <?php if ($resumo) : ?>
                  <p class="sd-hotel-card__excerpt mb-3"><?php echo esc_html($resumo); ?></p>
                <?php endif; ?>

                <div class="d-flex align-items-center justify-content-between">
                  <a class="sd-hotel-card__btn" href="<?php echo esc_url($link ?: get_permalink()); ?>" target="_blank">
                    <span>Reservar</span>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                      <line x1="5" y1="12" x2="19" y2="12"></line>
                      <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                  </a>
                  <a class="sd-hotel-card__link" href="<?php the_permalink(); ?>">Ver detalhes</a>
                </div>
              </div>
            </div>
          </article>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      </div>
    <?php else : ?>
      <div class="sd-hotels-grid__empty text-center py-5">
        <p class="mb-0">Nenhum hotel cadastrado no momento.</p>
      </div>
    <?php endif; ?>
  </div>
</section>
