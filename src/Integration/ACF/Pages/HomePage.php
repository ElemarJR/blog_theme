<?php
/**
 * Create ACF for homepage
 *
 * @package WordPress
 * @subpackage AztecWpDevEnv
 * @since 0.1.0
 * @version 0.1.0
 */

namespace Aztec\Integration\ACF\Pages;

/**
 * Add custom fields to homepage.
 */
class HomePage {
	/**
	 * Home page location
	 *
	 * @var array
	 */
	protected $location = array(
		array(
			array(
				'param' => 'post_template',
				'operator' => '==',
				'value' => 'page-templates/home.php',
			),
		),
	);

	/**
	 * Init on container
	 */
	public function init() {
		if ( function_exists( 'acf_add_options_page' ) ) {
			$this->add_hero_fields();
			$this->add_purpose_fields();
			$this->add_quote_fields();
			$this->add_blog_fields();
		}
	}
	
	/**
	 * Add Hero custom fields
	 */
	public function add_hero_fields() {
		acf_add_local_field_group( array(
			'key' => 'home_hero',
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
				array(
					'type' => 'text',
					'key' => 'hero_button_label',
					'name' => 'hero_button_label',
					'label' => __( 'Button Label', 'elemarjr' ),
				),
				array(
					'type' => 'url',
					'key' => 'hero_button_url',
					'name' => 'hero_button_url',
					'label' => __( 'Button URL', 'elemarjr' ),
				),
			),
			'location' => $this->location,
		) );
	}

	/**
	 * Add Purpose custom fields
	 */
	public function add_purpose_fields() {
		acf_add_local_field_group( array(
			'key' => 'purpose',
			'title' => __( 'Purpose', 'elemarjr' ),
			'hide_on_screen' => array( 'the_content' ),
			// @todo Use repeater instead two fixed fields
			'fields' => array(
				array(
					'type' => 'url',
					'key' => 'purpose_link',
					'name' => 'purpose_link',
					'label' => __( 'Destination URL', 'elemarjr' ),
				),
				array(
					'type' => 'text',
					'key' => 'purpose_icon_1',
					'name' => 'purpose_icon_1',
					'label' => __( 'Icon Class 1', 'elemarjr' ),
				),
				array(
					'type' => 'wysiwyg',
					'key' => 'purpose_text_1',
					'name' => 'purpose_text_1',
					'label' => __( 'Text 1', 'elemarjr' ),
				),
				array(
					'type' => 'text',
					'key' => 'purpose_icon_2',
					'name' => 'purpose_icon_2',
					'label' => __( 'Icon Class 2', 'elemarjr' ),
				),
				array(
					'type' => 'wysiwyg',
					'key' => 'purpose_text_2',
					'name' => 'purpose_text_2',
					'label' => __( 'Text 2', 'elemarjr' ),
				),
			),
			'location' => $this->location,
		) );
	}

	/**
	 * Add Quote custom fields
	 */
	public function add_quote_fields() {
		acf_add_local_field_group( array(
			'key' => 'quote',
			'title' => __( 'Quote', 'elemarjr' ),
			'hide_on_screen' => array( 'the_content' ),
			'fields' => array(
				array(
					'type' => 'wysiwyg',
					'key' => 'quote',
					'name' => 'quote',
					'label' => __( 'Quote', 'elemarjr' ),
				),
			),
			'location' => $this->location,
		) );
	}
	
	/**
	 * Add Quote custom fields
	 */
	public function add_blog_fields() {
		acf_add_local_field_group( array(
			'key' => 'blog',
			'title' => __( 'Blog', 'elemarjr' ),
			'hide_on_screen' => array( 'the_content' ),
			'fields' => array(
				array(
					'type' => 'wysiwyg',
					'key' => 'blog_text',
					'name' => 'blog_text',
					'label' => __( 'Text', 'elemarjr' ),
					'description' => __( 'Text after the section title', 'elemarjr' ),
				),
			),
			'location' => $this->location,
		) );
	}
}
