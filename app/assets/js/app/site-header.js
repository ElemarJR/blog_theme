/**
 * Load the background header
 */
define([],function () {
	$siteHeader = jQuery('.site-header');
    $siteHeader.css('background-image', 'url("' + $siteHeader.data('bg') + '")');
});
