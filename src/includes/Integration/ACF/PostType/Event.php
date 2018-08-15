<?php
/**
 * Testimonial class
 *
 * @package WordPress
 * @subpackage AztecWpDevEnv
 * @since 0.1.0
 * @version 0.1.0
 */

namespace Aztec\Integration\ACF\PostType;

use Aztec\Base;

/**
 * Create ACF for event post type
 */
class Event extends Base {

	/**
	 * Event post type condition
	 *
	 * @var array
	 */
	protected $location = array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'event',
			),
		),
	);

	/**
	 * Init.
	 *
	 * @return void
	 */
	public function init() {
		if ( function_exists( 'acf_add_options_page' ) ) {
			add_action( 'acf/include_fields', $this->callback( 'event_fields' ) );
		}
	}

	/**
	 * Add event fields.
	 *
	 * @return void
	 */
	public function event_fields() {
		acf_add_local_field_group( array(
			'key' => 'event',
			'title' => __( 'Event', 'elemarjr' ),
			'fields' => array(
				array(
					'type' => 'text',
					'key' => 'event_name',
					'name' => 'event_name',
					'required' => true,
					'label' => __( 'Name', 'elemarjr' ),
				),
				array(
					'type' => 'date_picker',
					'key' => 'event_start',
					'name' => 'event_start',
					'required' => true,
					'label' => __( 'Start date', 'elemarjr' ),
					'return_format' => 'Y-m-d',
					'wrapper' => array (
						'width' => '50%'
					),
				),
				array(
					'type' => 'date_picker',
					'key' => 'event_end',
					'name' => 'event_end',
					'required' => true,
					'label' => __( 'End date', 'elemarjr' ),
					'return_format' => 'Y-m-d',
					'wrapper' => array (
						'width' => '50%'
					),
				),
				array(
					'type' => 'text',
					'key' => 'event_role',
					'name' => 'event_role',
					'label' => __( 'Role', 'elemarjr' ),
				),
			),
			'location' => $this->location,
		) );
	}
}
