<?php
/**
* @link              https://efraim.cat
* @since             1.0.0
* @package           Wpfunos
*
* @wordpress-plugin
* Plugin Name:       wpfunos
* Plugin URI:        https://github.com/Efraimcat/wpfunos/
* Description:       Funcionalidades para funos.es
* Version:           1.7.24
* Author:            Efraim Bayarri
* Author URI:        https://efraim.cat
* License:           GPL-2.0+
* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
* Text Domain:       wpfunos
* Domain Path:       /languages
* Requires PHP: 	  7.4
* Requires at least: 5.9
* Tested up to: 	  5.9.3
* GitHub Plugin URI: https://github.com/Efraimcat/wpfunos
*/
if ( ! defined( 'WPINC' ) ) {
	die;
}
/**
* Currently plugin version.
* Start at version 1.0.0 and use SemVer - https://semver.org
* Rename this for your plugin and update it as you release new versions.
*/
define( 'WPFUNOS_VERSION', '1.7.24' );
/**
*|--------------------------------------------------------------------------
*| CONSTANTS
*|#18-Mar-2022 11:03:24: String: 'WFUNOS_BASE_FILE: /var/www/vhosts/funos.es/httpdocs/wp-content/plugins/wpfunos/wpfunos.php'
*|#18-Mar-2022 11:03:24: String: 'WFUNOS_BASE_DIR: /var/www/vhosts/funos.es/httpdocs/wp-content/plugins/wpfunos'
*|#18-Mar-2022 11:03:24: String: 'WFUNOS_PLUGIN_URL: https://funos.es/wp-content/plugins/wpfunos/'
*|--------------------------------------------------------------------------
*/
define( 'WFUNOS_BASE_FILE', __FILE__ );
define( 'WFUNOS_BASE_DIR', dirname( WFUNOS_BASE_FILE ) );
define( 'WFUNOS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
* The code that runs during plugin activation.
* This action is documented in includes/class-wpfunos-activator.php
*/
function activate_wpfunos() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpfunos-activator.php';
	Wpfunos_Activator::activate();
}

/**
* The code that runs during plugin deactivation.
* This action is documented in includes/class-wpfunos-deactivator.php
*/
function deactivate_wpfunos() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpfunos-deactivator.php';
	Wpfunos_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wpfunos' );
register_deactivation_hook( __FILE__, 'deactivate_wpfunos' );

/**
* The core plugin class that is used to define internationalization,
* admin-specific hooks, and public-facing site hooks.
*/
require plugin_dir_path( __FILE__ ) . 'includes/class-wpfunos.php';

/**
* Begins execution of the plugin.
*
* Since everything within the plugin is registered via hooks,
* then kicking off the plugin from this point in the file does
* not affect the page life cycle.
*
* @since    1.0.0
*/
function run_wpfunos() {

	$plugin = new Wpfunos();
	$plugin->run();

}
run_wpfunos();
