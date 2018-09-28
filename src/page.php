<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
			<div class="rich-content">
				<?php the_content(); ?>
			</div>
		</article>
		<?php endwhile; ?>
	</main>

<?php get_footer(); ?>
