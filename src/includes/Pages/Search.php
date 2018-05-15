<?php
/**
 * Search template class
 *
 * @package Aztec
 */

namespace Aztec\Pages;

use Aztec\Base;

/**
 * Search template features manipulation
 */
class Search extends Base {
	
	/**
	 * Add post listing hooks
	 */
	public function init() {		
		add_filter( 'pre_get_posts', $this->callback( 'search_posts' ) );
	}

	/**
	 * Search just posts
	 * 
	 * @return boolean True, if is the home of the blog. False, otherwise.
	 */
	public function search_posts( $query ) {
		if( ! is_admin() && $query->is_search ) {
			$query->set( 'post_type', 'post' );
		}
		
		return $query;
	}
}
