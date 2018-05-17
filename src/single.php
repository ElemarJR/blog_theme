<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

global $container;

get_header(); ?>

	<main>
		<?php
			while ( have_posts() ) :
				the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post--content">
				<?php
					the_content();

					wp_link_pages( array(
						'next_or_number' => 'next',
						'before' => '<div class="posts-nav">',
						'after' => '</div>'
					) );
				?>
			</div>

			<?php get_template_part( 'template-parts/blog/single/footer-meta' ); ?>

			<?php get_template_part( 'template-parts/blog/single/post-nav' ); ?>

			<?php get_template_part( 'template-parts/blog/single/serie' ); ?>

			<?php get_template_part( 'template-parts/blog/single/banner-contact' ); ?>

			<?php comments_template(); ?>
		</article>
		<?php endwhile; ?>
	</main>

<?php get_footer(); ?>
