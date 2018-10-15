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

use Aztec\Helper\Url;
use Aztec\PostType\Testimonial;

global $container;

$url_helper = $container->get( Aztec\Helper\Url::class );

get_header(); ?>

<main>
	<?php
	while ( have_posts() ) :
		the_post();
		?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'front-page' ); ?>>
		<div class="front-page--blog">
			<div class="container container__xs-small-margin">
				<h2 class="front-page--blog-title wow fadeIn"><?php esc_html_e( 'Blog', 'elemarjr' ); ?></h2>

			<?php
				$container->set(
					'template.home.blog', [
						'description' => get_post_meta( get_the_ID(), 'blog_text', true ),
					]
				);
				get_template_part( 'template-parts/page/home/blog' );

			if ( pll_current_language() !== 'en' ) {
				$container->set(
					'template.home.blog', [
						'language'    => 'en',
						'description' => __( 'Last posts in English', 'elemarjr' ),
					]
				);
				get_template_part( 'template-parts/page/home/blog' );
			}
			?>
			</div>
		</div>

		<div class="front-page--purpose container">
			<div class="front-page--purpose-image wow fadeIn">
				<img src="<?php echo esc_url( get_field( 'purpose_image' )['url'] ); ?>" alt="Meu trabalho">
			</div>
			<div class="front-page--purpose-content">
				<div class="front-page--purpose-title wow fadeIn">
				<?php echo wp_kses_post( get_post_meta( get_the_ID(), 'purpose_title', true ) ); ?>
				</div>
				<div class="purpose wow fadeIn">
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
				<div class="purpose wow fadeIn">
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

		<div class="front-page--quote" style="background-image: url(<?php echo esc_url( get_field( 'quote_image' )['url'] ); ?>);">
			<div class="container">
				<div class="wow fadeIn">
					<div class="front-page--quote-content">
						<span class="front-page--quote-icon"><i class="i-quote"></i></span>
						<div><?php echo wp_kses_post( get_post_meta( get_the_ID(), 'quote', true ) ); ?></div>
						<p class="front-page--quote-author">Elemar JR</p>
					</div>
				</div>
			</div>
		</div>

		<?php
		$posts = $container->get( Testimonial::class )->get_testimonials();
		if ( 0 < count( $posts ) ) :
			?>
		<div class="front-page--testimonial container wow fadeIn">
			<div class="front-page--testimonial-header page-header">
				<h5 class="page-header--title page-header--title__small">
					<?php echo esc_html( get_post_meta( get_the_ID(), 'testimonial_title', true ) ); ?>
				</h5>
			</div>

			<div class="swiper-container">
				<div class="swiper-wrapper">
				<?php
				foreach ( $posts as $post ) :
					setup_postdata( $post );
					$photo_id = get_post_meta( get_the_ID(), 'testimonial_photo', true );
					$logo_id  = get_post_meta( get_the_ID(), 'testimonial_logo', true );
					?>
					<div class="swiper-slide">
						<div class="testimonial">
							<div class="testimonial--image">
								<img src="<?php echo esc_html( wp_get_attachment_image_url( $photo_id ) ); ?>" alt="">
							</div>
							<div class="testimonial--content">
								&quot;<?php echo wp_kses_post( get_the_content() ); ?>&quot;
							</div>
							<div class="testimonial--footer">
								<div class="testimonial--company">
									<img src="<?php echo esc_html( wp_get_attachment_image_url( $logo_id, 'testimonial-logo' ) ); ?>" alt="">
								</div>
								<div class="testimonial--author">
									<p><?php echo esc_html( get_post_meta( get_the_ID(), 'testimonial_position', true ) ); ?></p>
									<p><?php the_title(); ?></p>
								</div>
							</div>
						</div>
					</div>
					<?php
					endforeach;
					wp_reset_postdata();
				?>
				</div>
				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
			</div>
			<div class="swiper-pagination"></div>
		</div>
		<?php endif; ?>
	</article>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
