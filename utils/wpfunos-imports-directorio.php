<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
//print_r($_POST);
// Array ( [importdirectorio] => 1 [wpfunos_import_directorio_nonce] => 30122ba760 [_wp_http_referer] => /wp-admin/admin.php?page=wpfunosimport [submit] => Importar fichero directorio ) 
if( !isset ($_POST['submit']) ){
	?>
	<p>
		Escoger el fichero .csv de la importación
	</p>
	<form method="post" enctype="multipart/form-data" action="">					
		<p>
			<input accept=".csv" type="file" name="import_file" />
		</p>
		<p>
			<input type="hidden" name="importdirectorio" id="importdirectorio" value="1"/>
			<?php wp_nonce_field( 'wpfunos_import_directorio_nonce', 'wpfunos_import_directorio_nonce' ); ?>
			<?php submit_button( __( 'Importar fichero directorio', 'wpfunos' ), 'secondary', 'submit', false );?>
		</p>
	</form>
	<?php
	return;
}

//Array ( [import_file] => Array ( [name] => prova.csv [type] => text/csv [tmp_name] => /tmp/php6NbbLV [error] => 0 [size] => 14098 ) ) 
//print_r ( $_FILES );
// look for nonce
if ( empty( $_POST['wpfunos_import_directorio_nonce'] ) ) {
	wp_die( __( 'Cheatin\' eh?!', 'wpfunos' ) );
}
// verify nonce
if ( ! wp_verify_nonce( $_POST['wpfunos_import_directorio_nonce'], 'wpfunos_import_directorio_nonce' ) ) {
	wp_die( __( 'Cheatin\' eh?!', 'wpfunos' ) );
}
//make sure at least one checkbox is checked
if ( empty( $_FILES['import_file']['tmp_name'] ) ) {
	wp_die( __( 'Sube un archivo para importar', 'wpfunos' ) );
}
	
if (($open = fopen($_FILES['import_file']['tmp_name'] , "r")) !== FALSE){
	while ( ($data = fgetcsv($open) ) !== FALSE){        
		$array[] = $data; 
	}
	fclose($open);
}

/**
*0 ==> Array ( [0] => ID [1] => Title [2] => wpfunos_tanatorioDirectorioNombre [3] => wpfunos_tanatorioDirectorioDireccion [4] => wpfunos_tanatorioDirectorioTelefono [5] => wpfunos_tanatorioDirectorioCorreo [6] => Permalink [7] => Tanatorio [8] => Funeraria [9] => Marca funeraria )
*1 ==> Array ( [0] => 39452 [1] => Tanatorio del directorio [2] => Tanatorio del directorio [3] => Dirección [4] => Telefono [5] => Correo [6] => https://funos.es/?post_type=tanatorio_d_wpfunos&p=39452 [7] => Tanatorios>Barcelona>Barcelona-ciudad [8] => Funerarias>Barcelona>Barcelona-ciudad [9] => Marca>Mémora )
*2 ==> Array ( [0] => 40618 [1] => Tanatorio del directorio 2 [2] => Tanatorio del directorio 2 [3] => Dirección [4] => Telefono [5] => Correo [6] => https://funos.es/?post_type=tanatorio_d_wpfunos&p=40618 [7] => Tanatorios>Barcelona>Barcelona-ciudad [8] => Funerarias>Barcelona>Barcelona-ciudad [9] => Marca>Mémora )
*3 ==> Array ( [0] => 40806 [1] => Pruebas [2] => Pruebas [3] => Pruebas [4] => Pruebas [5] => Pruebas [6] => https://funos.es/?post_type=tanatorio_d_wpfunos&p=40806 [7] => Tanatorios>Barcelona>Mollet [8] => Funerarias>Barcelona>Mollet [9] => ) 
*/


$cantidad = 0;
foreach ( $array as $key=>$linea ) {
	if ($key == 0){
		if ($linea[0] != 'ID') break;
		if ($linea[9] != 'Marca funeraria') break;
		continue;
	}
	$cantidad++;
//	echo $key . ' ==> ';
//	print_r ( $linea );
//	echo '<br/>';

	
	
	
}
	
if( $cantidad == 0) echo 'Formato de contenido de fichero inadecuado!<br/>';
echo 'se han importado ' . $cantidad . ' registros.';
	
	
