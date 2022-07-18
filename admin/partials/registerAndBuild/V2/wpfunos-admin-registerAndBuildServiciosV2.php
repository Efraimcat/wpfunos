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
  'wpfunos_general_servicios_v2_section',    						// ID used to identify this section and with which to register options
  '<strong>Página Comparador V2</strong>',              // Title to be displayed on the administration page
  array( $this, 'wpfunos_display_general_account_datos' ), 	// Callback used to render the description of the section
  'wpfunos_general_settings'                 					// Page on which to add this section of options
);
//Página comparador
add_settings_field(
  'wpfunos_paginaComparadorV2',
  'Página del comparador <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_paginaComparadorV2)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_servicios_v2_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_paginaComparadorV2','name' => 'wpfunos_paginaComparadorV2','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
//Página detalles
add_settings_field(
  'wpfunos_paginaResultadosV2',
  'Página de los resultados <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_paginaResultadosV2)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_servicios_v2_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_paginaResultadosV2','name' => 'wpfunos_paginaResultadosV2','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Formulario GEO my wp ubicación
add_settings_field(
  'wpfunos_paginaComparadorV2GeoMyWp',
  'Formulario GEO my wp ubicación <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_paginaComparadorV2GeoMyWp)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_servicios_v2_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_paginaComparadorV2GeoMyWp','name' => 'wpfunos_paginaComparadorV2GeoMyWp','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Formulario GEO my wp resultados
add_settings_field(
  'wpfunos_paginaResultadosV2GeoMyWp',
  'Formulario GEO my wp resultados <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_paginaResultadosV2GeoMyWp)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_servicios_v2_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_paginaResultadosV2GeoMyWp','name' => 'wpfunos_paginaResultadosV2GeoMyWp','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Filtros
add_settings_field(
  'wpfunos_ServiciosV2Filtros',
  'Filtros <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_ServiciosV2Filtros)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_servicios_v2_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_ServiciosV2Filtros','name' => 'wpfunos_ServiciosV2Filtros','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Ventana Popup Esperando
add_settings_field(
  'wpfunos_ServiciosV2PopupEsperando',
  'Popup Esperando <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_ServiciosV2PopupEsperando)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_servicios_v2_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_ServiciosV2PopupEsperando','name' => 'wpfunos_ServiciosV2PopupEsperando','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Ventana Popup Datos personales
add_settings_field(
  'wpfunos_ServiciosV2DatosPersonales',
  'Popup Datos Personales <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_ServiciosV2DatosPersonales)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_servicios_v2_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_ServiciosV2DatosPersonales','name' => 'wpfunos_ServiciosV2DatosPersonales','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Ventana Popup Datos personales Comprobación
add_settings_field(
  'wpfunos_ServiciosV2DatosPersonalesComprobar',
  'Popup Datos Personales comprobar <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_ServiciosV2DatosPersonalesComprobar)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_servicios_v2_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_ServiciosV2DatosPersonalesComprobar','name' => 'wpfunos_ServiciosV2DatosPersonalesComprobar','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Ventana Popup Llamen
add_settings_field(
  'wpfunos_ServiciosV2PopupLlamen',
  'Popup Llamen <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_ServiciosV2PopupLlamen)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_servicios_v2_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_ServiciosV2PopupLlamen','name' => 'wpfunos_ServiciosV2PopupLlamen','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Ventana Popup Llamar
add_settings_field(
  'wpfunos_ServiciosV2PopupLlamar',
  'Popup Llamar <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_ServiciosV2PopupLlamar)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_servicios_v2_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_ServiciosV2PopupLlamar','name' => 'wpfunos_ServiciosV2PopupLlamar','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Ventana Popup Presupuesto
add_settings_field(
  'wpfunos_ServiciosV2PopupPresupuesto',
  'Popup Presupuesto <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_ServiciosV2PopupPresupuesto)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_servicios_v2_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_ServiciosV2PopupPresupuesto','name' => 'wpfunos_ServiciosV2PopupPresupuesto','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Ventana Popup Detalles
add_settings_field(
  'wpfunos_ServiciosV2PopupDetalles',
  'Popup Detalles <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_ServiciosV2PopupDetalles)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_servicios_v2_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_ServiciosV2PopupDetalles','name' => 'wpfunos_ServiciosV2PopupDetalles','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Ventana Popup Detalles
add_settings_field(
  'wpfunos_ServiciosV2MultiformCuando',
  'Popup Multiform Cuando <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_ServiciosV2MultiformCuando)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_servicios_v2_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_ServiciosV2MultiformCuando','name' => 'wpfunos_ServiciosV2MultiformCuando','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Ventana Popup Detalles
add_settings_field(
  'wpfunos_ServiciosV2MultiformDestino',
  'Popup Multiform Destino <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_ServiciosV2MultiformDestino)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_servicios_v2_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_ServiciosV2MultiformDestino','name' => 'wpfunos_ServiciosV2MultiformDestino','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);


register_setting('wpfunos_general_settings', 'wpfunos_paginaComparadorV2');
register_setting('wpfunos_general_settings', 'wpfunos_paginaResultadosV2');
register_setting('wpfunos_general_settings', 'wpfunos_paginaComparadorV2GeoMyWp');
register_setting('wpfunos_general_settings', 'wpfunos_paginaResultadosV2GeoMyWp');
register_setting('wpfunos_general_settings', 'wpfunos_ServiciosV2Filtros');
register_setting('wpfunos_general_settings', 'wpfunos_ServiciosV2PopupEsperando');
register_setting('wpfunos_general_settings', 'wpfunos_ServiciosV2DatosPersonales');
register_setting('wpfunos_general_settings', 'wpfunos_ServiciosV2DatosPersonalesComprobar');
register_setting('wpfunos_general_settings', 'wpfunos_ServiciosV2PopupLlamen');
register_setting('wpfunos_general_settings', 'wpfunos_ServiciosV2PopupLlamar');
register_setting('wpfunos_general_settings', 'wpfunos_ServiciosV2PopupPresupuesto');
register_setting('wpfunos_general_settings', 'wpfunos_ServiciosV2PopupDetalles');
register_setting('wpfunos_general_settings', 'wpfunos_ServiciosV2MultiformCuando');
register_setting('wpfunos_general_settings', 'wpfunos_ServiciosV2MultiformDestino');
