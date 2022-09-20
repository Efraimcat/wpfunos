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
  'wpfunos_mailsuariov2_section',    							// ID used to identify this section and with which to register options
  '<span id="wpfunos-entrada-usuario-v2">Correo al usuario formulario datos usuario</span>',               // Title to be displayed on the administration page
  array( $this, 'wpfunos_display_mail_account_admin_v2' ), 		// Callback used to render the description of the section
  'wpfunos_mail_settings_v3'                 				// Correo al administrador nuevos datos usuario
);
// Activar correo al administrador nuevos datos usuario
add_settings_field(
  'wpfunos_activarCorreov2usuario',
  'Activar correo al usuario formulario datos usuario <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_activarCorreov2usuario)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_v3',
  'wpfunos_mailsuariov2_section',
  array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_activarCorreov2usuario','name' => 'wpfunos_activarCorreov2usuario','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Dirección correo administrador nuevos datos usuario
add_settings_field(
  'wpfunos_mailCorreov2usuario',
  'Dirección correo usuario formulario datos usuario <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreov2usuario)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_v3',
  'wpfunos_mailsuariov2_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreov2usuario','name' => 'wpfunos_mailCorreov2usuario','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Dirección correo Cco nuevos datos usuario
add_settings_field(
  'wpfunos_mailCorreoCcov2usuario',
  'Dirección correo Cco usuario formulario datos usuario <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoCcov2usuario)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_v3',
  'wpfunos_mailsuariov2_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoCcov2usuario','name' => 'wpfunos_mailCorreoCcov2usuario','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Dirección correo Bcc nuevos datos usuario
add_settings_field(
  'wpfunos_mailCorreoBccv2usuario',
  'Dirección correo Bcc usuario formulario datos usuario <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoBccv2usuario)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_v3',
  'wpfunos_mailsuariov2_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoBccv2usuario','name' => 'wpfunos_mailCorreoBccv2usuario','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Asunto correo administrador nuevos datos usuario
add_settings_field(
  'wpfunos_asuntoCorreov2usuario',
  'Asunto correo usuario formulario datos usuario <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_asuntoCorreov2usuario)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_v3',
  'wpfunos_mailsuariov2_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_asuntoCorreov2usuario','name' => 'wpfunos_asuntoCorreov2usuario','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Mensaje correo administrador nuevos datos usuario
add_settings_field(
  'wpfunos_mensajeCorreov2usuario',
  'Mensaje correo usuario formulario datos usuario <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mensajeCorreov2usuario)</h6>',
  array( $this, 'wpfunos_intro_render' ),
  'wpfunos_mail_settings_v3',
  'wpfunos_mailsuariov2_section',
  array('content_id' => 'wpfunos_mensajeCorreov2usuario')
);

register_setting('wpfunos_mail_settings_v3', 'wpfunos_activarCorreov2usuario');
register_setting('wpfunos_mail_settings_v3', 'wpfunos_mailCorreov2usuario');
register_setting('wpfunos_mail_settings_v3', 'wpfunos_mailCorreoCcov2usuario');
register_setting('wpfunos_mail_settings_v3', 'wpfunos_mailCorreoBccv2usuario');
register_setting('wpfunos_mail_settings_v3', 'wpfunos_asuntoCorreov2usuario');
register_setting('wpfunos_mail_settings_v3', 'wpfunos_mensajeCorreov2usuario');
