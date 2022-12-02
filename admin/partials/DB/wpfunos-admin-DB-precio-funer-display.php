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
#postdivrich {
  display: none;
}
</style>
<div class="precio_funer_wpfunos_containers">
  <ul class="precio_funer_wpfunos_data_metabox">
    <li class="precio_funer_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Población', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Provincia', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Páginas relacionadas', 'wpfunos');?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaPoblacion','name' => 'wpfunos_precioFunerariaPoblacion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaProvincia','name' => 'wpfunos_precioFunerariaProvincia','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaPaginasRelacionadas','name' => 'wpfunos_precioFunerariaPaginasRelacionadas','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
        </tr>
      </table>
    </li>
    <hr/>

    <li class="servicios_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Distancia', 'wpfunos');?></td>
          <td style="width:15px;"></td>
          <td><?php esc_html_e('Latitud', 'wpfunos');?></td>
          <td style="width:15px;"></td>
          <td><?php esc_html_e('Longuitud', 'wpfunos');?></td>
        </tr>
        <tr>
          <td style="vertical-align: middle;"><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_EnlaceDistancia','name' => 'wpfunos_EnlaceDistancia','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
          <td style="width:15px;"></td>
          <td style="vertical-align: middle;"><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_EnlaceLatitud','name' => 'wpfunos_EnlaceLatitud','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 )); ?></td>
          <td style="width:15px;"></td>
          <td style="vertical-align: middle;"><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_EnlaceLonguitud','name' => 'wpfunos_EnlaceLonguitud','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 )); ?></td>
        </tr>
      </table>
    </li>
    <hr/>

    <h2>Páginas PRECIOS FUNERARIAS EN – precios:</h2>
    <li class="precio_funer_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Entierro desde', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Entierro y velatorio desde', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Entierro, velatorio y ceremonia desde', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Entierro Premium desde', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Incineración desde', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Incineración y velatorio desde', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Incineración, velatorio y ceremonia desde', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Incineración Premium desde', 'wpfunos');?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaEntierroDesde','name' => 'wpfunos_precioFunerariaEntierroDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaEntierroVelatorioDesde','name' => 'wpfunos_precioFunerariaEntierroVelatorioDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaEntierroVelatorioCeremoniaDesde','name' => 'wpfunos_precioFunerariaEntierroVelatorioCeremoniaDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaEntierroPremiumDesde','name' => 'wpfunos_precioFunerariaEntierroPremiumDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
          <td style="width:5px;"></td>

          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaIncineracionDesde','name' => 'wpfunos_precioFunerariaIncineracionDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaIncineracionVelatorioDesde','name' => 'wpfunos_precioFunerariaIncineracionVelatorioDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaIncineracionVelatorioCeremoniaDesde','name' => 'wpfunos_precioFunerariaIncineracionVelatorioCeremoniaDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaIncineracionPremiumDesde','name' => 'wpfunos_precioFunerariaIncineracionPremiumDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>

        </tr>
      </table>
    </li>
    <hr/>

    <?php
    $notes_precioFunerariaPoblacionesCercanas = get_post_meta( $post->ID, 'wpfunos_precioFunerariaPoblacionesCercanas', true );
    $args_precioFunerariaPoblacionesCercanas = array( 'textarea_name' => 'wpfunos_precioFunerariaPoblacionesCercanas', );
    ?>
    <li><label for="'.$this->plugin_name.'_precioFunerariaPoblacionesCercanas" style="font-size: 32px;">Poblaciones cercanas</label>
      <?php	wp_editor( $notes_precioFunerariaPoblacionesCercanas, 'wpfunos_precioFunerariaPoblacionesCercanas',$args_precioFunerariaPoblacionesCercanas); ?>
    </li>

    <hr/>
    <li class="precio_funer_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Seo Entierro', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Seo Incineración', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Seo Desde', 'wpfunos');?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'SeoEntierro','name' => 'SeoEntierro','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => '', 'size' => 7));?>€</td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'SeoIncineracion','name' => 'SeoIncineracion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => '', 'size' => 7));?>€</td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'SeoDesde','name' => 'SeoDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => '', 'size' => 7));?>€</td>
        </tr>
      </table>
    </li>
  </ul>
</div>

<?php
