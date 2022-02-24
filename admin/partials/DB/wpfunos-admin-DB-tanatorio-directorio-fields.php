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
	$tanatorioDirectorioNombre = sanitize_text_field( $_POST[$this->plugin_name . '_tanatorioDirectorioNombre'] );
	$tanatorioDirectorioDireccion = sanitize_text_field( $_POST[$this->plugin_name . '_tanatorioDirectorioDireccion'] );
	$tanatorioDirectorioCorreo = sanitize_text_field( $_POST[$this->plugin_name . '_tanatorioDirectorioCorreo'] );
	$tanatorioDirectorioTelefono = sanitize_text_field( $_POST[$this->plugin_name . '_tanatorioDirectorioTelefono'] );

	update_post_meta($post_id, $this->plugin_name . '_tanatorioDirectorioNombre', $tanatorioDirectorioNombre);
	update_post_meta($post_id, $this->plugin_name . '_tanatorioDirectorioDireccion', $tanatorioDirectorioDireccion);
	update_post_meta($post_id, $this->plugin_name . '_tanatorioDirectorioCorreo', $tanatorioDirectorioCorreo);
	update_post_meta($post_id, $this->plugin_name . '_tanatorioDirectorioTelefono', $tanatorioDirectorioTelefono);