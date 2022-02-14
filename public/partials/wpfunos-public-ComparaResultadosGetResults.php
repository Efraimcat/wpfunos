<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * @link       https://efraim.cat
 * @since      1.0.0
 *
 * @package    WpFunos
 * @subpackage WpFunos/public/partials
 */
 $NA = false;
 $ecologico = false;
 $preciototal = (int)get_post_meta( $postID, $this->plugin_name . '_servicioPrecioBase', true );
 $preciodescuento = 0;
 if( (int)get_post_meta( $postID, $this->plugin_name . '_servicioPrecioBaseDescuento', true ) > 0 ){
   $preciodescuento = $preciototal - ( $preciototal*((int)get_post_meta( $postID, $this->plugin_name . '_servicioPrecioBaseDescuento', true )/100) );
 }else{
   $preciodescuento = $preciototal ;
 }

//	Servicio
//	nombre
//	Precio
//	descuento
//	total
 $wpfservicio[] = array('Base',
   get_post_meta( $postID, $this->plugin_name . '_servicioNombre', true ),
   $preciototal,
   (int)get_post_meta( $postID, $this->plugin_name . '_servicioPrecioBaseDescuento', true ),
   $preciodescuento
 );
//
//$wpfunos_confirmado[] = array( $postID, $wpfResultados[0], $wpfResultados[1] );
//
 $seleccion = get_post_meta( $userID, 'wpfunos_userSeleccion', true );
 $CP = get_post_meta( $userID, 'wpfunos_userCP', true );
 $respuesta = (explode(',',$seleccion));

 // Destino
 switch($respuesta[3]){
   case '1':
     list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioDestino_1Precio', true ),
       get_post_meta( $postID, $this->plugin_name . '_servicioDestino_1Descuento', true ), $NA, $preciototal, $preciodescuento, get_post_meta( $postID, $this->plugin_name . '_servicioDestino_1Nombre', true ) );
     break;
   case '2';
     list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioDestino_2Precio', true ),
       get_post_meta( $postID, $this->plugin_name . '_servicioDestino_2Descuento', true ), $NA, $preciototal, $preciodescuento, get_post_meta( $postID, $this->plugin_name . '_servicioDestino_2Nombre', true ) );
     break;
   case '3';
     list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioDestino_3Precio', true ),
       get_post_meta( $postID, $this->plugin_name . '_servicioDestino_3Descuento', true ), $NA, $preciototal, $preciodescuento , get_post_meta( $postID, $this->plugin_name . '_servicioDestino_2Nombre', true ) );
     break;
 }
 $wpfservicio[] = array('Destino', $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento);

 // Ataud
 switch($respuesta[4]){
   case '1':
     list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioAtaud_1Precio', true ),
       get_post_meta( $postID, $this->plugin_name . '_servicioAtaud_1Descuento', true ), $NA, $preciototal, $preciodescuento, get_post_meta( $postID, $this->plugin_name . '_servicioAtaud_1Nombre', true ) );
     break;
   case '2';
     list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioAtaud_2Precio', true ),
       get_post_meta( $postID, $this->plugin_name . '_servicioAtaud_2Descuento', true ), $NA, $preciototal, $preciodescuento, get_post_meta( $postID, $this->plugin_name . '_servicioAtaud_2Nombre', true ) );
     break;
   case '3';
     list( $NA, $preciototal, $preciodescuento , $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioAtaud_3Precio', true ),
       get_post_meta( $postID, $this->plugin_name . '_servicioAtaud_3Descuento', true ), $NA, $preciototal, $preciodescuento, get_post_meta( $postID, $this->plugin_name . '_servicioAtaud_3Nombre', true ) );
     break;
 }
 $wpfservicio[] = array('Ataud', $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento);

 // Velatorio
 switch($respuesta[5]){
   case '1':
     list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioVelatorioPrecio', true ),
       get_post_meta( $postID, $this->plugin_name . '_servicioVelatorioDescuento', true ), $NA, $preciototal, $preciodescuento, get_post_meta( $postID, $this->plugin_name . '_servicioVelatorioNombre', true ) );
     break;
   case '2';
     list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioVelatorioNoPrecio', true ),
       get_post_meta( $postID, $this->plugin_name . '_servicioVelatorioNoDescuento', true ), $NA, $preciototal, $preciodescuento, get_post_meta( $postID, $this->plugin_name . '_servicioVelatorioNoNombre', true ) );
     break;
 }
 $wpfservicio[] = array('Velatorio', $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento);

 // Ceremonia
 switch($respuesta[6]){
   case '1';
     list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) = 
       $this->wpfunos_case( $postID, '0', '', $NA, $preciototal, $preciodescuento, 'Sin ceremonia' );
     break;		 
   case '2';
     list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioDespedida_1Precio', true ),
       get_post_meta( $postID, $this->plugin_name . '_servicioDespedida_1Descuento', true ), $NA, $preciototal, $preciodescuento, get_post_meta( $postID, $this->plugin_name . '_servicioDespedida_1Nombre', true ) );
     break;
   case '3';
     list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioDespedida_2Precio', true ),
       get_post_meta( $postID, $this->plugin_name . '_servicioDespedida_2Descuento', true ), $NA, $preciototal, $preciodescuento, get_post_meta( $postID, $this->plugin_name . '_servicioDespedida_2Nombre', true ) );
     break;
   case '4';
     list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioDespedida_3Precio', true ),
       get_post_meta( $postID, $this->plugin_name . '_servicioDespedida_3Descuento', true ), $NA, $preciototal, $preciodescuento, get_post_meta( $postID, $this->plugin_name . '_servicioDespedida_3Nombre', true ) );
     break;
 }
 $wpfservicio[] = array('Ceremonia', $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento);

 // Descuento genérico
 if( (int)get_post_meta( $postID, $this->plugin_name . '_servicioDescuentoGenerico', true ) > 0 )
   $preciodescuento -= $preciodescuento*((int)get_post_meta( $postID, $this->plugin_name . '_servicioDescuentoGenerico', true )/100);
 $wpfservicio[] = array('Descuento genérico', 'Descuento genérico', $preciototal, get_post_meta( $postID, $this->plugin_name . '_servicioDescuentoGenerico', true ), $preciodescuento);

 // if(get_option($this->plugin_name . '_Debug')) $this->custom_logs('Desglose : ' . $this->dumpPOST( $wpfservicio ));

 // Array resultados
 $resultados = array( $preciototal ,$preciodescuento, $NA, $wpfservicio ) ;
