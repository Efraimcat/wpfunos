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
  'wpfunos_mailpreventiva_section',    						// ID used to identify this section and with which to register options
  'Correo Aviso Envio API Preventiva',        				// Title to be displayed on the administration page
  array( $this, 'wpfunos_display_mail_account_Preventiva' ),	// Callback used to render the description of the section
  'wpfunos_mail_settings'                 					// Page on which to add this section of options
);
// Activar Mail Correo Aviso Envio API Preventiva
add_settings_field(
  $this->plugin_name . '_activarCorreoPreventiva',
  'Activar Correo Aviso Envio API Preventiva <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_activarCorreoPreventiva)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mailpreventiva_section',
  array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_activarCorreoPreventiva','name' => $this->plugin_name . '_activarCorreoPreventiva','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Aviso Envio API Preventiva
add_settings_field(
  $this->plugin_name . '_mailCorreoPreventiva',
  'Mail Correo Aviso Envio API Preventiva <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoPreventiva)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mailpreventiva_section',
  array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_mailCorreoPreventiva','name' => $this->plugin_name . '__mailCorreoPreventiva','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Cco Aviso Envio API Preventiva
add_settings_field(
  $this->plugin_name . '_mailCorreoCcoPreventiva',
  'Mail Correo Cco Aviso Envio API Preventiva <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoCcoPreventiva)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mailpreventiva_section',
  array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_mailCorreoCcoPreventiva','name' => $this->plugin_name . '_mailCorreoCcoPreventiva','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Bcc Aviso Envio API Preventiva
add_settings_field(
  $this->plugin_name . '_mailCorreoBccPreventiva',
  'Mail Correo Bcc Aviso Envio API Preventiva <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoBccPreventiva)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mailpreventiva_section',
  array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_mailCorreoBccPreventiva','name' => $this->plugin_name . '_mailCorreoBccPreventiva','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Asunto Mail Correo Boton 2 Lead
add_settings_field(
  $this->plugin_name . '_asuntoCorreoPreventiva',
  'Asunto Correo Aviso Envio API Preventiva <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_asuntoCorreoPreventiva)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mailpreventiva_section',
  array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_asuntoCorreoPreventiva','name' => $this->plugin_name . '_asuntoCorreoPreventiva','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Mensaje Mail Correo Boton 2 Lead
add_settings_field(
  $this->plugin_name . '_mensajeCorreoPreventiva',
  'Mensaje Correo Aviso Envio API Preventiva <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mensajeCorreoPreventiva)</h6>',
  array( $this, 'wpfunos_intro_render' ),
  'wpfunos_mail_settings',
  'wpfunos_mailpreventiva_section',
  array('content_id' => 'wpfunos_mensajeCorreoPreventiva')
);

register_setting('wpfunos_mail_settings', $this->plugin_name . '_activarCorreoPreventiva');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_mailCorreoPreventiva');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_mailCorreoCcoPreventiva');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_mailCorreoBccPreventiva');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_asuntoCorreoPreventiva');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_mensajeCorreoPreventiva');
