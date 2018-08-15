<?php

global $container;

?>

<div class="posts-nav-link">

<?php

if( $previous_post = get_adjacent_post( false, '', true ) ) {
	$image_url = get_the_post_thumbnail_url( $previous_post->ID, 'post-nav' );
	$title = get_the_title( $previous_post->ID );
	$post_link = get_permalink( $previous_post->ID );

?>
	<div class="posts-nav-link--previous">
		<div class="posts-nav-link--thumb">
			<a class="link-previous" href="<?php echo esc_url( $post_link ); ?>" title="">
				<i class="i-arrow-left"></i>
				<span><?php esc_html_e( 'Previous', 'elemarjr' ) ?></span>
			</a>
			<img class="posts-nav-link--img" src="<?php echo esc_url( $image_url ); ?>" alt="">
		</div>
		<div class="posts-nav-link--info">
			<p class="posts-nav-link--cursor"><?php esc_html_e( 'Previous', 'elemarjr' ); ?></p>
			<p class="posts-nav-link--title"><?php echo esc_html( $title ) ?></p>
		</div>
	</div>

<?php

}

if( $next_post = get_adjacent_post( false, '', false ) ) {
	$image_url = get_the_post_thumbnail_url( $next_post->ID, 'post-nav' );
	$title = get_the_title( $next_post->ID );
	$post_link = get_permalink( $next_post->ID );
?>

	<div class="posts-nav-link--next">
		<div class="posts-nav-link--info">
			<p class="posts-nav-link--cursor"><?php esc_html_e( 'Next', 'elemarjr' ) ?></p>
			<p class="posts-nav-link--title"><?php echo esc_html( $title ) ?></p>
		</div>
		<div class="posts-nav-link--thumb">
			<img class="posts-nav-link--img" src="<?php echo esc_url( $image_url ); ?>" alt="">
			<a class="link-next" href="<?php echo $post_link; ?>" title="">
				<span><?php esc_html_e( 'Next', 'elemarjr' ) ?></span>
				<i class="i-arrow-right"></i>
			</a>
		</div>
	</div>

<?php

}

?>

</div>