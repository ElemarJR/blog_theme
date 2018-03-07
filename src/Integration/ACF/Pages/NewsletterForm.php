<?php
/**
 * Create ACF for newsletter form
 *
 * @package WordPress
 * @subpackage AztecWpDevEnv
 * @since 0.1.0
 * @version 0.1.0
 */

namespace Aztec\Integration\ACF\Pages;

/**
 * Disable features to newsletter form page
 */
class NewsletterForm {

	/**
	 * Newsletter form location
	 *
	 * @var array
	 */
	protected $location = array(
		array(
			array(
				'param' => 'post_template',
				'operator' => '==',
				'value' => 'page-templates/newsletter-form.php',
			),
		),
	);

	/**
	 * Init on container
	 */
	public function init() {
		if ( function_exists( 'acf_add_options_page' ) ) {
			$this->deactivate_features();
		}
	}
	
	/**
	 * Deactivate the content 
	 */
	public function deactivate_features() {
		acf_add_local_field_group( array(
			'key' => 'newsletter_form_page',
			'title' => __( 'Newsletter Form', 'elemarjr' ),
			'hide_on_screen' => array( 'the_content', 'featured_image' ),
			'location' => $this->location,
		) );
	}
}
