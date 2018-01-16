<?php
/**
 * Create ACF for template
 *
 * @package WordPress
 * @subpackage AztecWpDevEnv
 * @since 0.1.0
 * @version 0.1.0
 */

namespace Aztec\Integration\ACF\Pages;

/**
 * Add custom fields to about template.
 */
class Contact {

	/**
	 * About template location
	 *
	 * @var array
	 */
	protected $location = array(
		array(
			array(
				'param' => 'post_template',
				'operator' => '==',
				'value' => 'page-templates/contact.php',
			),
		),
	);

	/**
	 * Init on container
	 */
	public function init() {
		if ( function_exists( 'acf_add_options_page' ) ) {
			$this->add_body_fields();
		}
	}

	/**
	 * Add Purpose custom fields
	 */
	public function add_body_fields() {
		acf_add_local_field_group( array(
			'key' => 'contact',
			'title' => __( 'Body', 'elemarjr' ),
			'hide_on_screen' => array( 'the_content' ),
			'fields' => array(
				array(
					'type' => 'text',
					'key' => 'title',
					'name' => 'title',
					'label' => __( 'Title', 'elemarjr' ),
				),
				array(
					'type' => 'wysiwyg',
					'key' => 'description',
					'name' => 'description',
					'label' => __( 'Description', 'elemarjr' ),
				),
			),
			'location' => $this->location,
		) );
	}
}
