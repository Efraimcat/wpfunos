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
$servicioEmpresa = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEmpresa'] );
$servicioPoblacion = sanitize_text_field( $_POST[$this->plugin_name . '_servicioPoblacion'] );
$servicioProvincia = sanitize_text_field( $_POST[$this->plugin_name . '_servicioProvincia'] );
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
$servicioBotonPresupuesto = sanitize_text_field( $_POST[$this->plugin_name . '_servicioBotonPresupuesto'] );
$servicioTextoPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioTextoPrecio'] );
$servicioImagenPromo = sanitize_text_field( $_POST[$this->plugin_name . '_servicioImagenPromo'] );
$Dummy = sanitize_text_field( $_POST[$this->plugin_name . '_Dummy'] );

$servicioImagenSlider1 = sanitize_text_field( $_POST[$this->plugin_name . '_servicioImagenSlider1'] );
$servicioImagenSlider2 = sanitize_text_field( $_POST[$this->plugin_name . '_servicioImagenSlider2'] );
$servicioImagenSlider3 = sanitize_text_field( $_POST[$this->plugin_name . '_servicioImagenSlider3'] );
$servicioImagenSlider4 = sanitize_text_field( $_POST[$this->plugin_name . '_servicioImagenSlider4'] );
$servicioImagenSlider5 = sanitize_text_field( $_POST[$this->plugin_name . '_servicioImagenSlider5'] );

$servicioPackNombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioPackNombre'] );
$servicioPrecioBase = sanitize_text_field( $_POST[$this->plugin_name . '_servicioPrecioBase'] );
$servicioPrecioBaseDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioPrecioBaseDescuento'] );
$servicioDestino_1Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_1Nombre'] );
$servicioDestino_1Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_1Precio'] );
$servicioDestino_2Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_2Nombre'] );
$servicioDestino_2Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_2Precio'] );
$servicioDestino_3Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_3Nombre'] );
$servicioDestino_3Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_3Precio'] );
$servicioAtaud_1Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_1Nombre'] );
$servicioAtaud_1Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_1Precio'] );
$servicioAtaud_2Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_2Nombre'] );
$servicioAtaud_2Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_2Precio'] );
$servicioAtaud_3Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_3Nombre'] );
$servicioAtaud_3Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_3Precio'] );
$servicioAtaudEcologico_1Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_1Nombre'] );
$servicioAtaudEcologico_1Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_1Precio'] );
$servicioAtaudEcologico_2Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_2Nombre'] );
$servicioAtaudEcologico_2Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_2Precio'] );
$servicioAtaudEcologico_3Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_3Nombre'] );
$servicioAtaudEcologico_3Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_3Precio'] );
$servicioVelatorioNombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioVelatorioNombre'] );
$servicioVelatorioPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioVelatorioPrecio'] );

$servicioVelatorioNoNombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioVelatorioNoNombre'] );
$servicioVelatorioNoPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioVelatorioNoPrecio'] );

$servicioDespedida_1Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_1Nombre'] );
$servicioDespedida_1Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_1Precio'] );
$servicioDespedida_2Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_2Nombre'] );
$servicioDespedida_2Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_2Precio'] );
$servicioDespedida_3Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_3Nombre'] );
$servicioDespedida_3Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_3Precio'] );

$servicioPrecioBaseComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioPrecioBaseComentario'] );
$servicioDestino_1Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDestino_1Comentario'] );
$servicioDestino_2Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDestino_2Comentario'] );
$servicioDestino_3Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDestino_3Comentario'] );
$servicioAtaud_1Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaud_1Comentario'] );
$servicioAtaud_2Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaud_2Comentario'] );
$servicioAtaud_3Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaud_3Comentario'] );
$servicioAtaudEcologico_1Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaudEcologico_1Comentario'] );
$servicioAtaudEcologico_2Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaudEcologico_2Comentario'] );
$servicioAtaudEcologico_3Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaudEcologico_3Comentario'] );
$servicioVelatorioComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioVelatorioComentario'] );
$servicioVelatorioNoComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioVelatorioNoComentario'] );
$servicioDespedida_1Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDespedida_1Comentario'] );
$servicioDespedida_2Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDespedida_2Comentario'] );
$servicioDespedida_3Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDespedida_3Comentario'] );

$servicioPosiblesExtras = wp_kses_post( $_POST[$this->plugin_name . '_servicioPosiblesExtras'] );



update_post_meta($post_id, $this->plugin_name . '_servicioNombre', $servicioNombre);
update_post_meta($post_id, $this->plugin_name . '_servicioEmpresa', $servicioEmpresa);
update_post_meta($post_id, $this->plugin_name . '_servicioPoblacion', $servicioPoblacion);
update_post_meta($post_id, $this->plugin_name . '_servicioProvincia', $servicioProvincia);
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
update_post_meta($post_id, $this->plugin_name . '_servicioBotonPresupuesto', $servicioBotonPresupuesto);
update_post_meta($post_id, $this->plugin_name . '_servicioTextoPrecio', $servicioTextoPrecio);
update_post_meta($post_id, $this->plugin_name . '_servicioImagenPromo', $servicioImagenPromo);
update_post_meta($post_id, $this->plugin_name . '_Dummy', $Dummy);

update_post_meta($post_id, $this->plugin_name . '_servicioImagenSlider1', $servicioImagenSlider1);
update_post_meta($post_id, $this->plugin_name . '_servicioImagenSlider2', $servicioImagenSlider2);
update_post_meta($post_id, $this->plugin_name . '_servicioImagenSlider3', $servicioImagenSlider3);
update_post_meta($post_id, $this->plugin_name . '_servicioImagenSlider4', $servicioImagenSlider4);
update_post_meta($post_id, $this->plugin_name . '_servicioImagenSlider5', $servicioImagenSlider5);

update_post_meta($post_id, $this->plugin_name . '_servicioPackNombre', $servicioPackNombre);
update_post_meta($post_id, $this->plugin_name . '_servicioPrecioBase', $servicioPrecioBase);
update_post_meta($post_id, $this->plugin_name . '_servicioPrecioBaseDescuento', $servicioPrecioBaseDescuento);
update_post_meta($post_id, $this->plugin_name . '_servicioPrecioBaseComentario', $servicioPrecioBaseComentario);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_1Nombre', $servicioDestino_1Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_1Precio', $servicioDestino_1Precio);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_2Nombre', $servicioDestino_2Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_2Precio', $servicioDestino_2Precio);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_3Nombre', $servicioDestino_3Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_3Precio', $servicioDestino_3Precio);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_1Nombre', $servicioAtaud_1Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_1Precio', $servicioAtaud_1Precio);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_2Nombre', $servicioAtaud_2Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_2Precio', $servicioAtaud_2Precio);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_3Nombre', $servicioAtaud_3Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_3Precio', $servicioAtaud_3Precio);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_1Nombre', $servicioAtaudEcologico_1Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_1Precio', $servicioAtaudEcologico_1Precio);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_2Nombre', $servicioAtaudEcologico_2Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_2Precio', $servicioAtaudEcologico_2Precio);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_3Nombre', $servicioAtaudEcologico_3Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_3Precio', $servicioAtaudEcologico_3Precio);
update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioNombre', $servicioVelatorioNombre);
update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioPrecio', $servicioVelatorioPrecio);
update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioNoNombre', $servicioVelatorioNoNombre);
update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioNoPrecio', $servicioVelatorioNoPrecio);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_1Nombre', $servicioDespedida_1Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_1Precio', $servicioDespedida_1Precio);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_2Nombre', $servicioDespedida_2Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_2Precio', $servicioDespedida_2Precio);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_3Nombre', $servicioDespedida_3Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_3Precio', $servicioDespedida_3Precio);

update_post_meta($post_id, $this->plugin_name . '_servicioDestino_1Comentario', $servicioDestino_1Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_2Comentario', $servicioDestino_2Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_3Comentario', $servicioDestino_3Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_1Comentario', $servicioAtaud_1Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_2Comentario', $servicioAtaud_2Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_3Comentario', $servicioAtaud_3Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_1Comentario', $servicioAtaudEcologico_1Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_2Comentario', $servicioAtaudEcologico_2Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_3Comentario', $servicioAtaudEcologico_3Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioComentario', $servicioVelatorioComentario);
update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioNoComentario', $servicioVelatorioNoComentario);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_1Comentario', $servicioDespedida_1Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_2Comentario', $servicioDespedida_2Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_3Comentario', $servicioDespedida_3Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioPosiblesExtras', $servicioPosiblesExtras);
