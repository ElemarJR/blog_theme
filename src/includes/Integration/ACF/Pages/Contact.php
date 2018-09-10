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

use Aztec\Base;

/**
 * Add custom fields to about template.
 */
class Contact extends Base {

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
			add_action( 'acf/include_fields', $this->callback( 'add_body_fields' ) );
			add_action( 'acf/include_fields', $this->callback( 'add_form_fields' ) );
		}
	}

	/**
	 * Add page body custom fields
	 */
	public function add_body_fields() {
		acf_add_local_field_group(
			array(
			'key' => 'contact',
			'title' => __( 'Body', 'elemarjr' ),
			'hide_on_screen' => array( 'the_content' ),
			'fields' => array(
				array(
					'type' => 'text',
					'key' => 'title',
					'name' => 'title',
					'label' => __( 'Title', 'elemarjr' ),
					'instructions' => __( 'Use * to bold', 'elemarjr' ),
				),
				array(
					'type' => 'text',
					'key' => 'subtitle',
					'name' => 'subtitle',
					'label' => __( 'Subtitle', 'elemarjr' ),
				),
				array(
					'type' => 'wysiwyg',
					'key' => 'description',
					'name' => 'description',
					'label' => __( 'Description', 'elemarjr' ),
				),
			 ),
			 'location' => $this->location,
			)
		);
	}

	/**
	 * Add form page fields
	 */
	public function add_form_fields() {
		acf_add_local_field_group(
			array(
			'key' => 'contact_form',
			'title' => __( 'Form', 'elemarjr' ),
			'hide_on_screen' => array( 'the_content' ),
			'fields' => array(
				array(
					'type' => 'text',
					'key' => 'message_success',
					'name' => 'message_success',
					'label' => __( 'Success', 'elemarjr' ),
				),
				array(
					'type' => 'text',
					'key' => 'message_empty',
					'name' => 'message_empty',
					'label' => __( 'Error Message: Empty fields', 'elemarjr' ),
				),
				array(
					'type' => 'text',
					'key' => 'message_spam',
					'name' => 'message_spam',
					'label' => __( 'Error Message: Spam', 'elemarjr' ),
				),
				array(
					'type' => 'text',
					'key' => 'message_not-sent',
					'name' => 'message_not-sent',
					'label' => __( 'Error Message: Not sent', 'elemarjr' ),
				),
			 ),
			 'location' => $this->location,
			)
		);
	}
}
