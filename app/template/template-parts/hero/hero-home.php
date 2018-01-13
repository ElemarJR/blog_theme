<h1 class="hero--title"><?php echo esc_html( get_post_meta( get_the_ID(), 'hero_title', true ) ) ?></h1>
<p class="hero--description"><?php echo wp_kses_post( get_post_meta( get_the_ID(), 'hero_text', true ) ) ?></p>
<a href="<?php echo esc_url( get_post_meta( get_the_ID(), 'hero_button_url', true ) ) ?>" class="hero--button button button__bordered">
	<?php echo esc_html( get_post_meta( get_the_ID(), 'hero_button_label', true ) ) ?>
</a>
