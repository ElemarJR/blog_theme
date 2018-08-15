define( [ 'imagesloaded/imagesloaded' ], function() {
	jQuery( '.gallery--item' ).each( function( i, item ) {
		jQuery( item ).imagesLoaded()
			.always( function() {
				console.log( 'aqui' );
				jQuery( item )
					.addClass( 'gallery--item--loaded animated fadeInUpBig' )
					.siblings( '.gallery--item--loading' )
						.addClass( 'animated fadeOutDown' )
						.one( 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
							jQuery( this ).hide();
							jQuery( window ).trigger( 'resize' );
						});
			});
	});

	jQuery( '.gallery--load-button .button' ).click(function( e ) {
		jQuery( '.gallery--item:hidden:lt(4)' ).fadeIn();

		if ( jQuery( '.gallery--item:hidden' ).length === 0 ) {
			jQuery( this ).parent().fadeOut();
		}

		e.preventDefault();
	});
});