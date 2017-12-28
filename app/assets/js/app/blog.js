/**
 * Blog page JS functionalities
 */
define(['masonry/masonry'],function (Masonry) {
	if( jQuery('body').hasClass('blog') || jQuery('body').hasClass('archive') ) {
	    new Masonry( '.post-list', {
			itemSelector: '.post'
		});
	}
});
