<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of <pages></pages>
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * 
 * Template name: Contact
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
	<article id="post-<?php the_ID(); ?>" <?php post_class() ?>>
		<div class="contact--info">
			<div class="contact--info--contact">
				<div class="contact--info--item">
					<i class="bordered-icon bordered-icon__white bordered-icon__big i-phone"></i>
					<div class="contact--info--data">
						<strong>Fone</strong>
						+55 (51) 99942-0609
					</div>
				</div>
				
				<div class="contact--info--item">
					<i class="bordered-icon bordered-icon__white bordered-icon__big i-mail-filled"></i>
					<div class="contact--info--data">
						<strong>E-mail</strong>
						<a href="#">falecom@elemarjr.com</a>
					</div>
				</div>
			</div>
			<div class="contact--info--social">
				<?php get_template_part( 'template-parts/social-menu') ?>
			</div>
		</div>
			
		<form action="#" method="POST" class="contact--form form">
			<label for="" class="form--half">
				<span class="screen-reader-text">Nome</span>
				<input type="text" placeholder="Nome" />
			</label>
			<label for="" class="form--half">
				<span class="screen-reader-text">E-mail</span>
				<input type="text" placeholder="E-mail" />
			</label>
			<label for="">
				<span class="screen-reader-text">Mensagem</span>
				<textarea placeholder="Sua mensagem"></textarea>
			</label>
			<div class="form--submit-wrapper">
				<input type="submit" class="button button__tiffany" value="<?php echo esc_attr_e( 'Send', 'elemarjr' ) ?>" />
			</div>
		</form>
	</article>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
