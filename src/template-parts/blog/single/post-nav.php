<?php
/**
 * The post navigation.
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

global $container; ?>

<div class="posts-nav-link">

<?php
$previous_post = get_adjacent_post( false, '', true );

if ( $previous_post ) {
	$image_url = get_the_post_thumbnail_url( $previous_post->ID, 'post-nav' );
	$title     = get_the_title( $previous_post->ID );
	$post_link = get_permalink( $previous_post->ID );
	?>
	<div class="posts-nav-link--previous">
		<div class="posts-nav-link--thumb">
			<a class="link-previous" href="<?php echo esc_url( $post_link ); ?>">
				<i class="i-arrow-left"></i>
				<span><?php esc_html_e( 'Previous', 'elemarjr' ); ?></span>
			</a>
			<a href="<?php echo esc_url( $post_link ); ?>">
				<img class="posts-nav-link--img" src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $title ); ?>">
			</a>
		</div>
		<div class="posts-nav-link--info">
			<p class="posts-nav-link--cursor">
				<a href="<?php echo esc_url( $post_link ); ?>">
					<?php esc_html_e( 'Previous', 'elemarjr' ); ?></p>
				</a>
			<p class="posts-nav-link--title">
				<a href="<?php echo esc_url( $post_link ); ?>">
					<?php echo esc_html( $title ); ?>
				</a>
			</p>
		</div>
	</div>

	<?php

}

$next_post = get_adjacent_post( false, '', false );

if ( $next_post ) {
	$image_url = get_the_post_thumbnail_url( $next_post->ID, 'post-nav' );
	$title     = get_the_title( $next_post->ID );
	$post_link = get_permalink( $next_post->ID );
	?>

	<div class="posts-nav-link--next">
		<div class="posts-nav-link--info">
			<p class="posts-nav-link--cursor">
				<a href="<?php echo esc_url( $post_link ); ?>">
					<?php esc_html_e( 'Next', 'elemarjr' ); ?>
				</a>
			</p>
			<p class="posts-nav-link--title">
				<a href="<?php echo esc_url( $post_link ); ?>">
					<?php echo esc_html( $title ); ?>
				</a>
			</p>
		</div>
		<div class="posts-nav-link--thumb">
			<a href="<?php echo esc_url( $post_link ); ?>">
				<img class="posts-nav-link--img" src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $title ); ?>">
			</a>
			<a class="link-next" href="<?php echo esc_html( $post_link ); ?>" title="">
				<span><?php esc_html_e( 'Next', 'elemarjr' ); ?></span>
				<i class="i-arrow-right"></i>
			</a>
		</div>
	</div>

	<?php

}
?>
</div>
