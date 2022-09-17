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
  '<span id="wpfunos-api-preventiva">Correo Aviso Envio API</span>',        				// Title to be displayed on the administration page
  array( $this, 'wpfunos_display_mail_account_Preventiva' ),	// Callback used to render the description of the section
  'wpfunos_mail_settings_aseguradoras'                 					// Page on which to add this section of options
);
// Activar Mail Correo Aviso Envio API Preventiva
add_settings_field(
  'wpfunos_activarCorreoPreventiva',
  'Activar Correo Aviso Envio API <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_activarCorreoPreventiva)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_aseguradoras',
  'wpfunos_mailpreventiva_section',
  array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_activarCorreoPreventiva','name' => 'wpfunos_activarCorreoPreventiva','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Aviso Envio API Preventiva
add_settings_field(
  'wpfunos_mailCorreoPreventiva',
  'Mail Correo Aviso Envio API <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoPreventiva)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_aseguradoras',
  'wpfunos_mailpreventiva_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoPreventiva','name' => 'wpfunos_mailCorreoPreventiva','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Cco Aviso Envio API Preventiva
add_settings_field(
  'wpfunos_mailCorreoCcoPreventiva',
  'Mail Correo Cco Aviso Envio API <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoCcoPreventiva)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_aseguradoras',
  'wpfunos_mailpreventiva_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoCcoPreventiva','name' => 'wpfunos_mailCorreoCcoPreventiva','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Bcc Aviso Envio API Preventiva
add_settings_field(
  'wpfunos_mailCorreoBccPreventiva',
  'Mail Correo Bcc Aviso Envio API <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoBccPreventiva)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_aseguradoras',
  'wpfunos_mailpreventiva_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoBccPreventiva','name' => 'wpfunos_mailCorreoBccPreventiva','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Asunto Mail Correo Boton 2 Lead
add_settings_field(
  'wpfunos_asuntoCorreoPreventiva',
  'Asunto Correo Aviso Envio API <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_asuntoCorreoPreventiva)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_aseguradoras',
  'wpfunos_mailpreventiva_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_asuntoCorreoPreventiva','name' => 'wpfunos_asuntoCorreoPreventiva','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Mensaje Mail Correo Boton 2 Lead
add_settings_field(
  'wpfunos_mensajeCorreoPreventiva',
  'Mensaje Correo Aviso Envio API <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mensajeCorreoPreventiva)</h6>',
  array( $this, 'wpfunos_intro_render' ),
  'wpfunos_mail_settings_aseguradoras',
  'wpfunos_mailpreventiva_section',
  array('content_id' => 'wpfunos_mensajeCorreoPreventiva')
);

register_setting('wpfunos_mail_settings_aseguradoras', 'wpfunos_activarCorreoPreventiva');
register_setting('wpfunos_mail_settings_aseguradoras', 'wpfunos_mailCorreoPreventiva');
register_setting('wpfunos_mail_settings_aseguradoras', 'wpfunos_mailCorreoCcoPreventiva');
register_setting('wpfunos_mail_settings_aseguradoras', 'wpfunos_mailCorreoBccPreventiva');
register_setting('wpfunos_mail_settings_aseguradoras', 'wpfunos_asuntoCorreoPreventiva');
register_setting('wpfunos_mail_settings_aseguradoras', 'wpfunos_mensajeCorreoPreventiva');
