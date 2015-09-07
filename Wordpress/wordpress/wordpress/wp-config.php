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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'trophic');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'h(kG#V!X7jc-`AIS:ip5,&- kx?`xYW-IWmeSEIi+2W+0vNy`M+U,--e[!|fX, M');
define('SECURE_AUTH_KEY',  'PO0]%0XMZW;8[9WUR_b+G%|m8#k.{:hmgWiRD,vOJbPePE-z9n;|6=xHOmnDMlm|');
define('LOGGED_IN_KEY',    '&O|*<V5,g|gk!l^RP/aw@78)+-x-FjV$R u-j|_bZGY*r_bU$7,eNA!`G=?>1y9%');
define('NONCE_KEY',        ' 5|+|uwROl!&QoJ;/=BB.+;zl627??ki^h,QXC(#-i->x]T+]E?c|?fOM(bt-LUh');
define('AUTH_SALT',        'yv@@*2GzMSGgj+x>gMemu4z@|[W*M/:r7=erdp[7auQ1ca1(]C;{Vy<)SWQHd+or');
define('SECURE_AUTH_SALT', 'f2&8Ew-`(&9+0bk@7&6}9tW+*=I8AF=sN= }KO#4-JUn!pP][6DJ@|B5(Q*6g+6 ');
define('LOGGED_IN_SALT',   'w.C> , [|~&+CN+FY,Id4|F(x4q#TQ{DTD:k5F$0M(EzwU%~o*bX>@saUsEgfzCt');
define('NONCE_SALT',       '%7qU[>]2oW&tOPPQ>y91xd!8~R01io/zo<e}Wnu*+|?]>O3xK?&~7n0P1~K+b>vi');

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
