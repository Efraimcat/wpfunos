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
	'wpfunos_general_pagina_section',    						// ID used to identify this section and with which to register options
	'<strong>Página Comparador</strong>',                       // Title to be displayed on the administration page
	array( $this, 'wpfunos_display_general_account_pagina' ), 	// Callback used to render the description of the section
	'wpfunos_general_settings'                 					// Page on which to add this section of options
);
// Página comparador
add_settings_field(
	$this->plugin_name . '_paginaComparador',
	'Página comparador <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_paginaComparador)</h6>',
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_general_settings',
	'wpfunos_general_pagina_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_paginaComparador','name' => $this->plugin_name . '_paginaComparador','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Página detalles
add_settings_field(
	$this->plugin_name . '_paginaDetalles',
	'Página detalles <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_paginaDetalles)</h6>', 
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_general_settings',
	'wpfunos_general_pagina_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_paginaDetalles','name' => $this->plugin_name . '_paginaDetalles','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Página Llamar
add_settings_field(
	$this->plugin_name . '_paginaLlamar',
	'Página llamar <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_paginaLlamar)</h6>',
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_general_settings',
	'wpfunos_general_pagina_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_paginaLlamar','name' => $this->plugin_name . '_paginaLlamar','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Página Llamen
add_settings_field(
	$this->plugin_name . '_paginaLlamen',
	'Página que me llamen <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_paginaLlamen)</h6>',
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_general_settings',
	'wpfunos_general_pagina_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_paginaLlamen','name' => $this->plugin_name . '_paginaLlamen','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// URL resultados servicios
add_settings_field(
	$this->plugin_name . '_paginaURLResultadosServicios',
	'URL página resultados servicios <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_paginaURLResultadosServicios)</h6>', 
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_general_settings',
	'wpfunos_general_pagina_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_paginaURLResultadosServicios','name' => $this->plugin_name . '_paginaURLResultadosServicios','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Orden inicial resultados
add_settings_field(
	$this->plugin_name . '_paginaComparadorOrden',
	'Orden inicial resultados ("precios" o "dist") <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_paginaComparadorOrden)</h6>', 
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_general_settings',
	'wpfunos_general_pagina_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . 'paginaComparadorOrden','name' => $this->plugin_name . '_paginaComparadorOrden','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Formulario GEO my wp ubicación
add_settings_field(
	$this->plugin_name . '_paginaComparadorGeoMyWp',
	'Formulario GEO my wp ubicación <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_paginaComparadorGeoMyWp)</h6>', 
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_general_settings',
	'wpfunos_general_pagina_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . 'paginaComparadorGeoMyWp','name' => $this->plugin_name . '_paginaComparadorGeoMyWp','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Página comparador Aseguradoras
add_settings_field(
	$this->plugin_name . '_paginaComparadorAseguradoras',
	'Página comparador Aseguradoras <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_paginaComparadorAseguradoras)</h6>', 
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_general_settings',
	'wpfunos_general_pagina_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_paginaComparadorAseguradoras','name' => $this->plugin_name . '_paginaComparadorAseguradoras','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// URL resultados aseguradoras
add_settings_field(
	$this->plugin_name . '_paginaURLResultadosAseguradoras',
	'URL página resultados aseguradoras <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_paginaURLResultadosAseguradoras)</h6>', 
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_general_settings',
	'wpfunos_general_pagina_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_paginaURLResultadosAseguradoras','name' => $this->plugin_name . '_paginaURLResultadosAseguradoras','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Formulario GEO my wp ubicación Aseguradoras
add_settings_field(
	$this->plugin_name . '_paginaComparadorGeoMyWpAseguradoras',
	'Formulario GEO my wp ubicación Aseguradoras <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_paginaComparadorGeoMyWpAseguradoras)</h6>',
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_general_settings',
	'wpfunos_general_pagina_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . 'paginaComparadorGeoMyWpAseguradoras','name' => $this->plugin_name . '_paginaComparadorGeoMyWpAseguradoras','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
	
register_setting('wpfunos_general_settings', $this->plugin_name . '_paginaComparador');
register_setting('wpfunos_general_settings', $this->plugin_name . '_paginaDetalles');
register_setting('wpfunos_general_settings', $this->plugin_name . '_paginaLlamar');
register_setting('wpfunos_general_settings', $this->plugin_name . '_paginaLlamen');
register_setting('wpfunos_general_settings', $this->plugin_name . '_paginaURLResultadosServicios');
register_setting('wpfunos_general_settings', $this->plugin_name . '_paginaComparadorGeoMyWp');
register_setting('wpfunos_general_settings', $this->plugin_name . '_paginaComparadorOrden');
register_setting('wpfunos_general_settings', $this->plugin_name . '_paginaComparadorAseguradoras');
register_setting('wpfunos_general_settings', $this->plugin_name . '_paginaURLResultadosAseguradoras');
register_setting('wpfunos_general_settings', $this->plugin_name . '_paginaComparadorGeoMyWpAseguradoras');
