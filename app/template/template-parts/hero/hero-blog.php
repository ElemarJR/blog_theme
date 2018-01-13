<?php 

use Aztec\Pages\Blog;

global $container;

$blog_page_id = $container->get( Blog::class )->get_current_language_id();

?>
<h1 class="hero--title"><?php echo esc_html( get_post_meta( $blog_page_id, 'hero_title', true ) ) ?></h1>
<h2 class="hero--subtitle"><?php echo esc_html( get_post_meta( $blog_page_id, 'hero_subtitle', true ) ) ?></h2>
<p class="hero--description">
	<?php echo wp_kses_post( get_post_meta( $blog_page_id, 'hero_text', true ) ) ?>
</p>
