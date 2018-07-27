/**
 * Check if client device has touch.
 */
define( [], function () {
	return ('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch;
});

