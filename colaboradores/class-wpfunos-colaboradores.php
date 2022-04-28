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
  }

  /*********************************/
  /*****  SHORTCODES          ******/
  /*********************************/

  /**
  * Shortcode [wpfunos-servicios-colaborador-usuarios]
  */
  public function wpfunosServiciosColaboradorUsuariosShortcode( $atts, $content = "" ) {
    if( isset( $_GET['wpfunos-select'] )){
      ?>
      <form id="wpfunos-servicios-colaborador-usuario-seleccionado">
        <input type="submit" value="Reiniciar búsqueda" style="background-color: #1d40d3; font-size: 14px;">
        <table>
          <tr><td colspan=2">Datos usuario seleccionado</td></tr>
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
      <table>
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
              <td  rowspan="2">
                <input id="wpfunos-select" type="checkbox" name="wpfunos-select" value="<?php echo $post->ID; ?>" <?php echo $checked; ?> >
              </td>
              <td>
                <?php echo get_post_meta( $post->ID, $this->plugin_name . '_TimeStamp', true ); ?>
              </td>
              <td>
                <?php echo get_post_meta( $post->ID, $this->plugin_name . '_userName', true ); ?>
              </td>
              <td>
                <?php echo get_post_meta( $post->ID, $this->plugin_name . '_userMail', true ); ?>
              </td>
            </tr>
            <tr>
              <td></td>
              <td>
                <?php echo get_post_meta( $post->ID, $this->plugin_name . '_userPhone', true ); ?>
              </td>
              <td>
                <?php echo get_post_meta( $post->ID, $this->plugin_name . '_userNombreSeleccionUbicacion', true ); ?>
              </td>
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
    if( ! isset( $_GET['wpfunos-select'] )) return;
    ?>
    <form id="wpfunos-servicios-colaborador-servicios" method="GET">
      <input type="submit" value="Selecionar servicio" style="background-color: #1d40d3; font-size: 14px;">
      <input type="hidden" name="wpfunos-select" id="wpfunos-select" value="<?php echo $_GET['wpfunos-select']; ?>" >
      <table>
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
              <td  rowspan="2">
                <input id="wpfunos-select-servicio" type="checkbox" name="wpfunos-select-servicio" value="<?php echo $post->ID; ?>" <?php echo $checked; ?> >
              </td>
              <td>
                <?php echo get_post_meta( $post->ID, $this->plugin_name . '_servicioNombre', true ); ?>
              </td>
            </tr>
            <tr>
              <td></td>
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





}
