<?php
/**
 * Ponto de entrada padrão do tema.
 *
 * @package tema-base-gamb
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header>

				<div class="entry-content">
					<?php
					the_content();
					wp_link_pages(
						[
							'before' => '<div class="page-links">' . esc_html__( 'Páginas:', 'tema-base-gamb' ),
							'after'  => '</div>',
						]
					);
					?>
				</div>
			</article>
		<?php endwhile; ?>

		<?php the_posts_navigation(); ?>
	<?php else : ?>
		<section class="no-results not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Nada encontrado', 'tema-base-gamb' ); ?></h1>
			</header>

			<div class="page-content">
				<p><?php esc_html_e( 'Não encontramos conteúdo para exibir aqui.', 'tema-base-gamb' ); ?></p>
			</div>
		</section>
	<?php endif; ?>
</main>

<?php
get_footer();
