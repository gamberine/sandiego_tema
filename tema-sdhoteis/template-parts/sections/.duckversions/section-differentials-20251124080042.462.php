<?php
/**
 * Section: Differentials + Contact
 * Repeater: cards (title, image)
 * Fields: cta_title, cta_text
 * Contact form: basic HTML (integrate plugin later)
 */
 ?>
<section class="diff container py-5">
  <h2 class="title-xl text-center mt-5">Principais Diferenciais</h2>
  <div class="row mt-3 mb-5 text-center row-gap-6">
    <?php if (have_rows('cards')): while (have_rows('cards')): the_row(); ?>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-3">
          <div class="mini">
            <h4 class="mb-3"><?php the_sub_field('title'); ?></h4>
            <?php $img = get_sub_field('image'); ?>
            <img src="<?php echo esc_url($img['url'] ?? get_stylesheet_directory_uri() . '/assets/img/.home_05.jpg'); ?>" alt="">
          </div>
        </div>
    <?php endwhile;
    endif; ?>
  </div>

</section>
