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
  'wpfunos_general_confirmadodescuento_section',    						// ID used to identify this section and with which to register options
  '<strong>Plantilla Precio Confirmado Con Descuento</strong>',			// Title to be displayed on the administration page
  array( $this, 'wpfunos_display_general_account_confirmadodescuento' ), 	// Callback used to render the description of the section
  'wpfunos_general_settings'                 						// Page on which to add this section of options
);
// Sección Compara precios resultados Descuento New Design
add_settings_field(
  'wpfunos_seccionComparaPreciosResultadosDescuentoNewDesign',
  'Sección compara precios Resultados Descuento Nuevo diseño <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_seccionComparaPreciosResultadosDescuentoNewDesign)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_confirmadodescuento_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_seccionComparaPreciosResultadosDescuentoNewDesign','name' => 'wpfunos_seccionComparaPreciosResultadosDescuentoNewDesign','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Sección Compara precios resultados Descuento Superior
add_settings_field(
  'wpfunos_seccionComparaPreciosResultadosDescuento',
  'Sección compara precios Resultados Descuento Superior <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_seccionComparaPreciosResultadosDescuento)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_confirmadodescuento_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_seccionComparaPreciosResultadosDescuento','name' => 'wpfunos_seccionComparaPreciosResultadosDescuento','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Sección Compara precios resultados Descuento Inferior
add_settings_field(
  'wpfunos_seccionComparaPreciosResultadosDescuentoInferior',
  'Sección compara precios Resultados Descuento Inferior <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_seccionComparaPreciosResultadosDescuentoInferior)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_confirmadodescuento_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_seccionComparaPreciosResultadosDescuentoInferior','name' => 'wpfunos_seccionComparaPreciosResultadosDescuentoInferior','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);

register_setting('wpfunos_general_settings', 'wpfunos_seccionComparaPreciosResultadosDescuentoNewDesign');
register_setting('wpfunos_general_settings', 'wpfunos_seccionComparaPreciosResultadosDescuento');
register_setting('wpfunos_general_settings', 'wpfunos_seccionComparaPreciosResultadosDescuentoInferior');
