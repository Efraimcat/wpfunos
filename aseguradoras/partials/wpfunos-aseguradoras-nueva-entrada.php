<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
//
//* 6 - Usuario pulsa botón "que me llamen" en resultados aseguradoras
//* 7 - Usuario pulsa botón "llamar" en resultados aseguradoras
//* 8 - Usuario pide presupuesto aseguradoras
//if($_GET['accion'] == 1 ) $textoaccion = "Botón llamen servicios";
//if($_GET['accion'] == 2 ) $textoaccion = "Botón llamar servicios";
//Botón pedir presupuesto

$my_post = array(
  'post_title' => $referencia,
  'post_type' => 'usuarios_wpfunos',
  'post_status'  => 'publish',
  'meta_input'   => array(
    'wpfunos_TimeStamp' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
    'wpfunos_userMail' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userMail', true ) ),
    'wpfunos_userReferencia' => sanitize_text_field( $referencia ),
    'wpfunos_userName' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userName', true ) ),
    'wpfunos_userPhone' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userPhone', true ) ),
    'wpfunos_userSeguro' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userSeguro', true ) ),
    'wpfunos_userCP' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userCP', true ) ),
    'wpfunos_userNombreSeleccionUbicacion' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userNombreSeleccionUbicacion', true ) ),

    'wpfunos_userAccion' => sanitize_text_field( $accion ),
    'wpfunos_userNombreAccion' => sanitize_text_field( $textoaccion ),

    'wpfunos_userSeleccion' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userSeleccion', true  ) ),
    'wpfunos_userServicioEnviado' => true ,
    'wpfunos_userServicioTitulo' => sanitize_text_field(  $titulo ),
    'wpfunos_userIP' => sanitize_text_field( apply_filters('wpfunos_userIP','dummy') ),
    'wpfunos_userLAT' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userLAT', true ) ),
    'wpfunos_userLNG' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userLNG', true ) ),
    'wpfunos_userPluginVersion' => sanitize_text_field( $this->version ),
    'wpfunos_Dummy' => true,
  ),
);
