<footer class="entry-footer">
	<div class="entry-footer--tags">
		<strong><?php echo esc_html_e( 'Tags', 'elemarjr' ) ?></strong>
		<?php the_terms( get_the_ID(), 'post_tag', '', '', '' ) ?>
	</div>
</footer>
