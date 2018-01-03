/**
 * Hero scroll button feature
 */
define([],function () {
	jQuery( '.hero--scroll-button' ).on( 'click', function() {
		jQuery( 'html, body' ).animate( {
			// 62px == .top-header-wrapper__sticky height
			scrollTop: jQuery( window ).height() - 62
		}, 1000);
	} );
} );
