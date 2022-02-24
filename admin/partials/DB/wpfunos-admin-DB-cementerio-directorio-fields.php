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
	$cementerioDirectorioNombre = sanitize_text_field( $_POST[$this->plugin_name . '_cementerioDirectorioNombre'] );
	$cementerioDirectorioDireccion = sanitize_text_field( $_POST[$this->plugin_name . '_cementerioDirectorioDireccion'] );
	$cementerioDirectorioCorreo = sanitize_text_field( $_POST[$this->plugin_name . '_cementerioDirectorioCorreo'] );
	$cementerioDirectorioTelefono = sanitize_text_field( $_POST[$this->plugin_name . '_cementerioDirectorioTelefono'] );

	update_post_meta($post_id, $this->plugin_name . '_cementerioDirectorioNombre', $cementerioDirectorioNombre);
	update_post_meta($post_id, $this->plugin_name . '_cementerioDirectorioDireccion', $cementerioDirectorioDireccion);
	update_post_meta($post_id, $this->plugin_name . '_cementerioDirectorioCorreo', $cementerioDirectorioCorreo);
	update_post_meta($post_id, $this->plugin_name . '_cementerioDirectorioTelefono', $cementerioDirectorioTelefono);