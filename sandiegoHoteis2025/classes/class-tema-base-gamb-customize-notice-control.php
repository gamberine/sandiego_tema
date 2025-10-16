<?php
/**
 * Customize API: Tema_Dev_Gamb_Customize_Notice_Control class
 *
 * @package WordPress
 * @subpackage Tema_Dev_Gamb
 * @since Tema Dev-Gamb 1.0
 */

/**
 * Customize Notice Control class.
 *
 * @since Tema Dev-Gamb 1.0
 *
 * @see WP_Customize_Control
 */
class Tema_Dev_Gamb_Customize_Notice_Control extends WP_Customize_Control {
	/**
	 * The control type.
	 *
	 * @since Tema Dev-Gamb 1.0
	 *
	 * @var string
	 */
	public $type = 'tema-base-gamb-notice';

	/**
	 * Renders the control content.
	 *
	 * This simply prints the notice we need.
	 *
	 * @access public
	 *
	 * @since Tema Dev-Gamb 1.0
	 *
	 * @return void
	 */
	public function render_content() {
		?>
		<div class="notice notice-warning">
			<p><?php esc_html_e( 'To access the Dark Mode settings, select a light background color.', 'temabasegamb' ); ?></p>
			<p><a href="<?php echo esc_url( __( 'https://wordpress.org/support/article/tema-base-gamb/#dark-mode-support', 'temabasegamb' ) ); ?>">
				<?php esc_html_e( 'Learn more about Dark Mode.', 'temabasegamb' ); ?>
			</a></p>
		</div>
		<?php
	}
}
