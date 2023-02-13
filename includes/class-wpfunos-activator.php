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



			$sql = "CREATE TABLE $table_name (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
				tipo tinytext DEFAULT '' NOT NULL,
				wpfn tinytext DEFAULT '' NOT NULL,
				wpfe tinytext DEFAULT '' NOT NULL,
				wpft tinytext DEFAULT '' NOT NULL,
				nombre tinytext DEFAULT '' NOT NULL,
				email tinytext DEFAULT '' NOT NULL,
				telefono tinytext DEFAULT '' NOT NULL,
				ip tinytext DEFAULT '' NOT NULL,
				referer varchar(100) DEFAULT '' NOT NULL,
				mobile tinytext DEFAULT '' NOT NULL,
				logged tinytext DEFAULT '' NOT NULL,
				wpfresp1 tinytext DEFAULT '' NOT NULL,
				wpfresp2 tinytext DEFAULT '' NOT NULL,
				wpfresp3 tinytext DEFAULT '' NOT NULL,
				wpfresp4 tinytext DEFAULT '' NOT NULL,
				postID tinytext DEFAULT '' NOT NULL,
				servicio tinytext DEFAULT '' NOT NULL,
				PRIMARY KEY  (id)
			);";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );



			update_option( "wpf_db_version", $DBversion );
		}
	}
}
