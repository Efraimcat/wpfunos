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
  'wpfunos_direccionesip_section',    		// ID used to identify this section and with which to register options
  'Configuración correos desarrollo',      			// Title to be displayed on the administration page
  array( $this, 'wpfunos_display_direccionesip_account' ), 	// Callback used to render the description of the section
  'wpfunos_DireccionesIP_settings'                 			// Page on which to add this section of options
);
add_settings_field(
  'wpfunos_DireccionesIPDesarrollo',
  'Correos Administradores <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_DireccionesIPDesarrollo)</h6><h6 style="font-weight: 400;font-size: 12px;">Lista de direcciones email separadas mediante comas</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_DireccionesIP_settings',
  'wpfunos_direccionesip_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_DireccionesIPDesarrollo','name' => 'wpfunos_DireccionesIPDesarrollo','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
  'wpfunos_DireccionesColaboradores',
  'Correos Colaboradores<h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_DireccionesColaboradores)</h6><h6 style="font-weight: 400;font-size: 12px;">Lista de direcciones email separadas mediante comas</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_DireccionesIP_settings',
  'wpfunos_direccionesip_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_DireccionesColaboradores','name' => 'wpfunos_DireccionesColaboradores','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
  'wpfunos_DireccionesPruebas',
  'Correos Pruebas (no generan correos ni llamadas) <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_DireccionesPruebas)</h6><h6 style="font-weight: 400;font-size: 12px;">Lista de direcciones email separadas mediante comas</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_DireccionesIP_settings',
  'wpfunos_direccionesip_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_DireccionesPruebas','name' => 'wpfunos_DireccionesPruebas','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
  'wpfunos_EmailHubspot',
  'Correos Colaboradores Hubspot<h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_EmailHubspot)</h6><h6 style="font-weight: 400;font-size: 12px;">Lista de direcciones email separadas mediante comas</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_DireccionesIP_settings',
  'wpfunos_direccionesip_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_EmailHubspot','name' => 'wpfunos_EmailHubspot','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
  'wpfunos_IpHubspot',
  'IPs Colaboradores Hubspot<h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_IpHubspot)</h6><h6 style="font-weight: 400;font-size: 12px;">Lista de IPs separadas mediante comas</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_DireccionesIP_settings',
  'wpfunos_direccionesip_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_IpHubspot','name' => 'wpfunos_IpHubspot','required' => 'true','get_options_list' => '','value_type' => 'normal','size' => 120,'wp_data' => 'option')
);
add_settings_field(
  'wpfunos_UtkHubspot',
  'hupspotutk Colaboradores Hubspot<h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_UtkHubspot)</h6><h6 style="font-weight: 400;font-size: 12px;">Lista de hupspotutk separadas mediante comas</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_DireccionesIP_settings',
  'wpfunos_direccionesip_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_UtkHubspot','name' => 'wpfunos_UtkHubspot','required' => 'true','get_options_list' => '','value_type' => 'normal','size' => 120,'wp_data' => 'option')
);
add_settings_field(
  'wpfunos_HubspotEmailNo',
  'Email no registrados Hubspot<h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_HubspotEmailNo)</h6><h6 style="font-weight: 400;font-size: 12px;">Lista de correos separadas mediante comas</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_DireccionesIP_settings',
  'wpfunos_direccionesip_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_HubspotEmailNo','name' => 'wpfunos_HubspotEmailNo','required' => 'true','get_options_list' => '','value_type' => 'normal','size' => 120,'wp_data' => 'option')
);

register_setting('wpfunos_DireccionesIP_settings', 'wpfunos_DireccionesIPDesarrollo');
register_setting('wpfunos_DireccionesIP_settings', 'wpfunos_DireccionesColaboradores');
register_setting('wpfunos_DireccionesIP_settings', 'wpfunos_DireccionesPruebas');
register_setting('wpfunos_DireccionesIP_settings', 'wpfunos_EmailHubspot');
register_setting('wpfunos_DireccionesIP_settings', 'wpfunos_IpHubspot');
register_setting('wpfunos_DireccionesIP_settings', 'wpfunos_UtkHubspot');
register_setting('wpfunos_DireccionesIP_settings', 'wpfunos_HubspotEmailNo');
