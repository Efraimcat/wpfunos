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
.media-browse {
  cursor: pointer;
}
</style>
<div class="directorio_funeraria_wpfunos_containers">
  <ul class="directorio_funeraria_wpfunos_data_metabox">
    <li class="directorio_funeraria_wpfunos_list">
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
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_funerariaDirectorioNombre','name' => 'wpfunos_funerariaDirectorioNombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 30  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_funerariaDirectorioDireccion','name' => 'wpfunos_funerariaDirectorioDireccion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 30  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_funerariaDirectorioCorreo','name' => 'wpfunos_funerariaDirectorioCorreo','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 30  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_funerariaDirectorioTelefono','name' => 'wpfunos_funerariaDirectorioTelefono','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID , 'size' => 30 ));?></td>
        </tr>
      </table>
    </li>
    <hr/>
    <li class="directorio_funeraria_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Población', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Códigos provincia', 'wpfunos');?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_funerariaDirectorioPoblacion','name' => 'wpfunos_funerariaDirectorioPoblacion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 30  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_funerariaDirectorioCodigoProvincia','name' => 'wpfunos_funerariaDirectorioCodigoProvincia','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 30  ));?></td>
        </tr>
      </table>
    </li>
    <hr/>
    <li class="directorio_funeraria_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Longitud', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Latitud', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Shortcode', 'wpfunos');?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_funerariaDirectorioLongitud','name' => 'wpfunos_funerariaDirectorioLongitud','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 15  ));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_funerariaDirectorioLatitud','name' => 'wpfunos_funerariaDirectorioLatitud','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 15  ));?></td>
          <td style="width:5px;"></td>
          <td>
            <select name="wpfunos_funerariaDirectorioShortcode" id="wpfunos_funerariaDirectorioShortcode" style="width: 272px" >
              <?php
              $args = array(
                'post_type' => 'directorio_shortcode',
                'posts_per_page' => -1,
                'post_status' => 'any', // para incluir borradores
                'orderby' => 'title',
                'order' => 'ASC',
              );
              $shortcodes = get_posts( $args );
              foreach( $shortcodes as $shortcode ) {
                ?>
                <option value="<?php echo $shortcode->ID; ?>"
                  <?php if (get_post_meta(  $post->ID , 'wpfunos_funerariaDirectorioShortcode', true ) == $shortcode->ID ) echo 'selected="selected"'; ?> ><?php echo get_the_title( $shortcode->ID) ?>
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
    <li class="directorio_funeraria_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Imagenes', 'wpfunos');?></td>
        </tr>
        <tr>
          <td style="vertical-align: middle;">
            <?php
            $imagenes = (explode(',',get_post_meta(  $post->ID , 'wpfunos_funerariaDirectorioImagenes', true )));
            if( get_post_meta(  $post->ID , 'wpfunos_funerariaDirectorioImagenes', true ) == ''){
              $output = wp_get_attachment_image( "39978", array('150', '150'), "", array( "class" => "media-browse" ) );
              echo str_replace( 'class="media-browse"', 'class="media-browse"  data-media-id="#Imagenes"', $output );
            }
            foreach( $imagenes as $imagen ){
              $output = wp_get_attachment_image( $imagen, array('150', '150'), "", array( "class" => "media-browse" ) );
              echo str_replace( 'class="media-browse"', 'class="media-browse"  data-media-id="#Imagenes"', $output );
            }
            ?>
          </td>
        </tr>
        <tr>
          <td style="vertical-align: middle;" >
            <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'Imagenes','name' => 'wpfunos_funerariaDirectorioImagenes','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID ));?>
          </td>
        </tr>
      </table>
    </li>
    <hr/>
    <li class="directorio_funeraria_wpfunos_list">
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
    <li class="directorio_funeraria_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Landings', 'wpfunos');?></td>
        </tr>
        <tr style="display: none;">
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_funerariaDirectorioLandings','name' => 'wpfunos_funerariaDirectorioLandings','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''  ));?></td>
        </tr>
      </table>
    </li>
    <li class="directorio_funeraria_wpfunos_list">
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
    <li class="directorio_funeraria_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Servicios', 'wpfunos');?></td>
        </tr>
        <tr style="display: none;">
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_funerariaDirectorioServicios','name' => 'wpfunos_funerariaDirectorioServicios','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID  ));?></td>
        </tr>
      </table>
    </li>
    <li class="directorio_funeraria_wpfunos_list">
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
    <li class="directorio_funeraria_wpfunos_list">
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
    $args_funerariaDirectorioDescripcion = array( 'textarea_name' => 'wpfunos_funerariaDirectorioDescripcion', 'textarea_rows' => 8);
    $notes_funerariaDirectorioHorario = get_post_meta( $post->ID, 'wpfunos_funerariaDirectorioHorario', true );
    $args_funerariaDirectorioHorario = array( 'textarea_name' => 'wpfunos_funerariaDirectorioHorario', 'textarea_rows' => 8);
    $notes_funerariaDirectorioComoLlegar = get_post_meta( $post->ID, 'wpfunos_funerariaDirectorioComoLlegar', true );
    $args_funerariaDirectorioComoLlegar = array( 'textarea_name' => 'wpfunos_funerariaDirectorioComoLlegar', 'textarea_rows' => 8);
    $notes_funerariaDirectorioDescripcionServicios = get_post_meta( $post->ID, 'wpfunos_funerariaDirectorioDescripcionServicios', true );
    $args_funerariaDirectorioDescripcionServicios = array( 'textarea_name' => 'wpfunos_funerariaDirectorioDescripcionServicios', 'textarea_rows' => 8);
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
        multiple: true // Set to true to allow multiple files to be selected
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
