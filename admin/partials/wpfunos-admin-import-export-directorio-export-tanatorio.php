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
if ( empty( $_POST['wpfunos_import_directorio_nonce'] ) ) {
  ?><h2>ERROR AL EXPORTAR FICHERO DIRECTORIO</h2><?php
  wp_die( __( 'Cheatin\' eh?!', 'wpfunos' ) );
}
// verify nonce
if ( ! wp_verify_nonce( $_POST['wpfunos_import_directorio_nonce'], 'wpfunos_import_directorio_nonce' ) ) {
  ?><h2>ERROR AL EXPORTAR FICHERO DIRECTORIO</h2><?php
  wp_die( __( 'Cheatin\' eh?!', 'wpfunos' ) );
}
?><h2>EXPORTANDO FICHERO TANATORIOS DIRECTORIO</h2><?php
$args = array(
  'post_status' => 'any',
  'post_type' => 'tanatorios',
  'posts_per_page' => -1,
);
$post_list = get_posts( $args );
if( $post_list ){
  //
  // https://developer.wordpress.org/reference/functions/get_the_terms/
  //$term_obj_list = get_the_terms( $post->ID, 'directorio_poblacion' );
  //cabecera
  //
  // TODO:
  //
  //$csv_output = 'Fecha de la acción realizada, ID, Referencia, Nombre y apellidos, Teléfono, Email, Ubicación del usuario, CP, Provincia, Empresa, Servicio demandado, API, Precio, Nombre servicio, Nombre ataúd, Nombre velatorio, Nombre despedida, Visitas, URL, Nombre acción, IP';
  $csv_output = 'ID,Tipo,Status,Titulo,Nombre,Direccion,Correo,Telefono,CategoriaProvincia,CategoriaPoblacion,Poblacion,CodigosProvincia,Funerarias,StreetView,Latitud,Longitud,Imagenes,ImagenDestacada,Landings,Servicios,Shortcode,URLLandings,Extracto,Descripcion,DescripcionServicios,Horarios,ComoLlegar';
  $csv_output .= "\n";
  foreach ( $post_list as $post ){

    $shortcode = get_post_meta( get_post_meta( $post->ID, 'wpfunos_entradaDirectorioShortcode', true ), 'wpfunos_shortcodeDirectorioNombre', true );

    //$funeraria = get_post_meta( get_post_meta( $post->ID, 'wpfunos_entradaDirectorioFuneraria', true ), 'wpfunos_funerariaDirectorioNombre', true );
    $funerarias = explode(',',get_post_meta( $post->ID, 'wpfunos_entradaDirectorioFuneraria', true ));
    $outputfunerarias = '';
    foreach( $funerarias as $funeraria ){
      $outputfunerarias .= get_the_title( $funeraria ).',';
    }
    $outputfunerarias = rtrim($outputfunerarias, ",");

    $landings = explode(',',get_post_meta(  $post->ID , 'wpfunos_entradaDirectorioLandings', true ));
    $outputlandings = '';
    foreach( $landings as $landing ){
      $outputlandings .= get_the_title( $landing ).',';
    }
    $outputlandings = rtrim($outputlandings, ",");

    $servicios = explode(',',get_post_meta(  $post->ID , 'wpfunos_entradaDirectorioServicios', true ));
    $outputservicios = '';
    foreach( $servicios as $servicio ){
      $outputservicios .= get_the_title( $servicio ).',';
    }
    $outputservicios = rtrim($outputservicios, ",");

    $imagenes = explode(',',get_post_meta(  $post->ID , 'wpfunos_entradaDirectorioImagenes', true ));
    $outputimagenes = '';
    foreach( $imagenes as $imagen ){
      $outputimagenes .= get_the_title( $imagen ).',';
    }
    $outputimagenes = rtrim($outputimagenes, ",");


    $excerpt = '';
    if (has_excerpt($post->ID )) {
      $excerpt = wp_strip_all_tags(get_the_excerpt( $post->ID ));
    }

    $term_list = wp_get_post_terms( $post->ID, 'directorio_poblacion', array( 'fields' => 'all' ) );

    //https://dev.funos.es/wp-admin/post.php?post=141187&action=edit

    $csv_output .= $post->ID.","; // ID
    $csv_output .= "tanatorio,";
    $csv_output .= get_post_status ( $post->ID ).",";
    $csv_output .= '"'.get_the_title( $post->ID ).'",';
    $csv_output .= '"'.get_post_meta( $post->ID, 'wpfunos_entradaDirectorioNombre', true ).'",';
    $csv_output .= '"'.get_post_meta( $post->ID, 'wpfunos_entradaDirectorioDireccion', true ).'",';
    $csv_output .= '"'.get_post_meta( $post->ID, 'wpfunos_entradaDirectorioCorreo', true ).'",';
    $csv_output .= '"'.get_post_meta( $post->ID, 'wpfunos_entradaDirectorioTelefono', true ).'",';
    $csv_output .= strtolower( get_the_category_by_ID( $term_list[0]->parent )).",";
    $csv_output .= strtolower( get_the_category_by_ID( $term_list[0]->term_taxonomy_id )).",";
    $csv_output .= '"'.get_post_meta( $post->ID, 'wpfunos_entradaDirectorioPoblacion', true ).'",';
    $csv_output .= '"'.get_post_meta( $post->ID, 'wpfunos_entradaDirectorioCodigoProvincia', true ).'",';
    $csv_output .= '"'.$outputfunerarias.'",';

    $csv_output .= get_post_meta( $post->ID, 'wpfunos_entradaDirectorioStreetView', true ).',';
    $csv_output .= '"'.get_post_meta( $post->ID, 'wpfunos_entradaDirectorioLatitud', true ).'",';
    $csv_output .= '"'.get_post_meta( $post->ID, 'wpfunos_entradaDirectorioLongitud', true ).'",';

    $csv_output .= '"'.$outputimagenes.'",';
    $csv_output .= '"'.get_the_title( get_post_thumbnail_id( $post->ID )).'",';
    $csv_output .= '"'.$outputlandings.'",';

    $csv_output .= '"'.$outputservicios.'",';

    $csv_output .= $shortcode.",";


    $csv_output .= '"'.get_post_meta( $post->ID, 'wpfunos_entradaDirectorioURLLandings', true ).'",';

    // chr(145) // left single quote
    // chr(146) // right single quote
    // chr(147) // left double quote
    // chr(148) // right double quote
    $csv_output .= '"'.$excerpt.'",';
    $csv_output .= '"'.get_post_meta( $post->ID, 'wpfunos_entradaDirectorioDescripcion', true ).'",';
    $csv_output .= '"'.get_post_meta( $post->ID, 'wpfunos_entradaDirectorioDescripcionServicios', true ).'",';
    $csv_output .= '"'.get_post_meta( $post->ID, 'wpfunos_entradaDirectorioHorario', true ).'",';
    $csv_output .= '"'.get_post_meta( $post->ID, 'wpfunos_entradaDirectorioComoLlegar', true ).'",';
    //
    $csv_output .= "\n";
  }
  $now = current_datetime();
  $upload_dir = wp_upload_dir();
  if (!file_exists( $upload_dir['basedir'] . '/wpfunos-exports') ) {
    mkdir( $upload_dir['basedir'] . '/wpfunos-exports' );
  }

  $URL = explode('/',home_url());
  $url= str_replace('.','-',$URL[2]);

  $file = $upload_dir['basedir'] . '/wpfunos-exports/export-tanatorios-'.$url.'-directorio-'. $now->format("d-m-Y-H-i") . '.csv';
  $filedownload = home_url(). '/wp-content/uploads/wpfunos-exports/export-tanatorios-'.$url.'-directorio-'. $now->format("d-m-Y-H-i") . '.csv';
  $open = fopen( $file, "w" );
  fputs( $open, $csv_output );
  fclose( $open );

  $Excelfile = $upload_dir['basedir'] . '/wpfunos-exports/export-tanatorios-'.$url.'-directorio-'. $now->format("d-m-Y-H-i") . '.xlsx';
  $Exceldownload = home_url(). '/wp-content/uploads/wpfunos-exports/export-tanatorios-'.$url.'-directorio-'. $now->format("d-m-Y-H-i") . '.xlsx';
  require WFUNOS_BASE_DIR.'/admin/partials/vendor/autoload.php';

  $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
  $spreadsheet = $reader->load($file);
  $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
  $writer->save($Excelfile);

  ?><h2>EXPORTACION FINALIZADA</h2><?php
  //https://dev.funos.es/var/www/vhosts/dev.funos.es/httpdocs/wp-content/uploads/wpfunos-exports/export-funerarias-directorio-03-04-2023-13-15.csv
  //https://dev.funos.es/wp-content/uploads/wpfunos-exports/export-funerarias-directorio-03-04-2023-13-15.csv
  ?><hr/><h2><a href="<?php echo $filedownload; ?>">DESCARGAR FICHERO CSV TANATORIOS</a></h2><?php
  ?><hr/><h2><a href="<?php echo $Exceldownload; ?>">DESCARGAR FICHERO EXCEL TANATORIOS</a></h2><?php
}
