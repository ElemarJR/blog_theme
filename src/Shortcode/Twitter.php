<?php

namespace Aztec\Shortcode;

use Aztec\Base;


/**
*
*/
class Twitter extends Base {

	public $base_script_url = 'https://platform.twitter.com/widgets.js';


	public function init() {
		add_shortcode( 'tweet', $this->callback( 'tweetAbout' ) );

		add_action( 'wp_enqueue_scripts', $this->callback( 'enqueue_script' ) );
	}

	function tweetAbout( $atts, $content = null ) {

		$url = "https://twitter.com/intent/tweet?text={$content}&url=".home_url( '/?p=' . get_the_ID() ). "&via=elemarjr";
		return '<a href="' . esc_url( $url ) . '">' . $content . '</a>';
	}

	public function enqueue_script() {
		wp_enqueue_script( 'twitterwidget', $this->base_script_url, array(), false, true );
	}
}