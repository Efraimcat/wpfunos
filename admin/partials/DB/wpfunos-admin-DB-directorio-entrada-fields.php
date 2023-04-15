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
$DirectorioLandings = '';
foreach( $_POST as $key => $val ) {
  if( strpos( $key, 'landingDirectorio-' ) !== false ){
    $land = substr($key,18);
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
$DirectorioTanatorios = '';
foreach( $_POST as $key => $val ) {
  if( strpos( $key, 'tanatoriosDirectorio-' ) !== false ){
    $land = substr($key,21);
    //$this->custom_logs('$_POST key: ' .$key );
    //$this->custom_logs('$_POST val: ' .$val );
    //$this->custom_logs('$_POST land: ' .$land );
    $DirectorioTanatorios .= $land .',';
  }
}


$entradaDirectorioShortcode = sanitize_text_field( $_POST['wpfunos_entradaDirectorioShortcode'] );
$entradaDirectorioStreetView = sanitize_text_field( $_POST['wpfunos_entradaDirectorioStreetView'] );
$entradaDirectorioCarrusel = sanitize_text_field( $_POST['wpfunos_entradaDirectorioCarrusel'] );
$entradaDirectorioTanatoriosCercanos = sanitize_text_field( $_POST['wpfunos_entradaDirectorioTanatoriosCercanos'] );

$entradaDirectorioNombre = sanitize_text_field( $_POST['wpfunos_entradaDirectorioNombre'] );
$entradaDirectorioDireccion = sanitize_text_field( $_POST['wpfunos_entradaDirectorioDireccion'] );
$entradaDirectorioCorreo = sanitize_text_field( $_POST['wpfunos_entradaDirectorioCorreo'] );
$entradaDirectorioTelefono = sanitize_text_field( $_POST['wpfunos_entradaDirectorioTelefono'] );
$entradaDirectorioPoblacion = sanitize_text_field( $_POST['wpfunos_entradaDirectorioPoblacion'] );
$entradaDirectorioCodigoProvincia = sanitize_text_field( $_POST['wpfunos_entradaDirectorioCodigoProvincia'] );
$entradaDirectorioFuneraria = sanitize_text_field( $_POST['wpfunos_entradaDirectorioFuneraria'] );

$entradaDirectorioDescripcion = preg_replace('/^[ \t]*[\r\n]+/m', '', wp_kses_post( $_POST['wpfunos_entradaDirectorioDescripcion']));
$entradaDirectorioHorario = preg_replace('/^[ \t]*[\r\n]+/m', '', wp_kses_post( $_POST['wpfunos_entradaDirectorioHorario']));
$entradaDirectorioComoLlegar = preg_replace('/^[ \t]*[\r\n]+/m', '', wp_kses_post( $_POST['wpfunos_entradaDirectorioComoLlegar']));
$entradaDirectorioLatitud = sanitize_text_field( $_POST['wpfunos_entradaDirectorioLatitud'] );
$entradaDirectorioLongitud = sanitize_text_field( $_POST['wpfunos_entradaDirectorioLongitud'] );

$entradaDirectorioEntierroDesde = sanitize_text_field( $_POST['wpfunos_entradaDirectorioEntierroDesde'] ); //(calculado desde landings)
$entradaDirectorioIncineracionDesde = sanitize_text_field( $_POST['wpfunos_entradaDirectorioIncineracionDesde'] ); //(calculado desde landings)

$entradaDirectorioImagenes = sanitize_text_field( $_POST['wpfunos_entradaDirectorioImagenes'] );

$entradaDirectorioLandings = sanitize_text_field( $_POST['wpfunos_entradaDirectorioLandings'] );
$entradaDirectorioURLLandings = esc_url( $_POST['wpfunos_entradaDirectorioURLLandings'] );
$entradaDirectorioURLBuscador = esc_url( $_POST['wpfunos_entradaDirectorioURLBuscador'] );
$entradaDirectorioURLBuscadorDistancia = sanitize_text_field( $_POST['wpfunos_entradaDirectorioURLBuscadorDistancia'] );

$entradaDirectorioServicios = sanitize_text_field( $_POST['wpfunos_entradaDirectorioServicios'] ); //(desde CPT directorio_servicio)
$entradaDirectorioDescripcionServicios = preg_replace('/^[ \t]*[\r\n]+/m', '', wp_kses_post( $_POST['wpfunos_entradaDirectorioDescripcionServicios']));

$entradaDirectorioUltimasDefunciones = sanitize_text_field( $_POST['wpfunos_entradaDirectorioUltimasDefunciones'] );



update_post_meta($post_id, 'wpfunos_entradaDirectorioShortcode', $entradaDirectorioShortcode);
update_post_meta($post_id, 'wpfunos_entradaDirectorioStreetView', $entradaDirectorioStreetView);
update_post_meta($post_id, 'wpfunos_entradaDirectorioCarrusel', $entradaDirectorioCarrusel);
update_post_meta($post_id, 'wpfunos_entradaDirectorioTanatoriosCercanos', $DirectorioTanatorios);

update_post_meta($post_id, 'wpfunos_entradaDirectorioNombre', $entradaDirectorioNombre);
update_post_meta($post_id, 'wpfunos_entradaDirectorioDireccion', $entradaDirectorioDireccion);
update_post_meta($post_id, 'wpfunos_entradaDirectorioCorreo', $entradaDirectorioCorreo);
update_post_meta($post_id, 'wpfunos_entradaDirectorioTelefono', $entradaDirectorioTelefono);
update_post_meta($post_id, 'wpfunos_entradaDirectorioPoblacion', $entradaDirectorioPoblacion);
update_post_meta($post_id, 'wpfunos_entradaDirectorioCodigoProvincia', $entradaDirectorioCodigoProvincia);
update_post_meta($post_id, 'wpfunos_entradaDirectorioFuneraria', $entradaDirectorioFuneraria);

update_post_meta($post_id, 'wpfunos_entradaDirectorioDescripcion', $entradaDirectorioDescripcion);
update_post_meta($post_id, 'wpfunos_entradaDirectorioHorario' , $entradaDirectorioHorario );
update_post_meta($post_id, 'wpfunos_entradaDirectorioComoLlegar', $entradaDirectorioComoLlegar);
update_post_meta($post_id, 'wpfunos_entradaDirectorioLatitud', $entradaDirectorioLatitud);
update_post_meta($post_id, 'wpfunos_entradaDirectorioLongitud', $entradaDirectorioLongitud);

update_post_meta($post_id, 'wpfunos_entradaDirectorioIncineracionDesde', $entradaDirectorioIncineracionDesde);
update_post_meta($post_id, 'wpfunos_entradaDirectorioEntierroDesde', $entradaDirectorioEntierroDesde);

update_post_meta($post_id, 'wpfunos_entradaDirectorioImagenes', $entradaDirectorioImagenes);

update_post_meta($post_id, 'wpfunos_entradaDirectorioLandings', $DirectorioLandings);
update_post_meta($post_id, 'wpfunos_entradaDirectorioURLLandings', $entradaDirectorioURLLandings);
update_post_meta($post_id, 'wpfunos_entradaDirectorioURLBuscador', $entradaDirectorioURLBuscador);
update_post_meta($post_id, 'wpfunos_entradaDirectorioURLBuscadorDistancia', $entradaDirectorioURLBuscadorDistancia);

update_post_meta($post_id, 'wpfunos_entradaDirectorioServicios', $DirectorioServicios);
update_post_meta($post_id, 'wpfunos_entradaDirectorioDescripcionServicios', $entradaDirectorioDescripcionServicios);

update_post_meta($post_id, 'wpfunos_entradaDirectorioUltimasDefunciones', $entradaDirectorioUltimasDefunciones);
