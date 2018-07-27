<footer class="post--footer">
	<div class="post--tags">
		<strong><?php echo esc_html_e( 'Tags', 'elemarjr' ) ?></strong>
		<?php the_terms( get_the_ID(), 'post_tag', '', '', '' ) ?>
	</div>
</footer>
