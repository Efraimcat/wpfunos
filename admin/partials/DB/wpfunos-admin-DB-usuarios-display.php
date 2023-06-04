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
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_TimeStamp','name' => 'wpfunos_TimeStamp','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?></td>
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
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Difunto', 'wpfunos');?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userMail','name' => 'wpfunos_userMail','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userReferencia','name' => 'wpfunos_userReferencia','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => '', 'size' => 20));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userName','name' => 'wpfunos_userName','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userPhone','name' => 'wpfunos_userPhone','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userDifunto','name' => 'wpfunos_userDifunto','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
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
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userSeguro','name' => 'wpfunos_userSeguro','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => '', 'size' => 7));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userLead','name' => 'wpfunos_userLead','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => '', 'size' => 7));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userSeleccion','name' => 'wpfunos_userSeleccion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => '', 'size' => 30));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userCP','name' => 'wpfunos_userCP','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => '', 'size' => 7));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userAccion','name' => 'wpfunos_userAccion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => '', 'size' => 7));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userPrecio','name' => 'wpfunos_userPrecio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => '', 'size' => 7));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userServicio','name' => 'wpfunos_userServicio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => '', 'size' => 30));?></td>
        </tr>
      </table>
    </li>
    <hr/>
    <li class="usuarios_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Nombre acción', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userNombreAccion','name' => 'wpfunos_userNombreAccion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Nombre selección ubicación', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userNombreSeleccionUbicacion','name' => 'wpfunos_userNombreSeleccionUbicacion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Nombre selección distancia', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userNombreSeleccionDistancia','name' => 'wpfunos_userNombreSeleccionDistancia','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Nombre selección servicio', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userNombreSeleccionServicio','name' => 'wpfunos_userNombreSeleccionServicio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Nombre selección ataúd', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userNombreSeleccionAtaud','name' => 'wpfunos_userNombreSeleccionAtaud','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Nombre selección velatorio', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userNombreSeleccionVelatorio','name' => 'wpfunos_userNombreSeleccionVelatorio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Nombre selección despedida', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userNombreSeleccionDespedida','name' => 'wpfunos_userNombreSeleccionDespedida','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Acepta política privacidad', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_userAceptaPolitica','name' => 'wpfunos_userAceptaPolitica','required' => '','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7, 'disabled' => 'disabled'));?></td>
        </tr>
      </table>
    </li>
    <hr/>
    <li class="servicios_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Servicio enviado a funeraria', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_userServicioEnviado','name' => 'wpfunos_userServicioEnviado','required' => '','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7, 'disabled' => 'disabled'));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Título servicio', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userServicioTitulo','name' => 'wpfunos_userServicioTitulo','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Empresa servicio', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userServicioEmpresa','name' => 'wpfunos_userServicioEmpresa','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Población servicio', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userServicioPoblacion','name' => 'wpfunos_userServicioPoblacion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Provincia servicio', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userServicioProvincia','name' => 'wpfunos_userServicioProvincia','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
      </table>
    </li>
    <hr/>
    <?php  //Precio base?>
    <li class="servicios_wpfunos_list">
      <table>
        <tr>
          <td>Nombre</td><td></td><td>Precio</td><td></td><td>Descuento</td><td></td><td>Total</td>
        </tr>
        <tr>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userDesgloseBaseNombre','name' => 'wpfunos_userDesgloseBaseNombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 20)); ?>
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userDesgloseBasePrecio','name' => 'wpfunos_userDesgloseBasePrecio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7)); ?>€
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userDesgloseBaseDescuento','name' => 'wpfunos_userDesgloseBaseDescuento','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7)); ?>%
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userDesgloseBaseTotal','name' => 'wpfunos_userDesgloseBaseTotal','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7)); ?>€
          </td>
        </tr>
        <tr>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userDesgloseDestinoNombre','name' => 'wpfunos_userDesgloseDestinoNombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 20)); ?>
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userDesgloseDestinoPrecio','name' => 'wpfunos_userDesgloseDestinoPrecio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7)); ?>€
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userDesgloseDestinoDescuento','name' => 'wpfunos_userDesgloseDestinoDescuento','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7)); ?>%
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userDesgloseDestinoTotal','name' => 'wpfunos_userDesgloseDestinoTotal','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7)); ?>€
          </td>
        </tr>
        <tr>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userDesgloseAtaudNombre','name' => 'wpfunos_userDesgloseAtaudNombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 20)); ?>
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userDesgloseAtaudPrecio','name' => 'wpfunos_userDesgloseAtaudPrecio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7)); ?>€
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userDesgloseAtaudDescuento','name' => 'wpfunos_userDesgloseAtaudDescuento','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7)); ?>%
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userDesgloseAtaudTotal','name' => 'wpfunos_userDesgloseAtaudTotal','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7)); ?>€
          </td>
        </tr>
        <tr>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userDesgloseVelatorioNombre','name' => 'wpfunos_userDesgloseVelatorioNombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 20)); ?>
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userDesgloseVelatorioPrecio','name' => 'wpfunos_userDesgloseVelatorioPrecio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7)); ?>€
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userDesgloseVelatorioDescuento','name' => 'wpfunos_userDesgloseVelatorioDescuento','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7)); ?>%
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userDesgloseVelatorioTotal','name' => 'wpfunos_userDesgloseVelatorioTotal','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7)); ?>€
          </td>
        </tr>
        <tr>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userDesgloseCeremoniaNombre','name' => 'wpfunos_userDesgloseCeremoniaNombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 20));?>
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userDesgloseCeremoniaPrecio','name' => 'wpfunos_userDesgloseCeremoniaPrecio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7)); ?>€
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userDesgloseCeremoniaDescuento','name' => 'wpfunos_userDesgloseCeremoniaDescuento','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7)); ?>%
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userDesgloseCeremoniaTotal','name' => 'wpfunos_userDesgloseCeremoniaTotal','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7)); ?>€
          </td>
        </tr>
        <tr>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userDesgloseDescuentoGenerico','name' => 'wpfunos_userDesgloseDescuentoGenerico','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 20)); ?>
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userDesgloseDescuentoGenericoPrecio','name' => 'wpfunos_useruserDesgloseDescuentoGenericoPrecio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7)); ?>€
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userDesgloseDescuentoGenericoDescuento','name' => 'wpfunos_userDesgloseDescuentoGenericoDescuento','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7)); ?>%
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userDesgloseDescuentoGenericoTotal','name' => 'wpfunos_userDesgloseDescuentoGenericoTotal','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7));?>€
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
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userAPITipo','name' => 'wpfunos_userAPITipo','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => '' ));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Body API', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userAPIBody','name' => 'wpfunos_userAPIBody','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => '' )); ?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Mensaje API', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userAPIMessage','name' => 'wpfunos_userAPIMessage','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>

        <tr>
          <td><?php esc_html_e('Mensaje API body', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userAPIMessagebody','name' => 'wpfunos_userAPIMessagebody','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Mensaje API response', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userAPIMessageresponse','name' => 'wpfunos_userAPIMessageresponse','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Mensaje API code', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userAPIMessagecode','name' => 'wpfunos_userAPIMessagecode','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Mensaje API message', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userAPIMessagemessage','name' => 'wpfunos_userAPIMessagemessage','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>

        <tr>
          <td><?php esc_html_e('wpf', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userwpf','name' => 'wpfunos_userwpf','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('URL', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userURL','name' => 'wpfunos_userURL','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('URL larga', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userURLlarga','name' => 'wpfunos_userURLlarga','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('IP', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userIP','name' => 'wpfunos_userIP','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('Referer', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userReferer','name' => 'wpfunos_userReferer','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('LAT', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userLAT','name' => 'wpfunos_userLAT','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('LNG', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userLNG','name' => 'wpfunos_userLNG','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('version', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userPluginVersion','name' => 'wpfunos_userPluginVersion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('visitas', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userVisitas','name' => 'wpfunos_userVisitas','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('token', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_Dummy','name' => 'wpfunos_Dummy','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('IDstamp', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'IDstamp','name' => 'IDstamp','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('logged', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userLog','name' => 'wpfunos_userLog','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('mobile', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userMobile','name' => 'wpfunos_userMobile','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>

        <tr>
          <td><?php esc_html_e('HubspotIDusuario', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userHubspotIDusuario','name' => 'wpfunos_userHubspotIDusuario','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('HubspotUTK', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_userHubspotUTK','name' => 'wpfunos_userHubspotUTK','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?></td>
        </tr>

        <tr>
          <td><?php esc_html_e('resp', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'resp1','name' => 'resp1','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('resp', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'resp2','name' => 'resp2','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('resp', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'resp3','name' => 'resp3','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?></td>
        </tr>
        <tr>
          <td><?php esc_html_e('resp', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'resp4','name' => 'resp4','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?></td>
        </tr>



      </table>
    </li>
    <hr/>
    <?php // provide textarea name for $_POST variable
    $notes_userComentarios = get_post_meta( $post->ID, 'wpfunos_userComentarios', true );
    $args_userComentarios = array( 'textarea_name' => 'wpfunos_userComentarios', );
    $notes_userFuneraria = get_post_meta( $post->ID, 'wpfunos_userFuneraria', true );
    $args_userFuneraria = array( 'textarea_name' => 'wpfunos_userFuneraria', );
    ?>
    <li>
      <?php esc_html_e('Contratado: ', 'wpfunos');?>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_userContratadoIDstamp','name' => 'wpfunos_userContratado','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
    </li>
    <li><label for="'.'wpfunos_userComentarios" style="font-size: 32px;">Comentarios</label>
      <?php	wp_editor( $notes_userComentarios, 'wpfunos_userComentarios',$args_userComentarios); ?>
    </li>
    <li><label for="'.'wpfunos_userFuneraria" style="font-size: 32px;">Funeraria</label>
      <?php	wp_editor( $notes_userFuneraria, 'wpfunos_userFuneraria',$args_userFuneraria); ?>
    </li>
    <hr/>
  </ul>
</div>
