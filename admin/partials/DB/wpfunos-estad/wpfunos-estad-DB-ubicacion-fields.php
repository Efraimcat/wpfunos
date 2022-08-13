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
$estadistcasUbicacionIP = sanitize_text_field( $_POST['wpfunos_estadistcasUbicacionIP'] );
$estadistcasUbicacionReferer = sanitize_text_field( $_POST['wpfunos_estadistcasUbicacionReferer'] );
$estadistcasUbicacionVisitas = sanitize_text_field( $_POST['wpfunos_estadistcasUbicacionVisitas'] );
$estadistcasUbicacionVersion = sanitize_text_field( $_POST['wpfunos_estadistcasUbicacionVersion'] );
$Dummy = sanitize_text_field( $_POST['wpfunos_Dummy'] );

update_post_meta($post_id, 'wpfunos_estadistcasUbicacionIP', $estadistcasUbicacionIP);
update_post_meta($post_id, 'wpfunos_estadistcasUbicacionReferer', $estadistcasUbicacionReferer);
update_post_meta($post_id, 'wpfunos_estadistcasUbicacionVisitas', $estadistcasUbicacionVisitas);
update_post_meta($post_id, 'wpfunos_estadistcasUbicacionVersion', $estadistcasUbicacionVersion);
update_post_meta($post_id, 'wpfunos_Dummy', $Dummy);
