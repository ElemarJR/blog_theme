<?php
global $container;
?>
<p class="contact--message contact--message__error">
	<?php echo esc_html( $container->get( 'contact.message' ) ); ?>
</p>
