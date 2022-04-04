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
  'wpfunos_general_confirmado_section',    						// ID used to identify this section and with which to register options
  '<strong>Plantilla Precio Confirmado</strong>',					// Title to be displayed on the administration page
  array( $this, 'wpfunos_display_general_account_confirmado' ), 	// Callback used to render the description of the section
  'wpfunos_general_settings'                 						// Page on which to add this section of options
);
// Sección Compara precios resultados superior
add_settings_field(
  $this->plugin_name . '_seccionComparaPreciosResultados',
  'Sección compara precios Resultados Superior <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_seccionComparaPreciosResultados)</h6>', 
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_confirmado_section',
  array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_seccionComparaPreciosResultados','name' => $this->plugin_name . '_seccionComparaPreciosResultados','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Sección Compara precios resultados inferior
add_settings_field(
  $this->plugin_name . '_seccionComparaPreciosResultadosInferior',
  'Sección compara precios Resultados Inferior <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_seccionComparaPreciosResultadosInferior)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_confirmado_section',
  array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_seccionComparaPreciosResultadosInferior','name' => $this->plugin_name . '_seccionComparaPreciosResultadosInferior','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);

register_setting('wpfunos_general_settings', $this->plugin_name . '_seccionComparaPreciosResultados');
register_setting('wpfunos_general_settings', $this->plugin_name . '_seccionComparaPreciosResultadosInferior');
