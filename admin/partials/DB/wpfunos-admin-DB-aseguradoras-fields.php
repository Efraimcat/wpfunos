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
$aseguradorasNombre = sanitize_text_field( $_POST[$this->plugin_name . '_aseguradorasNombre'] );
$aseguradorasDireccion = sanitize_text_field( $_POST[$this->plugin_name . '_aseguradorasDireccion'] );
$aseguradorasCorreo = sanitize_text_field( $_POST[$this->plugin_name . '_aseguradorasCorreo'] );
$aseguradorasTelefono = sanitize_text_field( $_POST[$this->plugin_name . '_aseguradorasTelefono'] );
$aseguradorasActivo = sanitize_text_field( $_POST[$this->plugin_name . '_aseguradorasActivo'] );
$aseguradorasColdLead = sanitize_text_field( $_POST[$this->plugin_name . '_aseguradorasColdLead'] );
$aseguradorasLead = sanitize_text_field( $_POST[$this->plugin_name . '_aseguradorasLead'] );
$aseguradorasLead2 = sanitize_text_field( $_POST[$this->plugin_name . '_aseguradorasLead2'] );
$aseguradorasLogo = sanitize_text_field( $_POST[$this->plugin_name . '_aseguradorasLogo'] );
$aseguradorasTipoSeguro = sanitize_text_field( $_POST[$this->plugin_name . '_aseguradorasTipoSeguro'] );
$aseguradorasOrden = sanitize_text_field( $_POST[$this->plugin_name . '_aseguradorasOrden'] );
$aseguradorasNotas = wp_kses_post( $_POST[$this->plugin_name . '_aseguradorasNotas'] );
$aseguradorasDummy = sanitize_text_field( $_POST[$this->plugin_name . '_aseguradorasDummy'] );

update_post_meta($post_id, $this->plugin_name . '_aseguradorasNombre', $aseguradorasNombre);
update_post_meta($post_id, $this->plugin_name . '_aseguradorasDireccion', $aseguradorasDireccion);
update_post_meta($post_id, $this->plugin_name . '_aseguradorasCorreo', $aseguradorasCorreo);
update_post_meta($post_id, $this->plugin_name . '_aseguradorasTelefono', $aseguradorasTelefono);
update_post_meta($post_id, $this->plugin_name . '_aseguradorasActivo', $aseguradorasActivo);
update_post_meta($post_id, $this->plugin_name . '_aseguradorasColdLead', $aseguradorasColdLead);
update_post_meta($post_id, $this->plugin_name . '_aseguradorasLead', $aseguradorasLead);
update_post_meta($post_id, $this->plugin_name . '_aseguradorasLead2', $aseguradorasLead2);
update_post_meta($post_id, $this->plugin_name . '_aseguradorasLogo', $aseguradorasLogo);
update_post_meta($post_id, $this->plugin_name . '_aseguradorasTipoSeguro', $aseguradorasTipoSeguro);
update_post_meta($post_id, $this->plugin_name . '_aseguradorasOrden', $aseguradorasOrden);
update_post_meta($post_id, $this->plugin_name . '_aseguradorasNotas', $aseguradorasNotas);
update_post_meta($post_id, $this->plugin_name . '_aseguradorasDummy', $aseguradorasDummy);
