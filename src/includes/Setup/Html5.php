<?php
/**
 * Theme assets setup.
 *
 * @package Aztec
 */

namespace Aztec\Setup;

use Aztec\Base;

/**
 * Manipulate the stylesheets and javascripts
 */
class Html5 extends Base {

	/**
	 * Add assets hooks.
	 */
	public function init() {
		add_action( 'after_setup_theme', $this->callback( 'add_html5_support' ) );
	}

	/**
	 * Add HTML5 support.
	 */
	public function add_html5_support() {
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
	}
}
