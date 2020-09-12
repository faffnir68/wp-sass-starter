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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp-sass-starter' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '3mY4AbM2fe3ZLY3kyq5piQ2qQu3erf90xr8twOtdT7OalwYz4DoKwWHsXbR9tCDT' );
define( 'SECURE_AUTH_KEY',  'QQ05lSKX9EIdgtfLUFqOpuVMIKsljKBiWfOXFBbylcaRr25KvMnDc261latksm88' );
define( 'LOGGED_IN_KEY',    'yQjSUDcfR7cEsiLkVH875w4z6BxJPE5h7BTSDyjwNeXPhdwy0np791pu2Re9oWst' );
define( 'NONCE_KEY',        'amrsis8VqAvhltz2Av0iiWqNX3gnYWx62vlfpHR0ebc5S8m1Zpu9lVFVWg8AgmCW' );
define( 'AUTH_SALT',        '9ZlP4ojUzi9uH5WAcNgy8XgqEYAo8slRtK4jxax6H5aC4rQL9NIoAOvezpPIGI3j' );
define( 'SECURE_AUTH_SALT', 'n6iPo06MdTi3ZCqLSJm9hQpLR0WCkOaaFlA1d7X8baOiYDcCIPLV2YxKps8YhAVl' );
define( 'LOGGED_IN_SALT',   'yxAGWCafJcFpJJrGERmY9ZnoJ3IGDKE21ZIF80YUFzqP5jOdqawwDpbyKDaDv147' );
define( 'NONCE_SALT',       'PtTKH3NkqtezNv0uMd1VrK7A7lQuji94B5sSc2A4a2B6ph3bX3ewZVUpP85GNBkL' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
