<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}


//print_r($_POST);
// Array ( [importdirectorio] => 1 [gmw_import_forms_nonce] => e1eefd42b5 [_wp_http_referer] => /wp-admin/admin.php?page=wpfunosimport [submit] => Importar )
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
if( $_POST['submit'] == 'Importar fichero directorio'){
	//Array ( [import_file] => Array ( [name] => prova.csv [type] => text/csv [tmp_name] => /tmp/phptHMGEf [error] => 0 [size] => 14098 ) ) 
	//Array ( [import_file] => Array ( [name] => prova.csv [type] => text/csv [tmp_name] => /tmp/php6NbbLV [error] => 0 [size] => 14098 ) ) 
	// print_r ( $_FILES );
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
	
	
	
	
	
	
	
	// Retrieve the data from the file and convert the json object to an array
	//$forms = gmw_object_to_array( json_decode( file_get_contents( $_FILES['import_file']['tmp_name'] ) ) );

	//if ( empty( $forms ) ) {

	//	wp_safe_redirect( admin_url( 'admin.php?page=gmw-import-export&tab=forms&gmw_notice=no_forms_to_imported&gmw_notice_status=error' ) );
	//} else {

	//	global $wpdb;

	//	foreach ( $forms as $form ) {

	//		global $wpdb;

			// create new form in database
	//		$wpdb->insert(
	//			$wpdb->prefix . 'gmw_forms',
	//			array(
	//				'slug'   => $form['slug'],
	//				'addon'  => $form['addon'],
	//				'name'   => $form['name'],
	//				'title'  => $form['title'],
	//				'prefix' => $form['prefix'],
	//				'data'   => $form['data'],
	//			),
	//			array(
	//				'%s',
	//				'%s',
	//				'%s',
	//				'%s',
	//				'%s',
	//				'%s',
	//			)
	//		);
	//	}

		// update forms in cache
	//	GMW_Forms_Helper::update_forms_cache();

	//	wp_safe_redirect( admin_url( 'admin.php?page=gmw-import-export&tab=forms&gmw_notice=forms_imported&gmw_notice_status=updated' ) );

	// }
	// 
	// 
	// 
}