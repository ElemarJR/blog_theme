/**
 * Load background image to site header, site content and contact banner, if exists
 */
define([],function () {
	var $maybeBg = jQuery( '.post--image, .site-header--image, .site-content, .banner-contact' );

	jQuery( window )
		.on( 'resize', function() {
			$maybeBg.each(function( i, item ) {
				var $item = jQuery( item ),
					bg = $item.data( 'bg-sm' );

				if( 'undefined' === typeof bg ) {
					return true;
				}

				if( jQuery( this ).width() >= 768 ) {
					bg = $item.data( 'bg-lg' );
				} else if( jQuery( this ).width() >= 480 ) {
					bg = $item.data( 'bg-md' );
				}

				$item.css( 'background-image', 'url("' + bg + '")' );
			});
		} );
});
