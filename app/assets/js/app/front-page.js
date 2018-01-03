/**
 * Blog page JS functionalities
 *
 * @fixme When resize for a bigger screen the container stay smaller tha the expected
 * @todo Add animation to post list
 */
define( [ 'masonry/masonry' ], function( Masonry ) {
	jQuery( window ).on( 'resize', function() {
		if( jQuery( 'body' ).hasClass( 'home' ) ) {
			masonry = new Masonry( '.post-list', {
				itemSelector: '.post',
				fitWidth: true
			});
		}
	})
});
