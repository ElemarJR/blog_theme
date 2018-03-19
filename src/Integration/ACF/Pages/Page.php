<?php
/**
 * Create ACF for default page template
 *
 * @package WordPress
 * @subpackage AztecWpDevEnv
 * @since 0.1.0
 * @version 0.1.0
 */

namespace Aztec\Integration\ACF\Pages;

use Aztec\Base;

/**
 * Add custom fields to blog
 */
class Page extends Base{

	/**
	 * Default template location
	 *
	 * @var array
	 */
	protected $location = array(
		array(
			array(
				'param' => 'post_template',
				'operator' => '==',
				'value' => 'default',
			),
		),
	);

	/**
	 * Init on container
	 */
	public function init() {
		if ( function_exists( 'acf_add_options_page' ) ) {
			add_action( 'admin_init', $this->callback( 'add_hero_fields' ) );
		}
	}

	/**
	 * Add Hero custom fields
	 */
	public function add_hero_fields() {
		acf_add_local_field_group( array(
			'key' => 'page_hero',
			'title' => __( 'Hero', 'elemarjr' ),
			'fields' => array(
				array(
					'type' => 'text',
					'key' => 'hero_title',
					'name' => 'hero_title',
					'label' => __( 'Title', 'elemarjr' ),
				),
				array(
					'type' => 'text',
					'key' => 'hero_subtitle',
					'name' => 'hero_subtitle',
					'label' => __( 'Subtitle', 'elemarjr' ),
				),
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
