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
	esc_html__('URL API Preventiva', 'wpfunos'),
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_APIPreventiva_settings',
	'wpfunos_APIPreventiva_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_APIPreventivaURLPreventiva','name' => $this->plugin_name . '_APIPreventivaURLPreventiva','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
	$this->plugin_name . '_APIPreventivaUsuarioPreventiva',
	esc_html__('Usuario API Preventiva', 'wpfunos'),
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_APIPreventiva_settings',
	'wpfunos_APIPreventiva_section',
	array('type' => 'input','subtype' => 'password','id' => $this->plugin_name . '_APIPreventivaUsuarioPreventiva','name' => $this->plugin_name . '_APIPreventivaUsuarioPreventiva','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
	$this->plugin_name . '_APIPreventivaPasswordPreventiva',
	esc_html__('Password API Preventiva', 'wpfunos'),
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_APIPreventiva_settings',
	'wpfunos_APIPreventiva_section',
	array('type' => 'input','subtype' => 'password','id' => $this->plugin_name . '_APIPreventivaPasswordPreventiva','name' => $this->plugin_name . '_APIPreventivaPasswordPreventiva','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
	$this->plugin_name . '_APIPreventivaCampainPreventiva',
	esc_html__('Campaña API Preventiva', 'wpfunos'),
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_APIPreventiva_settings',
	'wpfunos_APIPreventiva_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_APIPreventivaCampainPreventiva','name' => $this->plugin_name . '_APIPreventivaCampainPreventiva','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
	$this->plugin_name . '_APIPreventivaURLElectium',
	esc_html__('URL API Electium', 'wpfunos'),
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_APIPreventiva_settings',
	'wpfunos_APIPreventiva_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_APIPreventivaURLElectium','name' => $this->plugin_name . '_APIPreventivaURLElectium','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
	$this->plugin_name . '_APIPreventivaUsuarioElectium',
	esc_html__('Usuario API Electium', 'wpfunos'),
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_APIPreventiva_settings',
	'wpfunos_APIPreventiva_section',
	array('type' => 'input','subtype' => 'password','id' => $this->plugin_name . '_APIPreventivaUsuarioElectium','name' => $this->plugin_name . '_APIPreventivaUsuarioElectium','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
	$this->plugin_name . '_APIPreventivaPasswordElectium',
	esc_html__('Password API Electium', 'wpfunos'),
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_APIPreventiva_settings',
	'wpfunos_APIPreventiva_section',
	array('type' => 'input','subtype' => 'password','id' => $this->plugin_name . '_APIPreventivaPasswordElectium','name' => $this->plugin_name . '_APIPreventivaPasswordElectium','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
	$this->plugin_name . '_APIPreventivaCampainElectium',
	esc_html__('Campaña API Electium', 'wpfunos'),
	array( $this, 'wpfunos_render_settings_field' ),
	'wpfunos_APIPreventiva_settings',
	'wpfunos_APIPreventiva_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_APIPreventivaCampainElectium','name' => $this->plugin_name . '_APIPreventivaCampainElectium','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);

register_setting('wpfunos_APIPreventiva_settings', $this->plugin_name . '_APIPreventivaURLPreventiva');
register_setting('wpfunos_APIPreventiva_settings', $this->plugin_name . '_APIPreventivaUsuarioPreventiva');
register_setting('wpfunos_APIPreventiva_settings', $this->plugin_name . '_APIPreventivaPasswordPreventiva');
register_setting('wpfunos_APIPreventiva_settings', $this->plugin_name . '_APIPreventivaCampainPreventiva');
register_setting('wpfunos_APIPreventiva_settings', $this->plugin_name . '_APIPreventivaURLElectium');
register_setting('wpfunos_APIPreventiva_settings', $this->plugin_name . '_APIPreventivaUsuarioElectium');
register_setting('wpfunos_APIPreventiva_settings', $this->plugin_name . '_APIPreventivaPasswordElectium');
register_setting('wpfunos_APIPreventiva_settings', $this->plugin_name . '_APIPreventivaCampainElectium');