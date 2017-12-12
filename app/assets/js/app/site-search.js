/**
 * Handles the search form open/close for small screens.
 */
define(function () {
	var container, button, banner;

	container = document.getElementsByClassName( 'site-search' )[0];
	if ( ! container ) {
		return;
	}

	button = container.getElementsByClassName( 'search-toggle' )[0];
	if ( 'undefined' === typeof button ) {
		return;
	}

	banner = container.getElementsByClassName( 'search-form' )[0];

	banner.setAttribute( 'aria-expanded', 'false' );

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			container.className = container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			banner.setAttribute( 'aria-expanded', 'false' );
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			banner.setAttribute( 'aria-expanded', 'true' );
		}
	};
});
