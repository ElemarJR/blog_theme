<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * 
 * Template name: Home
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
		<div class="front-page--purpose container">
			<div class="front-page--purpose--wrapper">
				<div class="front-page--purpose--item--wrapper wow slideInLeft">
					<div class="front-page--purpose--item">
						<?php $icon_class = get_post_meta( get_the_ID(), 'purpose_icon_1', true ) ?>
						<i class="front-page--purpose--icon bordered-icon <?php echo esc_attr( $icon_class ) ?>"></i>
						<p>
							<?php echo wp_kses_post( get_post_meta( get_the_ID(), 'purpose_text_1', true ) ) ?>
						</p>
					</div>
				</div>
				<div class="front-page--purpose--item--wrapper wow slideInRight">
					<div class="front-page--purpose--item">
						<?php $icon_class = get_post_meta( get_the_ID(), 'purpose_icon_2', true ) ?>
						<i class="front-page--purpose--icon bordered-icon <?php echo esc_attr( $icon_class ) ?>"></i>
						<p>
							<?php echo wp_kses_post( get_post_meta( get_the_ID(), 'purpose_text_2', true ) ) ?>
						</p>
					</div>
				</div>
			</div>
		</div>
		
		<div class="front-page--quote">
			<div class="front-page--quote--container container wow slideInLeft">
				<?php echo wp_kses_post( get_post_meta( get_the_ID(), 'quote', true ) ) ?>
			</div>
		</div>
		
		<div class="front-page--blog container">
			<div class="front-page--blog--header">
				<h2 class="front-page--blog--title">Blog</h2>
				
				<p class="front-page--blog--description">
					<?php echo wp_kses_post( get_post_meta( get_the_ID(), 'blog_text', true ) ) ?>
				</p>
			</div>
			
			<div class="post-list--wrapper">
				<div class="post-list front-page--blog--list">
					<?php 
						$query = new WP_Query( array(
							'posts_per_page' => 4,	
						) );
						while ( $query->have_posts() ) : $query->the_post();
							get_template_part( 'template-parts/blog/content' );
						endwhile;
						wp_reset_query();
					?>
				</div>
			</div>
			
			<div class="front-page--blog--footer">
				<a class="button" href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) )?>" class="see-more">
					<?php echo esc_html_e( 'See more', 'elemarjr' ) ?>
				</a>
			</div>
		</div>
	</article>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
