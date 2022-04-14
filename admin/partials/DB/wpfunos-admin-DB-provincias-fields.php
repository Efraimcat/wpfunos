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
$provinciasProvincia = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasProvincia'] );
$provinciasCodigo = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCodigo'] );
$provinciasISO31662 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasISO31662'] );
$Dummy = sanitize_text_field( $_POST[$this->plugin_name . '_Dummy'] );

update_post_meta($post_id, $this->plugin_name . '_provinciasProvincia', $provinciasProvincia);
update_post_meta($post_id, $this->plugin_name . '_provinciasCodigo', $provinciasCodigo);
update_post_meta($post_id, $this->plugin_name . '_provinciasISO31662', $provinciasISO31662);
update_post_meta($post_id, $this->plugin_name . '_Dummy', $Dummy);
