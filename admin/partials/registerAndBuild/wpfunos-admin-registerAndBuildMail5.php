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
add_settings_section('wpfunos_mail5_section',    				// ID used to identify this section and with which to register options
   'Correo Datos Usuario Entrados',      						// Title to be displayed on the administration page
   array( $this, 'wpfunos_display_mail_account_datos' ), 		// Callback used to render the description of the section
   'wpfunos_mail_settings'                 						// Page on which to add this section of options
);
// Activar Mail Correo datos entrados
add_settings_field(
 	$this->plugin_name . '_activarCorreoDatosEntrados',
 	'Activar Correo Datos Usuario Entrados <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_activarCorreoDatosEntrados)</h6>',
 	array( $this, 'wpfunos_render_settings_field' ),
 	'wpfunos_mail_settings',
 	'wpfunos_mail5_section',
 	array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_activarCorreoDatosEntrados','name' => $this->plugin_name . '_activarCorreoDatosEntrados','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo datos entrados
add_settings_field(
	$this->plugin_name . '_mailCorreoDatosEntrados',
	'Mail Correo Datos Usuario Entrados <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoDatosEntrados)</h6>',
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_mail_settings',
	'wpfunos_mail5_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_mailCorreoDatosEntrados','name' => $this->plugin_name . '_mailCorreoDatosEntrados','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Cco datos entrados
add_settings_field(
	$this->plugin_name . '_mailCorreoCcoDatosEntrados',
	'Mail Correo Cco Datos Usuario Entrados <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoCcoDatosEntrados)</h6>',
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_mail_settings',
	'wpfunos_mail5_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_mailCorreoCcoDatosEntrados','name' => $this->plugin_name . '_mailCorreoCcoDatosEntrados','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Destino Mail Correo Bcc datos entrados
add_settings_field(
	$this->plugin_name . '_mailCorreoBccDatosEntrados',
	'Mail Correo Bcc Datos Usuario Entrados <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoBccDatosEntrados)</h6>',
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_mail_settings',
	'wpfunos_mail5_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_mailCorreoBccDatosEntrados','name' => $this->plugin_name . '_mailCorreoBccDatosEntrados','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Asunto Mail Correo datos entrados
add_settings_field(
	$this->plugin_name . '_asuntoCorreoDatosEntrados',
	'Asunto Correo Datos Usuario Entrados <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_asuntoCorreoDatosEntrados)</h6>',
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_mail_settings',
	'wpfunos_mail5_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_asuntoCorreoDatosEntrados','name' => $this->plugin_name . '_asuntoCorreoDatosEntrados','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Mensaje Mail Correo datos entrados
add_settings_field(
	$this->plugin_name . '_mensajeCorreoDatosEntrados',
	'Mensaje Correo Datos Usuario Entrados <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mensajeCorreoDatosEntrados)</h6>',
	array( $this, 'wpfunos_intro_render' ),
	'wpfunos_mail_settings',
    'wpfunos_mail5_section',
	array('content_id' => 'wpfunos_mensajeCorreoDatosEntrados')
);

register_setting('wpfunos_mail_settings', $this->plugin_name . '_activarCorreoDatosEntrados');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_mailCorreoDatosEntrados');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_mailCorreoCcoDatosEntrados');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_mailCorreoBccDatosEntrados');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_asuntoCorreoDatosEntrados');
register_setting('wpfunos_mail_settings', $this->plugin_name . '_mensajeCorreoDatosEntrados');
