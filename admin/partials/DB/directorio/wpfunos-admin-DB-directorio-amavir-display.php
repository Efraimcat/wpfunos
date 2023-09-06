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
?>
<div class="directorio_amavir_wpfunos_containers">
  <ul class="directorio_amavir_wpfunos_data_metabox">
    <li class="directorio_amavir_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Shortcode', 'wpfunos'); ?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Origen', 'wpfunos'); ?></td>
          <td style="width:5px;"></td>
          <td style="display:none;"><?php esc_html_e('Población', 'wpfunos'); ?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input', 'subtype' => 'text', 'id' => 'wpfunos_DirectorioAmavirShortcode', 'name' => 'wpfunos_DirectorioAmavirShortcode', 'required' => 'required', 'get_options_list' => '', 'value_type' => 'normal', 'wp_data' => 'post_meta', 'post_id' => $post->ID)); ?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input', 'subtype' => 'text', 'id' => 'wpfunos_DirectorioAmavirOrigen', 'name' => 'wpfunos_DirectorioAmavirOrigen', 'required' => 'required', 'get_options_list' => '', 'value_type' => 'normal', 'wp_data' => 'post_meta', 'post_id' => $post->ID)); ?></td>
          <td style="width:5px;"></td>
          <td style="display:none;"><?php $this->wpfunos_render_settings_field(array('type' => 'input', 'subtype' => 'text', 'id' => 'wpfunos_DirectorioAmavirPoblacion', 'name' => 'wpfunos_DirectorioAmavirPoblacion', 'required' => 'required', 'get_options_list' => '', 'value_type' => 'normal', 'wp_data' => 'post_meta', 'post_id' => $post->ID)); ?></td>
        </tr>
      </table>
    </li>
    <hr />
  </ul>
</div>