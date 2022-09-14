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
$funerariaNombre = sanitize_text_field( $_POST[$this->plugin_name . '_funerariaNombre'] );
$funerariaLogo = sanitize_text_field( $_POST[$this->plugin_name . '_funerariaLogo'] );
$funerariaEmail = sanitize_text_field( $_POST[$this->plugin_name . '_funerariaEmail'] );
$funerariaTelefono = sanitize_text_field( $_POST[$this->plugin_name . '_funerariaTelefono'] );
$funerariaDireccion = sanitize_text_field( $_POST[$this->plugin_name . '_funerariaDireccion'] );
$funerariaMapa = sanitize_text_field( $_POST[$this->plugin_name . '_funerariaMapa'] );
$funerariaValoracion = sanitize_text_field( $_POST[$this->plugin_name . '_funerariaValoracion'] );
$funerariaDescuentoGenerico = sanitize_text_field( $_POST[$this->plugin_name . '_funerariaDescuentoGenerico'] );

update_post_meta($post_id, $this->plugin_name . '_funerariaNombre', $funerariaNombre);
update_post_meta($post_id, $this->plugin_name . '_funerariaLogo', $funerariaLogo);
update_post_meta($post_id, $this->plugin_name . '_funerariaEmail', $funerariaEmail);
update_post_meta($post_id, $this->plugin_name . '_funerariaTelefono', $funerariaTelefono);
update_post_meta($post_id, $this->plugin_name . '_funerariaDireccion', $funerariaDireccion);
update_post_meta($post_id, $this->plugin_name . '_funerariaMapa', $funerariaMapa);
update_post_meta($post_id, $this->plugin_name . '_funerariaValoracion', $funerariaValoracion);
update_post_meta($post_id, $this->plugin_name . '_funerariaDescuentoGenerico', $funerariaDescuentoGenerico);
