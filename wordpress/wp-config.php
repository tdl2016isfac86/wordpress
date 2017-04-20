<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'wordpress');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '/II`~..;SvI08.q2z+?hgTLZ6vl2i>d!vOg^VaD^zNa3fDYCfA3O|fVYZr_|:#>&');
define('SECURE_AUTH_KEY',  '{}qGQV*Aq)@InzsEsfm+kuw e=&dBbLEb@ pN,H>Wh!gZi-7;30:KD!P.v<<)m=2');
define('LOGGED_IN_KEY',    'm0DJy_okAf<l|P,:UGEZx0loGUf/2GVtMv;,G3g,&Rg|R@8w3hDMod139wzA:hcm');
define('NONCE_KEY',        '+b4G_g?yi`)I/yaMrX))FQSCsvf^|T)j2e[c}jau:zOs?lao0}]e%jCWeeVh,AeK');
define('AUTH_SALT',        ',k%IyQ<lGp&sf_T#{Do`-Y=]i<GfgNJG5yBm6P]-4L$GDN@I% T^<!m7S-PV~ >j');
define('SECURE_AUTH_SALT', '1+DV]$]r/~ t:`8WSgJ)8D?1$M2F@rN{v=e:~VJv<)~(yQT1*!ce:X[94cfyscoX');
define('LOGGED_IN_SALT',   'AL6|:irx^&Q-#rBnNOeQ7(8*YkYIJ%)_-/L5T>kL1_2#c3G**Ezu6_-8+(yIfaoV');
define('NONCE_SALT',       '2=Hnv*eUoE>NKD Vl0}2]#Z/S _==lrT.xhHP:2n)vUzAJ14ciLIG4x#i1.O:>|o');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');