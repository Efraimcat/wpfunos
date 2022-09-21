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

$servicioPrecioValor = sanitize_text_field( $_POST[$this->plugin_name . '_servicioPrecioValor'] );    // Informativo
$servicioPrecioID = sanitize_text_field( $_POST[$this->plugin_name . '_servicioPrecioID'] );          // Operativo: Nos dirige a la definición del servicio
$servicioPrecioNombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioPrecioNombre'] );  // Informativo
$servicioPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioPrecio'] );              // Informativo
$resp1 = sanitize_text_field( $_POST['resp1'] );      // Operativo: lo busca GMW en el formulario de entrada
$resp2 = sanitize_text_field( $_POST['resp2'] );      // Operativo: lo busca GMW en el formulario de entrada
$resp3 = sanitize_text_field( $_POST['resp3'] );      // Operativo: lo busca GMW en el formulario de entrada
$resp4 = sanitize_text_field( $_POST['resp4'] );      // Operativo: lo busca GMW en el formulario de entrada

update_post_meta($post_id, $this->plugin_name . '_servicioPrecioValor', $servicioPrecioValor);
update_post_meta($post_id, $this->plugin_name . '_servicioPrecioID', $servicioPrecioID);
update_post_meta($post_id, $this->plugin_name . '_servicioPrecioNombre', $servicioPrecioNombre);
update_post_meta($post_id, $this->plugin_name . '_servicioPrecio', $servicioPrecio);
update_post_meta($post_id, 'resp1', $resp1);
update_post_meta($post_id, 'resp2', $resp2);
update_post_meta($post_id, 'resp3', $resp3);
update_post_meta($post_id, 'resp4', $resp4);
