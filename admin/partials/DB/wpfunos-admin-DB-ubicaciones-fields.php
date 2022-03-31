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
$ubicacionIP = sanitize_text_field( $_POST[$this->plugin_name . '_ubicacionIP'] );
$ubicacionwpf = sanitize_text_field( $_POST[$this->plugin_name . '_ubicacionwpf'] );
$ubicacionReferencia = sanitize_text_field( $_POST[$this->plugin_name . '_ubicacionReferencia'] );
$ubicacionDireccion = sanitize_text_field( $_POST[$this->plugin_name . '_ubicacionDireccion'] );
$ubicacionDistancia = sanitize_text_field( $_POST[$this->plugin_name . '_ubicacionDistancia'] );
$ubicacionCP = sanitize_text_field( $_POST[$this->plugin_name . '_ubicacionCP'] );

update_post_meta($post_id, $this->plugin_name . '_ubicacionIP', $ubicacionIP);
update_post_meta($post_id, $this->plugin_name . '_ubicacionwpf', $ubicacionwpf);
update_post_meta($post_id, $this->plugin_name . '_ubicacionReferencia', $ubicacionReferencia);
update_post_meta($post_id, $this->plugin_name . '_ubicacionDireccion', $ubicacionDireccion);
update_post_meta($post_id, $this->plugin_name . '_ubicacionDistancia', $ubicacionDistancia);
update_post_meta($post_id, $this->plugin_name . '_ubicacionCP', $ubicacionCP);