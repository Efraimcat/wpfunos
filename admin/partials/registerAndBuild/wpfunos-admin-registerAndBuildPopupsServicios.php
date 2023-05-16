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
  'wpfunos_popupservicios_section',    	// ID used to identify this section and with which to register options
  'Configuración popups servicios',      						// Title to be displayed on the administration page
  array( $this, 'wpfunos_display_popupservicios_account' ), // Callback used to render the description of the section
  'wpfunos_popupservicios_settings'                 		// Page on which to add this section of options
);

// Servicios Enviar Email
add_settings_field(
  'wpfunos_popupServicios_01',
  'Servicios Enviar Email <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_popupServicios_01)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_popupservicios_settings',
  'wpfunos_popupservicios_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_popupServicios_01','name' => 'wpfunos_popupServicios_01','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Servicios Detalles
add_settings_field(
  'wpfunos_popupServicios_02',
  'Servicios Detalles <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_popupServicios_02)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_popupservicios_settings',
  'wpfunos_popupservicios_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_popupServicios_02','name' => 'wpfunos_popupServicios_02','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Servicios Presupuesto
add_settings_field(
  'wpfunos_popupServicios_03',
  'Servicios Presupuesto <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_popupServicios_03)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_popupservicios_settings',
  'wpfunos_popupservicios_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_popupServicios_03','name' => 'wpfunos_popupServicios_03','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Servicios Llamar
add_settings_field(
  'wpfunos_popupServicios_04',
  'Servicios Llamar <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_popupServicios_04)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_popupservicios_settings',
  'wpfunos_popupservicios_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_popupServicios_04','name' => 'wpfunos_popupServicios_04','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Servicios Llamame
add_settings_field(
  'wpfunos_popupServicios_05',
  'Servicios Llamame <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_popupServicios_05)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_popupservicios_settings',
  'wpfunos_popupservicios_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_popupServicios_05','name' => 'wpfunos_popupServicios_05','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Servicios Multistep (1)
add_settings_field(
  'wpfunos_popupServicios_06',
  'Servicios Multistep (1) <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_popupServicios_06)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_popupservicios_settings',
  'wpfunos_popupservicios_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_popupServicios_06','name' => 'wpfunos_popupServicios_06','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Servicios Multistep (2)
add_settings_field(
  'wpfunos_popupServicios_07',
  'Servicios Multistep (2) <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_popupServicios_07)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_popupservicios_settings',
  'wpfunos_popupservicios_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_popupServicios_07','name' => 'wpfunos_popupServicios_07','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Servicios Multistep (3)
add_settings_field(
  'wpfunos_popupServicios_08',
  'Servicios Multistep (3) <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_popupServicios_08)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_popupservicios_settings',
  'wpfunos_popupservicios_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_popupServicios_08','name' => 'wpfunos_popupServicios_08','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Servicios Multistep (4)
add_settings_field(
  'wpfunos_popupServicios_09',
  'Servicios Multistep (4) <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_popupServicios_09)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_popupservicios_settings',
  'wpfunos_popupservicios_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_popupServicios_09','name' => 'wpfunos_popupServicios_09','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Servicios Multistep (5)
add_settings_field(
  'wpfunos_popupServicios_10',
  'Servicios Multistep (5) <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_popupServicios_10)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_popupservicios_settings',
  'wpfunos_popupservicios_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_popupServicios_10','name' => 'wpfunos_popupServicios_10','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Servicios Multistep (5)
add_settings_field(
  'wpfunos_popupServicios_10',
  'Servicios Multistep (5) <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_popupServicios_10)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_popupservicios_settings',
  'wpfunos_popupservicios_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_popupServicios_10','name' => 'wpfunos_popupServicios_10','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Ventana Popup Esperando (loader2)
add_settings_field(
  'wpfunos_popupServicios_11',
  'Ventana Popup Esperando (loader2) <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_popupServicios_11)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_popupservicios_settings',
  'wpfunos_popupservicios_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_popupServicios_11','name' => 'wpfunos_popupServicios_11','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Ventana Popup Esperando (entrada datos GTM)
add_settings_field(
  'wpfunos_popupServicios_12',
  'Ventana Popup Esperando (entrada datos GTM) <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_popupServicios_12)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_popupservicios_settings',
  'wpfunos_popupservicios_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_popupServicios_12','name' => 'wpfunos_popupServicios_12','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Servicios Financiación
add_settings_field(
  'wpfunos_popupServicios_13',
  'Servicios Financiación <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_popupServicios_13)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_popupservicios_settings',
  'wpfunos_popupservicios_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_popupServicios_13','name' => 'wpfunos_popupServicios_13','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Servicios Financiación Genérico
add_settings_field(
  'wpfunos_popupServicios_14',
  'Servicios Financiación Genérico <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_popupServicios_14)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_popupservicios_settings',
  'wpfunos_popupservicios_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_popupServicios_14','name' => 'wpfunos_popupServicios_14','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Servicios cambiar distancia
add_settings_field(
  'wpfunos_popupServicios_15',
  'Servicios cambiar distancia <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_popupServicios_15)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_popupservicios_settings',
  'wpfunos_popupservicios_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_popupServicios_15','name' => 'wpfunos_popupServicios_15','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);


register_setting('wpfunos_popupservicios_settings', 'wpfunos_popupServicios_01');
register_setting('wpfunos_popupservicios_settings', 'wpfunos_popupServicios_02');
register_setting('wpfunos_popupservicios_settings', 'wpfunos_popupServicios_03');
register_setting('wpfunos_popupservicios_settings', 'wpfunos_popupServicios_04');
register_setting('wpfunos_popupservicios_settings', 'wpfunos_popupServicios_05');
register_setting('wpfunos_popupservicios_settings', 'wpfunos_popupServicios_06');
register_setting('wpfunos_popupservicios_settings', 'wpfunos_popupServicios_07');
register_setting('wpfunos_popupservicios_settings', 'wpfunos_popupServicios_08');
register_setting('wpfunos_popupservicios_settings', 'wpfunos_popupServicios_09');
register_setting('wpfunos_popupservicios_settings', 'wpfunos_popupServicios_10');
register_setting('wpfunos_popupservicios_settings', 'wpfunos_popupServicios_11');
register_setting('wpfunos_popupservicios_settings', 'wpfunos_popupServicios_12');
register_setting('wpfunos_popupservicios_settings', 'wpfunos_popupServicios_13');
register_setting('wpfunos_popupservicios_settings', 'wpfunos_popupServicios_14');
register_setting('wpfunos_popupservicios_settings', 'wpfunos_popupServicios_15');
