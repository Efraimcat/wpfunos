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
* @subpackage Wpfunos/servicios
* @author     Efraim Bayarri <efraim@efraim.cat>
*/

//
$colaborador = apply_filters('wpfunos_email_colaborador','dummy');
//

if( apply_filters('wpfunos_email_colaborador','dummy') ){
  $mensaje = str_replace( '[email]' , $COOKIE['wpfeactual'] , $mensaje );
  $mensaje = str_replace( '[nombreUsuario]' , $COOKIE['wpfnactual'] , $mensaje );
  $mensaje = str_replace( '[telefonoUsuario]' , $COOKIE['wpftactual'] , $mensaje );
}else{
  $mensaje = str_replace( '[email]' , $transient_ref['wpfe'] , $mensaje );
  $mensaje = str_replace( '[nombreUsuario]' , $transient_ref['wpfn'] , $mensaje );
  $mensaje = str_replace( '[telefonoUsuario]' , $tel , $mensaje );
}

$mensaje = str_replace( '[referencia]' , $transient_ref['wpfref'] , $mensaje );
$mensaje = str_replace( '[IP]' , $IP , $mensaje );
$mensaje = str_replace( '[poblacion]' , $transient_ref['wpfadr'] , $mensaje );
$mensaje = str_replace( '[CP]' , $transient_ref['wpfcp'] , $mensaje );
$mensaje = str_replace( '[destino]' , $nombredestino , $mensaje );
$mensaje = str_replace( '[ataud]' , $nombreataud , $mensaje );
$mensaje = str_replace( '[velatorio]' ,$nombrevelatorio , $mensaje );
$mensaje = str_replace( '[ceremonia]' , $nombredespedida , $mensaje );
$mensaje = str_replace( '[precio]' , number_format( sanitize_text_field( $precio ), 0, ',', '.') . '€' , $mensaje );
$mensaje = str_replace( '[nombreServicio]' , $titulo , $mensaje );
$mensaje = str_replace( '[telefonoServicio]' , get_post_meta( $servicio, "wpfunos_servicioTelefono", true)  , $mensaje );
$mensaje = str_replace( '[comentarios]' , get_post_meta( $servicio, 'wpfunos_servicio'.$destino.$ataud.$velatorio.$despedida.'_Comentario', true) , $mensaje );
$mensaje = str_replace( '[comentariosUsuario]' , apply_filters('wpfunos_comentario', $mensajeusuario ) , $mensaje );

$mensaje = str_replace( '[logoServicio]' , wp_get_attachment_image (  get_post_meta( $servicio, 'wpfunos_servicioLogo', true ) , 'full' ) , $mensaje );
$mensaje = str_replace( '[imagenconfirmado]' , wp_get_attachment_image ( 83459 , 'full') , $mensaje );
$mensaje = str_replace( '[nombrepack]' , get_post_meta( $servicio, 'wpfunos_servicioPackNombre', true ) , $mensaje );
$mensaje = str_replace( '[textoprecio]' , get_post_meta( $servicio, 'wpfunos_servicioTextoPrecio', true ) , $mensaje );
