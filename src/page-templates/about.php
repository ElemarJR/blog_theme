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

get_header();

use Aztec\Pages\About;

global $container;

$about = $container->get( About::class ); ?>

<main>
	<?php
	while ( have_posts() ) :
		the_post();
		?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'rich-content' ); ?>>
		<?php
		while ( have_rows( 'about_repeater' ) ) :
			the_row();
			?>
			<div class="<?php echo esc_attr( $about->row_classes_string() ); ?>">
				<div class="about--row--container container">
					<div class="about--row--content">
						<!-- Title -->
						<h2 class="about--row--title">
							<?php echo wp_kses_post( $about->row_title() ); ?>
						</h2>

						<!-- Content -->
						<div class="about--row--text">
							<?php echo wp_kses_post( get_sub_field( 'text' ) ); ?>
						</div>

						<!-- List -->
						<?php if ( have_rows( 'items' ) ) : ?>
						<ul class="about--row--list">
							<?php
							while ( have_rows( 'items' ) ) :
								the_row();
								?>
								<li><?php the_sub_field( 'item_text' ); ?></li>
							<?php endwhile; ?>
						</ul>
						<?php endif; ?>
					</div>

					<!-- Button -->
					<?php
					$url   = get_sub_field( 'button_url' );
					$label = get_sub_field( 'button_label' );

					if ( $label && $url ) :
						?>
						<div class="about--row--button">
							<a href="<?php echo esc_url( $url ); ?>" class="button button__bordered button__white">
								<?php echo esc_html( $label ); ?>
							</a>
						</div>
					<?php endif; ?>

					<!-- Image -->
					<div class="about--row--image wow fadeInDown">
						<?php
							$media_id = get_sub_field( 'image' );
							echo wp_kses_post( wp_get_attachment_image( $media_id, 'full' ) );
						?>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
	</article>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
