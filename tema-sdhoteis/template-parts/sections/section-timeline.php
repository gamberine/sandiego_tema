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
    <?php if ($title): ?>
      <h2 class="title-xl mb-3 timeline-title"><?php echo esc_html($title); ?></h2>
    <?php endif; ?>
  </div>

  <?php if ($has_items): ?>

    <div class="timeline-carousel">
      <?php 
      $i = 0;
      while (have_rows('timeline_items')): 
        the_row();
        $year = get_sub_field('year');
        $heading = get_sub_field('heading');
        $description = get_sub_field('description');
        $image = get_sub_field('image');

        // alterna automaticamente top/bottom
        $position = ($i % 2 === 0) ? 'top' : 'bottom';
      ?>
      
      <div class="timeline-slide <?php echo $position; ?>">

        <div class="timeline-item">

          <?php if ($position === 'top'): ?>
            <div class="timeline-img">
              <img src="<?php echo esc_url($image['url']); ?>" alt="">
            </div>
          <?php endif; ?>

          <div class="timeline-line">
            <div class="timeline-pointer"></div>
          </div>

          <div class="timeline-content">
            <h3 class="timeline-year"><?php echo esc_html($year); ?></h3>
            <p class="timeline-heading"><?php echo esc_html($heading); ?></p>
            <!-- <p class="timeline-desc">< ?php echo esc_html($description); ?></p> -->
          </div>

          <?php if ($position === 'bottom'): ?>
            <div class="timeline-img">
              <img src="<?php echo esc_url($image['url']); ?>" alt="">
            </div>
          <?php endif; ?>

        </div>
      </div>

      <?php 
      $i++; 
      endwhile; 
      ?>
    </div>

  <?php endif; ?>
</section>
