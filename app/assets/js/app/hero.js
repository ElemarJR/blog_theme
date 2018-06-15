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

	function heroContainerHeight() {
		return jQuery( '.hero--container' ).outerHeight();
	}

	function updateHeroContainer() {
		var $heroContainer = jQuery( '.hero--container' ),
			topHeaderHeight = jQuery( '.top-header-wrapper' ).outerHeight(),
			vOffset = 50,
			heroBottomSpace = parseInt( $heroContainer.css( 'bottom' ), 10 ),
			minSiteHeaderHeight = topHeaderHeight + heroContainerHeight() + heroBottomSpace;

		if( jQuery( this ).height() < minSiteHeaderHeight ) {
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

			jQuery( '.site-header--wrapper, .site-header, .hero--wrapper, .hero' )
				.css( {
					'height' : heroContainerHeight() + 'px',
					'position' : 'relative'
				} );
		}
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
