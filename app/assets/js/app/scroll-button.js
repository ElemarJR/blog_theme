/**
 * Hero scroll button feature
 */
define([],function () {
	jQuery( '.hero--scroll-button' ).on( 'click', function() {
		scrollTo( window.innerHeight - 60 );
	} );

	jQuery( '.scroll-up' ).on( 'click', function() {
		scrollTo( 0 );
	} );

	function scrollTo( top ) {
		jQuery( 'html, body' ).animate( {
			scrollTop: top
		}, 1000 );
	}
} );
