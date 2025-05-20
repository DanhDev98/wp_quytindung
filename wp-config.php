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
define( 'DB_NAME', 'db_quytindung_taysaigon' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define( 'AUTH_KEY', 'n4&a|vC!NffHM#g DXPBF0cJhhkPIhh|2_/{;zi7qi@[nc;P]_{Ce{T@Sk3~!0,%' );
define( 'SECURE_AUTH_KEY', 'CJFZJMC>iB0}9|gg@NcT=H+X|q=?KD!UB+6:L %R4@SK9BK{Z7L?}v2~TvdGA2dd' );
define( 'LOGGED_IN_KEY', 'gX|z9K9-:(.:)ona6oYbs81JIg j#zq^LJY#&|~7y;[_]Bsk-35 .xSD$b}=Pd }' );
define( 'NONCE_KEY', '(y{*18)_A0pmR<XvMYZ${6{yIrma; (fdZi4(Y)h2helXw3kL:O(_2EdH_ls,E7g' );
define( 'AUTH_SALT', '4cmt*79-(hyD6l@0_<n|Y:tnNo]0J(@T ?Q:r.36CUCLy5?-84S>$?6K-?*f91oz' );
define( 'SECURE_AUTH_SALT', 'HLWjbSO8)h! Sf`Pa;]C*QQsWlxG}-Lw _&[[ub72JL5kLddoBydbX-zSG,`/ iI' );
define( 'LOGGED_IN_SALT', 'm8g*=KIWj?j,Ht?$vyI)I)zb.?_u%J;k2ERba% $KT5>Q&]E7RHZ5zbVW@|QLiKd' );
define( 'NONCE_SALT', 'C]wSY^d%eKr g?EQ*p1^|sv7Obi_QWKON]=}gONdVq|#D{knBNlv.2HjDel2X:&2' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
define('WP_DEBUG', false);
define('WP_MEMORY_LIMIT', '1024M'); // Tăng lên 1GB (cẩn thận dùng cho XAMPP)


/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';