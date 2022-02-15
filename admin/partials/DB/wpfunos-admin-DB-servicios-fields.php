<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://efraim.cat
 * @since      1.0.0
 *
 * @package    Wpfunos
 * @subpackage Wpfunos/admin/partials
 */
 $servicioNombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioNombre'] );
 $servicioPoblacion = sanitize_text_field( $_POST[$this->plugin_name . '_servicioPoblacion'] );
 $servicioDireccion = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDireccion'] );
 $servicioPrecioConfirmado = sanitize_text_field( $_POST[$this->plugin_name . '_servicioPrecioConfirmado'] );
 $servicioLogo = sanitize_text_field( $_POST[$this->plugin_name . '_servicioLogo'] );
 $servicioEmail = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEmail'] );
 $servicioTelefono = sanitize_text_field( $_POST[$this->plugin_name . '_servicioTelefono'] );
 $servicioMapa = sanitize_text_field( $_POST[$this->plugin_name . '_servicioMapa'] );
 $servicioLead = sanitize_text_field( $_POST[$this->plugin_name . '_servicioLead'] );
 $servicioLead2 = sanitize_text_field( $_POST[$this->plugin_name . '_servicioLead2'] );
 $servicioDescuentoGenerico = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDescuentoGenerico'] );
 $servicioValoracion = sanitize_text_field( $_POST[$this->plugin_name . '_servicioValoracion'] );
 $servicioActivo = sanitize_text_field( $_POST[$this->plugin_name . '_servicioActivo'] );
 $servicioPackNombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioPackNombre'] );
 $servicioPrecioBase = sanitize_text_field( $_POST[$this->plugin_name . '_servicioPrecioBase'] );
 $servicioPrecioBaseDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioPrecioBaseDescuento'] );
 $servicioDestino_1Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_1Nombre'] );
 $servicioDestino_1Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_1Precio'] );
 $servicioDestino_1Descuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_1Descuento'] );
 $servicioDestino_1ProxPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_1ProxPrecio'] );
 $servicioDestino_1ProxDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_1ProxDescuento'] );
 $servicioDestino_1FuturoPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_1FuturoPrecio'] );
 $servicioDestino_1FuturoDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_1FuturoDescuento'] );
 $servicioDestino_2Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_2Nombre'] );
 $servicioDestino_2Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_2Precio'] );
 $servicioDestino_2Descuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_2Descuento'] );
 $servicioDestino_2ProxPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_2ProxPrecio'] );
 $servicioDestino_2ProxDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_2ProxDescuento'] );
 $servicioDestino_2FuturoPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_2FuturoPrecio'] );
 $servicioDestino_2FuturoDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_2FuturoDescuento'] );
 $servicioDestino_3Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_3Nombre'] );
 $servicioDestino_3Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_3Precio'] );
 $servicioDestino_3Descuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_3Descuento'] );
 $servicioDestino_3ProxPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_3ProxPrecio'] );
 $servicioDestino_3ProxDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_3ProxDescuento'] );
 $servicioDestino_3FuturoPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_3FuturoPrecio'] );
 $servicioDestino_3FuturoDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_3FuturoDescuento'] );
 $servicioAtaud_1Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_1Nombre'] );
 $servicioAtaud_1Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_1Precio'] );
 $servicioAtaud_1Descuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_1Descuento'] );
 $servicioAtaud_1ProxPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_1ProxPrecio'] );
 $servicioAtaud_1ProxDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_1ProxDescuento'] );
 $servicioAtaud_1FuturoPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_1FuturoPrecio'] );
 $servicioAtaud_1FuturoDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_1FuturoDescuento'] );
 $servicioAtaud_2Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_2Nombre'] );
 $servicioAtaud_2Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_2Precio'] );
 $servicioAtaud_2Descuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_2Descuento'] );
 $servicioAtaud_2ProxPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_2ProxPrecio'] );
 $servicioAtaud_2ProxDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_2ProxDescuento'] );
 $servicioAtaud_2FuturoPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_2FuturoPrecio'] );
 $servicioAtaud_2FuturoDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_2FuturoDescuento'] );
 $servicioAtaud_3Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_3Nombre'] );
 $servicioAtaud_3Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_3Precio'] );
 $servicioAtaud_3Descuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_3Descuento'] );
 $servicioAtaud_3ProxPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_3ProxPrecio'] );
 $servicioAtaud_3ProxDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_3ProxDescuento'] );
 $servicioAtaud_3FuturoPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_3FuturoPrecio'] );
 $servicioAtaud_3FuturoDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_3FuturoDescuento'] );
 $servicioAtaudEcologico_1Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_1Nombre'] );
 $servicioAtaudEcologico_1Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_1Precio'] );
 $servicioAtaudEcologico_1Descuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_1Descuento'] );
 $servicioAtaudEcologico_1ProxPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_1ProxPrecio'] );
 $servicioAtaudEcologico_1ProxDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_1ProxDescuento'] );
 $servicioAtaudEcologico_1FuturoPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_1FuturoPrecio'] );
 $servicioAtaudEcologico_1FuturoDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_1FuturoDescuento'] );
 $servicioAtaudEcologico_2Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_2Nombre'] );
 $servicioAtaudEcologico_2Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_2Precio'] );
 $servicioAtaudEcologico_2Descuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_2Descuento'] );
 $servicioAtaudEcologico_2ProxPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_2ProxPrecio'] );
 $servicioAtaudEcologico_2ProxDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_2ProxDescuento'] );
 $servicioAtaudEcologico_2FuturoPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_2FuturoPrecio'] );
 $servicioAtaudEcologico_2FuturoDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_2FuturoDescuento'] );
 $servicioAtaudEcologico_3Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_3Nombre'] );
 $servicioAtaudEcologico_3Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_3Precio'] );
 $servicioAtaudEcologico_3Descuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_3Descuento'] );
 $servicioAtaudEcologico_3ProxPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_3ProxPrecio'] );
 $servicioAtaudEcologico_3ProxDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_3ProxDescuento'] );
 $servicioAtaudEcologico_3FuturoPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_3FuturoPrecio'] );
 $servicioAtaudEcologico_3FuturoDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_3FuturoDescuento'] );
 $servicioVelatorioNombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioVelatorioNombre'] );
 $servicioVelatorioPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioVelatorioPrecio'] );
 $servicioVelatorioDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioVelatorioDescuento'] );
 $servicioVelatorioProxPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioVelatorioProxPrecio'] );
 $servicioVelatorioProxDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioVelatorioProxDescuento'] );
 $servicioVelatorioFuturoPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioVelatorioFuturoPrecio'] );
 $servicioVelatorioFuturoDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioVelatorioFuturoDescuento'] );

 $servicioVelatorioNoNombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioVelatorioNoNombre'] );
 $servicioVelatorioNoPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioVelatorioNoPrecio'] );
 $servicioVelatorioNoDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioVelatorioNoDescuento'] );
 $servicioVelatorioNoProxPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioVelatorioNoProxPrecio'] );
 $servicioVelatorioNoProxDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioVelatorioNoProxDescuento'] );
 $servicioVelatorioNoFuturoPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioVelatorioNoFuturoPrecio'] );
 $servicioVelatorioNoFuturoDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioVelatorioNoFuturoDescuento'] );

 $servicioDespedida_1Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_1Nombre'] );
 $servicioDespedida_1Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_1Precio'] );
 $servicioDespedida_1Descuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_1Descuento'] );
 $servicioDespedida_1ProxPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_1ProxPrecio'] );
 $servicioDespedida_1ProxDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_1ProxDescuento'] );
 $servicioDespedida_1FuturoPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_1FuturoPrecio'] );
 $servicioDespedida_1FuturoDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_1FuturoDescuento'] );
 $servicioDespedida_2Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_2Nombre'] );
 $servicioDespedida_2Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_2Precio'] );
 $servicioDespedida_2Descuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_2Descuento'] );
 $servicioDespedida_2ProxPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_2ProxPrecio'] );
 $servicioDespedida_2ProxDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_2ProxDescuento'] );
 $servicioDespedida_2FuturoPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_2FuturoPrecio'] );
 $servicioDespedida_2FuturoDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_2FuturoDescuento'] );
 $servicioDespedida_3Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_3Nombre'] );
 $servicioDespedida_3Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_3Precio'] );
 $servicioDespedida_3Descuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_3Descuento'] );
 $servicioDespedida_3ProxPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_3ProxPrecio'] );
 $servicioDespedida_3ProxDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_3ProxDescuento'] );
 $servicioDespedida_3FuturoPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_3FuturoPrecio'] );
 $servicioDespedida_3FuturoDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_3FuturoDescuento'] );

 $servicioPrecioBaseComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioPrecioBaseComentario'] );
 $servicioDestino_1Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDestino_1Comentario'] );
 $servicioDestino_1ProxComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDestino_1ProxComentario'] );
 $servicioDestino_1FuturoComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDestino_1FuturoComentario'] );
 $servicioDestino_2Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDestino_2Comentario'] );
 $servicioDestino_2ProxComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDestino_2ProxComentario'] );
 $servicioDestino_2FuturoComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDestino_2FuturoComentario'] );
 $servicioDestino_3Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDestino_3Comentario'] );
 $servicioDestino_3ProxComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDestino_3ProxComentario'] );
 $servicioDestino_3FuturoComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDestino_3FuturoComentario'] );
 $servicioAtaud_1Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaud_1Comentario'] );
 $servicioAtaud_1ProxComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaud_1ProxComentario'] );
 $servicioAtaud_1FuturoComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaud_1FuturoComentario'] );
 $servicioAtaud_2Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaud_2Comentario'] );
 $servicioAtaud_2ProxComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaud_2ProxComentario'] );
 $servicioAtaud_2FuturoComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaud_2FuturoComentario'] );
 $servicioAtaud_3Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaud_3Comentario'] );
 $servicioAtaud_3ProxComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaud_3ProxComentario'] );
 $servicioAtaud_3FuturoComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaud_3FuturoComentario'] );
 $servicioAtaudEcologico_1Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaudEcologico_1Comentario'] );
 $servicioAtaudEcologico_1ProxComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaudEcologico_1ProxComentario'] );
 $servicioAtaudEcologico_1FuturoComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaudEcologico_1FuturoComentario'] );
 $servicioAtaudEcologico_2Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaudEcologico_2Comentario'] );
 $servicioAtaudEcologico_2ProxComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaudEcologico_2ProxComentario'] );
 $servicioAtaudEcologico_2FuturoComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaudEcologico_2FuturoComentario'] );
 $servicioAtaudEcologico_3Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaudEcologico_3Comentario'] );
 $servicioAtaudEcologico_3ProxComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaudEcologico_3ProxComentario'] );
 $servicioAtaudEcologico_3FuturoComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaudEcologico_3FuturoComentario'] );
 $servicioVelatorioComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioVelatorioComentario'] );
 $servicioVelatorioProxComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioVelatorioProxComentario'] );
 $servicioVelatorioFuturoComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioVelatorioFuturoComentario'] );
 $servicioVelatorioNoComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioVelatorioNoComentario'] );
 $servicioVelatorioNoProxComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioVelatorioNoProxComentario'] );
 $servicioVelatorioNoFuturoComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioVelatorioNoFuturoComentario'] );
 $servicioDespedida_1Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDespedida_1Comentario'] );
 $servicioDespedida_1ProxComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDespedida_1ProxComentario'] );
 $servicioDespedida_1FuturoComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDespedida_1FuturoComentario'] );
 $servicioDespedida_2Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDespedida_2Comentario'] );
 $servicioDespedida_2ProxComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDespedida_2ProxComentario'] );
 $servicioDespedida_2FuturoComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDespedida_2FuturoComentario'] );
 $servicioDespedida_3Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDespedida_3Comentario'] );
 $servicioDespedida_3ProxComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDespedida_3ProxComentario'] );
 $servicioDespedida_3FuturoComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDespedida_3FuturoComentario'] );

 $servicioPosiblesExtras = wp_kses_post( $_POST[$this->plugin_name . '_servicioPosiblesExtras'] );

 update_post_meta($post_id, $this->plugin_name . '_servicioNombre', $servicioNombre);
 update_post_meta($post_id, $this->plugin_name . '_servicioPoblacion', $servicioPoblacion);
 update_post_meta($post_id, $this->plugin_name . '_servicioDireccion', $servicioDireccion);
 update_post_meta($post_id, $this->plugin_name . '_servicioPrecioConfirmado', $servicioPrecioConfirmado);
 update_post_meta($post_id, $this->plugin_name . '_servicioLogo', $servicioLogo);
 update_post_meta($post_id, $this->plugin_name . '_servicioEmail', $servicioEmail);
 update_post_meta($post_id, $this->plugin_name . '_servicioTelefono', $servicioTelefono);
 update_post_meta($post_id, $this->plugin_name . '_servicioMapa', $servicioMapa);
 update_post_meta($post_id, $this->plugin_name . '_servicioLead', $servicioLead);
 update_post_meta($post_id, $this->plugin_name . '_servicioLead2', $servicioLead2);
 update_post_meta($post_id, $this->plugin_name . '_servicioDescuentoGenerico', $servicioDescuentoGenerico);
 update_post_meta($post_id, $this->plugin_name . '_servicioValoracion', $servicioValoracion);
 update_post_meta($post_id, $this->plugin_name . '_servicioActivo', $servicioActivo);
 update_post_meta($post_id, $this->plugin_name . '_servicioPackNombre', $servicioPackNombre);
 update_post_meta($post_id, $this->plugin_name . '_servicioPrecioBase', $servicioPrecioBase);
 update_post_meta($post_id, $this->plugin_name . '_servicioPrecioBaseDescuento', $servicioPrecioBaseDescuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioPrecioBaseComentario', $servicioPrecioBaseComentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioDestino_1Nombre', $servicioDestino_1Nombre);
 update_post_meta($post_id, $this->plugin_name . '_servicioDestino_1Precio', $servicioDestino_1Precio);
 update_post_meta($post_id, $this->plugin_name . '_servicioDestino_1Descuento', $servicioDestino_1Descuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioDestino_1ProxPrecio', $servicioDestino_1ProxPrecio);
 update_post_meta($post_id, $this->plugin_name . '_servicioDestino_1ProxDescuento', $servicioDestino_1ProxDescuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioDestino_1FuturoPrecio', $servicioDestino_1FuturoPrecio);
 update_post_meta($post_id, $this->plugin_name . '_servicioDestino_1FuturoDescuento', $servicioDestino_1FuturoDescuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioDestino_2Nombre', $servicioDestino_2Nombre);
 update_post_meta($post_id, $this->plugin_name . '_servicioDestino_2Precio', $servicioDestino_2Precio);
 update_post_meta($post_id, $this->plugin_name . '_servicioDestino_2Descuento', $servicioDestino_2Descuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioDestino_2ProxPrecio', $servicioDestino_2ProxPrecio);
 update_post_meta($post_id, $this->plugin_name . '_servicioDestino_2ProxDescuento', $servicioDestino_2ProxDescuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioDestino_2FuturoPrecio', $servicioDestino_2FuturoPrecio);
 update_post_meta($post_id, $this->plugin_name . '_servicioDestino_2FuturoDescuento', $servicioDestino_2FuturoDescuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioDestino_3Nombre', $servicioDestino_3Nombre);
 update_post_meta($post_id, $this->plugin_name . '_servicioDestino_3Precio', $servicioDestino_3Precio);
 update_post_meta($post_id, $this->plugin_name . '_servicioDestino_3Descuento', $servicioDestino_3Descuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioDestino_3ProxPrecio', $servicioDestino_3ProxPrecio);
 update_post_meta($post_id, $this->plugin_name . '_servicioDestino_3ProxDescuento', $servicioDestino_3ProxDescuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioDestino_3FuturoPrecio', $servicioDestino_3FuturoPrecio);
 update_post_meta($post_id, $this->plugin_name . '_servicioDestino_3FuturoDescuento', $servicioDestino_3FuturoDescuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_1Nombre', $servicioAtaud_1Nombre);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_1Precio', $servicioAtaud_1Precio);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_1Descuento', $servicioAtaud_1Descuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_1ProxPrecio', $servicioAtaud_1ProxPrecio);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_1ProxDescuento', $servicioAtaud_1ProxDescuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_1FuturoPrecio', $servicioAtaud_1FuturoPrecio);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_1FuturoDescuento', $servicioAtaud_1FuturoDescuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_2Nombre', $servicioAtaud_2Nombre);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_2Precio', $servicioAtaud_2Precio);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_2Descuento', $servicioAtaud_2Descuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_2ProxPrecio', $servicioAtaud_2ProxPrecio);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_2ProxDescuento', $servicioAtaud_2ProxDescuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_2FuturoPrecio', $servicioAtaud_2FuturoPrecio);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_2FuturoDescuento', $servicioAtaud_2FuturoDescuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_3Nombre', $servicioAtaud_3Nombre);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_3Precio', $servicioAtaud_3Precio);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_3Descuento', $servicioAtaud_3Descuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_3ProxPrecio', $servicioAtaud_3ProxPrecio);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_3ProxDescuento', $servicioAtaud_3ProxDescuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_3FuturoPrecio', $servicioAtaud_3FuturoPrecio);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_3FuturoDescuento', $servicioAtaud_3FuturoDescuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_1Nombre', $servicioAtaudEcologico_1Nombre);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_1Precio', $servicioAtaudEcologico_1Precio);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_1Descuento', $servicioAtaudEcologico_1Descuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_1ProxPrecio', $servicioAtaudEcologico_1ProxPrecio);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_1ProxDescuento', $servicioAtaudEcologico_1ProxDescuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_1FuturoPrecio', $servicioAtaudEcologico_1FuturoPrecio);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_1FuturoDescuento', $servicioAtaudEcologico_1FuturoDescuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_2Nombre', $servicioAtaudEcologico_2Nombre);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_2Precio', $servicioAtaudEcologico_2Precio);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_2Descuento', $servicioAtaudEcologico_2Descuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_2ProxPrecio', $servicioAtaudEcologico_2ProxPrecio);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_2ProxDescuento', $servicioAtaudEcologico_2ProxDescuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_2FuturoPrecio', $servicioAtaudEcologico_2FuturoPrecio);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_2FuturoDescuento', $servicioAtaudEcologico_2FuturoDescuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_3Nombre', $servicioAtaudEcologico_3Nombre);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_3Precio', $servicioAtaudEcologico_3Precio);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_3Descuento', $servicioAtaudEcologico_3Descuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_3ProxPrecio', $servicioAtaudEcologico_3ProxPrecio);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_3ProxDescuento', $servicioAtaudEcologico_3ProxDescuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_3FuturoPrecio', $servicioAtaudEcologico_3FuturoPrecio);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_3FuturoDescuento', $servicioAtaudEcologico_3FuturoDescuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioNombre', $servicioVelatorioNombre);
 update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioPrecio', $servicioVelatorioPrecio);
 update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioDescuento', $servicioVelatorioDescuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioProxPrecio', $servicioVelatorioProxPrecio);
 update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioProxDescuento', $servicioVelatorioProxDescuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioFuturoPrecio', $servicioVelatorioFuturoPrecio);
 update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioFuturoDescuento', $servicioVelatorioFuturoDescuento);

 update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioNoNombre', $servicioVelatorioNoNombre);
 update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioNoPrecio', $servicioVelatorioNoPrecio);
 update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioNoDescuento', $servicioVelatorioNoDescuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioNoProxPrecio', $servicioVelatorioNoProxPrecio);
 update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioNoProxDescuento', $servicioVelatorioNoProxDescuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioNoFuturoPrecio', $servicioVelatorioNoFuturoPrecio);
 update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioNoFuturoDescuento', $servicioVelatorioNoFuturoDescuento);

 update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_1Nombre', $servicioDespedida_1Nombre);
 update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_1Precio', $servicioDespedida_1Precio);
 update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_1Descuento', $servicioDespedida_1Descuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_1ProxPrecio', $servicioDespedida_1ProxPrecio);
 update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_1ProxDescuento', $servicioDespedida_1ProxDescuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_1FuturoPrecio', $servicioDespedida_1FuturoPrecio);
 update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_1FuturoDescuento', $servicioDespedida_1FuturoDescuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_2Nombre', $servicioDespedida_2Nombre);
 update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_2Precio', $servicioDespedida_2Precio);
 update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_2Descuento', $servicioDespedida_2Descuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_2ProxPrecio', $servicioDespedida_2ProxPrecio);
 update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_2ProxDescuento', $servicioDespedida_2ProxDescuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_2FuturoPrecio', $servicioDespedida_2FuturoPrecio);
 update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_2FuturoDescuento', $servicioDespedida_2FuturoDescuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_3Nombre', $servicioDespedida_3Nombre);
 update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_3Precio', $servicioDespedida_3Precio);
 update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_3Descuento', $servicioDespedida_3Descuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_3ProxPrecio', $servicioDespedida_3ProxPrecio);
 update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_3ProxDescuento', $servicioDespedida_3ProxDescuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_3FuturoPrecio', $servicioDespedida_3FuturoPrecio);
 update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_3FuturoDescuento', $servicioDespedida_3FuturoDescuento);
 update_post_meta($post_id, $this->plugin_name . '_servicioDestino_1Comentario', $servicioDestino_1Comentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioDestino_1ProxComentario', $servicioDestino_1ProxComentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioDestino_1FuturoComentario', $servicioDestino_1FuturoComentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioDestino_2Comentario', $servicioDestino_2Comentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioDestino_2ProxComentario', $servicioDestino_2ProxComentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioDestino_2FuturoComentario', $servicioDestino_2FuturoComentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioDestino_3Comentario', $servicioDestino_3Comentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioDestino_3ProxComentario', $servicioDestino_3ProxComentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioDestino_3FuturoComentario', $servicioDestino_3FuturoComentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_1Comentario', $servicioAtaud_1Comentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_1ProxComentario', $servicioAtaud_1ProxComentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_1FuturoComentario', $servicioAtaud_1FuturoComentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_2Comentario', $servicioAtaud_2Comentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_2ProxComentario', $servicioAtaud_2ProxComentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_2FuturoComentario', $servicioAtaud_2FuturoComentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_3Comentario', $servicioAtaud_3Comentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_3ProxComentario', $servicioAtaud_3ProxComentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_3FuturoComentario', $servicioAtaud_3FuturoComentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_1Comentario', $servicioAtaudEcologico_1Comentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_1ProxComentario', $servicioAtaudEcologico_1ProxComentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_1FuturoComentario', $servicioAtaudEcologico_1FuturoComentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_2Comentario', $servicioAtaudEcologico_2Comentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_2ProxComentario', $servicioAtaudEcologico_2ProxComentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_2FuturoComentario', $servicioAtaudEcologico_2FuturoComentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_3Comentario', $servicioAtaudEcologico_3Comentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_3ProxComentario', $servicioAtaudEcologico_3ProxComentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_3FuturoComentario', $servicioAtaudEcologico_3FuturoComentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioComentario', $servicioVelatorioComentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioProxComentario', $servicioVelatorioProxComentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioFuturoComentario', $servicioVelatorioFuturoComentario);

 update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioNoComentario', $servicioVelatorioNoComentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioNoProxComentario', $servicioVelatorioNoProxComentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioNoFuturoComentario', $servicioVelatorioNoFuturoComentario);

 update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_1Comentario', $servicioDespedida_1Comentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_1ProxComentario', $servicioDespedida_1ProxComentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_1FuturoComentario', $servicioDespedida_1FuturoComentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_2Comentario', $servicioDespedida_2Comentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_2ProxComentario', $servicioDespedida_2ProxComentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_2FuturoComentario', $servicioDespedida_2FuturoComentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_3Comentario', $servicioDespedida_3Comentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_3ProxComentario', $servicioDespedida_3ProxComentario);
 update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_3FuturoComentario', $servicioDespedida_3FuturoComentario);

update_post_meta($post_id, $this->plugin_name . '_servicioPosiblesExtras', $servicioPosiblesExtras);
