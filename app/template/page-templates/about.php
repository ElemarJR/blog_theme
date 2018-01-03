<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * 
 * Template name: About
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
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'front-page' ); ?>>
		<div class="about--row">
			<div class="about--row--container container">
				<div class="about--row--content">
					<h2 class="about--row--title"><?php echo esc_html( get_post_meta( get_the_ID(), 'about_abilities_title', true ) ) ?></h2>
					<div class="about--row--text">
						<p>
							<?php echo wp_kses_post( get_post_meta( get_the_ID(), 'about_abilities_text', true ) ) ?>
						</p>
					</div>
				</div>
				<div class="about--row--image">
					<?php 
						$media_id = get_post_meta( get_the_ID(), 'about_abilities_image', true );
						echo wp_kses_post( wp_get_attachment_image( $media_id, 'full' ) );
					?>
				</div>
			</div>
		</div>
		<div class="about--row about--row__gray about--row__invert">
			<div class="about--row--container container">
				<div class="about--row--content">
					<h2 class="about--row--title"><?php echo esc_html( get_post_meta( get_the_ID(), 'about_clients_title', true ) ) ?></h2>
					<div class="about--row--text">
						<p>
							<?php echo wp_kses_post( get_post_meta( get_the_ID(), 'about_clients_text', true ) ) ?>
						</p>
					</div>
				</div>
				<div class="about--row--image">
					<?php 
						$media_id = get_post_meta( get_the_ID(), 'about_clients_image', true );
						echo wp_kses_post( wp_get_attachment_image( $media_id, 'full' ) );
					?>
				</div>
			</div>
		</div>
		<div class="about--row about--row__tiffany">
			<div class="about--row--container container">
				<div class="about--row--content">
					<h2 class="about--row--title"><?php echo esc_html( get_post_meta( get_the_ID(), 'about_expirience_title', true ) ) ?></h2>
					<div class="about--row--text">
						<p>
							<?php echo wp_kses_post( get_post_meta( get_the_ID(), 'about_expirience_text', true ) ) ?>
						</p>
					</div>
				</div>
				<div class="about--row--image">
					<?php 
						$media_id = get_post_meta( get_the_ID(), 'about_expirience_image', true );
						echo wp_kses_post( wp_get_attachment_image( $media_id, 'full' ) );
					?>
				</div>
			</div>
		</div>
		<div class="about--row about--row__red-title about--row__invert">
			<div class="about--row--container container">
				<div class="about--row--content">
					<h2 class="about--row--title"><?php echo esc_html( get_post_meta( get_the_ID(), 'about_raven_title', true ) ) ?></h2>
					<div class="about--row--text">
						<p>
							<?php echo wp_kses_post( get_post_meta( get_the_ID(), 'about_raven_text', true ) ) ?>
						</p>
					</div>
				</div>
				<div class="about--row--image">
					<?php 
						$media_id = get_post_meta( get_the_ID(), 'about_raven_image', true );
						echo wp_kses_post( wp_get_attachment_image( $media_id, 'full' ) );
					?>
				</div>
			</div>
		</div>
		<div class="about--row about--row__gray">
			<div class="about--row--container container">
				<div class="about--row--content">
					<h2 class="about--row--title"><?php echo esc_html( get_post_meta( get_the_ID(), 'about_mvp_title', true ) ) ?></h2>
					<div class="about--row--text">
						<p>
							<?php echo wp_kses_post( get_post_meta( get_the_ID(), 'about_mvp_text', true ) ) ?>
						</p>
					</div>
				</div>
				<div class="about--row--image">
					<?php 
						$media_id = get_post_meta( get_the_ID(), 'about_mvp_image', true );
						echo wp_kses_post( wp_get_attachment_image( $media_id, 'full' ) );
					?>
				</div>
			</div>
		</div>
	</article>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
