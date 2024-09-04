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
define( 'DB_NAME', 'db_V2euzvg41xmy4QPBvU' );

/** MySQL database username */
define( 'DB_USER', 'usr_V2euzvg41xmy4QPBvU' );

/** MySQL database password */
define( 'DB_PASSWORD', '(h.Yj5{i7~:~nWwxHa' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '@o58lWyUIc=O/4e7Zu/;/e6H<0Pyot^#)U4K-t~Mv_DU;^k(Mnx/6g@nv}EWC2@>' );
define( 'SECURE_AUTH_KEY',   '+*0F#oLNnB[PN9buh4#EczR:Zw=`*qi`m~d<Kr=L*O^`UVrwU/>=vi)Kf]r75o4n' );
define( 'LOGGED_IN_KEY',     'RS{4R}!;*q+FW%{&C]W-O&NsHlS5y:[t]VE#[>f.|J~9*Q=p&7(BD-I%1imVQW6g' );
define( 'NONCE_KEY',         'jEJ.eu/WW:Ts^Y-rfQ]<iW>/3Y^H|@mAfP5wi[+e[t?/j1^H5I3J#8cmG/%7K3xy' );
define( 'AUTH_SALT',         'I@l- )@[&Z={M2sxCv?;ZTfAH*eYW(/kQ17W[1xTqQ=G[G([([Pn4nYce!ay}q,s' );
define( 'SECURE_AUTH_SALT',  'P)eKMM;Zp8%m(:1l+8H{UP*{`)s0,P_br9F87<4=WQ-p(qV$%vw}>o6<u.B( >hp' );
define( 'LOGGED_IN_SALT',    'n3_9k3+n!8}BX#.$nkX$2A$~EO!2_z`nbx~-A:87:Smy:{ZZdkWLfZ#ubjH}7*h`' );
define( 'NONCE_SALT',        '4)>g9fZ+ySe2 =b$uE5Ae}UKUyWm7#he^0I& 876YUxxnx9)T`{I(lnNw!]GZLWp' );
define( 'WP_CACHE_KEY_SALT', 'BVM8|Xe@4ZGkc}hi.r2;(S;ss@&|:Bn8LM<H_7qu(NY6BEeR>;Cv|[FAx.w~&]=M' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'qww_';




define( 'AUTOMATIC_UPDATER_DISABLED', true );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
