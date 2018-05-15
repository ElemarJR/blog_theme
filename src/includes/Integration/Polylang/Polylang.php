<?php
/**
 * Polylang integration
 *
 * @package WordPress
 * @subpackage AztecWpDevEnv
 * @since 0.1.0
 * @version 0.1.0
 */

namespace Aztec\Integration\Polylang;

use Aztec\Base;

/**
 * Integrate with Polylang plugin
 */
class Polylang extends Base {

	/**
	 * Init on container
	 */
	public function init() {
		add_filter( 'admin_init', $this->callback( 'register_strings' ) );
		add_filter( 'pll_the_languages_args', $this->callback( 'display_language_slug' ) );
		add_filter( 'pll_get_post_types', $this->callback( 'custom_post_type_support' ) );
	}

	/**
	 * Display language slug instead the full name
	 */
	public function display_language_slug( $args ) {
		$args['display_names_as'] = 'slug';
		return $args;
	}

	/**
	 * Register theme options to be translated
	 */
	public function register_strings() {
		$group = 'Elemar Jr.';
		pll_register_string( __( 'Contact Phone', 'elemarjr' ), 'phone', $group, false );
		pll_register_string( __( 'Contact Email', 'elemarjr' ), 'email', $group, false );
	}
	
	public function is_active() {
		return function_exists( 'PLL' );
	}
	
	public function custom_post_type_support( $post_types ) {
		$post_types['testimonial'] = 'testimonial';
		return $post_types;
	}
}
