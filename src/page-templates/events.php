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
 * Template name: Events Calendar
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

global $container;

$events_by_year = $container->get( Aztec\PostType\Event::class )->get_events_by_year();

get_header();

?>

<main>
	<?php
		while ( have_posts() ) :
			the_post();
?>
	<div class="events">
		<div class="container">
			<?php foreach ( $events_by_year as $year => $events ) : ?>
			<div class="page-header">
				<h3 class="page-header--title"><?php echo __( 'Calendar', 'elemarjr' ); ?> <b><?php echo esc_html( $year ); ?></b></h3>
			</div>
			<section class="events--list">
				<?php
					foreach( $events as $post ) : setup_postdata( $post );
						get_template_part( 'template-parts/event/event' );
					endforeach;

					wp_reset_postdata();
				?>
			</section>
			<?php endforeach; ?>
		</div>

		<div class="events--about">
			<div class="events--about-text">
				<?php the_field( 'cta_text' ); ?>
			</div>
			<a href="<?php the_field( 'cta_url' ); ?>" class="button button__bordered">
				<?php the_field( 'cta_label' ); ?>
			</a>
		</div>
		<?php endwhile; ?>
	</div>

	<div class="container gallery">
		<div class="page-header">
			<h3 class="page-header--title"><?php echo __( 'Photos', 'elemarjr' ); ?></b></h3>
		</div>

		<div class="gallery--list">
			<?php
				$images = get_field('gallery');
				$size = 'full';

				foreach( $images as $image ) :
			?>
				<div class="gallery--item">
					<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

</main>

<?php get_footer(); ?>