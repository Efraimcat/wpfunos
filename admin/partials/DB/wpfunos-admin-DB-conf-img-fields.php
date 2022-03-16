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
	$imagenConfirmado = sanitize_text_field( $_POST[$this->plugin_name . '_imagenConfirmado'] );
	$imagenNoConfirmado = sanitize_text_field( $_POST[$this->plugin_name . '_imagenNoConfirmado'] );
	$imagenEcologico = sanitize_text_field( $_POST[$this->plugin_name . '_imagenEcologico'] );

	update_post_meta($post_id, $this->plugin_name . '_imagenConfirmado', $imagenConfirmado);
	update_post_meta($post_id, $this->plugin_name . '_imagenNoConfirmado', $imagenNoConfirmado);
	update_post_meta($post_id, $this->plugin_name . '_imagenEcologico', $imagenEcologico);
