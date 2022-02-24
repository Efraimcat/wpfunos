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
	$funerariaDirectorioNombre = sanitize_text_field( $_POST[$this->plugin_name . '_funerariaDirectorioNombre'] );
	$funerariaDirectorioDireccion = sanitize_text_field( $_POST[$this->plugin_name . '_funerariaDirectorioDireccion'] );
	$funerariaDirectorioCorreo = sanitize_text_field( $_POST[$this->plugin_name . '_funerariaDirectorioCorreo'] );
	$funerariaDirectorioTelefono = sanitize_text_field( $_POST[$this->plugin_name . '_funerariaDirectorioTelefono'] );

	update_post_meta($post_id, $this->plugin_name . '_funerariaDirectorioNombre', $funerariaDirectorioNombre);
	update_post_meta($post_id, $this->plugin_name . '_funerariaDirectorioDireccion', $funerariaDirectorioDireccion);
	update_post_meta($post_id, $this->plugin_name . '_funerariaDirectorioCorreo', $funerariaDirectorioCorreo);
	update_post_meta($post_id, $this->plugin_name . '_funerariaDirectorioTelefono', $funerariaDirectorioTelefono);