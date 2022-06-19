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
  'wpfunos_mailserviciosv2detalles_section',    							// ID used to identify this section and with which to register options
  '<span id="wpfunos-popup-detalles-v2">Correo al usuario copia detalles</span>',               // Title to be displayed on the administration page
  array( $this, 'wpfunos_display_mail_account_v2_detalles' ), 		// Callback used to render the description of the section
  'wpfunos_mail_settings'                 				// Page on which to add this section of options
);
// Activar correo al administrador botón "Llamar"
add_settings_field(
  'wpfunos_activarCorreoUsuarioDetalles',
  'Activar correo al usuario enviar detalles" <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_activarCorreoUsuarioDetalles)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mailserviciosv2detalles_section',
  array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_activarCorreoUsuarioDetalles','name' => 'wpfunos_activarCorreoUsuarioDetalles','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Dirección correo Cco botón "Llamar"
add_settings_field(
  'wpfunos_mailCorreoCcoUsuarioDetalles',
  'Dirección correo Cco usuario enviar detalles <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoCcoUsuarioDetalles)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mailserviciosv2detalles_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoCcoUsuarioDetalles','name' => 'wpfunos_mailCorreoCcoUsuarioDetalles','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Dirección correo Bcc botón "Llamar"
add_settings_field(
  'wpfunos_mailCorreoBccUsuarioDetalles',
  'Dirección correo Bcc usuario enviar detalles <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoBccUsuarioDetalles)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mailserviciosv2detalles_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoBccUsuarioDetalles','name' => 'wpfunos_mailCorreoBccUsuarioDetalles','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Asunto correo administrador botón "Llamar"
add_settings_field(
  'wpfunos_asuntoCorreoUsuarioDetalles',
  'Asunto correo usuario enviar detalles <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_asuntoCorreoUsuarioDetalles)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mailserviciosv2detalles_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_asuntoCorreoUsuarioDetalles','name' => 'wpfunos_asuntoCorreoUsuarioDetalles','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Mensaje correo administrador botón "Llamar"
add_settings_field(
  'wpfunos_mensajeCorreoUsuarioDetalles',
  'Mensaje correo usuario enviar detalles <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mensajeCorreoUsuarioDetalles)</h6>',
  array( $this, 'wpfunos_intro_render' ),
  'wpfunos_mail_settings',
  'wpfunos_mailserviciosv2detalles_section',
  array('content_id' => 'wpfunos_mensajeCorreoUsuarioDetalles')
);

register_setting('wpfunos_mail_settings', 'wpfunos_activarCorreoUsuarioDetalles');
register_setting('wpfunos_mail_settings', 'wpfunos_mailCorreoCcoUsuarioDetalles');
register_setting('wpfunos_mail_settings', 'wpfunos_mailCorreoBccUsuarioDetalles');
register_setting('wpfunos_mail_settings', 'wpfunos_asuntoCorreoUsuarioDetalles');
register_setting('wpfunos_mail_settings', 'wpfunos_mensajeCorreoUsuarioDetalles');
