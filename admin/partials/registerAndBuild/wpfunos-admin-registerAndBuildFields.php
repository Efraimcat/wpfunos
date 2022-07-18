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
  'wpfunos_Debug',
  'Activar debug <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_Debug)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_section',
  array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_Debug','name' => 'wpfunos_Debug','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Graph
add_settings_field(
  'wpfunos_Graph',
  'Activar gráficos <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_Graph)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_section',
  array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_Graph','name' => 'wpfunos_Graph','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Distancia Servicio directo
add_settings_field(
  'wpfunos_distanciaServicioDirecto',
  'Distancia Servicio Directo <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_distanciaServicioDirecto)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_distanciaServicioDirecto','name' => 'wpfunos_distanciaServicioDirecto','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);

register_setting('wpfunos_general_settings', 'wpfunos_distanciaServicioDirecto');
register_setting('wpfunos_general_settings', 'wpfunos_Debug');
register_setting('wpfunos_general_settings', 'wpfunos_Graph');
