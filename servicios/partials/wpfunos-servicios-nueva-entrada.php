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
$desgloseBaseNombre = $value[3][0][1];
$desgloseBasePrecio = number_format($value[3][0][2], 0, ',', '.') . '€';
$desgloseBaseDescuento = $value[3][0][3] . '%';
$desgloseBaseTotal = number_format($value[3][0][4], 0, ',', '.') . '€';

$desgloseDestinoNombre = $value[3][1][1];
$desgloseDestinoPrecio = number_format($value[3][1][2], 0, ',', '.') . '€';
$desgloseDestinoDescuento = $value[3][1][3] . '%';
$desgloseDestinoTotal = number_format($value[3][1][4], 0, ',', '.') . '€';

$desgloseAtaudNombre = $value[3][2][1];
$desgloseAtaudPrecio = number_format($value[3][2][2], 0, ',', '.') . '€';
$desgloseAtaudDescuento = $value[3][2][3] . '%';
$desgloseAtaudTotal = number_format($value[3][2][4], 0, ',', '.') . '€';

$desgloseVelatorioNombre = $value[3][3][1];
$desgloseVelatorioPrecio = number_format($value[3][3][2], 0, ',', '.') . '€';
$desgloseVelatorioDescuento = $value[3][3][3] . '%';
$desgloseVelatorioTotal = number_format($value[3][3][4], 0, ',', '.') . '€';

$desgloseCeremoniaNombre = $value[3][4][1];
$desgloseCeremoniaPrecio = number_format($value[3][4][2], 0, ',', '.') . '€';
$desgloseCeremoniaDescuento = $value[3][4][3] . '%';
$desgloseCeremoniaTotal = number_format($value[3][4][4], 0, ',', '.') . '€';

$desgloseDescuentoGenerico = $value[3][5][1];
$desgloseDescuentoGenericoPrecio = number_format($value[3][5][2], 0, ',', '.') . '€';
$desgloseDescuentoGenericoDescuento = $value[3][5][3] . '%';
$desgloseDescuentoGenericoTotal = number_format($value[3][5][4], 0, ',', '.') . '€';
$precioformat = number_format($precio, 0, ',', '.') . '€';

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
    $this->plugin_name . '_userAceptaPolitica' => true,

    $this->plugin_name . '_userAccion' => sanitize_text_field( $accion ),
    $this->plugin_name . '_userNombreAccion' => sanitize_text_field( $textoaccion ),

    $this->plugin_name . '_userServicioTitulo' => sanitize_text_field( get_the_title( $IDservicio ) ),
    $this->plugin_name . '_userServicioEmpresa' => sanitize_text_field( get_post_meta( $IDservicio, 'wpfunos_servicioEmpresa', true ) ),
    $this->plugin_name . '_userServicioPoblacion' => sanitize_text_field( get_post_meta( $IDservicio, 'wpfunos_servicioPoblacion', true ) ),
    $this->plugin_name . '_userServicioProvincia' => sanitize_text_field( get_post_meta( $IDservicio, 'wpfunos_servicioProvincia', true ) ),

    $this->plugin_name . '_userPrecio' => sanitize_text_field( $precioformat ),
    $this->plugin_name . '_userDesgloseBaseNombre' => sanitize_text_field( $desgloseBaseNombre ),
    $this->plugin_name . '_userDesgloseBasePrecio' => sanitize_text_field( $desgloseBasePrecio ),
    $this->plugin_name . '_userDesgloseBaseDescuento' => sanitize_text_field( $desgloseBaseDescuento),
    $this->plugin_name . '_userDesgloseBaseTotal' => sanitize_text_field( $desgloseBaseTotal),

    $this->plugin_name . '_userDesgloseDestinoNombre' => sanitize_text_field( $desgloseDestinoNombre),
    $this->plugin_name . '_userDesgloseDestinoPrecio' => sanitize_text_field( $desgloseDestinoPrecio),
    $this->plugin_name . '_userDesgloseDestinoDescuento' => sanitize_text_field( $desgloseDestinoDescuento),
    $this->plugin_name . '_userDesgloseDestinoTotal' => sanitize_text_field( $desgloseDestinoTotal),

    $this->plugin_name . '_userDesgloseAtaudNombre' => sanitize_text_field( $desgloseAtaudNombre),
    $this->plugin_name . '_userDesgloseAtaudPrecio' => sanitize_text_field( $desgloseAtaudPrecio),
    $this->plugin_name . '_userDesgloseAtaudDescuento' => sanitize_text_field( $desgloseAtaudDescuento),
    $this->plugin_name . '_userDesgloseAtaudTotal' => sanitize_text_field( $desgloseAtaudTotal),

    $this->plugin_name . '_userDesgloseVelatorioNombre' => sanitize_text_field( $desgloseVelatorioNombre),
    $this->plugin_name . '_userDesgloseVelatorioPrecio' => sanitize_text_field( $desgloseVelatorioPrecio),
    $this->plugin_name . '_userDesgloseVelatorioDescuento' => sanitize_text_field( $desgloseVelatorioDescuento),
    $this->plugin_name . '_userDesgloseVelatorioTotal' => sanitize_text_field( $desgloseVelatorioTotal),

    $this->plugin_name . '_userDesgloseCeremoniaNombre' => sanitize_text_field( $desgloseCeremoniaNombre),
    $this->plugin_name . '_userDesgloseCeremoniaPrecio' => sanitize_text_field( $desgloseCeremoniaPrecio),
    $this->plugin_name . '_userDesgloseCeremoniaDescuento' => sanitize_text_field( $desgloseCeremoniaDescuento),
    $this->plugin_name . '_userDesgloseCeremoniaTotal' => sanitize_text_field( $desgloseCeremoniaTotal),

    $this->plugin_name . '_userDesgloseDescuentoGenerico' => sanitize_text_field( $desgloseDescuentoGenerico),
    $this->plugin_name . '_userDesgloseDescuentoGenericoPrecio' => sanitize_text_field( $desgloseDescuentoGenericoPrecio),
    $this->plugin_name . '_userDesgloseDescuentoGenericoDescuento' => sanitize_text_field( $desgloseDescuentoGenericoDescuento),
    $this->plugin_name . '_userDesgloseDescuentoGenericoTotal' => sanitize_text_field( $desgloseDescuentoGenericoTotal),

    $this->plugin_name . '_userSeleccion' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userSeleccion', true  ) ),
    $this->plugin_name . '_userIP' => sanitize_text_field( apply_filters('wpfunos_userIP','dummy') ),
    $this->plugin_name . '_userLAT' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userLAT', true ) ),
    $this->plugin_name . '_userLNG' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userLNG', true ) ),
    $this->plugin_name . '_userPluginVersion' => sanitize_text_field( $this->version ),
    $this->plugin_name . '_Dummy' => true,
  ),
);
