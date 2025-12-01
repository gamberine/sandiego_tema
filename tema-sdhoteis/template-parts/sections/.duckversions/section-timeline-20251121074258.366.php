<?php
/**
 * Section: Timeline
 * Timeline cards com dados vindos do repeater timeline_items.
 */
$title = get_sub_field('timeline_title') ?: __('Timeline', 'ge-peto-sd-2025');
$subtitle = get_sub_field('timeline_subtitle');
$has_items = have_rows('timeline_items');
?>

<section class="timeline container py-5">
  <div class="text-center mb-5">
    <?php if ($title) : ?>
      <h2 class="title-xl mb-3"><?php echo esc_html($title); ?></h2>
    <?php endif; ?>

    <?php if ($subtitle) : ?>
      <p class="lead text-muted mb-0"><?php echo esc_html($subtitle); ?></p>
    <?php endif; ?>
  </div>

  <?php if ($has_items) : ?>
    <div class="row g-4">
      <?php while (have_rows('timeline_items')) : the_row(); ?>
        <?php
        $year = get_sub_field('year');
        $heading = get_sub_field('heading');
        $description = get_sub_field('description');
        $image = get_sub_field('image');
        ?>
        <div class="col-12 col-md-6 col-xl-4">
          <article class="timeline-card h-100 border rounded-3 overflow-hidden bg-white shadow-sm">
            <?php if (!empty($image['url'])) : ?>
              <div class="timeline-card__image" style="height:220px;">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? $heading ?? ''); ?>" class="w-100 h-100 object-fit-cover">
              </div>
            <?php endif; ?>
            <div class="p-4">
              <?php if ($year) : ?>
                <span class="badge rounded-pill text-bg-success mb-2"><?php echo esc_html($year); ?></span>
              <?php endif; ?>
              <?php if ($heading) : ?>
                <h3 class="h5 mb-2"><?php echo esc_html($heading); ?></h3>
              <?php endif; ?>
              <?php if ($description) : ?>
                <p class="mb-0 small text-muted"><?php echo esc_html($description); ?></p>
              <?php endif; ?>
            </div>
          </article>
        </div>
      <?php endwhile; ?>
    </div>
  <?php else : ?>
    <p class="text-center text-muted mb-0"><?php esc_html_e('Nenhum evento cadastrado na timeline.', 'ge-peto-sd-2025'); ?></p>
  <?php endif; ?>
</section>
