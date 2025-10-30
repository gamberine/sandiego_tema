<?php
/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 * @package WordPress
 * @subpackage Tema_Dev_Gamb
 * @since Tema Dev-Gamb 1.0
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 *
	 * @since Tema Dev-Gamb 1.0
	 *
	 * @return void
	 */
	function tema_base_gamb_register_block_styles() {
		// Columns: Overlap.
		register_block_style(
			'core/columns',
			array(
				'name'  => 'temabasegamb-columns-overlap',
				'label' => esc_html__( 'Overlap', 'temabasegamb' ),
			)
		);

		// Cover: Borders.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'temabasegamb-border',
				'label' => esc_html__( 'Borders', 'temabasegamb' ),
			)
		);

		// Group: Borders.
		register_block_style(
			'core/group',
			array(
				'name'  => 'temabasegamb-border',
				'label' => esc_html__( 'Borders', 'temabasegamb' ),
			)
		);

		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'temabasegamb-border',
				'label' => esc_html__( 'Borders', 'temabasegamb' ),
			)
		);

		// Image: Frame.
		register_block_style(
			'core/image',
			array(
				'name'  => 'temabasegamb-image-frame',
				'label' => esc_html__( 'Frame', 'temabasegamb' ),
			)
		);

		// Latest Posts: Dividers.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'temabasegamb-latest-posts-dividers',
				'label' => esc_html__( 'Dividers', 'temabasegamb' ),
			)
		);

		// Latest Posts: Borders.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'temabasegamb-latest-posts-borders',
				'label' => esc_html__( 'Borders', 'temabasegamb' ),
			)
		);

		// Media & Text: Borders.
		register_block_style(
			'core/media-text',
			array(
				'name'  => 'temabasegamb-border',
				'label' => esc_html__( 'Borders', 'temabasegamb' ),
			)
		);

		// Separator: Thick.
		register_block_style(
			'core/separator',
			array(
				'name'  => 'temabasegamb-separator-thick',
				'label' => esc_html__( 'Thick', 'temabasegamb' ),
			)
		);

		// Social icons: Dark gray color.
		register_block_style(
			'core/social-links',
			array(
				'name'  => 'temabasegamb-social-icons-color',
				'label' => esc_html__( 'Dark gray', 'temabasegamb' ),
			)
		);
	}
	add_action( 'init', 'tema_base_gamb_register_block_styles' );
}
