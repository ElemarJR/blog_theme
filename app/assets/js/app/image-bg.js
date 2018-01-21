/**
 * Load background image to site header ou site content, if exists
 */
define([],function () {
	var $maybeBg = jQuery( '.site-header, .site-content' );

	jQuery( window )
		.on( 'resize', function() {
			$maybeBg.each(function( i, item ) {
				var $item = jQuery( item ),
					bg = $item.data( 'bg-header-sm' );

				if( 'undefined' === typeof bg ) {
					return true;
				}

				if( jQuery( this ).width() >= 768 ) {
					bg = $item.data( 'bg-header-lg' );
				} else if( jQuery( this ).width() >= 480 ) {
					bg = $item.data( 'bg-header-md' );
				}

				$item.css( 'background-image', 'url("' + bg + '")' );
			});
		} );
});
