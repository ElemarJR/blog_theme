</div><!-- #site-content -->

<footer id="colophon" class="site-footer">
	<div class="site-info container">
		<div class="site-branding">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.svg' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) )?>">
		</div><!-- .site-branding -->

		<div class="follow-us">
			<h3 class="follow-us--title"><?php esc_html_e( 'Follow us', 'elemarjr' ) ?></h3>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'social',
					'menu_id'        => 'social-menu',
					'menu_class'     => 'follow-us--menu',
					'depth'          => 1,
					'link_before'    => '<span class="screen-reader-text">',
					'link_after'     => '</span>',
				) );
			?>
		</div>

		<div class="contact-info">
			<p>+55 (51) 99942 0609</p>
			<p>
				<a href="mailto:falecom@elemarjr.com">falecom@elemarjr.com</a>
			</p>
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
