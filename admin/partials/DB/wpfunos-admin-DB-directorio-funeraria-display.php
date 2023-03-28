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
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_funerariaDirectorioNombre','name' => 'wpfunos_funerariaDirectorioNombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_funerariaDirectorioDireccion','name' => 'wpfunos_funerariaDirectorioDireccion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_funerariaDirectorioCorreo','name' => 'wpfunos_funerariaDirectorioCorreo','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_funerariaDirectorioTelefono','name' => 'wpfunos_funerariaDirectorioTelefono','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID  ));?></td>
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
          <td><?php esc_html_e('Marca', 'wpfunos');?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_funerariaDirectorioPoblacion','name' => 'wpfunos_funerariaDirectorioPoblacion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_funerariaDirectorioCodigoProvincia','name' => 'wpfunos_funerariaDirectorioCodigoProvincia','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_funerariaDirectorioMarca','name' => 'wpfunos_funerariaDirectorioMarca','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID  ));?></td>
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
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_funerariaDirectorioLatitud','name' => 'wpfunos_funerariaDirectorioLatitud','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_funerariaDirectorioLongitud','name' => 'wpfunos_funerariaDirectorioLongitud','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID  ));?></td>
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
          <td style="vertical-align: middle;"><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_funerariaDirectorioImagen1','name' => 'wpfunos_funerariaDirectorioImagen1','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
          <td style="vertical-align: middle;"><?php echo wp_get_attachment_image( get_post_meta( $_GET['post'], 'wpfunos_funerariaDirectorioImagen1', true ), array('150', '150') ); ?></td>
          <td style="width:15px;"></td>
          <td style="vertical-align: middle;"><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_funerariaDirectorioImagen2','name' => 'wpfunos_funerariaDirectorioImagen2','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 )); ?></td>
          <td style="vertical-align: middle;"><?php echo wp_get_attachment_image( get_post_meta( $_GET['post'], 'wpfunos_funerariaDirectorioImagen2', true ), array('150', '150') ); ?></td>
          <td style="width:15px;"></td>
          <td style="vertical-align: middle;"><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_funerariaDirectorioImagen3','name' => 'wpfunos_funerariaDirectorioImagen3','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 )); ?></td>
          <td style="vertical-align: middle;"><?php echo wp_get_attachment_image( get_post_meta( $_GET['post'], 'wpfunos_funerariaDirectorioImagen3', true ), array('150', '150') ); ?></td>
          <td style="width:15px;"></td>
          <td style="vertical-align: middle;"><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_funerariaDirectorioImagen4','name' => 'wpfunos_funerariaDirectorioImagen4','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 )); ?></td>
          <td style="vertical-align: middle;"><?php echo wp_get_attachment_image( get_post_meta( $_GET['post'], 'wpfunos_funerariaDirectorioImagen4', true ), array('150', '150') ); ?></td>
          <td style="width:15px;"></td>
          <td style="vertical-align: middle;"><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_funerariaDirectorioImagen5','name' => 'wpfunos_funerariaDirectorioImagen5','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 )); ?></td>
          <td style="vertical-align: middle;"><?php echo wp_get_attachment_image( get_post_meta( $_GET['post'], 'wpfunos_funerariaDirectorioImagen5', true ), array('150', '150') ); ?></td>
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
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_funerariaDirectorioEntierroDesde','name' => 'wpfunos_funerariaDirectorioEntierroDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID ,'disabled' => '', 'size' => 7 ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_funerariaDirectorioIncineracionDesde','name' => 'wpfunos_funerariaDirectorioIncineracionDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => '', 'size' => 7  ));?></td>
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
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_funerariaDirectorioLandings','name' => 'wpfunos_funerariaDirectorioLandings','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''  ));?></td>
        </tr>
      </table>
    </li>
    <li class="directorio_tanatorio_wpfunos_list">
      <table>
        <tr>
          <?php
          $codigos = (explode(',',get_post_meta(  $post->ID , 'wpfunos_funerariaDirectorioCodigoProvincia', true )));
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
            $paginas = (explode(',',get_post_meta(  $post->ID , 'wpfunos_funerariaDirectorioLandings', true )));
            foreach( $landings as $landing ){
              $check='';
              foreach( $paginas as $pagina ){
                if( $landing->ID == $pagina ) $check='checked';
              }
              ?>
              <tr>
                <td><input type="checkbox" id="funerariaDirectorio-<?php echo $landing->ID?>" name="funerariaDirectorio-<?php echo $landing->ID?>" size="40" value="1" <?php echo $check?>/></td>
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
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_funerariaDirectorioServicios','name' => 'wpfunos_funerariaDirectorioServicios','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID  ));?></td>
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
          $paginas = (explode(',',get_post_meta(  $post->ID , 'wpfunos_funerariaDirectorioServicios', true )));
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
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_funerariaDirectorioUltimasDefunciones','name' => 'wpfunos_funerariaDirectorioUltimasDefunciones','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID  ));?></td>
        </tr>
      </table>
    </li>
    <hr/>
    <?php // provide textarea name for $_POST variable
    $notes_funerariaDirectorioDescripcion = get_post_meta( $post->ID, 'wpfunos_funerariaDirectorioDescripcion', true );
    $args_funerariaDirectorioDescripcion = array( 'textarea_name' => 'wpfunos_funerariaDirectorioDescripcion', );
    $notes_funerariaDirectorioHorario = get_post_meta( $post->ID, 'wpfunos_funerariaDirectorioHorario', true );
    $args_funerariaDirectorioHorario = array( 'textarea_name' => 'wpfunos_funerariaDirectorioHorario', );
    $notes_funerariaDirectorioComoLlegar = get_post_meta( $post->ID, 'wpfunos_funerariaDirectorioComoLlegar', true );
    $args_funerariaDirectorioComoLlegar = array( 'textarea_name' => 'wpfunos_funerariaDirectorioComoLlegar', );
    $notes_funerariaDirectorioDescripcionServicios = get_post_meta( $post->ID, 'wpfunos_funerariaDirectorioDescripcionServicios', true );
    $args_funerariaDirectorioDescripcionServicios = array( 'textarea_name' => 'wpfunos_funerariaDirectorioDescripcionServicios', );
    ?>
    <li><label for="wpfunos_funerariaDirectorioDescripcion" style="font-size: 32px;">Descripción</label>
      <?php	wp_editor( $notes_funerariaDirectorioDescripcion, 'wpfunos_funerariaDirectorioDescripcion',$args_funerariaDirectorioDescripcion); ?>
    </li>
    <li><label for="wpfunos_funerariaDirectorioHorario" style="font-size: 32px;">Horario</label>
      <?php	wp_editor( $notes_funerariaDirectorioHorario, 'wpfunos_funerariaDirectorioHorario',$args_funerariaDirectorioHorario); ?>
    </li>
    <li><label for="wpfunos_funerariaDirectorioComoLlegar" style="font-size: 32px;">Como llegar</label>
      <?php	wp_editor( $notes_funerariaDirectorioComoLlegar, 'wpfunos_funerariaDirectorioComoLlegar',$args_funerariaDirectorioComoLlegar); ?>
    </li>
    <li><label for="wpfunos_funerariaDirectorioDescripcionServicios" style="font-size: 32px;">Descripción servicios</label>
      <?php	wp_editor( $notes_funerariaDirectorioDescripcionServicios, 'wpfunos_funerariaDirectorioDescripcionServicios',$args_funerariaDirectorioDescripcionServicios); ?>
    </li>
  </ul>
</div>
