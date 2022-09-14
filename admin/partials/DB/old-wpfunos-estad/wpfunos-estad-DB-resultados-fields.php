
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
$estadistcasResultadosIP = sanitize_text_field( $_POST['wpfunos_estadistcasResultadosIP'] );
$estadistcasResultadosReferer = sanitize_text_field( $_POST['wpfunos_estadistcasResultadosReferer'] );
$estadistcasResultadosDireccion = sanitize_text_field( $_POST['wpfunos_estadistcasResultadosDireccion'] );
$estadistcasResultadosDistancia = sanitize_text_field( $_POST['wpfunos_estadistcasResultadosDistancia'] );
$estadistcasResultadosResp1 = sanitize_text_field( $_POST['wpfunos_estadistcasResultadosResp1'] );
$estadistcasResultadosResp2 = sanitize_text_field( $_POST['wpfunos_estadistcasResultadosResp2'] );
$estadistcasResultadosResp3 = sanitize_text_field( $_POST['wpfunos_estadistcasResultadosResp3'] );
$estadistcasResultadosResp4 = sanitize_text_field( $_POST['wpfunos_estadistcasResultadosResp4'] );
$estadistcasResultadosLand = sanitize_text_field( $_POST['wpfunos_estadistcasResultadosLand'] );
$estadistcasResultadosURI = sanitize_text_field( $_POST['wpfunos_estadistcasResultadosURI'] );
$estadistcasResultadosVisitas = sanitize_text_field( $_POST['wpfunos_estadistcasResultadosVisitas'] );
$estadistcasResultadosVersion = sanitize_text_field( $_POST['wpfunos_estadistcasResultadosVersion'] );
$Dummy = sanitize_text_field( $_POST['wpfunos_Dummy'] );

update_post_meta($post_id, 'wpfunos_estadistcasResultadosIP', $estadistcasResultadosIP);
update_post_meta($post_id, 'wpfunos_estadistcasResultadosReferer', $estadistcasResultadosReferer);
update_post_meta($post_id, 'wpfunos_estadistcasResultadosDireccion', $estadistcasResultadosDireccion);
update_post_meta($post_id, 'wpfunos_estadistcasResultadosDistancia', $estadistcasResultadosDistancia);
update_post_meta($post_id, 'wpfunos_estadistcasResultadosResp1', $estadistcasResultadosResp1);
update_post_meta($post_id, 'wpfunos_estadistcasResultadosResp2', $estadistcasResultadosResp2);
update_post_meta($post_id, 'wpfunos_estadistcasResultadosResp3', $estadistcasResultadosResp3);
update_post_meta($post_id, 'wpfunos_estadistcasResultadosResp4', $estadistcasResultadosResp4);
update_post_meta($post_id, 'wpfunos_estadistcasResultadosLand', $estadistcasResultadosLand);
update_post_meta($post_id, 'wpfunos_estadistcasResultadosURI', $estadistcasResultadosURI);
update_post_meta($post_id, 'wpfunos_estadistcasResultadosVisitas', $estadistcasResultadosVisitas);
update_post_meta($post_id, 'wpfunos_estadistcasResultadosVersion', $estadistcasResultadosVersion);
update_post_meta($post_id, 'wpfunos_Dummy', $Dummy);
