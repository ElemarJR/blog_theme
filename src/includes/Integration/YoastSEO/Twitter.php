<?php
/**
 * Yoast SEO integration with Twitter
 *
 * @package WordPress
 * @subpackage AztecWpDevEnv
 * @since 0.1.0
 * @version 0.1.0
 */

namespace Aztec\Integration\YoastSEO;

/**
 * Extends Yoast SEO Twitter class functionality
 */
class Twitter extends \WPSEO_Twitter {

	/**
	 * Display a Twitter image meta tag
	 *
	 * @param string $img The image url.
	 */
	public function image_tag( $img ) {
		if ( is_category() || is_tax() || is_tag() ) {
			$this->image_output( $img );
		}
	}
}
