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
$mensaje = str_replace( '[email]' , $transient['wpfe'] , $mensaje );
$mensaje = str_replace( '[referencia]' , $transient['wpfref'] , $mensaje );
$mensaje = str_replace( '[IP]' , $IP , $mensaje );
$mensaje = str_replace( '[nombreUsuario]' , $transient['wpfn'] , $mensaje );
$mensaje = str_replace( '[telefonoUsuario]' , $tel , $mensaje );
$mensaje = str_replace( '[poblacion]' , $transient['wpfadr'] , $mensaje );
$mensaje = str_replace( '[CP]' , $transient['wpfcp'] , $mensaje );
$mensaje = str_replace( '[destino]' , $nombredestino , $mensaje );
$mensaje = str_replace( '[ataud]' , $nombreataud , $mensaje );
$mensaje = str_replace( '[velatorio]' ,$nombrevelatorio , $mensaje );
$mensaje = str_replace( '[ceremonia]' , $nombredespedida , $mensaje );
$mensaje = str_replace( '[precio]' , number_format( sanitize_text_field( $precio ), 0, ',', '.') . '€' , $mensaje );
$mensaje = str_replace( '[nombreServicio]' , $titulo , $mensaje );
$mensaje = str_replace( '[telefonoServicio]' , get_post_meta( $servicio, "wpfunos_servicioTelefono", true)  , $mensaje );
$mensaje = str_replace( '[comentarios]' , get_post_meta( $servicio, 'wpfunos_servicio'.$destino.$ataud.$velatorio.$despedida.'_Comentario', true) , $mensaje );
$mensaje = str_replace( '[comentariosUsuario]' , apply_filters('wpfunos_comentario', $mensajeusuario ) , $mensaje );
