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
  'wpfunos_APIClientifyActivaClientify',
  'Clientify activo <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_APIClientifyActivaClientify)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_APIClientify_settings',
  'wpfunos_APIClientify_section',
  array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_APIClientifyActivaClientify','name' => 'wpfunos_APIClientifyActivaClientify','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
  'wpfunos_APIClientifyKeyClientify',
  'API Key Clientify <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_APIClientifyKeyClientify)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_APIClientify_settings',
  'wpfunos_APIClientify_section',
  array('type' => 'input','subtype' => 'password','id' => 'wpfunos_APIClientifyKeyClientify','name' => 'wpfunos_APIClientifyKeyClientify','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// APIClientifyActionsUser (email)
// APIClientifyExlcudedUsers (email)
add_settings_field(
  'wpfunos_APIClientifyActionsUser',
  'Usuario asignado a las tareas <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_APIClientifyActionsUser)</h6><h6 style="font-weight: 400;font-size: 12px;">Dirección email</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_APIClientify_settings',
  'wpfunos_APIClientify_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_APIClientifyActionsUser','name' => 'wpfunos_APIClientifyActionsUser','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
  'wpfunos_APIClientifyExlcudedUsers',
  'Direcciones de correo excluidas de Clientify <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_APIClientifyExlcudedUsers)</h6><h6 style="font-weight: 400;font-size: 12px;">Lista de direcciones email separadas mediante comas</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_APIClientify_settings',
  'wpfunos_APIClientify_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_APIClientifyExlcudedUsersr','name' => 'wpfunos_APIClientifyExlcudedUsers','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);


register_setting('wpfunos_APIClientify_settings', 'wpfunos_APIClientifyKeyClientify');
register_setting('wpfunos_APIClientify_settings', 'wpfunos_APIClientifyActivaClientify');
register_setting('wpfunos_APIClientify_settings', 'wpfunos_APIClientifyActionsUser');
register_setting('wpfunos_APIClientify_settings', 'wpfunos_APIClientifyExlcudedUsers');
