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
  'wpfunos_mailadminv2_section',    							// ID used to identify this section and with which to register options
  '<span id="wpfunos-entrada-admin-v2">Correo al administrador formulario datos usuario</span>',               // Title to be displayed on the administration page
  array( $this, 'wpfunos_display_mail_account_admin_v2' ), 		// Callback used to render the description of the section
  'wpfunos_mail_settings_v3'                 				// Correo al administrador nuevos datos usuario
);
// Activar correo al administrador nuevos datos usuario
add_settings_field(
  'wpfunos_activarCorreov2Admin',
  'Activar correo al administrador formulario datos usuario <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_activarCorreov2Admin)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_v3',
  'wpfunos_mailadminv2_section',
  array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_activarCorreov2Admin','name' => 'wpfunos_activarCorreov2Admin','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Dirección correo administrador nuevos datos usuario
add_settings_field(
  'wpfunos_mailCorreov2Admin',
  'Dirección correo administrador formulario datos usuario <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreov2Admin)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_v3',
  'wpfunos_mailadminv2_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreov2Admin','name' => 'wpfunos_mailCorreov2Admin','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Dirección correo Cco nuevos datos usuario
add_settings_field(
  'wpfunos_mailCorreoCcov2Admin',
  'Dirección correo Cco formulario datos usuario <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoCcov2Admin)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_v3',
  'wpfunos_mailadminv2_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoCcov2Admin','name' => 'wpfunos_mailCorreoCcov2Admin','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Dirección correo Bcc nuevos datos usuario
add_settings_field(
  'wpfunos_mailCorreoBccv2Admin',
  'Dirección correo Bcc formulario datos usuario <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoBccv2Admin)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_v3',
  'wpfunos_mailadminv2_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoBccv2Admin','name' => 'wpfunos_mailCorreoBccv2Admin','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Asunto correo administrador nuevos datos usuario
add_settings_field(
  'wpfunos_asuntoCorreov2Admin',
  'Asunto correo administrador formulario datos usuario <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_asuntoCorreov2Admin)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_v3',
  'wpfunos_mailadminv2_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_asuntoCorreov2Admin','name' => 'wpfunos_asuntoCorreov2Admin','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Mensaje correo administrador nuevos datos usuario
add_settings_field(
  'wpfunos_mensajeCorreov2Admin',
  'Mensaje correo administrador formulario datos usuario <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mensajeCorreov2Admin)</h6>',
  array( $this, 'wpfunos_intro_render' ),
  'wpfunos_mail_settings_v3',
  'wpfunos_mailadminv2_section',
  array('content_id' => 'wpfunos_mensajeCorreov2Admin')
);

register_setting('wpfunos_mail_settings_v3', 'wpfunos_activarCorreov2Admin');
register_setting('wpfunos_mail_settings_v3', 'wpfunos_mailCorreov2Admin');
register_setting('wpfunos_mail_settings_v3', 'wpfunos_mailCorreoCcov2Admin');
register_setting('wpfunos_mail_settings_v3', 'wpfunos_mailCorreoBccv2Admin');
register_setting('wpfunos_mail_settings_v3', 'wpfunos_asuntoCorreov2Admin');
register_setting('wpfunos_mail_settings_v3', 'wpfunos_mensajeCorreov2Admin');
