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
  'wpfunos_maildatos_section',    				// ID used to identify this section and with which to register options
  '<span id="wpfunos-entrada-datos">Correo al usuario entrada datos</span>',      						// Title to be displayed on the administration page
  array( $this, 'wpfunos_display_mail_usuario_datos' ), 		// Callback used to render the description of the section
  'wpfunos_mail_settings'                 						// Page on which to add this section of options
);
// Activar Mail Correo datos entrados
add_settings_field(
  'wpfunos_activarCorreoUsuarioDatos',
  'Activar Correo usuario entrada datos <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_activarCorreoUsuarioDatos)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_maildatos_section',
  array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_activarCorreoUsuarioDatos','name' => 'wpfunos_activarCorreoUsuarioDatos','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Cco datos entrados
//add_settings_field(
//  'wpfunos_mailCorreoCcoUsuarioDatos',
//  'Mail Correo Cco usuario entrada datos <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoCcoUsuarioDatos)</h6>',
//  array( $this, 'wpfunos_render_settings_field' ),
//  'wpfunos_mail_settings',
//  'wpfunos_maildatos_section',
//  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoCcoUsuarioDatos','name' => 'wpfunos_mailCorreoCcoUsuarioDatos','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
//);
// Destino Mail Correo Bcc datos entrados
//add_settings_field(
//  'wpfunos_mailCorreoBccUsuarioDatos',
//  'Mail Correo Bcc usuario entrada datos <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoBccUsuarioDatos)</h6>',
//  array( $this, 'wpfunos_render_settings_field' ),
//  'wpfunos_mail_settings',
//  'wpfunos_maildatos_section',
//  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoBccUsuarioDatos','name' => 'wpfunos_mailCorreoBccUsuarioDatos','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
//);
// Asunto Mail Correo datos entrados
//add_settings_field(
//  'wpfunos_asuntoCorreoUsuarioDatos',
//  'Asunto Correo usuario entrada datos <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_asuntoCorreoUsuarioDatos)</h6>',
//  array( $this, 'wpfunos_render_settings_field' ),
//  'wpfunos_mail_settings',
//  'wpfunos_maildatos_section',
//  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_asuntoCorreoUsuarioDatos','name' => 'wpfunos_asuntoCorreoUsuarioDatos','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
//);
// Mensaje Mail Correo datos entrados
add_settings_field(
  'wpfunos_mensajeCorreoUsuarioDatos',
  'Mensaje Correo usuario entrada datos <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mensajeCorreoUsuarioDatos)</h6>',
  array( $this, 'wpfunos_intro_render' ),
  'wpfunos_mail_settings',
  'wpfunos_maildatos_section',
  array('content_id' => 'wpfunos_mensajeCorreoUsuarioDatos')
);

register_setting('wpfunos_mail_settings', 'wpfunos_activarCorreoUsuarioDatos');
//register_setting('wpfunos_mail_settings', 'wpfunos_mailCorreoCcoUsuarioDatos');
//register_setting('wpfunos_mail_settings', 'wpfunos_mailCorreoBccUsuarioDatos');
//register_setting('wpfunos_mail_settings', 'wpfunos_asuntoCorreoUsuarioDatos');
register_setting('wpfunos_mail_settings', 'wpfunos_mensajeCorreoUsuarioDatos');
