<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}


define('AUTH_KEY',         'E6wHYxc0edLuyKbrsKJMDG8OrZFutP/4AN0cc+fEn5AAfDQOlpDJnehyXG8CVcYl6AUJhZRunrbM47aW8uCuig==');
define('SECURE_AUTH_KEY',  'KeuAyMf/ZwwRgj9gzYFwKBbTAZJ6KwfBI9sSZFY4smiaOuuttU5TIRgRrlpa0bZEhAXxPCh25L6oQj+ppivB4Q==');
define('LOGGED_IN_KEY',    'RNrvDhdDjgnnT8hAkii2TX1gxqHnF6YglmYlG6m7bnovYTm4e3PQIO9UH7mCRYRpLY6Ovg3Fhgw+ZBAEswqZFA==');
define('NONCE_KEY',        'c1WCxb6ULojJ5Cl7r4tKX/0ibe1B9OnTNG9LGl1H+FDX4h6eQJ5gMO0rJAShhxUFFxfQIsFJtyYNVeNcZSnduA==');
define('AUTH_SALT',        'Zz6Vq1ukjrJQ/0SIy/bHIuqC9pP8revEgdYoRQbDItzLyVUMFbffBcP9zCM+WE7Y+xQbEYFOYMBcZDDpZrUkVg==');
define('SECURE_AUTH_SALT', 'EPE/i5wg9TRSLajAatlaugIg1g8J37ffwucsQfEld79AfKvlXdQfQE5boUmq6hN7WfFO7qsYtWwyTfGDgHGDgA==');
define('LOGGED_IN_SALT',   'HFDTRpe/6cZrMiryjLD960CifTUYr4mxYLR8zR6a72m6ohTQqvqBuZ811oNIUngUhVWEtAMF6unGzuBa5G1dlQ==');
define('NONCE_SALT',       '+mAJ6s5kiuYUwggcTQrgqbF65++uEUAp2Z/IE/zHTBelIZsGCtvvcK1yN7nNSGjwczDMWtK9LPzwH0zyqlCZNA==');
define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
