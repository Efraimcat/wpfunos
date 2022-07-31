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
$aseguradorasNombre = sanitize_text_field( $_POST['wpfunos_aseguradorasNombre'] );
$aseguradorasDireccion = sanitize_text_field( $_POST['wpfunos_aseguradorasDireccion'] );
$aseguradorasCorreo = sanitize_text_field( $_POST['wpfunos_aseguradorasCorreo'] );
$aseguradorasTelefono = sanitize_text_field( $_POST['wpfunos_aseguradorasTelefono'] );
$aseguradorasActivo = sanitize_text_field( $_POST['wpfunos_aseguradorasActivo'] );
$aseguradorasAPI = sanitize_text_field( $_POST['wpfunos_aseguradorasAPI'] );
$aseguradorasColdLead = sanitize_text_field( $_POST['wpfunos_aseguradorasColdLead'] );
$aseguradorasLead = sanitize_text_field( $_POST['wpfunos_aseguradorasLead'] );
$aseguradorasLead2 = sanitize_text_field( $_POST['wpfunos_aseguradorasLead2'] );
$aseguradorasLogo = sanitize_text_field( $_POST['wpfunos_aseguradorasLogo'] );
$aseguradorasTipoSeguro = sanitize_text_field( $_POST['wpfunos_aseguradorasTipoSeguro'] );
$aseguradorasOrden = sanitize_text_field( $_POST['wpfunos_aseguradorasOrden'] );
$aseguradorasNotas = wp_kses_post( $_POST['wpfunos_aseguradorasNotas'] );
$aseguradorasDummy = sanitize_text_field( $_POST['wpfunos_aseguradorasDummy'] );

update_post_meta($post_id, 'wpfunos_aseguradorasNombre', $aseguradorasNombre);
update_post_meta($post_id, 'wpfunos_aseguradorasDireccion', $aseguradorasDireccion);
update_post_meta($post_id, 'wpfunos_aseguradorasCorreo', $aseguradorasCorreo);
update_post_meta($post_id, 'wpfunos_aseguradorasTelefono', $aseguradorasTelefono);
update_post_meta($post_id, 'wpfunos_aseguradorasActivo', $aseguradorasActivo);
update_post_meta($post_id, 'wpfunos_aseguradorasAPI', $aseguradorasAPI);
update_post_meta($post_id, 'wpfunos_aseguradorasColdLead', $aseguradorasColdLead);
update_post_meta($post_id, 'wpfunos_aseguradorasLead', $aseguradorasLead);
update_post_meta($post_id, 'wpfunos_aseguradorasLead2', $aseguradorasLead2);
update_post_meta($post_id, 'wpfunos_aseguradorasLogo', $aseguradorasLogo);
update_post_meta($post_id, 'wpfunos_aseguradorasTipoSeguro', $aseguradorasTipoSeguro);
update_post_meta($post_id, 'wpfunos_aseguradorasOrden', $aseguradorasOrden);
update_post_meta($post_id, 'wpfunos_aseguradorasNotas', $aseguradorasNotas);
update_post_meta($post_id, 'wpfunos_aseguradorasDummy', $aseguradorasDummy);
