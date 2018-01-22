<?php
/**
 * Posts listing pages class
 *
 * @package Aztec
 */

namespace Aztec\Pages;

use Aztec\Base;
use Aztec\Integration\Polylang\Polylang;

/**
 * Posts listing pages features manipulation
 */
class Blog extends Base {
	
	/**
	 * Add post listing hooks
	 */
	public function init() {
		add_action( 'pre_get_posts', $this->callback( 'limit_posts_per_page' ) );
		
		add_filter( 'elemarjr_display_hero', $this->callback( 'display_hero' ) );
		add_filter( 'elemarjr_display_breadcrumb', $this->callback( 'display_breadcrumb' ) );
		add_filter( 'excerpt_length', $this->callback( 'excerpt_length' ) );
		add_filter( 'excerpt_more', $this->callback( 'excerpt_more' ) );
		add_filter( 'nav_menu_css_class', $this->callback( 'nav_menu_css_class' ), 10, 4 ); 
		add_filter( 'next_posts_link_attributes', $this->callback( 'nav_link_class' ) );
		add_filter( 'previous_posts_link_attributes', $this->callback( 'nav_link_class' ) );
	}
	
	/**
	 * Get the ID of the page set in reading settings
	 * 
	 * @return int|boolean The page ID in the setting. False, if not set.
	 */
	public function get_id() {
		return (int) get_option( 'page_for_posts', false );
	}
	
	/**
	 * Get the page id for the current language
	 * 
	 * @return int|false|NULL The page id, if exist for the current language. 
	 *                        Null, if the current language is not defined yet.
	 *                        False, otherwise.
	 */
	public function get_current_language_id() {
		return pll_get_post( $this->get_id() );
	}
	
	/**
	 * Get all languages page ids
	 * 
	 * @return array|number|false|NULL
	 */
	public function get_pages_id() {
		if( ! $this->container->get( Polylang::class )->is_active() ) {
			return array();
		}
		
		$pages_id = array();

		if( $main_page_id = $this->get_id() ) {
			$languages = PLL()->links->model->get_languages_list();
			foreach ( $languages as $language ) {
				if( ! empty( $page_id = pll_get_post( $main_page_id, $language->slug ) ) ) {
					$pages_id[] = $page_id;
				}
			}
		}

		return $pages_id;
	}

	/**
	 * Show header just in the home of the blog
	 * 
	 * @return boolean True, if is the home of the blog. False, otherwise.
	 */
	public function display_hero( $display ) {
		if( $this->is_post_list() ) {
			return false;
		}
		
		return $display;
	}
	
	public function display_breadcrumb() {
		return $this->is_post_list();
	}
	
	public function is_post_list() {
		return ( is_home() && 0 < ( get_query_var( 'paged' ) ) ) || is_search() || is_archive();
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
	
	/**
	 * Add current menu item classes for all pages related with the blog
	 * 
	 * @param array     $classes The CSS classes that are applied to the menu item's `<li>` element.
	 * @param \WP_Post  $item    The current menu item.
	 * @param \stdClass $args    An object of wp_nav_menu() arguments.
	 * @param int       $depth   Depth of menu item. Used for padding.
	 * @return array The CSS classes adding current classes if internal blog page.
	 */
	public function nav_menu_css_class( $classes, $item, $args, $depth ) {
		if( ! in_array( $item->object_id, $this->get_pages_id() ) ) {
			return $classes;
		}
		
		if ( ! ( $this->is_post_list() || is_single() ) ) {
			return $classes;
		}

		$classes[] = 'current-menu-item';
		$classes[] = 'current_page_item';
		$classes[] = 'current_page_parent';
		
		return $classes;
	}
}
