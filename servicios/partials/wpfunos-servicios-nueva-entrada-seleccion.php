<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
$seleccion = get_post_meta( $IDusuario, $this->plugin_name . '_userSeleccion', true );
$respuesta = (explode(',',$seleccion));
switch ( $respuesta[3] ) {
  case '1': $userNombreSeleccionServicio = 'Entierro'; break;
  case '2': $userNombreSeleccionServicio = 'Incineración'; break;
}
switch ( $respuesta[4] ) {
  case '1': $userNombreSeleccionAtaud = 'Ataúd Económico'; break;
  case '2': $userNombreSeleccionAtaud = 'Ataúd Medio'; break;
  case '3': $userNombreSeleccionAtaud = 'Ataúd Premium'; break;
}
switch ( $respuesta[5] ) {
  case '1': $userNombreSeleccionVelatorio = 'Velatorio'; break;
  case '2': $userNombreSeleccionVelatorio = 'Sin Velatorio'; break;
}
switch ( $respuesta[6] ) {
  case '1': $userNombreSeleccionDespedida = 'Sin ceremonia'; break;
  case '2': $userNombreSeleccionDespedida = 'Solo sala'; break;
  case '3': $userNombreSeleccionDespedida = 'Ceremonia civil'; break;
  case '4': $userNombreSeleccionDespedida = 'Ceremonia religiosa'; break;
}
