<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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

define('DB_NAME', 'gocredit_db');



/** MySQL database username */

define('DB_USER', 'gocredit_db');



/** MySQL database password */

define('DB_PASSWORD', 'iwB%zTsW$nn[');



/** MySQL hostname */

define('DB_HOST', 'localhost');



/** Database Charset to use in creating database tables. */

define('DB_CHARSET', 'utf8');



/** The Database Collate type. Don't change this if in doubt. */

define('DB_COLLATE', '');

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0777 );

define( 'FS_CHMOD_FILE', 0777 );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */

define('AUTH_KEY',         '+y)P%/AEsH@S/1:*:I5R2RE+::o{,HP>SM grE<}djF/sCcv}OxEzj/+-vMb&BE$');

define('SECURE_AUTH_KEY',  '4q}=<yA|4TXIAinvkbPcb!3 >a&<Y-N&1|e*yT@xp%ja)oND/l4T5j=h9Wu-Q[{+');

define('LOGGED_IN_KEY',    ']|gWa5haS+Y*w/v)_MBTR4QudD>5Zf5~HhYnY/R 1F951YKeze/++Xo+p``Sgytw');

define('NONCE_KEY',        '@leS75JMu$+Hd@EM?;9F[/4h PwJM,B T+&Ig_BTB+T^4}tMNG9L+$btmucYj|}&');

define('AUTH_SALT',        '=@NMu9mT+;5DW%/,@YaSOAKxhd~t`kU@X+zwaLkt&QQ`tP>,N}NW=M.WUAtx&I<o');

define('SECURE_AUTH_SALT', 'c=XWOIaF[iiv~0^_Or${-9979Vdp8^H^eKlSxS.(f<XH5rN?NV:/@F<~.i2y-f5.');

define('LOGGED_IN_SALT',   '}15gclwP]dcewjN7/cl<r?06ioatfdV<u5^HVm|5qTfYLX;?YKfmr,}06Q`SS#Tm');

define('NONCE_SALT',       'Dsr*:&0&}WR_CZ]h9(AL7Vk7.<_rK$w0ce-2nuy?_+_KN|iKc&%vEzj(Jlk8gxXG');



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

define('WP_DEBUG', FALSE);



/* That's all, stop editing! Happy blogging. */



/** Absolute path to the WordPress directory. */

if ( !defined('ABSPATH') )

	define('ABSPATH', dirname(__FILE__) . '/');



/** Sets up WordPress vars and included files. */

require_once(ABSPATH . 'wp-settings.php');