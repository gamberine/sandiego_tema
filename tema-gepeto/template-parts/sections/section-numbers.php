
<?php
/**
 * Section: Numbers
 * Repeater: items (number, label)
 */
?>
<section id="numeros" class="numbers py-5">
  <div class="container">
    <h2 class="title-xl text-center text-white mb-4"><php the_sub_field('titulo_sessao_numeros'); ?></h2>
    <div class="row g-4">
      <?php if(have_rows('items')): while(have_rows('items')): the_row(); ?>
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="item h-100 text-center">
           <div class="icon mx-auto mb-2">
            <img src="<?php echo esc_url( get_sub_field('icon')['url'] ?? get_stylesheet_directory_uri().'/assets/img/logo_white.png'); ?>" alt="" style="width:64px;height:64px;object-fit:contain">
          </div>
          <div class="display-4 fw-bold"><?php the_sub_field('number'); ?></div>
          <div class="small text-uppercase"><?php the_sub_field('label'); ?></div>
        </div>
      </div>
      <?php endwhile; endif; ?>
    </div>
  </div>
</section>
