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

// Página compaarador
	add_settings_field(
    $this->plugin_name . '_paginaComparador',
		esc_html__('Página comparador', 'wpfunos'),
		array( $this, 'wpfunos_render_settings_field' ),
		'wpfunos_general_settings',
		'wpfunos_general_pagina_section',
		array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_paginaComparador','name' => $this->plugin_name . '_paginaComparador','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
	);
// Sección Compara precios datos Futuro
	add_settings_field
  ($this->plugin_name . '_paginaComparadorGeoMyWp',
		esc_html__('Formulario GEO my wp ubicación', 'wpfunos'),
		array( $this, 'wpfunos_render_settings_field' ),
		'wpfunos_general_settings',
		'wpfunos_general_pagina_section',
		array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . 'paginaComparadorGeoMyWp','name' => $this->plugin_name . '_paginaComparadorGeoMyWp','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
	);
	
	register_setting('wpfunos_general_settings', $this->plugin_name . '_paginaComparador');
	register_setting('wpfunos_general_settings', $this->plugin_name . '_paginaComparadorGeoMyWp');

