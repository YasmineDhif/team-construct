<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',          '{d b|J)IR1(BwcO=n9C)L7U3_^Vn86)}1{D=PDwN}y_~U%hodh)82kDPIZSAI`?*' );
define( 'SECURE_AUTH_KEY',   'f4]t2V9u/{M` cfdh:anVZUEg1<<A48TBLje(D.|&,3MKUWcY*V{bsv1jn6 j5:1' );
define( 'LOGGED_IN_KEY',     'NBBdh3G^mc~Hs+X}rm5ls1i`_,=na7DN>rD:T8<_E6eUf-}XegjnPrP.UErg(mq_' );
define( 'NONCE_KEY',         'w=g[X&hbSz68>>HjTO=d]7mAkqf1V/OKIN-0ezY[!I-+3cmWcvEeX@h3Dd-p->2N' );
define( 'AUTH_SALT',         'Sj92g0u-w9wK6fX_i<BG&CH-$%ZEsA+!u 04Hsci$mu`9u9Tq;nnU-N:1F}}S5Ve' );
define( 'SECURE_AUTH_SALT',  'UtT?9.|KaRic`]S#R{mSq387yI6X8yL5FX@L=*s/DkZ(uYPnFN5nF#Nq5*sZSmF1' );
define( 'LOGGED_IN_SALT',    'D&9fD#(]q3uSo3.7I]jk6&y&Pp^v+x#Fpb45NC H#t$0z_}pZk=[_R<lNx6E3>R*' );
define( 'NONCE_SALT',        'mzV)-!_+3T,UcL$eMExfBo3jd;*bwpRno 8h)K8^j5+:{+Z}%$!5?.`bA}!sh3*a' );
define( 'WP_CACHE_KEY_SALT', 'YZauD=^(<Cz9cRI5!6Z}&VyHgZ,RPU;t0gvLu2FzXgVO*aYeveg:kC1gi}pp.5{n' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );


define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
