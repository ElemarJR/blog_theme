<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

use Aztec\Helper\BackgroundImage;

global $container;

get_header(); ?>

	<main>

		<?php
			while ( have_posts() ) :
				the_post();
		?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="post--header container">
				<?php get_template_part( 'template-parts/blog/content-parts/category' )?>

				<?php get_template_part( 'template-parts/blog/content-parts/serie' ); ?>

				<?php the_title( '<h1 class="post--title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>

				<?php get_template_part( 'template-parts/blog/single/meta' ); ?>
			</header>

			<?php
				$bg_images = $container->get( BackgroundImage::class )->get_bg_images();
			?>
			<div class="post--image site-header" <?php
				foreach ( $bg_images as $size => $url ) :
					echo ' data-bg-' . $size . '="' . esc_url( $url ) . '"';
				endforeach;
			?>>
			</div>

			<section class="container">
				<div class="post--main">
					<?php get_template_part( 'template-parts/blog/single/social-medias' ); ?>

					<?php get_template_part( 'template-parts/blog/single/content' ); ?>
				</div>
			</section>

			<section class="container">
				<?php get_template_part( 'template-parts/blog/single/tags' ); ?>

				<?php get_template_part( 'template-parts/blog/single/post-nav' ); ?>

				<?php get_template_part( 'template-parts/blog/single/serie' ); ?>

				<?php get_template_part( 'template-parts/blog/single/banner-contact' ); ?>

				<?php comments_template(); ?>
			</section>
		</article>
		<?php endwhile; ?>
	</main>

<?php get_footer(); ?>
