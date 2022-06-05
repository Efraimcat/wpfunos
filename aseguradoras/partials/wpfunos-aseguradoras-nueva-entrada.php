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
    $this->plugin_name . '_TimeStamp' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
    $this->plugin_name . '_userMail' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userMail', true ) ),
    $this->plugin_name . '_userReferencia' => sanitize_text_field( $referencia ),
    $this->plugin_name . '_userName' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userName', true ),
    $this->plugin_name . '_userPhone' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userPhone', true ) ),
    $this->plugin_name . '_userSeguro' => sanitize_text_field( get_post_meta( $IDusuario, $this->plugin_name . '_userSeguro', true ) ),
    $this->plugin_name . '_userCP' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userCP', true ) ),

    $this->plugin_name . '_userAccion' => sanitize_text_field( $accion ),
    $this->plugin_name . '_userNombreAccion' => sanitize_text_field( $textoaccion ),

    $this->plugin_name . '_userSeleccion' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userSeleccion', true  ),
    $this->plugin_name . '_userServicioEnviado' => true ,
    $this->plugin_name . '_userServicioTitulo' => sanitize_text_field( get_post_meta( $IDaseguradora, 'wpfunos_aseguradorasNombre', true  ) ,
    $this->plugin_name . '_userIP' => sanitize_text_field( apply_filters('wpfunos_userIP','dummy') ),
    $this->plugin_name . '_userLAT' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userLAT', true ) ),
    $this->plugin_name . '_userLNG' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userLNG', true ) ),
    $this->plugin_name . '_userPluginVersion' => sanitize_text_field( $this->version ),
    $this->plugin_name . '_Dummy' => true,
  ),
);
