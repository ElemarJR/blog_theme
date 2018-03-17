<?php
/**
 * About template class
 *
 * @package Aztec
 */

namespace Aztec\Pages;

use Aztec\Base;

/**
 * About template manipulation
 */
class About extends Base {

	public function get_row_classes() {
		$classes = array();
		$classes[] = 'about--row';
		$this->add_color_scheme_class( $classes );
		$this->add_image_position_class( $classes );

		return $classes;
	}

	public function row_classes_string() {
		return implode( ' ', $this->get_row_classes() );
	}

	public function add_color_scheme_class( &$classes, $color_scheme = false ) {
		if ( false === $color_scheme ) {
			$color_scheme = get_sub_field( 'color' );
		}

		if( 'white-blue' !== $color_scheme ) {
			switch ( $color_scheme ) {
				case 'white-red' :
					$classes[] = 'about--row__red-title';
					break;
				case 'gray-blue' :
					$classes[] = 'about--row__gray';
					break;
				case 'tiffany-white' :
					$classes[] = 'about--row__tiffany';
					break;
			}
		}
	}

	public function add_image_position_class( &$classes, $image_position = false ) {
		if ( false === $image_position ) {
			$image_position = get_sub_field( 'image_position' );
		}

		if( 'left' == $image_position ) {
			$classes[] = 'about--row__invert';
		}
	}
}
