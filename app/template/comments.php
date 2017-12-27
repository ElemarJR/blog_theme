<?php
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<div class="comments-area--number">
		<?php
			printf(
				_nx( '1 Comment', '%1$s Comments', get_comments_number(), 'comments title', 'elemarjr' ), 
				number_format_i18n( get_comments_number() )
			);
		?>
	</div>

	<?php
		if ( have_comments() ) :
			the_comments_navigation();
	?>
	<ol class="comment-list">
		<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
				'per_page'   => -1,
				'avatar_size' => 64,
			) );
		?>
	</ol><!-- .comment-list -->

	<?php
			the_comments_navigation();

			// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( ! comments_open() ) : ?>
				<p class="comments-area--number--no-comments"><?php esc_html_e( 'Comments are closed.', 'elemarjr' ); ?></p>
			<?php
			endif;

		endif; // Check for have_comments().

		comment_form();
	?>

</div><!-- #comments -->
