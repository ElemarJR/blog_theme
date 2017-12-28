<?php
/**
 * Template helper class
 *
 * @package Aztec
 */

namespace Aztec\Helper;

/**
 * Manipulate the stylesheets and javascripts
 */
class Template {

	/**
	 * Get the template plart that must be loaded in hero area
	 * 
	 * @return string The template. Default: (empty string)
	 */
	public function get_hero_template() {
		if( is_single() ) {
			return 'single';
		}
		
		if( is_page_template() ) {
			// return the name of the file template, without the extension
			return $this->get_template_name();
		}
		
		if( is_front_page() ) {
			return 'front-page';
		}
		
		return 'blog';
	}
	
	/**
	 * Get template name without file path inner the theme and extension
	 * 
 	 * @param int|\WP_Post $post Optional. Post ID or WP_Post object. Default is global $post.
	 * @return string|false Template name. Returns an empty string when the default page template
 	 * 	is in use. Returns false if the post does not exist. 
	 */
	public function get_template_name( $post = null ) {
		if( ! $slug = get_page_template_slug( $post ) ) {
			return $slug;
		}
		
		return pathinfo( $slug, PATHINFO_FILENAME );
	}
}
