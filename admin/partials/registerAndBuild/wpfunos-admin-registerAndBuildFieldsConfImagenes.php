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
  'wpfunos_general_confimagenes_section',    	// ID used to identify this section and with which to register options
  '<strong>Configuración imágenes</strong>',                      // Title to be displayed on the administration page
  array( $this, 'wpfunos_display_general_account_confimagenes' ), // Callback used to render the description of the section
  'wpfunos_general_settings'                 						// Page on which to add this section of options
);

// configuación imágenes
add_settings_field(
  'wpfunos_postConfImagenes',
  'Post configuración imágenes <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_postConfImagenes)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_confimagenes_section',
  array('type'=>'input','subtype' => 'text','id' => 'wpfunos_postConfImagenes','name' => 'wpfunos_postConfImagenes','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option'),
);

register_setting('wpfunos_general_settings', 'wpfunos_postConfImagenes');
