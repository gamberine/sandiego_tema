<?php
/**
 * Template part: Oferta card
 * Displays oferta summary with featured image and CTA.
 *
 * @package Tema_Dev_Gamb
 */

if (!isset($args)) {
  $args = [];
}

$button_label = $args['button_label'] ?? __('Saiba mais', 'ge-peto-sd-2025');
?>

<article <?php post_class('oferta-card border-bottom rounded-4 px-5'); ?>>
   <div class="row align-items-center gx-4 px-5">
    <div class="col-12 col-lg-12 col-xl-7 d-flex flex-column justify-content-center">
      <h2 class="fw-normal text-primary mb-3"><?php the_title(); ?></h2>
      <div class="oferta-card__excerpt mb-3">
        <?php
        if (has_excerpt()) {
          the_excerpt();
        } else {
          echo wpautop(wp_trim_words(wp_strip_all_tags(get_the_content()), 55));
        }
        ?>
      </div>
      <a class="btn btn-primary w-max-content" href="<?php the_permalink(); ?>"><?php echo esc_html($button_label); ?></a>
    </div>
    <div class="col-12 col-lg-12 col-xl-5">
      <?php if (has_post_thumbnail()) : ?>
        <div class="ratio ratio-4x3 rounded overflow-hidden">
          <?php the_post_thumbnail('large', ['class' => 'w-100 h-100 object-fit-cover']); ?>
        </div>
      <?php else : ?>
        <div class="ratio ratio-4x3 bg-light rounded d-flex align-items-center justify-content-center text-muted">
          <span><?php esc_html_e('Imagem não disponível', 'ge-peto-sd-2025'); ?></span>
        </div>
      <?php endif; ?>
    </div>
    </div>
</article>
