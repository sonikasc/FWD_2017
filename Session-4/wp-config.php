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
define('DB_USER', 'wpadmin');

/** MySQL database password */
define('DB_PASSWORD', 'wppass');

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
define('AUTH_KEY',         'AlDmLsd(CCY}5(CYi-U,4AkjQ hC~}M=,z4R ~Z-CeGJ_]o|+Fc70mPclpG5bfjp');
define('SECURE_AUTH_KEY',  'zJU<ta]M+,F{wM0z(3.OVmL!o6l?ov]4(NbSE]Iz4&atwSG_%p Mst_aBW7M$@J1');
define('LOGGED_IN_KEY',    '*O33yK~yZwA5@ls!u]Me1neUmqoTM#dk)pQQHapui@- H#<}dF`cR#p4*%AjWp`L');
define('NONCE_KEY',        ' bE6.gXQS|{Wcz]Cz@!gqg O4>OI`@?U{vv0TTTpMDf(X 4_gOww_z,##6t_Us*q');
define('AUTH_SALT',        'a7Og:+%Fcn2o-<lC|xDj44kTX(F~ZPFOO ~rJkbQDbSx_%uS0m#f,jX=Z_VlUoa;');
define('SECURE_AUTH_SALT', '0G:PNr90i&ELhU3AOI}:~aeKNH!LPr1.,9`PaGC3./4G^#qez@-0%Yiia[d:AtDd');
define('LOGGED_IN_SALT',   'C4fNN_%{0h26|wIF7QR)gh=N.45U0cu}-8kYt}:|LN^<1v*zcE8ZqN-`}z(T=PGJ');
define('NONCE_SALT',       'M3dg/npG8Ni0bj}QVvZ;g4 j1fV:A?&H-tcM5khsBYZuUmR3GVgN3Q/RkW/3||8a');

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
