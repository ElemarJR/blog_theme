<?php
/**
 * Init class
 *
 * @package Aztec
 */

namespace Aztec;

use DI\Container;

/**
 * Main theme class
 */
class Kernel {

	/**
	 * The dependency injection container
	 *
	 * @var Container
	 */
	protected $container;

	/**
	 * Initialize the container
	 *
	 * @param Container $container The application container.
	 */
	public function __construct( Container $container ) {
		$this->container = $container;
	}

	/**
	 * Load classes that add or remove hooks
	 */
	public function init() {
		$init_classes = [
			\Aztec\Setup\Textdomain::class,

			\Aztec\Customize\Newsletter::class,
			\Aztec\Customize\SinglePostBanner::class,

			\Aztec\Form\Contact::class,
			\Aztec\Form\Form::class,

			\Aztec\Integration\ACF\ACF::class,
			\Aztec\Integration\ACF\Pages\About::class,
			\Aztec\Integration\ACF\Pages\Blog::class,
			\Aztec\Integration\ACF\Pages\Contact::class,
			\Aztec\Integration\ACF\Pages\HomePage::class,
			\Aztec\Integration\ACF\Pages\NewsletterForm::class,
			\Aztec\Integration\ACF\Pages\Page::class,
			\Aztec\Integration\ACF\PostType\Testimonial::class,

			\Aztec\Integration\AddThis\AddThis::class,

			\Aztec\Integration\Polylang\Polylang::class,

			\Aztec\Integration\YoastSEO\YoastSEO::class,

			\Aztec\Pages\Blog::class,
			\Aztec\Pages\Contact::class,
			\Aztec\Pages\NewsletterForm::class,
			\Aztec\Pages\NotFound::class,
			\Aztec\Pages\Search::class,
			\Aztec\Pages\Single::class,

			\Aztec\Performance\Css::class,

			\Aztec\PostType\Testimonial::class,

			\Aztec\Setup\Assets::class,
			\Aztec\Setup\Comments::class,
			\Aztec\Setup\DisableEmoji::class,
			\Aztec\Setup\Head::class,
			\Aztec\Setup\HttpHeader::class,
			\Aztec\Setup\Html5::class,
			\Aztec\Setup\Navigation::class,
			\Aztec\Setup\Rss::class,
			\Aztec\Setup\Template::class,
			\Aztec\Setup\Title::class,
			\Aztec\Setup\Thumbnail::class,

			\Aztec\Shortcode\Twitter::class,
		];

		foreach ( $init_classes as $class ) {
			$this->container->get( $class )->init();
		}

		$this->forms();
	}

	/**
	 * Define the list of forms of the website
	 */
	public function forms() {
		$this->container->set( 'forms', [
			\Aztec\Form\Contact::class,
		] );
	}
}
