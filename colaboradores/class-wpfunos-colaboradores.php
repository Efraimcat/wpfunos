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
      if( ! get_option($this->plugin_name . '_activarCorreoServiciosColaborador') ){
        echo 'Opció de envio de correo deshabilitada!';
        return;
      }
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
            <div class="servicios-colaborador-detalles" style="margin-top: 25px;">
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
    //if( ! get_option($this->plugin_name . '_activarCorreoServiciosColaborador') ){
    //
    //  Calcular Precios
    //
    $seleccion = get_post_meta( $wpfunos_select, 'wpfunos_userSeleccion', true );
    $respuesta = (explode(',',$seleccion));

    $NA=false;
    // Destino
    switch($respuesta[3]){
      case '1':
      $precioDestino = get_post_meta( $wpfunos_select_servicio, 'wpfunos_servicioDestino_1Precio', true );
      $nombreDestino = get_post_meta( $wpfunos_select_servicio, 'wpfunos_servicioDestino_1Nombre', true );
      break;
      case '2':
      $precioDestino = get_post_meta( $wpfunos_select_servicio, 'wpfunos_servicioDestino_2Precio', true );
      $nombreDestino = get_post_meta( $wpfunos_select_servicio, 'wpfunos_servicioDestino_2Nombre', true );
      break;
      case '3':
      $precioDestino = get_post_meta( $wpfunos_select_servicio, 'wpfunos_servicioDestino_3Precio', true );
      $nombreDestino = get_post_meta( $wpfunos_select_servicio, 'wpfunos_servicioDestino_3Nombre', true );
      break;
    }
    if ( strlen( $precioDestino ) < 1 ) $NA=true;
    // Ataud
    switch($respuesta[4]){
      case '1':
      $precioAtaud = get_post_meta( $wpfunos_select_servicio, 'wpfunos_servicioAtaud_1Precio', true );
      $nombreAtaud = get_post_meta( $wpfunos_select_servicio, 'wpfunos_servicioAtaud_1Nombre', true );
      $precioAtaudEco = get_post_meta( $wpfunos_select_servicio, 'wpfunos_servicioAtaudEcologico_1Precio', true );
      $nombreAtaudEco = get_post_meta( $wpfunos_select_servicio, 'wpfunos_servicioAtaudEcologico_1Nombre', true );
      break;
      case '2':
      $precioAtaud = get_post_meta( $wpfunos_select_servicio, 'wpfunos_servicioAtaud_2Precio', true );
      $nombreAtaud = get_post_meta( $wpfunos_select_servicio, 'wpfunos_servicioAtaud_2Nombre', true );
      $precioAtaudEco = get_post_meta( $wpfunos_select_servicio, 'wpfunos_servicioAtaudEcologico_2Precio', true );
      $nombreAtaudEco = get_post_meta( $wpfunos_select_servicio, 'wpfunos_servicioAtaudEcologico_2Nombre', true );
      break;
      case '3':
      $precioAtaud = get_post_meta( $wpfunos_select_servicio, 'wpfunos_servicioAtaud_3Precio', true );
      $nombreAtaud = get_post_meta( $wpfunos_select_servicio, 'wpfunos_servicioAtaud_3Nombre', true );
      $precioAtaudEco = get_post_meta( $wpfunos_select_servicio, 'wpfunos_servicioAtaudEcologico_3Precio', true );
      $nombreAtaudEco = get_post_meta( $wpfunos_select_servicio, 'wpfunos_servicioAtaudEcologico_3Nombre', true );
      break;
    }
    if ( strlen( $precioAtaud ) < 1 && strlen( $precioAtaudEco ) < 1 ) $NA=true;
    // Velatorio
    switch($respuesta[5]){
      case '1':
      $precioVelatorio = get_post_meta( $wpfunos_select_servicio, 'wpfunos_servicioVelatorioPrecio', true );
      $nombreVelatorio = get_post_meta( $wpfunos_select_servicio, 'wpfunos_servicioVelatorioNombre', true );
      break;
      case '2':
      $precioVelatorio = get_post_meta( $wpfunos_select_servicio, 'wpfunos_servicioVelatorioNoPrecio', true );
      $nombreVelatorio = get_post_meta( $wpfunos_select_servicio, 'wpfunos_servicioVelatorioNoNombre', true );
      break;
    }
    if ( strlen( $precioDestino ) < 1 ) $NA=true;
    // Ceremonia
    switch($respuesta[6]){
      case '1':
      $precioDespedida = '0';
      $nombreDespedida = 'Sin ceremonia';
      break;
      case '2':
      $precioDespedida = get_post_meta( $wpfunos_select_servicio, 'wpfunos_servicioDespedida_1Precio', true );
      $nombreDespedida = get_post_meta( $wpfunos_select_servicio, 'wpfunos_servicioDespedida_1Nombre', true );
      break;
      case '3':
      $precioDespedida = get_post_meta( $wpfunos_select_servicio, 'wpfunos_servicioDespedida_2Precio', true );
      $nombreDespedida = get_post_meta( $wpfunos_select_servicio, 'wpfunos_servicioDespedida_2Nombre', true );
      break;
      case '4':
      $precioDespedida = get_post_meta( $wpfunos_select_servicio, 'wpfunos_servicioDespedida_3Precio', true );
      $nombreDespedida = get_post_meta( $wpfunos_select_servicio, 'wpfunos_servicioDespedida_3Nombre', true );
      break;
    }
    if ( strlen( $precioDespedida ) < 1 ) $NA=true;
    //
    $precioBase = get_post_meta( $wpfunos_select_servicio, 'wpfunos_servicioPrecioBase', true );
    //
    if( $NA ){
      $precioTotal = $precioTotalEco = $precioBase = $precioDestino = $nombreDestino = $precioAtaud = $nombreAtaud = $precioAtaudEco = $nombreAtaudEco = $precioVelatorio = $nombreVelatorio = $precioDespedida = $nombreDespedida = '';
    }else{
      $precioTotal = $precioBase + $precioDestino + $precioAtaud + $precioVelatorio + $precioDespedida;
      $precioTotalEco = $precioBase + $precioDestino + $precioAtaudEco + $precioVelatorio + $precioDespedida;
    }

    //
    mt_srand(mktime());
    $referencia = 'funos-'.(string)mt_rand();
    $my_post = array(
      'post_title' => $referencia,
      'post_type' => 'usuarios_wpfunos',
      'post_status'  => 'publish',
      'meta_input'   => array(
        $this->plugin_name . '_TimeStamp' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
        $this->plugin_name . '_userReferencia' => sanitize_text_field( $referencia ),
        $this->plugin_name . '_userName' => sanitize_text_field( get_post_meta( $wpfunos_select ,$this->plugin_name . '_userName', true ) ),
        $this->plugin_name . '_userPhone' => sanitize_text_field( get_post_meta( $wpfunos_select ,$this->plugin_name . '_userPhone', true ) ),
        $this->plugin_name . '_userSeleccion' => sanitize_text_field( get_post_meta( $wpfunos_select ,$this->plugin_name . '_userSeleccion', true ) ),
        $this->plugin_name . '_userAccion' => '1',
        $this->plugin_name . '_userNombreAccion' => 'llamen servicios colaborador',
        $this->plugin_name . '_userNombreSeleccionUbicacion' => sanitize_text_field( get_post_meta( $wpfunos_select ,$this->plugin_name . '_userNombreSeleccionUbicacion', true ) ),
        $this->plugin_name . '_userNombreSeleccionDistancia' => sanitize_text_field( get_post_meta( $wpfunos_select ,$this->plugin_name . '_userNombreSeleccionDistancia', true ) ),
        $this->plugin_name . '_userNombreSeleccionServicio' => sanitize_text_field( get_post_meta( $wpfunos_select ,$this->plugin_name . '_userNombreSeleccionServicio', true ) ),
        $this->plugin_name . '_userNombreSeleccionAtaud' => sanitize_text_field( get_post_meta( $wpfunos_select ,$this->plugin_name . '_userNombreSeleccionAtaud', true ) ),
        $this->plugin_name . '_userNombreSeleccionVelatorio' => sanitize_text_field( get_post_meta( $wpfunos_select ,$this->plugin_name . '_userNombreSeleccionVelatorio', true ) ),
        $this->plugin_name . '_userNombreSeleccionDespedida' => sanitize_text_field( get_post_meta( $wpfunos_select ,$this->plugin_name . '_userNombreSeleccionDespedida', true ) ),
        $this->plugin_name . '_userServicio' => sanitize_text_field( $wpfunos_select_servicio ),
        $this->plugin_name . '_userCP' => sanitize_text_field( get_post_meta( $wpfunos_select ,$this->plugin_name . '_userCP', true ) ),
        $this->plugin_name . '_userMail' => sanitize_text_field( get_post_meta( $wpfunos_select ,$this->plugin_name . '_userMail', true ) ),
        $this->plugin_name . '_userDesgloseBaseNombre' => sanitize_text_field( get_post_meta( $wpfunos_select_servicio, $this->plugin_name . '_servicioNombre', true ) ),
        $this->plugin_name . '_userIP' => sanitize_text_field( get_post_meta( $wpfunos_select ,$this->plugin_name . '_userIP', true ) ),
        $this->plugin_name . '_userLAT' => sanitize_text_field( get_post_meta( $wpfunos_select ,$this->plugin_name . '_userLAT', true ) ),
        $this->plugin_name . '_userLNG' => sanitize_text_field( get_post_meta( $wpfunos_select ,$this->plugin_name . '_userLNG', true ) ),
        $this->plugin_name . '_userPluginVersion' => sanitize_text_field( $this->version ),
        $this->plugin_name . '_Dummy' => true,
        $this->plugin_name . '_userLead' => true,

        $this->plugin_name . '_userPrecio' => $precioTotal,

        $this->plugin_name . '_userDesgloseBaseNombre' => get_post_meta( $wpfunos_select_servicio, 'wpfunos_servicioNombre', true ),
        $this->plugin_name . '_userDesgloseBasePrecio' => $precioBase,
        $this->plugin_name . '_userDesgloseBaseTotal' => $precioBase,

        $this->plugin_name . '_userDesgloseDestinoNombre' => $nombreDestino,
        $this->plugin_name . '_userDesgloseDestinoPrecio' => $precioDestino,
        $this->plugin_name . '_userDesgloseDestinoTotal' => $precioDestino,

        $this->plugin_name . '_userDesgloseAtaudNombre' => $nombreAtaud,
        $this->plugin_name . '_userDesgloseAtaudPrecio' => $precioAtaud,
        $this->plugin_name . '_userDesgloseAtaudTotal' => $precioAtaud,

        $this->plugin_name . '_userDesgloseVelatorioNombre' => $nombreVelatorio,
        $this->plugin_name . '_userDesgloseVelatorioPrecio' => $precioVelatorio,
        $this->plugin_name . '_userDesgloseVelatorioTotal' => $precioVelatorio,

        $this->plugin_name . '_userDesgloseCeremoniaNombre' => $nombreDespedida,
        $this->plugin_name . '_userDesgloseCeremoniaPrecio' => $precioDespedida,
        $this->plugin_name . '_userDesgloseCeremoniaTotal' => $precioDespedida,

      ),
    );
    $post_id = wp_insert_post($my_post);
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', 'Acción en página colaborrador: llamen servicios colaborador' );
    do_action('wpfunos_log', 'Nombre: ' .  get_post_meta( $wpfunos_select ,$this->plugin_name . '_userName', true )  );
    do_action('wpfunos_log', 'ID: ' . $post_id  );
    do_action('wpfunos_log', 'referencia: ' .  $referencia  );

    $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreoServiciosColaborador'), get_option('wpfunos_asuntoCorreoServiciosColaborador') );
    //[nombreServicio], [nombrepack], [telefono], [telefonoUsuario], [telefonoServicio], [precio], [nombreUsuario], [referencia], [Email], [CPUsuario], [ubicacion]
    //[BaseNombre],[DestinoNombre], [AtaudNombre],[VelatorioNombre], [CeremoniaNombre],
    $mensaje = str_replace( '[nombreServicio]' , get_post_meta( $wpfunos_select_servicio, $this->plugin_name . '_servicioNombre', true ) , $mensaje );
    $mensaje = str_replace( '[nombrepack]' , get_post_meta( $wpfunos_select_servicio, $this->plugin_name . '_servicioPackNombre', true ) , $mensaje );
    $mensaje = str_replace( '[telefonoServicio]' , get_post_meta( $wpfunos_select_servicio, $this->plugin_name . '_servicioTelefono', true ) , $mensaje );
    $mensaje = str_replace( '[BaseNombre]' , get_post_meta( $wpfunos_select_servicio, $this->plugin_name . '_servicioNombre', true ) , $mensaje );
    $mensaje = str_replace( '[precio]' , ' ' , $mensaje );
    $mensaje = str_replace( '[referencia]' , $referencia, $mensaje );
    $mensaje = str_replace( '[telefono]' , sanitize_text_field( get_post_meta( $wpfunos_select ,$this->plugin_name . '_userPhone', true )) , $mensaje );
    $mensaje = str_replace( '[telefonoUsuario]' , sanitize_text_field( get_post_meta( $wpfunos_select ,$this->plugin_name . '_userPhone', true )) , $mensaje );
    $mensaje = str_replace( '[nombreUsuario]' , sanitize_text_field( get_post_meta( $wpfunos_select ,$this->plugin_name . '_userName', true )) , $mensaje );
    $mensaje = str_replace( '[Email]' , sanitize_text_field( get_post_meta( $wpfunos_select ,$this->plugin_name . '_userMail', true )) , $mensaje );
    $mensaje = str_replace( '[CPUsuario]' , sanitize_text_field( get_post_meta( $wpfunos_select ,$this->plugin_name . '_userCP', true )) , $mensaje );
    $mensaje = str_replace( '[ubicacion]' , sanitize_text_field( get_post_meta( $wpfunos_select ,$this->plugin_name . '_userNombreSeleccionUbicacion', true )) , $mensaje );
    $mensaje = str_replace( '[DestinoNombre]' , sanitize_text_field( get_post_meta( $wpfunos_select ,$this->plugin_name . '_userNombreSeleccionServicio', true )) , $mensaje );
    $mensaje = str_replace( '[AtaudNombre]' , sanitize_text_field( get_post_meta( $wpfunos_select ,$this->plugin_name . '_userNombreSeleccionAtaud', true )) , $mensaje );
    $mensaje = str_replace( '[VelatorioNombre]' , sanitize_text_field( get_post_meta( $wpfunos_select ,$this->plugin_name . '_userNombreSeleccionVelatorio', true )) , $mensaje );
    $mensaje = str_replace( '[CeremoniaNombre]' , sanitize_text_field( get_post_meta( $wpfunos_select ,$this->plugin_name . '_userNombreSeleccionDespedida', true )) , $mensaje );

    $mensaje = str_replace( '[precioBase]' , $precioBase . '€', $mensaje );
    $mensaje = str_replace( '[precioDestino]' , $precioDestino . '€', $mensaje );
    $mensaje = str_replace( '[nombreDestino]' , $nombreDestino, $mensaje );
    $mensaje = str_replace( '[precioAtaud]' , $precioAtaud . '€', $mensaje );
    $mensaje = str_replace( '[nombreAtaud]' , $nombreAtaud, $mensaje );
    $mensaje = str_replace( '[precioAtaudEco]' , $precioAtaudEco . '€', $mensaje );
    $mensaje = str_replace( '[nombreAtaudEco]' , $nombreAtaudEco, $mensaje );
    $mensaje = str_replace( '[precioVelatorio]' , $precioVelatorio . '€', $mensaje );
    $mensaje = str_replace( '[nombreVelatorio]' , $nombreVelatorio, $mensaje );
    $mensaje = str_replace( '[precioCeremonia]' , $precioDespedida . '€', $mensaje );
    $mensaje = str_replace( '[nombreCeremonia]' , $nombreDespedida, $mensaje );
    $mensaje = str_replace( '[precioTotal]' , $precioTotal . '€', $mensaje );
    $mensaje = str_replace( '[precioTotalEco]' , $precioTotalEco . '€', $mensaje );

    $comentarios = apply_filters('wpfunos_comentario', $_GET['wpfunos-select-comentarios'] );
    $mensaje = str_replace( '[comentarios]' , $comentarios, $mensaje );

    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    if(!empty( get_option('wpfunos_mailCorreoCcoServiciosColaborador' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoServiciosColaborador' ) ;
    if(!empty( get_option('wpfunos_mailCorreoBccServiciosColaborador' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccServiciosColaborador' ) ;
    wp_mail (  get_post_meta( $wpfunos_select_servicio, $this->plugin_name . '_servicioEmail', true ) , get_option('wpfunos_asuntoCorreoServiciosColaborador') , $mensaje, $headers );
    //dev
    //wp_mail (  'efraim@efraim.cat' , get_option('wpfunos_asuntoCorreoServiciosColaborador') , $mensaje, $headers );

    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', 'Enviado correo colaborador ' . apply_filters('wpfunos_dumplog', get_post_meta( $wpfunos_select_servicio, $this->plugin_name . '_servicioEmail', true )  ) );
    do_action('wpfunos_log', 'Nombre: ' .  get_post_meta( $wpfunos_select ,$this->plugin_name . '_userName', true )  );
    do_action('wpfunos_log', '$_GET[referencia]: ' . $referencia );

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
