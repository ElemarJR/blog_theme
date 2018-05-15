<?php
/**
 * Rss class
 *
 * @package Aztec
 */

namespace Aztec\Setup;

use Aztec\Base;

/**
 * Manipulate the RSS title
 */
class Rss extends Base {

	/**
	 * Add hooks
	 */
	public function init() {
		add_filter( 'wp_title_rss', $this->callback( 'title' ) );
	}

	/**
	 * Add title tag support
	 */
	public function title( $title ) {
		if( ! function_exists( 'pll_current_language' ) ) {
			return $title;
		}
		
		return $title  . ' - ' . pll_current_language( 'name' );
	}
}
