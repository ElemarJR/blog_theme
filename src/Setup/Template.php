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
		add_filter( 'body_class', $this->callback( 'body_class' ) );
	}

	/**
	 * Add template name to body class
	 */
	public function body_class( $classes ) {
		$classes[] = $this->container->get( HelperTemplate::class )->get_template_name();
		
		if( ! apply_filters( 'elemarjr_display_hero', true ) ) {
			$classes[] = 'site-header__no-hero';
		}
		
		return $classes;
	}
}
