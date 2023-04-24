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
  'wpfunos_mail6_section',    				// ID used to identify this section and with which to register options
  '<span id="wpfunos-popup-detalles">Correo Popup Detalles</span>',      						// Title to be displayed on the administration page
  array( $this, 'wpfunos_display_mail_account_popup_detalles' ), 		// Callback used to render the description of the section
  'wpfunos_mail_settings'                 						// Page on which to add this section of options
);
// Activar Mail Correo Popup Detalles
add_settings_field(
  'wpfunos_activarCorreoPopupDetalles',
  'Activar Correo Popup Detalles <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_activarCorreoPopupDetalles)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail6_section',
  array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_activarCorreoPopupDetalles','name' => 'wpfunos_activarCorreoPopupDetalles','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Cco Popup Detalles
add_settings_field(
  'wpfunos_mailCorreoCcoPopupDetalles',
  'Mail Correo Cco Popup Detalles <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoCcoPopupDetalles)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail6_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoCcoPopupDetalles','name' => 'wpfunos_mailCorreoCcoPopupDetalles','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Bcc Popup Detalles
add_settings_field(
  'wpfunos_mailCorreoBccPopupDetalles',
  'Mail Correo Bcc Popup Detalles <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoBccPopupDetalles)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail6_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoBccPopupDetalles','name' => 'wpfunos_mailCorreoBccPopupDetalles','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Asunto Mail Correo Popup Detalles
add_settings_field(
  'wpfunos_asuntoCorreoPopupDetalles',
  'Asunto Correo Popup Detalles <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_asuntoCorreoPopupDetalles)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail6_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_asuntoCorreoPopupDetalles','name' => 'wpfunos_asuntoCorreoPopupDetalles','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Mensaje Mail Correo Popup Detalles
add_settings_field(
  'wpfunos_mensajeCorreoPopupDetalles',
  'Mensaje Correo Popup Detalles <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mensajeCorreoPopupDetalles)</h6>',
  array( $this, 'wpfunos_intro_render' ),
  'wpfunos_mail_settings',
  'wpfunos_mail6_section',
  array('content_id' => 'wpfunos_mensajeCorreoPopupDetalles')
);

register_setting('wpfunos_mail_settings', 'wpfunos_activarCorreoPopupDetalles');
register_setting('wpfunos_mail_settings', 'wpfunos_mailCorreoCcoPopupDetalles');
register_setting('wpfunos_mail_settings', 'wpfunos_mailCorreoBccPopupDetalles');
register_setting('wpfunos_mail_settings', 'wpfunos_asuntoCorreoPopupDetalles');
register_setting('wpfunos_mail_settings', 'wpfunos_mensajeCorreoPopupDetalles');
