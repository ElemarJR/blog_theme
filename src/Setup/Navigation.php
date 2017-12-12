<?php
/**
 * Navigation class
 *
 * @package LandAgency
 */

namespace Aztec\Setup;

use Aztec\Base;

/**
 * Manipulate the navigation positions in the theme
 */
class Navigation extends Base {

	/**
	 * Add hooks
	 */
	public function init() {
		add_action( 'after_setup_theme', $this->callback( 'register_nav_menus' ) );
	}

	/**
	 * Register theme navigations
	 */
	public function register_nav_menus() {
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'elemarjr' ),
		) );
	}
}
