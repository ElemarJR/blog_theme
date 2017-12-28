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
					<h2 class="about--row--title">Minhas Habilidades</h2>
					<div class="about--row--text">
						<p>
							Fusce lobortis orci in neque aliquet, eget facilisis leo facilisis. Duis vel eleifend
							lacus. Donec id euismod diam. Fusce finibus arcu vel laoreet eleifend. In consequat 
							lorem elit, vel gravida nisi consectetur a. Phasellus posuere ut nulla quis pellentesque.
							Sed vehicula enim eu sem laoreet dignissim.
						</p>
					</div>
				</div>
				<div class="about--row--image">
					<img src="<?php echo get_template_directory_uri()?>/assets/images/about/prancheta.png" />
				</div>
			</div>
		</div>
		<div class="about--row about--row__gray about--row__invert">
			<div class="about--row--container container">
				<div class="about--row--content">
					<h2 class="about--row--title">Clientes no Brasil, Israel e Estados Unidos</h2>
					<div class="about--row--text">
						<p>
							Fusce lobortis orci in neque aliquet, eget facilisis leo facilisis. Duis vel eleifend
							lacus. Donec id euismod diam. Fusce finibus arcu vel laoreet eleifend. In consequat 
							lorem elit, vel gravida nisi consectetur a.
						</p>
						
						<?php // @todo Style the list ?>
						<ul>
							<li>in nisi lectus;</li>
							<li>commodo ut mattis;</li>
							<li>scelerisque magna;</li>
							<li>condimentum blandit;</li>
							<li>lorem est;</li>
							<li>dapibus sit amet;</li>
							<li>iaculis rhoncus;</li>
							<li>metus vel.</li>
						</ul>
					</div>
				</div>
				<div class="about--row--image">
					<img src="<?php echo get_template_directory_uri()?>/assets/images/about/mapa.png" />
				</div>
			</div>
		</div>
		<div class="about--row about--row__tiffany">
			<div class="about--row--container container">
				<div class="about--row--content">
					<h2 class="about--row--title">Mais de 20 anos de experiência</h2>
					<div class="about--row--text">
						<p>
							Fusce lobortis orci in neque aliquet, eget facilisis leo facilisis. Duis vel eleifend
							lacus. Donec id euismod diam. Fusce finibus arcu vel laoreet eleifend. In consequat 
							lorem elit, vel gravida nisi consectetur a. Phasellus posuere ut nulla quis pellentesque.
							Sed vehicula enim eu sem laoreet dignissim.
						</p>
					</div>
				</div>
				<div class="about--row--image">
					<img src="<?php echo get_template_directory_uri()?>/assets/images/about/experiencia.png" />
				</div>
			</div>
		</div>
		<div class="about--row about--row__red-title about--row__invert">
			<div class="about--row--container container">
				<div class="about--row--content">
					<h2 class="about--row--title">Membro do time de desenvolvimento do RavenDB</h2>
					<div class="about--row--text">
						<p>
							Fusce lobortis orci in neque aliquet, eget facilisis leo facilisis. Duis vel eleifend
							lacus. Donec id euismod diam. Fusce finibus arcu vel laoreet eleifend. In consequat 
							lorem elit, vel gravida nisi consectetur a.
						</p>
					</div>
				</div>
				<div class="about--row--image">
					<img src="<?php echo get_template_directory_uri()?>/assets/images/about/raven.jpg" />
				</div>
			</div>
		</div>
		<div class="about--row about--row__gray">
			<div class="about--row--container container">
				<div class="about--row--content">
					<h2 class="about--row--title">Microsoft Most Valuable Professional (MVP)</h2>
					<div class="about--row--text">
						<p>
							Fusce lobortis orci in neque aliquet, eget facilisis leo facilisis. Duis vel eleifend
							lacus. Donec id euismod diam. Fusce finibus arcu vel laoreet eleifend. In consequat 
							lorem elit, vel gravida nisi consectetur a. Phasellus posuere ut nulla quis pellentesque.
							Sed vehicula enim eu sem laoreet dignissim.
						</p>
					</div>
				</div>
				<div class="about--row--image">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/about/mvp.png" />
				</div>
			</div>
		</div>
	</article>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
