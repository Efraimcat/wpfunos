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
  'wpfunos_aseguradoras_section',    	// ID used to identify this section and with which to register options
  'Configuración aseguradoras',      						// Title to be displayed on the administration page
  array( $this, 'wpfunos_display_aseguradoras_account' ), // Callback used to render the description of the section
  'wpfunos_aseguradoras_settings'                 		// Page on which to add this section of options
);

// Página comparador Aseguradoras
add_settings_field(
  'wpfunos_paginaComparadorAseguradoras',
  'Página comparador Aseguradoras <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_paginaComparadorAseguradoras)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_aseguradoras_settings',
  'wpfunos_aseguradoras_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_paginaComparadorAseguradoras','name' => 'wpfunos_paginaComparadorAseguradoras','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Sección Compara precios datos Futuro
add_settings_field(
  'wpfunos_seccionComparaPreciosDatosAseguradoras',
  'Sección compara precios Datos Aseguradoras <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_seccionComparaPreciosDatosAseguradoras)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_aseguradoras_settings',
  'wpfunos_aseguradoras_section',
  array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_seccionComparaPreciosDatosAseguradoras','name' => $this->plugin_name . '_seccionComparaPreciosDatosAseguradoras','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// URL resultados aseguradoras
add_settings_field(
  'wpfunos_paginaURLResultadosAseguradoras',
  'URL página resultados aseguradoras <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_paginaURLResultadosAseguradoras)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_aseguradoras_settings',
  'wpfunos_aseguradoras_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_paginaURLResultadosAseguradoras','name' => 'wpfunos_paginaURLResultadosAseguradoras','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Formulario GEO my wp ubicación Aseguradoras
add_settings_field(
  'wpfunos_paginaComparadorGeoMyWpAseguradoras',
  'Formulario GEO my wp ubicación Aseguradoras <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_paginaComparadorGeoMyWpAseguradoras)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_aseguradoras_settings',
  'wpfunos_aseguradoras_section',
  array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . 'paginaComparadorGeoMyWpAseguradoras','name' => 'wpfunos_paginaComparadorGeoMyWpAseguradoras','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Página llamar
add_settings_field(
  'wpfunos_paginaAseguradorasLlamar',
  'Página aseguradoras llamar <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_paginaAseguradorasLlamar)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_aseguradoras_settings',
  'wpfunos_aseguradoras_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_paginaAseguradorasLlamar','name' => 'wpfunos_paginaAseguradorasLlamar','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Página que me llamen
add_settings_field(
  'wpfunos_paginaAseguradorasLlamen',
  'Página aseguradoras que me llamen <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_paginaAseguradorasLlamen)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_aseguradoras_settings',
  'wpfunos_aseguradoras_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_paginaAseguradorasLlamen','name' => 'wpfunos_paginaAseguradorasLlamen','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Sección Aseguradoras preciossuperior
add_settings_field(
  'wpfunos_seccionAseguradorasPrecio',
  'Sección aseguradoras precio <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_seccionAseguradorasPrecio)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_aseguradoras_settings',
  'wpfunos_aseguradoras_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_seccionAseguradorasPrecio','name' => 'wpfunos_seccionAseguradorasPrecio','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Sección Aseguradoras Argumentario
add_settings_field(
  'wpfunos_seccionAseguradorasArgumentario',
  'Sección aseguradoras argumentario <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_seccionAseguradorasArgumentario)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_aseguradoras_settings',
  'wpfunos_aseguradoras_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_seccionAseguradorasArgumentario','name' => 'wpfunos_seccionAseguradorasArgumentario','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);


register_setting('wpfunos_aseguradoras_settings', 'wpfunos_paginaComparadorAseguradoras');
register_setting('wpfunos_aseguradoras_settings', 'wpfunos_seccionComparaPreciosDatosAseguradoras');
register_setting('wpfunos_aseguradoras_settings', 'wpfunos_paginaURLResultadosAseguradoras');
register_setting('wpfunos_aseguradoras_settings', 'wpfunos_paginaComparadorGeoMyWpAseguradoras');
register_setting('wpfunos_aseguradoras_settings', 'wpfunos_paginaAseguradorasLlamar');
register_setting('wpfunos_aseguradoras_settings', 'wpfunos_paginaAseguradorasLlamen');
register_setting('wpfunos_aseguradoras_settings', 'wpfunos_seccionAseguradorasPrecio');
register_setting('wpfunos_aseguradoras_settings', 'wpfunos_seccionAseguradorasArgumentario');
