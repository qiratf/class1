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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'class1' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'c)Pi+>n!vLm^HAjL4:a|@sN Jr]D?42D#9%{-!l/TK|*><Y-f> F5ct%M[$0Sm?}' );
define( 'SECURE_AUTH_KEY',  'og8dZmVSXX4180xCsj1} +oK?c[NpBrVkHD:Oc]^S.h^Hl+sD6_W$FLPxnJi/>Rs' );
define( 'LOGGED_IN_KEY',    'UMz+Cal,8Vm&=Y{JXtM|bY.9$5!.2Eu5?:8kI=0,&vC>OM`LQ1se@5U=_#9$lL_h' );
define( 'NONCE_KEY',        'm`Ny5){~+<80j4i|g*+?c)[tu$6Lo}tgLPKZYkvbsHi(&^@*WN#glv!)}?Tf<B~o' );
define( 'AUTH_SALT',        'WMj/$eruc~<m6p-IW<zPBtENft{ |ety3Se8njrV@7F6Hg!.DWd3ql6({%D{yqyG' );
define( 'SECURE_AUTH_SALT', '-uynVz54qyt/H|;vXM34fG!h+H&Jl3|ecHb-_0UGCysZCR:IJ$%0=0rL?=GJ;<3r' );
define( 'LOGGED_IN_SALT',   'B@j|%|E:S2c6OPEz(A5u-(yZFT(,[E`vMHydl38F#Jr$8tx;3+9=q+]B=u[IH.>)' );
define( 'NONCE_SALT',       'leAT~|Wv#-s(fIwK<l:Ry`@9G[v|Y%Zgo7CKbh@0!Q{WjSo|C6w, x!&A%`d,3kF' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
