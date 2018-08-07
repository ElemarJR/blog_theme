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

<main class="container">
	<?php
		while ( have_posts() ) :
			the_post();
?>
	<?php foreach ( $events_by_year as $year => $events ) : ?>
	<div class="page-header">
		<h3 class="page-header--title">Agenda <b><?php echo esc_html( $year ); ?></b></h3>
	</div>
	<section class="event-list">
		<?php
			foreach( $events as $post ) : setup_postdata( $post );
				get_template_part( 'template-parts/event/event' );
			endforeach;
		?>
	</section>
	<?php
		endforeach;
	endwhile;
	?>
</main>

<?php get_footer(); ?>