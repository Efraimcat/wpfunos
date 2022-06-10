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
      <tr>
        <td>EESS</td>
        <?php     //Entierro + Ataúd económico + Sin velatorio + Sin ceremonia
        $notes_servicioEESS_Comentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioEESS_Comentario', true );
        $args_servicioEESS_Comentario = array( 'textarea_name' => $this->plugin_name . '_servicioEESS_Comentario', );
        ?>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioEESS','name' => $this->plugin_name . '_servicioEESS','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
        <td><?php	wp_editor( $notes_servicioEESS_Comentario, $this->plugin_name . '_servicioEESS_Comentario',$args_servicioEESS_Comentario); ?></td>
      </tr>
      <tr>
        <td>EESO</td>
        <?php     //Entierro + Ataúd económico + Sin velatorio + Con ceremonia solo sala
        $notes_servicioEESO_Comentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioEESO_Comentario', true );
        $args_servicioEESO_Comentario = array( 'textarea_name' => $this->plugin_name . '_servicioEESO_Comentario', );
        ?>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioEESO','name' => $this->plugin_name . '_servicioEESO','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
        <td><?php	wp_editor( $notes_servicioEESO_Comentario, $this->plugin_name . '_servicioEESO_Comentario',$args_servicioEESO_Comentario); ?></td>
      </tr>
      <tr>
        <td>EESC</td>
        <?php     //Entierro + Ataúd económico + Sin velatorio + Con ceremonia civil
        $notes_servicioEESC_Comentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioEESC_Comentario', true );
        $args_servicioEESC_Comentario = array( 'textarea_name' => $this->plugin_name . '_servicioEESC_Comentario', );
        ?>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioEESC','name' => $this->plugin_name . '_servicioEESC','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
        <td><?php	wp_editor( $notes_servicioEESC_Comentario, $this->plugin_name . '_servicioEESC_Comentario',$args_servicioEESC_Comentario); ?></td>
      </tr>
      <tr>
        <td>EESR</td>
        <?php     //Entierro + Ataúd económico + Sin velatorio + Con ceremonia religiosa
        $notes_servicioEESR_Comentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioEESR_Comentario', true );
        $args_servicioEESR_Comentario = array( 'textarea_name' => $this->plugin_name . '_servicioEESR_Comentario', );
        ?>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioEESR','name' => $this->plugin_name . '_servicioEESR','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
        <td><?php	wp_editor( $notes_servicioEESR_Comentario, $this->plugin_name . '_servicioEESR_Comentario',$args_servicioEESR_Comentario); ?></td>
      </tr>

      <tr>
        <td>EEVS</td>
        <?php     //Entierro + Ataúd económico + Con velatorio + Sin ceremonia
        $notes_servicioEEVS_Comentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioEEVS_Comentario', true );
        $args_servicioEEVS_Comentario = array( 'textarea_name' => $this->plugin_name . '_servicioEEVS_Comentario', );
        ?>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioEEVS','name' => $this->plugin_name . '_servicioEEVS','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
        <td><?php	wp_editor( $notes_servicioEEVS_Comentario, $this->plugin_name . '_servicioEEVS_Comentario',$args_servicioEEVS_Comentario); ?></td>
      </tr>
      <tr>
        <td>EEVO</td>
        <?php     //Entierro + Ataúd económico + Con velatorio + Con ceremonia solo sala
        $notes_servicioEEVO_Comentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioEEVO_Comentario', true );
        $args_servicioEEVO_Comentario = array( 'textarea_name' => $this->plugin_name . '_servicioEEVO_Comentario', );
        ?>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioEEVO','name' => $this->plugin_name . '_servicioEEVO','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
        <td><?php	wp_editor( $notes_servicioEEVO_Comentario, $this->plugin_name . '_servicioEEVO_Comentario',$args_servicioEEVO_Comentario); ?></td>
      </tr>
      <tr>
        <td>EEVC</td>
        <?php     //Entierro + Ataúd económico + Con velatorio + Con ceremonia civil
        $notes_servicioEEVC_Comentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioEEVC_Comentario', true );
        $args_servicioEEVC_Comentario = array( 'textarea_name' => $this->plugin_name . '_servicioEEVC_Comentario', );
        ?>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioEEVC','name' => $this->plugin_name . '_servicioEEVC','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
        <td><?php	wp_editor( $notes_servicioEEVC_Comentario, $this->plugin_name . '_servicioEEVC_Comentario',$args_servicioEEVC_Comentario); ?></td>
      </tr>
      <tr>
        <td>EEVR</td>
        <?php     //Entierro + Ataúd económico + Con velatorio + Con ceremonia religiosa
        $notes_servicioEEVR_Comentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioEEVR_Comentario', true );
        $args_servicioEEVR_Comentario = array( 'textarea_name' => $this->plugin_name . '_servicioEEVR_Comentario', );
        ?>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioEEVR','name' => $this->plugin_name . '_servicioEEVR','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
        <td><?php	wp_editor( $notes_servicioEEVR_Comentario, $this->plugin_name . '_servicioEEVR_Comentario',$args_servicioEEVR_Comentario); ?></td>
      </tr>




    </table>
    <hr/>

    <?php
    //Entierro + Ataúd medio + Sin velatorio + Sin ceremonia
    $servicioEMSS = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEMSS'] );
    $servicioEMSS_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEMSS_Comentario'] );
    //Entierro + Ataúd medio + Sin velatorio + Con ceremonia solo sala
    $servicioEMSO = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEMSO'] );
    $servicioEMSO_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEMSO_Comentario'] );
    //Entierro + Ataúd medio + Sin velatorio + Con ceremonia civil
    $servicioEMSC = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEMSC'] );
    $servicioEMSC_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEMSC_Comentario'] );
    //Entierro + Ataúd medio + Sin velatorio + Con ceremonia religiosa
    $servicioEMSR = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEMSR'] );
    $servicioEMSR_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEMSR_Comentario'] );
    //Entierro + Ataúd medio + Con velatorio + Sin ceremonia
    $servicioEMVS = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEMVS'] );
    $servicioEMVS_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEMVS_Comentario'] );
    //Entierro + Ataúd medio + Con velatorio + Con ceremonia solo sala
    $servicioEMVO = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEMVO'] );
    $servicioEMVO_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEMVO_Comentario'] );
    //Entierro + Ataúd medio + Con velatorio + Con ceremonia civil
    $servicioEMVC = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEMVC'] );
    $servicioEMVC_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEMVC_Comentario'] );
    //Entierro + Ataúd medio + Con velatorio + Con ceremonia religiosa
    $servicioEMVR = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEMVR'] );
    $servicioEMVR_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEMVR_Comentario'] );
    //Entierro + Ataúd premium + Sin velatorio + Sin ceremonia
    $servicioEPSS = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEPSS'] );
    $servicioEPSS_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEPSS_Comentario'] );
    //Entierro + Ataúd premium + Sin velatorio + Con ceremonia solo sala
    $servicioEPSO = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEPSO'] );
    $servicioEPSO_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEPSO_Comentario'] );
    //Entierro + Ataúd premium + Sin velatorio + Con ceremonia civil
    $servicioEPSC = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEPSC'] );
    $servicioEPSC_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEPSC_Comentario'] );
    //Entierro + Ataúd premium + Sin velatorio + Con ceremonia religiosa
    $servicioEPSR = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEPSR'] );
    $servicioEPSR_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEPSR_Comentario'] );
    //Entierro + Ataúd premium + Con velatorio + Sin ceremonia
    $servicioEPVS = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEPVS'] );
    $servicioEPVS_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEPVS_Comentario'] );
    //Entierro + Ataúd premium + Con velatorio + Con ceremonia solo sala
    $servicioEPVO = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEPVO'] );
    $servicioEPVO_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEPVO_Comentario'] );
    //Entierro + Ataúd premium + Con velatorio + Con ceremonia civil
    $servicioEPVC = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEPVC'] );
    $servicioEPVC_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEPVC_Comentario'] );
    //Entierro + Ataúd premium + Con velatorio + Con ceremonia religiosa
    $servicioEPVR = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEPVR'] );
    $servicioEPVR_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEPVR_Comentario'] );
    //Incineración + Ataúd económico + Sin velatorio + Sin ceremonia
    $servicioIESS = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIESS'] );
    $servicioIESS_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIESS_Comentario'] );
    //Incineración + Ataúd económico + Sin velatorio + Con ceremonia solo sala
    $servicioIESO = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIESO'] );
    $servicioIESO_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIESO_Comentario'] );
    //Incineración + Ataúd económico + Sin velatorio + Con ceremonia civil
    $servicioIESC = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIESC'] );
    $servicioIESC_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIESC_Comentario'] );
    //Incineración + Ataúd económico + Sin velatorio + Con ceremonia religiosa
    $servicioIESR = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIESR'] );
    $servicioIESR_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIESR_Comentario'] );
    //Incineración + Ataúd económico + Con velatorio + Sin ceremonia
    $servicioIEVS = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIEVS'] );
    $servicioIEVS_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIEVS_Comentario'] );
    //Incineración + Ataúd económico + Con velatorio + Con ceremonia solo sala
    $servicioIEVO = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIEVO'] );
    $servicioIEVO_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIEVO_Comentario'] );
    //Incineración + Ataúd económico + Con velatorio + Con ceremonia civil
    $servicioIEVC = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIEVC'] );
    $servicioIEVC_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIEVC_Comentario'] );
    //Incineración + Ataúd económico + Con velatorio + Con ceremonia religiosa
    $servicioIEVR = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIEVR'] );
    $servicioIEVR_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIEVR_Comentario'] );
    //Incineración + Ataúd medio + Sin velatorio + Sin ceremonia
    $servicioIMSS = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIMSS'] );
    $servicioIMSS_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIMSS_Comentario'] );
    //Incineración + Ataúd medio + Sin velatorio + Con ceremonia solo sala
    $servicioIMSO = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIMSO'] );
    $servicioIMSO_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIMSO_Comentario'] );
    //Incineración + Ataúd medio + Sin velatorio + Con ceremonia civil
    $servicioIMSC = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIMSC'] );
    $servicioIMSC_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIMSC_Comentario'] );
    //Incineración + Ataúd medio + Sin velatorio + Con ceremonia religiosa
    $servicioIMSR = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIMSR'] );
    $servicioIMSR_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIMSR_Comentario'] );
    //Incineración + Ataúd medio + Con velatorio + Sin ceremonia
    $servicioIMVS = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIMVS'] );
    $servicioIMVS_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIMVS_Comentario'] );
    //Incineración + Ataúd medio + Con velatorio + Con ceremonia solo sala
    $servicioIMVO = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIMVO'] );
    $servicioIMVO_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIMVO_Comentario'] );
    //Incineración + Ataúd medio + Con velatorio + Con ceremonia civil
    $servicioIMVC = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIMVC'] );
    $servicioIMVC_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIMVC_Comentario'] );
    //Incineración + Ataúd medio + Con velatorio + Con ceremonia religiosa
    $servicioIMVR = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIMVR'] );
    $servicioIMVR_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIMVR_Comentario'] );
    //Incineración + Ataúd premium + Sin velatorio + Sin ceremonia
    $servicioIPSS = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIPSS'] );
    $servicioIPSS_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIPSS_Comentario'] );
    //Incineración + Ataúd premium + Sin velatorio + Con ceremonia solo sala
    $servicioIPSO = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIPSO'] );
    $servicioIPSO_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIPSO_Comentario'] );
    //Incineración + Ataúd premium + Sin velatorio + Con ceremonia civil
    $servicioIPSC = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIPSC'] );
    $servicioIPSC_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIPSC_Comentario'] );
    //Incineración + Ataúd premium + Sin velatorio + Con ceremonia religiosa
    $servicioIPSR = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIPSR'] );
    $servicioIPSR_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIPSR_Comentario'] );
    //Incineración + Ataúd premium + Con velatorio + Sin ceremonia
    $servicioIPVS = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIPVS'] );
    $servicioIPVS_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIPVS_Comentario'] );
    //Incineración + Ataúd premium + Con velatorio + Con ceremonia solo sala
    $servicioIPVO = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIPVO'] );
    $servicioIPVO_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIPVO_Comentario'] );
    //Incineración + Ataúd premium + Con velatorio + Con ceremonia civil
    $servicioIPVC = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIPVC'] );
    $servicioIPVC_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIPVC_Comentario'] );
    //Incineración + Ataúd premium + Con velatorio + Con ceremonia religiosa
    $servicioIPVR = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIPVR'] );
    $servicioIPVR_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIPVR_Comentario'] );
    ?>


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
