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
// Sección Compara precios resultados cabecera
add_settings_field(
	$this->plugin_name . '_seccionComparaPreciosResultadosCabecera',
	'Sección compara precios Resultados Cabecera <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_seccionComparaPreciosResultadosCabecera)</h6>',
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_general_settings',
	'wpfunos_general_resultados_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_seccionComparaPreciosResultadosCabecera','name' => $this->plugin_name . '_seccionComparaPreciosResultadosCabecera','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Sección Compara precios resultados pie
add_settings_field(
	$this->plugin_name . '_seccionComparaPreciosResultadosPie',
	'Sección compara precios Resultados Pie <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_seccionComparaPreciosResultadosPie)</h6>',
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_general_settings',
	'wpfunos_general_resultados_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_seccionComparaPreciosResultadosPie','name' => $this->plugin_name . '_seccionComparaPreciosResultadosPie','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Formlario GEO-my-wp
add_settings_field(
	$this->plugin_name . '_formGeoMyWp',
	'Formulario GEO my wp <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_formGeoMyWp)</h6>', 
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_general_settings',
	'wpfunos_general_resultados_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_formGeoMyWp','name' => $this->plugin_name . '_formGeoMyWp','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Sección Compara precios resultados cabecera Aseguradoras
add_settings_field(
	$this->plugin_name . '_seccionComparaPreciosResultadosAseguradorasCabecera',
	'Sección compara precios Resultados Aseguradoras Cabecera <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_seccionComparaPreciosResultadosAseguradorasCabecera)</h6>',
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_general_settings',
	'wpfunos_general_resultados_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_seccionComparaPreciosResultadosAseguradorasCabecera','name' => $this->plugin_name . '_seccionComparaPreciosResultadosAseguradorasCabecera','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Sección Compara precios resultados pie Aseguradoras
add_settings_field(
	$this->plugin_name . '_seccionComparaPreciosResultadosAseguradorasPie',
	'Sección compara precios Resultados Aseguradoras Pie <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_seccionComparaPreciosResultadosAseguradorasPie)</h6>', 
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_general_settings',
	'wpfunos_general_resultados_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_seccionComparaPreciosResultadosAseguradorasPie','name' => $this->plugin_name . '_seccionComparaPreciosResultadosAseguradorasPie','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Formlario GEO-my-wp Aseguradoras
add_settings_field(
	$this->plugin_name . '_formGeoMyWpAseguradoras',
	'Formulario GEO my wp Aseguradoras <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_formGeoMyWpAseguradoras)</h6>',
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_general_settings',
	'wpfunos_general_resultados_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_formGeoMyWpAseguradoras','name' => $this->plugin_name . '_formGeoMyWpAseguradoras','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);

register_setting('wpfunos_general_settings', $this->plugin_name . '_seccionComparaPreciosResultadosCabecera');
register_setting('wpfunos_general_settings', $this->plugin_name . '_seccionComparaPreciosResultadosPie');
register_setting('wpfunos_general_settings', $this->plugin_name . '_formGeoMyWp');
register_setting('wpfunos_general_settings', $this->plugin_name . '_seccionComparaPreciosResultadosAseguradorasCabecera');
register_setting('wpfunos_general_settings', $this->plugin_name . '_seccionComparaPreciosResultadosAseguradorasPie');
register_setting('wpfunos_general_settings', $this->plugin_name . '_formGeoMyWpAseguradoras');
