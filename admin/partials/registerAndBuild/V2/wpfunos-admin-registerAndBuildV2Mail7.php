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
  'wpfunos_mailleadpresupuesto_section',    							// ID used to identify this section and with which to register options
  '<span id="wpfunos-presupuesto-lead-v2">Correo funeraria botón "Pedir presupuesto"</span>',               // Title to be displayed on the administration page
  array( $this, 'wpfunos_display_mail_account_v2_presupuesto' ), 		// Callback used to render the description of the section
  'wpfunos_mail_settings_v3'                 				// Page on which to add this section of options
);
// Activar correo botón Presupuesto
add_settings_field(
  'wpfunos_activarCorreoPresupuestoLead',
  'Activar correo funeraria botón "Pedir presupuesto" <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_activarCorreoPresupuestoLead)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_v3',
  'wpfunos_mailleadpresupuesto_section',
  array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_activarCorreoPresupuestoLead','name' => 'wpfunos_activarCorreoPresupuestoLead','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Dirección correo Cco botón Presupuesto
add_settings_field(
  'wpfunos_mailCorreoCcoPresupuestoLead',
  'Dirección correo funeraria Cco botón "Pedir presupuesto" <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoCcoPresupuestoLead)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_v3',
  'wpfunos_mailleadpresupuesto_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoCcoPresupuestoLead','name' => 'wpfunos_mailCorreoCcoPresupuestoLead','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Dirección correo Bcc botón Presupuesto
add_settings_field(
  'wpfunos_mailCorreoBccPresupuestoLead',
  'Dirección correo funeraria Bcc botón "Pedir presupuesto" <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoBccPresupuestoLead)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_v3',
  'wpfunos_mailleadpresupuesto_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoBccPresupuestoLead','name' => 'wpfunos_mailCorreoBccPresupuestoLead','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Asunto correo administrador botón Presupuesto
add_settings_field(
  'wpfunos_asuntoCorreoPresupuestoLead',
  'Asunto correo funeraria botón "Pedir presupuesto" <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_asuntoCorreoPresupuestoLead)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_v3',
  'wpfunos_mailleadpresupuesto_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_asuntoCorreoPresupuestoLead','name' => 'wpfunos_asuntoCorreoPresupuestoLead','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Mensaje correo administrador botón Presupuesto
add_settings_field(
  'wpfunos_mensajeCorreoPresupuestoLead',
  'Mensaje correo funeraria botón "Pedir presupuesto" <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mensajeCorreoPresupuestoLead)</h6>',
  array( $this, 'wpfunos_intro_render' ),
  'wpfunos_mail_settings_v3',
  'wpfunos_mailleadpresupuesto_section',
  array('content_id' => 'wpfunos_mensajeCorreoPresupuestoLead')
);

register_setting('wpfunos_mail_settings_v3', 'wpfunos_activarCorreoPresupuestoLead');
register_setting('wpfunos_mail_settings_v3', 'wpfunos_mailCorreoCcoPresupuestoLead');
register_setting('wpfunos_mail_settings_v3', 'wpfunos_mailCorreoBccPresupuestoLead');
register_setting('wpfunos_mail_settings_v3', 'wpfunos_asuntoCorreoPresupuestoLead');
register_setting('wpfunos_mail_settings_v3', 'wpfunos_mensajeCorreoPresupuestoLead');
