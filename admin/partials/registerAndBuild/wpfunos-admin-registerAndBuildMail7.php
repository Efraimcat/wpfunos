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
  'wpfunos_mail7_section',    				// ID used to identify this section and with which to register options
  '<span id="wpfunos-lead-colaboradores">Correo Envio Lead Colaboradores</span>',      						// Title to be displayed on the administration page
  array( $this, 'wpfunos_display_mail_account_servicios_colaborador' ), 		// Callback used to render the description of the section
  'wpfunos_mail_settings'                 						// Page on which to add this section of options
);
// Activar Mail Correo datos entrados
add_settings_field(
  'wpfunos_activarCorreoServiciosColaborador',
  'Activar Correo Servicios Colaborador <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_activarCorreoServiciosColaborador)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail7_section',
  array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_activarCorreoServiciosColaborador','name' => 'wpfunos_activarCorreoServiciosColaborador','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Cco datos entrados
add_settings_field(
  'wpfunos_mailCorreoCcoServiciosColaborador',
  'Mail Correo Cco Servicios Colaborador <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoCcoServiciosColaborador)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail7_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoCcoServiciosColaborador','name' => 'wpfunos_mailCorreoCcoServiciosColaborador','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Bcc datos entrados
add_settings_field(
  'wpfunos_mailCorreoBccServiciosColaborador',
  'Mail Correo Bcc Servicios Colaborador <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoBccServiciosColaborador)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail7_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoBccServiciosColaborador','name' => 'wpfunos_mailCorreoBccServiciosColaborador','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Asunto Mail Correo datos entrados
add_settings_field(
  'wpfunos_asuntoCorreoServiciosColaborador',
  'Asunto Correo Servicios Colaborador <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_asuntoCorreoServiciosColaborador)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail7_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_asuntoCorreoServiciosColaborador','name' => 'wpfunos_asuntoCorreoServiciosColaborador','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Mensaje Mail Correo datos entrados
add_settings_field(
  'wpfunos_mensajeCorreoServiciosColaborador',
  'Mensaje Correo Servicios Colaborador <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mensajeCorreoServiciosColaborador)</h6>',
  array( $this, 'wpfunos_intro_render' ),
  'wpfunos_mail_settings',
  'wpfunos_mail7_section',
  array('content_id' => 'wpfunos_mensajeCorreoServiciosColaborador')
);

register_setting('wpfunos_mail_settings', 'wpfunos_activarCorreoServiciosColaborador');
register_setting('wpfunos_mail_settings', 'wpfunos_mailCorreoServiciosColaborador');
register_setting('wpfunos_mail_settings', 'wpfunos_mailCorreoCcoServiciosColaborador');
register_setting('wpfunos_mail_settings', 'wpfunos_mailCorreoBccServiciosColaborador');
register_setting('wpfunos_mail_settings', 'wpfunos_asuntoCorreoServiciosColaborador');
register_setting('wpfunos_mail_settings', 'wpfunos_mensajeCorreoServiciosColaborador');
