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
define('DB_NAME', 'malcam4me');

/** MySQL database username */
define('DB_USER', 'malcam4me');

/** MySQL database password */
define('DB_PASSWORD', 'fH74jp9T6SG1');

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
define('AUTH_KEY',         'Xix2%[AL<QIprizptv[ngoHv/~HF^+AoJ.Nulb|q@Dfx;y+S}onV}~;W&iLl0EJ^');
define('SECURE_AUTH_KEY',  '8GllrDEl6PJ~PYP61|C`+I$iV[>yt>+L2N-Z%MQ4bv*+TdAS|+MHP|`5bZak-{Fx');
define('LOGGED_IN_KEY',    'LjGc=ymo/jg+mwQV%[Yz^3EswO*s*zN~uXi/H|ygWyq|E:GM*f7dY7I!0b@E*v$w');
define('NONCE_KEY',        'i_D9KSo4u:u`n;:<RaRP+)jsxyFcISts}2I,aqS=~,CC+tc)t5?!7KB7+4.g+X+u');
define('AUTH_SALT',        'O7G|[x_&LE>E=U]41A{&&iJY]h_qqTI8NLIa89QGdvRUD8O)8v-+R~O$: jG=NNj');
define('SECURE_AUTH_SALT', '+UW*^BG/y36;)BM-Ryr@pgtCn*4Ui#2T)DA,cueL=&8L~}e5F&#)UGpM^d9}xB)%');
define('LOGGED_IN_SALT',   'f<>bW<-CQpY8;G<bar%u@J2;H);:9QEsr_bTtx8TA`UPj9^@MQ.Tz D6O!Z9@T:O');
define('NONCE_SALT',       '+b|AhVaEHl%0(!+m?pH doSe2W-x XT-&|g-ITHiVq!|ja}hvwR+=qVIMg2ikJ9n');

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
