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
$cpostalesPoblacion = sanitize_text_field( $_POST[$this->plugin_name . '_cpostalesPoblacion'] );
$cpostalesCodigo = sanitize_text_field( $_POST[$this->plugin_name . '_cpostalesCodigo'] );
$Dummy = sanitize_text_field( $_POST[$this->plugin_name . '_Dummy'] );

update_post_meta($post_id, $this->plugin_name . '_cpostalesPoblacion', $cpostalesPoblacion);
update_post_meta($post_id, $this->plugin_name . '_cpostalesCodigo', $cpostalesCodigo);
update_post_meta($post_id, $this->plugin_name . '_Dummy', $Dummy);
