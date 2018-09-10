<?php
/**
 * Text Helper.
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

namespace Aztec\Helper;

/**
 * Text helper functions
 */
class Text {

	/**
	 * Replace text between asterisk to `strong` tag
	 *
	 * @param string $text The text
	 * @return string The text with
	 */
	public function asterisk_to_strong( $text ) {
		return preg_replace( '/(.*)\*(.*)\*(.*)/', '$1<strong>$2</strong>$3', $text );
	}
}
