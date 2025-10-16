<?php
/**
 * Displays the footer widget area.
 *
 * @package WordPress
 * @subpackage Tema_Dev_Gamb
 * @since Tema Dev-Gamb 1.0
 */

if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
<div class="container footer">


	<!-- <aside class="widget-area">
		
		 < ?php dynamic_sidebar( 'sidebar-1' ); ?> 
		
	</aside> -->
	<!-- .widget-area -->

	<div class="lineFooter"></div>
	<!-- <div class="textFooter">
		< ?php query_posts("post_type=conteudo&posts_per_page=1" ); ?>
		< ?php if(have_posts()):?>
		< ?php while (have_posts()) : the_post(); ?>

		< ?php $summary = wp_kses_post(get_field('texto_apos_footer')); echo substr($summary, 0, 4980); ?>
		< ?php endwhile; ?>
		< ?php endif; ?>	
	</div> -->
</div>

<?php endif; ?>
