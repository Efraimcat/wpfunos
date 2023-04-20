<?php

/**
* Fired during plugin activation
*
* @link       https://github.com/Efraimcat/wpfunos/
* @since      1.0.0
*
* @package    Wpfunos
* @subpackage Wpfunos/includes
*/

/**
* Fired during plugin activation.
*
* This class defines all code necessary to run during the plugin's activation.
*
* @since      1.0.0
* @package    Wpfunos
* @subpackage Wpfunos/includes
* @author     Efraim Bayarri <efraim@efraim.cat>
*/
class Wpfunos_Activator {

	/**
	* Short Description. (use period)
	*
	* Long Description.
	*
	* @since    1.0.0
	*/
	public static function activate() {
		if (! wp_next_scheduled('wpfunosCronJob')) {
			wp_schedule_event(time(), 'daily', 'wpfunosCronJob');
		}
		if (! wp_next_scheduled('wpfunosHourlyCronJob')) {
			wp_schedule_event(time(), 'hourly', 'wpfunosHourlyCronJob');
		}

		$DBversion = WPFUNOS_DB_VERSION;
		$installed_ver = get_option( "wpf_db_version" );
		if ( $installed_ver != $DBversion ) {
			global $wpdb;
			$table_name = $wpdb->prefix . 'wpf_visitas';
			$charset_collate = $wpdb->get_charset_collate();

			$sqlvisitas = "CREATE TABLE $table_name (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
				version tinytext DEFAULT '' NOT NULL,
				tipo tinytext DEFAULT '' NOT NULL,
				wpfn tinytext DEFAULT '' NOT NULL,
				wpfe tinytext DEFAULT '' NOT NULL,
				wpft tinytext DEFAULT '' NOT NULL,
				nombre tinytext DEFAULT '' NOT NULL,
				email tinytext DEFAULT '' NOT NULL,
				telefono tinytext DEFAULT '' NOT NULL,
				ip tinytext DEFAULT '' NOT NULL,
				referer varchar(250) DEFAULT '' NOT NULL,
				mobile tinytext DEFAULT '' NOT NULL,
				logged tinytext DEFAULT '' NOT NULL,
				wpfresp1 tinytext DEFAULT '' NOT NULL,
				wpfresp2 tinytext DEFAULT '' NOT NULL,
				wpfresp3 tinytext DEFAULT '' NOT NULL,
				wpfresp4 tinytext DEFAULT '' NOT NULL,
				postID tinytext DEFAULT '' NOT NULL,
				servicio tinytext DEFAULT '' NOT NULL,
				poblacion varchar(50) DEFAULT '' NOT NULL,
				nacimiento tinytext DEFAULT '' NOT NULL,
				cuando tinytext DEFAULT '' NOT NULL,
				cp tinytext DEFAULT '' NOT NULL,
				contador int(10),
				PRIMARY KEY  (id)
			);";

			$table_name = $wpdb->prefix . 'wpf_defunciones';
			$sqldefunciones = "CREATE TABLE $table_name (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
				nombre varchar(250) DEFAULT '' NOT NULL,
				defuncion datetime DEFAULT '2022-12-31 00:00:00' NOT NULL,
				velatorio varchar(250) DEFAULT 'Desconocido' NOT NULL,
				velatorio_inicio datetime DEFAULT '2022-12-31 00:00:00' NOT NULL,
				velatorio_final datetime DEFAULT '2022-12-31 00:00:00' NOT NULL,
				ceremonia varchar(250) DEFAULT 'Desconocido' NOT NULL,
				ceremonia_fecha datetime DEFAULT '2022-12-31 00:00:00' NOT NULL,
				PRIMARY KEY  (id)
			);";

			$table_name = $wpdb->prefix . 'wpf_masterdatos';
			$sqlmasterdatos = "CREATE TABLE $table_name (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
				idrefencia tinytext DEFAULT '' NOT NULL,
				nombre varchar(250) DEFAULT '' NOT NULL,
				tipo tinytext DEFAULT '' NOT NULL,
				latitud tinytext DEFAULT '' NOT NULL,
				longitud tinytext DEFAULT '' NOT NULL,
				distancia tinytext DEFAULT '' NOT NULL,
				preciobase tinytext DEFAULT '' NOT NULL,
				precioincineracion tinytext DEFAULT '' NOT NULL,
				precioentierro tinytext DEFAULT '' NOT NULL,
				precioataudeco tinytext DEFAULT '' NOT NULL,
				precioataudmed tinytext DEFAULT '' NOT NULL,
				precioataudpre tinytext DEFAULT '' NOT NULL,
				preciovelsi tinytext DEFAULT '' NOT NULL,
				preciovelno tinytext DEFAULT '' NOT NULL,
				preciocersin tinytext DEFAULT '' NOT NULL,
				preciocersol tinytext DEFAULT '' NOT NULL,
				preciocerciv tinytext DEFAULT '' NOT NULL,
				preciocerrel tinytext DEFAULT '' NOT NULL,
				PRIMARY KEY  (id)
			);";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sqlvisitas );
			dbDelta( $sqldefunciones );
			dbDelta( $sqlmasterdatos );

			update_option( "wpf_db_version", $DBversion );
		}
	}
}
