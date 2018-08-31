<?php
/**
 * Contact class
 *
 * @package Aztec
 */

namespace Aztec\Form;

use DI\Container;
use Aztec\Integration\Polylang\Polylang;

/**
 * Contact form
 */
class Contact extends Form {

	/**
	 * Define form slug and fields
	 *
	 * @param Container $container The dependency injection container.
	 */
	public function __construct( Container $container ) {
		parent::__construct( $container );

		$this->slug = 'contact';
	}

	/**
	 * Init.
	 */
	public function init() {
		add_action( 'customize_register', $this->callback( 'customize' ) );
		add_action( 'init', $this->callback( 'set_fields' ) );
	}

	/**
	 * Set fields.
	 */
	public function set_fields() {
		$this->fields = array(
			'name' => __( 'Name' ),
			'email' => __( 'Email' ),
			'message' => array(
				'label' => __( 'Your Message', 'elemarjr' ),
				'type' => 'textarea',
			),
		);
	}

	/**
	 * Customize.
	 *
	 * @param  \WP_Customize_Manager $wp_customize WP Customize instance.
	 * @return \WP_Customize_Manager|void
	 */
	public function customize( \WP_Customize_Manager $wp_customize ) {
		if ( ! $this->container->get( Polylang::class )->is_active() ) {
			return $wp_customize;
		}

		$section_id = $this->get_theme_mod_section_id();
		$wp_customize->add_section(
			$section_id, array(
			'title' => __( 'Contact', 'elemarjr' ),
			'priority' => 190,
			)
		);

		foreach ( PLL()->model->get_languages_list() as $lang ) {
			$email_id = $section_id . '_' . $lang->slug . '_email';
			$wp_customize->add_setting(
				$email_id, array(
				'default' => '',
				)
			);
			$wp_customize->add_control(
				$email_id, array(
				'label' => sprintf( __( 'Email that receive the contact - (%s)', 'elemarjr' ), $lang->locale ),
				'section' => $section_id,
				'type' => 'text',
				)
			);

			$subject_id = $section_id . '_' . $lang->slug . '_subject';
			$wp_customize->add_setting(
				$subject_id, array(
				'default' => '',
				)
			);
			$wp_customize->add_control(
				$subject_id, array(
				'label' => sprintf( __( 'Email subject - (%s)', 'elemarjr' ), $lang->locale ),
				'section' => $section_id,
				'type' => 'text',
				)
			);
		}
	}

	/**
	 * Get mod section id.
	 */
	public function get_theme_mod_section_id() {
		return $this->slug;
	}

	/**
	 * Get mod control id.
	 *
	 * @param  \PLL_Language $lang The language.
	 * @param  string        $name The control name.
	 * @return string
	 */
	public function get_theme_mod_control_id( \PLL_Language $lang, $name ) {
		return $this->get_theme_mod_section_id() . '_' . $lang->slug . '_' . $name;
	}

	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Aztec\Form\Form::spam_parameters()
	 */
	public function spam_parameters() {
		$params = parent::spam_parameters();
		$values = $this->get_values();

		$params['comment_author']       = $values['name'];
		$params['comment_author_email'] = $values['email'];
		$params['comment_content']      = $values['message'];

		return $params;
	}
}
