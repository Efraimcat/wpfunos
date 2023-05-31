<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
/**
* The admin-specific functionality of the plugin.
*
* @link      https://github.com/Efraimcat/wpfunos/
* @since      1.0.0
*
* @package    Wpfunos
* @subpackage Wpfunos/admin/partials/registerAndBuild
* @author     Efraim Bayarri <efraim@efraim.cat>
*/
add_settings_section(
  'wpfunos_general_resultados_section',  							// ID used to identify this section and with which to register options
  '<strong>Página Resultados</strong>',                           // Title to be displayed on the administration page
  array( $this, 'wpfunos_display_general_account_resultados' ), 	// Callback used to render the description of the section
  'wpfunos_general_settings'                 						// Page on which to add this section of options
);

// Sección Usuario API publiclog
add_settings_field(
  'wpfunos_usuarioAPIpubliclog',
  'Usuario API publiclog <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_usuarioAPIpubliclog)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_resultados_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_usuarioAPIpubliclog','name' => 'wpfunos_usuarioAPIpubliclog','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Sección Password API publiclog
add_settings_field(
  'wpfunos_passAPIpubliclog',
  'Password API publiclog <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_passAPIpubliclog)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_resultados_section',
  array('type' => 'input','subtype' => 'password','id' => 'wpfunos_passAPIpubliclog','name' => 'wpfunos_passAPIpubliclog','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);

// Sección Compara precios resultados cabecera
//add_settings_field(
//  'wpfunos_seccionComparaPreciosResultadosCabecera',
//  'Sección compara precios Resultados Cabecera <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_seccionComparaPreciosResultadosCabecera)</h6>',
//  array( $this, 'wpfunos_render_settings_field' ),
//  'wpfunos_general_settings',
//  'wpfunos_general_resultados_section',
//  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_seccionComparaPreciosResultadosCabecera','name' => 'wpfunos_seccionComparaPreciosResultadosCabecera','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
//);
// Sección Compara precios resultados pie
//add_settings_field(
//  'wpfunos_seccionComparaPreciosResultadosPie',
//  'Sección compara precios Resultados Pie <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_seccionComparaPreciosResultadosPie)</h6>',
//  array( $this, 'wpfunos_render_settings_field' ),
//  'wpfunos_general_settings',
//  'wpfunos_general_resultados_section',
//  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_seccionComparaPreciosResultadosPie','name' => 'wpfunos_seccionComparaPreciosResultadosPie','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
//);
// Formlario GEO-my-wp
//add_settings_field(
//  'wpfunos_formGeoMyWp',
//  'Formulario GEO my wp <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_formGeoMyWp)</h6>',
//  array( $this, 'wpfunos_render_settings_field' ),
//  'wpfunos_general_settings',
//  'wpfunos_general_resultados_section',
//  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_formGeoMyWp','name' => 'wpfunos_formGeoMyWp','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
//);
// Sección Compara precios resultados cabecera Aseguradoras
add_settings_field(
  'wpfunos_seccionComparaPreciosResultadosAseguradorasCabecera',
  'Sección compara precios Resultados Aseguradoras Cabecera <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_seccionComparaPreciosResultadosAseguradorasCabecera)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_resultados_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_seccionComparaPreciosResultadosAseguradorasCabecera','name' => 'wpfunos_seccionComparaPreciosResultadosAseguradorasCabecera','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Sección Compara precios resultados pie Aseguradoras
add_settings_field(
  'wpfunos_seccionComparaPreciosResultadosAseguradorasPie',
  'Sección compara precios Resultados Aseguradoras Pie <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_seccionComparaPreciosResultadosAseguradorasPie)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_resultados_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_seccionComparaPreciosResultadosAseguradorasPie','name' => 'wpfunos_seccionComparaPreciosResultadosAseguradorasPie','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Formlario GEO-my-wp Aseguradoras
add_settings_field(
  'wpfunos_formGeoMyWpAseguradoras',
  'Formulario GEO my wp Aseguradoras <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_formGeoMyWpAseguradoras)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_resultados_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_formGeoMyWpAseguradoras','name' => 'wpfunos_formGeoMyWpAseguradoras','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// CTA Pedimos presupuestos página resultados sin resultados [elementor-template id="51419"]
//add_settings_field(
//  'wpfunos_seccionPedimosPresupuesto',
//  'CTA Pedimos presupuestos página resultados sin resultados <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_seccionPedimosPresupuesto)</h6>',
//  array( $this, 'wpfunos_render_settings_field' ),
//  'wpfunos_general_settings',
//  'wpfunos_general_resultados_section',
//  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_seccionPedimosPresupuesto','name' => 'wpfunos_seccionPedimosPresupuesto','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
//);
// Mensaje superior precios confirmados (precios exclusivos)
add_settings_field(
  'wpfunos_seccionPreciosExclusivos',
  'Mensaje superior precios confirmados (precios exclusivos) <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_seccionPreciosExclusivos)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_resultados_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_seccionPreciosExclusivos','name' => 'wpfunos_seccionPreciosExclusivos','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Precio Medio Zona
add_settings_field(
  'wpfunos_seccionPreciosMedioZona',
  'Precio Medio Zona <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_seccionPreciosMedioZona)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_resultados_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_seccionPreciosMedioZona','name' => 'wpfunos_seccionPreciosMedioZona','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);



register_setting('wpfunos_general_settings', 'wpfunos_usuarioAPIpubliclog');
register_setting('wpfunos_general_settings', 'wpfunos_passAPIpubliclog');
//register_setting('wpfunos_general_settings', 'wpfunos_seccionComparaPreciosResultadosCabecera');
//register_setting('wpfunos_general_settings', 'wpfunos_seccionComparaPreciosResultadosPie');
//register_setting('wpfunos_general_settings', 'wpfunos_formGeoMyWp');
register_setting('wpfunos_general_settings', 'wpfunos_seccionComparaPreciosResultadosAseguradorasCabecera');
register_setting('wpfunos_general_settings', 'wpfunos_seccionComparaPreciosResultadosAseguradorasPie');
register_setting('wpfunos_general_settings', 'wpfunos_formGeoMyWpAseguradoras');
//register_setting('wpfunos_general_settings', 'wpfunos_seccionPedimosPresupuesto');
register_setting('wpfunos_general_settings', 'wpfunos_seccionPreciosExclusivos');
register_setting('wpfunos_general_settings', 'wpfunos_seccionPreciosMedioZona');
