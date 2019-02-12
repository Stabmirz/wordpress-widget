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
define('FS_METHOD', 'direct');

define('DB_NAME', 'widget');

/** MySQL database username */
define('DB_USER', 'widget');

/** MySQL database password */
define('DB_PASSWORD', 'Password');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ')|+ij,Z:W.RQ<ZERFU4z,~t?Tu< E]D%d{ e>]M<)5z(tJRfS,ht>@GD[V?>Ok$e');
define('SECURE_AUTH_KEY',  '7HEk:v3B72VM]:<HJ&.4VMw=Oy*&%!dm*Fg{&C1G=7f465E# =<&_xqt_UahV0;B');
define('LOGGED_IN_KEY',    'DjuJlI1LIGi;KY4,SEW42nm(Z^+hY4r}70)*1Gn[?ZQ=v:Pvv#(8*#sf-?%SMbUG');
define('NONCE_KEY',        'Rk#1`%FQ|/<:)Bo9OhF^1JM_A6b~AD|QpANSr$^7m#-=d,s,t)5%<_,-kuO I+aO');
define('AUTH_SALT',        'yN@lwX89@M<w<TP#]Wxum!r/COt.)7gp<<[DGNB7LA!lU7u8d+i z7}LS!q]W/DB');
define('SECURE_AUTH_SALT', 'tHjb|{Q%SvC:GP}$.$L6h0Q#>@`q:@DMQ>6`,%<[[>$&L:|DO_meUDLkYZya5(IJ');
define('LOGGED_IN_SALT',   'SSypk)3.Z=]pcj!r=D{*yu[2*5IHN:^i}6Ab9Yk<r/i^~QtL`E=(LQT-033 EAu#');
define('NONCE_SALT',       'GIlw87yS,0w?Tg8LUU00<ftq[Z{^P9Gq)@ke1 }eAZh1CtO^-~=w6Nh+L^r)pt}O');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

