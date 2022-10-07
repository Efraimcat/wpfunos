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
          <td><?php esc_html_e('Título', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Páginas relacionadas', 'wpfunos');?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaPoblacion','name' => 'wpfunos_precioFunerariaPoblacion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaTitulo','name' => 'wpfunos_precioFunerariaTitulo','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 40));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaPaginasRelacionadas','name' => 'wpfunos_precioFunerariaPaginasRelacionadas','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
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
          <td style="width:15px;"></td>
          <td colspan="2"><?php esc_html_e('Imagen 4', 'wpfunos');?></td>
        </tr>
        <tr>
          <td style="vertical-align: middle;"><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaImagenPortada','name' => 'wpfunos_precioFunerariaImagenPortada','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
          <td style="vertical-align: middle;"><?php echo wp_get_attachment_image( get_post_meta( $_GET['post'], 'wpfunos_precioFunerariaImagenPortada', true ), 'thumbnail' ); ?></td>
          <td style="width:15px;"></td>
          <td style="vertical-align: middle;"><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaImagen2','name' => 'wpfunos_precioFunerariaImagen2','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 )); ?></td>
          <td style="vertical-align: middle;"><?php echo wp_get_attachment_image( get_post_meta( $_GET['post'], 'wpfunos_precioFunerariaImagen2', true ),'thumbnail' ); ?></td>
          <td style="width:15px;"></td>
          <td style="vertical-align: middle;"><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaImagen3','name' => 'wpfunos_precioFunerariaImagen3','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 )); ?></td>
          <td style="vertical-align: middle;"><?php echo wp_get_attachment_image( get_post_meta( $_GET['post'], 'wpfunos_precioFunerariaImagen3', true ),'thumbnail' ); ?></td>
          <td style="width:15px;"></td>
          <td style="vertical-align: middle;"><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaImagen4','name' => 'wpfunos_precioFunerariaImagen4','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 )); ?></td>
          <td style="vertical-align: middle;"><?php echo wp_get_attachment_image( get_post_meta( $_GET['post'], 'wpfunos_precioFunerariaImagen4', true ),'thumbnail' ); ?></td>
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
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaEntierroDesde','name' => 'wpfunos_precioFunerariaEntierroDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaIncineracionDesde','name' => 'wpfunos_precioFunerariaIncineracionDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaEntierroVelatorioDesde','name' => 'wpfunos_precioFunerariaEntierroVelatorioDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaIncineracionVelatorioDesde','name' => 'wpfunos_precioFunerariaIncineracionVelatorioDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaEntierroVelatorioCeremoniaDesde','name' => 'wpfunos_precioFunerariaEntierroVelatorioCeremoniaDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaIncineracionVelatorioCeremoniaDesde','name' => 'wpfunos_precioFunerariaIncineracionVelatorioCeremoniaDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaEntierroPremiumDesde','name' => 'wpfunos_precioFunerariaEntierroPremiumDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaIncineracionPremiumDesde','name' => 'wpfunos_precioFunerariaIncineracionPremiumDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
        </tr>
      </table>
    </li>
    <hr/>
    <li class="precio_funer_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Página Incineración Básico desde', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Página Incineración Velatorio desde', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Página Incineración Velatorio y ceremonia desde', 'wpfunos');?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioIncineracionBasicoDesde','name' => 'wpfunos_precioIncineracionBasicoDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioIncineracionVelatorioDesde','name' => 'wpfunos_precioIncineracionVelatorioDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioIncineracionCeremoniaDesde','name' => 'wpfunos_precioIncineracionCeremoniaDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?>€</td>
        </tr>
      </table>
    </li>
    <hr/>
    <li class="precio_funer_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Enlace Ahora', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Enlace Próximamente', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Enlace Ver precios', 'wpfunos');?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaEnlaceAhora','name' => 'wpfunos_precioFunerariaEnlaceAhora','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaEnlaceProximamente','name' => 'wpfunos_precioFunerariaEnlaceProximamente','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaEnlaceVerPrecios','name' => 'wpfunos_precioFunerariaEnlaceVerPrecios','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
        </tr>
      </table>
    </li>
    <hr/>
    <li class="precio_funer_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Enlace Entierro desde', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Enlace Incineración desde', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Enlace Entierro y velatorio desde', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Enlace Incineración y velatorio desde', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Enlace Entierro, velatorio y ceremonia desde', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Enlace Incineración, velatorio y ceremonia desde', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Enlace Entierro Premium desde', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Enlace Incineración Premium desde', 'wpfunos');?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaEntierroDesdeEnlace','name' => 'wpfunos_precioFunerariaEntierroDesdeEnlace','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaIncineracionDesdeEnlace','name' => 'wpfunos_precioFunerariaIncineracionDesdeEnlace','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaEntierroVelatorioDesdeEnlace','name' => 'wpfunos_precioFunerariaEntierroVelatorioDesdeEnlace','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaIncineracionVelatorioDesdeEnlace','name' => 'wpfunos_precioFunerariaIncineracionVelatorioDesdeEnlace','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaEntierroVelatorioCeremoniaDesdeEnlace','name' => 'wpfunos_precioFunerariaEntierroVelatorioCeremoniaDesdeEnlace','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaIncineracionVelatorioCeremoniaDesdeEnlace','name' => 'wpfunos_precioFunerariaIncineracionVelatorioCeremoniaDesdeEnlace','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaEntierroPremiumDesdeEnlace','name' => 'wpfunos_precioFunerariaEntierroPremiumDesdeEnlace','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioFunerariaIncineracionPremiumDesdeEnlace','name' => 'wpfunos_precioFunerariaIncineracionPremiumDesdeEnlace','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
        </tr>
      </table>
    </li>
    <hr/>
    <li class="precio_funer_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Enlace Incineración Básico desde', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Enlace Incineración Velatorio desde', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Enlace Incineración Velatorio y ceremonia desde', 'wpfunos');?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioIncineracionBasicoDesdeEnlace','name' => 'wpfunos_precioIncineracionBasicoDesdeEnlace','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioIncineracionVelatorioDesdeEnlace','name' => 'wpfunos_precioIncineracionVelatorioDesdeEnlace','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_precioIncineracionCeremoniaDesdeEnlace','name' => 'wpfunos_precioIncineracionCeremoniaDesdeEnlace','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));?></td>
        </tr>
      </table>
    </li>
    <hr/>
    <?php
    $notes_precioFunerariaPoblacionesCercanas = get_post_meta( $post->ID, 'wpfunos_precioFunerariaPoblacionesCercanas', true );
    $args_precioFunerariaPoblacionesCercanas = array( 'textarea_name' => 'wpfunos_precioFunerariaPoblacionesCercanas', );
    $notes_precioFunerariaTextoLibre = get_post_meta( $post->ID, 'wpfunos_precioFunerariaTextoLibre', true );
    $args_precioFunerariaTextoLibre = array( 'textarea_name' => 'wpfunos_precioFunerariaTextoLibre', );
    ?>
    <li><label for="'.$this->plugin_name.'_precioFunerariaPoblacionesCercanas" style="font-size: 32px;">Poblaciones cercanas</label>
      <?php	wp_editor( $notes_precioFunerariaPoblacionesCercanas, 'wpfunos_precioFunerariaPoblacionesCercanas',$args_precioFunerariaPoblacionesCercanas); ?>
    </li>
    <hr/>
    <li><label for="'.$this->plugin_name.'_precioFunerariaTextoLibre" style="font-size: 32px;">Texto libre</label>
      <?php	wp_editor( $notes_precioFunerariaTextoLibre, 'wpfunos_precioFunerariaTextoLibre',$args_precioFunerariaTextoLibre); ?>
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
