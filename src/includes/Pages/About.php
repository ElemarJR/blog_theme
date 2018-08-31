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

	/**
	 * Get row classes.
	 */
	public function get_row_classes() {
		$classes   = array();
		$classes[] = 'about--row';
		$this->add_template_class( $classes );
		$this->add_color_scheme_class( $classes );
		$this->add_image_align_class( $classes );
		$this->add_image_position_class( $classes );

		return $classes;
	}

	/**
	 * Get row classes as string.
	 */
	public function row_classes_string() {
		return implode( ' ', $this->get_row_classes() );
	}

	/**
	 * Get color scheme classes.
	 *
	 * @param  array   $classes Classes array.
	 * @param  boolean $color_scheme Color scheme.
	 * @return void
	 */
	public function add_color_scheme_class( &$classes, $color_scheme = false ) {
		if ( false === $color_scheme ) {
			$color_scheme = get_sub_field( 'color' );
		}

		if ( 'white' !== $color_scheme ) {
			switch ( $color_scheme ) {
				case 'light':
					$classes[] = 'about--row__light';
					break;
				case 'dark':
					$classes[] = 'about--row__dark';
					break;
				case 'dusky':
					$classes[] = 'about--row__dusky';
					break;
			}
		}
	}

	/**
	 * Get template classes.
	 *
	 * @param  array $classes Classes array.
	 * @return void
	 */
	public function add_template_class( &$classes ) {
		$classes[] = 'about--row__' . get_sub_field( 'template' );
	}

	/**
	 * Add image align classes.
	 *
	 * @param  array $classes Classes array.
	 * @return void
	 */
	public function add_image_align_class( &$classes ) {
		$align = get_sub_field( 'image_align' );

		if ( $align !== 'none' ) {
			$classes[] = 'about--row__image_' . $align;
		}
	}

	/**
	 * Add image position classes.
	 *
	 * @param  array   $classes Classes array.
	 * @param  boolean $image_position Image invert position.
	 * @return void
	 */
	public function add_image_position_class( &$classes, $image_position = false ) {
		if ( false === $image_position ) {
			$image_position = get_sub_field( 'image_position' );
		}

		if ( 'left' == $image_position ) {
			$classes[] = 'about--row__invert';
		}
	}
}
