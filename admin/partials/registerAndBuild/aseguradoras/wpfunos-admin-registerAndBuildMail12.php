<?php
if ( ! defined( 'ABSPATH' ) ) { //Datos usuario enviados aseguradora
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
  'wpfunos_mail12_section',    				// ID used to identify this section and with which to register options
  '<span id="wpfunos-datos-entrados-aseguradora">Correo Datos Usuario Entrados Aseguradora</span>',      						// Title to be displayed on the administration page
  array( $this, 'wpfunos_display_mail_account_aseguradora' ), 		// Callback used to render the description of the section
  'wpfunos_mail_settings_aseguradoras'                 						// Page on which to add this section of options
);
// Activar Mail Correo datos entrados
add_settings_field(
  'wpfunos_activarCorreoDatosEntradosAseguradora',
  'Activar Correo Datos Usuario Entrados Aseguradora <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_activarCorreoDatosEntradosAseguradora)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_aseguradoras',
  'wpfunos_mail12_section',
  array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_activarCorreoDatosEntradosAseguradora','name' => 'wpfunos_activarCorreoDatosEntradosAseguradora','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo datos entrados
add_settings_field(
  'wpfunos_mailCorreoDatosEntradosAseguradora',
  'Mail Correo Datos Usuario Entrados Aseguradora <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoDatosEntradosAseguradora)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_aseguradoras',
  'wpfunos_mail12_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoDatosEntradosAseguradora','name' => 'wpfunos_mailCorreoDatosEntradosAseguradora','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Cco datos entrados
add_settings_field(
  'wpfunos_mailCorreoCcoDatosEntradosAseguradora',
  'Mail Correo Cco Datos Usuario Entrados Aseguradora <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoCcoDatosEntradosAseguradora)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_aseguradoras',
  'wpfunos_mail12_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoCcoDatosEntradosAseguradora','name' => 'wpfunos_mailCorreoCcoDatosEntradosAseguradora','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Bcc datos entrados
add_settings_field(
  'wpfunos_mailCorreoBccDatosEntradosAseguradora',
  'Mail Correo Bcc Datos Usuario Entrados Aseguradora <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoBccDatosEntradosAseguradora)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_aseguradoras',
  'wpfunos_mail12_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_mailCorreoBccDatosEntradosAseguradora','name' => 'wpfunos_mailCorreoBccDatosEntradosAseguradora','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Asunto Mail Correo datos entrados
add_settings_field(
  'wpfunos_asuntoCorreoDatosEntradosAseguradora',
  'Asunto Correo Datos Usuario Entrados Aseguradora <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_asuntoCorreoDatosEntradosAseguradora)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_aseguradoras',
  'wpfunos_mail12_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_asuntoCorreoDatosEntradosAseguradora','name' => 'wpfunos_asuntoCorreoDatosEntradosAseguradora','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Mensaje Mail Correo datos entrados
add_settings_field(
  'wpfunos_mensajeCorreoDatosEntradosAseguradora',
  'Mensaje Correo Datos Usuario Entrados Aseguradora <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mensajeCorreoDatosEntradosAseguradora)</h6>',
  array( $this, 'wpfunos_intro_render' ),
  'wpfunos_mail_settings_aseguradoras',
  'wpfunos_mail12_section',
  array('content_id' => 'wpfunos_mensajeCorreoDatosEntradosAseguradora')
);

register_setting('wpfunos_mail_settings_aseguradoras', 'wpfunos_activarCorreoDatosEntradosAseguradora');
register_setting('wpfunos_mail_settings_aseguradoras', 'wpfunos_mailCorreoDatosEntradosAseguradora');
register_setting('wpfunos_mail_settings_aseguradoras', 'wpfunos_mailCorreoCcoDatosEntradosAseguradora');
register_setting('wpfunos_mail_settings_aseguradoras', 'wpfunos_mailCorreoBccDatosEntradosAseguradora');
register_setting('wpfunos_mail_settings_aseguradoras', 'wpfunos_asuntoCorreoDatosEntradosAseguradora');
register_setting('wpfunos_mail_settings_aseguradoras', 'wpfunos_mensajeCorreoDatosEntradosAseguradora');
