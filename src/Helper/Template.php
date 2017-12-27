<?php
/**
 * Template helper class
 *
 * @package Aztec
 */

namespace Aztec\Helper;

/**
 * Manipulate the stylesheets and javascripts
 */
class Template {

	/**
	 * Get the template plart that must be loaded in hero area
	 * 
	 * @return string The template. Default: (empty string)
	 */
	public function get_hero_template() {
		if( is_single() ) {
			return 'single';
		}
		
		return 'blog';
	}
}
