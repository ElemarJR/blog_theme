<?php
/**
 * The post footer.
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

?>
<footer class="post--footer">
	<div class="post--tags">
		<strong><?php echo esc_html_e( 'Tags', 'elemarjr' ); ?></strong>
		<?php the_terms( get_the_ID(), 'post_tag', '', '', '' ); ?>
	</div>
</footer>
