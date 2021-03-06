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
	}
}
