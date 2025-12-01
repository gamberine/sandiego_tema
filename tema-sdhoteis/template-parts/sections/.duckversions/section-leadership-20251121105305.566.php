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
    <?php if ($title): ?>
      <h2 class="title-xl mb-3"><?php echo esc_html($title); ?></h2>
    <?php endif; ?>

    <?php if ($subtitle): ?>
      <p class="lead text-muted mb-0"><?php echo esc_html($subtitle); ?></p>
    <?php endif; ?>
  </div>

  <?php if ($has_members): ?>
    
    <!-- WRAPPER DO CARROSSEL (slick será ativado abaixo de 1260px) -->
    <div class="lideranca-slider">
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
              class="foto"
            >
          <?php endif; ?>

          <?php if ($name): ?>
            <h3 class="nome"><?php echo esc_html($name); ?></h3>
          <?php endif; ?>

          <?php if ($role): ?>
            <p class="cargo"><?php echo esc_html($role); ?></p>
          <?php endif; ?>

          <?php if ($bio): ?>
            <p class="bio"><?php echo esc_html($bio); ?></p>
          <?php endif; ?>

        </div>

      <?php endwhile; ?>
    </div>

  <?php endif; ?>

  <?php if ($has_contacts): ?>
    <div class="leadership-contacts mt-5">
      <div class="row g-4">
        <?php while (have_rows('leadership_contacts')): the_row(); ?>
          <?php
          $label = get_sub_field('label');
          $value = get_sub_field('value');
          $url   = get_sub_field('url');
          ?>
          <div class="col-12 col-md-6 col-xl-3">
            <div class="contact-card h-100 border rounded-3 p-3">
              
              <?php if ($label): ?>
                <p class="small text-muted mb-1"><?php echo esc_html($label); ?></p>
              <?php endif; ?>

              <?php if ($value): ?>
                <?php if ($url): ?>
                  <a class="fw-semibold text-decoration-none"
                     href="<?php echo esc_url($url); ?>">
                    <?php echo esc_html($value); ?>
                  </a>
                <?php else: ?>
                  <p class="fw-semibold mb-0"><?php echo esc_html($value); ?></p>
                <?php endif; ?>
              <?php endif; ?>

            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  <?php endif; ?>

</section>
