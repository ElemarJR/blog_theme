<?php
/**
 * Yoast SEO integration
 *
 * @package WordPress
 * @subpackage AztecWpDevEnv
 * @since 0.1.0
 * @version 0.1.0
 */

namespace Aztec\Integration\YoastSEO;

use Aztec\Base;
use Aztec\Pages\Blog;

/**
 * Add additional features to Yoast SEO plugin
 */
class YoastSEO extends Base {

	/**
	 * Init on container
	 */
	public function init() {
		add_action( 'wpseo_add_opengraph_additional_images', $this->callback( 'set_og_default_image' ) );
		add_action( 'wpseo_twitter', $this->callback( 'set_twitter_default_image' ) );
	}

	/**
	 * Get the blog image full featured image URL to define as default social
	 * media image
	 */
	public function get_default_image_url() {
		$blog_image_id = $this->container->get( Blog::class )->get_current_language_id();
		$url           = wp_get_attachment_image_src( get_post_thumbnail_id( $blog_image_id ), 'full' )[0];
		return $url;
	}

	/**
	 * Set blog page featured image as OpenGraph image, if not set
	 *
	 * @param \WPSEO_OpenGraph_Image $ogImage The OpenGraph Image object.
	 */
	public function set_og_default_image( $ogImage ) {
		if ( 0 === count( $ogImage->get_images() ) ) {
			$ogImage->add_image( $this->get_default_image_url() );
		}
	}

	/**
	 * Set blog page featured image as Twitter meta image, if not set
	 *
	 * Disable and reenable the filter that disable default YoastSEO Twitter
	 * behavior to not duplicate the tags.
	 */
	public function set_twitter_default_image() {
		add_filter( 'wpseo_output_twitter_card', '__return_false' );
		$twitterSEO = new Twitter();
		add_filter( 'wpseo_output_twitter_card', '__return_true' );

		$twitterSEO->image_tag( $this->get_default_image_url() );
	}
}
