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
  'Correo Popup Detalles',      						// Title to be displayed on the administration page
  array( $this, 'wpfunos_display_mail_account_popup_detalles' ), 		// Callback used to render the description of the section
  'wpfunos_mail_settings'                 						// Page on which to add this section of options
);
// Activar Mail Correo Popup Detalles
add_settings_field(
  $this->plugin_name . '_activarCorreoPopupDetalles',
  'Activar Correo Popup Detalles <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_activarCorreoPopupDetalles)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail6_section',
  array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_activarCorreoPopupDetalles','name' => $this->plugin_name . '_activarCorreoPopupDetalles','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Cco Popup Detalles
add_settings_field(
  $this->plugin_name . '_mailCorreoCcoPopupDetalles',
  'Mail Correo Cco Popup Detalles <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoCcoPopupDetalles)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail6_section',
  array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_mailCorreoCcoPopupDetalles','name' => $this->plugin_name . '_mailCorreoCcoPopupDetalles','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Bcc Popup Detalles
add_settings_field(
  $this->plugin_name . '_mailCorreoBccPopupDetalles',
  'Mail Correo Bcc Popup Detalles <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoBccPopupDetalles)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail6_section',
  array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_mailCorreoBccPopupDetalles','name' => $this->plugin_name . '_mailCorreoBccPopupDetalles','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Asunto Mail Correo Popup Detalles
add_settings_field(
  $this->plugin_name . '_asuntoCorreoPopupDetalles',
  'Asunto Correo Popup Detalles <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_asuntoCorreoPopupDetalles)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail6_section',
  array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_asuntoCorreoPopupDetalles','name' => $this->plugin_name . '_asuntoCorreoPopupDetalles','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Mensaje Mail Correo Popup Detalles
add_settings_field(
  $this->plugin_name . '_mensajeCorreoPopupDetalles',
  'Mensaje Correo Popup Detalles <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mensajeCorreoPopupDetalles)</h6>',
  array( $this, 'wpfunos_intro_render' ),
  'wpfunos_mail_settings',
  'wpfunos_mail6_section',
  array('content_id' => 'wpfunos_mensajeCorreoPopupDetalles')
);

register_setting('wpfunos_mail_settings', $this->plugin_name . '_activarCorreoPopupDetalles');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_mailCorreoCcoPopupDetalles');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_mailCorreoBccPopupDetalles');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_asuntoCorreoPopupDetalles');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_mensajeCorreoPopupDetalles');
