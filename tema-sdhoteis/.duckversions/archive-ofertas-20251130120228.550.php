<?php
/**
 * Archive template for CPT Ofertas.
 *
 * @package Tema_Dev_Gamb
 */

get_header();
?>

<?php get_template_part( 'template-parts/sections/section', 'banner-home' ); ?>

<?php get_template_part( 'template-parts/sections/section', 'search' ); ?> 

  <section class="container py-5">

    <div class="text-center mb-5">
      <span class="text-uppercase small text-muted d-block mb-2"><?php esc_html_e('Ofertas', 'ge-peto-sd-2025'); ?></span>
      <p class="lead text-muted mb-0"><?php esc_html_e('Descubra experiências exclusivas para viagens de lazer, trabalho e família em toda a rede San Diego.', 'ge-peto-sd-2025'); ?></p>
      <!-- <h2 class="title-xl mb-3">< ?php esc_html_e('Condições especiais para cada momento', 'ge-peto-sd-2025'); ?></h2> -->
    </div>

    <?php if (have_posts()) : ?>
      <div class="d-flex flex-column">
        <?php
        while (have_posts()) :
          the_post();
          get_template_part('template-parts/content/content', 'oferta-card');
        endwhile;
        ?>
      </div>

      <div class="w-100 mt-4 mb-2 mx-auto gap-4 d-flex justify-content-center">
        <?php
        the_posts_pagination([
          'mid_size'  => 1,
          'prev_text' => __('Anterior', 'ge-peto-sd-2025'),
          'next_text' => __('Próximo', 'ge-peto-sd-2025'),
        ]);
        ?>
      </div>
    <?php else : ?>
      <p class="text-center text-muted mb-0"><?php esc_html_e('Nenhuma oferta disponível no momento.', 'ge-peto-sd-2025'); ?></p>
    <?php endif; ?>
  </section>
</main>
<?php
get_footer();
