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
	$crematorioDirectorioNombre = sanitize_text_field( $_POST[$this->plugin_name . '_crematorioDirectorioNombre'] );
	$crematorioDirectorioDireccion = sanitize_text_field( $_POST[$this->plugin_name . '_crematorioDirectorioDireccion'] );
	$crematorioDirectorioCorreo = sanitize_text_field( $_POST[$this->plugin_name . '_crematorioDirectorioCorreo'] );
	$crematorioDirectorioTelefono = sanitize_text_field( $_POST[$this->plugin_name . '_crematorioDirectorioTelefono'] );

	update_post_meta($post_id, $this->plugin_name . '_crematorioDirectorioNombre', $crematorioDirectorioNombre);
	update_post_meta($post_id, $this->plugin_name . '_crematorioDirectorioDireccion', $crematorioDirectorioDireccion);
	update_post_meta($post_id, $this->plugin_name . '_crematorioDirectorioCorreo', $crematorioDirectorioCorreo);
	update_post_meta($post_id, $this->plugin_name . '_crematorioDirectorioTelefono', $crematorioDirectorioTelefono);