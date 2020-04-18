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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'nogardglobal_newdb' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'u,=(yXoK`z[:4w68>A$d+zop<o?|1M8${m|e<kI:l*54Gb&l+&t6kq! [Pt0u8~*' );
define( 'SECURE_AUTH_KEY',  '-+EI2]Qzv0c5wA4fS+6:Noqbn,haKfVD-3$L?IU&uGh2y*ujO*@ _ax/+V|GzVG#' );
define( 'LOGGED_IN_KEY',    'hbp{Qt$t1hbvA6A Zp)ab^5oVf76Cg*VZW^%qtCaFng#4Pbs2cY5?2Is,5K4=,{a' );
define( 'NONCE_KEY',        'j#yxeM4HNR,5QGgntx`a.;o]Z@IP}TNCoy*=W.AKby.{vFsiYvi2,6NiG}Jl($ U' );
define( 'AUTH_SALT',        '8&+jh9AD~7O&1g8u`ZfAoIvUUtXoAoJNM|S2:CO_<F,AJWF2+5XLK`K%g5D@I$c*' );
define( 'SECURE_AUTH_SALT', 'x;5?fXVRb,NAp-13T@t?Qc7V33?V^d)g]}ZYu*t],b/i&&MJ|(O,z|=9<ZQmU{<k' );
define( 'LOGGED_IN_SALT',   '7glzW?Jq7;0/dmCL62:GT9e[.ZQ]sb.O#d4!=K.Qf[jqsU3R0V+<r}5,1N.#go`]' );
define( 'NONCE_SALT',       'n1}xpqX=HOibVErWcL_>C/NkXOP{GC|VC3j)Q*viW7)`y[#bI`}`RSNez&PAk&gC' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

// added by fel dev
define( 'WP_MEMORY_LIMIT', '256M' );/*increase memory limit */
define('DISALLOW_FILE_EDIT', true);/*this will disabled Theme Editor in Wordpress Admin*/
set_time_limit(400); /*increase wordpress timeout */
@ini_set( 'max_input_vars' , 4000 );
// end

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
