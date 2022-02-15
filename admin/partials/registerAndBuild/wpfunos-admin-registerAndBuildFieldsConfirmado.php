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
		'wpfunos_general_confirmado_section',    						// ID used to identify this section and with which to register options
		'<strong>Plantilla Precio Confirmado</strong>',			// Title to be displayed on the administration page
		array( $this, 'wpfunos_display_general_account_confirmado' ), 	// Callback used to render the description of the section
		'wpfunos_general_settings'                 						// Page on which to add this section of options
	);

// Sección Compara precios resultados superior
	add_settings_field(
		$this->plugin_name . '_seccionComparaPreciosResultados',
   		esc_html__('Sección compara precios Resultados Superior', 'wpfunos'),
   		array( $this, 'wpfunos_render_settings_field' ),
     	'wpfunos_general_settings',
     	'wpfunos_general_confirmado_section',
     	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_seccionComparaPreciosResultados','name' => $this->plugin_name . '_seccionComparaPreciosResultados','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
 	);
// Sección Compara precios resultados inferior
	add_settings_field(
		$this->plugin_name . '_seccionComparaPreciosResultadosInferior',
   		esc_html__('Sección compara precios Resultados Inferior', 'wpfunos'),
   		array( $this, 'wpfunos_render_settings_field' ),
     	'wpfunos_general_settings',
     	'wpfunos_general_confirmado_section',
     	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_seccionComparaPreciosResultadosInferior','name' => $this->plugin_name . '_seccionComparaPreciosResultadosInferior','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
 	);

	register_setting('wpfunos_general_settings', $this->plugin_name . '_seccionComparaPreciosResultados');
	register_setting('wpfunos_general_settings', $this->plugin_name . '_seccionComparaPreciosResultadosInferior');
