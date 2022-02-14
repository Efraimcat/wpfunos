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
	'wpfunos_mail4_section',    							// ID used to identify this section and with which to register options
	'Correo al servicio Lead Botón "Lamar"',        // Title to be displayed on the administration page
	array( $this, 'wpfunos_display_mail_account' ), 		// Callback used to render the description of the section
	'wpfunos_mail_settings'                 				// Page on which to add this section of options
 );

// Activar Mail Correo Boton 2 Lead
 add_settings_field(
 	$this->plugin_name . '_activarCorreoBoton2Lead',
 	esc_html__('Activar Correo Boton 2 Lead', 'wpfunos'),
 	array( $this, 'wpfunos_render_settings_field' ),
 	'wpfunos_mail_settings',
 	'wpfunos_mail4_section',
 	array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_activarCorreoBoton2Lead','name' => $this->plugin_name . '_activarCorreoBoton2Lead','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
 );
// Destino Mail Correo Boton 2 Lead
//add_settings_field(
//	$this->plugin_name . '_mailCorreoBoton2Lead',
//	esc_html__('Mail Correo Boton 2 Lead', 'wpfunos'),
//	array( $this, 'wpfunos_render_settings_field' ),
//	'wpfunos_mail_settings',
//	'wpfunos_mail4_section',
//	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_mailCorreoBoton2Lead','name' => $this->plugin_name . '__mailCorreoBoton2Lead','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
//);
// Destino Mail Correo Cco Boton 2 Lead
add_settings_field(
	$this->plugin_name . '_mailCorreoCcoBoton2Lead',
	esc_html__('Mail Correo Cco Boton 2 Lead', 'wpfunos'),
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_mail_settings',
	'wpfunos_mail4_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_mailCorreoCcoBoton2Lead','name' => $this->plugin_name . '_mailCorreoCcoBoton2Lead','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Bcc Boton 2 Lead
add_settings_field(
	$this->plugin_name . '_mailCorreoBccBoton2Lead',
	esc_html__('Mail Correo Bcc Boton 2 Lead', 'wpfunos'),
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_mail_settings',
	'wpfunos_mail4_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_mailCorreoBccBoton2Lead','name' => $this->plugin_name . '_mailCorreoBccBoton2Lead','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Asunto Mail Correo Boton 2 Lead
add_settings_field(
	$this->plugin_name . '_asuntoCorreoBoton2Lead',
	esc_html__('Asunto Correo Boton 2 Lead', 'wpfunos'),
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_mail_settings',
	'wpfunos_mail4_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_asuntoCorreoBoton2Lead','name' => $this->plugin_name . '_asuntoCorreoBoton2Lead','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Mensaje Mail Correo Boton 2 Lead
add_settings_field(
	$this->plugin_name . '_mensajeCorreoBoton2Lead',
	esc_html__('Mensaje Correo Boton 2 Lead', 'wpfunos'),
	array( $this, 'wpfunos_intro_render' ),
	'wpfunos_mail_settings',
    'wpfunos_mail4_section',
	array('content_id' => 'wpfunos_mensajeCorreoBoton2Lead')
);

register_setting('wpfunos_mail_settings', $this->plugin_name . '_activarCorreoBoton2Lead');
//register_setting('wpfunos_mail_settings', $this->plugin_name . '_mailCorreoBoton2Lead');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_mailCorreoCcoBoton2Lead');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_mailCorreoBccBoton2Lead');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_asuntoCorreoBoton2Lead');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_mensajeCorreoBoton2Lead');
