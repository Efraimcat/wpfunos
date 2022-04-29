<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
/**
* Aseguradoras.
*
* @link       https://github.com/Efraimcat/wpfunos/
* @since      1.0.0
*
* @package    Wpfunos
* @subpackage Wpfunos/aseguradoras
* @author     Efraim Bayarri <efraim@efraim.cat>
*/
class Wpfunos_Colaboradores {

  private $plugin_name;
  private $version;

  public function __construct( $plugin_name, $version ) {
    $this->plugin_name = $plugin_name;
    $this->version = $version;

    add_shortcode( 'wpfunos-servicios-colaborador-usuarios', array( $this, 'wpfunosServiciosColaboradorUsuariosShortcode' ));
    add_shortcode( 'wpfunos-servicios-colaborador-servicios', array( $this, 'wpfunosServiciosColaboradorServiciosShortcode' ));
    add_shortcode( 'wpfunos-servicios-colaborador-resultados', array( $this, 'wpfunosServiciosColaboradorResultadosShortcode' ));
  }

  /*********************************/
  /*****  SHORTCODES          ******/
  /*********************************/

  /**
  * Shortcode [wpfunos-servicios-colaborador-usuarios]
  */
  public function wpfunosServiciosColaboradorUsuariosShortcode( $atts, $content = "" ) {
    if( isset( $_GET['wpfunos-select-resultados'] )) return;
    if( isset( $_GET['wpfunos-select'] )){
      ?>
      <form id="wpfunos-servicios-colaborador-usuario-seleccionado">
        <input type="submit" value="Reiniciar búsqueda" style="background-color: #1d40d3; font-size: 14px;">
        <table style="margin-top: 10px;">
          <tr><td colspan="2"><h3>Datos usuario seleccionado</h3></td></tr>
          <tr><td>Fecha</td><td><?php echo get_post_meta( $_GET['wpfunos-select'], $this->plugin_name . '_TimeStamp', true ); ?></td></tr>
          <tr><td>Nombre</td><td><?php echo get_post_meta( $_GET['wpfunos-select'], $this->plugin_name . '_userName', true ); ?></td></tr>
          <tr><td>Correo</td><td><?php echo get_post_meta( $_GET['wpfunos-select'], $this->plugin_name . '_userMail', true ); ?></td></tr>
          <tr><td>Teléfono</td><td><?php echo get_post_meta( $_GET['wpfunos-select'], $this->plugin_name . '_userPhone', true ); ?></td></tr>
          <tr><td>Ubicación</td><td><?php echo get_post_meta( $_GET['wpfunos-select'], $this->plugin_name . '_userNombreSeleccionUbicacion', true ); ?></td></tr>
          <tr><td>Servicio</td><td><?php echo get_post_meta( $_GET['wpfunos-select'], $this->plugin_name . '_userNombreSeleccionServicio', true ); ?></td></tr>
          <tr><td>Ataud</td><td><?php echo get_post_meta( $_GET['wpfunos-select'], $this->plugin_name . '_userNombreSeleccionAtaud', true ); ?></td></tr>
          <tr><td>Velatorio</td><td><?php echo get_post_meta( $_GET['wpfunos-select'], $this->plugin_name . '_userNombreSeleccionVelatorio', true ); ?></td></tr>
          <tr><td>Despedida</td><td><?php echo get_post_meta( $_GET['wpfunos-select'], $this->plugin_name . '_userNombreSeleccionDespedida', true ); ?></td></tr>
        </table>
      </form>
      <?php
      return;
    }
    ?>
    <form id="wpfunos-servicios-colaborador-usuario" method="GET">
      <input type="submit" value="Selecionar usuario" style="background-color: #1d40d3; font-size: 14px;">
      <table style="margin-top: 10px;">
        <?php
        $args = array(
          'post_status' => 'publish',
          'post_type' => 'usuarios_wpfunos',
          'posts_per_page' => -1,
          'meta_key' =>  'wpfunos_userAccion',
          'meta_value' => '0',
        );
        $post_list = get_posts( $args );

        if( $post_list ){
          foreach ( $post_list as $post ) :
            $checked = '';
            if( $post->ID == $_GET['wpfunos-select'] ) $checked = 'checked';
            ?>
            <tr>
              <td  rowspan="2"><input id="wpfunos-select" type="checkbox" name="wpfunos-select" value="<?php echo $post->ID; ?>" <?php echo $checked; ?> ></td>
              <td><?php echo get_post_meta( $post->ID, $this->plugin_name . '_TimeStamp', true ); ?></td>
              <td><?php echo get_post_meta( $post->ID, $this->plugin_name . '_userName', true ); ?></td>
              <td><?php echo get_post_meta( $post->ID, $this->plugin_name . '_userMail', true ); ?></td>
            </tr>
            <tr>
              <td></td>
              <td><?php echo get_post_meta( $post->ID, $this->plugin_name . '_userPhone', true ); ?></td>
              <td><?php echo get_post_meta( $post->ID, $this->plugin_name . '_userNombreSeleccionUbicacion', true ); ?></td>
            </tr>
            <?php
          endforeach;
          wp_reset_postdata();
        }
        ?>
      </table>
    </form>
    <?php
  }

  /**
  * Shortcode [wpfunos-servicios-colaborador-servicios]
  */
  public function wpfunosServiciosColaboradorServiciosShortcode( $atts, $content = "" ) {
    if( isset( $_GET['wpfunos-select-resultados'] )) return;
    if( ! isset( $_GET['wpfunos-select'] )) return;
    if( isset( $_GET['wpfunos-select-servicio'] )){
      ?>
      <form id="wpfunos-servicios-colaborador-usuario-servicio">
        <input type="submit" value="Resultados" style="background-color: #1d40d3; font-size: 14px;">
        <table style="margin-top: 10px;">
          <tr><td colspan="2"><h3>Datos servicio seleccionado</h3></td></tr>
          <tr><td>Servicio</td><td><strong><?php echo get_post_meta( $_GET['wpfunos-select-servicio'], $this->plugin_name . '_servicioNombre', true ); ?></strong></td></tr>
          <tr><td></td><td><?php echo get_the_title($_GET['wpfunos-select-servicio']); ?></td></tr>
          <tr><td>Población</td><td><?php echo get_post_meta( $_GET['wpfunos-select-servicio'], $this->plugin_name . '_servicioPoblacion', true ); ?></td></tr>
          <tr><td>Dirección</td><td><?php echo get_post_meta( $_GET['wpfunos-select-servicio'], $this->plugin_name . '_servicioDireccion', true ); ?></td></tr>
          <tr><td>Correo</td><td><?php echo get_post_meta( $_GET['wpfunos-select-servicio'], $this->plugin_name . '_servicioEmail', true ); ?></td></tr>
          <tr><td>Teléfono</td><td><?php echo get_post_meta( $_GET['wpfunos-select-servicio'], $this->plugin_name . '_servicioTelefono', true ); ?></td></tr>
        </table>
        <input type="hidden" name="wpfunos-select" id="wpfunos-select" value="<?php echo $_GET['wpfunos-select']; ?>" >
        <input type="hidden" name="wpfunos-select-servicio" id="wpfunos-select-servicio" value="<?php echo $_GET['wpfunos-select-servicio']; ?>" >
        <input type="hidden" name="wpfunos-select-resultados" id="wpfunos-select-resultados" value="1" >
        <input type="submit" value="Resultados" style="background-color: #1d40d3; font-size: 14px;">
      </form>
      <?php
      return;
    }
    ?>
    <form id="wpfunos-servicios-colaborador-servicios" method="GET">
      <input type="submit" value="Selecionar servicio" style="background-color: #1d40d3; font-size: 14px;">
      <input type="hidden" name="wpfunos-select" id="wpfunos-select" value="<?php echo $_GET['wpfunos-select']; ?>" >
      <table style="margin-top: 10px;">
        <?php
        $args = array(
          'post_status' => 'publish',
          'post_type' => 'servicios_wpfunos',
          'posts_per_page' => -1,
          'meta_key' =>  'wpfunos_servicioActivo',
          'meta_value' => true,
        );
        $post_list = get_posts( $args );
        if( $post_list ){
          foreach ( $post_list as $post ) :
            $checked = '';
            if( $post->ID == $_GET['wpfunos-select-servicio'] ) $checked = 'checked';
            ?>
            <tr>
              <td  rowspan="2"><input id="wpfunos-select-servicio" type="checkbox" name="wpfunos-select-servicio" value="<?php echo $post->ID; ?>" <?php echo $checked; ?> ></td>
              <td><strong><?php echo get_post_meta( $post->ID, $this->plugin_name . '_servicioNombre', true ); ?></strong></td>
            </tr>
            <tr>
              <td><?php echo get_the_title($post->ID); ?></td>
            </tr>
            <?php
          endforeach;
          wp_reset_postdata();
        }
        ?>
      </table>
    </form>
    <?php
  }

  /**
  * Shortcode [wpfunos-servicios-colaborador-resultados]
  */
  public function wpfunosServiciosColaboradorResultadosShortcode( $atts, $content = "" ) {
    if( ! isset( $_GET['wpfunos-select-resultados'] )) return;
    if( isset( $_GET['wpfunos-select-enviar'] )){
      //https://funos.es/pagina-servicios-colaborador?wpfunos-select=49250&wpfunos-select-servicio=45145&wpfunos-select-resultados=1&wpfunos-select-enviar=1&wpfunos-select-comentarios=Comentarios.%0D%0A%0D%0ASaludos%21
      //echo 'Comentarios: ' . $_GET['wpfunos-select-comentarios'];
      $this->wpfunosServiciosColaboradorProcesarMensaje( $_GET['wpfunos-select'], $_GET['wpfunos-select-servicio'], $_GET['wpfunos-select-comentarios']);
      ?>
      <form id="wpfunos-servicios-colaborador-usuario-seleccionado" style="margin-top: 10px;">
        <input type="submit" value="Reiniciar búsqueda" style="background-color: #1d40d3; font-size: 14px;">
      </form>
      <?php
      return;
    }
    ?>
    <form id="wpfunos-servicios-colaborador-usuario-seleccionado">
      <input type="submit" value="Reiniciar búsqueda" style="background-color: #1d40d3; font-size: 14px;">
    </form>
    <div class="elementor-container elementor-column-gap-default">
      <div class="elementor-row">
        <div class="elementor-column-wrap">
          <div class="elementor-widget-wrap">
            <div class="servicios-colaborador-detalles">
              <h3>Enviar lead</h3>
              <table style="margin-top: 10px;">
                <tr><td colspan="2"><h3>Datos usuario seleccionado</h3></td></tr>
                <tr><td>Fecha</td><td><?php echo get_post_meta( $_GET['wpfunos-select'], $this->plugin_name . '_TimeStamp', true ); ?></td></tr>
                <tr><td>Nombre</td><td><?php echo get_post_meta( $_GET['wpfunos-select'], $this->plugin_name . '_userName', true ); ?></td></tr>
                <tr><td>Correo</td><td><?php echo get_post_meta( $_GET['wpfunos-select'], $this->plugin_name . '_userMail', true ); ?></td></tr>
                <tr><td>Teléfono</td><td><?php echo get_post_meta( $_GET['wpfunos-select'], $this->plugin_name . '_userPhone', true ); ?></td></tr>
                <tr><td>Ubicación</td><td><?php echo get_post_meta( $_GET['wpfunos-select'], $this->plugin_name . '_userNombreSeleccionUbicacion', true ); ?></td></tr>
                <tr><td>Servicio</td><td><?php echo get_post_meta( $_GET['wpfunos-select'], $this->plugin_name . '_userNombreSeleccionServicio', true ); ?></td></tr>
                <tr><td>Ataud</td><td><?php echo get_post_meta( $_GET['wpfunos-select'], $this->plugin_name . '_userNombreSeleccionAtaud', true ); ?></td></tr>
                <tr><td>Velatorio</td><td><?php echo get_post_meta( $_GET['wpfunos-select'], $this->plugin_name . '_userNombreSeleccionVelatorio', true ); ?></td></tr>
                <tr><td>Despedida</td><td><?php echo get_post_meta( $_GET['wpfunos-select'], $this->plugin_name . '_userNombreSeleccionDespedida', true ); ?></td></tr>
              </table>
              <table style="margin-top: 10px;">
                <tr><td colspan="2"><h3>Datos servicio seleccionado</h3></td></tr>
                <tr><td>Servicio</td><td><strong><?php echo get_post_meta( $_GET['wpfunos-select-servicio'], $this->plugin_name . '_servicioNombre', true ); ?></strong></td></tr>
                <tr><td></td><td><?php echo get_the_title($_GET['wpfunos-select-servicio']); ?></td></tr>
                <tr><td>Población</td><td><?php echo get_post_meta( $_GET['wpfunos-select-servicio'], $this->plugin_name . '_servicioPoblacion', true ); ?></td></tr>
                <tr><td>Dirección</td><td><?php echo get_post_meta( $_GET['wpfunos-select-servicio'], $this->plugin_name . '_servicioDireccion', true ); ?></td></tr>
                <tr><td>Correo</td><td><?php echo get_post_meta( $_GET['wpfunos-select-servicio'], $this->plugin_name . '_servicioEmail', true ); ?></td></tr>
                <tr><td>Teléfono</td><td><?php echo get_post_meta( $_GET['wpfunos-select-servicio'], $this->plugin_name . '_servicioTelefono', true ); ?></td></tr>
              </table>
            </div>
            <div class="servicios-colaborador-comentarios">
              <h3>Comentarios</h3>
              <form id="wpfunos-servicios-colaborador-detalles-comentarios" method="GET">
                <input type="hidden" name="wpfunos-select" id="wpfunos-select" value="<?php echo $_GET['wpfunos-select']; ?>" >
                <input type="hidden" name="wpfunos-select-servicio" id="wpfunos-select-servicio" value="<?php echo $_GET['wpfunos-select-servicio']; ?>" >
                <input type="hidden" name="wpfunos-select-resultados" id="wpfunos-select-resultados" value="1" >
                <input type="hidden" name="wpfunos-select-enviar" id="wpfunos-select-enviar" value="1" >
                <textarea id="wpfunos-select-comentarios" name="wpfunos-select-comentarios" rows="10" cols="70"></textarea>
                <input type="submit" value="Enviar lead" style="background-color: #1d40d3; font-size: 14px;">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
  }

  /*********************************/
  /*****                      ******/
  /*********************************/
  private function wpfunosServiciosColaboradorProcesarMensaje( $wpfunos_select, $wpfunos_select_servicio, $wpfunos_select_comentarios){
    ?>
    <div class="elementor-container elementor-column-gap-default">
      <div class="elementor-row">
        <div class="elementor-column-wrap">
          <div class="elementor-widget-wrap">
            <div class="servicios-colaborador-detalles" style="margin-top: 10px;">
              <p>Mensaje enviado a <strong><?php echo get_post_meta( $wpfunos_select_servicio, $this->plugin_name . '_servicioEmail', true ); ?></strong></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php

  }

}
