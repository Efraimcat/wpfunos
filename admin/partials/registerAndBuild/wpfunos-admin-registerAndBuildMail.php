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
add_settings_section('wpfunos_mail_section',    				// ID used to identify this section and with which to register options
   'Correo al administrador Botón "Quiero que me llamen"',      // Title to be displayed on the administration page
   array( $this, 'wpfunos_display_mail_account' ), 				// Callback used to render the description of the section
   'wpfunos_mail_settings'                 						// Page on which to add this section of options
 );

// Activar Mail Correo Boton 1 Admin
 add_settings_field(
 	$this->plugin_name . '_activarCorreoBoton1Admin',
 	esc_html__('Activar Correo Boton 1 Admin', 'wpfunos'),
 	array( $this, 'wpfunos_render_settings_field' ),
 	'wpfunos_mail_settings',
 	'wpfunos_mail_section',
 	array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_activarCorreoBoton1Admin','name' => $this->plugin_name . '_activarCorreoBoton1Admin','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
 );
// Destino Mail Correo Boton 1 Admin
add_settings_field(
	$this->plugin_name . '_mailCorreoBoton1Admin',
	esc_html__('Mail Correo Boton 1 Admin', 'wpfunos'),
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_mail_settings',
	'wpfunos_mail_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_mailCorreoBoton1Admin','name' => $this->plugin_name . '_mailCorreoBoton1Admin','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Cco Boton 1 Admin
add_settings_field(
	$this->plugin_name . '_mailCorreoCcoBoton1Admin',
	esc_html__('Mail Correo Cco Boton 1 Admin', 'wpfunos'),
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_mail_settings',
	'wpfunos_mail_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_mailCorreoCcoBoton1Admin','name' => $this->plugin_name . '_mailCorreoCcoBoton1Admin','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Bcc Boton 1 Admin
add_settings_field(
	$this->plugin_name . '_mailCorreoBccBoton1Admin',
	esc_html__('Mail Correo Bcc Boton 1 Admin', 'wpfunos'),
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_mail_settings',
	'wpfunos_mail_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_mailCorreoBccBoton1Admin','name' => $this->plugin_name . '_mailCorreoBccBoton1Admin','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Asunto Mail Correo Boton 1 Admin
add_settings_field(
	$this->plugin_name . '_asuntoCorreoBoton1Admin',
	esc_html__('Asunto Correo Boton 1 Admin', 'wpfunos'),
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_mail_settings',
	'wpfunos_mail_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_asuntoCorreoBoton1Admin','name' => $this->plugin_name . '_asuntoCorreoBoton1Admin','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Mensaje Mail Correo Boton 1 Admin
add_settings_field(
	$this->plugin_name . '_mensajeCorreoBoton1Admin',
	esc_html__('Mensaje Correo Boton 1 Admin', 'wpfunos'),
	array( $this, 'wpfunos_intro_render' ),
	'wpfunos_mail_settings',
    'wpfunos_mail_section',
	array('content_id' => 'wpfunos_mensajeCorreoBoton1Admin')
);

register_setting('wpfunos_mail_settings', $this->plugin_name . '_activarCorreoBoton1Admin');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_mailCorreoBoton1Admin');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_mailCorreoCcoBoton1Admin');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_mailCorreoBccBoton1Admin');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_asuntoCorreoBoton1Admin');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_mensajeCorreoBoton1Admin');

