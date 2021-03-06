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
<div class="servicios_wpfunos_containers"  id="inicio">
  <ul class="servicios_wpfunos_data_metabox">
    <li class="servicios_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Nombre', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Empresa', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Población', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Provincia', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Direccion', 'wpfunos');?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioNombre','name' => $this->plugin_name . '_servicioNombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioEmpresa','name' => $this->plugin_name . '_servicioEmpresa','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20   ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioPoblacion','name' => $this->plugin_name . '_servicioPoblacion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioProvincia','name' => $this->plugin_name . '_servicioProvincia','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDireccion','name' => $this->plugin_name . '_servicioDireccion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID  ));?></td>
        </tr>
      </table>
    </li>
    <hr/>
    <li class="servicios_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Email', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Teléfono', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Valoración', 'wpfunos');?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioEmail','name' => $this->plugin_name . '_servicioEmail','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioTelefono','name' => $this->plugin_name . '_servicioTelefono','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20  )); ?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioValoracion','name' => $this->plugin_name . '_servicioValoracion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 )); ?></td>
        </tr>
      </table>
    </li>
    <hr/>
    <li class="servicios_wpfunos_list">
      <table>
        <tr>
          <td colspan="2"><?php esc_html_e('Logo', 'wpfunos');?></td>
          <td style="width:15px;"></td>
          <td colspan="2"><?php esc_html_e('Imagen Promo 200x90', 'wpfunos');?></td>
        </tr>
        <tr>
          <td style="vertical-align: middle;"><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioLogo','name' => $this->plugin_name . '_servicioLogo','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
          <td style="vertical-align: middle;"><?php echo wp_get_attachment_image( get_post_meta( $_GET['post'], $this->plugin_name . '_servicioLogo', true ), 'full' ); ?></td>
          <td style="width:15px;"></td>
          <td style="vertical-align: middle;"><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioImagenPromo','name' => $this->plugin_name . '_servicioImagenPromo','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 14 )); ?></td>
          <td style="vertical-align: middle;"><?php echo wp_get_attachment_image( get_post_meta( $_GET['post'], $this->plugin_name . '_servicioImagenPromo', true ),'full' ); ?></td>
        </tr>
      </table>
    </li>

    <hr/>
    <li class="servicios_wpfunos_list">
      <table>
        <tr>
          <td colspan="2"><?php esc_html_e('Imagen 1', 'wpfunos');?></td>
          <td style="width:15px;"></td>
          <td colspan="2"><?php esc_html_e('Imagen 2', 'wpfunos');?></td>
          <td style="width:15px;"></td>
          <td colspan="2"><?php esc_html_e('Imagen 3', 'wpfunos');?></td>
        </tr>
        <tr>
          <td style="vertical-align: middle;"><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioImagenSlider1','name' => $this->plugin_name . '_servicioImagenSlider1','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
          <td style="vertical-align: middle;"><?php echo wp_get_attachment_image( get_post_meta( $_GET['post'], $this->plugin_name . '_servicioImagenSlider1', true ), array('150', '150') ); ?></td>
          <td style="width:15px;"></td>
          <td style="vertical-align: middle;"><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioImagenSlider2','name' => $this->plugin_name . '_servicioImagenSlider2','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 )); ?></td>
          <td style="vertical-align: middle;"><?php echo wp_get_attachment_image( get_post_meta( $_GET['post'], $this->plugin_name . '_servicioImagenSlider2', true ), array('150', '150') ); ?></td>
          <td style="width:15px;"></td>
          <td style="vertical-align: middle;"><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioImagenSlider3','name' => $this->plugin_name . '_servicioImagenSlider3','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 )); ?></td>
          <td style="vertical-align: middle;"><?php echo wp_get_attachment_image( get_post_meta( $_GET['post'], $this->plugin_name . '_servicioImagenSlider3', true ), array('150', '150') ); ?></td>
        </tr>
      </table>
    </li>

    <hr/>
    <li class="servicios_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Nombre del pack', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Texto precio', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Descuento genérico', 'wpfunos');?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioPackNombre','name' => $this->plugin_name . '_servicioPackNombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20 )); ?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioTextoPrecio','name' => $this->plugin_name . '_servicioTextoPrecio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20 )); ?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDescuentoGenerico','name' => $this->plugin_name . '_servicioDescuentoGenerico','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 )); ?>%</td>
        </tr>
      </table>
    </li>
    <hr/>
    <li class="servicios_wpfunos_list">
      <table style="width:100%">
        <tr>
          <td style="width:20%"><?php esc_html_e('Lead (entrada de datos)', 'wpfunos');?></td>
          <td style="width:20%"><?php esc_html_e('Lead (resultado busqueda)', 'wpfunos');?></td>
          <td style="width:20%"><?php esc_html_e('Precio confirmado', 'wpfunos');?></td>
          <td style="width:20%"><?php esc_html_e('Activo', 'wpfunos');?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_servicioLead','name' => $this->plugin_name . '_servicioLead','required' => '','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 )); ?></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_servicioLead2','name' => $this->plugin_name . '_servicioLead2','required' => '','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_servicioPrecioConfirmado','name' => $this->plugin_name . '_servicioPrecioConfirmado','required' => '','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7  ));?></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_servicioActivo','name' => $this->plugin_name . '_servicioActivo','required' => '','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        </tr>
      </table>
    </li>
    <li class="servicios_wpfunos_list">
      <table style="width:100%">
        <tr>
          <td style="width:20%"><?php esc_html_e('Botones llamar', 'wpfunos');?></td>
          <td style="width:20%"><?php esc_html_e('Botón presupuesto', 'wpfunos');?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_servicioBotonesLlamar','name' => $this->plugin_name . '_servicioBotonesLlamar','required' => '','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_servicioBotonPresupuesto','name' => $this->plugin_name . '_servicioBotonPresupuesto','required' => '','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        </tr>
      </table>
    </li>
    <hr/>
    <h3><?php esc_html_e('PRECIO BASE', 'wpfunos');?></h3>
    <?php  //Precio base?>
    <li class="servicios_wpfunos_list">
      <table>
        <tr>
          <td></td><td>Precio</td><td style="width:5px;"></td><td>Descuento</td>
        </tr>
        <tr>
          <td>Precio Base</td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioPrecioBase','name' => $this->plugin_name . '_servicioPrecioBase','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
          <td></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioPrecioBaseDescuento','name' => $this->plugin_name . '_servicioPrecioBaseDescuento','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>%</td>
        </tr>
      </table>
    </li>
    <hr/>
    <h3><?php esc_html_e('DESTINO', 'wpfunos');?></h3>
    <table style="width:100%">
      <tr>
        <td>Tipo</td><td>Nombre</td><td>Precio</td>
      </tr>
      <tr>
        <td>Entierro</td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDestino_1Nombre','name' => $this->plugin_name . '_servicioDestino_1Nombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDestino_1Precio','name' => $this->plugin_name . '_servicioDestino_1Precio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
      </tr>
      <tr>
        <td>Incineración</td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDestino_2Nombre','name' => $this->plugin_name . '_servicioDestino_2Nombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDestino_2Precio','name' => $this->plugin_name . '_servicioDestino_2Precio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
      </tr>
      <tr>
        <td>Traslado</td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDestino_3Nombre','name' => $this->plugin_name . '_servicioDestino_3Nombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDestino_3Precio','name' => $this->plugin_name . '_servicioDestino_3Precio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
      </tr>
    </table>
    <hr/>
    <h3><?php esc_html_e('ATAÚD', 'wpfunos');?></h3>
    <table style="width:100%">
      <tr>
        <td>Tipo</td><td>Nombre</td><td>Precio</td>
      </tr>
      <tr>
        <td>Económico</td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaud_1Nombre','name' => $this->plugin_name . '_servicioAtaud_1Nombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaud_1Precio','name' => $this->plugin_name . '_servicioAtaud_1Precio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
      </tr>
      <tr>
        <td>Medio</td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaud_2Nombre','name' => $this->plugin_name . '_servicioAtaud_2Nombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaud_2Precio','name' => $this->plugin_name . '_servicioAtaud_2Precio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
      </tr>
      <tr>
        <td>Premium</td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaud_3Nombre','name' => $this->plugin_name . '_servicioAtaud_3Nombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaud_3Precio','name' => $this->plugin_name . '_servicioAtaud_3Precio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
      </tr>
      <tr>
        <td>Económico (Ecológico)</td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaudEcologico_1Nombre','name' => $this->plugin_name . '_servicioAtaudEcologico_1Nombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaudEcologico_1Precio','name' => $this->plugin_name . '_servicioAtaudEcologico_1Precio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
      </tr>
      <tr>
        <td>Medio (Ecológico)</td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaudEcologico_2Nombre','name' => $this->plugin_name . '_servicioAtaudEcologico_2Nombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaudEcologico_2Precio','name' => $this->plugin_name . '_servicioAtaudEcologico_2Precio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
      </tr>
      <tr>
        <td>Premium (Ecológico)</td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaudEcologico_3Nombre','name' => $this->plugin_name . '_servicioAtaudEcologico_3Nombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaudEcologico_3Precio','name' => $this->plugin_name . '_servicioAtaudEcologico_3Precio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
      </tr>
    </table>
    <hr/>
    <h3><?php esc_html_e('VELATORIO', 'wpfunos');?></h3>
    <table style="width:100%">
      <tr>
        <td>Tipo</td><td>Nombre</td><td>Precio</td>
      </tr>
      <tr>
        <td>Velatorio</td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioVelatorioNombre','name' => $this->plugin_name . '_servicioVelatorioNombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioVelatorioPrecio','name' => $this->plugin_name . '_servicioVelatorioPrecio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
      </tr>
      <tr>
        <td>Sin</td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioVelatorioNoNombre','name' => $this->plugin_name . '_servicioVelatorioNoNombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioVelatorioNoPrecio','name' => $this->plugin_name . '_servicioVelatorioNoPrecio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
      </tr>
    </table>
    <hr/>
    <h3><?php esc_html_e('DESPEDIDA', 'wpfunos');?></h3>
    <table style="width:100%">
      <tr>
        <td>Tipo</td><td>Nombre</td><td>Precio</td>
      </tr>
      <tr>
        <td>Solo sala</td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDespedida_1Nombre','name' => $this->plugin_name . '_servicioDespedida_1Nombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDespedida_1Precio','name' => $this->plugin_name . '_servicioDespedida_1Precio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
      </tr>
      <tr>
        <td>Civil</td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDespedida_2Nombre','name' => $this->plugin_name . '_servicioDespedida_2Nombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDespedida_2Precio','name' => $this->plugin_name . '_servicioDespedida_2Precio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
      </tr>
      <tr>
        <td>Religiosa</td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDespedida_3Nombre','name' => $this->plugin_name . '_servicioDespedida_3Nombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDespedida_3Precio','name' => $this->plugin_name . '_servicioDespedida_3Precio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
      </tr>
    </table>
    <hr/>



    <h3><?php esc_html_e('NUEVO COMPARADOR', 'wpfunos');?></h3>
    <table style="width:100%">
      <tr>
        <td>Tipo</td><td>Precio</td><td>Comentario</td>
      </tr>

		<?php
$menu =
'<li><a href="#inicio"><strong>INICIO</strong></a></li>
<li><a href="#EES"><strong>EES: E</strong>ntierro + ataúd <strong>E</strong>conómico + <strong>S</strong>in velatorio</a></li>
<li><a href="#EEV"><strong>EEV: E</strong>ntierro + ataúd <strong>E</strong>conómico + con <strong>V</strong>elatorio</a></li>
<li><a href="#EMS"><strong>EMS: E</strong>ntierro + ataúd <strong>M</strong>edio + <strong>S</strong>in velatorio</a></li>
<li><a href="#EMV"><strong>EMV: E</strong>ntierro + ataúd <strong>M</strong>edio + con <strong>V</strong>elatorio</a></li>
<li><a href="#EPS"><strong>EPS: E</strong>ntierro + ataúd <strong>P</strong>remium + <strong>S</strong>in velatorio</a></li>
<li><a href="#EPV"><strong>EPV: E</strong>ntierro + ataúd <strong>P</strong>remium + con <strong>V</strong>elatorio</a></li>
<li><a href="#IES"><strong>IES: I</strong>Incineración + ataúd <strong>E</strong>conómico + <strong>S</strong>in velatorio</a></li>
<li><a href="#IEV"><strong>IEV: I</strong>Incineración + ataúd <strong>E</strong>conómico + con <strong>V</strong>elatorio</a></li>
<li><a href="#IMS"><strong>IMS: I</strong>Incineración + ataúd <strong>M</strong>edio + <strong>S</strong>in velatorio</a></li>
<li><a href="#IMV"><strong>IMV: I</strong>Incineración + ataúd <strong>M</strong>edio + con <strong>V</strong>elatorio</a></li>
<li><a href="#IPS"><strong>IPS: I</strong>Incineración + ataúd <strong>P</strong>remium + <strong>S</strong>in velatorio</a></li>
<li><a href="#IPV"><strong>IPV: I</strong>Incineración + ataúd <strong>P</strong>remium + con <strong>V</strong>elatorio</a></li>';

$tipos = array(
    "EESS", "EESO", "EESC", "EESR",
    "EEVS", "EEVO", "EEVC", "EEVR",
    "EMSS", "EMSO", "EMSC", "EMSR",
    "EMVS", "EMVO", "EMVC", "EMVR",
    "EPSS", "EPSO", "EPSC", "EPSR",
    "EPVS", "EPVO", "EPVC", "EPVR",
    "IESS", "IESO", "IESC", "IESR",
    "IEVS", "IEVO", "IEVC", "IEVR",
    "IMSS", "IMSO", "IMSC", "IMSR",
    "IMVS", "IMVO", "IMVC", "IMVR",
    "IPSS", "IPSO", "IPSC", "IPSR",
    "IPVS", "IPVO", "IPVC", "IPVR",

    );

$cuatro = 1;
$output = '';
foreach ( $tipos as $tipo ) {
if( $cuatro == 5 ) $cuatro =1 ;
  if( $cuatro == 1 ){
    ?>
    <tr><td colspan="3" id=<?php echo substr($tipo,0,3); ?>><hr/></td></tr>
    <tr>
      <td colspan="3" >
        <?php echo $menu; ?>
      </td>
    </tr>
    <?php
  }
	?>
  <tr>
    <td><?php echo $tipo; ?></td>

	  <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicio'.$tipo,'name' => 'wpfunos_servicio'.$tipo,'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
	 <td>

	  <?php
		$campo_comentario = 'wpfunos_servicio'. $tipo .'_Comentario';
		$notes_servicio = get_post_meta( $post->ID, $campo_comentario, true );
		$args_servicio = array( 'textarea_name' => $campo_comentario,  'textarea_rows' => 10, );
		wp_editor( $notes_servicio, $campo_comentario, $args_servicio );
      ?>

	  </td>
  <?php





  $cuatro ++;
}

		?>


    </table>
    <hr/>






    <h3><?php esc_html_e('Comentarios', 'wpfunos');?></h3>
    <?php // provide textarea name for $_POST variable
    $notes_servicioPrecioBaseComentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioPrecioBaseComentario', true );
    $args_servicioPrecioBaseComentario = array( 'textarea_name' => $this->plugin_name . '_servicioPrecioBaseComentario', );
    $notes_servicioDestino_1Comentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioDestino_1Comentario', true );
    $args_servicioDestino_1Comentario = array( 'textarea_name' => $this->plugin_name . '_servicioDestino_1Comentario', );
    $notes_servicioDestino_2Comentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioDestino_2Comentario', true );
    $args_servicioDestino_2Comentario = array( 'textarea_name' => $this->plugin_name . '_servicioDestino_2Comentario', );
    $notes_servicioDestino_3Comentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioDestino_3Comentario', true );
    $args_servicioDestino_3Comentario = array( 'textarea_name' => $this->plugin_name . '_servicioDestino_3Comentario', );
    $notes_servicioAtaud_1Comentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioAtaud_1Comentario', true );
    $args_servicioAtaud_1Comentario = array( 'textarea_name' => $this->plugin_name . '_servicioAtaud_1Comentario', );
    $notes_servicioAtaud_2Comentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioAtaud_2Comentario', true );
    $args_servicioAtaud_2Comentario = array( 'textarea_name' => $this->plugin_name . '_servicioAtaud_2Comentario', );
    $notes_servicioAtaud_3Comentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioAtaud_3Comentario', true );
    $args_servicioAtaud_3Comentario = array( 'textarea_name' => $this->plugin_name . '_servicioAtaud_3Comentario', );
    $notes_servicioAtaudEcologico_1Comentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioAtaudEcologico_1Comentario', true );
    $args_servicioAtaudEcologico_1Comentario = array( 'textarea_name' => $this->plugin_name . '_servicioAtaudEcologico_1Comentario', );
    $notes_servicioAtaudEcologico_2Comentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioAtaudEcologico_2Comentario', true );
    $args_servicioAtaudEcologico_2Comentario = array( 'textarea_name' => $this->plugin_name . '_servicioAtaudEcologico_2Comentario', );
    $notes_servicioAtaudEcologico_3Comentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioAtaudEcologico_3Comentario', true );
    $args_servicioAtaudEcologico_3Comentario = array( 'textarea_name' => $this->plugin_name . '_servicioAtaudEcologico_3Comentario', );
    $notes_servicioVelatorioComentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioVelatorioComentario', true );
    $args_servicioVelatorioComentario = array( 'textarea_name' => $this->plugin_name . '_servicioVelatorioComentario', );
    $notes_servicioVelatorioNoComentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioVelatorioNoComentario', true );
    $args_servicioVelatorioNoComentario = array( 'textarea_name' => $this->plugin_name . '_servicioVelatorioNoComentario', );
    $notes_servicioDespedida_1Comentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioDespedida_1Comentario', true );
    $args_servicioDespedida_1Comentario = array( 'textarea_name' => $this->plugin_name . '_servicioDespedida_1Comentario', );
    $notes_servicioDespedida_2Comentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioDespedida_2Comentario', true );
    $args_servicioDespedida_2Comentario = array( 'textarea_name' => $this->plugin_name . '_servicioDespedida_2Comentario', );
    $notes_servicioDespedida_3Comentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioDespedida_3Comentario', true );
    $args_servicioDespedida_3Comentario = array( 'textarea_name' => $this->plugin_name . '_servicioDespedida_3Comentario', );
    $notes_servicioPosiblesExtras = get_post_meta( $post->ID, $this->plugin_name . '_servicioPosiblesExtras', true );
    $args_servicioPosiblesExtras = array( 'textarea_name' => $this->plugin_name . '_servicioPosiblesExtras', );
    ?>
    <li><label for="'.$this->plugin_name.'_servicioPrecioBaseComentario" style="font-size: 32px;">Notas Precio Base</label>
      <?php	wp_editor( $notes_servicioPrecioBaseComentario, $this->plugin_name . '_servicioPrecioBaseComentario',$args_servicioPrecioBaseComentario); ?>
    </li>
    <li><label for="'.$this->plugin_name.'_servicioDestino_1Comentario" style="font-size: 32px;">Notas Entierro</label>
      <?php	wp_editor( $notes_servicioDestino_1Comentario, $this->plugin_name . '_servicioDestino_1Comentario',$args_servicioDestino_1Comentario); ?>
    </li>
    <li><label for="'.$this->plugin_name.'_servicioDestino_2Comentario" style="font-size: 32px;">Notas Incineración</label>
      <?php	wp_editor( $notes_servicioDestino_2Comentario, $this->plugin_name . '_servicioDestino_2Comentario',$args_servicioDestino_2Comentario); ?>
    </li>
    <li><label for="'.$this->plugin_name.'_servicioDestino_3Comentario" style="font-size: 32px;">Notas Traslado</label>
      <?php	wp_editor( $notes_servicioDestino_3Comentario, $this->plugin_name . '_servicioDestino_3Comentario',$args_servicioDestino_3Comentario); ?>
    </li>
    <li><label for="'.$this->plugin_name.'_servicioAtaud_1Comentario" style="font-size: 32px;">Notas Ataud Económico</label>
      <?php	wp_editor( $notes_servicioAtaud_1Comentario, $this->plugin_name . '_servicioAtaud_1Comentario',$args_servicioAtaud_1Comentario); ?>
    </li>
    <li><label for="'.$this->plugin_name.'_servicioAtaud_2Comentario" style="font-size: 32px;">Notas Ataud Medio</label>
      <?php	wp_editor( $notes_servicioAtaud_2Comentario, $this->plugin_name . '_servicioAtaud_2Comentario',$args_servicioAtaud_2Comentario); ?>
    </li>
    <li><label for="'.$this->plugin_name.'_servicioAtaud_3Comentario" style="font-size: 32px;">Notas Ataud Premium</label>
      <?php	wp_editor( $notes_servicioAtaud_3Comentario, $this->plugin_name . '_servicioAtaud_3Comentario',$args_servicioAtaud_3Comentario); ?>
    </li>
    <li><label for="'.$this->plugin_name.'_servicioAtaudEcologico_1Comentario" style="font-size: 32px;">Notas Ataud Ecológico Económico</label>
      <?php	wp_editor( $notes_servicioAtaudEcologico_1Comentario, $this->plugin_name . '_servicioAtaudEcologico_1Comentario',$args_servicioAtaudEcologico_1Comentario); ?>
    </li>
    <li><label for="'.$this->plugin_name.'_servicioAtaudEcologico_2Comentario" style="font-size: 32px;">Notas Ataud Ecológico Medio</label>
      <?php	wp_editor( $notes_servicioAtaudEcologico_2Comentario, $this->plugin_name . '_servicioAtaudEcologico_2Comentario',$args_servicioAtaudEcologico_2Comentario); ?>
    </li>
    <li><label for="'.$this->plugin_name.'_servicioAtaudEcologico_3Comentario" style="font-size: 32px;">Notas Ataud Ecológico Premium</label>
      <?php	wp_editor( $notes_servicioAtaudEcologico_3Comentario, $this->plugin_name . '_servicioAtaudEcologico_3Comentario',$args_servicioAtaudEcologico_3Comentario); ?>
    </li>
    <li><label for="'.$this->plugin_name.'_servicioVelatorioComentario" style="font-size: 32px;">Notas Velatorio</label>
      <?php	wp_editor( $notes_servicioVelatorioComentario, $this->plugin_name . '_servicioVelatorioComentario',$args_servicioVelatorioComentario); ?>
    </li>
    <li><label for="'.$this->plugin_name.'_servicioVelatorioNoComentario" style="font-size: 32px;">Notas Velatorio No</label>
      <?php	wp_editor( $notes_servicioVelatorioNoComentario, $this->plugin_name . '_servicioVelatorioNoComentario',$args_servicioVelatorioNoComentario); ?>
    </li>
    <li><label for="'.$this->plugin_name.'_servicioDespedida_1Comentario" style="font-size: 32px;">Notas Despedida Sala</label>
      <?php	wp_editor( $notes_servicioDespedida_1Comentario, $this->plugin_name . '_servicioDespedida_1Comentario',$args_servicioDespedida_1Comentario); ?>
    </li>
    <li><label for="'.$this->plugin_name.'_servicioDespedida_2Comentario" style="font-size: 32px;">Notas Despedida Civil</label>
      <?php	wp_editor( $notes_servicioDespedida_2Comentario, $this->plugin_name . '_servicioDespedida_2Comentario',$args_servicioDespedida_2Comentario); ?>
    </li>
    <li><label for="'.$this->plugin_name.'_servicioDespedida_3Comentario" style="font-size: 32px;">Notas Religiosa No</label>
      <?php	wp_editor( $notes_servicioDespedida_3Comentario, $this->plugin_name . '_servicioDespedida_3Comentario',$args_servicioDespedida_3Comentario); ?>
    </li>
    <li><label for="'.$this->plugin_name.'_servicioPosiblesExtras" style="font-size: 32px;">Posibles extras</label>
      <?php	wp_editor( $notes_servicioPosiblesExtras, $this->plugin_name . '_servicioPosiblesExtras',$args_servicioPosiblesExtras); ?>
    </li>
  </ul>
</div>
