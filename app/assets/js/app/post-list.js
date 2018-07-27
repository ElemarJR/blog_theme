/**
 * Blog page JS functionalities
 *
 * @fixme When resize for a bigger screen the container stay smaller tha the expected
 * @todo Add animation to post list
 */
define( [ 'app/is-touch', 'imagesloaded/imagesloaded' ], function(isTouch) {
	jQuery( '.post-list' ).each( function( i,item ) {
		jQuery( item ).imagesLoaded({ background: true })
			.always( function() {
				jQuery( item )
					.addClass( 'post-list--loaded animated fadeInUpBig' )
					.siblings( '.post-list--loading' )
						.addClass( 'animated fadeOutDown' )
						.one( 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
							jQuery( this ).hide();
							jQuery( window ).trigger( 'resize' ); // trigger resize to adjust the footer
						});
			});
	});

	if ( isTouch ) {
		jQuery( 'body' ).addClass( 'has-touch' );		
	}
});
