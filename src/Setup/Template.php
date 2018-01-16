<?php
/**
 * Template class
 *
 * @package LandAgency
 */

namespace Aztec\Setup;

use Aztec\Base;
use Aztec\Helper\Template as HelperTemplate;

/**
 * Setup general template things
 */
class Template extends Base {

	/**
	 * Add hooks
	 */
	public function init() {
		add_action( 'template_redirect', $this->callback( 'display_breadcrumb' ) );
		add_action( 'template_redirect', $this->callback( 'display_hero' ) );

		add_filter( 'body_class', $this->callback( 'body_class' ) );
	}

	/**
	 * Store in the container if the hero will be showed in the request or not
	 */
	public function display_hero() {
		$display_hero = apply_filters( 'elemarjr_display_hero', true );
		$this->container->set( 'display_hero', $display_hero );
	}
	
	/**
	 * Store in the container if the breadcrumb will be showed in the request
	 * or not
	 */
	public function display_breadcrumb() {
		$display_breadcrumb = apply_filters( 'elemarjr_display_breadcrumb', false );
		$this->container->set( 'display_breadcrumb', $display_breadcrumb );
	}

	/**
	 * Add template name to body class
	 */
	public function body_class( $classes ) {
		$classes[] = $this->container->get( HelperTemplate::class )->get_template_name();
		
		if( ! $this->container->get( 'display_hero' ) ) {
			$classes[] = 'no-hero';
		}
		
		return $classes;
	}
}
