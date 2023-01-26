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
$tipoSeguroNombre = sanitize_text_field( $_POST['wpfunos_tipoSeguroNombre'] );
$tipoSeguroDisplay = sanitize_text_field( $_POST['wpfunos_tipoSeguroDisplay'] );
$tipoSeguroOrden = sanitize_text_field( $_POST['wpfunos_tipoSeguroOrden'] );
$tipoSeguroActivo = sanitize_text_field( $_POST['wpfunos_tipoSeguroActivo'] );
$tipoSeguroComentario = wp_kses_post( $_POST['wpfunos_tipoSeguroComentario'] );

update_post_meta($post_id, 'wpfunos_tipoSeguroNombre', $tipoSeguroNombre);
update_post_meta($post_id, 'wpfunos_tipoSeguroDisplay', $tipoSeguroDisplay);
update_post_meta($post_id, 'wpfunos_tipoSeguroOrden', $tipoSeguroOrden);
update_post_meta($post_id, 'wpfunos_tipoSeguroActivo', $tipoSeguroActivo);
update_post_meta($post_id, 'wpfunos_tipoSeguroComentario', $tipoSeguroComentario);
