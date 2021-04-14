<?php
define( 'WP_CACHE', true ) ;
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
define( 'DB_NAME', 'u400065928_cursos' );

/** MySQL database username */
define( 'DB_USER', 'u400065928_cursos' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Caligula1697#' );

/** MySQL hostname */
define( 'DB_HOST', 'mysql' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('WP_ALLOW_REPAIR', true);

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '(`s*Qu._.2Hrio8yyLj>aolWc&jR.;t=32k(q@x99Wk{*?;@,^i;b:pj!Z%#T>|,' );
define( 'SECURE_AUTH_KEY',   'rxC.,<#,&wC4UvKtdwh1?>PLx)R<5*0e)i1(Ap8zf&CwC524F4M , N.LMKQ$jmf' );
define( 'LOGGED_IN_KEY',     'bJIYObBbcTcP2D)K!dJeKs$4CbCTvVz<:ZCC?DTY;%I;e[c:Gt6E7o;DoT2:X7}`' );
define( 'NONCE_KEY',         ']WOyQ6DUqlt@2|Xq~iRF6t4G7% ^dq5lzQ$-,1n=hatM?l%tXj%OaN._wI0r7Hq}' );
define( 'AUTH_SALT',         ']O%j(W_Rd7nEF-Iv;vB;3M=j6Swx,@Jy_D^# PLj]&``JpQ_q0T<TpS[jifgTL4Z' );
define( 'SECURE_AUTH_SALT',  '`Qbh;*4;5Z30!Q%`2R&s#W39#3My^@~3DO<KUh18`!f6?<aF/${=RD=!7m?wIdQG' );
define( 'LOGGED_IN_SALT',    '@}@*7eFsLgTMzqavWc(0Hs_+#)~ya/8d}k;~:am&OPv D!Ou%VVf$$Y%F[qJXoan' );
define( 'NONCE_SALT',        'aRSuf4EuFNu,zvJq04~L25Z)V_SCQj=bL}{erQG)H.PEZ[9&ut@)YX7KQ1V1-;WB' );
define( 'WP_CACHE_KEY_SALT', 'tB3go)Y=1WNHg x#=z&S!+QFNDuQRm]{_oTpMVCYB?v!TG7;$xvL6hR13zZ)%BP5' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
