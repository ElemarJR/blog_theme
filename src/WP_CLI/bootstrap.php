<?php
/**
 * Custom WP_CLI bootstrap file
 *
 * This file is loaded by the Composer.
 *
 * @package Aztec
 */

use Aztec\WP_CLI\Dotenv as WP_CLI_Dotenv;

require_once __DIR__ . '/../../vendor/autoload.php';

if ( ! class_exists( WP_CLI::class ) ) {
	require_once __DIR__ . '/../../vendor/wp-cli/wp-cli/php/class-wp-cli.php';
}

$dot_env = new WP_CLI_Dotenv();

\WP_CLI::add_hook( 'before_invoke:dotenv salts generate', array( $dot_env, 'ensure_salts_file' ) );
