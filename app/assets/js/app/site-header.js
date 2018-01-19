/**
 * Manipulate site header behavior
 */
define([],function () {
	/*
	 * Load the background header
	 */
	var $siteHeader = jQuery( '.site-header' ),
		$topHeader = jQuery( '.top-header-wrapper' ),
		headerStickyClass = 'top-header-wrapper__sticky',
		$body = jQuery( 'body' ),
		bodyStickyClass = 'sticky',
		$heroContainer = $siteHeader.find( '.hero--container' ),
		heroContainerBottom = parseInt( $heroContainer.css( 'bottom' ), 10 );

	if( ! jQuery( 'body' ).hasClass( 'no-hero' ) ) {
		/*
		 * Define the header here and not use height 100vh to sole the problem with
		 * sartphones that change the website area after scroll
		 */
		jQuery( '.site-header, .site-header--wrapper' ).height( jQuery( window ).height() );
	}

	/*
	 * Hide the navigation when open the search
	 */
	jQuery( '.search-toggle' ).on( 'click', function() {
		jQuery( '.main-navigation' ).removeClass( 'toggled' );
	} );

	/*
	 * Hide the search when open the navigation
	 */
	jQuery( '.menu-toggle' ).on( 'click', function() {
		jQuery( '.site-search' ).removeClass( 'toggled' );
	} );

	jQuery( window )
		.on( 'scroll', function() {
			if( jQuery( this ).scrollTop() > 0 ) {
				$body.addClass( bodyStickyClass );
				$topHeader.addClass( headerStickyClass );
			} else {
				$body.removeClass( bodyStickyClass );
				$topHeader.removeClass( headerStickyClass );
			}

			var ymin = 0,
				ymax = $siteHeader.height(),
				scrollPos = jQuery(this).scrollTop();

			if( scrollPos <= ymax ) {
				var normalized = normalize( scrollPos, ymax, ymin );
				$heroContainer.css({
					'bottom': ( heroContainerBottom + ( ( normalized * ymax ) / 4 ) ) + 'px',
					'opacity': 1 - normalized
				});
			}
		})
		.trigger( 'scroll' );

	function normalize( val, max, min ) {
		return ( val - min ) / ( max - min );
	}
});
