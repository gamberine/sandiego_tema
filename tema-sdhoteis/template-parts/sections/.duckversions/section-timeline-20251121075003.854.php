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
      <h2 class="title-xl mb-3 timeline-title"><?php echo esc_html($title); ?></h2>
    <?php endif; ?>
    <?php if ($subtitle) : ?>
      <p class="lead text-muted mb-0"><?php echo esc_html($subtitle); ?></p>
    <?php endif; ?>
  </div>

  <?php if ($has_items) : ?>
    <div class="timeline-line"></div>

    <div class="row g-5 justify-content-center timeline-wrapper">
      <?php while (have_rows('timeline_items')) : the_row(); ?>
        <?php
          $year = get_sub_field('year');
          $heading = get_sub_field('heading');
          $description = get_sub_field('description');
          $image = get_sub_field('image');
        ?>

        <div class="col-12 col-md-6 col-xl-4 timeline-item">
          <div class="timeline-card">
            
            <?php if (!empty($image['url'])) : ?>
              <div class="timeline-img">
                <img src="<?php echo esc_url($image['url']); ?>" 
                     alt="<?php echo esc_attr($image['alt'] ?? $heading ?? ''); ?>">
              </div>
            <?php endif; ?>

            <div class="timeline-pointer"></div>

            <div class="timeline-content text-center">
              <?php if ($year) : ?>
                <h4 class="timeline-year"><?php echo esc_html($year); ?></h4>
              <?php endif; ?>

              <?php if ($heading) : ?>
                <h3 class="timeline-heading"><?php echo esc_html($heading); ?></h3>
              <?php endif; ?>

              <?php if ($description) : ?>
                <p class="timeline-desc"><?php echo esc_html($description); ?></p>
              <?php endif; ?>
            </div>

          </div>
        </div>

      <?php endwhile; ?>
    </div>

  <?php else : ?>
    <p class="text-center text-muted mb-0">Nenhum evento cadastrado.</p>
  <?php endif; ?>
</section>
