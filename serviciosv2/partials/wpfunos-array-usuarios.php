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
$my_post = array(
  'post_title' => $transient_ref['wpfref'],
  'post_type' => 'usuarios_wpfunos',
  'post_status'  => 'publish',
  'meta_input'   => array(
    'wpfunos_TimeStamp' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
    'wpfunos_userMail' => sanitize_text_field( $transient_ref['wpfe'] ),
    'wpfunos_userReferencia' => sanitize_text_field( $transient_ref['wpfref'] ),
    'wpfunos_userName' => sanitize_text_field( $transient_ref['wpfn'] ),
    'wpfunos_userPhone' => sanitize_text_field( $tel ),
    'wpfunos_userCP' => sanitize_text_field( $transient_ref['wpfcp'] ),
    'wpfunos_userAccion' => $userAccion,
    'wpfunos_userNombreAccion' => sanitize_text_field( $userNombreAccion ),
    'wpfunos_userNombreSeleccionUbicacion' => sanitize_text_field( $transient_ref['wpfadr'] ),
    'wpfunos_userNombreSeleccionDistancia' => sanitize_text_field( $transient_ref['wpfdist'] ),
    'wpfunos_userNombreSeleccionServicio' => sanitize_text_field( $nombredestino ),
    'wpfunos_userNombreSeleccionAtaud' => sanitize_text_field( $nombreataud ),
    'wpfunos_userNombreSeleccionVelatorio' => sanitize_text_field( $nombrevelatorio  ),
    'wpfunos_userNombreSeleccionDespedida' => sanitize_text_field( $nombredespedida ),
    'wpfunos_userServicio' => sanitize_text_field( $servicio ),
    'wpfunos_userServicioEnviado' => true,
    'wpfunos_userAceptaPolitica' => true,
    'wpfunos_userServicioTitulo' => sanitize_text_field( get_the_title( $servicio ) ),
    'wpfunos_userServicioEmpresa' => sanitize_text_field( get_post_meta( $servicio, 'wpfunos_servicioEmpresa', true ) ),
    'wpfunos_userServicioPoblacion' => sanitize_text_field( get_post_meta( $servicio, 'wpfunos_servicioPoblacion', true ) ),
    'wpfunos_userServicioProvincia' => sanitize_text_field( get_post_meta( $servicio, 'wpfunos_servicioProvincia', true ) ),
    'wpfunos_userPrecio' => number_format( sanitize_text_field( $precio ), 0, ',', '.') . '€',
    'wpfunos_userComentarios' => wp_kses_post( $mensajeusuario ),
    'wpfunos_userIP' => sanitize_text_field( $IP ),
    'wpfunos_userLAT' => sanitize_text_field( $transient_ref['wpflat'] ),
    'wpfunos_userLNG' => sanitize_text_field( $transient_ref['wpflng'] ),
    'wpfunos_userPluginVersion' => sanitize_text_field( $this->version ),
    'wpfunos_Dummy' => true,
  ),
);
