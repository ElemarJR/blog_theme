/**
 * Load the background header
 */
define([],function () {
	jQuery( window ).on( 'resize', function() {
		var $body = jQuery('body');

		if( $body.outerHeight() < jQuery( window ).height() ) {
			$body.addClass( 'footer-fixed' );
		} else {
			$body.removeClass( 'footer-fixed' );
		}
	} );
});
