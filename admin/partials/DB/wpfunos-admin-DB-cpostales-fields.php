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
$cpostalesPoblacion = sanitize_text_field( $_POST[$this->plugin_name . '_cpostalesPoblacion'] );
$cpostalesCodigo = sanitize_text_field( $_POST[$this->plugin_name . '_cpostalesCodigo'] );

update_post_meta($post_id, $this->plugin_name . '_cpostalesPoblacion', $cpostalesPoblacion);
update_post_meta($post_id, $this->plugin_name . '_cpostalesCodigo', $cpostalesCodigo);
