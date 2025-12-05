<?php
/**
 * Single template for Ofertas.
 *
 * @package Tema_Dev_Gamb
 */

get_header();
?>

<?php get_template_part( 'template-parts/sections/section', 'banner-institucional' ); ?>

  <section class="container py-5">
    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class('oferta-single mx-auto'); ?> style="max-width: 920px;">
          <header class="text-center mb-4">
            <span class="text-uppercase small text-muted d-block mb-2"><?php esc_html_e('Oferta especial', 'ge-peto-sd-2025'); ?></span>
            <!-- <h1 class="display-5 text-primary mb-3">< ?php the_title(); ?></h1> -->
          </header>

          <?php if (has_post_thumbnail()) : ?>
            <div class="rounded-4 overflow-hidden mb-4 shadow-sm">
              <?php the_post_thumbnail('large', ['class' => 'w-100 h-100 object-fit-cover']); ?>
            </div>
          <?php endif; ?>

          <div class="oferta-content lead">
            <?php the_content(); ?>
          </div>

          <div class="mt-5 d-flex flex-wrap gap-3">
            <?php
            $archive_url = get_post_type_archive_link('ofertas');
            $ofertas_page = get_pages([
              'meta_key'   => '_wp_page_template',
              'meta_value' => 'page-ofertas.php',
              'number'     => 1,
            ]);
            $back_url = !empty($ofertas_page) ? get_permalink($ofertas_page[0]->ID) : ($archive_url ?: home_url('/'));

            if ($archive_url) :
              ?>
              <a class="btn btn-primary" href="<?php echo esc_url($archive_url); ?>"><?php esc_html_e('Ver todas as ofertas', 'ge-peto-sd-2025'); ?></a>
            <?php endif; ?>

            <a class="btn btn-outline-primary" href="<?php echo esc_url($back_url); ?>"><?php esc_html_e('Voltar', 'ge-peto-sd-2025'); ?></a>
          </div>
        </article>
      <?php endwhile; ?>
    <?php else : ?>
      <p class="text-center text-muted mb-0"><?php esc_html_e('Oferta não encontrada.', 'ge-peto-sd-2025'); ?></p>
    <?php endif; ?>
  </section>
</main>
<?php
get_footer();
