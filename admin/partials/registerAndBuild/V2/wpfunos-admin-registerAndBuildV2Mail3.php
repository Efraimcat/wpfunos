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
  'wpfunos_mailadminboton2v2_section',    							// ID used to identify this section and with which to register options
  '<span id="wpfunos-llamar-admin-v2">Correo botón "Llamar"</span>',               // Title to be displayed on the administration page
  array( $this, 'wpfunos_display_mail_account_v2' ), 		// Callback used to render the description of the section
  'wpfunos_mail_settings'                 				// Page on which to add this section of options
);
// Activar correo botón "Llamar"
add_settings_field(
  'wpfunos_activarCorreoBoton2v2Admin',
  'Activar correo botón "Llamar" <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_activarCorreoBoton2v2Admin)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mailadminboton2v2_section',
  array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_activarCorreoBoton2v2Admin','name' => 'wpfunos_activarCorreoBoton2v2Admin','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Dirección correo Cco botón "Llamar"
add_settings_field(
  'wpfunos_mailCorreoCcoBoton2v2Admin',
  'Dirección correo Cco botón "Llamar" <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoCcoBoton2v2Admin)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mailadminboton2v2_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoCcoBoton2v2Admin','name' => 'wpfunos_mailCorreoCcoBoton2v2Admin','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Dirección correo Bcc botón "Llamar"
add_settings_field(
  'wpfunos_mailCorreoBccBoton2v2Admin',
  'Dirección correo Bcc botón "Llamar" <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoBccBoton2v2Admin)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mailadminboton2v2_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoBccBoton2v2Admin','name' => 'wpfunos_mailCorreoBccBoton2v2Admin','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Asunto correo administrador botón "Llamar"
add_settings_field(
  'wpfunos_asuntoCorreoBoton2v2Admin',
  'Asunto correo administrador botón "Llamar" <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_asuntoCorreoBoton2v2Admin)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mailadminboton2v2_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_asuntoCorreoBoton2v2Admin','name' => 'wpfunos_asuntoCorreoBoton2v2Admin','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Mensaje correo administrador botón "Llamar"
add_settings_field(
  'wpfunos_mensajeCorreoBoton2v2Admin',
  'Mensaje correo administrador botón "Llamar" <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mensajeCorreoBoton2v2Admin)</h6>',
  array( $this, 'wpfunos_intro_render' ),
  'wpfunos_mail_settings',
  'wpfunos_mailadminboton2v2_section',
  array('content_id' => 'wpfunos_mensajeCorreoBoton2v2Admin')
);

register_setting('wpfunos_mail_settings', 'wpfunos_activarCorreoBoton2v2Admin');
register_setting('wpfunos_mail_settings', 'wpfunos_mailCorreoCcoBoton2v2Admin');
register_setting('wpfunos_mail_settings', 'wpfunos_mailCorreoBccBoton2v2Admin');
register_setting('wpfunos_mail_settings', 'wpfunos_asuntoCorreoBoton2v2Admin');
register_setting('wpfunos_mail_settings', 'wpfunos_mensajeCorreoBoton2v2Admin');
