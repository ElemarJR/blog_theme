<?php
/**
 * The post social medias.
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

?>
<div class="post--share">
	<div class="post--share-sticky">
		<div class="post--comments">
			<div class="post--comments-count"><?php echo esc_html( get_comments_number() ); ?></div>
			<div class="post--comments-icon">
				<i class="i-comments"></i>
			</div>
		</div>
		<div class="post--social">
			<a class="post--share-item addthis_button_twitter">
				<i class="i-twitter"></i>
			</a>
			<a class="post--share-item addthis_button_linkedin">
				<i class="i-linkedin"></i>
			</a>
			<a class="post--share-item addthis_button_facebook">
				<i class="i-facebook"></i>
			</a>
		</div>
	</div>
</div>
