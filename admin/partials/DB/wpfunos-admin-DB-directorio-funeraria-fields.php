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
    'style' => true,
    'id' => true,
    'href'  => true,
    'title' => true,
  ],
  'p' => [
    'style' => true,
  ],
  'strong' => [],
  'h3' => [],
  'ul' => [],
  'li' => [],
  'b' => [],
  'del' => [],
  'em' => [],
  'i' => [],
];
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

$funerariaDirectorioShortcode = sanitize_text_field( $_POST['wpfunos_funerariaDirectorioShortcode'] );

$funerariaDirectorioNombre = sanitize_text_field( $_POST['wpfunos_funerariaDirectorioNombre'] );
$funerariaDirectorioDireccion = sanitize_text_field( $_POST['wpfunos_funerariaDirectorioDireccion'] );
$funerariaDirectorioCorreo = sanitize_text_field( $_POST['wpfunos_funerariaDirectorioCorreo'] );
$funerariaDirectorioTelefono = sanitize_text_field( $_POST['wpfunos_funerariaDirectorioTelefono'] );
$funerariaDirectorioPoblacion = sanitize_text_field( $_POST['wpfunos_funerariaDirectorioPoblacion'] );
$funerariaDirectorioCodigoProvincia = sanitize_text_field( $_POST['wpfunos_funerariaDirectorioCodigoProvincia'] );

$funerariaDirectorioDescripcion = preg_replace('/^[ \t]*[\r\n]+/m', '', wp_kses( $_POST['wpfunos_funerariaDirectorioDescripcion'], $allowed_html ));
$funerariaDirectorioHorario = preg_replace('/^[ \t]*[\r\n]+/m', '', wp_kses( $_POST['wpfunos_funerariaDirectorioHorario'], $allowed_html ));
$funerariaDirectorioComoLlegar = preg_replace('/^[ \t]*[\r\n]+/m', '', wp_kses( $_POST['wpfunos_funerariaDirectorioComoLlegar'], $allowed_html ));
$funerariaDirectorioLatitud = sanitize_text_field( $_POST['wpfunos_funerariaDirectorioLatitud'] );
$funerariaDirectorioLongitud = sanitize_text_field( $_POST['wpfunos_funerariaDirectorioLongitud'] );

$funerariaDirectorioEntierroDesde = sanitize_text_field( $_POST['wpfunos_funerariaDirectorioEntierroDesde'] ); //(calculado desde landings)
$funerariaDirectorioIncineracionDesde = sanitize_text_field( $_POST['wpfunos_funerariaDirectorioIncineracionDesde'] ); //(calculado desde landings)

$funerariaDirectorioImagenes = sanitize_text_field( $_POST['wpfunos_funerariaDirectorioImagenes'] );

$funerariaDirectorioLandings = sanitize_text_field( $_POST['wpfunos_funerariaDirectorioLandings'] );

$funerariaDirectorioServicios = sanitize_text_field( $_POST['wpfunos_funerariaDirectorioServicios'] ); //(desde CPT directorio_servicio)
$funerariaDirectorioDescripcionServicios = preg_replace('/^[ \t]*[\r\n]+/m', '', wp_kses( $_POST['wpfunos_funerariaDirectorioDescripcionServicios'], $allowed_html ));

$funerariaDirectorioUltimasDefunciones = sanitize_text_field( $_POST['wpfunos_funerariaDirectorioUltimasDefunciones'] );

/**
* Street view
*/

update_post_meta($post_id, 'wpfunos_funerariaDirectorioShortcode', $funerariaDirectorioShortcode);

update_post_meta($post_id, 'wpfunos_funerariaDirectorioNombre', $funerariaDirectorioNombre);
update_post_meta($post_id, 'wpfunos_funerariaDirectorioDireccion', $funerariaDirectorioDireccion);
update_post_meta($post_id, 'wpfunos_funerariaDirectorioCorreo', $funerariaDirectorioCorreo);
update_post_meta($post_id, 'wpfunos_funerariaDirectorioTelefono', $funerariaDirectorioTelefono);
update_post_meta($post_id, 'wpfunos_funerariaDirectorioPoblacion', $funerariaDirectorioPoblacion);
update_post_meta($post_id, 'wpfunos_funerariaDirectorioCodigoProvincia', $funerariaDirectorioCodigoProvincia);

update_post_meta($post_id, 'wpfunos_funerariaDirectorioDescripcion', $funerariaDirectorioDescripcion);
update_post_meta($post_id, 'wpfunos_funerariaDirectorioHorario' , $funerariaDirectorioHorario );
update_post_meta($post_id, 'wpfunos_funerariaDirectorioComoLlegar', $funerariaDirectorioComoLlegar);
update_post_meta($post_id, 'wpfunos_funerariaDirectorioLatitud', $funerariaDirectorioLatitud);
update_post_meta($post_id, 'wpfunos_funerariaDirectorioLongitud', $funerariaDirectorioLongitud);

update_post_meta($post_id, 'wpfunos_funerariaDirectorioIncineracionDesde', $funerariaDirectorioIncineracionDesde);
update_post_meta($post_id, 'wpfunos_funerariaDirectorioEntierroDesde', $funerariaDirectorioEntierroDesde);

update_post_meta($post_id, 'wpfunos_funerariaDirectorioImagenes', $funerariaDirectorioImagenes);

update_post_meta($post_id, 'wpfunos_funerariaDirectorioLandings', $DirectorioLandings);

update_post_meta($post_id, 'wpfunos_funerariaDirectorioServicios', $DirectorioServicios);
update_post_meta($post_id, 'wpfunos_funerariaDirectorioDescripcionServicios', $funerariaDirectorioDescripcionServicios);

update_post_meta($post_id, 'wpfunos_funerariaDirectorioUltimasDefunciones', $funerariaDirectorioUltimasDefunciones);
