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
  'wpfunos_general_sinprecio_section',    						// ID used to identify this section and with which to register options
  '<strong>Plantilla Sin Precio</strong>',						// Title to be displayed on the administration page
  array( $this, 'wpfunos_display_general_account_sinprecio' ), 	// Callback used to render the description of the section
  'wpfunos_general_settings'                 						// Page on which to add this section of options
);
// Sección Compara precios resultados sin precio Superior
add_settings_field(
  'wpfunos_seccionComparaPreciosResultadosSinPrecio',
  'Sección compara precios Resultados Sin Precio Superior <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_seccionComparaPreciosResultadosSinPrecio)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_sinprecio_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_seccionComparaPreciosResultadosSinPrecio','name' => 'wpfunos_seccionComparaPreciosResultadosSinPrecio','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Sección Compara precios resultados sin precio Inferior
add_settings_field(
  'wpfunos_seccionComparaPreciosResultadosSinPrecioInferior',
  'Sección compara precios Resultados Sin Precio Inferior <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_seccionComparaPreciosResultadosSinPrecioInferior)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_sinprecio_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_seccionComparaPreciosResultadosSinPrecioInferior','name' => 'wpfunos_seccionComparaPreciosResultadosSinPrecioInferior','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);

register_setting('wpfunos_general_settings', 'wpfunos_seccionComparaPreciosResultadosSinPrecio');
register_setting('wpfunos_general_settings', 'wpfunos_seccionComparaPreciosResultadosSinPrecioInferior');
