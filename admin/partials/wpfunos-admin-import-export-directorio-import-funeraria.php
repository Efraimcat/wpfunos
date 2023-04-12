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
// look for nonce
if ( empty( $_POST['wpfunos_import_funeraria_nonce'] ) ) {
  ?><h2>ERROR AL IMPORTAR FICHERO DIRECTORIO</h2><?php
  wp_die( __( 'Cheatin\' eh?!', 'wpfunos' ) );
}
// verify nonce
if ( ! wp_verify_nonce( $_POST['wpfunos_import_funeraria_nonce'], 'wpfunos_import_funeraria_nonce' ) ) {
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

foreach ( $array as $keylinea=>$linea ) {
  if ($keylinea == 0){
    $cabecera = array();
    foreach ( $linea as $keycolumna => $columna){
      $cabecera[] = sanitize_text_field( $columna );
    }
    continue;
  }

  foreach ( $cabecera as $key => $valor){
    if( $valor == 'Tipo') $lineaTipo = $key;
    if( $valor == 'ID') $lineaID = $key;
    if( $valor == 'CategoriaProvincia') $lineaCategoriaProvincia = $key;
    if( $valor == 'CategoriaPoblacion') $lineaCategoriaPoblacion = $key;
  }
  $this->import_logs('---------------------------');
  if( $linea[$lineaTipo] != 'funeraria' ){
    echo '<br/>Linea ' .$keylinea. ' NO es una funeraria';
    $this->import_logs('Linea ' .$keylinea. ' NO es una funeraria');
    continue;
  }

  $CategoriaPoblacion = sanitize_text_field( apply_filters('wpfunos_acentos_minusculas', $linea[$lineaCategoriaPoblacion]) );
  $CategoriaProvincia = sanitize_text_field( apply_filters('wpfunos_acentos_minusculas', $linea[$lineaCategoriaProvincia]) );

  $post_id = $linea[$lineaID];
  $nuevo = 'no';
  if ( $post_id == '' ){
    $nuevo = 'si';
    echo '<br/>Linea ' .$keylinea. ' es un una nueva funeraria';
    $this->import_logs('Linea ' .$keylinea. ' es un una nueva funeraria');
    $post_id = wp_insert_post(array (
      'post_type' => 'funerarias',
      'post_status' => 'draft',
      'meta_input'  => [ 'ast-featured-img' => 'disabled', 'site-post-title' => 'disabled', 'ast-breadcrumbs-content' => 'disabled', 'ast-main-header-display' => 'disabled', 'site-content-layout' => 'page-builder' ]
    ));
  }

  echo '<br/>Linea ' .$keylinea. ' entrada (' .$post_id. ') '. get_the_title($post_id);
  $this->import_logs('Linea ' .$keylinea. ' entrada (' .$post_id. ') '. get_the_title($post_id));

  foreach ( $linea as $key => $columna){
    //$columna = sanitize_text_field( $columna );
    // CATEGORIA
    if ($cabecera[$key] == 'CategoriaPoblacion' ){
      if( strlen($CategoriaPoblacion) < 1 && strlen($CategoriaProvincia) < 1 ){
        echo '<br/>Categoria sin definir';
        $this->import_logs('Categoria sin definir');
        continue;
      }

      $term = get_term_by('slug', $columna , 'funeraria_poblacion' );
      if ( $term ) $ID_categoria = $term->term_id;

      if ( !$term ){
        echo '<br/>No existe la categoria poblacion ' .$columna. ' .Creando categoria';
        $this->import_logs('No existe la categoria poblacion ' .$columna. ' .Creando categoria');
        $termprovincia = get_term_by('slug', $CategoriaProvincia , 'funeraria_poblacion' );
        if( $termprovincia ) $ID_provincia = $termprovincia->term_id;

        if( !$termprovincia ){
          echo '<br/>No existe la categoria provincia ' .$CategoriaProvincia. ' .Creando categoria';
          $this->import_logs('No existe la categoria provincia ' .$CategoriaProvincia. ' .Creando categoria');
          $NombreProvincia = ucfirst( $CategoriaProvincia ); //Make a string's first character uppercase
          $new_provincia = wp_insert_term(
            $NombreProvincia,   // the term
            'funeraria_poblacion', // the taxonomy
            array(
              'description' => $CategoriaProvincia,
              'slug'        => $CategoriaProvincia,
              'parent'      => 650,
            )
          );
          $ID_provincia = $new_provincia['term_id'];
          echo '<br/>Categoria provincia ' .$CategoriaProvincia. ' creada. ID: ' .$ID_provincia ;
          $this->import_logs('Categoria provincia ' .$CategoriaProvincia. ' creada. ID: ' .$ID_provincia);
        }// END No existe provincia

        $NombrePoblacion = ucfirst( $CategoriaPoblacion ); //Make a string's first character uppercase
        $new_categoria = wp_insert_term(
          $NombrePoblacion,   // the term
          'funeraria_poblacion', // the taxonomy
          array(
            'description' => $CategoriaPoblacion,
            'slug'        => $CategoriaPoblacion,
            'parent'      => $ID_provincia,
          )
        );
        $ID_categoria = $new_categoria['term_id'];
        echo '<br/>Categoria población ' .$CategoriaPoblacion. ' creada. ID: ' .$ID_categoria ;
        $this->import_logs('Categoria población ' .$CategoriaPoblacion. ' creada. ID: ' .$ID_categoria);
      }// END No existe categoria

      wp_set_post_terms( $post_id, array( $ID_categoria ), 'funeraria_poblacion' );
    }// END if ($cabecera[$key] == 'CategoriaPoblacion' )

    // TITULO
    if ($cabecera[$key] == 'Titulo' ) wp_update_post( array( 'ID' => $post_id, 'post_title' => $columna ) );
    if ($cabecera[$key] == 'Status' ){
      if( $nuevo == 'si'){
        wp_update_post( array( 'ID' => $post_id, 'post_status' => 'draft' ) );
      }else{
        wp_update_post( array( 'ID' => $post_id, 'post_status' => $columna ) );
      }
    }
    //  ImagenDestacada
    if ($cabecera[$key] == 'ImagenDestacada' ){
      $columna = apply_filters('wpfunos_acentos_minusculas', $columna );
      $args = array(
        'posts_per_page' => 1,
        'post_type'      => 'attachment',
        'name'           => trim( $columna ),
      );
      $wp_query = new WP_Query( $args );
      if ( $wp_query->have_posts() ){
        $wp_query->the_post();
        //echo '<br/>Imagen destacada ' .$columna. ' ID: ' .$wp_query->post->ID. ' => creada. post: ' .$post_id ;
        //$this->import_logs('Imagen destacada ' .$columna. ' ID: ' .$wp_query->post->ID. ' => creada. post: ' .$post_id );
        set_post_thumbnail( $post_id,  $wp_query->post->ID );
      }else{
        echo '<br/>Imagen destacada ' .$columna. ' NO CREADA. post: ' .$post_id ;
        $this->import_logs('Imagen destacada ' .$columna. ' NO CREADA. post: ' .$post_id);
      }
      wp_reset_postdata();
    }
    //
    if ($cabecera[$key] == 'Nombre' ) update_post_meta($post_id, 'wpfunos_entradaDirectorioNombre', sanitize_text_field( $columna ));
    if ($cabecera[$key] == 'Nombre' ) update_post_meta($post_id, 'wpfunos_funerariaDirectorioNombre', sanitize_text_field( $columna) );
    if ($cabecera[$key] == 'Direccion' ) update_post_meta($post_id, 'wpfunos_funerariaDirectorioDireccion', sanitize_text_field( $columna) );
    if ($cabecera[$key] == 'Correo' ) update_post_meta($post_id, 'wpfunos_funerariaDirectorioCorreo', sanitize_text_field( $columna) );
    if ($cabecera[$key] == 'Telefono' ) update_post_meta($post_id, 'wpfunos_funerariaDirectorioTelefono', sanitize_text_field( $columna) );
    if ($cabecera[$key] == 'Poblacion' ) update_post_meta($post_id, 'wpfunos_funerariaDirectorioPoblacion',  sanitize_text_field( $columna ) );
    if ($cabecera[$key] == 'CodigosProvincia' ){
      if( strlen( $columna ) != 2 ) $columna = '0' .$columna;
      update_post_meta($post_id, 'wpfunos_funerariaDirectorioCodigoProvincia',  sanitize_text_field( $columna) );
    }
    if ($cabecera[$key] == 'StreetView' ) update_post_meta($post_id, 'wpfunos_funerariaDirectorioStreetView', sanitize_text_field( $columna ));
    if ($cabecera[$key] == 'Latitud' ) update_post_meta($post_id, 'wpfunos_funerariaDirectorioLatitud', sanitize_text_field( $columna) );
    if ($cabecera[$key] == 'Longitud' ) update_post_meta($post_id, 'wpfunos_funerariaDirectorioLongitud', sanitize_text_field( $columna) );
    // Imagenes
    if ($cabecera[$key] == 'Imagenes' ){
      $columna = apply_filters('wpfunos_acentos_minusculas', $columna );
      $columnaimagenes = explode(',',$columna);
      $outputimagenes = '';
      foreach( $columnaimagenes as $columnaimagen ){
        $args = array(
          'posts_per_page' => 1,
          'post_type'      => 'attachment',
          'name'           => trim( $columnaimagen ),
        );
        $wp_query = new WP_Query( $args );
        if ( $wp_query->have_posts() ){
          $wp_query->the_post();
          $outputimagenes .=  $wp_query->post->ID . ',' ;
          //echo '<br/>Imagen ' .$columnaimagen. ' ID: ' .$wp_query->post->ID;
          //$this->import_logs('Imagen ' .$columnaimagen. ' ID: ' .$wp_query->post->ID);
        }else{
          echo '<br/>Imagen ' .$columnaimagen. ' NO CREADA.';
          $this->import_logs('Imagen ' .$columnaimagen. ' NO CREADA.');
        }
        wp_reset_postdata();
      }
      $outputimagenes = rtrim($outputimagenes, ",");
      //echo '<br/>Imagenes: ' .$outputimagenes;
      update_post_meta($post_id, 'wpfunos_funerariaDirectorioImagenes', sanitize_text_field( $outputimagenes ));
    }
    // Landings
    if ($cabecera[$key] == 'Landings' ){
      $columna = apply_filters('wpfunos_acentos_minusculas', $columna );
      $columnalandings = explode(',',$columna);
      $outputlandings = '';
      foreach( $columnalandings as $columnalanding ){
        $args = array(
          'post_type'        => 'precio_funer_wpfunos',
          'title'            => $columnalanding,
          'post_status'      => 'publish',
        );
        $wp_query = new WP_Query( $args );
        if ( $wp_query->have_posts() ){
          $wp_query->the_post();
          $outputlandings .=  $wp_query->post->ID . ',' ;
          //echo '<br/>Landing ' .$columnalanding. ' ID: ' .$wp_query->post->ID;
          //$this->import_logs('Landing ' .$columnalanding. ' ID: ' .$wp_query->post->ID);
        }else{
          echo '<br/>Landing ' .$columnalanding. ' NO CREADA.';
          $this->import_logs('Landing ' .$columnalanding. ' NO CREADA.');
        }
        wp_reset_postdata();
      }
      $outputlandings = rtrim($outputlandings, ",");
      //echo '<br/>Landings: ' .$outputlandings;
      update_post_meta($post_id, 'wpfunos_funerariaDirectorioLandings', sanitize_text_field( $outputlandings ));
    }
    // "Servicios"
    if ($cabecera[$key] == 'Servicios' ){
      $columna = apply_filters('wpfunos_acentos_minusculas', $columna );
      $columnaservicios = explode(',',$columna);
      $outputservicios = '';
      foreach( $columnaservicios as $columnaservicio ){
        $args = array(
          'post_type'        => 'directorio_servicio',
          'title'            => $columnaservicio,
          'post_status'      => 'publish',
        );
        $wp_query = new WP_Query( $args );
        if ( $wp_query->have_posts() ){
          $wp_query->the_post();
          $outputservicios .=  $wp_query->post->ID . ',' ;
          //echo '<br/>Servicio ' .$columnaservicio. ' ID: ' .$wp_query->post->ID;
          //$this->import_logs('Servicio ' .$columnaservicio. ' ID: ' .$wp_query->post->ID);
        }else{
          echo '<br/>Servicio ' .$columnaservicio. ' NO CREADA.';
          $this->import_logs('Servicio ' .$columnaservicio. ' NO CREADA.');
        }
        wp_reset_postdata();
      }
      $outputservicios = rtrim($outputservicios, ",");
      //echo '<br/>Servicios: ' .$outputservicios;
      update_post_meta($post_id, 'wpfunos_funerariaDirectorioServicios', sanitize_text_field( $outputservicios ));
    }
    // "Shortcode"
    if ($cabecera[$key] == 'Shortcode' ){
      $columna = apply_filters('wpfunos_acentos_minusculas', $columna );
      $args = array(
        'post_type' => 'directorio_shortcode',
        'post_status' => 'publish',
        'meta_query' => array(
          array( 'key' => 'wpfunos_shortcodeDirectorioNombre', 'value' => $columna, 'compare' => '=', ),
        ),
      );
      $wp_query = new WP_Query( $args );
      if ( $wp_query->have_posts() ){
        $wp_query->the_post();
        //echo '<br/>Shortcode ' .$columna. ' ID: ' .$wp_query->post->ID;
        //$this->import_logs('Shortcode ' .$columna. ' ID: ' .$wp_query->post->ID );
        update_post_meta($post_id, 'wpfunos_funerariaDirectorioShortcode', sanitize_text_field( $wp_query->post->ID ));
      }else{
        echo '<br/>Shortcode ' .$columna. ' NO CREADA.';
        $this->import_logs('Shortcode ' .$columna. ' NO CREADA.');
      }
      wp_reset_postdata();
    }
    //
    if ($cabecera[$key] == 'URLLandings' ) update_post_meta($post_id, 'wpfunos_funerariaDirectorioURLLandings', sanitize_text_field( $columna ));
    //if ($cabecera[$key] == 'Slug' ) wp_insert_post(array( 'ID'=>$post_id, 'post_name' => $columna ));
    if ($cabecera[$key] == 'Extracto' ) wp_update_post(array( 'ID'=>$post_id, 'post_excerpt' => wp_kses_post( substr( $columna, 3, -3)  ) ));
    if ($cabecera[$key] == 'Descripcion' ) update_post_meta($post_id, 'wpfunos_funerariaDirectorioDescripcion',  wp_kses_post( substr( $columna, 3, -3) ) );
    if ($cabecera[$key] == 'DescripcionServicios' ) update_post_meta($post_id, 'wpfunos_funerariaDirectorioDescripcionServicios', wp_kses_post( substr( $columna, 3, -3) ) );
    if ($cabecera[$key] == 'Horarios' ) update_post_meta($post_id, 'wpfunos_funerariaDirectorioHorario',  wp_kses_post( substr( $columna, 3, -3) ) );
    if ($cabecera[$key] == 'ComoLlegar' ) update_post_meta($post_id, 'wpfunos_funerariaDirectorioComoLlegar',  wp_kses_post( substr( $columna, 3, -3) ) );

  }// END foreach ( $linea as $key => $columna)

}
