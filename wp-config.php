<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'momiji_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'rUYFA8_/z ^,hQ!c:rJ5c&-ifBo>DI,zNDle{sPkuKC)&u~) RLGQCHe8[CbtRB+');
define('SECURE_AUTH_KEY',  '*iB|*q[Vr&H|lH%H9(K+o1bUqC?Y_{=~ OlO.f9-2V-O/i(b$rchw& (MJa$sU;/');
define('LOGGED_IN_KEY',    'v,|_US`ojk+a+)BYbFpVW:7:&<%8AdBe}7xyoeO$Pk*|;~uwO2vm]Sl4~/u:}r_ ');
define('NONCE_KEY',        '0}yHTNQfU2[D$A.2H(b%PD1:~c`ejGdW/HyV=DdFsJ| }nyrA*Yx>jYj@XhU}`3F');
define('AUTH_SALT',        'SzRfZaa1(q=iBQ}iMP;GOG4`Xpn8.-Y=Y+JJS-5Ycyc3c|Q4Ys.b|`Z|-<s]8a],');
define('SECURE_AUTH_SALT', '7%;q}QR#7iNq ~>[J-H+YHyEeIzZu9PH++-!4Kk}jv6AQO|+4J:pT-&^|ugc!1ma');
define('LOGGED_IN_SALT',   'M2exp~SJJm3+Q;Mwyh~O.P4=79=::7f#ij1%FpDCLI>H,X,oNs=BAk~  HSV8HYj');
define('NONCE_SALT',       'y9[ DyKo4CT$[iWK1<q|yZZbeF;hCU-sz~YY%zft{(1+*zsNX<. !I13-9Zi|*{w');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
