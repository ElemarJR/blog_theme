/**
 * Predecessor row about class
 */
define([],function () {
	jQuery( '.about--row__image-top' ).prev().addClass( 'about--row__image-top__before' );
	jQuery( '.about--row__image-bottom' ).next().addClass( 'about--row__image-top__after' );
});
