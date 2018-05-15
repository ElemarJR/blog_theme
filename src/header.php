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

/**
 * Display hero in the site header
 * 
 * @var bool $display_hero
 */
$display_hero = $container->get( 'display_hero' );

?><!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<?php wp_head(); ?>

</head>
<body <?php body_class(); ?> data-bg="">
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'elemarjr' ); ?></a>

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

	<div class="site-header--wrapper">
		<?php
			$bg_images = $display_hero ? $container->get( BackgroundImage::class )->get_bg_images() : array();
			$classes = $container->get( Template::class )->header_classes( $display_hero );
		?>
		<header id="masthead" class="<?php echo esc_attr( $classes ) ?>"<?php
			foreach ( $bg_images as $size => $url ) :
				echo ' data-bg-' . $size . '="' . esc_url( $url ) . '"';
			endforeach;
		?>>	
			<?php if( $display_hero ) : ?>
			<div class="hero--wrapper">
				<?php $hero_template = $container->get( Template::class )->get_hero_template() ?>
				<div class="<?php echo esc_attr( 'container hero hero__' . $hero_template ) ?>">
					<div class="hero--container">
						<?php get_template_part( 'template-parts/hero/hero', $hero_template )  ?>
					</div>
					<button class="hero--scroll-button mouse"></button>
				</div>
			</div>
			<?php endif; ?>
			
		</header><!-- #masthead -->
	</div>
	
	<?php 
		if( $container->get( 'display_breadcrumb' ) ) :
			get_template_part( 'template-parts/blog/breadcrumb' );
		endif;
	?>

	<?php
		$bg_images = apply_filters( 'elemarjr_site_content_bg', false ) ? 
			$container->get( BackgroundImage::class )->get_bg_images() : 
			array();
	?>
	<div id="content" class="site-content"<?php
			foreach ( $bg_images as $name => $url ) :
				echo ' data-bg-' . $name . '="' . esc_url( $url ) . '"';
			endforeach;
		?>>
		<?php if( ! is_front_page() && ( ! is_page_template() || is_page_template( 'page-templates/contact.php' ) ) ) : ?>
		<div class="container">
		<?php endif; ?>
