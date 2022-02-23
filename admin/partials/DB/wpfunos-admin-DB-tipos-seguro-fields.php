<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://efraim.cat
 * @since      1.0.0
 *
 * @package    Wpfunos
 * @subpackage Wpfunos/admin/partials
 */
	$tipoSeguroNombre = sanitize_text_field( $_POST[$this->plugin_name . '_tipoSeguroNombre'] );
	$tipoSeguroDisplay = sanitize_text_field( $_POST[$this->plugin_name . '_tipoSeguroDisplay'] );
	$tipoSeguroOrden = sanitize_text_field( $_POST[$this->plugin_name . '_tipoSeguroOrden'] );
	$tipoSeguroActivo = sanitize_text_field( $_POST[$this->plugin_name . '_tipoSeguroActivo'] );
	$tipoSeguroComentario = wp_kses_post( $_POST[$this->plugin_name . '_tipoSeguroComentario'] );

	update_post_meta($post_id, $this->plugin_name . '_tipoSeguroNombre', $tipoSeguroNombre);
	update_post_meta($post_id, $this->plugin_name . '_tipoSeguroDisplay', $tipoSeguroDisplay);
	update_post_meta($post_id, $this->plugin_name . '_tipoSeguroOrden', $tipoSeguroOrden);
	update_post_meta($post_id, $this->plugin_name . '_tipoSeguroActivo', $tipoSeguroActivo);
	update_post_meta($post_id, $this->plugin_name . '_tipoSeguroComentario', $tipoSeguroComentario);