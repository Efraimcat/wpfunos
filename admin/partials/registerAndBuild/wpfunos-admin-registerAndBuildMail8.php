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
  'wpfunos_mail8_section',    										// ID used to identify this section and with which to register options
  '<span id="wpfunos-pedir-presupuesto">Correo Pedir presupuesto Servicios</span>',    // Title to be displayed on the administration page
  array( $this, 'wpfunos_display_mail_account' ), 					// Callback used to render the description of the section
  'wpfunos_mail_settings'                 							// Page on which to add this section of options
);

// Activar Mail Correo Pedir Presupuesto
add_settings_field(
  'wpfunos_activarCorreoPedirPresupuesto',
  'Activar Pedir Presupuesto <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_activarCorreoPedirPresupuesto)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail8_section',
  array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_activarCorreoPedirPresupuesto','name' => 'wpfunos_activarCorreoPedirPresupuesto','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Cco Pedir Presupuesto
add_settings_field(
  'wpfunos_mailCorreoCcoPedirPresupuesto',
  'Mail Correo Cco Pedir Presupuesto <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoCcoPedirPresupuesto)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail8_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoCcoPedirPresupuesto','name' => 'wpfunos_mailCorreoCcoPedirPresupuesto','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Bcc Pedir Presupuesto
add_settings_field(
  'wpfunos_mailCorreoBccPedirPresupuesto',
  'Mail Correo Bcc Pedir Presupuesto <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoBccPedirPresupuesto)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail8_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoBccPedirPresupuesto','name' => 'wpfunos_mailCorreoBccPedirPresupuesto','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Asunto Mail Correo Pedir Presupuesto
add_settings_field(
  'wpfunos_asuntoCorreoPedirPresupuesto',
  'Asunto Correo Pedir Presupuesto <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_asuntoCorreoPedirPresupuesto)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail8_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_asuntoCorreoPedirPresupuesto','name' => 'wpfunos_asuntoCorreoPedirPresupuesto','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Mensaje Mail Correo Pedir Presupuesto
add_settings_field(
  'wpfunos_mensajeCorreoPedirPresupuesto',
  'Mensaje Correo Pedir Presupuesto <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mensajeCorreoPedirPresupuesto)</h6>',
  array( $this, 'wpfunos_intro_render' ),
  'wpfunos_mail_settings',
  'wpfunos_mail8_section',
  array('content_id' => 'wpfunos_mensajeCorreoPedirPresupuesto')
);

register_setting('wpfunos_mail_settings', 'wpfunos_activarCorreoPedirPresupuesto');
register_setting('wpfunos_mail_settings', 'wpfunos_mailCorreoCcoPedirPresupuesto');
register_setting('wpfunos_mail_settings', 'wpfunos_mailCorreoBccPedirPresupuesto');
register_setting('wpfunos_mail_settings', 'wpfunos_asuntoCorreoPedirPresupuesto');
register_setting('wpfunos_mail_settings', 'wpfunos_mensajeCorreoPedirPresupuesto');
