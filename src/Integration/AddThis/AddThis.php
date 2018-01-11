<?php
/**
 * AddThis class
 *
 * @package Aztec
 */

namespace Aztec\Integration\AddThis;

use Aztec\Base;

/**
 * Integration with AddThis API
 */
class AddThis extends Base {

	public $base_script_url = '//s7.addthis.com/js/300/addthis_widget.js#pubid=';
	
	/**
	 * 
	 */
	public function init() {
		add_action( 'wp_enqueue_scripts', $this->callback( 'enqueue_script' ) );
	}
	
	/**
	 * Enqueue the AddThis script
	 *
	 * Enqueue only in post single
	 */
	public function enqueue_script() {		
		if ( is_single() ) {
			$id = 'ra-5a56b40e267fec0f';
			wp_enqueue_script( 'addthis-api', $this->base_script_url . $id, array(), false, true );
		}
	}
}
