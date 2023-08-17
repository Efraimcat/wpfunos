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
update_post_meta($post_id, 'wpfunos_DirectorioAmavirPoblacion', $DirectorioAmavirPoblacion);
