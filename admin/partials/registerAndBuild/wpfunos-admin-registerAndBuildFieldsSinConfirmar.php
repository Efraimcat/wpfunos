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
  'wpfunos_general_sinconfirmar_section',    						// ID used to identify this section and with which to register options
  '<strong>Plantilla Precio Sin Confirmar</strong>',				// Title to be displayed on the administration page
  array( $this, 'wpfunos_display_general_account_sinconfirmar' ), // Callback used to render the description of the section
  'wpfunos_general_settings'                 						// Page on which to add this section of options
);
// Sección Compara precios resultados sin botones Superior
add_settings_field(
  'wpfunos_seccionComparaPreciosResultadosSin',
  'Sección compara precios Resultados Sin Confirmar Superior <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_seccionComparaPreciosResultadosSin)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_sinconfirmar_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_seccionComparaPreciosResultadosSin','name' => 'wpfunos_seccionComparaPreciosResultadosSin','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Sección Compara precios resultados sin botones Inferior
add_settings_field(
  'wpfunos_seccionComparaPreciosResultadosSinInferior',
  'Sección compara precios Resultados Sin Confirmar Inferior <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_seccionComparaPreciosResultadosSinInferior)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_sinconfirmar_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_seccionComparaPreciosResultadosSinInferior','name' => 'wpfunos_seccionComparaPreciosResultadosSinInferior','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);

register_setting('wpfunos_general_settings', 'wpfunos_seccionComparaPreciosResultadosSin');
register_setting('wpfunos_general_settings', 'wpfunos_seccionComparaPreciosResultadosSinInferior');
