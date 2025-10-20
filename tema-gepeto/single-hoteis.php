<?php
/**
 * Template para exibição de um único post do tipo Hotéis.
 */
get_header();
the_post();
$cidade = sd_field('hotel_cidade');
$bairro = sd_field('hotel_bairro');
?>
<section class="position-relative" style="min-height:50vh;background:linear-gradient(0deg,rgba(0,0,0,.55),rgba(0,0,0,.55)),url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>') center/cover no-repeat;">
  <div class="container h-100 d-flex align-items-center">
    <div class="text-white">
      <?php if ( $cidade ) : ?><div class="sd-sub"><?php echo esc_html( $cidade ); ?></div><?php endif; ?>
      <h1 class="display-5 fw-bold sd-title mb-2"><?php echo esc_html( get_the_title() ); ?></h1>
      <?php if ( $bairro ) : ?><div class="fs-4"><?php echo esc_html( $bairro ); ?></div><?php endif; ?>
    </div>
  </div>
</section>

<section class="section-pad">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-6">
        <?php echo apply_filters( 'the_content', get_the_content() ); ?>
      </div>
      <div class="col-lg-6">
        <?php $galeria = sd_field('hotel_galeria');
        if ( is_array( $galeria ) ) {
          foreach ( $galeria as $img ) {
            echo '<img class="w-100 mb-3 rounded-3" src="' . esc_url( $img['url'] ) . '" alt="">';
          }
        }
        ?>
      </div>
    </div>
  </div>
</section>

<section class="section-pad bg-light">
  <div class="container">
    <h2 class="sd-title h3 mb-4">Quartos</h2>
    <div class="sd-carousel-rooms">
      <?php
      $rooms = sd_field('hotel_acomodacoes');
      if ( $rooms ) {
        foreach ( $rooms as $room_post ) {
          $img = get_the_post_thumbnail_url( $room_post->ID, 'large' );
          echo '<div class="px-3"><div class="sd-card h-100">';
          if ( $img ) {
            echo '<img class="w-100" src="' . esc_url( $img ) . '" alt="">';
          }
          echo '<div class="p-3">';
          echo '<h5>' . esc_html( get_the_title( $room_post->ID ) ) . '</h5>';
          echo '<a class="btn btn-sm btn-outline-primary" href="' . get_permalink( $room_post->ID ) . '">Detalhes</a>';
          echo '</div></div></div>';
        }
      }
      ?>
    </div>
  </div>
</section>

<section class="section-pad">
  <div class="container">
    <h2 class="sd-title h3 mb-4">Comodidades</h2>
    <div class="row row-cols-2 row-cols-md-4 g-4">
      <?php
      $terms = get_the_terms( get_the_ID(), 'hotel_feature' );
      if ( $terms && ! is_wp_error( $terms ) ) {
        foreach ( $terms as $term ) {
          $icon = sd_field( 'feature_icon', $term );
          echo '<div class="col"><div class="sd-amenity sd-card p-3">';
          if ( $icon ) {
            echo '<img src="' . esc_url( $icon['url'] ) . '" alt="' . esc_attr( $term->name ) . '" style="width:42px;height:42px">';
          }
          echo '<div>' . esc_html( $term->name ) . '</div>';
          echo '</div></div>';
        }
      }
      ?>
    </div>
  </div>
</section>

<section class="section-pad bg-light">
  <div class="container">
    <h2 class="sd-title h3 mb-4">Depoimento dos nossos Hóspedes</h2>
    <div class="sd-carousel-depo">
      <?php
      $depo_query = new WP_Query( [ 'post_type' => 'depoimento', 'posts_per_page' => 6 ] );
      while ( $depo_query->have_posts() ) {
        $depo_query->the_post();
        echo '<div class="px-3"><div class="sd-card h-100 p-3">';
        echo '<div class="small text-muted mb-1">' . esc_html( sd_field('depo_origem', get_the_ID() ) ) . '</div>';
        echo '<div class="fw-semibold mb-2">' . esc_html( get_the_title() ) . '</div>';
        echo '<div class="mb-2">' . get_the_content() . '</div>';
        echo '</div></div>';
      }
      wp_reset_postdata();
      ?>
    </div>
  </div>
</section>

<section class="section-pad text-center">
  <?php $url = sd_field('hotel_url_reserva'); ?>
  <a class="sd-btn" href="<?php echo esc_url( $url ?: '#' ); ?>">Quero fazer uma reserva nessa unidade</a>
</section>

<?php get_footer(); ?>
