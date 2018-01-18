<?php
/**
 * Thumbnail class
 *
 * @package LandAgency
 */

namespace Aztec\Setup;

use Aztec\Base;
use DI\Container;

/**
 * Manipulate project thumbnail
 */
class Thumbnail extends Base {

	public $bg_image_sizes;
	
	public function __construct( Container $container ) {
		parent::__construct( $container );
		
		$this->bg_image_sizes = array(
			array(
				'name' => 'header-sm',
				'width' => 480,
				'height' => 760,
			),
			array(
				'name' => 'header-md',
				'width' => 768,
				'height' => 984,
			),
			array(
				'name' => 'header-lg',
				'width' => 1440,
				'height' => 900,
			),
		);
	}

	/**
	 * Add thumbnail behavior hooks
	 */
	public function init() {
		add_action( 'after_setup_theme', $this->callback( 'add_thumbnail_support' ) );
		add_action( 'after_setup_theme', $this->callback( 'add_image_sizes' ) );
	}

	/**
	 * Add theme support to post thumbnail
	 */
	public function add_thumbnail_support() {
		add_theme_support( 'post-thumbnails' );
	}
	
	/**
	 * Add header image sizes
	 */
	public function add_image_sizes() {
		foreach ( $this->bg_image_sizes as $image_size ) {
			add_image_size( $image_size['name'], $image_size['width'], $image_size['height'], true );
		}
		
		// post listing thumbnail
		add_image_size( 'post-listing', 348, 230, true );
	}
}
