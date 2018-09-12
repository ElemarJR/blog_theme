<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

$root_dir = __DIR__ . '/../../../';

require_once $root_dir . '/vendor/autoload.php';

// Load main env file
$dotenv = new Dotenv\Dotenv( $root_dir );
$dotenv->load();

// Load auto-generated salts file
$dotenv = new Dotenv\Dotenv( $root_dir, '.salts' );
$dotenv->load();

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', getenv( 'DB_NAME' ) );

/** MySQL database username */
define( 'DB_USER', getenv( 'DB_USER' ));

/** MySQL database password */
define( 'DB_PASSWORD', getenv( 'DB_PASSWORD' ) );

/** MySQL hostname */
define( 'DB_HOST', getenv( 'DB_HOST' ) );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', getenv( 'DB_CHARSET' ) );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', getenv( 'DB_COLLATE' ) );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY', getenv( 'AUTH_KEY' ) );
define( 'SECURE_AUTH_KEY', getenv( 'SECURE_AUTH_KEY' ) );
define( 'LOGGED_IN_KEY', getenv( 'LOGGED_IN_KEY' ) );
define( 'NONCE_KEY', getenv( 'NONCE_KEY' ) );
define( 'AUTH_SALT', getenv( 'AUTH_SALT' ) );
define( 'SECURE_AUTH_SALT', getenv( 'SECURE_AUTH_SALT' ) );
define( 'LOGGED_IN_SALT', getenv( 'LOGGED_IN_SALT' ) );
define( 'NONCE_SALT', getenv( 'NONCE_SALT' ) );

/**
 * WP Mail SMTP + Mailcatcher
 */
define('WPMS_ON', true);
define('WPMS_MAIL_FROM', 'mail@mail.com');
define('WPMS_MAIL_FROM_NAME', 'Mail Test');
define('WPMS_MAILER', 'mail'); // Possible values 'smtp', 'mail', or 'sendmail'
// define('WPMS_SET_RETURN_PATH', 'false'); // Sets $phpmailer->Sender if true
// define('WPMS_SMTP_HOST', 'localhost'); // The SMTP mail host
// define('WPMS_SMTP_PORT', 1025); // The SMTP server port number
// define('WPMS_SSL', ''); // Possible values '', 'ssl', 'tls' - note TLS is not STARTTLS
// define('WPMS_SMTP_AUTH', true); // True turns on SMTP authentication, false turns it off
// define('WPMS_SMTP_USER', ''); // SMTP authentication username, only used if WPMS_SMTP_AUTH is true
// define('WPMS_SMTP_PASS', ''); // SMTP authentication password, only used if WPMS_SMTP_AUTH is true


/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

// Enable WP_DEBUG mode
define( 'WP_DEBUG', true );

// Enable Debug logging to the /wp-content/debug.log file
define( 'WP_DEBUG_LOG', true );

// Disable display of errors and warnings 
define( 'WP_DEBUG_DISPLAY', false );
@ini_set( 'display_errors', 0 );

// Use dev versions of core JS and CSS files (only needed if you are modifying these core files)
define( 'SCRIPT_DEBUG', true );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
