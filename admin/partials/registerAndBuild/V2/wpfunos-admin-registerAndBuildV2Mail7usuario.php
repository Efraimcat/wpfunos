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
  'wpfunos_mailusuariopresupuesto_section',    							// ID used to identify this section and with which to register options
  '<span id="wpfunos-presupuesto-usuario-v2">Correo usuario botón "Pedir presupuesto"</span>',               // Title to be displayed on the administration page
  array( $this, 'wpfunos_display_mail_account_v2_presupuesto' ), 		// Callback used to render the description of the section
  'wpfunos_mail_settings_v3'                 				// Page on which to add this section of options
);
// Activar correo botón Presupuesto
add_settings_field(
  'wpfunos_activarCorreoPresupuestousuario',
  'Activar correo usuario botón "Pedir presupuesto" <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_activarCorreoPresupuestousuario)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_v3',
  'wpfunos_mailusuariopresupuesto_section',
  array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_activarCorreoPresupuestousuario','name' => 'wpfunos_activarCorreoPresupuestousuario','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Dirección correo Cco botón Presupuesto
add_settings_field(
  'wpfunos_mailCorreoCcoPresupuestousuario',
  'Dirección correo usuario Cco botón "Pedir presupuesto" <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoCcoPresupuestousuario)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_v3',
  'wpfunos_mailusuariopresupuesto_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoCcoPresupuestousuario','name' => 'wpfunos_mailCorreoCcoPresupuestousuario','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Dirección correo Bcc botón Presupuesto
add_settings_field(
  'wpfunos_mailCorreoBccPresupuestousuario',
  'Dirección correo usuario Bcc botón "Pedir presupuesto" <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoBccPresupuestousuario)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_v3',
  'wpfunos_mailusuariopresupuesto_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoBccPresupuestousuario','name' => 'wpfunos_mailCorreoBccPresupuestousuario','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Asunto correo administrador botón Presupuesto
add_settings_field(
  'wpfunos_asuntoCorreoPresupuestousuario',
  'Asunto correo usuario botón "Pedir presupuesto" <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_asuntoCorreoPresupuestousuario)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_v3',
  'wpfunos_mailusuariopresupuesto_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_asuntoCorreoPresupuestousuario','name' => 'wpfunos_asuntoCorreoPresupuestousuario','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Mensaje correo administrador botón Presupuesto
add_settings_field(
  'wpfunos_mensajeCorreoPresupuestousuario',
  'Mensaje correo usuario botón "Pedir presupuesto" <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mensajeCorreoPresupuestousuario)</h6>',
  array( $this, 'wpfunos_intro_render' ),
  'wpfunos_mail_settings_v3',
  'wpfunos_mailusuariopresupuesto_section',
  array('content_id' => 'wpfunos_mensajeCorreoPresupuestousuario')
);

register_setting('wpfunos_mail_settings_v3', 'wpfunos_activarCorreoPresupuestousuario');
register_setting('wpfunos_mail_settings_v3', 'wpfunos_mailCorreoCcoPresupuestousuario');
register_setting('wpfunos_mail_settings_v3', 'wpfunos_mailCorreoBccPresupuestousuario');
register_setting('wpfunos_mail_settings_v3', 'wpfunos_asuntoCorreoPresupuestousuario');
register_setting('wpfunos_mail_settings_v3', 'wpfunos_mensajeCorreoPresupuestousuario');
