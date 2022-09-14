
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
$estadistcasBotonesIP = sanitize_text_field( $_POST['wpfunos_estadistcasBotonesIP'] );
$estadistcasBotonesBoton = sanitize_text_field( $_POST['wpfunos_estadistcasBotonesBoton'] );
$estadistcasBotonesServicio = sanitize_text_field( $_POST['wpfunos_estadistcasBotonesServicio'] );
$estadistcasBotonesReferer = sanitize_text_field( $_POST['wpfunos_estadistcasBotonesReferer'] );
$estadistcasBotonesDireccion = sanitize_text_field( $_POST['wpfunos_estadistcasBotonesDireccion'] );
$estadistcasBotonesDistancia = sanitize_text_field( $_POST['wpfunos_estadistcasBotonesDistancia'] );
$estadistcasBotonesResp1 = sanitize_text_field( $_POST['wpfunos_estadistcasBotonesResp1'] );
$estadistcasBotonesResp2 = sanitize_text_field( $_POST['wpfunos_estadistcasBotonesResp2'] );
$estadistcasBotonesResp3 = sanitize_text_field( $_POST['wpfunos_estadistcasBotonesResp3'] );
$estadistcasBotonesResp4 = sanitize_text_field( $_POST['wpfunos_estadistcasBotonesResp4'] );
$estadistcasBotonesNombre = sanitize_text_field( $_POST['wpfunos_estadistcasBotonesNombre'] );
$estadistcasBotonesEmail = sanitize_text_field( $_POST['wpfunos_estadistcasBotonesEmail'] );
$estadistcasBotonesPhone = sanitize_text_field( $_POST['wpfunos_estadistcasBotonesPhone'] );
$estadistcasBotonesLand = sanitize_text_field( $_POST['wpfunos_estadistcasBotonesLand'] );
$estadistcasBotonesVisitas = sanitize_text_field( $_POST['wpfunos_estadistcasBotonesVisitas'] );
$estadistcasBotonesVersion = sanitize_text_field( $_POST['wpfunos_estadistcasBotonesVersion'] );
$Dummy = sanitize_text_field( $_POST['wpfunos_Dummy'] );

update_post_meta($post_id, 'wpfunos_estadistcasBotonesIP', $estadistcasBotonesIP);
update_post_meta($post_id, 'wpfunos_estadistcasBotonesBoton', $estadistcasBotonesBoton);
update_post_meta($post_id, 'wpfunos_estadistcasBotonesServicio', $estadistcasBotonesServicio);
update_post_meta($post_id, 'wpfunos_estadistcasBotonesReferer', $estadistcasBotonesReferer);
update_post_meta($post_id, 'wpfunos_estadistcasBotonesDireccion', $estadistcasBotonesDireccion);
update_post_meta($post_id, 'wpfunos_estadistcasBotonesDistancia', $estadistcasBotonesDistancia);
update_post_meta($post_id, 'wpfunos_estadistcasBotonesResp1', $estadistcasBotonesResp1);
update_post_meta($post_id, 'wpfunos_estadistcasBotonesResp2', $estadistcasBotonesResp2);
update_post_meta($post_id, 'wpfunos_estadistcasBotonesResp3', $estadistcasBotonesResp3);
update_post_meta($post_id, 'wpfunos_estadistcasBotonesResp4', $estadistcasBotonesResp4);
update_post_meta($post_id, 'wpfunos_estadistcasBotonesNombre', $estadistcasBotonesNombre);
update_post_meta($post_id, 'wpfunos_estadistcasBotonesEmail', $estadistcasBotonesEmail);
update_post_meta($post_id, 'wpfunos_estadistcasBotonesPhone', $estadistcasBotonesPhone);
update_post_meta($post_id, 'wpfunos_estadistcasBotonesLand', $estadistcasBotonesLand);
update_post_meta($post_id, 'wpfunos_estadistcasBotonesVisitas', $estadistcasBotonesVisitas);
update_post_meta($post_id, 'wpfunos_estadistcasBotonesVersion', $estadistcasBotonesVersion);
update_post_meta($post_id, 'wpfunos_Dummy', $Dummy);
