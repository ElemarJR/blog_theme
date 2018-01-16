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
		add_filter( 'elemarjr_site_content_bg', $this->callback( 'site_content_bg' ) );
	}
	
	/**
	 * Hide hero on contact page
	 * 
	 * @return boolean False, if is contact template. Otherwise, false.
	 */
	public function hide_hero( $show ) {
		if( is_page_template( $this->template ) ) {
			return false;
		}
		
		return $show;
	}
	
	/**
	 * Show featured image as background
	 * 
	 * @param boolean $show Show featured image as background.
	 * @return boolean Show if is this template, false otherwise.
	 */
	public function site_content_bg( $show ) {
		if( is_page_template( $this->template ) ) {
			return true;
		}
		
		return $show;
	}
}
