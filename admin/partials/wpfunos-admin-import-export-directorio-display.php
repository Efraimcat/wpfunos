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
?>
<div class="wrap">
  <div id="icon-themes" class="icon32"></div>
  <h2><?php esc_html_e( get_admin_page_title() .' '.$this->version. ' ('  .get_option( "wpf_db_version" ). ')' ); ?></h2>
  <?php settings_errors(); ?>
  <div style="margin-top: 10px;margin-bottom: 10px;"><?php echo date_i18n( 'd F Y H:i:s', current_time( 'timestamp', 0 ) );?></div>
  <p>
    <?php esc_html_e( 'Import Export Directorio: ', 'wpfunos' ); ?>
  </p>
</div>
<?php
if( !isset ($_POST['submit']) ){
  ?>
  <div class="wpfunos-imports">
    <h3>
      IMPORTACION FICHERO TANATORIOS DIRECTORIO
    </h3>
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
        <?php submit_button( __( 'Importar fichero tanatorios directorio', 'wpfunos' ), 'secondary', 'submit', false );?>
      </p>
    </form>
    <hr/>
    <h3>
      EXPORTACION FICHERO TANATORIOS DIRECTORIO
    </h3>
    <p>
      Crear fichero .csv del directorio
    </p>
    <form method="post" enctype="multipart/form-data" action="">
      <p>
        <input type="hidden" name="exportdirectorio" id="exportdirectorio" value="1"/>
        <?php wp_nonce_field( 'wpfunos_import_directorio_nonce', 'wpfunos_import_directorio_nonce' ); ?>
        <?php submit_button( __( 'Exportar fichero tanatorios directorio', 'wpfunos' ), 'secondary', 'submit', false );?>
      </p>
    </form>
  </div>

  <?php
  return;
}

//array(4) { ["exportdirectorio"]=> string(1) "1" ["wpfunos_import_directorio_nonce"]=> string(10) "79924ea802" ["_wp_http_referer"]=> string(57) "/wp-admin/admin.php?page=wpfunos-import-export-directorio" ["submit"]=> string(27) "Exportar fichero directorio" }
//var_dump($_POST);

/**
*
* // Get term by name ''news'' in Custom taxonomy.
* $term = get_term_by('name', 'news', 'my_custom_taxonomy')
*
*/
if($_POST['importdirectorio'] == '1' ){
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

  $cantidadviejos = 0;
  $cantidadnuevos = 0;

}
if($_POST['exportdirectorio'] == '1' ){
  if ( empty( $_POST['wpfunos_import_directorio_nonce'] ) ) {
    ?><h2>ERROR AL EXPORTAR FICHERO DIRECTORIO</h2><?php
    wp_die( __( 'Cheatin\' eh?!', 'wpfunos' ) );
  }
  // verify nonce
  if ( ! wp_verify_nonce( $_POST['wpfunos_import_directorio_nonce'], 'wpfunos_import_directorio_nonce' ) ) {
    ?><h2>ERROR AL EXPORTAR FICHERO DIRECTORIO</h2><?php
    wp_die( __( 'Cheatin\' eh?!', 'wpfunos' ) );
  }
  ?><h2>EXPORTANDO FICHERO DIRECTORIO</h2><?php
  $args = array(
    'post_status' => 'any',
    'post_type' => 'directorio_entrada',
    'posts_per_page' => -1,
  );
  $post_list = get_posts( $args );
  if( $post_list ){
    //$term_obj_list = get_the_terms( $post->ID, 'directorio_poblacion' );
    //cabecera
    //
    // TODO: Categorias, Extracto, slug, Imagen destacada
    //
    //$csv_output = 'Fecha de la acción realizada, ID, Referencia, Nombre y apellidos, Teléfono, Email, Ubicación del usuario, CP, Provincia, Empresa, Servicio demandado, API, Precio, Nombre servicio, Nombre ataúd, Nombre velatorio, Nombre despedida, Visitas, URL, Nombre acción, IP';
    $csv_output = 'ID,Status,Nombre,Direccion,Correo,Telefono,Poblacion,CodigosProvincia,Funeraria,IDFuneraria,Latitud,Longitud,IDImagenes,Landings,IDLandings,Servicios,IDServicios,Shortcode, IDShortcode,Descripcion,DescripcionServicios,Horarios,ComoLlegar';
    $csv_output .= "\n";
    foreach ( $post_list as $post ){
      $term_obj_list = get_the_terms( $post->ID, 'directorio_poblacion' );
      if ( count($term_obj_list) != 4 )echo 'ERROR en categorias del post ' .$post->ID. ' ' .get_the_title( $post->ID ). '<br/>';
      //var_dump( $term_obj_list );
      /**
      *array(4) {
      *  [0]=> object(WP_Term)#62786 (10) {
      *    ["term_id"]=> int(641)
      *    ["name"]=> string(9) "Barcelona"
      *    ["slug"]=> string(9) "barcelona"
      *    ["term_group"]=> int(0)
      *    ["term_taxonomy_id"]=> int(641)
      *    ["taxonomy"]=> string(20) "directorio_poblacion"
      *    ["description"]=> string(0) ""
      *    ["parent"]=> int(644)
      *    ["count"]=> int(1)
      *    ["filter"]=> string(3) "raw"
      *  }
      *  [1]=> object(WP_Term)#62788 (10) {
      *    ["term_id"]=> int(642)
      *    ["name"]=> string(16) "Barcelona ciudad"
      *    ["slug"]=> string(16) "barcelona-ciudad"
      *    ["term_group"]=> int(0)
      *    ["term_taxonomy_id"]=> int(642)
      *    ["taxonomy"]=> string(20) "directorio_poblacion"
      *    ["parent"]=> int(641)
      *    ["description"]=> string(0) ""
      *    ["count"]=> int(1)
      *    ["filter"]=> string(3) "raw"
      *  }
      *  [2]=> object(WP_Term)#62790 (10) {
      *    ["term_id"]=> int(638)
      *    ["name"]=> string(10) "Directorio"
      *    ["slug"]=> string(10) "directorio"
      *    ["term_group"]=> int(0)
      *    ["term_taxonomy_id"]=> int(638)
      *    ["taxonomy"]=> string(20) "directorio_poblacion"
      *    ["description"]=> string(0) ""
      *    ["parent"]=> int(0)
      *    ["count"]=> int(3)
      *    ["filter"]=> string(3) "raw"
      *  }
      *  [3]=> object(WP_Term)#62785 (10) {
      *    ["term_id"]=> int(644)
      *    ["name"]=> string(9) "Funeraria"
      *    ["slug"]=> string(9) "funeraria"
      *    ["term_group"]=> int(0)
      *    ["term_taxonomy_id"]=> int(644)
      *    ["taxonomy"]=> string(20) "directorio_poblacion"
      *    ["description"]=> string(0) ""
      *    ["parent"]=> int(638)
      *    ["count"]=> int(1)
      *    ["filter"]=> string(3) "raw"
      *  }
      *}
      *
      */

      $funeraria = get_post_meta( get_post_meta( $post->ID, 'wpfunos_entradaDirectorioFuneraria', true ), 'wpfunos_entradaDirectorioNombre', true );
      $shortcode = get_post_meta( get_post_meta( $post->ID, 'wpfunos_entradaDirectorioShortcode', true ), 'wpfunos_shortcodeDirectorioNombre', true );

      $landings = explode(',',get_post_meta(  $post->ID , 'wpfunos_entradaDirectorioLandings', true ));
      $outputlandings = '';
      foreach( $landings as $landing ){
        $outputlandings .= get_the_title( $landing ).';';
      }
      $outputlandings = rtrim($outputlandings, ";");

      $servicios = explode(',',get_post_meta(  $post->ID , 'wpfunos_entradaDirectorioServicios', true ));
      $outputservicios = '';
      foreach( $servicios as $servicio ){
        $outputservicios .= get_the_title( $servicio ).';';
      }
      $outputservicios = rtrim($outputservicios, ";");

      $csv_output .= $post->ID.","; // ID
      $csv_output .= get_post_status ( $post->ID ).",";
      $csv_output .= str_replace(",",";",get_post_meta( $post->ID, 'wpfunos_entradaDirectorioNombre', true )).",";
      $csv_output .= str_replace(",",";",get_post_meta( $post->ID, 'wpfunos_entradaDirectorioDireccion', true )).",";
      $csv_output .= str_replace(",",";",get_post_meta( $post->ID, 'wpfunos_entradaDirectorioCorreo', true )).",";
      $csv_output .= str_replace(",",";",get_post_meta( $post->ID, 'wpfunos_entradaDirectorioTelefono', true )).",";
      $csv_output .= str_replace(",",";",get_post_meta( $post->ID, 'wpfunos_entradaDirectorioPoblacion', true )).",";
      $csv_output .= str_replace(",",";",get_post_meta( $post->ID, 'wpfunos_entradaDirectorioCodigoProvincia', true )).",";
      $csv_output .= str_replace(",",";",$funeraria).",";
      $csv_output .= str_replace(",",";",get_post_meta( $post->ID, 'wpfunos_entradaDirectorioFuneraria', true )).",";
      $csv_output .= str_replace(",",";",get_post_meta( $post->ID, 'wpfunos_entradaDirectorioLatitud', true )).",";
      $csv_output .= str_replace(",",";",get_post_meta( $post->ID, 'wpfunos_entradaDirectorioLongitud', true )).",";
      $csv_output .= str_replace(",",";",get_post_meta( $post->ID, 'wpfunos_entradaDirectorioImagenes', true )).",";
      $csv_output .= str_replace(",",";",$outputlandings).",";
      $csv_output .= str_replace(",",";",get_post_meta( $post->ID, 'wpfunos_entradaDirectorioLandings', true )).",";
      $csv_output .= str_replace(",",";",$outputservicios).",";
      $csv_output .= str_replace(",",";",get_post_meta( $post->ID, 'wpfunos_entradaDirectorioServicios', true )).",";
      $csv_output .= $shortcode.",";
      $csv_output .= str_replace(",",";",get_post_meta( $post->ID, 'wpfunos_entradaDirectorioShortcode', true )).",";
      $csv_output .= str_replace(",","+",get_post_meta( $post->ID, 'wpfunos_entradaDirectorioDescripcion', true )).",";
      $csv_output .= str_replace(",","+",get_post_meta( $post->ID, 'wpfunos_entradaDirectorioDescripcionServicios', true )).",";
      $csv_output .= str_replace(",","+",get_post_meta( $post->ID, 'wpfunos_entradaDirectorioHorario', true )).",";
      $csv_output .= str_replace(",","+",get_post_meta( $post->ID, 'wpfunos_entradaDirectorioComoLlegar', true )).",";
      //
      $csv_output .= "\n";
    }
    $now = current_datetime();
    $upload_dir = wp_upload_dir();
    if (!file_exists( $upload_dir['basedir'] . '/wpfunos-exports') ) {
      mkdir( $upload_dir['basedir'] . '/wpfunos-exports' );
    }
    $file = $upload_dir['basedir'] . '/wpfunos-exports/export-directorio-'. $now->format("d-m-Y-H-i") . '.csv';
    $open = fopen( $file, "w" );
    fputs( $open, $csv_output );
    fclose( $open );
    ?><h2>EXPORTACION FINALIZADA</h2><?php
  }
}
