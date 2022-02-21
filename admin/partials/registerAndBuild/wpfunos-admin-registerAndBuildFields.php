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
 add_settings_section('wpfunos_general_section',    	// ID used to identify this section and with which to register options
   '<strong>Debug del programa</strong>',                           		// Title to be displayed on the administration page
   array( $this, 'wpfunos_display_general_account' ), 	// Callback used to render the description of the section
   'wpfunos_general_settings'                 			// Page on which to add this section of options
 );

// Debug
 add_settings_field($this->plugin_name . '_Debug',
   'Activar debug <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_Debug)</h6>',
   array( $this, 'wpfunos_render_settings_field' ),
     'wpfunos_general_settings',
     'wpfunos_general_section',
     array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_Debug','name' => $this->plugin_name . '_Debug','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
 );

 register_setting('wpfunos_general_settings', $this->plugin_name . '_Debug');
