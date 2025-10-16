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

<section class="gridCinza" id="contatos">
  <div class="container">

    <div class="row">
      <?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <div class="headerSection col-12 mb-5">

            <h2 class="tituloPrincipal justify-content-center">
              <i class="fa-solid fa-check"></i>
              <?php echo wp_kses_post(get_field('titulo_sessao_contatos')); ?>
            </h2>
            <?php echo wp_kses_post(get_field('texto_sessao_contatos')); ?>

          </div>

        <?php endwhile; ?>
      <?php endif; ?>


      <div class="col-xxl-6 col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12 d-flex justify-content-center mx-auto flex-column">
        <?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>

            <!-- <h3 class="titulo corPrincipal text-center mt-3 mb-5"><strong>< ?php echo wp_kses_post(get_field('titulo_formulario_contato')); ?></strong></h3> -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script type="text/javascript">
              var jQuery_3_6_0 = $.noConflict(true);
            </script>
            <script>
              jQuery_3_6_0();
              (function($) {
                function isIOS() {
                  var ua = navigator.userAgent.toLowerCase();
                  var iosArray = ['iphone', 'ipod'];
                  var isApple = false;
                  iosArray.forEach(function(item) {
                    if (ua.indexOf(item) != -1) {
                      isApple = true;
                    }
                  });
                  return isApple;
                }

                jQuery_3_6_0(document).ready(function() {
                  if (isIOS()) {
                    jQuery_3_6_0('.rowData').css({
                      'display': 'none'
                    });
                  }
                });
              })(jQuery_3_6_0);
            </script>
            <?php echo do_shortcode('[contact-form-7 id="7772880" title="Formulario_de_contato"]'); ?>

          <?php endwhile; ?>
        <?php endif; ?>

      </div>
    </div>
  </div>
</section>