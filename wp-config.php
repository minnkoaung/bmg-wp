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
define('DB_NAME', 'bmg_com');

/** MySQL database username */
define('DB_USER', 'root');

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
define('AUTH_KEY',         '31}l }iDuKj`@*b)a!`u_e>:jN7(!9vBZS0/yYkhX!B4qucqdlxQ{rI|)u ~l%[(');
define('SECURE_AUTH_KEY',  'L%@4!(y+3xsDyLZGNTD~|:Ec&ifwl.J72LivA(PEr+as!{Yf^?n17Wo]]G*UDa=/');
define('LOGGED_IN_KEY',    '6}KfEC*u|/GpN# aS6O^tNJryX!S(}cd72VG9:/e8|7L@]-kG{JbEW9?#[.b(`*J');
define('NONCE_KEY',        'n;/& {S!>>>Dy&lryAaypTr2@?bU=yhgdeWxfek>Wh^6~@?cH2, %itm4Mil+(kT');
define('AUTH_SALT',        'hCj-cTZi_nh1_Nd>Q$,j8f,]/)t=7Y~:pKQ+(5`kd[S0#SUI*0JJe$5VlU(J@#;A');
define('SECURE_AUTH_SALT', 'Q8/sV6*aV%2XsF.A`A5F}6j~gSi_.b dYQTwvaGy|<>Wq ($:iyu}SA~`N~|/~73');
define('LOGGED_IN_SALT',   'u`9Zm6X6XQ^ZRevE%R_dNIESK77?7loJ2,LKNXD%0<S #>b$L[j55D(G(.9e&lLm');
define('NONCE_SALT',       'RRFNi)Sv/P|>S8Z*}av-N5S@y}qarHJq$.r5/3~o:?)7J[ OkW0kw>4y_jr?PP<t');

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
