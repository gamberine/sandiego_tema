<?php
/**
 * Seção: Grid/Carrossel de Hotéis
 *
 * Exibe cards de hotéis cadastrados no CPT 'hoteis'.
 */
$loop = new WP_Query( [
  'post_type'      => 'hoteis',
  'posts_per_page' => 8,
] );
?>
<section id="hoteis" class="section-pad bg-light">
  <div class="container">
    <div class="text-center mb-4">
      <div class="sd-sub">Nossos Hotéis</div>
      <h2 class="sd-title display-6">Desfrute do melhor da hospitalidade mineira</h2>
    </div>
    <div class="sd-carousel-hotels">
      <?php
      while ( $loop->have_posts() ) {
        $loop->the_post();
        $cidade = sd_field('hotel_cidade');
        $bairro = sd_field('hotel_bairro');
        $thumb  = get_the_post_thumbnail_url( get_the_ID(), 'large' );
        ?>
        <div class="px-3">
          <div class="sd-card h-100">
            <?php if ( $thumb ) : ?>
              <img src="<?php echo esc_url( $thumb ); ?>" class="w-100" alt="<?php the_title_attribute(); ?>">
            <?php endif; ?>
            <div class="p-3">
              <h5 class="mb-1"><?php the_title(); ?></h5>
              <?php if ( $cidade || $bairro ) : ?>
                <div class="text-muted small mb-2">
                  <?php echo esc_html( $cidade ); ?><?php echo $bairro ? ', ' . esc_html( $bairro ) : ''; ?>
                </div>
              <?php endif; ?>
              <div class="small mb-3"><?php the_excerpt(); ?></div>
              <a class="btn btn-sm btn-outline-primary" href="<?php the_permalink(); ?>">Saiba mais</a>
            </div>
          </div>
        </div>
      <?php } wp_reset_postdata(); ?>
    </div>
  </div>
</section>
