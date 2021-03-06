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
class About extends Base {

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
				'value' => 'page-templates/about.php',
			),
		),
	);

	/**
	 * Init on container
	 */
	public function init() {
		if ( function_exists( 'acf_add_options_page' ) ) {
			add_action( 'acf/include_fields', $this->callback( 'add_hero_fields' ) );
			add_action( 'acf/include_fields', $this->callback( 'body_lines' ) );
		}
	}

	/**
	 * The repeater to create the body lines
	 */
	public function body_lines() {
		acf_add_local_field_group( array(
			'key' => 'body_lines',
			'title' => __( 'Page Sections', 'elemarjr' ),
			'hide_on_screen' => array( 'the_content' ),
			'fields' => array(
				array(
					'type' => 'repeater',
					'key' => 'about_repeater',
					'name' => 'about_repeater',
					'layout' => 'block',
					'sub_fields' => array(
						array(
							'type' => 'text',
							'key' => 'title',
							'name' => 'title',
							'label' => __( 'Title', 'elemarjr' ),
						),
						array(
							'type' => 'wysiwyg',
							'key' => 'text',
							'name' => 'text',
							'label' => __( 'Text', 'elemarjr' ),
						),
						array(
							'type' => 'image',
							'key' => 'image',
							'name' => 'image',
							'label' => __( 'Image', 'elemarjr' ),
							'return_format' => 'id,'
						),
						array(
							'type' => 'radio',
							'key' => 'image_position',
							'name' => 'image_position',
							'label' => __( 'Image Position', 'elemarjr' ),
							'choices' => array(
								'left' => __( 'Left', 'elemarjr' ),
								'right' => __( 'Right', 'elemarjr' ),
							)
						),
						array(
							'type' => 'radio',
							'key' => 'color',
							'name' => 'color',
							'label' => __( 'Color Scheme', 'elemarjr' ),
							'choices' => array(
								'white-blue' => __( 'Background White and Title Blue', 'elemarjr' ),
								'white-red' => __( 'Background White and Title Red', 'elemarjr' ),
								'gray-blue' => __( 'Background Gray and Title Blue', 'elemarjr' ),
								'tiffany-white' => __( 'Background Tiffany and Title White', 'elemarjr' ),
							)
						),
					)
				),
			),
			'location' => $this->location,
		) );
	}

	/**
	 * Add Hero custom fields
	 */
	public function add_hero_fields() {
		acf_add_local_field_group( array(
			'key' => 'about_hero',
			'title' => __( 'Hero', 'elemarjr' ),
			'hide_on_screen' => array( 'the_content' ),
			'fields' => array(
				array(
					'type' => 'wysiwyg',
					'key' => 'hero_text',
					'name' => 'hero_text',
					'label' => __( 'Text', 'elemarjr' ),
				),
			),
			'location' => $this->location,
		) );
	}
}
