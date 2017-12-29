/**
 * Load the background header
 */
define([],function () {
	var $siteHeader = jQuery('.site-header'),
		bg = $siteHeader.data('bg');

	if( '' !== bg ) {
    	$siteHeader.css('background-image', 'url("' + bg + '")');
	}
});
