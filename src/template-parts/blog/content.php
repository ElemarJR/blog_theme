<article id="post-<?php the_ID(); ?>" <?php post_class( 'listing-post' ); ?>>
	<header class="entry-header">
		<?php
			get_template_part( 'template-parts/blog/content-parts/thumbnail' );
			get_template_part( 'template-parts/blog/content-parts/category' );
			the_title( '<h2 class="listing-post__title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		?>
	</header><!-- .entry-header -->

	<div class="listing-post__content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->

	<footer class="listing-post__footer">
		<?php get_template_part( 'template-parts/blog/content-parts/footer-meta' ) ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
