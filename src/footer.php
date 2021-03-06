<?php 

use Aztec\Integration\Polylang\Polylang;

global $container;

?>

	<?php if( ! is_front_page() && ( ! is_page_template() || is_page_template( 'page-templates/contact.php' ) ) ) : ?>
	</div><!-- .container -->
	<?php endif; ?>
	
	<?php 
		if (! is_page_template( 'page-templates/contact.php' ) ) : 
			get_template_part( 'template-parts/newsletter/form' );
		endif;
	?>

</div><!-- #site-content -->

<footer id="colophon" class="site-footer">
	<div class="site-info container">
		<div class="site-branding">
			<a href="<?php echo esc_url( home_url( '/' ) ) ?>">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.svg' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) )?>">
			</a>	
		</div><!-- .site-branding -->

		<div class="follow-us">
			<h3 class="follow-us--title"><?php esc_html_e( 'Follow us', 'elemarjr' ) ?></h3>
			<?php get_template_part( 'template-parts/social-menu') ?>
		</div>

		<div class="contact-info">
			<?php if( $container->get( Polylang::class )->is_active() )  : ?>
			<p><?php echo esc_html( pll__( 'phone' ) ) ?></p>
			<p>
				<a href="<?php echo esc_url( 'mailto:' . pll__( 'email' ) ) ?>">
					<?php echo esc_html( pll__( 'email' ) ) ?>
				</a>
			</p>
			<?php endif; ?>
		</div>
	</div><!-- .site-info -->
</footer><!-- #colophon -->

<?php
/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

wp_footer();

?>
</body>
</html>
