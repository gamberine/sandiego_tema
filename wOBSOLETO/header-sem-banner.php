<?php

/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Tema_Dev_Gamb
 * @since Tema Dev-Gamb 1.0
 */

?>
<?php get_template_part('head'); ?>

<body <?php body_class(); ?>>
	<div id="loading" style="display: none;">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
	</div>

	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'temabasegamb'); ?></a>
		<?php get_template_part('template-parts/header/site-header-sem-banner'); ?>

		<div id="content" class="site-content">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">