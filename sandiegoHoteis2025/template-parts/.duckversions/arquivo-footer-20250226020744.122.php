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
        <span class="mt-3 mb-5 pb-3 fontDecorativa text-center text-white"><?php echo wp_kses_post(get_field('titulo_footer')); ?></span>

        <div class="contatoFooter text-center text-white">

          <a class="logoFooter" href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo wp_kses_post(get_field('logomarca_rodape')); ?>" />
          </a>
          <div class="serrilhadoVertical"></div>
          <div class="gridContatosFooter">

            <h2 class="text-white"><?php echo wp_kses_post(get_field('texto_chamada_footer')); ?></h2>

            <!-- <a class="d-flex align-items-center" target="_blank" href="< ?php echo wp_kses_post(get_field('linkTelefone')); ?>">
                            <i class="fa-solid fa-headset"></i>
                            < ?php echo wp_kses_post(get_field('numeroTelefone')); ?>
                        </a> -->
            <!-- <a class="d-flex align-items-center" target="_blank" href="< ?php echo wp_kses_post(get_field('linkTelefone_2')); ?>">
                            < ?php echo wp_kses_post(get_field('numeroTelefone_2')); ?>
                        </a> -->
            <a class="d-flex align-items-center" target="_blank" href="<?php echo wp_kses_post(get_field('linkWhatsapp')); ?>">
              <i class="fab fa-whatsapp"></i>
              <?php echo wp_kses_post(get_field('numeroWhatsapp')); ?>
            </a>

            <a class="d-flex align-items-center" target="_blank" href="mailto:<?php echo wp_kses_post(get_field('e-mail')); ?>">
              <i class="far fa-envelope"></i>
              <?php echo wp_kses_post(get_field('e-mail')); ?>
            </a>
            <a class="d-flex align-items-center" target="_blank" href="https://www.instagram.com/<?php echo wp_kses_post(get_field('conta_instagram')); ?>">
              <i class="fab fa-instagram"></i>
              <?php echo wp_kses_post(get_field('conta_instagram')); ?>
            </a>
            <a class="d-flex align-items-center" target="_blank" href="<?php echo wp_kses_post(get_field('link_endereco_esq')); ?>">
              <i class="fa-solid fa-location-dot"></i>
              <?php echo wp_kses_post(get_field('endereco_esq')); ?>
            </a>
            <a class="d-flex align-items-center" target="_blank" href="<?php echo wp_kses_post(get_field('link-endereco_dir')); ?>">
              <i class="fa-solid fa-location-dot"></i>
              <?php echo wp_kses_post(get_field('endereco_dir')); ?>
            </a>
            <a class="d-flex align-items-center" target="_blank" href="<?php echo wp_kses_post(get_field('link-endereco_3')); ?>">
              <i class="fa-solid fa-location-dot"></i>
              <?php echo wp_kses_post(get_field('endereco_3')); ?>
            </a>
            <a class="d-flex align-items-center" target="_blank" href="<?php echo wp_kses_post(get_field('link-endereco_4')); ?>">
              <i class="fa-solid fa-thumbtack"></i>
              <?php echo wp_kses_post(get_field('endereco_4')); ?>
            </a>
          </div>

        </div>
      <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_query(); ?>
  </div>
  <a class="btnWhatsAppFooter" target="_blank" href="<?php echo wp_kses_post(get_field('linkWhatsapp')); ?>">
    <i class="fab fa-whatsapp"></i>
  </a>
  <a class="btnTop" href="#top">
    <i class="fa-solid fa-arrow-up"></i>
  </a>
</footer>