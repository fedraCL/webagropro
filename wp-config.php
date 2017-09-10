<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'agropro_web');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'agroprochile');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'y8atavy2u');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '-#w gJ00)U>1fC7xR1+frME+FkZ/o/]qb%6/al18=Tcu7LY~Ix<p**IZoweg5uQ>');
define('SECURE_AUTH_KEY', 'QGV^8%%MkxP4;&`M$rv@8K{tUHJIo{k4Wj>n6L&QR)>d(SmKby1!1cskfLUH<w0:');
define('LOGGED_IN_KEY', '*!}) D]MA#j-4d/.j1@V-H1lFYs< >>f0y7U/b@cFt9F,gL=sCO~N9J:6Kj~Tw%l');
define('NONCE_KEY', 'lA^!IO?:^=,nJYm%nd/:`$SX2O9.)&UO%,pe2qfl|xSKf60iZ&p3Y[[EVUkBcmsY');
define('AUTH_SALT', 'A/bZ{-awt[X4AhqDA:Trr9cZe8BVx#x cb(u8xS^i1?kK>g~L%{jvBc10V?-k!aM');
define('SECURE_AUTH_SALT', '@kx7%c5L7*&>O&5Xc$,/V&eV<*`FgC#fkjGg^h!-s|p0@Gp3V6k;.`Ih1ZbnUN_P');
define('LOGGED_IN_SALT', '%.K-VOLYgm+sSN}aAlFgJW8<4zMZPYVn27mkTj=5+*l6ytWm%/]WMlL~38[ew/fi');
define('NONCE_SALT', 'fo`fQ|58}NW%vb7~Ch+zeI.?EpM%%|i[kK)T+R%6Hws!t!Lw==M)m7Bv^g.:y.7[');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

