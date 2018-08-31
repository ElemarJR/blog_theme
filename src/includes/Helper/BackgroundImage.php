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
use Aztec\Setup\Thumbnail;

/**
 * Load the header background image for each page
 */
class BackgroundImage extends Base {

	/**
	 * Get the page background image urls
	 *
	 * It will be returned the fallback image if the any image was loaded for
	 * the current request.
	 *
	 * @return string The header backgorund image URL.
	 */
	public function get_bg_images() {
		$image_urls = false;
		if ( is_page() || is_single() ) {
			$image_urls = $this->get_post_featured_image();
		} elseif ( is_archive() ) {
			$image_urls = $this->get_archive_featured_image();
		}

		if ( false === $image_urls ) {
			$image_urls = $this->get_fallback_image();
		}

		return $image_urls;
	}

	/**
	 * Get newsletter background images.
	 *
	 * @param  string $theme_mod_name Customizer mod name.
	 * @return array
	 */
	public function get_newsletter_bg_images( $theme_mod_name ) {
		$url           = get_theme_mod( $theme_mod_name );
		$attachment_id = $this->get_attachment_id_by_url( $url );
		$image_sizes   = $this->container->get( Thumbnail::class )->bg_newsletter_sizes;

		foreach ( $image_sizes as $size ) {
			$images_urls[ $size['size'] ] = wp_get_attachment_image_url( $attachment_id, $size['name'] );
		}

		return $images_urls;
	}

	/**
	 * Get attachment ID based on URL.
	 *
	 * @param  string $url  Attachment URL.
	 * @return strng
	 */
	private function get_attachment_id_by_url( $url ) {
		// Split the $url into two parts with the wp-content directory as the separator.
		$parsed_url = explode( parse_url( WP_CONTENT_URL, PHP_URL_PATH ), $url );

		// Get the host of the current site and the host of the $url, ignoring www.
		$this_host = str_ireplace( 'www.', '', parse_url( home_url(), PHP_URL_HOST ) );
		$file_host = str_ireplace( 'www.', '', parse_url( $url, PHP_URL_HOST ) );

		// Return nothing if there aren't any $url parts or if the current host and $url host do not match.
		if ( ! isset( $parsed_url[1] ) || empty( $parsed_url[1] ) || ( $this_host != $file_host ) ) {
			return;
		}

		// Now we're going to quickly search the DB for any attachment GUID with a partial path match.
		// Example: /uploads/2013/05/test-image.jpg.
		global $wpdb;
		$attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM {$wpdb->prefix}posts WHERE guid RLIKE %s;", $parsed_url[1] ) );

		// Returns null if no attachment is found.
		return $attachment[0];
	}


	/**
	 * Get featured images from post (and page) for each screen size
	 *
	 * @param int $post_id Post ID or WP_Post object.  Default is global
	 *                     `$post`.
	 * @return string|false The post image URL. False if no URL is available.
	 */
	public function get_post_featured_image( $post_id = false ) {
		$image_sizes = $this->container->get( Thumbnail::class )->bg_image_sizes;
		$images_urls = array();

		foreach ( $image_sizes as $size ) {
			$images_urls[ $size['size'] ] = get_the_post_thumbnail_url( $post_id, $size['name'] );
		}

		return $images_urls;
	}

	/**
	 * For archive pages, get the blog header image
	 *
	 * @return string|false The blog page image URL. False if no URL is available or the page isn't set.
	 */
	public function get_archive_featured_image() {
		$blog_page_id = get_option( 'page_for_posts', false );

		if ( false === ( $blog_page_id ) ) {
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
		$image_sizes = $this->container->get( Thumbnail::class )->bg_image_sizes;
		$images_urls = array();

		foreach ( $image_sizes as $size ) {
			$images_urls[ $size['size'] ] = get_template_directory_uri() . '/assets/images/header/fallback.jpg';
		}

		return $images_urls;
	}
}
