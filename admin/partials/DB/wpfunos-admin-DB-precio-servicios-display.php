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
          <td><?php esc_html_e('Valor', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('ID servicio', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Nombre servicio', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Precio', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('resp1', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('resp2', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('resp3', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('resp4', 'wpfunos');?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioPrecioValor','name' => 'wpfunos_servicioPrecioValor','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioPrecioID','name' => 'wpfunos_servicioPrecioID','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7   ));?></td>
          <td style="width:5px;"></td>
          <td style="width:250px;">
            <?php
            $servicioPrecioNombre = get_the_title( get_post_meta( $_GET['post'] , 'wpfunos_servicioPrecioID', true ));
            update_post_meta( $_GET['post'], 'wpfunos_servicioPrecioNombre', $servicioPrecioNombre);
            echo $servicioPrecioNombre;
            ?>
          </td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioPrecio','name' => 'wpfunos_servicioPrecio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'resp1','name' => 'resp1','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'resp2','name' => 'resp2','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'resp3','name' => 'resp3','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'resp4','name' => 'resp4','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7  ));?></td>
        </tr>
      </table>
    </li>
  </ul>
</div>
