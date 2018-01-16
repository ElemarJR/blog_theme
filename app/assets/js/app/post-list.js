/**
 * Blog page JS functionalities
 *
 * @fixme When resize for a bigger screen the container stay smaller tha the expected
 * @todo Add animation to post list
 */
define( [ 'masonry/masonry', 'imagesloaded/imagesloaded' ], function( Masonry ) {
	jQuery( '.post-list' ).each( function( i,item ) {
		jQuery( item ).imagesLoaded()
			.done(function( instance ) {
				var $this = jQuery( instance.elements[0] );

				$this
					.css({
						'display': 'block',
						'visibility' : 'hidden'
					});

				if( jQuery( item ).children().length > 3 ) {
					new Masonry( instance.elements[0], {
						itemSelector: '.post',
						fitWidth: true
					});
				}

				$this
					.css('visibility', 'visible')
					.addClass('animated fadeInUpBig')
					.siblings('.post-list--loading')
						.addClass('animated fadeOutDown')
						.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
							jQuery( this ).hide();
						});

				jQuery( window ).trigger( 'resize' );
			});
	});
});
