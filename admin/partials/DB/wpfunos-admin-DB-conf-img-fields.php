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
$imagenConfirmado = sanitize_text_field( $_POST['wpfunos_imagenConfirmado'] );
$imagenNoConfirmado = sanitize_text_field( $_POST['wpfunos_imagenNoConfirmado'] );
$imagenEcologico = sanitize_text_field( $_POST['wpfunos_imagenEcologico'] );
$imagenPromo = sanitize_text_field( $_POST['wpfunos_imagenPromo'] );

update_post_meta($post_id, 'wpfunos_imagenConfirmado', $imagenConfirmado);
update_post_meta($post_id, 'wpfunos_imagenNoConfirmado', $imagenNoConfirmado);
update_post_meta($post_id, 'wpfunos_imagenEcologico', $imagenEcologico);
update_post_meta($post_id, 'wpfunos_imagenPromo', $imagenPromo);
