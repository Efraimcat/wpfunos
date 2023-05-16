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
* Version:           3.8.0
* Author:            Efraim Bayarri efraim@efraim.cat
* Author URI:        https://efraim.cat
* License:           GPL-2.0+
* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
* Text Domain:       wpfunos, wpfunos_es
* Domain Path:       /languages
* Requires PHP: 	   7.4
* Requires at least: 5.9
* Tested up to: 	   6.2
* GitHub Plugin URI: https://github.com/Efraimcat/wpfunos
*/
if ( ! defined( 'WPINC' ) ) {
	die;
}
/**
*|--------------------------------------------------------------------------
*/
define( 'WPFUNOS_VERSION', '3.8.0' );
define( 'WPFUNOS_DB_VERSION', '1.0.7' );
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

function activate_wpfunos() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpfunos-activator.php';
	Wpfunos_Activator::activate();
}
function deactivate_wpfunos() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpfunos-deactivator.php';
	Wpfunos_Deactivator::deactivate();
}
register_activation_hook( __FILE__, 'activate_wpfunos' );
register_deactivation_hook( __FILE__, 'deactivate_wpfunos' );

require plugin_dir_path( __FILE__ ) . 'includes/class-wpfunos.php';

function run_wpfunos() {
	$plugin = new Wpfunos();
	$plugin->run();
}
run_wpfunos();
