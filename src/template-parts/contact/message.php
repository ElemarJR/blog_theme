<?php
/**
 * Contact message.
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

global $container;
?>
<p class="contact--message contact--message__success">
	<?php echo esc_html( $container->get( 'contact.message' ) ); ?>
</p>
