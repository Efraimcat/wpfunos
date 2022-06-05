<?php
if ( ! defined( 'ABSPATH' ) ) { //Correo Botón "Llamar" aseguradora
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
  'wpfunos_mail11_section',    								// ID used to identify this section and with which to register options
  '<span id="wpfunos-llamar-aseguradora">Correo Lead a la Aseguradora. Botón "Llamar"</span>',   // Title to be displayed on the administration page
  array( $this, 'wpfunos_display_mail_account_aseguradora' ), 		// Callback used to render the description of the section
  'wpfunos_mail_settings'                 					// Page on which to add this section of options
);
// Activar Mail Correo Boton 2 Lead
add_settings_field(
  $this->plugin_name . '_activarCorreoBoton2LeadAseguradora',
  'Activar Correo Boton 2 Lead Aseguradora <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_activarCorreoBoton2LeadAseguradora)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail11_section',
  array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_activarCorreoBoton2LeadAseguradora','name' => $this->plugin_name . '_activarCorreoBoton2LeadAseguradora','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Cco Boton 2 Lead
add_settings_field(
  $this->plugin_name . '_mailCorreoCcoBoton2LeadAseguradora',
  'Mail Correo Cco Boton 2 Lead Aseguradora <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoCcoBoton2LeadAseguradora)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail11_section',
  array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_mailCorreoCcoBoton2LeadAseguradora','name' => $this->plugin_name . '_mailCorreoCcoBoton2LeadAseguradora','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Bcc Boton 2 Lead
add_settings_field(
  $this->plugin_name . '_mailCorreoBccBoton2LeadAseguradora',
  'Mail Correo Bcc Boton 2 Lead Aseguradora <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoBccBoton2LeadAseguradora)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail11_section',
  array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_mailCorreoBccBoton2LeadAseguradora','name' => $this->plugin_name . '_mailCorreoBccBoton2LeadAseguradora','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Asunto Mail Correo Boton 2 Lead
add_settings_field(
  $this->plugin_name . '_asuntoCorreoBoton2LeadAseguradora',
  'Asunto Correo Boton 2 Lead Aseguradora <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_asuntoCorreoBoton2LeadAseguradora)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings',
  'wpfunos_mail11_section',
  array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_asuntoCorreoBoton2LeadAseguradora','name' => $this->plugin_name . '_asuntoCorreoBoton2LeadAseguradora','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Mensaje Mail Correo Boton 2 Lead
add_settings_field(
  $this->plugin_name . '_mensajeCorreoBoton2LeadAseguradora',
  'Mensaje Correo Boton 2 Lead Aseguradora <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mensajeCorreoBoton2LeadAseguradora)</h6>',
  array( $this, 'wpfunos_intro_render' ),
  'wpfunos_mail_settings',
  'wpfunos_mail11_section',
  array('content_id' => 'wpfunos_mensajeCorreoBoton2LeadAseguradora')
);

register_setting('wpfunos_mail_settings', $this->plugin_name . '_activarCorreoBoton2LeadAseguradora');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_mailCorreoCcoBoton2LeadAseguradora');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_mailCorreoBccBoton2LeadAseguradora');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_asuntoCorreoBoton2LeadAseguradora');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_mensajeCorreoBoton2LeadAseguradora');
