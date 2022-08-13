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
?>
<div class="servicios_wpfunos_containers">
  <ul class="servicios_wpfunos_data_metabox">
    <li class="servicios_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('IP', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_estadistcasUbicacionIP','name' => 'wpfunos_estadistcasUbicacionIP','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20  ));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Referer', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_estadistcasUbicacionReferer','name' => 'wpfunos_estadistcasUbicacionReferer','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20  ));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Visitas', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_estadistcasUbicacionVisitas','name' => 'wpfunos_estadistcasUbicacionVisitas','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20  ));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Visitas', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_estadistcasUbicacionVersion','name' => 'wpfunos_estadistcasUbicacionVersion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20  ));?></td>
        </tr>
      </table>
    </li>
  </ul>
</div>
