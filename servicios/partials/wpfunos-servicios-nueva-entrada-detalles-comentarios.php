<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
//
$respuesta = (explode(',',get_post_meta( $IDusuario, 'wpfunos_userSeleccion', true ) ));

$comentarios = '<h4><strong>¿Qué está incluido en Precio base?</strong></h4>';
$comentarios .= $this->wpfunosFormatoComentario( get_post_meta( $IDservicio, $this->plugin_name . '_servicioPrecioBaseComentario', true ) );
if( $respuesta[3] == 1 ) {
  $comentarios .= '<h4><strong>¿Qué está incluido en entierro?</strong></h4>';
  $comentarios .= $this->wpfunosFormatoComentario( get_post_meta( $IDservicio, $this->plugin_name . '_servicioDestino_1Comentario', true ) );
}
if( $respuesta[3] == 2 ) {
  $comentarios .= '<h4><strong>¿Qué está incluido en incineración?</strong></h4>';
  $comentarios .= $this->wpfunosFormatoComentario( get_post_meta( $IDservicio, $this->plugin_name . '_servicioDestino_2Comentario', true ) );
}
if( $respuesta[4] == 1 ) {
  $comentarios .= '<h4><strong>¿Qué está incluido en ataúd gama económica?</strong></h4>';
  $comentarios .= $this->wpfunosFormatoComentario( get_post_meta( $IDservicio, $this->plugin_name . '_servicioAtaud_1Comentario', true ) );
}
if( $respuesta[4] == 2 ) {
  $comentarios .= '<h4><strong>¿Qué está incluido en ataúd gama media?</strong></h4>';
  $comentarios .= $this->wpfunosFormatoComentario( get_post_meta( $IDservicio, $this->plugin_name . '_servicioAtaud_2Comentario', true ) );
}
if( $respuesta[5] == 1  && strlen( get_post_meta( $IDservicio, $this->plugin_name . '_servicioVelatorioComentario', true ) ) > 0 ){
  $comentarios .= '<h4><strong>¿Qué está incluido en velatorio?</strong></h4>';
  $comentarios .= $this->wpfunosFormatoComentario( get_post_meta( $IDservicio, $this->plugin_name . '_servicioVelatorioComentario', true ) );
}
if( $respuesta[5] == 2  && strlen( get_post_meta( $IDservicio, $this->plugin_name . '_servicioVelatorioNoComentario', true ) ) > 0 ){
  $comentarios .= '<h4><strong>¿Qué está incluido en velatorio?</strong></h4>';
  $comentarios .= $this->wpfunosFormatoComentario( get_post_meta( $IDservicio, $this->plugin_name . '_servicioVelatorioNoComentario', true ) );
}
if( $respuesta[6] == 2 ) {
  $comentarios .= '<h4><strong>¿Qué está incluido en ceremonia Sólo la sala?</strong></h4>';
  $comentarios .= $this->wpfunosFormatoComentario( get_post_meta( $IDservicio, $this->plugin_name . '_servicioDespedida_1Comentario', true ) );
}
if( $respuesta[6] == 3 ) {
  $comentarios .= '<h4><strong>¿Qué está incluido en ceremonia civil?</strong></h4>';
  $comentarios .= $this->wpfunosFormatoComentario( get_post_meta( $IDservicio, $this->plugin_name . '_servicioDespedida_2Comentario', true ) );
}
if( $respuesta[6] == 4 ) {
  $comentarios .= '<h4><strong>¿Qué está incluido en ceremonia religiosa?</strong></h4>';
  $comentarios .= $this->wpfunosFormatoComentario( get_post_meta( $IDservicio, $this->plugin_name . '_servicioDespedida_3Comentario', true ) );
}
if( strlen( get_post_meta( $IDservicio, $this->plugin_name . '_servicioPosiblesExtras', true ) )> 0 ){
  $comentarios .= '<h4><strong>Posibles Extras</strong></h4>';
  $comentarios .= $this->wpfunosFormatoComentario( get_post_meta( $IDservicio, $this->plugin_name . '_servicioPosiblesExtras', true ) );
}
