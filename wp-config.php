<?php
define( 'WP_CACHE', true ); // Added by WP Rocket


// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
// END iThemes Security - Do not modify or remove this line

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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         '+5YWJcp%_Y35[I[NXK,{C}A`9fe{23Ftk}Um0&QE.u%;NVa*Hx=ba2|!N|j)1(d~' );
define( 'SECURE_AUTH_KEY',  'ywIhv[wZa7A^v^$Pi(!u QvAM@2IC?LUKAP@HIWAveq1?`riwK=]^mrjH;r&DU5;' );
define( 'LOGGED_IN_KEY',    '8+*GCP{=@-+Pav0@atRtzWF1J+ 5/`bi2F)E_N9<miThl(d=gKT/*D,))UQa6xG,' );
define( 'NONCE_KEY',        'f*7rYf2{?`%?-lonxTD#So+*x*o--$@%+Br-PddS}nj9JhFd&62gJdC<`Y-Fz*s9' );
define( 'AUTH_SALT',        '|AV)oE~-DSlLJ)RE=ev>:(4P]iUR+7*~m&1:>y75[e2,xJP9J&=Ji}s-40$Cz.(8' );
define( 'SECURE_AUTH_SALT', '|H,:-)^.OSE5?~iD/W?2>F~~jUBtz_ylIBc*x(Hr*NJT`G-{:U[rcUp),${kgMFk' );
define( 'LOGGED_IN_SALT',   'Wq7q(Ubt><~>v7AE85<-{GCxqi-l{KN^xJ3^Hoz%1ujCIlX#h`jQz89h.6cm=E`A' );
define( 'NONCE_SALT',       'lonRAoC,}5Sl2s46T}0l$.;}z#;0gQ%&AS->|XVyu9dwJCMB9=uTbh*i{r=NO]Dd' );

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
