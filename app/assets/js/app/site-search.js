/**
 * Handles the search form open/close for small screens.
 */
define(function () {
	var container, button, closeButton, close, open;

	var toggleClass = 'top-header__searchable';

	container = document.getElementsByClassName( 'top-header--collapse' )[0];
	if ( ! container ) {
		return;
	}

	button = container.getElementsByClassName( 'search-toggle' )[0];
	if ( 'undefined' === typeof button ) {
		return;
	}

	closeButton = container.getElementsByClassName( 'search-close' )[0];

	close = function() {
		container.classList.remove( 'top-header__searchable' );
		button.setAttribute( 'aria-expanded', 'false' );
	};

	open = function() {
		container.classList.add( toggleClass );
		button.setAttribute( 'aria-expanded', 'true' );
		container.querySelector( 'input[type="search"]' ).focus();
	};

	closeButton.onclick = function( evt ) {
		close();

		evt.preventDefault();
	};

	button.onclick = function( evt ) {
		if ( -1 !== container.classList.contains( 'top-header__searchable' ) ) {
			open();
		} else {
			close();
		}

		evt.preventDefault();
	};

	document.onkeydown = function( evt ) {
		evt = evt || window.event;
		if ( 27 === evt.keyCode ) {
			if ( container.classList.contains( toggleClass ) ) {
				close();
			}
		}
	};
});
