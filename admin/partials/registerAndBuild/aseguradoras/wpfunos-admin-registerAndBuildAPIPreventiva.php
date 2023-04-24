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
  'wpfunos_APIPreventiva_section',    							// ID used to identify this section and with which to register options
  'Datos conexiones API Preventiva',        						// Title to be displayed on the administration page
  array( $this, 'wpfunos_display_APIPreventiva_account' ), 		// Callback used to render the description of the section
  'wpfunos_APIPreventiva_settings'                 				// Page on which to add this section of options
);
add_settings_field(
  'wpfunos_APIPreventivaURLPreventiva',
  'URL API Preventiva <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_APIPreventivaURLPreventiva)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_APIPreventiva_settings',
  'wpfunos_APIPreventiva_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_APIPreventivaURLPreventiva','name' => 'wpfunos_APIPreventivaURLPreventiva','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
  'wpfunos_APIPreventivaUsuarioPreventiva',
  'Usuario API Preventiva <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_APIPreventivaUsuarioPreventiva)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_APIPreventiva_settings',
  'wpfunos_APIPreventiva_section',
  array('type' => 'input','subtype' => 'password','id' => 'wpfunos_APIPreventivaUsuarioPreventiva','name' => 'wpfunos_APIPreventivaUsuarioPreventiva','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
  'wpfunos_APIPreventivaPasswordPreventiva',
  'Password API Preventiva <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_APIPreventivaPasswordPreventiva)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_APIPreventiva_settings',
  'wpfunos_APIPreventiva_section',
  array('type' => 'input','subtype' => 'password','id' => 'wpfunos_APIPreventivaPasswordPreventiva','name' => 'wpfunos_APIPreventivaPasswordPreventiva','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
  'wpfunos_APIPreventivaCampainPreventiva',
  'Campaña API Preventiva <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_APIPreventivaCampainPreventiva)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_APIPreventiva_settings',
  'wpfunos_APIPreventiva_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_APIPreventivaCampainPreventiva','name' => 'wpfunos_APIPreventivaCampainPreventiva','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
  'wpfunos_APIPreventivaColdLeadPreventiva',
  'Cold Lead API Preventiva <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_APIPreventivaColdLeadPreventiva)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_APIPreventiva_settings',
  'wpfunos_APIPreventiva_section',
  array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_APIPreventivaColdLeadPreventiva','name' => 'wpfunos_APIPreventivaColdLeadPreventiva','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);

add_settings_field(
  'wpfunos_APIPreventivaURLElectium',
  'URL API Electium <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_APIPreventivaURLElectium)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_APIPreventiva_settings',
  'wpfunos_APIPreventiva_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_APIPreventivaURLElectium','name' => 'wpfunos_APIPreventivaURLElectium','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
  'wpfunos_APIPreventivaUsuarioElectium',
  'Usuario API Electium <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_APIPreventivaUsuarioElectium)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_APIPreventiva_settings',
  'wpfunos_APIPreventiva_section',
  array('type' => 'input','subtype' => 'password','id' => 'wpfunos_APIPreventivaUsuarioElectium','name' => 'wpfunos_APIPreventivaUsuarioElectium','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
  'wpfunos_APIPreventivaPasswordElectium',
  'Password API Electium <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_APIPreventivaPasswordElectium)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_APIPreventiva_settings',
  'wpfunos_APIPreventiva_section',
  array('type' => 'input','subtype' => 'password','id' => 'wpfunos_APIPreventivaPasswordElectium','name' => 'wpfunos_APIPreventivaPasswordElectium','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
  'wpfunos_APIPreventivaCampainElectium',
  'Campaña API Electium <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_APIPreventivaCampainElectium)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_APIPreventiva_settings',
  'wpfunos_APIPreventiva_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_APIPreventivaCampainElectium','name' => 'wpfunos_APIPreventivaCampainElectium','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
  'wpfunos_APIPreventivaColdLeadElectium',
  'Cold Lead API Electium <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_APIPreventivaColdLeadElectium)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_APIPreventiva_settings',
  'wpfunos_APIPreventiva_section',
  array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_APIPreventivaColdLeadElectium','name' => 'wpfunos_APIPreventivaColdLeadElectium','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);

register_setting('wpfunos_APIPreventiva_settings', 'wpfunos_APIPreventivaURLPreventiva');
register_setting('wpfunos_APIPreventiva_settings', 'wpfunos_APIPreventivaUsuarioPreventiva');
register_setting('wpfunos_APIPreventiva_settings', 'wpfunos_APIPreventivaPasswordPreventiva');
register_setting('wpfunos_APIPreventiva_settings', 'wpfunos_APIPreventivaCampainPreventiva');
register_setting('wpfunos_APIPreventiva_settings', 'wpfunos_APIPreventivaColdLeadPreventiva');
register_setting('wpfunos_APIPreventiva_settings', 'wpfunos_APIPreventivaURLElectium');
register_setting('wpfunos_APIPreventiva_settings', 'wpfunos_APIPreventivaUsuarioElectium');
register_setting('wpfunos_APIPreventiva_settings', 'wpfunos_APIPreventivaPasswordElectium');
register_setting('wpfunos_APIPreventiva_settings', 'wpfunos_APIPreventivaCampainElectium');
register_setting('wpfunos_APIPreventiva_settings', 'wpfunos_APIPreventivaColdLeadElectium');
