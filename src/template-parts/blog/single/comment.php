<?php

global $container;

$data = $container->get( 'comment_template' );
$args = $data['args'];
$depth = $data['depth'];
$comment = $data['comment'];

if ( 'div' == $args['style'] ) {
	$tag = 'div';
	$add_below = 'comment';
} else {
	$tag = 'li';
	$add_below = 'div-comment';
}
?>

<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $comment->has_children ? 'parent' : '', $comment ); ?>">
	<div class="comment--avatar">
		<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
	</div>
	<div class="comment--meta">
		<h5 class="comment--meta-author">
			<?php echo get_comment_author_link( $comment ); ?>
		</h5>
		<time class="comment--meta-date">
			<?php printf( __( '%1$s at %2$s' ), get_comment_date( '', $comment ),  get_comment_time() ); ?>
		</time>
	</div>
	<div class="comment--content">
		<div class="comment--text">
			<?php comment_text( $comment, array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div>
		<div class="comment--action">
			<?php
				comment_reply_link( array_merge( $args, array(
					'add_below' => $add_below,
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
					'before'    => '<div class="reply">',
					'after'     => '</div>'
				) ) );
			?>
		</div>
	</div>
</<<?php echo $tag; ?>>
