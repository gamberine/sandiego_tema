
<?php
/**
 * Section: Services Grid
 * Repeater: services (icon, title, text)
 */
?>
<section class="sandiego services container py-5">
  <h2 class="title-xl text-center mb-4"><?php the_sub_field('title') ?: print 'Nossos Serviços'; ?></h2>
  <div class="row g-4">
    <?php if(have_rows('services')): while(have_rows('services')): the_row(); ?>
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="card h-100 text-center p-4">
          <div class="icon mx-auto mb-2">
            <img src="<?php echo esc_url( get_sub_field('icon')['url'] ?? get_stylesheet_directory_uri().'/assets/img/logo_white.png'); ?>" alt="" style="width:64px;height:64px;object-fit:contain">
          </div>
          <h3 class="h5 mb-1"><?php the_sub_field('title'); ?></h3>
          <p class="small mb-0"><?php the_sub_field('text'); ?></p>
        </div>
      </div>
    <?php endwhile; endif; ?>
  </div>
</section>
