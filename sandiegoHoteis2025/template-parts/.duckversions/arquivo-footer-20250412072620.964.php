<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Tema_Dev_Gamb
 * @since Tema Dev-Gamb 1.0
 */
?>

<footer class="site-footer" id="contatos">
  <div class="container">


    <div class="row contatoFooter text-center text-white row-gap-3">

      <!-- <a class="logoFooter" href="< ?php echo esc_url(home_url('/')); ?>">
            <img src="< ?php echo esc_url(get_field('logomarca_rodape')); ?>" alt="< ?php echo esc_attr(get_bloginfo('name')); ?>" />
          </a> -->

      <?php $args = array(
        'post_type' => 'conteudo',
        'posts_per_page' => 1,
        'order' => 'date',
        'oderby' => 'DESC'
      );
      ?>
      <?php query_posts($args); ?>
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post();
        ?>

          <div class="col-xl-4 col-lg-4 col-md-12">

            <h4 class="text-white"><?php echo wp_kses_post(get_field('texto_chamada_footer')); ?></h4>
            <a class="" target="_blank" href="<?php echo wp_kses_post(get_field('linkTelefone')); ?>">
              <i class="fa-solid fa-headset"></i>
              <?php echo wp_kses_post(get_field('numeroTelefone')); ?>
            </a>
            <a class="" target="_blank" href="<?php echo wp_kses_post(get_field('linkWhatsapp_pt')); ?>">
              <i class="fab fa-whatsapp"></i>
              <?php echo wp_kses_post(get_field('numero_whatsapp_pt')); ?>
            </a>
            <!-- <a class="" target="_blank" href="< ?php echo wp_kses_post(get_field('linkWhatsapp_en')); ?>">
              <i class="fab fa-whatsapp"></i>
              < ?php echo wp_kses_post(get_field('numero_whatsapp_en')); ?>
            </a> -->
            <a class="" target="_blank" href="<?php echo wp_kses_post(get_field('linkWhatsapp_ca')); ?>">
              <i class="fab fa-whatsapp"></i>
              <?php echo wp_kses_post(get_field('numero_whatsapp_ca')); ?>
            </a>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-12 linksNoFooter">
            <a class="" target="_blank" href="mailto:<?php echo wp_kses_post(get_field('e-mail')); ?>">
              <i class="far fa-envelope"></i>
              <?php echo wp_kses_post(get_field('e-mail')); ?>
            </a>
            <a class="" target="_blank" href="https://www.instagram.com/<?php echo wp_kses_post(get_field('conta_instagram')); ?>">
              <i class="fab fa-instagram"></i>
              <?php echo wp_kses_post(get_field('conta_instagram')); ?>
            </a>
            <a class="" target="_blank" href="<?php echo esc_url(get_field('link_endereco_1')); ?>" no-translate>
              <i class="fa-solid fa-location-dot"></i>
              <?php echo wp_kses_post(get_field('endereco_1')); ?>
            </a>
            <a class="" target="_blank" href="<?php echo esc_url(get_field('link_endereco_2')); ?>">
              <i class="fa-solid fa-location-dot"></i>
              <?php echo wp_kses_post(get_field('endereco_2')); ?>
            </a>
            <!-- <a class="" target="_blank" href="< ?php echo esc_url(get_field('link_endereco_3')); ?>">
              <i class="fa-solid fa-location-dot"></i>
              < ?php echo wp_kses_post(get_field('endereco_3')); ?>
            </a> -->

          <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 d-none d-md-none d-sm-none d-lg-none d-xl-block d-xxl-block">

            <p><?php
                wp_nav_menu(
                  array(
                    'theme_location'  => 'footer',
                    'menu_class'      => 'menu-footer',
                    'container_class' => 'primary-menu-container',
                    'items_wrap'      => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
                    'fallback_cb'     => false,
                  )
                );
                ?>
            </p>

          </div>


    </div>
  </div>
  <?php $args = array(
    'post_type' => 'conteudo',
    'posts_per_page' => 1,
    'order' => 'date',
    'oderby' => 'DESC'
  );
  ?>
  <?php query_posts($args); ?>
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post();
    ?>

      <?php get_template_part('template-parts/arquivo-whatsapp'); ?>

      <a class="btnTop" href="#top">
        <i class="fa-solid fa-arrow-up"></i>
      </a>

    <?php endwhile; ?>
  <?php endif; ?>
  <?php wp_reset_query(); ?>
</footer>