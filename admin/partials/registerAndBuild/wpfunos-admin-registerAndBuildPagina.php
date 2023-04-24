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
  'wpfunos_general_pagina_section',    						// ID used to identify this section and with which to register options
  '<strong>Página Comparador Antiguo</strong>',                       // Title to be displayed on the administration page
  array( $this, 'wpfunos_display_general_account_pagina' ), 	// Callback used to render the description of the section
  'wpfunos_general_settings'                 					// Page on which to add this section of options
);
// Página comparador
add_settings_field(
  'wpfunos_paginaComparador',
  'Página comparador * <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_paginaComparador)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_pagina_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_paginaComparador','name' => 'wpfunos_paginaComparador','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Página detalles
add_settings_field(
  'wpfunos_paginaDetalles',
  'Página detalles * <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_paginaDetalles)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_pagina_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_paginaDetalles','name' => 'wpfunos_paginaDetalles','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Página Llamar
add_settings_field(
  'wpfunos_paginaLlamar',
  'Página llamar <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_paginaLlamar)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_pagina_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_paginaLlamar','name' => 'wpfunos_paginaLlamar','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Página Llamen
add_settings_field(
  'wpfunos_paginaLlamen',
  'Página que me llamen <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_paginaLlamen)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_pagina_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_paginaLlamen','name' => 'wpfunos_paginaLlamen','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Página Pedir Presupuesto
add_settings_field(
  'wpfunos_paginaPresupuesto',
  'Página Pedir Presupuesto <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_paginaPresupuesto)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_pagina_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_paginaPresupuesto','name' => 'wpfunos_paginaPresupuesto','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Página Envien correo
add_settings_field(
  'wpfunos_paginaEmail',
  'Página que envien Email <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_paginaEmail)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_pagina_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_paginaEmail','name' => 'wpfunos_paginaEmail','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// URL resultados servicios
add_settings_field(
  'wpfunos_paginaURLResultadosServicios',
  'URL página resultados servicios <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_paginaURLResultadosServicios)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_pagina_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunos_paginaURLResultadosServicios','name' => 'wpfunos_paginaURLResultadosServicios','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Orden inicial resultados
add_settings_field(
  'wpfunos_paginaComparadorOrden',
  'Orden inicial resultados ("precios" o "dist") <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_paginaComparadorOrden)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_pagina_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunospaginaComparadorOrden','name' => 'wpfunos_paginaComparadorOrden','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Formulario GEO my wp ubicación
add_settings_field(
  'wpfunos_paginaComparadorGeoMyWp',
  'Formulario GEO my wp ubicación <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_paginaComparadorGeoMyWp)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_general_settings',
  'wpfunos_general_pagina_section',
  array('type' => 'input','subtype' => 'text','id' => 'wpfunospaginaComparadorGeoMyWp','name' => 'wpfunos_paginaComparadorGeoMyWp','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);


register_setting('wpfunos_general_settings', 'wpfunos_paginaComparador');
register_setting('wpfunos_general_settings', 'wpfunos_paginaDetalles');
register_setting('wpfunos_general_settings', 'wpfunos_paginaLlamar');
register_setting('wpfunos_general_settings', 'wpfunos_paginaLlamen');
register_setting('wpfunos_general_settings', 'wpfunos_paginaPresupuesto');
register_setting('wpfunos_general_settings', 'wpfunos_paginaEmail');
register_setting('wpfunos_general_settings', 'wpfunos_paginaURLResultadosServicios');
register_setting('wpfunos_general_settings', 'wpfunos_paginaComparadorGeoMyWp');
register_setting('wpfunos_general_settings', 'wpfunos_paginaComparadorOrden');
