<?php
/**
 * Hero home.
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

?>
<h1 class="hero--title"><?php echo wp_kses_post( get_post_meta( get_the_ID(), 'hero_title', true ) ); ?></h1>
<p class="hero--description"><?php echo wp_kses_post( get_post_meta( get_the_ID(), 'hero_text', true ) ); ?></p>
<a href="<?php echo esc_url( get_post_meta( get_the_ID(), 'hero_button_url', true ) ); ?>" class="hero--button button button__bordered button__white">
	<?php echo esc_html( get_post_meta( get_the_ID(), 'hero_button_label', true ) ); ?>
</a>
