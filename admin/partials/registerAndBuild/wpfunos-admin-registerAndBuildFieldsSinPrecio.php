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
		'wpfunos_general_sinprecio_section',    						// ID used to identify this section and with which to register options
		'<strong>Plantilla Sin Precio</strong>',			// Title to be displayed on the administration page
		array( $this, 'wpfunos_display_general_account_sinprecio' ), 	// Callback used to render the description of the section
		'wpfunos_general_settings'                 						// Page on which to add this section of options
	);
// Sección Compara precios resultados sin precio Superior
	add_settings_field(
		$this->plugin_name . '_seccionComparaPreciosResultadosSinPrecio',
		esc_html__('Sección compara precios Resultados Sin Precio Superior', 'wpfunos'),
   		array( $this, 'wpfunos_render_settings_field' ),
		'wpfunos_general_settings',
		'wpfunos_general_sinprecio_section',
		array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_seccionComparaPreciosResultadosSinPrecio','name' => $this->plugin_name . '_seccionComparaPreciosResultadosSinPrecio','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
 	);
// Sección Compara precios resultados sin precio Inferior
	add_settings_field(
		$this->plugin_name . '_seccionComparaPreciosResultadosSinPrecioInferior',
   		esc_html__('Sección compara precios Resultados Sin Precio Inferior', 'wpfunos'),
   		array( $this, 'wpfunos_render_settings_field' ),
		'wpfunos_general_settings',
		'wpfunos_general_sinprecio_section',
		array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_seccionComparaPreciosResultadosSinPrecioInferior','name' => $this->plugin_name . '_seccionComparaPreciosResultadosSinPrecioInferior','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
 	);

	register_setting('wpfunos_general_settings', $this->plugin_name . '_seccionComparaPreciosResultadosSinPrecio');
	register_setting('wpfunos_general_settings', $this->plugin_name . '_seccionComparaPreciosResultadosSinPrecioInferior');
