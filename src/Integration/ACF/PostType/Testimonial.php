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

/**
 * Create ACF for testimonial post type
 */
class Testimonial {
	
	/**
	 * Testimonial post type condition
	 *
	 * @var array
	 */
	protected $location = array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'testimonial',
			),
		),
	);
	
	/**
	 * Init on container
	 */
	public function init() {
		if ( function_exists( 'acf_add_options_page' ) ) {
			$this->testimonial_fields();
		}
	}
	
	/**
	 * Add Hero custom fields
	 */
	public function testimonial_fields() {
		acf_add_local_field_group( array(
			'key' => 'testimonial',
			'title' => __( 'Testimonial', 'elemarjr' ),
			'fields' => array(
				array(
					'type' => 'text',
					'key' => 'testimonial_position',
					'name' => 'testimonial_position',
					'label' => __( 'Position', 'elemarjr' ),
				),
				array(
					'type' => 'image',
					'key' => 'testimonial_photo',
					'name' => 'testimonial_photo',
					'label' => __( 'Photo', 'elemarjr' ),
				),
				array(
					'type' => 'image',
					'key' => 'testimonial_logo',
					'name' => 'testimonial_logo',
					'label' => __( 'Company Logo', 'elemarjr' ),
				),
			),
			'location' => $this->location,
		) );
	}
}
