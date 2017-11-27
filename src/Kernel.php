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
			\Aztec\Setup\Assets::class,
			\Aztec\Setup\DisableEmoji::class,
			\Aztec\Setup\Head::class,
			\Aztec\Setup\HttpHeader::class,
		];

		foreach ( $init_classes as $class ) {
			$this->container->get( $class )->init();
		}
	}
}
