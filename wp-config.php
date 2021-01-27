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
define( 'DB_NAME', 'wordpress_imelda' );

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
define( 'AUTH_KEY',         ')Dy8Ud<%%6bKI-I}I1Nf(31&-VfN?;?BVB}H2il9#`gz~[{5I^,3n ;-E@b;u-I8' );
define( 'SECURE_AUTH_KEY',  'ywlN?3RM:O@mcBct4[;x8#Z=+}K{c*|@.Ky^q`w.VIeCP4ipsS!^@NtvXu_@W[zA' );
define( 'LOGGED_IN_KEY',    '%/hw_~/s~KmIL&WJWQ:(Ssc1Ht#/Ei/5dXPfeATf)gQ0M{AT[Oy#lf{*MhNBtTs.' );
define( 'NONCE_KEY',        'f&2)}_WWUTci|)9C/GgpAyQz zJ>X~OcSH[rs3VJ=An65/(WI @/%!}%kP#:=pOF' );
define( 'AUTH_SALT',        'fux&rw=QdSt-cEsYV/akiI*/(bU~mm$?MQ1y4Y-ZF6Db@a@NP9~^ Nsb8FZ?WCgi' );
define( 'SECURE_AUTH_SALT', '<(46z[fDIp,LhtxNh lBDe-lM/lO;}`A[*?PCA2D[,FQa`?An%~;Ho(3iHm/oLrM' );
define( 'LOGGED_IN_SALT',   '/@j!U051;osso/T*^d#7^LH V$Ue6~x$Xl:*eW$N}}L6MR%GW0RViJv=2>WwNupL' );
define( 'NONCE_SALT',       ',I[`qfr,6*bNi)h{*|8###aK.[q4`Lzq^Mt/wZd],Hv2j+LS-Zo 3GX>/h8DJKGp' );

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