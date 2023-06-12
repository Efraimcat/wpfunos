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

class Wpfunos_Admin_Cronjobs extends Wpfunos_Admin {

  public function __construct( ) {

  }

  /**
  * Cron job maintenance tasks.
  */
  public function wpfunosMaintenance(){
    $this->wpfunosMaintenanceLogRotate();
    $this->wpfunosMaintenanceUsuariosCSV();
    return;
  }

  /**
  * Cron job Next maintenance tasks.
  */
  public function wpfunosNextMaintenance(){

    return;
  }

  /**
  * Cron job hourly maintenance tasks.
  */
  public function wpfunosHourlyMaintenance(){
    $this->wpfunosMaintenancePreciosv1Preciosv2();
    $this->wpfunosMaintenanceAcutalizarIndices();
    return;
  }

  /**
  * Cron job 10 min maintenance tasks.
  */
  public function wpfunos10mMaintenance(){
    $this->wpfunosMaintenanceHourly2FA();
    $this->wpfunosMaintenanceDatabase();
    $this->wpfunosMaintenanceLlenarMasterDatos();
    $this->wpfunosMaintenanceEliminarIndices();
    $this->wpfunosMaintenancePreciosSeoFunerarias();// WPML
    $this->wpfunosMaintenanceEnlacesLandingsDinamicas();// WPML
    return;
  }

  /** **/
  /** **/

  /**
  *
  * wpfunosMaintenanceDatabase
  * wpfunosMaintenanceAcutalizarIndices
  * wpfunosMaintenanceEliminarIndices
  * wpfunosMaintenancePreciosv1Preciosv2
  * wpfunosMaintenanceLlenarMasterDatos
  * wpfunosMaintenanceLogRotate
  * wpfunosMaintenanceUsuariosCSV
  * wpfunosMaintenanceHourly2FA
  * wpfunosMaintenancePreciosSeoFunerarias // WPML
  * wpfunosMaintenanceEnlacesLandingsDinamicas // WPML
  *
  **/

  /**
  * Cron job maintenance Base de datos
  */
  public function wpfunosMaintenanceDatabase(){
    $this->custom_logs('Wpfunos Database');
    $timeFirst  = strtotime('now');

    $this->custom_logs('Database: ' .WPFUNOS_DB_VERSION. ' actual: ' .get_option( "wpf_db_version" ) );
    if ( get_option( "wpf_db_version" ) != WPFUNOS_DB_VERSION ) {
      $this->custom_logs('Database: Updating DB ' .get_option( "wpf_db_version" ). ' a ' .WPFUNOS_DB_VERSION );
      global $wpdb;
      $table_name = $wpdb->prefix . 'wpf_visitas';
      $charset_collate = $wpdb->get_charset_collate();

      $sqlvisitas = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
        version tinytext DEFAULT '' NOT NULL,
        tipo tinytext DEFAULT '' NOT NULL,
        wpfn tinytext DEFAULT '' NOT NULL,
        wpfe tinytext DEFAULT '' NOT NULL,
        wpft tinytext DEFAULT '' NOT NULL,
        nombre tinytext DEFAULT '' NOT NULL,
        email tinytext DEFAULT '' NOT NULL,
        telefono tinytext DEFAULT '' NOT NULL,
        ip tinytext DEFAULT '' NOT NULL,
        referer varchar(250) DEFAULT '' NOT NULL,
        mobile tinytext DEFAULT '' NOT NULL,
        logged tinytext DEFAULT '' NOT NULL,
        wpfresp1 tinytext DEFAULT '' NOT NULL,
        wpfresp2 tinytext DEFAULT '' NOT NULL,
        wpfresp3 tinytext DEFAULT '' NOT NULL,
        wpfresp4 tinytext DEFAULT '' NOT NULL,
        postID tinytext DEFAULT '' NOT NULL,
        servicio tinytext DEFAULT '' NOT NULL,
        poblacion varchar(50) DEFAULT '' NOT NULL,
        nacimiento tinytext DEFAULT '' NOT NULL,
        cuando tinytext DEFAULT '' NOT NULL,
        cp tinytext DEFAULT '' NOT NULL,
        contador int(10),
        wpfads varchar(10) DEFAULT '' NOT NULL,
        wpfana varchar(10) DEFAULT '' NOT NULL,
        wpffun varchar(10) DEFAULT '' NOT NULL,
        wpfnec varchar(10) DEFAULT '' NOT NULL,
        wpfnon varchar(10) DEFAULT '' NOT NULL,
        wpfoth varchar(10) DEFAULT '' NOT NULL,
        wpfper varchar(10) DEFAULT '' NOT NULL,
        hutk varchar(50) DEFAULT '' NOT NULL,
        PRIMARY KEY  (id)
      );";

      $table_name = $wpdb->prefix . 'wpf_defunciones';
      $sqldefunciones = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
        nombre varchar(250) DEFAULT '' NOT NULL,
        defuncion datetime DEFAULT '2022-01-01 00:00:00' NOT NULL,
        velatorio varchar(250) DEFAULT 'Desconocido' NOT NULL,
        velatorio_inicio datetime DEFAULT '2022-01-01 00:00:00' NOT NULL,
        velatorio_final datetime DEFAULT '2022-01-01 00:00:00' NOT NULL,
        ceremonia varchar(250) DEFAULT 'Desconocido' NOT NULL,
        ceremonia_fecha datetime DEFAULT '2022-01-01 00:00:00' NOT NULL,
        PRIMARY KEY  (id)
      );";

      $table_name = $wpdb->prefix . 'wpf_masterdatos';
      $sqlmasterdatos = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
        idrefencia tinytext DEFAULT '' NOT NULL,
        nombre varchar(250) DEFAULT '' NOT NULL,
        tipo tinytext DEFAULT '' NOT NULL,
        latitud tinytext DEFAULT '' NOT NULL,
        longitud tinytext DEFAULT '' NOT NULL,
        distancia tinytext DEFAULT '' NOT NULL,
        preciobase tinytext DEFAULT '' NOT NULL,
        precioincineracion tinytext DEFAULT '' NOT NULL,
        precioentierro tinytext DEFAULT '' NOT NULL,
        precioataudeco tinytext DEFAULT '' NOT NULL,
        precioataudmed tinytext DEFAULT '' NOT NULL,
        precioataudpre tinytext DEFAULT '' NOT NULL,
        preciovelsi tinytext DEFAULT '' NOT NULL,
        preciovelno tinytext DEFAULT '' NOT NULL,
        preciocersol tinytext DEFAULT '' NOT NULL,
        preciocerciv tinytext DEFAULT '' NOT NULL,
        preciocerrel tinytext DEFAULT '' NOT NULL,
        incinc  tinytext DEFAULT '' NOT NULL,
        incvel tinytext DEFAULT '' NOT NULL,
        incvelcer tinytext DEFAULT '' NOT NULL,
        incpremium tinytext DEFAULT '' NOT NULL,
        entent  tinytext DEFAULT '' NOT NULL,
        entvel tinytext DEFAULT '' NOT NULL,
        entvelcer tinytext DEFAULT '' NOT NULL,
        entpremium tinytext DEFAULT '' NOT NULL,
        EESS tinytext DEFAULT '' NOT NULL,
        EESO tinytext DEFAULT '' NOT NULL,
        EESC tinytext DEFAULT '' NOT NULL,
        EESR tinytext DEFAULT '' NOT NULL,
        EEVS tinytext DEFAULT '' NOT NULL,
        EEVO tinytext DEFAULT '' NOT NULL,
        EEVC tinytext DEFAULT '' NOT NULL,
        EEVR tinytext DEFAULT '' NOT NULL,
        EMSS tinytext DEFAULT '' NOT NULL,
        EMSO tinytext DEFAULT '' NOT NULL,
        EMSC tinytext DEFAULT '' NOT NULL,
        EMSR tinytext DEFAULT '' NOT NULL,
        EMVS tinytext DEFAULT '' NOT NULL,
        EMVO tinytext DEFAULT '' NOT NULL,
        EMVC tinytext DEFAULT '' NOT NULL,
        EMVR tinytext DEFAULT '' NOT NULL,
        EPSS tinytext DEFAULT '' NOT NULL,
        EPSO tinytext DEFAULT '' NOT NULL,
        EPSC tinytext DEFAULT '' NOT NULL,
        EPSR tinytext DEFAULT '' NOT NULL,
        EPVS tinytext DEFAULT '' NOT NULL,
        EPVO tinytext DEFAULT '' NOT NULL,
        EPVC tinytext DEFAULT '' NOT NULL,
        EPVR tinytext DEFAULT '' NOT NULL,
        IESS tinytext DEFAULT '' NOT NULL,
        IESO tinytext DEFAULT '' NOT NULL,
        IESC tinytext DEFAULT '' NOT NULL,
        IESR tinytext DEFAULT '' NOT NULL,
        IEVS tinytext DEFAULT '' NOT NULL,
        IEVO tinytext DEFAULT '' NOT NULL,
        IEVC tinytext DEFAULT '' NOT NULL,
        IEVR tinytext DEFAULT '' NOT NULL,
        IMSS tinytext DEFAULT '' NOT NULL,
        IMSO tinytext DEFAULT '' NOT NULL,
        IMSC tinytext DEFAULT '' NOT NULL,
        IMSR tinytext DEFAULT '' NOT NULL,
        IMVS tinytext DEFAULT '' NOT NULL,
        IMVO tinytext DEFAULT '' NOT NULL,
        IMVC tinytext DEFAULT '' NOT NULL,
        IMVR tinytext DEFAULT '' NOT NULL,
        IPSS tinytext DEFAULT '' NOT NULL,
        IPSO tinytext DEFAULT '' NOT NULL,
        IPSC tinytext DEFAULT '' NOT NULL,
        IPSR tinytext DEFAULT '' NOT NULL,
        IPVS tinytext DEFAULT '' NOT NULL,
        IPVO tinytext DEFAULT '' NOT NULL,
        IPVC tinytext DEFAULT '' NOT NULL,
        IPVR tinytext DEFAULT '' NOT NULL,
        PRIMARY KEY  (id)
      );";

      $table_name = $wpdb->prefix . 'wpf_hubspotusers';
      $sqlhubspotusers = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
        ultima datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
        email tinytext DEFAULT '' NOT NULL,
        ip tinytext DEFAULT '' NOT NULL,
        hubspotutk tinytext DEFAULT '' NOT NULL,
        referencias mediumtext DEFAULT '' NOT NULL,
        PRIMARY KEY  (id)
      );";

      require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
      dbDelta( $sqlvisitas );
      dbDelta( $sqldefunciones );
      dbDelta( $sqlmasterdatos );
      dbDelta( $sqlhubspotusers );
      update_option( "wpf_db_version", WPFUNOS_DB_VERSION );
    }
    $this->custom_logs('Wpfunos Database ENDS' );
    $total = strtotime('now') - $timeFirst ;
    $this->custom_logs('--- ' .$total.' sec.');
  }

  /**
  * Cron job maintenance Acutalizar Indices Servicios
  */
  public function wpfunosMaintenanceAcutalizarIndices(){
    $this->custom_logs('Wpfunos Acutalizar Indices');
    $timeFirst  = strtotime('now');

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
      'meta_query' => array(
        array( 'key' => 'wpfunos_servicioActivo', 'value' => '1', 'compare' => '=', ),
      ),
    );
    $servicios_list = get_posts( $args );
    if( $servicios_list ){
      foreach ( $servicios_list as $servicio ) {
        $nombre_servicio = get_the_title( $servicio->ID );
        $titulo_servicio = get_post_meta( $servicio->ID, 'wpfunos_servicioNombre', true );
        $direccion_servicio = get_post_meta( $servicio->ID, 'wpfunos_servicioDireccion', true );

        foreach ( $tipos as $tipo ) {

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
              array( 'key' => 'wpfunos_servicioPrecioID', 'value' => $servicio->ID, 'compare' => '=', ),
              array( 'key' => 'resp1', 'value' => $resp1, 'compare' => '=', ),
              array( 'key' => 'resp2', 'value' => $resp2, 'compare' => '=', ),
              array( 'key' => 'resp3', 'value' => $resp3, 'compare' => '=', ),
              array( 'key' => 'resp4', 'value' => $resp4, 'compare' => '=', ),
            ),
          );
          $indices_list = get_posts( $args );

          $precio_tipo = get_post_meta( $servicio->ID, 'wpfunos_servicio'.$tipo, true );

          if( strlen ( $precio_tipo ) > 0 ){

            if( $indices_list ){ // Ya existe el índice: Update
              foreach ( $indices_list as $indice ) {
                $post_update = array(
                  'ID'         => $indice->ID,
                  'post_title' => $nombre_servicio,
                  'meta_input'   => array(
                    'wpfunos_servicioPrecio' => $precio_tipo,
                  ),
                );
                wp_update_post( $post_update );
              }
            }else{ // No existe el índice: Create
              $my_post = array(
                'post_title' => $nombre_servicio,
                'post_type' => 'precio_serv_wpfunos',
                'post_status'  => 'publish',
                'meta_input'   => array(
                  'wpfunos_servicioPrecioValor' =>  $tipo,
                  'wpfunos_servicioPrecioID' => $servicio->ID,
                  'wpfunos_servicioPrecioNombre' => $nombre_servicio,
                  'wpfunos_servicioPrecio' => $precio_tipo,
                  'resp1' => $resp1, 'resp2' => $resp2, 'resp3' => $resp3, 'resp4' => $resp4,
                ),
              );
              $newpost_id = wp_insert_post($my_post);
              $this->custom_logs('Crear índice: ' .$nombre_servicio. ' (' .$servicio->ID. ') => ' .$newpost_id );
              gmw_update_post_location( $newpost_id, $direccion_servicion, 7, $direccion_servicio, true );
            }
          }else{ //strlen ( $precio_tipo ) == 0 NO tiene precio. Borrar el ínidice si existe
            if( $indices_list ){
              foreach ( $indices_list as $indice ) {
                $this->custom_logs('Eliminar índice ' .$nombre_servicio. ' (' .$servicio->ID. ') => ' .$indice->ID. ' <==' );
                wp_delete_post( $indice->ID, true);
              }// END foreach ( $indices_list as $indice )
            }// END if( $indices_list )
          }// END if( strlen ( $precio_tipo ) > 0 )
        }// END foreach ( $tipos as $tipo )
      }// END foreach ( $servicios_list as $servicio )
    }// END if( $servicios_list )
    $this->custom_logs('Wpfunos Acutalizar Indices ends');
    $total = strtotime('now') - $timeFirst ;
    $this->custom_logs('--- ' .$total.' sec.');
  }

  /**
  * Cron job maintenance Eliminar Indices Servicios
  */
  public function wpfunosMaintenanceEliminarIndices(){
    $this->custom_logs('Wpfunos Eliminar Indices');
    $timeFirst  = strtotime('now');

    $args = array(
      'post_type' => 'precio_serv_wpfunos',
      'post_status' => 'publish',
      'posts_per_page' => -1,
    );
    $indices_list = get_posts( $args );
    if( $indices_list ){
      foreach ( $indices_list as $indice ) {
        $servicioPrecioID = get_post_meta( $indice->ID, 'wpfunos_servicioPrecioID', true );
        if( FALSE === get_post_status( $servicioPrecioID ) || get_post_meta( $servicioPrecioID, 'wpfunos_servicioActivo', true ) != '1' ){
          $this->custom_logs('wpfunosMaintenanceEliminarIndices: ' .get_the_title( $indice->ID ). ' (' .$servicioPrecioID. ') ==> Elimnar ' .$indice->ID. ' <==' );
          wp_delete_post( $indice->ID, true);
        }
      }
    }
    $this->custom_logs('Wpfunos Eliminar Indices ends');
    $total = strtotime('now') - $timeFirst ;
    $this->custom_logs('--- ' .$total.' sec.');
  }

  /**
  * Cron job maintenance precios v1 -> v2
  */
  public function wpfunosMaintenancePreciosv1Preciosv2(){
    $this->custom_logs('Wpfunos Actualizando registros Preciosv1Preciosv2 starts');
    $timeFirst  = strtotime('now');

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
      'posts_per_page' => -1,
    );
    $contador=0;
    $contadorTrue=0;
    $post_list = get_posts( $args );
    $this->custom_logs('Wpfunos services: ' .count($post_list)  );
    if( $post_list ){
      foreach ( $post_list as $post ) {
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
          //
          //echo 'Servicio: ' .$post->ID. ' Tipo: ' .$key. ' Valores: ' .$valor[1]. '|' .$valor[2]. '|' .$valor[3]. '|' .$valor[4]. ' => '
          // .$precio[0]. '-'.$precio[ (int)$valor[1] ]. '-' .$precio[ (int)$valor[2] ]. '-' .$precio[ (int)$valor[3] ]. '-' .$precio[ (int)$valor[4] ]. '<br/>';

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

        }

      }
      wp_reset_postdata();
    }
    $this->custom_logs('Wpfunos Actualizando registros Preciosv1Preciosv2 ends');
    $total = strtotime('now') - $timeFirst ;
    $this->custom_logs('--- ' .$total.' sec.');
  }

  /**
  * Cron job Precios funerarias
  *
  * TIPO:
  *   1 => servicio
  *   2 => landingpoblacion
  */
  public function wpfunosMaintenanceLlenarMasterDatos(){
    $this->custom_logs('Wpfunos Llenar Master Datos starts');
    $timeFirst  = strtotime('now');

    global $wpdb;
    $table_name = $wpdb->prefix . 'wpf_masterdatos';
    $creados = 0;
    $actualizados = 0;

    $args = array(
      'post_type' => 'servicios_wpfunos',
      'post_status' => 'publish',
      'posts_per_page' => -1,
    );
    $post_list = get_posts( $args );

    if( $post_list ){
      foreach ( $post_list as $post ){
        //$masterdatos = $wpdb->get_results( $wpdb->prepare("SELECT * FROM $table_name WHERE idrefencia = %s", $post->ID ), ARRAY_A);
        //if( !$masterdatos ){
        $nombre = get_post_meta( $post->ID, 'wpfunos_servicioNombre', true );
        $preciobase = get_post_meta( $post->ID, 'wpfunos_servicioPrecioBase', true );
        $precioincineracion = get_post_meta( $post->ID, 'wpfunos_servicioDestino_2Precio', true );
        $precioentierro = get_post_meta( $post->ID, 'wpfunos_servicioDestino_1Precio', true );
        $precioataudeco = get_post_meta( $post->ID, 'wpfunos_servicioAtaudEcologico_1Precio', true );
        $precioataudmed = get_post_meta( $post->ID, 'wpfunos_servicioAtaudEcologico_2Precio', true );
        $precioataudpre = get_post_meta( $post->ID, 'wpfunos_servicioAtaudEcologico_3Precio', true );
        $preciovelsi = get_post_meta( $post->ID, 'wpfunos_servicioVelatorioPrecio', true );
        $preciovelno = get_post_meta( $post->ID, 'wpfunos_servicioVelatorioNoPrecio', true );
        $preciocersol = get_post_meta( $post->ID, 'wpfunos_servicioDespedida_1Precio', true );
        $preciocerciv = get_post_meta( $post->ID, 'wpfunos_servicioDespedida_2Precio', true );
        $preciocerrel = get_post_meta( $post->ID, 'wpfunos_servicioDespedida_3Precio', true );

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
          //$EESS = get_post_meta( $post->ID, 'wpfunos_servicioEESS', true );
          ${"$tipo"} =  get_post_meta( $post->ID, 'wpfunos_servicio'.$tipo, true );
        }

        $data = array(
          'time' => current_time( 'mysql' ),
          'idrefencia' => $post->ID,
          'nombre' => $nombre,
          'tipo' => '1',
          'preciobase' => $preciobase,
          'precioincineracion' => $precioincineracion,
          'precioentierro' => $precioentierro,
          'precioataudeco' => $precioataudeco,
          'precioataudmed' => $precioataudmed,
          'precioataudpre' => $precioataudpre,
          'preciovelsi' => $preciovelsi,
          'preciovelno' => $preciovelno,
          'preciocersol' => $preciocersol,
          'preciocerciv' => $preciocerciv,
          'preciocerrel' => $preciocerrel,
          'EESS' => $EESS,
          'EESO' => $EESO,
          'EESC' => $EESC,
          'EESR' => $EESR,
          'EEVS' => $EEVS,
          'EEVO' => $EEVO,
          'EEVC' => $EEVC,
          'EEVR' => $EEVR,
          'EMSS' => $EMSS,
          'EMSO' => $EMSO,
          'EMSC' => $EMSC,
          'EMSR' => $EMSR,
          'EMVS' => $EMVS,
          'EMVO' => $EMVO,
          'EMVC' => $EMVC,
          'EMVR' => $EMVR,
          'EPSS' => $EPSS,
          'EPSO' => $EPSO,
          'EPSC' => $EPSC,
          'EPSR' => $EPSR,
          'EPVS' => $EPVS,
          'EPVO' => $EPVO,
          'EPVC' => $EPVC,
          'EPVR' => $EPVR,
          'IESS' => $IESS,
          'IESO' => $IESO,
          'IESC' => $IESC,
          'IESR' => $IESR,
          'IEVS' => $IEVS,
          'IEVO' => $IEVO,
          'IEVC' => $IEVC,
          'IEVR' => $IEVR,
          'IMSS' => $IMSS,
          'IMSO' => $IMSO,
          'IMSC' => $IMSC,
          'IMSR' => $IMSR,
          'IMVS' => $IMVS,
          'IMVO' => $IMVO,
          'IMVC' => $IMVC,
          'IMVR' => $IMVR,
          'IPSS' => $IPSS,
          'IPSO' => $IPSO,
          'IPSC' => $IPSC,
          'IPSR' => $IPSR,
          'IPVS' => $IPVS,
          'IPVO' => $IPVO,
          'IPVC' => $IPVC,
          'IPVR' => $IPVR,
        );

        $masterdatos = $wpdb->get_results( $wpdb->prepare("SELECT * FROM $table_name WHERE idrefencia = %s", $post->ID ), ARRAY_A);
        if ( $wpdb->last_error ) {
          $this->custom_logs('wpdb error: '.$wpdb->last_error );
        }
        if( !$masterdatos ){
          $creados+=1;
          $wpdb->insert( $table_name, $data );
        }else{
          $actualizados+=1;
          foreach($masterdatos as $datos ){
            $wpdb->update( $table_name, $data, array('id'=>$datos['id']) );
          }
        }
      }
    }
    $args = array(
      'post_type' => 'precio_funer_wpfunos',
      'post_status' => 'publish',
      'posts_per_page' => -1,
    );
    $post_list = get_posts( $args );
    if( $post_list ){
      foreach ( $post_list as $post ){
        $nombre =     get_the_title( $post->ID );
        $incinc =     get_post_meta( $post->ID, 'wpfunos_precioFunerariaIncineracionDesde', true );
        $incvel =     get_post_meta( $post->ID, 'wpfunos_precioFunerariaIncineracionVelatorioDesde', true );
        $incvelcer =  get_post_meta( $post->ID, 'wpfunos_precioFunerariaIncineracionVelatorioCeremoniaDesde', true );
        $incpremium = get_post_meta( $post->ID, 'wpfunos_precioFunerariaIncineracionPremiumDesde', true );
        $entent =     get_post_meta( $post->ID, 'wpfunos_precioFunerariaEntierroDesde', true );
        $entvel =     get_post_meta( $post->ID, 'wpfunos_precioFunerariaEntierroVelatorioDesde', true );
        $entvelcer =  get_post_meta( $post->ID, 'wpfunos_precioFunerariaEntierroVelatorioCeremoniaDesde', true );
        $entpremium = get_post_meta( $post->ID, 'wpfunos_precioFunerariaEntierroPremiumDesde', true );
        $latitud =    get_post_meta( $post->ID, 'wpfunos_EnlaceLatitud', true );
        $longitud =   get_post_meta( $post->ID, 'wpfunos_EnlaceLonguitud', true );
        $distancia =  get_post_meta( $post->ID, 'wpfunos_EnlaceDistancia', true );

        $data = array(
          'time' => current_time( 'mysql' ),
          'idrefencia' => $post->ID,
          'nombre' => $nombre,
          'tipo' => '2',
          'incinc' => $incinc,
          'incvel' => $incvel,
          'incvelcer' => $incvelcer,
          'incpremium' => $incpremium,
          'entent' => $entent,
          'entvel' => $entvel,
          'entvelcer' => $entvelcer,
          'entpremium' => $entpremium,
          'latitud' => $latitud,
          'longitud' => $longitud,
          'distancia' => $distancia,
        );

        $masterdatos = $wpdb->get_results( $wpdb->prepare("SELECT * FROM $table_name WHERE idrefencia = %s", $post->ID ), ARRAY_A);
        if ( $wpdb->last_error ) {
          $this->custom_logs('wpdb error: '.$wpdb->last_error );
        }
        if( !$masterdatos ){
          $creados+=1;
          $wpdb->insert( $table_name, $data );
        }else{
          $actualizados+=1;
          foreach($masterdatos as $datos ){
            $wpdb->update( $table_name, $data, array('id'=>$datos['id']) );
          }
        }
      }

    }
    $this->custom_logs('Wpfunos Llenar Master Datos Creados: '.$creados );
    $this->custom_logs('Wpfunos Llenar Master Datos Actualizados: '.$actualizados );
    $this->custom_logs('Wpfunos Llenar Master Datos ends');
    $total = strtotime('now') - $timeFirst ;
    $this->custom_logs('--- ' .$total.' sec.');
  }

  /**
  * Cron job maintenance log rotate
  */
  public function wpfunosMaintenanceLogRotate(){
    $upload_dir = wp_upload_dir();
    $files = scandir( $upload_dir['basedir'] . '/' . 'wpfunos-logs' );
    foreach ($files as $file) {
      if (substr($file, - 4) == '.log') {
        $this->custom_logs('Logfile: ' . $file . ' -> ' . date("d-m-Y H:i:s", filemtime( $upload_dir['basedir'] . '/' . 'wpfunos-logs/' . $file)));
        if (time() > strtotime('+1 week', filemtime( $upload_dir['basedir'] . '/' . 'wpfunos-logs/' . $file))) {
          $oldfile = $this->gzCompressFile($upload_dir['basedir'] . '/' . 'wpfunos-logs/' . $file);
          $this->custom_logs('Old logfile: ' . $oldfile );
          unlink( $upload_dir['basedir'] . '/' . 'wpfunos-logs/' . $file);
        }
      }
    }
  }

  /**
  * Cron job maintenance log CSV usuarios
  */
  public function wpfunosMaintenanceUsuariosCSV(){
    $this->custom_logs('CSV usuarios funos');
    $timeFirst  = strtotime('now');

    $now = current_datetime();
    $yesterday = $now->sub(new DateInterval('P1D'));

    $args = array(
      'post_status' => 'publish',
      'post_type' => 'usuarios_wpfunos',
      'posts_per_page' => -1,
      'date_query' => array(
        array(
          'year' => $yesterday->format("Y"),
          'month' => $yesterday->format("m"),
          'day' => $yesterday->format("d"),
        )
      ),
    );
    $post_list = get_posts( $args );
    if( $post_list ){
      //cabecera
      //$csv_output = 'Fecha entrada, ID, Referencia, Nombre, Teléfono, Email, Población, CP, Provincia, Funeraria, Tanatorio, Precio, Destino, Ataúd, Velatorio, Despedida, Visitas';
      $csv_output = 'Fecha de la acción realizada, ID, Referencia, Nombre y apellidos, Teléfono, Email, Ubicación del usuario, CP, Provincia, Empresa, Servicio demandado, API, Precio, Nombre servicio, Nombre ataúd, Nombre velatorio, Nombre despedida, Visitas, URL, Nombre acción, IP';
      $csv_output .= "\n";
      foreach ( $post_list as $post ){
        $this->custom_logs('Usuario: '.$post->ID );

        $csv_output .= get_post_meta( $post->ID, 'wpfunos_TimeStamp', true ).","; //Fecha de la acción realizada
        $csv_output .= $post->ID.","; // ID
        $csv_output .= get_post_meta( $post->ID, 'wpfunos_userReferencia', true ).",";//Referencia
        $csv_output .= str_replace(",","",get_post_meta( $post->ID, 'wpfunos_userName', true )).",";//Nombre y apellidos
        $csv_output .= str_replace(",","",get_post_meta( $post->ID, 'wpfunos_userPhone', true )).",";//Teléfono
        $csv_output .= str_replace(",","",get_post_meta( $post->ID, 'wpfunos_userMail', true )).",";// Email
        $csv_output .= str_replace(",","",get_post_meta( $post->ID, 'wpfunos_userNombreSeleccionUbicacion', true )).",";// Ubicación del usuario
        $csv_output .= str_replace(",","",get_post_meta( $post->ID, 'wpfunos_userCP', true )).",";// CP
        $csv_output .= str_replace(",","",get_post_meta( $post->ID, 'wpfunos_userServicioProvincia', true )).",";// Provincia
        $csv_output .= str_replace(",","",get_post_meta( $post->ID, 'wpfunos_userServicioEmpresa', true )).",";// Empresa
        $csv_output .= str_replace(",","",get_post_meta( $post->ID, 'wpfunos_userDesgloseBaseNombre', true )).",";// Servicio demandado
        $csv_output .= str_replace(",","",get_post_meta( $post->ID, 'wpfunos_userAPITipo', true )).",";// API
        $csv_output .= get_post_meta( $post->ID, 'wpfunos_userPrecio', true ).",";// Precio
        $csv_output .= get_post_meta( $post->ID, 'wpfunos_userNombreSeleccionServicio', true ).",";// Destino
        $csv_output .= get_post_meta( $post->ID, 'wpfunos_userNombreSeleccionAtaud', true ).",";// Ataúd
        $csv_output .= get_post_meta( $post->ID, 'wpfunos_userNombreSeleccionVelatorio', true ).",";// Velatorio
        $csv_output .= get_post_meta( $post->ID, 'wpfunos_userNombreSeleccionDespedida', true ).",";// Despedida
        $csv_output .= get_post_meta( $post->ID, 'wpfunos_userVisitas', true ).",";// Visitas
        $csv_output .= get_post_meta( $post->ID, 'wpfunos_userURLlarga', true ).",";// URL
        $csv_output .= get_post_meta( $post->ID, 'wpfunos_userNombreAccion', true ).",";// nombre acción
        $csv_output .= get_post_meta( $post->ID, 'wpfunos_userIP', true ).",";// nombre acción

        //
        $csv_output .= "\n";
      }

      $upload_dir = wp_upload_dir();
      if (!file_exists( $upload_dir['basedir'] . '/wpfunos-reportes') ) {
        mkdir( $upload_dir['basedir'] . '/wpfunos-reportes' );
      }
      $file = $upload_dir['basedir'] . '/wpfunos-reportes/reporte-usuarios-'. $yesterday->format("d-m-Y") . '.csv';
      $open = fopen( $file, "w" );
      fputs( $open, $csv_output );
      fclose( $open );

      $Excelfile = $upload_dir['basedir'] . '/wpfunos-reportes/reporte-usuarios-'. $yesterday->format("d-m-Y") . '.xlsx';

      require WFUNOS_BASE_DIR.'/admin/partials/vendor/autoload.php';

      $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
      $spreadsheet = $reader->load($file);
      $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
      $writer->save($Excelfile);

      $message = '<p>Usuarios del día ' .$yesterday->format("d-m-Y"). '.</p>';
      //$message .= '<p>Total '.count( $post_list ).' usuarios.';
      //$message .= '<p></p>';
      //$message .= '<p>Enlace .csv: <a href="https://funos.es/wp-content/uploads/wpfunos-reportes/reporte-usuarios-'.$yesterday->format("d-m-Y").'.csv">Fichero csv</a></p>';
      //$message .= '<p>Enlace .xlsx: <a href="https://funos.es/wp-content/uploads/wpfunos-reportes/reporte-usuarios-'.$yesterday->format("d-m-Y").'.xlsx">Fichero xlsx</a></p>';
      //$message .= '<p></p>';
      //$message .= '<p>---</p>';

      $attachments = array( $file, $Excelfile );
      if( site_url() !== 'https://dev.funos.es'){
        $headers[] = 'Content-Type: text/html; charset=UTF-8';
        $headers[] = 'From: funos <clientes@funos.es>';
        $headers[] = 'Cc: comercial.alejandrolopez@yahoo.com, efraim@efraim.cat' ;
        wp_mail (  'clientes@funos.es' , 'Reporte usuarios' , $message, $headers, $attachments );
      }
    }
    $this->custom_logs('Usuarios con fecha '.$yesterday->format("d-m-Y").': '. count( $post_list ));
    $total = strtotime('now') - $timeFirst ;
    $this->custom_logs('--- ' .$total.' sec.');
  }

  /**
  * Cron job 2FA Users
  */
  public function wpfunosMaintenanceHourly2FA(){
    $this->custom_logs('Wpfunos 2FA');
    $timeFirst  = strtotime('now');

    $args = array(
      'role'    => 'pre2fa',
      'orderby' => 'user_nicename',
      'order'   => 'ASC'
    );
    $users = get_users( $args );
    if( $users ){
      foreach ( $users as $user ){
        $this->custom_logs('Wpfunos 2FA: ' .$user->display_name. ' ID: ' .$user->ID );
        $this->custom_logs('Wpfunos 2FA: last login: ' .get_user_meta( $user->ID, 'wfls-last-login' , true ). ' => ' .gmdate("d-m-Y H:i:s", get_user_meta( $user->ID, 'wfls-last-login' , true ) ) );
        $this->custom_logs('Wpfunos 2FA: Última comprobación: ' .get_user_meta( $user->ID, 'wpfunos_ultima_comprobacion' , true ). ' => ' .gmdate("d-m-Y H:i:s", get_user_meta( $user->ID, 'wpfunos_ultima_comprobacion' , true ) ) );
        if( get_user_meta( $user->ID, 'wfls-last-login' , true ) > get_user_meta( $user->ID, 'wpfunos_ultima_comprobacion' , true ) ){
          $headers[] = 'Content-Type: text/html; charset=UTF-8';
          wp_mail (  'efraim@efraim.cat' , 'Usuario 2FA conectado' , 'El usuario ' .$user->display_name. ' se ha conectado.', $headers );
          $this->custom_logs('Wpfunos 2FA: Mensaje enviado a efraim@efraim.cat' );
        }
        $updated = update_user_meta( $user->ID, 'wpfunos_ultima_comprobacion', time() );
        $this->custom_logs('Wpfunos 2FA: ---------------------------' );
      }
    }
    $this->custom_logs('Wpfunos 2FA ends');
    $total = strtotime('now') - $timeFirst ;
    $this->custom_logs('--- ' .$total.' sec.');
  }

  /** **/
  /** **/
  /** **/

  /**
  * Cron job precios seo funerarias //WPML
  */
  public function wpfunosMaintenancePreciosSeoFunerarias(){
    $this->custom_logs('Wpfunos precio_funer_wpfunos SEO starts');
    $timeFirst  = strtotime('now');

    $args = array(
      'post_type' => 'precio_funer_wpfunos',
      'post_status' => 'any', // para incluir borradores
      'posts_per_page' => -1,
    );
    $post_list = get_posts( $args );
    if( $post_list ){
      foreach ( $post_list as $post ) :
        // WPML
        $languages = apply_filters( 'wpml_active_languages', NULL, array( 'skip_missing' => 1,) );
        if( !empty( $languages ) ) {
          foreach( $languages as $language ){
            $wpml_id = apply_filters( 'wpml_object_id', $post->ID, 'post', FALSE, $language['language_code'] );
            if( $wpml_id ){

              $wpml_id_orig = apply_filters( 'wpml_object_id', $post->ID, 'post', FALSE, 'es' );
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
              //$this->custom_logs('precio_funer_wpfunos ' .$wpml_id. ' (' .$language['language_code']. ') updated');
              //
            }
          }
        }
        // WPML
      endforeach;
      wp_reset_postdata();
    }
    $this->custom_logs('Wpfunos precio_funer_wpfunos SEO ends');
    $total = strtotime('now') - $timeFirst ;
    $this->custom_logs('--- ' .$total.' sec.');
    //
  }

  /**
  * Cron job Precios funerarias //WPML
  */
  public function wpfunosMaintenanceEnlacesLandingsDinamicas(){
    $this->custom_logs('Wpfunos Precio Población Dinámica starts');
    $timeFirst  = strtotime('now');

    $args = array(
      'post_type' => 'precio_funer_wpfunos',
      'post_status' => 'any', // para incluir borradores
      'posts_per_page' => -1,
    );
    $post_list = get_posts( $args );
    if( $post_list ){
      foreach ( $post_list as $post ) :

        $relacionadas = get_post_meta( $post->ID, 'wpfunos_precioFunerariaPaginasRelacionadas', true );

        $relacionadas = str_replace(" ","",$relacionadas);
        $relacionadas = str_replace(",",", ",$relacionadas);
        update_post_meta( $post->ID, 'wpfunos_precioFunerariaPaginasRelacionadas', $relacionadas );

        $distancia = get_post_meta( $post->ID, 'wpfunos_EnlaceDistancia', true );
        $latitud = get_post_meta( $post->ID, 'wpfunos_EnlaceLatitud', true );
        $longitud = get_post_meta( $post->ID, 'wpfunos_EnlaceLonguitud', true );
        $poblacion = get_post_meta( $post->ID, 'wpfunos_precioFunerariaPoblacion', true );
        $provincia = get_post_meta( $post->ID, 'wpfunos_precioFunerariaProvincia', true );

        if( strlen($distancia) > 0 && strlen($latitud) > 0 && strlen($longitud) > 0 ){

          // WPML
          $languages = apply_filters( 'wpml_active_languages', NULL, array( 'skip_missing' => 1,) );
          if( !empty( $languages ) ) {
            foreach( $languages as $language ){
              $wpml_id = apply_filters( 'wpml_object_id', $post->ID, 'post', FALSE, $language['language_code'] );
              if( $wpml_id ){
                //
                // $this->custom_logs('Languages: ' .$wpml_id.' '.$language['language_code'] );
                //
                $prefijo = ( $language['language_code'] == 'es' ) ? '' :  $language['language_code'].'/' ;
                do_action('wpfunos_enlaces_landings', array( $prefijo, $provincia, $distancia, $latitud, $longitud, $poblacion, $wpml_id ) );
              }
            }
          }
          // WPML

        }
      endforeach;
    }
    $this->custom_logs('Posts: ' .count($post_list) );
    $this->custom_logs('Wpfunos Precio Población Dinámica ends');
    $total = strtotime('now') - $timeFirst ;
    $this->custom_logs('--- ' .$total.' sec.');
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
  * Utility: dump array for logfile.
  */
  public function dumpPOST($data, $indent=0) {
    $retval = '';
    $prefix=\str_repeat(' |  ', $indent);
    if (\is_numeric($data)) $retval.= "Number: $data";
    elseif (\is_string($data)) $retval.= "String: '$data'";
    elseif (\is_null($data)) $retval.= "NULL";
    elseif ($data===true) $retval.= "TRUE";
    elseif ($data===false) $retval.= "FALSE";
    elseif (is_array($data)) {
      $indent++;
      foreach($data AS $key => $value) {
        $retval.= "\r\n$prefix [$key] = ";
        $retval.= $this->dump($value, $indent);
      }
    }
    elseif (is_object($data)) {
      $retval.= "Object (".get_class($data).")";
      $indent++;
      foreach($data AS $key => $value) {
        $retval.= "\r\n$prefix $key -> ";
        $retval.= $this->dump($value, $indent);
      }
    }
    return $retval;
  }

  /**
  * Utility: create entry in the log file.
  * $this->custom_logs( $this->dumpPOST($message) );
  */
  private function custom_logs($message){
    $upload_dir = wp_upload_dir();
    if (is_array($message)) {
      $message = json_encode($message);
    }
    if (!file_exists( $upload_dir['basedir'] . '/wpfunos-logs') ) {
      mkdir( $upload_dir['basedir'] . '/wpfunos-logs' );
    }
    $time = current_time("d-M-Y H:i:s:v");
    $ban = "#$time: $message\r\n";
    $file = $upload_dir['basedir'] . '/wpfunos-logs/wpfunos-adminlog-' . current_time("Y-m-d") . '.log';
    $open = fopen($file, "a");
    fputs($open, $ban);
    fclose( $open );
  }
}
