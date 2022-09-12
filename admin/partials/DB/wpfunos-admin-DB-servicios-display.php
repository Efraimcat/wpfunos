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
<style>
#wpfunos_servicioEESS,#wpfunos_servicioEESO,#wpfunos_servicioEESC,#wpfunos_servicioEESR,
#wpfunos_servicioEEVS,#wpfunos_servicioEEVO,#wpfunos_servicioEEVC,#wpfunos_servicioEEVR,
#wpfunos_servicioEMSS,#wpfunos_servicioEMSO,#wpfunos_servicioEMSC,#wpfunos_servicioEMSR,
#wpfunos_servicioEMVS,#wpfunos_servicioEMVO,#wpfunos_servicioEMVC,#wpfunos_servicioEMVR,
#wpfunos_servicioEPSS,#wpfunos_servicioEPSO,#wpfunos_servicioEPSC,#wpfunos_servicioEPSR,
#wpfunos_servicioEPVS,#wpfunos_servicioEPVO,#wpfunos_servicioEPVC,#wpfunos_servicioEPVR,
#wpfunos_servicioIESS,#wpfunos_servicioIESO,#wpfunos_servicioIESC,#wpfunos_servicioIESR,
#wpfunos_servicioIEVS,#wpfunos_servicioIEVO,#wpfunos_servicioIEVC,#wpfunos_servicioIEVR,
#wpfunos_servicioIMSS,#wpfunos_servicioIMSO,#wpfunos_servicioIMSC,#wpfunos_servicioIMSR,
#wpfunos_servicioIMVS,#wpfunos_servicioIMVO,#wpfunos_servicioIMVC,#wpfunos_servicioIMVR,
#wpfunos_servicioIPSS,#wpfunos_servicioIPSO,#wpfunos_servicioIPSC,#wpfunos_servicioIPSR,
#wpfunos_servicioIPVS,#wpfunos_servicioIPVO,#wpfunos_servicioIPVC,#wpfunos_servicioIPVR
{
  text-align: right;
}
</style>
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
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioNombre','name' => 'wpfunos_servicioNombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioEmpresa','name' => 'wpfunos_servicioEmpresa','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20   ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioPoblacion','name' => 'wpfunos_servicioPoblacion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioProvincia','name' => 'wpfunos_servicioProvincia','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioDireccion','name' => 'wpfunos_servicioDireccion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID  ));?></td>
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
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioEmail','name' => 'wpfunos_servicioEmail','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioTelefono','name' => 'wpfunos_servicioTelefono','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20  )); ?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioValoracion','name' => 'wpfunos_servicioValoracion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 )); ?></td>
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
          <td style="vertical-align: middle;"><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioLogo','name' => 'wpfunos_servicioLogo','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
          <td style="vertical-align: middle;"><?php echo wp_get_attachment_image( get_post_meta( $_GET['post'], 'wpfunos_servicioLogo', true ), 'full' ); ?></td>
          <td style="width:15px;"></td>
          <td style="vertical-align: middle;"><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioImagenPromo','name' => 'wpfunos_servicioImagenPromo','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 14 )); ?></td>
          <td style="vertical-align: middle;"><?php echo wp_get_attachment_image( get_post_meta( $_GET['post'], 'wpfunos_servicioImagenPromo', true ),'full' ); ?></td>
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
          <td style="vertical-align: middle;"><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioImagenSlider1','name' => 'wpfunos_servicioImagenSlider1','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
          <td style="vertical-align: middle;"><?php echo wp_get_attachment_image( get_post_meta( $_GET['post'], 'wpfunos_servicioImagenSlider1', true ), array('150', '150') ); ?></td>
          <td style="width:15px;"></td>
          <td style="vertical-align: middle;"><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioImagenSlider2','name' => 'wpfunos_servicioImagenSlider2','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 )); ?></td>
          <td style="vertical-align: middle;"><?php echo wp_get_attachment_image( get_post_meta( $_GET['post'], 'wpfunos_servicioImagenSlider2', true ), array('150', '150') ); ?></td>
          <td style="width:15px;"></td>
          <td style="vertical-align: middle;"><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioImagenSlider3','name' => 'wpfunos_servicioImagenSlider3','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 )); ?></td>
          <td style="vertical-align: middle;"><?php echo wp_get_attachment_image( get_post_meta( $_GET['post'], 'wpfunos_servicioImagenSlider3', true ), array('150', '150') ); ?></td>
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
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioPackNombre','name' => 'wpfunos_servicioPackNombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20 )); ?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioTextoPrecio','name' => 'wpfunos_servicioTextoPrecio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20 )); ?></td>
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
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_servicioLead','name' => 'wpfunos_servicioLead','required' => '','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 )); ?></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_servicioLead2','name' => 'wpfunos_servicioLead2','required' => '','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_servicioPrecioConfirmado','name' => 'wpfunos_servicioPrecioConfirmado','required' => '','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7  ));?></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_servicioActivo','name' => 'wpfunos_servicioActivo','required' => '','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        </tr>
      </table>
    </li>
    <li class="servicios_wpfunos_list">
      <table style="width:100%">
        <tr>
          <td style="width:20%"><?php esc_html_e('Botones llamar', 'wpfunos');?></td>
          <td style="width:20%"><?php esc_html_e('Botón presupuesto', 'wpfunos');?></td>
          <td style="width:20%"><?php esc_html_e('Botón financiación', 'wpfunos');?></td>
          <td style="width:20%"><?php esc_html_e('Bloquear comentarios', 'wpfunos');?></td>
          <td style="width:20%"><?php esc_html_e('Actualizar comentarios', 'wpfunos');?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_servicioBotonesLlamar','name' => 'wpfunos_servicioBotonesLlamar','required' => '','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_servicioBotonPresupuesto','name' => 'wpfunos_servicioBotonPresupuesto','required' => '','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_servicioBotonFinanciacion','name' => 'wpfunos_servicioBotonFinanciacion','required' => '','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_servicioBloquearComentario','name' => 'wpfunos_servicioBloquearComentario','required' => '','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_servicioActualizarComentario','name' => 'wpfunos_servicioActualizarComentario','required' => '','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        </tr>
      </table>
    </li>
    <hr/>
    <h3><?php echo '<strong>ANTIGUO COMPARADOR</strong>';?></h3>
    <hr/>
    <h3><?php esc_html_e('PRECIO BASE', 'wpfunos');?></h3>
    <?php  //Precio base?>
    <li class="servicios_wpfunos_list">
      <table>
        <tr>
          <td></td><td>Precio</td>
        </tr>
        <tr>
          <td>Precio Base</td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioPrecioBase','name' => 'wpfunos_servicioPrecioBase','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
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
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioDestino_1Nombre','name' => 'wpfunos_servicioDestino_1Nombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioDestino_1Precio','name' => 'wpfunos_servicioDestino_1Precio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
      </tr>
      <tr>
        <td>Incineración</td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioDestino_2Nombre','name' => 'wpfunos_servicioDestino_2Nombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioDestino_2Precio','name' => 'wpfunos_servicioDestino_2Precio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
      </tr>
      <tr>
        <td>Traslado</td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioDestino_3Nombre','name' => 'wpfunos_servicioDestino_3Nombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioDestino_3Precio','name' => 'wpfunos_servicioDestino_3Precio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
      </tr>
    </table>
    <hr/>
    <h3><?php esc_html_e('ATAÚD', 'wpfunos');?></h3>
    <table style="width:100%">
      <tr>
        <td>Tipo</td><td>Nombre</td><td>Precio</td>
      </tr>
      <tr>
        <td>Económico (Ecológico)</td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioAtaudEcologico_1Nombre','name' => 'wpfunos_servicioAtaudEcologico_1Nombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioAtaudEcologico_1Precio','name' => 'wpfunos_servicioAtaudEcologico_1Precio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
      </tr>
      <tr>
        <td>Medio (Ecológico)</td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioAtaudEcologico_2Nombre','name' => 'wpfunos_servicioAtaudEcologico_2Nombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioAtaudEcologico_2Precio','name' => 'wpfunos_servicioAtaudEcologico_2Precio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
      </tr>
      <tr>
        <td>Premium (Ecológico)</td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioAtaudEcologico_3Nombre','name' => 'wpfunos_servicioAtaudEcologico_3Nombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioAtaudEcologico_3Precio','name' => 'wpfunos_servicioAtaudEcologico_3Precio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
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
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioVelatorioNombre','name' => 'wpfunos_servicioVelatorioNombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioVelatorioPrecio','name' => 'wpfunos_servicioVelatorioPrecio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
      </tr>
      <tr>
        <td>Sin</td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioVelatorioNoNombre','name' => 'wpfunos_servicioVelatorioNoNombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioVelatorioNoPrecio','name' => 'wpfunos_servicioVelatorioNoPrecio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
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
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioDespedida_1Nombre','name' => 'wpfunos_servicioDespedida_1Nombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioDespedida_1Precio','name' => 'wpfunos_servicioDespedida_1Precio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
      </tr>
      <tr>
        <td>Civil</td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioDespedida_2Nombre','name' => 'wpfunos_servicioDespedida_2Nombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioDespedida_2Precio','name' => 'wpfunos_servicioDespedida_2Precio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
      </tr>
      <tr>
        <td>Religiosa</td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioDespedida_3Nombre','name' => 'wpfunos_servicioDespedida_3Nombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicioDespedida_3Precio','name' => 'wpfunos_servicioDespedida_3Precio','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
      </tr>
    </table>
    <hr/>

    <h3><?php echo '<strong>NUEVO COMPARADOR</strong>';?></h3>
    <?php
    $titulo = array(
      "<strong>EES: E</strong>ntierro + ataúd <strong>E</strong>conómico + <strong>S</strong>in velatorio",
      "<strong>EEV: E</strong>ntierro + ataúd <strong>E</strong>conómico + con <strong>V</strong>elatorio",
      "<strong>EMS: E</strong>ntierro + ataúd <strong>M</strong>edio + <strong>S</strong>in velatorio",
      "<strong>EMV: E</strong>ntierro + ataúd <strong>M</strong>edio + con <strong>V</strong>elatorio",
      "<strong>EPS: E</strong>ntierro + ataúd <strong>P</strong>remium + <strong>S</strong>in velatorio",
      "<strong>EPV: E</strong>ntierro + ataúd <strong>P</strong>remium + con <strong>V</strong>elatorio",
      "<strong>IES: I</strong>Incineración + ataúd <strong>E</strong>conómico + <strong>S</strong>in velatorio",
      "<strong>IEV: I</strong>Incineración + ataúd <strong>E</strong>conómico + con <strong>V</strong>elatorio",
      "<strong>IMS: I</strong>Incineración + ataúd <strong>M</strong>edio + <strong>S</strong>in velatorio",
      "<strong>IMV: I</strong>Incineración + ataúd <strong>M</strong>edio + con <strong>V</strong>elatorio",
      "<strong>IPS: I</strong>Incineración + ataúd <strong>P</strong>remium + <strong>S</strong>in velatorio",
      "<strong>IPV: I</strong>Incineración + ataúd <strong>P</strong>remium + con <strong>V</strong>elatorio"
    );
    $menu =
    '<li><a href="#inicio"><strong>INICIO</strong></a></li>
    <li><a href="#EES">'.$titulo[0].'</a></li>
    <li><a href="#EEV">'.$titulo[1].'</a></li>
    <li><a href="#EMS">'.$titulo[2].'</a></li>
    <li><a href="#EMV">'.$titulo[3].'</a></li>
    <li><a href="#EPS">'.$titulo[4].'</a></li>
    <li><a href="#EPV">'.$titulo[5].'</a></li>
    <li><a href="#IES">'.$titulo[6].'</a></li>
    <li><a href="#IEV">'.$titulo[7].'</a></li>
    <li><a href="#IMS">'.$titulo[8].'</a></li>
    <li><a href="#IMV">'.$titulo[9].'</a></li>
    <li><a href="#IPS">'.$titulo[10].'</a></li>
    <li><a href="#IPV">'.$titulo[11].'</a></li>';
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

    $cuatro = 0;
    $cuentatitulos = 0;
    ?>
    <table style="width:100%">
      <tr><td></td><td></td><td>Sin ceremonia</td><td></td><td>Solo sala</td><td></td><td>Civil</td><td></td><td>Religiosa</td></tr>
      <tr><td style="width: 400px;"><?php echo $titulo[$cuentatitulos]; ?></td>
        <?php
        foreach ( $tipos as $tipo ) {
          ?>
          <td><?php echo $tipo; ?></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicio'.$tipo,'name' => 'wpfunos_servicio'.$tipo,'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
          <?php
          $cuatro ++;
          if( $cuatro == 4 ){
            $cuatro =0 ;
            $cuentatitulos ++;
            ?></tr><tr><td style="width: 400px;"><?php echo $titulo[$cuentatitulos]; ?></td><?php
          }
        }
        ?>
      </tr>
    </table><hr/>

    <?php $cuatro = 0; $cuentatitulos = 0; ?>
    <table style="width:100%">
      <tr><td>Título de Marketing</td><td></td><td>Sin ceremonia</td><td></td><td>Solo sala</td><td></td><td>Civil</td><td></td><td>Religiosa</td></tr>
      <tr><td style="width: 400px;"><?php echo $titulo[$cuentatitulos]; ?></td>
        <?php
        foreach ( $tipos as $tipo ) {
          ?>
          <td><?php echo $tipo; ?></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_servicio'.$tipo.'_texto','name' => 'wpfunos_servicio'.$tipo.'_texto','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
          <?php
          $cuatro ++;
          if( $cuatro == 4 ){
            $cuatro =0 ;
            $cuentatitulos ++;
            ?></tr><tr><td style="width: 400px;"><?php echo $titulo[$cuentatitulos]; ?></td><?php
          }
        }
        ?>
      </tr>
    </table><hr/>

    <table style="width:100%">
      <?php $cuatro = 1; foreach ( $tipos as $tipo ) { if( $cuatro == 5 ) $cuatro =1 ;if( $cuatro == 1 ){ ?>
        <tr><td colspan="3" id=<?php echo substr($tipo,0,3); ?>><hr/></td></tr>
        <tr>
          <td colspan="3" >
            <?php echo $menu; ?>
          </td>
        </tr>
      <?php } ?>
      <tr>
        <td><?php echo $tipo; ?></td>
        <td>
          <?php
          $campo_comentario = 'wpfunos_servicio'. $tipo .'_Comentario';
          $notes_servicio = get_post_meta( $post->ID, $campo_comentario, true );
          $args_servicio = array( 'textarea_name' => $campo_comentario,  'textarea_rows' => 10, );
          wp_editor( $notes_servicio, $campo_comentario, $args_servicio );
          ?>
        </td>
        <?php $cuatro ++; }?>
      </tr>
    </table>
    <hr/>

    <h3><?php esc_html_e('Comentarios', 'wpfunos');?></h3>
    <?php // provide textarea name for $_POST variable
    $notes_servicioPrecioBaseComentario = get_post_meta( $post->ID, 'wpfunos_servicioPrecioBaseComentario', true );
    $args_servicioPrecioBaseComentario = array( 'textarea_name' => 'wpfunos_servicioPrecioBaseComentario', );
    $notes_servicioDestino_1Comentario = get_post_meta( $post->ID, 'wpfunos_servicioDestino_1Comentario', true );
    $args_servicioDestino_1Comentario = array( 'textarea_name' => 'wpfunos_servicioDestino_1Comentario', );
    $notes_servicioDestino_2Comentario = get_post_meta( $post->ID, 'wpfunos_servicioDestino_2Comentario', true );
    $args_servicioDestino_2Comentario = array( 'textarea_name' => 'wpfunos_servicioDestino_2Comentario', );
    $notes_servicioDestino_3Comentario = get_post_meta( $post->ID, 'wpfunos_servicioDestino_3Comentario', true );
    $args_servicioDestino_3Comentario = array( 'textarea_name' => 'wpfunos_servicioDestino_3Comentario', );
    $notes_servicioAtaud_1Comentario = get_post_meta( $post->ID, 'wpfunos_servicioAtaud_1Comentario', true );
    $args_servicioAtaud_1Comentario = array( 'textarea_name' => 'wpfunos_servicioAtaud_1Comentario', );
    $notes_servicioAtaud_2Comentario = get_post_meta( $post->ID, 'wpfunos_servicioAtaud_2Comentario', true );
    $args_servicioAtaud_2Comentario = array( 'textarea_name' => 'wpfunos_servicioAtaud_2Comentario', );
    $notes_servicioAtaud_3Comentario = get_post_meta( $post->ID, 'wpfunos_servicioAtaud_3Comentario', true );
    $args_servicioAtaud_3Comentario = array( 'textarea_name' => 'wpfunos_servicioAtaud_3Comentario', );
    $notes_servicioAtaudEcologico_1Comentario = get_post_meta( $post->ID, 'wpfunos_servicioAtaudEcologico_1Comentario', true );
    $args_servicioAtaudEcologico_1Comentario = array( 'textarea_name' => 'wpfunos_servicioAtaudEcologico_1Comentario', );
    $notes_servicioAtaudEcologico_2Comentario = get_post_meta( $post->ID, 'wpfunos_servicioAtaudEcologico_2Comentario', true );
    $args_servicioAtaudEcologico_2Comentario = array( 'textarea_name' => 'wpfunos_servicioAtaudEcologico_2Comentario', );
    $notes_servicioAtaudEcologico_3Comentario = get_post_meta( $post->ID, 'wpfunos_servicioAtaudEcologico_3Comentario', true );
    $args_servicioAtaudEcologico_3Comentario = array( 'textarea_name' => 'wpfunos_servicioAtaudEcologico_3Comentario', );
    $notes_servicioVelatorioComentario = get_post_meta( $post->ID, 'wpfunos_servicioVelatorioComentario', true );
    $args_servicioVelatorioComentario = array( 'textarea_name' => 'wpfunos_servicioVelatorioComentario', );
    $notes_servicioVelatorioNoComentario = get_post_meta( $post->ID, 'wpfunos_servicioVelatorioNoComentario', true );
    $args_servicioVelatorioNoComentario = array( 'textarea_name' => 'wpfunos_servicioVelatorioNoComentario', );
    $notes_servicioDespedida_1Comentario = get_post_meta( $post->ID, 'wpfunos_servicioDespedida_1Comentario', true );
    $args_servicioDespedida_1Comentario = array( 'textarea_name' => 'wpfunos_servicioDespedida_1Comentario', );
    $notes_servicioDespedida_2Comentario = get_post_meta( $post->ID, 'wpfunos_servicioDespedida_2Comentario', true );
    $args_servicioDespedida_2Comentario = array( 'textarea_name' => 'wpfunos_servicioDespedida_2Comentario', );
    $notes_servicioDespedida_3Comentario = get_post_meta( $post->ID, 'wpfunos_servicioDespedida_3Comentario', true );
    $args_servicioDespedida_3Comentario = array( 'textarea_name' => 'wpfunos_servicioDespedida_3Comentario', );
    $notes_servicioPosiblesExtras = get_post_meta( $post->ID, 'wpfunos_servicioPosiblesExtras', true );
    $args_servicioPosiblesExtras = array( 'textarea_name' => 'wpfunos_servicioPosiblesExtras', );
    ?>
    <li><label for="'.$this->plugin_name.'_servicioPrecioBaseComentario" style="font-size: 32px;">Notas Precio Base</label>
      <?php	wp_editor( $notes_servicioPrecioBaseComentario, 'wpfunos_servicioPrecioBaseComentario',$args_servicioPrecioBaseComentario); ?>
    </li>
    <li><label for="'.$this->plugin_name.'_servicioDestino_1Comentario" style="font-size: 32px;">Notas Entierro</label>
      <?php	wp_editor( $notes_servicioDestino_1Comentario, 'wpfunos_servicioDestino_1Comentario',$args_servicioDestino_1Comentario); ?>
    </li>
    <li><label for="'.$this->plugin_name.'_servicioDestino_2Comentario" style="font-size: 32px;">Notas Incineración</label>
      <?php	wp_editor( $notes_servicioDestino_2Comentario, 'wpfunos_servicioDestino_2Comentario',$args_servicioDestino_2Comentario); ?>
    </li>
    <li><label for="'.$this->plugin_name.'_servicioDestino_3Comentario" style="font-size: 32px;">Notas Traslado</label>
      <?php	wp_editor( $notes_servicioDestino_3Comentario, 'wpfunos_servicioDestino_3Comentario',$args_servicioDestino_3Comentario); ?>
    </li>
    <li><label for="'.$this->plugin_name.'_servicioAtaudEcologico_1Comentario" style="font-size: 32px;">Notas Ataud Ecológico Económico</label>
      <?php	wp_editor( $notes_servicioAtaudEcologico_1Comentario, 'wpfunos_servicioAtaudEcologico_1Comentario',$args_servicioAtaudEcologico_1Comentario); ?>
    </li>
    <li><label for="'.$this->plugin_name.'_servicioAtaudEcologico_2Comentario" style="font-size: 32px;">Notas Ataud Ecológico Medio</label>
      <?php	wp_editor( $notes_servicioAtaudEcologico_2Comentario, 'wpfunos_servicioAtaudEcologico_2Comentario',$args_servicioAtaudEcologico_2Comentario); ?>
    </li>
    <li><label for="'.$this->plugin_name.'_servicioAtaudEcologico_3Comentario" style="font-size: 32px;">Notas Ataud Ecológico Premium</label>
      <?php	wp_editor( $notes_servicioAtaudEcologico_3Comentario, 'wpfunos_servicioAtaudEcologico_3Comentario',$args_servicioAtaudEcologico_3Comentario); ?>
    </li>
    <li><label for="'.$this->plugin_name.'_servicioVelatorioComentario" style="font-size: 32px;">Notas Velatorio</label>
      <?php	wp_editor( $notes_servicioVelatorioComentario, 'wpfunos_servicioVelatorioComentario',$args_servicioVelatorioComentario); ?>
    </li>
    <li><label for="'.$this->plugin_name.'_servicioVelatorioNoComentario" style="font-size: 32px;">Notas Velatorio No</label>
      <?php	wp_editor( $notes_servicioVelatorioNoComentario, 'wpfunos_servicioVelatorioNoComentario',$args_servicioVelatorioNoComentario); ?>
    </li>
    <li><label for="'.$this->plugin_name.'_servicioDespedida_1Comentario" style="font-size: 32px;">Notas Despedida Sala</label>
      <?php	wp_editor( $notes_servicioDespedida_1Comentario, 'wpfunos_servicioDespedida_1Comentario',$args_servicioDespedida_1Comentario); ?>
    </li>
    <li><label for="'.$this->plugin_name.'_servicioDespedida_2Comentario" style="font-size: 32px;">Notas Despedida Civil</label>
      <?php	wp_editor( $notes_servicioDespedida_2Comentario, 'wpfunos_servicioDespedida_2Comentario',$args_servicioDespedida_2Comentario); ?>
    </li>
    <li><label for="'.$this->plugin_name.'_servicioDespedida_3Comentario" style="font-size: 32px;">Notas Religiosa</label>
      <?php	wp_editor( $notes_servicioDespedida_3Comentario, 'wpfunos_servicioDespedida_3Comentario',$args_servicioDespedida_3Comentario); ?>
    </li>
    <li><label for="'.$this->plugin_name.'_servicioPosiblesExtras" style="font-size: 32px;">Posibles extras</label>
      <?php	wp_editor( $notes_servicioPosiblesExtras, 'wpfunos_servicioPosiblesExtras',$args_servicioPosiblesExtras); ?>
    </li>
  </ul>
</div>
