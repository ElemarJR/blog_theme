<?php

use Aztec\Helper\Template;
use Aztec\Helper\HeaderBgImage;

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
<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'elemarjr' ); ?></a>

	<header id="masthead" class="site-header" data-bg="<?php echo esc_url( $container->get( HeaderBgImage::class )->get_header_bg_image() ) ?>">
		<div class="top-header-wrapper">
			<div class="top-header container">
				<div class="site-branding">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.svg' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) )?>">
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
							) );
						?>
					</nav><!-- #site-navigation -->
				</div>
			</div>
		</div>

		<div class="hero--wrapper">
			<div class="container hero--container">
				<?php $hero_template = $container->get( Template::class )->get_hero_template(); ?>
				<div class="<?php echo esc_attr( 'hero hero__' . $hero_template ); ?>">
					<?php get_template_part( 'template-parts/hero/hero', $hero_template ); ?>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->

	<?php 
		// @todo pass this code to `src`
		$containerized = ! is_front_page();
	?>
	<div id="content" class="<?php echo esc_attr( 'site-content' . ( $containerized ? ' container' : '' ) ) ?>">
