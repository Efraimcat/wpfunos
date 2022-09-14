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
* @subpackage Wpfunos/admin/partials/DB
* @author     Efraim Bayarri <efraim@efraim.cat>
*/
$entradaAseguradorasIP = sanitize_text_field( $_POST[$this->plugin_name . '_entradaAseguradorasIP'] );
$entradaAseguradorasReferer = sanitize_text_field( $_POST[$this->plugin_name . '_entradaAseguradorasReferer'] );
$entradaAseguradorasVisitas = sanitize_text_field( $_POST[$this->plugin_name . '_entradaAseguradorasVisitas'] );
$Dummy = sanitize_text_field( $_POST[$this->plugin_name . '_Dummy'] );
$IDstamp= sanitize_text_field( $_POST['IDstamp'] );

update_post_meta($post_id, $this->plugin_name . '_entradaAseguradorasIP', $entradaAseguradorasIP);
update_post_meta($post_id, $this->plugin_name . '_entradaAseguradorasReferer', $entradaAseguradorasReferer);
update_post_meta($post_id, $this->plugin_name . '_entradaAseguradorasVisitas', $entradaAseguradorasVisitas);
update_post_meta($post_id, $this->plugin_name . '_Dummy', $Dummy);
update_post_meta($post_id, 'IDstamp', $IDstamp);
