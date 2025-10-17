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

<?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>

    <section class="gridCinza pt-2" id="vantagens" style="background-image: url(<?php echo wp_kses_post(get_field('background_vantagens')); ?>);">

      <div class="container text-center corPrincipal">

        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <h2 class="title-primary pb-4">
              <?php echo wp_kses_post(get_field('titulo_sessao_vantagens')); ?>
            </h2>

          </div>
        <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_query(); ?>

      <?php $args = array(
        'post_type' => 'vantagens',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'oderby' => 'date'
      );
      ?>
      <?php query_posts($args); ?>
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post();
        ?>
          <div class="gridImgItems secondary-hover col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">

            <div><img src="<?php echo wp_kses_post(get_field('imagem_vantagens')); ?>" /> </div>
            <h4><?php the_title(); ?></h4>


          </div>

        <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_query(); ?>
        </div>


      </div>
    </section>