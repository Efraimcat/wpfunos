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
  'wpfunos_mailinicial_section',    							// ID used to identify this section and with which to register options
  '<span id="wpfunos-mail-inicial">Configuración General</span>',               // Title to be displayed on the administration page
  array( $this, 'wpfunos_display_mail_account_general' ), 		// Callback used to render the description of the section
  'wpfunos_mail_settings_v3'                 				// Page on which to add this section of options
);
// correos cc: en popup que me llamen
add_settings_field(
  $this->plugin_name . '_mailCorreoCcoPopup',
  'Direcciones de correo a enviar copias mensaje popup <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">(wpfunos_mailCorreoCcoPopup)</h6>',
  array( $this, 'wpfunos_render_settings_field' ),
  'wpfunos_mail_settings_v3',
  'wpfunos_mailinicial_section',
  array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_mailCorreoCcoPopup','name' => $this->plugin_name . '_mailCorreoCcoPopup','required' => 'true','get_options_list' => '','value_type' => 'normal','wp_data' => 'option')
);

register_setting('wpfunos_mail_settings', $this->plugin_name . '_mailCorreoCcoPopup');
