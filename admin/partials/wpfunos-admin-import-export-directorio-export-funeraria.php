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
if ( empty( $_POST['wpfunos_import_funerarias_nonce'] ) ) {
  ?><h2>ERROR AL EXPORTAR FICHERO DIRECTORIO</h2><?php
  wp_die( __( 'Cheatin\' eh?!', 'wpfunos' ) );
}
// verify nonce
if ( ! wp_verify_nonce( $_POST['wpfunos_import_funerarias_nonce'], 'wpfunos_import_funerarias_nonce' ) ) {
  ?><h2>ERROR AL EXPORTAR FICHERO DIRECTORIO</h2><?php
  wp_die( __( 'Cheatin\' eh?!', 'wpfunos' ) );
}
?><h2>EXPORTANDO FICHERO FUNERARIAS DIRECTORIO</h2><?php
$args = array(
  'post_status' => 'any',
  'post_type' => 'directorio_funeraria',
  'posts_per_page' => -1,
);
$post_list = get_posts( $args );
if( $post_list ){
  //$term_obj_list = get_the_terms( $post->ID, 'directorio_poblacion' );
  //cabecera
  //
  // TODO:
  //
  //$csv_output = 'Fecha de la acción realizada, ID, Referencia, Nombre y apellidos, Teléfono, Email, Ubicación del usuario, CP, Provincia, Empresa, Servicio demandado, API, Precio, Nombre servicio, Nombre ataúd, Nombre velatorio, Nombre despedida, Visitas, URL, Nombre acción, IP';
  $csv_output = 'ID,Tipo,Status,Titulo,Nombre,Direccion,Correo,Telefono,CategoriaProvincia,CategoriaPoblacion,Poblacion,CodigosProvincia,StreetView,Latitud,Longitud,IDImagenes,ImagenDestacada,Landings,IDLandings,Servicios,IDServicios,Shortcode,IDShortcode,URLLandings,Extracto,Descripcion,DescripcionServicios,Horarios,ComoLlegar';
  $csv_output .= "\n";
  foreach ( $post_list as $post ){

    $shortcode = get_post_meta( get_post_meta( $post->ID, 'wpfunos_funerariaDirectorioShortcode', true ), 'wpfunos_shortcodeDirectorioNombre', true );

    $landings = explode(',',get_post_meta(  $post->ID , 'wpfunos_funerariaDirectorioLandings', true ));
    $outputlandings = '';
    foreach( $landings as $landing ){
      $outputlandings .= get_the_title( $landing ).',';
    }
    $outputlandings = rtrim($outputlandings, ",");

    $servicios = explode(',',get_post_meta(  $post->ID , 'wpfunos_funerariaDirectorioServicios', true ));
    $outputservicios = '';
    foreach( $servicios as $servicio ){
      $outputservicios .= get_the_title( $servicio ).',';
    }
    $outputservicios = rtrim($outputservicios, ",");

    $excerpt = '';
    if (has_excerpt($post->ID )) {
      $excerpt = wp_strip_all_tags(get_the_excerpt( $post->ID ));
    }

    $term_list = wp_get_post_terms( $post->ID, 'funeraria_poblacion', array( 'fields' => 'all' ) );

    $csv_output .= $post->ID.","; // ID
    $csv_output .= "funeraria,";
    $csv_output .= get_post_status ( $post->ID ).",";
    $csv_output .= '"'.get_the_title( $post->ID ).'",';
    $csv_output .= '"'.get_post_meta( $post->ID, 'wpfunos_funerariaDirectorioNombre', true ).'",';
    $csv_output .= '"'.get_post_meta( $post->ID, 'wpfunos_funerariaDirectorioDireccion', true ).'",';
    $csv_output .= '"'.get_post_meta( $post->ID, 'wpfunos_funerariaDirectorioCorreo', true ).'",';
    $csv_output .= '"'.get_post_meta( $post->ID, 'wpfunos_funerariaDirectorioTelefono', true ).'",';
    $csv_output .= strtolower( get_the_category_by_ID( $term_list[0]->parent )).",";
    $csv_output .= strtolower( get_the_category_by_ID( $term_list[0]->term_taxonomy_id )).",";
    $csv_output .= '"'.get_post_meta( $post->ID, 'wpfunos_funerariaDirectorioPoblacion', true ).'",';
    $csv_output .= '"'.get_post_meta( $post->ID, 'wpfunos_funerariaDirectorioCodigoProvincia', true ).'",';
    $csv_output .= get_post_meta( $post->ID, 'wpfunos_funerariaDirectorioStreetView', true ).',';
    $csv_output .= '"'.get_post_meta( $post->ID, 'wpfunos_funerariaDirectorioLatitud', true ).'",';
    $csv_output .= '"'.get_post_meta( $post->ID, 'wpfunos_funerariaDirectorioLongitud', true ).'",';
    $csv_output .= '"'.get_post_meta( $post->ID, 'wpfunos_funerariaDirectorioImagenes', true ).'",';
    $csv_output .= '"'.get_post_thumbnail_id( $post->ID ).'",';
    $csv_output .= '"'.$outputlandings.'",';
    $csv_output .= '"'.get_post_meta( $post->ID, 'wpfunos_funerariaDirectorioLandings', true ).'",';
    $csv_output .= '"'.$outputservicios.'",';
    $csv_output .= '"'.get_post_meta( $post->ID, 'wpfunos_funerariaDirectorioServicios', true ).'",';
    $csv_output .= $shortcode.',';
    $csv_output .= '"'.get_post_meta( $post->ID, 'wpfunos_funerariaDirectorioShortcode', true ).'",';

    $csv_output .= '"'.get_post_meta( $post->ID, 'wpfunos_funerariaDirectorioURLLandings', true ).'",';

    // chr(145) // left single quote
    // chr(146) // right single quote
    // chr(147) // left double quote
    // chr(148) // right double quote

    $csv_output .= '"'.$excerpt.'",';
    $csv_output .= '"'.get_post_meta( $post->ID, 'wpfunos_funerariaDirectorioDescripcion', true ).'",';
    $csv_output .= '"'.get_post_meta( $post->ID, 'wpfunos_funerariaDirectorioDescripcionServicios', true ).'",';
    $csv_output .= '"'.get_post_meta( $post->ID, 'wpfunos_funerariaDirectorioHorario', true ).'",';
    $csv_output .= '"'.get_post_meta( $post->ID, 'wpfunos_funerariaDirectorioComoLlegar', true ).'",';
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

  $file = $upload_dir['basedir'] . '/wpfunos-exports/export-funerarias-'.$url.'-directorio-'. $now->format("d-m-Y-H-i") . '.csv';
  $filedownload = home_url(). '/wp-content/uploads/wpfunos-exports/export-funerarias-'.$url.'-directorio-'. $now->format("d-m-Y-H-i") . '.csv';
  $open = fopen( $file, "w" );
  fputs( $open, $csv_output );
  fclose( $open );

  $Excelfile = $upload_dir['basedir'] . '/wpfunos-exports/export-funerarias-'.$url.'-directorio-'. $now->format("d-m-Y-H-i") . '.xlsx';
  $Exceldownload = home_url(). '/wp-content/uploads/wpfunos-exports/export-funerarias-'.$url.'-directorio-'. $now->format("d-m-Y-H-i") . '.xlsx';
  require WFUNOS_BASE_DIR.'/admin/partials/vendor/autoload.php';

  $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
  $spreadsheet = $reader->load($file);
  $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
  $writer->save($Excelfile);

  ?><h2>EXPORTACION FINALIZADA</h2><?php
  //https://dev.funos.es/var/www/vhosts/dev.funos.es/httpdocs/wp-content/uploads/wpfunos-exports/export-funerarias-directorio-03-04-2023-13-15.csv
  //https://dev.funos.es/wp-content/uploads/wpfunos-exports/export-funerarias-directorio-03-04-2023-13-15.csv
  ?><hr/><h2><a href="<?php echo $filedownload; ?>">DESCARGAR FICHERO CSV FUNERARIAS</a></h2><?php
  ?><hr/><h2><a href="<?php echo $Exceldownload; ?>">DESCARGAR FICHERO EXCEL FUNERARIAS</a></h2><?php
}
