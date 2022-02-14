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
 $aseguradorasNombre = sanitize_text_field( $_POST[$this->plugin_name . '_aseguradorasNombre'] );
 $aseguradorasDireccion = sanitize_text_field( $_POST[$this->plugin_name . '_aseguradorasDireccion'] );
 $aseguradorasCorreo = sanitize_text_field( $_POST[$this->plugin_name . '_aseguradorasCorreo'] );
 $aseguradorasTelefono = sanitize_text_field( $_POST[$this->plugin_name . '_aseguradorasTelefono'] );
 $aseguradorasActivo = sanitize_text_field( $_POST[$this->plugin_name . '_aseguradorasActivo'] );
 $aseguradorasLogo = sanitize_text_field( $_POST[$this->plugin_name . '_aseguradorasLogo'] );

 update_post_meta($post_id, $this->plugin_name . '_aseguradorasNombre', $aseguradorasNombre);
 update_post_meta($post_id, $this->plugin_name . '_aseguradorasDireccion', $aseguradorasDireccion);
 update_post_meta($post_id, $this->plugin_name . '_aseguradorasCorreo', $aseguradorasCorreo);
 update_post_meta($post_id, $this->plugin_name . '_aseguradorasTelefono', $aseguradorasTelefono);
 update_post_meta($post_id, $this->plugin_name . '_aseguradorasActivo', $aseguradorasActivo);
 update_post_meta($post_id, $this->plugin_name . '_aseguradorasLogo', $aseguradorasLogo);
