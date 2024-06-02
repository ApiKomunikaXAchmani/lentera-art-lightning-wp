<?php
define( 'WP_CACHE', false ); 
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
define( 'DB_NAME', 'k7p1k4e2_LAl' );
/** MySQL database username */
define( 'DB_USER', 'root' );
/** MySQL database password */
define( 'DB_PASSWORD', '12345' );
/** MySQL hostname */
define( 'DB_HOST', 'host.docker.internal' );
/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );
/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'jQ$vvxvWu:CkO>Fu~{2;l,T5gJERc,%hPRd3<iQ;G4jTl$%}`8*J$ubc71X ri#-' );
define( 'SECURE_AUTH_KEY',  'e> HBKf.J^vX8E>CPc]8L+}:s7`o_H6~.pi`:F#KByCApuQ5T*grI,wKQ{~6G~G*' );
define( 'LOGGED_IN_KEY',    '8_X$/vYl~ul!8!p>%jJ/G0kNayjp7U|(XSA1uf]rJlVM?|pcszj7.[tD @a`h6RA' );
define( 'NONCE_KEY',        '6OeOu]bI`UOzz{Fjd!zWyY)wPg8>eU{*6t5PQv-o{.M;H%x0nLTD]y>e)ya~Xks_' );
define( 'AUTH_SALT',        'e .=M7otS}0K<P[tS|^g1.J`vKg[|2A~4rrekmTu}wnATmGx7#RWaoP!#KVl%n~/' );
define( 'SECURE_AUTH_SALT', '{Q(E:}WmYw)*iG2udF*u?@ SWkl,3AaS+,(SCal9c$XN![*O6dk=5;1Os&t[LKiJ' );
define( 'LOGGED_IN_SALT',   'H9U6w!,bzu+?AZDI! ?[9qk[Dgn86EiE?|L?TZQ[qabG+Ckq}&S6lhySY+qx8%O)' );
define( 'NONCE_SALT',       'V/Ksr4xIJzb%nn5G=S(jnIMLUB:xqU>wYhhO)JKvv-XxJ8Fk!ykOGB8Ijow)+pGy' );
/**#@-*/
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', true );
/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}
/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
define('CONCATENATE_SCRIPTS',false);
define('SCRIP_DEBUG',true);