/**
 * Load the background header
 */
define([],function () {
	jQuery( window ).on( 'resize', function() {
		footerPosition();
	} );

	function footerPosition() {
		var $window = jQuery( window ),
			$body = jQuery( 'body' ),
			$siteContent = jQuery( '.site-content' ),
			$footer = jQuery( '.site-footer' ),
			windowHeight = $window.height();

		if( $body.outerHeight() < windowHeight ) {
			$body.addClass( 'footer-fixed' );
			$siteContent.css( 'height', windowHeight - $footer.outerHeight() );
		} else {
			$body.removeClass( 'footer-fixed' );
			$siteContent.css( 'height', 'auto' );
		}
	}

	/**
	 * Firefox BUGFIX
	 *
	 * The body didn't get the right height sometimes
	 */
	setTimeout(footerPosition, 1000);
});
