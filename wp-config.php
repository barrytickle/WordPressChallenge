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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'admin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'webdev' );

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
define( 'AUTH_KEY',         'q~S7~;qyNCAR,S6_Mn6ECr$wnqt_r8qxFc]$ISE/|92u~|hzK#O<bX65MZ~k_~Xg' );
define( 'SECURE_AUTH_KEY',  '0vWv2uY*9:m[5~(|~Co0GH_3J8zgPfdu0FgG .w}H2P;6fJwb5hDZP+Lj]e7<}1f' );
define( 'LOGGED_IN_KEY',    '%J;|9]&6tc(O:Ca$H12g*L`o^_O~![8qXkZ8{!`i_#0&Q)F1I>!F`[yHZD,t|d/Y' );
define( 'NONCE_KEY',        '1Bznh{FE`!fR{ek7F[LC4t:c@5O0wSU4jQH7L>$YA6K3mnv;51gD=[}hN}gvZjbb' );
define( 'AUTH_SALT',        'O.O=EMU>W}a(0@I|/+Aufv$Mh1RtsFW}P}F3jgO#8jZpz=?1d|6ln(_P8?8k(&cf' );
define( 'SECURE_AUTH_SALT', '4qnAKFn]8OGqp[!#:lOMW%zPxQZ_Zv`y^jHTh|_?])jJD0{R&R7%aPV;@PO)5Rb]' );
define( 'LOGGED_IN_SALT',   'Lt%7F3,mh|&7b%uF8bsP2F>[Y-5%7Gq>Cb8TbN&{YGX0cZ2fEil;$o_^+iHjchy$' );
define( 'NONCE_SALT',       'D0%BsC}f(ERiIK3w[:hQW?gPqbLs]y^^xeREpmo5oqB+; d{I#`XJ_<8$p,r,MMO' );

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
