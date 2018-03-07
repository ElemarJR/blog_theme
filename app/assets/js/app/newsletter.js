/**
 * Newsletter form
 */
define( [], function () {
	/**
	 * Add class in the checkbox label to style it and ckeck all checkbox
	 */
	jQuery( '.newsletter--check' )
		.on( 'click', function() {
			jQuery( this ).parents( 'label' ).toggleClass( 'interes--selected' );
		} )
		.trigger( 'click' );

	/**
	 * Validate the form if have at least on interest checkbox checked
	 */
	jQuery( '.newsletter--form' ).on( 'submit', function() {
		var $form = jQuery( this );

		if ( 0 === $form.find( '.newsletter--check:checked' ).length ) {
			$form.find( '.newsletter--check-validation-message' ).show();
			return false;
		}

		$form.find( '.newsletter--check-validation-message' ).hide();
	} );
});
