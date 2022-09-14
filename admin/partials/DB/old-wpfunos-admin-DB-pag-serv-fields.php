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
$entradaServiciosIP = sanitize_text_field( $_POST['wpfunos_entradaServiciosIP'] );
$entradaServiciosReferer = sanitize_text_field( $_POST['wpfunos_entradaServiciosReferer'] );
$entradaServiciosVisitas = sanitize_text_field( $_POST['wpfunos_entradaServiciosVisitas'] );
$entradaServiciosVersion = sanitize_text_field( $_POST['wpfunos_entradaServiciosVersion'] );
$Dummy = sanitize_text_field( $_POST['wpfunos_Dummy'] );
$IDstamp= sanitize_text_field( $_POST['IDstamp'] );

update_post_meta($post_id, 'wpfunos_entradaServiciosIP', $entradaServiciosIP);
update_post_meta($post_id, 'wpfunos_entradaServiciosReferer', $entradaServiciosReferer);
update_post_meta($post_id, 'wpfunos_entradaServiciosVisitas', $entradaServiciosVisitas);
update_post_meta($post_id, 'wpfunos_entradaServiciosVersion', $entradaServiciosVersion);
update_post_meta($post_id, 'wpfunos_Dummy', $Dummy);
update_post_meta($post_id, 'IDstamp', $IDstamp);
