<?php
/**
 * Navigation class
 *
 * @package LandAgency
 */

namespace Aztec\Setup;

use Aztec\Base;

/**
 * Manipulate the navigation positions in the theme
 */
class Navigation extends Base {

	/**
	 * Add hooks
	 */
	public function init() {
		add_action( 'after_setup_theme', $this->callback( 'register_nav_menus' ) );

		add_filter( 'walker_nav_menu_start_el' , $this->callback( 'social_walker_nav_menu_start_el' ), 10, 4 );
	}

	/**
	 * Register theme navigations
	 */
	public function register_nav_menus() {
		register_nav_menus( array(
			'primary' => __( 'Primary', 'elemarjr' ),
			'social' => __( 'Social Menu', 'elemarjr' ),
		) );
	}

	/**
	 * Add social icons to social menu
	 */
	public function social_walker_nav_menu_start_el( $item_output, $item, $depth, $args ) {
		if ( 'social' === $args->theme_location ) {
			$icon = sprintf( '<i class="%s"></i>', $this->social_menu_item_icon( $item->url ) );
			$item_output = str_replace( $args->link_after, "</span>{$icon}", $item_output );
		}

		return $item_output;
	}

	/**
	 * Get social menu icon class name
	 */
	private function social_menu_item_icon( $url ) {
		if( 'mailto:' === substr( $url, 0, 7 ) ) {
			return 'i-mail';
		}

		$home_url = parse_url( home_url( '/' ), PHP_URL_HOST );
		$url = parse_url( $url, PHP_URL_HOST );
		$url = preg_replace( '/www\./', '', $url);

		switch ( $url ) {
			case $home_url :
				$icon = 'i-rss';
				break;
			case 'github.com' :
				$icon = 'i-github';
				break;
			case 'twitter.com' :
				$icon = 'i-twitter';
				break;
			case 'linkedin.com' :
				$icon = 'i-linkedin';
				break;
			case 'facebook.com' :
				$icon = 'i-facebook';
				break;
			default :
				$icon = 'i-rss';
				break;
		}

		return $icon;
	}
}
