<h1 id="typed-strings" class="hero--typed">
	<?php echo wp_kses_post( apply_filters( 'the_content', get_post_meta( get_the_ID(), 'hero_text', true ) ) ) ?>
</h1>
<div class="hero--title"></div>
