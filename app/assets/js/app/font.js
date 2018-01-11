/**
 * Load website fonts
 */
define(['webfontloader/webfontloader'],function (WebFont) {
	WebFont.load({
		google: {
			families: ['Open Sans:300,700']
		},
		active: function() {
			jQuery( window ).trigger( 'fontloaded' );
		}
	});
});
