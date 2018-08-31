<?php
/**
 * Hero page.
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

use Aztec\Pages\Blog;

global $container;

$page_id = get_the_ID();
if ( ! is_page_template( 'default' ) ) {
	$page_id = $container->get( Blog::class )->get_current_language_id();
}

?>
<h1 class="hero--title"><?php echo esc_html( get_post_meta( $page_id, 'hero_title', true ) ); ?></h1>
<h2 class="hero--subtitle"><?php echo esc_html( get_post_meta( $page_id, 'hero_subtitle', true ) ); ?></h2>
<p class="hero--description">
	<?php echo wp_kses_post( get_post_meta( $page_id, 'hero_text', true ) ); ?>
</p>
