/**
 * Blog page JS functionalities
 *
 * @fixme When resize for a bigger screen the container stay smaller tha the expected
 * @todo Add animation to post list
 */
define( [ 'masonry/masonry', 'imagesloaded/imagesloaded' ], function( Masonry ) {
	var $postList = jQuery( '.post-list' );

	if( $postList.length > 0 ) {
		jQuery( window ).on( 'resize', function() {
			$postList.imagesLoaded()
				.done(function( instance ) {
					var $this = jQuery( instance.elements[0] );
					$this
						.css({
							'display': 'block',
							'visibility' : 'hidden'
						});

					var masonry = new Masonry( instance.elements[0], {
						itemSelector: '.post',
						fitWidth: true
					});

					masonry.on( 'layoutComplete', function(msnryInstance, laidOutItems) {
						$this
							.css('visibility', 'visible')
							.addClass('animated fadeInUpBig')
							.siblings('.post-list--loading')
								.addClass('animated fadeOutDown')
								.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
									jQuery( this ).hide();
								});
					});

					masonry.layout();
				});
		});
	}
});
