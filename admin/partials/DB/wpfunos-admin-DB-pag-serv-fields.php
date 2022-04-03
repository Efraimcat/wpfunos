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
$entradaServiciosIP = sanitize_text_field( $_POST[$this->plugin_name . '_entradaServiciosIP'] );
$entradaServiciosReferer = sanitize_text_field( $_POST[$this->plugin_name . '_entradaServiciosReferer'] );
$Dummy = sanitize_text_field( $_POST[$this->plugin_name . '_Dummy'] );

update_post_meta($post_id, $this->plugin_name . '_entradaServiciosIP', $entradaServiciosIP);
update_post_meta($post_id, $this->plugin_name . '_entradaServiciosReferer', $entradaServiciosReferer);
update_post_meta($post_id, $this->plugin_name . '_Dummy', $Dummy);
