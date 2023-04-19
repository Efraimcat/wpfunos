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
  'wpfunos_APIDKV_section',    							// ID used to identify this section and with which to register options
  'Datos conexiones API DKV',        						// Title to be displayed on the administration page
  array( $this, 'wpfunos_display_APIDKV_account' ), 		// Callback used to render the description of the section
  'wpfunos_APIDKV_settings'                 				// Page on which to add this section of options
);
add_settings_field(
  $this->plugin_name . '_APIDKVURLPRE',
  'URL API DKV PRE <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_APIDKVURLPRE)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_APIDKV_settings',
  'wpfunos_APIDKV_section',
  array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_APIDKVURLPRE','name' => $this->plugin_name . '_APIDKVURLPRE','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
  $this->plugin_name . '_APIDKVURLPRO',
  'URL API DKV PRO <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_APIDKVURLPRO)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_APIDKV_settings',
  'wpfunos_APIDKV_section',
  array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_APIDKVURLPRO','name' => $this->plugin_name . '_APIDKVURLPRO','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
  $this->plugin_name . '_APIDKVProviderName',
  'API DKV Provider Name <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_APIDKVProviderName)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_APIDKV_settings',
  'wpfunos_APIDKV_section',
  array('type' => 'input','subtype' => 'password','id' => $this->plugin_name . '_APIDKVProviderName','name' => $this->plugin_name . '_APIDKVProviderName','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
  $this->plugin_name . '_APIDKVProviderID',
  'API DKV Provider ID <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_APIDKVProviderID)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_APIDKV_settings',
  'wpfunos_APIDKV_section',
  array('type' => 'input','subtype' => 'password','id' => $this->plugin_name . '_APIDKVProviderID','name' => $this->plugin_name . '_APIDKVProviderID','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
  $this->plugin_name . '_APIDKVProviderPasswordPRE',
  'API DKV Password PRE <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_APIDKVProviderPasswordPRE)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_APIDKV_settings',
  'wpfunos_APIDKV_section',
  array('type' => 'input','subtype' => 'password','id' => $this->plugin_name . '_APIDKVProviderPasswordPRE','name' => $this->plugin_name . '_APIDKVProviderPasswordPRE','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
  $this->plugin_name . '_APIDKVProviderPasswordPRO',
  'API DKV Password PRO <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_APIDKVProviderPasswordPRO)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_APIDKV_settings',
  'wpfunos_APIDKV_section',
  array('type' => 'input','subtype' => 'password','id' => $this->plugin_name . '_APIDKVProviderPasswordPRO','name' => $this->plugin_name . '_APIDKVProviderPasswordPRO','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
  $this->plugin_name . '_APIDKVProductionOK',
  'API DKV Producción Activo<h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_APIDKVProductionOK)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_APIDKV_settings',
  'wpfunos_APIDKV_section',
  array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_APIDKVProductionOK','name' => $this->plugin_name . '_APIDKVProductionOK','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
add_settings_field(
  $this->plugin_name . '_APIDKVColdLead',
  'Cold Lead API DKV <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_APIDKVColdLead)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_APIDKV_settings',
  'wpfunos_APIDKV_section',
  array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_APIDKVColdLead','name' => $this->plugin_name . '_APIDKVColdLead','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);

register_setting('wpfunos_APIDKV_settings', $this->plugin_name . '_APIDKVURLPRE');
register_setting('wpfunos_APIDKV_settings', $this->plugin_name . '_APIDKVURLPRO');
register_setting('wpfunos_APIDKV_settings', $this->plugin_name . '_APIDKVProviderName');
register_setting('wpfunos_APIDKV_settings', $this->plugin_name . '_APIDKVProviderID');
register_setting('wpfunos_APIDKV_settings', $this->plugin_name . '_APIDKVProviderPasswordPRE');
register_setting('wpfunos_APIDKV_settings', $this->plugin_name . '_APIDKVProviderPasswordPRO');
register_setting('wpfunos_APIDKV_settings', $this->plugin_name . '_APIDKVProductionOK');
register_setting('wpfunos_APIDKV_settings', $this->plugin_name . '_APIDKVColdLead');
