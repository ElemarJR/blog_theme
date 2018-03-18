<?php
/**
 * Theme assets setup.
 *
 * @package Aztec
 */

namespace Aztec\Setup;

use Aztec\Base;
use DI\Container;

/**
 * Manipulate the stylesheets and javascripts
 */
class Assets extends Base {

	protected $use_dist;

	protected $dist_relative_path = '/assets/js/app.dist.js';

	public function __construct( Container $container ) {
		parent::__construct( $container );

		$this->use_dist = is_readable( get_template_directory() . $this->dist_relative_path );
	}

	/**
	 * Add assets hooks
	 */
	public function init() {
		add_action( 'wp_enqueue_scripts', $this->callback( 'enqueue_script' ) );
	}

	/**
	 * Enqueue the JavaScript theme application
	 *
	 * If the dist file was generated, load it. Otherwise load the development application.
	 *
	 * Enqueue the RequireJS library file. Define the base url to the library
	 * file url path.
	 */
	function enqueue_script() {
		if( $this->use_dist ) {
			wp_enqueue_script( 'elemarjr-script', get_template_directory_uri() . $this->dist_relative_path, [ 'jquery' ], wp_get_theme()->get( 'Version' ), true );
		} else {
			wp_enqueue_script( 'elemarjr-config', get_template_directory_uri() . '/assets/js/config.js', [], false, true );
			wp_localize_script(
				'elemarjr-config', 'elemarjr_script', [
					'base_url' => get_template_directory_uri() . '/assets/js/bower_components',
				]
			);
			wp_enqueue_script( 'elemarjr-script', get_template_directory_uri() . '/assets/js/bower_components/requirejs/require.js', [ 'jquery' ], false, true );
		}
	}
}
