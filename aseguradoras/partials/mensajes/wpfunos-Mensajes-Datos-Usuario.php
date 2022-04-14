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
$IDusuario = apply_filters('wpfunos_userID', $_GET['referencia'] );
$_GET['seleccion'] = get_post_meta( $IDusuario, 'wpfunos_userSeleccion', true );
$respuesta = (explode(',',$_GET['seleccion']));
$ubicacion = strtr($respuesta[0],"+",",");
$userIP = apply_filters('wpfunos_userIP','dummy');
$Email = get_post_meta( $IDusuario, 'wpfunos_userMail', true );
$Nombre = get_post_meta( $IDusuario, 'wpfunos_userName', true );
$Telefono = get_post_meta( $IDusuario, 'wpfunos_userPhone', true );
$CP = get_post_meta( $IDusuario, 'wpfunos_userCP', true );
	
$mensaje = str_replace( '[Email]' , $Email , $mensaje );
$mensaje = str_replace( '[referencia]' , $_GET['referencia'] , $mensaje );
$mensaje = str_replace( '[IP]' , $userIP , $mensaje );
$mensaje = str_replace( '[Nombre]' , $Nombre , $mensaje );
$mensaje = str_replace( '[Telefono]' , $Telefono , $mensaje );
$mensaje = str_replace( '[address]' , $ubicacion , $mensaje );
$mensaje = str_replace( '[Distancia]' , '' , $mensaje );
$mensaje = str_replace( '[CP]' , $CP , $mensaje );
$mensaje = str_replace( '[Destino]' , 'Resultados Aseguradoras' , $mensaje );
$mensaje = str_replace( '[Ataud]' , '' , $mensaje );
$mensaje = str_replace( '[Velatorio]' , '' , $mensaje );
$mensaje = str_replace( '[Despedida]' , '' , $mensaje );
