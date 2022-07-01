<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://github.com/Efraimcat/wpfunos/
 * @since      1.0.0
 *
 * @package    Wpfunos
 * @subpackage Wpfunos/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Wpfunos
 * @subpackage Wpfunos/includes
 * @author     Efraim Bayarri <efraim@efraim.cat>
 */
class Wpfunos_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		wp_clear_scheduled_hook('wpfunosCronJob');
		wp_clear_scheduled_hook('wpfunosHourlyCronJob');
	}
}
