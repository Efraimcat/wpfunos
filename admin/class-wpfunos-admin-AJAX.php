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
  * 'numberposts' => 5, 'offset' => 0,
  * 'numberposts' - Default is 5. Total number of posts to retrieve.
  * 'offset' - Default is 0. The number of posts you want to skip.
  * $args = array(
  *   'post_type' => 'precio_serv_wpfunos',
  *   'post_status' => 'publish',
  *   'numberposts' => 1,
  *   'offset' => x,
  * )
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
  * 'numberposts' => 5, 'offset' => 0,
  * 'numberposts' - Default is 5. Total number of posts to retrieve.
  * 'offset' - Default is 0. The number of posts you want to skip.
  * $args = array(
  *   'post_type' => 'precio_serv_wpfunos',
  *   'post_status' => 'publish',
  *   'numberposts' => 1,
  *   'offset' => x,
  * )
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
          // comprobar que tiene precios del nuevo buscador
          $precio = get_post_meta( $post->ID, 'wpfunos_servicio'.$tipo, true );
          if( strlen ($precio) > 0 ){
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

            if( $newpost_list ){
              // Update

              //foreach ( $newpost_list as $newpost ) {
              //  $post_update = array(
              //    'ID'         => $newpost->ID,
              //    'post_title' => $nombre_titulo,
              //  );
              //  wp_update_post( $post_update );
              //  update_post_meta($newpost->ID, 'wpfunos_servicioPrecio',  $precio );
              //}
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

}
