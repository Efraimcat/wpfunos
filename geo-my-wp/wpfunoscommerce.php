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
* https://woodemia.com/insertar-un-campo-en-la-pagina-de-pago-de-woocommerce/
*/
function woo_custom_field_checkout($checkout) {
  echo '<div id="additional_checkout_field">';
  woocommerce_form_field( 'nif', array( // Identificador del campo
    'type'          => 'text',
    'class'         => array('my-field-class form-row-wide'),
    'required'      => true,            // ¿El campo es obligatorio 'true' o 'false'?
    'label'         => __('NIF / CIF'),   // Nombre del campo
    'placeholder'   => __('Ej: 12345678X'), // Texto de apoyo que se muestra dentro del campo
  ), $checkout->get_value( 'nif' ));    // Identificador del campo
  echo '</div>';

  echo '<div id="additional_nombredifunto_checkout_field">';
  woocommerce_form_field( 'nombredifunto', array( // Identificador del campo
    'type'          => 'text',
    'class'         => array('my-field-class form-row-wide'),
    'required'      => false,            // ¿El campo es obligatorio 'true' o 'false'?
    'label'         => __('Nombre del difunto/a'),   // Nombre del campo
  ), $checkout->get_value( 'nombredifunto' ));    // Identificador del campo
  echo '</div>';

  echo '<div id="additional_dnidifunto_checkout_field">';
  woocommerce_form_field( 'dnidifunto', array( // Identificador del campo
    'type'          => 'text',
    'class'         => array('my-field-class form-row-wide'),
    'required'      => false,            // ¿El campo es obligatorio 'true' o 'false'?
    'label'         => __('DNI/NIE del difunto/a'),   // Nombre del campo
    'placeholder'   => __('Ej: 12345678X'), // Texto de apoyo que se muestra dentro del campo
  ), $checkout->get_value( 'dnidifunto' ));    // Identificador del campo
  echo '</div>';

}
add_action( 'woocommerce_after_checkout_billing_form', 'woo_custom_field_checkout' );

/*
* INCLUYE NIF/CIF EN LOS DETALLES DEL PEDIDO CON EL NUEVO CAMPO
*/
function woo_custom_field_checkout_update_order($order_id) {
  if ( ! empty( $_POST['nif'] ) ) {
    update_post_meta( $order_id, 'nif', sanitize_text_field( $_POST['nif'] ) );
  }

  if ( ! empty( $_POST['difunto'] ) ) {
    update_post_meta( $order_id, 'nombredifunto', sanitize_text_field( $_POST['nombredifunto'] ) );
  }

  if ( ! empty( $_POST['dnidifunto'] ) ) {
    update_post_meta( $order_id, 'dnidifunto', sanitize_text_field( $_POST['dnidifunto'] ) );
  }

}
add_action( 'woocommerce_checkout_update_order_meta', 'woo_custom_field_checkout_update_order' );

/*
* MUESTRA EL VALOR DEL CAMPO NIF/CIF LA PÁGINA DE MODIFICACIÓN DEL PEDIDO
*/
function woo_custom_field_checkout_edit_order($order){
  echo '<p><strong>'.__('NIF').':</strong> ' . get_post_meta( $order->id, 'nif', true ) . '</p>';
  echo '<p><strong>'.__('Nombre del difunto/a').':</strong> ' . get_post_meta( $order->id, 'nombredifunto', true ) . '</p>';
  echo '<p><strong>'.__('DNI/NIE del difunto/a').':</strong> ' . get_post_meta( $order->id, 'dnidifunto', true ) . '</p>';
}
add_action( 'woocommerce_admin_order_data_after_billing_address', 'woo_custom_field_checkout_edit_order', 10, 1 );

/*
* INCLUYE EL CAMPO NIF/CIF EN EL CORREO ELECTRÓNICO DE AVISO A TU CLIENTE
*/
function woo_custom_field_checkout_email($keys) {
  $keys[] = 'nif';
  $keys[] = 'nombredifunto';
  $keys[] = 'dnidifunto';
  return $keys;
}
add_filter('woocommerce_email_order_meta_keys', 'woo_custom_field_checkout_email');


// Displaying product description in new email notifications

function product_description_in_new_email_notification( $item_id, $item, $order = null, $plain_text = false ){

  $product_id = $item['product_id']; // Get The product ID (for simple products)
  $product = wc_get_product($item['product_id']);

  if( $product->is_type( 'simple' ) ){
    $product_description = $product->get_description(); // for WC 3.0+ (new)
    // Display the product description
    echo '<div class="product-description"><p>' . $product_description . '</p></div>';
  }
}
add_action( 'woocommerce_order_item_meta_end', 'product_description_in_new_email_notification', 10, 4 );

/*
* Enviar formulario Hubspot
*
*https://www.businessbloomer.com/woocommerce-easily-get-order-info-total-items-etc-from-order-object/
*/
function wpfunos_thankyou_hubspot($order_id) {
  $order = wc_get_order( $order_id );
  //HUBSPOT
  $hubspotutk = ( isset( $_COOKIE['hubspotutk'] ) ) ? $_COOKIE['hubspotutk'] : '' ;
  $IP = apply_filters('wpfunos_userIP','dummy');
  foreach ( $order->get_items() as $item_id => $item ) {
    $product_name = $item->get_name();
  }
  do_action('wpfunos_log', '==============' );
  do_action('wpfunos_log', $userIP.' - 0000 '.'Prepara envio Hubspot WooCommerce' );
  $params = array(
    'nombre' => $order->get_formatted_billing_full_name(),
    'email' => $order->get_billing_email(),
    'telefono' => $order->get_billing_phone(),
    'address' => $order->get_billing_address_1(),
    'city' => $order->get_billing_city(),
    'zip' => $order->get_billing_postcode(),
    'state' => $order->get_billing_state(),
    'ecommerce_nombre_difunto' => $order->get_meta('nombredifunto'),
    'ecommerce_nif'  => $order->get_meta('nif'),
    'ecommerce_nif_difunto' => $order->get_meta('dnidifunto'),
    'ecommerce_notas_pedido' => $order->get_customer_note(),
    'ecommerce_pedido' => $order->get_id(),
    'ecommerce_producto' => $product_name,
    'ecommerce_subtotal' => $order->get_line_subtotal(),
    'ecommerce_total' => $order->get_line_total(),
    'ecommerce_impuestos' => $order->get_line_tax(),
    'ecommerce_metodo_pago' => $order->get_payment_method(),
    'accion' => 'ECommerce finalizar compra',
    'ip' => $IP,
    'ok' => 'ok',
    'hubspotutk' => $hubspotutk,
    'pageUri' => 'https://funos.es/finalizar-compra',
    'pageId' => 'Finalizar compra - Funos - Comparador de Funerarias'
  );
  do_action('wpfhubspot-send-form', $params );
  do_action('wpfhubspot-usuarios',array( 'email' => $wpfemail, 'hubspotutk' => $hubspotutk ) );

  do_action('wpfunos_log', '==============' );
  do_action('wpfunos_log', $userIP.' - 0000 '.'Finaliza envio formulario Hubspot WooCommerce' );
  //HUBSPOT
}
add_action( 'woocommerce_thankyou', 'wpfunos_thankyou_hubspot' );
