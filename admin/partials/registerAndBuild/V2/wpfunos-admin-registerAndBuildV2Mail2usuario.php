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
  'wpfunos_mailadminboton1v2usuario_section',    							// ID used to identify this section and with which to register options
  '<span id="wpfunos-llamen-usuario-v2">Correo usuario botón "Te llamamos"</span>',               // Title to be displayed on the administration page
  array( $this, 'wpfunos_display_mail_account_v2' ), 		// Callback used to render the description of the section
  'wpfunos_mail_settings_v3'                 				// Page on which to add this section of options
);
// Activar correo botón "Te llamamos"
add_settings_field(
  'wpfunos_activarCorreoBoton1v2usuario',
  'Activar correo funeraria usuario "Te llamamos" <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_activarCorreoBoton1v2usuario)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_v3',
  'wpfunos_mailadminboton1v2usuario_section',
  array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_activarCorreoBoton1v2usuario','name' => 'wpfunos_activarCorreoBoton1v2usuario','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Dirección correo Cco botón "Quiero que me llamen"
add_settings_field(
  'wpfunos_mailCorreoCcoBoton1v2usuario',
  'Dirección correo usuario Cco botón "Te llamamos" <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoCcoBoton1v2usuario)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_v3',
  'wpfunos_mailadminboton1v2usuario_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoCcoBoton1v2usuario','name' => 'wpfunos_mailCorreoCcoBoton1v2usuario','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Dirección correo Bcc botón "Quiero que me llamen"
add_settings_field(
  'wpfunos_mailCorreoBccBoton1v2usuario',
  'Dirección correo usuario Bcc botón "Te llamamos" <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoBccBoton1v2usuario)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_v3',
  'wpfunos_mailadminboton1v2usuario_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoBccBoton1v2usuario','name' => 'wpfunos_mailCorreoBccBoton1v2usuario','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Asunto correo administrador botón "Quiero que me llamen"
add_settings_field(
  'wpfunos_asuntoCorreoBoton1v2usuario',
  'Asunto correo usuario botón "Te llamamos" <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_asuntoCorreoBoton1v2usuario)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_v3',
  'wpfunos_mailadminboton1v2usuario_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_asuntoCorreoBoton1v2usuario','name' => 'wpfunos_asuntoCorreoBoton1v2usuario','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Mensaje correo administrador botón "Quiero que me llamen"
add_settings_field(
  'wpfunos_mensajeCorreoBoton1v2usuario',
  'Mensaje correo usuario botón "Te llamamos" <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mensajeCorreoBoton1v2usuario)</h6>',
  array( $this, 'wpfunos_intro_render' ),
  'wpfunos_mail_settings_v3',
  'wpfunos_mailadminboton1v2usuario_section',
  array('content_id' => 'wpfunos_mensajeCorreoBoton1v2usuario')
);

register_setting('wpfunos_mail_settings_v3', 'wpfunos_activarCorreoBoton1v2usuario');
register_setting('wpfunos_mail_settings_v3', 'wpfunos_mailCorreoCcoBoton1v2usuario');
register_setting('wpfunos_mail_settings_v3', 'wpfunos_mailCorreoBccBoton1v2usuario');
register_setting('wpfunos_mail_settings_v3', 'wpfunos_asuntoCorreoBoton1v2usuario');
register_setting('wpfunos_mail_settings_v3', 'wpfunos_mensajeCorreoBoton1v2usuario');
