<?php
/**
 * Seção: Instagram
 *
 * Exibe um título e um shortcode do feed do Instagram (via plugin Instagram Feed).
 */
$titulo    = sd_field('home_instagram_titulo', get_the_ID(), 'Siga nosso Instagram');
$shortcode = sd_field('home_instagram_shortcode', get_the_ID(), '[instagram-feed]');
?>
<section class="section-pad">
  <div class="container">
    <div class="text-center mb-4">
      <h2 class="sd-title display-6"><?php echo esc_html( $titulo ); ?></h2>
    </div>
    <div>
      <?php echo do_shortcode( $shortcode ); ?>
    </div>
  </div>
</section>
