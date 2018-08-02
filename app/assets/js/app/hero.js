/**
 * Manipulate header to show after load the font
 */
define( [ 'typed.js/lib/typed' ], function ( Typed ) {
	function fade( $element, callback ) {
		$element
			.addClass( 'animated fadeInUp' )
			.one( 'webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function() {
				jQuery( this ).removeClass( 'animated fadeInUp' );
				callback.call();
			});
	}

	function typed( $element, callback ) {
		new Typed( $element.get( 0 ), {
			stringsElement: '#typed-strings',
			typeSpeed: 50
		} );
		callback.call();
	}

	function updateHeroContainer() {
		//
	}

	jQuery( window )
		.on( 'fontloaded', function() {
			jQuery( '.hero' ).each( function( i, item ) {
				var $item = jQuery( item ).find( '.hero--container' ).show();

				if( jQuery( 'body' ).hasClass( 'about' ) ) {
					typed( $item.find( '.hero--title' ), updateHeroContainer );
				} else {
					fade( $item, updateHeroContainer );
				}
			} );
		} )
		.on( 'resize', function() {
			updateHeroContainer();
		} );
});
