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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_singular() ) : ?>
			<?php the_title( '<h1 class="entry-title default-max-width">', '</h1>' ); ?>
		<?php else : ?>
			<?php the_title( sprintf( '<h2 class="entry-title default-max-width"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<?php endif; ?>

		<?php tema_base_gamb_post_thumbnail(); ?>
	</header><!-- .entry-header -->


	<div class="row boxPostagem">

				
<div class="gridPostSingle col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	<div class="imgPost">
	<img src="<?php echo wp_kses_post(get_field('imagem_destino'));?>"/>
	</div>
	
	<div class="dataPost">Publicado por: <?php the_author() ?> | Em: <?php echo get_the_date(); ?></div>
	<!-- <div class="dataPost">Publicado em: < ?php echo get_the_date(); ?></div> -->

	<?php $summary = wp_kses_post(get_field('texto-destino')); echo substr($summary, 0, -1); ?>
	
</div>
</div>
	<div class="entry-content">
		<?php
		the_content(
			tema_base_gamb_continue_reading_text()
		);

		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'temabasegamb' ) . '">',
				'after'    => '</nav>',
				/* translators: %: page number. */
				'pagelink' => esc_html__( 'Page %', 'temabasegamb' ),
			)
		);

		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer default-max-width">
		<?php tema_base_gamb_entry_meta_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
