<?php
/**
 * Background Image class
 * 
 * Normally the background image is loaded in the header. But for the contact 
 * page, the 
 *
 * @package Aztec
 */

namespace Aztec\Helper;

use Aztec\Base;

/**
 * Load the header background image for each page
 */
class BackgroundImage extends Base {
	
	/**
	 * Get the header background image url
	 * 
	 * It will be returned the fallback image if the any image was loaded for
	 * the current request.
	 * 
	 * @return string The header backgorund image URL.
	 */
	public function get_header_bg_image( $display_hero ) {
		if( ! $display_hero ) {
			return '';
		}
		
		$image_url = false;
		if ( is_page() || is_single() ) {
			$image_url = $this->get_post_featured_image();
		} elseif( is_archive() ) {
			$image_url = $this->get_archive_featured_image();
		}
		
		if( false === $image_url ) {
			$image_url = $this->get_fallback_image();
		}
			
		return $image_url;
	}
	
	/**
	 * Get featured image from post (and page)
	 * 
	 * @param int $post_id Post ID or WP_Post object.  Default is global 
	 *                     `$post`.
	 * @return string|false The post image URL. False if no URL is available.
	 */
	public function get_post_featured_image( $post_id = false ) {
		return get_the_post_thumbnail_url( $post_id, 'full' );
	}
	
	/**
	 * For archive pages, get the blog header image
	 * 
	 * @return string|false The blog page image URL. False if no URL is 
	 *                      available or the page isn't set.
	 */
	public function get_archive_featured_image() {
		if( false === ( $blog_page_id = get_option( 'page_for_posts', false ) ) ) {
			return false;
		}
		
		return $this->get_post_featured_image( $blog_page_id );
	}
	
	/**
	 * Get fallback header image 
	 * 
	 * @return string The fallback image URL.
	 */
	public function get_fallback_image() {
		return get_template_directory_uri() . '/assets/images/header/fallback.jpg';
	}
}
