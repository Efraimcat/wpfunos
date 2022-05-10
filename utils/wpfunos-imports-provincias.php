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
      IMPORTACION FICHERO PROVINCIAS
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
