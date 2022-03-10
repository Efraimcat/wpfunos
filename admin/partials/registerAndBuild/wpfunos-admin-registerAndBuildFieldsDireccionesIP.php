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
add_settings_section('wpfunos_direccionesip_section',    		// ID used to identify this section and with which to register options
   'Configuración direcciones IP desarrollo',      				// Title to be displayed on the administration page
   array( $this, 'wpfunos_display_direccionesip_account' ), 	// Callback used to render the description of the section
   'wpfunos_DireccionesIP_settings'                 			// Page on which to add this section of options
 );

// 
add_settings_field(
	$this->plugin_name . '_DireccionesIPDesarrollo',
	'Direcciones IP desarrollo <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_DireccionesIPDesarrollo)</h6><h6 style="font-weight: 400;font-size: 12px;">Lista de direcciones IP separadas mediante comas</h6>',
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_DireccionesIP_settings',
    'wpfunos_direccionesip_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_DireccionesIPDesarrollo','name' => $this->plugin_name . '_DireccionesIPDesarrollo','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);

register_setting('wpfunos_DireccionesIP_settings', $this->plugin_name . '_DireccionesIPDesarrollo');