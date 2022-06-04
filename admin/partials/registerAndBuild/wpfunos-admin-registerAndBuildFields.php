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
  'wpfunos_general_section',    		// ID used to identify this section and with which to register options
  '<strong>Debug del programa</strong>',              // Title to be displayed on the administration page
  array( $this, 'wpfunos_display_general_account' ), 	// Callback used to render the description of the section
  'wpfunos_general_settings'                 			// Page on which to add this section of options
);
// Debug
add_settings_field(
  $this->plugin_name . '_Debug',
  'Activar debug <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_Debug)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_section',
  array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_Debug','name' => $this->plugin_name . '_Debug','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Graph
add_settings_field(
  $this->plugin_name . '_Graph',
  'Activar gráficos <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_Graph)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_section',
  array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_Graph','name' => $this->plugin_name . '_Graph','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Nuevo diseño busqueda
add_settings_field(
  $this->plugin_name . '_NewDesign',
  'Nuevo diseño <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_NewDesign)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_section',
  array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_NewDesign','name' => $this->plugin_name . '_NewDesign','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);

register_setting('wpfunos_general_settings', $this->plugin_name . '_Debug');
register_setting('wpfunos_general_settings', $this->plugin_name . '_Graph');
register_setting('wpfunos_general_settings', $this->plugin_name . '_NewDesign');
