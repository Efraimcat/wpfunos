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
<div class="precio_funer_wpfunos_containers">
  <ul class="precio_funer_wpfunos_data_metabox">
    <li class="precio_funer_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Población', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Código', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Título', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('URL', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Precio Desde', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Páginas relacionadas', 'wpfunos');?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_precioFunerariaPoblacion','name' => $this->plugin_name . '_precioFunerariaPoblacion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_precioFunerariaCodigoPoblacion','name' => $this->plugin_name . '_precioFunerariaCodigoPoblacion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_precioFunerariaTitulo','name' => $this->plugin_name . '_precioFunerariaTitulo','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 40));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_precioFunerariaURL','name' => $this->plugin_name . '_precioFunerariaURL','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_precioFunerariaPrecioDesde','name' => $this->plugin_name . '_precioFunerariaPrecioDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_precioFunerariaPaginasRelacionadas','name' => $this->plugin_name . '_precioFunerariaPaginasRelacionadas','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
        </tr>
      </table>
    </li>
    <hr/>
    <li class="servicios_wpfunos_list">
      <table>
        <tr>
          <td colspan="2"><?php esc_html_e('Imagen portada', 'wpfunos');?></td>
          <td style="width:15px;"></td>
          <td colspan="2"><?php esc_html_e('Imagen 2', 'wpfunos');?></td>
          <td style="width:15px;"></td>
          <td colspan="2"><?php esc_html_e('Imagen 3', 'wpfunos');?></td>
          <td style="width:15px;"></td>
          <td colspan="2"><?php esc_html_e('Imagen 4', 'wpfunos');?></td>
        </tr>
        <tr>
          <td style="vertical-align: middle;"><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_precioFunerariaImagenPortada','name' => $this->plugin_name . '_precioFunerariaImagenPortada','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
          <td style="vertical-align: middle;"><?php echo wp_get_attachment_image( get_post_meta( $_GET['post'], $this->plugin_name . '_precioFunerariaImagenPortada', true ), 'thumbnail' ); ?></td>
          <td style="width:15px;"></td>
          <td style="vertical-align: middle;"><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_precioFunerariaImagen2','name' => $this->plugin_name . '_precioFunerariaImagen2','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 )); ?></td>
          <td style="vertical-align: middle;"><?php echo wp_get_attachment_image( get_post_meta( $_GET['post'], $this->plugin_name . '_precioFunerariaImagen2', true ),'thumbnail' ); ?></td>
          <td style="width:15px;"></td>
          <td style="vertical-align: middle;"><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_precioFunerariaImagen3','name' => $this->plugin_name . '_precioFunerariaImagen3','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 )); ?></td>
          <td style="vertical-align: middle;"><?php echo wp_get_attachment_image( get_post_meta( $_GET['post'], $this->plugin_name . '_precioFunerariaImagen3', true ),'thumbnail' ); ?></td>
          <td style="width:15px;"></td>
          <td style="vertical-align: middle;"><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_precioFunerariaImagen4','name' => $this->plugin_name . '_precioFunerariaImagen4','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 )); ?></td>
          <td style="vertical-align: middle;"><?php echo wp_get_attachment_image( get_post_meta( $_GET['post'], $this->plugin_name . '_precioFunerariaImagen4', true ),'thumbnail' ); ?></td>
        </tr>
      </table>
    </li>
    <hr/>
    <li class="precio_funer_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Entierro desde', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Incineración desde', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Entierro y velatorio desde', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Incineración y velatorio desde', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Entierro, velatorio y ceremonia desde', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Incineración, velatorio y ceremonia desde', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Entierro Premium desde', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Incineración Premium desde', 'wpfunos');?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_precioFunerariaEntierroDesde','name' => $this->plugin_name . '_precioFunerariaEntierroDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_precioFunerariaIncineracionDesde','name' => $this->plugin_name . '_precioFunerariaIncineracionDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_precioFunerariaEntierroVelatorioDesde','name' => $this->plugin_name . '_precioFunerariaEntierroVelatorioDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_precioFunerariaIncineracionVelatorioDesde','name' => $this->plugin_name . '_precioFunerariaIncineracionVelatorioDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_precioFunerariaEntierroVelatorioCeremoniaDesde','name' => $this->plugin_name . '_precioFunerariaEntierroVelatorioCeremoniaDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_precioFunerariaIncineracionVelatorioCeremoniaDesde','name' => $this->plugin_name . '_precioFunerariaIncineracionVelatorioCeremoniaDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_precioFunerariaEntierroPremiumDesde','name' => $this->plugin_name . '_precioFunerariaEntierroPremiumDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_precioFunerariaIncineracionPremiumDesde','name' => $this->plugin_name . '_precioFunerariaIncineracionPremiumDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
        </tr>
      </table>
    </li>
    <hr/>
    <?php
    $notes_precioFunerariaPoblacionesCercanas = get_post_meta( $post->ID, $this->plugin_name . '_precioFunerariaPoblacionesCercanas', true );
    $args_precioFunerariaPoblacionesCercanas = array( 'textarea_name' => $this->plugin_name . '_precioFunerariaPoblacionesCercanas', );
    $notes_precioFunerariaTextoLibre = get_post_meta( $post->ID, $this->plugin_name . '_precioFunerariaTextoLibre', true );
    $args_precioFunerariaTextoLibre = array( 'textarea_name' => $this->plugin_name . '_precioFunerariaTextoLibre', );
    ?>
    <li><label for="'.$this->plugin_name.'_precioFunerariaPoblacionesCercanas" style="font-size: 32px;">Poblaciones cercanas</label>
      <?php	wp_editor( $notes_precioFunerariaPoblacionesCercanas, $this->plugin_name . '_precioFunerariaPoblacionesCercanas',$args_precioFunerariaPoblacionesCercanas); ?>
    </li>
    <hr/>
    <li><label for="'.$this->plugin_name.'_precioFunerariaTextoLibre" style="font-size: 32px;">Texto libre</label>
      <?php	wp_editor( $notes_precioFunerariaTextoLibre, $this->plugin_name . '_precioFunerariaTextoLibre',$args_precioFunerariaTextoLibre); ?>
    </li>
    <hr/>
  </ul>
</div>

<?php
