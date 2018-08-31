<?php
/**
 * Newsletter form page template class
 *
 * @package Aztec
 */

namespace Aztec\Pages;

use Aztec\Base;

/**
 * Newsletter form page template features manipulation
 */
class NewsletterForm extends Base {

	/**
	 * Add post listing hooks
	 */
	public function init() {
		add_filter( 'elemarjr_display_hero', $this->callback( 'display_hero' ) );
	}

	/**
	 * Hide hero in this template
	 *
	 * @param  boolean $display Display the hero.
	 * @return boolean
	 */
	public function display_hero( $display ) {
		if ( is_page_template( 'page-templates/newsletter-form.php' ) ) {
			return false;
		}

		return $display;
	}
}
