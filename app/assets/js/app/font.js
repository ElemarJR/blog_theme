/**
 * Load website fonts
 */
define(['webfontloader/webfontloader'],function (WebFont) {
	WebFont.load({
		google: {
			families: ['Open Sans:300,400,600,700']
		},
		active: triggerLoaded,
		inactive: triggerLoaded
	});

	function triggerLoaded() {
		jQuery( window ).trigger( 'fontloaded' );
	}
});
