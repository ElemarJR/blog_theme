<?php
/**
 * Editor control class
 *
 * @package Aztec
 */

namespace Aztec\Customize\Control;

/**
 * Create control to WYSIWYG editor
 *
 * Based on Customize Editor Control plugin
 *
 * @link https://wordpress.org/plugins/customize-editor-control/
 */
class Editor extends \WP_Customize_Control {

	/**
	 * Control's Type.
	 *
	 * @since 3.4.0
	 * @var string
	 */
	public $type = 'editor';

	/**
	 * Constructor.
	 *
	 * Supplied `$args` override class property defaults.
	 *
	 * If `$args['settings']` is not defined, use the $id as the setting ID.
	 *
	 * @since 3.4.0
	 *
	 * @param \WP_Customize_Manager $manager Customizer bootstrap instance.
	 * @param string                $id      Control ID.
	 * @param array                 $args    Optional. Arguments to override class property defaults.
	 */
	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );

		if ( ! empty( $args['editor_settings'] ) ) {
			$this->input_attrs['data-editor'] = wp_json_encode( $args['editor_settings'] );
		}
	}

	/**
	 * Render the control's content.
	 *
	 * @since 3.4.0
	 */
	public function render_content() {
		?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<textarea class="customize-editor-control" id="customize-editor-control-<?php echo intval( $this->instance_number ); ?>" <?php $this->input_attrs(); ?> <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
		</label>
		<?php
	}

	/**
	 * Enqueue control related scripts/styles.
	 */
	public function enqueue() {
		wp_enqueue_editor();
		wp_enqueue_script(
			'customize-editor-control',
			get_template_directory_uri() . '/assets/js/admin/customize-editor-control.js',
			array(
				'editor',
			),
			false,
			true
		);
	}
}
