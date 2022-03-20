<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
//print_r($_POST);
// Array ( [importdirectorio] => 1 [wpfunos_import_directorio_nonce] => 30122ba760 [_wp_http_referer] => /wp-admin/admin.php?page=wpfunosimport [submit] => Importar fichero directorio ) 
if( !isset ($_POST['submit']) ){
	?>
	<h2>
		IMPORTACION FICHERO DIRECTORIO	
	</h2>
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
	?><h2>ERROR AL IMPORTAR FICHERO DIRECTORIO</h2><?php
	wp_die( __( 'Cheatin\' eh?!', 'wpfunos' ) );
}
// verify nonce
if ( ! wp_verify_nonce( $_POST['wpfunos_import_directorio_nonce'], 'wpfunos_import_directorio_nonce' ) ) {
	?><h2>ERROR AL IMPORTAR FICHERO DIRECTORIO</h2><?php
	wp_die( __( 'Cheatin\' eh?!', 'wpfunos' ) );
}
//make sure at least one checkbox is checked
if ( empty( $_FILES['import_file']['tmp_name'] ) ) {
	?><h2>ERROR AL IMPORTAR FICHERO DIRECTORIO</h2><?php
	wp_die( __( 'Sube un archivo para importar', 'wpfunos' ) );
}
	
if (($open = fopen($_FILES['import_file']['tmp_name'] , "r")) !== FALSE){
	while ( ($data = fgetcsv($open) ) !== FALSE){        
		$array[] = $data; 
	}
	fclose($open);
}

/**
* [0] => ID 
* [1] => Title 
* [2] => wpfunos_tanatorioDirectorioNombre 
* [3] => wpfunos_tanatorioDirectorioDireccion 
* [4] => wpfunos_tanatorioDirectorioTelefono 
* [5] => wpfunos_tanatorioDirectorioCorreo 
* [6] => wpfunos_tanatorioDirectorioPoblacion
* [7] => wpfunos_tanatorioDirectorioProvincia
* [8] => wpfunos_tanatorioDirectorioNotas
* [9] => wpfunos_tanatorioDirectorioFuneraria
* [10] => Slug 
* [11] => Tanatorio 
* [12] => Funeraria 
* [13] => Marca funeraria 
* [14] => Content
*
*
*
* 1 ==> Array ( [0] => 39452 [1] => Tanatorio del directorio [2] => Tanatorio del directorio [3] => Dirección [4] => Telefono [5] => Correo [6] => Poblacion [7] => Provincia [8] => [9] => tanatorio-del-directorio [10] => Tanatorios>Barcelona>Barcelona-ciudad [11] => Funerarias>Barcelona>Barcelona-ciudad [12] => Marca>Mémora )
*2 ==> Array ( [0] => 40618 [1] => Tanatorio del directorio 2 [2] => Tanatorio del directorio 2 [3] => Dirección [4] => Telefono [5] => Correo [6] => Poblacion [7] => Provincia [8] => [9] => tanatorio-del-directorio-2 [10] => Tanatorios>Barcelona>Barcelona-ciudad [11] => Funerarias>Barcelona>Barcelona-ciudad [12] => Marca>Mémora )
*5 ==> Array ( [0] => 41037 [1] => Tanatori Mémora Les Corts [2] => Tanatori Mémora Les Corts [3] => xxx [4] => xxx [5] => xxx [6] => Barcelona [7] => Barcelona [8] => [9] => tanatori-memora-les-corts [10] => Tanatorios>Barcelona>Barcelona-ciudad [11] => Funerarias>Barcelona>Barcelona-ciudad [12] => Marca>Mémora )
*/
$cantidadviejos = 0;
$cantidadnuevos = 0;
foreach ( $array as $key=>$linea ) {
	if ($key == 0){
		if ($linea[0] != 'ID') break;
		if ($linea[1] != 'Title') break;
		if ($linea[2] != 'wpfunos_tanatorioDirectorioNombre') break;
		if ($linea[3] != 'wpfunos_tanatorioDirectorioDireccion') break;
		if ($linea[4] != 'wpfunos_tanatorioDirectorioTelefono') break;
		if ($linea[5] != 'wpfunos_tanatorioDirectorioCorreo') break;
		if ($linea[6] != 'wpfunos_tanatorioDirectorioPoblacion') break;
		if ($linea[7] != 'wpfunos_tanatorioDirectorioProvincia') break;
		if ($linea[8] != 'wpfunos_tanatorioDirectorioNotas') break;
		if ($linea[9] != 'wpfunos_tanatorioDirectorioFuneraria') break;
		if ($linea[10] != 'Slug') break;
		if ($linea[11] != 'Tanatorio') break;
		if ($linea[12] != 'Funeraria') break;
		if ($linea[13] != 'Marca funeraria') break;
		continue;
	}
	
	//echo $key . ' ==> ';
	//print_r ( $linea );
	//echo '<br/>';
	
	$categoriaTanatorio = ( explode( '>' , $linea[11] ) );
	$categoriaFuneraria = ( explode( '>' , $linea[12] ) );
	$categoriaMarca = ( explode( '>' , $linea[13] ) );
	$objTanatorio = get_term_by( 'slug', $categoriaTanatorio[2], 'poblacion_tanatorio' );
	$objFuneraria = get_term_by( 'slug', $categoriaFuneraria[2], 'poblacion_funeraria' );
	$objMarca = get_term_by( 'slug', $categoriaMarca[1], 'marca_funeraria' );
	//echo 'Categoria tanatorio: ' . $objTanatorio->term_id . '<br/>';
	//echo 'Categoria funeraria: ' . $objFuneraria->term_id . '<br/>';
	//echo 'Categoria marca: ' . $objMarca->term_id . '<br/>';
	
	if( ! $objTanatorio  && strlen( $linea[11] ) > 1 ){
		echo '</br>1-La categoría tanatorio ' . $categoriaTanatorio[2] . ' no existe </br>';
		$objTanatorio = get_term_by( 'slug', $categoriaTanatorio[1], 'poblacion_tanatorio' );
		if( ! $objTanatorio ){
			echo '2- La categoría tanatorio ' . $categoriaTanatorio[1] . ' no existe </br>';
			echo '3- Crear categoría tanatorio ' . $categoriaTanatorio[1] . '</br>';
			$objPadre = get_term_by( 'slug', $categoriaTanatorio[0], 'poblacion_tanatorio' );
			//wp_insert_term( string $term, string $taxonomy, array|string $args = array() )
			$objNuevo = wp_insert_term( $categoriaTanatorio[1], 'poblacion_tanatorio', array( 'slug' => $categoriaTanatorio[1], 'parent' => $objPadre->term_id ,));
			echo '3- Categoría tanatorio ' . $objNuevo->term_id . ' creada.</br>';
			echo '4- Crear categoría tanatorio ' . $categoriaTanatorio[2] . ' en ' . $categoriaTanatorio[1] . '</br>';
			
			$objPadre = get_term_by( 'slug', $categoriaTanatorio[1], 'poblacion_tanatorio' );
			$objNuevo = wp_insert_term( $categoriaTanatorio[2], 'poblacion_tanatorio', array( 'slug' => $categoriaTanatorio[2], 'parent' => $objPadre->term_id ,));
			echo '4- Categoría tanatorio ' . $objNuevo->term_id . ' creada.</br>';
			$objTanatorio = get_term_by( 'slug', $categoriaTanatorio[2], 'poblacion_tanatorio' );
		}else{
			echo '2 - La categoría tanatorio ' . $categoriaTanatorio[1] . ' ya existe </br>';
			echo '3- Crear categoría tanatorio ' . $categoriaTanatorio[2] . ' en ' . $categoriaTanatorio[1] . '</br>';
	
			$objPadre = get_term_by( 'slug', $categoriaTanatorio[1], 'poblacion_tanatorio' );
			$objNuevo = wp_insert_term( $categoriaTanatorio[2], 'poblacion_tanatorio', array( 'slug' => $categoriaTanatorio[2], 'parent' => $objPadre->term_id ,));
			echo '3- Categoría tanatorio ' . $objNuevo->term_id . ' creada.</br>';
			$objTanatorio = get_term_by( 'slug', $categoriaTanatorio[2], 'poblacion_tanatorio' );
		}
	}
	
	if( ! $objFuneraria  && strlen( $linea[12] ) > 1 ){
		echo '</br>1-La categoría funeraria ' . $categoriaFuneraria[2] . ' no existe </br>';
		$objFuneraria = get_term_by( 'slug', $categoriaFuneraria[1], 'poblacion_funeraria' );
		if( ! $objFuneraria ){
			echo '2- La categoría funeraria ' . $categoriaFuneraria[1] . ' no existe </br>';
			echo '3- Crear categoría funeraria ' . $categoriaFuneraria[1] . '</br>';
			$objPadre = get_term_by( 'slug', $categoriaFuneraria[0], 'poblacion_funeraria' );
			//wp_insert_term( string $term, string $taxonomy, array|string $args = array() )
			$objNuevo = wp_insert_term( $categoriaFuneraria[1], 'poblacion_funeraria', array( 'slug' => $categoriaFuneraria[1], 'parent' => $objPadre->term_id ,));
			echo '3- Categoría funeraria ' . $objNuevo->term_id . ' creada.</br>';
			echo '4- Crear categoría funeraria ' . $categoriaFuneraria[2] . ' en ' . $categoriaFuneraria[1] . '</br>';
			
			$objPadre = get_term_by( 'slug', $categoriaFuneraria[1], 'poblacion_funeraria' );
			$objNuevo = wp_insert_term( $categoriaFuneraria[2], 'poblacion_funeraria', array( 'slug' => $categoriaFuneraria[2], 'parent' => $objPadre->term_id ,));
			echo '4- Categoría funeraria ' . $objNuevo->term_id . ' creada.</br>';
			$objFuneraria = get_term_by( 'slug', $categoriaFuneraria[2], 'poblacion_funeraria' );
		}else{
			echo '2 - La categoría funeraria ' . $categoriaFuneraria[1] . ' ya existe </br>';
			echo '3- Crear categoría funeraria ' . $categoriaFuneraria[2] . ' en ' . $categoriaFuneraria[1] . '</br>';
	
			$objPadre = get_term_by( 'slug', $categoriaFuneraria[1], 'poblacion_funeraria' );
			$objNuevo = wp_insert_term( $categoriaFuneraria[2], 'poblacion_funeraria', array( 'slug' => $categoriaFuneraria[2], 'parent' => $objPadre->term_id ,));
			echo '3- Categoría funeraria ' . $objNuevo->term_id . ' creada.</br>';
			$objFuneraria = get_term_by( 'slug', $categoriaFuneraria[2], 'poblacion_funeraria' );
		}
	}
	
	if( ! $objMarca  && strlen( $linea[13] ) > 1 ){
		echo '</br>1-La categoría marca ' . $categoriaMarca[1] . ' no existe </br>';
		echo '2- Crear categoría marca ' . $categoriaMarca[1] . '</br>';
		$objPadre = get_term_by( 'slug', $categoriaMarca[0], 'marca_funeraria' );
		$objNuevo = wp_insert_term( $categoriaMarca[1], 'marca_funeraria', array( 'slug' => $categoriaMarca[1], 'parent' => $objPadre->term_id ,));
		echo '3- Categoría marca ' . $objNuevo->term_id . ' creada.</br>';
		$objMarca = get_term_by( 'slug', $categoriaMarca[1], 'marca_funeraria' );
	}
	
	if( strlen( $linea[0] ) > 1 ) {
		if( post_exists( get_the_title( $linea[0] )  ) == 0 ){ echo 'ID '	. $linea[0] . ' No Existe!<br/>'; continue; } //returns $postID or 0
		$cantidadviejos++;
		$data = array(
  			'ID' => $linea[0],
			'post_title'   => $linea[1],
			'post_name' => $linea[10],
			'post_content' => $linea[14],
      		'meta_input' => array(
    			$this->plugin_name . '_tanatorioDirectorioNombre' => $linea[2],
    			$this->plugin_name . '_tanatorioDirectorioDireccion' => $linea[3],
				$this->plugin_name . '_tanatorioDirectorioTelefono' => $linea[4],
				$this->plugin_name . '_tanatorioDirectorioCorreo'=> $linea[5],
				$this->plugin_name . '_tanatorioDirectorioPoblacion'=> $linea[6],
				$this->plugin_name . '_tanatorioDirectorioProvincia'=> $linea[7],
				$this->plugin_name . '_tanatorioDirectorioNotas'=> $linea[8],
				$this->plugin_name . '_tanatorioDirectorioFuneraria'=> $linea[9],
   			)
 		);
		wp_update_post( $data );
		
		if( $objTanatorio->term_id > 0 ) wp_set_object_terms( $linea[0], $objTanatorio->term_id , 'poblacion_tanatorio' );
		if( $objFuneraria->term_id > 0 ) wp_set_object_terms( $linea[0], $objFuneraria->term_id , 'poblacion_funeraria' );
		if( $objMarca->term_id > 0 ) wp_set_object_terms( $linea[0], $objMarca->term_id , 'marca_funeraria' );
		
		echo 'ID '	. $linea[0] . ' actualizado<br/>';
	}else{
		$cantidadnuevos++;	
		// 'post_status' => 'publish', no crea el permalink. Dejarlo como borrador y al publicarlo lo actualizará.
		$data = array(
			'post_title'   => $linea[1],
			"post_name" => $linea[10],
			'post_content' => $linea[14],
			'post_type' => 'tanatorio_d_wpfunos',
      		'meta_input' => array(
    			$this->plugin_name . '_tanatorioDirectorioNombre' => $linea[2],
    			$this->plugin_name . '_tanatorioDirectorioDireccion' => $linea[3],
				$this->plugin_name . '_tanatorioDirectorioTelefono' => $linea[4],
				$this->plugin_name . '_tanatorioDirectorioCorreo'=> $linea[5],
				$this->plugin_name . '_tanatorioDirectorioPoblacion'=> $linea[6],
				$this->plugin_name . '_tanatorioDirectorioProvincia'=> $linea[7],
				$this->plugin_name . '_tanatorioDirectorioNotas'=> $linea[8],
				$this->plugin_name . '_tanatorioDirectorioFuneraria'=> $linea[9],
   			)
 		);
		$post_id = wp_insert_post( $data );
		
		if( $objTanatorio->term_id > 0 ) wp_set_object_terms( $post_id, $objTanatorio->term_id , 'poblacion_tanatorio' );
		if( $objFuneraria->term_id > 0 ) wp_set_object_terms( $post_id, $objFuneraria->term_id , 'poblacion_funeraria' );
		if( $objMarca->term_id > 0 ) wp_set_object_terms( $post_id, $objMarca->term_id , 'marca_funeraria' );
		
		echo 'ID '	. $post_id . ' creado<br/>';
	}
}
	
if( $cantidadnuevos == 0 && $cantidadviejos == 0 ) echo 'Formato de contenido de fichero inadecuado!<br/>';
echo '<br/>Se han actualizado ' . $cantidadviejos . ' registros ya existentes y se han creado ' . $cantidadnuevos . ' nuevos registros de un total de ' . $key . ' registros.';
	
	
