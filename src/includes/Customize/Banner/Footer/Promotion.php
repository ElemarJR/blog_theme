<?php

namespace Aztec\Customize\Banner\Footer;

use Aztec\Customize\Banner\Banner;

/**
 * Customers banner class.
 */
class Promotion extends Banner {

	/**
	 * Slug name.
	 *
	 * @var string
	 */
	public $slug = 'footer_promotion_banner';

	/**
	 * Get sectiona name.
	 *
	 * @return string
	 */
	public function get_section_name() {
		return __( 'Footer promotion banner', 'elemarjr' );
	}
}