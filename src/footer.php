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

use Aztec\Integration\Polylang\Polylang;

global $container;

?>

	<?php if ( ! is_front_page() && ( ! is_page_template() || is_page_template( 'page-templates/contact.php' ) ) ) : ?>
	</div><!-- .container -->
	<?php endif; ?>

	<?php if ( is_front_page() ) : ?>
		<div class="container">
			<?php get_template_part( 'template-parts/footer/promotion' ); ?>
		</div>
	<?php endif; ?>

	<?php
	if ( ! is_page_template( 'page-templates/contact.php' ) && ! is_page_template( 'page-templates/about.php' ) ) :
		get_template_part( 'template-parts/newsletter/form' );
		endif;
	?>

</div><!-- #site-content -->

<footer id="colophon" class="site-footer">
	<div class="scroll-up">
		<div class="scroll-up--icon">
			<i class="i-arrow-right"></i>
		</div>
	</div>

	<div class="follow-us">
		<?php get_template_part( 'template-parts/social-menu' ); ?>
	</div>

	<div class="contact-info">
		<?php if ( $container->get( Polylang::class )->is_active() ) : ?>
		<p class="phone"><?php echo esc_html( pll__( 'phone' ) ); ?></p>
		<p>
			<a href="<?php echo esc_url( 'mailto:' . pll__( 'email' ) ); ?>">
				<?php echo esc_html( pll__( 'email' ) ); ?>
			</a>
		</p>
		<?php endif; ?>
	</div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>
</body>
</html>
