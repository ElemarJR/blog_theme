<?php

global $container;

if( $previous_post = get_adjacent_post( false, '', true ) ) {
	$image_url = get_the_post_thumbnail_url( $post->ID, 'post-nav' );
	$title = get_the_title( $post->ID );
}

if( $next_post = get_adjacent_post( false, '', false ) ) {
	$image_url = get_the_post_thumbnail_url( $post->ID, 'post-nav' );
	$title = get_the_title( $post->ID );
}
