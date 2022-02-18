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
		'wpfunos_general_datos_section',    						// ID used to identify this section and with which to register options
		'<strong>Plantilla formulario datos</strong>',              // Title to be displayed on the administration page
		array( $this, 'wpfunos_display_general_account_datos' ), 	// Callback used to render the description of the section
		'wpfunos_general_settings'                 					// Page on which to add this section of options
	);

// Sección Compara precios datos
	add_settings_field($this->plugin_name . '_seccionComparaPreciosDatos',
		esc_html__('Sección compara precios Datos', 'wpfunos'),
		array( $this, 'wpfunos_render_settings_field' ),
		'wpfunos_general_settings',
		'wpfunos_general_datos_section',
		array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_seccionComparaPreciosDatos','name' => $this->plugin_name . '_seccionComparaPreciosDatos','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
	);
// Sección Compara precios datos Futuro
	add_settings_field($this->plugin_name . '_seccionComparaPreciosDatosAseguradoras',
		esc_html__('Sección compara precios Datos Aseguradoras', 'wpfunos'),
		array( $this, 'wpfunos_render_settings_field' ),
		'wpfunos_general_settings',
		'wpfunos_general_datos_section',
		array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_seccionComparaPreciosDatosAseguradoras','name' => $this->plugin_name . '_seccionComparaPreciosDatosAseguradoras','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
	);
	
	register_setting('wpfunos_general_settings', $this->plugin_name . '_seccionComparaPreciosDatos');
	register_setting('wpfunos_general_settings', $this->plugin_name . '_seccionComparaPreciosDatosAseguradoras');

