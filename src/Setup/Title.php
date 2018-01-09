<?php
/**
 * Title class
 *
 * @package Aztec
 */

namespace Aztec\Setup;

use Aztec\Base;

/**
 * Manipulate the title tag
 */
class Title extends Base {

	/**
	 * Add hook to add title support
	 */
	public function init() {
		add_action( 'after_setup_theme', $this->callback( 'title_tag' ) );
	}

	/**
	 * Add title tag support
	 */
	public function title_tag() {
		add_theme_support( 'title-tag' );
	}
}
