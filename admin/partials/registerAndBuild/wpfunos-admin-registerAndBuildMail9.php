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
  'wpfunos_mail9_section',    										// ID used to identify this section and with which to register options
  '<span id="wpfunos-pedir-presupuesto-aseguradora">Correo Pedir presupuesto Aseguradora</span>',    // Title to be displayed on the administration page
  array( $this, 'wpfunos_display_mail_account_aseguradora' ), 		// Callback used to render the description of the section
  'wpfunos_mail_settings'                 							// Page on which to add this section of options
);

// Activar Mail Correo Pedir Presupuesto
add_settings_field(
  'wpfunos_activarCorreoPedirPresupuestoAseguradora',
  'Activar Pedir Presupuesto Aseguradora <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_activarCorreoPedirPresupuestoAseguradora)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail9_section',
  array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_activarCorreoPedirPresupuestoAseguradora','name' => 'wpfunos_activarCorreoPedirPresupuestoAseguradora','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Cco Pedir Presupuesto
add_settings_field(
  'wpfunos_mailCorreoCcoPedirPresupuestoAseguradora',
  'Mail Correo Cco Pedir Presupuesto Aseguradora <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoCcoPedirPresupuestoAseguradora)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail9_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoCcoPedirPresupuestoAseguradora','name' => 'wpfunos_mailCorreoCcoPedirPresupuestoAseguradora','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Bcc Pedir Presupuesto
add_settings_field(
  'wpfunos_mailCorreoBccPedirPresupuestoAseguradora',
  'Mail Correo Bcc Pedir Presupuesto Aseguradora <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoBccPedirPresupuestoAseguradora)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail9_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoBccPedirPresupuestoAseguradora','name' => 'wpfunos_mailCorreoBccPedirPresupuestoAseguradora','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Asunto Mail Correo Pedir Presupuesto
add_settings_field(
  'wpfunos_asuntoCorreoPedirPresupuestoAseguradora',
  'Asunto Correo Pedir Presupuesto Aseguradora <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_asuntoCorreoPedirPresupuestoAseguradora)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail9_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_asuntoCorreoPedirPresupuestoAseguradora','name' => 'wpfunos_asuntoCorreoPedirPresupuestoAseguradora','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Mensaje Mail Correo Pedir Presupuesto
add_settings_field(
  'wpfunos_mensajeCorreoPedirPresupuestoAseguradora',
  'Mensaje Correo Pedir Presupuesto Aseguradora <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mensajeCorreoPedirPresupuestoAseguradora)</h6>',
  array( $this, 'wpfunos_intro_render' ),
  'wpfunos_mail_settings',
  'wpfunos_mail9_section',
  array('content_id' => 'wpfunos_mensajeCorreoPedirPresupuestoAseguradora')
);

register_setting('wpfunos_mail_settings', 'wpfunos_activarCorreoPedirPresupuestoAseguradora');
register_setting('wpfunos_mail_settings', 'wpfunos_mailCorreoCcoPedirPresupuestoAseguradora');
register_setting('wpfunos_mail_settings', 'wpfunos_mailCorreoBccPedirPresupuestoAseguradora');
register_setting('wpfunos_mail_settings', 'wpfunos_asuntoCorreoPedirPresupuestoAseguradora');
register_setting('wpfunos_mail_settings', 'wpfunos_mensajeCorreoPedirPresupuestoAseguradora');
