<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

function wpf_add_to_cart_redirect() {
  global $woocommerce;
  $wpf_redirect_checkout = $woocommerce->cart->get_checkout_url();
  return $wpf_redirect_checkout;
}
add_filter('add_to_cart_redirect', 'wpf_add_to_cart_redirect');

// cambiar texto añadir al carrito
function woo_custom_cart_button_text() {
  return __( 'Contratar ahora', 'woocommerce' );
}
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );    // 2.1 +

function woo_archive_custom_cart_button_text() {
  return __( 'Contratar ahora', 'woocommerce' );
}
add_filter( 'woocommerce_product_add_to_cart_text', 'woo_archive_custom_cart_button_text' );    // 2.1 +

// quitar cantidad de la página de producto
function wc_remove_all_quantity_fields( $return, $product ) {return true;}
add_filter( 'woocommerce_is_sold_individually', 'wc_remove_all_quantity_fields', 10, 2 );

// quitar meta de categoria, sku, etc.
remove_action ('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

/*
* AÑADIR CAMPO NIF/CIF EN EL FORMULARIO DE PAGO
*/
function woo_custom_field_checkout($checkout) {
  echo '<div id="additional_checkout_field">';
  woocommerce_form_field( 'nif', array( // Identificador del campo
    'type'          => 'text',
    'class'         => array('my-field-class form-row-wide'),
    'required'      => true,            // ¿El campo es obligatorio 'true' o 'false'?
    'label'       => __('NIF / CIF'),   // Nombre del campo
    'placeholder'   => __('Ej: 12345678X'), // Texto de apoyo que se muestra dentro del campo
  ), $checkout->get_value( 'nif' ));    // Identificador del campo
  echo '</div>';
}
add_action( 'woocommerce_after_checkout_billing_form', 'woo_custom_field_checkout' );

/*
* INCLUYE NIF/CIF EN LOS DETALLES DEL PEDIDO CON EL NUEVO CAMPO
*/
function woo_custom_field_checkout_update_order($order_id) {
  if ( ! empty( $_POST['nif'] ) ) {
    update_post_meta( $order_id, 'NIF', sanitize_text_field( $_POST['nif'] ) );
  }
}
add_action( 'woocommerce_checkout_update_order_meta', 'woo_custom_field_checkout_update_order' );

/*
* MUESTRA EL VALOR DEL CAMPO NIF/CIF LA PÁGINA DE MODIFICACIÓN DEL PEDIDO
*/
function woo_custom_field_checkout_edit_order($order){
  echo '<p><strong>'.__('NIF').':</strong> ' . get_post_meta( $order->id, 'NIF', true ) . '</p>';
}
add_action( 'woocommerce_admin_order_data_after_billing_address', 'woo_custom_field_checkout_edit_order', 10, 1 );

/*
* INCLUYE EL CAMPO NIF/CIF EN EL CORREO ELECTRÓNICO DE AVISO A TU CLIENTE
*/
function woo_custom_field_checkout_email($keys) {
  $keys[] = 'NIF';
  return $keys;
}
add_filter('woocommerce_email_order_meta_keys', 'woo_custom_field_checkout_email');