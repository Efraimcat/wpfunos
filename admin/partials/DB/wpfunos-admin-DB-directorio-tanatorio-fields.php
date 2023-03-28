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
* @subpackage Wpfunos/admin/partials/DB
* @author     Efraim Bayarri <efraim@efraim.cat>
*/
$allowed_html = [
  'a' => [
    'id' => true,
    'href'  => true,
    'title' => true,
  ],
  'strong' => [],
  'h3' => [],
  'ul' => [],
  'li' => [],
  'b' => [],
];
$DirectorioLandings = '';
foreach( $_POST as $key => $val ) {
  if( strpos( $key, 'tanatorioDirectorio-' ) !== false ){
    $land = substr($key,20);
    //$this->custom_logs('$_POST key: ' .$key );
    //$this->custom_logs('$_POST val: ' .$val );
    //$this->custom_logs('$_POST land: ' .$land );
    $DirectorioLandings .= $land .',';
  }
}
$DirectorioServicios = '';
foreach( $_POST as $key => $val ) {
  if( strpos( $key, 'servicioDirectorio-' ) !== false ){
    $serv = substr($key,19);
    //$this->custom_logs('$_POST key: ' .$key );
    //$this->custom_logs('$_POST val: ' .$val );
    //$this->custom_logs('$_POST serv: ' .$serv );
    $DirectorioServicios .= $serv .',';
  }
}


$tanatorioDirectorioNombre = sanitize_text_field( $_POST['wpfunos_tanatorioDirectorioNombre'] );
$tanatorioDirectorioDireccion = sanitize_text_field( $_POST['wpfunos_tanatorioDirectorioDireccion'] );
$tanatorioDirectorioCorreo = sanitize_text_field( $_POST['wpfunos_tanatorioDirectorioCorreo'] );
$tanatorioDirectorioTelefono = sanitize_text_field( $_POST['wpfunos_tanatorioDirectorioTelefono'] );
$tanatorioDirectorioPoblacion = sanitize_text_field( $_POST['wpfunos_tanatorioDirectorioPoblacion'] );
$tanatorioDirectorioCodigoProvincia = sanitize_text_field( $_POST['wpfunos_tanatorioDirectorioCodigoProvincia'] );
$tanatorioDirectorioFuneraria = sanitize_text_field( $_POST['wpfunos_tanatorioDirectorioFuneraria'] );
$tanatorioDirectorioMarca = sanitize_text_field( $_POST['wpfunos_tanatorioDirectorioMarca'] );

$tanatorioDirectorioDescripcion = preg_replace('/^[ \t]*[\r\n]+/m', '', wp_kses( $_POST['wpfunos_tanatorioDirectorioDescripcion'], $allowed_html ));
$tanatorioDirectorioHorario = preg_replace('/^[ \t]*[\r\n]+/m', '', wp_kses( $_POST['wpfunos_tanatorioDirectorioHorario'], $allowed_html ));
$tanatorioDirectorioComoLlegar = preg_replace('/^[ \t]*[\r\n]+/m', '', wp_kses( $_POST['wpfunos_tanatorioDirectorioComoLlegar'], $allowed_html ));
$tanatorioDirectorioLatitud = sanitize_text_field( $_POST['wpfunos_tanatorioDirectorioLatitud'] );
$tanatorioDirectorioLongitud = sanitize_text_field( $_POST['wpfunos_tanatorioDirectorioLongitud'] );

$tanatorioDirectorioEntierroDesde = sanitize_text_field( $_POST['wpfunos_tanatorioDirectorioEntierroDesde'] ); //(calculado desde landings)
$tanatorioDirectorioIncineracionDesde = sanitize_text_field( $_POST['wpfunos_tanatorioDirectorioIncineracionDesde'] ); //(calculado desde landings)

$tanatorioDirectorioImagen1 = sanitize_text_field( $_POST['wpfunos_tanatorioDirectorioImagen1'] );
$tanatorioDirectorioImagen2 = sanitize_text_field( $_POST['wpfunos_tanatorioDirectorioImagen2'] );
$tanatorioDirectorioImagen3 = sanitize_text_field( $_POST['wpfunos_tanatorioDirectorioImagen3'] );
$tanatorioDirectorioImagen4 = sanitize_text_field( $_POST['wpfunos_tanatorioDirectorioImagen4'] );
$tanatorioDirectorioImagen5 = sanitize_text_field( $_POST['wpfunos_tanatorioDirectorioImagen5'] );

$tanatorioDirectorioLandings = sanitize_text_field( $_POST['wpfunos_tanatorioDirectorioLandings'] );

$tanatorioDirectorioServicios = sanitize_text_field( $_POST['wpfunos_tanatorioDirectorioServicios'] ); //(desde CPT directorio_servicio)
$tanatorioDirectorioDescripcionServicios = preg_replace('/^[ \t]*[\r\n]+/m', '', wp_kses( $_POST['wpfunos_tanatorioDirectorioDescripcionServicios'], $allowed_html ));

$tanatorioDirectorioUltimasDefunciones = sanitize_text_field( $_POST['wpfunos_tanatorioDirectorioUltimasDefunciones'] );

/**
* Street view
*/
update_post_meta($post_id, 'wpfunos_tanatorioDirectorioNombre', $tanatorioDirectorioNombre);
update_post_meta($post_id, 'wpfunos_tanatorioDirectorioDireccion', $tanatorioDirectorioDireccion);
update_post_meta($post_id, 'wpfunos_tanatorioDirectorioCorreo', $tanatorioDirectorioCorreo);
update_post_meta($post_id, 'wpfunos_tanatorioDirectorioTelefono', $tanatorioDirectorioTelefono);
update_post_meta($post_id, 'wpfunos_tanatorioDirectorioPoblacion', $tanatorioDirectorioPoblacion);
update_post_meta($post_id, 'wpfunos_tanatorioDirectorioCodigoProvincia', $tanatorioDirectorioCodigoProvincia);
update_post_meta($post_id, 'wpfunos_tanatorioDirectorioFuneraria', $tanatorioDirectorioFuneraria);
update_post_meta($post_id, 'wpfunos_tanatorioDirectorioMarca', $tanatorioDirectorioMarca);

update_post_meta($post_id, 'wpfunos_tanatorioDirectorioDescripcion', $tanatorioDirectorioDescripcion);
update_post_meta($post_id, 'wpfunos_tanatorioDirectorioHorario' , $tanatorioDirectorioHorario );
update_post_meta($post_id, 'wpfunos_tanatorioDirectorioComoLlegar', $tanatorioDirectorioComoLlegar);
update_post_meta($post_id, 'wpfunos_tanatorioDirectorioLatitud', $tanatorioDirectorioLatitud);
update_post_meta($post_id, 'wpfunos_tanatorioDirectorioLongitud', $tanatorioDirectorioLongitud);

update_post_meta($post_id, 'wpfunos_tanatorioDirectorioIncineracionDesde', $tanatorioDirectorioIncineracionDesde);
update_post_meta($post_id, 'wpfunos_tanatorioDirectorioEntierroDesde', $tanatorioDirectorioEntierroDesde);

update_post_meta($post_id, 'wpfunos_tanatorioDirectorioImagen1', $tanatorioDirectorioImagen1);
update_post_meta($post_id, 'wpfunos_tanatorioDirectorioImagen2', $tanatorioDirectorioImagen2);
update_post_meta($post_id, 'wpfunos_tanatorioDirectorioImagen3', $tanatorioDirectorioImagen3);
update_post_meta($post_id, 'wpfunos_tanatorioDirectorioImagen4', $tanatorioDirectorioImagen4);
update_post_meta($post_id, 'wpfunos_tanatorioDirectorioImagen5', $tanatorioDirectorioImagen5);

update_post_meta($post_id, 'wpfunos_tanatorioDirectorioLandings', $DirectorioLandings);

update_post_meta($post_id, 'wpfunos_tanatorioDirectorioServicios', $DirectorioServicios);
update_post_meta($post_id, 'wpfunos_tanatorioDirectorioDescripcionServicios', $tanatorioDirectorioDescripcionServicios);

update_post_meta($post_id, 'wpfunos_tanatorioDirectorioUltimasDefunciones', $tanatorioDirectorioUltimasDefunciones);
