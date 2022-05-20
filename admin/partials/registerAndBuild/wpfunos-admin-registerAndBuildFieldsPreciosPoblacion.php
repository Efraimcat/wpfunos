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
  'wpfunos_precio_poblacion_section',  					  		// ID used to identify this section and with which to register options
  'Directorio',                           				// Title to be displayed on the administration page
  array( $this, 'wpfunos_display_precio_poblacion_account' ), 	// Callback used to render the description of the section
  'wpfunos_precio_poblacion_settings'                 			// Page on which to add this section of options
);

add_settings_field(
  $this->plugin_name . '_PlantillaPreciosPoblacionFuneraria',
  'Plantilla Precios Funeraria <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_PlantillaPreciosPoblacionFuneraria)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_precio_poblacion_settings',
  'wpfunos_precio_poblacion_section',
  array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_PlantillaPreciosPoblacionFuneraria','name' => $this->plugin_name . '_PlantillaPreciosPoblacionFuneraria','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);

register_setting('wpfunos_precio_poblacion_settings', $this->plugin_name . '_PlantillaPreciosPoblacionFuneraria');
