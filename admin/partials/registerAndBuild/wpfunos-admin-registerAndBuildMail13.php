<?php
if ( ! defined( 'ABSPATH' ) ) { //Correo popup detalles aseguradora
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
  'wpfunos_mail13_section',    				// ID used to identify this section and with which to register options
  '<span id="wpfunos-popup-detalles-aseguradora">Correo Popup Detalles Aseguradora</span>',      						// Title to be displayed on the administration page
  array( $this, 'wpfunos_display_mail_account_aseguradora' ), 		// Callback used to render the description of the section
  'wpfunos_mail_settings'                 						// Page on which to add this section of options
);
// Activar Mail Correo Popup Detalles
add_settings_field(
  'wpfunos_activarCorreoPopupDetallesAseguradora',
  'Activar Correo Popup Detalles Aseguradora <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_activarCorreoPopupDetallesAseguradora)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail13_section',
  array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_activarCorreoPopupDetallesAseguradora','name' => 'wpfunos_activarCorreoPopupDetallesAseguradora','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Cco Popup Detalles
add_settings_field(
  'wpfunos_mailCorreoCcoPopupDetallesAseguradora',
  'Mail Correo Cco Popup Detalles Aseguradora <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoCcoPopupDetallesAseguradora)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail13_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoCcoPopupDetallesAseguradora','name' => 'wpfunos_mailCorreoCcoPopupDetallesAseguradora','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Bcc Popup Detalles
add_settings_field(
  'wpfunos_mailCorreoBccPopupDetallesAseguradora',
  'Mail Correo Bcc Popup Detalles Aseguradora <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoBccPopupDetallesAseguradora)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail13_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoBccPopupDetallesAseguradora','name' => 'wpfunos_mailCorreoBccPopupDetallesAseguradora','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Asunto Mail Correo Popup Detalles
add_settings_field(
  'wpfunos_asuntoCorreoPopupDetallesAseguradora',
  'Asunto Correo Popup Detalles Aseguradora <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_asuntoCorreoPopupDetallesAseguradora)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail13_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_asuntoCorreoPopupDetallesAseguradora','name' => 'wpfunos_asuntoCorreoPopupDetallesAseguradora','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Mensaje Mail Correo Popup Detalles
add_settings_field(
  'wpfunos_mensajeCorreoPopupDetallesAseguradora',
  'Mensaje Correo Popup Detalles Aseguradora <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mensajeCorreoPopupDetallesAseguradora)</h6>',
  array( $this, 'wpfunos_intro_render' ),
  'wpfunos_mail_settings',
  'wpfunos_mail13_section',
  array('content_id' => 'wpfunos_mensajeCorreoPopupDetallesAseguradora')
);

register_setting('wpfunos_mail_settings', 'wpfunos_activarCorreoPopupDetallesAseguradora');
register_setting('wpfunos_mail_settings', 'wpfunos_mailCorreoCcoPopupDetallesAseguradora');
register_setting('wpfunos_mail_settings', 'wpfunos_mailCorreoBccPopupDetallesAseguradora');
register_setting('wpfunos_mail_settings', 'wpfunos_asuntoCorreoPopupDetallesAseguradora');
register_setting('wpfunos_mail_settings', 'wpfunos_mensajeCorreoPopupDetallesAseguradora');
