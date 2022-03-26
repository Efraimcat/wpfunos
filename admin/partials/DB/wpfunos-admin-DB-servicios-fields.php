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

$servicioBotonesLlamar = sanitize_text_field( $_POST[$this->plugin_name . '_servicioBotonesLlamar'] );
$servicioTextoPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioTextoPrecio'] );

$servicioPackNombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioPackNombre'] );
$servicioPrecioBase = sanitize_text_field( $_POST[$this->plugin_name . '_servicioPrecioBase'] );
$servicioPrecioBaseDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioPrecioBaseDescuento'] );
$servicioDestino_1Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_1Nombre'] );
$servicioDestino_1Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_1Precio'] );
$servicioDestino_1Descuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_1Descuento'] );
$servicioDestino_1ProxPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_1ProxPrecio'] );
$servicioDestino_1ProxDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_1ProxDescuento'] );
$servicioDestino_2Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_2Nombre'] );
$servicioDestino_2Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_2Precio'] );
$servicioDestino_2Descuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_2Descuento'] );
$servicioDestino_2ProxPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_2ProxPrecio'] );
$servicioDestino_2ProxDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_2ProxDescuento'] );
$servicioDestino_3Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_3Nombre'] );
$servicioDestino_3Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_3Precio'] );
$servicioDestino_3Descuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_3Descuento'] );
$servicioDestino_3ProxPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_3ProxPrecio'] );
$servicioDestino_3ProxDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_3ProxDescuento'] );
$servicioAtaud_1Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_1Nombre'] );
$servicioAtaud_1Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_1Precio'] );
$servicioAtaud_1Descuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_1Descuento'] );
$servicioAtaud_1ProxPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_1ProxPrecio'] );
$servicioAtaud_1ProxDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_1ProxDescuento'] );
$servicioAtaud_2Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_2Nombre'] );
$servicioAtaud_2Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_2Precio'] );
$servicioAtaud_2Descuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_2Descuento'] );
$servicioAtaud_2ProxPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_2ProxPrecio'] );
$servicioAtaud_2ProxDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_2ProxDescuento'] );
$servicioAtaud_3Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_3Nombre'] );
$servicioAtaud_3Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_3Precio'] );
$servicioAtaud_3Descuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_3Descuento'] );
$servicioAtaud_3ProxPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_3ProxPrecio'] );
$servicioAtaud_3ProxDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_3ProxDescuento'] );
$servicioAtaudEcologico_1Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_1Nombre'] );
$servicioAtaudEcologico_1Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_1Precio'] );
$servicioAtaudEcologico_1Descuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_1Descuento'] );
$servicioAtaudEcologico_1ProxPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_1ProxPrecio'] );
$servicioAtaudEcologico_1ProxDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_1ProxDescuento'] );
$servicioAtaudEcologico_2Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_2Nombre'] );
$servicioAtaudEcologico_2Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_2Precio'] );
$servicioAtaudEcologico_2Descuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_2Descuento'] );
$servicioAtaudEcologico_2ProxPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_2ProxPrecio'] );
$servicioAtaudEcologico_2ProxDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_2ProxDescuento'] );
$servicioAtaudEcologico_3Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_3Nombre'] );
$servicioAtaudEcologico_3Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_3Precio'] );
$servicioAtaudEcologico_3Descuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_3Descuento'] );
$servicioAtaudEcologico_3ProxPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_3ProxPrecio'] );
$servicioAtaudEcologico_3ProxDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_3ProxDescuento'] );
$servicioVelatorioNombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioVelatorioNombre'] );
$servicioVelatorioPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioVelatorioPrecio'] );
$servicioVelatorioDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioVelatorioDescuento'] );
$servicioVelatorioProxPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioVelatorioProxPrecio'] );
$servicioVelatorioProxDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioVelatorioProxDescuento'] );

$servicioVelatorioNoNombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioVelatorioNoNombre'] );
$servicioVelatorioNoPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioVelatorioNoPrecio'] );
$servicioVelatorioNoDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioVelatorioNoDescuento'] );
$servicioVelatorioNoProxPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioVelatorioNoProxPrecio'] );
$servicioVelatorioNoProxDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioVelatorioNoProxDescuento'] );

$servicioDespedida_1Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_1Nombre'] );
$servicioDespedida_1Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_1Precio'] );
$servicioDespedida_1Descuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_1Descuento'] );
$servicioDespedida_1ProxPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_1ProxPrecio'] );
$servicioDespedida_1ProxDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_1ProxDescuento'] );
$servicioDespedida_2Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_2Nombre'] );
$servicioDespedida_2Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_2Precio'] );
$servicioDespedida_2Descuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_2Descuento'] );
$servicioDespedida_2ProxPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_2ProxPrecio'] );
$servicioDespedida_2ProxDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_2ProxDescuento'] );
$servicioDespedida_3Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_3Nombre'] );
$servicioDespedida_3Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_3Precio'] );
$servicioDespedida_3Descuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_3Descuento'] );
$servicioDespedida_3ProxPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_3ProxPrecio'] );
$servicioDespedida_3ProxDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_3ProxDescuento'] );

$servicioPrecioBaseComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioPrecioBaseComentario'] );
$servicioDestino_1Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDestino_1Comentario'] );
$servicioDestino_1ProxComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDestino_1ProxComentario'] );
$servicioDestino_2Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDestino_2Comentario'] );
$servicioDestino_2ProxComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDestino_2ProxComentario'] );
$servicioDestino_3Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDestino_3Comentario'] );
$servicioDestino_3ProxComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDestino_3ProxComentario'] );
$servicioAtaud_1Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaud_1Comentario'] );
$servicioAtaud_1ProxComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaud_1ProxComentario'] );
$servicioAtaud_2Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaud_2Comentario'] );
$servicioAtaud_2ProxComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaud_2ProxComentario'] );
$servicioAtaud_3Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaud_3Comentario'] );
$servicioAtaud_3ProxComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaud_3ProxComentario'] );
$servicioAtaudEcologico_1Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaudEcologico_1Comentario'] );
$servicioAtaudEcologico_1ProxComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaudEcologico_1ProxComentario'] );
$servicioAtaudEcologico_2Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaudEcologico_2Comentario'] );
$servicioAtaudEcologico_2ProxComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaudEcologico_2ProxComentario'] );
$servicioAtaudEcologico_3Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaudEcologico_3Comentario'] );
$servicioAtaudEcologico_3ProxComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaudEcologico_3ProxComentario'] );
$servicioVelatorioComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioVelatorioComentario'] );
$servicioVelatorioProxComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioVelatorioProxComentario'] );
$servicioVelatorioNoComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioVelatorioNoComentario'] );
$servicioVelatorioNoProxComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioVelatorioNoProxComentario'] );
$servicioDespedida_1Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDespedida_1Comentario'] );
$servicioDespedida_1ProxComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDespedida_1ProxComentario'] );
$servicioDespedida_2Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDespedida_2Comentario'] );
$servicioDespedida_2ProxComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDespedida_2ProxComentario'] );
$servicioDespedida_3Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDespedida_3Comentario'] );
$servicioDespedida_3ProxComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDespedida_3ProxComentario'] );

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

update_post_meta($post_id, $this->plugin_name . '_servicioBotonesLlamar', $servicioBotonesLlamar);
update_post_meta($post_id, $this->plugin_name . '_servicioTextoPrecio', $servicioTextoPrecio);

update_post_meta($post_id, $this->plugin_name . '_servicioPackNombre', $servicioPackNombre);
update_post_meta($post_id, $this->plugin_name . '_servicioPrecioBase', $servicioPrecioBase);
update_post_meta($post_id, $this->plugin_name . '_servicioPrecioBaseDescuento', $servicioPrecioBaseDescuento);
update_post_meta($post_id, $this->plugin_name . '_servicioPrecioBaseComentario', $servicioPrecioBaseComentario);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_1Nombre', $servicioDestino_1Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_1Precio', $servicioDestino_1Precio);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_1Descuento', $servicioDestino_1Descuento);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_1ProxPrecio', $servicioDestino_1ProxPrecio);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_1ProxDescuento', $servicioDestino_1ProxDescuento);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_2Nombre', $servicioDestino_2Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_2Precio', $servicioDestino_2Precio);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_2Descuento', $servicioDestino_2Descuento);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_2ProxPrecio', $servicioDestino_2ProxPrecio);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_2ProxDescuento', $servicioDestino_2ProxDescuento);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_3Nombre', $servicioDestino_3Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_3Precio', $servicioDestino_3Precio);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_3Descuento', $servicioDestino_3Descuento);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_3ProxPrecio', $servicioDestino_3ProxPrecio);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_3ProxDescuento', $servicioDestino_3ProxDescuento);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_1Nombre', $servicioAtaud_1Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_1Precio', $servicioAtaud_1Precio);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_1Descuento', $servicioAtaud_1Descuento);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_1ProxPrecio', $servicioAtaud_1ProxPrecio);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_1ProxDescuento', $servicioAtaud_1ProxDescuento);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_2Nombre', $servicioAtaud_2Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_2Precio', $servicioAtaud_2Precio);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_2Descuento', $servicioAtaud_2Descuento);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_2ProxPrecio', $servicioAtaud_2ProxPrecio);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_2ProxDescuento', $servicioAtaud_2ProxDescuento);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_3Nombre', $servicioAtaud_3Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_3Precio', $servicioAtaud_3Precio);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_3Descuento', $servicioAtaud_3Descuento);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_3ProxPrecio', $servicioAtaud_3ProxPrecio);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_3ProxDescuento', $servicioAtaud_3ProxDescuento);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_1Nombre', $servicioAtaudEcologico_1Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_1Precio', $servicioAtaudEcologico_1Precio);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_1Descuento', $servicioAtaudEcologico_1Descuento);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_1ProxPrecio', $servicioAtaudEcologico_1ProxPrecio);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_1ProxDescuento', $servicioAtaudEcologico_1ProxDescuento);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_2Nombre', $servicioAtaudEcologico_2Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_2Precio', $servicioAtaudEcologico_2Precio);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_2Descuento', $servicioAtaudEcologico_2Descuento);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_2ProxPrecio', $servicioAtaudEcologico_2ProxPrecio);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_2ProxDescuento', $servicioAtaudEcologico_2ProxDescuento);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_3Nombre', $servicioAtaudEcologico_3Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_3Precio', $servicioAtaudEcologico_3Precio);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_3Descuento', $servicioAtaudEcologico_3Descuento);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_3ProxPrecio', $servicioAtaudEcologico_3ProxPrecio);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_3ProxDescuento', $servicioAtaudEcologico_3ProxDescuento);
update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioNombre', $servicioVelatorioNombre);
update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioPrecio', $servicioVelatorioPrecio);
update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioDescuento', $servicioVelatorioDescuento);
update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioProxPrecio', $servicioVelatorioProxPrecio);
update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioProxDescuento', $servicioVelatorioProxDescuento);

update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioNoNombre', $servicioVelatorioNoNombre);
update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioNoPrecio', $servicioVelatorioNoPrecio);
update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioNoDescuento', $servicioVelatorioNoDescuento);
update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioNoProxPrecio', $servicioVelatorioNoProxPrecio);
update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioNoProxDescuento', $servicioVelatorioNoProxDescuento);

update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_1Nombre', $servicioDespedida_1Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_1Precio', $servicioDespedida_1Precio);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_1Descuento', $servicioDespedida_1Descuento);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_1ProxPrecio', $servicioDespedida_1ProxPrecio);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_1ProxDescuento', $servicioDespedida_1ProxDescuento);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_2Nombre', $servicioDespedida_2Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_2Precio', $servicioDespedida_2Precio);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_2Descuento', $servicioDespedida_2Descuento);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_2ProxPrecio', $servicioDespedida_2ProxPrecio);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_2ProxDescuento', $servicioDespedida_2ProxDescuento);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_3Nombre', $servicioDespedida_3Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_3Precio', $servicioDespedida_3Precio);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_3Descuento', $servicioDespedida_3Descuento);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_3ProxPrecio', $servicioDespedida_3ProxPrecio);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_3ProxDescuento', $servicioDespedida_3ProxDescuento);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_1Comentario', $servicioDestino_1Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_1ProxComentario', $servicioDestino_1ProxComentario);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_2Comentario', $servicioDestino_2Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_2ProxComentario', $servicioDestino_2ProxComentario);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_3Comentario', $servicioDestino_3Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_3ProxComentario', $servicioDestino_3ProxComentario);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_1Comentario', $servicioAtaud_1Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_1ProxComentario', $servicioAtaud_1ProxComentario);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_2Comentario', $servicioAtaud_2Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_2ProxComentario', $servicioAtaud_2ProxComentario);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_3Comentario', $servicioAtaud_3Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_3ProxComentario', $servicioAtaud_3ProxComentario);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_1Comentario', $servicioAtaudEcologico_1Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_1ProxComentario', $servicioAtaudEcologico_1ProxComentario);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_2Comentario', $servicioAtaudEcologico_2Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_2ProxComentario', $servicioAtaudEcologico_2ProxComentario);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_3Comentario', $servicioAtaudEcologico_3Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_3ProxComentario', $servicioAtaudEcologico_3ProxComentario);
update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioComentario', $servicioVelatorioComentario);
update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioProxComentario', $servicioVelatorioProxComentario);

update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioNoComentario', $servicioVelatorioNoComentario);
update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioNoProxComentario', $servicioVelatorioNoProxComentario);

update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_1Comentario', $servicioDespedida_1Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_1ProxComentario', $servicioDespedida_1ProxComentario);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_2Comentario', $servicioDespedida_2Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_2ProxComentario', $servicioDespedida_2ProxComentario);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_3Comentario', $servicioDespedida_3Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_3ProxComentario', $servicioDespedida_3ProxComentario);

update_post_meta($post_id, $this->plugin_name . '_servicioPosiblesExtras', $servicioPosiblesExtras);
