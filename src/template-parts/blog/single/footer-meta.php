<footer class="entry-footer">
	<div class="entry-footer--tags">
		<strong><?php echo esc_html_e( 'Tags', 'elemarjr' ) ?></strong>
		<?php the_terms( get_the_ID(), 'post_tag', '', '', '' ) ?>
	</div>
	<div class="entry-footer--share addthis_inline_share_toolbox">
		<strong><?php echo esc_html_e( 'Share', 'elemarjr' ) ?></strong>
		<a class="addthis_button_twitter"><i class="i-twitter"></i></a>
		<a class="addthis_button_linkedin"><i class="i-linkedin"></i></a>
		<a class="addthis_button_facebook"><i class="i-facebook"></i></a>
	</div>
</footer>
