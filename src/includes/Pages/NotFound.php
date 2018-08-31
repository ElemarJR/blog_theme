<?php
/**
 * Not Found template class
 *
 * @package Aztec
 */

namespace Aztec\Pages;

use Aztec\Base;

/**
 * Posts listing pages features manipulation
 */
class NotFound extends Base {

	/**
	 * Add post listing hooks
	 */
	public function init() {
		add_filter( 'elemarjr_display_hero', $this->callback( 'display_hero' ) );
	}

	/**
	 * Hide the header on 404 pages
	 *
	 * @param  boolean $display Display the hero.
	 * @return boolean True, if is the home of the blog. False, otherwise.
	 */
	public function display_hero( $display ) {
		if ( is_404() ) {
			return false;
		}

		return $display;
	}
}
