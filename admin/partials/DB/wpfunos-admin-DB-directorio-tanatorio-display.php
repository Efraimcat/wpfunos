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
<div class="directorio_tanatorio_wpfunos_containers">
  <ul class="directorio_tanatorio_wpfunos_data_metabox">
    <li class="directorio_tanatorio_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Nombre', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Direccion', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Correo', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Teléfono', 'wpfunos');?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_tanatorioDirectorioNombre','name' => 'wpfunos_tanatorioDirectorioNombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_tanatorioDirectorioDireccion','name' => 'wpfunos_tanatorioDirectorioDireccion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_tanatorioDirectorioCorreo','name' => 'wpfunos_tanatorioDirectorioCorreo','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_tanatorioDirectorioTelefono','name' => 'wpfunos_tanatorioDirectorioTelefono','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID  ));?></td>
        </tr>
      </table>
    </li>
    <hr/>
    <li class="directorio_tanatorio_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Población', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Códigos provincia', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Funeraria', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Marca', 'wpfunos');?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_tanatorioDirectorioPoblacion','name' => 'wpfunos_tanatorioDirectorioPoblacion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_tanatorioDirectorioCodigoProvincia','name' => 'wpfunos_tanatorioDirectorioCodigoProvincia','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_tanatorioDirectorioFuneraria','name' => 'wpfunos_tanatorioDirectorioFuneraria','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_tanatorioDirectorioMarca','name' => 'wpfunos_tanatorioDirectorioMarca','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID  ));?></td>
        </tr>
      </table>
    </li>
    <hr/>
    <li class="directorio_tanatorio_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Latitud', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Longitud', 'wpfunos');?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_tanatorioDirectorioLatitud','name' => 'wpfunos_tanatorioDirectorioLatitud','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_tanatorioDirectorioLongitud','name' => 'wpfunos_tanatorioDirectorioLongitud','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID  ));?></td>
        </tr>
      </table>
    </li>
    <hr/>
    <li class="directorio_tanatorio_wpfunos_list">
      <table>
        <tr>
          <td colspan="2"><?php esc_html_e('Imagen 1', 'wpfunos');?></td>
          <td style="width:15px;"></td>
          <td colspan="2"><?php esc_html_e('Imagen 2', 'wpfunos');?></td>
          <td style="width:15px;"></td>
          <td colspan="2"><?php esc_html_e('Imagen 3', 'wpfunos');?></td>
          <td style="width:15px;"></td>
          <td colspan="2"><?php esc_html_e('Imagen 4', 'wpfunos');?></td>
          <td style="width:15px;"></td>
          <td colspan="2"><?php esc_html_e('Imagen 5', 'wpfunos');?></td>
        </tr>
        <tr>
          <td style="vertical-align: middle;"><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_tanatorioDirectorioImagen1','name' => 'wpfunos_tanatorioDirectorioImagen1','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
          <td style="vertical-align: middle;"><?php echo wp_get_attachment_image( get_post_meta( $_GET['post'], 'wpfunos_tanatorioDirectorioImagen1', true ), array('150', '150') ); ?></td>
          <td style="width:15px;"></td>
          <td style="vertical-align: middle;"><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_tanatorioDirectorioImagen2','name' => 'wpfunos_tanatorioDirectorioImagen2','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 )); ?></td>
          <td style="vertical-align: middle;"><?php echo wp_get_attachment_image( get_post_meta( $_GET['post'], 'wpfunos_tanatorioDirectorioImagen2', true ), array('150', '150') ); ?></td>
          <td style="width:15px;"></td>
          <td style="vertical-align: middle;"><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_tanatorioDirectorioImagen3','name' => 'wpfunos_tanatorioDirectorioImagen3','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 )); ?></td>
          <td style="vertical-align: middle;"><?php echo wp_get_attachment_image( get_post_meta( $_GET['post'], 'wpfunos_tanatorioDirectorioImagen3', true ), array('150', '150') ); ?></td>
          <td style="width:15px;"></td>
          <td style="vertical-align: middle;"><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_tanatorioDirectorioImagen4','name' => 'wpfunos_tanatorioDirectorioImagen4','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 )); ?></td>
          <td style="vertical-align: middle;"><?php echo wp_get_attachment_image( get_post_meta( $_GET['post'], 'wpfunos_tanatorioDirectorioImagen4', true ), array('150', '150') ); ?></td>
          <td style="width:15px;"></td>
          <td style="vertical-align: middle;"><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_tanatorioDirectorioImagen5','name' => 'wpfunos_tanatorioDirectorioImagen5','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 )); ?></td>
          <td style="vertical-align: middle;"><?php echo wp_get_attachment_image( get_post_meta( $_GET['post'], 'wpfunos_tanatorioDirectorioImagen5', true ), array('150', '150') ); ?></td>
        </tr>
      </table>
    </li>
    <hr/>
    <li class="directorio_tanatorio_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Entierro desde', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Incineración desde', 'wpfunos');?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_tanatorioDirectorioEntierroDesde','name' => 'wpfunos_tanatorioDirectorioEntierroDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID ,'disabled' => '', 'size' => 7 ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_tanatorioDirectorioIncineracionDesde','name' => 'wpfunos_tanatorioDirectorioIncineracionDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => '', 'size' => 7  ));?></td>
        </tr>
      </table>
    </li>
    <hr/>
    <li class="directorio_tanatorio_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Landings', 'wpfunos');?></td>
        </tr>
        <tr style="display: none;">
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_tanatorioDirectorioLandings','name' => 'wpfunos_tanatorioDirectorioLandings','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''  ));?></td>
        </tr>
      </table>
    </li>
    <li class="directorio_tanatorio_wpfunos_list">
      <table>
        <tr>
          <?php
          $codigos = (explode(',',get_post_meta(  $post->ID , 'wpfunos_tanatorioDirectorioCodigoProvincia', true )));
          for ( $x = 0; $x <= 2; $x++ ) {
            $codigo[$x] = ( isset( $codigos[$x] ) ) ? $codigo[$x] = $codigos[$x] : $codigo[$x] = '99';
            //$this->custom_logs('$codigos: $x=' .$x. ' : ' .$codigo[$x] );
          }
          if( strlen( $codigo[0] ) > 1 ){
            $args = array(
              'post_type' => 'precio_funer_wpfunos',
              'post_status'  => 'publish',
              'posts_per_page' => -1,
              'orderby' => 'title',
              'order' => 'ASC',
              'meta_query' => array(
                'relation' => 'OR',
                array( 'key' => 'wpfunos_precioFunerariaCodigoPoblacion', 'value' => $codigo[0], 'compare' => 'LIKE', ),
                array( 'key' => 'wpfunos_precioFunerariaCodigoPoblacion', 'value' => $codigo[1], 'compare' => 'LIKE', ),
                array( 'key' => 'wpfunos_precioFunerariaCodigoPoblacion', 'value' => $codigo[2], 'compare' => 'LIKE', ),
              ),
            );
            $landings = get_posts( $args );
            //$this->custom_logs('$landings(count): ' .count($landings) );
            $paginas = (explode(',',get_post_meta(  $post->ID , 'wpfunos_tanatorioDirectorioLandings', true )));
            foreach( $landings as $landing ){
              $check='';
              foreach( $paginas as $pagina ){
                if( $landing->ID == $pagina ) $check='checked';
              }
              ?>
              <tr>
                <td><input type="checkbox" id="tanatorioDirectorio-<?php echo $landing->ID?>" name="tanatorioDirectorio-<?php echo $landing->ID?>" size="40" value="1" <?php echo $check?>/></td>
                <td><?php esc_html_e( get_the_title( $landing->ID).' ('.$landing->ID.')' );?></td>
              </tr>
              <?php
            }
          }
          ?>
        </tr>
      </table>
    </li>
    <hr/>
    <li class="directorio_tanatorio_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Servicios', 'wpfunos');?></td>
        </tr>
        <tr style="display: none;">
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_tanatorioDirectorioServicios','name' => 'wpfunos_tanatorioDirectorioServicios','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID  ));?></td>
        </tr>
      </table>
    </li>
    <li class="directorio_tanatorio_wpfunos_list">
      <table>
        <tr>
          <?php
          $args = array(
            'post_type' => 'directorio_servicio',
            'post_status'  => 'publish',
            'posts_per_page' => -1,
            'meta_key' => 'wpfunos_servicioDirectorioNombre',
            'orderby' => 'meta_value',
            'order' => 'ASC',
          );
          $servicios = get_posts( $args );
          $paginas = (explode(',',get_post_meta(  $post->ID , 'wpfunos_tanatorioDirectorioServicios', true )));
          foreach( $servicios as $servicio ){
            $check='';
            foreach( $paginas as $pagina ){
              if( $servicio->ID == $pagina ) $check='checked';
            }
            ?>
            <tr>
              <td><input type="checkbox" id="servicioDirectorio-<?php echo $servicio->ID?>" name="servicioDirectorio-<?php echo $servicio->ID?>" size="40" value="1" <?php echo $check?>/></td>
              <td><?php esc_html_e( get_post_meta(  $servicio->ID , 'wpfunos_servicioDirectorioNombre', true ) );?></td>
            </tr>
            <?php
          }
          ?>
        </tr>
      </table>
    </li>
    <hr/>
    <li class="directorio_tanatorio_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Últimas defunciones', 'wpfunos');?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_tanatorioDirectorioUltimasDefunciones','name' => 'wpfunos_tanatorioDirectorioUltimasDefunciones','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID  ));?></td>
        </tr>
      </table>
    </li>
    <hr/>
    <?php // provide textarea name for $_POST variable
    $notes_tanatorioDirectorioDescripcion = get_post_meta( $post->ID, 'wpfunos_tanatorioDirectorioDescripcion', true );
    $args_tanatorioDirectorioDescripcion = array( 'textarea_name' => 'wpfunos_tanatorioDirectorioDescripcion', );
    $notes_tanatorioDirectorioHorario = get_post_meta( $post->ID, 'wpfunos_tanatorioDirectorioHorario', true );
    $args_tanatorioDirectorioHorario = array( 'textarea_name' => 'wpfunos_tanatorioDirectorioHorario', );
    $notes_tanatorioDirectorioComoLlegar = get_post_meta( $post->ID, 'wpfunos_tanatorioDirectorioComoLlegar', true );
    $args_tanatorioDirectorioComoLlegar = array( 'textarea_name' => 'wpfunos_tanatorioDirectorioComoLlegar', );
    $notes_tanatorioDirectorioDescripcionServicios = get_post_meta( $post->ID, 'wpfunos_tanatorioDirectorioDescripcionServicios', true );
    $args_tanatorioDirectorioDescripcionServicios = array( 'textarea_name' => 'wpfunos_tanatorioDirectorioDescripcionServicios', );
    ?>
    <li><label for="wpfunos_tanatorioDirectorioDescripcion" style="font-size: 32px;">Descripción</label>
      <?php	wp_editor( $notes_tanatorioDirectorioDescripcion, 'wpfunos_tanatorioDirectorioDescripcion',$args_tanatorioDirectorioDescripcion); ?>
    </li>
    <li><label for="wpfunos_tanatorioDirectorioHorario" style="font-size: 32px;">Horario</label>
      <?php	wp_editor( $notes_tanatorioDirectorioHorario, 'wpfunos_tanatorioDirectorioHorario',$args_tanatorioDirectorioHorario); ?>
    </li>
    <li><label for="wpfunos_tanatorioDirectorioComoLlegar" style="font-size: 32px;">Como llegar</label>
      <?php	wp_editor( $notes_tanatorioDirectorioComoLlegar, 'wpfunos_tanatorioDirectorioComoLlegar',$args_tanatorioDirectorioComoLlegar); ?>
    </li>
    <li><label for="wpfunos_tanatorioDirectorioDescripcionServicios" style="font-size: 32px;">Descripción servicios</label>
      <?php	wp_editor( $notes_tanatorioDirectorioDescripcionServicios, 'wpfunos_tanatorioDirectorioDescripcionServicios',$args_tanatorioDirectorioDescripcionServicios); ?>
    </li>
  </ul>
</div>
