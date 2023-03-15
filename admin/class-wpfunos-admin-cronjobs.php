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
    add_action( 'wpfunos_schedule_procesar_precios', array( $this, 'wpfunosScheduleProcesarPrecios' ), 10, 2 );
    add_action( 'wpfunos_schedule_procesar_servicios', array( $this, 'wpfunosScheduleProcesarServicios' ), 10, 2 );
    add_action( 'wpfunos_schedule eliminar_indices', array( $this, 'wpfunosScheduleEliminarIndices' ), 10, 2 );
  }

  /**
  * Cron job maintenance tasks.
  */
  public function wpfunosMaintenance(){
    $this->wpfunosMaintenanceLogRotate();
    $this->wpfunosMaintenanceUsuariosCSV();
    $this->wpfunosMaintenanceschedulePreciosFunerarias();
    return;
  }

  /**
  * Cron job Next maintenance tasks.
  */
  public function wpfunosNextMaintenance(){
    //
    //
    return;
  }

  /**
  * Cron job hourly maintenance tasks.
  */
  public function wpfunosHourlyMaintenance(){
    $this->wpfunosMaintenanceHourly2FA();
    $this->wpfunosMaintenanceHourlyDatabase();
    $this->wpfunosMaintenancePreciosv1Preciosv2();
    $this->wpfunosMaintenancePreciosSeoFunerarias();
    $this->wpfunosMaintenanceEnlacesLandingsDinamicas();
    return;
  }

  /** **/
  /** **/
  /** **/

  /**
  *
  * wpfunosMaintenance
  *
  */

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
      $headers[] = 'Content-Type: text/html; charset=UTF-8';
      $headers[] = 'Cc: comercial.alejandrolopez@yahoo.com, efraim@efraim.cat' ;
      wp_mail (  'clientes@funos.es' , 'Reporte usuarios' , $message, $headers, $attachments );

    }
    $this->custom_logs('Usuarios con fecha '.$yesterday->format("d-m-Y").': '. count( $post_list ));
    $this->custom_logs('---');
  }

  /**
  * Cron job precios funerarias
  */
  public function wpfunosMaintenanceschedulePreciosFunerarias(){
    $args = array(
      'post_type' => 'precio_serv_wpfunos',
      'post_status' => 'publish',
      'posts_per_page' => -1,
    );
    $indices_list = get_posts( $args );

    $args = array(
      'post_type' => 'servicios_wpfunos',
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'meta_query' => array(
        array( 'key' => 'wpfunos_servicioActivo', 'value' => '1', 'compare' => '=', ),
      ),
    );
    $servicios_list = get_posts( $args );

    //https://developer.wordpress.org/reference/functions/wp_schedule_single_event/
    //add_action( 'wpfunos_schedule_procesar_precios', array( $this, 'wpfunosScheduleProcesarPrecios' ), 10, 2 );
    //add_action( 'wpfunos_schedule_procesar_servicios', array( $this, 'wpfunosScheduleProcesarServicios' ), 10, 2 );
    //add_action( 'wpfunos_schedule eliminar_indices', array( $this, 'wpfunosScheduleEliminarIndices' ), 10, 2 );

    $tiempo = 15;

    $this->custom_logs('Wpfunos precio_serv_wpfunos Creación nuevos indices funerarias starts');
    for ( $x = 1; $x <= count($servicios_list); $x+=35 ) {
      $this->custom_logs('==> ' .sprintf( '%03s', $x ). ' > ' .date("H:i:s",time() +$tiempo). ' UTC' );
      wp_schedule_single_event( time() + $tiempo, 'wpfunos_schedule_procesar_servicios', array( $x, 35 ) );
      $tiempo += 480;
    }
    $this->custom_logs('Wpfunos precio_serv_wpfunos Creación nuevos indices funerarias ends');
    $this->custom_logs('---');
    $this->custom_logs('Wpfunos precio_serv_wpfunos eliminar indices starts');
    $tiempo += 600;
    for ( $x = 1; $x <= count($indices_list); $x+=2000 ) {
      $this->custom_logs('==> ' .sprintf( '%05s', $x ). ' > ' .date("H:i:s",time() +$tiempo). ' UTC' );
      wp_schedule_single_event( time() + $tiempo, 'wpfunos_schedule eliminar_indices', array( $x, 2000 ) );
      $tiempo += 20;
    }
    $this->custom_logs('Wpfunos precio_serv_wpfunos eliminar indices ends');
    $this->custom_logs('---');
  }

  /** **/
  /** **/
  /** **/

  /**
  *
  * wpfunosNextMaintenance
  *
  */

  /** **/
  /** **/
  /** **/

  /**
  *
  * wpfunosHourlyMaintenance
  *
  */

  /**
  * Cron job 2FA Users
  */
  public function wpfunosMaintenanceHourly2FA(){
    $this->custom_logs('Wpfunos 2FA');
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
    $this->custom_logs('---');
  }

  /**
  * Cron job maintenance Base de datos
  */
  public function wpfunosMaintenanceHourlyDatabase(){
    $this->custom_logs('HourlyDatabase');
    $DBversion = WPFUNOS_DB_VERSION;
    $installed_ver = get_option( "wpf_db_version" );
    $this->custom_logs('HourlyDatabase: ' .$DBversion. ' actual: ' .$installed_ver );

    if ( $installed_ver != $DBversion ) {
      $this->custom_logs('HourlyDatabase: Updating DB ' .$installed_ver. ' a ' .$DBversion );
      global $wpdb;
      $table_name = $wpdb->prefix . 'wpf_visitas';
      $charset_collate = $wpdb->get_charset_collate();

      $sql = "CREATE TABLE $table_name (
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
        PRIMARY KEY  (id)
      );";

      require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
      dbDelta( $sql );

      update_option( "wpf_db_version", $DBversion );
    }
    $this->custom_logs('HourlyDatabase ENDS' );
    $this->custom_logs('---');
  }

  /**
  * Cron job precios v1 -> v2
  */
  public function wpfunosMaintenancePreciosv1Preciosv2(){
    $this->custom_logs('Wpfunos Actualizando registros Preciosv1Preciosv2 starts');
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

        // WPML
        $post_details = apply_filters( 'wpml_post_language_details', NULL, $post->ID ) ;
        if( $post_details['language_code'] == 'es' ){
          // WPML

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

          // WPML
        }
        // WPML

      }
      wp_reset_postdata();
    }
    $this->custom_logs('Wpfunos Actualizando registros Preciosv1Preciosv2 ends');
    $this->custom_logs('---');
  }

  /**
  * Cron job precios seo funeraarias
  */
  public function wpfunosMaintenancePreciosSeoFunerarias(){
    //  Precios Funerarias
    $this->custom_logs('Wpfunos precio_funer_wpfunos SEO starts');
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
            $wpml_id = apply_filters( 'wpml_object_id', $post->ID, 'post', FALSE, $language[language_code] );
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
              //$this->custom_logs('precio_funer_wpfunos ' .$wpml_id. ' (' .$language[language_code]. ') updated');
              //
            }
          }
        }
        // WPML
      endforeach;
      wp_reset_postdata();
    }
    $this->custom_logs('Wpfunos precio_funer_wpfunos SEO ends');
    $this->custom_logs('---');
    //
  }

  /**
  * Cron job Precios funerarias
  */
  public function wpfunosMaintenanceEnlacesLandingsDinamicas(){
    $this->custom_logs('Wpfunos Precio Población Dinámica starts');
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
              $wpml_id = apply_filters( 'wpml_object_id', $post->ID, 'post', FALSE, $language[language_code] );
              if( $wpml_id ){
                //
                // $this->custom_logs('Languages: ' .$wpml_id.' '.$language[language_code] );
                //
                $prefijo = ( $language[language_code] == 'es' ) ? '' :  $language[language_code].'/' ;
                // WPML

                // recalcular enlaces
                update_post_meta($wpml_id, 'wpfunos_precioFunerariaEnlaceAhora', home_url().'/'.$prefijo.'comparar-precios-resultados?address[]='.$provincia
                .'&post[]=precio_serv_wpfunos&cf[resp1]=1&cf[resp2]=2&cf[resp3]=2&cf[resp4]=2&distance='.$distancia
                .'&units=metric&paged=1&per_page=50&lat='.$latitud
                .'&lng='.$longitud.'&form=8&action=fs&CP=undefined&orden=dist&cuando=Ahora&poblacion='.$poblacion);
                update_post_meta($wpml_id, 'wpfunos_precioFunerariaEnlaceProximamente', home_url().'/'.$prefijo.'comparar-precios-resultados?address[]='.$provincia
                .'&post[]=precio_serv_wpfunos&cf[resp1]=1&cf[resp2]=2&cf[resp3]=2&cf[resp4]=2&distance='.$distancia
                .'&units=metric&paged=1&per_page=50&lat='.$latitud
                .'&lng='.$longitud.'&form=8&action=fs&CP=undefined&orden=dist&cuando=Proximamente&poblacion='.$poblacion);
                update_post_meta($wpml_id, 'wpfunos_precioFunerariaEnlaceVerPrecios', home_url().'/'.$prefijo.'comparar-precios-resultados?address[]='.$provincia
                .'&post[]=precio_serv_wpfunos&cf[resp1]=1&cf[resp2]=2&cf[resp3]=2&cf[resp4]=2&distance='.$distancia
                .'&units=metric&paged=1&per_page=50&lat='.$latitud
                .'&lng='.$longitud.'&form=8&action=fs&CP=undefined&orden=dist&cuando=Ahora&poblacion='.$poblacion);

                update_post_meta($wpml_id, 'wpfunos_precioIncineracionEnlaceAhora', home_url().'/'.$prefijo.'comparar-precios-resultados?address[]='.$provincia
                .'&post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=2&cf[resp3]=2&cf[resp4]=2&distance='.$distancia
                .'&units=metric&paged=1&per_page=50&lat='.$latitud
                .'&lng='.$longitud.'&form=8&action=fs&CP=undefined&orden=dist&cuando=Ahora&poblacion='.$poblacion);
                update_post_meta($wpml_id, 'wpfunos_precioIncineracionEnlaceProximamente', home_url().'/'.$prefijo.'comparar-precios-resultados?address[]='.$provincia
                .'&post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=2&cf[resp3]=2&cf[resp4]=2&distance='.$distancia
                .'&units=metric&paged=1&per_page=50&lat='.$latitud
                .'&lng='.$longitud.'&form=8&action=fs&CP=undefined&orden=dist&cuando=Proximamente&poblacion='.$poblacion);
                update_post_meta($wpml_id, 'wpfunos_precioIncineracionEnlaceVerPrecios', home_url().'/'.$prefijo.'comparar-precios-resultados?address[]='.$provincia
                .'&post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=2&cf[resp3]=2&cf[resp4]=2&distance='.$distancia
                .'&units=metric&paged=1&per_page=50&lat='.$latitud
                .'&lng='.$longitud.'&form=8&action=fs&CP=undefined&orden=dist&cuando=Ahora&poblacion='.$poblacion);

                update_post_meta($wpml_id, 'wpfunos_precioFunerariaEntierroDesdeEnlace', home_url().'/'.$prefijo.'comparar-precios-resultados?address[]='.$provincia
                .'&post[]=precio_serv_wpfunos&cf[resp1]=1&cf[resp2]=2&cf[resp3]=2&cf[resp4]=1&distance='.$distancia
                .'&units=metric&paged=1&per_page=50&lat='.$latitud
                .'&lng='.$longitud.'&form=8&action=fs&CP=undefined&orden=precios&cuando=Ahora&land=1&poblacion='.$poblacion);
                update_post_meta($wpml_id, 'wpfunos_precioFunerariaEntierroVelatorioDesdeEnlace', home_url().'/'.$prefijo.'comparar-precios-resultados?address[]='.$provincia
                .'&post[]=precio_serv_wpfunos&cf[resp1]=1&cf[resp2]=2&cf[resp3]=1&cf[resp4]=1&distance='.$distancia
                .'&units=metric&paged=1&per_page=50&lat='.$latitud
                .'&lng='.$longitud.'&form=8&action=fs&CP=undefined&orden=precios&cuando=Ahora&land=1&poblacion='.$poblacion);
                update_post_meta($wpml_id, 'wpfunos_precioFunerariaEntierroVelatorioCeremoniaDesdeEnlace', home_url().'/'.$prefijo.'comparar-precios-resultados?address[]='.$provincia
                .'&post[]=precio_serv_wpfunos&cf[resp1]=1&cf[resp2]=2&cf[resp3]=1&cf[resp4]=2&distance='.$distancia
                .'&units=metric&paged=1&per_page=50&lat='.$latitud
                .'&lng='.$longitud.'&form=8&action=fs&CP=undefined&orden=precios&cuando=Ahora&land=1&poblacion='.$poblacion);
                update_post_meta($wpml_id, 'wpfunos_precioFunerariaEntierroPremiumDesdeEnlace', home_url().'/'.$prefijo.'comparar-precios-resultados?address[]='.$provincia
                .'&post[]=precio_serv_wpfunos&cf[resp1]=1&cf[resp2]=3&cf[resp3]=1&cf[resp4]=3&distance='.$distancia
                .'&units=metric&paged=1&per_page=50&lat='.$latitud
                .'&lng='.$longitud.'&form=8&action=fs&CP=undefined&orden=precios&cuando=Ahora&land=1&poblacion='.$poblacion);

                update_post_meta($wpml_id, 'wpfunos_precioFunerariaIncineracionDesdeEnlace', home_url().'/'.$prefijo.'comparar-precios-resultados?address[]='.$provincia
                .'&post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=2&cf[resp3]=2&cf[resp4]=1&distance='.$distancia
                .'&units=metric&paged=1&per_page=50&lat='.$latitud
                .'&lng='.$longitud.'&form=8&action=fs&CP=undefined&orden=precios&cuando=Ahora&land=1&poblacion='.$poblacion);
                update_post_meta($wpml_id, 'wpfunos_precioFunerariaIncineracionVelatorioDesdeEnlace', home_url().'/'.$prefijo.'comparar-precios-resultados?address[]='.$provincia
                .'&post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=2&cf[resp3]=1&cf[resp4]=1&distance='.$distancia
                .'&units=metric&paged=1&per_page=50&lat='.$latitud
                .'&lng='.$longitud.'&form=8&action=fs&CP=undefined&orden=precios&cuando=Ahora&land=1&poblacion='.$poblacion);
                update_post_meta($wpml_id, 'wpfunos_precioFunerariaIncineracionVelatorioCeremoniaDesdeEnlace', home_url().'/'.$prefijo.'comparar-precios-resultados?address[]='.$provincia
                .'&post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=2&cf[resp3]=1&cf[resp4]=2&distance='.$distancia
                .'&units=metric&paged=1&per_page=50&lat='.$latitud
                .'&lng='.$longitud.'&form=8&action=fs&CP=undefined&orden=precios&cuando=Ahora&land=1&poblacion='.$poblacion);
                update_post_meta($wpml_id, 'wpfunos_precioFunerariaIncineracionPremiumDesdeEnlace', home_url().'/'.$prefijo.'comparar-precios-resultados?address[]='.$provincia
                .'&post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=3&cf[resp3]=1&cf[resp4]=3&distance='.$distancia
                .'&units=metric&paged=1&per_page=50&lat='.$latitud
                .'&lng='.$longitud.'&form=8&action=fs&CP=undefined&orden=precios&cuando=Ahora&land=1&poblacion='.$poblacion);

                // WPML
              }
            }
          }
          // WPML

        }
      endforeach;
    }
    $this->custom_logs('Posts: ' .count($post_list) );
    $this->custom_logs('Wpfunos Precio Población Dinámica ends');
    $this->custom_logs('---');
  }

  /** **/
  /** **/
  /** **/

  /**
  *
  * HOOKS
  *
  */

  /*
  *
  *   add_action( 'wpfunos_schedule_procesar_precios', array( $this, 'wpfunosScheduleProcesarPrecios' ), 10, 2 );
  *
  */
  public function wpfunosScheduleProcesarPrecios( $offset, $batch ){
    $this->custom_logs('wpfunosScheduleProcesarPrecios ==> ' .$offset. ' ' .$batch. ' <==' );

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

        if( strlen( $direccion ) > 1 ){
          //gmw_update_post_location( $post->ID, $direccion, 7, $direccion, true );
        }

      }
    }
    $this->custom_logs('wpfunosScheduleProcesarPrecios ==> ' .$offset. ' ' .$batch. ' END <==' );
  }

  /*
  *
  *   add_action( 'wpfunos_schedule_procesar_servicios', array( $this, 'wpfunosScheduleProcesarServicios' ), 10, 2 );
  *
  */
  public function wpfunosScheduleProcesarServicios( $offset, $batch ){
    $this->custom_logs('wpfunosScheduleProcesarServicios ==> ' .$offset. ' ' .$batch. ' <==' );

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
    $this->custom_logs('wpfunosScheduleProcesarServicios ==> ' .$offset. ' ' .$batch. ' <== END' );
  }

  /*
  *
  *   add_action( 'wpfunos_schedule eliminar_indices', array( $this, 'wpfunosScheduleEliminarIndices' ), 10, 2 );
  *
  */
  public function wpfunosScheduleEliminarIndices( $offset, $batch ){
    $this->custom_logs('wpfunosScheduleEliminarIndices ==> ' .$offset. ' ' .$batch. ' <==' );

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
        if( FALSE === get_post_status( $servicioPrecioID ) || get_post_meta( $servicioPrecioID, 'wpfunos_servicioActivo', true ) != '1' ){
          $this->custom_logs('wpfunosScheduleEliminarIndices ==> Elimnar ' .$post->ID. ' <==' );
          wp_delete_post( $post->ID, true);
        }
      }
    }
    $this->custom_logs('wpfunosScheduleEliminarIndices ==> ' .$offset. ' ' .$batch. ' <== END' );
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
