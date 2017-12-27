<?php
/**
 * Posts listing pages class
 *
 * @package Aztec
 */

namespace Aztec\Pages;

use Aztec\Base;

/**
 * Posts listing pages features manipulation
 */
class Blog extends Base {
	
	/**
	 * Add post listing hooks
	 */
	public function init() {
		add_action( 'pre_get_posts', $this->callback( 'limit_posts_per_page' ) );

		add_filter( 'excerpt_length', $this->callback( 'excerpt_length' ) );
		add_filter( 'excerpt_more', $this->callback( 'excerpt_more' ) );
		add_filter( 'previous_posts_link_attributes', $this->callback( 'nav_link_class' ) );
		add_filter( 'next_posts_link_attributes', $this->callback( 'nav_link_class' ) );
	}

	/**
	 * Set to show up to 9 posts every query request
	 * 
	 * @param \WP_Query $query
	 */
	public function limit_posts_per_page( $query ) {
		if ( is_admin() || ! $query->is_main_query() ) {
			return;
		}

		$query->set( 'posts_per_page', 9 );
	}

	/**
	 * Set the blog post listing excerpt length
	 *
	 * @param int $length The current excerpt length.
	 * @return number The new excerpt length.
	 */
	public function excerpt_length( $length ) {
		return 20;
	}
	
	/**
	 * Set the blog post listing excerpt more
	 *
	 * @param int $length The current excerpt more.
	 * @return number The new excerpt more.
	 */
	public function excerpt_more( $more ) {
		return ' ...';
	}
	
	public function nav_link_class( $attr ) {
		return $attr . ' class="button"';
	}
}
