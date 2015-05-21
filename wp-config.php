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
define('DB_NAME', 'Imaginewindward');

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
define('AUTH_KEY',         '#41a|CULf)!o|3nF|Y2f|*d^/FZV#Z.pMhe8zQI0(tq7g#4@(,Y5F!J#F+A&1JnK');
define('SECURE_AUTH_KEY',  'U-(AV[s?KVh-(*7D?HvG[y-=B]rn8EXd:C(QSI|U0_8k+.<>Fad`wY|@^DHhF,ou');
define('LOGGED_IN_KEY',    'YR=;r0d!C9_jab7MLCWKsvo#^~7p[[rp.`G<L:`!jeXg 1Y%@tX]MCC{t^l!.t_8');
define('NONCE_KEY',        '=>>@[sX+0xEQe!E>`B,J+[I0Qy?]0tE.+0I2w?Cy7vP9QBSM=#u[rcuI21c6hPA@');
define('AUTH_SALT',        ',+:dt){!~y/^g^__ZlPXa@rsP(*Pc{6zLa4zudc(eeng))Vk%*B_ DCKeq>l-_+!');
define('SECURE_AUTH_SALT', '->)Q-g/{N9lDY0kU5`z^F_iH6 k4Y{${z9lZl~yYgPsNri[?+*,WPEI0zA{:ZS}N');
define('LOGGED_IN_SALT',   'iG+`:-[.XCee+7LCQeDb{@#1H+~]_lS]4I0V}t8qQ7lyDk#pX2@7NL%1a>9D:t4Y');
define('NONCE_SALT',       '#1,0Xaj)eE {_Of&.3~c{Uif1&(XA>yY|3UMzdA]4Gd=!M?D}9KB PG0]fFk#03?');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'iww_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
