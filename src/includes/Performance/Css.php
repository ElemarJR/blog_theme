<?php
/**
 * Use Google CSS Delivery recomendation
 *
 * This class load the CSS as Google reommend.
 *
 * The content of the theme assets/css/prioritize.css will be loaded inline in
 * the head tag. All another styles files will be loaded inner the
 * `<noscript id="deferred-styles">` tag just before the body close tag.
 *
 * @link https://developers.google.com/speed/docs/insights/OptimizeCSSDelivery#CSSattributes
 * @link https://developers.google.com/speed/docs/insights/PrioritizeVisibleContent
 * @package Aztec
 */

namespace Aztec\Performance;

use Aztec\Base;

/**
 * Manipulate the stylesheets and javascripts
 */
class Css extends Base {

	/**
	 * Add hooks
	 */
	public function init() {
		add_action( 'wp_head', $this->callback( 'prioritized_style' ) );
		add_action( 'wp_footer', $this->callback( 'deferred_styles' ), 9999 );
	}

	/**
	 * Load the prioritize file content inline in the head
	 */
	public function prioritized_style() {
		echo '<style>' . file_get_contents( get_template_directory() . '/assets/css/prioritize.css' ) . '</style>';
	}

	/**
	 * Load theme style using the Google prioritize visible content technique
	 */
	public function deferred_styles() {
		echo '
			<noscript id="deferred-styles">
		      <link rel="stylesheet" type="text/css" href="' . $this->get_style_file_uri() . '?ver=' . wp_get_theme()->get( 'Version' )  . '"/>
		    </noscript>
		    <script>
		      var loadDeferredStyles = function() {
		        var addStylesNode = document.getElementById("deferred-styles");
		        var replacement = document.createElement("div");
		        replacement.innerHTML = addStylesNode.textContent;
		        document.body.appendChild(replacement)
		        addStylesNode.parentElement.removeChild(addStylesNode);
		      };
		      var raf = requestAnimationFrame || mozRequestAnimationFrame ||
		          webkitRequestAnimationFrame || msRequestAnimationFrame;
		      if (raf) raf(function() { window.setTimeout(loadDeferredStyles, 0); });
		      else window.addEventListener(\'load\', loadDeferredStyles);
		    </script>
		';
	}

	/**
	 * Get the theme main style file URI
	 *
	 * @return string The main style file URI.
	 */
	protected function get_style_file_uri() {
		return get_template_directory_uri() . '/assets/css/style.css';
	}
}
