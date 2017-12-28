<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
				<div class="front-page--purpose--item--wrapper">
					<div class="front-page--purpose--item">
						<i class="front-page--purpose--icon i-flow"></i>
						<p>
							Eu ajudo <strong>desenvolvedores com maior senioridade</strong> a criar software de alta qualidade
							que realmente atendem as necessidades do negócio, possibilitando <strong>inovação e uso inteligente
							de tecnologia</strong>.
						</p>
					</div>
				</div>
				<div class="front-page--purpose--item--wrapper">
					<div class="front-page--purpose--item">
						<i class="front-page--purpose--icon i-suitcase"></i>
						<p>
							Eu ajudo <strong>executivos de tecnologia</strong> a desenvolver negócios inovadores, suportados
							por software de qualidade, garantido <strong>ótimos resultados</strong>.
						</p>
					</div>
				</div>
			</div>
		</div>
		
		<div class="front-page--quote">
			<div class="front-page--quote--container container">
				Ajudo organizações grandes e pequenas, a promover inovação &amp; empreendedorismo através do uso 
				inteligente de tecnologia e conhecimento para melhor desempenho e lucro.
			</div>
		</div>
		
		<div class="front-page--blog container">
			<div class="front-page--blog--header">
				<h2 class="front-page--blog--title">Blog</h2>
				
				<p class="front-page--blog--description">
					Saiba tudo sobre as áreas de tecnologia e conhecimento.
				</p>
			</div>
			
			<div class="post-list--wrapper">
				<div class="post-list front-page--blog--list">
					<?php 
						$query = new WP_Query( array(
							'posts_per_page' => 3,	
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
