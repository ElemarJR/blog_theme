/**
 * Manipulate header to show after load the font
 */
define( [ 'typed.js/lib/typed' ], function ( Typed ) {
	function fade( $element ) {
		$element
			.addClass( 'animated fadeInUp' )
	}

	function typed( $element ) {
		new Typed( $element.get( 0 ), {
			stringsElement: '#typed-strings',
			typeSpeed: 50
		} );
	}

	jQuery( window ).on( 'fontloaded', function() {
		jQuery( '.hero' ).each( function( i, item ) {
			var $item = jQuery( item ).find( '.hero--container' ).show();

			if( jQuery( 'body' ).hasClass( 'about' ) ) {
				typed( $item.find( '.hero--title' ) );
			} else {
				fade( $item );
			}
		} );
	} );
});
