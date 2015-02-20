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
define('DB_NAME', 'agape_wp570');

/** MySQL database username */
define('DB_USER', 'agape_wp570');

/** MySQL database password */
define('DB_PASSWORD', '43P684p3Sw');

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
define('AUTH_KEY',         'ssbxl3lxxbto4mxumdydkpqjcrkj0zk4fdlsz0xqeg98hnliulmg7yyliavczlc3');
define('SECURE_AUTH_KEY',  'lwyrz1dhpsvrjsdg8mjf2wl1bsrem0bowrgljxohr3cy7qjvcl39avd18lwllbvp');
define('LOGGED_IN_KEY',    'qz3fcqibfkoxbjnouavrogw7f1gq9faxegeu1hmpdqbcrzwuhf6drqwnxbekpork');
define('NONCE_KEY',        's4kzy2h16xsqd5ujmjcqvu2mthfq7mcdetbzdamiqz9nfsivr45gbzh3roh3zjcx');
define('AUTH_SALT',        'gklcrtfezmrqql8bskhawk9gt0lapolyqrwd5c93traml88xw8jgcp0btuewu9jz');
define('SECURE_AUTH_SALT', 'a5ud5jmahipvfvjftlgxm1xhqozkhbwcx8ycepujolikqfmzydt9upthmbryahjv');
define('LOGGED_IN_SALT',   '960gd4ofp3zcbhj0rosysd2aejzupspokuj4rztjceykmdgbpz76jqqyz39bzzbm');
define('NONCE_SALT',       'amfqcxyn1huge35oaeqedpnekuuxx7qbvo0syvkurghw2liclfhpv15ex54onhjz');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', 'en');

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
