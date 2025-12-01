<?php
/**
 * Template Name: Ofertas 
 *
 * Página com destaques das ofertas cadastradas no CPT ofertas.
 *
 * @package Tema_Dev_Gamb
 */

get_header();
?>
<main id="primary" class="site-main sandiego">


<?php get_template_part( 'template-parts/sections/section', 'banner' ); ?>

<?php get_template_part( 'template-parts/sections/section', 'search' ); ?> 



  <?php
  if (have_rows('ofertas_sections')) :
    while (have_rows('ofertas_sections')) :
      the_row();

      if (get_row_layout() === 'hero') {
        get_template_part('template-parts/sections/section', 'hero');
      }

      if (get_row_layout() === 'search') {
        get_template_part('template-parts/sections/section', 'search');
      }
    endwhile;
  endif;

  $per_page_field = (int) sd_field('ofertas_posts_per_page', get_the_ID(), 0);
  $posts_per_page = $per_page_field > 0 ? $per_page_field : -1;
  $paged = max(1, (int) get_query_var('paged'), (int) get_query_var('page'));

  $ofertas_query = new WP_Query([
    'post_type'      => 'ofertas',
    'posts_per_page' => $posts_per_page,
    'paged'          => $paged,
  ]);
  ?>

  <section class="container py-5 ofertas-lista">
    <?php if ($ofertas_query->have_posts()) : ?>
      <div class="d-flex flex-column gap-5">
        <?php
        while ($ofertas_query->have_posts()) :
          $ofertas_query->the_post();
          get_template_part('template-parts/content/content', 'oferta-card');
        endwhile;
        ?>
      </div>

      <?php
      if ($ofertas_query->max_num_pages > 1) :
        $pagination = paginate_links([
          'total'   => $ofertas_query->max_num_pages,
          'current' => $paged,
          'base'    => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
          'format'  => '?paged=%#%',
          'prev_text' => __('Anterior', 'ge-peto-sd-2025'),
          'next_text' => __('Próximo', 'ge-peto-sd-2025'),
        ]);
        if ($pagination) :
          ?>
          <div class="mt-5">
            <?php echo wp_kses_post($pagination); ?>
          </div>
        <?php
        endif;
      endif;
      ?>
    <?php else : ?>
      <p class="text-center text-muted mb-0"><?php esc_html_e('Nenhuma oferta cadastrada no momento.', 'ge-peto-sd-2025'); ?></p>
    <?php endif; ?>
  </section>
  <?php wp_reset_postdata(); ?>
</main>
<?php
get_footer();
