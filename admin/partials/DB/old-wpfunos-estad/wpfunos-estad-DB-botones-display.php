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
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_estadistcasBotonesIP','name' => 'wpfunos_estadistcasBotonesIP','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20  ));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Boton', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_estadistcasBotonesBoton','name' => 'wpfunos_estadistcasBotonesBoton','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20  ));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Servicio', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_estadistcasBotonesServicio','name' => 'wpfunos_estadistcasBotonesServicio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20  ));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Referer', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_estadistcasBotonesReferer','name' => 'wpfunos_estadistcasBotonesReferer','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20  ));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Dirección', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_estadistcasBotonesDireccion','name' => 'wpfunos_estadistcasBotonesDireccion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20  ));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Distancia', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_estadistcasBotonesDistancia','name' => 'wpfunos_estadistcasBotonesDistancia','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20  ));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Resp1', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_estadistcasBotonesResp1','name' => 'wpfunos_estadistcasBotonesResp1','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20  ));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Resp2', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_estadistcasBotonesResp2','name' => 'wpfunos_estadistcasBotonesResp2','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20  ));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Resp3', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_estadistcasBotonesResp3','name' => 'wpfunos_estadistcasBotonesResp3','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20  ));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Resp4', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_estadistcasBotonesResp4','name' => 'wpfunos_estadistcasBotonesResp4','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20  ));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Nombre', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_estadistcasBotonesNombre','name' => 'wpfunos_estadistcasBotonesNombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20  ));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Email', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_estadistcasBotonesEmail','name' => 'wpfunos_estadistcasBotonesEmail','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20  ));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Teléfono', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_estadistcasBotonesPhone','name' => 'wpfunos_estadistcasBotonesPhone','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20  ));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Landing', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_estadistcasBotonesLand','name' => 'wpfunos_estadistcasBotonesLand','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20  ));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Visitas', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_estadistcasBotonesVisitas','name' => 'wpfunos_estadistcasBotonesVisitas','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20  ));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Version', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_estadistcasBotonesVersion','name' => 'wpfunos_estadistcasBotonesVersion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20  ));?></td>
        </tr>
      </table>
    </li>
  </ul>
</div>
