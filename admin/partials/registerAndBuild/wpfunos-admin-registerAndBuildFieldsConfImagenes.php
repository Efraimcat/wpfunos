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
 add_settings_section('wpfunos_general_confimagenes_section',    	// ID used to identify this section and with which to register options
   '<strong>Configuración imágenes</strong>',                           		// Title to be displayed on the administration page
   array( $this, 'wpfunos_display_general_account_confimagenes' ), 	// Callback used to render the description of the section
   'wpfunos_general_settings'                 			// Page on which to add this section of options
 );

// configuación imágenes
 add_settings_field($this->plugin_name . '_postConfImagenes',
   'Post configuración imágenes <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_postConfImagenes)</h6>',
   array( $this, 'wpfunos_render_settings_field' ),
     'wpfunos_general_settings',
     'wpfunos_general_confimagenes_section',
	array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_postConfImagenes','name' => $this->plugin_name . '_postConfImagenes','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
 );

 register_setting('wpfunos_general_settings', $this->plugin_name . '_postConfImagenes');