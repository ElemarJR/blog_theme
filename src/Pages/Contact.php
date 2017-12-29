<?php
/**
 * Contect template class
 *
 * @package Aztec
 */

namespace Aztec\Pages;

use Aztec\Base;

/**
 * Contact features manipulation
 */
class Contact extends Base {

	/**
	 * 
	 * @var string The template path
	 */
	private $template = 'page-templates/contact.php';
	
	/**
	 * Doesn't show hero in the page
	 */
	public function init() {
		add_filter( 'elemarjr_display_hero', $this->callback( 'hide_hero' ) );
	}
	
	/**
	 * Hide hero on contact page
	 * 
	 * @return boolean True, if is contact template. Otherwise, false.
	 */
	public function hide_hero( $show ) {
		if( is_page_template( $this->template ) ) {
			return false;
		}
		
		return $show;
	}
}
