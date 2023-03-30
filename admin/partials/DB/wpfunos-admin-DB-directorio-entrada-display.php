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
<div class="directorio_entrada_wpfunos_containers">
  <ul class="directorio_entrada_wpfunos_data_metabox">
    <li class="directorio_entrada_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Tipo de entrada', 'wpfunos');?></td>
        </tr>
        <tr>
          <td>
            <input type="radio" name="wpfunos_entradaDirectorioTipo" <?php if (get_post_meta(  $post->ID , 'wpfunos_entradaDirectorioTipo', true ) == '1') echo "checked";?> value="1">Tanatorio
            <input type="radio" name="wpfunos_entradaDirectorioTipo" <?php if (get_post_meta(  $post->ID , 'wpfunos_entradaDirectorioTipo', true ) == '2') echo "checked";?> value="2">Funeraria
            <input type="radio" name="wpfunos_entradaDirectorioTipo" <?php if (get_post_meta(  $post->ID , 'wpfunos_entradaDirectorioTipo', true ) == '3') echo "checked";?> value="3">Marca
          </td>
        </tr>
      </table>
    </li>
    <hr/>
    <li class="directorio_entrada_wpfunos_list">
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
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_entradaDirectorioNombre','name' => 'wpfunos_entradaDirectorioNombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 30  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_entradaDirectorioDireccion','name' => 'wpfunos_entradaDirectorioDireccion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 30  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_entradaDirectorioCorreo','name' => 'wpfunos_entradaDirectorioCorreo','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 30  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_entradaDirectorioTelefono','name' => 'wpfunos_entradaDirectorioTelefono','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID , 'size' => 30 ));?></td>
        </tr>
      </table>
    </li>
    <hr/>
    <li class="directorio_entrada_wpfunos_list">
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
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_entradaDirectorioPoblacion','name' => 'wpfunos_entradaDirectorioPoblacion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 30  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_entradaDirectorioCodigoProvincia','name' => 'wpfunos_entradaDirectorioCodigoProvincia','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 30  ));?></td>
          <td style="width:5px;"></td>
          <td>
            <?php //$this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_entradaDirectorioFuneraria','name' => 'wpfunos_entradaDirectorioFuneraria','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 30  ));?>
            <select name="wpfunos_entradaDirectorioFuneraria" id="wpfunos_entradaDirectorioFuneraria" style="width: 272px" >
              <option value="">------------</option>
              <?php
              $args = array(
                'post_type' => 'directorio_entrada',
                'posts_per_page' => -1,
                'post_status' => 'any', // para incluir borradores
                'meta_key' => 'wpfunos_entradaDirectorioNombre',
                'orderby' => 'meta_value',
                'order' => 'ASC',
                'meta_query' => array(
                  'relation' => 'AND',
                  array( 'key' => 'wpfunos_entradaDirectorioTipo', 'value' => '2', 'compare' => '=', ),
                ),
              );
              $funerarias = get_posts( $args );
              foreach( $funerarias as $funeraria ) {
                ?>
                <option value="<?php echo $funeraria->ID; ?>"
                  <?php if (get_post_meta(  $post->ID , 'wpfunos_entradaDirectorioFuneraria', true ) == $funeraria->ID ) echo 'selected="selected"'; ?> ><?php echo get_the_title( $funeraria->ID) ?>
                  <?php if( get_post_status( $funeraria->ID) != 'publish') echo ' (Borrador)'?>
                </option>
                <?php
              }
              ?>
            </select>
          </td>
          <td style="width:5px;"></td>
          <td>
            <?php //$this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_entradaDirectorioMarca','name' => 'wpfunos_entradaDirectorioMarca','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 30  ));?>
            <select name="wpfunos_entradaDirectorioMarca" id="wpfunos_entradaDirectorioMarca" style="width: 272px" >
              <option value="">------------</option>
              <?php
              $args = array(
                'post_type' => 'directorio_entrada',
                'posts_per_page' => -1,
                'post_status' => 'any', // para incluir borradores
                'meta_key' => 'wpfunos_entradaDirectorioNombre',
                'orderby' => 'meta_value',
                'order' => 'ASC',
                'meta_query' => array(
                  'relation' => 'AND',
                  array( 'key' => 'wpfunos_entradaDirectorioTipo', 'value' => '3', 'compare' => '=', ),
                ),
              );
              $marcas = get_posts( $args );
              foreach( $marcas as $marca ) {
                ?>
                <option value="<?php echo $marca->ID; ?>"
                  <?php if (get_post_meta(  $post->ID , 'wpfunos_entradaDirectorioMarca', true ) == $marca->ID ) echo 'selected="selected"'; ?> ><?php echo get_the_title( $marca->ID) ?>
                  <?php if( get_post_status( $marca->ID) != 'publish') echo ' (Borrador)'?>
                </option>
                <?php
              }
              ?>
            </select>
          </td>
        </tr>
      </table>
    </li>
    <hr/>
    <li class="directorio_entrada_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Longitud', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Latitud', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Shortcode', 'wpfunos');?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_entradaDirectorioLongitud','name' => 'wpfunos_entradaDirectorioLongitud','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 15  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_entradaDirectorioLatitud','name' => 'wpfunos_entradaDirectorioLatitud','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 15  ));?></td>
          <td style="width:5px;"></td>
          <td>
            <select name="wpfunos_entradaDirectorioShortcode" id="wpfunos_entradaDirectorioShortcode">
              <option value="shortcodeTanatorio" <?php if (get_post_meta(  $post->ID , 'wpfunos_entradaDirectorioShortcode', true ) == 'shortcodeTanatorio') echo 'selected="selected"'; ?> >Tanatorio</option>
              <option value="shortcodeFuneraria" <?php if (get_post_meta(  $post->ID , 'wpfunos_entradaDirectorioShortcode', true ) == 'shortcodeFuneraria') echo 'selected="selected"'; ?> >Funeraria</option>
              <option value="shortcodeMarca" <?php if (get_post_meta(  $post->ID , 'wpfunos_entradaDirectorioShortcode', true ) == 'shortcodeMarca') echo 'selected="selected"'; ?> >Marca</option>
            </select>
          </td>
        </tr>
      </table>
    </li>
    <hr/>
    <li class="directorio_entrada_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Imagen 1', 'wpfunos');?></td>
          <td style="width:15px;"></td>
          <td><?php esc_html_e('Imagen 2', 'wpfunos');?></td>
          <td style="width:15px;"></td>
          <td><?php esc_html_e('Imagen 3', 'wpfunos');?></td>
          <td style="width:15px;"></td>
          <td><?php esc_html_e('Imagen 4', 'wpfunos');?></td>
          <td style="width:15px;"></td>
          <td><?php esc_html_e('Imagen 5', 'wpfunos');?></td>
        </tr>
        <tr>
          <td style="vertical-align: middle;">
            <?php
            if( strlen( get_post_meta( $_GET['post'], 'wpfunos_entradaDirectorioImagen1', true ) ) < 2 ){
              $output = wp_get_attachment_image( "1249", array('150', '150'), "", array( "class" => "media-browse" ) );
            }else{
              $output = wp_get_attachment_image( get_post_meta( $_GET['post'], 'wpfunos_entradaDirectorioImagen1', true ), array('150', '150'), "", array( "class" => "media-browse") );
            }
            echo str_replace( 'class="media-browse"', 'class="media-browse"  data-media-id="#Imagen1"', $output );
            ?>
          </td>
          <td style="width:15px;"></td>
          <td style="vertical-align: middle;">
            <?php
            if( strlen( get_post_meta( $_GET['post'], 'wpfunos_entradaDirectorioImagen2', true ) ) < 2 ){
              $output = wp_get_attachment_image( "1249", array('150', '150'), "", array( "class" => "media-browse" ) );
            }else{
              $output = wp_get_attachment_image( get_post_meta( $_GET['post'], 'wpfunos_entradaDirectorioImagen2', true ), array('150', '150'), "", array( "class" => "media-browse") );
            }
            echo str_replace( 'class="media-browse"', 'class="media-browse"  data-media-id="#Imagen2"', $output );
            ?>
          </td>
          <td style="width:15px;"></td>
          <td style="vertical-align: middle;">
            <?php
            if( strlen( get_post_meta( $_GET['post'], 'wpfunos_entradaDirectorioImagen3', true ) ) < 2 ){
              $output = wp_get_attachment_image( "1249", array('150', '150'), "", array( "class" => "media-browse" ) );
            }else{
              $output = wp_get_attachment_image( get_post_meta( $_GET['post'], 'wpfunos_entradaDirectorioImagen3', true ), array('150', '150'), "", array( "class" => "media-browse" ) );
            }
            echo str_replace( 'class="media-browse"', 'class="media-browse"  data-media-id="#Imagen3"', $output );
            ?>
          </td>
          <td style="width:15px;"></td>
          <td style="vertical-align: middle;">
            <?php
            if( strlen( get_post_meta( $_GET['post'], 'wpfunos_entradaDirectorioImagen4', true ) ) < 2 ){
              $output = wp_get_attachment_image( "1249", array('150', '150'), "", array( "class" => "media-browse" ) );
            }else{
              $output = wp_get_attachment_image( get_post_meta( $_GET['post'], 'wpfunos_entradaDirectorioImagen4', true ), array('150', '150'), "", array( "class" => "media-browse" ) );
            }
            echo str_replace( 'class="media-browse"', 'class="media-browse"  data-media-id="#Imagen4"', $output );
            ?>
          </td>
          <td style="width:15px;"></td>
          <td style="vertical-align: middle;">
            <?php
            if( strlen( get_post_meta( $_GET['post'], 'wpfunos_entradaDirectorioImagen5', true ) ) < 2 ){
              $output = wp_get_attachment_image( "1249", array('150', '150'), "", array( "class" => "media-browse" ) );
            }else{
              $output = wp_get_attachment_image( get_post_meta( $_GET['post'], 'wpfunos_entradaDirectorioImagen5', true ), array('150', '150'), "", array( "class" => "media-browse" ) );
            }
            echo str_replace( 'class="media-browse"', 'class="media-browse"  data-media-id="#Imagen5"', $output );
            ?>
          </td>
        </tr>
        <tr>
          <td style="vertical-align: middle;" ><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'Imagen1','name' => 'wpfunos_entradaDirectorioImagen1','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
          <td style="width:15px;"></td>
          <td style="vertical-align: middle;" ><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'Imagen2','name' => 'wpfunos_entradaDirectorioImagen2','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
          <td style="width:15px;"></td>
          <td style="vertical-align: middle;" ><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'Imagen3','name' => 'wpfunos_entradaDirectorioImagen3','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
          <td style="width:15px;"></td>
          <td style="vertical-align: middle;" ><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'Imagen4','name' => 'wpfunos_entradaDirectorioImagen4','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 )); ?></td>
          <td style="width:15px;"></td>
          <td style="vertical-align: middle;" ><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'Imagen5','name' => 'wpfunos_entradaDirectorioImagen5','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 )); ?></td>
        </tr>
      </table>
    </li>
    <hr/>
    <li class="directorio_entrada_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Entierro desde', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Incineración desde', 'wpfunos');?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_entradaDirectorioEntierroDesde','name' => 'wpfunos_entradaDirectorioEntierroDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID ,'disabled' => '', 'size' => 7 ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_entradaDirectorioIncineracionDesde','name' => 'wpfunos_entradaDirectorioIncineracionDesde','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => '', 'size' => 7  ));?></td>
        </tr>
      </table>
    </li>
    <hr/>
    <li class="directorio_entrada_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Landings', 'wpfunos');?></td>
        </tr>
        <tr style="display: none;">
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_entradaDirectorioLandings','name' => 'wpfunos_entradaDirectorioLandings','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''  ));?></td>
        </tr>
      </table>
    </li>
    <li class="directorio_entrada_wpfunos_list">
      <table>
        <tr>
          <?php
          $codigos = (explode(',',get_post_meta(  $post->ID , 'wpfunos_entradaDirectorioCodigoProvincia', true )));
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
            $paginas = (explode(',',get_post_meta(  $post->ID , 'wpfunos_entradaDirectorioLandings', true )));
            foreach( $landings as $landing ){
              $check='';
              foreach( $paginas as $pagina ){
                if( $landing->ID == $pagina ) $check='checked';
              }
              ?>
              <tr>
                <td><input type="checkbox" id="landingDirectorio-<?php echo $landing->ID?>" name="landingDirectorio-<?php echo $landing->ID?>" size="40" value="1" <?php echo $check?>/></td>
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
    <li class="directorio_entrada_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Servicios', 'wpfunos');?></td>
        </tr>
        <tr style="display: none;">
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_entradaDirectorioServicios','name' => 'wpfunos_entradaDirectorioServicios','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID  ));?></td>
        </tr>
      </table>
    </li>
    <li class="directorio_entrada_wpfunos_list">
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
          $paginas = (explode(',',get_post_meta(  $post->ID , 'wpfunos_entradaDirectorioServicios', true )));
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
    <li class="directorio_entrada_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Últimas defunciones', 'wpfunos');?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_entradaDirectorioUltimasDefunciones','name' => 'wpfunos_entradaDirectorioUltimasDefunciones','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID  ));?></td>
        </tr>
      </table>
    </li>
    <hr/>
    <?php // provide textarea name for $_POST variable
    $notes_entradaDirectorioDescripcion = get_post_meta( $post->ID, 'wpfunos_entradaDirectorioDescripcion', true );
    $args_entradaDirectorioDescripcion = array( 'textarea_name' => 'wpfunos_entradaDirectorioDescripcion', 'textarea_rows' => 8);
    $notes_entradaDirectorioHorario = get_post_meta( $post->ID, 'wpfunos_entradaDirectorioHorario', true );
    $args_entradaDirectorioHorario = array( 'textarea_name' => 'wpfunos_entradaDirectorioHorario', 'textarea_rows' => 8);
    $notes_entradaDirectorioComoLlegar = get_post_meta( $post->ID, 'wpfunos_entradaDirectorioComoLlegar', true );
    $args_entradaDirectorioComoLlegar = array( 'textarea_name' => 'wpfunos_entradaDirectorioComoLlegar', 'textarea_rows' => 8);
    $notes_entradaDirectorioDescripcionServicios = get_post_meta( $post->ID, 'wpfunos_entradaDirectorioDescripcionServicios', true );
    $args_entradaDirectorioDescripcionServicios = array( 'textarea_name' => 'wpfunos_entradaDirectorioDescripcionServicios', 'textarea_rows' => 8);
    ?>
    <li><label for="wpfunos_entradaDirectorioDescripcion" style="font-size: 32px;">Descripción</label>
      <?php	wp_editor( $notes_entradaDirectorioDescripcion, 'wpfunos_entradaDirectorioDescripcion',$args_entradaDirectorioDescripcion); ?>
    </li>
    <li><label for="wpfunos_entradaDirectorioHorario" style="font-size: 32px;">Horario</label>
      <?php	wp_editor( $notes_entradaDirectorioHorario, 'wpfunos_entradaDirectorioHorario',$args_entradaDirectorioHorario); ?>
    </li>
    <li><label for="wpfunos_entradaDirectorioComoLlegar" style="font-size: 32px;">Como llegar</label>
      <?php	wp_editor( $notes_entradaDirectorioComoLlegar, 'wpfunos_entradaDirectorioComoLlegar',$args_entradaDirectorioComoLlegar); ?>
    </li>
    <li><label for="wpfunos_entradaDirectorioDescripcionServicios" style="font-size: 32px;">Descripción servicios</label>
      <?php	wp_editor( $notes_entradaDirectorioDescripcionServicios, 'wpfunos_entradaDirectorioDescripcionServicios',$args_entradaDirectorioDescripcionServicios); ?>
    </li>
  </ul>
</div>

<script>
// https://gist.github.com/RadGH/9144771 - WordPress media "browse" button
$ = jQuery.noConflict();
$( document ).ready(function() {
  $(function(){
    console.log( "document loaded" );

    var media_properties = ['id', 'title', 'filename', 'url', 'link', 'alt', 'author', 'description', 'caption', 'name', 'status', 'uploadedTo', 'date', 'modified', 'menuOrder', 'mime', 'type', 'subtype', 'icon', 'dateFormatted', 'nonces', 'editLink', 'sizes', 'height', 'width', 'orientation', 'compat'];


    $('.media-remove').on('click', function(e) {
      e.preventDefault();

      if ($(this).attr('data-browse-button')) var $browse = $($(this).attr('data-browse-button'));
      else var $browse = $(this).siblings('.media-browse');

      if (!$browse.length) {
        alert('No sibling browse button found, or the data-browse-button attribute had no matching elements');
        return false;
      }

      $browse.data('attachment', false).trigger('attachment-removed');

      // Trigger the update for the browse button's fields
      for (i = 0; i < media_properties.length; i++) {
        var media_key = media_properties[i];
        var selector = $browse.attr('data-media-' + media_key); // data-media-url, data-media-link, data-media-height

        if (selector) {
          var $target = jQuery(selector);

          if ($target.length) {
            $target.val('').trigger('media-updated').trigger('change');
          }
        }
      }

      return false;
    });

    var file_frame;
    $('.media-browse').on('click', function(e) {
      e.preventDefault();

      var $this = $(this);

      if (!wp || !wp.media) {
        alert('The media gallery is not available. You must admin_enqueue this function: wp_enqueue_media()');
        return;
      }

      // If the media frame already exists, reopen it.
      if (file_frame) {
        file_frame.open();
        return;
      }

      // Create the media frame.
      file_frame = wp.media.frames.file_frame = wp.media({
        title: $this.attr('data-media-title') || 'Browsing Media',
        button: {
          text: $this.attr('data-media-text') || 'Select',
        },
        multiple: false // Set to true to allow multiple files to be selected
      });

      // When an image is selected, run a callback.
      file_frame.on('select', function() {
        // We set multiple to false so only get one image from the uploader
        attachment = file_frame.state().get('selection').first().toJSON();

        // Extend this plugin yourself by binding the "attachment-selected" event to the button.
        $this.data('attachment', attachment).trigger('attachment-selected');

        // Allow each file property to be assigned to a field. Fields are referenced by the button's data attrbiutes
        // All methods support a data attribute.
        // data-media-{index}
        // Example:
        // attachment.url is assigned to the element matching the value of the "data-media-url" attribute (if available)
        for (i = 0; i < media_properties.length; i++) {
          var media_key = media_properties[i];
          var selector = $this.attr('data-media-' + media_key); // data-media-url, data-media-link, data-media-height

          if (selector) {
            var $target = $(selector);

            if (!$target.length) {
              if (console && console.log) {
                console.log('Selector contains zero matched elements:', selector, 'Value expected:', attachment[media_key]);
                continue;
              }
            }

            // Assign the target field the given value, and trigger two events for developers to check for
            $target.val(attachment[media_key]).trigger('media-updated').trigger('change');
          }
        }
      });

      // Finally, open the modal
      file_frame.open();

    });
  });
});
</script>
