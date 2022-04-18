<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
/**
* Servicios.
*
* @link       https://github.com/Efraimcat/wpfunos/
* @since      1.0.0
*
* @package    Wpfunos
* @subpackage WpFunos/servicios/partials/mensajes
* @author     Efraim Bayarri <efraim@efraim.cat>
*/
$comentariosBase = apply_filters('wpfunos_comentario', get_post_meta( $_GET['servicio'], $this->plugin_name . '_servicioPrecioBaseComentario', true ) );
$comentariosExtras = apply_filters('wpfunos_comentario', get_post_meta( $_GET['servicio'], $this->plugin_name . '_servicioPosiblesExtras', true ) );
$respuesta = (explode(',',$_GET['seleccion']));
$ubicacion = strtr($respuesta[0],"+",",");

$imagenconfirmado = wp_get_attachment_image (  get_post_meta( get_option('wpfunos_postConfImagenes') , 'wpfunos_imagenConfirmado', true ) , array(45,46));
if ( 'Precio no confirmado' === $_GET['textoconfirmado'] ) $imagenconfirmado = wp_get_attachment_image (  get_post_meta( get_option('wpfunos_postConfImagenes') , 'wpfunos_imagenNoConfirmado', true ) , array(45,46));
$imagenpromo = wp_get_attachment_image ( $_GET['promo'] ,'full' );
$imagenecologico = '';
if ( $_GET['esecologico'] == 1 ) $imagenecologico = wp_get_attachment_image (  get_post_meta( get_option('wpfunos_postConfImagenes') , 'wpfunos_imagenEcologico', true ) , array(60,60));
$logoServicio = wp_get_attachment_image (  get_post_meta( $_GET['servicio'] , $this->plugin_name . '_servicioLogo', true ) , full);

if( $respuesta[3] == 1 ) $comentariosDestino = apply_filters('wpfunos_comentario', get_post_meta( $_GET['servicio'], $this->plugin_name . '_servicioDestino_1Comentario', true ) );
if( $respuesta[3] == 2 ) $comentariosDestino = apply_filters('wpfunos_comentario', get_post_meta( $_GET['servicio'], $this->plugin_name . '_servicioDestino_2Comentario', true ) );
if( $respuesta[4] == 1 ) $comentariosAtaud = apply_filters('wpfunos_comentario', get_post_meta( $_GET['servicio'], $this->plugin_name . '_servicioAtaud_1Comentario', true ) );
if( $respuesta[4] == 2 ) $comentariosAtaud = apply_filters('wpfunos_comentario', get_post_meta( $_GET['servicio'], $this->plugin_name . '_servicioAtaud_2Comentario', true ) );
if( $respuesta[5] == 1  && strlen( get_post_meta( $_GET['servicio'], $this->plugin_name . '_servicioVelatorioComentario', true ) ) > 0 ) $comentariosVelatorio = apply_filters('wpfunos_comentario', get_post_meta( $_GET['servicio'], $this->plugin_name . '_servicioVelatorioComentario', true ) );
if( $respuesta[5] == 2  && strlen( get_post_meta( $_GET['servicio'], $this->plugin_name . '_servicioVelatorioNoComentario', true ) ) > 0 )$comentariosVelatorio = apply_filters('wpfunos_comentario', get_post_meta( $_GET['servicio'], $this->plugin_name . '_servicioVelatorioNoComentario', true ) );
if( $respuesta[6] == 2 ) $comentariosDespedida = apply_filters('wpfunos_comentario', get_post_meta( $_GET['servicio'], $this->plugin_name . '_servicioDespedida_1Comentario', true ) );
if( $respuesta[6] == 3 ) $comentariosDespedida = apply_filters('wpfunos_comentario', get_post_meta( $_GET['servicio'], $this->plugin_name . '_servicioDespedida_2Comentario', true ) );
if( $respuesta[6] == 4 ) $comentariosDespedida = apply_filters('wpfunos_comentario', get_post_meta( $_GET['servicio'], $this->plugin_name . '_servicioDespedida_3Comentario', true ) );

$mensaje = str_replace( '[nombreUsuario]' , $_GET['nombreUsuario'] , $mensaje );
$mensaje = str_replace( '[nombreServicio]' , $_GET['desgloseBaseNombre'] , $mensaje );
$mensaje = str_replace( '[nombrepack]' , $_GET['nombrepack'] , $mensaje );
$mensaje = str_replace( '[precio]' , $_GET['precio'] , $mensaje );
$mensaje = str_replace( '[telefono]' , $_GET['telefono'] , $mensaje );
$mensaje = str_replace( '[referencia]' , $_GET['referencia'] , $mensaje );
$mensaje = str_replace( '[Email]' , $_GET['Email'] , $mensaje );
$mensaje = str_replace( '[CPUsuario]' , $_GET['CPUsuario'] , $mensaje );
$mensaje = str_replace( '[ubicacion]' , $ubicacion , $mensaje );

$mensaje = str_replace( '[direccion]' , $_GET['direccion'], $mensaje );
$mensaje = str_replace( '[textoconfirmado]' , $_GET['textoconfirmado'] , $mensaje );
$mensaje = str_replace( '[imagenconfirmado]' , $imagenconfirmado , $mensaje );
$mensaje = str_replace( '[textoprecio]' , $_GET['textoprecio'] , $mensaje );
$mensaje = str_replace( '[imagenpromo]' , $imagenpromo , $mensaje );
$mensaje = str_replace( '[imagenecologico]' , $imagenecologico , $mensaje );
$mensaje = str_replace( '[logoServicio]' , $logoServicio , $mensaje );

$mensaje = str_replace( '[desgloseBaseNombre]' , $_GET['desgloseBaseNombre'] , $mensaje );
$mensaje = str_replace( '[desgloseBasePrecio]' , $_GET['desgloseBasePrecio'] , $mensaje );
$mensaje = str_replace( '[desgloseBaseDescuento]' , $_GET['desgloseBaseDescuento'] , $mensaje );
$mensaje = str_replace( '[desgloseBaseTotal]' , $_GET['desgloseBaseTotal'] , $mensaje );
if( $_GET['desgloseBaseDescuento'] != '0%'){
  $mensaje = str_replace( '[TotaldesgloseBaseTotal]' , $_GET['desgloseBasePrecio'] . ' - Descuento: ' . $_GET['desgloseBaseDescuento'] . ' - <strong>Total: ' . $_GET['desgloseBaseTotal'] .'</strong>' , $mensaje );
}else{
  $mensaje = str_replace( '[TotaldesgloseBaseTotal]' , $_GET['desgloseBasePrecio'] , $mensaje );
}

$mensaje = str_replace( '[desgloseDestinoNombre]' , $_GET['desgloseDestinoNombre'] , $mensaje );
$mensaje = str_replace( '[desgloseDestinoPrecio]' , $_GET['desgloseDestinoPrecio'] , $mensaje );
$mensaje = str_replace( '[desgloseDestinoDescuento]' , $_GET['desgloseDestinoDescuento'] , $mensaje );
$mensaje = str_replace( '[desgloseDestinoTotal]' , $_GET['desgloseDestinoTotal'] , $mensaje );
if( $_GET['desgloseDestinoDescuento'] != '%'){
  $mensaje = str_replace( '[TotaldesgloseDestinoTotal]' , $_GET['desgloseDestinoPrecio'] . ' - Descuento: ' . $_GET['desgloseDestinoDescuento'] . ' - <strong>Total: ' . $_GET['desgloseDestinoTotal'] .'</strong>' , $mensaje );
}else{
  $mensaje = str_replace( '[TotaldesgloseDestinoTotal]' , $_GET['desgloseDestinoPrecio'] , $mensaje );
}

$mensaje = str_replace( '[desgloseAtaudNombre]' , $_GET['desgloseAtaudNombre'] , $mensaje );
$mensaje = str_replace( '[desgloseAtaudPrecio]' , $_GET['desgloseAtaudPrecio'] , $mensaje );
$mensaje = str_replace( '[desgloseAtaudDescuento]' , $_GET['desgloseAtaudDescuento'] , $mensaje );
$mensaje = str_replace( '[desgloseAtaudTotal]' , $_GET['desgloseAtaudTotal'] , $mensaje );
if( $_GET['desgloseAtaudDescuento'] != '%'){
  $mensaje = str_replace( '[TotaldesgloseAtaudTotal]' , $_GET['desgloseAtaudPrecio'] . ' - Descuento: ' . $_GET['desgloseAtaudDescuento'] . ' - <strong>Total: ' . $_GET['desgloseAtaudTotal'] .'</strong>' , $mensaje );
}else{
  $mensaje = str_replace( '[TotaldesgloseAtaudTotal]' , $_GET['desgloseAtaudPrecio'] , $mensaje );
}

$mensaje = str_replace( '[desgloseVelatorioNombre]' , $_GET['desgloseVelatorioNombre'] , $mensaje );
$mensaje = str_replace( '[desgloseVelatorioPrecio]' , $_GET['desgloseVelatorioPrecio'] , $mensaje );
$mensaje = str_replace( '[desgloseVelatorioDescuento]' , $_GET['desgloseVelatorioDescuento'] , $mensaje );
$mensaje = str_replace( '[desgloseVelatorioTotal]' , $_GET['desgloseVelatorioTotal'] , $mensaje );
if( $_GET['desgloseVelatorioDescuento'] != '%'){
  $mensaje = str_replace( '[TotaldesgloseVelatorioTotal]' , $_GET['desgloseVelatorioPrecio'] . ' - Descuento: ' . $_GET['desgloseVelatorioDescuento'] . ' - <strong>Total: ' . $_GET['desgloseVelatorioTotal'] .'</strong>' , $mensaje );
}else{
  $mensaje = str_replace( '[TotaldesgloseVelatorioTotal]' , $_GET['desgloseVelatorioPrecio'] , $mensaje );
}

$mensaje = str_replace( '[desgloseCeremoniaNombre]' , $_GET['desgloseCeremoniaNombre'] , $mensaje );
$mensaje = str_replace( '[desgloseCeremoniaPrecio]' , $_GET['desgloseCeremoniaPrecio'] , $mensaje );
$mensaje = str_replace( '[desgloseCeremoniaDescuento]' , $_GET['desgloseCeremoniaDescuento'] , $mensaje );
$mensaje = str_replace( '[desgloseCeremoniaTotal]' , $_GET['desgloseCeremoniaTotal'] , $mensaje );
if( $_GET['desgloseCeremoniaDescuento'] != '%'){
  $mensaje = str_replace( '[TotaldesgloseCeremoniaTotal]' , $_GET['desgloseCeremoniaPrecio'] . ' - Descuento: ' . $_GET['desgloseCeremoniaDescuento'] . ' - <strong>Total: ' . $_GET['desgloseCeremoniaTotal'] .'</strong>' , $mensaje );
}else{
  $mensaje = str_replace( '[TotaldesgloseCeremoniaTotal]' , $_GET['desgloseCeremoniaPrecio'] , $mensaje );
}

$mensaje = str_replace( '[desgloseDescuentoGenerico]' , $_GET['desgloseDescuentoGenerico'] , $mensaje );
$mensaje = str_replace( '[desgloseDescuentoGenericoPrecio]' , $_GET['desgloseDescuentoGenericoPrecio'] , $mensaje );
$mensaje = str_replace( '[desgloseDescuentoGenericoDescuento]' , $_GET['desgloseDescuentoGenericoDescuento'] , $mensaje );
$mensaje = str_replace( '[desgloseDescuentoGenericoTotal]' , $_GET['desgloseDescuentoGenericoTotal'] , $mensaje );
if( $_GET['desgloseDescuentoGenericoTotal'] !== $_GET['desgloseDescuentoGenericoPrecio'] ){
  $mensaje = str_replace( '[TotaldesgloseGenericoTotal]' , $_GET['desgloseDescuentoGenericoPrecio'] . ' - <strong>TOTAL: ' . $_GET['desgloseDescuentoGenericoTotal'] . '</strong>' , $mensaje );
}else{
  $mensaje = str_replace( '[TotaldesgloseGenericoTotal]' , $_GET['desgloseDescuentoGenericoPrecio'] , $mensaje );
}

$mensaje = str_replace( '[comentariosBase]' , $comentariosBase , $mensaje );
$mensaje = str_replace( '[comentariosDestino]' , $comentariosDestino , $mensaje );
$mensaje = str_replace( '[comentariosAtaud]' , $comentariosAtaud , $mensaje );
$mensaje = str_replace( '[comentariosVelatorio]' , $comentariosVelatorio , $mensaje );
$mensaje = str_replace( '[comentariosDespedida]' , $comentariosDespedida , $mensaje );
$mensaje = str_replace( '[comentariosExtras]' , $comentariosExtras , $mensaje );
