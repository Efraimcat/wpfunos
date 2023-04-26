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
//wpfunos-admin-registerAndBuildAPIClientify.php
add_settings_section(
  'wpfunos_APIClientify_section',    							// ID used to identify this section and with which to register options
  'Datos conexiones API Clientify',        						// Title to be displayed on the administration page
  array( $this, 'wpfunos_display_APIClientify_account' ), 		// Callback used to render the description of the section
  'wpfunos_APIClientify_settings'                 				// Page on which to add this section of options
);
add_settings_field(
  'wpfunos_APIClientifyUsuarioClientify',
  'Usuario API Clientify <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_APIClientifyUsuarioClientify)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_APIClientify_settings',
  'wpfunos_APIClientify_section',
  array('type' => 'input','subtype' => 'password','id' => 'wpfunos_APIClientifyUsuarioClientify','name' => 'wpfunos_APIClientifyUsuarioClientify','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
  'wpfunos_APIClientifyPasswordClientify',
  'Password API Clientify <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_APIClientifyPasswordClientify)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_APIClientify_settings',
  'wpfunos_APIClientify_section',
  array('type' => 'input','subtype' => 'password','id' => 'wpfunos_APIClientifyPasswordClientify','name' => 'wpfunos_APIClientifyPasswordClientify','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);

register_setting('wpfunos_APIClientify_settings', 'wpfunos_APIClientifyUsuarioClientify');
register_setting('wpfunos_APIClientify_settings', 'wpfunos_APIClientifyPasswordClientify');
