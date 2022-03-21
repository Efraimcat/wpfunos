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
	<h2>
		IMPORTACION FICHERO CÓDIGOS POSTALES
	</h2>
	<p>
		Escoger el fichero .csv de la importación
	</p>
	<form method="post" enctype="multipart/form-data" action="">
		<p>
			<input accept=".csv" type="file" name="import_file" />
		</p>
		<p>
			<input type="hidden" name="importcodigospostales" id="importcodigospostales" value="1"/>
			<?php wp_nonce_field( 'wpfunos_import_codigospostales_nonce', 'wpfunos_import_codigospostales_nonce' ); ?>
			<?php submit_button( __( 'Importar fichero códigos postales', 'wpfunos' ), 'secondary', 'submit', false );?>
		</p>
	</form>
	<?php
	return;
}

//Array ( [import_file] => Array ( [name] => prova.csv [type] => text/csv [tmp_name] => /tmp/php6NbbLV [error] => 0 [size] => 14098 ) )
//print_r ( $_FILES );
// look for nonce
if ( empty( $_POST['wpfunos_import_codigospostales_nonce'] ) ) {
	?><h2>ERROR AL IMPORTAR FICHERO CÓDIGOS POSTALES</h2><?php
	wp_die( __( 'Cheatin\' eh?!', 'wpfunos' ) );
}
// verify nonce
if ( ! wp_verify_nonce( $_POST['wpfunos_import_codigospostales_nonce'], 'wpfunos_import_codigospostales_nonce' ) ) {
	?><h2>ERROR AL IMPORTAR FICHERO CÓDIGOS POSTALES</h2><?php
	wp_die( __( 'Cheatin\' eh?!', 'wpfunos' ) );
}
//make sure at least one checkbox is checked
if ( empty( $_FILES['import_file']['tmp_name'] ) ) {
	?><h2>ERROR AL IMPORTAR FICHERO CÓDIGOS POSTALES</h2><?php
	wp_die( __( 'Sube un archivo para importar', 'wpfunos' ) );
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
			if ($linea[1] != 'Title') break;
			if ($linea[2] != 'Post Type') break;
			if ($linea[3] != 'wpfunos_cpostalesPoblacion') break;
			if ($linea[4] != 'wpfunos_cpostalesCodigo') break;
			if ($linea[5] != 'Status') break;
			continue;
		}
		if( strlen( $linea[0] ) > 1 ) {
			if( get_post_status( $linea[0] ) === FALSE ){ echo 'ID '	. $linea[0] . ' -> ' . $linea[1] . ' no existe!<br/>'; continue; }
			$cantidadviejos++;
			$data = array(
        		'ID' => $linea[0],
				'post_title'   => $linea[1],
      			'meta_input' => array(
          			$this->plugin_name . '_cpostalesPoblacion' => $linea[3],
    				$this->plugin_name . '_cpostalesCodigo' => $linea[4],
   				)
 			);
			wp_update_post( $data );
		}else{
			$cantidadnuevos++;
			$data = array(
				'post_title' => $linea[1],
				'post_type' => $linea[2],
				'post_status'   => $linea[5],
    	  		'meta_input' => array(
          			$this->plugin_name . '_cpostalesPoblacion' => $linea[3],
          			$this->plugin_name . '_cpostalesCodigo' => $linea[4],
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
