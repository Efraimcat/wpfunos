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
* @subpackage Wpfunos/admin/partials
* @author     Efraim Bayarri <efraim@efraim.cat>
*/
?><script>console.log('Cargando hojas de cálculo.' );</script><?php
if( !isset( $_POST['hojascalculo'] ) ) return;

if( isset( $_POST['hojascalculo'] ) && $_POST['hojascalculo'] == 1 ){

  if( !isset ($_POST['submit']) ){
    ?>
    <div class="wpfunos-hojascalculo">
      <h3>
        CREAR NUEVAS HOJAS DE CALCULO
      </h3>

      <p>
        Este proceso creará nuevas hojas de cálculo para el día seleccionado.
      </p>
      <form method="post" enctype="multipart/form-data" action="">
        <p>
          <div style="display: flex; margin: 10px;">
            <div> Día <input type="text" name="dia" id="dia"></div>
            <div> Mes <input type="text" name="mes" id="mes"></div>
            <div> Año <input type="text" name="ano" id="ano"></div>
          </div>
          <input type="hidden" name="hojascalculo" id="hojascalculo" value="1"/>
          <?php wp_nonce_field( 'wpfunos_hojascalculo_nonce', 'wpfunos_hojascalculo_nonce' ); ?>
          <?php submit_button( __( 'Crear hojas de cálculo', 'wpfunos' ), 'secondary', 'submit', false );?>
        </p>
      </form>
    </div>
    <?php
    return;
  }
  if( (int)$_POST['dia'] < 1 || (int)$_POST['dia'] > 31 ){
    ?><h1>ERROR: DÍA INCORRECTO</h1><?php
    return;
  }
  if( (int)$_POST['mes'] < 1 || (int)$_POST['mes'] > 12 ){
    ?><h1>ERROR: MES INCORRECTO</h1><?php
    return;
  }
  if( (int)$_POST['ano'] < 2022 || (int)$_POST['ano'] > 2024 ){
    ?><h1>ERROR: AÑO INCORRECTO</h1><?php
    return;
  }

  if ( ! wp_verify_nonce( $_POST['wpfunos_hojascalculo_nonce'], 'wpfunos_hojascalculo_nonce' ) ) {
    ?><h1>ERROR AL IMPORTAR PRECIOS SERVICIOS 2</h1><?php
    wp_die( __( 'Cheatin\' eh?!', 'wpfunos' ) );
  }

  echo 'Creando tablas para el día '.$_POST['dia'].' del mes '.$_POST['mes'].' del año '.$_POST['ano'].'.</br>';

  $args = array(
    'post_status' => 'publish',
    'post_type' => 'usuarios_wpfunos',
    'posts_per_page' => -1,
    'date_query' => array(
      array(
        'year' => $_POST['ano'],
        'month' => $_POST['mes'],
        'day' => $_POST['dia'],
      )
    ),
  );
  $post_list = get_posts( $args );
  if( $post_list ){
    echo 'Encontrados '.count( $post_list ).' resultados.</br>';
    //cabecera
    $csv_output = 'Fecha entrada, Canal entrada, ID, Referencia, Nombre, Teléfono, Email, Población, CP, Provincia, Funeraria, Tanatorio, Precio, Destino, Ataúd, Velatorio, Despedida, Visitas';
    $csv_output .= "\n";
    foreach ( $post_list as $post ){
      $this->custom_logs('Usuario: '.$post->ID );
      $csv_output .= get_post_meta( $post->ID, 'wpfunos_TimeStamp', true ).","; //Fecha entrada
      $csv_output .= "Comparador funerarias,"; //Canal entrada
      $csv_output .= $post->ID.","; // ID
      $csv_output .= get_post_meta( $post->ID, 'wpfunos_userReferencia', true ).",";//Referencia
      $csv_output .= str_replace(",","",get_post_meta( $post->ID, 'wpfunos_userName', true )).",";//Nombre
      $csv_output .= str_replace(",","",get_post_meta( $post->ID, 'wpfunos_userPhone', true )).",";//Teléfono
      $csv_output .= str_replace(",","",get_post_meta( $post->ID, 'wpfunos_userMail', true )).",";// Email
      $csv_output .= str_replace(",","",get_post_meta( $post->ID, 'wpfunos_userNombreSeleccionUbicacion', true )).",";// Población
      $csv_output .= str_replace(",","",get_post_meta( $post->ID, 'wpfunos_userCP', true )).",";// CP
      $csv_output .= str_replace(",","",get_post_meta( $post->ID, 'wpfunos_userServicioProvincia', true )).",";// Provincia
      $csv_output .= str_replace(",","",get_post_meta( $post->ID, 'wpfunos_userServicioEmpresa', true )).",";// Funeraria
      $csv_output .= str_replace(",","",get_post_meta( $post->ID, 'wpfunos_userServicioTitulo', true )).",";// Tanatorio
      $csv_output .= get_post_meta( $post->ID, 'wpfunos_userPrecio', true ).",";// Precio
      $csv_output .= get_post_meta( $post->ID, 'wpfunos_userNombreSeleccionServicio', true ).",";// Destino
      $csv_output .= get_post_meta( $post->ID, 'wpfunos_userNombreSeleccionAtaud', true ).",";// Ataúd
      $csv_output .= get_post_meta( $post->ID, 'wpfunos_userNombreSeleccionVelatorio', true ).",";// Velatorio
      $csv_output .= get_post_meta( $post->ID, 'wpfunos_userNombreSeleccionDespedida', true ).",";// Despedida
      $csv_output .= get_post_meta( $post->ID, 'wpfunos_userVisitas', true ).",";// Visitas
      //
      $csv_output .= "\n";
    }
    $upload_dir = wp_upload_dir();
    if (!file_exists( $upload_dir['basedir'] . '/wpfunos-reportes') ) {
      mkdir( $upload_dir['basedir'] . '/wpfunos-reportes' );
    }
    $file = $upload_dir['basedir'] . '/wpfunos-reportes/admin-reporte-usuarios-'.$_POST['dia'].'-'.$_POST['mes'].'-'.$_POST['ano'].'.csv';
    $open = fopen( $file, "w" );
    fputs( $open, $csv_output );
    fclose( $open );

    ?>
    <h2>
      Creado el fichero
      <a href="https://funos.es/wp-content/uploads/wpfunos-reportes/admin-reporte-usuarios-<?php echo $_POST['dia'].'-'.$_POST['mes'].'-'.$_POST['ano'];?>.csv">
        admin-reporte-usuarios-<?php echo $_POST['dia'].'-'.$_POST['mes'].'-'.$_POST['ano'];?>.csv
      </a>
    </h2>
    <?php

    $Excelfile = $upload_dir['basedir'] . '/wpfunos-reportes/admin-reporte-usuarios-'.$_POST['dia'].'-'.$_POST['mes'].'-'.$_POST['ano'].'.xlsx';

    require 'vendor/autoload.php';

    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
    $spreadsheet = $reader->load($file);
    $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
    $writer->save($Excelfile);

    ?>
    <h2>
      Creado el fichero
      <a href="https://funos.es/wp-content/uploads/wpfunos-reportes/admin-reporte-usuarios-<?php echo $_POST['dia'].'-'.$_POST['mes'].'-'.$_POST['ano'];?>.xlsx">
        admin-reporte-usuarios-<?php echo $_POST['dia'].'-'.$_POST['mes'].'-'.$_POST['ano'];?>.xlsx
      </a>
    </h2>
    <?php

  }

}
