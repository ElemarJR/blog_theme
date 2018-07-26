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
			<header class="container">
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

			<article class="container post--main">
				<div class="post--share">
					<div class="post--comments">
						<div class="post--comments-count"><?php echo esc_html( get_comments_number() ); ?></div>
						<div class="post--comments-icon">
							<i class="i-comments"></i>							
						</div>
					</div>
					<a class="post--share-item addthis_button_twitter"><i class="i-twitter"></i></a>
					<a class="post--share-item addthis_button_linkedin"><i class="i-linkedin"></i></a>
					<a class="post--share-item addthis_button_facebook"><i class="i-facebook"></i></a>
				</div>

				<div class="post--content">
					<?php
						the_content();

						wp_link_pages( array(
							'next_or_number' => 'next',
							'before' => '<div class="posts-nav">',
							'after' => '</div>'
						) );
					?>
				</div>
			</article>

			<div class="container">
				<?php get_template_part( 'template-parts/blog/single/tags' ); ?>

				<?php get_template_part( 'template-parts/blog/single/post-nav' ); ?>

				<?php get_template_part( 'template-parts/blog/single/serie' ); ?>

				<?php get_template_part( 'template-parts/blog/single/banner-contact' ); ?>

				<?php comments_template(); ?>
			</div>
		</article>
		<?php endwhile; ?>
	</main>

<?php get_footer(); ?>
