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
* @subpackage WpFunos/aseguradoras/partials/mensajes
* @author     Efraim Bayarri <efraim@efraim.cat>
*/
$seleccion = get_post_meta( $IDusuario, 'wpfunos_userSeleccion', true );
$respuesta = (explode(',',$seleccion));
$ubicacion = strtr($respuesta[0],"+",",");
$userIP = apply_filters('wpfunos_userIP','dummy');
$Email = get_post_meta( $IDusuario, 'wpfunos_userMail', true );
$Nombre = get_post_meta( $IDusuario, 'wpfunos_userName', true );
$Telefono = get_post_meta( $IDusuario, 'wpfunos_userPhone', true );
$CP = get_post_meta( $IDusuario, 'wpfunos_userCP', true );
switch($respuesta[2]){ case '1': $sexo = 'Hombre'; break; case '2'; $sexo = 'Mujer'; break; }
$edad =  date("Y") - (int)$respuesta[3];
$any = $respuesta[3];
$seguro = get_post_meta( $IDusuario, $this->plugin_name . '_userSeguro', true );
$seguroSiNo = 'Si';
if( $seguro == '2' ) $seguroSiNo = 'No';
$URL = get_post_meta( $IDusuario, 'wpfunos_userURL', true );

// $IDaseguradora
$aseguradoraNombre = get_post_meta( $IDaseguradora, 'wpfunos_aseguradorasNombre', true );
$aseguradoraDireccion =  get_post_meta( $IDaseguradora, 'wpfunos_aseguradorasDireccion', true );
$aseguradoraCorreo =  get_post_meta( $IDaseguradora, 'wpfunos_aseguradorasCorreo', true );
$aseguradoraTelefono = get_post_meta( $IDaseguradora, 'wpfunos_aseguradorasTelefono', true );
$aseguradoraLogo = wp_get_attachment_image ( get_post_meta( $IDaseguradora, 'wpfunos_aseguradorasLogo' , array(45,46));
$aseguradoraTipoSeguro = get_post_meta( $IDaseguradora, 'wpfunos_aseguradorasTipoSeguroNombre', true );


$mensaje = str_replace( '[referencia]' , $referencia , $mensaje );
$mensaje = str_replace( '[IP]' , $userIP , $mensaje );
$mensaje = str_replace( '[Email]' , $Email , $mensaje );
$mensaje = str_replace( '[Nombre]' , $Nombre , $mensaje );
$mensaje = str_replace( '[Telefono]' , $Telefono , $mensaje );
$mensaje = str_replace( '[address]' , $ubicacion , $mensaje );
$mensaje = str_replace( '[CP]' , $CP , $mensaje );
$mensaje = str_replace( '[edad]' , $edad , $mensaje );
$mensaje = str_replace( '[sexo]' , $sexo , $mensaje );
$mensaje = str_replace( '[any]' , $any , $mensaje );
$mensaje = str_replace( '[seguro]' , $seguroSiNo , $mensaje );
$mensaje = str_replace( '[URL]' , $URL , $mensaje );
$mensaje = str_replace( '[aseguradoraNombre]' , $aseguradoraNombre , $mensaje );
$mensaje = str_replace( '[aseguradoraDireccion]' , $aseguradoraDireccion , $mensaje );
$mensaje = str_replace( '[aseguradoraCorreo]' , $aseguradoraCorreo , $mensaje );
$mensaje = str_replace( '[aseguradoraTelefono]' , $aseguradoraTelefono , $mensaje );
$mensaje = str_replace( '[aseguradoraTipoSeguro]' , $aseguradoraTipoSeguro , $mensaje );
$mensaje = str_replace( '[MensajePopup]' , $aseguradoraTipoSeguro , $mensajePopup );
