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

get_header();


?>

<main class="container">
	<?php
		while ( have_posts() ) :
			the_post();
?>
	<div class="page-header">
		<h1 class="page-header--title"><?php the_title(); ?></h1>
	</div>

	<section class="event-list">
		<div class="event">
			<div class="event--header">
				<time class="event--date">Junho<br>09</time>
				<time class="event--image">logo</time>
			</div>
			<div class="event--content">
				<p class="event--role">Palestrante</p>
				<h3 class="event--title">C# como você (talvez) nunca view</h3>
			</div>
			<div class="event--footer">JoinCommunity</div>
		</div>

		<div class="event event__active">
			<div class="event--header">
				<time class="event--date">Junho<br>09</time>
				<time class="event--image">logo</time>
			</div>
			<div class="event--content">
				<p class="event--role">Palestrante</p>
				<h3 class="event--title">C# como você (talvez) nunca view</h3>
			</div>
			<div class="event--footer">JoinCommunity</div>
		</div>

		<div class="event event__old">
			<div class="event--header">
				<time class="event--date">Junho<br>09</time>
				<time class="event--image">logo</time>
			</div>
			<div class="event--content">
				<p class="event--role">Palestrante</p>
				<h3 class="event--title">C# como você (talvez) nunca view</h3>
			</div>
			<div class="event--footer">JoinCommunity</div>
		</div>
	</section>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
