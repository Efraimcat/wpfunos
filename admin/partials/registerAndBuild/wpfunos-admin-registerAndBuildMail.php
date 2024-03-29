<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
/**
* The admin-specific functionality of the plugin.
*
* @link       https://github.com/Efraimcat/wpfunos/
* @since      1.0.0
*
* @package    Wpfunos
* @subpackage Wpfunos/admin/partials/registerAndBuild
* @author     Efraim Bayarri <efraim@efraim.cat>
*/
add_settings_section(
  'wpfunos_mail_section',    				// ID used to identify this section and with which to register options
  '<span id="wpfunos-llamen-admin">Correo al administrador Botón "Quiero que me llamen"</span>',      // Title to be displayed on the administration page
  array( $this, 'wpfunos_display_mail_account' ), 				// Callback used to render the description of the section
  'wpfunos_mail_settings'                 						// Page on which to add this section of options
);
// Activar Mail Correo Boton 1 Admin
add_settings_field(
  'wpfunos_activarCorreoBoton1Admin',
  'Activar Correo Boton 1 Admin <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_activarCorreoBoton1Admin)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail_section',
  array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_activarCorreoBoton1Admin','name' => 'wpfunos_activarCorreoBoton1Admin','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Boton 1 Admin
add_settings_field(
  'wpfunos_mailCorreoBoton1Admin',
  'Mail Correo Boton 1 Admin <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoBoton1Admin)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoBoton1Admin','name' => 'wpfunos_mailCorreoBoton1Admin','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Cco Boton 1 Admin
add_settings_field(
  'wpfunos_mailCorreoCcoBoton1Admin',
  'Mail Correo Cco Boton 1 Admin <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoCcoBoton1Admin)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoCcoBoton1Admin','name' => 'wpfunos_mailCorreoCcoBoton1Admin','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Bcc Boton 1 Admin
add_settings_field(
  'wpfunos_mailCorreoBccBoton1Admin',
  'Mail Correo Bcc Boton 1 Admin <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoBccBoton1Admin)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoBccBoton1Admin','name' => 'wpfunos_mailCorreoBccBoton1Admin','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Asunto Mail Correo Boton 1 Admin
add_settings_field(
  'wpfunos_asuntoCorreoBoton1Admin',
  'Asunto Correo Boton 1 Admin <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_asuntoCorreoBoton1Admin)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_asuntoCorreoBoton1Admin','name' => 'wpfunos_asuntoCorreoBoton1Admin','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Mensaje Mail Correo Boton 1 Admin
add_settings_field(
  'wpfunos_mensajeCorreoBoton1Admin',
  'Mensaje Correo Boton 1 Admin <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mensajeCorreoBoton1Admin)</h6>',
  array( $this, 'wpfunos_intro_render' ),
  'wpfunos_mail_settings',
  'wpfunos_mail_section',
  array('content_id' => 'wpfunos_mensajeCorreoBoton1Admin')
);

register_setting('wpfunos_mail_settings', 'wpfunos_activarCorreoBoton1Admin');
register_setting('wpfunos_mail_settings', 'wpfunos_mailCorreoBoton1Admin');
register_setting('wpfunos_mail_settings', 'wpfunos_mailCorreoCcoBoton1Admin');
register_setting('wpfunos_mail_settings', 'wpfunos_mailCorreoBccBoton1Admin');
register_setting('wpfunos_mail_settings', 'wpfunos_asuntoCorreoBoton1Admin');
register_setting('wpfunos_mail_settings', 'wpfunos_mensajeCorreoBoton1Admin');
