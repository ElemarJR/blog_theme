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
		<div class="front-page--purpose container">
			<div class="front-page--purpose--wrapper">
				<?php $purpose_link = get_post_meta( get_the_ID(), 'purpose_link', true ) ?>
				<div class="front-page--purpose--item--wrapper wow fadeInUpBig">
					<a href="<?php echo esc_url( $purpose_link ) ?>" class="front-page--purpose--item">
						<?php $icon_class = get_post_meta( get_the_ID(), 'purpose_icon_1', true ) ?>
						<i class="front-page--purpose--icon bordered-icon <?php echo esc_attr( $icon_class ) ?>"></i>
						<span>
							<?php echo wp_kses_post( get_post_meta( get_the_ID(), 'purpose_text_1', true ) ) ?>
						</span>
					</a>
				</div>
				<div class="front-page--purpose--item--wrapper wow fadeInUpBig">
					<a href="<?php echo esc_url( $purpose_link ) ?>" class="front-page--purpose--item">
						<?php $icon_class = get_post_meta( get_the_ID(), 'purpose_icon_2', true ) ?>
						<i class="front-page--purpose--icon bordered-icon <?php echo esc_attr( $icon_class ) ?>"></i>
						<span>
							<?php echo wp_kses_post( get_post_meta( get_the_ID(), 'purpose_text_2', true ) ) ?>
						</span>
					</a>
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
	        	<h1 class="testimonial-title"><?php esc_html_e( 'Testimonials', 'elemarjr' ); ?></h1>
	
	    		<div class="swiper-container container">
	        		<div class="swiper-wrapper">
						<?php
							foreach ( $posts as $post ) : setup_postdata( $post );
								$photo_id = get_post_meta( get_the_ID(), 'testimonial_photo', true );
								$logo_id = get_post_meta( get_the_ID(), 'testimonial_logo', true );
						?>
						<div class="swiper-slide">
	                		<div class="slider-content--wrapper">
		                		<div class="slider-content">
									<img class="testimonial-foto" src="<?php echo esc_html( wp_get_attachment_image_url( $photo_id ) ); ?>" alt="">
		            				<i class="i-left-quote quote"></i>
		                			<?php the_content() ?>
		                    		<div class="footer">
			                    		<div class="info-author">
			                    			<div class="testimonial-author"><?php the_title() ?></div>
			                    			<div class="testimonial-author-position"><?php echo esc_html( get_post_meta( get_the_ID(), 'testimonial_position', true ) ); ?></div>
			                    		</div>
										<img class="company-logo" src="<?php echo esc_html( wp_get_attachment_image_url( $logo_id, 'testimonial-logo' ) ); ?>" alt="">
		                    		</div>
		                    	</div>
		                    </div>
	                    </div>
						<?php
							endforeach;
							wp_reset_postdata();
						?>
	        		</div>
	    			<div class="swiper-pagination"></div>
	
	    		</div>
				<div class="swiper-button-next testimonial-nav"></div>
	    		<div class="swiper-button-prev testimonial-nav"></div>
		</div>
		<?php endif; ?>

		<div class="front-page--blog container">
			<div class="front-page--blog--header">
				<h2 class="front-page--blog--title">Blog</h2>

				<p class="front-page--blog--description">
					<?php echo wp_kses_post( get_post_meta( get_the_ID(), 'blog_text', true ) ) ?>
				</p>
			</div>

			<?php
				$query = new WP_Query( array(
					'posts_per_page' => 4,
				) );
				$container->set( 'post_list.query', $query );
				$container->set( 'post_list.extra_class', 'front-page--blog--list' );
				get_template_part( 'template-parts/blog/post-list' );
			?>

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
