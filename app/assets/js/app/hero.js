/**
 * Manipulate header to show after load the font
 */
define( [ 'typed.js/lib/typed' ], function ( Typed ) {
	function fade( $element ) {
		$element
			.addClass( 'animated fadeInUp' )
			.one( 'webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function() {
				jQuery( this ).removeClass( 'animated fadeInUp' );
			});
	}

	function typed( $element ) {
		new Typed( $element.get( 0 ), {
			stringsElement: '#typed-strings',
			typeSpeed: 50
		} );
	}

	jQuery( window )
		.on( 'fontloaded', function() {
			jQuery( '.hero' ).each( function( i, item ) {
				var $item = jQuery( item ).find( '.hero--container' ).show();

				if( jQuery( 'body' ).hasClass( 'about' ) ) {
					typed( $item.find( '.hero--title' ) );
				} else {
					fade( $item );
				}
			} );
		} )
		.on( 'resize', function() {
			var $heroContainer = jQuery( '.hero--container' ),
				topHeaderHeight = jQuery( '.top-header-wrapper' ).outerHeight(),
				vOffset = 50,
				heroContainerHeight = $heroContainer.height(),
				heroBottomSpace = parseInt( $heroContainer.css( 'bottom' ), 10 ),
				minSiteHeaderHeight = topHeaderHeight + heroContainerHeight + heroBottomSpace;

			if( jQuery( this ).height() < minSiteHeaderHeight ) {
				jQuery( '.site-header--wrapper, .site-header, .hero--wrapper, .hero' )
					.css( {
						'height' : 'auto',
						'position' : 'static'
					} );
				jQuery( '.site-header')
					.find( '.mouse' )
						.hide();

				// disable paralax and reset its effect
				jQuery( '.site-header' ).removeClass( 'site-header__parallax' );
				$heroContainer.css( {
					'bottom' : 0,
					'opacity' : 1,
					'padding-bottom' : vOffset,
					'padding-top' : topHeaderHeight + vOffset,
					'position' : 'static'
				} );
			}
		} );
});
