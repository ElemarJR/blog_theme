<?php
use Aztec\PostType\Testimonial;

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

global $container;

get_header(); ?>

<main>
	<?php
		while ( have_posts() ) :
			the_post();
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'front-page' ); ?>>
		<div class="front-page--blog">
			<div class="container">
				<div class="front-page--blog-title">
					<h2>Blog</h2>
				</div>

				<p class="front-page--blog-description">
					<?php echo wp_kses_post( get_post_meta( get_the_ID(), 'blog_text', true ) ) ?>
				</p>

				<br>
				<br>
				<br>

				<div class="front-page--blog-list">
					<?php
						$query = new WP_Query( array(
							'posts_per_page' => 3,
						) );
						$container->set( 'post_list.query', $query );
						$container->set( 'post_list.extra_class', 'front-page--blog--list' );
						get_template_part( 'template-parts/blog/post-list' );
					?>
					<div class="front-page--blog-actions">
						<a class="button button__transparent" href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) )?>" class="see-more">
							<?php echo esc_html_e( 'See more', 'elemarjr' ) ?> <i class="i-arrow-right"></i>
						</a>						
					</div>
				</div>

				<p class="front-page--blog-description">Últimos posts em inglês</p>

				<div class="front-page--blog-list">
					<?php
						$query = new WP_Query( array(
							'lang' => 'en',
							'posts_per_page' => 3,
						) );
						$container->set( 'post_list.query', $query );
						$container->set( 'post_list.extra_class', 'front-page--blog--list' );
						get_template_part( 'template-parts/blog/post-list' );
					?>
					<div class="front-page--blog-actions">
						<a class="button button__transparent" href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) )?>" class="see-more">
							<?php echo esc_html_e( 'See more', 'elemarjr' ) ?> <i class="i-arrow-right"></i>
						</a>						
					</div>
				</div>
			</div>
		</div>

		<div class="front-page--purpose container">
			<div class="front-page--purpose-image">
				<img src="<?php echo esc_html( get_field( 'purpose_image' )['url'] ); ?>">
			</div>
			<div class="front-page--purpose-content">
				<div class="front-page--purpose-title">
					Meu <b>trabalho</b>
				</div>
				<div class="purpose wow fadeInUpBig">				
					<?php $icon_class = get_post_meta( get_the_ID(), 'purpose_icon_1', true ); ?>
					<div class="purpose--icon">
						<i class="<?php echo esc_attr( $icon_class ); ?>"></i>
					</div>
					<div class="purpose--content">
						<div class="purpose--title">
							<?php echo wp_kses_post( get_post_meta( get_the_ID(), 'purpose_title_1', true ) ); ?>
						</div>
						<?php echo wp_kses_post( get_post_meta( get_the_ID(), 'purpose_text_1', true ) ); ?>
					</div>
				</div>
				<div class="purpose wow fadeInUpBig">				
					<?php $icon_class = get_post_meta( get_the_ID(), 'purpose_icon_2', true ); ?>
					<div class="purpose--icon">
						<i class="<?php echo esc_attr( $icon_class ); ?>"></i>
					</div>
					<div class="purpose--content">
						<div class="purpose--title">
							<?php echo wp_kses_post( get_post_meta( get_the_ID(), 'purpose_title_2', true ) ); ?>
						</div>
						<?php echo wp_kses_post( get_post_meta( get_the_ID(), 'purpose_text_2', true ) ); ?>
					</div>
				</div>
			</div>
		</div>

		<div class="front-page--quote">
			<div class="front-page--quote--container container wow fadeInUpBig">
				<?php echo wp_kses_post( get_post_meta( get_the_ID(), 'quote', true ) ) ?>
			</div>
		</div>

		<?php 
			$posts = $container->get( Testimonial::class )->get_testimonials();
			if ( 0 < count( $posts ) ) :
		?>
		<div class="front-page--testimonial">
			<h5 class="front-page--testimonial-title">
				<?php esc_html_e( 'Testimonials', 'elemarjr' ); ?>
			</h5>

			<div class="swiper-container">
    			<div class="swiper-wrapper">
					<?php
						foreach ( $posts as $post ) : setup_postdata( $post );
							$photo_id = get_post_meta( get_the_ID(), 'testimonial_photo', true );
							$logo_id = get_post_meta( get_the_ID(), 'testimonial_logo', true );
					?>
					<div class="swiper-slide">
						<div class="testimonial">
							<div class="testimonial--image">
								<img src="<?php echo esc_html( wp_get_attachment_image_url( $photo_id ) ); ?>" alt="">
							</div>
							<div class="testimonial--content">
								<?php the_content(); ?>
							</div>
							<div class="testimonial--footer">
								<div class="testimonial--company">
									<img src="<?php echo esc_html( wp_get_attachment_image_url( $logo_id, 'testimonial-logo' ) ); ?>" alt="">
								</div>
								<div class="testimonial--author">
									<p><?php the_title(); ?></p>
									<p><?php echo esc_html( get_post_meta( get_the_ID(), 'testimonial_position', true ) ); ?></p>
								</div>
							</div>
						</div>
					</div>
					<?php
						endforeach;
						wp_reset_postdata();
					?>
				</div>
				<div class="swiper-counter"></div>
				<div class="swiper-button-next"></div>
    			<div class="swiper-button-prev"></div>
			</div>
		</div>
		<?php endif; ?>
	</article>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
