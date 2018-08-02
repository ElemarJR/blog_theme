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

	<div class="top-header-wrapper <?php echo esc_attr( $display_hero ? '' : 'top-header-wrapper__no-hero' ); ?>">
		<div class="top-header container">
			<a href="<?php echo esc_url( home_url( '/' ) ) ?>" class="site-branding">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.svg' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) )?>">
			</a><!-- .site-branding -->

			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<div class="top-header--collapse">
				<nav id="site-navigation" class="main-navigation">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_id'        => 'primary-menu',
							'depth'          => 1,
						) )
					?>
				</nav><!-- #site-navigation -->

				<div id="site-search" class="site-search">
					<form method="GET" class="search-form">
						<button type="submit" class="search-submit">
							<i class="i-search"></i>
						</button>
						<input type="search" name="s" placeholder="Buscar">
						<span class="search-close"></span>
					</form>
				</div><!-- #site-search -->

				<ul class="langs-navigation">
					<?php
						$languages = pll_the_languages( array( 'raw' => 1 ) );

						foreach ( $languages as $lang ) :
						?>
							<li class="menu-item<?php echo $lang['current_lang'] ? esc_attr( ' current-menu-item' ) : ''; ?>">
								<a href="<?php echo esc_url( $lang['url'] ); ?>" class="menu-link">
									<?php echo esc_html( $lang['name'] ); ?>
								</a>
							</li>
					<?php endforeach; ?>
					<li class="menu-item">
						<a href="#" class="menu-link">
							<button class="search-toggle" aria-controls="search" aria-expanded="false">
								<i class="i-search"></i>
							</button>
						</a>
					</li>
				</ul><!-- .langs-navigation -->
			</div><!-- .header-right -->			
		</div>
	</div>

	<?php if ( $display_hero ) : ?>
	<div class="site-header--wrapper">
		<?php
			$bg_images = $display_hero ? $container->get( BackgroundImage::class )->get_bg_images() : array();
			$classes = $container->get( Template::class )->header_classes( $display_hero );
		?>
		<div class="site-header site-header--image" <?php
			foreach ( $bg_images as $size => $url ) :
				echo ' data-bg-' . $size . '="' . esc_url( $url ) . '"';
			endforeach;
		?>>
		</div>
		<div class="hero--wrapper">
			<?php $hero_template = $container->get( Template::class )->get_hero_template() ?>
			<div class="container">
				<div class="<?php echo esc_attr( 'hero hero__' . $hero_template ) ?>">
					<div class="hero--container">
						<?php get_template_part( 'template-parts/hero/hero', $hero_template )  ?>
					</div>
					<button class="hero--scroll-button mouse"></button>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	
	<?php
		if ( $container->get( 'display_breadcrumb' ) ) :
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
		<?php if ( ! is_front_page() && ( ! is_page_template() || is_page_template( 'page-templates/contact.php' ) ) ) : ?>
		<div class="<?php echo esc_html( ! is_singular() ? 'container' : '' ) ?>">
		<?php endif; ?>
