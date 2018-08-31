<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

get_header(); ?>

	<main>
		<article id="post-not-found" class="post-not-found">
			<h1 class="post-not-found--title"><?php esc_html_e( 'Page not found', 'elemarjr' ); ?></h1>
			<p class="post-not-found--description">
				<?php esc_html_e( 'Sorry! That page doesn\'t seem to exist.', 'elemarjr' ); ?>
			</p>
			<a href="<?php echo esc_url( home_url() ); ?>" class="button">
				<?php esc_html_e( 'Back to home', 'elemarjr' ); ?>
			</a>
		</article>
	</main>

<?php get_footer(); ?>
