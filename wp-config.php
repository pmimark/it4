<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'gocredit_gocreds');

/** MySQL database username */
define('DB_USER', 'gocredit_gocreds');

/** MySQL database password */
define('DB_PASSWORD', '1y6S)P)VU2');

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
define('AUTH_KEY',         'qma7tpgkzbjrt45164cpxlzdelxny64w1eehcxzjg8pac4yu7zqgrl6sptdjr9wt');
define('SECURE_AUTH_KEY',  'wyn4ngh89zcy7tbqz6l4xr1xkt9p6421t2bckvd0h2jf2kquolkyr0wusjgi12ay');
define('LOGGED_IN_KEY',    'iaaqlofthhgcm3tbpvqdwtfpcc2i13ccjikqafmqih6v8nmajfrwch0ji9dfg9qb');
define('NONCE_KEY',        '2de92lcwtnf9wn52wxgb382npvugfqizgsx1nvqlq3mxafxkyi5hhorxopphjenk');
define('AUTH_SALT',        '2rykt2075vtoprixmgiqmrmmcju8xrv0zgyrjyqub2w4nviujwuqjrhqrr8oaqpc');
define('SECURE_AUTH_SALT', 'bh1vhasuhefdq4njhay1iwr349vctezwggocprufhn7mjqkhpn3kytnz0neqlo3s');
define('LOGGED_IN_SALT',   'dtavixokb6olfgx3sxxevpnqyxt2w88lkafrscea1yglvgaw9mmfj6leqtn1gvbg');
define('NONCE_SALT',       'blyzmxotezntvizmmxnwu5zmmwzdq0ztg5ntdhyzm0odg1n2i3ztk0m2i4nzvkyj');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'sc_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
// error_reporting(E_ALL); ini_set('display_errors', 1);
define('WP_DEBUG', FALSE);
define( 'WP_MEMORY_LIMIT', '128M' );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

# Disables all core updates. Added by SiteGround Autoupdate:
define( 'WP_AUTO_UPDATE_CORE', false );
