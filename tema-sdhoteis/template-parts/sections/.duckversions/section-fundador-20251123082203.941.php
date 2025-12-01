<?php
/**
 * Section: Fundadores
 * Provides a title, optional label, founders grid and rich text with highlight image.
 */
$section_title = get_sub_field('section_title') ?: __('Como tudo começou', 'ge-peto-sd-2025');
$section_label = get_sub_field('section_label') ?: __('Fundadores San Diego', 'ge-peto-sd-2025');
$content_block = get_sub_field('section_content');
$highlight_image = get_sub_field('section_image');

$has_founders = have_rows('founders');
$has_bottom_row = ! empty($content_block) || ! empty($highlight_image);
?>

<section class="founders container py-5">
  <div class="text-center mb-5">
    <?php if ($section_title) : ?>
      <h2 class="title-xl mb-3"><?php echo esc_html($section_title); ?></h2>
    <?php endif; ?>

    <?php if ($section_label) : ?>
      <span class="badge px-4 py-3 fw-semibold"><?php echo esc_html($section_label); ?></span>
    <?php endif; ?>
  </div>

  <?php if ($has_founders) : ?>
    <div class="row justify-content-center mt-2 mb-5">
      <?php while (have_rows('founders')) : the_row(); ?>
        <?php
        $photo = get_sub_field('photo');
        $name = get_sub_field('name');
        $role = get_sub_field('role');
        $bio = get_sub_field('bio');
        ?>
        <div class="col-12 col-md-12 col-lg-6 col-xl-3">
          <div class="founder-card h-100 text-center p-3">
            <?php if (! empty($photo['url'])) : ?>
              <?php if ($name) : ?>
                <h4 class="mb-2 primary font-title"><?php echo esc_html($name); ?></h4>
              <?php endif; ?>
              <div class="mb-3 founder-photo">
                <img src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo esc_attr($photo['alt'] ?? $name); ?>" class="img-fluid rounded shadow">
              </div>
            <?php endif; ?>

            <?php if ($role) : ?>
              <p class="small text-muted mb-2"><?php echo esc_html($role); ?></p>
            <?php endif; ?>

            <?php if ($bio) : ?>
              <p class="mb-0 small"><?php echo esc_html($bio); ?></p>
            <?php endif; ?>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>

  <?php if ($has_bottom_row) : ?>
    <div class="row flex-xl-nowrap align-items-center gap-4">
      <?php if (! empty($content_block)) : ?>
        <div class="col-12 col-md-12 col-lg-12 col-xl-8">
          <div class="founder-content">
            <?php echo wp_kses_post($content_block); ?>
          </div>
        </div>
      <?php endif; ?>

      <?php if (! empty($highlight_image['url'])) : ?>
        <div class="col-12 col-md-12 col-lg-12 col-xl-4">
          <div class="text-center founder-highlight-image">
            <img src="<?php echo esc_url($highlight_image['url']); ?>" alt="<?php echo esc_attr($highlight_image['alt'] ?? ''); ?>" class="img-fluid rounded shadow">
          </div>
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>
</section>

