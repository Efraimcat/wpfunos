<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
/**
* Utilidades.
*
* @link       https://github.com/Efraimcat/wpfunos/
* @since      1.0.0
*
* @package    Wpfunos
* @subpackage Wpfunos/utils
* @author     Efraim Bayarri <efraim@efraim.cat>
*/
//print_r($_POST);
// Array ( [importdirectorio] => 1 [wpfunos_import_directorio_nonce] => 30122ba760 [_wp_http_referer] => /wp-admin/admin.php?page=wpfunosimport [submit] => Importar fichero directorio )
if( !isset ($_POST['submit']) ){
  ?>
  <div class="wpfunos-imports">
    <h3>
      IMPORTACION FICHERO PROVINCIAS PRECIO MEDIO
    </h3>
    <p>
      Escoger el fichero .csv de la importación
    </p>
    <form method="post" enctype="multipart/form-data" action="">
      <p>
        <input accept=".csv" type="file" name="import_file" />
      </p>
      <p>
        <input type="hidden" name="importprovincias" id="importprovincias" value="1"/>
        <?php wp_nonce_field( 'wpfunos_import_provincias_nonce', 'wpfunos_import_provincias_nonce' ); ?>
        <?php submit_button( __( 'Importar fichero provincias', 'wpfunos' ), 'secondary', 'submit', false );?>
      </p>
    </form>
  </div>
  <?php
  return;
}
//Array ( [import_file] => Array ( [name] => prova.csv [type] => text/csv [tmp_name] => /tmp/php6NbbLV [error] => 0 [size] => 14098 ) )
//print_r ( $_FILES );
// look for nonce
if ( empty( $_POST['wpfunos_import_provincias_nonce'] ) ) {
  ?><h1>ERROR AL IMPORTAR FICHERO PROVINCIAS</h1><?php
  wp_die( __( 'Cheatin\' eh?!', 'wpfunos' ) );
}
// verify nonce
if ( ! wp_verify_nonce( $_POST['wpfunos_import_provincias_nonce'], 'wpfunos_import_provincias_nonce' ) ) {
  ?><h1>ERROR AL IMPORTAR FICHERO PROVINCIAS</h1><?php
  wp_die( __( 'Cheatin\' eh?!', 'wpfunos' ) );
}
//make sure at least one checkbox is checked
if ( empty( $_FILES['import_file']['tmp_name'] ) ) {
  ?><h1>ERROR AL IMPORTAR FICHERO PROVINCIAS</h1><?php
  _e( 'Sube un archivo para importar', 'wpfunos' );
  return;
  //wp_die( __( 'Sube un archivo para importar', 'wpfunos' ) );
}

if (($open = fopen($_FILES['import_file']['tmp_name'] , "r")) !== FALSE){
  while ( ($data = fgetcsv($open) ) !== FALSE){
    $array[] = $data;
  }
  fclose($open);
}
$cantidadprocesados = 0;
$cantidadviejos = 0;
$cantidadnuevos = 0;
$cantidadtotal=count($array);

while( $cantidadprocesados < $cantidadtotal ){
  foreach ( array_slice( $array, $cantidadprocesados, 500, 1 ) as $key=>$linea ) {
    $cantidadprocesados++;
    if ($key == 0){
      if ($linea[0] != 'ID') break;
      if ($linea[5] != 'ck001') break;
      if ($linea[11] != 'ck004') break;
      if ($linea[21] != 'ck009') break;
      continue;
    }
    if( strlen($linea[1]) < 1 ) continue;

    if( strlen( $linea[0] ) > 1 ) {
      if( get_post_status( $linea[0] ) === FALSE ){ echo 'ID '	. $linea[0] . ' -> ' . $linea[1] . ' no existe!<br/>'; continue; }
      $cantidadviejos++;
      $data = array(
        'ID' => $linea[0],
        'post_title' => $linea[1],
        'meta_input' => array(
          $this->plugin_name . '_provinciasCodigo' => $linea[2],
          $this->plugin_name . '_provinciasTitulo' => $linea[3],

          $this->plugin_name . '_provinciasEESS' => $linea[4],
          $this->plugin_name . '_provinciasCK001' => $linea[5],
          $this->plugin_name . '_provinciasEESO' => $linea[6],
          $this->plugin_name . '_provinciasCK002' => $linea[7],
          $this->plugin_name . '_provinciasEESC' => $linea[8],
          $this->plugin_name . '_provinciasCK003' => $linea[9],
          $this->plugin_name . '_provinciasEESR' => $linea[10],
          $this->plugin_name . '_provinciasCK004' => $linea[11],
          $this->plugin_name . '_provinciasEEVS' => $linea[12],
          $this->plugin_name . '_provinciasCK005' => $linea[13],
          $this->plugin_name . '_provinciasEEVO' => $linea[14],
          $this->plugin_name . '_provinciasCK006' => $linea[15],
          $this->plugin_name . '_provinciasEEVC' => $linea[16],
          $this->plugin_name . '_provinciasCK007' => $linea[17],
          $this->plugin_name . '_provinciasEEVR' => $linea[18],
          $this->plugin_name . '_provinciasCK008' => $linea[19],

          $this->plugin_name . '_provinciasEMSS' => $linea[20],
          $this->plugin_name . '_provinciasCK009' => $linea[21],
          $this->plugin_name . '_provinciasEMSO' => $linea[22],
          $this->plugin_name . '_provinciasCK010' => $linea[23],
          $this->plugin_name . '_provinciasEMSC' => $linea[24],
          $this->plugin_name . '_provinciasCK011' => $linea[25],
          $this->plugin_name . '_provinciasEMSR' => $linea[26],
          $this->plugin_name . '_provinciasCK012' => $linea[27],
          $this->plugin_name . '_provinciasEMVS' => $linea[28],
          $this->plugin_name . '_provinciasCK013' => $linea[29],
          $this->plugin_name . '_provinciasEMVO' => $linea[30],
          $this->plugin_name . '_provinciasCK014' => $linea[31],
          $this->plugin_name . '_provinciasEMVC' => $linea[32],
          $this->plugin_name . '_provinciasCK015' => $linea[33],
          $this->plugin_name . '_provinciasEMVR' => $linea[34],
          $this->plugin_name . '_provinciasCK016' => $linea[35],

          $this->plugin_name . '_provinciasEPSS' => $linea[36],
          $this->plugin_name . '_provinciasCK017' => $linea[37],
          $this->plugin_name . '_provinciasEPSO' => $linea[38],
          $this->plugin_name . '_provinciasCK018' => $linea[39],
          $this->plugin_name . '_provinciasEPSC' => $linea[40],
          $this->plugin_name . '_provinciasCK019' => $linea[41],
          $this->plugin_name . '_provinciasEPSR' => $linea[42],
          $this->plugin_name . '_provinciasCK020' => $linea[43],
          $this->plugin_name . '_provinciasEPVS' => $linea[44],
          $this->plugin_name . '_provinciasCK021' => $linea[45],
          $this->plugin_name . '_provinciasEPVO' => $linea[46],
          $this->plugin_name . '_provinciasCK022' => $linea[47],
          $this->plugin_name . '_provinciasEPVC' => $linea[48],
          $this->plugin_name . '_provinciasCK023' => $linea[49],
          $this->plugin_name . '_provinciasEPVR' => $linea[50],
          $this->plugin_name . '_provinciasCK024' => $linea[51],

          $this->plugin_name . '_provinciasIESS' => $linea[52],
          $this->plugin_name . '_provinciasCK025' => $linea[53],
          $this->plugin_name . '_provinciasIESO' => $linea[54],
          $this->plugin_name . '_provinciasCK026' => $linea[55],
          $this->plugin_name . '_provinciasIESC' => $linea[56],
          $this->plugin_name . '_provinciasCK027' => $linea[57],
          $this->plugin_name . '_provinciasIESR' => $linea[58],
          $this->plugin_name . '_provinciasCK028' => $linea[59],
          $this->plugin_name . '_provinciasIEVS' => $linea[60],
          $this->plugin_name . '_provinciasCK029' => $linea[61],
          $this->plugin_name . '_provinciasIEVO' => $linea[62],
          $this->plugin_name . '_provinciasCK030' => $linea[63],
          $this->plugin_name . '_provinciasIEVC' => $linea[64],
          $this->plugin_name . '_provinciasCK031' => $linea[65],
          $this->plugin_name . '_provinciasIEVR' => $linea[66],
          $this->plugin_name . '_provinciasCK032' => $linea[67],

          $this->plugin_name . '_provinciasIMSS' => $linea[68],
          $this->plugin_name . '_provinciasCK033' => $linea[69],
          $this->plugin_name . '_provinciasIMSO' => $linea[70],
          $this->plugin_name . '_provinciasCK034' => $linea[71],
          $this->plugin_name . '_provinciasIMSC' => $linea[72],
          $this->plugin_name . '_provinciasCK035' => $linea[73],
          $this->plugin_name . '_provinciasIMSR' => $linea[74],
          $this->plugin_name . '_provinciasCK036' => $linea[75],
          $this->plugin_name . '_provinciasIMVS' => $linea[76],
          $this->plugin_name . '_provinciasCK037' => $linea[77],
          $this->plugin_name . '_provinciasIMVO' => $linea[78],
          $this->plugin_name . '_provinciasCK038' => $linea[79],
          $this->plugin_name . '_provinciasIMVC' => $linea[80],
          $this->plugin_name . '_provinciasCK039' => $linea[81],
          $this->plugin_name . '_provinciasIMVR' => $linea[82],
          $this->plugin_name . '_provinciasCK040' => $linea[83],

          $this->plugin_name . '_provinciasIPSS' => $linea[84],
          $this->plugin_name . '_provinciasCK041' => $linea[85],
          $this->plugin_name . '_provinciasIPSO' => $linea[86],
          $this->plugin_name . '_provinciasCK042' => $linea[87],
          $this->plugin_name . '_provinciasIPSC' => $linea[88],
          $this->plugin_name . '_provinciasCK043' => $linea[89],
          $this->plugin_name . '_provinciasIPSR' => $linea[90],
          $this->plugin_name . '_provinciasCK044' => $linea[91],
          $this->plugin_name . '_provinciasIPVS' => $linea[92],
          $this->plugin_name . '_provinciasCK045' => $linea[93],
          $this->plugin_name . '_provinciasIPVO' => $linea[94],
          $this->plugin_name . '_provinciasCK046' => $linea[95],
          $this->plugin_name . '_provinciasIPVC' => $linea[96],
          $this->plugin_name . '_provinciasCK047' => $linea[97],
          $this->plugin_name . '_provinciasIPVR' => $linea[98],
          $this->plugin_name . '_provinciasCK048' => $linea[99],

          $this->plugin_name . '_provinciasComentarios' => $linea[100],
        )
      );
      wp_update_post( $data );
    }else{
      $cantidadnuevos++;
      $data = array(
        'post_title' => $linea[1],
        'post_type' => 'prov_zona_wpfunos',
        'post_status' => 'publish',
        'meta_input' => array(
          $this->plugin_name . '_provinciasCodigo' => $linea[2],
          $this->plugin_name . '_provinciasTitulo' => $linea[3],

          $this->plugin_name . '_provinciasEESS' => $linea[4],
          $this->plugin_name . '_provinciasCK001' => $linea[5],
          $this->plugin_name . '_provinciasEESO' => $linea[6],
          $this->plugin_name . '_provinciasCK002' => $linea[7],
          $this->plugin_name . '_provinciasEESC' => $linea[8],
          $this->plugin_name . '_provinciasCK003' => $linea[9],
          $this->plugin_name . '_provinciasEESR' => $linea[10],
          $this->plugin_name . '_provinciasCK004' => $linea[11],
          $this->plugin_name . '_provinciasEEVS' => $linea[12],
          $this->plugin_name . '_provinciasCK005' => $linea[13],
          $this->plugin_name . '_provinciasEEVO' => $linea[14],
          $this->plugin_name . '_provinciasCK006' => $linea[15],
          $this->plugin_name . '_provinciasEEVC' => $linea[16],
          $this->plugin_name . '_provinciasCK007' => $linea[17],
          $this->plugin_name . '_provinciasEEVR' => $linea[18],
          $this->plugin_name . '_provinciasCK008' => $linea[19],

          $this->plugin_name . '_provinciasEMSS' => $linea[20],
          $this->plugin_name . '_provinciasCK009' => $linea[21],
          $this->plugin_name . '_provinciasEMSO' => $linea[22],
          $this->plugin_name . '_provinciasCK010' => $linea[23],
          $this->plugin_name . '_provinciasEMSC' => $linea[24],
          $this->plugin_name . '_provinciasCK011' => $linea[25],
          $this->plugin_name . '_provinciasEMSR' => $linea[26],
          $this->plugin_name . '_provinciasCK012' => $linea[27],
          $this->plugin_name . '_provinciasEMVS' => $linea[28],
          $this->plugin_name . '_provinciasCK013' => $linea[29],
          $this->plugin_name . '_provinciasEMVO' => $linea[30],
          $this->plugin_name . '_provinciasCK014' => $linea[31],
          $this->plugin_name . '_provinciasEMVC' => $linea[32],
          $this->plugin_name . '_provinciasCK015' => $linea[33],
          $this->plugin_name . '_provinciasEMVR' => $linea[34],
          $this->plugin_name . '_provinciasCK016' => $linea[35],

          $this->plugin_name . '_provinciasEPSS' => $linea[36],
          $this->plugin_name . '_provinciasCK017' => $linea[37],
          $this->plugin_name . '_provinciasEPSO' => $linea[38],
          $this->plugin_name . '_provinciasCK018' => $linea[39],
          $this->plugin_name . '_provinciasEPSC' => $linea[40],
          $this->plugin_name . '_provinciasCK019' => $linea[41],
          $this->plugin_name . '_provinciasEPSR' => $linea[42],
          $this->plugin_name . '_provinciasCK020' => $linea[43],
          $this->plugin_name . '_provinciasEPVS' => $linea[44],
          $this->plugin_name . '_provinciasCK021' => $linea[45],
          $this->plugin_name . '_provinciasEPVO' => $linea[46],
          $this->plugin_name . '_provinciasCK022' => $linea[47],
          $this->plugin_name . '_provinciasEPVC' => $linea[48],
          $this->plugin_name . '_provinciasCK023' => $linea[49],
          $this->plugin_name . '_provinciasEPVR' => $linea[50],
          $this->plugin_name . '_provinciasCK024' => $linea[51],

          $this->plugin_name . '_provinciasIESS' => $linea[52],
          $this->plugin_name . '_provinciasCK025' => $linea[53],
          $this->plugin_name . '_provinciasIESO' => $linea[54],
          $this->plugin_name . '_provinciasCK026' => $linea[55],
          $this->plugin_name . '_provinciasIESC' => $linea[56],
          $this->plugin_name . '_provinciasCK027' => $linea[57],
          $this->plugin_name . '_provinciasIESR' => $linea[58],
          $this->plugin_name . '_provinciasCK028' => $linea[59],
          $this->plugin_name . '_provinciasIEVS' => $linea[60],
          $this->plugin_name . '_provinciasCK029' => $linea[61],
          $this->plugin_name . '_provinciasIEVO' => $linea[62],
          $this->plugin_name . '_provinciasCK030' => $linea[63],
          $this->plugin_name . '_provinciasIEVC' => $linea[64],
          $this->plugin_name . '_provinciasCK031' => $linea[65],
          $this->plugin_name . '_provinciasIEVR' => $linea[66],
          $this->plugin_name . '_provinciasCK032' => $linea[67],

          $this->plugin_name . '_provinciasIMSS' => $linea[68],
          $this->plugin_name . '_provinciasCK033' => $linea[69],
          $this->plugin_name . '_provinciasIMSO' => $linea[70],
          $this->plugin_name . '_provinciasCK034' => $linea[71],
          $this->plugin_name . '_provinciasIMSC' => $linea[72],
          $this->plugin_name . '_provinciasCK035' => $linea[73],
          $this->plugin_name . '_provinciasIMSR' => $linea[74],
          $this->plugin_name . '_provinciasCK036' => $linea[75],
          $this->plugin_name . '_provinciasIMVS' => $linea[76],
          $this->plugin_name . '_provinciasCK037' => $linea[77],
          $this->plugin_name . '_provinciasIMVO' => $linea[78],
          $this->plugin_name . '_provinciasCK038' => $linea[79],
          $this->plugin_name . '_provinciasIMVC' => $linea[80],
          $this->plugin_name . '_provinciasCK039' => $linea[81],
          $this->plugin_name . '_provinciasIMVR' => $linea[82],
          $this->plugin_name . '_provinciasCK040' => $linea[83],

          $this->plugin_name . '_provinciasIPSS' => $linea[84],
          $this->plugin_name . '_provinciasCK041' => $linea[85],
          $this->plugin_name . '_provinciasIPSO' => $linea[86],
          $this->plugin_name . '_provinciasCK042' => $linea[87],
          $this->plugin_name . '_provinciasIPSC' => $linea[88],
          $this->plugin_name . '_provinciasCK043' => $linea[89],
          $this->plugin_name . '_provinciasIPSR' => $linea[90],
          $this->plugin_name . '_provinciasCK044' => $linea[91],
          $this->plugin_name . '_provinciasIPVS' => $linea[92],
          $this->plugin_name . '_provinciasCK045' => $linea[93],
          $this->plugin_name . '_provinciasIPVO' => $linea[94],
          $this->plugin_name . '_provinciasCK046' => $linea[95],
          $this->plugin_name . '_provinciasIPVC' => $linea[96],
          $this->plugin_name . '_provinciasCK047' => $linea[97],
          $this->plugin_name . '_provinciasIPVR' => $linea[98],
          $this->plugin_name . '_provinciasCK048' => $linea[99],

          $this->plugin_name . '_provinciasComentarios' => $linea[100],
          $this->plugin_name . '_Dummy' => '1',
        )
      );
      $post_id = wp_insert_post( $data );
    }
  }
}

echo '<br/><h2>IMPORTACION FINALIZADA</h2>';
echo '<br/>fichero: ' . $_FILES['import_file']['name'];
echo '<br/>' . $cantidadprocesados . ' filas procesadas.';
echo '<br/>Se han actualizado ' . $cantidadviejos . ' registros ya existentes y se han creado ' . $cantidadnuevos . ' nuevos registros de un total de ' . --$cantidadtotal . ' registros.';
if( $cantidadnuevos == 0 && $cantidadviejos == 0 ) echo '<h2>ERROR: Formato de contenido de fichero inadecuado!</h2><br/>';
