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

class Wpfunos_Admin_Hooks extends Wpfunos_Admin {

  public function __construct( ) {
    add_action('save_post_servicios_wpfunos', array( $this, 'wpfunosGuardarServicio' ), 10, 1 );
    add_action('after_delete_post', array( $this, 'wpfunosBorrarServicio' ), 10, 2 );
    add_action('trashed_post', array( $this, 'wpfunosPapeleraServicio' ), 10, 1 );
    add_action('updated_post_meta', array( $this, 'wpfunosActualizarMetaServicios' ), 10, 4);

    add_action('save_post_precio_funer_wpfunos', array( $this, 'wpfunosGuardarLanding' ), 10, 1 );
    add_action('updated_post_meta', array( $this, 'wpfunosActualizarMetaLandings' ), 10, 4);
  }

  public function wpfunosGuardarServicio( $post_id ){
    $this->custom_logs('wpfunosGuardarServicio' );
    $this->custom_logs('$post_id: ' .$post_id );
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
    // WPML
    $post_details = apply_filters( 'wpml_post_language_details', NULL, $post_id ) ;
    if( $post_details['language_code'] == 'es' ){
      // WPML

      $precio[0] = get_post_meta( $post_id, 'wpfunos_servicioPrecioBase', true );
      $precio[1] = get_post_meta( $post_id, 'wpfunos_servicioDestino_1Precio', true );
      $precio[2] = get_post_meta( $post_id, 'wpfunos_servicioDestino_2Precio', true );
      $precio[3] = get_post_meta( $post_id, 'wpfunos_servicioAtaudEcologico_2Precio', true );
      $precio[4] = get_post_meta( $post_id, 'wpfunos_servicioAtaudEcologico_1Precio', true );
      $precio[5] = get_post_meta( $post_id, 'wpfunos_servicioAtaudEcologico_3Precio', true );
      $precio[6] = get_post_meta( $post_id, 'wpfunos_servicioVelatorioPrecio', true );
      $precio[7] = get_post_meta( $post_id, 'wpfunos_servicioVelatorioNoPrecio', true );
      $precio[8] = '0';
      $precio[9] = get_post_meta( $post_id, 'wpfunos_servicioDespedida_1Precio', true );
      $precio[10] = get_post_meta( $post_id, 'wpfunos_servicioDespedida_2Precio', true );
      $precio[11] = get_post_meta( $post_id, 'wpfunos_servicioDespedida_3Precio', true );

      $precio_anterior[0] = get_post_meta( $post_id, 'wpfunos_servicioPrecioBase_anterior', true );
      $precio_anterior[1] = get_post_meta( $post_id, 'wpfunos_servicioDestino_1Precio_anterior', true );
      $precio_anterior[2] = get_post_meta( $post_id, 'wpfunos_servicioDestino_2Precio_anterior', true );
      $precio_anterior[3] = get_post_meta( $post_id, 'wpfunos_servicioAtaudEcologico_2Precio_anterior', true );
      $precio_anterior[4] = get_post_meta( $post_id, 'wpfunos_servicioAtaudEcologico_1Precio_anterior', true );
      $precio_anterior[5] = get_post_meta( $post_id, 'wpfunos_servicioAtaudEcologico_3Precio_anterior', true );
      $precio_anterior[6] = get_post_meta( $post_id, 'wpfunos_servicioVelatorioPrecio_anterior', true );
      $precio_anterior[7] = get_post_meta( $post_id, 'wpfunos_servicioVelatorioNoPrecio_anterior', true );
      $precio_anterior[8] = '0';
      $precio_anterior[9] = get_post_meta( $post_id, 'wpfunos_servicioDespedida_1Precio_anterior', true );
      $precio_anterior[10] = get_post_meta( $post_id, 'wpfunos_servicioDespedida_2Precio_anterior', true );
      $precio_anterior[11] = get_post_meta( $post_id, 'wpfunos_servicioDespedida_3Precio_anterior', true );

      foreach ( $tipos as $key=>$value ){
        $valor[1] = substr( $value, 0, 1);
        $valor[2] = substr( $value, 1, 1);
        $valor[3] = substr( $value, 2, 1);
        if( substr( $value, 3, 1) == '8' ) $valor[4] = '8';
        if( substr( $value, 3, 1) == '9' ) $valor[4] = '9';
        if( substr( $value, 3, 1) == 'A' ) $valor[4] = '10';
        if( substr( $value, 3, 1) == 'B' ) $valor[4] = '11';

        if( $precio[0] != '' && $precio[ (int)$valor[1] ] != '' && $precio[ (int)$valor[2] ] != '' && $precio[ (int)$valor[3] ] != '' && $precio[ (int)$valor[4] ] != '' ){
          if( get_post_meta( $post_id, 'wpfunos_servicio'.$key.'_bloqueo', true) != '1'){
            $total = (int)$precio[0] + (int)$precio[ (int)$valor[1] ] + (int)$precio[ (int)$valor[2] ] + (int)$precio[ (int)$valor[3] ] + (int)$precio[ (int)$valor[4] ];
            update_post_meta( $post_id, 'wpfunos_servicio'.$key, $total );
          }
        }else{
          update_post_meta( $post_id, 'wpfunos_servicio'.$key, '' );
        }
        if( $precio_anterior[0] != '' && $precio_anterior[ (int)$valor[1] ] != '' && $precio_anterior[ (int)$valor[2] ] != '' && $precio_anterior[ (int)$valor[3] ] != '' && $precio_anterior[ (int)$valor[4] ] != '' ){
          $total_anterior = (int)$precio_anterior[0] + (int)$precio_anterior[ (int)$valor[1] ] + (int)$precio_anterior[ (int)$valor[2] ] + (int)$precio_anterior[ (int)$valor[3] ] + (int)$precio_anterior[ (int)$valor[4] ];
          update_post_meta( $post_id, 'wpfunos_servicio'.$key.'_anterior', $total_anterior );
        }else{
          update_post_meta( $post_id, 'wpfunos_servicio'.$key.'_anterior', '' );
        }

      }
      //
      //  INDICES
      //
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

      if( get_post_meta( $post_id, 'wpfunos_servicioActivo', true ) == 1 ){

        $nombre_servicio = get_the_title( $post_id );
        $nombre_titulo = get_post_meta( $post_id, 'wpfunos_servicioNombre', true );
        $direccion = get_post_meta( $post_id, 'wpfunos_servicioDireccion', true );
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
              array( 'key' => 'wpfunos_servicioPrecioID', 'value' => $post_id, 'compare' => '=', ),
              array( 'key' => 'resp1', 'value' => $resp1, 'compare' => '=', ),
              array( 'key' => 'resp2', 'value' => $resp2, 'compare' => '=', ),
              array( 'key' => 'resp3', 'value' => $resp3, 'compare' => '=', ),
              array( 'key' => 'resp4', 'value' => $resp4, 'compare' => '=', ),
            ),
          );
          $newpost_list = get_posts( $newargs );
          //$this->custom_logs('count($newpost_list): ' .count($newpost_list) );
          // comprobar que tiene precios del nuevo buscador
          $precio = get_post_meta( $post_id, 'wpfunos_servicio'.$tipo, true );
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
                  'wpfunos_servicioPrecioID' => $post_id,
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
                $this->custom_logs('wpfunosEliminarIndices ' .$post_id. ' ==> Elimnar ' .$newpost->ID. ' <==' );
                wp_delete_post( $newpost->ID, true);
              }
            }
            //FIN tiene precio 0. Si existe el índice borrarlo
          }
        }// FIN foreach ( $tipos as $tipo )



      }// FIN if( get_post_meta( $post_id, 'wpfunos_servicioActivo', true ) == 1 )


    }
    $this->custom_logs('wpfunosGuardarServicio ENDS' );
    $this->custom_logs('---');
  }

  /**
  *
  * https://developer.wordpress.org/reference/hooks/after_delete_post/
  *
  * add_action( 'after_delete_post', 'aar_do_something', 10, 2 );
  * function aar_do_something( $post_id, $post ) {
  * 	// For a specific post type books
  * 	if ( 'books' !== $post->post_type ) {
  * 		return;
  *	  }
  *	// Write your code here
  * }
  *
  * add_action('after_delete_post', array( $this, 'wpfunosBorrarServicio' ), 10, 2 );
  */
  public function wpfunosBorrarServicio( $post_id, $post ){
    if ( 'servicios_wpfunos' !== $post->post_type ) {
      return;
    }
    $this->custom_logs('wpfunosBorrarServicio' );
    $this->custom_logs('$post_id: ' .$post_id);
    $this->custom_logs('---');
    $args = array(
      'post_type' => 'precio_serv_wpfunos',
      'post_status'  => 'publish',
      'posts_per_page' => -1,
      'meta_query' => array(
        'relation' => 'AND',
        array( 'key' => 'wpfunos_servicioPrecioID', 'value' => $post_id, 'compare' => '=', ),
      ),
    );
    $post_list = get_posts( $args );

    if( $post_list ){
      foreach ( $post_list as $post ) {
        $this->custom_logs('wpfunosEliminarIndices ' .$post_id. ' ==> Elimnar ' .$post->ID. ' <==' );
        wp_delete_post( $post->ID, true);
      }
    }

    $this->custom_logs('wpfunosBorrarServicio ENDS' );
    $this->custom_logs('---');
  }
  /**
  * add_action('trashed_post', array( $this, 'wpfunosPapeleraServicio' ), 10, 1 );
  * do_action( 'trashed_post', int $post_id )
  */
  public function wpfunosPapeleraServicio( $post_id ){
    if ( 'servicios_wpfunos' !== get_post_type( $post_id) ) {
      return;
    }
    $this->custom_logs('wpfunosPapeleraServicio' );
    $this->custom_logs('$post_id: ' .$post_id);
    $this->custom_logs('---');
    $args = array(
      'post_type' => 'precio_serv_wpfunos',
      'post_status'  => 'publish',
      'posts_per_page' => -1,
      'meta_query' => array(
        'relation' => 'AND',
        array( 'key' => 'wpfunos_servicioPrecioID', 'value' => $post_id, 'compare' => '=', ),
      ),
    );
    $post_list = get_posts( $args );

    if( $post_list ){
      foreach ( $post_list as $post ) {
        $this->custom_logs('wpfunosEliminarIndices ' .$post_id. ' ==> Elimnar ' .$post->ID. ' <==' );
        wp_delete_post( $post->ID, true);
      }
    }
    $this->custom_logs('wpfunosPapeleraServicio ENDS' );
    $this->custom_logs('---');
  }

  /**
  *
  * add_action('updated_post_meta', array( $this, 'wpfunosActualizarMetaServicios' ), 10, 4);
  *
  */
  public function wpfunosActualizarMetaServicios( $meta_id, $object_id, $meta_key, $_meta_value ){
    /**
    * #18-Mar-2023 17:59:26: $meta_id: 1665640
    * #18-Mar-2023 17:59:26: $object_id: 135710
    * #18-Mar-2023 17:59:26: $meta_key: wpfunos_servicioEESO
    * #18-Mar-2023 17:59:26: $_meta_value: 1155
    */
    if( strpos( $_SERVER['HTTP_REFERER'], '/wp-admin/edit.php?post_type=servicios_wpfunos' ) && $_SERVER['REQUEST_URI'] == '/wp-admin/admin-ajax.php' && get_post_type( $object_id ) == 'servicios_wpfunos' ){
      $this->custom_logs('wpfunosActualizarMetaServicios' );
      $this->custom_logs('$meta_id: ' .$meta_id );
      $this->custom_logs('$object_id: ' .$object_id );
      $this->custom_logs('$meta_key: ' .$meta_key );
      $this->custom_logs('$_meta_value: ' .$_meta_value );
      $this->custom_logs('CPT: ' .get_post_type( $object_id ) );
      //$this->custom_logs('$_SERVER[REQUEST_URI]: ' .$_SERVER['REQUEST_URI'] );
      //$this->custom_logs('$_SERVER[HTTP_REFERER]: ' .$_SERVER['HTTP_REFERER'] );
      $this->custom_logs('---');
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
      foreach ( $tipos as $tipo ) {
        if( $meta_key == 'wpfunos_servicio'.$tipo || $meta_key == 'wpfunos_servicio'.$tipo.'_bloqueo' ){
          if( get_post_meta( $object_id, 'wpfunos_servicio'.$tipo.'_bloqueo', true) == '1'  && get_post_meta( $object_id, 'wpfunos_servicioActivo', true ) == 1 ){

            $nombre_servicio = get_the_title( $object_id );
            $nombre_titulo = get_post_meta( $object_id, 'wpfunos_servicioNombre', true );
            $direccion = get_post_meta( $object_id, 'wpfunos_servicioDireccion', true );
            $precio = ($meta_key == 'wpfunos_servicio'.$tipo) ? $_meta_value : get_post_meta( $object_id, 'wpfunos_servicio'.$tipo, true ) ;
            $resp1 = (substr ($tipo,0,1) == 'E') ? '1' : '2';
            $resp3 = (substr ($tipo,2,1) == 'V') ? '1' : '2';
            switch( substr ($tipo,1,1) ){ case 'M':$resp2 = '1';break; case 'E':$resp2 = '2';break; case 'P':$resp2 = '3';break; }
            switch( substr ($tipo,3,1) ){ case 'S':$resp4 = '1';break; case 'O':$resp4 = '2';break; case 'C':$resp4 = '3';break; case 'R':$resp4 = '4';break; }

            $args = array(
              'post_type' => 'precio_serv_wpfunos',
              'post_status'  => 'publish',
              'posts_per_page' => -1,
              'meta_query' => array(
                'relation' => 'AND',
                array( 'key' => 'wpfunos_servicioPrecioID', 'value' => $object_id, 'compare' => '=', ),
                array( 'key' => 'resp1', 'value' => $resp1, 'compare' => '=', ),
                array( 'key' => 'resp2', 'value' => $resp2, 'compare' => '=', ),
                array( 'key' => 'resp3', 'value' => $resp3, 'compare' => '=', ),
                array( 'key' => 'resp4', 'value' => $resp4, 'compare' => '=', ),
              ),
            );
            $post_list = get_posts( $args );
            if( strlen ($precio) > 0 ){
              if( $post_list ){
                // Update
                foreach ( $post_list as $post ) {
                  $this->custom_logs('update indice: ' .$post->ID. ' nombre: ' .$nombre_titulo. ' precio: ' .$precio);
                  $post_update = array(
                    'ID'         => $post->ID,
                    'post_title' => $nombre_titulo,
                    'meta_input'   => array(
                      'wpfunos_servicioPrecio' => $precio,
                    ),
                  );
                  wp_update_post( $post_update );
                }// END foreach
              }else{
                // Create
                $this->custom_logs('create indice: ' .$nombre_titulo);

                $my_post = array(
                  'post_title' => $nombre_titulo,
                  'post_type' => 'precio_serv_wpfunos',
                  'post_status'  => 'publish',
                  'meta_input'   => array(
                    'wpfunos_servicioPrecioValor' =>  $tipo,
                    'wpfunos_servicioPrecioID' => $object_id,
                    'wpfunos_servicioPrecioNombre' => $nombre_servicio,
                    'wpfunos_servicioPrecio' => $precio,
                    'resp1' => $resp1, 'resp2' => $resp2, 'resp3' => $resp3, 'resp4' => $resp4,
                  ),
                );

                $insertpost_id = wp_insert_post($my_post);
                gmw_update_post_location( $insertpost_id, $direccion, 7, $direccion, true );
              }
            }else{
              //tiene precio NULL. Si existe el índice borrarlo
              // Borrar
              if( $post_list ){
                foreach ( $post_list as $post ) {
                  $this->custom_logs('borrar indice: ' .$post->ID );
                  wp_delete_post( $post->ID, true);
                }// END foreach
              }
              // END tiene precio NULL. Si existe el índice borrarlo
            }// END if( strlen ($precio) > 0 )
          }elseif( $meta_key == 'wpfunos_servicio'.$tipo.'_bloqueo' && $_meta_value == '0' ){
            $this->custom_logs('Desbloquear ' .$meta_key );

          }// END if( get_post_meta( $object_id, 'wpfunos_servicio'.$tipo.'_bloqueo', true) == '1'  && get_post_meta( $object_id, 'wpfunos_servicioActivo', true ) == 1 )

        }// END if( $meta_key == 'wpfunos_servicio'.$tipo )
      }// END foreach
      $this->custom_logs('wpfunosActualizarMetaServicios ENDS' );
      $this->custom_logs('---');
    }
  }

  /**
  *
  * add_action('save_post_precio_funer_wpfunos', array( $this, 'wpfunosGuardarLanding' ), 10, 1 );
  *
  */
  public function wpfunosGuardarLanding( $post_id ){
    $this->custom_logs('wpfunosGuardarLanding' );
    $this->custom_logs('$post_id: ' .$post_id );
    $languages = apply_filters( 'wpml_active_languages', NULL, array( 'skip_missing' => 1,) );
    if( !empty( $languages ) ) {
      foreach( $languages as $language ){
        $wpml_id = apply_filters( 'wpml_object_id', $post_id, 'post', FALSE, $language[language_code] );
        if( $wpml_id ){

          $wpml_id_orig = apply_filters( 'wpml_object_id', $post_id, 'post', FALSE, 'es' );
          if( $wpml_id != $wpml_id_orig ){
            update_post_meta( $wpml_id, 'wpfunos_precioFunerariaEntierroDesde', get_post_meta( $wpml_id_orig, 'wpfunos_precioFunerariaEntierroDesde', true )  );
            update_post_meta( $wpml_id, 'wpfunos_precioFunerariaIncineracionDesde', get_post_meta( $wpml_id_orig, 'wpfunos_precioFunerariaIncineracionDesde', true )  );
            update_post_meta( $wpml_id, 'wpfunos_precioFunerariaEntierroVelatorioDesde', get_post_meta( $wpml_id_orig, 'wpfunos_precioFunerariaEntierroVelatorioDesde', true )  );
            update_post_meta( $wpml_id, 'wpfunos_precioFunerariaIncineracionVelatorioDesde', get_post_meta( $wpml_id_orig, 'wpfunos_precioFunerariaIncineracionVelatorioDesde', true )  );
            update_post_meta( $wpml_id, 'wpfunos_precioFunerariaEntierroVelatorioCeremoniaDesde', get_post_meta( $wpml_id_orig, 'wpfunos_precioFunerariaEntierroVelatorioCeremoniaDesde', true )  );
            update_post_meta( $wpml_id, 'wpfunos_precioFunerariaIncineracionVelatorioCeremoniaDesde', get_post_meta( $wpml_id_orig, 'wpfunos_precioFunerariaIncineracionVelatorioCeremoniaDesde', true )  );
            update_post_meta( $wpml_id, 'wpfunos_precioFunerariaEntierroPremiumDesde', get_post_meta( $wpml_id_orig, 'wpfunos_precioFunerariaEntierroPremiumDesde', true )  );
            update_post_meta( $wpml_id, 'wpfunos_precioFunerariaIncineracionPremiumDesde', get_post_meta( $wpml_id_orig, 'wpfunos_precioFunerariaIncineracionPremiumDesde', true )  );
            //
            update_post_meta( $wpml_id, 'wpfunos_precioIncineracionBasicoDesde', get_post_meta( $wpml_id_orig, 'wpfunos_precioIncineracionBasicoDesde', true )  );
            update_post_meta( $wpml_id, 'wpfunos_precioIncineracionCeremoniaDesde', get_post_meta( $wpml_id_orig, 'wpfunos_precioIncineracionCeremoniaDesde', true )  );
            update_post_meta( $wpml_id, 'wpfunos_precioIncineracionVelatorioDesde', get_post_meta( $wpml_id_orig, 'wpfunos_precioIncineracionVelatorioDesde', true )  );
            //
            update_post_meta( $wpml_id, 'wpfunos_EnlaceDistancia', get_post_meta( $wpml_id_orig, 'wpfunos_EnlaceDistancia', true )  );
            update_post_meta( $wpml_id, 'wpfunos_EnlaceLatitud', get_post_meta( $wpml_id_orig, 'wpfunos_EnlaceLatitud', true )  );
            update_post_meta( $wpml_id, 'wpfunos_EnlaceLonguitud', get_post_meta( $wpml_id_orig, 'wpfunos_EnlaceLonguitud', true )  );
          }

          $entierro = (int)str_replace(".","",get_post_meta( $wpml_id, 'wpfunos_precioFunerariaEntierroDesde', true ));
          $incineracion = (int)str_replace(".","",get_post_meta( $wpml_id, 'wpfunos_precioFunerariaIncineracionDesde', true ));
          $this->custom_logs('$entierro desde: ' .$entierro );
          $this->custom_logs('$incineracion desde: ' .$incineracion );
          //landings incineración
          update_post_meta($wpml_id, 'SeoEntierro',  number_format($entierro, 0, ',', '.') . '€');
          update_post_meta($wpml_id, 'SeoIncineracion', number_format($incineracion, 0, ',', '.') . '€');
          if($entierro < $incineracion ){
            update_post_meta($wpml_id, 'SeoDesde',  number_format($entierro, 0, ',', '.') . '€');
          }else{
            update_post_meta($wpml_id, 'SeoDesde',  number_format($incineracion, 0, ',', '.') . '€');
          }
          if( get_post_meta( $wpml_id, 'SeoDesde', true ) == '0€') update_post_meta($wpml_id, 'SeoDesde',  number_format($incineracion, 0, ',', '.') . '€');
          // Páginas relacionadas
          $paginas = (explode(',',get_post_meta( $wpml_id , 'wpfunos_precioFunerariaPaginasRelacionadas', true )));
          $textopaginas = '';
          foreach( $paginas as $pagina ){
            if( get_post_type( $pagina ) == 'precio_funer_wpfunos'){
              $entrada = get_post( $pagina );
              $slug = $entrada->post_name;
              $textopaginas .= $slug . ', ';
            }
          }
          update_post_meta($wpml_id, 'wpfunos_precioFunerariaPaginasRelacionadasTexto', $textopaginas );
          //
          $this->custom_logs('wpfunosGuardarLanding ' .$wpml_id. ' (' .$language[language_code]. ') updated');
          //
        }
      }
    }
    $this->custom_logs('wpfunosGuardarLanding ENDS' );
    $this->custom_logs('---');
  }

  /**
  *
  * add_action('updated_post_meta', array( $this, 'wpfunosActualizarMetaLandings' ), 10, 4);
  *
  */
  public function wpfunosActualizarMetaLandings( $meta_id, $object_id, $meta_key, $_meta_value ){
    /**
    * #22-Mar-2023 12:22:29: $meta_id: 1744364
    * #22-Mar-2023 12:22:29: $object_id: 139415
    * #22-Mar-2023 12:22:29: $meta_key: wpfunos_EnlaceDistancia
    * #22-Mar-2023 12:22:29: $_meta_value: 40
    * #22-Mar-2023 12:22:29: CPT: precio_funer_wpfunos
    * #22-Mar-2023 12:22:29: $_SERVER[REQUEST_URI]: /wp-admin/admin-ajax.php
    * #22-Mar-2023 12:22:29: $_SERVER[HTTP_REFERER]: https://dev.funos.es/wp-admin/edit.php?post_type=precio_funer_wpfunos
    */
    if( strpos( $_SERVER['HTTP_REFERER'], '/wp-admin/edit.php?post_type=precio_funer_wpfunos' ) && $_SERVER['REQUEST_URI'] == '/wp-admin/admin-ajax.php' && get_post_type( $object_id ) == 'precio_funer_wpfunos') {

      remove_action( 'updated_post_meta', array( $this, 'wpfunosActualizarMetaLandings' ) );

      $this->custom_logs('wpfunosActualizarMetaLandings' );
      $this->custom_logs('$meta_id: ' .$meta_id );
      $this->custom_logs('$object_id: ' .$object_id );
      $this->custom_logs('$meta_key: ' .$meta_key );
      $this->custom_logs('$_meta_value: ' .$_meta_value );
      $this->custom_logs('CPT: ' .get_post_type( $object_id ) );
      //$this->custom_logs('$_SERVER[REQUEST_URI]: ' .$_SERVER['REQUEST_URI'] );
      //$this->custom_logs('$_SERVER[HTTP_REFERER]: ' .$_SERVER['HTTP_REFERER'] );
      $this->custom_logs('---');

      $this->wpfunosGuardarLanding( $object_id );

      $distancia = get_post_meta( $object_id, 'wpfunos_EnlaceDistancia', true );
      $latitud = get_post_meta( $object_id, 'wpfunos_EnlaceLatitud', true );
      $longitud = get_post_meta( $object_id, 'wpfunos_EnlaceLonguitud', true );
      $poblacion = get_post_meta( $object_id, 'wpfunos_precioFunerariaPoblacion', true );
      $provincia = get_post_meta( $object_id, 'wpfunos_precioFunerariaProvincia', true );

      $languages = apply_filters( 'wpml_active_languages', NULL, array( 'skip_missing' => 1,) );
      if( !empty( $languages ) ) {
        foreach( $languages as $language ){
          $wpml_id = apply_filters( 'wpml_object_id', $object_id, 'post', FALSE, $language[language_code] );
          if( $wpml_id ){
            $prefijo = ( $language[language_code] == 'es' ) ? '' :  $language[language_code].'/' ;
            do_action('wpfunos_enlaces_landings', array( $prefijo, $provincia, $distancia, $latitud, $longitud, $poblacion, $wpml_id ) );
            $this->custom_logs('wpfunos_enlaces_landings ' .$wpml_id. ' (' .$language[language_code]. ') updated');
          }
        }
      }
      add_action('updated_post_meta', array( $this, 'wpfunosActualizarMetaLandings' ), 10, 4);
      $this->custom_logs('wpfunosActualizarMetaLandings ENDS' );
      $this->custom_logs('---');
    }
  }

  /** **/
  /** **/
  /** **/

  /**
  *
  * Utilities
  *
  */

  /**
  * Utility: create entry in the log file.
  */
  private function custom_logs($message){
    $upload_dir = wp_upload_dir();
    if (is_array($message)) {
      $message = json_encode($message);
    }
    if (!file_exists( $upload_dir['basedir'] . '/wpfunos-logs') ) {
      mkdir( $upload_dir['basedir'] . '/wpfunos-logs' );
    }
    $time = current_time("d-M-Y H:i:s");
    $ban = "#$time: $message\r\n";
    $file = $upload_dir['basedir'] . '/wpfunos-logs/wpfunos-adminlog-' . current_time("Y-m-d") . '.log';
    $open = fopen($file, "a");
    fputs($open, $ban);
    fclose( $open );
  }


}
