/**
 * Hero scroll button feature
 */
define([],function () {
	jQuery( '.hero--scroll-button, .scroll-up' ).on( 'click', function() {
		jQuery( 'html, body' ).animate( {
			// 62px == .top-header-wrapper__sticky height
			scrollTop: 0
		}, 1000);
	} );
} );
