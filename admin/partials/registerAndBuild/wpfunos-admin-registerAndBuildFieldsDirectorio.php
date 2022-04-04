<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
/**
* The admin-specific functionality of the plugin.
*
* @link       https://github.com/Efraimcat/wpfunos/
* @since      1.0.0
*
* @package    Wpfunos
* @subpackage Wpfunos/admin/partials/registerAndBuild
* @author     Efraim Bayarri <efraim@efraim.cat>
*/
add_settings_section(
  'wpfunos_directorio_section',  					  		// ID used to identify this section and with which to register options
  'Directorio',                           				// Title to be displayed on the administration page
  array( $this, 'wpfunos_display_directorio_account' ), 	// Callback used to render the description of the section
  'wpfunos_directorio_settings'                 			// Page on which to add this section of options
);

add_settings_field(
  $this->plugin_name . '_PlantillaDirectorioTanatorios',
  'Plantilla Tanatorios <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_PlantillaDirectorioTanatorios)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_directorio_settings',
  'wpfunos_directorio_section',
  array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_PlantillaDirectorioTanatorios','name' => $this->plugin_name . '_PlantillaDirectorioTanatorios','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);

register_setting('wpfunos_directorio_settings', $this->plugin_name . '_PlantillaDirectorioTanatorios');
