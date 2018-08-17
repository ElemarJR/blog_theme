<?php
/**
 * Event class
 *
 * @package Aztec
 */

namespace Aztec\PostType;

use Aztec\Base;

/**
 * Manipulate Event post type
 */
class Event extends Base {

	/**
	 * Add hooks
	 */
	public function init() {
		add_action( 'init', $this->callback( 'register_post_type' ) );
	}

	/**
	 * Register post type
	 */
	public function register_post_type() {
		register_post_type( 'event',
			array(
				'hierarchical' => true,
				'labels' => array(
					'name' => __( 'Events', 'elemarjr' ),
					'singular_name' => __( 'Event', 'elemarjr' ),
					'add_new' => _x( 'Add New', 'event', 'elemarjr' ),
					'add_new_item' => __( 'Add New Event', 'elemarjr' ),
					'new_item' => __( 'New Event', 'elemarjr' ),
					'edit_item' => __( 'Edit Event', 'elemarjr' ),
					'view_item' => __( 'View Event', 'elemarjr' ),
					'all_items' => __( 'All Events', 'elemarjr' ),
					'search_items' => __( 'Search Events', 'elemarjr' ),
					'not_found' => __( 'No events found.', 'elemarjr' ),
					'not_found_in_trash' => __( 'No events found in Trash.', 'elemarjr' )
				),
				'show_ui' => true,
				'supports' => array( 'title', 'thumbnail' )
			)
		);
	}

	public function get_events() {
		return get_posts( array(
			'numberposts' => -1,
			'post_type' => 'event',
			'meta_key'	=> 'event_start',
			'orderby'	=> 'meta_value_num',
			'order'		=> 'DESC',
		) );
	}

	public function get_events_by_year() {
		$years = array();

		foreach ($this->get_events() as $event) {
			$start = get_field( 'event_start', $event->ID );

			if ( $start ) {
				$year = date( 'Y', strtotime( $start ) );
				$years[ $year ][] = $event;
			}
		}

		return $years;
	}
}
