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
class Assets extends Base {

	/**
	 * Add assets hooks
	 */
	public function init() {
		add_action( 'wp_enqueue_scripts', $this->callback( 'enqueue_script' ) );

		add_filter( 'script_loader_tag', $this->callback( 'script_loader_tag' ), 10, 3 );
	}

	/**
	 * Enqueue the JavaScript theme application
	 *
	 * Enqueue the RequireJS library file. Define the base url to the library
	 * file url path.
	 */
	function enqueue_script() {
		wp_enqueue_script( 'elemarjr-script', get_stylesheet_directory_uri() . '/assets/js/bower_components/requirejs/require.js', [ 'jquery' ], false, true );
		wp_localize_script(
			'elemarjr-script', 'elemarjr_script', [
				'base_url' => get_stylesheet_directory_uri() . '/assets/js/bower_components',
			]
		);
	}

	/**
	 * Add the main application script to the RequireJS script tag.
	 *
	 * @param string $tag The HTML tag.
	 * @param string $handle The script handle.
	 * @param string $src The script source.
	 * @return string The HTML tag adding the main application script.
	 */
	function script_loader_tag( $tag, $handle, $src ) {
		if ( 'elemarjr-script' === $handle ) {
			$require_main = get_stylesheet_directory_uri() . '/assets/js/app';
			return '<script data-main="' . $require_main . '" src="' . $src . '"></script>';
		}

		return $tag;
	}
}
