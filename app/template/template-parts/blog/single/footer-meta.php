<footer class="entry-footer">
	<div class="entry-footer--tags">
		<strong><?php echo esc_html_e( 'Tags', 'elemarjr' ) ?></strong>
		<?php the_terms( get_the_ID(), 'post_tag', '', '', '' ) ?>
	</div>
	<?php // @todo Add share links ?>
	<div class="entry-footer--share">
		<strong><?php echo esc_html_e( 'Share', 'elemarjr' ) ?></strong>
		<a href="#" class="i-twitter"></a>
		<a href="#" class="i-linkedin"></a>
		<a href="#" class="i-facebook"></a>
	</div>
</footer>
