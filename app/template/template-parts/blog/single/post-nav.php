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
	<a class="link-previous" href="<?php echo $post_link; ?>" title="">
		<i class="i-arrow-left"></i>
		Anterior
	</a>

	<a class="posts-nav-link--previous" href="<?php echo $post_link; ?>" title="">
		<img class="posts-nav-img" src="<?php echo $image_url; ?>" alt="">
		<div class="posts-nav-title-wrapper">
			<p class="posts-nav-title"><?php echo $title ?></p>
			<p class="posts-nav-link--cursor"> Anterior </p>
		</div>
	</a>

<?php

}

if( $next_post = get_adjacent_post( false, '', false ) ) {
	$image_url = get_the_post_thumbnail_url( $next_post->ID, 'post-nav' );
	$title = get_the_title( $next_post->ID );
	$post_link = get_permalink( $next_post->ID );
?>
	<a class="link-next" href="<?php echo $post_link; ?>" title="">
		Próximo
		<i class="i-arrow-right"></i>
	</a>

	<a class="posts-nav-link--next" href="<?php echo $post_link; ?>" title="">
		<img class="posts-nav-img" src="<?php echo $image_url; ?>" alt="">
		<div class="posts-nav-title-wrapper linhk-wrapper-next">
			<p class="posts-nav-title"><?php echo $title ?></p>
			<p class="posts-nav-link--cursor"> Próximo </p>
		</div>

	</a>

<?php

}

?>

</div>