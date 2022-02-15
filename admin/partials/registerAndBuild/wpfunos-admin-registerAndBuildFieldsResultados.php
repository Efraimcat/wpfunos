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
 */
 	add_settings_section(
		'wpfunos_general_resultados_section',  							// ID used to identify this section and with which to register options
		'<strong>Página Resultados</strong>',                           					// Title to be displayed on the administration page
		array( $this, 'wpfunos_display_general_account_resultados' ), 	// Callback used to render the description of the section
		'wpfunos_general_settings'                 						// Page on which to add this section of options
	);
// Sección Compara precios resultados cabecera
 	add_settings_field(
		$this->plugin_name . '_seccionComparaPreciosResultadosCabecera',
		esc_html__('Sección compara precios Resultados Cabecera', 'wpfunos'),
		array( $this, 'wpfunos_render_settings_field' ),
		'wpfunos_general_settings',
		'wpfunos_general_resultados_section',
		array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_seccionComparaPreciosResultadosCabecera','name' => $this->plugin_name . '_seccionComparaPreciosResultadosCabecera','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
 	);
// Sección Compara precios resultados pie
	add_settings_field(
		$this->plugin_name . '_seccionComparaPreciosResultadosPie',
		esc_html__('Sección compara precios Resultados Pie', 'wpfunos'),
		array( $this, 'wpfunos_render_settings_field' ),
		'wpfunos_general_settings',
		'wpfunos_general_resultados_section',
		array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_seccionComparaPreciosResultadosPie','name' => $this->plugin_name . '_seccionComparaPreciosResultadosPie','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
 	);
// Formlario GEO-my-wp
	add_settings_field(
		$this->plugin_name . '_formGeoMyWp',
		esc_html__('Formulario GEO my wp', 'wpfunos'),
		array( $this, 'wpfunos_render_settings_field' ),
		'wpfunos_general_settings',
		'wpfunos_general_resultados_section',
		array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_formGeoMyWp','name' => $this->plugin_name . '_formGeoMyWp','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
	);

// Sección Compara precios resultados cabecera Futuro
 	add_settings_field(
		$this->plugin_name . '_seccionComparaPreciosResultadosFuturoCabecera',
		esc_html__('Sección compara precios Resultados Futuro Cabecera', 'wpfunos'),
		array( $this, 'wpfunos_render_settings_field' ),
		'wpfunos_general_settings',
		'wpfunos_general_resultados_section',
		array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_seccionComparaPreciosResultadosFuturoCabecera','name' => $this->plugin_name . '_seccionComparaPreciosResultadosFuturoCabecera','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
 	);
// Sección Compara precios resultados pie Futuro
	add_settings_field(
		$this->plugin_name . '_seccionComparaPreciosResultadosFuturoPie',
		esc_html__('Sección compara precios Resultados Futuro Pie', 'wpfunos'),
		array( $this, 'wpfunos_render_settings_field' ),
		'wpfunos_general_settings',
		'wpfunos_general_resultados_section',
		array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_seccionComparaPreciosResultadosFuturoPie','name' => $this->plugin_name . '_seccionComparaPreciosResultadosFuturoPie','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
 	);
// Formlario GEO-my-wp
	add_settings_field(
		$this->plugin_name . '_formGeoMyWpFuturo',
		esc_html__('Formulario GEO my wp Futuro', 'wpfunos'),
		array( $this, 'wpfunos_render_settings_field' ),
		'wpfunos_general_settings',
		'wpfunos_general_resultados_section',
		array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_formGeoMyWpFuturo','name' => $this->plugin_name . '_formGeoMyWpFuturo','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
	);

	register_setting('wpfunos_general_settings', $this->plugin_name . '_seccionComparaPreciosResultadosCabecera');
	register_setting('wpfunos_general_settings', $this->plugin_name . '_seccionComparaPreciosResultadosPie');
	register_setting('wpfunos_general_settings', $this->plugin_name . '_formGeoMyWp');
	register_setting('wpfunos_general_settings', $this->plugin_name . '_seccionComparaPreciosResultadosFuturoCabecera');
	register_setting('wpfunos_general_settings', $this->plugin_name . '_seccionComparaPreciosResultadosFuturoPie');
	register_setting('wpfunos_general_settings', $this->plugin_name . '_formGeoMyWpFuturo');

