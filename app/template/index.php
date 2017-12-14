<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

get_header(); ?>

<?php get_template_part( 'template-parts/blog/category-nav' ) ?>

<main>
	<section class="post-list">
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/blog/content' );
		endwhile;
		?>
	</section>

	<div class="posts-nav">
		<?php posts_nav_link( ' ', __( 'Previous Page' ), __( 'Next Page' ) ); ?>
	</div>
</main>
<?php get_footer(); ?>
