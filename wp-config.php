<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'Dotsavvy' );

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
define( 'AUTH_KEY',         'u7}x$|&6IEHz`+;0Qtv. e{Z$9CA@}*tbz5j~<?8BU3n&kwMp!,+pk$9W1t1vH%y' );
define( 'SECURE_AUTH_KEY',  'XK]Di[.3`>ip)_.l2=pNA-^c;|0d;uuEKykGFi-d!?GGptk=bL#|4Hd`PI=A7!.l' );
define( 'LOGGED_IN_KEY',    'ixR%NT 9:$F<D4! Z.n(Q/3|`&_e)P+Y8cz/,A`rC;Qnu/+J3mRN&@e/|I*KSXX-' );
define( 'NONCE_KEY',        'S0F[7=NNu}kF%_OR-vF=%?W]X)&;-dZ@Rv^o|i$|W6baU@{<Y.`x^&)df,dLMM$G' );
define( 'AUTH_SALT',        '-BwfpP+_]-=$}xr2zd(e-4*(o26`(<j.2;y;;KD2Fq:{Je;4@)PbkZ(hjy3hPJh>' );
define( 'SECURE_AUTH_SALT', 'rD5hKm8PN6;(:P$CdC:HEi3bE5zN<unsVm70 yiruDYi(.y,?*$PG=Bg:;faD26o' );
define( 'LOGGED_IN_SALT',   'b{Krb $nZcp>iJ-G)9(Zr=[1n!2(S;:HH_6;CiKpoc!-P<Tuq]Tj.e^/,ZuO>v[i' );
define( 'NONCE_SALT',       'Un/m8(O(]J9%XoIp<cHrL]Yocp4Yamye|il.]%Or#-Y0Wj=LfRT6jlW1UwF_bEe=' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
