<?php
/**
 * SinglePostBanner class
 *
 * @package Aztec
 */

namespace Aztec\Customize;

use Aztec\Base;
use Aztec\Integration\Polylang\Polylang;
use Aztec\Setup\Thumbnail;
use Aztec\Customize\Control\Editor;

/**
 * Integrate customize single post banner with the frontend
 */
class Newsletter extends Base {

	protected $slug = 'newsletter';

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
			'title' => __( 'Newletter Form', 'elemarjr' ),
			'priority' => 190,
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
		}
	}

	public function get_theme_mod_section_id() {
		return $this->slug;
	}

	public function get_theme_mod_control_id( \PLL_Language $lang, $name ) {
		return $this->get_theme_mod_section_id() . '_' . $lang->slug . '_' . $name;
	}

	public function get_background_images( $lang ) {
		$bg_url = get_theme_mod( $this->get_theme_mod_control_id( $lang, 'background' ) );
		$bg_id = attachment_url_to_postid( $bg_url );
		$image_sizes = $this->container->get( Thumbnail::class )->post_single_banner_image_sizes;
		$images_urls = array();

		foreach ( $image_sizes as $size ) {
			$images_urls[ $size['size'] ] = wp_get_attachment_image_url( $bg_id, $size['name'] );
		}

		return $images_urls;
	}
}
