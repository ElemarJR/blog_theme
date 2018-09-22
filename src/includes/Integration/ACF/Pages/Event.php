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
class Event extends Base {

	/**
	 * About template location.
	 *
	 * @var array
	 */
	protected $location = array(
		array(
			array(
				'param' => 'post_template',
				'operator' => '==',
				'value' => 'page-templates/events.php',
			),
		),
	);

	/**
	 * Init on container.
	 */
	public function init() {
		if ( function_exists( 'acf_add_options_page' ) ) {
			add_action( 'acf/include_fields', $this->callback( 'add_hero_fields' ) );
			add_action( 'acf/include_fields', $this->callback( 'add_about_event_fields' ) );
		}
	}

	/**
	 * Add about events fields.
	 */
	public function add_about_event_fields() {
		acf_add_local_field_group(
			array(
			'key' => 'event_about',
			'title' => __( 'About', 'elemarjr' ),
			'hide_on_screen' => array( 'the_content' ),
			'fields' => array(
				array(
					'type' => 'wysiwyg',
					'key' => 'cta_text',
					'name' => 'cta_text',
					'label' => __( 'Text', 'elemarjr' ),
				),
				array(
					'type' => 'text',
					'key' => 'cta_label',
					'name' => 'cta_label',
					'label' => __( 'Label', 'elemarjr' ),
					'wrapper' => array(
						'width' => '50%',
					),
				),
				array(
					'type' => 'url',
					'key' => 'cta_url',
					'name' => 'cta_url',
					'label' => __( 'URL', 'elemarjr' ),
					'wrapper' => array(
						'width' => '50%',
					),
				),
			 ),
			 'location' => $this->location,
			)
		);
	}

	/**
	 * Add Hero custom fields.
	 */
	public function add_hero_fields() {
		acf_add_local_field_group(
			array(
			'key' => 'event_hero',
			'title' => __( 'Hero', 'elemarjr' ),
			'hide_on_screen' => array( 'the_content' ),
			'fields' => array(
				array(
					'type' => 'text',
					'key' => 'hero_title',
					'name' => 'hero_title',
					'label' => __( 'Title', 'elemarjr' ),
				),
				array(
					'type' => 'wysiwyg',
					'key' => 'hero_text',
					'name' => 'hero_text',
					'label' => __( 'Text', 'elemarjr' ),
				),
			 ),
			 'location' => $this->location,
			)
		);
	}
}
