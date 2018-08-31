<?php
/**
 * The post content.
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

?>
<div class="post--content">
	<?php
		the_content();

		wp_link_pages(
			array(
				'next_or_number' => 'next',
				'before'         => '<div class="posts-nav">',
				'after'          => '</div>',
			)
		);
		?>
</div>
