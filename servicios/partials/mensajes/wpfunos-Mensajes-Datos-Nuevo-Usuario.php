<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
//
$seleccion = get_post_meta( $IDusuario, 'wpfunos_userSeleccion', true );
$respuesta = (explode(',',$seleccion));
$ubicacion = strtr($respuesta[0],"+",",");
$userIP = apply_filters('wpfunos_userIP','dummy');
$userwpf = get_post_meta( $IDusuario, 'wpfunos_userwpf', true );
$userURL = get_post_meta( $IDusuario, 'wpfunos_userURL', true );
$Email = get_post_meta( $IDusuario, 'wpfunos_userMail', true );
$Nombre = get_post_meta( $IDusuario, 'wpfunos_userName', true );
$Telefono = get_post_meta( $IDusuario, 'wpfunos_userPhone', true );
$Distancia = $respuesta[1];
$CP = get_post_meta( $IDusuario, 'wpfunos_userCP', true );
$Destino = get_post_meta( $IDusuario, 'wpfunos_userNombreSeleccionServicio', true );
$Ataud = get_post_meta( $IDusuario, 'wpfunos_userNombreSeleccionAtaud', true );
$Velatorio = get_post_meta( $IDusuario, 'wpfunos_userNombreSeleccionVelatorio', true );
$Despedida = get_post_meta( $IDusuario, 'wpfunos_userNombreSeleccionDespedida', true );
//
$mensaje = str_replace( '[Email]' , $Email , $mensaje );
$mensaje = str_replace( '[referencia]' , $referencia , $mensaje );
$mensaje = str_replace( '[IP]' , $userIP , $mensaje );
$mensaje = str_replace( '[wpf]' , $userwpf , $mensaje );
$mensaje = str_replace( '[URL]' , $userURL , $mensaje );
$mensaje = str_replace( '[Nombre]' , $Nombre , $mensaje );
$mensaje = str_replace( '[Telefono]' , $Telefono , $mensaje );
$mensaje = str_replace( '[address]' , $ubicacion , $mensaje );
$mensaje = str_replace( '[Distancia]' , $Distancia , $mensaje );
$mensaje = str_replace( '[CP]' , $CP , $mensaje );
$mensaje = str_replace( '[Destino]' , $Destino , $mensaje );
$mensaje = str_replace( '[Ataud]' , $Ataud , $mensaje );
$mensaje = str_replace( '[Velatorio]' , $Velatorio , $mensaje );
$mensaje = str_replace( '[Despedida]' , $Despedida , $mensaje );
