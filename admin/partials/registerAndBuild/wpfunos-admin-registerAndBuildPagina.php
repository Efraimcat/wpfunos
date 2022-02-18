<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://efraim.cat
 * @since      1.0.0
 *
 * @package    Wpfunos
 * @subpackage Wpfunos/admin/partials
 * $this->plugin_name . '-admin-registerAndBuildPagina.php';
 */
 	add_settings_section(
		'wpfunos_general_pagina_section',    						// ID used to identify this section and with which to register options
		'<strong>Página Comparador</strong>',                           		// Title to be displayed on the administration page
		array( $this, 'wpfunos_display_general_account_pagina' ), 	// Callback used to render the description of the section
		'wpfunos_general_settings'                 					// Page on which to add this section of options
	);

// Página comparador
	add_settings_field(
    $this->plugin_name . '_paginaComparador',
		esc_html__('Página comparador', 'wpfunos'),
		array( $this, 'wpfunos_render_settings_field' ),
		'wpfunos_general_settings',
		'wpfunos_general_pagina_section',
		array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_paginaComparador','name' => $this->plugin_name . '_paginaComparador','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
	);
// Página detalles
	add_settings_field(
    $this->plugin_name . '_paginaDetalles',
		esc_html__('Página detalles', 'wpfunos'),
		array( $this, 'wpfunos_render_settings_field' ),
		'wpfunos_general_settings',
		'wpfunos_general_pagina_section',
		array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_paginaDetalles','name' => $this->plugin_name . '_paginaDetalles','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
	);
// Página Llamar
	add_settings_field(
    $this->plugin_name . '_paginaLlamar',
		esc_html__('Página llamar', 'wpfunos'),
		array( $this, 'wpfunos_render_settings_field' ),
		'wpfunos_general_settings',
		'wpfunos_general_pagina_section',
		array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_paginaLlamar','name' => $this->plugin_name . '_paginaLlamar','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
	);
// Página Llamen
	add_settings_field(
    $this->plugin_name . '_paginaLlamen',
		esc_html__('Página que me llamen', 'wpfunos'),
		array( $this, 'wpfunos_render_settings_field' ),
		'wpfunos_general_settings',
		'wpfunos_general_pagina_section',
		array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_paginaLlamen','name' => $this->plugin_name . '_paginaLlamen','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
	);
// URL resultados servicios
	add_settings_field(
    $this->plugin_name . '_paginaURLResultadosServicios',
		esc_html__('URL página resultados servicios', 'wpfunos'),
		array( $this, 'wpfunos_render_settings_field' ),
		'wpfunos_general_settings',
		'wpfunos_general_pagina_section',
		array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_paginaURLResultadosServicios','name' => $this->plugin_name . '_paginaURLResultadosServicios','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
	);
// Formulario GEO my wp ubicación
	add_settings_field
  ($this->plugin_name . '_paginaComparadorGeoMyWp',
		esc_html__('Formulario GEO my wp ubicación', 'wpfunos'),
		array( $this, 'wpfunos_render_settings_field' ),
		'wpfunos_general_settings',
		'wpfunos_general_pagina_section',
		array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . 'paginaComparadorGeoMyWp','name' => $this->plugin_name . '_paginaComparadorGeoMyWp','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
	);
// Página comparador Aseguradoras
	add_settings_field(
    $this->plugin_name . '_paginaComparadorAseguradoras',
		esc_html__('Página comparador Aseguradoras', 'wpfunos'),
		array( $this, 'wpfunos_render_settings_field' ),
		'wpfunos_general_settings',
		'wpfunos_general_pagina_section',
		array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_paginaComparadorAseguradoras','name' => $this->plugin_name . '_paginaComparadorAseguradoras','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
	);
// URL resultados aseguradoras
	add_settings_field(
    $this->plugin_name . '_paginaURLResultadosAseguradoras',
		esc_html__('URL página resultados aseguradoras', 'wpfunos'),
		array( $this, 'wpfunos_render_settings_field' ),
		'wpfunos_general_settings',
		'wpfunos_general_pagina_section',
		array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_paginaURLResultadosAseguradoras','name' => $this->plugin_name . '_paginaURLResultadosAseguradoras','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
	);
// Formulario GEO my wp ubicación Aseguradoras
	add_settings_field
  ($this->plugin_name . '_paginaComparadorGeoMyWpAseguradoras',
		esc_html__('Formulario GEO my wp ubicación Aseguradoras', 'wpfunos'),
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
	register_setting('wpfunos_general_settings', $this->plugin_name . '_paginaComparadorAseguradoras');
	register_setting('wpfunos_general_settings', $this->plugin_name . '_paginaURLResultadosAseguradoras');
	register_setting('wpfunos_general_settings', $this->plugin_name . '_paginaComparadorGeoMyWpAseguradoras');
