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
	 * Slug name.
	 *
	 * @var string
	 */
	private $slug = 'serie';

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
		register_taxonomy(
			$this->slug, 'post',
			array(
				'hierarchical' => true,
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

	/**
	 * Get the serie term link
	 *
	 * @param \WP_Term $serie The term.
	 * @return string|\WP_Error HTML link to taxonomy term archive on success, WP_Error if term does not exist.
	 */
	public function get_serie_link( \WP_Term $serie ) {
		return get_term_link( $serie, $this->slug );
	}

	/**
	 * Get series from a post
	 *
	 * @see get_the_terms()
	 *
	 * @param int|object $post Post ID or object.
	 * @return array|false|\WP_Error Array of WP_Term objects on success, false if there are no terms
	 *                               or the post does not exist, WP_Error on failure.
	 */
	public function get_post_terms( $post ) {
		return get_the_terms( $post, $this->slug );
	}

	/**
	 * Get all posts from a taxonomy term
	 *
	 * @param \WP_Term $serie The posts from the term.
	 * @return \WP_Post[] The serie posts.
	 */
	public function get_serie_posts( \WP_Term $serie ) {
		$query = new \WP_Query(
			array(
			'nopaging'  => true,
			'post_type' => 'post',
			'tax_query' => array(
				array(
					'taxonomy' => $this->slug,
					'terms' => array( $serie->term_id ),
				)
			 ),
			)
		);

		return $query->posts;
	}
}
