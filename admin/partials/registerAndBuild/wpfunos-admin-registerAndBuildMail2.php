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
  'wpfunos_mail2_section',    							// ID used to identify this section and with which to register options
  '<span id="wpfunos-llamar-admin">Correo al administrador Botón "Llamar"</span>',               // Title to be displayed on the administration page
  array( $this, 'wpfunos_display_mail_account' ), 		// Callback used to render the description of the section
  'wpfunos_mail_settings'                 				// Page on which to add this section of options
);
// Activar Mail Correo Boton 2 Admin
add_settings_field(
  $this->plugin_name . '_activarCorreoBoton2Admin',
  'Activar Correo Boton 2 Admin <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_activarCorreoBoton2Admin)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail2_section',
  array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_activarCorreoBoton2Admin','name' => $this->plugin_name . '_activarCorreoBoton2Admin','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Boton 2 Admin
add_settings_field(
  $this->plugin_name . '_mailCorreoBoton2Admin',
  'Mail Correo Boton 2 Admin <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoBoton2Admin)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail2_section',
  array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_mailCorreoBoton2Admin','name' => $this->plugin_name . '_mailCorreoBoton2Admin','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Cco Boton 2 Admin
add_settings_field(
  $this->plugin_name . '_mailCorreoCcoBoton2Admin',
  'Mail Correo Cco Boton 2 Admin <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoCcoBoton2Admin)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail2_section',
  array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_mailCorreoCcoBoton2Admin','name' => $this->plugin_name . '_mailCorreoCcoBoton2Admin','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Bcc Boton 2 Admin
add_settings_field(
  $this->plugin_name . '_mailCorreoBccBoton2Admin',
  'Mail Correo Bcc Boton 2 Admin <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoBccBoton2Admin)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail2_section',
  array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_mailCorreoBccBoton2Admin','name' => $this->plugin_name . '_mailCorreoBccBoton2Admin','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Asunto Mail Correo Boton 2 Admin
add_settings_field(
  $this->plugin_name . '_asuntoCorreoBoton2Admin',
  'Asunto Correo Boton 2 Admin <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_asuntoCorreoBoton2Admin)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail2_section',
  array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_asuntoCorreoBoton2Admin','name' => $this->plugin_name . '_asuntoCorreoBoton2Admin','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Mensaje Mail Correo Boton 2 Admin
add_settings_field(
  $this->plugin_name . '_mensajeCorreoBoton2Admin',
  'Mensaje Correo Boton 2 Admin <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mensajeCorreoBoton2Admin)</h6>',
  array( $this, 'wpfunos_intro_render' ),
  'wpfunos_mail_settings',
  'wpfunos_mail2_section',
  array('content_id' => 'wpfunos_mensajeCorreoBoton2Admin')
);

register_setting('wpfunos_mail_settings', $this->plugin_name . '_activarCorreoBoton2Admin');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_mailCorreoBoton2Admin');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_mailCorreoCcoBoton2Admin');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_mailCorreoBccBoton2Admin');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_asuntoCorreoBoton2Admin');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_mensajeCorreoBoton2Admin');
