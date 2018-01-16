<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of <pages></pages>
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * 
 * Template name: Contact
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
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'contact--container' ) ?>>
		<h2 class="contact--title"><?php echo esc_html( get_post_meta( get_the_ID(), 'title', true  ) ) ?></h2>
		<p class="contact--description"><?php echo wp_kses_post( get_post_meta( get_the_ID(), 'description', true  ) ) ?></p>

		<form action="#" method="POST" class="contact--form form">
			<label for="">
				<span class="screen-reader-text"><?php esc_html_e( 'Name' ) ?></span>
				<input type="text" placeholder="<?php esc_attr_e( 'Name' ) ?>" />
			</label>
			<label for="">
				<span class="screen-reader-text"><?php esc_html_e( 'Email' ) ?></span>
				<input type="text" placeholder="<?php esc_attr_e( 'Email' ) ?>" />
			</label>
			<label for="">
				<span class="screen-reader-text"><?php esc_html_e( 'Your Message', 'elemarjr' ) ?></span>
				<textarea placeholder="<?php esc_attr_e( 'Your Message', 'elemarjr' ) ?>"></textarea>
			</label>
			<div class="form--submit-wrapper">
				<input type="submit" class="button button__tiffany" value="<?php echo esc_attr_e( 'Send', 'elemarjr' ) ?>" />
			</div>
		</form>
	</article>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
