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
<div class="usuarios_wpfunos_containers">
  <ul class="usuarios_wpfunos_data_metabox">
    <li class="usuarios_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Timestamp', 'wpfunos');?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_TimeStamp','name' => $this->plugin_name . '_TimeStamp','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
      </table>
    </li>
    <hr/>
    <li class="usuarios_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Correo electrónico', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Referencia', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Nombre', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Teléfono', 'wpfunos');?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userMail','name' => $this->plugin_name . '_userMail','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => '', 'size' => 20));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userReferencia','name' => $this->plugin_name . '_userReferencia','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => '', 'size' => 20));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userName','name' => $this->plugin_name . '_userName','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => '', 'size' => 20));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userPhone','name' => $this->plugin_name . '_userPhone','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => '', 'size' => 20));?></td>
        </tr>
      </table>
    </li>
    <hr/>
    <li class="usuarios_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Seguro', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Lead', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Selección', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('CP', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Acción', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Precio', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Servicio', 'wpfunos');?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userSeguro','name' => $this->plugin_name . '_userSeguro','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => '', 'size' => 7));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userLead','name' => $this->plugin_name . '_userLead','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => '', 'size' => 7));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userSeleccion','name' => $this->plugin_name . '_userSeleccion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => '', 'size' => 30));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userCP','name' => $this->plugin_name . '_userCP','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => '', 'size' => 7));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userAccion','name' => $this->plugin_name . '_userAccion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => '', 'size' => 7));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userPrecio','name' => $this->plugin_name . '_userPrecio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => '', 'size' => 7));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userServicio','name' => $this->plugin_name . '_userServicio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => '', 'size' => 30));?></td>
        </tr>
      </table>
    </li>
    <hr/>
    <li class="usuarios_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Nombre acción', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userNombreAccion','name' => $this->plugin_name . '_userNombreAccion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Nombre selección ubicación', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userNombreSeleccionUbicacion','name' => $this->plugin_name . '_userNombreSeleccionUbicacion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Nombre selección distancia', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userNombreSeleccionDistancia','name' => $this->plugin_name . '_userNombreSeleccionDistancia','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Nombre selección servicio', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userNombreSeleccionServicio','name' => $this->plugin_name . '_userNombreSeleccionServicio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Nombre selección ataúd', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userNombreSeleccionAtaud','name' => $this->plugin_name . '_userNombreSeleccionAtaud','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Nombre selección velatorio', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userNombreSeleccionVelatorio','name' => $this->plugin_name . '_userNombreSeleccionVelatorio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Nombre selección despedida', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userNombreSeleccionDespedida','name' => $this->plugin_name . '_userNombreSeleccionDespedida','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Acepta política privacidad', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_userAceptaPolitica','name' => $this->plugin_name . '_userAceptaPolitica','required' => '','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7, 'disabled' => 'disabled'));?></td>
        </tr>
      </table>
    </li>
    <hr/>
    <?php  //Precio base?>
    <li class="servicios_wpfunos_list">
      <table>
        <tr>
          <td>Nombre</td><td>Precio</td><td>Descuento</td><td>Total</td>
        </tr>
        <tr>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseBaseNombre','name' => $this->plugin_name . '_userDesgloseBaseNombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 20)); ?>
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseBasePrecio','name' => $this->plugin_name . '_userDesgloseBasePrecio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7)); ?>€
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseBaseDescuento','name' => $this->plugin_name . '_userDesgloseBaseDescuento','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7)); ?>%
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseBaseTotal','name' => $this->plugin_name . '_userDesgloseBaseTotal','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7)); ?>€
          </td>
        </tr>
        <tr>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseDestinoNombre','name' => $this->plugin_name . '_userDesgloseDestinoNombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 20)); ?>
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseDestinoPrecio','name' => $this->plugin_name . '_userDesgloseDestinoPrecio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7)); ?>€
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseDestinoDescuento','name' => $this->plugin_name . '_userDesgloseDestinoDescuento','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7)); ?>%
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseDestinoTotal','name' => $this->plugin_name . '_userDesgloseDestinoTotal','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7)); ?>€
          </td>
        </tr>
        <tr>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseAtaudNombre','name' => $this->plugin_name . '_userDesgloseAtaudNombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 20)); ?>
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseAtaudPrecio','name' => $this->plugin_name . '_userDesgloseAtaudPrecio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7)); ?>€
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseAtaudDescuento','name' => $this->plugin_name . '_userDesgloseAtaudDescuento','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7)); ?>%
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseAtaudTotal','name' => $this->plugin_name . '_userDesgloseAtaudTotal','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7)); ?>€
          </td>
        </tr>
        <tr>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseVelatorioNombre','name' => $this->plugin_name . '_userDesgloseVelatorioNombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 20)); ?>
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseVelatorioPrecio','name' => $this->plugin_name . '_userDesgloseVelatorioPrecio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7)); ?>€
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseVelatorioDescuento','name' => $this->plugin_name . '_userDesgloseVelatorioDescuento','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7)); ?>%
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseVelatorioTotal','name' => $this->plugin_name . '_userDesgloseVelatorioTotal','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7)); ?>€
          </td>
        </tr>
        <tr>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseCeremoniaNombre','name' => $this->plugin_name . '_userDesgloseCeremoniaNombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 20));?>
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseCeremoniaPrecio','name' => $this->plugin_name . '_userDesgloseCeremoniaPrecio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7)); ?>€
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseCeremoniaDescuento','name' => $this->plugin_name . '_userDesgloseCeremoniaDescuento','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7)); ?>%
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseCeremoniaTotal','name' => $this->plugin_name . '_userDesgloseCeremoniaTotal','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7)); ?>€
          </td>
        </tr>
        <tr>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseDescuentoGenerico','name' => $this->plugin_name . '_userDesgloseDescuentoGenerico','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 20)); ?>
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseDescuentoGenericoPrecio','name' => $this->plugin_name . '_useruserDesgloseDescuentoGenericoPrecio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7)); ?>€
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseDescuentoGenericoDescuento','name' => $this->plugin_name . '_userDesgloseDescuentoGenericoDescuento','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7)); ?>%
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseDescuentoGenericoTotal','name' => $this->plugin_name . '_userDesgloseDescuentoGenericoTotal','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7));?>€
          </td>
        </tr>
      </table>
    </li>
    <hr/>
    <li class="usuarios_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Tipo API', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userAPITipo','name' => $this->plugin_name . '_userAPITipo','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => '' ));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Body API', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userAPIBody','name' => $this->plugin_name . '_userAPIBody','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => '' )); ?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Mensaje API', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userAPIMessage','name' => $this->plugin_name . '_userAPIMessage','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        
        <tr>
          <td><?php esc_html_e('Mensaje API body', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userAPIMessagebody','name' => $this->plugin_name . '_userAPIMessagebody','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Mensaje API response', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userAPIMessageresponse','name' => $this->plugin_name . '_userAPIMessageresponse','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Mensaje API code', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userAPIMessagecode','name' => $this->plugin_name . '_userAPIMessagecode','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Mensaje API message', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userAPIMessagemessage','name' => $this->plugin_name . '_userAPIMessagemessage','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        
        <tr>
          <td><?php esc_html_e('IP', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userIP','name' => $this->plugin_name . '_userIP','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('LAT', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userLAT','name' => $this->plugin_name . '_userLAT','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('LNG', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userLNG','name' => $this->plugin_name . '_userLNG','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('version', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userPluginVersion','name' => $this->plugin_name . '_userPluginVersion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('visitas', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userVisitas','name' => $this->plugin_name . '_userVisitas','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('token', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_Dummy','name' => $this->plugin_name . '_Dummy','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('IDstamp', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'IDstamp','name' => 'IDstamp','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
      </table>
    </li>
    <hr/>
  </ul>
</div>
