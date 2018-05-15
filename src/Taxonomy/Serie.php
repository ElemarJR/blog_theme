<?php
/**
 * Serie taxonomy
 *
 * @package Aztec
 */

namespace Aztec\Taxonomy;

use Aztec\Base;

/**
 * Manipulate Testimonial post type
 */
class Serie extends Base {

	/**
	 * Add hooks
	 */
	public function init() {
		add_action( 'init', $this->callback( 'register_taxonomy' ) );
	}

	/**
	 * Register post type
	 */
	public function register_taxonomy() {
		register_taxonomy( 'serie', 'post',
			array(
				'label' => __( 'Series', 'elemarjr' ),
				'labels' => array(
					'name' => __( 'Series', 'elemarjr' ),
					'singular_name' => __( 'Serie', 'elemarjr' ),
					'all_items' => __( 'All Series', 'elemarjr' ),
					'edit_item' => __( 'Edit Serie', 'elemarjr' ),
					'view_item' => __( 'View Serie', 'elemarjr' ),
					'update_item' => __( 'Update Serie', 'elemarjr' ),
					'add_new_item' => __( 'Add New Serie', 'elemarjr' ),
					'new_item_name' => __( 'New Serie Name', 'elemarjr' ),
					'parent_item' => __( 'Parent Serie', 'elemarjr' ),
					'parent_item_colon' => __( 'Parent Serie:', 'elemarjr' ),
					'search_items' => __( 'Search Series', 'elemarjr' ),
					'popular_series' => __( 'Popular Series', 'elemarjr' ),
					'not_found' => __( 'No series found.', 'elemarjr' ),
				),
				'public' => true,
			)
		);
	}
}
