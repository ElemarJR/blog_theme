<?php
use Aztec\Pages\About;

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

global $container;

/**
 *
 * @var About $about
 */
$about = $container->get( About::class );

get_header();


?>

<main>
	<?php
		while ( have_posts() ) :
			the_post();
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'front-page' ); ?>>
		<?php while ( have_rows( 'about_repeater' ) ) : the_row(); ?>
        <div class="<?php echo esc_attr( $about->row_classes_string() ) ?>">
			<div class="about--row--container container">
				<div class="about--row--content">
					<h2 class="about--row--title"><?php echo esc_html( get_sub_field( 'title' ) ) ?></h2>
					<div class="about--row--text">
						<p>
							<?php echo wp_kses_post( get_sub_field( 'text' ) ) ?>
						</p>
					</div>
				</div>
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
