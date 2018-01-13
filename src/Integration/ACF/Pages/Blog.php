<?php
/**
 * Create ACF for blog page
 *
 * @package WordPress
 * @subpackage AztecWpDevEnv
 * @since 0.1.0
 * @version 0.1.0
 */

namespace Aztec\Integration\ACF\Pages;

use DI\Container;
use Aztec\Pages\Blog as PageBlog;

/**
 * Add custom fields to blog
 */
class Blog {
	/**
	 * Blog page location
	 *
	 * @var array
	 */
	protected $location;

	/**
	 * Set page location to blog
	 */
	public function __construct( Container $container ) {
		$this->container = $container;
		$this->set_location();
	}
	
	/**
	 * Set the metabox locations to all language blog pages
	 */
	public function set_location(){
		$this->location = array();
		
		foreach ( $this->container->get( PageBlog::class )->get_pages_id() as $page_id ) {
			$this->location[] = array( array(
				'param' => 'page',
				'operator' => '==',
				'value' => $page_id,
			) );
		}
	}

	/**
	 * Init on container
	 */
	public function init() {
		if ( function_exists( 'acf_add_options_page' ) ) {
			$this->add_hero_fields();
		}
	}
	
	/**
	 * Add Hero custom fields
	 */
	public function add_hero_fields() {
		acf_add_local_field_group( array(
			'key' => 'blog_hero',
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
