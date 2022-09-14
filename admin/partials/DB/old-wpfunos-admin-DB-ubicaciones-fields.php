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
$ubicacionIP = sanitize_text_field( $_POST['wpfunos_ubicacionIP'] );
$ubicacionwpf = sanitize_text_field( $_POST['wpfunos_ubicacionwpf'] );
$ubicacionReferencia = sanitize_text_field( $_POST['wpfunos_ubicacionReferencia'] );
$ubicacionDireccion = sanitize_text_field( $_POST['wpfunos_ubicacionDireccion'] );
$ubicacionDistancia = sanitize_text_field( $_POST['wpfunos_ubicacionDistancia'] );
$ubicacionCP = sanitize_text_field( $_POST['wpfunos_ubicacionCP'] );
$ubicacionVisitas = sanitize_text_field( $_POST['wpfunos_ubicacionVisitas'] );
$ubicacionVersion = sanitize_text_field( $_POST['wpfunos_ubicacionVersion'] );
$Dummy = sanitize_text_field( $_POST['wpfunos_Dummy'] );
$IDstamp= sanitize_text_field( $_POST['IDstamp'] );

update_post_meta($post_id, 'wpfunos_ubicacionIP', $ubicacionIP);
update_post_meta($post_id, 'wpfunos_ubicacionwpf', $ubicacionwpf);
update_post_meta($post_id, 'wpfunos_ubicacionReferencia', $ubicacionReferencia);
update_post_meta($post_id, 'wpfunos_ubicacionDireccion', $ubicacionDireccion);
update_post_meta($post_id, 'wpfunos_ubicacionDistancia', $ubicacionDistancia);
update_post_meta($post_id, 'wpfunos_ubicacionCP', $ubicacionCP);
update_post_meta($post_id, 'wpfunos_ubicacionVisitas', $ubicacionVisitas);
update_post_meta($post_id, 'wpfunos_ubicacionVersion', $ubicacionVersion);
update_post_meta($post_id, 'wpfunos_Dummy', $Dummy);
update_post_meta($post_id, 'IDstamp', $IDstamp);
