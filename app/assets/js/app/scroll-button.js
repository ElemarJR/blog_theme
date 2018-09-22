/**
 * Scroll buttons feature
 */
define([],function () {
	jQuery( '.hero--scroll-button' ).on( 'click', function() {
		scrollTo( window.innerHeight - 60 );
	} );

	jQuery( '.scroll-up' ).on( 'click', function() {
		scrollTo( 0 );
	} );

	jQuery( '.post--comments' ).on( 'click', function() {
		scrollTo( jQuery( '#comments' ).offset().top - 72 ); // 72 = .top-header height + 10
	} );

	function scrollTo( top ) {
		jQuery( 'html, body' ).animate( {
			scrollTop: top
		}, 1000 );
	}
} );
