<?php 
global $container;
?>
<p class="contact--message contact--message__success">
	<?php echo esc_html( $container->get( 'contact.message' ) ); ?>
</p>
