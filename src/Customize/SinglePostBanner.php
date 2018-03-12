<?php
/**
 * SinglePostBanner class
 *
 * @package Aztec
 */

namespace Aztec\Customize;

use Aztec\Base;
use Aztec\Integration\Polylang\Polylang;
use Aztec\Customize\Control\Editor;

/**
 * Integrate customize single post banner with the frontend
 */
class SinglePostBanner extends Base {
	
	protected $slug = 'single_post_banner';
	
	public function init() {
		add_action( 'customize_register', $this->callback( 'customize' ) );
	}
	
	/**
	 *
	 * @param unknown $wp_customize
	 */
	public function customize( \WP_Customize_Manager $wp_customize ) {
		if( ! $this->container->get( Polylang::class )->is_active() ) {
			return $wp_customize;
		}
		
		$section_id = $this->get_theme_mod_section_id();
		$wp_customize->add_section( $section_id, array(
			'title' => __( 'Single Post Banner', 'elemarjr' ),
			'priority' => 200,
		) );
		
		foreach ( PLL()->model->get_languages_list() as $lang ) {
			$title_id = $this->get_theme_mod_control_id( $lang, 'title' );
			$wp_customize->add_setting( $title_id, array(
				'default' => '',
			) );
			$wp_customize->add_control( $title_id, array(
				'label' => sprintf( __( 'Title - (%s)', 'elemarjr' ), $lang->locale ),
				'section' => $section_id,
				'type' => 'text',
			) );
			
			$text_id = $this->get_theme_mod_control_id( $lang, 'text' );
			$wp_customize->add_setting( $text_id, array(
				'default' => '',
			) );
			$wp_customize->add_control( new Editor( $wp_customize, $text_id, array( 
				'label' => sprintf( __( 'Text - (%s)', 'elemarjr' ), $lang->locale ),
				'section' => $section_id,
				'editor_settings' => array(
					'quicktags' => true,
					'tinymce'   => true,
				)
			) ) );
			
			$label_id = $this->get_theme_mod_control_id( $lang, 'label' );
			$wp_customize->add_setting( $label_id, array(
				'default' => '',
			) );
			$wp_customize->add_control( $label_id, array(
				'label' => sprintf( __( 'Label - (%s)', 'elemarjr' ), $lang->locale ),
				'section' => $section_id,
				'type' => 'text',
			) );
			
			$url_id = $this->get_theme_mod_control_id( $lang, 'url' );
			$wp_customize->add_setting( $url_id, array(
				'default' => '',
			) );
			$wp_customize->add_control( $url_id, array(
				'label' => sprintf( __( 'URL - (%s)', 'elemarjr' ), $lang->locale ),
				'section' => $section_id,
				'type' => 'url',
			) );
			
			$background_id = $this->get_theme_mod_control_id( $lang, 'background' );
			$wp_customize->add_setting( $background_id, array(
				'default' => '',
			) );
			$wp_customize->add_control( new \WP_Customize_Image_Control(
				$wp_customize,
				$background_id,
				array(
					'label' => sprintf( __( 'Background Image - (%s)', 'elemarjr' ), $lang->locale ),
					'section'    => $section_id,
					'settings'   => $background_id,
				)
			) );
		}
	}
	
	public function get_theme_mod_section_id() {
		return $this->slug;
	}
	
	public function get_theme_mod_control_id( \PLL_Language $lang, $name ) {
		return $this->get_theme_mod_section_id() . '_' . $lang->slug . '_' . $name;
	}
}
