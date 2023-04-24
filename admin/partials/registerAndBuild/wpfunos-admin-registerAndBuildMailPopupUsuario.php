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
  'wpfunos_mailcontacto_section',    				// ID used to identify this section and with which to register options
  '<span id="wpfunos-envio-contacto">Correo al usuario contacto</span>',      						// Title to be displayed on the administration page
  array( $this, 'wpfunos_display_mail_usuario_contacto' ), 		// Callback used to render the description of the section
  'wpfunos_mail_settings'                 						// Page on which to add this section of options
);
// Activar Mail Correo datos entrados
add_settings_field(
  'wpfunos_activarCorreoUsuarioContacto',
  'Activar Correo usuario entrada contacto <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_activarCorreoUsuarioContacto)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mailcontacto_section',
  array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_activarCorreoUsuarioContacto','name' => 'wpfunos_activarCorreoUsuarioContacto','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Cco datos entrados
//add_settings_field(
//  'wpfunos_mailCorreoCcoUsuarioContacto',
//  'Mail Correo Cco usuario entrada contacto <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoCcoUsuarioContacto)</h6>',
//  array( $this, 'wpfunos_render_settings_field' ),
//  'wpfunos_mail_settings',
//  'wpfunos_mailcontacto_section',
//  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoCcoUsuarioContacto','name' => 'wpfunos_mailCorreoCcoUsuarioContacto','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
//);
// Destino Mail Correo Bcc datos entrados
//add_settings_field(
//  'wpfunos_mailCorreoBccUsuarioContacto',
//  'Mail Correo Bcc usuario entrada contacto <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoBccUsuarioContacto)</h6>',
//  array( $this, 'wpfunos_render_settings_field' ),
//  'wpfunos_mail_settings',
//  'wpfunos_mailcontacto_section',
//  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoBccUsuarioContacto','name' => 'wpfunos_mailCorreoBccUsuarioContacto','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
//);
// Asunto Mail Correo datos entrados
//add_settings_field(
//  'wpfunos_asuntoCorreoUsuarioContacto',
//  'Asunto Correo usuario entrada contacto <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_asuntoCorreoUsuarioContacto)</h6>',
//  array( $this, 'wpfunos_render_settings_field' ),
//  'wpfunos_mail_settings',
//  'wpfunos_mailcontacto_section',
//  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_asuntoCorreoUsuarioContacto','name' => 'wpfunos_asuntoCorreoUsuarioContacto','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
//);
// Mensaje Mail Correo datos entrados
add_settings_field(
  'wpfunos_mensajeCorreoUsuarioContacto',
  'Mensaje Correo usuario entrada contacto <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mensajeCorreoUsuarioContacto)</h6>',
  array( $this, 'wpfunos_intro_render' ),
  'wpfunos_mail_settings',
  'wpfunos_mailcontacto_section',
  array('content_id' => 'wpfunos_mensajeCorreoUsuarioContacto')
);

register_setting('wpfunos_mail_settings', 'wpfunos_activarCorreoUsuarioContacto');
//register_setting('wpfunos_mail_settings', 'wpfunos_mailCorreoCcoUsuarioContacto');
//register_setting('wpfunos_mail_settings', 'wpfunos_mailCorreoBccUsuarioContacto');
//register_setting('wpfunos_mail_settings', 'wpfunos_asuntoCorreoUsuarioContacto');
register_setting('wpfunos_mail_settings', 'wpfunos_mensajeCorreoUsuarioContacto');
