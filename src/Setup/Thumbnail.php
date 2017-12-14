<?php
/**
 * Thumbnail class
 *
 * @package LandAgency
 */

namespace Aztec\Setup;

use Aztec\Base;

/**
 * Manipulate project thumbnail
 */
class Thumbnail extends Base {

	/**
	 * Add thumbnail behavior hooks
	 */
	public function init() {
		add_action( 'after_setup_theme', $this->callback( 'add_thumbnail_support' ) );
	}

	/**
	 * Add theme support to post thumbnail
	 */
	public function add_thumbnail_support() {
		add_theme_support( 'post-thumbnails' );
	}
}
