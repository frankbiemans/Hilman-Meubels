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
define('DB_NAME', 'XXXXXX');

/** MySQL database username */
define('DB_USER', 'XXXXXX');

/** MySQL database password */
define('DB_PASSWORD', 'XXXXXX');

/** MySQL hostname */
define('DB_HOST', 'XXXXXX');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/** Disable the Theme and Plugin Editors **/
define('DISALLOW_FILE_EDIT', true);

/** Set the Number of Post Revisions  **/
define('WP_POST_REVISIONS', 2);

/** Change Default Theme **/
define( 'WP_DEFAULT_THEME', 'startkit' );

/** Disable the autmatic updates **/
define( 'AUTOMATIC_UPDATER_DISABLED', false );

/** Add the "trash" function for media files **/
define( 'MEDIA_TRASH', true );

/** Empty the trash items every two weeks **/
define( 'EMPTY_TRASH_DAYS', 14 );

/** Skip updating thee wp-content folder **/
/** there are no core files in this directory and we never use default themes, thus; we dont need to update this folder **/
define( 'CORE_UPGRADE_SKIP_NEW_BUNDLED', true );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '6;?4~tTHX=p /qTu%yPM:wf<{_oA1;FL^~pFqep]l^[h5Kr%o2!ev;J R&Zwvb$o');
define('SECURE_AUTH_KEY',  '5@NF.(=w`_IGB+l{dB#15mR%8}?OTI]713<=Qk$xxU:!y`ADuLJ|erAuVmA<BJ9-');
define('LOGGED_IN_KEY',    '>r=^eXQ--];^$R.p%PVc*eCxBsB@/8FFq8=%%8,M:,D7gqZmH|;= ?]!puMgIxc8');
define('NONCE_KEY',        'aeKw<+m<<GC@?YqyFP%Wc<<!l*#!=_$Sa/^at;iP@vq4@fTsz v! I+5W!N`HJD&');
define('AUTH_SALT',        'a@Uez(z1%t.~G}I5;/o|^a)<o2cAQu%s{NPlSBsD;Eda!ie=/OA|jsv2R7`.Vkqk');
define('SECURE_AUTH_SALT', 'Ow:?1=|rB>,Om5={9kM0rP/ee#8:dfrR}3%035$x[7,C5mz,nr?_&#D{,t_,1Y9n');
define('LOGGED_IN_SALT',   'aymyc##e9~,KsK#&Z|,rAz@oJ/@wj&>T||{<y#>;aTZ(z0z*X2YGt#|i/*_T~l/e');
define('NONCE_SALT',       '|s`J%8t`H,!kZ@ZP!UDH yDns}~eD!,fKi; 6DwU#StG;J{:^:}RbN5kpd_d.K~u');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'hm_wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

define('WP_HOME', 'http://'. $_SERVER['HTTP_HOST']);
define('WP_SITEURL', 'http://'. $_SERVER['HTTP_HOST']);