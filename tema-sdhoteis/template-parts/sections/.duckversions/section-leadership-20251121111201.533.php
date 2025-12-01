<?php
/**
 * Section: Leadership
 * Time de Liderança — versão com layout da imagem + Slick no mobile.
 */

$title      = get_sub_field('leadership_title') ?: __('Time de Liderança', 'ge-peto-sd-2025');
$subtitle   = get_sub_field('leadership_subtitle');
$has_members  = have_rows('leadership_members');
$has_contacts = have_rows('leadership_contacts');
?>
<section class="leadership container py-5">

  <div class="text-center mb-5">
    <h2 class="title-xl mb-3">
      <?php echo esc_html(get_sub_field('leadership_title') ?: 'Time de Liderança'); ?>
    </h2>
  </div>

  <div class="timeline-carousel lideranca-slider">

    <?php if (have_rows('leadership_members')): ?>
      <?php while (have_rows('leadership_members')): the_row(); ?>

        <?php
        $photo = get_sub_field('photo');
        $name  = get_sub_field('name');
        $role  = get_sub_field('role');
        $bio   = get_sub_field('bio');
        ?>

        <div class="lider-card">

          <?php if (!empty($photo['url'])): ?>
            <img 
              src="<?php echo esc_url($photo['url']); ?>" 
              alt="<?php echo esc_attr($photo['alt'] ?: $name); ?>" 
              class="lider-foto"
            >
          <?php endif; ?>

          <div class="lider-info">
            <?php if ($name): ?>
              <h3 class="lider-nome"><?php echo esc_html($name); ?></h3>
            <?php endif; ?>

            <?php if ($role): ?>
              <p class="lider-cargo"><?php echo esc_html($role); ?></p>
            <?php endif; ?>
          </div>

          <?php if ($bio): ?>
            <p class="lider-bio"><?php echo esc_html($bio); ?></p>
          <?php endif; ?>

        </div>

      <?php endwhile; ?>
    <?php endif; ?>

  </div>

</section>
