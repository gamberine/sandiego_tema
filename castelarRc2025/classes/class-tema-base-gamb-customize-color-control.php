<?php
/**
 * Customize API: WP_Customize_Color_Control class
 *
 * @package WordPress
 * @subpackage Tema_Dev_Gamb
 * @since Tema Dev-Gamb 1.0
 */

/**
 * Customize Color Control class.
 *
 * @since Tema Dev-Gamb 1.0
 *
 * @see WP_Customize_Control
 */
class Tema_Dev_Gamb_Customize_Color_Control extends WP_Customize_Color_Control {
	/**
	 * The control type.
	 *
	 * @since Tema Dev-Gamb 1.0
	 *
	 * @var string
	 */
	public $type = 'tema-base-gamb-color';

	/**
	 * Colorpicker palette
	 *
	 * @access public
	 *
	 * @since Tema Dev-Gamb 1.0
	 *
	 * @var array
	 */
	public $palette;

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @access public
	 *
	 * @since Tema Dev-Gamb 1.0
	 *
	 * @return void
	 */
	public function enqueue() {
		parent::enqueue();

		// Enqueue the script.
		wp_enqueue_script(
			'temabasegamb-control-color',
			get_theme_file_uri( 'assets/js/palette-colorpicker.js' ),
			array( 'customize-controls', 'jquery', 'customize-base', 'wp-color-picker' ),
			(string) filemtime( get_theme_file_path( 'assets/js/palette-colorpicker.js' ) ),
			false
		);
	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @access public
	 *
	 * @since Tema Dev-Gamb 1.0
	 *
	 * @uses WP_Customize_Control::to_json()
	 *
	 * @return void
	 */
	// public function to_json() {
	// 	parent::to_json();
	// 	$this->json['palette'] = $this->palette;
	// }
}
