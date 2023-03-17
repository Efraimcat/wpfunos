<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
/**
* The admin-specific functionality of the plugin.
*
* @link       https://github.com/Efraimcat/wpfunos/
* @since      1.0.0
*
* @package    Wpfunos
* @subpackage Wpfunos/admin
* @author     Efraim Bayarri <efraim@efraim.cat>
*/

class Wpfunos_Admin_AJAX extends Wpfunos_Admin {

  public function __construct( ) {
    add_action('wp_ajax_nopriv_wpfunos_ajax_v3_procesar_actualizar_precios', function () { $this->wpfunosProcesarPrecios();});
    add_action('wp_ajax_wpfunos_ajax_v3_procesar_actualizar_precios', function () {$this->wpfunosProcesarPrecios();});
    add_action('wp_ajax_nopriv_wpfunos_ajax_v3_procesar_actualizar_servicios', function () { $this->wpfunosProcesarServicios();});
    add_action('wp_ajax_wpfunos_ajax_v3_procesar_actualizar_servicios', function () {$this->wpfunosProcesarServicios();});
    add_action('wp_ajax_nopriv_wpfunos_ajax_v3_procesar_actualizar_preciosV3', function () { $this->wpfunosProcesarPreciosV3();});
    add_action('wp_ajax_wpfunos_ajax_v3_procesar_actualizar_preciosV3', function () {$this->wpfunosProcesarPreciosV3();});

  }

  /*********************************/
  /*****  AJAX                ******/
  /*********************************/
  /**
  * Procesar Precios
  *
  * add_action('wp_ajax_nopriv_wpfunos_ajax_v3_procesar_actualizar_precios', function () { $this->wpfunosProcesarPrecios();});
  * add_action('wp_ajax_wpfunos_ajax_v3_procesar_actualizar_precios', function () {$this->wpfunosProcesarPrecios();});
  *
  *
  **/
  public function wpfunosProcesarPrecios(){
    $offset = $_POST['offset'];
    $batch = $_POST['batch'];

    $args = array(
      'post_type' => 'precio_serv_wpfunos',
      'post_status' => 'publish',
      'numberposts' => $batch,
      'offset' =>$offset,
    );
    $post_list = get_posts( $args );
    if( $post_list ){
      foreach ( $post_list as $post ) {

        $servicioPrecioID = get_post_meta( $post->ID, 'wpfunos_servicioPrecioID', true );

        $direccion = get_post_meta( $servicioPrecioID, 'wpfunos_servicioDireccion', true );

        //$this->custom_logs('Dirección: ' .$post->ID. ' -> '.$direccion );

        if( strlen( $direccion ) > 1 ){
          gmw_update_post_location( $post->ID, $direccion, 7, $direccion, true );
        }

      }
    }

    $result['type'] = "success";
    $result['newoffset'] = (int)$offset + (int)$batch ;
    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }

  /*********************************/
  /*****  AJAX                ******/
  /*********************************/
  /**
  * Procesar Servicios
  *
  * add_action('wp_ajax_nopriv_wpfunos_ajax_v3_procesar_actualizar_servicios', function () { $this->wpfunosProcesarServicios();});
  * add_action('wp_ajax_wpfunos_ajax_v3_procesar_actualizar_servicios', function () {$this->wpfunosProcesarServicios();});
  *
  *
  **/
  public function wpfunosProcesarServicios(){
    $offset = $_POST['offset'];
    $batch = $_POST['batch'];

    $tipos = array(
      "EESS", "EESO", "EESC", "EESR",
      "EEVS", "EEVO", "EEVC", "EEVR",
      "EMSS", "EMSO", "EMSC", "EMSR",
      "EMVS", "EMVO", "EMVC", "EMVR",
      "EPSS", "EPSO", "EPSC", "EPSR",
      "EPVS", "EPVO", "EPVC", "EPVR",
      "IESS", "IESO", "IESC", "IESR",
      "IEVS", "IEVO", "IEVC", "IEVR",
      "IMSS", "IMSO", "IMSC", "IMSR",
      "IMVS", "IMVO", "IMVC", "IMVR",
      "IPSS", "IPSO", "IPSC", "IPSR",
      "IPVS", "IPVO", "IPVC", "IPVR",
    );

    $args = array(
      'post_type' => 'servicios_wpfunos',
      'post_status' => 'publish',
      'numberposts' => $batch,
      'offset' =>$offset,
      'meta_query' => array(
        array( 'key' => 'wpfunos_servicioActivo', 'value' => '1', 'compare' => '=', ),
      ),
    );

    $post_list = get_posts( $args );
    if( $post_list ){
      foreach ( $post_list as $post ) {
        $nombre_servicio = get_the_title( $post->ID );
        $nombre_titulo = get_post_meta( $post->ID, 'wpfunos_servicioNombre', true );
        $direccion = get_post_meta( $post->ID, 'wpfunos_servicioDireccion', true );

        //$this->custom_logs('wpfunosProcesarServicios: ' .$post->ID );

        foreach ( $tipos as $tipo ) {
          $resp1 = (substr ($tipo,0,1) == 'E') ? '1' : '2';
          $resp3 = (substr ($tipo,2,1) == 'V') ? '1' : '2';
          switch( substr ($tipo,1,1) ){ case 'M':$resp2 = '1';break; case 'E':$resp2 = '2';break; case 'P':$resp2 = '3';break; }
          switch( substr ($tipo,3,1) ){ case 'S':$resp4 = '1';break; case 'O':$resp4 = '2';break; case 'C':$resp4 = '3';break; case 'R':$resp4 = '4';break; }
          $newargs = array(
            'post_type' => 'precio_serv_wpfunos',
            'post_status'  => 'publish',
            'posts_per_page' => -1,
            'meta_query' => array(
              'relation' => 'AND',
              array( 'key' => 'wpfunos_servicioPrecioID', 'value' => $post->ID, 'compare' => '=', ),
              array( 'key' => 'resp1', 'value' => $resp1, 'compare' => '=', ),
              array( 'key' => 'resp2', 'value' => $resp2, 'compare' => '=', ),
              array( 'key' => 'resp3', 'value' => $resp3, 'compare' => '=', ),
              array( 'key' => 'resp4', 'value' => $resp4, 'compare' => '=', ),
            ),
          );
          $newpost_list = get_posts( $newargs );
          // comprobar que tiene precios del nuevo buscador
          $precio = get_post_meta( $post->ID, 'wpfunos_servicio'.$tipo, true );
          if( strlen ($precio) > 0 ){
            if( $newpost_list ){
              // Update
              foreach ( $newpost_list as $newpost ) {
                $post_update = array(
                  'ID'         => $newpost->ID,
                  'post_title' => $nombre_titulo,
                  'meta_input'   => array(
                    'wpfunos_servicioPrecio' => $precio,
                  ),
                );
                wp_update_post( $post_update );
              }
            }else{
              // Create
              $this->custom_logs('wpfunosProcesarServicios: Create ' .$nombre_titulo );

              $my_post = array(
                'post_title' => $nombre_titulo,
                'post_type' => 'precio_serv_wpfunos',
                'post_status'  => 'publish',
                'meta_input'   => array(
                  'wpfunos_servicioPrecioValor' =>  $tipo,
                  'wpfunos_servicioPrecioID' => $post->ID,
                  'wpfunos_servicioPrecioNombre' => $nombre_servicio,
                  'wpfunos_servicioPrecio' => $precio,
                  'resp1' => $resp1, 'resp2' => $resp2, 'resp3' => $resp3, 'resp4' => $resp4,
                ),
              );

              $insertpost_id = wp_insert_post($my_post);
              gmw_update_post_location( $insertpost_id, $direccion, 7, $direccion, true );
            }
          }else{
            //tiene precio 0. Si existe el índice borrarlo
            // Borrar
            if( $newpost_list ){
              foreach ( $newpost_list as $newpost ) {
                $this->custom_logs('wpfunosEliminarIndices ' .$post->ID. ' ==> Elimnar ' .$newpost->ID. ' <==' );
                wp_delete_post( $newpost->ID, true);
              }
            }
            //FIN tiene precio 0. Si existe el índice borrarlo
          }
        }
      }
    }

    $result['type'] = "success";
    $result['newoffset'] = (int)$offset + (int)$batch ;
    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }

  /*********************************/
  /*****  AJAX                ******/
  /*********************************/
  /**
  * Procesar Servicios
  *
  * add_action('wp_ajax_nopriv_wpfunos_ajax_v3_procesar_actualizar_preciosV3', function () { $this->wpfunosProcesarPreciosV3();});
  * add_action('wp_ajax_wpfunos_ajax_v3_procesar_actualizar_preciosV3', function () {$this->wpfunosProcesarPreciosV3();});
  *
  *
  **/
  public function wpfunosProcesarPreciosV3(){
    $offset = $_POST['offset'];
    $batch = $_POST['batch'];
    $tipos = array(
      "EESS" => '1478', "EESO" => '1479', "EESC" => '147A', "EESR" => '147B',
      "EEVS" => '1468', "EEVO" => '1469', "EEVC" => '146A', "EEVR" => '146B',
      "EMSS" => '1378', "EMSO" => '1379', "EMSC" => '137A', "EMSR" => '137B',
      "EMVS" => '1368', "EMVO" => '1369', "EMVC" => '136A', "EMVR" => '136B',
      "EPSS" => '1578', "EPSO" => '1579', "EPSC" => '157A', "EPSR" => '157B',
      "EPVS" => '1568', "EPVO" => '1569', "EPVC" => '156A', "EPVR" => '156B',
      "IESS" => '2478', "IESO" => '2479', "IESC" => '247A', "IESR" => '247B',
      "IEVS" => '2468', "IEVO" => '2469', "IEVC" => '246A', "IEVR" => '246B',
      "IMSS" => '2378', "IMSO" => '2379', "IMSC" => '237A', "IMSR" => '237B',
      "IMVS" => '2368', "IMVO" => '2369', "IMVC" => '236A', "IMVR" => '236B',
      "IPSS" => '2578', "IPSO" => '2579', "IPSC" => '257A', "IPSR" => '257B',
      "IPVS" => '2568', "IPVO" => '2569', "IPVC" => '256A', "IPVR" => '256B',
    );
    $args = array(
      'post_type' => 'servicios_wpfunos',
      'post_status' => 'publish',
      'numberposts' => $batch,
      'offset' =>$offset,
    );

    $post_list = get_posts( $args );
    if( $post_list ){
      foreach ( $post_list as $post ) {

        // WPML
        $post_details = apply_filters( 'wpml_post_language_details', NULL, $post->ID ) ;
        if( $post_details['language_code'] == 'es' ){
          $precio[0] = get_post_meta( $post->ID, 'wpfunos_servicioPrecioBase', true );
          $precio[1] = get_post_meta( $post->ID, 'wpfunos_servicioDestino_1Precio', true );
          $precio[2] = get_post_meta( $post->ID, 'wpfunos_servicioDestino_2Precio', true );
          $precio[3] = get_post_meta( $post->ID, 'wpfunos_servicioAtaudEcologico_2Precio', true );
          $precio[4] = get_post_meta( $post->ID, 'wpfunos_servicioAtaudEcologico_1Precio', true );
          $precio[5] = get_post_meta( $post->ID, 'wpfunos_servicioAtaudEcologico_3Precio', true );
          $precio[6] = get_post_meta( $post->ID, 'wpfunos_servicioVelatorioPrecio', true );
          $precio[7] = get_post_meta( $post->ID, 'wpfunos_servicioVelatorioNoPrecio', true );
          $precio[8] = '0';
          $precio[9] = get_post_meta( $post->ID, 'wpfunos_servicioDespedida_1Precio', true );
          $precio[10] = get_post_meta( $post->ID, 'wpfunos_servicioDespedida_2Precio', true );
          $precio[11] = get_post_meta( $post->ID, 'wpfunos_servicioDespedida_3Precio', true );

          $precio_anterior[0] = get_post_meta( $post->ID, 'wpfunos_servicioPrecioBase_anterior', true );
          $precio_anterior[1] = get_post_meta( $post->ID, 'wpfunos_servicioDestino_1Precio_anterior', true );
          $precio_anterior[2] = get_post_meta( $post->ID, 'wpfunos_servicioDestino_2Precio_anterior', true );
          $precio_anterior[3] = get_post_meta( $post->ID, 'wpfunos_servicioAtaudEcologico_2Precio_anterior', true );
          $precio_anterior[4] = get_post_meta( $post->ID, 'wpfunos_servicioAtaudEcologico_1Precio_anterior', true );
          $precio_anterior[5] = get_post_meta( $post->ID, 'wpfunos_servicioAtaudEcologico_3Precio_anterior', true );
          $precio_anterior[6] = get_post_meta( $post->ID, 'wpfunos_servicioVelatorioPrecio_anterior', true );
          $precio_anterior[7] = get_post_meta( $post->ID, 'wpfunos_servicioVelatorioNoPrecio_anterior', true );
          $precio_anterior[8] = '0';
          $precio_anterior[9] = get_post_meta( $post->ID, 'wpfunos_servicioDespedida_1Precio_anterior', true );
          $precio_anterior[10] = get_post_meta( $post->ID, 'wpfunos_servicioDespedida_2Precio_anterior', true );
          $precio_anterior[11] = get_post_meta( $post->ID, 'wpfunos_servicioDespedida_3Precio_anterior', true );

          foreach ( $tipos as $key=>$value ){
            $valor[1] = substr( $value, 0, 1);
            $valor[2] = substr( $value, 1, 1);
            $valor[3] = substr( $value, 2, 1);
            if( substr( $value, 3, 1) == '8' ) $valor[4] = '8';
            if( substr( $value, 3, 1) == '9' ) $valor[4] = '9';
            if( substr( $value, 3, 1) == 'A' ) $valor[4] = '10';
            if( substr( $value, 3, 1) == 'B' ) $valor[4] = '11';

            if( $precio[0] != '' && $precio[ (int)$valor[1] ] != '' && $precio[ (int)$valor[2] ] != '' && $precio[ (int)$valor[3] ] != '' && $precio[ (int)$valor[4] ] != '' ){
              if( get_post_meta( $post->ID, 'wpfunos_servicio'.$key.'_bloqueo', true) != '1'){
                $total = (int)$precio[0] + (int)$precio[ (int)$valor[1] ] + (int)$precio[ (int)$valor[2] ] + (int)$precio[ (int)$valor[3] ] + (int)$precio[ (int)$valor[4] ];
                update_post_meta( $post->ID, 'wpfunos_servicio'.$key, $total );
              }
            }else{
              update_post_meta( $post->ID, 'wpfunos_servicio'.$key, '' );
            }
            if( $precio_anterior[0] != '' && $precio_anterior[ (int)$valor[1] ] != '' && $precio_anterior[ (int)$valor[2] ] != '' && $precio_anterior[ (int)$valor[3] ] != '' && $precio_anterior[ (int)$valor[4] ] != '' ){
              $total_anterior = (int)$precio_anterior[0] + (int)$precio_anterior[ (int)$valor[1] ] + (int)$precio_anterior[ (int)$valor[2] ] + (int)$precio_anterior[ (int)$valor[3] ] + (int)$precio_anterior[ (int)$valor[4] ];
              update_post_meta( $post->ID, 'wpfunos_servicio'.$key.'_anterior', $total_anterior );
            }else{
              update_post_meta( $post->ID, 'wpfunos_servicio'.$key.'_anterior', '' );
            }

          }// END foreach
        }// END ['language_code'] == 'es'
      }// END foreach ( $post_list as $post )
    }// END if( $post_list )
    $result['type'] = "success";
    $result['newoffset'] = (int)$offset + (int)$batch ;
    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }

}
