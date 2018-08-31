<?php
/**
 * Twitter class
 *
 * @package Aztec
 */

namespace Aztec\Shortcode;

use Aztec\Base;

/**
 * Twitter class
 */
class Twitter extends Base {

	/**
	 * Script URL.
	 *
	 * @var string
	 */
	public $base_script_url = 'https://platform.twitter.com/widgets.js';


	/**
	 * Init.
	 */
	public function init() {
		add_shortcode( 'tweet', $this->callback( 'tweetAbout' ) );

		add_action( 'wp_enqueue_scripts', $this->callback( 'enqueue_script' ) );
	}

	/**
	 * Tweet about.
	 *
	 * @param  string $atts Atts.
	 * @param  string $content The content.
	 * @return string
	 */
	public function tweetAbout( $atts, $content = null ) {
		$url = "https://twitter.com/intent/tweet?text={$content}&url=" . home_url( '/?p=' . get_the_ID() ) . '&via=elemarjr';

		return '<a href="' . esc_url( $url ) . '">' . $content . '<i class="i-twitter"></i></a>';
	}

	/**
	 * Add script.
	 */
	public function enqueue_script() {
		wp_enqueue_script( 'twitterwidget', $this->base_script_url, array(), false, true );
	}
}
