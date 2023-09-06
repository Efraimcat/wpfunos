<?php
if (!defined('ABSPATH')) {
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
$DirectorioAmavirShortcode = sanitize_text_field($_POST['wpfunos_DirectorioAmavirShortcode']);
$DirectorioAmavirOrigen = sanitize_text_field($_POST['wpfunos_DirectorioAmavirOrigen']);
$DirectorioAmavirPoblacion = sanitize_text_field($_POST['wpfunos_DirectorioAmavirPoblacion']);

update_post_meta($post_id, 'wpfunos_DirectorioAmavirShortcode', $DirectorioAmavirShortcode);
update_post_meta($post_id, 'wpfunos_DirectorioAmavirOrigen', $DirectorioAmavirOrigen);

$poblacion = get_post_meta($DirectorioAmavirOrigen, 'wpfunos_entradaDirectorioPoblacion', true);
update_post_meta($post_id, 'wpfunos_DirectorioAmavirPoblacion', $poblacion);

$direccion = get_post_meta($DirectorioAmavirOrigen, 'wpfunos_entradaDirectorioDireccion', true);
gmw_update_post_location($post_id, $direccion, 7, $direccion, true);

$destacada = get_post_meta( $DirectorioAmavirOrigen, '_thumbnail_id', true );
set_post_thumbnail( $post_id, $destacada );

