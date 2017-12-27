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

get_header(); ?>

	<main>
		<?php
		while ( have_posts() ) :
			the_post();
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php the_content(); ?>
			
			<?php get_template_part( 'template-parts/blog/single/footer-meta' ); ?>

			<?php comments_template(); ?>
		</article>
		<?php endwhile; ?>
	</main>

<?php get_footer(); ?>
