
<?php
/**
 * Section: Hero
 * Fields (ACF): hero_bg (image), hero_overlay (number opacity 0-1), hero_show_play (true/false)
 */
$bg = get_sub_field('hero_bg');
$show = get_sub_field('hero_show_play');
?>
<section class="sandiego hero position-relative text-center text-white">
  <?php if($bg): ?>
    <img class="bg" src="<?php echo esc_url($bg['url']); ?>" alt="<?php echo esc_attr($bg['alt']); ?>">
  <?php else: ?>
    <img class="bg" src="<?php echo esc_url( get_stylesheet_directory_uri().'/assets/img/.home_03.jpg'); ?>" alt="">
  <?php endif; ?>
  <?php if($show): ?>
  <div class="play">
    <svg viewBox="0 0 100 100" aria-hidden="true"><polygon points="40,30 72,50 40,70" fill="#fff"/></svg>
  </div>
  <?php endif; ?>
</section>
