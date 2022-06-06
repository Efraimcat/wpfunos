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
    $this->plugin_name . '_userName' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userName', true ) ),
    $this->plugin_name . '_userPhone' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userPhone', true ) ),
    $this->plugin_name . '_userCP' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userCP', true ) ),
    $this->plugin_name . '_userNombreSeleccionUbicacion' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userNombreSeleccionUbicacion', true ) ),
    $this->plugin_name . '_userNombreSeleccionDistancia' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userNombreSeleccionDistancia', true ) ),
    $this->plugin_name . '_userNombreSeleccionServicio' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userNombreSeleccionServicio', true ) ),
    $this->plugin_name . '_userNombreSeleccionAtaud' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userNombreSeleccionAtaud', true ) ),
    $this->plugin_name . '_userNombreSeleccionVelatorio' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userNombreSeleccionVelatorio', true ) ),
    $this->plugin_name . '_userNombreSeleccionDespedida' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userNombreSeleccionDespedida', true ) ),
    $this->plugin_name . '_userServicio' => sanitize_text_field( $IDservicio ),
    $this->plugin_name . '_userServicioEnviado' => true,

    $this->plugin_name . '_userAccion' => sanitize_text_field( $accion ),
    $this->plugin_name . '_userNombreAccion' => sanitize_text_field( $textoaccion ),

    $this->plugin_name . '_userServicioTitulo' => sanitize_text_field( get_the_title( $IDservicio ) ),
    $this->plugin_name . '_userServicioEmpresa' => sanitize_text_field( get_post_meta( $IDservicio, 'wpfunos_servicioEmpresa', true ) ),
    $this->plugin_name . '_userServicioPoblacion' => sanitize_text_field( get_post_meta( $IDservicio, 'wpfunos_servicioPoblacion', true ) ),
    $this->plugin_name . '_userServicioProvincia' => sanitize_text_field( get_post_meta( $IDservicio, 'wpfunos_servicioProvincia', true ) ),



    $this->plugin_name . '_userSeleccion' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userSeleccion', true  ) ),
    $this->plugin_name . '_userIP' => sanitize_text_field( apply_filters('wpfunos_userIP','dummy') ),
    $this->plugin_name . '_userLAT' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userLAT', true ) ),
    $this->plugin_name . '_userLNG' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userLNG', true ) ),
    $this->plugin_name . '_userPluginVersion' => sanitize_text_field( $this->version ),
    $this->plugin_name . '_Dummy' => true,
  ),
);
