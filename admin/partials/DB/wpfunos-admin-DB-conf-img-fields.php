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
$imagenConfirmado = sanitize_text_field( $_POST[$this->plugin_name . '_imagenConfirmado'] );
$imagenNoConfirmado = sanitize_text_field( $_POST[$this->plugin_name . '_imagenNoConfirmado'] );
$imagenEcologico = sanitize_text_field( $_POST[$this->plugin_name . '_imagenEcologico'] );
$imagenPromo = sanitize_text_field( $_POST[$this->plugin_name . '_imagenPromo'] );

update_post_meta($post_id, $this->plugin_name . '_imagenConfirmado', $imagenConfirmado);
update_post_meta($post_id, $this->plugin_name . '_imagenNoConfirmado', $imagenNoConfirmado);
update_post_meta($post_id, $this->plugin_name . '_imagenEcologico', $imagenEcologico);
update_post_meta($post_id, $this->plugin_name . '_imagenPromo', $imagenPromo);
