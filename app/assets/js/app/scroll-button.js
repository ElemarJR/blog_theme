/**
 * Hero scroll button feature
 */
define([],function () {
	jQuery( '.hero--scroll-button, .scroll-up' ).on( 'click', function() {
		jQuery( 'html, body' ).animate( {
			scrollTop: window.innerHeight - 60
		}, 1000 );
	} );
} );
