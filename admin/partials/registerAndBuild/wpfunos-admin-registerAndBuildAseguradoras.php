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
  'wpfunos_aseguradoras_section',    	// ID used to identify this section and with which to register options
  'Configuración aseguradoras',      						// Title to be displayed on the administration page
  array( $this, 'wpfunos_display_aseguradoras_account' ), // Callback used to render the description of the section
  'wpfunos_aseguradoras_settings'                 		// Page on which to add this section of options
);
// Página llamar
add_settings_field(
  $this->plugin_name . '_paginaAseguradorasLlamar',
  'Página aseguradoras llamar <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_paginaAseguradorasLlamar)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_aseguradoras_settings',
  'wpfunos_aseguradoras_section',
  array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_paginaAseguradorasLlamar','name' => $this->plugin_name . '_paginaAseguradorasLlamar','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Página que me llamen
add_settings_field(
  $this->plugin_name . '_paginaAseguradorasLlamen',
  'Página aseguradoras que me llamen <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_paginaAseguradorasLlamen)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_aseguradoras_settings',
  'wpfunos_aseguradoras_section',
  array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_paginaAseguradorasLlamen','name' => $this->plugin_name . '_paginaAseguradorasLlamen','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Sección Aseguradoras preciossuperior
add_settings_field(
  $this->plugin_name . '_seccionAseguradorasPrecio',
  'Sección aseguradoras precio <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_seccionAseguradorasPrecio)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_aseguradoras_settings',
  'wpfunos_aseguradoras_section',
  array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_seccionAseguradorasPrecio','name' => $this->plugin_name . '_seccionAseguradorasPrecio','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);
// Sección Aseguradoras Argumentario
add_settings_field(
  $this->plugin_name . '_seccionAseguradorasArgumentario',
  'Sección aseguradoras argumentario <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_seccionAseguradorasArgumentario)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_aseguradoras_settings',
  'wpfunos_aseguradoras_section',
  array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_seccionAseguradorasArgumentario','name' => $this->plugin_name . '_seccionAseguradorasArgumentario','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);

register_setting('wpfunos_aseguradoras_settings', $this->plugin_name . '_paginaAseguradorasLlamar');
register_setting('wpfunos_aseguradoras_settings', $this->plugin_name . '_paginaAseguradorasLlamen');
register_setting('wpfunos_aseguradoras_settings', $this->plugin_name . '_seccionAseguradorasPrecio');
register_setting('wpfunos_aseguradoras_settings', $this->plugin_name . '_seccionAseguradorasArgumentario');
