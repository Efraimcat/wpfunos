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
	'wpfunos_mail3_section',    							// ID used to identify this section and with which to register options
	'Correo al servicio Lead Botón "Que me llamen"',        // Title to be displayed on the administration page
	array( $this, 'wpfunos_display_mail_account' ), 		// Callback used to render the description of the section
	'wpfunos_mail_settings'                 				// Page on which to add this section of options
 );

// Activar Mail Correo Boton 1 Admin
 add_settings_field(
 	$this->plugin_name . '_activarCorreoBoton1Lead',
 	esc_html__('Activar Correo Boton 1 Lead', 'wpfunos'),
 	array( $this, 'wpfunos_render_settings_field' ),
 	'wpfunos_mail_settings',
 	'wpfunos_mail3_section',
 	array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_activarCorreoBoton1Lead','name' => $this->plugin_name . '_activarCorreoBoton1Lead','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
 );
// Destino Mail Correo Boton 1 Lead
//add_settings_field(
//	$this->plugin_name . '_mailCorreoBoton1Lead',
//	esc_html__('Mail Correo Boton 1 Lead', 'wpfunos'),
//	array( $this, 'wpfunos_render_settings_field' ),
//	'wpfunos_mail_settings',
//	'wpfunos_mail3_section',
//	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_mailCorreoBoton1Lead','name' => $this->plugin_name . '__mailCorreoBoton1Lead','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
//);
// Destino Mail Correo Cco Boton 1 Lead
add_settings_field(
	$this->plugin_name . '_mailCorreoCcoBoton1Lead',
	esc_html__('Mail Correo Cco Boton 1 Lead', 'wpfunos'),
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_mail_settings',
	'wpfunos_mail3_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_mailCorreoCcoBoton1Lead','name' => $this->plugin_name . '_mailCorreoCcoBoton1Lead','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Bcc Boton 1 Lead
add_settings_field(
	$this->plugin_name . '_mailCorreoBccBoton1Lead',
	esc_html__('Mail Correo Bcc Boton 1 Lead', 'wpfunos'),
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_mail_settings',
	'wpfunos_mail3_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_mailCorreoBccBoton1Lead','name' => $this->plugin_name . '_mailCorreoBccBoton1Lead','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Asunto Mail Correo Boton 1 Lead
add_settings_field(
	$this->plugin_name . '_asuntoCorreoBoton1Lead',
	esc_html__('Asunto Correo Boton 1 Lead', 'wpfunos'),
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_mail_settings',
	'wpfunos_mail3_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_asuntoCorreoBoton1Lead','name' => $this->plugin_name . '_asuntoCorreoBoton1Lead','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Mensaje Mail Correo Boton 1 Lead
add_settings_field(
	$this->plugin_name . '_mensajeCorreoBoton1Lead',
	esc_html__('Mensaje Correo Boton 1 Lead', 'wpfunos'),
	array( $this, 'wpfunos_intro_render' ),
	'wpfunos_mail_settings',
    'wpfunos_mail3_section',
	array('content_id' => 'wpfunos_mensajeCorreoBoton1Lead')
);

register_setting('wpfunos_mail_settings', $this->plugin_name . '_activarCorreoBoton1Lead');
// register_setting('wpfunos_mail_settings', $this->plugin_name . '_mailCorreoBoton1Lead');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_mailCorreoCcoBoton1Lead');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_mailCorreoBccBoton1Lead');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_asuntoCorreoBoton1Lead');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_mensajeCorreoBoton1Lead');
