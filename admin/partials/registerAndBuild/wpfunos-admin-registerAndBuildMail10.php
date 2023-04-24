<?php
if ( ! defined( 'ABSPATH' ) ) { //Correo Botón "Que me llamen" aseguradora
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
  'wpfunos_mail10_section',    										// ID used to identify this section and with which to register options
  '<span id="wpfunos-llamen-aseguradora">Correo a la aseguradora. Botón "Te llamamos"</span>',    // Title to be displayed on the administration page
  array( $this, 'wpfunos_display_mail_account_aseguradora' ), 		// Callback used to render the description of the section
  'wpfunos_mail_settings_aseguradoras'                 							// Page on which to add this section of options
);

// Activar Mail Correo Boton 1 Admin
add_settings_field(
  'wpfunos_activarCorreoBoton1LeadAseguradora',
  'Activar Correo aseguradora Botón "Te llamamos" <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_activarCorreoBoton1LeadAseguradora)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_aseguradoras',
  'wpfunos_mail10_section',
  array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_activarCorreoBoton1LeadAseguradora','name' => 'wpfunos_activarCorreoBoton1LeadAseguradora','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Cco Boton 1 Lead
add_settings_field(
  'wpfunos_mailCorreoCcoBoton1LeadAseguradora',
  'Mail Correo Cco aseguradora Botón "Te llamamos" <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoCcoBoton1LeadAseguradora)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_aseguradoras',
  'wpfunos_mail10_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoCcoBoton1LeadAseguradora','name' => 'wpfunos_mailCorreoCcoBoton1LeadAseguradora','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Bcc Boton 1 Lead
add_settings_field(
  'wpfunos_mailCorreoBccBoton1LeadAseguradora',
  'Mail Correo Bcc aseguradora Botón "Te llamamos" <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoBccBoton1LeadAseguradora)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_aseguradoras',
  'wpfunos_mail10_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoBccBoton1LeadAseguradora','name' => 'wpfunos_mailCorreoBccBoton1LeadAseguradora','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Asunto Mail Correo Boton 1 Lead
add_settings_field(
  'wpfunos_asuntoCorreoBoton1LeadAseguradora',
  'Asunto Correo aseguradora Botón "Te llamamos" <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_asuntoCorreoBoton1LeadAseguradora)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_aseguradoras',
  'wpfunos_mail10_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_asuntoCorreoBoton1LeadAseguradora','name' => 'wpfunos_asuntoCorreoBoton1LeadAseguradora','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Mensaje Mail Correo Boton 1 Lead
add_settings_field(
  'wpfunos_mensajeCorreoBoton1LeadAseguradora',
  'Mensaje Correo aseguradora Botón "Te llamamos" <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mensajeCorreoBoton1LeadAseguradora)</h6>',
  array( $this, 'wpfunos_intro_render' ),
  'wpfunos_mail_settings_aseguradoras',
  'wpfunos_mail10_section',
  array('content_id' => 'wpfunos_mensajeCorreoBoton1LeadAseguradora')
);

register_setting('wpfunos_mail_settings', 'wpfunos_activarCorreoBoton1LeadAseguradora');
register_setting('wpfunos_mail_settings', 'wpfunos_mailCorreoCcoBoton1LeadAseguradora');
register_setting('wpfunos_mail_settings', 'wpfunos_mailCorreoBccBoton1LeadAseguradora');
register_setting('wpfunos_mail_settings', 'wpfunos_asuntoCorreoBoton1LeadAseguradora');
register_setting('wpfunos_mail_settings', 'wpfunos_mensajeCorreoBoton1LeadAseguradora');
