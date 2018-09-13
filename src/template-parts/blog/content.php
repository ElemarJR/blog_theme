<?php
/**
 * The post listing content.
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'listing-post' ); ?>>
	<div class="listing-post__wrapper">
		<div class="listing-post__container">
			<div class="listing-post__bg" style="background-image: url('<?php the_post_thumbnail_url( 'post-listing' ); ?>')"></div>
			<div class="listing-post__overlay">
				<header class="listing-post__header">
					<?php
						get_template_part( 'template-parts/blog/content-parts/category' );
						get_template_part( 'template-parts/blog/content-parts/serie' );
						the_title( '<h2 class="listing-post__title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					?>
				</header><!-- .listing-post__header -->
				<footer class="listing-post__footer">
					<?php get_template_part( 'template-parts/blog/content-parts/footer-meta' ); ?>
				</footer><!-- .listing-post__footer -->
			</div><!-- .listing-post__overlay -->
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
