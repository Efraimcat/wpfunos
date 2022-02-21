<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://efraim.cat
 * @since      1.0.0
 *
 * @package    Wpfunos
 * @subpackage Wpfunos/admin/partials
 */
add_settings_section(
	'wpfunos_APIPreventiva_section',    							// ID used to identify this section and with which to register options
	'Datos conexiones API Preventiva',        						// Title to be displayed on the administration page
	array( $this, 'wpfunos_display_APIPreventiva_account' ), 		// Callback used to render the description of the section
	'wpfunos_APIPreventiva_settings'                 				// Page on which to add this section of options
 );
add_settings_field(
	$this->plugin_name . '_APIPreventivaURLPreventiva',
	'URL API Preventiva <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_APIPreventivaURLPreventiva)</h6>',
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_APIPreventiva_settings',
	'wpfunos_APIPreventiva_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_APIPreventivaURLPreventiva','name' => $this->plugin_name . '_APIPreventivaURLPreventiva','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
	$this->plugin_name . '_APIPreventivaUsuarioPreventiva',
	'Usuario API Preventiva <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_APIPreventivaUsuarioPreventiva)</h6>', 
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_APIPreventiva_settings',
	'wpfunos_APIPreventiva_section',
	array('type' => 'input','subtype' => 'password','id' => $this->plugin_name . '_APIPreventivaUsuarioPreventiva','name' => $this->plugin_name . '_APIPreventivaUsuarioPreventiva','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
	$this->plugin_name . '_APIPreventivaPasswordPreventiva',
	'Password API Preventiva <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_APIPreventivaPasswordPreventiva)</h6>',
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_APIPreventiva_settings',
	'wpfunos_APIPreventiva_section',
	array('type' => 'input','subtype' => 'password','id' => $this->plugin_name . '_APIPreventivaPasswordPreventiva','name' => $this->plugin_name . '_APIPreventivaPasswordPreventiva','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
	$this->plugin_name . '_APIPreventivaCampainPreventiva',
	'Campaña API Preventiva <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_APIPreventivaCampainPreventiva)</h6>',
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_APIPreventiva_settings',
	'wpfunos_APIPreventiva_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_APIPreventivaCampainPreventiva','name' => $this->plugin_name . '_APIPreventivaCampainPreventiva','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
 	$this->plugin_name . '_APIPreventivaColdLeadPreventiva',
 	'Cold Lead API Preventiva <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_APIPreventivaColdLeadPreventiva)</h6>',
 	array( $this, 'wpfunos_render_settings_field' ),
 	'wpfunos_APIPreventiva_settings',
	'wpfunos_APIPreventiva_section',
 	array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_APIPreventivaColdLeadPreventiva','name' => $this->plugin_name . '_APIPreventivaColdLeadPreventiva','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);

add_settings_field(
	$this->plugin_name . '_APIPreventivaURLElectium',
	'URL API Electium <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_APIPreventivaURLElectium)</h6>', 
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_APIPreventiva_settings',
	'wpfunos_APIPreventiva_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_APIPreventivaURLElectium','name' => $this->plugin_name . '_APIPreventivaURLElectium','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
	$this->plugin_name . '_APIPreventivaUsuarioElectium',
	'Usuario API Electium <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_APIPreventivaUsuarioElectium)</h6>',
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_APIPreventiva_settings',
	'wpfunos_APIPreventiva_section',
	array('type' => 'input','subtype' => 'password','id' => $this->plugin_name . '_APIPreventivaUsuarioElectium','name' => $this->plugin_name . '_APIPreventivaUsuarioElectium','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
	$this->plugin_name . '_APIPreventivaPasswordElectium',
	'Password API Electium <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_APIPreventivaPasswordElectium)</h6>',
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_APIPreventiva_settings',
	'wpfunos_APIPreventiva_section',
	array('type' => 'input','subtype' => 'password','id' => $this->plugin_name . '_APIPreventivaPasswordElectium','name' => $this->plugin_name . '_APIPreventivaPasswordElectium','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
	$this->plugin_name . '_APIPreventivaCampainElectium',
	'Campaña API Electium <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_APIPreventivaCampainElectium)</h6>',
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_APIPreventiva_settings',
	'wpfunos_APIPreventiva_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_APIPreventivaCampainElectium','name' => $this->plugin_name . '_APIPreventivaCampainElectium','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
 	$this->plugin_name . '_APIPreventivaColdLeadElectium',
 	'Cold Lead API Electium <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_APIPreventivaColdLeadElectium)</h6>',
 	array( $this, 'wpfunos_render_settings_field' ),
 	'wpfunos_APIPreventiva_settings',
	'wpfunos_APIPreventiva_section',
 	array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_APIPreventivaColdLeadElectium','name' => $this->plugin_name . '_APIPreventivaColdLeadElectium','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);

register_setting('wpfunos_APIPreventiva_settings', $this->plugin_name . '_APIPreventivaURLPreventiva');
register_setting('wpfunos_APIPreventiva_settings', $this->plugin_name . '_APIPreventivaUsuarioPreventiva');
register_setting('wpfunos_APIPreventiva_settings', $this->plugin_name . '_APIPreventivaPasswordPreventiva');
register_setting('wpfunos_APIPreventiva_settings', $this->plugin_name . '_APIPreventivaCampainPreventiva');
register_setting('wpfunos_APIPreventiva_settings', $this->plugin_name . '_APIPreventivaColdLeadPreventiva');
register_setting('wpfunos_APIPreventiva_settings', $this->plugin_name . '_APIPreventivaURLElectium');
register_setting('wpfunos_APIPreventiva_settings', $this->plugin_name . '_APIPreventivaUsuarioElectium');
register_setting('wpfunos_APIPreventiva_settings', $this->plugin_name . '_APIPreventivaPasswordElectium');
register_setting('wpfunos_APIPreventiva_settings', $this->plugin_name . '_APIPreventivaCampainElectium');
register_setting('wpfunos_APIPreventiva_settings', $this->plugin_name . '_APIPreventivaColdLeadElectium');

