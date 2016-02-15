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
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'Pahfkk98!');

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
define('AUTH_KEY',         'PT#{J`:X~5Bz~!0WW(fpL*QAZKQW86U.~eZZ/*H~S_Kotr(upQ>g_u.u>ZIe&G$+');
define('SECURE_AUTH_KEY',  '#u{ApAbuPPK1gPfsWs%~+hhtd>x,a8sBMH2gtV`=H )+/1&oR<71D^1gqF4]1f(`');
define('LOGGED_IN_KEY',    '7Ql[A:X3D4s#Zc=N$c*o<+Gp_g_:$Ln.E+Kb!KDqU}YfrM7aJI,b.VjPD&E0Wd@d');
define('NONCE_KEY',        'C8k:aw=kW;{AhbLd2 D{Zbb+T5B:zr[EG@iIR~%.+zp;tSkpb$7t)5mtC&yOLn0<');
define('AUTH_SALT',        '-J;~DlAU_/q{Jyf(!L!e#JzM5G!59~=]ASm2:iejw^!8)/StlN33O,R|e*^ad(g-');
define('SECURE_AUTH_SALT', 'vnyULX/+9FAoyOh+]Y-BwqDLDz5p6P-B3+|uPw}B^_l6WSb- tjtCll5/IAC:AdJ');
define('LOGGED_IN_SALT',   'OKhxn6Sy6WY--?8Q|/*XQ-6F>a-6PAJ(6Q?4(mk)KV<9[!6=`r^;.~O!w<HoO(XD');
define('NONCE_SALT',       'GM.uK,~Rdt#>+}]`l{C8A0p/76zsL!99aGo>/w~:5TS]sQ9<(?JKRH;{4c#L#|B}');

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
