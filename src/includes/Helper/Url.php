<?php
/**
 * Url helper class
 *
 * @package Aztec
 */

namespace Aztec\Helper;

/**
 * Url helper functions
 */
class Url {

	/**
	 * Get the post page (blog homepage) url
	 *
	 * If the page isn't set in the Settings > Reading, return the home_url.
	 *
	 * @link https://www.winwar.co.uk/2015/10/get-the-posts-page-url-dynamically-in-wordpress/
	 * @return string The blog homepage url.
	 */
	public function get_post_page_url() {
		if( 'page' == get_option( 'show_on_front' ) ) {
			return get_permalink( get_option('page_for_posts' ) );
		}

		return home_url();
	}

	/**
	 * Get the translated post URL for an especific language
	 *
	 * @param int|\WP_Post $post
	 * @param string|\PLL_Language $language
	 */
	public function get_another_language_post_url( $post, $language ) {
		if( is_a( $post, \WP_Post::class ) ) {
			$post = $post->ID;
		}

		if( is_a( $language, \PLL_Language::class ) ) {
			$language = $language->slug;
		}

		$translations = pll_get_post_translations( $post );
		if( empty( $translations ) ) {
			return false;
		}

		$translated_id = $translations[$language];

		return get_permalink( $translated_id );
	}
}
