<?php

use Aztec\Helper\Template;
use Aztec\Helper\BackgroundImage;

/**
 * The header for our theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

/**
 * @var DI\Container
 */
global $container;

?><!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> data-bg="">
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'elemarjr' ); ?></a>

	<?php
		$bg_image = $container->get( BackgroundImage::class )->get_header_bg_image();
		$classes = $container->get( Template::class )->header_classes();
	?>
	<header id="masthead" class="<?php echo esc_attr( $classes ) ?>" data-bg="<?php echo esc_url( $bg_image ) ?>">
		<div class="top-header-wrapper">
			<div class="top-header container">
				<div class="site-branding">
					<a href="<?php echo esc_url( home_url( '/' ) ) ?>">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.svg' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) )?>">
					</a>
				</div><!-- .site-branding -->

				<div class="header-right">
					<div id="site-search" class="site-search">
						<button class="header-toogle-button search-toggle" aria-controls="search" aria-expanded="false"></button>
						<?php get_search_form() ?>
					</div><!-- #site-search -->

					<nav id="site-navigation" class="main-navigation">
						<button class="header-toogle-button menu-toggle" aria-controls="primary-menu" aria-expanded="false"></button>
						<?php
							wp_nav_menu( array(
								'theme_location' => 'primary',
								'menu_id'        => 'primary-menu',
								'depth'          => 1,
							) )
						?>
					</nav><!-- #site-navigation -->
				</div>
			</div>
		</div>

		<?php if( apply_filters( 'elemarjr_display_hero', true ) ) : ?>
		<div class="hero--wrapper">
			<?php $hero_template = $container->get( Template::class )->get_hero_template() ?>
			<div class="<?php echo esc_attr( 'container hero hero__' . $hero_template ) ?>">
				<div class="hero--container">
					<?php get_template_part( 'template-parts/hero/hero', $hero_template )  ?>
				</div>
				<button class="hero--scroll-button i-mouse"></button>
			</div>
		</div>
		<?php endif; ?>
	</header><!-- #masthead -->

	<?php 
		// @todo pass this code to `src`
		$containerized = ! is_front_page() && ( ! is_page_template() || is_page_template( 'page-templates/contact.php' ) );

	?>
	<div id="content" class="<?php echo esc_attr( 'site-content' . ( $containerized ? ' container' : '' ) ) ?>">
